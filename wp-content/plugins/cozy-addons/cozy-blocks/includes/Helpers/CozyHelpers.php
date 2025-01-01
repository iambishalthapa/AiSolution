<?php

namespace CozyBlock\Helpers;

/**
 * Cozy Helper Class.
 *
 * @since 1.0.0
 */
class CozyHelpers {
	/**
	 * Include asset path if exists to fetch dependencies and version.
	 *
	 * @param string $path location to the index.asset.php.
	 * @return array
	 */
	public static function asset_file_values( string $path ): array {
		$asset_path = $path;

		return file_exists( $asset_path )
			? include $asset_path
			: array(
				'dependencies' => array(),
				'version'      => $version ?? COZY_ADDONS_VERSION,
			);
	}

	/**
	 * Returns "Mega Menu" templates collection.
	 *
	 * @return array
	 */
	public static function get_cozy_mega_menu_templates(): array {
		$args = array(
			'post_type'      => 'ca_mega_menu', // Specify the custom post type.
			'posts_per_page' => -1, // Display all posts.
		);

		// Get the posts as an array.
		$posts_array = get_posts( $args );

		// Generate render template.
		foreach ( $posts_array as $template ) {
			// code...
			$parsed_blocks = parse_blocks( $template->post_content );

			$template_render = '';

			foreach ( $parsed_blocks as $block ) {
				$template_render .= render_block( $block );
			}

			$template->render = $template_render;
		}

		return $posts_array;
	}

	/**
	 * Returns "Portfolio Gallery" templates collection.
	 *
	 * @return array
	 */
	public static function get_cozy_portfolio_gallery_templates(): array {
		$args = array(
			'post_type'      => 'ca_portfolio_gallery', // Specify the custom post type.
			'posts_per_page' => -1, // Display all posts.
		);

		// Get the posts as an array.
		$posts_array = get_posts( $args );

		// Generate render template.
		foreach ( $posts_array as $template ) {
			// code...

			$parsed_blocks = parse_blocks( $template->post_content );

			$template_render = '';

			foreach ( $parsed_blocks as $block ) {
				$template_render .= render_block( $block );
			}

			$template->render = $template_render;

			$template->featured_image       = get_the_post_thumbnail_url( $template->ID );
			$template->post_custom_category = get_the_terms( $template->ID, 'ca_portfolio_gallery_category' );

			// Retrieve custom post meta.
			$template->post_project_year = get_post_meta( $template->ID, 'ca_portfolio_gallery_project_year', true );
			$template->post_client       = get_post_meta( $template->ID, 'ca_portfolio_gallery_client', true );
			$template->post_skills       = get_post_meta( $template->ID, 'ca_portfolio_gallery_skills', true );
			$template->post_url          = get_post_meta( $template->ID, 'ca_portfolio_gallery_url', true );
		}

		return $posts_array;
	}

	/**
	 * Returns "Portfolio Gallery" templates collection.
	 *
	 * @return array
	 */
	public static function get_ct_google_fonts(): array {
		include_once COZY_ADDONS_PLUGIN_DIR . 'admin/ct-companions/ct-google-fonts.php';

		return ct_google_fonts();
	}
}
