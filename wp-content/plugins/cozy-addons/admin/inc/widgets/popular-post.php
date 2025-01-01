<?php

namespace Cozy_Addons\PopularPostWidgets;

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
class Cozy_Addons_PopularPost_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'cozy-addons-popular-post';
	}

	public function get_title()
	{
		return __('Popular Posts', 'cozy-addons');
	}

	public function get_icon()
	{
		return 'eicon-post-list cozy-widget-icons';
	}
	public function get_keywords()
	{
		return ['popular post', 'cozy addons'];
	}

	public function get_categories()
	{
		return ['cozy-addons-items'];
	}

	protected function register_controls()
	{
		$this->cozy_addons_content_options();
		$this->cozy_addons_post_meta_options();
		$this->cozy_addons_blog_cta_options();

		//Styles for widget elements
		$this->cozy_addons_cta_style_box_options();
		$this->cozy_addons_content_image_options();
		$this->cozy_addons_blog_style_heading_options();
		$this->cozy_addons_blog_style_title_options();
		$this->cozy_addons_blog_style_ert_options();
		$this->cozy_addons_blog_style_meta_options();
		$this->cozy_addons_blog_carousel_pagination_options();
		$this->cozy_addons_blog_carousel_navigation_options();
		$this->cozy_addons_cta_button_options();
	}


	/**
	 * Layout Options.
	 */
	private function cozy_addons_blog_cta_options()
	{
		$this->start_controls_section(
			'post_cta_section',
			[
				'label' => __('CTA Options', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'show_cta_button',
			[
				'label' => __('Enable CTA Button', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'show_cta_icon',
			[
				'label' => __('Show Button Icon', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'condition' => [
					'show_cta_button' => 'yes'
				],
			]
		);
		$this->add_control(
			'post_cta_icon',
			[
				'label' => __('Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_cta_icon' => 'yes',
					'show_cta_button' => 'yes',
				],
			]
		);
		$this->add_control(
			'cta_icon_position',
			[
				'label' => __('Icon option', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'before-text',
				'options' => [
					'before-text' => esc_html__('Before Text', 'cozy-addons'),
					'after-text' => esc_html__('After Text', 'cozy-addons'),
				],
				'condition' => [
					'show_cta_icon' => 'yes',
					'show_cta_button' => 'yes',
				],
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' => __('Button Label', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => __('Read More', 'cozy-addons'),
				'placeholder' => __('Read More', 'cozy-addons'),
				'condition' => [
					'show_cta_button' => 'yes',
				],
			]
		);
		$this->end_controls_section();
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
			'show_section_header',
			[
				'label' => __('Enable Section Header', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'header_text_label',
			[
				'label' => __('Section Header', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => __('Popular Posts', 'cozy-addons'),
				'placeholder' => __('Popular Posts', 'cozy-addons'),
				'condition' => [
					'show_section_header' => 'yes',
				],
			]
		);
		if (cozy_addons_premium_access()) {
			$this->add_control(
				'popular_post_select_layout',
				[
					'label' => __('Select Layout', 'cozy-addons'),
					'type' => Controls_Manager::SELECT,
					'default' => 'layout-grid',
					'options' => [
						'layout-grid' => esc_html__('Grid', 'cozy-addons'),
						'layout-list' => esc_html__('List', 'cozy-addons'),
						'layout-carousel' => esc_html__('Carousel', 'cozy-addons'),
						'layout-vertical' => esc_html__('Vertical Scroll', 'cozy-addons'),
					],
				]
			);
		} else {
			$this->add_control(
				'popular_post_select_layout',
				[
					'label' => __('Select Layout', 'cozy-addons'),
					'description' => __('Upgrade to Pro Version to unlock 3 more advanced layout', 'cozy-addons'),
					'type' => Controls_Manager::SELECT,
					'default' => 'layout-grid',
					'options' => [
						'layout-grid' => esc_html__('Grid', 'cozy-addons'),
					],
				]
			);
		}
		$this->add_control(
			'popularpost_grid_column',
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
				'condition' => [
					'popular_post_select_layout' => 'layout-grid',
				],
			]
		);
		$this->add_control(
			'popularpost_carousel_column',
			[
				'label' => __('Display Column', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'col-carousel-3',
				'options' => [
					'col-carousel-2' => esc_html__('2 Column', 'cozy-addons'),
					'col-carousel-3' => esc_html__('3 Column', 'cozy-addons'),
					'col-carousel-4' => esc_html__('4 Column', 'cozy-addons'),
				],
				'condition' => [
					'popular_post_select_layout' => 'layout-carousel',
				],
			]
		);
		$this->add_control(
			'popularpost_vertical_column',
			[
				'label' => __('Display Item', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'col-vertical-3',
				'options' => [
					'col-vertical-1' => esc_html__('1', 'cozy-addons'),
					'col-vertical-2' => esc_html__('2', 'cozy-addons'),
					'col-vertical-3' => esc_html__('3', 'cozy-addons'),
					'col-vertical-4' => esc_html__('4', 'cozy-addons'),
				],
				'condition' => [
					'popular_post_select_layout' => 'layout-vertical',
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
					'popular_post_select_layout' => 'layout-carousel',
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
					'popular_post_select_layout' => 'layout-carousel',
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
					'popular_post_select_layout' => 'layout-carousel',
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
					'popular_post_select_layout' => 'layout-carousel',
				],
			]
		);
		$this->add_control(
			'slide_navigation_up_icon',
			[
				'label' => __('Up Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-up',
					'library' => 'fa-solid',
				],
				'condition' => [
					'popular_post_select_layout' => 'layout-vertical',
				],
			]
		);
		$this->add_control(
			'slide_navigation_down_icon',
			[
				'label' => __('Down Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-down',
					'library' => 'fa-solid',
				],
				'condition' => [
					'popular_post_select_layout' => 'layout-vertical',
				],
			]
		);
		$this->add_control(
			'popular_blog_grid_column_gap',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder' => 'grid-column-gap: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'popular_post_select_layout' => 'layout-grid',
				],
			]
		);
		$this->add_control(
			'popular_blog_grid_rows_gap',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .post-box' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'popular_post_select_layout',
							'operator' => '==',
							'value' => 'layout-grid',
						],
						[
							'name' => 'popular_post_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'layout-list',
						],

					],
				],
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
				'separator' => 'before',
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


				'default' => 'yes',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'popular_post_excerpt_length',
			[
				'label' => __('Excerpt Length', 'cozy-addons'),
				'type' => Controls_Manager::NUMBER,
				'default' => 30,
				'condition' => [
					'show_excerpt' => 'yes',
				],
			]
		);

		$this->end_controls_section();
	}
	/**
	 * Post Meta Options.
	 */
	private function cozy_addons_post_meta_options()
	{
		$this->start_controls_section(
			'post_meta_section',
			[
				'label' => __('Meta Option', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'show_post_author',
			[
				'label' => __('Enable Post Author', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'show_post_author_icon',
			[
				'label' => __('Show Author Icon', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
				'condition' => [
					'show_post_author' => 'yes'
				],
			]
		);
		$this->add_control(
			'post_meta_author_icon',
			[
				'label' => __('Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-user-alt',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_post_author' => 'yes',
					'show_post_author_icon' => 'yes',
				],
			]
		);
		$this->add_control(
			'show_post_date',
			[
				'label' => __('Enable Post Date', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'show_post_date_icon',
			[
				'label' => __('Show Date Icon', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
				'condition' => [
					'show_post_date' => 'yes'
				],
			]
		);
		$this->add_control(
			'post_meta_date_icon',
			[
				'label' => __('Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-calendar-check',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_post_date' => 'yes',
					'show_post_date_icon' => 'yes',
				],
			]
		);
		$this->add_control(
			'show_post_category',
			[
				'label' => __('Enable Post Category', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'show_post_category_icon',
			[
				'label' => __('Show Category Icon', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
				'condition' => [
					'show_post_category' => 'yes'
				],
			]
		);
		$this->add_control(
			'post_meta_category_icon',
			[
				'label' => __('Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-border-all',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_post_category' => 'yes',
					'show_post_category_icon' => 'yes',
				],
			]
		);
		$this->add_control(
			'show_post_ert',
			[
				'label' => __('Enable Estimate Reading Time', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'show_post_ert_icon',
			[
				'label' => __('Show Reading Time Icon', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
				'condition' => [
					'show_post_ert' => 'yes'
				],
			]
		);
		$this->add_control(
			'post_meta_ert_icon',
			[
				'label' => __('Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-clock',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_post_ert' => 'yes',
					'show_post_ert_icon' => 'yes',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Featured image style
	 */
	private function cozy_addons_content_image_options()
	{
		$this->start_controls_section(
			'blog_featrued_image_style',
			[
				'label' => __('Image Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_featured_image' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'blog_image_box_style_padding',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .cozy-featured-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'blog_image_bottom_spacing',
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
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .cozy-featured-img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'popular_blog_image_wrap_width',
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
					'{{WRAPPER}}  section.cozy-addons-popular-post .cozy-featured-img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'popular_post_select_layout' => 'layout-list',
				],
			]
		);
		$this->add_control(
			'blog_image_width',
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
					'{{WRAPPER}}  section.cozy-addons-popular-post .cozy-featured-img img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'blog_image_height',
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
					'{{WRAPPER}}  section.cozy-addons-popular-post .cozy-featured-img img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'blog_image_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .cozy-featured-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'blog_image_box_shadow',
				'label' => __('Image Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-popular-post .cozy-featured-img img',
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Pricing Footer Options.
	 */
	private function cozy_addons_cta_button_options()
	{

		// Box.
		$this->start_controls_section(
			'section_footer_box',
			[
				'label' => __('Button Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'cta_button_spacing',
			[
				'label' => __('Button Top Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder span.cta' => 'margin-top: {{SIZE}}{{UNIT}};',
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
					'size' => 14,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder span.cta a.ca-post-more .button-icon' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder span.cta a.ca-post-more.before-text .button-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder span.cta a.ca-post-more.after-text .button-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'cta_button_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-popular-post .posts-holder span.cta',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 16]],
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
					'top' => '6',
					'right' => '20',
					'bottom' => '6',
					'left' => '20',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder span.cta  a.ca-post-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-popular-post .posts-holder span.cta  a.ca-post-more',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-popular-post .posts-holder span.cta a.ca-post-more',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder span.cta  a.ca-post-more' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder span.cta a.ca-post-more' => 'background: {{VALUE}};',
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
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder span.cta a.ca-post-more' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-popular-post .posts-holder span.cta a.ca-post-more:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow_hover',
				'label' => __('Box Shadow', 'plugin-domain'),
				'selector' => '{{WRAPPER}} section.cozy-addons-popular-post .posts-holder span.cta a.ca-post-more:hover',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder span.cta  a.ca-post-more:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'value' => Color::COLOR_1,
				],
				'default'   => '#61CE70',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder span.cta  a.ca-post-more:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder span.cta  a.ca-post-more:hover' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .post-box' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'popular_post_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .post-box',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 14]],
					'font_weight' => ['default' => 400],
				],
				'separator' => 'before',
			]
		);

		// Box internal padding.
		$this->add_responsive_control(
			'popular_post_box_style_padding',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .post-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		// Box internal padding.
		$this->add_responsive_control(
			'post_box_content_style_padding',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .post-box .post-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .post-box' => 'background: {{VALUE}};',
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
					'value' => Color::COLOR_1,
				],
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .post-box' => 'color: {{VALUE}};',
				],
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .post-box',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .post-box',
			]
		);
		// Normal border radius
		$this->add_control(
			'border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .post-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .post-box:hover' => 'background: {{VALUE}};',
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
					'value' => Color::COLOR_1,
				],
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .post-box:hover' => 'color: {{VALUE}};',
				],
			]
		);
		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .post-box:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'label' => __('Box Shadow', 'plugin-domain'),
				'selector' => '{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .post-box:hover',
			]
		);

		// Hover border radius
		$this->add_control(
			'border_radius_hover',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .post-box:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
	private function cozy_addons_blog_style_title_options()
	{

		// Box.
		$this->start_controls_section(
			'blog_title_style_box',
			[
				'label' => __('Title Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'blog_title_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-popular-post .post-content .post-title',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 20]],
					'font_weight' => ['default' => 600],
					'line_height' => ['default' => ['size' => 26]],
				],
				// 'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'blog_title_style_padding',
			[
				'label'      => __('Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '10',
					'right' => '0',
					'bottom' => '10',
					'left' => '0',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-popular-post .post-content .post-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->start_controls_tabs('post_title_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'popular_post_title_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);
		//button text color
		$this->add_control(
			'title_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .post-content .post-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'popular_post_title_style_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);

		//button text color
		$this->add_control(
			'title_text_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#777777',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .post-content .post-title:hover' => 'color: {{VALUE}};',
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
	private function cozy_addons_blog_style_ert_options()
	{

		// Box.
		$this->start_controls_section(
			'blog_title_ert_style_box',
			[
				'label' => __('Estimated Reading Time Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'blog_ert_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-popular-post span.cozy-post-meta.estimated-reading-time',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 11]],
					'font_weight' => ['default' => 400],
				],
			]
		);
		$this->add_responsive_control(
			'blog_ert_style_padding',
			[
				'label'      => __('Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '2',
					'right' => '10',
					'bottom' => '0',
					'left' => '10',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-popular-post span.cozy-post-meta.estimated-reading-time' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'post_ert_background_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#0000009E',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post span.cozy-post-meta.estimated-reading-time' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'post_ert_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post span.cozy-post-meta.estimated-reading-time' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'post_ert_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post span.cozy-post-meta.estimated-reading-time' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}
	/**
	 * Style Title
	 */
	private function cozy_addons_blog_style_meta_options()
	{

		// Box.
		$this->start_controls_section(
			'blog_meta_style_box',
			[
				'label' => __('Meta Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'meta_section_spacing',
			[
				'label' => __('Meta Section Bottom Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .cozy-post-meta.all' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'meta_icon_size',
			[
				'label' => __('Icon Size', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 14,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .cozy-post-meta i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'meta_icon_spacing',
			[
				'label' => __('Icon Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'default' => [
					'size' => 2,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .cozy-post-meta i' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'blog_meta_style_spacing',
			[
				'label' => __('Meta Spacing', 'cozy-addons'),
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
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .cozy-post-meta span.cozy-post-meta' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'meta_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .cozy-post-meta',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 13]],
					'font_weight' => ['default' => 400],
				],
				// 'separator' => 'before',
			]
		);


		$this->add_control(
			'meta_label_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Meta Label Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#787878',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .cozy-post-meta' => 'color: {{VALUE}};',
				],
			]
		);

		$this->start_controls_tabs('meta_box_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'meta_box_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);

		$this->add_control(
			'meta_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Link Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#787878',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .cozy-post-meta a' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'maeta_box_style_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);

		$this->add_control(
			'meta_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Link Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ededed',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .posts-holder .cozy-post-meta a:hover' => 'color: {{VALUE}};',
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
	private function cozy_addons_blog_carousel_pagination_options()
	{
		$this->start_controls_section(
			'slider_pagination_style',
			[
				'label' => __('Pagination Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_carousel_pagination' => 'yes',
					'popular_post_select_layout' => 'layout-carousel',
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
					'{{WRAPPER}} section.cozy-addons-popular-post.layout-carousel .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-popular-post.layout-carousel .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-popular-post.layout-carousel .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post.layout-carousel .swiper-pagination-bullet' => 'background: {{VALUE}};',
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
				'default'   => '#676767',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post.layout-carousel .swiper-pagination-bullet:hover' => 'background: {{VALUE}};',
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
	private function cozy_addons_blog_carousel_navigation_options()
	{
		$this->start_controls_section(
			'slider_navigation_style',
			[
				'label' => __('Navigation Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'popular_post_select_layout',
							'operator' => '==',
							'value' => 'layout-carousel',
						],
						[
							'name' => 'popular_post_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'layout-vertical',
						],

					],
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
					'size' => 14,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .cozy-slide-nav' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .cozy-slide-nav' => 'width: {{SIZE}}{{UNIT}};',
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
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .cozy-slide-nav' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-popular-post .cozy-slide-nav.cozy-slide-next' => 'line-height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-popular-post .cozy-slide-nav.cozy-slide-prev' => 'line-height: {{SIZE}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-popular-post .cozy-slide-nav',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_box_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-popular-post .cozy-slide-nav',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .cozy-slide-nav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .cozy-slide-nav' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .cozy-slide-nav' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-popular-post .cozy-slide-nav:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_box_shadow_hover',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-popular-post .cozy-slide-nav:hover',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .cozy-slide-nav:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .cozy-slide-nav:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .cozy-slide-nav:hover' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}


	/**
	 * Style Heading
	 */
	private function cozy_addons_blog_style_heading_options()
	{

		// Box.
		$this->start_controls_section(
			'section_heading_style_box',
			[
				'label' => __('Section Heading Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		// Text alignment		
		$this->add_responsive_control(
			'mag_header_text_align',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .section-header' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'section_heading_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-popular-post .section-header .section-heading span',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 20]],
					'font_weight' => ['default' => 600],
					'line_height' => ['default' => ['size' => 24]],
				],
				// 'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'section_heading_style_padding',
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
					'{{WRAPPER}} section.cozy-addons-popular-post .section-header .section-heading span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'section_heading_style_spacing',
			[
				'label'      => __('Spacing', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '10',
					'right' => '0',
					'bottom' => '10',
					'left' => '0',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-popular-post .section-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'section_heading_background_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default' => 'rgba(0,0,0,0)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .section-header .section-heading span' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'section_heading_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-popular-post .section-header .section-heading' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'section_heading_category_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-popular-post .section-header .section-heading',
			]
		);

		$this->end_controls_section();
	}
	protected function render($instance = [])
	{
		$settings = $this->get_settings();
		$selected_layout = $settings['popular_post_select_layout']; ?>
		<section class="cozy-addons-popular-post <?php echo esc_attr($selected_layout); ?>">
			<?php
			include(COZY_ADDONS_PLUGIN_DIR . 'public/widgets/popular-post/popular-post-layout.php');
			?>
		</section> <!-- featured-layout -->

<?php }
}
