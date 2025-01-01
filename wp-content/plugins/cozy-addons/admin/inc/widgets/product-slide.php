<?php

namespace Cozy_Addons\WOOSlideWidgets;

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
class Cozy_Addons_WOOSlide_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'cozy-addons-woo-slide';
	}

	public function get_title()
	{
		return __('Product Slider', 'cozy-addons');
	}

	public function get_icon()
	{
		return 'eicon-post-slider cozy-widget-icons';
	}
	public function get_keywords()
	{
		return ['woocommerce', 'sldier', 'cozy addons', 'product', 'woo'];
	}

	public function get_categories()
	{
		return ['cozy-addons-items'];
	}

	protected function register_controls()
	{
		if (cozy_addons_premium_access()) {
			$this->cozy_addons_content_options();
			$this->cozy_addons_add_to_cart_option();
			$this->cozy_addons_readmore_option();
			//Styles for widget elements
			$this->cozy_addons_cta_style_box_options();
			$this->cozy_addons_product_image_options();
			$this->cozy_addons_slider_title_options();
			$this->cozy_addons_product_style_price_options();
			$this->cozy_addons_cart_button_options();
			$this->cozy_addons_readmore_button_options();
			$this->cozy_addons_product_carousel_pagination_options();
			$this->cozy_addons_product_carousel_navigation_options();
		}
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
	private function cozy_addons_content_options()
	{
		$this->start_controls_section(
			'general_section',
			[
				'label' => __('General', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'product_select_layout',
			[
				'label' => __('Select Layout', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'layout-1',
				'options' => [
					'layout-1' => esc_html__('Layout 1', 'cozy-addons'),
					'layout-2' => esc_html__('Layout 2', 'cozy-addons'),
					'layout-3' => esc_html__('Layout 3', 'cozy-addons'),
				],
			]
		);
		$this->add_control(
			'product_slider_image_position',
			[
				'label' => __('Image Position', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'slide-image-left',
				'options' => [
					'slide-image-left' => esc_html__('Left', 'cozy-addons'),
					'slide-image-right' => esc_html__('Right', 'cozy-addons'),
				],
				'condition' => [
					'product_select_layout' => 'layout-3',
				],
			]
		);
		if (cozy_addons_premium_access()) {
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
						'product_select_layout' => 'layout-2',
					],
				]
			);
		}
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
					'product_select_layout' => 'layout-2',
				],
			]
		);
		// woo categories
		$this->add_control(
			'products_categories',
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
				'default' => 'h1',
			]
		);

		$this->add_control(
			'show_excerpt',
			[
				'label' => __('Enable Excerpt', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator' => 'before',
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
			'show_carousel_pagination',
			[
				'label' => __('Show Slide Pagination', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
			]
		);
		$this->add_control(
			'show_carousel_navigation',
			[
				'label' => __('Show Slide Navigation', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
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
				],
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
		$this->add_control(
			'show_add_to_cart',
			[
				'label' => __('Enable Add to Cart Button', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
			]
		);
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
		$this->add_control(
			'show_readmore_cta',
			[
				'label' => __('Enable Read More Button', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
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
					'show_readmore_cta' => 'yes',
					'show_readmore_cta_icon' => 'yes',
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
	 *slider image style
	 */
	private function cozy_addons_product_image_options()
	{
		$this->start_controls_section(
			'slider_product_image_style_box',
			[
				'label' => __('Image Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'product_select_layout' => 'layout-3',
				],
			]

		);
		$this->add_control(
			'slider_product_image_wrapper_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Image Holder Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products-slider.layout-3 .products-holder .product-box .cozy-featured-img' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'product_slide_image_wrapper_padding',
			[
				'label'      => __('Holder Padding', 'cozy-addons'),
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
					'{{WRAPPER}} section.cozy-addons-products-slider.layout-3 .products-holder .product-box .cozy-featured-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'cozy_product_image_width',
			[
				'label' => __('Image Width', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1200,
					],
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],

				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products-slider.layout-3 .products-holder .product-box .cozy-featured-img img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'cozy_product_image_height',
			[
				'label' => __('Image Height', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1200,
					],
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],

				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products-slider.layout-3 .products-holder .product-box .cozy-featured-img img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'product_image_alignment',
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
					'{{WRAPPER}} section.cozy-addons-products-slider.layout-3 .products-holder .product-box .cozy-featured-img' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'product_image_button_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products-slider.layout-3 .products-holder .product-box .cozy-featured-img img',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'product_image_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products-slider.layout-3 .products-holder .product-box .cozy-featured-img img',
			]
		);
		// Normal border radius
		$this->add_control(
			'product_image_border_radius',
			[
				'label' => __('Border Radius', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products-slider.layout-3 .products-holder .product-box .cozy-featured-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'product_slide_image_padding',
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
					'{{WRAPPER}} section.cozy-addons-products-slider.layout-3 .products-holder .product-box .cozy-featured-img img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->end_controls_section();
	}
	/**
	 *slider content style
	 */
	private function cozy_addons_slider_title_options()
	{
		$this->start_controls_section(
			'slider_content_style_box',
			[
				'label' => __('Title Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Title Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-products-slider .product-box .product-title',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 44]],
					'font_weight' => ['default' => 700],
					'line_height' => ['default' => ['size' => 48]],
				],
			]
		);
		$this->add_control(
			'slider_title_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Title Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box .product-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_bottom_spacing',
			[
				'label' => __('Title Bottom  Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 15,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box .product-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

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
		$this->add_responsive_control(
			'cozy_product_slider_wrapper_height',
			[
				'label' => __('Slider Height', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1200,
					],
					'vh' => [
						'min' => 1,
						'max' => 100,
					],
				],

				'default' => [
					'unit' => 'px',
					'size' => 650,
				],
				'size_units' => ['px', 'vh'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products-slider .products-holder' => 'height: {{SIZE}}{{UNIT}};',
				],
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
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-products-slider.layout-3 .cozy-swiper-pagination.swiper-pagination-bullets' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'product_slide_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-products-slider .product-box',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 16]],
					'font_weight' => ['default' => 400],

				],
			]
		);

		// Box internal padding.
		$this->add_responsive_control(
			'product_slide_padding',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box .product-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'background_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Bakcground Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'background_overlay_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Bakcground Overlay Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 0.65)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products-slider.layout-1 .product-box:after' => 'background: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-products-slider.layout-2 .product-box:after' => 'background: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-products-slider.layout-3 .product-box .product-content:before' => 'background: {{VALUE}};',
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
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box' => 'color: {{VALUE}};',
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
					'{{WRAPPER}}  section.cozy-addons-products-slider .product-box  .cozy-button-group' => 'margin-top: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box a.button .svg-inline--fa' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box a.button.before-text i' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box a.button.after-text i' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'cta_button_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-products-slider .product-box a.button',
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
					'top' => '7',
					'right' => '15',
					'bottom' => '7',
					'left' => '15',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box a.button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-products-slider .product-box a.button',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products-slider .product-box a.button',
			]
		);
		// Normal border radius
		$this->add_control(
			'button_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box a.button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box a.button' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box a.button' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-products-slider .product-box a.button:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow_hover',
				'label' => __('Box Shadow', 'plugin-domain'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products-slider .product-box a.button:hover',
			]
		);

		// Hover border radius
		$this->add_control(
			'button_border_radius_hover',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box a.button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box a.button:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box a.button:hover' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
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
					'{{WRAPPER}}  section.cozy-addons-products-slider .product-box span.readmore-button' => 'margin-top: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box span.readmore-button a.ca-post-more .button-icon' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box span.readmore-button a.ca-post-more.before-text .button-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box span.readmore-button a.ca-post-more.after-text .button-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'product_readmore_button_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-products-slider .product-box span.readmore-button a.ca-post-more',
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
					'top' => '7',
					'right' => '15',
					'bottom' => '7',
					'left' => '15',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box span.readmore-button a.ca-post-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-products-slider .product-box span.readmore-button a.ca-post-more',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'product_readmore_button_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products-slider .product-box span.readmore-button a.ca-post-more',
			]
		);
		// Normal border radius
		$this->add_control(
			'product_readmore_button_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box span.readmore-button a.ca-post-more' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box span.readmore-button a.ca-post-more' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box span.readmore-button a.ca-post-more' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-products-slider .product-box span.readmore-button a.ca-post-more:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'product_readmore_button_box_shadow_hover',
				'label' => __('Box Shadow', 'plugin-domain'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products-slider .product-box span.readmore-button a.ca-post-more:hover',
			]
		);

		// Hover border radius
		$this->add_control(
			'product_readmore_border_radius_hover',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box span.readmore-button a.ca-post-more:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box span.readmore-button a.ca-post-more:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .product-box span.readmore-button a.ca-post-more:hover' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
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
					'{{WRAPPER}} section.cozy-addons-products-slider .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'pagination_box_border_radius',
			[
				'label' => __('Pagination Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products-slider .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .swiper-pagination-bullet' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .swiper-pagination-bullet:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .cozy-slide-nav' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .cozy-slide-nav' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-products-slider.layout-3 .products-holder .product-box .cozy-slide-nav' => 'left:-{{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .cozy-slide-nav' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-products-slider .cozy-slide-nav.cozy-slide-next' => 'line-height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-products-slider .cozy-slide-nav.cozy-slide-prev' => 'line-height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-products-slider.layout-3 .products-holder .product-box .cozy-slide-next.cozy-slide-nav' => 'margin-top: {{SIZE}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-products-slider .cozy-slide-nav',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_box_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products-slider .cozy-slide-nav',
			]
		);
		// Normal border radius
		$this->add_control(
			'navigation_box_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products-slider .cozy-slide-nav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .cozy-slide-nav' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .cozy-slide-nav' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-products-slider .cozy-slide-nav:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_box_shadow_hover',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-products-slider .cozy-slide-nav:hover',
			]
		);

		// Hover border radius
		$this->add_control(
			'navigation_box_border_radius_hover',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products-slider .cozy-slide-nav:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .cozy-slide-nav:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .cozy-slide-nav:hover' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-products-slider .products-holder .product-box .product-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'product_price_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-products-slider .products-holder .product-box .product-price',
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
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-products-slider .products-holder .product-box .product-price' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}
	protected function render($instance = [])
	{
		include_once(ABSPATH . 'wp-admin/includes/plugin.php');
		if (cozy_addons_premium_access()) {
			if (is_plugin_active('woocommerce/woocommerce.php')) {
				$settings = $this->get_settings();
				$selected_layout = $settings['product_select_layout']; ?>

				<section class="cozy-addons-products-slider <?php echo esc_attr($selected_layout); ?>">
					<?php
					include(COZY_ADDONS_PLUGIN_DIR . 'public/widgets/woolayout/products-slider.php');
					?>

				</section> <!-- featured-layout -->
			<?php } else {
				echo __('Please Install & Activate the Woocommerce Plugin', 'cozy-addons');
			}
		} else { ?>
			<a href="https://cozythemes.com/cozy-addons/" target="_blank"><?php echo __('Upgrade To Premium Version - https://cozythemes.com/cozy-addons/', 'cozy-addons'); ?></a>
<?php }
	}
}
