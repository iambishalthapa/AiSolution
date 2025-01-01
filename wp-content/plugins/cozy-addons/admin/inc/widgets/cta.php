<?php

namespace Cozy_Addons\CTAWidgets;

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
class Cozy_Addons_CTA_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'cozy-addons-cta-block';
	}

	public function get_title()
	{
		return __('Call To Action', 'cozy-addons');
	}

	public function get_icon()
	{
		return 'eicon-call-to-action cozy-widget-icons';
	}
	public function get_keywords()
	{
		return ['call to action', 'cta', 'cozy addons'];
	}

	public function get_categories()
	{
		return ['cozy-addons-items'];
	}

	protected function register_controls()
	{

		$this->cozy_addons_content_options();
		$this->cozy_addons_cta_content_button_options();

		//Styles for widget elements
		$this->cozy_addons_cta_style_box_options();
		$this->cozy_addons_cta_style_image_options();
		$this->cozy_addons_cta_content_options();
		$this->cozy_addons_cta_button_options();
	}

	/**
	 * Header Layout Options.
	 */
	private function cozy_addons_content_options()
	{
		$this->start_controls_section(
			'cozy_content_section',
			[
				'label' => __('General', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'cozy_cta_layout',
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
			'cta_image',
			[
				'label' => esc_html__('Background Image', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'cozy_cta_layout' => 'layout-3',
				],
			]
		);
		$this->add_control(
			'cta_image_position',
			[
				'label' => __('Image Position', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'align-left',
				'options' => [
					'align-left' => esc_html__('Left Side', 'cozy-addons'),
					'align-right' => esc_html__('Right Side', 'cozy-addons'),
				],
				'condition' => [
					'cozy_cta_layout' => 'layout-3',
				],
			]
		);
		$this->add_control(
			'title_text',
			[
				'label' => __('Title', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => __('Call To Action', 'cozy-addons'),
				'placeholder' => __('Call To Action', 'cozy-addons'),
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
			'description_text',
			[
				'label' => __('Description', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'default' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'cozy-addons'),
				'placeholder' => __('Add description Here', 'cozy-addons'),
			]
		);

		$this->end_controls_section();
	}
	/**
	 * button option
	 */
	private function cozy_addons_cta_content_button_options()
	{
		$this->start_controls_section(
			'cozy_content_button_section',
			[
				'label' => __('Button', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'show_cta_icon',
			[
				'label' => __('Show Button Icon', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'pt_cta_icon',
			[
				'label' => __('Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_cta_icon' => 'yes'
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
			]
		);
		$this->add_control(
			'button_link',
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
					'{{WRAPPER}} .cozy-addons-cta .cozy-cta-box a.cta-button .button-icon' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .cozy-addons-cta .cozy-cta-box a.cta-button.before-text .button-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cozy-addons-cta .cozy-cta-box a.cta-button.after-text .button-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'layout_2_button_alignment',
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
					'{{WRAPPER}} .cozy-cta-box.layout-2  .cta-content .cozy-addons-col-3' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'cozy_cta_layout' => 'layout-2',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'cta_button_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} .cozy-addons-cta .cozy-cta-box a.cta-button',
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
					'top' => '10',
					'right' => '20',
					'bottom' => '10',
					'left' => '20',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .cozy-addons-cta .cozy-cta-box a.cta-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
				'selector' => '{{WRAPPER}} .cozy-addons-cta .cozy-cta-box a.cta-button',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-addons-cta .cozy-cta-box a.cta-button',
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
					'{{WRAPPER}} .cozy-addons-cta .cozy-cta-box a.cta-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// Box color
		$this->add_control(
			'button_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-cta .cozy-cta-box a.cta-button' => 'background: {{VALUE}};',
				],
			]
		);
		//button text color
		$this->add_control(
			'button_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-cta .cozy-cta-box a.cta-button' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .cozy-addons-cta .cozy-cta-box a.cta-button:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow_hover',
				'label' => __('Box Shadow', 'plugin-domain'),
				'selector' => '{{WRAPPER}} .cozy-addons-cta .cozy-cta-box a.cta-button:hover',
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
					'{{WRAPPER}} .cozy-addons-cta .cozy-cta-box a.cta-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'default'   => '#d10865',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-cta .cozy-cta-box a.cta-button:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .cozy-addons-cta .cozy-cta-box a.cta-button:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	/**
	 * Content Style
	 */
	private function cozy_addons_cta_content_options()
	{
		$this->start_controls_section(
			'cozy_cta_content_style',
			[
				'label' => __('Content Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'cta_title_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Title Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-cta .cozy-cta-box .section-title',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 24]],
					'font_weight' => ['default' => 700],
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'cta_title_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Title Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cozy-cta-box .cta-content .section-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'cozy_cta_title_space',
			[
				'label' => __('Title Bottom Space', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -20,
						'max' => 100,
					],
				],
				'default' => [
					'size' => '10',
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-cta-box .cta-content .section-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cozy-cta-box .cta-content' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'cta_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Text Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-cta .cozy-cta-box',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 16]],
					'font_weight' => ['default' => 400],
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'cozy_cta_description_space',
			[
				'label' => __('Description Bottom Space', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -20,
						'max' => 600,
					],
				],
				'default' => [
					'size' => '25',
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-cta-box .cta-content .description.content-block' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}

	private function cozy_addons_cta_style_image_options()
	{
		$this->start_controls_section(
			'cozy_cta_image_style',
			[
				'label' => __('Image Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'cozy_cta_layout' => 'layout-3',
				],
			]
		);
		$this->add_control(
			'cozy_cta_layout_3_width',
			[
				'label' => __('Image Width (%)', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-cta .cozy-cta-box.layout-3 .cta-img img' => 'width: {{SIZE}}{{UNIT}};',
				],

			]
		);
		$this->add_control(
			'cozy_cta_layout_3_max_width',
			[
				'label' => __('Image Max Width (%)', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-cta .cozy-cta-box.layout-3 .cta-img img' => 'max-width: {{SIZE}}{{UNIT}};',
				],

			]
		);
		$this->add_control(
			'content_image_part_align',
			[
				'label' => __('Image Alignment', 'cozy-addons'),
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
					'{{WRAPPER}} .cozy-addons-cta .cozy-cta-box.layout-3 .cta-img' => 'text-align: {{VALUE}};',
				],

			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'cta_image_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-addons-cta .cozy-cta-box.layout-3 .cta-img img',
			]
		);
		// Normal border radius
		$this->add_control(
			'cta_image_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-cta .cozy-cta-box.layout-3 .cta-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'cta_image_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-addons-cta .cozy-cta-box.layout-3 .cta-img img',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Style Box Options.
	 */
	private function cozy_addons_cta_style_box_options()
	{
		$this->start_controls_section(
			'cozy_cta_style_style',
			[
				'label' => __('Content Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'cozy_cta_layout_1_height',
			[
				'label' => __('Box Height', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1000,
					],
				],
				'default' => [
					'size' => '250',
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-cta .cozy-cta-box.layout-1' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'cozy_cta_layout' => 'layout-1',
				],
			]
		);
		$this->add_responsive_control(
			'cozy_cta_layout_2_height',
			[
				'label' => __('Box Height', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1000,
					],
				],
				'default' => [
					'size' => '250',
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-cta .cozy-cta-box.layout-2' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'cozy_cta_layout' => 'layout-2',
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
					'{{WRAPPER}} section.cozy-addons-cta .cozy-cta-box' => 'text-align: {{VALUE}};',
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
					'top' => '20',
					'right' => '20',
					'bottom' => '20',
					'left' => '20',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .cozy-cta-box .cta-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_color',
				'label' => esc_html__('Background', 'cozy-addons'),
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .cozy-addons-cta .cozy-cta-box',
			]
		);

		$this->add_control(
			'cta_background_ovelyar',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Overlay color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#6EC1E4',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-cta .cozy-cta-box:after' => 'background: {{VALUE}};',
				],
			]
		);



		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-addons-cta  .cozy-cta-box',
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
					'{{WRAPPER}} .cozy-addons-cta  .cozy-cta-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->start_controls_tabs('cta_content_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'cta_style_content_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-addons-cta .cozy-cta-box',
			]
		);

		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'cta_style_content_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_box_shadow_hover',
				'label' => __('Box Shadow', 'plugin-domain'),
				'selector' => '{{WRAPPER}} .cozy-addons-cta .cozy-cta-box:hover',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	protected function render($instance = [])
	{

		// Get settings.
		$settings = $this->get_settings();
		$selected_layout = $settings['cozy_cta_layout'];
?>

		<!-- featured-layout -->
		<section class="cozy-addons-cta <?php echo esc_attr($selected_layout); ?>">
			<?php
			include(COZY_ADDONS_PLUGIN_DIR . 'public/widgets/cta/cta-layout.php');
			?>
		</section> <!-- featured-layout -->

<?php }
}
