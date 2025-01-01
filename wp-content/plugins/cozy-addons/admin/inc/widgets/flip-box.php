<?php

namespace Cozy_Addons\FlipBoxWidgets;

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
class Cozy_Addons_FlipBox_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'cozy-addons-flip-box';
	}

	public function get_title()
	{
		return __('Flip Box', 'cozy-addons');
	}

	public function get_icon()
	{
		return 'eicon-flip-box cozy-widget-icons';
	}
	public function get_keywords()
	{
		return ['flip box', 'cozy addons'];
	}
	public function get_categories()
	{
		return ['cozy-addons-items'];
	}

	protected function register_controls()
	{

		$this->cozy_addons_front_content_options();
		$this->cozy_addons_back_content_options();
		$this->cozy_addons_button_content_options();

		//Styles for widget elements
		$this->cozy_addons_style_box_options();
		$this->cozy_addons_front_style_box_options();
		$this->cozy_addons_back_style_box_options();
		$this->cozy_addons_cta_button_options();
	}

	/**
	 * front content
	 */
	private function cozy_addons_front_content_options()
	{
		$this->start_controls_section(
			'content_section',
			[
				'label' => __('Front Content', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'show_flip_box_icon',
			[
				'label' => __('Enable Icon', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);
		$this->add_control(
			'icon_options',
			[
				'label' => __('Icon Type', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'option-icon',
				'options' => [
					'option-icon' => esc_html__('Icon', 'cozy-addons'),
					'option-image' => esc_html__('Image', 'cozy-addons'),
				],
				'condition' => [

					'show_flip_box_icon' => 'yes',
				],
			]
		);

		$this->add_control(
			'icon_image',
			[
				'label' => esc_html__('Choose Image', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'icon_options' => 'option-image',
					'show_flip_box_icon' => 'yes'
				],
			]
		);
		$this->add_control(
			'flip_box_icon',
			[
				'label' => __('Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check',
					'library' => 'fa-solid',
				],
				'condition' => [
					'icon_options' => 'option-icon',
					'show_flip_box_icon' => 'yes'
				],
			]
		);

		$this->add_control(
			'heading_text',
			[
				'label' => __('Heading', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => __('Heading One', 'cozy-addons'),
				'placeholder' => __('Heading', 'cozy-addons'),
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
	 * back content
	 */
	private function cozy_addons_back_content_options()
	{
		$this->start_controls_section(
			'back_content_section',
			[
				'label' => __('Back Content', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'show_flip_box_back_icon',
			[
				'label' => __('Enable Icon', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);
		$this->add_control(
			'back_icon_options',
			[
				'label' => __('Icon Type', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'option-icon',
				'options' => [
					'option-icon' => esc_html__('Icon', 'cozy-addons'),
					'option-image' => esc_html__('Image', 'cozy-addons'),
				],
				'condition' => [

					'show_flip_box_back_icon' => 'yes',
				],
			]
		);

		$this->add_control(
			'back_icon_image',
			[
				'label' => esc_html__('Choose Image', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'back_icon_options' => 'option-image',
					'show_flip_box_back_icon' => 'yes'
				],
			]
		);
		$this->add_control(
			'flip_box_back_icon',
			[
				'label' => __('Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check',
					'library' => 'fa-solid',
				],
				'condition' => [
					'back_icon_options' => 'option-icon',
					'show_flip_box_back_icon' => 'yes'
				],
			]
		);
		$this->add_control(
			'back_heading_text',
			[
				'label' => __('Heading', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => __('Heading Back', 'cozy-addons'),
				'placeholder' => __('Heading', 'cozy-addons'),
			]
		);
		$this->add_control(
			'back_title_tag',
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
			'back_description_text',
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
	 * front content
	 */
	private function cozy_addons_button_content_options()
	{
		$this->start_controls_section(
			'content_button_section',
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
			'cozy_cta_icon',
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
			'cozy_cta_icon_position',
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
					'{{WRAPPER}} section.cozy-addons-flip-box a.cta-button .button-icon' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-flip-box a.cta-button.before-text .button-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-flip-box a.cta-button.after-text .button-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'cta_button_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-flip-box a.cta-button',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 18]],
					'font_weight' => ['default' => 500],
					// 'line_height' => ['default' => ['size' => 1]],
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
					'{{WRAPPER}} section.cozy-addons-flip-box a.cta-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-flip-box a.cta-button',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-flip-box a.cta-button',
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
					'{{WRAPPER}} section.cozy-addons-flip-box a.cta-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-flip-box a.cta-button' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-flip-box a.cta-button' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-flip-box a.cta-button:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow_hover',
				'label' => __('Box Shadow', 'plugin-domain'),
				'selector' => '{{WRAPPER}} section.cozy-addons-flip-box a.cta-button:hover',
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
					'{{WRAPPER}} section.cozy-addons-flip-box a.cta-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-flip-box a.cta-button:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-flip-box a.cta-button:hover' => 'color: {{VALUE}};',
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
	private function cozy_addons_style_box_options()
	{

		// Box.
		$this->start_controls_section(
			'section_box_style',
			[
				'label' => __('Box Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'flip_box_height',
			[
				'label' => __('Box Height', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 250,
				],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-flip-box .flip-box-holder' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'box_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-flip-box .flip-box-holder .front-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-flip-box .flip-box-holder .back-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .cozy-addons-flip-box .flip-box-holder' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'flipbox_content_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} .cozy-addons-flip-box .flip-box-holder',
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
			'flip_box_style_padding',
			[
				'label'      => __('Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '10',
					'right' => '10',
					'bottom' => '10',
					'left' => '10',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .cozy-addons-flip-box .flip-box-holder  .content-holder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();
	}
	/**
	 * Fornt Content Options.
	 */
	private function cozy_addons_front_style_box_options()
	{

		// Box.
		$this->start_controls_section(
			'section_style_box',
			[
				'label' => __('Front Content Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'front_icon_style_size',
			[
				'label' => __('Icon Size', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 20,
				],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 250,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .flip-box-holder .front-content .flip-box-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_options' => 'option-icon',
					'show_flip_box_icon' => 'yes',
				],

			]
		);
		$this->add_control(
			'front_icon_image_size',
			[
				'label' => __('Image Width', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
					'size' => '',
				],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .flip-box-holder .front-content .content-holder .flip-box-image img ' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_options' => 'option-image',
					'show_flip_box_icon' => 'yes',
				],
			]
		);
		$this->add_control(
			'front_icon_image_max_size',
			[
				'label' => __('Image Max Width', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
					'size' => 25,
				],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .flip-box-holder .front-content .content-holder .flip-box-image img ' => 'max-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_options' => 'option-image',
					'show_flip_box_icon' => 'yes',
				],
			]
		);
		$this->add_control(
			'front_icon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Icon Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(192, 192, 192, 1)',
				'selectors' => [
					'{{WRAPPER}} .flip-box-holder .front-content .flip-box-icon' => 'color: {{VALUE}};',
				],
				'separator' => 'after',
				'condition' => [
					'icon_options' => 'option-icon',
					'show_flip_box_icon' => 'yes',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'flipbox_front_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-flip-box .flip-box-holder .front-content',
			]
		);
		// background Color
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_color',
				'label' => esc_html__('Background', 'cozy-addons'),
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .cozy-addons-flip-box .flip-box-holder .front-content .content-holder',
			]
		);
		$this->add_control(
			'background_front_overlay_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Overlay Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 0.5)',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-flip-box .flip-box-holder .front-content  .content-holder:after' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .cozy-addons-flip-box .flip-box-holder .front-content .content-holder' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'front_description_bottom_space',
			[
				'label' => __('Description Bottom Space', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .flip-box-holder .front-content .content-holder .decription ' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'flipbox_heading_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Heading Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-flip-box .flip-box-holder .front-content .section-title' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'flipbox_front_heading_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Heading Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} .cozy-addons-flip-box .flip-box-holder .front-content .section-title',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 24]],
					'font_weight' => ['default' => 700],
				],
				'separator' => 'before',
			]
		);
		// Heading padding.
		$this->add_responsive_control(
			'flip_box_heading_padding',
			[
				'label'      => __('Heading Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '0',
					'right' => '0',
					'bottom' => '15',
					'left' => '0',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .cozy-addons-flip-box .flip-box-holder .front-content .section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->end_controls_section();
	}
	/**
	 * Fornt Content Options.
	 */
	private function cozy_addons_back_style_box_options()
	{

		// Box.
		$this->start_controls_section(
			'flipbox_back_style_box',
			[
				'label' => __('Back Content Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'back_icon_style_size',
			[
				'label' => __('Icon Size', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 20,
				],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 250,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .flip-box-holder .back-content .flip-box-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'back_icon_options' => 'option-icon',
					'show_flip_box_back_icon' => 'yes',
				],
			]
		);
		$this->add_control(
			'back_icon_image_size',
			[
				'label' => __('Image Width', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
					'size' => '',
				],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .flip-box-holder .back-content .content-holder .flip-box-image img ' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'back_icon_options' => 'option-image',
					'show_flip_box_back_image' => 'yes',
				],
			]
		);
		$this->add_control(
			'back_icon_image_max_size',
			[
				'label' => __('Image Max Width', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
					'size' => 25,
				],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .flip-box-holder .back-content .content-holder .flip-box-image img ' => 'max-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'back_icon_options' => 'option-image',
					'show_flip_box_back_icon' => 'yes',
				],
			]
		);
		// background Color
		$this->add_control(
			'back_icon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Icon Color', 'cozy-addons'),
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .flip-box-holder .back-content .flip-box-icon' => 'color: {{VALUE}};',
				],
				'separator' => 'after',
				'condition' => [
					'back_icon_options' => 'option-icon',
					'show_flip_box_back_icon' => 'yes',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'flipbox_back_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-flip-box .flip-box-holder .back-content',
			]
		);
		// background Color
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_content_back_bg',
				'label' => esc_html__('Background', 'cozy-addons'),
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .cozy-addons-flip-box .flip-box-holder .back-content  .content-holder',
			]
		);
		$this->add_control(
			'background_back_overlay_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Overlay Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 0.5)',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-flip-box .flip-box-holder .back-content  .content-holder:after' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'back_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Description Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-flip-box .flip-box-holder .back-content .content-holder' => 'color: {{VALUE}};',
				],
				'separator' => 'after',
			]
		);
		$this->add_control(
			'back_description_bottom_space',
			[
				'label' => __('Description Bottom Space', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .flip-box-holder .back-content .content-holder .decription ' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'flipbox_back_heading_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Heading Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-flip-box .flip-box-holder .back-content .section-title' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'flipbox_back_heading_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Heading Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} .cozy-addons-flip-box .flip-box-holder .back-content .section-title',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 24]],
					'font_weight' => ['default' => 700],
				],
				'separator' => 'before',
			]
		);
		// Heading padding.
		$this->add_responsive_control(
			'flip_box_back_heading_padding',
			[
				'label'      => __('Heading Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '0',
					'right' => '0',
					'bottom' => '15',
					'left' => '0',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .cozy-addons-flip-box .flip-box-holder .back-content .section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->end_controls_section();
	}

	protected function render($instance = [])
	{

		// Get settings.
		$settings = $this->get_settings(); ?>

		<!-- featured-layout -->
		<section class="cozy-addons-flip-box">
			<?php
			include(COZY_ADDONS_PLUGIN_DIR . 'public/widgets/flip-box/flip-box.php');
			?>

		</section> <!-- featured-layout -->

<?php }
}
