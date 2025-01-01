<?php

namespace Cozy_Addons\SiteMapWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Core\Schemes\Typography;
use Elementor\Core\Schemes\Color;
use Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * @since 1.1.0
 */
class Cozy_Addons_SiteMap_Widget extends Widget_Base {


	public function get_name() {
		return 'cozy-addons-sitemap';
	}

	public function get_title() {
		return __( 'Sitemap', 'cozy-addons' );
	}

	public function get_icon() {
		return 'eicon-sitemap cozy-widget-icons';
	}
	public function get_keywords() {
		return array( 'sitemap', 'cozy addons' );
	}
	public function get_categories() {
		return array( 'cozy-addons-items' );
	}

	/**
	 * front content
	 */
	protected function register_controls() {

		$this->cozy_addons_sitemap_content_options();
		$this->cozy_addons_sitemap_style_box_options();
		$this->cozy_addons_sitemap_style_header_options();
		$this->cozy_addons_sitemap_style_list_options();
		$this->cozy_addons_sitemap_style_count_options();
	}

	/**
	 * front content
	 */
	private function cozy_addons_sitemap_content_options() {
		$this->start_controls_section(
			'content_section',
			array(
				'label' => __( 'General', 'cozy-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'enable_pages_list',
			array(
				'label'   => __( 'Enable Pages', 'cozy-addons' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			)
		);
		$this->add_control(
			'pagelist_header_text',
			array(
				'label'       => __( 'Pages List Header', 'cozy-addons' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 1,
				'default'     => __( 'Pages', 'cozy-addons' ),
				'placeholder' => __( 'Heading Text', 'cozy-addons' ),
				'condition'   => array(
					'enable_pages_list' => 'yes',
				),
			)
		);
		$this->add_control(
			'enable_posts_list',
			array(
				'label'   => __( 'Enable Posts', 'cozy-addons' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',

			)
		);
		$this->add_control(
			'postlist_header_text',
			array(
				'label'       => __( 'Post List Header', 'cozy-addons' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 1,
				'default'     => __( 'Posts', 'cozy-addons' ),
				'placeholder' => __( 'Heading Text', 'cozy-addons' ),
				'condition'   => array(
					'enable_posts_list' => 'yes',
				),
			)
		);
		$this->add_control(
			'enable_categories_list',
			array(
				'label'   => __( 'Enable Categories', 'cozy-addons' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			)
		);
		$this->add_control(
			'categorieslist_header_text',
			array(
				'label'       => __( 'Categories List Header', 'cozy-addons' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 1,
				'default'     => __( 'Categories', 'cozy-addons' ),
				'placeholder' => __( 'Heading Text', 'cozy-addons' ),
				'condition'   => array(
					'enable_categories_list' => 'yes',
				),
			)
		);
		$this->add_control(
			'enable_category_count',
			array(
				'label'     => __( 'Enable Post Count', 'cozy-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'no',
				'condition' => array(
					'enable_categories_list' => 'yes',
				),
			)
		);
		$this->add_control(
			'title_tag',
			array(
				'label'   => __( 'Title HTML Tag', 'cozy-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				),
				'default' => 'h3',
			)
		);
		$this->add_control(
			'enable_sitemap_list_icon',
			array(
				'label'   => __( 'Enable List Icon', 'cozy-addons' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'no',
			)
		);

		$this->add_control(
			'sitemap_list_icon',
			array(
				'label'     => __( 'Icon', 'cozy-addons' ),
				'type'      => \Elementor\Controls_Manager::ICONS,
				'default'   => array(
					'value'   => 'fas fa-check',
					'library' => 'fa-solid',
				),
				'condition' => array(
					'enable_sitemap_list_icon' => 'yes',
				),
			)
		);
		$this->add_responsive_control(
			'box_grid_gap',
			array(
				'label'     => esc_html__( 'Column Spacing', 'cozy-addons' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 250,
					),
				),
				'default'   => array(
					'unit' => 'px',
					'size' => 30,
				),
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder' => 'grid-gap: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->end_controls_section();
	}

	/**
	 * Style Box Options.
	 */
	private function cozy_addons_sitemap_style_box_options() {

		// Box.
		$this->start_controls_section(
			'section_style_box',
			array(
				'label' => __( 'Box Style', 'cozy-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_responsive_control(
			'ct_sitemap_align',
			array(
				'label'     => __( 'Alignment', 'cozy-addons' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => array(
					'left'   => array(
						'title' => __( 'Left', 'cozy-addons' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'cozy-addons' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => __( 'Right', 'cozy-addons' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'default'   => 'left',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .ct-sitemap' => 'text-align: {{VALUE}};',
				),
			)
		);
		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'           => 'ct_sitemap_content_typography',
				'scheme'         => Typography::TYPOGRAPHY_1,
				'label'          => __( 'Typography', 'cozy-addons' ),

				'selector'       => '{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .ct-sitemap',
				'fields_options' => array(
					'typography'  => array( 'default' => 'yes' ),
					'font_size'   => array( 'default' => array( 'size' => 16 ) ),
					'font_weight' => array( 'default' => 400 ),
				),
				'separator'      => 'before',
			)
		);

		// Box internal padding.
		$this->add_responsive_control(
			'ct_sitemap_style_padding',
			array(
				'label'      => __( 'padding', 'cozy-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'    => array(
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'isLinked' => false,
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .ct-sitemap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'ct_sitemap_box_border',
				'label'    => __( 'Border', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .ct-sitemap',
			)
		);
		$this->add_control(
			'ct_sitemap_border_radius',
			array(
				'label'      => __( 'Border Radius', 'elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .ct-sitemap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Style Box Options.
	 */
	private function cozy_addons_sitemap_style_list_options() {

		// Box.
		$this->start_controls_section(
			'section_list_style_box',
			array(
				'label' => __( 'List Style', 'cozy-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_responsive_control(
			'list_icon_size',
			array(
				'label'     => esc_html__( 'Icon Size', 'cozy-addons' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 1,
						'max' => 50,
					),
				),
				'default'   => array(
					'unit' => 'px',
					'size' => 14,
				),
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-sitemap .sitemap-list a .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				),
				'condition' => array(
					'enable_sitemap_list_icon' => 'yes',
				),
			)
		);
		$this->add_responsive_control(
			'list_icon_spacing',
			array(
				'label'     => esc_html__( 'Icon Spacing', 'cozy-addons' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 1,
						'max' => 100,
					),
				),
				'default'   => array(
					'unit' => 'px',
					'size' => 5,
				),
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-sitemap .sitemap-list a .icon i' => 'margin-right: {{SIZE}}{{UNIT}};',
				),
				'condition' => array(
					'enable_sitemap_list_icon' => 'yes',
				),
			)
		);
		$this->add_responsive_control(
			'ct_sitemap_list_padding',
			array(
				'label'      => __( 'Padding', 'cozy-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'    => array(
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'isLinked' => false,
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .ct-sitemap .sitemap-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				),
			)
		);
		$this->add_responsive_control(
			'ct_sitemap_list_margin',
			array(
				'label'      => __( 'Margin', 'cozy-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'    => array(
					'top'      => '5',
					'right'    => '0',
					'bottom'   => '5',
					'left'     => '0',
					'isLinked' => false,
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .ct-sitemap .sitemap-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'ct_sitemap_list_border',
				'label'    => __( 'Border', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .ct-sitemap .sitemap-list',
			)
		);
		$this->start_controls_tabs( 'sitemap_style_tabs' );
		// Normal tab.
		$this->start_controls_tab(
			'sitemap_style_tabs_normal',
			array(
				'label' => __( 'Normal', 'cozy-addons' ),
			)
		);

		// button text color
		$this->add_control(
			'sitemap_title_text_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				),
				'default'   => '#6EC1E4',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .ct-sitemap .sitemap-list a' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'sitemap_title_icon_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Icon Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				),
				'default'   => '#6EC1E4',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .ct-sitemap .sitemap-list a i' => 'color: {{VALUE}};',
				),
				'condition' => array(
					'enable_sitemap_list_icon' => 'yes',
				),
			)
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'sitemap_style_tabs_normal_hover',
			array(
				'label' => __( 'Hover', 'cozy-addons' ),
			)
		);
		// Hover border shadow

		// button text color
		$this->add_control(
			'sitemap_title_text_color_hover',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				),
				'default'   => '#61CE70',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .ct-sitemap .sitemap-list a:hover' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'sitemap_title_icon_color_hover',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Icon Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				),
				'default'   => '#61CE70',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .ct-sitemap .sitemap-list a:hover i' => 'color: {{VALUE}};',
				),
				'condition' => array(
					'enable_sitemap_list_icon' => 'yes',
				),
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	/**
	 * Style Box Options.
	 */
	private function cozy_addons_sitemap_style_header_options() {

		// Box.
		$this->start_controls_section(
			'sitemap_list_header_style_box',
			array(
				'label' => __( 'Header Style', 'cozy-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'           => 'sitemap_header_typography',
				'scheme'         => Typography::TYPOGRAPHY_1,
				'label'          => __( 'Typography', 'cozy-addons' ),

				'selector'       => '{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .list-title',
				'fields_options' => array(
					'typography'  => array( 'default' => 'yes' ),
					'font_size'   => array( 'default' => array( 'size' => 24 ) ),
					'font_weight' => array( 'default' => 600 ),
				),
			)
		);

		// Box internal padding.
		$this->add_responsive_control(
			'sitemap_style_header_margin',
			array(
				'label'      => __( 'Margin', 'cozy-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'    => array(
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'isLinked' => false,
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .list-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				),
			)
		);
		$this->add_responsive_control(
			'sitemap_style_header_padding',
			array(
				'label'      => __( 'Padding', 'cozy-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'    => array(
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'isLinked' => false,
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .list-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'sitemap_header_border',
				'label'    => __( 'Border', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .list-title',
			)
		);
		$this->add_control(
			'sitemap_header_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				),
				'default'   => '#565656',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .list-title' => 'color: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();
	}






	/**
	 * Style Box Options.
	 */
	private function cozy_addons_sitemap_style_count_options() {

		// Box.
		$this->start_controls_section(
			'sitemap_post_count_style_box',
			array(
				'label'     => __( 'Count Style', 'cozy-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'enable_category_count' => 'yes',
				),
			)
		);
		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'           => 'sitemap_count_typography',
				'scheme'         => Typography::TYPOGRAPHY_1,
				'label'          => __( 'Typography', 'cozy-addons' ),

				'selector'       => '{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .ct-sitemap .count',
				'fields_options' => array(
					'typography'  => array( 'default' => 'yes' ),
					'font_size'   => array( 'default' => array( 'size' => 16 ) ),
					'font_weight' => array( 'default' => 400 ),
				),
				'separator'      => 'before',
			)
		);
		$this->add_responsive_control(
			'sitemap_categories_count_spacing',
			array(
				'label'     => esc_html__( 'Count Spacing', 'cozy-addons' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 250,
					),
				),
				'default'   => array(
					'unit' => 'px',
					'size' => 10,
				),
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .ct-sitemap .count' => 'margin-left: {{SIZE}}{{UNIT}};',
				),
			)
		);

		// Box internal padding.
		$this->add_responsive_control(
			'sitemap_style_count_padding',
			array(
				'label'      => __( 'Padding', 'cozy-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'    => array(
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'isLinked' => false,
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .ct-sitemap .count' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'sitemap_category_post_count_border',
				'label'    => __( 'Border', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .ct-sitemap .count',
			)
		);
		$this->add_control(
			'sitemap_post_count_border_radius',
			array(
				'label'      => __( 'Border Radius', 'elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .ct-sitemap .count' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->start_controls_tabs( 'catlist_style_count_tabs' );
		// Normal tab.
		$this->start_controls_tab(
			'sitemap_style_count_tabs_normal',
			array(
				'label' => __( 'Normal', 'cozy-addons' ),
			)
		);

		// button text color
		$this->add_control(
			'sitemap_count_background_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				),
				'default'   => 'rgba(0,0,0,0)',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-sitemap .sitemap-holder .ct-sitemap .count' => 'background: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'sitemap_count_text_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				),
				'default'   => '#6EC1E4',
				'selectors' => array(
					'{{WRAPPER}} ssection.cozy-addons-sitemap .sitemap-holder .ct-sitemap .count' => 'color: {{VALUE}};',
				),

			)
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'sitemap_style_count_tabs_hover',
			array(
				'label' => __( 'Hover', 'cozy-addons' ),
			)
		);
		// Hover border shadow

		// button text color
		$this->add_control(
			'sitemap_count_background_color_hover',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				),
				'default'   => 'rgba(0,0,0,0)',
				'selectors' => array(
					'{{WRAPPER}} ssection.cozy-addons-sitemap .sitemap-holder .ct-sitemap .count:hover' => 'background: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'sitemap_count_text_color_hover',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				),
				'default'   => '#61CE70',
				'selectors' => array(
					'{{WRAPPER}} ssection.cozy-addons-sitemap .sitemap-holder .ct-sitemap .count:hover' => 'color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	protected function render( $instance = array() ) {
		$settings = $this->get_settings(); ?>
		<section class="cozy-addons-sitemap">
			<div class="sitemap-holder">
				<?php
				if ( $settings['enable_pages_list'] === 'yes' ) {
					?>
					<div class="ct-sitemap sitemap-pagelist">
						<?php
						if ( $settings['pagelist_header_text'] ) {
							echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="list-title">' . esc_html( $settings['pagelist_header_text'] ) . '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
						}
						$pagelist_args  = array(
							'post_type' => 'page',
						);
						$pagelist_query = new \WP_Query( $pagelist_args );

						if ( $pagelist_query->have_posts() ) {
							while ( $pagelist_query->have_posts() ) {
								$pagelist_query->the_post();
								?>
								<div class="sitemap-list">

									<a href="<?php the_permalink(); ?>">
										<?php
										if ( $settings['enable_sitemap_list_icon'] === 'yes' ) {
											echo '<span class="icon">';
											\Elementor\Icons_Manager::render_icon( $settings['sitemap_list_icon'], array( 'aria-hidden' => 'true' ) );
											echo '</span>';
										}
										the_title();
										?>
										</a>
								</div>
								<?php
							}
						}
						?>
					</div>
					<?php
				} //end of page list
				if ( $settings['enable_posts_list'] === 'yes' ) {
					?>
					<div class="ct-sitemap sitemap-postlist">
						<?php
						if ( $settings['postlist_header_text'] ) {
							echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="list-title">' . esc_html( $settings['postlist_header_text'] ) . '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
						}
						$postlist_args  = array(
							'post_type' => 'post',
						);
						$postlist_query = new \WP_Query( $postlist_args );
						if ( $postlist_query->have_posts() ) {
							while ( $postlist_query->have_posts() ) {
								$postlist_query->the_post();
								?>
								<div class="sitemap-list">

									<a href="<?php the_permalink(); ?>">
										<?php
										if ( $settings['enable_sitemap_list_icon'] === 'yes' ) {
											echo '<span class="icon">';
											\Elementor\Icons_Manager::render_icon( $settings['sitemap_list_icon'], array( 'aria-hidden' => 'true' ) );
											echo '</span>';
										}
										the_title();
										?>
										</a>
								</div>
								<?php
							}
						}
						?>
					</div>
					<?php
				} // end of post list
				if ( $settings['enable_categories_list'] === 'yes' ) {
					echo ' <div class="ct-sitemap sitemap-post-categories">';
					$ct_categories = get_categories();
					if ( $settings['categorieslist_header_text'] ) {
						echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="list-title">' . esc_html( $settings['categorieslist_header_text'] ) . '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
					}
					// Loop through each category
					foreach ( $ct_categories as $category ) {
						?>
						<div class="sitemap-list">

							<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
								<span class="text">
									<?php
									if ( $settings['enable_sitemap_list_icon'] === 'yes' ) {
										echo '<span class="icon">';
										\Elementor\Icons_Manager::render_icon( $settings['sitemap_list_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</span>';
									}
									echo esc_html( $category->name );
									echo '</span>';
									if ( $settings['enable_category_count'] === 'yes' ) {
										echo '<span class="count">' . esc_html( $category->count ) . '</span>';
									}
									?>
							</a>
						</div>
						<?php
					}
					echo '</div>';
				} // end of post categories section --
				?>
			</div> <!-- end of sitemap holder -->
		</section> <!-- featured-layout -->

		<?php
	}
}
