<?php

namespace Cozy_Addons\PostSliderWidgets;

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
class Cozy_Addons_PostSlider_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'cozy-addons-post-slider';
	}

	public function get_title()
	{
		return __('Post Slider', 'cozy-addons');
	}

	public function get_icon()
	{
		return 'eicon-post-slider cozy-widget-icons';
	}
	public function get_keywords()
	{
		return ['post slider', 'blog', 'cozy addons'];
	}

	public function get_categories()
	{
		return ['cozy-addons-items'];
	}

	protected function register_controls()
	{


		$this->cozy_addons_query_options();
		$this->cozy_addons_content_options();
		$this->cozy_addons_post_meta_options();

		//Styles for widget elements
		$this->cozy_addons_cta_style_box_options();
		$this->cozy_addons_slide_background_overlay_options();
		$this->cozy_addons_blog_style_heading_options();
		$this->cozy_addons_blog_style_title_options();
		$this->cozy_addons_blog_style_meta_options();
		$this->cozy_addons_blog_meta_category_options();
		$this->cozy_addons_blog_carousel_navigation_options();
	}


	/**
	 * Get all category of post
	 */
	private function cozy_addons_post_categories()
	{
		$taxonomy = 'category';
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
	 * Layout Options.
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
				'slider_select_layout',
				[
					'label' => __('Select Layout', 'cozy-addons'),
					'type' => Controls_Manager::SELECT,
					'default' => 'layout-slider-1',
					'options' => [
						'layout-slider-1' => esc_html__('Layout 1', 'cozy-addons'),
						'layout-slider-2' => esc_html__('Layout 2', 'cozy-addons'),
						'layout-slider-3' => esc_html__('Layout 3', 'cozy-addons'),
					],
				]
			);
		} else {
			$this->add_control(
				'slider_select_layout',
				[
					'label' => __('Select Layout', 'cozy-addons'),
					'description' => __('Upgrade to Premium Version to Unlock 1 More Advanced Post Slider with multiple columns'),
					'type' => Controls_Manager::SELECT,
					'default' => 'layout-slider-1',
					'options' => [
						'layout-slider-1' => esc_html__('Layout 1', 'cozy-addons'),
						'layout-slider-2' => esc_html__('Layout 2', 'cozy-addons'),
					],
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
						'slider_select_layout' => 'layout-slider-2',
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
					'slider_select_layout' => 'layout-slider-2',
				],
			]
		);
		// blog categories
		$this->add_control(
			'slider_category',
			[
				'label'       => __('Select Category', 'cozy-addons'),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'multiple'    => true,
				'options'     => $this->cozy_addons_post_categories(),

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
			'show_carousel_navigation',
			[
				'label' => __('Show Carousel Navigation', 'cozy-addons'),
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
					'value' => 'fas fa-angle-left',
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
					'value' => 'fas fa-angle-right',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_carousel_navigation' => 'yes',
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
			'section_heading_text',
			[
				'label' => __('Section Heading', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => __('Top Headline', 'cozy-addons'),
				'placeholder' => __('Section Header', 'cozy-addons'),
				'condition' => [
					'slider_select_layout' => 'layout-slider-1'
				],
			]
		);
		$this->add_control(
			'heading_tag',
			[
				'label' => __('Heading HTML Tag', 'cozy-addons'),
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
				'default' => 'h2',
				'condition' => [
					'slider_select_layout' => 'layout-slider-1'
				],
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
					'library' => 'fa-regular',
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

			]
		);




		$this->end_controls_section();
	}
	private function cozy_addons_slide_background_overlay_options()
	{

		// Box.
		$this->start_controls_section(
			'slide_box_overlay_style',
			[
				'label' => __('Overlay Background Color', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_overlay_color',
				'label' => esc_html__('Background Overlay', 'cozy-addons'),
				'types' => ['gradient'],
				'selector' => '{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-slider-content:before',
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
				'label' => __('Slider Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'post_slider_wrapper_height',
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
					'size' => 500,
				],
				'size_units' => ['px', 'vh'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-post-slider .post-slider' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
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
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder' => 'text-align: {{VALUE}};',
				],
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
				'default' => 'bottom',
			]
		);


		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'blog_post_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-blog .posts-holder .post-box',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 16]],
					'font_weight' => ['default' => 400],
				],

			]
		);
		$this->add_responsive_control(
			'blog_content_style_padding',
			[
				'label'      => __('Content Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '20',
					'right' => '20',
					'bottom' => '20',
					'left' => '20',
					'isLinked' => true,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-slider-content span.content-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'post_slider_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

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
				'condition' => [
					'slider_select_layout' => 'layout-slider-1',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'section_heading_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-post-slider.layout-slider-1 .section-header .section-heading',
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
					'top' => '10',
					'right' => '0',
					'bottom' => '10',
					'left' => '0',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-post-slider.layout-slider-1 .section-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
					'{{WRAPPER}} section.cozy-addons-post-slider.layout-slider-1 .section-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'section_heading_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-post-slider.layout-slider-1 .section-header .section-heading' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'section_heading_category_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-post-slider.layout-slider-1 .section-header',
			]
		);

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

				'selector' => '{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-title a',
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
			'blog_title_style_padding',
			[
				'label'      => __('Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '10',
					'right' => '0',
					'bottom' => '10',
					'left' => '0',
					'isLinked' => true,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->start_controls_tabs('post_title_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'title_box_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);

		$this->add_control(
			'post_title_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-title a' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'title_box_style_tabs_normal_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);

		$this->add_control(
			'post_title_text_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#777777',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-title a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
	}
	/**
	 * Style meta
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
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'meta_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-slider-content .post-slider-meta',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 13]],
					'font_weight' => ['default' => 400],
				],
				// 'separator' => 'before',
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
					'{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-slider-content .post-slider-meta' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-slider-content .post-slider-meta a' => 'margin-right: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-post-slider  .post-slider-content .post-slider-meta span.meta-icon' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-post-slider  .post-slider-content .post-slider-meta span.meta-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);




		$this->add_control(
			'meta_label_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Icon Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#787878',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-post-slider  .post-slider-content .post-slider-meta span.meta-icon' => 'color: {{VALUE}};',
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
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-slider-content .post-slider-meta a' => 'color: {{VALUE}};',
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
				'default'   => '#777777',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-slider-content .post-slider-meta a:hover' => 'color: {{VALUE}};',
				],
			]
		);



		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	private function cozy_addons_blog_meta_category_options()
	{
		$this->start_controls_section(
			'post_meta_category_style_setup',
			[
				'label' => __('Category Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'blog_meta_category_style_padding',
			[
				'label'      => __('Label Padding', 'cozy-addons'),
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
					'{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-slider-content span.category a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],

			]
		);
		$this->add_control(
			'blog_meta_category_style_spacing',
			[
				'label' => __('Category Label Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 20,
					],
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-slider-content span.category a' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'post_meta_category_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-slider-content span.category',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 13]],
					'font_weight' => ['default' => 400],
				],
				// 'separator' => 'before',
			]
		);
		$this->start_controls_tabs('post_meta_category_box_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'post_meta_category_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);

		$this->add_control(
			'post_meta_category_bgcolor',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default' => '#6EC1E4',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-slider-content span.category a' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'post_meta_category_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-slider-content span.category a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'post_meta_category_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-slider-content span.category a',
			]
		);
		// Hover border radius
		$this->add_control(
			'post_meta_category_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-slider-content span.category a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'post_meta_category_style_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);
		$this->add_control(
			'post_meta_category_bgcolor_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#61CE70',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-slider-content span.category a:hover' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'post_meta_category_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-slider-content span.category a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'post_meta_category_border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-slider-content span.category a:hover',
			]
		);
		// Hover border radius
		$this->add_control(
			'post_meta_category_border_radius_hover',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-post-slider .posts-holder .slide-holder .post-slider-content span.category a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-post-slider  .cozy-slide-nav' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-post-slider .cozy-slide-nav' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-post-slider  .cozy-slide-nav' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-post-slider  .cozy-slide-nav.cozy-slide-next' => 'line-height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-post-slider  .cozy-slide-nav.cozy-slide-prev' => 'line-height: {{SIZE}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-post-slider .cozy-slide-nav',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_box_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-post-slider  .cozy-slide-nav',
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
					'{{WRAPPER}} section.cozy-addons-post-slider  .cozy-slide-nav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-post-slider .cozy-slide-nav' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-post-slider  .cozy-slide-nav' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-post-slider  .cozy-slide-nav:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_box_shadow_hover',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-post-slider  .cozy-slide-nav:hover',
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
					'{{WRAPPER}} section.cozy-addons-post-slider  .cozy-slide-nav:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-post-slider  .cozy-slide-nav:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-post-slider  .cozy-slide-nav:hover' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}



	protected function render($instance = [])
	{
		$settings = $this->get_settings();
		$slected_layout = $settings['slider_select_layout'];
		$selected_vertical_align = $settings['content_vertical_align']; ?>
		<section class="cozy-addons-post-slider <?php echo esc_attr($slected_layout) . ' ' . esc_attr($selected_vertical_align); ?>">
			<?php
			include(COZY_ADDONS_PLUGIN_DIR . 'public/widgets/posts/post-slider-layout.php');
			?>
		</section> <!-- featured-layout -->
<?php
	}
}
