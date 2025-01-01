<?php

namespace Cozy_Addons\FocusPostsWidgets;

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
class Cozy_Addons_FocusPost_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'cozy-addons-focus-posts';
	}

	public function get_title()
	{
		return __('Focus Posts', 'cozy-addons');
	}

	public function get_icon()
	{
		return 'eicon-preview-thin cozy-widget-icons';
	}
	public function get_keywords()
	{
		return ['focus post', 'news ticker', 'cozy addons'];
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
		$this->cozy_addons_content_image_options();
		$this->cozy_addons_blog_style_heading_options();
		$this->cozy_addons_blog_style_title_options();
		$this->cozy_addons_blog_style_meta_options();
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
				'focuspost_select_layout',
				[
					'label' => __('Select Layout', 'cozy-addons'),
					'type' => Controls_Manager::SELECT,
					'default' => 'focus-layout-1',
					'options' => [
						'focus-layout-1' => esc_html__('News Ticker', 'cozy-addons'),
						'focus-layout-2' => esc_html__('Grid View', 'cozy-addons'),
						'focus-layout-3' => esc_html__('Thumbnail View', 'cozy-addons'),
						'focus-layout-4' => esc_html__('Vertical Scroller', 'cozy-addons'),
					],
				]
			);
		} else {
			$this->add_control(
				'focuspost_select_layout',
				[
					'label' => __('Select Layout', 'cozy-addons'),
					'description' => __('Upgrade to Premium Version to Unlock 3 More Advanced Post Slider'),
					'type' => Controls_Manager::SELECT,
					'default' => 'focus-layout-1',
					'options' => [
						'focus-layout-1' => esc_html__('News Ticker', 'cozy-addons'),
					],
				]
			);
		}

		$this->add_control(
			'focus_post_grid_column',
			[
				'label' => __('Display Column', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'col-grid-3',
				'options' => [
					'col-grid-3' => esc_html__('3 Column', 'cozy-addons'),
					'col-grid-4' => esc_html__('4 Column', 'cozy-addons'),
					'col-grid-5' => esc_html__('5 Column', 'cozy-addons'),
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'focuspost_select_layout',
							'operator' => '==',
							'value' => 'focus-layout-2',
						],
						[
							'name' => 'focuspost_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'focus-layout-3',
						],
					],
				],
			]
		);

		$this->add_control(
			'focus_post_scroller_item',
			[
				'label' => __('View Item', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'col-item-3',
				'options' => [
					'col-item-3' => esc_html__('3', 'cozy-addons'),
					'col-item-4' => esc_html__('4', 'cozy-addons'),
				],
				'condition' => [
					'focuspost_select_layout' => 'focus-layout-4',
				],
			]
		);

		$this->add_control(
			'focuspost_post_source',
			[
				'label' => __('Select Post Source', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'latest-post',
				'options' => [
					'latest-post' => esc_html__('Latest Posts', 'cozy-addons'),
					'from-category' => esc_html__('From Category', 'cozy-addons'),
				],
			]
		);

		// blog categories
		$this->add_control(
			'focus_post_category',
			[
				'label'       => __('Select Category', 'cozy-addons'),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'options'     => $this->cozy_addons_post_categories(),
				'condition' => [
					'focuspost_post_source' => 'from-category',
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
			'show_carousel_navigation',
			[
				'label' => __('Show Carousel Navigation', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'slide_navigation_prev_icon',
			[
				'label' => __('Prev Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-angle-up',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'angle-left',
						'angle-up'
					]
				],
				'condition' => [
					'show_carousel_navigation' => 'yes',
				],
			]
		);
		$this->add_control(
			'slide_navigation_next_icon',
			[
				'label' => __('Next Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-angle-down',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'angle-right',
						'angle-down',
					]
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
				'default' => __('Top Story', 'cozy-addons'),
				'placeholder' => __('Section Header', 'cozy-addons'),
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
				'default' => 'h3',
			]
		);
		$this->add_control(
			'show_featured_image',
			[
				'label' => __('Enable Featured Image', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'focuspost_select_layout',
							'operator' => '==',
							'value' => 'focus-layout-2',
						],
						[
							'name' => 'focuspost_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'focus-layout-3',
						],
						[
							'name' => 'focuspost_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'focus-layout-4',
						],
					],
				],
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label' => __('Post Title HTML Tag', 'cozy-addons'),
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
				'default' => 'h4',
			]
		);
		$this->add_control(
			'focus_post_title_length',
			[
				'label' => __('Title Length', 'cozy-addons'),
				'type' => Controls_Manager::NUMBER,
				'default' => 20,
			]
		);
		$this->add_control(
			'show_list_title_icon',
			[
				'label' => __('Enable List Icon/Seperator', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);
		$this->add_control(
			'focus_post_title_list_icon',
			[
				'label' => __('Select Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fas-solid',
				],
				'separator' => 'before',
				'condition' => [
					'show_list_title_icon' => 'yes'
				]
			]
		);
		$this->add_control(
			'focus_post_title_list_icon_size',
			[
				'label' => __('Icon Size', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 14,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-focus-posts .post-box .post-content .separator-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_list_title_icon' => 'yes'
				]
			]
		);
		$this->add_control(
			'focus_post_title_list_icon_spacing',
			[
				'label' => __('Icon Horizontal Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => -24,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-focus-posts .post-box .post-content .separator-icon' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_list_title_icon' => 'yes'
				]
			]
		);
		$this->add_control(
			'focus_post_title_list_icon_vertical_spacing',
			[
				'label' => __('Icon Vertical Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -250,
						'max' => 250,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 17,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-focus-posts .post-box .post-content .separator-icon' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_list_title_icon' => 'yes'
				]
			]
		);
		$this->add_control(
			'focus_post_title_list_icon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Icon Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#343434',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-focus-posts .post-box .post-content .separator-icon i' => 'color: {{VALUE}};',
				],
				'condition' => [
					'show_list_title_icon' => 'yes'
				]
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
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'focuspost_select_layout',
							'operator' => '==',
							'value' => 'focus-layout-2',
						],
						[
							'name' => 'focuspost_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'focus-layout-3',
						],
						[
							'name' => 'focuspost_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'focus-layout-4',
						],
					],
				],
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
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_post_date' => 'yes',
					'show_post_date_icon' => 'yes',
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
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-focus-posts .post-box' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);


		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'blog_post_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-focus-posts .post-box',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 16]],
					'font_weight' => ['default' => 400],
				],

			]
		);
		$this->add_responsive_control(
			'blog_box_style_padding',
			[
				'label'      => __('Box Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => true,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-focus-posts .post-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'blog_content_style_padding',
			[
				'label'      => __('Content Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => true,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}}  section.cozy-addons-focus-posts .post-box .post-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_color',
				'label' => esc_html__('Background', 'cozy-addons'),
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} section.cozy-addons-focus-posts .post-box',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-focus-posts .post-box',
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
				'default'   => '#232323',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-focus-posts .post-box' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'focus_box_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-focus-posts .post-box',
			]
		);
		// Normal border radius
		$this->add_control(
			'box_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-focus-posts .post-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'section_heading_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-focus-posts .section-header h3.section-heading span',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 18]],
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
					'{{WRAPPER}} section.cozy-addons-focus-posts .section-header h3.section-heading span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
					'{{WRAPPER}} section.cozy-addons-focus-posts .section-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'section_heading_text_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default' => 'rgba(0,0,0,0)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-focus-posts .section-header h3.section-heading span' => 'background: {{VALUE}};',
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
				'default'   => '#343434',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-focus-posts .section-header h3.section-heading span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'section_heading_category_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-focus-posts .section-header',
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

				'selector' => '{{WRAPPER}} section.cozy-addons-focus-posts .focus-post-holder .post-box .post-title',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 16]],
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
					'{{WRAPPER}} section.cozy-addons-focus-posts .focus-post-holder .post-box .post-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
				'default'   => '#676767',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-focus-posts .focus-post-holder .post-box .post-title' => 'color: {{VALUE}};',
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
				'default'   => '#6ec1e4',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-focus-posts .focus-post-holder .post-box .post-title:hover' => 'color: {{VALUE}};',
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
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'focuspost_select_layout',
							'operator' => '==',
							'value' => 'focus-layout-2',
						],
						[
							'name' => 'focuspost_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'focus-layout-3',
						],
						[
							'name' => 'focuspost_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'focus-layout-4',
						],
					],
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'meta_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-focus-posts .cozy-post-meta.all',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 13]],
					'font_weight' => ['default' => 400],
				],
				// 'separator' => 'before',
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
					'{{WRAPPER}} section.cozy-addons-focus-posts .cozy-post-meta.all span.cozy-post-meta' => 'margin-right: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-focus-posts .cozy-post-meta.all span.cozy-post-meta span.meta-icon' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-focus-posts .cozy-post-meta.all span.cozy-post-meta span.meta-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-focus-posts .cozy-post-meta.all span.cozy-post-meta span.meta-icon' => 'color: {{VALUE}};',
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
				'default'   => '#777777',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-focus-posts .cozy-post-meta.all span.cozy-post-meta a' => 'color: {{VALUE}};',
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
				'default'   => '#6EC1E4',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-focus-posts .cozy-post-meta.all span.cozy-post-meta a:hover' => 'color: {{VALUE}};',
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
					'size' => 13,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-focus-posts .focus-post-holder  .cozy-slide-nav' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'size' => 24,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-focus-posts .focus-post-holder .cozy-slide-nav' => 'width: {{SIZE}}{{UNIT}};',
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
					'size' => 24,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-focus-posts .focus-post-holder .cozy-slide-nav' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-focus-posts .focus-post-holder  .cozy-slide-nav.cozy-slide-next' => 'line-height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-focus-posts .focus-post-holder .cozy-slide-nav.cozy-slide-prev' => 'line-height: {{SIZE}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-focus-posts .focus-post-holder .cozy-slide-nav',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_box_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-focus-posts .focus-post-holder .cozy-slide-nav',
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
					'{{WRAPPER}} section.cozy-addons-focus-posts .focus-post-holder .cozy-slide-nav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'default'   => '#ededed',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-focus-posts .focus-post-holder .cozy-slide-nav' => 'background: {{VALUE}};',
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
				'default'   => '#797979',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-focus-posts .focus-post-holder .cozy-slide-nav' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-focus-posts .focus-post-holder  .cozy-slide-nav:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_box_shadow_hover',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-focus-posts .focus-post-holder  .cozy-slide-nav:hover',
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
					'{{WRAPPER}} section.cozy-addons-focus-posts .focus-post-holder  .cozy-slide-nav:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'default'   => '#6ec1e4',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-focus-posts .focus-post-holder .cozy-slide-nav:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-focus-posts .focus-post-holder .cozy-slide-nav:hover' => 'color: {{VALUE}};',
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
			'blog_featrued_image_style',
			[
				'label' => __('Image Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'conditions' => [
					'show_featured_image' => 'yes',
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'focuspost_select_layout',
							'operator' => '==',
							'value' => 'focus-layout-2',
						],
						[
							'name' => 'focuspost_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'focus-layout-3',
						],
						[
							'name' => 'focuspost_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'focus-layout-4',
						],
					],
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
					'{{WRAPPER}} section.cozy-addons-focus-posts .cozy-featured-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
					'{{WRAPPER}} section.cozy-addons-focus-posts .cozy-featured-img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}}  section.cozy-addons-focus-posts .cozy-featured-img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'conditions' => [
					'show_featured_image' => 'yes',
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'focuspost_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'focus-layout-3',
						],
						[
							'name' => 'focuspost_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'focus-layout-4',
						],
					],
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
					'{{WRAPPER}}  section.cozy-addons-focus-posts .cozy-featured-img img' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}}  section.cozy-addons-focus-posts .cozy-featured-img img' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-focus-posts .cozy-featured-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'blog_image_box_shadow',
				'label' => __('Image Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-focus-posts .cozy-featured-img img',
			]
		);
		$this->end_controls_section();
	}


	protected function render($instance = [])
	{
		$settings = $this->get_settings();
		$slected_layout = $settings['focuspost_select_layout']; ?>
		<section class="cozy-addons-focus-posts <?php echo esc_attr($slected_layout); ?>">
			<?php
			include(COZY_ADDONS_PLUGIN_DIR . 'public/widgets/posts/focus-post-layout.php');
			?>
		</section> <!-- featured-layout -->
<?php
	}
}
