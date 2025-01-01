<?php

namespace Cozy_Addons\TestimonialWidgets;

use Elementor\Conditions;
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
class Cozy_Addons_Testimonial_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'cozy-addons-testimonial-list';
	}

	public function get_title()
	{
		return __('Testimonials', 'cozy-addons');
	}

	public function get_icon()
	{
		return 'eicon-testimonial-carousel cozy-widget-icons';
	}

	public function get_categories()
	{
		return ['cozy-addons-items'];
	}
	public function get_keywords()
	{
		return ['testimonial', 'cozy', 'cozy addons'];
	}
	protected function register_controls()
	{
		$this->cozy_addons_query_options();
		$this->cozy_addons_content_options();
		$this->cozy_addons_testimonial_star_icon_options();
		$this->cozy_addons_testimonial_quote_icon_options();
		//Styles for widget elements
		$this->cozy_addons_testimonial_style_box_options();
		$this->cozy_addons_testimonial_active_box_options();
		$this->cozy_addons_testimonial_image_style_options();
		$this->cozy_addons_testimonial_quote_style_options();
		$this->cozy_addons_testimonial_title_style_options();
		$this->cozy_addons_testimonial_company_style_options();
		$this->cozy_addons_testimonial_pagination_options();
		$this->cozy_addons_testimonial_carousel_pagination_options();
		$this->cozy_addons_testimonials_carousel_navigation_options();
	}


	/**
	 * Get all category of testimonial
	 */
	private function cozy_addons_testimonial_categories()
	{
		$taxonomy = 'cea_testimonial_category';
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
				'testimonial_select_layout',
				[
					'label' => __('Select Layout', 'cozy-addons'),
					'type' => Controls_Manager::SELECT,
					'default' => 'layout-carousel',
					'options' => [
						'layout-list' => esc_html__('List', 'cozy-addons'),
						'layout-grid' => esc_html__('Grid', 'cozy-addons'),
						'layout-slide' => esc_html__('Slide Style', 'cozy-addons'),
						'layout-carousel' => esc_html__('Carousel', 'cozy-addons'),
						'layout-carousel-style-2' => esc_html__('Carousel: Style 2', 'cozy-addons'),
					],

				]
			);
		} else {
			$this->add_control(
				'testimonial_select_layout',
				[
					'label' => __('Select Layout', 'cozy-addons'),
					'type' => Controls_Manager::SELECT,
					'default' => 'layout-carousel',
					'options' => [
						'layout-carousel' => esc_html__('Carousel', 'cozy-addons'),
					],

				]
			);
		}
		if (cozy_addons_premium_access()) {
			$this->add_control(
				'testimonial_grid_column',
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
						'testimonial_select_layout' => 'layout-grid',
					],
				]
			);
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
						'testimonial_select_layout' => 'layout-carousel',
					],
				]
			);
		} else {
			$this->add_control(
				'cozy_testimonial_layout_notice_text',
				[
					'type' => \Elementor\Controls_Manager::RAW_HTML,
					'raw' => __('<a href="https://cozythemes.com/cozy-addons/" target="_blank">Upgrade to premium</a> version to unlock 4 more layout with columns option and show unlimited testimonials', 'cozy-addons'),
					'content_classes' => 'ct-upsell-notice',
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
					'testimonial_select_layout' => 'layout-carousel',
				],
			]
		);
		$this->add_control(
			'show_carousel_pagination',
			[
				'label' => __('Show Pagination', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
				'conditions' => [
					'terms' => [
						[
							'name' => 'testimonial_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-slide',
								'layout-carousel',
								'layout-carousel-style-2'
							],
						],
					],
				],
			]
		);
		$this->add_control(
			'show_carousel_navigation',
			[
				'label' => __('Show Navigation', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
				'conditions' => [
					'terms' => [
						[
							'name' => 'testimonial_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-slide',
								'layout-carousel',
								'layout-carousel-style-2'
							],
						],
					],
				],
			]
		);
		$this->add_control(
			'slide_navigation_left_icon',
			[
				'label' => __('Prev Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-left',
					'library' => 'solid',
				],
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'testimonial_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-slide',
								'layout-carousel',
								'layout-carousel-style-2',
							],
						],
						[
							'name' => 'show_carousel_navigation',
							'operator' => '==',
							'value' => 'yes',
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
					'library' => 'solid',
				],
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'testimonial_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-slide',
								'layout-carousel',
								'layout-carousel-style-2',
							],
						],
						[
							'name' => 'show_carousel_navigation',
							'operator' => '==',
							'value' => 'yes',
						]
					],
				],
			]
		);

		$this->add_control(
			'testimonial_grid_column_gap',
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
					'{{WRAPPER}} .cozy-addons-testimonial.layout-grid .testimonials-holder' => 'grid-column-gap: {{SIZE}}{{UNIT}};',
					// '{{WRAPPER}} section.cozy-addons-testimonial.layout-list .testimonials-holder' => 'grid-column-gap: {{SIZE}}{{UNIT}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'testimonial_select_layout',
							'operator' => '==',
							'value' => [
								'layout-grid',
							],
						],
					],
				],
			]
		);
		$this->add_control(
			'testimonial_grid_rows_gap',
			[
				'label' => __('Rows Gap', 'cozy-addons'),
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
					'{{WRAPPER}} section.cozy-addons-testimonial.layout-grid .testimonials-holder .testimonial-box' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-testimonial.layout-list .testimonials-holder .testimonial-box' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'testimonial_select_layout',
							'operator' => '==',
							'value' => 'layout-grid',
						],
						[
							'name' => 'testimonial_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'layout-list',
						],
					],
				],
			]
		);
		// testimonial categories
		$this->add_control(
			'testimonial_categories',
			[
				'label'       => __('Select Categories', 'cozy-addons'),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'options'     => $this->cozy_addons_testimonial_categories(),

			]
		);
		if (cozy_addons_premium_access()) {
			$this->add_control(
				'posts_per_page',
				[
					'label' => __('Posts Per Page', 'cozy-addons'),
					'type' => Controls_Manager::NUMBER,
					'default' => 3,
				]
			);
		}
		$this->add_control(
			'enable_pagination',
			[
				'label' => __('Enable Pagination', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'no',
				'conditions' => [
					'terms' => [
						[
							'name' => 'testimonial_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-list',
								'layout-grid',
							],
						],
					],
				],
			]
		);
		$this->add_control(
			'posts_offset',
			[
				'label' => __('Post Offset', 'cozy-addons'),
				'type' => Controls_Manager::NUMBER,
				'default' => 0,
				'conditions' => [
					'terms' => [
						[
							'name' => 'testimonial_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-list',
								'layout-grid',
							],
						],
					],
				],
			]
		);

		$this->add_control(
			'testimonial_orderby',
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
			'testimonial_order',
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


		$this->end_controls_section();
	}

	/**
	 * Header Layout Options.
	 */
	private function cozy_addons_content_options()
	{
		$this->start_controls_section(
			'general_section_content',
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
			'featured_image_position',
			[
				'label' => __('Image Position', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'below-content',
				'options' => [
					'below-content' => __('Below Content', 'cozy-addons'),
					'above-content' => __('Above Content', 'cozy-addons'),
				],
				'conditions' => [
					'show_featured_image' => 'yes',
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'testimonial_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-grid',
								'layout-carousel',
								'layout-carousel-style-2',
							],
						],
					],
				],
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
			]
		);
		$this->add_control(
			'show_designation',
			[
				'label' => __('Enable Designation', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'show_company',
			[
				'label' => __('Enable Company', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'yes',
			]
		);
		$this->add_control(
			'company_separator',
			[
				'label' => __('Company & Designation Separator', 'cozy-addons'),
				'type' => Controls_Manager::TEXT,
				'rows' => 1,
				'default' => __(',', 'cozy-addons'),
				'placeholder' => __(',', 'cozy-addons'),
				'condition' => [
					'show_company' => 'yes',
				],
			]
		);
		$this->add_control(
			'testimonial_description_type',
			[
				'label' => __('Display Content', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'testimonial-content',
				'options' => [
					'testimonial-content' => esc_html__('Full Content', 'cozy-addons'),
					'testimonial-excerpt' => esc_html__('Excerpt', 'cozy-addons'),
				],
			]
		);
		$this->add_control(
			'testimonial_excerpt_length',
			[
				'label' => __('Excerpt Length', 'cozy-addons'),
				'type' => Controls_Manager::NUMBER,
				'default' => 30,
				'condition' => [
					'testimonial_description_type' => 'testimonial-excerpt',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Quote Options.
	 */
	private function cozy_addons_testimonial_quote_icon_options()
	{
		$this->start_controls_section(
			'testimonial_quote_section',
			[
				'label' => __('Quote Icon Settings', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'show_review_quote_icon',
			[
				'label' => __('Enable Quote Icon', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'review_quote_icon_type',
			[
				'label' => __('Icon Type', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'quote-type-icon',
				'options' => [
					'quote-type-icon' => __('Icon', 'cozy-addons'),
					'quote-type-image' => __('Image', 'cozy-addons'),
				],
				'condition' => [
					'show_review_quote_icon' => 'yes',

				],
			]
		);
		$this->add_control(
			'review_quote_icon',
			[
				'label' => esc_html__('Quote Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-quote-left',
					'library' => 'fa-solid',
				],
				'condition' => [
					'review_quote_icon_type' => 'quote-type-icon',
					'show_review_quote_icon' => 'yes',
				],

			]
		);
		$this->add_control(
			'review_quote_icon_image',
			[
				'label' => esc_html__('Choose Image', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'review_quote_icon_type' => 'quote-type-image',
					'show_review_quote_icon' => 'yes'
				],
			]
		);
		$this->add_responsive_control(
			'testimonial_quote_top_space',
			[
				'label' => __('Adjust Vertical Position', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => -500,
						'max' => 500,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 0,
				],
				'size_units' => ['%', 'px'],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-testimonial .cozy-addons-quote-icon' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_review_quote_icon' => 'yes',
				],

			]
		);
		$this->add_responsive_control(
			'testimonial_quote_horizintal_space',
			[
				'label' => __('Adjust Horizontal Position', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => -500,
						'max' => 1000,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 0,
				],
				'size_units' => ['%', 'px'],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-testimonial .cozy-addons-quote-icon' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_review_quote_icon' => 'yes',
				],

			]
		);
		$this->add_control(
			'testimonial_quote_icon_margin',
			[
				'label' => __('Margin', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-testimonial .cozy-addons-quote-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'show_review_quote_icon' => 'yes',
				],
			]
		);
		$this->end_controls_section();
	}


	/**
	 * Rating Star Options.
	 */
	private function cozy_addons_testimonial_star_icon_options()
	{
		$this->start_controls_section(
			'testimonial_rating_star_section',
			[
				'label' => __('Rating Star Settings', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'show_review_star_icon',
			[
				'label' => __('Enable Review Star', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'select_rating_star_icon',
			[
				'label' => esc_html__('Quote Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fas-solid',
				],
				'condition' => [
					'show_review_star_icon' => 'yes',
				],

			]
		);
		$this->add_control(
			'slider_review_star_icon_size',
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
					'{{WRAPPER}} .cozy-addons-testimonial .cozy-addons-review-star' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_review_star_icon' => 'yes',
				],
			]
		);
		$this->add_control(
			'reviwing_star_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Icon Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#f0ad4e',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-testimonial .cozy-addons-review-star i' => 'color: {{VALUE}};',
				],
				'condition' => [
					'show_review_star_icon' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'review_star_style_padding',
			[
				'label'      => __('Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '5',
					'right' => '0',
					'bottom' => '20',
					'left' => '0',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .cozy-addons-testimonial .cozy-addons-review-star' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'condition' => [
					'show_review_star_icon' => 'yes',
				],
			]
		);
		$this->end_controls_section();
	}
	/**
	 * Active box for centered slide testimonial
	 */
	private function cozy_addons_testimonial_active_box_options()
	{
		$this->start_controls_section(
			'active_box_slide_style_box',
			[
				'label' => __('Active Box Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'testimonial_select_layout' => 'layout-carousel-style-2',
				],
			]
		);
		$this->start_controls_tabs('active_box_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'active_box_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);
		// background Color
		$this->add_control(
			'active_box_background_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-testimonial.layout-carousel-style-2 .slide.swiper-slide.swiper-slide-active .testimonial-box' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'active_box_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#343434',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-testimonial.layout-carousel-style-2 .slide.swiper-slide.swiper-slide-active .testimonial-box' => 'color: {{VALUE}};',
				],
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'active_box_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-testimonial.layout-carousel-style-2 .slide.swiper-slide.swiper-slide-active .testimonial-box',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'active_box_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-testimonial.layout-carousel-style-2 .slide.swiper-slide.swiper-slide-active .testimonial-box',
			]
		);
		// Normal border radius
		$this->add_control(
			'active_box_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-testimonial.layout-carousel-style-2 .slide.swiper-slide.swiper-slide-active .testimonial-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'active_box_style_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);
		$this->add_control(
			'active_box_background_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-testimonial.layout-carousel-style-2 .slide.swiper-slide.swiper-slide-active .testimonial-box:hover' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'active_box_text_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#343434',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-testimonial.layout-carousel-style-2 .slide.swiper-slide.swiper-slide-active .testimonial-box:hover' => 'color: {{VALUE}};',
				],
			]
		);
		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'active_box_border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-testimonial.layout-carousel-style-2 .slide.swiper-slide.swiper-slide-active .testimonial-box:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'active_box_box_shadow_hover',
				'label' => __('Box Shadow', 'plugin-domain'),
				'selector' => '{{WRAPPER}} section.cozy-addons-testimonial.layout-carousel-style-2 .slide.swiper-slide.swiper-slide-active .testimonial-box:hover',
			]
		);

		// Hover border radius
		$this->add_control(
			'active_box_border_radius_hover',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-testimonial.layout-carousel-style-2 .slide.swiper-slide.swiper-slide-active .testimonial-box:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
	private function cozy_addons_testimonial_style_box_options()
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
					'{{WRAPPER}} section.cozy-addons-testimonial .testimonials-holder' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-testimonial.layout-slide .content-holder' => 'text-align: {{VALUE}};',

				],
				'separator' => 'before',
			]
		);
		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'testimonial_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} .cozy-addons-testimonial .testimonials-holder .testimonial-box',
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
				'label'      => __('Box Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '0',
					'right' => '0',
					'bottom' => '30',
					'left' => '0',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .cozy-addons-testimonial .testimonials-holder .testimonial-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'grid_items_content_style_padding',
			[
				'label'      => __('Content Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '20',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .cozy-addons-testimonial .testimonials-holder .testimonial-box .testimonial-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_box_border',
				'label' => __('Content Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-addons-testimonial .testimonials-holder .testimonial-box .testimonial-content',
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
					'{{WRAPPER}} .cozy-addons-testimonial .testimonials-holder .testimonial-box' => 'background: {{VALUE}};',
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
				'default'   => '#343434',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-testimonial .testimonials-holder .testimonial-box' => 'color: {{VALUE}};',
				],
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-addons-testimonial .testimonials-holder .testimonial-box',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-addons-testimonial .testimonials-holder .testimonial-box',
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
					'{{WRAPPER}} .cozy-addons-testimonial .testimonials-holder .testimonial-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-testimonial .testimonials-holder .testimonial-box:hover' => 'background: {{VALUE}};',
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
				'default'   => '#343434',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-testimonial .testimonials-holder .testimonial-box:hover' => 'color: {{VALUE}};',
				],
			]
		);
		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-addons-testimonial .testimonials-holder .testimonial-box:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'label' => __('Box Shadow', 'plugin-domain'),
				'selector' => '{{WRAPPER}} .cozy-addons-testimonial .testimonials-holder .testimonial-box:hover',
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
					'{{WRAPPER}} .cozy-addons-testimonial .testimonials-holder .testimonial-box:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}
	/**
	 * Image style 
	 */
	private function cozy_addons_testimonial_image_style_options()
	{
		$this->start_controls_section(
			'testimonial_image_style_box',
			[
				'label' => __('Image Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'testimonial_image_wrap_width',
			[
				'label' => __('Image Wrapper Width', 'cozy-addons'),
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
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-testimonial .cozy-testimonial-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'testimonial_image_style_padding',
			[
				'label'      => __('Image Spacing', 'cozy-addons'),
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
					'{{WRAPPER}} section.cozy-addons-testimonial .cozy-testimonial-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'testimonial_image_width',
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
				'default' => [
					'unit' => 'px',
					'size' => 100,
				],
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-testimonial .cozy-testimonial-img img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'testimonial_image_height',
			[
				'label' => __('Image Height', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'vh' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 100,
				],
				'size_units' => ['px', 'vh'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-testimonial .cozy-testimonial-img img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'testimonial_image_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-testimonial .cozy-testimonial-img img',
			]
		);
		$this->add_responsive_control(
			'testimonial_image_margin',
			[
				'label' => __('Margin', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default'	 => [
					'top' => '20',
					'right' => '0',
					'bottom' => '10',
					'left' => '0',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-testimonial .cozy-testimonial-img img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'testimonial_image_border_radius',
			[
				'label' => __('Border Radius', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default'	 => [
					'top' => '50',
					'right' => '50',
					'bottom' => '50',
					'left' => '50',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-testimonial .cozy-testimonial-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}
	/**quote style */
	private function cozy_addons_testimonial_quote_style_options()
	{
		// Box.
		$this->start_controls_section(
			'review_quote_icon_style_box',
			[
				'label' => __('Quote Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_review_quote_icon' => 'yes',

				],
			]
		);
		$this->add_responsive_control(
			'review_quote_icon_size',
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
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-testimonial .cozy-addons-quote-icon' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cozy-addons-testimonial .cozy-addons-quote-icon img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'review_quote_icon_box_width',
			[
				'label' => __('Icon Box Width', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-testimonial .cozy-addons-quote-icon' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'review_quote_icon_box_height',
			[
				'label' => __('Icon Box Height', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-testimonial .cozy-addons-quote-icon' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'quote_icon_box_border_radius',
			[
				'label' => __('Icon Box Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-testimonial .cozy-addons-quote-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'quote_icon_box_border',
				'label' => __('Icon Box Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-addons-testimonial .cozy-addons-quote-icon',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'quote_icon_box_shadow',
				'label' => __('Icon Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-addons-testimonial .cozy-addons-quote-icon',
			]
		);
		$this->add_control(
			'review_quote_icon_box_bgcolor',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Icon Box Background Color', 'cozy-addons'),
				'default'   => 'rgba(0,0,0,0)',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-testimonial .cozy-addons-quote-icon' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'review_quote_icon_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Icon Color', 'cozy-addons'),
				'default'   => '#B4B1B1',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-testimonial .cozy-addons-quote-icon i' => 'color: {{VALUE}};',
				],
				'condition' => [
					'review_quote_icon_type' => 'quote-type-icon',
					'show_review_quote_icon' => 'yes',
				],
			]
		);

		$this->end_controls_section();
	}
	/**
	 * title Box Options.
	 */
	private function cozy_addons_testimonial_title_style_options()
	{

		// Box.
		$this->start_controls_section(
			'section_title_style_box',
			[
				'label' => __('Title Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'testimonial_title_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-testimonial .reviewer-name',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 20]],
					'font_weight' => ['default' => 600],
				],
			]
		);
		$this->add_control(
			'title_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-testimonial .reviewer-name' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'testimonial_title_style_padding',
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
					'{{WRAPPER}} section.cozy-addons-testimonial .reviewer-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->end_controls_section();
	}
	/**
	 * title Box Options.
	 */
	private function cozy_addons_testimonial_company_style_options()
	{

		// Box.
		$this->start_controls_section(
			'section_company_style_box',
			[
				'label' => __('Company Info Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'testimonial_company_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Compnay Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-testimonial .testimonial-company',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 14]],
					'font_weight' => ['default' => 400],
				],
			]
		);
		$this->add_control(
			'company_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Compnay Color', 'cozy-addons'),
				'default'   => '#676767',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-testimonial .testimonial-company' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'testimonial_designation_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Designation Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-testimonial .testimonial-position',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 14]],
					'font_weight' => ['default' => 400],
				],
			]
		);

		$this->add_control(
			'designation_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Designation Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#676767',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-testimonial .testimonial-position' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * slide pagination style
	 */
	private function cozy_addons_testimonial_carousel_pagination_options()
	{
		$this->start_controls_section(
			'slider_pagination_style',
			[
				'label' => __('Pagination Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'testimonial_select_layout',
							'operator' => '==',
							'value' => 'layout-slide',
						],
						[
							'name' => 'testimonial_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'layout-carousel',
						],
						[
							'name' => 'testimonial_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'layout-carousel-style-2',
						],
					],
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
					'{{WRAPPER}} section.cozy-addons-testimonial .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-testimonial .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-testimonial .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-testimonial .swiper-pagination-bullet' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-testimonial .swiper-pagination-bullet:hover' => 'background: {{VALUE}};',
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
	private function cozy_addons_testimonials_carousel_navigation_options()
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
							'name' => 'testimonial_select_layout',
							'operator' => '==',
							'value' => 'layout-slide',
						],
						[
							'name' => 'testimonial_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'layout-carousel',
						],
						[
							'name' => 'testimonial_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'layout-carousel-style-2',
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
					'size' => 12,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-testimonial .cozy-slide-nav' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-testimonial .cozy-slide-nav' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-testimonial .testimonials-holder .cozy-slide-nav' => 'height: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} section.cozy-addons-testimonial .testimonials-holder .cozy-slide-nav.cozy-slide-next' => 'line-height: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} section.cozy-addons-testimonial .testimonials-holder .cozy-slide-nav.cozy-slide-prev' => 'line-height: {{SIZE}}{{UNIT}}',

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
				'selector' => 'section.cozy-addons-testimonial .cozy-slide-nav',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_box_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-testimonial .cozy-slide-nav',
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
					'{{WRAPPER}} section.cozy-addons-testimonial .cozy-slide-nav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-testimonial .cozy-slide-nav' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-testimonial .cozy-slide-nav' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-testimonial .cozy-slide-nav:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_box_shadow_hover',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-testimonial .cozy-slide-nav:hover',
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
					'{{WRAPPER}} section.cozy-addons-testimonial .cozy-slide-nav:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-testimonial .cozy-slide-nav:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-testimonial .cozy-slide-nav:hover' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}
	private function cozy_addons_testimonial_pagination_options()
	{
		$this->start_controls_section(
			'testimonials_pagination_style_setup',
			[
				'label' => __('Pagination Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'conditions' => [
					'enable_pagination' => 'yes',
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'testimonial_select_layout',
							'operator' => '==',
							'value' => 'layout-grid',
						],
						[
							'name' => 'testimonial_select_layout',
							'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
							'value' => 'layout-list',
						],
					],
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
			'portfolio_pagination_style_padding',
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
			'portfolio_pagination_style_spacing',
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
			'portfolio_pagination_paginate_style_spacing',
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
			'portfolio_pagination_paginate_style_padding',
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
				'name'     => 'portfolio_pagination_typography',
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
		$this->start_controls_tabs('portfolio_pagination_box_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'portfolio_pagination_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);

		$this->add_control(
			'portfolio_pagination_bgcolor',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'default'   => '#676767',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination a' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'portfolio_pagination_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'portfolio_pagination_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}}  .cozy-addons-pagination a',
			]
		);
		// Hover border radius
		$this->add_control(
			'portfolio_pagination_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
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
			'portfolio_pagination_style_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);
		$this->add_control(
			'portfolio_pagination_bgcolor_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'default'   => '#343434',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination a:hover' => 'background: {{VALUE}};',
					'{{WRAPPER}} .cozy-addons-pagination span.page-numbers.current' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'portfolio_pagination_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
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
				'name' => 'portfolio_pagination_border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination a:hover',
					'{{WRAPPER}} .cozy-addons-pagination span.page-numbers.current',
				],
			]
		);
		// Hover border radius
		$this->add_control(
			'portfolio_pagination_border_radius_hover',
			[
				'label' => __('Border Radius', 'elementor'),
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
		if (post_type_exists('cea_testimonial')) {
			$settings = $this->get_settings();
			$current_layout = $settings['testimonial_select_layout']; ?>
			<section class="cozy-addons-testimonial <?php echo esc_attr($current_layout); ?>">
				<?php
				include(COZY_ADDONS_PLUGIN_DIR . 'public/widgets/testimonial/testimonial-layout.php');
				?>

			</section> <!-- featured-layout -->
<?php } else {
			echo __('Please Install & Activate the "Cozy Essential Addons - https://wordpress.org/plugins/cozy-essential-addons/" Plugin', 'cozy-addons');
		}
	}
}
