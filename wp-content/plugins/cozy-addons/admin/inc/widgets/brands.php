<?php

namespace Cozy_Addons\BrandDisplayWidgets;

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
class Cozy_Addons_BrandDisplay_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'cozy-addons-brand-list';
	}

	public function get_title()
	{
		return __('Brands Logo Showcase', 'cozy-addons');
	}

	public function get_icon()
	{
		return 'eicon-logo cozy-widget-icons';
	}
	public function get_keywords()
	{
		return ['clients brands logo', 'cozy addons'];
	}

	public function get_categories()
	{
		return ['cozy-addons-items'];
	}

	protected function register_controls()
	{
		$this->cozy_addons_content_options();
		$this->cozy_addons_brands_style_options();
		$this->cozy_addons_brands_carousel_pagination_options();
		$this->cozy_addons_brands_carousel_navigation_options();
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
		if (cozy_addons_premium_access()) {
			$this->add_control(
				'brand_select_layout',
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
				'brand_grid_column',
				[
					'label' => __('Display Column', 'cozy-addons'),
					'type' => Controls_Manager::SELECT,
					'default' => 'col-grid-5',
					'options' => [
						'col-grid-1' => esc_html__('1', 'cozy-addons'),
						'col-grid-2' => esc_html__('2', 'cozy-addons'),
						'col-grid-3' => esc_html__('3', 'cozy-addons'),
						'col-grid-4' => esc_html__('4', 'cozy-addons'),
						'col-grid-5' => esc_html__('5', 'cozy-addons'),
						'col-grid-6' => esc_html__('6', 'cozy-addons'),
						'col-grid-7' => esc_html__('7', 'cozy-addons'),
						'col-grid-8' => esc_html__('8', 'cozy-addons'),
					],
					'condition' => [
						'brand_select_layout' => 'layout-grid',
					],
				]
			);
		} else {
			$this->add_control(
				'brand_select_layout',
				[
					'label' => __('Select Layout', 'cozy-addons'),
					'type' => Controls_Manager::SELECT,
					'default' => 'layout-grid',
					'options' => [
						'layout-grid' => esc_html__('Grid', 'cozy-addons'),
					],
				]
			);
			$this->add_control(
				'brand_grid_column',
				[
					'label' => __('Display Column', 'cozy-addons'),
					'type' => Controls_Manager::SELECT,
					'default' => 'col-grid-5',
					'options' => [
						'col-grid-5' => esc_html__('5', 'cozy-addons'),
					],
					'condition' => [
						'brand_select_layout' => 'layout-grid',
					],
				]
			);
		}
		$this->add_control(
			'cozy_carousel_post_per_view',
			[
				'label' => __('Display Column', 'cozy-addons'),
				'type' => Controls_Manager::NUMBER,
				'default' => 5,
				'min' => 1, // Minimum value
				'max' => 8, // Maximum value
				'step' => 0.1,
				'condition' => [
					'brand_select_layout' => 'layout-carousel',
				],
			]
		);
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
					'brand_select_layout' => 'layout-carousel',
				],
			]
		);
		if (cozy_addons_premium_access()) {
			$this->add_control(
				'enable_gray_scale',
				[
					'label' => __('Enable Gray Scale', 'cozy-addons'),
					'type' => Controls_Manager::SWITCHER,
					'default' => 'no',
				]
			);
		} else {
			$this->add_control(
				'cozy_brands_layout_notice_text',
				[
					'type' => \Elementor\Controls_Manager::RAW_HTML,
					'raw' => __('<a href="https://cozythemes.com/cozy-addons/" target="_blank">Upgrade to premium</a> version to unlock carousel layout and 1 to 8 columns options for layouts and image gray scale mode!', 'cozy-addons'),
					'content_classes' => 'ct-upsell-notice',
				]
			);
		}
		$this->add_control(
			'show_slider_pagination',
			[
				'label' => __('Show Pagination', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'condition' => [
					'brand_select_layout' => 'layout-carousel',
				],
			]
		);
		$this->add_control(
			'show_slider_navigation',
			[
				'label' => __('Show Navigation', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'brand_select_layout' => 'layout-carousel',
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
					'show_slider_navigation' => 'yes',
					'brand_select_layout' => 'layout-carousel',
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
					'show_slider_navigation' => 'yes',
					'brand_select_layout' => 'layout-carousel',
				],
			]
		);


		// List Repeater
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'brand_name',
			[
				'label' => __('Brand Name', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Logo', 'cozy-addons'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'brand_image',
			[
				'label' => esc_html__('Brand Logo', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'show_brands_web_url',
			[
				'label' => __('Show Brand Link', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);
		$repeater->add_control(
			'brand_image_link',
			[
				'label' => __('URL', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'cozy-addons'),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'condition' => [
					'show_brands_web_url' => 'yes'
				]
			]
		);
		//adding featurs list
		$this->add_control(
			'brand_list',
			[
				'label' => __('Brand Logos List', 'cozy-addons'),
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
						'brand_name' => __('Logo 1', 'cozy-addons'),
					],
					[
						'brand_name' => __('Logo 2', 'cozy-addons'),
					],
					[
						'brand_name' => __('Logo 3', 'cozy-addons'),
					],
					[
						'brand_name' => __('Logo 4', 'cozy-addons'),
					],
					[
						'brand_name' => __('Logo 5', 'cozy-addons'),
					],
				],
				'title_field' => '{{{ brand_name }}}',
			]
		);
		if (!cozy_addons_premium_access()) {
			$this->add_control(
				'cozy_brands_notice_text',
				[
					'type' => \Elementor\Controls_Manager::RAW_HTML,
					'raw' => __('<a href="https://cozythemes.com/cozy-addons/" target="_blank">Upgrade to premium</a> version to get full access and unlock add/delete  unlimited logos.', 'cozy-addons'),
					'content_classes' => 'ct-upsell-notice',
				]
			);
		}
		$this->end_controls_section();
	}

	private function cozy_addons_brands_style_options()
	{
		$this->start_controls_section(
			'cozy_brans_style_tab',
			[
				'label' => __('Content Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
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
					'{{WRAPPER}} section.cozy-addons-brands-logo' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'brand_logo_width',
			[
				'label' => esc_html__('Logo Max Width', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 500,
					],
					'%' => [
						'min' => 25,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-brands-logo img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'brand_logo_max-height',
			[
				'label' => esc_html__('Logo Max Height', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 500,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-brands-logo img' => 'max-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'brand_logos_padding',
			[
				'label'      => __('Spacing', 'cozy-addons'),
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
					'{{WRAPPER}} section.cozy-addons-brands-logo .brand-logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->end_controls_section();
	}
	/**
	 * slide pagination style
	 */
	private function cozy_addons_brands_carousel_pagination_options()
	{
		$this->start_controls_section(
			'slider_pagination_style',
			[
				'label' => __('Pagination Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_slider_pagination' => 'yes',
					'brand_select_layout' => 'layout-carousel',
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
					'{{WRAPPER}} section.cozy-addons-brands-logo .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-brands-logo .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-brands-logo .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-brands-logo .swiper-pagination-bullet' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-brands-logo .swiper-pagination-bullet:hover' => 'background: {{VALUE}};',
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
	private function cozy_addons_brands_carousel_navigation_options()
	{
		$this->start_controls_section(
			'slider_navigation_style',
			[
				'label' => __('Navigation Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_slider_navigation' => 'yes',
					'brand_select_layout' => 'layout-carousel',
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
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-brands-logo .cozy-slide-nav' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-brands-logo .cozy-slide-nav' => 'width: {{SIZE}}{{UNIT}};',
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
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-brands-logo .cozy-slide-nav' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-brands-logo .cozy-slide-nav.cozy-slide-next' => 'line-height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-brands-logo .cozy-slide-nav.cozy-slide-prev' => 'line-height: {{SIZE}}{{UNIT}};',
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
				'selector' => 'section.cozy-addons-brands-logo .cozy-slide-nav',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_box_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-brands-logo .cozy-slide-nav',
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
					'{{WRAPPER}} section.cozy-addons-brands-logo .cozy-slide-nav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-brands-logo .cozy-slide-nav' => 'background: {{VALUE}};',
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
				'default'   => '255,255,255,1',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-brands-logo .cozy-slide-nav' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-brands-logo .cozy-slide-nav:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_box_shadow_hover',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-brands-logo .cozy-slide-nav:hover',
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
					'{{WRAPPER}} section.cozy-addons-brands-logo .cozy-slide-nav:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-brands-logo .cozy-slide-nav:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-brands-logo .cozy-slide-nav:hover' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	protected function render($instance = [])
	{
		$settings = $this->get_settings();
		$select_brands_layout = $settings['brand_select_layout']; ?>
		<section class="cozy-addons-brands-logo <?php echo esc_attr($select_brands_layout); ?>">
			<?php
			include(COZY_ADDONS_PLUGIN_DIR . 'public/widgets/brands/brands-layout.php');
			?>
		</section>
<?php }
}
