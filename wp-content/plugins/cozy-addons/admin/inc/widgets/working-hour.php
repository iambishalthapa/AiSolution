<?php

namespace Cozy_Addons\WorkingHourWidgets;

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
class Cozy_Addons_WorkingHour_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'cozy-addons-working-hour';
	}

	public function get_title()
	{
		return __('Working Hour', 'cozy-addons');
	}

	public function get_icon()
	{
		return 'eicon-clock-o cozy-working-hours cozy-widget-icons';
	}

	public function get_categories()
	{
		return ['cozy-addons-items'];
	}
	public function get_keywords()
	{
		return ['working hour', 'cozy', 'cozy addons'];
	}

	protected function register_controls()
	{

		$this->cozy_addons_working_hour_content_options();

		$this->cozy_addons_slider_style_box_options();
		$this->cozy_addons_slider_style_content_options();
		$this->cozy_addons_slider_style_list_options();
	}
	/**
	 * Header Layout Options.
	 */
	private function cozy_addons_working_hour_content_options()
	{
		$this->start_controls_section(
			'content_section',
			[
				'label' => __('General', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'working_hour_sub_heading',
			[
				'label' => __('Sub Heading', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Sub Heading', 'cozy-addons'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'sub_header_tag',
			[
				'label' => __('Sub Header HTML Tag', 'cozy-addons'),
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
				'default' => 'h5',
			]
		);
		$this->add_control(
			'working_hour_heading',
			[
				'label' => __('Heading', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Heading', 'cozy-addons'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'header_tag',
			[
				'label' => __('Header HTML Tag', 'cozy-addons'),
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
			]
		);
		$this->add_control(
			'working_hour_description',
			[
				'label' => __('Description', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. ', 'cozy-addons'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'desc_text_position',
			[
				'label' => __('Description Position', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'below-heading',
				'options' => [
					'below-heading' => esc_html__('Below Heading', 'cozy-addons'),
					'below-lists' => esc_html__('Below List', 'cozy-addons'),
				],
			]
		);
		// List Repeater
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'name_of_day',
			[
				'label' => __('Name of the Day', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Monday', 'cozy-addons'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'working_hours',
			[
				'label' => __('Working Hours', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('10:00 - 17:00', 'cozy-addons'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'show_icon',
			[
				'label' => __('Show Icon', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);
		$repeater->add_control(
			'list_icon',
			[
				'label' => __('Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_icon' => 'yes',
				],
			]
		);

		$repeater->add_control(
			'item_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Item Color', 'cozy-addons'),
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}};',
				],
			]
		);
		//addig featurs list
		$this->add_control(
			'working_days_list',
			[
				'label' => __('List Of Days', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'name_of_day' => __('Monday', 'cozy-addons'),
					],
					[
						'name_of_day' => __('Tuesday', 'cozy-addons'),
					],
					[
						'name_of_day' => __('Wednesday', 'cozy-addons'),
					],
					[
						'name_of_day' => __('Thursday', 'cozy-addons'),
					],
					[
						'name_of_day' => __('Friday', 'cozy-addons'),
					],
					[
						'name_of_day' => __('Saturday', 'cozy-addons'),
					],
					[
						'name_of_day' => __('Sunday', 'cozy-addons'),
					]
				],
				'title_field' => '{{{ name_of_day }}}',
			]
		);
		$this->end_controls_section();
	}



	/**
	 * Style Box Options.
	 */
	private function cozy_addons_slider_style_box_options()
	{

		// Box.
		$this->start_controls_section(
			'section_style_box',
			[
				'label' => __('Box Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
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
					'{{WRAPPER}} section.cozy-addons-working-hour .working-hour-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-working-hour .working-hour-content',
			]
		);
		$this->add_control(
			'box_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-working-hour .working-hour-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-working-hour .working-hour-content',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_color',
				'label' => esc_html__('Background', 'cozy-addons'),
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .cozy-addons-working-hour .working-hour-content',
			]
		);
		$this->add_control(
			'box_overlay_background_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Overlay Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '0,0,0,0',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-working-hour .working-hour-content:after' => 'background: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);



		$this->end_controls_section();
	}
	/*style content*/
	private function cozy_addons_slider_style_content_options()
	{
		$this->start_controls_section(
			'section_content_box',
			[
				'label' => __('Content Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'wh_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-working-hour .working-hour-content' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'wh_text_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Text Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-working-hour .working-hour-content',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 16]],
					'font_weight' => ['default' => 400],
				],

			]
		);
		$this->add_control(
			'description_bottom_space',
			[
				'label' => __('Description Bottom Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-working-hour  .description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wh_heading_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Heading Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-working-hour .working-hour-content .header' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'wh_heading_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Heading Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-working-hour .working-hour-content .header',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 48]],
					'font_weight' => ['default' => 700],
				],

			]
		);
		$this->add_control(
			'heading_bottom_space',
			[
				'label' => __('Heading Bottom Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-working-hour .working-hour-content .header' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wh_subheading_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Sub Heading Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-working-hour .working-hour-content .sub-header' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'wh_sub_heading_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Sub Heading Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-working-hour .working-hour-content .sub-header',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 16]],
					'font_weight' => ['default' => 700],
				],

			]
		);
		$this->add_control(
			'sub_heading_bottom_space',
			[
				'label' => __('Sub Heading Bottom Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-working-hour .working-hour-content .sub-header' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}
	/**
	 * Style Box Options.
	 */
	private function cozy_addons_slider_style_list_options()
	{

		// Box.
		$this->start_controls_section(
			'section_item_style_box',
			[
				'label' => __('List Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'list_icon_size',
			[
				'label' => __('Icon size', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'default' => [
					'size' => 16,
				],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-working-hour .list-content-holder .list-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wh_icon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Icon Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-working-hour .list-content-holder .list-icon' => 'color: {{VALUE}};',
				],

			]
		);
		$this->add_control(
			'list_icon_space',
			[
				'label' => __('Icon Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-working-hour .list-content-holder .list-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'after',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'wh_decription_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-working-hour .list-content-holder',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 18]],
					'font_weight' => ['default' => 500],
				],

			]
		);
		$this->add_control(
			'list_section_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-working-hour ul.days-list' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'item_spacing_style_padding',
			[
				'label'      => __('Item Spacing', 'cozy-addons'),
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
					'{{WRAPPER}} section.cozy-addons-working-hour .list-content-holder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'list_bottom_spacing',
			[
				'label' => __('List Section Bottom Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-working-hour ul.days-list' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'list_seprator_size',
			[
				'label' => __('Separator Size', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-working-hour .list-content-holder .seprator-line' => 'border-width: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'seprator_bordre_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Seprator Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-working-hour .list-content-holder .seprator-line' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'seprator_border_style',
			[
				'label' => __('Border Style', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'solid' => esc_html__('Solid', 'cozy-addons'),
					'dashed' => esc_html__('Dashed', 'cozy-addons'),
					'dotted' => esc_html__('Dotted', 'cozy-addons'),
					'double' => esc_html__('Double', 'cozy-addons'),
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-working-hour .list-content-holder .seprator-line' => 'border-bottom-style: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}

	protected function render($instance = [])
	{
		// Get settings.
		$settings = $this->get_settings(); ?>
		<section class="cozy-addons-working-hour">
			<?php
			include(COZY_ADDONS_PLUGIN_DIR . 'public/widgets/working-hour/working-hour.php');
			?>
		</section> <!-- featured-layout -->

<?php }
}
