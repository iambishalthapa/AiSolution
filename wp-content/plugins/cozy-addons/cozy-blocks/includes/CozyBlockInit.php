<?php

namespace CozyBlock;

use CozyBlock\Helpers\CozyHelpers;
use CozyBlock\Helpers\WooHelpers;
use CozyBlock\Icons\CozyIcons;
use CozyBlock\RestApi\CozyRestApi;
use CozyBlock\WPCoreBlocks\QueryLoop;
use CozyBlock\Pattern\CozyPattern;

if ( ! class_exists( 'CozyBlockInit' ) ) {
	final class CozyBlockInit {
		/**
		 * The instance of CozyBlockInit.
		 *
		 * @var \CozyBlockInit $instance */
		private static $instance = null;

		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		public function __construct() {
			$this->cozy_blocks_load_files();

			CozyRestApi::init();
			QueryLoop::init();
			CozyPattern::init();

			add_filter( 'block_categories_all', array( $this, 'cozy_block_categories' ), PHP_INT_MAX, 2 );
			add_action( 'enqueue_block_assets', array( $this, 'enqueue_cozy_block_assets' ) );
			add_action( 'init', array( $this, 'enqueue_cozy_block' ) );
		}

		public function cozy_block_categories( $categories ) {
			return array_merge(
				array(
					array(
						'slug'  => 'cozy-block',
						'title' => __( 'Cozy Blocks - General', 'cozy-addons' ),
					),

					array(
						'slug'  => 'cozy-block/post-magazine',
						'title' => __( 'Cozy Blocks - Post & Magazine', 'cozy-addons' ),
					),

					array(
						'slug'  => 'cozy-block/woocommerce',
						'title' => __( 'Cozy Blocks - WooCommerce', 'cozy-addons' ),
					),
				),
				$categories
			);
		}

		private function cozy_blocks_load_files() {
			require_once COZY_BLOCK_PLUGIN_DIR . 'includes/functions.php';
		}

		public function enqueue_cozy_block_assets() {
			wp_enqueue_script(
				'cozy-core-block-scripts', // Handle name.
				COZY_BLOCK_PLUGIN_URL . 'assets/js/cozy-common-block-scripts.js', // Path to your JavaScript file.
				array( 'wp-block-editor', 'wp-element', 'wp-hooks', 'wp-components' ), // Dependencies: wp-blocks, wp-element, wp-hooks.
				COZY_ADDONS_VERSION,
				true
			);

			wp_localize_script(
				'cozy-core-block-scripts',
				'googleFonts',
				array(
					'collection' => CozyHelpers::get_ct_google_fonts(),
				)
			);

			wp_enqueue_style(
				'cozy-block-core-style', // Handle name.
				COZY_BLOCK_PLUGIN_URL . 'assets/css/cozy-block.css',
				array(),
				COZY_ADDONS_VERSION
			);

			wp_enqueue_style(
				'cozy-block-form-styler', // Handle name.
				COZY_BLOCK_PLUGIN_URL . 'assets/css/cozy-form-styler.css',
				array(),
				COZY_ADDONS_VERSION
			);

			// Pattern Block Script
			wp_enqueue_script(
				'cozy-pattern-block-script', // Handle name.
				COZY_BLOCK_PLUGIN_URL . 'assets/js/pattern-block-scripts.min.js', // Path to your JavaScript file.
				array( 'jquery' ),
				COZY_ADDONS_VERSION,
				false
			);

			wp_enqueue_style(
				'cozy-aos-css', // Handle name.
				COZY_BLOCK_PLUGIN_URL . 'assets/css/aos.css',
				array(),
				'6.4.3'
			);

			// Cozy Animation.
			wp_enqueue_script(
				'cozy-animation', // Handle name.
				COZY_BLOCK_PLUGIN_URL . 'assets/js/cozy-animation.min.js', // Path to your JavaScript file.
				array( 'react', 'wp-block-editor', 'wp-components', 'wp-compose', 'wp-hooks', 'wp-i18n' ), // Dependencies: wp-blocks, wp-element, wp-hooks.
				COZY_ADDONS_VERSION,
				true
			);

			// Cozy Responsive Show.
			wp_enqueue_script(
				'cozy-responsive-show', // Handle name.
				COZY_BLOCK_PLUGIN_URL . 'assets/js/cozy-responsive.min.js', // Path to your JavaScript file.
				array( 'jquery' ),
				COZY_ADDONS_VERSION,
				false
			);
		}

		public function enqueue_cozy_block() {
			$this->register_cozy_blocks();
			$this->register_active_cozy_blocks();
			$this->register_cozy_assets();
		}

		private function register_cozy_blocks() {
			$blocks_to_register = array(
				'carousel',
				'grid',
				'slide',
			);

			foreach ( $blocks_to_register as $block_name ) {
				$cozy_block = COZY_BLOCK_PLUGIN_DIR . 'dist/' . $block_name . '/build';

				if ( is_dir( $cozy_block ) ) {
					register_block_type( $cozy_block );

					$asset_file = CozyHelpers::asset_file_values( $cozy_block . '/index.asset.php' );
					wp_register_script( 'cozy-block--' . $block_name, COZY_BLOCK_PLUGIN_URL . 'dist/' . $block_name . '/build/index.js', $asset_file['dependencies'], $asset_file['version'], false );
				}
			}
		}

		private function register_active_cozy_blocks() {
			$group_blocks = array(
				'carousel',
				'grid',
				'slide',
				'pattern-lib',
			);

			$premium_blocks = array(
				'modal',
				'news-ticker',
				'post-slider',
				'popular-post',
				'related-post',
				'trending-post',
				'product-slider',
				'product-tab',
				'post-views',
				'post-comments',
				'featured-post-tabs',
				'advanced-categories',
				'featured-product-tabs',
				'categorized-post-tabs',
				'magazine-grid',
				'magazine-list',
				'featured-post',
				'wishlist',
				'quick-view',
				'featured-product',
			);

			$woocommerce_blocks = array(
				'product-carousel',
				'product-category',
				'product-review',
				'product-slider',
				'product-tab',
				'featured-product-tabs',
				'quick-view',
				'featured-product',
				'wishlist',
				'add-to-cart',
			);

			$available_fonts = cozy_get_fonts_from_active_theme();

			$cozy_blocks = glob( COZY_BLOCK_PLUGIN_DIR . 'dist/*/build' );
			foreach ( $cozy_blocks as $cozy_block ) {
				$path_parts = explode( '/', $cozy_block );

				// Get the second-last element from the array (if it exists).
				$block_name = $path_parts[ count( $path_parts ) - 2 ];

				$image_dir = COZY_BLOCK_PLUGIN_URL . 'assets/img/';

				if ( in_array( $block_name, $group_blocks, true ) ) {
					continue;
				}

				if ( ! is_woocommerce_active() && in_array( $block_name, $woocommerce_blocks, true ) ) {
					continue;
				}

				if ( is_dir( $cozy_block ) ) {
					// Block enabled status from dashboard.
					$is_block_active = get_option( 'cozy-block--' . $block_name );

					if ( ! cozy_addons_premium_access() && in_array( $block_name, $premium_blocks, true ) ) {
						continue;
					}

					if ( cozy_addons_premium_access() && in_array( $block_name, $premium_blocks, true ) && ( '' === $is_block_active ) ) {
						update_option( 'cozy-block--' . $block_name, 1 );
					}
					if ( '0' === $is_block_active ) {
						continue;
					}
					if ( '' === $is_block_active && ! in_array( $block_name, $premium_blocks, true ) ) {
						update_option( 'cozy-block--' . $block_name, 1 );
					}

					register_block_type( $cozy_block );

					$asset_file = CozyHelpers::asset_file_values( $cozy_block . '/index.asset.php' );
					if ( file_exists( COZY_BLOCK_PLUGIN_DIR . 'dist/' . $block_name . '/build/index.js' ) ) {
						wp_register_script( 'cozy-block--' . $block_name, COZY_BLOCK_PLUGIN_URL . 'dist/' . $block_name . '/build/index.js', $asset_file['dependencies'], $asset_file['version'], false );
					}

					if ( file_exists( COZY_BLOCK_PLUGIN_DIR . 'dist/' . $block_name . '/build/index.css' ) ) {
						wp_register_style( 'cozy-block--' . $block_name . '--editor-style', COZY_BLOCK_PLUGIN_URL . 'dist/' . $block_name . '/build/index.css', array(), $asset_file['version'], false );
					}

					if ( file_exists( COZY_BLOCK_PLUGIN_DIR . 'dist/' . $block_name . '/build/style-index.css' ) ) {
						wp_register_style( 'cozy-block--' . $block_name . '--style', COZY_BLOCK_PLUGIN_URL . 'dist/' . $block_name . '/build/style-index.css', array(), $asset_file['version'], false );
					}

					wp_localize_script(
						'cozy-block--' . $block_name,
						'cozyBlockAssets',
						array(
							'isPremium'   => cozy_addons_premium_access(),
							'imageDir'    => $image_dir,
							'isActive'    => $is_block_active,
							'fonts'       => $available_fonts,
							'googleFonts' => CozyHelpers::get_ct_google_fonts(),

						)
					);

					// Localize cozy icon library to required blocks.
					$this->localize_cozy_icon_lib( $block_name );

					// Localize Woocommerce resources.
					$this->localize_woo_resources_cozy_blocks( $block_name );

					$this->localize_ca_cpt_assets( $block_name );
				}
			}
		}

		private function register_cozy_assets() {
			// Swiper
			wp_register_script( 'cozy-swiper-bundle', trailingslashit( COZY_BLOCK_PLUGIN_URL ) . 'assets/js/swiper-bundle.js', array( 'jquery' ), '11.1.15', false );
			// Swiper styles.
			wp_register_style( 'cozy-swiper-bundle', trailingslashit( COZY_BLOCK_PLUGIN_URL ) . 'assets/css/swiper-bundle.css', array(), '11.1.15' );

			wp_register_script( 'cozy-aos-animation', trailingslashit( COZY_BLOCK_PLUGIN_URL ) . 'assets/js/aos.js', array(), COZY_ADDONS_VERSION, false );

			wp_register_script( 'cozy-block-scripts', trailingslashit( COZY_BLOCK_PLUGIN_URL ) . 'assets/js/cozy-block-scripts.min.js', array( 'jquery', 'cozy-aos-animation' ), COZY_ADDONS_VERSION, false );
		}

		private function localize_cozy_icon_lib( $block_name ) {
			$icon_lib_extended_blocks = array(
				'accordion',
				'advanced-tab',
				'icon-picker',
				'icon-list',
				'mega-menu',
				'portfolio-gallery',
				'sidebar-panel',
				'post-views',
				'advanced-categories',
				'advanced-gallery',
				'wishlist',
				'quick-view',
				'add-to-cart',
			);

			if ( in_array( $block_name, $icon_lib_extended_blocks, true ) ) {
				wp_localize_script(
					'cozy-block--' . $block_name,
					'cozyIcons',
					array(
						'collection' => CozyIcons::get_cozy_icon_collection(),
					)
				);
			}

			if ( 'social-share' === $block_name || 'social-icon' === $block_name ) {
				wp_localize_script(
					'cozy-block--' . $block_name,
					'cozySocialIcons',
					array(
						'collection' => CozyIcons::get_cozy_social_icon_collection(),
					)
				);
			}

			$shape_divider_lib_extended_blocks = array(
				'container',
				'slider',
			);

			if ( in_array( $block_name, $shape_divider_lib_extended_blocks, true ) ) {
				wp_localize_script(
					'cozy-block--' . $block_name,
					'cozyShapeDivider',
					array(
						'collection' => CozyIcons::get_cozy_shape_divider_collection(),
					)
				);
			}
		}

		private function localize_woo_resources_cozy_blocks( $block_name ) {
			if ( 'product-review' === $block_name ) {
				wp_localize_script(
					'cozy-block--' . $block_name,
					'productReviews',
					array(
						'collection'          => WooHelpers::get_woo_product_reviews(),
						'total_reviews_count' => WooHelpers::get_woo_total_product_reviews(),
						'avg_review'          => WooHelpers::get_woo_avg_product_reviews(),
					)
				);
			}
		}

		private function localize_ca_cpt_assets( $block_name ) {
			$cozy_cpt_blocks = array(
				'mega-menu',
				'portfolio-gallery',
			);

			if ( ! in_array( $block_name, $cozy_cpt_blocks, true ) ) {
				return;
			}

			if ( 'mega-menu' === $block_name ) {
				wp_localize_script(
					'cozy-block--' . $block_name,
					'cozyMegaMenu',
					array(
						'templates' => CozyHelpers::get_cozy_mega_menu_templates(),
					)
				);
			}

			if ( 'portfolio-gallery' === $block_name ) {
				wp_localize_script(
					'cozy-block--' . $block_name,
					'cozyPortfolio',
					array(
						'templates' => cozy_addons_premium_access() ? CozyHelpers::get_cozy_portfolio_gallery_templates() : array(),
						'terms'     => get_terms( array( 'ca_portfolio_gallery_category' ) ),
					)
				);
			}
		}
	}
}
