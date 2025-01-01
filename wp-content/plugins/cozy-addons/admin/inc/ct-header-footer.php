<?php

/**
 * The header and footer builde for elementor
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
	// Register Custom Post Type
	function cozy_header_footer_builder_custom_post_type() {
		$labels = array(
			'name'                  => _x( 'CT Header and Footer Builder', 'Post Type General Name', 'cozy-addons' ),
			'singular_name'         => _x( 'Header and Footer', 'Post Type Singular Name', 'cozy-addons' ),
			'menu_name'             => __( 'Headers and Footers', 'cozy-addons' ),
			'name_admin_bar'        => __( 'Header and Footer', 'cozy-addons' ),
			'archives'              => __( 'Header and Footer Archives', 'cozy-addons' ),
			'attributes'            => __( 'Header and Footer Attributes', 'cozy-addons' ),
			'parent_item_colon'     => __( 'Parent Header and Footer:', 'cozy-addons' ),
			'all_items'             => __( 'CT Header and Footer Builder', 'cozy-addons' ),
			'add_new_item'          => __( 'Add New Header and Footer', 'cozy-addons' ),
			'add_new'               => __( 'Add New', 'cozy-addons' ),
			'new_item'              => __( 'New Header and Footer', 'cozy-addons' ),
			'edit_item'             => __( 'Edit Header and Footer', 'cozy-addons' ),
			'update_item'           => __( 'Update Header and Footer', 'cozy-addons' ),
			'view_item'             => __( 'View Header and Footer', 'cozy-addons' ),
			'view_items'            => __( 'View Headers and Footers', 'cozy-addons' ),
			'search_items'          => __( 'Search Header and Footer', 'cozy-addons' ),
			'not_found'             => __( 'Not found', 'cozy-addons' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'cozy-addons' ),
			'featured_image'        => __( 'Featured Image', 'cozy-addons' ),
			'set_featured_image'    => __( 'Set featured image', 'cozy-addons' ),
			'remove_featured_image' => __( 'Remove featured image', 'cozy-addons' ),
			'use_featured_image'    => __( 'Use as featured image', 'cozy-addons' ),
			'insert_into_item'      => __( 'Insert into header and footer', 'cozy-addons' ),
			'uploaded_to_this_item' => __( 'Uploaded to this header and footer', 'cozy-addons' ),
			'items_list'            => __( 'Headers and Footers list', 'cozy-addons' ),
			'items_list_navigation' => __( 'Headers and Footers list navigation', 'cozy-addons' ),
			'filter_items_list'     => __( 'Filter headers and footers list', 'cozy-addons' ),
		);
		$args   = array(
			'label'         => __( 'CT Header & Footer Builder', 'cozy-addons' ),
			'description'   => __( 'Custom post type for headers/footers created with Cozy Header Footer Builder.', 'cozy-addons' ),
			'labels'        => $labels,
			'supports'      => array( 'title', 'elementor' ),
			'public'        => true,
			// 'menu_icon'             => 'dashicons-layout',
			'menu_position' => 20,
			'has_archive'   => true,
			'rewrite'       => array( 'slug' => 'ct-header-footer' ),
			'show_in_menu'  => '_cozy_companions',
		);
		register_post_type( 'cozy_header_footer', $args );
	}
	add_action( 'init', 'cozy_header_footer_builder_custom_post_type', 0 );

	function cozy_addons_admin_enqueue_scripts() {
		wp_enqueue_script( 'cozy-addons-admin-scripts', COZY_ADDONS_PLUGIN_URL . '/admin/js/cozy-addons-admin.js', array( 'jquery' ), '', true );
	}
	add_action( 'admin_enqueue_scripts', 'cozy_addons_admin_enqueue_scripts' );
	// Add custom meta field for template location
	function add_template_location_meta_box() {
		add_meta_box(
			'ct_template_location_meta',
			'Display Conditions for Header and Footer Templates',
			'display_template_location_meta_box',
			'cozy_header_footer',
			'normal',
			'high'
		);
	}

	function display_template_location_meta_box( $post ) {
		$template_location = get_post_meta( $post->ID, 'template_location', true );
		$display_option    = get_post_meta( $post->ID, 'display_option', true );
		$selected_pages    = get_post_meta( $post->ID, 'selected_pages', true );
		?>
		<div class="cthf-buidler-dashboard">
			<div class="ctfh-field-holder">
				<label class="cthf-field-label" for="template_location"><?php echo __( 'Template Location:', 'cozy-addons' ); ?></label>
				<select class="cthf-field" name="template_location" id="template_location">
					<option value="header" <?php selected( $template_location, 'header' ); ?>><?php echo __( 'Header', 'cozy-addons' ); ?></option>
					<option value="footer" <?php selected( $template_location, 'footer' ); ?>><?php echo __( 'Footer', 'cozy-addons' ); ?></option>
				</select>
			</div>
			<div class="ctfh-field-holder">
				<label class="cthf-field-label" for="display_option"><?php echo __( 'Display Option:', 'cozy-addons' ); ?></label>
				<select class="cthf-field" name="display_option" id="display_option">
					<option value="entire_site" <?php selected( $display_option, 'entire_site' ); ?>><?php echo __( 'Entire Website', 'cozy-addons' ); ?></option>
					<option value="specific_pages" <?php selected( $display_option, 'specific_pages' ); ?>><?php echo __( 'Particular Page', 'cozy-addons' ); ?></option>

				</select>
			</div>
			<div id="template-conditions">
				<div class="ctfh-field-holder">
					<label class="cthf-field-label" for="selected_pages"><?php echo __( 'Select Page:', 'cozy-addons' ); ?></label>
					<select class="cthf-field" name="selected_pages" id="selected_pages">
						<option><?php echo __( 'Select Page', 'cozy-addons' ); ?></option>
						<?php
						$ct_pages = get_pages();

						$final_options = array();
						foreach ( $ct_pages as $page ) {
							$final_options[ $page->ID ] = $page->post_title;
						}
						foreach ( $final_options as $option_id => $option_label ) {
							$selected = $option_id === intval( $selected_pages ) ? 'selected' : '';
							echo '<option value="' . $option_id . '" ' . $selected . '>' . $option_label . '</option>';
						}
						?>
					</select>
				</div>
			</div>

		</div>
		<?php
		// print_r($final_options);
	}
	function save_template_location_meta( $post_id ) {
		if ( isset( $_POST['template_location'] ) ) {
			$template_location = sanitize_text_field( $_POST['template_location'] );
			update_post_meta( $post_id, 'template_location', $template_location );
		}

		if ( isset( $_POST['display_option'] ) ) {
			$display_option = sanitize_text_field( $_POST['display_option'] );
			update_post_meta( $post_id, 'display_option', $display_option );
		}

		if ( isset( $_POST['selected_pages'] ) ) {
			$selected_pages = intval( $_POST['selected_pages'] );
			update_post_meta( $post_id, 'selected_pages', $selected_pages );
		}
	}
	add_action( 'add_meta_boxes', 'add_template_location_meta_box' );
	add_action( 'save_post', 'save_template_location_meta' );

	function cozy_hfbuilder_header_section() {
		// Fetch posts of type 'cozy_header_footer' with specific conditions
		$args                 = array(
			'post_type'      => 'cozy_header_footer',
			'posts_per_page' => -1,
			'meta_key'       => 'template_location',
			'meta_value'     => 'header',
		);
		$posts                = get_posts( $args );
		$specific_pages_array = array();
		$content              = '';

		foreach ( $posts as $post ) {
			setup_postdata( $post );
			$template_location     = get_post_meta( $post->ID, 'template_location', true );
			$ct_template_condition = get_post_meta( $post->ID, 'display_option', true );
			$specific_page_slug    = get_post_meta( $post->ID, 'selected_pages', true );
			$header_post_id        = $post->ID;

			if ( $ct_template_condition === 'specific_pages' && $specific_page_slug ) {
				$specific_pages_array[] = $specific_page_slug;
			}

			if ( class_exists( 'Elementor\Plugin' ) && ! is_admin() ) {
				$header_id = $header_post_id;
				$elementor = \Elementor\Plugin::instance();

				if ( ! empty( $specific_pages_array ) ) {
					if ( $ct_template_condition === 'specific_pages' && is_page( $specific_page_slug ) ) {
						$custom_content = $elementor->frontend->get_builder_content_for_display( $header_id, true );
						$content        = $custom_content;
					} elseif ( $ct_template_condition === 'entire_site' && ! is_page( $specific_pages_array ) ) {
						$custom_content = $elementor->frontend->get_builder_content_for_display( $header_id, true );
						$content        = $custom_content;
					}
				} else {
					$custom_content = $elementor->frontend->get_builder_content_for_display( $header_id, true );
					$content        = $custom_content;
				}
			}
		}
		wp_reset_postdata();
		echo '<div class="ct-header-block">' . $content . '</div>';
	}
	add_filter( 'wp_body_open', 'cozy_hfbuilder_header_section' );



	/**
	 * rendering footer template
	 */
	$footer_args          = array(
		'post_type'      => 'cozy_header_footer',
		'posts_per_page' => -1,
		'meta_key'       => 'template_location',
		'meta_value'     => 'footer',
	);
	$footer_templates     = get_posts( $footer_args );
	$particular_templates = array();
	foreach ( $footer_templates as $post ) {
		setup_postdata( $post );
		$template_location         = get_post_meta( $post->ID, 'template_location', true );
		$ct_template_condition     = get_post_meta( $post->ID, 'display_option', true );
		$footer_specific_page_slug = get_post_meta( $post->ID, 'selected_pages', true );
		$footer_template_id        = $post->ID;

		if ( $ct_template_condition === 'specific_pages' && $footer_specific_page_slug ) {
			$particular_templates[] = $footer_specific_page_slug;
		}
		add_action(
			'wp_footer',
			function () use ( $footer_template_id, $ct_template_condition, $footer_specific_page_slug, &$particular_templates ) {
				if ( class_exists( 'Elementor\Plugin' ) && ! is_admin() ) {
					$footer_id = $footer_template_id;
					$elementor = \Elementor\Plugin::instance();
					if ( ! empty( $particular_templates ) ) {
						if ( $ct_template_condition === 'specific_pages' && is_page( $footer_specific_page_slug ) ) {
							echo '<footer class="ct-site-footer">' . $elementor->frontend->get_builder_content_for_display( $footer_id ) . '</footer>';
						} elseif ( $ct_template_condition === 'entire_site' && ! is_page( $particular_templates ) ) {
							echo '<footer class="ct-site-footer">' . $elementor->frontend->get_builder_content_for_display( $footer_id ) . '</footer>';
						} else {
							// do nothing
						}
					} else {
						echo '<footer class="ct-site-footer">' . $elementor->frontend->get_builder_content_for_display( $footer_id ) . '</footer>';
					}
				}
			},
			1
		);
	}
	wp_reset_postdata();
	function check_post_count_before_publishing( $new_status, $old_status, $post ) {
		// Specify your custom post type
		if ( $post->post_type === 'cozy_header_footer' && $new_status === 'publish' && $old_status !== 'publish' ) {
			$post_id               = $post->ID;
			$new_template_location = $_POST['template_location'];
			$new_template_option   = $_POST['display_option'];
			if ( $new_template_option === 'specific_pages' ) {
				$new_templatepage_id = $_POST['selected_pages'];
			}
			$args = array(
				'post_type'      => 'cozy_header_footer',
				'posts_per_page' => -1,
			);

			$posts               = get_posts( $args );
			$headerCount         = 0;
			$footerCount         = 0;
			$headerSelectedPages = array();
			$footerSelectedPages = array();

			foreach ( $posts as $p ) {
				$templateLocation = get_post_meta( $p->ID, 'template_location', true );
				$displayOption    = get_post_meta( $p->ID, 'display_option', true );
				$selectedPages    = get_post_meta( $p->ID, 'selected_pages', true );

				if ( $displayOption === 'specific_pages' && $templateLocation === 'header' ) {
					$headerSelectedPages[] = $selectedPages;
				}
				if ( $displayOption === 'specific_pages' && $templateLocation === 'footer' ) {
					$footerSelectedPages[] = $selectedPages;
				}
				if ( $templateLocation === 'header' && $displayOption === 'entire_site' ) {
					++$headerCount;
				}
				if ( $templateLocation === 'footer' && $displayOption === 'entire_site' ) {
					++$footerCount;
				}
			}

			if ( $new_template_location === 'header' ) {
				// wp_die('Your journey end here');
				if ( $new_template_option === 'entire_site' ) {
					if ( $headerCount > 0 ) {
						$post->post_status = 'draft'; // Change the post status to draft
						wp_update_post( $post ); // Update the post status
						// Set a flag in the user's session
						set_transient( 'ct_header_footer_template_registered_condition', true, 5 );
						// Redirect to the custom post type list page
						wp_redirect( admin_url( 'edit.php?post_type=cozy_header_footer' ) );
						exit;
					}
				} elseif ( $new_template_option === 'specific_pages' ) {
					if ( in_array( $new_templatepage_id, $headerSelectedPages, true ) ) {
						$post->post_status = 'draft'; // Change the post status to draft
						wp_update_post( $post ); // Update the post status
						// Set a flag in the user's session
						set_transient( 'ct_header_footer_template_registered_condition', true, 5 );
						// Redirect to the custom post type list page
						wp_redirect( admin_url( 'edit.php?post_type=cozy_header_footer' ) );
						exit;
					}
				} else {
					// allow adding
				}
			} elseif ( $new_template_location === 'footer' ) {
				if ( $new_template_option === 'entire_site' ) {
					if ( $footerCount > 0 ) {
						$post->post_status = 'draft'; // Change the post status to draft
						wp_update_post( $post ); // Update the post status
						// Set a flag in the user's session
						set_transient( 'ct_header_footer_template_registered_condition', true, 5 );
						// Redirect to the custom post type list page
						wp_redirect( admin_url( 'edit.php?post_type=cozy_header_footer' ) );
						exit;
					}
				} elseif ( $new_template_option === 'specific_pages' ) {
					if ( in_array( $new_templatepage_id, $footerSelectedPages, true ) ) {
						$post->post_status = 'draft'; // Change the post status to draft
						wp_update_post( $post ); // Update the post status
						// Set a flag in the user's session
						set_transient( 'ct_header_footer_template_registered_condition', true, 5 );
						// Redirect to the custom post type list page
						wp_redirect( admin_url( 'edit.php?post_type=cozy_header_footer' ) );
						exit;
					}
				} else {
					// allow adding
				}
			}
		}
	}
	add_action( 'transition_post_status', 'check_post_count_before_publishing', 10, 3 );

	function display_template_post_notice() {
		if ( get_transient( 'ct_header_footer_template_registered_condition' ) ) {
			delete_transient( 'ct_header_footer_template_registered_condition' );
			?>

			<div class="notice notice-error is-dismissible">
				<p><?php echo __( 'Template has been already registered for this location/page!', 'cozy-addons' ); ?> </p>
			</div>
			<?php
		}
	}
	add_action( 'admin_notices', 'display_template_post_notice' );
} elseif ( ! class_exists( 'Cozy_Header_Footer_Notice_Menu' ) ) {
	class Cozy_Header_Footer_Notice_Menu {

		public function __construct() {
				add_action( 'admin_menu', array( $this, 'register_cozy_addons_header_footer_notice_menus' ), 10 );
		}

		public function register_cozy_addons_header_footer_notice_menus() {
			add_submenu_page(
				'_cozy_companions',
				'CT Header and Footer Builder',
				'CT Header and Footer Builder',
				'manage_options',
				'_cozy_header_footer',
				'cozy_addons_hf_notice'
			);
			function cozy_addons_hf_notice() {

				?>
					<div class="ct_header_footer_buidler_notice">
						<h2>
						<?php
						echo __( 'Upgrade to Premium version to get custom css, custom header scripts, custom footer script &  header and footer builder for elementor!' )
						?>
						</h2>
						<a class="upsell-button" href="https://cozythemes.com/cozy-addons/" target="_blank">
						<?php echo __( 'Upgrade to Pro', 'cozy-addons' ); ?>
						</a>

					</div>
					<?php
			}
		}
	}
		$Cozy_Addons_Custom_Menu = new Cozy_Header_Footer_Notice_Menu();
}
