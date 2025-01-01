<?php

namespace CozyBlock\WPCoreBlocks;

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class QueryLoop {
	private static $instance;

	public static function init() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct() {
		\add_filter( 'pre_render_block', array( $this, 'apply_cozy_related_posts' ), 10, 2 );

		\add_filter( 'pre_render_block', array( $this, 'apply_filters_to_cozy_product_carousel' ), 10, 2 );
	}

	private function get_all_post_ids() {
		$args = array(
			'post_type'      => 'post', // Change 'post' to your custom post type if needed
			'posts_per_page' => -1, // Fetch all posts
			'fields'         => 'ids', // Retrieve only post IDs
			'post_status'    => 'publish', // Fetch only published posts
		);

		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) {
			$post_ids = $query->posts;
			return $post_ids;
		} else {
			// No posts found
			return array();
		}
	}

	public function apply_cozy_related_posts( $pre_render, $parsed_block ) {
		if ( isset( $parsed_block ) && 'core/query' === $parsed_block['blockName'] && isset( $parsed_block['parents'] ) && in_array( 'cozy-block/related-post', $parsed_block['parents'], true ) ) {
			$all_post_ids    = $this->get_all_post_ids();
			$current_post_id = get_the_ID();

			$tags       = wp_get_post_tags( $current_post_id );
			$categories = wp_get_post_categories( $current_post_id );

			// Collect tag and category IDs
			$tag_ids      = array();
			$category_ids = array();

			foreach ( $tags as $post_tag ) {
				$tag_ids[] = $post_tag->term_id;
			}

			foreach ( $categories as $category ) {
				$category_ids[] = $category;
			}

			// Query related posts based on tags and categories
			$related_args = array(
				'post__not_in'   => array( $current_post_id ), // Exclude the current post
				'tax_query'      => array(
					'relation' => 'OR',
					array(
						'taxonomy' => 'post_tag',
						'field'    => 'id',
						'terms'    => $tag_ids,
						'operator' => 'IN',
					),
					array(
						'taxonomy' => 'category',
						'field'    => 'id',
						'terms'    => $category_ids,
						'operator' => 'IN',
					),
				),
				'posts_per_page' => -1, // Number of related posts to display
				'orderby'        => 'rand', // Optional: Order by random
				'fields'         => 'ids', // Retrieve only post IDs
			);

			$related_query = new \WP_Query( $related_args );

			if ( $related_query->have_posts() ) {
				$related_post_ids = $related_query->posts;

				$filtered_post_ids = array_diff( $all_post_ids, $related_post_ids );

				$query_loop_attrs = $parsed_block['attrs'];

				if ( isset( $query_loop_attrs['query']['parents'][0] ) && 'cozy-block/related-post' === $query_loop_attrs['query']['parents'][0] ) {
					\add_filter(
						'query_loop_block_query_vars',
						function ( $default_query ) use ( $parsed_block, $filtered_post_ids, $query_loop_attrs ) {
							$query_args                       = array();
								$query_args['post__not_in']   = $filtered_post_ids;
								$query_args['posts_per_page'] = $query_loop_attrs['query']['perPage'];
								// Return the merged query.
								$filtered_query = array_merge(
									$parsed_block['attrs']['query'],
									$query_args
								);

								return $filtered_query;
						},
						10,
						2
					);
				}
				// Now $related_post_ids contains an array of post IDs.
			} else {
				// No related posts found.
				$query_loop_attrs = $parsed_block['attrs'];

				if ( isset( $query_loop_attrs['query']['parents'][0] ) && 'cozy-block/related-post' === $query_loop_attrs['query']['parents'][0] ) {
					\add_filter(
						'query_loop_block_query_vars',
						function ( $default_query ) use ( $parsed_block ) {

								$query_args = array();

								$query_args['post__not_in'] = $this->get_all_post_ids();

								// Return the merged query.
								return array_merge(
									$parsed_block['attrs']['query'],
									$query_args
								);
						},
						10,
						2
					);
				}
			}
		}
		return $pre_render;
	}

	public function apply_filters_to_cozy_product_carousel( $pre_render, $parsed_block ) {
		if ( isset( $parsed_block ) && 'cozy-block/product-carousel' === $parsed_block['blockName'] ) {
			$parent_block_attrs = $parsed_block['attrs'];

			add_filter(
				'query_loop_block_query_vars',
				function ( $default_query, $block ) use ( $parent_block_attrs ) {
					$core_post_template = $block->parsed_block;

					$query_args = array();

					$query_args['order']   = 'DESC';
					$query_args['orderby'] = 'date';

					if ( array_key_exists( 'namespace', $parent_block_attrs ) && 'cozy-block/product-carousel' === $parent_block_attrs['namespace'] ) {
						$query_args['post_type'] = 'product';

						if ( ! array_key_exists( 'productGroup', $parent_block_attrs ) ) {
							$query_args['tax_query']  = array();
							$query_args['meta_key']   = '';
							$query_args['meta_query'] = array();
							$query_args['post__in']   = array();
						}

						if ( array_key_exists( 'productGroup', $parent_block_attrs ) && 'best_selling' === $parent_block_attrs['productGroup'] ) {
							$query_args['meta_key'] = 'total_sales';
							$query_args['orderby']  = 'meta_value_num';
							// $query_args['meta_query'] = WC()->query->get_meta_query();
							$query_args['meta_query'] = array(
								'relation' => 'AND',
								array(
									'key'     => 'total_sales',
									'compare' => 'EXISTS',
								),
								array(
									'key'     => 'total_sales',
									'value'   => '0',
									'compare' => '>',
								),
							);

							// Setting other query parameters to default.
							$query_args['post__in']  = array();
							$query_args['tax_query'] = array();
						}

						if ( array_key_exists( 'productGroup', $parent_block_attrs ) && 'top_rated' === $parent_block_attrs['productGroup'] ) {
							$query_args['meta_key'] = '_wc_average_rating';
							$query_args['orderby']  = 'meta_value_num';
							// $query_args['meta_query'] = WC()->query->get_meta_query();
							$query_args['meta_query'] = array(
								'relation' => 'AND',
								array(
									'key'     => '_wc_average_rating',
									'compare' => 'EXISTS',
								),
								array(
									'key'     => '_wc_average_rating',
									'value'   => '0',
									'compare' => '>', // Check if the timestamp is greater than or equal to one week ago.
								),
							);

							// Setting other query parameters to default.
							$query_args['post__in']  = array();
							$query_args['tax_query'] = array();
						}

						if ( array_key_exists( 'productGroup', $parent_block_attrs ) && 'sale' === $parent_block_attrs['productGroup'] ) {
							$product_ids_on_sale    = wc_get_product_ids_on_sale();
							$query_args['post__in'] = $product_ids_on_sale;

							// Setting other query parameters to default.
							$query_args['tax_query']  = array();
							$query_args['meta_key']   = '';
							$query_args['meta_query'] = array();
						}

						if ( array_key_exists( 'productGroup', $parent_block_attrs ) && 'category' === $parent_block_attrs['productGroup'] ) {
							$query_args['tax_query'] = array(
								array(
									'taxonomy' => 'product_cat',
									'field'    => 'term_id',
									'terms'    => $parent_block_attrs['productCategory'] ?? array(),
									'operator' => 'IN',
								),
							);

							// Setting other query parameters to default.
							$query_args['meta_key']   = '';
							$query_args['meta_query'] = array();
							$query_args['post__in']   = array();

						}

						if ( array_key_exists( 'className', $core_post_template['attrs'] ) && 'cozy-layout-grid swiper-wrapper cozy-product-carousel-template' === $core_post_template['attrs']['className'] && array_key_exists( 'namespace', $parent_block_attrs ) ) {
							return array_merge(
								$default_query,
								$query_args
							);
						} else {
							return $default_query;
						}
					}
				},
				10,
				2
			);
		}
		return $pre_render;
	}
}
