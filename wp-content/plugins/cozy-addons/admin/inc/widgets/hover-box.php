<?php

namespace Cozy_Addons\HoverBoxWidgets;

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
class Cozy_Addons_HoverBox_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'cozy-addons-hover-box';
	}

	public function get_title()
	{
		return __('Hover Box', 'cozy-addons');
	}

	public function get_icon()
	{
		return 'eicon-image-rollover cozy-widget-icons';
	}
	public function get_keywords()
	{
		return ['hover box', 'cozy addons'];
	}

	public function get_categories()
	{
		return ['cozy-addons-items'];
	}

	protected function register_controls()
	{
		if (cozy_addons_premium_access()) {
			$this->cozy_addons_content_options();
			$this->cozy_addons_link_iocn_options();
			$this->cozy_addons_content_button_options();

			//Styles for widget elements
			$this->cozy_addons_hover_box_options();
			$this->cozy_addons_hover_box_content_options();
			$this->cozy_addons_hover_box_icon_options();
			$this->cozy_addons_hoverbox_image_icon_options();
			$this->cozy_addons_cta_button_options();
		}
	}

	private function cozy_addons_link_iocn_options()
	{
		$this->start_controls_section(
			'hoverbox_link_icon_section',
			[
				'label' => __('Animated Arrow Icon', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_hoverbox_link_icon',
			[
				'label' => __('Show Animated Arrow', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);
		$this->add_control(
			'hoverbox_link_icon',
			[
				'label' => __('Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-right',
					'library' => 'fas-solid',
				],
				'condition' => [
					'show_hoverbox_link_icon' => 'yes'
				],
			]
		);
		$this->add_control(
			'link_icon_display_condition',
			[
				'label' => __('Display Condition', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'link-icon-default',
				'options' => [
					'link-icon-default' => esc_html__('Default', 'cozy-addons'),
					'link-icon-on-hover' => esc_html__('Display on hover', 'cozy-addons'),
					'link-icon-hdie-on-hover' => esc_html__('Hide on hover', 'cozy-addons'),
				],
				'condition' => [
					'show_hoverbox_link_icon' => 'yes'
				],
			]
		);

		$this->add_control(
			'hoverbox_link_icon_size',
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
					'{{WRAPPER}} section.cozy-addons-hoverbox .linked-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_hoverbox_link_icon' => 'yes'
				],
			]
		);

		$this->add_control(
			'hoverbox_link_icon_angle_rotate',
			[
				'label' => __('Angle Rotate', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => -45, // Default angle value
					'unit' => 'deg', // Default unit of measurement (e.g., deg, rad, etc.)
				],
				'range' => [
					'deg' => [
						'min' => -360, // Minimum angle value
						'max' => 360, // Maximum angle value
						'step' => 1, // Step value for the angle control
					],
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .linked-icon' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
				'condition' => [
					'show_hoverbox_link_icon' => 'yes'
				],
			]
		);

		$this->start_controls_tabs('hoverbox_linkicon_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'hoverbox_link_icon_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
				'condition' => [
					'show_hoverbox_link_icon' => 'yes'
				],
			]
		);
		//button text color
		$this->add_control(
			'hoverbox_linkicon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#232323',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .linked-icon' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-hoverbox .linked-icon svg path' => 'fill: {{VALUE}};',
				],
				'condition' => [
					'show_hoverbox_link_icon' => 'yes'
				],

			]
		);

		$this->add_control(
			'hoverbox_link_icon_top_space',
			[
				'label' => __('Icon top space', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .linked-icon' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_hoverbox_link_icon' => 'yes'
				],
			]
		);
		$this->add_control(
			'hoverbox_link_icon_right_space',
			[
				'label' => __('Icon right space', 'cozy-addons'),
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
					'{{WRAPPER}} section.cozy-addons-hoverbox .linked-icon' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_hoverbox_link_icon' => 'yes'
				],
			]
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'hoverbox_link_icon_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
				'condition' => [
					'show_hoverbox_link_icon' => 'yes'
				],
			]
		);
		//button text color
		$this->add_control(
			'hoverbox_linkicon_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#454545',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox:hover .linked-icon' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-hoverbox:hover .linked-icon svg path' => 'fill: {{VALUE}};',
				],
				'condition' => [
					'show_hoverbox_link_icon' => 'yes'
				],
			]
		);
		$this->add_control(
			'hoverbox_link_icon_top_space_hover',
			[
				'label' => __('Icon top space', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox:hover .linked-icon' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_hoverbox_link_icon' => 'yes'
				],
			]
		);
		$this->add_control(
			'hoverbox_link_icon_right_space_hover',
			[
				'label' => __('Icon right space', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox:hover .linked-icon' => 'right: {{SIZE}}{{UNIT}};',

				],
				'condition' => [
					'show_hoverbox_link_icon' => 'yes'
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();









		$this->end_controls_section();
	}
	/**
	 * Header Layout Options.
	 */
	private function cozy_addons_content_options()
	{
		$this->start_controls_section(
			'content_section',
			[
				'label' => __('General', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_responsive_control(
			'hoverbox_content_vertical_align',
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
			'show_hoverbox_main_image',
			[
				'label' => __('Enable Main Image', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'hover_box_image',
			[
				'label' => esc_html__('Upload Image', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'show_hoverbox_main_image' => 'yes',
				],
			]
		);
		$this->add_control(
			'show_hoverbox_icon',
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
					'show_hoverbox_icon' => 'yes',
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
					'show_hoverbox_icon' => 'yes'
				],
			]
		);
		$this->add_control(
			'hover_box_icon',
			[
				'label' => __('Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-paper-plane',
					'library' => 'fa-solid',
				],
				'condition' => [
					'icon_options' => 'option-icon',
					'show_hoverbox_icon' => 'yes'
				],
			]
		);
		$this->add_control(
			'title_text',
			[
				'label' => __('Title', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => __('Hover Box', 'cozy-addons'),
				'placeholder' => __('Hover Box', 'cozy-addons'),
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
	/*button content option*/
	private function cozy_addons_content_button_options()
	{
		$this->start_controls_section(
			'hover_box_button_options',
			[
				'label' => __('Button', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'show_cta_button',
			[
				'label' => __('Show CTA Button', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'show_cta_icon',
			[
				'label' => __('Show Button Icon', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'condition' => [
					'show_cta_button' => 'yes',
				],
			]
		);
		$this->add_control(
			'hoverbox_cta_icon',
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
				'condition' => [
					'show_cta_button' => 'yes',
				],
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
				'condition' => [
					'show_cta_button' => 'yes',
				],
			]
		);

		$this->add_control(
			'button_display_condition',
			[
				'label' => __('Display Condition', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'button-display-default',
				'options' => [
					'button-display-default' => esc_html__('Default', 'cozy-addons'),
					'button-display-on-hover' => esc_html__('Display on hover', 'cozy-addons'),
				],
				'condition' => [
					'show_cta_button' => 'yes'
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
					'{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box a.cta-button .button-icon' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box a.cta-button.before-text .button-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box a.cta-button.after-text .button-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'cta_button_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box a.cta-button',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 16]],
					'font_weight' => ['default' => 500],
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
					'{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box a.cta-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box a.cta-button',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box a.cta-button',
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
					'{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box a.cta-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box a.cta-button' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box a.cta-button' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-hoverbox:hover .hoverbox-content-box a.cta-button',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow_hover',
				'label' => __('Box Shadow', 'plugin-domain'),
				'selector' => '{{WRAPPER}} section.cozy-addons-hoverbox:hover .hoverbox-content-box a.cta-button',
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
					'{{WRAPPER}} section.cozy-addons-hoverbox:hover .hoverbox-content-box a.cta-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-hoverbox:hover .hoverbox-content-box a.cta-button' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-hoverbox:hover .hoverbox-content-box a.cta-button' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	/**
	 * Content Option
	 */
	private function cozy_addons_hover_box_content_options()
	{
		$this->start_controls_section(
			'section_conetnt_style',
			[
				'label' => __('Content Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'hover_box_title_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Title Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-hoverbox .section-title',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 24]],
					'font_weight' => ['default' => 600],
					'line_height' => ['default' => ['size' => 24]],
				],
			]
		);
		$this->start_controls_tabs('hover_box_title_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'hover_box_title_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);

		//button text color
		$this->add_control(
			'hover_box_title_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Title Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ededed',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .section-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'hover_box_title_tabs_normal_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);
		//button text color
		$this->add_control(
			'hover_box_title_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Title Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box:hover .section-title' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->add_control(
			'hover_box_title_spacing',
			[
				'label' => __('Title Bottom Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .section-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'hover_box_desc_spacing',
			[
				'label' => __('Description Bottom Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}


	/**
	 * box icon Option
	 */
	private function cozy_addons_hover_box_icon_options()
	{
		$this->start_controls_section(
			'section_hoverbox_icon_style',
			[
				'label' => __('Icon Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'icon_options' => 'option-icon',
					'show_hoverbox_icon' => 'yes'
				],
			]

		);
		$this->add_control(
			'hover_box_icon_size',
			[
				'label' => __('Icon Size', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .hover-box-icon .hover-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_options' => 'option-icon',
					'show_hoverbox_icon' => 'yes'
				],
			]
		);
		$this->add_control(
			'hover_box_icon_box_width',
			[
				'label' => __('Icon Box width', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .hover-box-icon .hover-icon' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_options' => 'option-icon',
					'show_hoverbox_icon' => 'yes'
				],
			]
		);
		$this->add_control(
			'hover_box_icon_box_height',
			[
				'label' => __('Icon Box Height', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .hover-box-icon .hover-icon' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_options' => 'option-icon',
					'show_hoverbox_icon' => 'yes'
				],
			]
		);

		// Normal border radius
		$this->add_control(
			'hoverbox_iconbox_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .hover-box-icon .hover-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs('hover_box_icon_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'hover_box_iocn_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
				'condition' => [
					'icon_options' => 'option-icon',
					'show_hoverbox_icon' => 'yes'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'hoverbox_icon_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-hoverbox .hover-box-icon .hover-icon',
			]
		);

		//button text color
		$this->add_control(
			'hover_box_icon_bgcolor',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => 'rgba(0, 0, 0, 0)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .hover-box-icon .hover-icon' => 'background: {{VALUE}};',
				],
				'condition' => [
					'icon_options' => 'option-icon',
					'show_hoverbox_icon' => 'yes'
				],
			]
		);
		$this->add_control(
			'hover_box_icon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Icon Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#232323',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .hover-box-icon .hover-icon' => 'color: {{VALUE}};',
				],
				'condition' => [
					'icon_options' => 'option-icon',
					'show_hoverbox_icon' => 'yes'
				],
			]
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'hover_box_iocn_tabs_normal_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
				'condition' => [
					'icon_options' => 'option-icon',
					'show_hoverbox_icon' => 'yes'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'hoverbox_icon_hover_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-hoverbox:hover .hover-box-icon .hover-icon',
			]
		);
		//button text color
		$this->add_control(
			'hover_box_icon_bgcolor_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => 'rgba(0, 0, 0, 0)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox:hover .hover-box-icon .hover-icon' => 'background: {{VALUE}};',
				],
				'condition' => [
					'icon_options' => 'option-icon',
					'show_hoverbox_icon' => 'yes'
				],
			]
		);
		$this->add_control(
			'hover_box_icon_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Icon Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#232323',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox:hover .hover-box-icon .hover-icon' => 'color: {{VALUE}};',
				],
				'condition' => [
					'icon_options' => 'option-icon',
					'show_hoverbox_icon' => 'yes'
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->add_control(
			'hover_box_icon_bottom_spacing',
			[
				'label' => __('Icon Bottom Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .hover-box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'after',
				'condition' => [
					'show_hoverbox_icon' => 'yes'
				],
			]
		);
		$this->add_control(
			'hover_box_image_size',
			[
				'label' => __('Icon Image Width', 'cozy-addons'),
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
					'{{WRAPPER}} section.cozy-addons-hoverbox .hover-box-image img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_options' => 'option-image',
					'show_hoverbox_icon' => 'yes'
				],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * box image icon Option
	 */
	private function cozy_addons_hoverbox_image_icon_options()
	{
		$this->start_controls_section(
			'section_hoverbox_image_icon_style',
			[
				'label' => __('Icon Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'icon_options' => 'option-image',
					'show_hoverbox_icon' => 'yes'
				],
			]

		);
		$this->add_control(
			'hover_box_icon_image_width',
			[
				'label' => __('Icon Width', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .hover-box-image img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'hover_box_icon_image_height',
			[
				'label' => __('Icon Height', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .hover-box-image img' => 'height: {{SIZE}}{{UNIT}};',
				],

			]
		);

		$this->add_control(
			'hover_box_image_icon_box_width',
			[
				'label' => __('Icon Box Width', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .hover-box-image' => 'width: {{SIZE}}{{UNIT}};',
				],

			]
		);
		$this->add_control(
			'hover_box_image_icon_box_height',
			[
				'label' => __('Icon Box Height', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .hover-box-image' => 'height: {{SIZE}}{{UNIT}};',
				],

			]
		);

		$this->add_control(
			'hoverbox_image_iconbox_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .hover-box-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hoverbox_image_iconbox_border_icon_radius',
			[
				'label' => __('Image Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .hover-box-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs('hover_box_imageicon_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'hover_box_image_icon_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'hoverbox_image_icon_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-hoverbox .hover-box-image',
			]
		);

		//button text color
		$this->add_control(
			'hover_box_image_icon_bgcolor',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => 'rgba(0, 0, 0, 0)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .hover-box-image' => 'background: {{VALUE}};',
				],

			]
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'hoverbox_imageicon_tabs_normal_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'hoverbox_image_icon_hover_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-hoverbox:hover .hover-box-image',
			]
		);
		//button text color
		$this->add_control(
			'hover_box_image_icon_bgcolor_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => 'rgba(0, 0, 0, 0)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox:hover .hover-box-image' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'enable_invert_filter_icon',
			[
				'label' => __('Image Filter - Invert', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->add_control(
			'hover_box_image_icon_bottom_spacing',
			[
				'label' => __('Icon Bottom Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .hover-box-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}























	/**
	 * Style Box Options.
	 */
	private function cozy_addons_hover_box_options()
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
			'hover_box_height',
			[
				'label' => __('Box Height', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 250,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'hover_box_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 18]],
					'font_weight' => ['default' => 500],
					// 'line_height' => ['default' => ['size' => 1]],
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
					'{{WRAPPER}} .cozy-addons-hoverbox .hoverbox-content-box .box-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
			'background_overlay_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Overlay Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 0.12)',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-hoverbox .hoverbox-content-box:after' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .cozy-addons-hoverbox .hoverbox-content-box' => 'color: {{VALUE}};',
				],
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box',
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
					'{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'background_overlay_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background overlay Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0,0,0,0.34)',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-hoverbox:hover .hoverbox-content-box:after' => 'background: {{VALUE}};',
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
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box:hover' => 'color: {{VALUE}};',
				],
			]
		);
		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'label' => __('Box Shadow', 'plugin-domain'),
				'selector' => '{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box:hover',
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
					'{{WRAPPER}} section.cozy-addons-hoverbox .hoverbox-content-box:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			$settings = $this->get_settings();
?>
			<section class="cozy-addons-hoverbox">
				<?php
				include(COZY_ADDONS_PLUGIN_DIR . 'public/widgets/hover-box/hover-box.php');
				?>
			</section> <!-- featured-layout -->
		<?php } else { ?>
			<a href="https://cozythemes.com/cozy-addons/" target="_blank"><?php echo __('Upgrade To Premium Version - https://cozythemes.com/cozy-addons/', 'cozy-addons'); ?></a>
<?php }
	}
}
