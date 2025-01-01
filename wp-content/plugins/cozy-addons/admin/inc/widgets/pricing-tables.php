<?php

namespace Cozy_Addons\PricingTableWidgets;

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
class Cozy_Addons_Pricing_Table_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'cozy-addons-pricing-table-widget';
	}

	public function get_title()
	{
		return __('Pricing Table', 'cozy-addons');
	}

	public function get_icon()
	{
		return 'eicon-price-table cozy-widget-icons';
	}
	public function get_keywords()
	{
		return ['pricing table', 'cozy addons'];
	}
	public function get_categories()
	{
		return ['cozy-addons-items'];
	}

	protected function register_controls()
	{

		$this->cozy_addons_content_header_options();
		$this->cozy_addons_content_pricing_options();
		$this->cozy_addons_content_features_options();
		$this->cozy_addons_content_footer_options();
		$this->cozy_addons_content_badge_options();

		//Styles for widget elements
		$this->cozy_addons_pricing_table_style_box_options();
		$this->cozy_addons_pricing_table_image_box_options();
		$this->cozy_addons_pricing_table_icon_box_options();
		$this->cozy_addons_pricing_table_header_box_options();
		$this->cozy_addons_pricing_table_pricing_box_options();
		$this->cozy_addons_pricing_table_features_box_options();
		$this->cozy_addons_pricing_table_footer_box_options();
		$this->cozy_addons_pricing_table_footer_button_options();
		$this->cozy_addons_pricing_table_badge_box_options();
	}

	/**
	 * Header Layout Options.
	 */
	private function cozy_addons_content_header_options()
	{
		$this->start_controls_section(
			'header_section',
			[
				'label' => __('Header', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'show_header_icon',
			[
				'label' => __('Enable Icon', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'cozy-addons'),
				'label_off' => __('Hide', 'cozy-addons'),
				'default' => 'no',
			]
		);
		$this->add_control(
			'icon_options',
			[
				'label' => __('Icon option', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'option-icon',
				'options' => [
					'option-icon' => esc_html__('Icon', 'cozy-addons'),
					'option-image' => esc_html__('Image', 'cozy-addons'),
				],
				'condition' => [

					'show_header_icon' => 'yes',
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
					'show_header_icon' => 'yes'
				],
			]
		);
		$this->add_control(
			'pricing_table_icon',
			[
				'label' => __('Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check',
					'library' => 'fa-solid',
				],
				'condition' => [
					'icon_options' => 'option-icon',
					'show_header_icon' => 'yes'
				],
			]
		);

		$this->add_control(
			'icon_position',
			[
				'label' => __('Icon Position', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'top',
				'options' => [
					'top' => esc_html__('Above Title', 'cozy-addons'),
					'bottom' => esc_html__('Below Title', 'cozy-addons'),
				],
				'condition' => [
					'show_header_icon' => 'yes',
				],
			]
		);

		$this->add_control(
			'title_text',
			[
				'label' => __('Title', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => __('Starter', 'cozy-addons'),
				'placeholder' => __('Add Title Here', 'cozy-addons'),
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
	 * Pricing Layout Options.
	 */
	private function cozy_addons_content_pricing_options()
	{
		$this->start_controls_section(
			'pricing_section',
			[
				'label' => __('Pricing', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'select_currency',
			[
				'label' => __('Currency', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'dollar',
				'options' => [
					'dollar' => esc_html__('$ Dollar', 'cozy-addons'),
					'euro' => esc_html__('€ Euro', 'cozy-addons'),
					'baht' => esc_html__('฿ Baht', 'cozy-addons'),
					'franc' => esc_html__('₣ Franc', 'cozy-addons'),
					'guilder' => esc_html__('ƒ Guilder', 'cozy-addons'),
					'pound' => esc_html__('£ Pound Sterling', 'cozy-addons'),
					'real' => esc_html__('R$ Real', 'cozy-addons'),
					'rupee' => esc_html__('₨ Rupee', 'cozy-addons'),
					'indian_rupee' => esc_html__('₹ Rupee (Indian)', 'cozy-addons'),
					'yen' => esc_html__('¥ Yen/Yuan', 'cozy-addons'),
					'cozy_addons_custom' => esc_html__('Custom', 'cozy-addons'),
				],
			]
		);

		$this->add_control(
			'custom_currency',
			[
				'label' => __('Currency', 'cozy-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Currency Symbol', 'cozy-addons'),
				'placeholder' => __('Add Period Cycle', 'cozy-addons'),
				'condition' => [
					'select_currency' => 'cozy_addons_custom',
				],
			]
		);

		$this->add_control(
			'currency_align',
			[
				'label' => __('Currency Alignment', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'top',
				'options' => [
					'top' => esc_html__('Top', 'cozy-addons'),
					'center' => esc_html__('Center', 'cozy-addons'),
					'bottom' => esc_html__('Bottom', 'cozy-addons'),
				],
			]
		);

		$this->add_control(
			'price_amount',
			[
				'label' => __('Price', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'step' => 1,
				'default' => 49,
			]
		);

		$this->add_control(
			'pt_price_format',
			[
				'label' => __('Currency Format', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'currency_format_1',
				'options' => [
					'currency_format_1' => esc_html__('01,011.00 Default', 'cozy-addons'),
					'currency_format_2' => esc_html__('01.011,00', 'cozy-addons'),
				],
			]
		);

		$this->add_control(
			'pt_decimal_postion',
			[
				'label' => __('Decimal Position', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'top',
				'options' => [
					'top' => esc_html__('Top', 'cozy-addons'),
					'bottom' => esc_html__('Bottom', 'cozy-addons'),
				],
			]
		);

		$this->add_control(
			'show_sale_price',
			[
				'label' => __('Enable Sale', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'cozy-addons'),
				'label_off' => __('Hide', 'cozy-addons'),
				'default' => 'no',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'price_sale',
			[
				'label' => __('Original Price', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 10,
				'condition' => [
					'show_sale_price' => 'yes',
				],
			]
		);
		$this->add_control(
			'period_text',
			[
				'label' => __('Period', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => __('/Mo', 'cozy-addons'),
				'placeholder' => __('Add Period Cycle Here', 'cozy-addons'),
			]
		);
		$this->add_control(
			'period_text_position',
			[
				'label' => __('Period Position', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'period-after-price',
				'options' => [
					'period-after-price' => esc_html__('After Price', 'cozy-addons'),
					'period-below-price' => esc_html__('Below Price', 'cozy-addons'),
				],
			]
		);

		$this->end_controls_section();
	}


	/**
	 * Features Layout Options.
	 */
	private function cozy_addons_content_features_options()
	{
		$this->start_controls_section(
			'features_section',
			[
				'label' => __('Features', 'cozy-addons'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'show_features_list',
			[
				'label' => __('Enable Features List', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'cozy-addons'),
				'label_off' => __('Hide', 'cozy-addons'),
				'default' => 'yes',
			]
		);

		// List Repeater
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'feature_text',
			[
				'label' => __('Feature Text', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('', 'cozy-addons'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'feature_icon',
			[
				'label' => __('Feature Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check',
					'library' => 'solid',
				],
			]
		);

		$repeater->add_control(
			'featured_list_icon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Icon Color', 'cozy-addons'),
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-features.content-block {{CURRENT_ITEM}} i' => 'color: {{VALUE}};',
				],
			]
		);
		//Feature enables/disables
		$repeater->add_control(
			'disable_feature',
			[
				'label' => __('Disable Feature', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('On', 'cozy-addons'),
				'label_off' => __('Off', 'cozy-addons'),
				'default' => 'no',
				'separator' => 'before',
			]
		);
		//addig featurs list
		$this->add_control(
			'feature_list',
			[
				'label' => __('Features List', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'feature_text' => __('Free Layouts', 'cozy-addons'),
					],
					[
						'feature_text' => __('Free Updates', 'cozy-addons'),
					],
					[
						'feature_text' => __('Unlimited Domains', 'cozy-addons'),
					],
					[
						'feature_text' => __('Premium Support', 'cozy-addons'),
					],
				],
				'title_field' => '{{{ feature_text }}}',
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Footer Layout Options.
	 */
	private function  cozy_addons_content_footer_options()
	{
		$this->start_controls_section(
			'footer_section',
			[
				'label' => __('Footer', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'show_cta_icon',
			[
				'label' => __('Show Button Icon', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'cozy-addons'),
				'label_off' => __('Hide', 'cozy-addons'),
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
			'cta_text',
			[
				'label' => __('Button Text', 'cozy-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Read More', 'cozy-addons'),
				'placeholder' => __('Read More', 'cozy-addons'),
			]
		);

		$this->add_control(
			'button_link',
			[
				'label' => __('Button Link', 'plugin-domain'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'plugin-domain'),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		$this->add_control(
			'show_disclaimer',
			[
				'label' => __('Show Disclaimer', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'cozy-addons'),
				'label_off' => __('Hide', 'cozy-addons'),
				'default' => 'no',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'footer_disclaimer_text',
			[
				'label' => __('Disclaimer', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'default' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'cozy-addons'),
				'placeholder' => __('Disclaimer Text', 'cozy-addons'),
				'condition' => [
					'show_disclaimer' => 'yes'
				],
			]

		);
		$this->end_controls_section();
	}
	/**
	 * Badge Layout Options.
	 */
	private function cozy_addons_content_badge_options()
	{
		$this->start_controls_section(
			'badge_section',
			[
				'label' => __('Badge', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'show_badge',
			[
				'label' => __('Enable Badge', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'cozy-addons'),
				'label_off' => __('Hide', 'cozy-addons'),
				'default' => 'yes',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'badge_position',
			[
				'label' => __('Position', 'plugin-domain'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'plugin-domain'),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => __('Center', 'plugin-domain'),
						'icon' => 'eicon-h-align-center',
					],
					'right' => [
						'title' => __('Right', 'plugin-domain'),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'right',
				'toggle' => true,
				'condition' => [
					'show_badge' => 'yes'
				]
			]
		);
		$this->add_control(
			'badge_text',
			[
				'label' => __('Badge Text', 'cozy-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Popular', 'cozy-addons'),
				'placeholder' => __('Add Badge Text', 'cozy-addons'),
				'condition' => [
					'show_badge' => 'yes',
				],
			]
		);
		$this->end_controls_section();
	}


	/**
	 * Image style
	 */
	private function cozy_addons_pricing_table_image_box_options()
	{
		$this->start_controls_section(
			'price_table_image_style_box',
			[
				'label' => __('Image Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'icon_options' => 'option-image',
					'show_header_icon' => 'yes'
				],
			]
		);
		$this->add_responsive_control(
			'image_alignment',
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
					'{{WRAPPER}} .cozy-pricing-table .pricing-table-image' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'pricing_table_image_size',
			[
				'label' => __('Image Width (%)', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['%'],
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
					'{{WRAPPER}}  .cozy-pricing-table .pricing-table-image img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'enable_list_divider' => 'yes',
				],
			]
		);
		$this->add_control(
			'pricing_table_image_max_size',
			[
				'label' => __('Image Max Width (%)', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['%'],
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
					'{{WRAPPER}}  .cozy-pricing-table .pricing-table-image img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'enable_list_divider' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'image_style_padding',
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
					'{{WRAPPER}} .cozy-pricing-table .pricing-table-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Image style
	 */
	private function cozy_addons_pricing_table_icon_box_options()
	{
		$this->start_controls_section(
			'price_table_icon_style_box',
			[
				'label' => __('Icon Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'icon_options' => 'option-icon',
					'show_header_icon' => 'yes'
				],
			]
		);
		$this->add_responsive_control(
			'icon_alignment',
			[
				'label' => __('Icon Alignment', 'cozy-addons'),
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
					'{{WRAPPER}} .cozy-pricing-table .pricing-table-icon' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'pricing_table_icon_size',
			[
				'label' => __('Icon Size (px)', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'default' => [
					'size' => 50,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}}  .cozy-pricing-table .pricing-table-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'enable_list_divider' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'icon_style_padding',
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
					'{{WRAPPER}} .cozy-pricing-table .pricing-table-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'pricing_table_icon_style_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Icon Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .pricing-table-icon' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Style Box Options.
	 */
	private function cozy_addons_pricing_table_style_box_options()
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
					'{{WRAPPER}} .cozy-addons-pricing-table .cozy-pricing-table' => 'text-align: {{VALUE}};',
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

				'selector' => '{{WRAPPER}} .cozy-addons-pricing-table .cozy-pricing-table',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 16]],
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
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .cozy-addons-pricing-table .cozy-pricing-table' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		// Box color
		$this->add_control(
			'box_style_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => 'rgba(255, 255, 255, 1)',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pricing-table .cozy-pricing-table' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'box_style_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pricing-table .cozy-pricing-table' => 'color: {{VALUE}};',
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
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __('Border', 'cozy-addons'),
				'fields_options' => [
					'border' => [
						'default' => 'solid',
					],
					'width' => [
						'default' => [
							'top' => '1',
							'right' => '1',
							'bottom' => '1',
							'left' => '1',
							'isLinked' => false,
						],
					],
					'color' => [
						'default' => '#6EC1E4',
					],
				],
				'selector' => '{{WRAPPER}} .cozy-pricing-table',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-pricing-table',
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
					'{{WRAPPER}} .cozy-addons-pricing-table .cozy-pricing-table' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .cozy-addons-pricing-table .cozy-pricing-table:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-pricing-table .cozy-pricing-table:hover',
			]
		);

		// Hover border radius
		$this->add_control(
			'border_radius_hover',
			[
				'label' => __('Border Radius', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pricing-table .cozy-pricing-table:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	/**
	 * Header Box Options.
	 */
	private function cozy_addons_pricing_table_header_box_options()
	{

		// Box.
		$this->start_controls_section(
			'section_header_box',
			[
				'label' => __('Header', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Box alignment		
		$this->add_control(
			'header_content_align',
			[
				'label' => __('Alignment', 'cozy-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'cozy-addons'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __('Center', 'cozy-addons'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __('Right', 'cozy-addons'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .cozy-pt-header' => 'text-align: {{VALUE}};',
				],
				// 'separator' => 'before',
			]
		);

		// Box internal padding.
		$this->add_responsive_control(
			'header_box_padding',
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
					'{{WRAPPER}} .cozy-pt-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],

			]
		);
		// Box color
		$this->add_control(
			'header_boxbg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#6EC1E4',
				'selectors' => [
					'{{WRAPPER}} .cozy-pt-header' => 'background: {{VALUE}};',
				],
			]
		);
		//Title color 
		$this->add_control(
			'header_title_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Title Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => 'rgba(255, 255, 255, 1)',
				'selectors' => [
					'{{WRAPPER}} .cozy-pt-header span.title' => 'color: {{VALUE}};',
				],
			]
		);
		// Title typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'header_title_style_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Title Typography', 'plugin-domain'),

				'selector' => '{{WRAPPER}} .cozy-pt-header  span.title',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 40]],
					'line_height' => ['default' => ['size' => 40]],
				],

			]
		);
		$this->add_control(
			'header_title_bottom_space',
			[
				'label' => __('Title Bottom Space', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-pt-header  span.title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		//Description color 
		$this->add_control(
			'header_description_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Description Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(255, 255, 255, 1)',
				'selectors' => [
					'{{WRAPPER}} .cozy-pt-header span.cozy-pt-description' => 'color: {{VALUE}};',
				],

			]
		);

		$this->end_controls_section();
	}



	/**
	 * Pricing Box Options.
	 */
	private function cozy_addons_pricing_table_pricing_box_options()
	{

		// Box.
		$this->start_controls_section(
			'section_pricing_box',
			[
				'label' => __('Pricing', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Box alignment		
		$this->add_responsive_control(
			'pricng_content_align',
			[
				'label' => __('Alignment', 'cozy-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'cozy-addons'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __('Center', 'cozy-addons'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __('Right', 'cozy-addons'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-pricing' => 'text-align: {{VALUE}};',
				],
			]
		);

		// Box internal padding.
		$this->add_responsive_control(
			'pricing_box_padding',
			[
				'label'      => __('Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '50',
					'right' => '20',
					'bottom' => '30',
					'left' => '20',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-pricing' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		// Box color
		$this->add_control(
			'prcing_boxbg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(255, 255, 255, 0)',
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-pricing' => 'background: {{VALUE}};',
				],
			]
		);

		//currency color 
		$this->add_control(
			'pricing_currency_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Currency Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-pricing .price-currency' => 'color: {{VALUE}};',
				],
			]
		);

		// Currency Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'pricing_currency_style_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Currency Typography', 'plugin-domain'),
				'selector' => '{{WRAPPER}} .cozy-pricing-table .cozy-pt-pricing .price-currency',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 22]],
				],

			]
		);

		//Price Amount color 
		$this->add_control(
			'pricing_amount_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Price Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .cozy-pt-pricing span.price-main' => 'color: {{VALUE}};',
					'{{WRAPPER}}  .cozy-pricing-table .cozy-pt-pricing .price-sale' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		// main price typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'pricing_main_amount_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Price Typography', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-pt-pricing span.price-main',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 68]],
					'font_weight' => ['default' => 700],
				],
			]
		);

		// main price typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'pricing_sale_amount_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Original Price Typography', 'cozy-addons'),
				'selector' => '{{WRAPPER}}  .cozy-pricing-table .cozy-pt-pricing .price-sale',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 30]],
					'font_weight' => ['default' => 400],
				],
				'condition' => [
					'show_sale_price' => 'yes',
				],
			]
		);

		//Decimal Amount color 
		$this->add_control(
			'decimal_amount_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Decimal Price Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-pricing .decimal-digit' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'decimal_price_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Decimal Typography', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-pricing-table .cozy-pt-pricing .decimal-digit',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 14]],
					'font_weight' => ['default' => 400],
				],
			]
		);

		//Billing Period color 
		$this->add_control(
			'pricing_period_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Period Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}}  .cozy-pricing-table .cozy-pt-pricing .time-period' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'time_period_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Period Text Typography', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-pricing-table .cozy-pt-pricing .time-period',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 16]],
					'font_weight' => ['default' => 400],
				],
			]
		);
		$this->add_control(
			'time_period_margin',
			[
				'label' => __('Period Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => -8,
				],
				'range' => [
					'px' => [
						'min' => -10,
						'max' => 30,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-pricing .time-period.after-price' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'period_text_position' => 'period-after-price',
				],
			]
		);



		$this->end_controls_section();
	}



	/**
	 * Pricing Features Options.
	 */
	private function cozy_addons_pricing_table_features_box_options()
	{

		// Box.
		$this->start_controls_section(
			'section_pricing_features_box',
			[
				'label' => __('Features', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Box alignment		
		$this->add_responsive_control(
			'features_content_align',
			[
				'label' => __('Alignment', 'cozy-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'cozy-addons'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __('Center', 'cozy-addons'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __('Right', 'cozy-addons'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-features' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		// Box internal padding.
		$this->add_responsive_control(
			'features_box_padding',
			[
				'label'      => __('Box Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '0',
					'right' => '20',
					'bottom' => '10',
					'left' => '20',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-features' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);


		// Box color
		$this->add_control(
			'features_boxbg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(255, 255, 255, 0)',
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-features' => 'background: {{VALUE}};',
				],
			]
		);

		//Feature enables/disables
		$this->add_control(
			'enable_list_divider',
			[
				'label' => __('Enable List Divider', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('On', 'cozy-addons'),
				'label_off' => __('Off', 'cozy-addons'),
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		//Feature divider
		$this->add_control(
			'feature_list_divider',
			[
				'label' => __('Divider Style', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'solid' => __('Solid', 'cozy-addons'),
					'double' => __('Double', 'cozy-addons'),
					'dotted' => __('Dotted', 'cozy-addons'),
					'dashed' => __('Dashed', 'cozy-addons'),
				],
				'default' => 'solid',
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-features .feature-list' => 'border-bottom-style: {{VALUE}};',
				],
				'condition' => [
					'enable_list_divider' => 'yes',
				],
			]
		);
		$this->add_control(
			'feature_list_divider_size',
			[
				'label' => __('Divider Size', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-features .feature-list' => 'border-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'enable_list_divider' => 'yes',
				],
			]
		);

		$this->add_control(
			'list_divider_color',
			[
				'label' => __('Divider Color', 'cozy-addons'),
				'type' => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default' => 'rgba(0, 0, 0, 0.06)',
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-features .feature-list' => 'border-bottom-color: {{VALUE}};',
				],
				'condition' => [
					'enable_list_divider' => 'yes',
				],
			]
		);
		// list top/bottom space.
		$this->add_responsive_control(
			'features_space_padding',
			[
				'label'      => __('List item padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default'	 => [
					'top' => '15',
					'right' => '0',
					'bottom' => '15',
					'left' => '0',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-features .feature-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);

		//list color
		$this->add_control(
			'pricing_features_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Features Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-features .feature-list' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'feature_list_icon_size',
			[
				'label' => __('Icon Size', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 16,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-features .feature-list i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'feature_list_icon_spacing',
			[
				'label' => __('Icon Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-features .feature-list i' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'pricing_features_list_icon_common_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Features Icon Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-features .feature-list i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}


	/**
	 * Pricing Footer Options.
	 */
	private function cozy_addons_pricing_table_footer_box_options()
	{

		// Box.
		$this->start_controls_section(
			'section_footer_box',
			[
				'label' => __('Footer Box', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Box alignment		
		$this->add_responsive_control(
			'footer_content_align',
			[
				'label' => __('Alignment', 'cozy-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'cozy-addons'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __('Center', 'cozy-addons'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __('Right', 'cozy-addons'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-footer' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		// Box internal padding.
		$this->add_responsive_control(
			'footer_box_padding',
			[
				'label'      => __('Box Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '20',
					'right' => '20',
					'bottom' => '20',
					'left' => '20',
					'isLinked' => true,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-footer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		// Box color
		$this->add_control(
			'footer_boxbg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(255, 255, 255, 0)',
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-footer' => 'background: {{VALUE}};',
				],
			]
		);


		$this->add_responsive_control(
			'disclaimer_padding',
			[
				'label'      => __('Disclaimer Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default'	 => [
					'top' => '20',
					'right' => '0',
					'bottom' => '20',
					'left' => '0',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .cozy-pricing-table  .pricing-table-disclaimer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
				'condition' => [
					'show_disclaimer' => 'yes'
				],
			]
		);
		$this->add_control(
			'disclaimer_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Disclaimer Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table  .pricing-table-disclaimer' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
				'condition' => [
					'show_disclaimer' => 'yes'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'disclaimer_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Disclaimer Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}}  .cozy-pricing-table  .pricing-table-disclaimer',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 14]],
					'font_weight' => ['default' => 400],
					'font_style' => ['default' => 'italic'],
				],
				'condition' => [
					'show_disclaimer' => 'yes'
				],

			]
		);

		$this->end_controls_section();
	}
	/**
	 * Pricing Footer Options.
	 */
	private function cozy_addons_pricing_table_footer_button_options()
	{

		// Box.
		$this->start_controls_section(
			'section_footer_button_style',
			[
				'label' => __('Button', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'pricing_table_footer_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} .cozy-pricing-table .cozy-pt-footer a.pricing-button',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 14]],
					'font_weight' => ['default' => 500],
				],
			]
		);

		$this->add_control(
			'pricing_table_button_icon_space',
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
					'{{WRAPPER}}  .cozy-pricing-table .cozy-pt-footer a.pricing-button .button-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'pricing_table_button_icon_size',
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
					'{{WRAPPER}}  .cozy-pricing-table .cozy-pt-footer a.pricing-button.before-text .button-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}  .cozy-pricing-table .cozy-pt-footer a.pricing-button.after-text .button-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		// cta button padding
		$this->add_responsive_control(
			'pt_button_padding',
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
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-footer a.pricing-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'pricing_table_button_width',
			[
				'label' => __('Button Width (%)', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 300,
					],
				],
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}}  .cozy-pricing-table .cozy-pt-footer a.pricing-button' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs('pt_footer_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'pt_footer_style_tabs_normal',
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
				'selector' => '{{WRAPPER}} .cozy-pricing-table .cozy-pt-footer a.pricing-button',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .cozy-pricing-table .cozy-pt-footer a.pricing-button',
			]
		);
		// Normal border radius
		$this->add_control(
			'button_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default'	 => [
					'top' => '3',
					'right' => '3',
					'bottom' => '3',
					'left' => '3',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-footer a.pricing-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-footer a.pricing-button' => 'background: {{VALUE}};',
				],
			]
		);
		//button text color
		$this->add_control(
			'pricing_button_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Button Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#FFFFFF',
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-footer a.pricing-button' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'pt_footer_style_tabs_hover',
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
				'selector' => '{{WRAPPER}} .cozy-pricing-table .cozy-pt-footer a.pricing-button:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow_hover',
				'label' => __('Box Shadow', 'plugin-domain'),
				'selector' => '{{WRAPPER}} .cozy-pricing-table .cozy-pt-footer a.pricing-button:hover',
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
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-footer a.pricing-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'value' => Color::COLOR_2,
				],
				'default'   => '#61CE70',
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-footer a.pricing-button:hover' => 'background: {{VALUE}};',
				],
			]
		);
		//button text color
		$this->add_control(
			'pricing_features_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Button Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#FFFFFF',
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-footer a.pricing-button:hover' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	/**
	 * Badge Box Options.
	 */
	private function cozy_addons_pricing_table_badge_box_options()
	{

		// Box.
		$this->start_controls_section(
			'section_badge_box',
			[
				'label' => __('Badge', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_badge' => 'yes',
				],
			]
		);



		// Box internal padding.
		$this->add_responsive_control(
			'cozy-addons_badge_box_padding',
			[
				'label'      => __('Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '5',
					'right' => '50',
					'bottom' => '5',
					'left' => '50',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-badge span.badge-style' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		// Box color
		$this->add_control(
			'cozy-addons_badge_boxbg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#61CE70',
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-badge span.badge-style' => 'background: {{VALUE}};',
				],
			]
		);
		// Badger Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'pricing_badge_style_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'plugin-domain'),
				'selector' => '{{WRAPPER}}  .cozy-pricing-table .cozy-pt-badge span.badge-style',
			]
		);
		//badge text color
		$this->add_control(
			'cozy-addons_badge_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#FFFFFF',
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-badge span.badge-style' => 'color: {{VALUE}};',
				],
			]
		);
		// Hover border radius
		$this->add_control(
			'badge_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .cozy-pricing-table .cozy-pt-badge span.badge-style' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}

	protected function render($instance = [])
	{

		// Get settings.
		$settings = $this->get_settings();
?>

		<!-- featured-layout -->
		<section class="cozy-addons-pricing-table">

			<?php
			include(COZY_ADDONS_PLUGIN_DIR . 'public/widgets/pricing-tables/pricing-table.php');
			?>

		</section>
		<!-- featured-layout -->

<?php
	}
}
