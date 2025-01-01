<?php

namespace Cozy_Addons\WooLayoutWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Core\Schemes\Typography;
use Elementor\Core\Schemes\Color;
use Elementor\Group_Control_Image_Size;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class Cozy_Addons_WooLayout_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'cozy-addons-product-list';
	}

	public function get_title()
	{
		return __('Products List', 'cozy-addons');
	}

	public function get_icon()
	{
		return 'eicon-products cozy-widget-icons';
	}
	public function get_keywords()
	{
		return ['woocommerce', 'cozy', 'cozy addons', 'product', 'woo'];
	}

	public function get_categories()
	{
		return ['cozy-addons-items'];
	}

	protected function register_controls()
	{
		$this->cozy_addons_query_options();
		$this->cozy_addons_content_options();
		$this->cozy_addons_add_to_cart_option();
		$this->cozy_addons_readmore_option();
		//Styles for widget elements
		$this->cozy_addons_cta_style_box_options();
		$this->cozy_addons_content_image_options();
		$this->cozy_addons_product_style_category_options();
		$this->cozy_addons_product_style_onsale_options();
		$this->cozy_addons_product_style_title_options();
		$this->cozy_addons_product_style_price_options();
		$this->cozy_addons_product_style_rating_star_options();
		$this->cozy_addons_products_pagination_options();
		$this->cozy_addons_cart_button_options();
		$this->cozy_addons_readmore_button_options();
		$this->cozy_addons_product_carousel_pagination_options();
		$this->cozy_addons_product_carousel_navigation_options();
	}


	/**
	 * Get all category of woocommerce
	 */
	private function cozy_addons_woo_categories()
	{
		$taxonomy = 'product_cat';
		$terms = get_terms($taxonomy);
		$options = array();

		if ($terms) {
			foreach ($terms as $term) {
				if (isset($term)) {
					if (isset($term->term_id) && isset($term->name)) {
						$options[$term->term_id] = $term->name;
					}
				}
			}
		}
		wp_reset_query();
		return $options;
	}

	/**
	 * Header Layout Options.
	 */
	private function cozy_addons_query_options()
	{
		$this->start_controls_section(
			'general_section',
			[
				'label' => __('Query Settings', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		if (cozy_addons_premium_access()) {
			$this->add_control(
				'product_select_layout',
				[
					'label' => __('Select Layout', 'cozy-addons'),
					'type' => Controls_Manager::SELECT,
					'default' => 'layout-grid',
					'options' => [
						'layout-grid' => esc_html__('Grid', 'cozy-addons'),
						'layout-list' => esc_html__('List', 'cozy-addons'),
						'layout-masonry' => esc_html__('Masonry', 'cozy-addons'),
						'layout-carousel' => esc_html__('Carousel', 'cozy-addons'),
					],
				]
			);
			$this->add_control(
				'product_grid_column',
				[
					'label' => __('Display Column', 'cozy-addons'),
					'type' => Controls_Manager::SELECT,
					'default' => 'col-grid-3',
					'options' => [
						'col-grid-1' => esc_html__('1 Column', 'cozy-addons'),
						'col-grid-2' => esc_html__('2 Column', 'cozy-addons'),
						'col-grid-3' => esc_html__('3 Column', 'cozy-addons'),
						'col-grid-4' => esc_html__('4 Column', 'cozy-addons'),
					],
					'conditions' => [
						'terms' => [
							[
								'name' => 'product_select_layout',
								'operator' => 'in',
								'value' => [
									'layout-grid',
									'layout-masonry',
								],
							],
						],
					],
				]
			);
		} else {
			$this->add_control(
				'product_select_layout',
				[
					'label' => __('Select Layout', 'cozy-addons'),
					'type' => Controls_Manager::SELECT,
					'default' => 'layout-grid',
					'options' => [
						'layout-grid' => esc_html__('Grid', 'cozy-addons'),
					],
				]
			);
			$this->add_control(
				'product_grid_column',
				[
					'label' => __('Display Column', 'cozy-addons'),
					'type' => Controls_Manager::SELECT,
					'default' => 'col-grid-3',
					'options' => [
						'col-grid-3' => esc_html__('3 Column', 'cozy-addons'),
					],
				]
			);
			$this->add_control(
				'cozy_woo_layout_notice_text',
				[
					'type' => \Elementor\Controls_Manager::RAW_HTML,
					'raw' => __('<a href="https://cozythemes.com/cozy-addons/" target="_blank">Upgrade to premium</a> version to unlock 3 more layout with columns options', 'cozy-addons'),
					'content_classes' => 'ct-upsell-notice',
				]
			);
		}
		$this->add_control(
			'cozy_carousel_post_per_view',
			[
				'label' => __('Display Column', 'cozy-addons'),
				'type' => Controls_Manager::NUMBER,
				'default' => 3,
				'min' => 1, // Minimum value
				'max' => 6, // Maximum value
				'step' => 0.1,
				'condition' => [
					'product_select_layout' => 'layout-carousel',
				],
			]
		);
		$this->add_control(
			'cozy_carousel_column_gap',
			[
				'label' => __('Columns Gap', 'cozy-addons'),
				'type' => Controls_Manager::NUMBER,
				'default' => 20,
				'min' => 0, // Minimum value
				'max' => 100, // Maximum value
				'step' => 1,
				'condition' => [
					'product_select_layout' => 'layout-carousel',
				],
			]
		);
		$this->add_control(
			'product_list_column',
			[
				'label' => __('Display Column', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'list-col-1',
				'options' => [
					'list-col-1' => esc_html__('1 Column', 'cozy-addons'),
					'list-col-2' => esc_html__('2 Column', 'cozy-addons'),
				],
				'condition' => [
					'product_select_layout' => 'layout-list',
				],
			]
		);
		$this->add_control(
			'show_carousel_pagination',
			[
				'label' => __('Show Carousel Pagination', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'no',
				'condition' => [
					'product_select_layout' => 'layout-carousel',
				],
			]
		);
		$this->add_control(
			'show_carousel_navigation',
			[
				'label' => __('Show Carousel Navigation', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
				'condition' => [
					'product_select_layout' => 'layout-carousel',
				],
			]
		);
		$this->add_control(
			'slide_navigation_left_icon',
			[
				'label' => __('Preview Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-left',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_carousel_navigation' => 'yes',
					'product_select_layout' => 'layout-carousel',
				],
			]
		);
		$this->add_control(
			'slide_navigation_right_icon',
			[
				'label' => __('Next Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-right',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_carousel_navigation' => 'yes',
					'product_select_layout' => 'layout-carousel',
				],
			]
		);
		$this->add_control(
			'product_grid_column_gap',
			[
				'label' => __('Column Gap', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 15,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder' => 'grid-column-gap: {{SIZE}}{{UNIT}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'product_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-grid',
								'layout-masonry',
							],
						],
					],
				],
			]
		);
		$this->add_control(
			'product_grid_rows_gap',
			[
				'label' => __('Box Bottom Gap', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 15,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'product_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-grid',
								'layout-list',
								'layout-masonry',
							],
						],
					],
				],
			]
		);
		// woo categories
		$this->add_control(
			'product_categories',
			[
				'label'       => __('Select Categories', 'cozy-addons'),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'options'     => $this->cozy_addons_woo_categories(),

			]
		);
		$this->add_control(
			'posts_per_page',
			[
				'label' => __('Posts Per Page', 'cozy-addons'),
				'type' => Controls_Manager::NUMBER,
				'default' => 5
			]
		);
		$this->add_control(
			'posts_offset',
			[
				'label' => __('Post Offset', 'cozy-addons'),
				'type' => Controls_Manager::NUMBER,
				'default' => 0
			]
		);
		$this->add_control(
			'product_orderby',
			[
				'label' => __('Order By', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'post_date',
				'options' => [
					'post_date' => __('Date', 'cozy-addons'),
					'post_title' => __('Title', 'cozy-addons'),
					'rand' => __('Random', 'cozy-addons'),
				],
			]
		);

		$this->add_control(
			'product_order',
			[
				'label' => __('Order', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => [
					'asc' => __('ASC', 'cozy-addons'),
					'desc' => __('DESC', 'cozy-addons'),
				],
			]
		);
		$this->add_control(
			'enable_pagination',
			[
				'label' => __('Enable Pagination', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'no',
				'conditions' => [
					'terms' => [
						[
							'name' => 'product_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-grid',
								'layout-masonry',
								'layout-list',
								'layout-list-2',
							],
						],
					],
				],
			]
		);


		$this->end_controls_section();
	}

	private function cozy_addons_content_options()
	{
		$this->start_controls_section(
			'general_content_section',
			[
				'label' => __('Content Settings', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'show_featured_image',
			[
				'label' => __('Enable Image', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
			]
		);
		$this->add_control(
			'show_title',
			[
				'label' => __('Enable Title', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label' => __('Title HTML Tag', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h3',
				'condition' => [
					'show_title' => 'yes',
				],
			]
		);
		$this->add_control(
			'show_excerpt',
			[
				'label' => __('Enable Excerpt', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'no',
			]
		);
		$this->add_control(
			'product_excerpt_length',
			[
				'label' => __('Excerpt Length', 'cozy-addons'),
				'type' => Controls_Manager::NUMBER,
				'default' => 30,
				'condition' => [
					'show_excerpt' => 'yes',
				],
			]
		);

		$this->add_control(
			'show_product_price',
			[
				'label' => __('Show Price', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
			]
		);
		$this->add_control(
			'show_product_rating',
			[
				'label' => __('Show Rating', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
			]
		);
		$this->add_control(
			'show_sale_badge',
			[
				'label' => __('Show Sale Badge', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'no',
			]
		);
		$this->add_control(
			'show_product_category',
			[
				'label' => __('Show Category', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'no',
			]
		);
		$this->end_controls_section();
	}
	/**
	 * Add to cart button option
	 */
	private function cozy_addons_add_to_cart_option()
	{
		$this->start_controls_section(
			'general_add_to_cart_button_option',
			[
				'label' => __('Add To Cart Button Option', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		if (cozy_addons_premium_access()) {
			$this->add_control(
				'show_add_to_cart',
				[
					'label' => __('Enable Add to Cart Button', 'cozy-addons'),
					'type' => Controls_Manager::SWITCHER,


					'default' => 'yes',
				]
			);
		} else {
			$this->add_control(
				'cozy_woo_add_to_crt_notice_text',
				[
					'type' => \Elementor\Controls_Manager::RAW_HTML,
					'raw' => __('<a href="https://cozythemes.com/cozy-addons/" target="_blank">Upgrade to premium</a> version to customize/show/hide add to cart button', 'cozy-addons'),
					'content_classes' => 'ct-upsell-notice',
				]
			);
		}
		$this->add_control(
			'show_cta_icon',
			[
				'label' => __('Show Button Icon', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
				'condition' => [
					'show_add_to_cart' => 'yes'
				],
			]
		);
		$this->add_control(
			'cta_cart_icon',
			[
				'label' => __('Icon', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'cart-icon-1',
				'options' => [
					'cart-icon-1' => esc_html__('Simple Cart', 'cozy-addons'),
					'cart-icon-2' => esc_html__('Cart With Arrow Down', 'cozy-addons'),
					'cart-icon-3' => esc_html__('Shopping Bag', 'cozy-addons'),
				],
				'condition' => [
					'show_cta_icon' => 'yes',
					'show_add_to_cart' => 'yes',
				],
			]
		);
		$this->add_control(
			'cta_icon_position',
			[
				'label' => __('Icon Position', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'before-text',
				'options' => [
					'before-text' => esc_html__('Before Text', 'cozy-addons'),
					'after-text' => esc_html__('After Text', 'cozy-addons'),
				],
				'condition' => [
					'show_cta_icon' => 'yes',
					'show_add_to_cart' => 'yes',
				],
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' => __('Button Label', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => __('Add To Cart', 'cozy-addons'),
				'placeholder' => __('Add To Cart', 'cozy-addons'),
				'condition' => [
					'show_add_to_cart' => 'yes',
				],
			]
		);

		$this->end_controls_section();
	}
	/**
	 * Read More button option
	 */
	private function cozy_addons_readmore_option()
	{
		$this->start_controls_section(
			'general_readmore_button_option',
			[
				'label' => __('Read More Button Option', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		if (cozy_addons_premium_access()) {
			$this->add_control(
				'show_readmore_cta',
				[
					'label' => __('Enable Read More Button', 'cozy-addons'),
					'type' => Controls_Manager::SWITCHER,


					'default' => 'no',
				]
			);
		} else {
			$this->add_control(
				'cozy_woo_readmore_notice_text',
				[
					'type' => \Elementor\Controls_Manager::RAW_HTML,
					'raw' => __('<a href="https://cozythemes.com/cozy-addons/" target="_blank">Upgrade to premium</a> version to customize/show/hide read more button', 'cozy-addons'),
					'content_classes' => 'ct-upsell-notice',
				]
			);
		}
		$this->add_control(
			'show_readmore_cta_icon',
			[
				'label' => __('Show Button Icon', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
				'condition' => [
					'show_readmore_cta' => 'yes'
				],
			]
		);
		$this->add_control(
			'readmore_cta_icon',
			[
				'label' => __('Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-angle-right',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_readmore_cta_icon' => 'yes',
					'show_readmore_cta' => 'yes',
				],
			]
		);
		$this->add_control(
			'readmore_cta_icon_position',
			[
				'label' => __('Icon Position', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'before-text',
				'options' => [
					'before-text' => esc_html__('Before Text', 'cozy-addons'),
					'after-text' => esc_html__('After Text', 'cozy-addons'),
				],
				'condition' => [
					'show_readmore_cta_icon' => 'yes',
					'show_readmore_cta' => 'yes',
				],
			]
		);
		$this->add_control(
			'readmore_button_text',
			[
				'label' => __('Button Label', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => __('Read More', 'cozy-addons'),
				'placeholder' => __('Read More', 'cozy-addons'),
				'condition' => [
					'show_readmore_cta' => 'yes',
				],
			]
		);
		$this->end_controls_section();
	}
	/**
	 *  Add to cart style
	 */
	private function cozy_addons_cart_button_options()
	{

		// Box.
		$this->start_controls_section(
			'product_cart_button_style',
			[
				'label' => __('Add to Cart Button Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'product_button_group_spacing',
			[
				'label' => __('Button Top Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 20,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}  section.cozy-addons-products .products-holder .product-box .cozy-button-group' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'cta_button_icon_size',
			[
				'label' => __('Icon Size', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 12,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box a.button .svg-inline--fa' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'cta_button_icon_spacing',
			[
				'label' => __('Icon Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'default' => [
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box a.button.before-text i' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box a.button.after-text i' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'cta_button_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-products .products-holder .product-box a.button',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 14]],
					'font_weight' => ['default' => 400],
				],
			]
		);

		// cta button padding
		$this->add_responsive_control(
			'cta_button_padding',
			[
				'label'      => __('Button Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default'	 => [
					'top' => '5',
					'right' => '10',
					'bottom' => '5',
					'left' => '10',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box a.button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],

			]
		);
		$this->start_controls_tabs('cta_button_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'cta_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products .products-holder .product-box a.button',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products .products-holder .product-box a.button',
			]
		);
		// Normal border radius
		$this->add_control(
			'button_border_radius',
			[
				'label' => __('Border Radius', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box a.button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// Box color
		$this->add_control(
			'button_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#6EC1E4',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box a.button' => 'background: {{VALUE}};',
				],
			]
		);
		//button text color
		$this->add_control(
			'button_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box a.button' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'cta_style_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);
		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products .products-holder .product-box a.button:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow_hover',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products .products-holder .product-box a.button:hover',
			]
		);

		// Hover border radius
		$this->add_control(
			'button_border_radius_hover',
			[
				'label' => __('Border Radius', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box a.button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// Box color
		$this->add_control(
			'button_bg_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#61CE70',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box a.button:hover' => 'background: {{VALUE}};',
				],
			]
		);
		//button text color
		$this->add_control(
			'cta_text_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box a.button:hover' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	/**
	 * Style Box Options.
	 */
	private function cozy_addons_cta_style_box_options()
	{

		// Box.
		$this->start_controls_section(
			'section_style_box',
			[
				'label' => __('Box Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Box alignment		
		$this->add_responsive_control(
			'content_align',
			[
				'label' => __('Alignment', 'cozy-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'cozy-addons'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __('Center', 'cozy-addons'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __('Right', 'cozy-addons'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'product_item_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-products .products-holder .product-box',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 16]],
					'font_weight' => ['default' => 400],
				],
				'separator' => 'before',
			]
		);

		// Box internal padding.
		$this->add_responsive_control(
			'grid_items_style_padding',
			[
				'label'      => __('Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'product_box_content_style_padding',
			[
				'label'      => __('Content Box Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->start_controls_tabs('box_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'box_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);
		// background Color
		$this->add_control(
			'background_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box' => 'color: {{VALUE}};',
				],
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products .products-holder .product-box',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products .products-holder .product-box',
			]
		);
		// Normal border radius
		$this->add_control(
			'border_radius',
			[
				'label' => __('Border Radius', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'box_style_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);
		$this->add_control(
			'background_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box:hover' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'text_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box:hover' => 'color: {{VALUE}};',
				],
			]
		);
		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products .products-holder .product-box:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products .products-holder .product-box:hover',
			]
		);

		// Hover border radius
		$this->add_control(
			'border_radius_hover',
			[
				'label' => __('Border Radius', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}
	/**
	 * Style Title
	 */
	private function cozy_addons_product_style_title_options()
	{

		// Box.
		$this->start_controls_section(
			'product_title_style_box',
			[
				'label' => __('Title Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'product_title_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-title',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 20]],
					'font_weight' => ['default' => 700],
				],
			]
		);
		$this->add_responsive_control(
			'product_title_style_padding',
			[
				'label'      => __('Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '4',
					'right' => '0',
					'bottom' => '4',
					'left' => '0',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->start_controls_tabs('product_title_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'product_title_box_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);

		$this->add_control(
			'product_title_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-title' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'product_title_box_style_tabs_normal_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);

		$this->add_control(
			'product_title_text_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#777777',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-title:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();


		$this->end_controls_section();
	}
	/**
	 * Style Price
	 */
	private function cozy_addons_product_style_price_options()
	{

		// Box.
		$this->start_controls_section(
			'product_price_style_box',
			[
				'label' => __('Price Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'product_price_style_padding',
			[
				'label'      => __('Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'product_price_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-price',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 16]],
					'font_weight' => ['default' => 400],
				],
			]
		);
		$this->add_control(
			'product_price_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Price Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-price' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}
	/**
	 * Rating star Title
	 */
	private function cozy_addons_product_style_rating_star_options()
	{

		// Box.
		$this->start_controls_section(
			'product_rating_start_style_box',
			[
				'label' => __('Rating Star Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'product_rating_style_padding',
			[
				'label'      => __('Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '5',
					'right' => '0',
					'bottom' => '5',
					'left' => '0',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-rating' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'product_rating_star_size',
			[
				'label' => __('Star Size', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 16,
				],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}  section.cozy-addons-products .products-holder .product-box .product-rating .star-rating' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'product_rating_star_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Star Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#f7d010',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-rating .star-rating:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-rating .star-rating span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Style Title
	 */
	private function cozy_addons_product_style_category_options()
	{

		// Box.
		$this->start_controls_section(
			'product_category_style_box',
			[
				'label' => __('Category Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'product_category_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-categories',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 13]],
					'font_weight' => ['default' => 400],
				],
			]
		);
		$this->add_responsive_control(
			'product_category_style_padding',
			[
				'label'      => __('Category Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-categories a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'product_category_style_spacing',
			[
				'label' => __('Category Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 3,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}}  section.cozy-addons-products .products-holder .product-box .product-categories a' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs('product_category_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'product_category_box_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);
		$this->add_control(
			'product_category_background_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Category Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-categories a' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'product_category_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-categories a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'product_category_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-categories a',
			]
		);
		$this->add_control(
			'product_category_border_radius',
			[
				'label' => __('Border Radius', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-categories a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'product_category_style_tabs_normal_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);

		$this->add_control(
			'product_category_background_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Category Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-categories a:hover' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'product_category_text_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#676767',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-categories a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'product_category_border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-categories a:hover',
			]
		);
		$this->add_control(
			'product_category_border_radius_hover',
			[
				'label' => __('Border Radius', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box .product-categories a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();


		$this->end_controls_section();
	}
	/**
	 * Featured image style
	 */
	private function cozy_addons_content_image_options()
	{
		$this->start_controls_section(
			'product_featrued_image_style',
			[
				'label' => __('Image Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_featured_image' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'product_image_box_style_padding',
			[
				'label'      => __('Image Box Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-products .cozy-featured-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'product_image_bottom_spacing',
			[
				'label' => __('Image Bottom Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -50,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .cozy-featured-img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'product_product_image_wrap_width',
			[
				'label' => __('Image Box Width', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
				],

				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}}  section.cozy-addons-products .cozy-featured-img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'product_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'layout-list',
						],
						[
							'name' => 'product_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'layout-list-2',
						],
					],
				],
			]
		);
		$this->add_control(
			'product_image_width',
			[
				'label' => __('Image Width', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
				],

				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}}  section.cozy-addons-products .cozy-featured-img img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'product_image_height',
			[
				'label' => __('Image Height', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}}  section.cozy-addons-products .cozy-featured-img img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'product_image_border_radius',
			[
				'label' => __('Border Radius', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .cozy-featured-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'product_image_box_shadow',
				'label' => __('Image Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products .cozy-featured-img',
			]
		);
		$this->end_controls_section();
	}



	/**
	 *  readmore style
	 */
	private function cozy_addons_readmore_button_options()
	{

		// Box.
		$this->start_controls_section(
			'product_readmore_button_style',
			[
				'label' => __('Read More Button Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'product_readmore_button_spacing',
			[
				'label' => __('Button Top Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 20,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}  section.cozy-addons-products .products-holder .product-box span.readmore-button' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'product_readmore_button_icon_size',
			[
				'label' => __('Icon Size', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 12,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box span.readmore-button a.post-more .button-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'product_readmore_button_icon_spacing',
			[
				'label' => __('Icon Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'default' => [
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box span.readmore-button a.post-more.before-text .button-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box span.readmore-button a.post-more.after-text .button-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'product_readmore_button_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-products .products-holder .product-box span.readmore-button a.post-more',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 14]],
					'font_weight' => ['default' => 400],
				],
			]
		);

		// cta button padding
		$this->add_responsive_control(
			'product_readmore_button_padding',
			[
				'label'      => __('Button Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default'	 => [
					'top' => '5',
					'right' => '10',
					'bottom' => '5',
					'left' => '10',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box span.readmore-button a.post-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],

			]
		);
		$this->start_controls_tabs('product_readmore_button_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'product_readmore__style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'product_readmore_button_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products .products-holder .product-box span.readmore-button a.post-more',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'product_readmore_button_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products .products-holder .product-box span.readmore-button a.post-more',
			]
		);
		// Normal border radius
		$this->add_control(
			'product_readmore_button_border_radius',
			[
				'label' => __('Border Radius', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box span.readmore-button a.post-more' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// Box color
		$this->add_control(
			'product_readmore_button_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#6EC1E4',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box span.readmore-button a.post-more' => 'background: {{VALUE}};',
				],
			]
		);
		//button text color
		$this->add_control(
			'product_readmore_button_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box span.readmore-button a.post-more' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'product_readmore_style_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);
		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'product_readmore_button_border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products .products-holder .product-box span.readmore-button a.post-more:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'product_readmore_button_box_shadow_hover',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products .products-holder .product-box span.readmore-button a.post-more:hover',
			]
		);

		// Hover border radius
		$this->add_control(
			'product_readmore_border_radius_hover',
			[
				'label' => __('Border Radius', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box span.readmore-button a.post-more:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// Box color
		$this->add_control(
			'product_readmore_bg_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#61CE70',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box span.readmore-button a.post-more:hover' => 'background: {{VALUE}};',
				],
			]
		);
		//button text color
		$this->add_control(
			'product_readmore_text_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .products-holder .product-box span.readmore-button a.post-more:hover' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	/**
	 * Onsale Style
	 */
	private function cozy_addons_product_style_onsale_options()
	{

		// Box.
		$this->start_controls_section(
			'product_onsale_style_box',
			[
				'label' => __('Onsale Tag Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'onsale_category_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-products .cozy-featured-img span.onsale',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 13]],
					'font_weight' => ['default' => 400],
				],
			]
		);
		$this->add_responsive_control(
			'product_onsale_style_padding',
			[
				'label'      => __('Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '3',
					'right' => '10',
					'bottom' => '3',
					'left' => '10',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-products .cozy-featured-img span.onsale' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'product_onsale_style_spacing',
			[
				'label' => __('Onsale Vertical Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
					'size' => 4,
				],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 95,
					],
				],
				'selectors' => [
					'{{WRAPPER}}  section.cozy-addons-products .cozy-featured-img span.onsale' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'product_onsale_horizontal_style_spacing',
			[
				'label' => __('Onsale Horizontal Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
					'size' => 5,
				],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 90,
					],
				],
				'selectors' => [
					'{{WRAPPER}}  section.cozy-addons-products .cozy-featured-img span.onsale' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'product_onsale_background_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .cozy-featured-img span.onsale' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'product_onsale_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .cozy-featured-img span.onsale' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'product_onsale_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products .cozy-featured-img span.onsale',
			]
		);
		$this->add_control(
			'product_onsale_border_radius',
			[
				'label' => __('Border Radius', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products .cozy-featured-img span.onsale' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}
	/**
	 * slide pagination style
	 */
	private function cozy_addons_product_carousel_pagination_options()
	{
		$this->start_controls_section(
			'slider_pagination_style',
			[
				'label' => __('Pagination Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_carousel_pagination' => 'yes',
					'product_select_layout' => 'layout-carousel',
				],

			]
		);
		$this->add_control(
			'slider_pagination_style_icon_width',
			[
				'label' => __('Pagination Width', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products.layout-carousel .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'slider_pagination_style_icon_height',
			[
				'label' => __('Pagination Height', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products.layout-carousel .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'pagination_box_border_radius',
			[
				'label' => __('Pagination Radius', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products.layout-carousel .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs('pagination_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'pagination_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);
		// Normal border
		// Box color
		$this->add_control(
			'pagination_box_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Pagination Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products.layout-carousel .swiper-pagination-bullet' => 'background: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'pagination_box_style_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);

		// Box color
		$this->add_control(
			'pagination_box_bg_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Pagination Hover Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(255, 255, 255, 1)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products.layout-carousel .swiper-pagination-bullet:hover' => 'background: {{VALUE}};',
				],
			]
		);



		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}
	/**
	 * navigation style
	 */
	private function cozy_addons_product_carousel_navigation_options()
	{
		$this->start_controls_section(
			'slider_navigation_style',
			[
				'label' => __('Navigation Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_carousel_navigation' => 'yes',
					'product_select_layout' => 'layout-carousel',
				],

			]
		);
		$this->add_control(
			'slider_navigation_style_icon_size',
			[
				'label' => __('Icon Size', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products.layout-carousel .cozy-slide-nav' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'slider_navigation_style_icon_width',
			[
				'label' => __('Icon Box Width', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 250,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 35,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products.layout-carousel .cozy-slide-nav' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'slider_navigation_style_icon_height',
			[
				'label' => __('Icon Box Height', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 250,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 35,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products.layout-carousel .cozy-slide-nav' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-products.layout-carousel .cozy-slide-nav.cozy-slide-next' => 'line-height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-products.layout-carousel .cozy-slide-nav.cozy-slide-prev' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs('navigation_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'navigation_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'navigation_box_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products.layout-carousel .cozy-slide-nav',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_box_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products.layout-carousel .cozy-slide-nav',
			]
		);
		// Normal border radius
		$this->add_control(
			'navigation_box_border_radius',
			[
				'label' => __('Border Radius', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products.layout-carousel .cozy-slide-nav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// Box color
		$this->add_control(
			'navigation_box_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#6EC1E4',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products.layout-carousel .cozy-slide-nav' => 'background: {{VALUE}};',
				],
			]
		);
		//button text color
		$this->add_control(
			'navigation_box_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Icon Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products.layout-carousel .cozy-slide-nav' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'navigation_box_style_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);
		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'navigation_box_border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products.layout-carousel .cozy-slide-nav:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_box_shadow_hover',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products.layout-carousel .cozy-slide-nav:hover',
			]
		);

		// Hover border radius
		$this->add_control(
			'navigation_box_border_radius_hover',
			[
				'label' => __('Border Radius', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products.layout-carousel .cozy-slide-nav:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// Box color
		$this->add_control(
			'navigation_box_bg_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#61CE70',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products.layout-carousel .cozy-slide-nav:hover' => 'background: {{VALUE}};',
				],
			]
		);
		//button text color
		$this->add_control(
			'navigation_box_text_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products.layout-carousel .cozy-slide-nav:hover' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}
	private function cozy_addons_products_pagination_options()
	{
		$this->start_controls_section(
			'products_pagination_style_setup',
			[
				'label' => __('Pagination Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'enable_pagination' => 'yes',
				],
			]
		);
		$this->add_control(
			'pagination_content_align',
			[
				'label' => __('Alignment', 'cozy-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'cozy-addons'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __('Center', 'cozy-addons'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __('Right', 'cozy-addons'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'products_pagination_style_padding',
			[
				'label'      => __('Pagination Section Spacing', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default'	 => [
					'top' => '2',
					'right' => '10',
					'bottom' => '2',
					'left' => '10',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .cozy-addons-pagination' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],

			]
		);
		$this->add_control(
			'products_pagination_style_spacing',
			[
				'label' => __('Section Top Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 250,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'products_pagination_paginate_style_spacing',
			[
				'label' => __('Pagination Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 2,
				],
				'range' => [
					'px' => [
						'min' => -5,
						'max' => 30,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination a' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cozy-addons-pagination span.page-numbers.current' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'products_pagination_paginate_style_padding',
			[
				'label'      => __('Pagination Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default'	 => [
					'top' => '2',
					'right' => '6',
					'bottom' => '2',
					'left' => '6',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .cozy-addons-pagination a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
					'{{WRAPPER}} .cozy-addons-pagination span.page-numbers.current' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],

			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'products_pagination_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} .cozy-addons-pagination',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 16]],
					'font_weight' => ['default' => 400],
				],
			]
		);
		$this->start_controls_tabs('products_pagination_box_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'products_pagination_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);

		$this->add_control(
			'products_pagination_bgcolor',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#676767',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination a' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'products_pagination_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'products_pagination_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}}  .cozy-addons-pagination a',
			]
		);
		// Hover border radius
		$this->add_control(
			'products_pagination_border_radius',
			[
				'label' => __('Border Radius', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}}  .cozy-addons-pagination a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'products_pagination_style_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);
		$this->add_control(
			'products_pagination_bgcolor_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#343434',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination a:hover' => 'background: {{VALUE}};',
					'{{WRAPPER}} .cozy-addons-pagination span.page-numbers.current' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'products_pagination_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cozy-addons-pagination span.page-numbers.current' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'products_pagination_border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination a:hover',
					'{{WRAPPER}} .cozy-addons-pagination span.page-numbers.current',
				],
			]
		);
		// Hover border radius
		$this->add_control(
			'products_pagination_border_radius_hover',
			[
				'label' => __('Border Radius', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cozy-addons-pagination span.page-numbers.current' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);



		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}
	protected function render($instance = [])
	{
		include_once(ABSPATH . 'wp-admin/includes/plugin.php');
		if (is_plugin_active('woocommerce/woocommerce.php')) {
			$settings = $this->get_settings();
			$selected_layout = $settings['product_select_layout']; ?>
			<section class="cozy-addons-products <?php echo esc_attr($selected_layout); ?>">
				<?php
				include(COZY_ADDONS_PLUGIN_DIR . 'public/widgets/woolayout/products-layout.php');
				?>

			</section> <!-- featured-layout -->
<?php } else {
			echo __('Please Install & Activate the Woocommerce Plugin', 'cozy-addons');
		}
	}
}
