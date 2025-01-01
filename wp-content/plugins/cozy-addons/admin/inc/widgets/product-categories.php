<?php

namespace Cozy_Addons\WOOCategoriesWidgets;

use Elementor\Conditions;
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
class Cozy_Addons_WooCategories_Widget extends Widget_Base {


	public function get_name() {
		return 'cozy-addons-woo-categories';
	}

	public function get_title() {
		return __( 'Product Categories', 'cozy-addons' );
	}

	public function get_icon() {
		return 'eicon-product-categories cozy-widget-icons';
	}
	public function get_keywords() {
		return array( 'woocommerce', 'cozy', 'cozy addons', 'product', 'woo', 'category' );
	}
	public function get_categories() {
		return array( 'cozy-addons-items' );
	}

	protected function register_controls() {
		if ( cozy_addons_premium_access() ) {
			$this->cozy_addons_content_options();
			$this->cozy_addons_product_catrgories_content_optionss();
			$this->cozy_addons_product_category_button_options();

			// Styles for widget elements
			$this->cozy_addons_cta_style_box_options();
			$this->cozy_addons_categories_image_options();
			$this->cozy_addons_category_style_title_options();
			$this->cozy_addons_category_style_count_options();
			$this->cozy_addons_cta_button_options();
			$this->cozy_addons_product_cat_carousel_pagination_options();
			$this->cozy_addons_product_cat_carousel_navigation_options();
		}
	}
	/**
	 * Get all category of woocommerce
	 */
	private function cozy_addons_woo_categories() {
		$taxonomy = 'product_cat';
		$terms    = get_terms( $taxonomy );
		$options  = array();

		if ( $terms ) {
			foreach ( $terms as $term ) {
				if ( isset( $term ) ) {
					if ( isset( $term->term_id ) && isset( $term->name ) ) {
						$options[ $term->term_id ] = $term->name;
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
	private function cozy_addons_content_options() {
		$this->start_controls_section(
			'general_section',
			array(
				'label' => __( 'General', 'cozy-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'product_categories_display_layout',
			array(
				'label'   => __( 'Select Layout', 'cozy-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'layout-grid',
				'options' => array(
					'layout-grid'     => esc_html__( 'Grid', 'cozy-addons' ),
					'layout-list'     => esc_html__( 'List', 'cozy-addons' ),
					'layout-carousel' => esc_html__( 'Carousel', 'cozy-addons' ),
				),
			)
		);
		$this->add_control(
			'product_categories_grid_columns',
			array(
				'label'     => __( 'Display Columns', 'cozy-addons' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 3,
				'min'       => 1, // Minimum value
				'max'       => 10, // Maximum value,
				'condition' => array(
					'product_categories_display_layout' => 'layout-grid',
				),
			)
		);
		$this->add_control(
			'product_cat_carousel_post_per_view',
			array(
				'label'     => __( 'Slide per View', 'cozy-addons' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 3,
				'min'       => 1, // Minimum value
				'max'       => 10, // Maximum value
				'step'      => 0.1,
				'condition' => array(
					'product_categories_display_layout' => 'layout-carousel',
				),
			)
		);
		$this->add_control(
			'cozy_carousel_column_gap',
			array(
				'label'     => __( 'Columns Gap', 'cozy-addons' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 20,
				'min'       => 0, // Minimum value
				'max'       => 100, // Maximum value
				'step'      => 1,
				'condition' => array(
					'product_categories_display_layout' => 'layout-carousel',
				),
			)
		);
		$this->add_control(
			'enable_content_overlay_style',
			array(
				'label'      => __( 'Enable Content Overlay Style', 'cozy-addons' ),
				'type'       => Controls_Manager::SWITCHER,
				'default'    => 'no',
				'conditions' => array(
					'terms' => array(
						array(
							'name'     => 'product_categories_display_layout',
							'operator' => 'in',
							'value'    => array(
								'layout-grid',
								'layout-carousel',
							),
						),
					),
				),
			)
		);
		$this->add_control(
			'product_categories_grid_column_gap',
			array(
				'label'     => __( 'Column Gap', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => array(
					'size' => 15,
				),
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .actual-class' => 'grid-column-gap: {{SIZE}}{{UNIT}};',
				),
				'condition' => array(
					'product_categories_display_layout' => 'layout-grid',
				),
			)
		);
		$this->add_control(
			'product_cat_grid_rows_gap',
			array(
				'label'     => __( 'Box Bottom Gap', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => array(
					'size' => 15,
				),
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .actual_class' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
				'condition' => array(
					'product_categories_display_layout' => 'layout-grid',
				),
			)
		);
		// woo categories
		$this->add_control(
			'excludes_products_categories',
			array(
				'label'       => __( 'Excludes Categories', 'cozy-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'options'     => $this->cozy_addons_woo_categories(),

			)
		);

		$this->add_control(
			'show_carousel_pagination',
			array(
				'label'     => __( 'Show Slide Pagination', 'cozy-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'condition' => array(
					'product_categories_display_layout' => 'layout-carousel',
				),
			)
		);
		$this->add_control(
			'show_carousel_navigation',
			array(
				'label'     => __( 'Show Slide Navigation', 'cozy-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'condition' => array(
					'product_categories_display_layout' => 'layout-carousel',
				),
			)
		);
		$this->add_control(
			'slide_navigation_left_icon',
			array(
				'label'     => __( 'Preview Icon', 'cozy-addons' ),
				'type'      => \Elementor\Controls_Manager::ICONS,
				'default'   => array(
					'value'   => 'fas fa-arrow-left',
					'library' => 'fa-solid',
				),
				'condition' => array(
					'show_carousel_navigation'          => 'yes',
					'product_categories_display_layout' => 'layout-carousel',
				),
			)
		);
		$this->add_control(
			'slide_navigation_right_icon',
			array(
				'label'     => __( 'Next Icon', 'cozy-addons' ),
				'type'      => \Elementor\Controls_Manager::ICONS,
				'default'   => array(
					'value'   => 'fas fa-arrow-right',
					'library' => 'fa-solid',
				),
				'condition' => array(
					'show_carousel_navigation'          => 'yes',
					'product_categories_display_layout' => 'layout-carousel',
				),
			)
		);
		$this->end_controls_section();
	}


	/**
	 * Header Layout Options.
	 */
	private function cozy_addons_product_catrgories_content_optionss() {
		$this->start_controls_section(
			'product_category_content_section',
			array(
				'label' => __( 'Content Option', 'cozy-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'product_cat_content_display_condition',
			array(
				'label'     => __( 'Content Display Condition', 'cozy-addons' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'content-display-default',
				'options'   => array(
					'content-display-default'  => esc_html__( 'Default', 'cozy-addons' ),
					'content-display-on-hover' => esc_html__( 'On Hover', 'cozy-addons' ),
				),
				'condition' => array(
					'enable_content_overlay_style' => 'yes',
				),
			)
		);
		$this->add_control(
			'show_categories_image',
			array(
				'label'   => __( 'Show Category Image', 'cozy-addons' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			)
		);
		$this->add_control(
			'show_categories_title',
			array(
				'label'     => __( 'Show Category Title', 'cozy-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'separator' => 'before',
			)
		);

		$this->add_control(
			'title_tag',
			array(
				'label'     => __( 'Title HTML Tag', 'cozy-addons' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
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
				'default'   => 'h4',
				'condition' => array(
					'show_categories_title' => 'yes',
				),
			)
		);
		$this->add_control(
			'show_categories_product_count',
			array(
				'label'   => __( 'Show Product Count', 'cozy-addons' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			)
		);
		$this->add_control(
			'show_category_description',
			array(
				'label'     => __( 'Show Category Description', 'cozy-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'no',
				'separator' => 'before',
			)
		);

		$this->add_control(
			'product_category_description_type',
			array(
				'label'     => __( 'Display Content', 'cozy-addons' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'product-category-content',
				'options'   => array(
					'product-category-content' => esc_html__( 'Full Content', 'cozy-addons' ),
					'product-category-excerpt' => esc_html__( 'Excerpt', 'cozy-addons' ),
				),
				'condition' => array(
					'show_category_description' => 'yes',
				),
			)
		);
		$this->add_control(
			'cat_description_excerpt_length',
			array(
				'label'     => __( 'Excerpt Length', 'cozy-addons' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 20,
				'condition' => array(
					'product_category_description_type' => 'product-category-excerpt',
				),
			)
		);
		$this->end_controls_section();
	}


	/**
	 * button option
	 */
	private function cozy_addons_product_category_button_options() {
		$this->start_controls_section(
			'cozy_product_cat_button_section',
			array(
				'label' => __( 'Explore Products Button', 'cozy-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'show_cta_button',
			array(
				'label'     => __( 'Show CTA Button', 'cozy-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'no',
				'separator' => 'before',
			)
		);

		$this->add_control(
			'show_cta_icon',
			array(
				'label'     => __( 'Show Button Icon', 'cozy-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'no',
				'separator' => 'before',
				'condition' => array(
					'show_cta_button' => 'yes',
				),
			)
		);
		$this->add_control(
			'product_cat_cta_icon',
			array(
				'label'     => __( 'Icon', 'cozy-addons' ),
				'type'      => \Elementor\Controls_Manager::ICONS,
				'default'   => array(
					'value'   => 'fas fa-angle-right',
					'library' => 'fas-solid',
				),
				'condition' => array(
					'show_cta_button' => 'yes',
					'show_cta_icon'   => 'yes',
				),
			)
		);
		$this->add_control(
			'cta_icon_position',
			array(
				'label'     => __( 'Icon option', 'cozy-addons' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'after-text',
				'options'   => array(
					'before-text' => esc_html__( 'Before Text', 'cozy-addons' ),
					'after-text'  => esc_html__( 'After Text', 'cozy-addons' ),
				),
				'condition' => array(
					'show_cta_button' => 'yes',
					'show_cta_icon'   => 'yes',
				),
			)
		);
		$this->add_control(
			'button_text',
			array(
				'label'       => __( 'Button Label', 'cozy-addons' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 1,
				'default'     => __( 'Explore Products', 'cozy-addons' ),
				'placeholder' => __( 'Explore Products', 'cozy-addons' ),
				'condition'   => array(
					'show_cta_button' => 'yes',
				),
			)
		);

		$this->end_controls_section();
	}
	/**
	 * Style Box Options.
	 */
	private function cozy_addons_cta_style_box_options() {

		// Box.
		$this->start_controls_section(
			'section_style_box',
			array(
				'label' => __( 'Box Style', 'cozy-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		// Box alignment
		$this->add_responsive_control(
			'content_align',
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
				'default'   => 'center',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box' => 'text-align: {{VALUE}};',
				),
				'separator' => 'before',
			)
		);
		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'           => 'product_slide_typography',
				'scheme'         => Typography::TYPOGRAPHY_1,
				'label'          => __( 'Typography', 'cozy-addons' ),

				'selector'       => '{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box',
				'fields_options' => array(
					'typography'  => array( 'default' => 'yes' ),
					'font_size'   => array( 'default' => array( 'size' => 16 ) ),
					'font_weight' => array( 'default' => 400 ),

				),
			)
		);

		// Box internal padding.
		$this->add_responsive_control(
			'product_category_box_padding',
			array(
				'label'      => __( 'Box Padding', 'cozy-addons' ),
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
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				),
			)
		);
		$this->add_responsive_control(
			'product_category_content_padding',
			array(
				'label'      => __( 'Content Padding', 'cozy-addons' ),
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
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box .content-holder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				),
			)
		);

		$this->start_controls_tabs( 'product_box_style_tabs' );
		// Normal tab.
		$this->start_controls_tab(
			'categories_style_tabs_normal',
			array(
				'label' => __( 'Normal', 'cozy-addons' ),
			)
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'category_box_border',
				'label'    => __( 'Border', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box',
			)
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'categorybox_box_shadow',
				'label'    => __( 'Box Shadow', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box',
			)
		);
		// Normal border radius
		$this->add_control(
			'categories_box_border_radius',
			array(
				'label'      => __( 'Border Radius', 'elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		// Box color
		$this->add_control(
			'categories_box_bg_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'cozy-addons' ),
				'default'   => 'rgba(0,0,0,0)',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box' => 'background: {{VALUE}};',
				),
			)
		);
		// button text color
		$this->add_control(
			'categories_text_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Text Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'default'   => '#565656',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'      => 'background_overlay_color',
				'label'     => esc_html__( 'Background Overlay', 'cozy-addons' ),
				'types'     => array( 'gradient' ),
				'separator' => 'before',
				'selector'  => '{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box:before',
			)
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'categories_style_tabs_hover',
			array(
				'label' => __( 'Hover', 'cozy-addons' ),
			)
		);
		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'category_box_border_hover',
				'label'    => __( 'Border', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} .section.cozy-addons-products-categories .categories-holder .category-box:hover',
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'categorybox_box_shadow_hover',
				'label'    => __( 'Box Shadow', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .section.cozy-addons-products-categories .categories-holder .category-box:hover',
			)
		);

		// Hover border radius
		$this->add_control(
			'categories_box_border_radius_hover',
			array(
				'label'      => __( 'Border Radius', 'elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		// Box color
		$this->add_control(
			'categories_box_bg_color_hover',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'cozy-addons' ),
				'default'   => 'rgba(0,0,0,0)',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box:hover' => 'background: {{VALUE}};',
				),
			)
		);
		// button text color
		$this->add_control(
			'categories_text_color_hover',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Text Color', 'cozy-addons' ),
				'default'   => '#565656',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box:hover' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'      => 'background_overlay_color_hover',
				'label'     => esc_html__( 'Background Overlay', 'cozy-addons' ),
				'types'     => array( 'gradient' ),
				'separator' => 'before',
				'selector'  => '{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box:hover:before',
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}


	/**
	 * Featured image style
	 */
	private function cozy_addons_categories_image_options() {
		$this->start_controls_section(
			'categories_featrued_image_style',
			array(
				'label' => __( 'Image Style', 'cozy-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'pcategories_featrued_image_wrap_width',
			array(
				'label'      => __( 'Image Box Width', 'cozy-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => array(
					'%'  => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 1000,
					),
				),

				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}}   section.cozy-addons-products-categories .categories-holder .category-box .cat-image img' => 'width: {{SIZE}}{{UNIT}};',
				),
				'condition'  => array(
					'mag_block_layout' => 'mag-block-4',
				),
			)
		);
		$this->add_control(
			'categories_featrued_image_width',
			array(
				'label'      => __( 'Image Width', 'cozy-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => array(
					'%'  => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 1000,
					),
				),

				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}}  section.cozy-addons-products-categories .categories-holder .category-box .cat-image img' => 'width: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'categories_featrued_image_height',
			array(
				'label'     => __( 'Image Height', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 1,
						'max' => 1000,
					),
				),
				'selectors' => array(
					'{{WRAPPER}}  section.cozy-addons-products-categories .categories-holder .category-box .cat-image img' => 'height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'categories_featrued_mage_border_radius',
			array(
				'label'      => __( 'Border Radius', 'elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box .cat-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'categories_featrued_image_box_shadow',
				'label'    => __( 'Image Shadow', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box .cat-image img',
			)
		);
		$this->add_responsive_control(
			'product_category_image_padding',
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
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box .cat-image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				),
			)
		);
		$this->add_responsive_control(
			'product_category_image_margin',
			array(
				'label'      => __( 'Margin', 'cozy-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'    => array(
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '20',
					'left'     => '0',
					'isLinked' => false,
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box .cat-image img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				),
			)
		);
		$this->end_controls_section();
	}


	/**
	 * Style Title
	 */
	private function cozy_addons_category_style_title_options() {

		// Box.
		$this->start_controls_section(
			'product_categories_title_style_box',
			array(
				'label' => __( 'Title Style', 'cozy-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'           => 'product_category_title_typography',
				'scheme'         => Typography::TYPOGRAPHY_1,
				'label'          => __( 'Typography', 'cozy-addons' ),

				'selector'       => '{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a .cat-title',
				'fields_options' => array(
					'typography'  => array( 'default' => 'yes' ),
					'font_size'   => array( 'default' => array( 'size' => 20 ) ),
					'font_weight' => array( 'default' => 500 ),
					'line_height' => array( 'default' => array( 'size' => 24 ) ),
				),
				// 'separator' => 'before',
			)
		);
		$this->add_responsive_control(
			'product_category_title_style_margin',
			array(
				'label'      => __( 'margin', 'cozy-addons' ),
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
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a .cat-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				),
			)
		);
		$this->add_responsive_control(
			'product_category_title_style_padding',
			array(
				'label'      => __( 'Padding', 'cozy-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'    => array(
					'top'      => '10',
					'right'    => '0',
					'bottom'   => '10',
					'left'     => '0',
					'isLinked' => false,
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a .cat-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'product_category_title_border',
				'label'    => __( 'Border', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a .cat-title',
			)
		);
		$this->start_controls_tabs( 'product_cat_title_style_tabs' );
		// Normal tab.
		$this->start_controls_tab(
			'product_cat_title_tabs_normal',
			array(
				'label' => __( 'Normal', 'cozy-addons' ),
			)
		);

		$this->add_control(
			'product_category_title_text_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Text Color', 'cozy-addons' ),
				'default'   => '#000000',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a .cat-title' => 'color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'product_cat_title_tabs_hover',
			array(
				'label' => __( 'Hover', 'cozy-addons' ),
			)
		);

		$this->add_control(
			'product_category_title_text_color_hover',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Text Color', 'cozy-addons' ),
				'default'   => '#777777',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a:hover .cat-title' => 'color: {{VALUE}};',
				),
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	/**
	 * Style Title
	 */
	private function cozy_addons_category_style_count_options() {

		// Box.
		$this->start_controls_section(
			'product_categories_count_style_box',
			array(
				'label' => __( 'Count Style', 'cozy-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'           => 'product_category_count_text_typography',
				'scheme'         => Typography::TYPOGRAPHY_1,
				'label'          => __( 'Typography', 'cozy-addons' ),

				'selector'       => '{{WRAPPER}} section.cozy-addons-products-categories .category-box  a .cat-title .product-count',
				'fields_options' => array(
					'typography'  => array( 'default' => 'yes' ),
					'font_size'   => array( 'default' => array( 'size' => 20 ) ),
					'font_weight' => array( 'default' => 500 ),
					'line_height' => array( 'default' => array( 'size' => 24 ) ),
				),
				// 'separator' => 'before',
			)
		);
		$this->add_control(
			'product_category_count_text_bgcolor',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'cozy-addons' ),
				'default'   => 'rgba(0,0,0,0)',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .category-box  a .cat-title .product-count' => 'Background: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'product_category_count_text_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Text Color', 'cozy-addons' ),
				'default'   => '#000000',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .category-box  a .cat-title .product-count' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_responsive_control(
			'product_category_count_style_padding',
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
					'{{WRAPPER}} section.cozy-addons-products-categories .category-box  a .cat-title .product-count' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				),
			)
		);
		$this->add_control(
			'product_category_count_style_radius',
			array(
				'label'      => __( 'Border Radius', 'elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .category-box  a .cat-title .product-count' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->end_controls_section();
	}



	/**
	 * Product category button Options.
	 */
	private function cozy_addons_cta_button_options() {

		// Box.
		$this->start_controls_section(
			'section_footer_box',
			array(
				'label' => __( 'Button Style', 'cozy-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'cta_button_spacing',
			array(
				'label'     => __( 'Button Top Spacing', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 50,
					),
				),
				'default'   => array(
					'unit' => 'px',
					'size' => 15,
				),
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a.cat-link-button' => 'margin-top: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'cta_button_icon_size',
			array(
				'label'     => __( 'Icon Size', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
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
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a.cat-link-button .button-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'cta_button_icon_spacing',
			array(
				'label'     => __( 'Icon Spacing', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 1,
						'max' => 50,
					),
				),
				'default'   => array(
					'size' => 10,
				),
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a.cat-link-button.before-text .button-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a.cat-link-button.after-text .button-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'           => 'cta_button_typography',
				'scheme'         => Typography::TYPOGRAPHY_1,
				'label'          => __( 'Typography', 'cozy-addons' ),

				'selector'       => '{{WRAPPER}} .cozy-addons-products-categories .categories-holder .category-box a.cat-link-button',
				'fields_options' => array(
					'typography'  => array( 'default' => 'yes' ),
					'font_size'   => array( 'default' => array( 'size' => 16 ) ),
					'font_weight' => array( 'default' => 400 ),
				),
			)
		);
		// cta button padding
		$this->add_responsive_control(
			'cta_button_padding',
			array(
				'label'      => __( 'Button Padding', 'cozy-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'default'    => array(
					'top'      => '6',
					'right'    => '20',
					'bottom'   => '6',
					'left'     => '20',
					'isLinked' => false,
				),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a.cat-link-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				),

			)
		);
		$this->start_controls_tabs( 'cta_button_style_tabs' );
		// Normal tab.
		$this->start_controls_tab(
			'cta_style_tabs_normal',
			array(
				'label' => __( 'Normal', 'cozy-addons' ),
			)
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'button_border',
				'label'    => __( 'Border', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a.cat-link-button',
			)
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'button_box_shadow',
				'label'    => __( 'Box Shadow', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a.cat-link-button',
			)
		);
		// Normal border radius
		$this->add_control(
			'button_border_radius',
			array(
				'label'      => __( 'Border Radius', 'elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a.cat-link-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		// Box color
		$this->add_control(
			'button_bg_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'cozy-addons' ),
				'default'   => '#6EC1E4',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a.cat-link-button' => 'background: {{VALUE}};',
				),
			)
		);
		// button text color
		$this->add_control(
			'button_text_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Text Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a.cat-link-button' => 'color: {{VALUE}};',
				),
			)
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'cta_style_tabs_hover',
			array(
				'label' => __( 'Hover', 'cozy-addons' ),
			)
		);
		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'button_border_hover',
				'label'    => __( 'Border', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a.cat-link-button:hover',
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'button_box_shadow_hover',
				'label'    => __( 'Box Shadow', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a.cat-link-button:hover',
			)
		);

		// Hover border radius
		$this->add_control(
			'button_border_radius_hover',
			array(
				'label'      => __( 'Border Radius', 'elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a.cat-link-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		// Box color
		$this->add_control(
			'button_bg_color_hover',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'cozy-addons' ),
				'default'   => '#61CE70',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a.cat-link-button:hover' => 'background: {{VALUE}};',
				),
			)
		);
		// button text color
		$this->add_control(
			'cta_text_color_hover',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Text Color', 'cozy-addons' ),
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-products-categories .categories-holder .category-box a.cat-link-button:hover' => 'color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}


	/**
	 * slide pagination style
	 */
	private function cozy_addons_product_cat_carousel_pagination_options() {
		$this->start_controls_section(
			'slider_pagination_style',
			array(
				'label'     => __( 'Pagination Style', 'cozy-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'show_carousel_pagination' => 'yes',
				),

			)
		);
		$this->add_control(
			'slider_pagination_style_icon_width',
			array(
				'label'     => __( 'Pagination Width', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 1,
						'max' => 50,
					),
				),
				'default'   => array(
					'unit' => 'px',
					'size' => 10,
				),
				'selectors' => array(
					'{{WRAPPER}} .ctproduct-cat.cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'slider_pagination_style_icon_height',
			array(
				'label'     => __( 'Pagination Height', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 1,
						'max' => 50,
					),
				),
				'default'   => array(
					'unit' => 'px',
					'size' => 10,
				),
				'selectors' => array(
					'{{WRAPPER}}  .ctproduct-cat.cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'pagination_box_border_radius',
			array(
				'label'      => __( 'Pagination Radius', 'elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}}  .ctproduct-cat.cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->start_controls_tabs( 'pagination_style_tabs' );
		// Normal tab.
		$this->start_controls_tab(
			'pagination_style_tabs_normal',
			array(
				'label' => __( 'Normal', 'cozy-addons' ),
			)
		);
		// Normal border
		// Box color
		$this->add_control(
			'pagination_box_bg_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Pagination Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => array(
					'{{WRAPPER}}  .ctproduct-cat.cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'background: {{VALUE}};',
				),
			)
		);

		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'pagination_box_style_tabs_hover',
			array(
				'label' => __( 'Hover', 'cozy-addons' ),
			)
		);

		// Box color
		$this->add_control(
			'pagination_box_bg_color_hover',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Pagination Hover Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'default'   => 'rgba(255, 255, 255, 1)',
				'selectors' => array(
					'{{WRAPPER}} .ctproduct-cat.cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet:hover' => 'background: {{VALUE}};',
				),
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}
	/**
	 * navigation style
	 */
	private function cozy_addons_product_cat_carousel_navigation_options() {
		$this->start_controls_section(
			'slider_navigation_style',
			array(
				'label'     => __( 'Navigation Style', 'cozy-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'show_carousel_navigation' => 'yes',
				),
			)
		);
		$this->add_control(
			'slider_navigation_style_icon_size',
			array(
				'label'     => __( 'Icon Size', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 1,
						'max' => 50,
					),
				),
				'default'   => array(
					'unit' => 'px',
					'size' => 12,
				),
				'selectors' => array(
					'{{WRAPPER}} .ct-productcat-nav.cozy-slide-nav' => 'font-size: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'slider_navigation_style_icon_width',
			array(
				'label'     => __( 'Icon Box Width', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 1,
						'max' => 250,
					),
				),
				'default'   => array(
					'unit' => 'px',
					'size' => 35,
				),
				'selectors' => array(
					'{{WRAPPER}} .ct-productcat-nav.cozy-slide-nav' => 'width: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'slider_navigation_style_icon_height',
			array(
				'label'     => __( 'Icon Box Height', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 1,
						'max' => 250,
					),
				),
				'default'   => array(
					'unit' => 'px',
					'size' => 35,
				),
				'selectors' => array(
					'{{WRAPPER}} .ct-productcat-nav.cozy-slide-nav' => 'height: {{SIZE}}{{UNIT}}',
				),

			)
		);
		$this->start_controls_tabs( 'navigation_style_tabs' );
		// Normal tab.
		$this->start_controls_tab(
			'navigation_style_tabs_normal',
			array(
				'label' => __( 'Normal', 'cozy-addons' ),
			)
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'navigation_box_border',
				'label'    => __( 'Border', 'cozy-addons' ),
				'selector' => '.ct-productcat-nav.cozy-slide-nav',
			)
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'navigation_box_box_shadow',
				'label'    => __( 'Box Shadow', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} .ct-productcat-nav.cozy-slide-nav',
			)
		);
		// Normal border radius
		$this->add_control(
			'navigation_box_border_radius',
			array(
				'label'      => __( 'Border Radius', 'elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .ct-productcat-nav.cozy-slide-nav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		// Box color
		$this->add_control(
			'navigation_box_bg_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'default'   => '#6EC1E4',
				'selectors' => array(
					'{{WRAPPER}} .ct-productcat-nav.cozy-slide-nav' => 'background: {{VALUE}};',
				),
			)
		);
		// button text color
		$this->add_control(
			'navigation_box_text_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Icon Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				),
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} .ct-productcat-nav.cozy-slide-nav' => 'color: {{VALUE}};',
				),
			)
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'navigation_box_style_tabs_hover',
			array(
				'label' => __( 'Hover', 'cozy-addons' ),
			)
		);
		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'navigation_box_border_hover',
				'label'    => __( 'Border', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} .ct-productcat-nav.cozy-slide-nav:hover',
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'navigation_box_shadow_hover',
				'label'    => __( 'Box Shadow', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} .ct-productcat-nav.cozy-slide-nav:hover',
			)
		);

		// Hover border radius
		$this->add_control(
			'navigation_box_border_radius_hover',
			array(
				'label'      => __( 'Border Radius', 'elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .ct-productcat-nav.cozy-slide-nav:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		// Box color
		$this->add_control(
			'navigation_box_bg_color_hover',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'default'   => '#61CE70',
				'selectors' => array(
					'{{WRAPPER}} .ct-productcat-nav.cozy-slide-nav:hover' => 'background: {{VALUE}};',
				),
			)
		);
		// button text color
		$this->add_control(
			'navigation_box_text_color_hover',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Text Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				),
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} .ct-productcat-nav.cozy-slide-nav:hover' => 'color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}
	/**
	 *  render layout for categories
	 */
	protected function render( $instance = array() ) {
		include_once ABSPATH . 'wp-admin/includes/plugin.php';
		if ( cozy_addons_premium_access() ) {
			if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
				$settings        = $this->get_settings();
				$selected_layout = $settings['product_categories_display_layout'];

				$grid_col_class = '';
				if ( $selected_layout == 'layout-grid' || 'layout-carousel' ) {
					$grid_col_class = $settings['product_categories_grid_columns'];
				}
				$overlay_style_class = '';
				if ( $settings['enable_content_overlay_style'] == 'yes' ) {
					$overlay_style_class = 'overlay-style-enabled';
				}
				$catPerView    = '';
				$swiperID      = '';
				$swiperWrapper = '';
				$swiperSlide   = '';
				if ( $selected_layout == 'layout-carousel' ) {
					$catPerView    = $settings['product_cat_carousel_post_per_view'];
					$swiperID      = 'wooCatSwiper';
					$swiperWrapper = 'swiper-wrapper';
					$swiperSlide   = 'swiper-slide';
				}
				?>
				<section id="<?php echo esc_attr( $swiperID ); ?>" data-slidesPerView="<?php echo esc_attr( $catPerView ) . '" ' . 'data-carouselColumnGap="' . esc_attr( $settings['cozy_carousel_column_gap'] ); ?>" class="cozy-addons-products-categories <?php echo esc_attr( $selected_layout ) . ' ' . esc_attr( $overlay_style_class ); ?>">
					<div class="categories-holder cat-column-<?php echo esc_attr( $grid_col_class ) . ' ' . esc_attr( $swiperWrapper ); ?>">
						<?php
						$args                   = array(
							'taxonomy'   => 'product_cat',
							'hide_empty' => true,
						);
						$ct_products_categories = get_categories( $args );
						foreach ( $ct_products_categories as $category ) :
							?>
							<div class="category-box <?php echo esc_attr( $swiperSlide ); ?>">
								<?php
								$product_cat_conetnt = $category->description;
								$cozy_category_id    = $category->term_id;
								// $category_slug = $category->slug;
								$category_image_id = get_term_meta( $cozy_category_id, 'thumbnail_id', true );
								if ( $category_image_id && $settings['show_categories_image'] == 'yes' ) {
									?>
									<div class="cat-image">
										<a href="<?php echo get_term_link( $category ); ?> ">
											<?php
											$category_image_url = wp_get_attachment_image_src( $category_image_id, 'full' )[0];
											echo "<img src='" . $category_image_url . "' alt='" . $category->name . "' />";
											?>
										</a>
									</div>
									<?php
								}
								$content_display_class = '';
								if ( $settings['product_cat_content_display_condition'] && $settings['enable_content_overlay_style'] == 'yes' ) {
									$content_display_class = $settings['product_cat_content_display_condition'];
								}
								if ( $content_display_class == 'content-display-on-hover' && $settings['enable_content_overlay_style'] == 'yes' ) {
									?>
									<div class="content-holder overlay-on-hover">
										<?php if ( $settings['show_categories_title'] == 'yes' ) { ?>
											<a href="<?php echo get_term_link( $category ); ?> ">
												<div class="title-section">
													<?php
													echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="cat-title">' . $category->name;
													if ( $settings['show_categories_product_count'] == 'yes' ) {
														?>
														<span class="product-count"> <?php echo $category->count; ?> </span>
														<?php
														echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
													}
													?>
												</div>
											</a>
										<?php } ?>
									</div>
								<?php } ?>
								<!-- end image query -->
								<div class="content-holder <?php echo esc_attr( $content_display_class ); ?>">
									<?php if ( $settings['show_categories_title'] == 'yes' ) { ?>
										<a href="<?php echo get_term_link( $category ); ?> ">
											<div class="title-section">
												<?php
												echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="cat-title">' . $category->name;
												if ( $settings['show_categories_product_count'] == 'yes' ) {
													?>
													<span class="product-count"> <?php echo $category->count; ?> </span>
													<?php
													echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
												}
												?>
											</div>
										</a>
										<?php
									}

									if ( $settings['show_category_description'] == 'yes' && $product_cat_conetnt ) {
										?>
										<div class="cat-description">
											<?php
											if ( $settings['product_category_description_type'] == 'product-category-excerpt' ) {
												$cat_excerpt_length  = $settings['cat_description_excerpt_length'];
												$description_excerpt = wp_trim_words( $product_cat_conetnt, $cat_excerpt_length );
												echo $description_excerpt;
											} else {
												echo $product_cat_conetnt;
											}
											?>
										</div><!--end of desc-->
										<?php
									}
									if ( $settings['show_cta_button'] == 'yes' ) {
										$icon_class = 'before-text';
										if ( $settings['cta_icon_position'] == 'after-text' ) {
											$icon_class = 'after-text';
										}

										?>

										<a class="cat-link-button <?php echo esc_attr( $icon_class ); ?>" href="<?php echo get_term_link( $category ); ?> ">
											<?php
											if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text' ) {
												echo '<span class="button-icon">';
												\Elementor\Icons_Manager::render_icon( $settings['product_cat_cta_icon'], array( 'aria-hidden' => 'true' ) );
												echo '</span>';
											}
											echo esc_html( $settings['button_text'] );
											if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text' ) {
												echo '<span class="button-icon">';
												\Elementor\Icons_Manager::render_icon( $settings['product_cat_cta_icon'], array( 'aria-hidden' => 'true' ) );
												echo '</span>';
											}

											?>
										</a>
									<?php } ?>
								</div><!--end content holder -->
							</div><!--end category box-->
							<?php
						endforeach;

						?>
					</div>
				</section> <!-- featured-layout -->
				<?php
				if ( $selected_layout == 'layout-carousel' ) {
					if ( $settings['show_carousel_navigation'] == 'yes' ) {
						?>
						<div class="ct-productcat-nav cozy-slide-prev cozy-slide-nav">
							<?php \Elementor\Icons_Manager::render_icon( $settings['slide_navigation_left_icon'], array( 'aria-hidden' => 'true' ) ); ?>
						</div>
						<div class="ct-productcat-nav cozy-slide-next cozy-slide-nav">
							<?php \Elementor\Icons_Manager::render_icon( $settings['slide_navigation_right_icon'], array( 'aria-hidden' => 'true' ) ); ?>
						</div>
						<?php
					}
					if ( $settings['show_carousel_pagination'] == 'yes' ) {
						echo '<div class="cozy-swiper-pagination ctproduct-cat"></div>';
					}
				}
			} else {
				echo __( 'Please Install & Activate the Woocommerce Plugin', 'cozy-addons' );
			}
		} else {
			?>
			<a href="https://cozythemes.com/cozy-addons/" target="_blank"><?php echo __( 'Upgrade To Premium Version - https://cozythemes.com/cozy-addons/', 'cozy-addons' ); ?></a>
			<?php
		}
	}
}
