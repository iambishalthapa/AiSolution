<?php

namespace Cozy_Addons\SliderWidgets;

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
class Cozy_Addons_Slider_Widget extends Widget_Base
{
	public function get_name()
	{
		return 'cozy-addons-slide-widget';
	}

	public function get_title()
	{
		return __('Slider', 'cozy-addons');
	}

	public function get_icon()
	{
		return 'eicon-slides cozy-widget-icons';
	}
	public function get_keywords()
	{
		return ['slider', 'cozy', 'cozy addons'];
	}
	public function get_categories()
	{
		return ['cozy-addons-items'];
	}

	protected function register_controls()
	{
		$this->cozy_addons_slider_general_options();

		//Styles for widget elements
		$this->cozy_addons_slider_style_box_options();
		$this->cozy_addons_featured_image_options();
		$this->cozy_addons_slider_content_options();
		$this->cozy_addons_slider_style_navigation_options();
		$this->cozy_addons_slider_style_pagination_options();
		$this->cozy_addons_slider_primary_button_options();
		$this->cozy_addons_slider_secondary_button_options();
	}




	/**
	 * Slider Geneal layout
	 */
	private function cozy_addons_slider_general_options()
	{
		$ct_slider_access = false;
		if (cozy_addons_premium_access()) {
			$ct_slider_access = true;
		}

		$this->start_controls_section(
			'cozy_content_section',
			[
				'label' => __('Slides', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		if (cozy_addons_premium_access()) {
			$this->add_control(
				'cozy_slider_select_layout',
				[
					'label' => __('Select Layout', 'cozy-addons'),
					'type' => Controls_Manager::SELECT,
					'default' => 'slide-layout-1',
					'options' => [
						'slide-layout-1' => esc_html__('Layout 1', 'cozy-addons'),
						'slide-layout-2' => esc_html__('Layout 2', 'cozy-addons'),
						'slide-layout-3' => esc_html__('Layout 3', 'cozy-addons'),
					],
				]
			);
		} else {
			$this->add_control(
				'cozy_slider_select_layout',
				[
					'label' => __('Select Layout', 'cozy-addons'),
					//'description' => __('Upgrade to Pro Version to unlock 2 more advanced layout', 'cozy-addons'),
					'type' => Controls_Manager::SELECT,
					'default' => 'slide-layout-1',
					'options' => [
						'slide-layout-1' => esc_html__('Layout 1', 'cozy-addons'),
					],
				]
			);
			$this->add_control(
				'cozy_slider_layout_notice_text',
				[
					'type' => \Elementor\Controls_Manager::RAW_HTML,
					'raw' => __('<a href="https://cozythemes.com/cozy-addons/" target="_blank">Upgrade to premium</a> version to unlock 2 more advanced layout', 'cozy-addons'),
					'content_classes' => 'ct-upsell-notice',
				]
			);
		}
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
						'cozy_slider_select_layout' => 'slide-layout-2',
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
					'cozy_slider_select_layout' => 'slide-layout-2',
				],
			]
		);
		$this->add_control(
			'cozy_slider_image_position',
			[
				'label' => __('Image Position', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'slide-image-left',
				'options' => [
					'slide-image-left' => esc_html__('Left', 'cozy-addons'),
					'slide-image-right' => esc_html__('Right', 'cozy-addons'),
				],
				'condition' => [
					'cozy_slider_select_layout' => 'slide-layout-3',
				],
			]
		);
		$this->add_control(
			'show_slider_pagination',
			[
				'label' => __('Show Pagination', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
			]
		);
		$this->add_control(
			'show_slider_navigation',
			[
				'label' => __('Show Navigation', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
			]
		);
		$this->add_control(
			'slide_navigation_left_icon',
			[
				'label' => __('Prev Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-left',
					'library' => 'fa-solid',
				],
				'conditions' => [
					'show_slider_navigation' => 'yes',
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'cozy_slider_select_layout',
							'operator' => 'in',
							'value' => [
								'slide-layout-1',
								'slide-layout-2',
							],
						]
					],
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
					'show_slider_navigation' => 'yes',
				],
			]
		);
		// List Repeater
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'cozy_slider_image',
			[
				'label' => esc_html__('Slider Image', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'cozy_slide_sub_heading',
			[
				'label' => __('Sub Heading', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Sub Title', 'cozy-addons'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'cozy_slide_heading',
			[
				'label' => __('Heading', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('New Slide', 'cozy-addons'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
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
		$repeater->add_control(
			'cozy_slide_description',
			[
				'label' => __('Description', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'default' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'cozy-addons'),
				'placeholder' => __('Add description Here', 'cozy-addons'),
			]
		);
		$repeater->add_control(
			'show_primary_btn',
			[
				'label' => __('Primary Button', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
			]
		);
		$repeater->add_control(
			'primary_cta_icon',
			[
				'label' => __('Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_primary_btn' => 'yes',
				],
			]
		);
		$repeater->add_control(
			'primary_cta_icon_position',
			[
				'label' => __('Icon option', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'before-text',
				'options' => [
					'before-text' => esc_html__('Before Text', 'cozy-addons'),
					'after-text' => esc_html__('After Text', 'cozy-addons'),
				],
				'condition' => [
					'show_primary_btn' => 'yes',
				],
			]
		);
		$repeater->add_control(
			'primary_button_label',
			[
				'label' => __('Button Label', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => __('Read More', 'cozy-addons'),
				'placeholder' => __('Read More', 'cozy-addons'),
				'condition' => [
					'show_primary_btn' => 'yes',
				],
			]
		);
		$repeater->add_control(
			'primary_button_link',
			[
				'label' => __('Button Link', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'cozy-addons'),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => true,
				],
				'condition' => [
					'show_primary_btn' => 'yes',
				],
			]
		);

		$repeater->add_control(
			'show_secondary_btn',
			[
				'label' => __('Secondary Button', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'no',
				'separator' => 'before',
			]
		);
		$repeater->add_control(
			'secondary_cta_icon',
			[
				'label' => __('Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => '',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_secondary_btn' => 'yes',
				],
			]
		);
		$repeater->add_control(
			'secondary_cta_icon_position',
			[
				'label' => __('Icon option', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'before-text',
				'options' => [
					'before-text' => esc_html__('Before Text', 'cozy-addons'),
					'after-text' => esc_html__('After Text', 'cozy-addons'),
				],
				'condition' => [
					'show_secondary_btn' => 'yes',
				],
			]
		);
		$repeater->add_control(
			'secondary_button_label',
			[
				'label' => __('Button Label', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => __('Read More', 'cozy-addons'),
				'placeholder' => __('Read More', 'cozy-addons'),
				'condition' => [
					'show_secondary_btn' => 'yes',
				],
			]
		);
		$repeater->add_control(
			'Secondary_button_link',
			[
				'label' => __('Button Link', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'cozy-addons'),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => true,
				],
				'condition' => [
					'show_secondary_btn' => 'yes',
				],
			]
		);

		//addig featurs list
		$this->add_control(
			'slides_list',
			[
				'label' => __('Slides', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'item_actions' => [
					'add'       => $ct_slider_access,
					'duplicate' => $ct_slider_access,
					'remove'    => true,
					'sort'      => true,
					'update' 	=> true,
				],
				'default' => [
					[
						'cozy_slide_heading' => __('Slide 1', 'cozy-addons'),
					],
				],
				'title_field' => '{{{ cozy_slide_heading }}}',
			]
		);
		if (!cozy_addons_premium_access()) {
			$this->add_control(
				'cozy_slider_notice_text',
				[
					'type' => \Elementor\Controls_Manager::RAW_HTML,
					'raw' => __('<a href="https://cozythemes.com/cozy-addons/" target="_blank">Upgrade to premium</a> version to get full access and unlock add/delete  unlimited slider item.', 'cozy-addons'),
					'content_classes' => 'ct-upsell-notice',
				]
			);
		}
		$this->end_controls_section();
	}



	/**
	 * slide pagination style
	 */
	private function cozy_addons_slider_style_pagination_options()
	{
		$this->start_controls_section(
			'slider_pagination_style',
			[
				'label' => __('Pagination Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_slider_pagination' => 'yes',
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
					'{{WRAPPER}} section.cozy-addons-slider .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-slider .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-slider .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'value' => Color::COLOR_2,
				],
				'default'   => 'rgba(255, 255, 255, 1)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider .swiper-pagination-bullet' => 'background: {{VALUE}};',
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
					'value' => Color::COLOR_2,
				],
				'default'   => '#676767',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider .swiper-pagination-bullet:hover' => 'background: {{VALUE}};',
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
	private function cozy_addons_slider_style_navigation_options()
	{
		$this->start_controls_section(
			'slider_navigation_style',
			[
				'label' => __('Navigation Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_slider_navigation' => 'yes',
				],

			]
		);
		$this->add_control(
			'slider_navigation_icon_spacing',
			[
				'label' => __('Navigation Icon Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider  .cozy-slide-nav.cozy-slide-prev' => 'left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-slider .cozy-slide-nav.cozy-slide-next' => 'right: {{SIZE}}{{UNIT}};',
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
					'size' => 17,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider .cozy-slide-nav' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider .cozy-slide-nav' => 'width: {{SIZE}}{{UNIT}};',
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
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider .cozy-slide-nav' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-slider .cozy-slide-nav.cozy-slide-next' => 'line-height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-slider .cozy-slide-nav.cozy-slide-prev' => 'line-height: {{SIZE}}{{UNIT}};',
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
				'selector' => 'section.cozy-addons-slider .cozy-slide-nav',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_box_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-slider .cozy-slide-nav',
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
					'{{WRAPPER}} section.cozy-addons-slider .cozy-slide-nav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'value' => Color::COLOR_2,
				],
				'default'   => '#6EC1E4',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider .cozy-slide-nav' => 'background: {{VALUE}};',
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
				'default'   => 'rgba(255, 255, 255, 1)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider .cozy-slide-nav' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-slider .cozy-slide-nav:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_box_shadow_hover',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-slider .cozy-slide-nav:hover',
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
					'{{WRAPPER}} section.cozy-addons-slider .cozy-slide-nav:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'value' => Color::COLOR_2,
				],
				'default'   => '#61CE70',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider .cozy-slide-nav:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-slider .cozy-slide-nav:hover' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	/**
	 * slider primary button style
	 */
	private function cozy_addons_slider_primary_button_options()
	{

		// Box.
		$this->start_controls_section(
			'slider_primary_button',
			[
				'label' => __('Primary Button', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'slider_primary_button_icon_size',
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
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.primary-button .button-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'slider_primary_button_icon_spacing',
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
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.primary-button.before-text .button-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.primary-button.after-text .button-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'slider_primary_button_spacing',
			[
				'label' => __('Button Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'default' => [
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.primary-button' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'primary_button_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.primary-button',
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
					'top' => '15',
					'right' => '30',
					'bottom' => '15',
					'left' => '30',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.primary-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
				'selector' => 'section.cozy-addons-slider .ca-slide-content a.primary-button',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.primary-button',
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
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.primary-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'value' => Color::COLOR_2,
				],
				'default'   => '#6EC1E4',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.primary-button' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.primary-button' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.primary-button:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow_hover',
				'label' => __('Box Shadow', 'plugin-domain'),
				'selector' => '{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.primary-button:hover',
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
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.primary-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.primary-button:hover' => 'background: {{VALUE}};',
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
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.primary-button:hover' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	/**
	 * slider secondary button style
	 */
	private function cozy_addons_slider_secondary_button_options()
	{

		// Box.
		$this->start_controls_section(
			'slider_secondary_button',
			[
				'label' => __('Secondary Button', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'slider_secondary_button_icon_size',
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
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.secondary-button .button-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'slider_secondary_button_icon_spacing',
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
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.secondary-button.before-text .button-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.secondary-button.after-text .button-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'secondary_button_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.secondary-button',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 14]],
					'font_weight' => ['default' => 400],
				],
			]
		);

		// cta button padding
		$this->add_responsive_control(
			'secondary_button_padding',
			[
				'label'      => __('Button Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default'	 => [
					'top' => '15',
					'right' => '30',
					'bottom' => '15',
					'left' => '30',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.secondary-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],

			]
		);
		$this->start_controls_tabs('secondary_button_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'secondary_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'secondary_button_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.secondary-button',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'secondary_button_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.secondary-button',
			]
		);
		// Normal border radius
		$this->add_control(
			'secondary_button_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.secondary-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// Box color
		$this->add_control(
			'secondary_button_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#61CE70',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.secondary-button' => 'background: {{VALUE}};',
				],
			]
		);
		//button text color
		$this->add_control(
			'secondary_button_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.secondary-button' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'secondary_button_style_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);
		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'secondary_button_border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.secondary-button:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'secondary_button_box_shadow_hover',
				'label' => __('Box Shadow', 'plugin-domain'),
				'selector' => '{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.secondary-button:hover',
			]
		);

		// Hover border radius
		$this->add_control(
			'secondary_button_border_radius_hover',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.secondary-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// Box color
		$this->add_control(
			'secondary_button_bg_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#6EC1E4',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.secondary-button:hover' => 'background: {{VALUE}};',
				],
			]
		);
		//button text color
		$this->add_control(
			'secondary_button_text_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider .ca-slide-content a.secondary-button:hover' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}





	/**
	 *slider image style
	 */
	private function cozy_addons_featured_image_options()
	{
		$this->start_controls_section(
			'slider_featured_image_style_box',
			[
				'label' => __('Image Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'cozy_slider_select_layout' => 'slide-layout-3',
				],
			]

		);
		$this->add_control(
			'slider_featured_image_wrapper_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Image Holder Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider.slide-layout-3 .slide-img' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-slider.slide-layout-3 .slide-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'cozy_featured_image_width',
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
					'{{WRAPPER}} section.cozy-addons-slider.slide-layout-3 .slide-img img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'cozy_featured_image_height',
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
					'{{WRAPPER}} section.cozy-addons-slider.slide-layout-3 .slide-img img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'featured_image_alignment',
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
					'{{WRAPPER}}  section.cozy-addons-slider.slide-layout-3 .slide-img' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'featured_image_button_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-slider.slide-layout-3 .slide-img img',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'featured_image_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-slider.slide-layout-3 .slide-img img',
			]
		);
		// Normal border radius
		$this->add_control(
			'featured_image_border_radius',
			[
				'label' => __('Border Radius', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider.slide-layout-3 .slide-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'slider_slide_image_padding',
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
					'{{WRAPPER}} section.cozy-addons-slider.slide-layout-3 .slide-img img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->end_controls_section();
	}
	/**
	 * Style Box Options.
	 */
	private function cozy_addons_slider_style_box_options()
	{

		// Box.
		$this->start_controls_section(
			'section_style_box',
			[
				'label' => __('Slider Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'cozy_slider_wrapper_height',
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
					'size' => 600,
				],
				'size_units' => ['px', 'vh'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider .cozy-slides' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->add_responsive_control(
			'cozy_slider_content_width',
			[
				'label' => __('Content Width', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],

				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}}  section.cozy-addons-slider .slide.swiper-slide .ca-slide-content span.slide-text' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Box alignment		
		$this->add_responsive_control(
			'content_horizontal_align',
			[
				'label' => __('Horizontal Alignment', 'cozy-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'cozy-addons'),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => __('Center', 'cozy-addons'),
						'icon' => 'eicon-h-align-center',
					],
					'right' => [
						'title' => __('Right', 'cozy-addons'),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-slider .ca-slide-content' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'content_vertical_align',
			[
				'label' => __('Vertical Alignment', 'cozy-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'top' => [
						'title' => __('top', 'cozy-addons'),
						'icon' => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => __('Middle', 'cozy-addons'),
						'icon' => 'eicon-v-align-middle',
					],
					'bottom' => [
						'title' => __('Bottom', 'cozy-addons'),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'middle',
			]
		);
		$this->add_control(
			'slider_box_overlay_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Slide Overlay Color', 'cozy-addons'),
				'default'   => 'rgba(0,0,0,0.70)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-slider.slide-layout-1 .swiper-slide:after' => 'background: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-slider.slide-layout-2 .swiper-slide:after' => 'background: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-slider.slide-layout-3 .cozy-slides .swiper-slide .ca-slide-content:before' => 'background: {{VALUE}};',
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
					'right' => '100',
					'bottom' => '0',
					'left' => '100',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}}  .cozy-addons-slider .ca-slide-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);




		$this->end_controls_section();
	}

	/**
	 * Style Box Options.
	 */
	private function cozy_addons_slider_content_options()
	{

		// .
		$this->start_controls_section(
			'slider_content_section_style',
			[
				'label' => __('Content Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Sub-heading
		$this->add_responsive_control(
			'slider_sub_heading_box_padding',
			[
				'label'      => __('Sub heading box padding', 'cozy-addons'),
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
					'{{WRAPPER}} .cozy-addons-slider .ca-slide-content .slide-sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],

			]
		);
		$this->add_control(
			'slider_sub_heading_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-slider .ca-slide-content .slide-sub-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'slider_sub_heading_bgcolor',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Sub Heading Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => 'rgba(0,0,0,0)',
				'selectors' => [
					'{{WRAPPER}}  .cozy-addons-slider .ca-slide-content .slide-sub-title' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'slider_sub_heading_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Sub Heading Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}}  .cozy-addons-slider .ca-slide-content .slide-sub-title' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'slider_sub_heading_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Sub Heading Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} .cozy-addons-slider .ca-slide-content .slide-sub-title',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 16]],
					'font_weight' => ['default' => 600],
					'line_height' => ['default' => ['size' => 20]],
				],

			]
		);

		$this->add_control(
			'slider_sub_heading_space_botttom',
			[
				'label' => __('Sub Heading Space Bottom', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-slider .ca-slide-content .slide-sub-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// heading
		$this->add_control(
			'slider_heading_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Heading Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#6EC1E4',
				'selectors' => [
					'{{WRAPPER}}  .cozy-addons-slider .ca-slide-content .section-title' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'slider_heading_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Heading Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} .cozy-addons-slider .ca-slide-content .section-title',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 48]],
					'font_weight' => ['default' => 700],
					'line_height' => ['default' => ['size' => 48]],
				],

			]
		);
		$this->add_control(
			'slider_heading_space_botttom',
			[
				'label' => __('Heading Space Bottom', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 25,
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-slider .ca-slide-content .section-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		/* decsription */
		$this->add_control(
			'slider_description_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Description Color', 'cozy-addons'),
				'default'   => 'rgba(211, 211, 211, 1)',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-slider .ca-slide-content .slide-description' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'slider_decription_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Description Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} .cozy-addons-slider .ca-slide-content .slide-description',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 16]],
					'font_weight' => ['default' => 400],
					'line_height' => ['default' => ['size' => 16]],
				],

			]
		);
		$this->add_control(
			'slider_desc_space_botttom',
			[
				'label' => __('Description Space Bottom', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-slider .ca-slide-content .slide-description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render($instance = [])
	{

		// Get settings.
		$settings = $this->get_settings();
		if (cozy_addons_premium_access()) {
			$cozy_slider_layout = $settings['cozy_slider_select_layout'];
			if ($cozy_slider_layout == 'slide-layout-3') {
				$load_slide = 'slider-layout-3';
			} elseif ($cozy_slider_layout == 'slide-layout-2') {
				$load_slide = 'slider-layout-2';
			} else {
				$load_slide = 'slider-layout-1';
			}
		} else {
			$load_slide = 'slider-layout-1';
			$cozy_slider_layout = 'slide-layout-1';
		}
		$cozy_slider_v_align = $settings['content_vertical_align'];

?>
		<!-- featured-layout -->
		<section class="cozy-addons-slider <?php echo esc_attr($cozy_slider_layout) . ' ' . esc_attr($cozy_slider_v_align); ?>">
			<?php
			include(COZY_ADDONS_PLUGIN_DIR . 'public/widgets/slider/' . $load_slide . '.php');
			?>

		</section> <!-- featured-layout -->
<?php
	}
}
