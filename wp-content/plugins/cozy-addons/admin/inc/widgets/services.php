<?php

namespace Cozy_Addons\ServiceWidgets;

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
class Cozy_Addons_Service_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'cozy-addons-service-list';
	}

	public function get_title()
	{
		return __('Service', 'cozy-addons');
	}

	public function get_icon()
	{
		return 'eicon-tools cozy-widget-icons';
	}
	public function get_keywords()
	{
		return ['services box', 'cozy', 'cozy addons'];
	}
	public function get_categories()
	{
		return ['cozy-addons-items'];
	}

	protected function register_controls()
	{
		if (cozy_addons_premium_access()) {
			$this->cozy_addons_query_options();
			$this->cozy_addons_content_options();
			//Styles for widget elements
			$this->cozy_addons_cta_style_box_options();
			$this->cozy_addons_content_image_options();
			$this->cozy_addons_service_style_title_options();
			$this->cozy_addons_services_pagination_options();
			$this->cozy_addons_services_carousel_pagination_options();
			$this->cozy_addons_services_carousel_navigation_options();
			$this->cozy_addons_cta_button_options();
		}
	}

	private function cozy_addons_service_categories()
	{
		$taxonomy = 'cea_service_category';
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
		$this->add_control(
			'service_select_layout',
			[
				'label' => __('Select Layout', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'layout-grid',
				'options' => [
					'layout-grid' => esc_html__('Grid', 'cozy-addons'),
					'layout-carousel' => esc_html__('Carousel', 'cozy-addons'),
				],
			]
		);

		$this->add_control(
			'services_grid_column',
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
					'service_select_layout' => 'layout-grid',
				],
			]
		);
		$this->add_control(
			'services_carousel_column',
			[
				'label' => __('Display Column', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'col-carousel-3',
				'options' => [
					'col-carousel-3' => esc_html__('3 Column', 'cozy-addons'),
					'col-carousel-4' => esc_html__('4 Column', 'cozy-addons'),
				],
				'condition' => [
					'service_select_layout' => 'layout-carousel',
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
					'service_select_layout' => 'layout-carousel',
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
					'service_select_layout' => 'layout-carousel',
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
					'service_select_layout' => 'layout-carousel',
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
					'service_select_layout' => 'layout-carousel',
				],
			]
		);

		$this->add_control(
			'services_grid_column_gap',
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
					'{{WRAPPER}} section.cozy-addons-services.layout-grid .services-holder' => 'grid-column-gap: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'service_select_layout' => 'layout-grid',
				],
			]
		);
		$this->add_control(
			'services_grid_rows_gap',
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
					'{{WRAPPER}} section.cozy-addons-services.layout-grid .services-holder .service-box' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'service_select_layout' => 'layout-grid',
				],
			]
		);
		// Service categories
		$this->add_control(
			'service_categories',
			[
				'label'       => __('Select Categories', 'cozy-addons'),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'options'     => $this->cozy_addons_service_categories(),

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
			'enable_pagination',
			[
				'label' => __('Enable Pagination', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'no',
				'condition' => [
					'service_select_layout' => 'layout-grid',
				],
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
			'service_orderby',
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
			'service_order',
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
	 * Content settings
	 */
	private function cozy_addons_content_options()
	{
		$this->start_controls_section(
			'service_content_setting_box',
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


				'default' => 'yes',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'service_excerpt_length',
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
			'service_cta_icon',
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
	 * Service image style
	 */
	private function cozy_addons_content_image_options()
	{
		$this->start_controls_section(
			'service_image_style',
			[
				'label' => __('Image Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_featured_image' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'service_image_box_style_padding',
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
					'{{WRAPPER}} section.cozy-addons-services .cozy-service-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'service_image_bottom_spacing',
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
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-services .cozy-service-img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'service_image_width',
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
					'unit' => '%',
					'size' => 100,
				],
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}}  section.cozy-addons-services .cozy-service-img img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'service_image_height',
			[
				'label' => __('Image Height', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
				],
				'default' => [
					'size' => 250,
				],
				'selectors' => [
					'{{WRAPPER}}  section.cozy-addons-services .cozy-service-img img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'service_image_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-services .cozy-service-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'service_image_box_shadow',
				'label' => __('Image Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-services .cozy-service-img img',
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Style Title
	 */
	private function cozy_addons_service_style_title_options()
	{

		// Box.
		$this->start_controls_section(
			'service_title_style_box',
			[
				'label' => __('Title Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'service_title_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-services .service-title',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 20]],
					'font_weight' => ['default' => 700],
				],
			]
		);
		$this->add_responsive_control(
			'faq_title_style_padding',
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
					'{{WRAPPER}} section.cozy-addons-services .service-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
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
					'{{WRAPPER}} section.cozy-addons-services .service-title' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_section();
	}


	/**
	 *CTA Option Style.
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
					'{{WRAPPER}} .cozy-addons-services .cta' => 'margin-top: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .cozy-addons-services .cta a.service-more .button-icon' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .cozy-addons-services .cta a.service-more.before-text .button-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cozy-addons-services .cta a.service-more.after-text .button-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-services .cta a.service-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'cta_button_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-services .cta a.service-more',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 14]],
					'font_weight' => ['default' => 400],
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
				'selector' => '{{WRAPPER}} section.cozy-addons-services .cta a.service-more',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-services .cta a.service-more',
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
					'{{WRAPPER}} section.cozy-addons-services .cta a.service-more' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-services .cta a.service-more' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-services .cta a.service-more' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-services .cta a.service-more:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow_hover',
				'label' => __('Box Shadow', 'plugin-domain'),
				'selector' => '{{WRAPPER}} section.cozy-addons-services .cta a.service-more:hover',
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
					'{{WRAPPER}} section.cozy-addons-services .cta a.service-more:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-services .cta a.service-more:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-services .cta a.service-more:hover' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-services .services-holder .service-box' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'pricing_table_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-services .services-holder .service-box',
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
			'grid_items_style_padding',
			[
				'label'      => __('Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '0',
					'right' => '10',
					'bottom' => '0',
					'left' => '10',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-services .services-holder .service-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-services .services-holder .service-box' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-services .services-holder .service-box' => 'color: {{VALUE}};',
				],
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-services .services-holder .service-box',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-services .services-holder .service-box',
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
					'{{WRAPPER}} section.cozy-addons-services .services-holder .service-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-services .services-holder .service-box:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-services .services-holder .service-box:hover' => 'color: {{VALUE}};',
				],
			]
		);
		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-services .services-holder .service-box:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'label' => __('Box Shadow', 'plugin-domain'),
				'selector' => '{{WRAPPER}} section.cozy-addons-services .services-holder .service-box:hover',
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
					'{{WRAPPER}} section.cozy-addons-services .services-holder .service-box:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
	private function cozy_addons_services_carousel_pagination_options()
	{
		$this->start_controls_section(
			'slider_pagination_style',
			[
				'label' => __('Carousel Pagination Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_carousel_pagination' => 'yes',
					'service_select_layout' => 'layout-carousel',
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
					'{{WRAPPER}} .cozy-addons-services.layout-carousel .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .cozy-addons-services.layout-carousel .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .cozy-addons-services.layout-carousel .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .cozy-addons-services.layout-carousel .swiper-pagination-bullet' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .cozy-addons-services.layout-carousel .swiper-pagination-bullet:hover' => 'background: {{VALUE}};',
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
	private function cozy_addons_services_carousel_navigation_options()
	{
		$this->start_controls_section(
			'slider_navigation_style',
			[
				'label' => __('Carousel Navigation Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_carousel_navigation' => 'yes',
					'service_select_layout' => 'layout-carousel',
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
					'{{WRAPPER}} .cozy-addons-services.layout-carousel .cozy-slide-nav' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .cozy-addons-services.layout-carousel .cozy-slide-nav' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .cozy-addons-services.layout-carousel .cozy-slide-nav' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cozy-addons-services.layout-carousel .cozy-slide-nav.cozy-slide-next' => 'line-height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cozy-addons-services.layout-carousel .cozy-slide-nav.cozy-slide-prev' => 'line-height: {{SIZE}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .cozy-addons-services.layout-carousel .cozy-slide-nav',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_box_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-addons-services.layout-carousel .cozy-slide-nav',
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
					'{{WRAPPER}} .cozy-addons-services.layout-carousel .cozy-slide-nav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .cozy-addons-services.layout-carousel .cozy-slide-nav' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .cozy-addons-services.layout-carousel .cozy-slide-nav' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .cozy-addons-services.layout-carousel .cozy-slide-nav:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_box_shadow_hover',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-addons-services.layout-carousel .cozy-slide-nav:hover',
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
					'{{WRAPPER}} .cozy-addons-services.layout-carousel .cozy-slide-nav:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .cozy-addons-services.layout-carousel .cozy-slide-nav:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .cozy-addons-services.layout-carousel .cozy-slide-nav:hover' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	private function cozy_addons_services_pagination_options()
	{
		$this->start_controls_section(
			'services_pagination_style_setup',
			[
				'label' => __('Pagination Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'service_select_layout' => 'layout-grid',
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
			'services_pagination_style_padding',
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
			'services_pagination_style_spacing',
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
			'services_pagination_paginate_style_spacing',
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
			'services_pagination_paginate_style_padding',
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
				'name'     => 'services_pagination_typography',
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
		$this->start_controls_tabs('services_pagination_box_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'services_pagination_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);

		$this->add_control(
			'services_pagination_bgcolor',
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
			'services_pagination_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
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
				'name' => 'services_pagination_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}}  .cozy-addons-pagination a',
			]
		);
		// Hover border radius
		$this->add_control(
			'services_pagination_border_radius',
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
			'services_pagination_style_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);
		$this->add_control(
			'services_pagination_bgcolor_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#343434',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination a:hover' => 'background: {{VALUE}};',
					'{{WRAPPER}} .cozy-addons-pagination span.page-numbers.current' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'services_pagination_hover_color',
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
				'name' => 'services_pagination_border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination a:hover',
					'{{WRAPPER}} .cozy-addons-pagination span.page-numbers.current',
				],
			]
		);
		// Hover border radius
		$this->add_control(
			'services_pagination_border_radius_hover',
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
		if (cozy_addons_premium_access()) {
			if (post_type_exists('cea_service')) {
				$settings = $this->get_settings();
				$slected_layout = $settings['service_select_layout']; ?>
				<section class="cozy-addons-services <?php echo esc_attr($slected_layout); ?>">
					<?php
					include(COZY_ADDONS_PLUGIN_DIR . 'public/widgets/service/service-layout.php');
					?>
				</section> <!-- featured-layout -->
			<?php } else {
				echo __('Please Install & Activate the "Cozy Essential Addons - https://wordpress.org/plugins/cozy-essential-addons/" Plugin', 'cozy-addons');
			}
		} else { ?>
			<a href="https://cozythemes.com/cozy-addons/" target="_blank"><?php echo __('Upgrade To Premium Version - https://cozythemes.com/cozy-addons/', 'cozy-addons'); ?></a>
<?php }
	}
}
