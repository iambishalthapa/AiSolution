<?php
/**
 * Blocks rest api controller
 *
 * @package CozyBlock\RestApi\Controllers\V1
 */

namespace CozyBlock\RestApi\Controllers\V1;

use CozyBlock\Abstracts\RestControllerBase;
use WP_REST_Request;

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class BlockController extends RestControllerBase {
	public function register_routes() {
		try {
			register_rest_route(
				'cozy-block/v1',
				'/posts',
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( $this, 'cozy_get_posts_collection' ),
					'permission_callback' => '__return_true',
				)
			);

			register_rest_route(
				'cozy-block/v1',
				'/posts/sticky',
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( $this, 'cozy_get_sticky_posts' ),
					'permission_callback' => '__return_true',
				),
			);

			register_rest_route(
				'cozy-block/v1',
				'/tags',
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_popular_tags' ),
					'permission_callback' => '__return_true',
				)
			);

			register_rest_route(
				'cozy-block/v1',
				'/comments',
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_popular_comments' ),
					'permission_callback' => '__return_true',
				)
			);

			register_rest_route(
				'cozy-block/v1',
				'/related-posts',
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_related_posts' ),
					'permission_callback' => '__return_true',
				)
			);

			register_rest_route(
				'cozy-block/v1',
				'/post-views/(?P<post_id>\d+)',
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_post_views' ),
					'permission_callback' => '__return_true',
				)
			);

			register_rest_route(
				'cozy-block/v1',
				'/post-comments/(?P<post_id>\d+)',
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_post_comments' ),
					'permission_callback' => '__return_true',
				)
			);

			register_rest_route(
				'cozy-block/v1',
				'/post-categories',
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_post_categories' ),
					'permission_callback' => '__return_true',
				)
			);

		} catch ( \Exception $e ) {
			// error_log( 'Error registering route: ' . $e->getMessage() );
		}
	}

	public function cozy_get_posts_collection( WP_REST_Request $request ) {
		$type     = $request->get_param( 'type' ) ? $request->get_param( 'type' ) : 'latest';
		$per_page = $request->get_param( 'per_page' ) ? $request->get_param( 'per_page' ) : 10;

		$args = array();

		switch ( $type ) {
			case 'popular':
				$args = array(
					'post_type'      => 'post',
					'meta_key'       => 'cozy_post_views_count', // Replace with your popularity field.
					'orderby'        => 'cozy_post_views_count',
					'order'          => 'DESC',
					'posts_per_page' => $per_page, // Number of popular posts to retrieve.
					'meta_query'     => array(
						'relation' => 'AND',
						array(
							'key'     => 'cozy_post_views_count',
							'compare' => 'EXISTS', // Check if the timestamp is greater than or equal to one week ago.
						),
						array(
							'key'     => 'cozy_post_views_count',
							'value'   => '0',
							'compare' => '>', // Check if the timestamp is greater than or equal to one week ago.
						),
					),
				);
				break;

			case 'trending':
				$args = array(
					'post_type'      => 'post',
					'meta_key'       => 'cozy_trending_post_views', // Replace with your popularity field.
					'orderby'        => 'cozy_trending_post_views',
					'order'          => 'DESC',
					'posts_per_page' => $per_page, // Number of popular posts to retrieve.
					'meta_query'     => array(
						'relation' => 'AND',
						array(
							'key'     => 'cozy_trending_post_views',
							'compare' => 'EXISTS', // Check if the timestamp is greater than or equal to one week ago.
						),
						array(
							'key'     => 'cozy_trending_post_views',
							'value'   => '0',
							'compare' => '>', // Check if the timestamp is greater than or equal to one week ago.
						),
					),
				);
				break;

			default:
				$args = array(
					'post_type'      => 'post',
					'orderby'        => 'date',
					'order'          => 'DESC',
					'posts_per_page' => $per_page, // Number of popular posts to retrieve.
				);

		}

		$latest_posts = new \WP_Query( $args );

		$additional_post_data = array();

		foreach ( $latest_posts->posts as $post ) {
			$post_image_url              = get_the_post_thumbnail_url( $post->ID );
			$post_link                   = get_permalink( $post->ID );
			$post_id                     = $post->ID;
			$post_data                   = (array) $post; // Convert WP_Post object to an array.
			$post_data['post_image_url'] = $post_image_url;

			// Get categories and their links.
			$categories      = get_the_category( $post->ID );
			$post_categories = array();
			foreach ( $categories as $category ) {
				$post_categories[] = array(
					'ID'          => $category->term_id,
					'name'        => $category->name,
					'link'        => get_category_link( $category->term_id ),
					'count'       => $category->count,
					'description' => $category->description,
					'slug'        => $category->slug,
					'taxonomy'    => $category->taxonomy,
					'parent'      => $category->parent,
				);
			}
			$post_data['post_categories'] = $post_categories;

			$post_data['post_author_name']    = get_the_author_meta( 'display_name', $post->post_author ) ?? '';
			$post_data['post_link']           = $post_link;
			$post_data['post_date_formatted'] = get_the_date( '', $post_id );
			$additional_post_data[]           = $post_data;
		}

		wp_reset_postdata();

		return $additional_post_data;
	}

	public function cozy_get_sticky_posts( WP_REST_Request $request ) {
		$args = array(
			'post__in'            => get_option( 'sticky_posts' ),
			'posts_per_page'      => -1, // To retrieve all sticky posts.
			'ignore_sticky_posts' => 1, // To exclude sticky posts from regular queries.
			'orderby'             => 'date',
			'order'               => 'DESC',
		);

		$sticky_posts         = new \WP_Query( $args );
		$additional_post_data = array();

		foreach ( $sticky_posts->posts as $post ) {
			$post_image_url = get_the_post_thumbnail_url( $post->ID );

			$post_data                   = (array) $post; // Convert WP_Post object to an array.
			$post_data['post_image_url'] = $post_image_url;

			// Get categories and their links.
			$categories      = get_the_category( $post->ID );
			$post_categories = array();
			foreach ( $categories as $category ) {
				$post_categories[] = array(
					'ID'          => $category->term_id,
					'name'        => $category->name,
					'link'        => get_category_link( $category->term_id ),
					'count'       => $category->count,
					'description' => $category->description,
					'slug'        => $category->slug,
					'taxonomy'    => $category->taxonomy,
					'parent'      => $category->parent,
				);
			}
			$post_data['post_categories'] = $post_categories;

			$additional_post_data[] = $post_data;
		}

		wp_reset_postdata();

		return $additional_post_data;
	}

	public function get_related_posts( WP_REST_Request $request ) {
		global $post;
		// Get the current post ID.
		$current_post_id = get_the_ID();

		// Get the current post's categories and tags.
		$post_categories = wp_get_post_categories( $post->ID );
		$post_tags       = wp_get_post_tags( $post->ID );

		// Combine tags and categories terms into a single array.
		$related_terms = array_merge( $post_tags, $post_categories );

		// Query for related posts.
		$related_query = new \WP_Query(
			array(
				'post__not_in'   => array( $current_post_id ),
				'tax_query'      => array(
					'relation' => 'OR',
					array(
						'taxonomy' => 'post_tag',
						'field'    => 'id',
						'terms'    => $related_terms,
					),
					array(
						'taxonomy' => 'category',
						'field'    => 'id',
						'terms'    => $related_terms, // Categories
					),
				),
				'posts_per_page' => -1, // Adjust the number of related posts to display
			)
		);

		return $related_query->posts;
	}

	public function get_popular_tags( WP_REST_Request $request ) {
		$per_page = $request->get_param( 'per_page' ) ? $request->get_param( 'per_page' ) : 10;

		$popular_tags = get_terms(
			array(
				'taxonomy'   => 'post_tag',
				'orderby'    => 'count',
				'order'      => 'DESC',
				'number'     => $per_page,
				'hide_empty' => true,
			)
		);

		$tags_with_links = array();
		foreach ( $popular_tags as $tag ) {
			$tag->link         = get_term_link( $tag );
			$tags_with_links[] = $tag;
		}

		wp_reset_postdata();

		return rest_ensure_response( $tags_with_links );
	}

	public function get_popular_comments( WP_REST_Request $request ) {
		$per_page = $request->get_param( 'per_page' ) ? $request->get_param( 'per_page' ) : 10;

		global $wpdb;

		// Get all approved comments.
		$all_comments = $wpdb->get_results(
			"
				SELECT comment_ID, comment_post_ID, comment_author, comment_author_email, comment_content, comment_date
				FROM $wpdb->comments
				WHERE comment_approved = '1' ORDER BY comment_date DESC
			"
		);

		$comments_formatted = array();

		// Get the total comment count for each comment's post.
		foreach ( $all_comments as $comment ) {
			$comment->comment_author_avatar = get_avatar_url( $comment->comment_author_email );
			$comment->link                  = get_comment_link( $comment->comment_ID );
			$comment->formatted_date        = date( 'F j, Y', strtotime( $comment->comment_date ) );

			$comments_formatted[] = $comment;
		}

		// Get the top comments.
		$top_comments = array_slice( $comments_formatted, 0, $per_page );

		wp_reset_postdata();

		return rest_ensure_response( $top_comments );
	}

	public function get_post_views( WP_REST_Request $request ) {
		$post_id          = $request->get_param( 'post_id' );
		$post_views_count = get_post_meta( $post_id, 'cozy_post_views_count', true );

		wp_reset_postdata();

		return $post_views_count;
	}

	public function get_post_comments( WP_REST_Request $request ) {
		$post_id             = $request->get_param( 'post_id' );
		$post_comments_count = get_comments_number( $post_id );

		wp_reset_postdata();

		return $post_comments_count;
	}

	public function get_post_categories( WP_REST_Request $request ) {
		$args = array(
			'taxonomy'   => 'category',
			'hide_empty' => true,
			'number'     => $request->get_param( 'per_page' ) ?? 10,
			'order'      => 'DESC',
			'orderby'    => 'count',
		);

		$categories = get_categories( $args );

		$formatted_categories = array();

		foreach ( $categories as $cat ) {
			$cat->link              = get_category_link( $cat->term_id );
			$formatted_categories[] = $cat;
		}

		wp_reset_postdata();

		return rest_ensure_response( $formatted_categories );
	}
}
