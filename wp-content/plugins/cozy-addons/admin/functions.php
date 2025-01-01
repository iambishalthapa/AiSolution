<?php
function cozy_addons_set_post_views( $post_id ) {
	$count_key = 'cozy_post_views_count';
	$count     = get_post_meta( $post_id, $count_key, true );

	$trending_key   = 'cozy_trending_post_views';
	$trending_count = get_post_meta( $post_id, $trending_key, true );

	if ( $count == '' ) {
		$count = 1;
		delete_post_meta( $post_id, $count_key );
		add_post_meta( $post_id, $count_key, '1' );
	} else {
		++$count;
		update_post_meta( $post_id, $count_key, $count );
	}

	if ( '' === $trending_count ) {
		$trending_count = '1';
		delete_post_meta( $post_id, $trending_count );
		add_post_meta( $post_id, $trending_key, '1' );
	} else {
		++$trending_count;
		update_post_meta( $post_id, $trending_key, $trending_count );
	}
}

function cozy_addons_track_post_views( $post_id ) {
	if ( ! is_single() ) {
		return;
	}

	if ( empty( $post_id ) ) {
		global $post;
		$post_id = $post->ID;
	}

	cozy_addons_set_post_views( $post_id );
}

add_action( 'wp_head', 'cozy_addons_track_post_views' );

// Function to reset post views count weekly
function reset_trending_post_views_count() {
	// Get all posts
	$args = array(
		'post_type'      => 'post', // Change if your post type is different
		'posts_per_page' => -1,     // Get all posts
	);

	$posts = get_posts( $args );

	foreach ( $posts as $post ) {
		$post_id = $post->ID;
		delete_post_meta( $post_id, 'cozy_trending_post_views' );
		// You can recreate the meta key with an initial count of 0 if desired
		update_post_meta( $post_id, 'cozy_trending_post_views', '0' );
	}
}
// Schedule the reset function to run weekly
if ( ! wp_next_scheduled( 'reset_trending_post_views_count_event' ) ) {
	wp_schedule_event( time(), 'weekly', 'reset_trending_post_views_count_event' );
}
add_action( 'reset_trending_post_views_count_event', 'reset_trending_post_views_count' );

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

function cozy_addons_premium_access() {
	$premium_status = false;
	if ( cc_fs()->is__premium_only() ) {
		if ( cc_fs()->can_use_premium_code() ) {
			$premium_status = true;
		}
	}
	return $premium_status;
}


function cozy_pagination_function( $settings, $cozy_query, $pagenum_link ) {
	if ( $settings['enable_pagination'] == 'yes' ) {
		$url_parts   = explode( '?', $pagenum_link );
		$total_pages = $cozy_query->max_num_pages;
		if ( $total_pages > 1 ) {
			$nav_prev_text = __( 'Prev', 'cozy-addons' );
			$nav_next_text = __( 'Next', 'cozy-addons' );
			echo '<div class="cozy-addons-pagination content-block">';
			$current_page = max( get_query_var( 'paged' ), 1 );
			echo paginate_links(
				array(
					'base'      => '%_%' . trailingslashit( $url_parts[0] ),
					'current'   => $current_page,
					'total'     => $total_pages,
					'prev_text' => $nav_prev_text,
					'next_text' => $nav_next_text,
					'prev_next' => true,
				)
			);
			echo '</div>';
		}
	}
}
if ( cozy_addons_premium_access() ) {
	if ( ! function_exists( 'ct_theme_type_is_block' ) ) {
		function ct_theme_type_is_block() {
			$theme = wp_get_theme();
			if ( file_exists( get_theme_root() . '/' . $theme->get_template() . '/theme.json' ) ) {
				return true;
			} else {
				return false;
			}
		}
	}

	if ( ! function_exists( 'ct_header_footer_enable_status' ) ) {
		function ct_header_footer_enable_status() {

			$ct_header_footer_enable = false;
			$args                    = array(
				'post_type'      => 'cozy_header_footer',
				'posts_per_page' => -1,
			);
			$ct_hf_templates         = count( get_posts( $args ) );
			if ( $ct_hf_templates > 0 ) {
				$ct_header_footer_enable = true;
			}
			return $ct_header_footer_enable;
		}
	}


	if ( ! ct_theme_type_is_block() && ct_header_footer_enable_status() ) {
		// Add inline CSS to hide default header and footer if hf templates enabled
		function add_custom_inline_css() {
			echo '<style>
            header.site-header {
                display: none;
            }
            footer.site-footer {
                display: none;
            }
        </style>';
		}
		add_action( 'wp_head', 'add_custom_inline_css' );
	}
	if ( ! function_exists( 'ct_add_nav_menu_support' ) ) {
		function ct_add_nav_menu_support() {
			if ( ! current_theme_supports( 'menus' ) ) {
				add_theme_support( 'menus' );
			}
			register_nav_menus( array( 'primary' => esc_html__( 'Primary Menu', 'cozy-addons' ) ) );
		}
		add_action( 'after_setup_theme', 'ct_add_nav_menu_support' );
	}
	if ( ! function_exists( 'wp_head' ) ) {
		function custom_hook_before_head() {
			do_action( 'wp_head' );
		}
		add_action( 'wp_body_open', 'custom_hook_before_head' );
	}

	if ( ! function_exists( 'wp_footer' ) ) {
		function custom_hook_after_body() {
			do_action( 'wp_footer' );
		}

		add_action( 'wp_footer', 'custom_hook_after_body', 999999 );
	}
}

add_filter( 'woocommerce_add_to_cart_fragments', 'cozy_refresh_cart', 50, 1 );
if ( ! function_exists( 'cozy_refresh_cart' ) ) {
	function cozy_refresh_cart( $fragments ) {
		ob_start();
		$cart_total = WC()->cart->get_cart_total();

		$cart_count = WC()->cart->get_cart_contents_count();

		// Set the updated cart total as a fragment to be updated
		$fragments['.cozy-cart-subtotal'] = '<span class="cozy-cart-subtotal">' . $cart_total . '</span>';

		$fragments['.cozy-cart-items-count'] = '<span class="cozy-cart-items-count">' . $cart_count . '</span>';

		// $fragments['.cozy-minicart-wrapper'] = $cart_html;

		$fragments['div.cozy-minicart'] = ob_get_clean();

		return $fragments;
	}
}

if ( ! function_exists( 'cozy_get_minicart_item_template' ) ) {
	function cozy_get_minicart_item_template( &$cart_html ) {
		$cart_items = WC()->cart->get_cart();
		foreach ( $cart_items as $item => $values ) {
			$cart_html       .= '<div class="cozy-minicart-item">';
			$getProductDetail = wc_get_product( $values['product_id'] );
			$cart_html       .= '<div class="item-image">' . $getProductDetail->get_image() . '</div>';
			$cart_html       .= '<div class="item-details">';
			$cart_html       .= '<p class="product-title">' . $getProductDetail->get_title() . '</p>';

			$price         = get_post_meta( $values['product_id'], '_price', true );
			$regular_price = get_post_meta( $values['product_id'], '_regular_price', true );
			$sale_price    = get_post_meta( $values['product_id'], '_sale_price', true );
			if ( $sale_price ) {
				$cart_html .= "<div class='pricing'>";
				$cart_html .= "<span class='strikethrough'>" . wc_price( $regular_price ) . '</span>';
				$cart_html .= ' <span>' . wc_price( $sale_price ) . '</span><br>';
				$cart_html .= '</div>';
				$cart_html .= "<span class='save-amount'>" . __( 'SAVE', 'cozy-addons' ) . wc_price( $regular_price - $sale_price ) . '</span>';
			} else {
				$cart_html .= '<span>' . wc_price( $price ) . '</span>';
			}
			$product_content = $getProductDetail->get_description();
			$total_words     = preg_split( "/[\n\r\t ]+/", $product_content, 50, PREG_SPLIT_NO_EMPTY );
			$final_content   = implode( ' ', array_slice( $total_words, 0, 15 ) );

			$cart_html .= "<div class='product-description'>" . wp_kses_post( $final_content ) . '</div>';
			$cart_html .= '<div class="item-quantity">';
			$cart_html .= '<span class="minus" data-cart_item_key="' . $item . '">&minus;</span><span class="quantity">' . $values['quantity'] . '</span><span class="plus" data-cart_item_key="' . $item . '">&plus;</span>';
			$cart_html .= '</div>';
			$cart_html .= '<a class="cozy-cart-remove-product" data-product_id=' . $values['product_id'] . ' data-cart_item_key=' . $item . '><u>Remove Item</u></a>';
			$cart_html .= '</div>';
			$cart_html .= '<div class="total-price">' . wc_price( $price * $values['quantity'] ) . '</div>';
			$cart_html .= '</div>';
		}
	}
}

add_action( 'wp_ajax_add_to_cart', 'add_to_cart_ajax_handler' );
add_action( 'wp_ajax_nopriv_add_to_cart', 'add_to_cart_ajax_handler' );

function add_to_cart_ajax_handler() {
	$product_id = isset( $_POST['product_id'] ) ? intval( $_POST['product_id'] ) : 0;

	if ( $product_id <= 0 ) {
		wp_send_json_error( 'Invalid product ID.' );
	}
	$initial_cart_count = WC()->cart->get_cart_contents_count();
	WC()->cart->add_to_cart( $product_id );

	$cart_html = '';

	cozy_get_minicart_item_template( $cart_html );

	// Send back the updated fragments in the AJAX response
	wp_send_json_success(
		array(
			'cart_html'          => $cart_html,
			'initial_cart_count' => $initial_cart_count,
		)
	);
}


add_action( 'wp_ajax_remove_cart_item', 'remove_cart_item' );
add_action( 'wp_ajax_nopriv_remove_cart_item', 'remove_cart_item' );
if ( ! function_exists( 'remove_cart_item' ) ) {
	function remove_cart_item() {
		if ( isset( $_POST['cart_item_key'] ) ) {
			$cart_item_key = sanitize_text_field( $_POST['cart_item_key'] );

			WC()->cart->remove_cart_item( $cart_item_key );

			$cart_html = '';

			cozy_get_minicart_item_template( $cart_html );

			$cart_subtotal = WC()->cart->get_subtotal();

			$cart_count = WC()->cart->get_cart_contents_count();

			$empty_cart_html = '';
			if ( 0 == $cart_count ) {
				$shop_page_url    = get_permalink( wc_get_page_id( 'shop' ) );
				$empty_cart_html .= '<div class="empty-cart show-empty-cart">';
				$empty_cart_html .= $_POST['empty_cart_text'] ?? '';
				$empty_cart_html .= '<div class="cta-links">';
				$empty_cart_html .= '<a href="' . esc_url( $shop_page_url ) . '"><div class="shop-cta">Shop Now</div></a>';
				$empty_cart_html .= '</div>';
				$empty_cart_html .= '</div>';
			}

			wp_send_json_success(
				array(
					'cart_html'       => $cart_html,
					'cart_subtotal'   => wc_price( $cart_subtotal ),
					'cart_count'      => $cart_count,
					'empty_cart_html' => $empty_cart_html,
				)
			);
		} else {
			wp_send_json_error( 'Invalid request.' );
		}
		wp_die();
	}
}

add_action( 'wp_ajax_update_cart_item_quantity', 'update_cart_item_quantity_ajax_handler' );
add_action( 'wp_ajax_nopriv_update_cart_item_quantity', 'update_cart_item_quantity_ajax_handler' );

function update_cart_item_quantity_ajax_handler() {
	$productKey = isset( $_POST['product_key'] ) ? sanitize_text_field( $_POST['product_key'] ) : '';
	$quantity   = isset( $_POST['quantity'] ) ? intval( $_POST['quantity'] ) : 0;

	if ( empty( $productKey ) || $quantity <= 0 ) {
		wp_send_json_error( 'Invalid product key or quantity.' );
	}

	$product_price = '';
	foreach ( WC()->cart->get_cart() as $cartItemKey => $cartItem ) {
		if ( $cartItem['key'] === $productKey ) {
			WC()->cart->set_quantity( $cartItemKey, $quantity );
			$price         = get_post_meta( $cartItem['product_id'], '_price', true );
			$product_price = $price * $quantity;
			break;
		}
	}

	$cart_count = WC()->cart->get_cart_contents_count();

	$cart_subtotal = WC()->cart->get_subtotal();

	wp_send_json_success(
		array(
			'cart_item_key' => $productKey,
			'item_quantity' => $quantity,
			'product_price' => wc_price( floatval( $product_price ) ),
			'cart_count'    => $cart_count,
			'cart_subtotal' => wc_price( $cart_subtotal ),
		)
	);
}

add_action( 'wp_ajax_get_cozy_block_option', 'get_cozy_blocks_option_callback' );
function get_cozy_blocks_option_callback() {
	$option_name = '';
	if ( isset( $_POST['block_name'] ) ) {
		$option_name = 'cozy-block--' . $_POST['block_name'];
	}
	$block_option = get_option( $option_name );
	echo esc_html( $block_option );
	wp_die();
}

function get_active_cozy_blocks_collection() {
	$active_cozy_blocks_dir = glob( COZY_ADDONS_PLUGIN_DIR . 'cozy-blocks/dist/*' );
	$active_cozy_blocks     = array();

	foreach ( $active_cozy_blocks_dir as $cozy_blocks ) {
		$path_parts = explode( '/', $cozy_blocks );
		$block_name = $path_parts[ count( $path_parts ) - 1 ];

		$active_cozy_blocks[] = $block_name;
	}

	return $active_cozy_blocks;
}

add_action( 'wp_ajax_update_cozy_block_option', 'update_cozy_blocks_option_callback' );
function update_cozy_blocks_option_callback() {
	$allowed_blocks = get_active_cozy_blocks_collection();

	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Access Denied' );
		return;
	}
	$block_name = sanitize_text_field( $_POST['block_name'] );
	if ( ! in_array( $block_name, $allowed_blocks ) ) {
		wp_die( 'Invalid option' );
	}

	$option_name = 'cozy-block--' . $block_name;
	$checked     = sanitize_text_field( $_POST['checked'] );
	update_option( $option_name, $checked );
	wp_die();
}

add_action( 'wp_ajax_get_ca_cpt_enable_status', 'get_ca_cpt_enable_status_callback' );
function get_ca_cpt_enable_status_callback() {
	$option_name   = '';
	$template_name = sanitize_text_field( $_POST['templateName'] );
	if ( isset( $template_name ) ) {
		$option_name = 'ca-cpt--' . $template_name;
	}
	$enabled_status = get_option( $option_name );
	// echo esc_html( $block_option );
	wp_send_json_success(
		array(
			'enabledStatus' => $enabled_status,
		)
	);
	wp_die();
}

add_action( 'wp_ajax_toggle_ca_cpt_enable', 'toggle_ca_cpt_enable_callback' );
if ( ! function_exists( 'toggle_ca_cpt_enable_callback' ) ) {
	function toggle_ca_cpt_enable_callback() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( 'Access Denied' );
			return;
		}

		$allowed_options = array(
			'mega-menu-templates',
			'portfolio-gallery-templates',
		);

		$request_option = sanitize_text_field( $_POST['templateName'] );

		if ( ! in_array( $request_option, $allowed_options ) ) {
			wp_die( 'Invalid Option' );
		}

		$option_name = 'ca-cpt--' . $request_option;
		$checked     = sanitize_text_field( $_POST['checked'] );
		update_option( $option_name, $checked );
		wp_die();
	}
}


add_action( 'wp_ajax_get_cozy_addons_elementor_widgets_enabled', 'get_elementor_widgets_enabled_callback' );
function get_elementor_widgets_enabled_callback() {
	$option_name = 'cozy_addons_elementor_widgets_enabled';
	$value       = get_option( $option_name );
	echo esc_html( $value );
	wp_die();
}

add_action( 'wp_ajax_update_cozy_addons_elementor_widgets_enabled', 'update_cozy_addons_elementor_widgets_enabled_callback' );
function update_cozy_addons_elementor_widgets_enabled_callback() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Access Denied' );
		return;
	}

	$option_name = 'cozy_addons_elementor_widgets_enabled';
	$checked     = sanitize_text_field( $_POST['checked'] );
	update_option( $option_name, $checked );
	wp_die();
}

add_action( 'wp_ajax_get_ct_header_footer_enabled', 'get_ct_header_footer_enabled_callback' );
function get_ct_header_footer_enabled_callback() {
	$option_name = 'ct_header_footer_enabled';
	$value       = get_option( $option_name, '0' );
	echo esc_html( $value );
	wp_die();
}

add_action( 'wp_ajax_update_ct_header_footer_enabled', 'update_ct_header_footer_enabled_callback' );
function update_ct_header_footer_enabled_callback() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Access Denied' );
		return;
	}

	$option_name = 'ct_header_footer_enabled';
	$checked     = sanitize_text_field( $_POST['checked'] );
	update_option( $option_name, $checked );
	wp_die();
}

add_action( 'wp_ajax_get_ct_custom_assets_enabled', 'get_ct_custom_assets_enabled_callback' );
function get_ct_custom_assets_enabled_callback() {
	$option_name = 'ct_custom_assets_enabled';
	$value       = get_option( $option_name, '0' );
	echo esc_html( $value );
	wp_die();
}

add_action( 'wp_ajax_update_ct_custom_assets_enabled', 'update_ct_custom_assets_enabled_callback' );
function update_ct_custom_assets_enabled_callback() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Access Denied' );
		return;
	}

	$option_name = 'ct_custom_assets_enabled';
	$checked     = sanitize_text_field( $_POST['checked'] );
	update_option( $option_name, $checked );
	wp_die();
}

add_action( 'wp_ajax_get_ct_custom_fonts_enabled', 'get_ct_custom_fonts_enabled_callback' );
function get_ct_custom_fonts_enabled_callback() {
	$option_name = 'ct_custom_fonts_enabled';
	$value       = get_option( $option_name, '0' );
	echo esc_html( $value );
	wp_die();
}

add_action( 'wp_ajax_update_ct_custom_fonts_enabled', 'update_ct_custom_fonts_enabled_callback' );
function update_ct_custom_fonts_enabled_callback() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Access Denied' );
		return;
	}

	$option_name = 'ct_custom_fonts_enabled';
	$checked     = sanitize_text_field( $_POST['checked'] );
	update_option( $option_name, $checked );
	wp_die();
}

function cozy_upsell_dismissble_notice() {
	update_option( 'cozy_dashboard_dismissed_notice', 1 );
}
add_action( 'wp_ajax_cozy_upsell_dismissble_notice', 'cozy_upsell_dismissble_notice' );

function is_elementor_active() {
	return is_plugin_active( 'elementor/elementor.php' );
}

function is_woocommerce_active() {
	return is_plugin_active( 'woocommerce/woocommerce.php' );
}

function cozy_addons_is_block_theme() {
	$active_theme = wp_get_theme();

	return $active_theme->is_block_theme();
}

function cozy_blocks_dismissble_notice() {
	update_option( 'cozy_addons_block_theme', 1 );
}
add_action( 'wp_ajax_cozy_blocks_dismissble_notice', 'cozy_blocks_dismissble_notice' );

function ca_elementor_removal_dismissable_notice() {
	update_option( 'ca_clear_elementor_removal_notice', 1 );
}
add_action( 'wp_ajax_ca_elementor_removal_dismissable_notice', 'ca_elementor_removal_dismissable_notice' );

add_action( 'wp_ajax_cozy_block_magazine_grid_loader', 'cozy_block_magazine_grid_load_content' );
add_action( 'wp_ajax_nopriv_cozy_block_magazine_grid_loader', 'cozy_block_magazine_grid_load_content' );
if ( ! function_exists( 'cozy_block_magazine_grid_load_content' ) ) {
	function cozy_block_magazine_grid_load_content() {
		check_ajax_referer( 'cozy_block_magazine_grid_load_more', 'nonce', true );
		$attributes = $_POST['attributes'];

		if ( empty( $attributes ) ) {
			return;
		}

		/* Create Excerpt */
		if ( ! function_exists( 'cozy_block_magazine_grid_create_post_excerpt' ) ) {
			function cozy_block_magazine_grid_create_post_excerpt( $content, $length = 40 ) {
				// Strip HTML tags and shortcodes
				$content = wp_strip_all_tags( strip_shortcodes( $content ) );

				// Split the content into words
				$words = explode( ' ', $content );

				// Truncate to the specified length
				if ( count( $words ) > $length ) {
					$words   = array_slice( $words, 0, $length );
					$content = implode( ' ', $words ) . '...';
				} else {
					$content = implode( ' ', $words );
				}

				return esc_html_x( $content, 'cozy-addons' );
			}
		}

		/* Fetch Posts */
		if ( ! function_exists( 'get_cozy_block_magazine_grid_posts' ) ) {
			function get_cozy_block_magazine_grid_posts( $cozy_block_magazine_grid_args = array() ) {
				if ( ! empty( $cozy_block_magazine_grid_args ) ) {
					$latest_posts         = new \WP_Query( $cozy_block_magazine_grid_args );
					$additional_post_data = array();
					foreach ( $latest_posts->posts as $post ) {
						$post_id        = $post->ID;
						$post_image_url = get_the_post_thumbnail_url( $post_id );
						$post_link      = get_permalink( $post_id );

						$post_data                   = (array) $post; // Convert WP_Post object to an array.
						$post_data['post_image_url'] = $post_image_url;

						// Get categories and their links.
						$categories      = get_the_category( $post_id );
						$post_categories = array();
						foreach ( $categories as $category ) {
							$post_categories[] = array(
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
						$post_data['post_author_url']     = get_author_posts_url( $post->post_author ) ?? '';
						$post_data['post_link']           = $post_link;
						$post_data['post_date_formatted'] = get_the_date( '', $post_id );
						$post_data['comment_link']        = get_comments_link( $post_id );
						$additional_post_data[]           = $post_data;
					}

					wp_reset_postdata();

					return $additional_post_data;
				}

				return array();
			}
		}
		/* Posts Render */
		if ( ! function_exists( 'render_cozy_block_magazine_grid_posts_load_more_data' ) ) {
			function render_cozy_block_magazine_grid_posts_load_more_data( $attributes, $post_data, &$output ) {
				$classes   = array();
				$classes[] = 'cozy-block-magazine-grid__post-item';
				$classes[] = filter_var( $attributes['postBoxStyles']['hoverEffect'], FILTER_VALIDATE_BOOLEAN ) ? 'has-hover-effect' : '';
				$classes[] = filter_var( $attributes['postBoxStyles']['shadow']['enabled'], FILTER_VALIDATE_BOOLEAN ) ? 'has-box-shadow' : '';
				$classes[] = filter_var( $attributes['postBoxStyles']['shadowHover']['enabled'], FILTER_VALIDATE_BOOLEAN ) ? 'has-hover-box-shadow' : '';
				$classes[] = filter_var( $attributes['postOptions']['imageOverlay'], FILTER_VALIDATE_BOOLEAN ) ? 'has-image-overlay' : '';
				$output   .= '<li class="' . implode( ' ', $classes ) . '">';

				if ( filter_var( $attributes['enableOptions']['postImage'], FILTER_VALIDATE_BOOLEAN ) && ! empty( $post_data['post_image_url'] ) ) {
					$classes       = array();
					$classes[]     = 'post__image';
					$classes[]     = filter_var( $attributes['postOptions']['image']['hoverEffect'], FILTER_VALIDATE_BOOLEAN ) ? 'has-hover-effect' : '';
					$has_post_link = isset( $attributes['enableOptions']['imgLinkPost'] ) && filter_var( $attributes['enableOptions']['imgLinkPost'], FILTER_VALIDATE_BOOLEAN ) ? 'href="' . esc_url( $post_data['post_link'] ) . '"' : '';
					$open_new_tab  = isset( $attributes['enableOptions']['imgLinkPost'], $attributes['enableOptions']['imgLinkNewTab'] ) && filter_var( $attributes['enableOptions']['imgLinkPost'], FILTER_VALIDATE_BOOLEAN ) && filter_var( $attributes['enableOptions']['imgLinkNewTab'], FILTER_VALIDATE_BOOLEAN ) ? '_blank' : '';

					$output .= '<figure class="' . implode( ' ', $classes ) . '"><a ' . $has_post_link . ' target="' . $open_new_tab . '" rel="noopener"><img src="' . esc_url( $post_data['post_image_url'] ) . '" /></a></figure>';
				}

				$output .= '<div class="post__content-wrapper">';

				if ( filter_var( $attributes['enableOptions']['postCategories'], FILTER_VALIDATE_BOOLEAN ) && ! empty( $post_data['post_categories'] ) ) {
					$output   .= '<div class="post__categories">';
					$classes   = array();
					$classes[] = 'post__category-item';
					$classes[] = filter_var( $attributes['postCategories']['hoverEffect'], FILTER_VALIDATE_BOOLEAN ) ? 'has-hover-effect' : '';

					$open_new_tab = isset( $attributes['enableOptions']['linkCat'], $attributes['enableOptions']['catNewTab'] ) && filter_var( $attributes['enableOptions']['linkCat'], FILTER_VALIDATE_BOOLEAN ) && filter_var( $attributes['enableOptions']['catNewTab'], FILTER_VALIDATE_BOOLEAN ) ? '_blank' : '';
					foreach ( $post_data['post_categories'] as $cat_data ) {
						$has_cat_link = isset( $attributes['enableOptions']['linkCat'] ) && filter_var( $attributes['enableOptions']['linkCat'], FILTER_VALIDATE_BOOLEAN ) ? 'href="' . esc_url( $cat_data['link'] ) . '"' : '';
						$output      .= '<a class="' . implode( ' ', $classes ) . '" ' . $has_cat_link . ' target="' . $open_new_tab . '" rel="noopener">' . esc_html_x( $cat_data['name'], 'cozy-addons' ) . '</a>';
					}
					$output .= '</div>';
				}

				$has_post_link = isset( $attributes['enableOptions']['titleLinkPost'] ) && filter_var( $attributes['enableOptions']['titleLinkPost'], FILTER_VALIDATE_BOOLEAN ) ? 'href="' . esc_url( $post_data['post_link'] ) . '"' : '';
				$open_new_tab  = isset( $attributes['enableOptions']['titleLinkPost'], $attributes['enableOptions']['titleLinkNewTab'] ) && filter_var( $attributes['enableOptions']['titleLinkPost'], FILTER_VALIDATE_BOOLEAN ) && filter_var( $attributes['enableOptions']['titleLinkNewTab'], FILTER_VALIDATE_BOOLEAN ) ? '_blank' : '';
				$output       .= '<h2 class="post__title"><a ' . $has_post_link . ' target="' . $open_new_tab . '" rel="noopener">' . esc_html_x( $post_data['post_title'], 'cozy-addons' ) . '</a></h2>';

				if ( filter_var( $attributes['enableOptions']['postAuthor'], FILTER_VALIDATE_BOOLEAN ) || filter_var( $attributes['enableOptions']['postComments'], FILTER_VALIDATE_BOOLEAN ) || filter_var( $attributes['enableOptions']['postDate'], FILTER_VALIDATE_BOOLEAN ) ) {
					$output .= '<div class="post__meta">';

					$has_meta_link = isset( $attributes['enableOptions']['linkPostMeta'] ) && filter_var( $attributes['enableOptions']['linkPostMeta'], FILTER_VALIDATE_BOOLEAN ) ? true : false;
					$open_new_tab  = isset( $attributes['enableOptions']['linkPostMeta'], $attributes['enableOptions']['postMetaNewTab'] ) && filter_var( $attributes['enableOptions']['linkPostMeta'], FILTER_VALIDATE_BOOLEAN ) && filter_var( $attributes['enableOptions']['postMetaNewTab'], FILTER_VALIDATE_BOOLEAN ) ? '_blank' : '';
					if ( filter_var( $attributes['enableOptions']['postAuthor'], FILTER_VALIDATE_BOOLEAN ) ) {
						$meta_link = $has_meta_link ? 'href="' . esc_url( $post_data['post_author_url'] ) . '"' : '';
						$output   .= '<a class="post__author display-flex" ' . $meta_link . ' target="' . $open_new_tab . '" rel="noopener">';
						$output   .= '<svg
								width="' . $attributes['postMeta']['font']['size'] . '"
								height="' . $attributes['postMeta']['font']['size'] . '"
								xmlns="http://www.w3.org/2000/svg"
								aria-hidden="true"
								viewBox="0 0 12 15"
							>
								<path d="M11.2972 14.6667H0.630493V13.3333C0.630493 12.4493 0.981683 11.6014 1.6068 10.9763C2.23193 10.3512 3.07977 10 3.96383 10H7.96383C8.84788 10 9.69573 10.3512 10.3208 10.9763C10.946 11.6014 11.2972 12.4493 11.2972 13.3333V14.6667ZM5.96383 8.66667C5.43854 8.66667 4.9184 8.5632 4.43309 8.36218C3.94779 8.16117 3.50683 7.86653 3.1354 7.49509C2.76396 7.12366 2.46933 6.6827 2.26831 6.1974C2.06729 5.7121 1.96383 5.19195 1.96383 4.66667C1.96383 4.14138 2.06729 3.62124 2.26831 3.13593C2.46933 2.65063 2.76396 2.20967 3.1354 1.83824C3.50683 1.4668 3.94779 1.17217 4.43309 0.971148C4.9184 0.770129 5.43854 0.666666 5.96383 0.666666C7.02469 0.666666 8.04211 1.08809 8.79225 1.83824C9.5424 2.58838 9.96383 3.6058 9.96383 4.66667C9.96383 5.72753 9.5424 6.74495 8.79225 7.49509C8.04211 8.24524 7.02469 8.66667 5.96383 8.66667Z" />
							</svg>';

						$output .= '<p>' . esc_html_x( $post_data['post_author_name'], 'cozy-addons' ) . '</p>';
						$output .= '</a>';
					}

					if ( filter_var( $attributes['enableOptions']['postComments'], FILTER_VALIDATE_BOOLEAN ) && intval( $post_data['comment_count'] ) > 0 ) {
						$meta_link = $has_meta_link ? 'href="' . esc_url( $post_data['comment_link'] ) . '"' : '';
						$output   .= '<a class="post__comments display-flex" ' . $meta_link . ' target="' . $open_new_tab . '" rel="noopener">';
						$output   .= '<svg
								width="' . $attributes['postMeta']['font']['size'] . '"
								height="' . $attributes['postMeta']['font']['size'] . '"
								xmlns="http://www.w3.org/2000/svg"
								aria-hidden="true"
								viewBox="0 0 25 20"
							>
								<path d="M18.0556 6.94444C18.0556 3.10764 14.0148 0 9.02778 0C4.0408 0 0 3.10764 0 6.94444C0 8.43316 0.611979 9.80469 1.64931 10.9375C1.06771 12.2483 0.108507 13.2899 0.0954861 13.3029C0 13.4028 -0.0260417 13.5503 0.0303819 13.6806C0.0868056 13.8108 0.208333 13.8889 0.347222 13.8889C1.93576 13.8889 3.25087 13.355 4.19705 12.8038C5.59462 13.4852 7.24826 13.8889 9.02778 13.8889C14.0148 13.8889 18.0556 10.7812 18.0556 6.94444ZM23.3507 16.4931C24.388 15.3646 25 13.9887 25 12.5C25 9.59635 22.678 7.10937 19.388 6.07205C19.4271 6.35851 19.4444 6.6493 19.4444 6.94444C19.4444 11.5408 14.77 15.2778 9.02778 15.2778C8.55903 15.2778 8.1033 15.2431 7.65191 15.1953C9.0191 17.691 12.2309 19.4444 15.9722 19.4444C17.7517 19.4444 19.4054 19.0451 20.8029 18.3594C21.7491 18.9106 23.0642 19.4444 24.6528 19.4444C24.7917 19.4444 24.9175 19.362 24.9696 19.2361C25.026 19.1102 25 18.9627 24.9045 18.8585C24.8915 18.8455 23.9323 17.8082 23.3507 16.4931Z" />
							</svg>';

						$output .= '<p>' . esc_html_x( $post_data['comment_count'], 'cozy-addons' ) . '</p>';
						$output .= '</a>';
					}

					if ( filter_var( $attributes['enableOptions']['postDate'], FILTER_VALIDATE_BOOLEAN ) ) {
						$meta_link = $has_meta_link ? 'href="' . esc_url( $post_data['post_link'] ) . '"' : '';
						$output   .= '<a class="post__date display-flex" ' . $meta_link . ' target="' . $open_new_tab . '" rel="noopener">';
						$output   .= '<svg
								width="' . $attributes['postMeta']['font']['size'] . '"
								height="' . $attributes['postMeta']['font']['size'] . '"
								xmlns="http://www.w3.org/2000/svg"
								viewBox="0 0 16 18"
								aria-hidden="true"
							>
								<path d="M7.66699 10.6666C7.43088 10.6666 7.23296 10.5868 7.07324 10.427C6.91352 10.2673 6.83366 10.0694 6.83366 9.83329C6.83366 9.59718 6.91352 9.39927 7.07324 9.23954C7.23296 9.07982 7.43088 8.99996 7.66699 8.99996C7.9031 8.99996 8.10102 9.07982 8.26074 9.23954C8.42046 9.39927 8.50033 9.59718 8.50033 9.83329C8.50033 10.0694 8.42046 10.2673 8.26074 10.427C8.10102 10.5868 7.9031 10.6666 7.66699 10.6666ZM4.33366 10.6666C4.09755 10.6666 3.89963 10.5868 3.73991 10.427C3.58019 10.2673 3.50033 10.0694 3.50033 9.83329C3.50033 9.59718 3.58019 9.39927 3.73991 9.23954C3.89963 9.07982 4.09755 8.99996 4.33366 8.99996C4.56977 8.99996 4.76769 9.07982 4.92741 9.23954C5.08713 9.39927 5.16699 9.59718 5.16699 9.83329C5.16699 10.0694 5.08713 10.2673 4.92741 10.427C4.76769 10.5868 4.56977 10.6666 4.33366 10.6666ZM11.0003 10.6666C10.7642 10.6666 10.5663 10.5868 10.4066 10.427C10.2469 10.2673 10.167 10.0694 10.167 9.83329C10.167 9.59718 10.2469 9.39927 10.4066 9.23954C10.5663 9.07982 10.7642 8.99996 11.0003 8.99996C11.2364 8.99996 11.4344 9.07982 11.5941 9.23954C11.7538 9.39927 11.8337 9.59718 11.8337 9.83329C11.8337 10.0694 11.7538 10.2673 11.5941 10.427C11.4344 10.5868 11.2364 10.6666 11.0003 10.6666ZM7.66699 14C7.43088 14 7.23296 13.9201 7.07324 13.7604C6.91352 13.6007 6.83366 13.4027 6.83366 13.1666C6.83366 12.9305 6.91352 12.7326 7.07324 12.5729C7.23296 12.4132 7.43088 12.3333 7.66699 12.3333C7.9031 12.3333 8.10102 12.4132 8.26074 12.5729C8.42046 12.7326 8.50033 12.9305 8.50033 13.1666C8.50033 13.4027 8.42046 13.6007 8.26074 13.7604C8.10102 13.9201 7.9031 14 7.66699 14ZM4.33366 14C4.09755 14 3.89963 13.9201 3.73991 13.7604C3.58019 13.6007 3.50033 13.4027 3.50033 13.1666C3.50033 12.9305 3.58019 12.7326 3.73991 12.5729C3.89963 12.4132 4.09755 12.3333 4.33366 12.3333C4.56977 12.3333 4.76769 12.4132 4.92741 12.5729C5.08713 12.7326 5.16699 12.9305 5.16699 13.1666C5.16699 13.4027 5.08713 13.6007 4.92741 13.7604C4.76769 13.9201 4.56977 14 4.33366 14ZM11.0003 14C10.7642 14 10.5663 13.9201 10.4066 13.7604C10.2469 13.6007 10.167 13.4027 10.167 13.1666C10.167 12.9305 10.2469 12.7326 10.4066 12.5729C10.5663 12.4132 10.7642 12.3333 11.0003 12.3333C11.2364 12.3333 11.4344 12.4132 11.5941 12.5729C11.7538 12.7326 11.8337 12.9305 11.8337 13.1666C11.8337 13.4027 11.7538 13.6007 11.5941 13.7604C11.4344 13.9201 11.2364 14 11.0003 14ZM1.83366 17.3333C1.37533 17.3333 0.982964 17.1701 0.656576 16.8437C0.330187 16.5173 0.166992 16.125 0.166992 15.6666V3.99996C0.166992 3.54163 0.330187 3.14926 0.656576 2.82288C0.982964 2.49649 1.37533 2.33329 1.83366 2.33329H2.66699V0.666626H4.33366V2.33329H11.0003V0.666626H12.667V2.33329H13.5003C13.9587 2.33329 14.351 2.49649 14.6774 2.82288C15.0038 3.14926 15.167 3.54163 15.167 3.99996V15.6666C15.167 16.125 15.0038 16.5173 14.6774 16.8437C14.351 17.1701 13.9587 17.3333 13.5003 17.3333H1.83366ZM1.83366 15.6666H13.5003V7.33329H1.83366V15.6666Z" />
							</svg>';

						$output .= '<p>' . esc_html_x( $post_data['post_date_formatted'], 'cozy-addons' ) . '</p>';
						$output .= '</a>';
					}

					$output .= '</div>';
				}
				if ( filter_var( $attributes['enableOptions']['postContent'], FILTER_VALIDATE_BOOLEAN ) ) {
					$output .= '<div class="post__content">';
					$output .= '<div>' . cozy_block_magazine_grid_create_post_excerpt( $post_data['post_content'], $attributes['enableOptions']['postExcerpt'] ) . '</div>';
					if ( filter_var( $attributes['enableOptions']['readMore'], FILTER_VALIDATE_BOOLEAN ) ) {
						$open_new_tab = isset( $attributes['enableOptions']['readMoreNewTab'] ) && filter_var( $attributes['enableOptions']['readMoreNewTab'], FILTER_VALIDATE_BOOLEAN ) ? '_blank' : '';
						$output      .= '<span class="post__read-more"><a class="post__read-more-link" href="' . esc_url( $post_data['post_link'] ) . '" target="' . $open_new_tab . '" rel="noopener">' . esc_html_x( 'Read More', 'cozy-addons' ) . '</a></span>';
					}
					$output .= '</div>';
				}

				$output .= '</div>';

				$output .= '</li>';
			}
		}

		$selected_category             = 'category' === $attributes['sortBy'] && isset( $attributes['selectedCategory'] ) ? array( $attributes['selectedCategory'] ) : array();
		$cozy_block_magazine_grid_args = array(
			'post_type'           => 'post',
			'orderby'             => 'date',
			'order'               => 'DESC',
			'posts_per_page'      => $attributes['perPage'],
			'ignore_sticky_posts' => $attributes['enableOptions']['ignoreSticky'],
			'category__in'        => $selected_category,
		);

		$additional_post_data = get_cozy_block_magazine_grid_posts( $cozy_block_magazine_grid_args );

		$cozy_block_magazine_grid_args['posts_per_page'] = -1;
		$all_posts                                       = get_cozy_block_magazine_grid_posts( $cozy_block_magazine_grid_args );

		$remaining_posts = array_udiff(
			$all_posts,
			$additional_post_data,
			function ( $a, $b ) {
				return $a['ID'] - $b['ID'];
			}
		);

		// Assuming you have pagination or offset to get remaining posts in chunks.
		$offset                = isset( $_POST['offset'] ) ? intval( $_POST['offset'] ) : 0;
		$posts_per_page        = isset( $attributes['ajaxLoader']['content'] ) ? intval( $attributes['ajaxLoader']['content'] ) : 10;
		$remaining_posts_chunk = array_slice( $remaining_posts, $offset, $posts_per_page );
		$next_chunk            = array_slice( $remaining_posts, $offset + $posts_per_page, $posts_per_page );

		if ( empty( $remaining_posts_chunk ) ) {
			wp_send_json_error( '' );
		}

		if ( ! empty( $remaining_posts_chunk ) ) {
			// Output the posts.
			$output = '';
			foreach ( $remaining_posts_chunk as $post_data ) {
				// Customize the HTML structure as per your requirement .
				render_cozy_block_magazine_grid_posts_load_more_data( $attributes, $post_data, $output );
			}
			$return_data = array(
				'render'           => $output,
				'next_chunk_count' => count( $next_chunk ),
			);
			wp_send_json_success( $return_data );
		}
	}
}

add_action( 'wp_ajax_cozy_block_magazine_list_loader', 'cozy_block_magazine_list_load_content' );
add_action( 'wp_ajax_nopriv_cozy_block_magazine_list_loader', 'cozy_block_magazine_list_load_content' );
if ( ! function_exists( 'cozy_block_magazine_list_load_content' ) ) {
	function cozy_block_magazine_list_load_content() {
		check_ajax_referer( 'cozy_block_magazine_list_load_more', 'nonce', true );
		$attributes = $_POST['attributes'];

		if ( empty( $attributes ) ) {
			return;
		}

		/* Create Excerpt */
		if ( ! function_exists( 'cozy_block_magazine_list_create_post_excerpt' ) ) {
			function cozy_block_magazine_list_create_post_excerpt( $content, $length = 40 ) {
				// Strip HTML tags and shortcodes
				$content = wp_strip_all_tags( strip_shortcodes( $content ) );

				// Split the content into words
				$words = explode( ' ', $content );

				// Truncate to the specified length
				if ( count( $words ) > $length ) {
					$words   = array_slice( $words, 0, $length );
					$content = implode( ' ', $words ) . '...';
				} else {
					$content = implode( ' ', $words );
				}

				return esc_html_x( $content, 'cozy-addons' );
			}
		}

		/* Fetch Posts */
		if ( ! function_exists( 'get_cozy_block_magazine_list_posts' ) ) {
			function get_cozy_block_magazine_list_posts( $cozy_block_magazine_grid_args = array() ) {
				if ( ! empty( $cozy_block_magazine_grid_args ) ) {
					$latest_posts         = new \WP_Query( $cozy_block_magazine_grid_args );
					$additional_post_data = array();
					foreach ( $latest_posts->posts as $post ) {
						$post_id        = $post->ID;
						$post_image_url = get_the_post_thumbnail_url( intval( $post_id ) );
						$post_link      = get_permalink( $post_id );

						$post_data                   = (array) $post; // Convert WP_Post object to an array.
						$post_data['post_image_url'] = $post_image_url;

						// Get categories and their links.
						$categories      = get_the_category( $post_id );
						$post_categories = array();
						foreach ( $categories as $category ) {
							$post_categories[] = array(
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
						$post_data['post_author_url']     = get_author_posts_url( $post->post_author ) ?? '';
						$post_data['post_link']           = $post_link;
						$post_data['post_date_formatted'] = get_the_date( '', $post_id );
						$post_data['comment_link']        = get_comments_link( $post_id );
						$additional_post_data[]           = $post_data;
					}

					wp_reset_postdata();

					return $additional_post_data;
				}

				return array();
			}
		}
		/* Posts Render */
		if ( ! function_exists( 'render_cozy_block_magazine_list_posts_load_more_data' ) ) {
			function render_cozy_block_magazine_list_posts_load_more_data( $attributes, $post_data, &$output ) {
				$classes   = array();
				$classes[] = 'cozy-block-magazine-list__post-item';
				$classes[] = filter_var( $attributes['postBoxStyles']['hoverEffect'], FILTER_VALIDATE_BOOLEAN ) ? 'has-hover-effect' : '';
				$classes[] = filter_var( $attributes['postBoxStyles']['shadow']['enabled'], FILTER_VALIDATE_BOOLEAN ) ? 'has-box-shadow' : '';
				$classes[] = filter_var( $attributes['postBoxStyles']['shadowHover']['enabled'], FILTER_VALIDATE_BOOLEAN ) ? 'has-hover-box-shadow' : '';
				$output   .= '<li class="' . implode( ' ', $classes ) . '">';

				if ( filter_var( $attributes['enableOptions']['postImage'], FILTER_VALIDATE_BOOLEAN ) && ! empty( $post_data['post_image_url'] ) && 'left' === $attributes['postOptions']['image']['position'] ) {
					$classes   = array();
					$classes[] = 'post__image';
					$classes[] = filter_var( $attributes['postOptions']['image']['hoverEffect'], FILTER_VALIDATE_BOOLEAN ) ? 'has-hover-effect' : '';

					$has_post_link = isset( $attributes['enableOptions']['imgLinkPost'] ) && filter_var( $attributes['enableOptions']['imgLinkPost'], FILTER_VALIDATE_BOOLEAN ) ? 'href="' . esc_url( $post_data['post_link'] ) . '"' : '';
					$open_new_tab  = isset( $attributes['enableOptions']['imgLinkPost'], $attributes['enableOptions']['imgLinkNewTab'] ) && filter_var( $attributes['enableOptions']['imgLinkPost'], FILTER_VALIDATE_BOOLEAN ) && filter_var( $attributes['enableOptions']['imgLinkNewTab'], FILTER_VALIDATE_BOOLEAN ) ? '_blank' : '';
					$output       .= '<figure class="' . implode( ' ', $classes ) . '"><a ' . $has_post_link . ' target="' . $open_new_tab . '" rel="noopener"><img src="' . esc_url( $post_data['post_image_url'] ) . '" /></a></figure>';
				}

				$output .= '<div class="post__content-wrapper">';

				if ( filter_var( $attributes['enableOptions']['postCategories'], FILTER_VALIDATE_BOOLEAN ) && ! empty( $post_data['post_categories'] ) ) {
					$output      .= '<div class="post__categories">';
					$classes      = array();
					$classes[]    = 'post__category-item';
					$classes[]    = filter_var( $attributes['postCategories']['hoverEffect'], FILTER_VALIDATE_BOOLEAN ) ? 'has-hover-effect' : '';
					$open_new_tab = isset( $attributes['enableOptions']['linkCat'], $attributes['enableOptions']['catNewTab'] ) && filter_var( $attributes['enableOptions']['linkCat'], FILTER_VALIDATE_BOOLEAN ) && filter_var( $attributes['enableOptions']['catNewTab'], FILTER_VALIDATE_BOOLEAN ) ? '_blank' : '';
					foreach ( $post_data['post_categories'] as $cat_data ) {
						$has_cat_link = isset( $attributes['enableOptions']['linkCat'] ) && filter_var( $attributes['enableOptions']['linkCat'], FILTER_VALIDATE_BOOLEAN ) ? 'href="' . esc_url( $cat_data['link'] ) . '"' : '';
						$output      .= '<a class="' . implode( ' ', $classes ) . '" ' . $has_cat_link . ' target="' . $open_new_tab . '" rel="noopener">' . esc_html_x( $cat_data['name'], 'cozy-addons' ) . '</a>';
					}
					$output .= '</div>';
				}

				$has_post_link = isset( $attributes['enableOptions']['titleLinkPost'] ) && $attributes['enableOptions']['titleLinkPost'] ? 'href="' . esc_url( $post_data['post_link'] ) . '"' : '';
				$open_new_tab  = isset( $attributes['enableOptions']['titleLinkPost'], $attributes['enableOptions']['titleLinkNewTab'] ) && $attributes['enableOptions']['titleLinkPost'] && $attributes['enableOptions']['titleLinkNewTab'] ? '_blank' : '';
				$output       .= '<h2 class="post__title"><a ' . $has_post_link . ' target="' . $open_new_tab . '" rel="noopener">' . esc_html_x( $post_data['post_title'], 'cozy-addons' ) . '</a></h2>';

				if ( filter_var( $attributes['enableOptions']['postAuthor'], FILTER_VALIDATE_BOOLEAN ) || filter_var( $attributes['enableOptions']['postComments'], FILTER_VALIDATE_BOOLEAN ) || filter_var( $attributes['enableOptions']['postDate'], FILTER_VALIDATE_BOOLEAN ) ) {
					$has_meta_link = isset( $attributes['enableOptions']['linkPostMeta'] ) && filter_var( $attributes['enableOptions']['linkPostMeta'], FILTER_VALIDATE_BOOLEAN ) ? true : false;
					$open_new_tab  = isset( $attributes['enableOptions']['linkPostMeta'], $attributes['enableOptions']['postMetaNewTab'] ) && filter_var( $attributes['enableOptions']['linkPostMeta'], FILTER_VALIDATE_BOOLEAN ) && filter_var( $attributes['enableOptions']['postMetaNewTab'], FILTER_VALIDATE_BOOLEAN ) ? '_blank' : '';
					$output       .= '<div class="post__meta">';

					if ( filter_var( $attributes['enableOptions']['postAuthor'], FILTER_VALIDATE_BOOLEAN ) ) {
						$meta_link = $has_meta_link ? 'href="' . esc_url( $post_data['post_author_url'] ) . '"' : '';
						$output   .= '<a class="post__author display-flex" ' . $meta_link . ' target="' . $open_new_tab . '" rel="noopener">';
						$output   .= '<svg
								width="' . $attributes['postMeta']['font']['size'] . '"
								height="' . $attributes['postMeta']['font']['size'] . '"
								xmlns="http://www.w3.org/2000/svg"
								aria-hidden="true"
								viewBox="0 0 12 15"
							>
								<path d="M11.2972 14.6667H0.630493V13.3333C0.630493 12.4493 0.981683 11.6014 1.6068 10.9763C2.23193 10.3512 3.07977 10 3.96383 10H7.96383C8.84788 10 9.69573 10.3512 10.3208 10.9763C10.946 11.6014 11.2972 12.4493 11.2972 13.3333V14.6667ZM5.96383 8.66667C5.43854 8.66667 4.9184 8.5632 4.43309 8.36218C3.94779 8.16117 3.50683 7.86653 3.1354 7.49509C2.76396 7.12366 2.46933 6.6827 2.26831 6.1974C2.06729 5.7121 1.96383 5.19195 1.96383 4.66667C1.96383 4.14138 2.06729 3.62124 2.26831 3.13593C2.46933 2.65063 2.76396 2.20967 3.1354 1.83824C3.50683 1.4668 3.94779 1.17217 4.43309 0.971148C4.9184 0.770129 5.43854 0.666666 5.96383 0.666666C7.02469 0.666666 8.04211 1.08809 8.79225 1.83824C9.5424 2.58838 9.96383 3.6058 9.96383 4.66667C9.96383 5.72753 9.5424 6.74495 8.79225 7.49509C8.04211 8.24524 7.02469 8.66667 5.96383 8.66667Z" />
							</svg>';

						$output .= '<p>' . esc_html_x( $post_data['post_author_name'], 'cozy-addons' ) . '</p>';
						$output .= '</a>';
					}

					if ( filter_var( $attributes['enableOptions']['postComments'], FILTER_VALIDATE_BOOLEAN ) && intval( $post_data['comment_count'] ) > 0 ) {
						$meta_link = $has_meta_link ? 'href="' . esc_url( $post_data['comment_link'] ) . '"' : '';
						$output   .= '<a class="post__comments display-flex" ' . $meta_link . ' target="' . $open_new_tab . '" rel="noopener">';
						$output   .= '<svg
								width="' . $attributes['postMeta']['font']['size'] . '"
								height="' . $attributes['postMeta']['font']['size'] . '"
								xmlns="http://www.w3.org/2000/svg"
								aria-hidden="true"
								viewBox="0 0 25 20"
							>
								<path d="M18.0556 6.94444C18.0556 3.10764 14.0148 0 9.02778 0C4.0408 0 0 3.10764 0 6.94444C0 8.43316 0.611979 9.80469 1.64931 10.9375C1.06771 12.2483 0.108507 13.2899 0.0954861 13.3029C0 13.4028 -0.0260417 13.5503 0.0303819 13.6806C0.0868056 13.8108 0.208333 13.8889 0.347222 13.8889C1.93576 13.8889 3.25087 13.355 4.19705 12.8038C5.59462 13.4852 7.24826 13.8889 9.02778 13.8889C14.0148 13.8889 18.0556 10.7812 18.0556 6.94444ZM23.3507 16.4931C24.388 15.3646 25 13.9887 25 12.5C25 9.59635 22.678 7.10937 19.388 6.07205C19.4271 6.35851 19.4444 6.6493 19.4444 6.94444C19.4444 11.5408 14.77 15.2778 9.02778 15.2778C8.55903 15.2778 8.1033 15.2431 7.65191 15.1953C9.0191 17.691 12.2309 19.4444 15.9722 19.4444C17.7517 19.4444 19.4054 19.0451 20.8029 18.3594C21.7491 18.9106 23.0642 19.4444 24.6528 19.4444C24.7917 19.4444 24.9175 19.362 24.9696 19.2361C25.026 19.1102 25 18.9627 24.9045 18.8585C24.8915 18.8455 23.9323 17.8082 23.3507 16.4931Z" />
							</svg>';

						$output .= '<p>' . esc_html_x( $post_data['comment_count'], 'cozy-addons' ) . '</p>';
						$output .= '</a>';
					}

					if ( filter_var( $attributes['enableOptions']['postDate'], FILTER_VALIDATE_BOOLEAN ) ) {
						$meta_link = $has_meta_link ? 'href="' . esc_url( $post_data['post_link'] ) . '"' : '';
						$output   .= '<a class="post__date display-flex" ' . $meta_link . ' target="' . $open_new_tab . '" rel="noopener">';
						$output   .= '<svg
								width="' . $attributes['postMeta']['font']['size'] . '"
								height="' . $attributes['postMeta']['font']['size'] . '"
								xmlns="http://www.w3.org/2000/svg"
								viewBox="0 0 16 18"
								aria-hidden="true"
							>
								<path d="M7.66699 10.6666C7.43088 10.6666 7.23296 10.5868 7.07324 10.427C6.91352 10.2673 6.83366 10.0694 6.83366 9.83329C6.83366 9.59718 6.91352 9.39927 7.07324 9.23954C7.23296 9.07982 7.43088 8.99996 7.66699 8.99996C7.9031 8.99996 8.10102 9.07982 8.26074 9.23954C8.42046 9.39927 8.50033 9.59718 8.50033 9.83329C8.50033 10.0694 8.42046 10.2673 8.26074 10.427C8.10102 10.5868 7.9031 10.6666 7.66699 10.6666ZM4.33366 10.6666C4.09755 10.6666 3.89963 10.5868 3.73991 10.427C3.58019 10.2673 3.50033 10.0694 3.50033 9.83329C3.50033 9.59718 3.58019 9.39927 3.73991 9.23954C3.89963 9.07982 4.09755 8.99996 4.33366 8.99996C4.56977 8.99996 4.76769 9.07982 4.92741 9.23954C5.08713 9.39927 5.16699 9.59718 5.16699 9.83329C5.16699 10.0694 5.08713 10.2673 4.92741 10.427C4.76769 10.5868 4.56977 10.6666 4.33366 10.6666ZM11.0003 10.6666C10.7642 10.6666 10.5663 10.5868 10.4066 10.427C10.2469 10.2673 10.167 10.0694 10.167 9.83329C10.167 9.59718 10.2469 9.39927 10.4066 9.23954C10.5663 9.07982 10.7642 8.99996 11.0003 8.99996C11.2364 8.99996 11.4344 9.07982 11.5941 9.23954C11.7538 9.39927 11.8337 9.59718 11.8337 9.83329C11.8337 10.0694 11.7538 10.2673 11.5941 10.427C11.4344 10.5868 11.2364 10.6666 11.0003 10.6666ZM7.66699 14C7.43088 14 7.23296 13.9201 7.07324 13.7604C6.91352 13.6007 6.83366 13.4027 6.83366 13.1666C6.83366 12.9305 6.91352 12.7326 7.07324 12.5729C7.23296 12.4132 7.43088 12.3333 7.66699 12.3333C7.9031 12.3333 8.10102 12.4132 8.26074 12.5729C8.42046 12.7326 8.50033 12.9305 8.50033 13.1666C8.50033 13.4027 8.42046 13.6007 8.26074 13.7604C8.10102 13.9201 7.9031 14 7.66699 14ZM4.33366 14C4.09755 14 3.89963 13.9201 3.73991 13.7604C3.58019 13.6007 3.50033 13.4027 3.50033 13.1666C3.50033 12.9305 3.58019 12.7326 3.73991 12.5729C3.89963 12.4132 4.09755 12.3333 4.33366 12.3333C4.56977 12.3333 4.76769 12.4132 4.92741 12.5729C5.08713 12.7326 5.16699 12.9305 5.16699 13.1666C5.16699 13.4027 5.08713 13.6007 4.92741 13.7604C4.76769 13.9201 4.56977 14 4.33366 14ZM11.0003 14C10.7642 14 10.5663 13.9201 10.4066 13.7604C10.2469 13.6007 10.167 13.4027 10.167 13.1666C10.167 12.9305 10.2469 12.7326 10.4066 12.5729C10.5663 12.4132 10.7642 12.3333 11.0003 12.3333C11.2364 12.3333 11.4344 12.4132 11.5941 12.5729C11.7538 12.7326 11.8337 12.9305 11.8337 13.1666C11.8337 13.4027 11.7538 13.6007 11.5941 13.7604C11.4344 13.9201 11.2364 14 11.0003 14ZM1.83366 17.3333C1.37533 17.3333 0.982964 17.1701 0.656576 16.8437C0.330187 16.5173 0.166992 16.125 0.166992 15.6666V3.99996C0.166992 3.54163 0.330187 3.14926 0.656576 2.82288C0.982964 2.49649 1.37533 2.33329 1.83366 2.33329H2.66699V0.666626H4.33366V2.33329H11.0003V0.666626H12.667V2.33329H13.5003C13.9587 2.33329 14.351 2.49649 14.6774 2.82288C15.0038 3.14926 15.167 3.54163 15.167 3.99996V15.6666C15.167 16.125 15.0038 16.5173 14.6774 16.8437C14.351 17.1701 13.9587 17.3333 13.5003 17.3333H1.83366ZM1.83366 15.6666H13.5003V7.33329H1.83366V15.6666Z" />
							</svg>';

						$output .= '<p>' . esc_html_x( $post_data['post_date_formatted'], 'cozy-addons' ) . '</p>';
						$output .= '</a>';
					}

					$output .= '</div>';
				}
				if ( filter_var( $attributes['enableOptions']['postContent'], FILTER_VALIDATE_BOOLEAN ) ) {
					$output .= '<div class="post__content">';
					$output .= '<div>' . cozy_block_magazine_list_create_post_excerpt( $post_data['post_content'], $attributes['enableOptions']['postExcerpt'] ) . '</div>';
					if ( filter_var( $attributes['enableOptions']['readMore'], FILTER_VALIDATE_BOOLEAN ) ) {
						$open_new_tab = isset( $attributes['enableOptions']['readMoreNewTab'] ) && filter_var( $attributes['enableOptions']['readMoreNewTab'], FILTER_VALIDATE_BOOLEAN ) ? '_blank' : '';
						$output      .= '<span class="post__read-more"><a class="post__read-more-link" href="' . esc_url( $post_data['post_link'] ) . '" target="' . $open_new_tab . '" rel="noopener">' . esc_html_x( 'Read More', 'cozy-addons' ) . '</a></span>';
					}
					$output .= '</div>';
				}

				$output .= '</div>';

				if ( filter_var( $attributes['enableOptions']['postImage'], FILTER_VALIDATE_BOOLEAN ) && ! empty( $post_data['post_image_url'] ) && 'right' === $attributes['postOptions']['image']['position'] ) {
					$classes   = array();
					$classes[] = 'post__image';
					$classes[] = filter_var( $attributes['postOptions']['image']['hoverEffect'], FILTER_VALIDATE_BOOLEAN ) ? 'has-hover-effect' : '';

					$has_post_link = isset( $attributes['enableOptions']['imgLinkPost'] ) && filter_var( $attributes['enableOptions']['imgLinkPost'], FILTER_VALIDATE_BOOLEAN ) ? 'href="' . esc_url( $post_data['post_link'] ) . '"' : '';
					$open_new_tab  = isset( $attributes['enableOptions']['imgLinkPost'], $attributes['enableOptions']['imgLinkNewTab'] ) && filter_var( $attributes['enableOptions']['imgLinkPost'], FILTER_VALIDATE_BOOLEAN ) && filter_var( $attributes['enableOptions']['imgLinkNewTab'], FILTER_VALIDATE_BOOLEAN ) ? '_blank' : '';
					$output       .= '<figure class="' . implode( ' ', $classes ) . '"><a ' . $has_post_link . ' target="' . $open_new_tab . '" rel="noopener"><img src="' . esc_url( $post_data['post_image_url'] ) . '" /></a></figure>';
				}

				$output .= '</li>';
			}
		}

		$selected_category             = 'category' === $attributes['sortBy'] && isset( $attributes['selectedCategory'] ) ? array( $attributes['selectedCategory'] ) : array();
		$cozy_block_magazine_list_args = array(
			'post_type'           => 'post',
			'orderby'             => 'date',
			'order'               => 'DESC',
			'posts_per_page'      => $attributes['perPage'],
			'ignore_sticky_posts' => $attributes['enableOptions']['ignoreSticky'],
			'category__in'        => $selected_category,
		);

		$additional_post_data = get_cozy_block_magazine_list_posts( $cozy_block_magazine_list_args );

		$cozy_block_magazine_list_args['posts_per_page'] = -1;
		$all_posts                                       = get_cozy_block_magazine_list_posts( $cozy_block_magazine_list_args );

		$remaining_posts = array_udiff(
			$all_posts,
			$additional_post_data,
			function ( $a, $b ) {
				return $a['ID'] - $b['ID'];
			}
		);

		// Assuming you have pagination or offset to get remaining posts in chunks.
		$offset                = isset( $_POST['offset'] ) ? intval( $_POST['offset'] ) : 0;
		$posts_per_page        = isset( $attributes['ajaxLoader']['content'] ) ? intval( $attributes['ajaxLoader']['content'] ) : 10;
		$remaining_posts_chunk = array_slice( $remaining_posts, $offset, $posts_per_page );
		$next_chunk            = array_slice( $remaining_posts, $offset + $posts_per_page, $posts_per_page );

		if ( empty( $remaining_posts_chunk ) ) {
			wp_send_json_error( '' );
		}

		if ( ! empty( $remaining_posts_chunk ) ) {
			// Output the posts.
			$output = '';
			foreach ( $remaining_posts_chunk as $post_data ) {
				// Customize the HTML structure as per your requirement .
				render_cozy_block_magazine_list_posts_load_more_data( $attributes, $post_data, $output );
			}
			$return_data = array(
				'render'           => $output,
				'next_chunk_count' => count( $next_chunk ),
			);
			wp_send_json_success( $return_data );
		}
	}
}

/* Load More Ajax callback for popular posts */
add_action( 'wp_ajax_cozy_block_popular_posts_loader', 'cozy_block_popular_posts_load_content' );
add_action( 'wp_ajax_nopriv_cozy_block_popular_posts_loader', 'cozy_block_popular_posts_load_content' );
if ( ! function_exists( 'cozy_block_popular_posts_load_content' ) ) {
	function cozy_block_popular_posts_load_content() {
		check_ajax_referer( 'cozy_block_popular_posts_load_more', 'nonce', true );
		$attributes = $_POST['attributes'];

		if ( empty( $attributes ) ) {
			return;
		}

		/* Create Excerpt */
		if ( ! function_exists( 'cozy_block_popular_posts_create_post_excerpt' ) ) {
			function cozy_block_popular_posts_create_post_excerpt( $content, $length = 40 ) {
				// Strip HTML tags and shortcodes
				$content = wp_strip_all_tags( strip_shortcodes( $content ) );

				// Split the content into words
				$words = explode( ' ', $content );

				// Truncate to the specified length
				if ( count( $words ) > $length ) {
					$words   = array_slice( $words, 0, $length );
					$content = implode( ' ', $words ) . '...';
				} else {
					$content = implode( ' ', $words );
				}

				return esc_html_x( $content, 'cozy-addons' );
			}
		}

		/* Fetch Posts */
		if ( ! function_exists( 'get_cozy_block_popular_posts' ) ) {
			function get_cozy_block_popular_posts( $args = array() ) {
				if ( ! empty( $args ) ) {
					$popular_posts        = new \WP_Query( $args );
					$additional_post_data = array();

					foreach ( $popular_posts->posts as $post_data ) {
						$post_image_url = get_the_post_thumbnail_url( $post_data->ID );
						$post_link      = get_permalink( $post_data->ID );

						// Get categories and their links.
						$categories                  = get_the_category( $post_data->ID );
						$post_categories             = array();
						$post_id                     = $post_data->ID;
						$post_data                   = (array) $post_data; // Convert WP_Post object to an array.
						$post_data['post_image_url'] = $post_image_url;

						foreach ( $categories as $category ) {
							$post_categories[] = array(
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

						$post_data['post_author_name']    = get_the_author_meta( 'display_name', $post_data['post_author'] ) ?? '';
						$post_data['post_author_url']     = get_author_posts_url( $post_data['post_author'] ) ?? '';
						$post_data['post_link']           = $post_link;
						$post_data['post_date_formatted'] = get_the_date( '', $post_id );
						$post_data['comment_link']        = get_comments_link( $post_id );
						$additional_post_data[]           = $post_data;
					}

					wp_reset_postdata();

					return $additional_post_data;
				}
				return array();
			}
		}
		/* Posts Render */
		if ( ! function_exists( 'render_cozy_block_popular_posts_load_more_data' ) ) {
			function render_cozy_block_popular_posts_load_more_data( $attributes, $post_data, &$output ) {
				$item_classes   = array();
				$item_classes[] = 'cozy-block-popular-posts__item';
				$output        .= '<li class="' . implode( ' ', $item_classes ) . '">';

				// Post Image.
				if ( filter_var( $attributes['enableOptions']['image'], FILTER_VALIDATE_BOOLEAN ) && ! empty( $post_data['post_image_url'] ) ) {
					$figure_classes   = array();
					$figure_classes[] = 'cozy-block-popular-posts__image';
					$figure_classes[] = $attributes['imageStyles']['hoverEffect'] ? 'has-hover-effect' : '';
					$output          .= '<figure class="' . implode( ' ', $figure_classes ) . '">';
					$has_post_link    = isset( $attributes['enableOptions']['imgLinkPost'] ) && filter_var( $attributes['enableOptions']['imgLinkPost'], FILTER_VALIDATE_BOOLEAN ) ? 'href="' . esc_url( $post_data['post_link'] ) . '"' : '';
					$open_new_tab     = isset( $attributes['enableOptions']['imgLinkPost'], $attributes['enableOptions']['imgLinkNewTab'] ) && filter_var( $attributes['enableOptions']['imgLinkPost'], FILTER_VALIDATE_BOOLEAN ) && filter_var( $attributes['enableOptions']['imgLinkNewTab'], FILTER_VALIDATE_BOOLEAN ) ? '_blank' : '';
					$output          .= '<a ' . $has_post_link . ' target="' . $open_new_tab . '" rel="noopener">';
					$output          .= '<img alt="' . esc_html_x( $post_data['post_title'], 'cozy-addons' ) . '" src="' . esc_url( $post_data['post_image_url'] ) . '" />';
					$output          .= '</a>';
					$output          .= '</figure>';
				}

				$output .= '<div>';
				// Post Category.
				if ( filter_var( $attributes['enableOptions']['category'], FILTER_VALIDATE_BOOLEAN ) ) {
					$category_classes   = array();
					$category_classes[] = 'cozy-block-popular-posts__post-categories';
					$category_classes[] = $attributes['categoryStyles']['hoverEffect'] ? 'has-hover-effect' : '';
					$output            .= '<div class="' . implode( ' ', $category_classes ) . '">';
					$open_new_tab       = isset( $attributes['enableOptions']['linkCat'], $attributes['enableOptions']['catNewTab'] ) && filter_var( $attributes['enableOptions']['linkCat'], FILTER_VALIDATE_BOOLEAN ) && filter_var( $attributes['enableOptions']['catNewTab'], FILTER_VALIDATE_BOOLEAN ) ? '_blank' : '';
					foreach ( $post_data['post_categories'] as $cat_data ) {
						$has_cat_link = isset( $attributes['enableOptions']['linkCat'] ) && filter_var( $attributes['enableOptions']['linkCat'], FILTER_VALIDATE_BOOLEAN ) ? 'href="' . esc_url( $cat_data['link'] ) . '"' : '';
						$output      .= '<a ' . $has_cat_link . ' target="' . $open_new_tab . '" rel="noopener">';
						$output      .= esc_html_x( $cat_data['name'], 'cozy-addons' );
						$output      .= '</a>';
					}
					$output .= '</div>';
				}

				// Post Title.
				$has_post_link = isset( $attributes['enableOptions']['titleLinkPost'] ) && filter_var( $attributes['enableOptions']['titleLinkPost'], FILTER_VALIDATE_BOOLEAN ) ? 'href="' . esc_url( $post_data['post_link'] ) . '"' : '';
				$open_new_tab  = isset( $attributes['enableOptions']['titleLinkPost'], $attributes['enableOptions']['titleLinkNewTab'] ) && filter_var( $attributes['enableOptions']['titleLinkPost'], FILTER_VALIDATE_BOOLEAN ) && filter_var( $attributes['enableOptions']['titleLinkNewTab'], FILTER_VALIDATE_BOOLEAN ) ? '_blank' : '';
				$output       .= '<h4 class="cozy-block-popular-posts__post-title"><a ' . $has_post_link . ' target="' . $open_new_tab . '" rel="noopener">' . esc_html_x( $post_data['post_title'], 'cozy-addons' ) . '</a></h4>';

				if ( ( isset( $attributes['enableOptions']['author'] ) && filter_var( $attributes['enableOptions']['author'], FILTER_VALIDATE_BOOLEAN ) ) || ( isset( $attributes['enableOptions']['comments'] ) && filter_var( $attributes['enableOptions']['comments'], FILTER_VALIDATE_BOOLEAN ) ) || filter_var( $attributes['enableOptions']['date'], FILTER_VALIDATE_BOOLEAN ) ) {
					$output .= '<div class="post__meta">';

					$has_meta_link = isset( $attributes['enableOptions']['linkPostMeta'] ) && $attributes['enableOptions']['linkPostMeta'] ? true : false;
					$open_new_tab  = isset( $attributes['enableOptions']['linkPostMeta'], $attributes['enableOptions']['postMetaNewTab'] ) && $attributes['enableOptions']['linkPostMeta'] && $attributes['enableOptions']['postMetaNewTab'] ? '_blank' : '';
					if ( isset( $attributes['enableOptions']['author'] ) && filter_var( $attributes['enableOptions']['author'], FILTER_VALIDATE_BOOLEAN ) ) {
						$meta_link = $has_meta_link ? 'href="' . esc_url( $post_data['post_author_url'] ) . '"' : '';
						$output   .= '<a class="post__author display-flex" ' . $meta_link . ' target="' . $open_new_tab . '" rel="noopener">';
						$output   .= '<svg
													width="' . $attributes['dateStyles']['fontSize'] . '"
													height="' . $attributes['dateStyles']['fontSize'] . '"
													xmlns="http://www.w3.org/2000/svg"
													aria-hidden="true"
													viewBox="0 0 12 15"
												>
													<path d="M11.2972 14.6667H0.630493V13.3333C0.630493 12.4493 0.981683 11.6014 1.6068 10.9763C2.23193 10.3512 3.07977 10 3.96383 10H7.96383C8.84788 10 9.69573 10.3512 10.3208 10.9763C10.946 11.6014 11.2972 12.4493 11.2972 13.3333V14.6667ZM5.96383 8.66667C5.43854 8.66667 4.9184 8.5632 4.43309 8.36218C3.94779 8.16117 3.50683 7.86653 3.1354 7.49509C2.76396 7.12366 2.46933 6.6827 2.26831 6.1974C2.06729 5.7121 1.96383 5.19195 1.96383 4.66667C1.96383 4.14138 2.06729 3.62124 2.26831 3.13593C2.46933 2.65063 2.76396 2.20967 3.1354 1.83824C3.50683 1.4668 3.94779 1.17217 4.43309 0.971148C4.9184 0.770129 5.43854 0.666666 5.96383 0.666666C7.02469 0.666666 8.04211 1.08809 8.79225 1.83824C9.5424 2.58838 9.96383 3.6058 9.96383 4.66667C9.96383 5.72753 9.5424 6.74495 8.79225 7.49509C8.04211 8.24524 7.02469 8.66667 5.96383 8.66667Z" />
												</svg>';

						$output .= '<p>' . esc_html_x( $post_data['post_author_name'], 'cozy-addons' ) . '</p>';
						$output .= '</a>';
					}

					if ( isset( $attributes['enableOptions']['comments'] ) && filter_var( $attributes['enableOptions']['comments'], FILTER_VALIDATE_BOOLEAN ) && intval( $post_data['comment_count'] ) > 0 ) {
						$meta_link = $has_meta_link ? 'href="' . esc_url( $post_data['comment_link'] ) . '"' : '';
						$output   .= '<a class="post__comments display-flex" ' . $meta_link . ' target="' . $open_new_tab . '" rel="noopener">';
						$output   .= '<svg
												width="' . $attributes['dateStyles']['fontSize'] . '"
												height="' . $attributes['dateStyles']['fontSize'] . '"
												xmlns="http://www.w3.org/2000/svg"
												aria-hidden="true"
												viewBox="0 0 25 20"
											>
												<path d="M18.0556 6.94444C18.0556 3.10764 14.0148 0 9.02778 0C4.0408 0 0 3.10764 0 6.94444C0 8.43316 0.611979 9.80469 1.64931 10.9375C1.06771 12.2483 0.108507 13.2899 0.0954861 13.3029C0 13.4028 -0.0260417 13.5503 0.0303819 13.6806C0.0868056 13.8108 0.208333 13.8889 0.347222 13.8889C1.93576 13.8889 3.25087 13.355 4.19705 12.8038C5.59462 13.4852 7.24826 13.8889 9.02778 13.8889C14.0148 13.8889 18.0556 10.7812 18.0556 6.94444ZM23.3507 16.4931C24.388 15.3646 25 13.9887 25 12.5C25 9.59635 22.678 7.10937 19.388 6.07205C19.4271 6.35851 19.4444 6.6493 19.4444 6.94444C19.4444 11.5408 14.77 15.2778 9.02778 15.2778C8.55903 15.2778 8.1033 15.2431 7.65191 15.1953C9.0191 17.691 12.2309 19.4444 15.9722 19.4444C17.7517 19.4444 19.4054 19.0451 20.8029 18.3594C21.7491 18.9106 23.0642 19.4444 24.6528 19.4444C24.7917 19.4444 24.9175 19.362 24.9696 19.2361C25.026 19.1102 25 18.9627 24.9045 18.8585C24.8915 18.8455 23.9323 17.8082 23.3507 16.4931Z" />
											</svg>';

						$output .= '<p>' . esc_html_x( $post_data['comment_count'], 'cozy-addons' ) . '</p>';
						$output .= '</a>';
					}

					// Post Date.
					if ( filter_var( $attributes['enableOptions']['date'], FILTER_VALIDATE_BOOLEAN ) ) {
						$meta_link   = $has_meta_link ? 'href="' . esc_url( $post_data['post_link'] ) . '"' : '';
							$output .= '<a class="post__date display-flex" ' . $meta_link . ' target="' . $open_new_tab . '" rel="noopener">';
							$output .= '<svg
													width="' . $attributes['dateStyles']['fontSize'] . '"
													height="' . $attributes['dateStyles']['fontSize'] . '"
													xmlns="http://www.w3.org/2000/svg"
													viewBox="0 0 16 18"
													aria-hidden="true"
												>
													<path d="M7.66699 10.6666C7.43088 10.6666 7.23296 10.5868 7.07324 10.427C6.91352 10.2673 6.83366 10.0694 6.83366 9.83329C6.83366 9.59718 6.91352 9.39927 7.07324 9.23954C7.23296 9.07982 7.43088 8.99996 7.66699 8.99996C7.9031 8.99996 8.10102 9.07982 8.26074 9.23954C8.42046 9.39927 8.50033 9.59718 8.50033 9.83329C8.50033 10.0694 8.42046 10.2673 8.26074 10.427C8.10102 10.5868 7.9031 10.6666 7.66699 10.6666ZM4.33366 10.6666C4.09755 10.6666 3.89963 10.5868 3.73991 10.427C3.58019 10.2673 3.50033 10.0694 3.50033 9.83329C3.50033 9.59718 3.58019 9.39927 3.73991 9.23954C3.89963 9.07982 4.09755 8.99996 4.33366 8.99996C4.56977 8.99996 4.76769 9.07982 4.92741 9.23954C5.08713 9.39927 5.16699 9.59718 5.16699 9.83329C5.16699 10.0694 5.08713 10.2673 4.92741 10.427C4.76769 10.5868 4.56977 10.6666 4.33366 10.6666ZM11.0003 10.6666C10.7642 10.6666 10.5663 10.5868 10.4066 10.427C10.2469 10.2673 10.167 10.0694 10.167 9.83329C10.167 9.59718 10.2469 9.39927 10.4066 9.23954C10.5663 9.07982 10.7642 8.99996 11.0003 8.99996C11.2364 8.99996 11.4344 9.07982 11.5941 9.23954C11.7538 9.39927 11.8337 9.59718 11.8337 9.83329C11.8337 10.0694 11.7538 10.2673 11.5941 10.427C11.4344 10.5868 11.2364 10.6666 11.0003 10.6666ZM7.66699 14C7.43088 14 7.23296 13.9201 7.07324 13.7604C6.91352 13.6007 6.83366 13.4027 6.83366 13.1666C6.83366 12.9305 6.91352 12.7326 7.07324 12.5729C7.23296 12.4132 7.43088 12.3333 7.66699 12.3333C7.9031 12.3333 8.10102 12.4132 8.26074 12.5729C8.42046 12.7326 8.50033 12.9305 8.50033 13.1666C8.50033 13.4027 8.42046 13.6007 8.26074 13.7604C8.10102 13.9201 7.9031 14 7.66699 14ZM4.33366 14C4.09755 14 3.89963 13.9201 3.73991 13.7604C3.58019 13.6007 3.50033 13.4027 3.50033 13.1666C3.50033 12.9305 3.58019 12.7326 3.73991 12.5729C3.89963 12.4132 4.09755 12.3333 4.33366 12.3333C4.56977 12.3333 4.76769 12.4132 4.92741 12.5729C5.08713 12.7326 5.16699 12.9305 5.16699 13.1666C5.16699 13.4027 5.08713 13.6007 4.92741 13.7604C4.76769 13.9201 4.56977 14 4.33366 14ZM11.0003 14C10.7642 14 10.5663 13.9201 10.4066 13.7604C10.2469 13.6007 10.167 13.4027 10.167 13.1666C10.167 12.9305 10.2469 12.7326 10.4066 12.5729C10.5663 12.4132 10.7642 12.3333 11.0003 12.3333C11.2364 12.3333 11.4344 12.4132 11.5941 12.5729C11.7538 12.7326 11.8337 12.9305 11.8337 13.1666C11.8337 13.4027 11.7538 13.6007 11.5941 13.7604C11.4344 13.9201 11.2364 14 11.0003 14ZM1.83366 17.3333C1.37533 17.3333 0.982964 17.1701 0.656576 16.8437C0.330187 16.5173 0.166992 16.125 0.166992 15.6666V3.99996C0.166992 3.54163 0.330187 3.14926 0.656576 2.82288C0.982964 2.49649 1.37533 2.33329 1.83366 2.33329H2.66699V0.666626H4.33366V2.33329H11.0003V0.666626H12.667V2.33329H13.5003C13.9587 2.33329 14.351 2.49649 14.6774 2.82288C15.0038 3.14926 15.167 3.54163 15.167 3.99996V15.6666C15.167 16.125 15.0038 16.5173 14.6774 16.8437C14.351 17.1701 13.9587 17.3333 13.5003 17.3333H1.83366ZM1.83366 15.6666H13.5003V7.33329H1.83366V15.6666Z" />
												</svg>';

							$output .= '<p>' . esc_html_x( $post_data['post_date_formatted'], 'cozy-addons' ) . '</p>';
							$output .= '</a>';
					}

					$output .= '</div>';

				}

				// Post Excerpt
				if ( filter_var( $attributes['enableOptions']['content'], FILTER_VALIDATE_BOOLEAN ) ) {
					$output .= '<p class="cozy-block-popular-posts__content">';
					$output .= cozy_block_popular_posts_create_post_excerpt( $post_data['post_content'], $attributes['enableOptions']['excerpt'] );
					$output .= '</p>';
				}
				$output .= '</div>';

				$output .= '</li>';
			}
		}

		$cozy_block_popular_posts_args = array(
			'post_type'           => 'post',
			'meta_key'            => 'cozy_post_views_count', // Replace with your popularity field.
			'orderby'             => 'cozy_post_views_count',
			'order'               => 'DESC',
			'posts_per_page'      => $attributes['perPage'], // Number of popular posts to retrieve.
			'ignore_sticky_posts' => true,
			'meta_query'          => array(
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

		$additional_post_data = get_cozy_block_popular_posts( $cozy_block_popular_posts_args );

		$cozy_block_popular_posts_args['posts_per_page'] = -1;
		$all_posts                                       = get_cozy_block_popular_posts( $cozy_block_popular_posts_args );

		$remaining_posts = array_udiff(
			$all_posts,
			$additional_post_data,
			function ( $a, $b ) {
				return $a['ID'] - $b['ID'];
			}
		);

		// Assuming you have pagination or offset to get remaining posts in chunks.
		$offset                = isset( $_POST['offset'] ) ? intval( $_POST['offset'] ) : 0;
		$posts_per_page        = isset( $attributes['ajaxLoader']['content'] ) ? intval( $attributes['ajaxLoader']['content'] ) : 10;
		$remaining_posts_chunk = array_slice( $remaining_posts, $offset, $posts_per_page );
		$next_chunk            = array_slice( $remaining_posts, $offset + $posts_per_page, $posts_per_page );

		if ( empty( $remaining_posts_chunk ) ) {
			wp_send_json_error( '' );
		}

		if ( ! empty( $remaining_posts_chunk ) ) {
			// Output the posts.
			$output = '';
			foreach ( $remaining_posts_chunk as $post_data ) {
				// Customize the HTML structure as per your requirement .
				render_cozy_block_popular_posts_load_more_data( $attributes, $post_data, $output );
			}
			$return_data = array(
				'render'           => $output,
				'next_chunk_count' => count( $next_chunk ),
			);
			wp_send_json_success( $return_data );
		}
	}
}

/* Load More Ajax callback for trending posts */
add_action( 'wp_ajax_cozy_block_trending_posts_loader', 'cozy_block_trending_posts_load_content' );
add_action( 'wp_ajax_nopriv_cozy_block_trending_posts_loader', 'cozy_block_trending_posts_load_content' );
if ( ! function_exists( 'cozy_block_trending_posts_load_content' ) ) {
	function cozy_block_trending_posts_load_content() {
		check_ajax_referer( 'cozy_block_trending_posts_load_more', 'nonce', true );
		$attributes = $_POST['attributes'];

		if ( empty( $attributes ) ) {
			return;
		}

		/* Create Excerpt */
		if ( ! function_exists( 'cozy_block_trending_posts_create_post_excerpt' ) ) {
			function cozy_block_trending_posts_create_post_excerpt( $content, $length = 40 ) {
				// Strip HTML tags and shortcodes
				$content = wp_strip_all_tags( strip_shortcodes( $content ) );

				// Split the content into words
				$words = explode( ' ', $content );

				// Truncate to the specified length
				if ( count( $words ) > $length ) {
					$words   = array_slice( $words, 0, $length );
					$content = implode( ' ', $words ) . '...';
				} else {
					$content = implode( ' ', $words );
				}

				return esc_html_x( $content, 'cozy-addons' );
			}
		}

		/* Fetch Posts */
		if ( ! function_exists( 'get_cozy_block_trending_posts' ) ) {
			function get_cozy_block_trending_posts( $args = array() ) {
				if ( ! empty( $args ) ) {
					$popular_posts        = new \WP_Query( $args );
					$additional_post_data = array();

					foreach ( $popular_posts->posts as $post_data ) {
						$post_image_url = get_the_post_thumbnail_url( $post_data->ID );
						$post_link      = get_permalink( $post_data->ID );

						// Get categories and their links.
						$categories                  = get_the_category( $post_data->ID );
						$post_categories             = array();
						$post_id                     = $post_data->ID;
						$post_data                   = (array) $post_data; // Convert WP_Post object to an array.
						$post_data['post_image_url'] = $post_image_url;

						foreach ( $categories as $category ) {
							$post_categories[] = array(
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

						$post_data['post_author_name']    = get_the_author_meta( 'display_name', $post_data['post_author'] ) ?? '';
						$post_data['post_author_url']     = get_author_posts_url( $post_data['post_author'] ) ?? '';
						$post_data['post_link']           = $post_link;
						$post_data['post_date_formatted'] = get_the_date( '', $post_id );
						$post_data['comment_link']        = get_comments_link( $post_id );
						$additional_post_data[]           = $post_data;
					}

					wp_reset_postdata();

					return $additional_post_data;
				}
				return array();
			}
		}
		/* Posts Render */
		if ( ! function_exists( 'render_cozy_block_trending_posts_load_more_data' ) ) {
			function render_cozy_block_trending_posts_load_more_data( $attributes, $post_data, &$output ) {
				$item_classes   = array();
				$item_classes[] = 'cozy-block-trending-posts__item';
				$output        .= '<li class="' . implode( ' ', $item_classes ) . '">';

				// Post Image.
				if ( filter_var( $attributes['enableOptions']['image'], FILTER_VALIDATE_BOOLEAN ) && ! empty( $post_data['post_image_url'] ) ) {
					$figure_classes   = array();
					$figure_classes[] = 'cozy-block-trending-posts__image';
					$figure_classes[] = $attributes['imageStyles']['hoverEffect'] ? 'has-hover-effect' : '';
					$output          .= '<figure class="' . implode( ' ', $figure_classes ) . '">';
					$has_post_link    = isset( $attributes['enableOptions']['imgLinkPost'] ) && filter_var( $attributes['enableOptions']['imgLinkPost'], FILTER_VALIDATE_BOOLEAN ) ? 'href="' . esc_url( $post_data['post_link'] ) . '"' : '';
					$open_new_tab     = isset( $attributes['enableOptions']['imgLinkPost'], $attributes['enableOptions']['imgLinkNewTab'] ) && filter_var( $attributes['enableOptions']['imgLinkPost'], FILTER_VALIDATE_BOOLEAN ) && filter_var( $attributes['enableOptions']['imgLinkNewTab'], FILTER_VALIDATE_BOOLEAN ) ? '_blank' : '';
					$output          .= '<a ' . $has_post_link . ' target="' . $open_new_tab . '" rel="noopener">';
					$output          .= '<img alt="' . esc_html_x( $post_data['post_title'], 'cozy-addons' ) . '" src="' . esc_url( $post_data['post_image_url'] ) . '" />';
					$output          .= '</a>';
					$output          .= '</figure>';
				}

				$output .= '<div>';
				// Post Category.
				if ( filter_var( $attributes['enableOptions']['category'], FILTER_VALIDATE_BOOLEAN ) ) {
					$category_classes   = array();
					$category_classes[] = 'cozy-block-trending-posts__post-categories';
					$category_classes[] = $attributes['categoryStyles']['hoverEffect'] ? 'has-hover-effect' : '';
					$output            .= '<div class="' . implode( ' ', $category_classes ) . '">';
					$open_new_tab       = isset( $attributes['enableOptions']['linkCat'], $attributes['enableOptions']['catNewTab'] ) && filter_var( $attributes['enableOptions']['linkCat'], FILTER_VALIDATE_BOOLEAN ) && filter_var( $attributes['enableOptions']['catNewTab'], FILTER_VALIDATE_BOOLEAN ) ? '_blank' : '';
					foreach ( $post_data['post_categories'] as $cat_data ) {
						$has_cat_link = isset( $attributes['enableOptions']['linkCat'] ) && filter_var( $attributes['enableOptions']['linkCat'], FILTER_VALIDATE_BOOLEAN ) ? 'href="' . esc_url( $cat_data['link'] ) . '"' : '';
						$output      .= '<a ' . $has_cat_link . ' target="' . $open_new_tab . '" rel="noopener">';
						$output      .= esc_html_x( $cat_data['name'], 'cozy-addons' );
						$output      .= '</a>';
					}
					$output .= '</div>';
				}

				// Post Title.
				$has_post_link = isset( $attributes['enableOptions']['titleLinkPost'] ) && filter_var( $attributes['enableOptions']['titleLinkPost'], FILTER_VALIDATE_BOOLEAN ) ? 'href="' . esc_url( $post_data['post_link'] ) . '"' : '';
				$open_new_tab  = isset( $attributes['enableOptions']['titleLinkPost'], $attributes['enableOptions']['titleLinkNewTab'] ) && filter_var( $attributes['enableOptions']['titleLinkPost'], FILTER_VALIDATE_BOOLEAN ) && filter_var( $attributes['enableOptions']['titleLinkNewTab'], FILTER_VALIDATE_BOOLEAN ) ? '_blank' : '';
				$output       .= '<h4 class="cozy-block-trending-posts__post-title"><a ' . $has_post_link . ' target="' . $open_new_tab . '" rel="noopener">' . esc_html_x( $post_data['post_title'], 'cozy-addons' ) . '</a></h4>';

				if ( ( isset( $attributes['enableOptions']['author'] ) && filter_var( $attributes['enableOptions']['author'], FILTER_VALIDATE_BOOLEAN ) ) || ( isset( $attributes['enableOptions']['comments'] ) && filter_var( $attributes['enableOptions']['comments'], FILTER_VALIDATE_BOOLEAN ) ) || filter_var( $attributes['enableOptions']['date'], FILTER_VALIDATE_BOOLEAN ) ) {
					$output .= '<div class="post__meta">';

					$has_meta_link = isset( $attributes['enableOptions']['linkPostMeta'] ) && $attributes['enableOptions']['linkPostMeta'] ? true : false;
					$open_new_tab  = isset( $attributes['enableOptions']['linkPostMeta'], $attributes['enableOptions']['postMetaNewTab'] ) && $attributes['enableOptions']['linkPostMeta'] && $attributes['enableOptions']['postMetaNewTab'] ? '_blank' : '';
					if ( isset( $attributes['enableOptions']['author'] ) && filter_var( $attributes['enableOptions']['author'], FILTER_VALIDATE_BOOLEAN ) ) {
						$meta_link = $has_meta_link ? 'href="' . esc_url( $post_data['post_author_url'] ) . '"' : '';
						$output   .= '<a class="post__author display-flex" ' . $meta_link . ' target="' . $open_new_tab . '" rel="noopener">';
						$output   .= '<svg
													width="' . $attributes['dateStyles']['fontSize'] . '"
													height="' . $attributes['dateStyles']['fontSize'] . '"
													xmlns="http://www.w3.org/2000/svg"
													aria-hidden="true"
													viewBox="0 0 12 15"
												>
													<path d="M11.2972 14.6667H0.630493V13.3333C0.630493 12.4493 0.981683 11.6014 1.6068 10.9763C2.23193 10.3512 3.07977 10 3.96383 10H7.96383C8.84788 10 9.69573 10.3512 10.3208 10.9763C10.946 11.6014 11.2972 12.4493 11.2972 13.3333V14.6667ZM5.96383 8.66667C5.43854 8.66667 4.9184 8.5632 4.43309 8.36218C3.94779 8.16117 3.50683 7.86653 3.1354 7.49509C2.76396 7.12366 2.46933 6.6827 2.26831 6.1974C2.06729 5.7121 1.96383 5.19195 1.96383 4.66667C1.96383 4.14138 2.06729 3.62124 2.26831 3.13593C2.46933 2.65063 2.76396 2.20967 3.1354 1.83824C3.50683 1.4668 3.94779 1.17217 4.43309 0.971148C4.9184 0.770129 5.43854 0.666666 5.96383 0.666666C7.02469 0.666666 8.04211 1.08809 8.79225 1.83824C9.5424 2.58838 9.96383 3.6058 9.96383 4.66667C9.96383 5.72753 9.5424 6.74495 8.79225 7.49509C8.04211 8.24524 7.02469 8.66667 5.96383 8.66667Z" />
												</svg>';

						$output .= '<p>' . esc_html_x( $post_data['post_author_name'], 'cozy-addons' ) . '</p>';
						$output .= '</a>';
					}

					if ( isset( $attributes['enableOptions']['comments'] ) && filter_var( $attributes['enableOptions']['comments'], FILTER_VALIDATE_BOOLEAN ) && intval( $post_data['comment_count'] ) > 0 ) {
						$meta_link = $has_meta_link ? 'href="' . esc_url( $post_data['comment_link'] ) . '"' : '';
						$output   .= '<a class="post__comments display-flex" ' . $meta_link . ' target="' . $open_new_tab . '" rel="noopener">';
						$output   .= '<svg
												width="' . $attributes['dateStyles']['fontSize'] . '"
												height="' . $attributes['dateStyles']['fontSize'] . '"
												xmlns="http://www.w3.org/2000/svg"
												aria-hidden="true"
												viewBox="0 0 25 20"
											>
												<path d="M18.0556 6.94444C18.0556 3.10764 14.0148 0 9.02778 0C4.0408 0 0 3.10764 0 6.94444C0 8.43316 0.611979 9.80469 1.64931 10.9375C1.06771 12.2483 0.108507 13.2899 0.0954861 13.3029C0 13.4028 -0.0260417 13.5503 0.0303819 13.6806C0.0868056 13.8108 0.208333 13.8889 0.347222 13.8889C1.93576 13.8889 3.25087 13.355 4.19705 12.8038C5.59462 13.4852 7.24826 13.8889 9.02778 13.8889C14.0148 13.8889 18.0556 10.7812 18.0556 6.94444ZM23.3507 16.4931C24.388 15.3646 25 13.9887 25 12.5C25 9.59635 22.678 7.10937 19.388 6.07205C19.4271 6.35851 19.4444 6.6493 19.4444 6.94444C19.4444 11.5408 14.77 15.2778 9.02778 15.2778C8.55903 15.2778 8.1033 15.2431 7.65191 15.1953C9.0191 17.691 12.2309 19.4444 15.9722 19.4444C17.7517 19.4444 19.4054 19.0451 20.8029 18.3594C21.7491 18.9106 23.0642 19.4444 24.6528 19.4444C24.7917 19.4444 24.9175 19.362 24.9696 19.2361C25.026 19.1102 25 18.9627 24.9045 18.8585C24.8915 18.8455 23.9323 17.8082 23.3507 16.4931Z" />
											</svg>';

						$output .= '<p>' . esc_html_x( $post_data['comment_count'], 'cozy-addons' ) . '</p>';
						$output .= '</a>';
					}

					// Post Date.
					if ( filter_var( $attributes['enableOptions']['date'], FILTER_VALIDATE_BOOLEAN ) ) {
						$meta_link   = $has_meta_link ? 'href="' . esc_url( $post_data['post_link'] ) . '"' : '';
							$output .= '<a class="post__date display-flex" ' . $meta_link . ' target="' . $open_new_tab . '" rel="noopener">';
							$output .= '<svg
													width="' . $attributes['dateStyles']['fontSize'] . '"
													height="' . $attributes['dateStyles']['fontSize'] . '"
													xmlns="http://www.w3.org/2000/svg"
													viewBox="0 0 16 18"
													aria-hidden="true"
												>
													<path d="M7.66699 10.6666C7.43088 10.6666 7.23296 10.5868 7.07324 10.427C6.91352 10.2673 6.83366 10.0694 6.83366 9.83329C6.83366 9.59718 6.91352 9.39927 7.07324 9.23954C7.23296 9.07982 7.43088 8.99996 7.66699 8.99996C7.9031 8.99996 8.10102 9.07982 8.26074 9.23954C8.42046 9.39927 8.50033 9.59718 8.50033 9.83329C8.50033 10.0694 8.42046 10.2673 8.26074 10.427C8.10102 10.5868 7.9031 10.6666 7.66699 10.6666ZM4.33366 10.6666C4.09755 10.6666 3.89963 10.5868 3.73991 10.427C3.58019 10.2673 3.50033 10.0694 3.50033 9.83329C3.50033 9.59718 3.58019 9.39927 3.73991 9.23954C3.89963 9.07982 4.09755 8.99996 4.33366 8.99996C4.56977 8.99996 4.76769 9.07982 4.92741 9.23954C5.08713 9.39927 5.16699 9.59718 5.16699 9.83329C5.16699 10.0694 5.08713 10.2673 4.92741 10.427C4.76769 10.5868 4.56977 10.6666 4.33366 10.6666ZM11.0003 10.6666C10.7642 10.6666 10.5663 10.5868 10.4066 10.427C10.2469 10.2673 10.167 10.0694 10.167 9.83329C10.167 9.59718 10.2469 9.39927 10.4066 9.23954C10.5663 9.07982 10.7642 8.99996 11.0003 8.99996C11.2364 8.99996 11.4344 9.07982 11.5941 9.23954C11.7538 9.39927 11.8337 9.59718 11.8337 9.83329C11.8337 10.0694 11.7538 10.2673 11.5941 10.427C11.4344 10.5868 11.2364 10.6666 11.0003 10.6666ZM7.66699 14C7.43088 14 7.23296 13.9201 7.07324 13.7604C6.91352 13.6007 6.83366 13.4027 6.83366 13.1666C6.83366 12.9305 6.91352 12.7326 7.07324 12.5729C7.23296 12.4132 7.43088 12.3333 7.66699 12.3333C7.9031 12.3333 8.10102 12.4132 8.26074 12.5729C8.42046 12.7326 8.50033 12.9305 8.50033 13.1666C8.50033 13.4027 8.42046 13.6007 8.26074 13.7604C8.10102 13.9201 7.9031 14 7.66699 14ZM4.33366 14C4.09755 14 3.89963 13.9201 3.73991 13.7604C3.58019 13.6007 3.50033 13.4027 3.50033 13.1666C3.50033 12.9305 3.58019 12.7326 3.73991 12.5729C3.89963 12.4132 4.09755 12.3333 4.33366 12.3333C4.56977 12.3333 4.76769 12.4132 4.92741 12.5729C5.08713 12.7326 5.16699 12.9305 5.16699 13.1666C5.16699 13.4027 5.08713 13.6007 4.92741 13.7604C4.76769 13.9201 4.56977 14 4.33366 14ZM11.0003 14C10.7642 14 10.5663 13.9201 10.4066 13.7604C10.2469 13.6007 10.167 13.4027 10.167 13.1666C10.167 12.9305 10.2469 12.7326 10.4066 12.5729C10.5663 12.4132 10.7642 12.3333 11.0003 12.3333C11.2364 12.3333 11.4344 12.4132 11.5941 12.5729C11.7538 12.7326 11.8337 12.9305 11.8337 13.1666C11.8337 13.4027 11.7538 13.6007 11.5941 13.7604C11.4344 13.9201 11.2364 14 11.0003 14ZM1.83366 17.3333C1.37533 17.3333 0.982964 17.1701 0.656576 16.8437C0.330187 16.5173 0.166992 16.125 0.166992 15.6666V3.99996C0.166992 3.54163 0.330187 3.14926 0.656576 2.82288C0.982964 2.49649 1.37533 2.33329 1.83366 2.33329H2.66699V0.666626H4.33366V2.33329H11.0003V0.666626H12.667V2.33329H13.5003C13.9587 2.33329 14.351 2.49649 14.6774 2.82288C15.0038 3.14926 15.167 3.54163 15.167 3.99996V15.6666C15.167 16.125 15.0038 16.5173 14.6774 16.8437C14.351 17.1701 13.9587 17.3333 13.5003 17.3333H1.83366ZM1.83366 15.6666H13.5003V7.33329H1.83366V15.6666Z" />
												</svg>';

							$output .= '<p>' . esc_html_x( $post_data['post_date_formatted'], 'cozy-addons' ) . '</p>';
							$output .= '</a>';
					}

					$output .= '</div>';

				}

				// Post Excerpt
				if ( filter_var( $attributes['enableOptions']['content'], FILTER_VALIDATE_BOOLEAN ) ) {
					$output .= '<p class="cozy-block-trending-posts__content">';
					$output .= cozy_block_trending_posts_create_post_excerpt( $post_data['post_content'], $attributes['enableOptions']['excerpt'] );
					$output .= '</p>';
				}

				$output .= '</div>';

				$output .= '</li>';
			}
		}

		$cozy_block_trending_posts_args = array(
			'post_type'      => 'post',
			'orderby'        => 'cozy_trending_post_views',
			'order'          => 'DESC',
			'posts_per_page' => $attributes['perPage'], // Number of trending posts to retrieve.
			'meta_key'       => 'cozy_trending_post_views', // Replace with your popularity field.
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

		$additional_post_data = get_cozy_block_trending_posts( $cozy_block_trending_posts_args );

		$cozy_block_trending_posts_args['posts_per_page'] = -1;
		$all_posts                                        = get_cozy_block_trending_posts( $cozy_block_trending_posts_args );

		$remaining_posts = array_udiff(
			$all_posts,
			$additional_post_data,
			function ( $a, $b ) {
				return $a['ID'] - $b['ID'];
			}
		);

		// Assuming you have pagination or offset to get remaining posts in chunks.
		$offset                = isset( $_POST['offset'] ) ? intval( $_POST['offset'] ) : 0;
		$posts_per_page        = isset( $attributes['ajaxLoader']['content'] ) ? intval( $attributes['ajaxLoader']['content'] ) : 10;
		$remaining_posts_chunk = array_slice( $remaining_posts, $offset, $posts_per_page );
		$next_chunk            = array_slice( $remaining_posts, $offset + $posts_per_page, $posts_per_page );

		if ( empty( $remaining_posts_chunk ) ) {
			wp_send_json_error( '' );
		}

		if ( ! empty( $remaining_posts_chunk ) ) {
			// Output the posts.
			$output = '';
			foreach ( $remaining_posts_chunk as $post_data ) {
				// Customize the HTML structure as per your requirement .
				render_cozy_block_trending_posts_load_more_data( $attributes, $post_data, $output );
			}
			$return_data = array(
				'render'           => $output,
				'next_chunk_count' => count( $next_chunk ),
			);
			wp_send_json_success( $return_data );
		}
	}
}

/* Load More Ajax callback for Advanced Gallery */
add_action( 'wp_ajax_cozy_block_advanced_gallery_loader', 'cozy_block_advanced_gallery_load_content' );
add_action( 'wp_ajax_nopriv_cozy_block_advanced_gallery_loader', 'cozy_block_advanced_gallery_load_content' );
if ( ! function_exists( 'cozy_block_advanced_gallery_load_content' ) ) {
	function cozy_block_advanced_gallery_load_content() {
		check_ajax_referer( 'cozy_block_advanced_gallery_load_more', 'nonce', true );
		$attributes = isset( $_POST['attributes'] ) ? json_decode( stripslashes( $_POST['attributes'] ), true ) : array();

		$offset   = isset( $_POST['offset'] ) ? intval( $_POST['offset'] ) : 0;
		$tab_slug = isset( $_POST['tabSlug'] ) && '' !== $_POST['tabSlug'] ? $_POST['tabSlug'] : 'all';

		if ( empty( $attributes ) ) {
			return;
		}

		/* Gallery Render */
		if ( ! function_exists( 'render_cozy_block_advanced_gallery_load_more_data' ) ) {
			function render_cozy_block_advanced_gallery_load_more_data( $attributes, $item_data, &$output ) {
				$classes   = array();
				$classes[] = 'cozy-block-advanced-gallery__item';
				$classes[] = 'carousel' === $attributes['display'] ? 'swiper-slide' : '';
				$classes[] = filter_var( $attributes['enableOptions']['hoverTitle'], FILTER_VALIDATE_BOOLEAN ) ? 'has-hover-caption' : '';
				$output   .= '<li class="' . implode( ' ', $classes ) . '">';

				$classes   = array();
				$classes[] = 'cozy-block-advanced-gallery__image-wrapper';
				$classes[] = filter_var( $attributes['image']['hoverEffect'], FILTER_VALIDATE_BOOLEAN ) ? 'has-hover-effect' : '';
				$output   .= '<figure class="' . implode( ' ', $classes ) . '">';
				$output   .= '<span class="cozy-block-advanced-gallery__image-background"></span>';
				$output   .= '<img class="cozy-block-advanced-gallery__image" src="' . esc_url( $item_data['url'] ) . '" alt="' . esc_html_x( $item_data['alt'], 'cozy-addons' ) . '" />';

				if ( filter_var( $attributes['enableOptions']['hoverIcon'], FILTER_VALIDATE_BOOLEAN ) ) {
					$view_box   = array();
					$view_box[] = $attributes['icon']['viewBox']['vx'];
					$view_box[] = $attributes['icon']['viewBox']['vy'];
					$view_box[] = $attributes['icon']['viewBox']['vw'];
					$view_box[] = $attributes['icon']['viewBox']['vh'];
					$output    .= '<div class="cozy-block-advanced-gallery__icon-wrapper">';
					$output    .= '<svg class="cozy-block-advanced-gallery__icon" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="' . implode( ' ', $view_box ) . '">';
					$output    .= '<path d="' . $attributes['icon']['path'] . '" />';
					$output    .= '</svg>';
					$output    .= '</div>';
				}

				if ( filter_var( $attributes['enableOptions']['hoverTitle'], FILTER_VALIDATE_BOOLEAN ) ) {
					$output .= '<div class="cozy-block-advanced-gallery__image-caption">';
					$output .= esc_html_x( $item_data['caption'], 'cozy-addons' );
					$output .= '</div>';
				}
				$output .= '</figure>';

				$output .= '</li>';
			}
		}

		if ( 'grid' === $attributes['display'] ) {
			if ( 'all' === $tab_slug ) {
				$limit                 = count( (array) $attributes['mediaCollection'] ) - 1;
				$remaining_posts       = array_slice( (array) $attributes['mediaCollection'], $attributes['perPage'], $limit );
				$posts_per_page        = isset( $attributes['ajaxLoader']['content'] ) ? intval( $attributes['ajaxLoader']['content'] ) : 10;
				$remaining_posts_chunk = array_slice( $remaining_posts, $offset, $posts_per_page );
				$next_chunk            = array_slice( $remaining_posts, $offset + $posts_per_page, $posts_per_page );
				if ( empty( $remaining_posts_chunk ) ) {
					wp_send_json_error( $remaining_posts_chunk );
				}

				if ( ! empty( $remaining_posts_chunk ) ) {
					// Output the posts.
					$output = '';
					foreach ( $remaining_posts_chunk as $media ) {
						// Customize the HTML structure as per your requirement .
						render_cozy_block_advanced_gallery_load_more_data( $attributes, $media, $output );
					}
					$return_data = array(
						'render'           => $output,
						'next_chunk_count' => count( $next_chunk ),
						'tab_slug'         => $tab_slug,
					);
					wp_send_json_success( $return_data );
				}
			} else {
				$filtered_items = array_filter(
					(array) $attributes['mediaCollection'],
					function ( $item ) use ( $tab_slug ) {
						return isset( $item['categories'] ) && in_array( $tab_slug, $item['categories'], true );
					}
				);

				$tab_offset            = intval( $attributes['tabRemainingData'][ $tab_slug ]['offset'] );
				$limit                 = count( $filtered_items ) - 1;
				$remaining_posts       = array_slice( $filtered_items, $attributes['perPage'], $limit );
				$posts_per_page        = isset( $attributes['ajaxLoader']['content'] ) ? intval( $attributes['ajaxLoader']['content'] ) : 10;
				$remaining_posts_chunk = array_slice( $remaining_posts, $tab_offset, $posts_per_page );
				$next_chunk            = array_slice( $remaining_posts, $tab_offset + $posts_per_page, $posts_per_page );

				if ( empty( $remaining_posts_chunk ) ) {
					wp_send_json_error( $tab_slug );
				}

				if ( ! empty( $remaining_posts_chunk ) ) {
					// Output the posts.
					$output = '';
					foreach ( $remaining_posts_chunk as $media ) {
						// Customize the HTML structure as per your requirement .
						render_cozy_block_advanced_gallery_load_more_data( $attributes, $media, $output );
					}
					$return_data = array(
						'render'           => $output,
						'next_chunk_count' => count( $next_chunk ),
						'tab_slug'         => $tab_slug,
					);
					wp_send_json_success( $return_data );
				}
			}
		}
	}
}

/* Get Wishlist Sidebar render data */
add_action( 'wp_ajax_cozy_block_wishlist_render_data_sidebar', 'get_cozy_block_wishlist_render_data_sidebar' );
add_action( 'wp_ajax_nopriv_cozy_block_wishlist_render_data_sidebar', 'get_cozy_block_wishlist_render_data_sidebar' );
if ( ! function_exists( 'get_cozy_block_wishlist_render_data_sidebar' ) ) {
	function get_cozy_block_wishlist_render_data_sidebar() {
		check_ajax_referer( 'cozy_block_wishlist_render_data_sidebar', 'sidebarNonce', true );

		$wishlist_data = $_POST['wishlistData'];

		$output = '<ul class="cozy-block-wishlist__product-data-wrapper">';

		if ( ! function_exists( 'cozy_create_excerpt' ) ) {
			function cozy_create_excerpt( $content, $length = 20 ) {
				// Strip HTML tags and shortcodes.
				$content = wp_strip_all_tags( strip_shortcodes( $content ) );

				// Split the content into words.
				$words = explode( ' ', $content );

				// Truncate to the specified length.
				if ( count( $words ) > $length ) {
					$words   = array_slice( $words, 0, $length );
					$content = implode( ' ', $words ) . '...';
				} else {
					$content = implode( ' ', $words );
				}

				return esc_html_x( $content, 'cozy-addons' );
			}
		}

		if ( is_array( $wishlist_data ) ) {
			krsort( $wishlist_data );

			foreach ( $wishlist_data as $product_id ) {
				// Get the product object.
				$product = wc_get_product( $product_id );

				if ( $product ) {
					// Get product details.
					$product_name        = $product->get_name();
					$product_link        = get_permalink( $product_id );
					$product_price       = wc_price( $product->get_price() );
					$product_description = $product->get_description();
					$product_image       = wp_get_attachment_url( $product->get_image_id() );
					$is_in_stock         = $product->get_stock_status();

					$output .= '<li class="cozy-block-wishlist__product-data post-' . $product_id . '">';
					/* Product Image */
					if ( ! empty( $product_image ) ) {
						$output .= '<figure class="cozy-block-wishlist__product-image">';
						$output .= '<a href="' . esc_url( $product_link ) . '" rel="noopener" target="_blank">';
						$output .= '<img src="' . esc_url( $product_image ) . '" />';
						$output .= '</a>';
						$output .= '</figure>';
					}
					/* End Product Image */

					/* Product Details */
					$output .= '<div style="width:100%;">';
					$output .= '<p class="cozy-block-wishlist__product-title"><a href="' . esc_url( $product_link ) . '" rel="noopener" target="_blank">' . esc_html( $product_name ) . '</a></p>';
					$output .= '<p class="cozy-block-wishlist__product-summary">' . cozy_create_excerpt( $product_description, 15 ) . '</p>';
					$output .= '<p class="cozy-block-wishlist__product-price">' . $product_price . '</p>';

					/* Add/Remove Buttons */
					$output .= '<div style="display:flex;justify-content:space-between;flex-wrap:wrap;gap:6px;">';
					$stock_label = 'instock' === $is_in_stock ? 'Add to Cart' : 'Out of Stock';
					$classes     = array();
					$classes[]   = 'cozy-block-wishlist__sidebar-button';
					$classes[]   = 'instock' === $is_in_stock ? 'add__cart' : 'out-of-stock';
					$output     .= '<div class="' . implode( ' ', $classes ) . '" data-product-id="' . $product_id . '">' . $stock_label . '</div>';
					$output .= '<div class="cozy-block-wishlist__sidebar-button remove__wishlist" data-product-id="' . $product_id . '">' . esc_html_x( 'Remove', 'cozy-addons' ) . '</div>';
					$output .= '</div>';
					/* End Add/Remove Buttons */

					$output .= '</div>';

					/* End Product Details */
					$output .= '</li>';

				}
			}
		}

		$output .= '</ul>';

		wp_send_json_success(
			array(
				'render' => $output,
			)
		);
	}
}

/* Update Logged In user wishlist */
add_action( 'wp_ajax_cozy_block_wishlist_update_user_wishlist', 'cozy_block_wishlist_update_user_wishlist_callback' );
add_action( 'wp_ajax_nopriv_cozy_block_wishlist_update_user_wishlist', 'cozy_block_wishlist_update_user_wishlist_callback' );
if ( ! function_exists( 'cozy_block_wishlist_update_user_wishlist_callback' ) ) {
	function cozy_block_wishlist_update_user_wishlist_callback() {
		check_ajax_referer( 'cozy_block_wishlist_update_user_wishlist', 'wishlistNonce', true );

		$product_id = intval( $_POST['productId'] );
		$user_id    = $_POST['userId'];

		// Retrieve the current wishlist from user meta.
		$user_wishlist = get_user_meta( $user_id, 'cozy_block_wishlist_data', true ); // Add `true` to return a single value

		// Initialize the wishlist if it is not already an array.
		if ( ! is_array( $user_wishlist ) ) {
			$user_wishlist = array();
		}

		// Check if the product_id exists in the wishlist.
		$key = array_search( $product_id, $user_wishlist, true );

		if ( $key !== false ) {
			// Product exists in the wishlist, remove it.
			unset( $user_wishlist[ $key ] );
			// Reindex the array to prevent gaps.
			$user_wishlist = array_values( $user_wishlist );
		} else {
			// Product does not exist, add it to the wishlist.
			$user_wishlist[] = $product_id;

		}

		// Update the user meta with the modified wishlist
		update_user_meta( $user_id, 'cozy_block_wishlist_data', $user_wishlist );

		wp_send_json_success(
			array(
				'user_wishlist' => get_user_meta( $user_id, 'cozy_block_wishlist_data', true ),
			)
		);
	}
}

/* Add product to cart */
add_action( 'wp_ajax_cozy_block_wishlist_add_to_cart', 'cozy_block_wishlist_add_to_cart_callback' );
add_action( 'wp_ajax_nopriv_cozy_block_wishlist_add_to_cart', 'cozy_block_wishlist_add_to_cart_callback' );
if ( ! function_exists( 'cozy_block_wishlist_add_to_cart_callback' ) ) {
	function cozy_block_wishlist_add_to_cart_callback() {
		check_ajax_referer( 'cozy_block_wishlist_add_to_cart', 'cartNonce', true );

		$product_id = intval( $_POST['productId'] );

		$quantity = isset( $_POST['productQuantity'] ) ? $_POST['productQuantity'] : 1;

		$added = WC()->cart->add_to_cart( $product_id, $quantity );

		if ( $added ) {
			wp_send_json_success( 'Product added to cart' );
		} else {
			wp_send_json_error( 'Could not add product to cart' );
		}
	}
}

/* Quick View lightbox render */
add_action( 'wp_ajax_cozy_block_quick_view_lightbox_render', 'render_cozy_block_quick_view_lightbox_body' );
add_action( 'wp_ajax_nopriv_cozy_block_quick_view_lightbox_render', 'render_cozy_block_quick_view_lightbox_body' );
if ( ! function_exists( 'render_cozy_block_quick_view_lightbox_body' ) ) {
	function render_cozy_block_quick_view_lightbox_body() {
		check_ajax_referer( 'cozy_block_quick_view_render_data_lightbox', 'quickViewNonce', true );

		$attributes = $_POST['attributes'] ? $_POST['attributes'] : array();

		$product_id = intval( $_POST['productId'] );

		$product = wc_get_product( $product_id );

		$output = '';

		if ( $product ) {
			$price               = '';
			$discount_amt        = '';
			$discount_percentage = '';
			// Check if the product has a sale price.
			if ( $product->is_on_sale() ) {
				$price         = wc_format_sale_price( $product->get_regular_price(), $product->get_sale_price() );
				$regular_price = $product->get_regular_price();
				$sale_price    = $product->get_sale_price();

				// Check if both regular and sale prices are numeric before calculating discount amount
				if ( is_numeric( $regular_price ) && is_numeric( $sale_price ) ) {
					$discount_amt        = wc_price( $regular_price - $sale_price );
					$discount_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
					$discount_percentage = number_format( $discount_percentage, 1 );
					$discount_percentage = preg_replace( '/\.0+$/', '', $discount_percentage ) . '%';
				}
			} else {
				$price = wc_price( $product->get_regular_price() );
			}

			// Get product details.
			$product_name         = get_the_title( $product_id );
			$product_link         = get_permalink( $product_id );
			$product_price        = $price;
			$product_description  = get_the_content( '', '', $product_id );
			$product_image        = get_the_post_thumbnail_url( $product_id );
			$product_rating_count = $product->get_review_count();
			$product_rating       = $product->get_average_rating(); // Get the product rating.

			/* Close Button */
			$output .= '<div class="quick-view__lightbox-toolbar-button lightbox__close-button">';
			$output .= '<svg width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/" aria-hidden="true">';
			$output .= '<path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z" />';
			$output .= '</svg>';
			$output .= '</div>';
			/* End Close Button */

			if ( ! empty( $product_image ) ) {
				$classes   = array();
				$classes[] = 'quick-view__product-image';
				$output   .= '<figure class="' . implode( ' ', $classes ) . '">';
				$output   .= '<a href="' . esc_url( $product_link ) . '" rel="noopener" target="_blank">';
				$output   .= '<img src="' . esc_url( $product_image ) . '" />';
				$output   .= '</a>';
				$output   .= '</figure>';
			}

			/* Product Details */
			$output .= '<div class="quick-view__product-detail">';
			$output .= '<h3 class="post__title"><a href="' . esc_url( $product_link ) . '" rel="noopener" target="_blank">' . esc_html_x( $product_name, 'cozy-addons' ) . '</a></h3>';
			$output .= '<p class="post__content">' . cozy_create_excerpt( $product_description ) . '</p>';

			$output .= '<div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;">';
			$output .= '<p class="post__price">' . $product_price . '</p>';

			if ( $product_rating_count > 0 ) {
				/* Product Rating */
				$rating_percent = floatval( $product_rating ) / 5 * 100 . '%';
				$output        .= '<div class="quick-view__product-review">';
				$output        .= '<div class="quick-view__product-rating" style="display:inline;background: linear-gradient(90deg, #fcb900 ' . $rating_percent . ', rgba(0,0,0,0.2) ' . $rating_percent . ');">★★★★★</div>';
				$output        .= '<span style="display:block;">(' . number_format( $product_rating, 1 ) . ' out of ' . $product_rating_count . _n( ' Review', ' Reviews', $product_rating_count, 'cozy-addons' ) . ')</span>';
				$output        .= '</div>';
				/* End Product Rating */
			}

			$output .= '</div>';

			/* Add to Cart */
			$output .= '<div class="quick-view__cart-wrapper">';
			$output .= '<div class="quick-view__quantity">';
			$output .= '<span class="quantity__increase"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M17.3051 12.1C17.3051 12.6 16.9051 13 16.4051 13H12.8051V16.4C12.8051 16.9 12.4051 17.3 11.9051 17.3C11.4051 17.3 11.0051 16.9 11.0051 16.4V13H7.60511C7.10511 13 6.70511 12.6 6.70511 12.1C6.70511 11.6 7.10511 11.2 7.60511 11.2H11.0051V7.6C11.0051 7.1 11.4051 6.7 11.9051 6.7C12.4051 6.7 12.8051 7.1 12.8051 7.6V11.2H16.4051C16.9051 11.2 17.3051 11.6 17.3051 12.1Z" />
			</svg></span>';
			$output .= '<input class="quick-view__quantity-input" type="text" value="1" disabled />';
			$output .= '<span class="quantity__decrease opacity-50"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
			<path d="M5 11.25h14v1.5H5z" />
			</svg></span>';
			$output .= '</div>';

			$output .= '<div class="quick-view__cart-tooltip visibility-hidden"></div>';

			$output       .= '<div class="quick-view__cart-buttons">';
			$cart_label    = $attributes['cartButton']['label'] ? $attributes['cartButton']['label'] : 'Add to cart';
			$output       .= '<div class="quick-view__cart-button post__cart-button">';
			$output       .= '<svg class="loader-icon display-none" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path d="M7.99998 2.66666C9.72665 2.66666 11.2626 3.48666 12.238 4.762L10.6666 6.33333H14.6666V2.33333L13.1873 3.81266C12.5631 3.03781 11.773 2.41284 10.8753 1.98376C9.97754 1.55467 8.99499 1.33241 7.99998 1.33333C4.31798 1.33333 1.33331 4.318 1.33331 8H2.66665C2.66665 6.58551 3.22855 5.22896 4.22874 4.22876C5.22894 3.22857 6.58549 2.66666 7.99998 2.66666ZM13.3333 8C13.3333 9.11533 12.9837 10.2026 12.3336 11.1089C11.6835 12.0151 10.7656 12.6948 9.7091 13.0522C8.65259 13.4096 7.51062 13.4268 6.44382 13.1014C5.37703 12.776 4.4391 12.1243 3.76198 11.238L5.33331 9.66666H1.33331V13.6667L2.81265 12.1873C3.43687 12.9622 4.22694 13.5872 5.12468 14.0162C6.02242 14.4453 7.00497 14.6676 7.99998 14.6667C11.682 14.6667 14.6666 11.682 14.6666 8H13.3333Z" />
				</svg>';
			$output       .= '<span class="cart-button__label">' . esc_html_x( $cart_label, 'cozy-addons' ) . '</span>';
			$output       .= '</div>';
			$cart_page_url = wc_get_cart_url();
			$output       .= '<a class="quick-view__cart-view" href="' . esc_url( $cart_page_url ) . '" rel="noopener" target="_blank">' . esc_html_x( 'View my cart', 'cozy-addons' ) . '</a>';
			$output       .= '</div>';

			$output .= '</div>';
			/* End Add to Cart */

			if ( $product_rating_count > 0 ) {
				/* Product Rating Carousel */
				$output .= '<div class="quick-view__rating swiper__container">';
				$output .= '<div class="swiper-wrapper">';
				$args    = array(
					'post_type' => 'product',
					'post_id'   => $product_id,
					'status'    => 'approve', // Only get approved comments
					'orderby'   => 'date',
					'order'     => 'DESC',
				);

				$reviews = get_comments( $args );

				foreach ( $reviews as $review ) {
					$user_avatar    = get_avatar_url( $review->user_id );
					$timestamp      = strtotime( $review->comment_date );
					$comment_rating = get_comment_meta( $review->comment_ID, 'rating', true );
					$rating_percent = $comment_rating / 5 * 100 . '%';

					$output .= '<div class="quick-view__rating-item swiper-slide">';

					$output .= '<figure class="quick-view__user-avatar">'; /* User Avatar */
					$output .= '<img src="' . esc_url( $user_avatar ) . '" />';
					$output .= '</figure>'; /* End User Avatar */

					$output .= '<div style="display:inline-block;margin-left:10px;">'; /* Rating details */
					$output .= '<p class="review-author">' . esc_html( $review->comment_author ) . '</p>';
					$output .= '<p class="review-date">' . date( 'd M, Y', $timestamp ) . '</p>';
					$output .= '<div class="quick-view__product-rating" style="display:inline;background: linear-gradient(90deg, #fcb900 ' . $rating_percent . ', rgba(0,0,0,0.2) ' . $rating_percent . ');">★★★★★</div>';

					$output .= '</div>'; /* End Rating Details */
					$output .= '<div class="review-content">' . cozy_create_excerpt( $review->comment_content, 30 ) . '</div>';

					$output .= '</div>'; /* End Swiper Slide */
				}
				$output .= '</div>';

				// if ( $attributes['navigation']['enabled'] ) {
				// $output .= '<div class="swiper-button-prev"></div>';
				// $output .= '<div class="swiper-button-next"></div>';
				// }
				// if ( $attributes['pagination']['enabled'] ) {
				// }
				$output .= '<div class="swiper-pagination"></div>';

				$output .= '</div>';
				/* End Product Rating Carousel */
			}

			$output .= '</div>';
			/* End Product Details */

			wp_send_json_success(
				array(
					'render' => $output,
				)
			);
		}
	}
}

/* Strip chars */
if ( ! function_exists( 'cozy_remove_special_chars' ) ) {
	function cozy_remove_special_chars( $str, $args = array() ) {
		$special_chars = array( ';', '=', '(', ')', ' ' );
		if ( ! empty( $args ) && is_array( $args ) ) {
			$special_chars = array_diff( $special_chars, $args );
		}

		$str = wp_strip_all_tags( $str );

		return str_replace( $special_chars, '', $str );
	}
}

/**
 * Filters HTML content to allow only a specific set of HTML tags and attributes.
 *
 * This function helps prevent XSS (Cross-Site Scripting) attacks by sanitizing
 * user-provided content and ensuring only safe HTML elements and attributes
 * are allowed. It uses the wp_kses() function internally to enforce the whitelist.
 *
 * @param string $content The HTML content to be sanitized.
 *
 * @return string The sanitized content with only the allowed HTML tags and attributes.
 */
function cozy_filter_html_tags( $tag ) {
	$allowed_tags = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span', 'p' );

	// Convert the user input to lowercase to ensure case-insensitive comparison.
	$tag = strtolower( trim( $tag ) );

	// Check if the tag is in the whitelist; return it if valid, otherwise return 'p'.
	return in_array( $tag, $allowed_tags, true ) ? $tag : 'p';
}
