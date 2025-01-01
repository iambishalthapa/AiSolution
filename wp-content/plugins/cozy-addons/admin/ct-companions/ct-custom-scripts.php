<?php

/**
 * Custom css and js functionality of the plugin.
 *
 * @link       https://cozythemes.com/
 * @since      1.0.0
 *
 * @package    Cozy_Addons
 * @subpackage Cozy_Addons/admin
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( cozy_addons_premium_access() ) {

	if ( ! class_exists( 'CT_Custom_Scripts_Menu' ) ) :
		class CT_Custom_Scripts_Menu {

			public function __construct() {
				add_action( 'admin_menu', array( $this, 'register_ct_custom_scripts_menus' ), 11 );
			}

			public function register_ct_custom_scripts_menus() {
				add_submenu_page(
					'_cozy_companions',
					'CT Custom CSS & Scripts',
					'CT Custom CSS & Scripts',
					'manage_options',
					'_ct_custom_scripts',
					'render_custom_menu'
				);

				// Render the custom menu page
				function render_custom_menu() {
					if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == 'true' ) { ?>
						<div class="notice notice-success is-dismissible">
							<p><?php _e( 'Saved successfully.', 'cozy-addons' ); ?></p>
						</div>
						<?php
					}

					?>
					<div class="wrap ct-custom-scripts">
						<form method="post" action="options.php">
							<?php
							settings_fields( 'custom-assets-settings' );
							do_settings_sections( 'custom-assets' );
							submit_button();
							?>
						</form>
					</div>
					<?php
				}

				// Register the settings and fields
				function register_custom_assets_settings() {
					// Register the settings section
					add_settings_section(
						'ct-custom-assets-section',
						'CT Companions Additional Styles and Scripts for Your Site!',
						'custom_assets_section_callback',
						'custom-assets'
					);

					// Register the CSS option
					add_settings_field(
						'custom-css',
						'Custom CSS',
						'custom_css_field_callback',
						'custom-assets',
						'ct-custom-assets-section'
					);

					// Register the JS option for heaer
					add_settings_field(
						'ct-custom-header-js',
						'Custom Header Scripts',
						'custom_js_field_callback',
						'custom-assets',
						'ct-custom-assets-section'
					);

					// Register the JS option for heaer
					add_settings_field(
						'ct-custom-footer-js',
						'Custom Footer Scripts',
						'custom_js_footer_field_callback',
						'custom-assets',
						'ct-custom-assets-section'
					);

					// Register the settings
					register_setting(
						'custom-assets-settings',
						'custom-css'
					);

					register_setting(
						'custom-assets-settings',
						'ct-custom-header-js'
					);
					register_setting(
						'custom-assets-settings',
						'ct-custom-footer-js'
					);
				}
				add_action( 'admin_init', 'register_custom_assets_settings' );

				// Callback function for the section description
				function custom_assets_section_callback() {
					echo __( 'Add custom CSS and JavaScript to your WordPress website and save it to publish.', 'cozy-addons' );
				}

				// Callback function for the CSS field
				function custom_css_field_callback() {
					$ct_custom_css = get_option( 'custom-css' );
					echo '<textarea name="custom-css" rows="12" cols="120">' . esc_textarea( $ct_custom_css ) . '</textarea>';
				}

				// Callback function for the JS field for header
				function custom_js_field_callback() {
					$ct_custom_header_js = get_option( 'ct-custom-header-js' );
					echo '<textarea name="ct-custom-header-js" rows="6" cols="120">' . esc_textarea( $ct_custom_header_js ) . '</textarea>';
				}
				// Callback function for the JS field
				function custom_js_footer_field_callback() {
					$ct_custom_footer_js = get_option( 'ct-custom-footer-js' );
					echo '<textarea name="ct-custom-footer-js" rows="6" cols="120">' . esc_textarea( $ct_custom_footer_js ) . '</textarea>';
				}
			}
		}
		$CT_Custom_ScriptsMenu = new CT_Custom_Scripts_Menu();
	endif;

	if ( ! function_exists( 'cozy_addons_custom_styles' ) ) {
		function cozy_addons_custom_styles() {
			$theme              = wp_get_theme();
			$main_stylesheet_id = $theme->get_stylesheet() . '-style';
			$ct_custom_css      = get_option( 'custom-css' );
			if ( wp_style_is( $main_stylesheet_id, 'enqueued' ) ) {
				wp_add_inline_style( $main_stylesheet_id, $ct_custom_css );
			}
		}
		add_action( 'wp_enqueue_scripts', 'cozy_addons_custom_styles', 99 );
	}

	if ( ! function_exists( 'cozy_addons_custom_header_scripts' ) ) {
		function cozy_addons_custom_header_scripts() {
			$ct_custom_header_scripts = get_option( 'ct-custom-header-js' );

			if ( ! empty( $ct_custom_header_scripts ) ) {
				echo '<script type="text/javascript">' . $ct_custom_header_scripts . '</script>';
			}
		}
		add_action( 'wp_head', 'cozy_addons_custom_header_scripts' );
	}
	if ( ! function_exists( 'cozy_addons_custom_footer_scripts' ) ) {
		function cozy_addons_custom_footer_scripts() {
			$ct_custom_footer_scripts = get_option( 'ct-custom-footer-js' );

			if ( ! empty( $ct_custom_footer_scripts ) ) {
				echo '<script type="text/javascript">' . $ct_custom_footer_scripts . '</script>';
			}
		}
		add_action( 'wp_footer', 'cozy_addons_custom_footer_scripts' );
	}
}
