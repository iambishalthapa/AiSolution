<?php

namespace Cozy_Addons\MultiButtonWidgets;

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
class Cozy_Addons_MultiButton_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'cozy-addons-multi-buttons';
	}

	public function get_title()
	{
		return __('Multi Buttons', 'cozy-addons');
	}
	public function get_keywords()
	{
		return ['multiple button', 'dual buttons', 'cozy addons'];
	}
	public function get_icon()
	{
		return 'eicon-dual-button cozy-widget-icons';
	}

	public function get_categories()
	{
		return ['cozy-addons-items'];
	}

	protected function register_controls()
	{

		$this->cozy_addons_content_options();

		/*setup for style*/
		$this->cozy_addons_slider_multi_button_options();
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

		// List Repeater
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'multi_button_label',
			[
				'label' => __('Button Label', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Learn More', 'cozy-addons'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'multi_button_link',
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
		$repeater->add_control(
			'multi_button_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-buttons-group .buttons-group-holder {{CURRENT_ITEM}}' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$repeater->add_control(
			'enable_icon',
			[
				'label' => __('Enable Icon', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);
		$repeater->add_control(
			'multi_button_icon',
			[
				'label' => __('Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check',
					'library' => 'fa-solid',
				],
				'condition' => [
					'enable_icon' => 'yes',
				],
			]
		);
		$repeater->add_control(
			'select_icon_position',
			[
				'label' => __('Icon Postion', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'icon-before',
				'options' => [
					'icon-before' => esc_html__('Before Text', 'cozy-addons'),
					'icon-after' => esc_html__('After Text', 'cozy-addons'),
				],
				'condition' => [
					'enable_icon' => 'yes',
				],
			]
		);
		$repeater->start_controls_tabs('multi_button_style_tabs');
		// Normal tab.
		$repeater->start_controls_tab(
			'multi_button_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);
		// Normal border

		// Box color
		$repeater->add_control(
			'multi_button_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-buttons-group .buttons-group-holder {{CURRENT_ITEM}}' => 'background: {{VALUE}};',
				],
			]
		);
		//button text color
		$repeater->add_control(
			'multi_button_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-buttons-group .buttons-group-holder {{CURRENT_ITEM}}' => 'color: {{VALUE}};',
				],
			]
		);
		$repeater->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'multi_button_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-addons-buttons-group .buttons-group-holder {{CURRENT_ITEM}}',
			]
		);
		$repeater->end_controls_tab();

		// Hover border.
		$repeater->start_controls_tab(
			'multi_button_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);

		// Box color
		$repeater->add_control(
			'multi_button_bg_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-buttons-group .buttons-group-holder {{CURRENT_ITEM}}:hover' => 'background: {{VALUE}};',
				],
			]
		);
		//button text color
		$repeater->add_control(
			'multi_button_text_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-buttons-group .buttons-group-holder {{CURRENT_ITEM}}:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$repeater->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'multi_button_border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-addons-buttons-group .buttons-group-holder {{CURRENT_ITEM}}:hover',
			]
		);

		$repeater->end_controls_tab();

		$repeater->end_controls_tabs();
		$repeater->add_control(
			'multi_button_custom_class',
			[
				'label' => __('Button Custom Class', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
			]
		);

		//addig featurs list
		$this->add_control(
			'cozy_multi_button_list',
			[
				'label' => __('Buttons', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'multi_button_label' => __('Contact Us', 'cozy-addons'),
					],
					[
						'multi_button_label' => __('Learn More', 'cozy-addons'),
					],
				],
				'title_field' => '{{{ multi_button_label }}}',
			]
		);

		$this->end_controls_section();
	}


	/**
	 * slider primary button style
	 */
	private function cozy_addons_slider_multi_button_options()
	{

		// Box.
		$this->start_controls_section(
			'slider_primary_button',
			[
				'label' => __('Button Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'multi_buttons_button_width',
			[
				'label' => __('Button Width', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 150,
				],
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-buttons-group a.cozy-buttons' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'multi_button_alignment',
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
					'{{WRAPPER}} section.cozy-addons-buttons-group .buttons-group-holder' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'multi_button_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} .cozy-addons-buttons-group a.cozy-buttons',
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
					'{{WRAPPER}} .cozy-addons-buttons-group a.cozy-buttons' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'multi_button_common_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-buttons-group a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// Normal border radius

		$this->start_controls_tabs('cta_button_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'cta_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);
		// Normal border

		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-addons-buttons-group a',
			]
		);
		$this->add_control(
			'multi_button_common_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-buttons-group a' => 'background: {{VALUE}};',
				],
			]
		);
		//button text color
		$this->add_control(
			'multi_button_common_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-buttons-group a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'multi_button_common_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-addons-buttons-group a',
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
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow_hover',
				'label' => __('Box Shadow', 'plugin-domain'),
				'selector' => '{{WRAPPER}} .cozy-addons-buttons-group a.cozy-buttons:hover',
			]
		);
		$this->add_control(
			'multi_button_common_bg_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#777777',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-buttons-group a:hover' => 'background: {{VALUE}};',
				],
			]
		);
		//button text color
		$this->add_control(
			'multi_button_common_text_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-buttons-group a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'multi_button_common_border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-addons-buttons-group a:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->add_control(
			'multi_buttons_spacing',
			[
				'label' => __('Buttons Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -10,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-buttons-group a.cozy-buttons' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cozy-addons-buttons-group a' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
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
					'{{WRAPPER}} .cozy-addons-buttons-group a.cozy-buttons .button-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
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
					'{{WRAPPER}} .cozy-addons-buttons-group a.cozy-buttons.icon-before .button-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cozy-addons-buttons-group a.cozy-buttons.icon-after .button-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}

	protected function render($instance = [])
	{
		$settings = $this->get_settings(); ?>
		<section class="cozy-addons-buttons-group">
			<?php
			include(COZY_ADDONS_PLUGIN_DIR . 'public/widgets/buttons-group/multi-buttons.php');
			?>

		</section> <!-- featured-layout -->

<?php }
}
