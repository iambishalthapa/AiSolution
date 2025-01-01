<?php

namespace Cozy_Addons\PriceListWidgets;

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
class Cozy_Addons_PriceList_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'cozy-addons-price-list';
	}

	public function get_title()
	{
		return __('Price List', 'cozy-addons');
	}

	public function get_icon()
	{
		return 'eicon-price-list cozy-widget-icons';
	}
	public function get_keywords()
	{
		return ['price  list', 'menus', 'cozy addons'];
	}
	public function get_categories()
	{
		return ['cozy-addons-items'];
	}


	protected function register_controls()
	{

		$this->cozy_addons_content_options();

		//Styles for widget elements
		$this->cozy_addons_pricing_list_style_box_options();
		$this->cozy_addons_content_image_style_options();
		$this->cozy_addons_list_style_options();
	}






	/**
	 * Header Layout Options.
	 */
	private function cozy_addons_content_options()
	{
		$ct_brands_access = false;
		if (cozy_addons_premium_access()) {
			$ct_brands_access = true;
		}
		$this->start_controls_section(
			'content_section',
			[
				'label' => __('General', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'show_list_icon',
			[
				'label' => __('Enable Image', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'no',
			]
		);
		$repeater->add_control(
			'icon_image',
			[
				'label' => esc_html__('Upload Image', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'show_list_icon' => 'yes'
				],
			]
		);
		$repeater->add_control(
			'icon_image_align',
			[
				'label' => __('Image Alignment', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'align-left',
				'options' => [
					'align-left' => esc_html__('Left', 'cozy-addons'),
					'align-right' => esc_html__('Right', 'cozy-addons'),
				],
				'condition' => [
					'show_list_icon' => 'yes'
				],
			]
		);
		$repeater->add_control(
			'item_name',
			[
				'label' => __('Title', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Item', 'cozy-addons'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'item_price',
			[
				'label' => __('Price', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('250.00', 'cozy-addons'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'show_discount_price',
			[
				'label' => __('Enable Discount Price', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'no',
			]
		);
		$repeater->add_control(
			'original_price_sale',
			[
				'label' => __('Original Price', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' =>  __('300.00', 'cozy-addons'),
				'condition' => [
					'show_discount_price' => 'yes',
				],
			]
		);
		$repeater->add_control(
			'item_details',
			[
				'label' => __('Details', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'cozy-addons'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'enable_list_link',
			[
				'label' => __('Enable Link', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,


				'default' => 'no',
			]
		);
		$repeater->add_control(
			'link_url',
			[
				'label' => __('Link URL', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'cozy-addons'),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'condition' => [
					'enable_list_link' => 'yes'
				],
			]
		);
		//addig featurs list
		$this->add_control(
			'item_lists',
			[
				'label' => __('List Items', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'item_actions' => [
					'add'       => $ct_brands_access,
					'duplicate' => $ct_brands_access,
					'remove'    => true,
					'sort'      => true,
					'update' 	=> true,
				],
				'default' => [
					[
						'item_name' => __('Pizza', 'cozy-addons'),
					],
					[
						'item_name' => __('MO:MO', 'cozy-addons'),
					],
					[
						'item_name' => __('Burger', 'cozy-addons'),
					],
					[
						'item_name' => __('Sandwich', 'cozy-addons'),
					],
					[
						'item_name' => __('Noodles', 'cozy-addons'),
					],
				],
				'title_field' => '{{{ item_name }}}',
			]
		);
		if (!cozy_addons_premium_access()) {
			$this->add_control(
				'cozy_pricelist_notice_text',
				[
					'type' => \Elementor\Controls_Manager::RAW_HTML,
					'raw' => __('<a href="https://cozythemes.com/cozy-addons/" target="_blank">Upgrade to premium</a> version to get full access and unlock add/delete  unlimited items.', 'cozy-addons'),
					'content_classes' => 'ct-upsell-notice',
				]
			);
		}

		$this->end_controls_section();
	}

	/**
	 * list style box
	 */
	private function cozy_addons_list_style_options()
	{
		$this->start_controls_section(
			'section_list_style',
			[
				'label' => __('List Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'item_list_bottom_spacing',
			[
				'label' => __('List Item Bottom Spacing ', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 250,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}}  section.cozy-addons-pricelist ul.items-list li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Title Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-pricelist .item-header-holder',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 18]],
					'font_weight' => ['default' => 500],
					// 'line_height' => ['default' => ['size' => 1]],
				],
			]
		);
		$this->add_control(
			'list_title_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Title Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-pricelist .item-header-holder' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'list_title_bottom_spacing',
			[
				'label' => __('Title Bottom Spacing ', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 250,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}}  section.cozy-addons-pricelist .item-header-holder' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'list_desc_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Description Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-pricelist .item-details' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'list_description_bottom_spacing',
			[
				'label' => __('Description Bottom Spacing ', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 250,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}}  section.cozy-addons-pricelist .item-details' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'list_price_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Price Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}}  section.cozy-addons-pricelist .item-header-holder .item-price',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 16]],
					'font_weight' => ['default' => 400],
				],

			]
		);
		$this->add_responsive_control(
			'list_items_price_padding',
			[
				'label'      => __('Price Padding', 'cozy-addons'),
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
					'{{WRAPPER}} section.cozy-addons-pricelist .item-header-holder .item-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'list_price_bgcolor',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Price Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-pricelist .item-header-holder .item-price' => 'background: {{VALUE}};',
				],

			]
		);
		$this->add_control(
			'list_price_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Price Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-pricelist .item-header-holder .item-price' => 'color: {{VALUE}};',
				],

			]
		);
		$this->add_control(
			'list_price_border_radius',
			[
				'label' => __('Price Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-pricelist .item-header-holder .item-price' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-pricelist .item-header-holder .seprator-line' => 'border-width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-pricelist .item-header-holder .seprator-line' => 'border-color: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-pricelist .item-header-holder .seprator-line' => 'border-bottom-style: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Image box style
	 */
	private function cozy_addons_content_image_style_options()
	{
		$this->start_controls_section(
			'section_pricelist_image',
			[
				'label' => __('Image Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'list_image_width',
			[
				'label' => __('Image Width', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 50,
					],
					'px' => [
						'min' => 1,
						'max' => 500,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 25,
				],
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}}  section.cozy-addons-pricelist ul.items-list .list-image' => 'width: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before'
			]
		);
		$this->add_control(
			'list_image_spacing',
			[
				'label' => __('Image Spacing', 'cozy-addons'),
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
					'{{WRAPPER}}  section.cozy-addons-pricelist ul.items-list .list-image.align-left' => 'padding-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}  section.cozy-addons-pricelist ul.items-list .list-image.align-right' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'after'
			]
		);

		$this->add_control(
			'section_image_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-pricelist ul.items-list .list-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'section_imagee_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-pricelist ul.items-list .list-image img',
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Style Box Options.
	 */
	private function cozy_addons_pricing_list_style_box_options()
	{

		// Box.
		$this->start_controls_section(
			'section_style_box',
			[
				'label' => __('Box Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'price_list_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-pricelist .pricelist-holder',
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
			'pricelist_items_style_padding',
			[
				'label'      => __('Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '30',
					'right' => '30',
					'bottom' => '30',
					'left' => '30',
					'isLinked' => true,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-pricelist .pricelist-holder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
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
					'{{WRAPPER}} section.cozy-addons-pricelist .pricelist-holder' => 'background: {{VALUE}};',
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
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-pricelist .pricelist-holder' => 'color: {{VALUE}};',
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

		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-pricelist .pricelist-holder',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-pricelist .pricelist-holder',
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
					'{{WRAPPER}} section.cozy-addons-pricelist .pricelist-holder' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-pricelist .pricelist-holder:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'label' => __('Box Shadow', 'plugin-domain'),
				'selector' => '{{WRAPPER}} section.cozy-addons-pricelist .pricelist-holder:hover',
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
					'{{WRAPPER}} section.cozy-addons-pricelist .pricelist-holder:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	protected function render($instance = [])
	{
		// Get settings.
		$settings = $this->get_settings(); ?>

		<!-- featured-layout -->
		<section class="cozy-addons-pricelist">
			<?php
			include(COZY_ADDONS_PLUGIN_DIR . 'public/widgets/price-list/price-list.php');
			?>

		</section> <!-- featured-layout -->
<?php
	}
}
