<?php

namespace Cozy_Addons\CFSevenWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Core\Schemes\Typography;
use Elementor\Core\Schemes\Color;
use Elementor\Group_Control_Image_Size;
use WP_Query;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * @since 1.1.0
 */
class Cozy_Addons_CFSeven_Widget extends Widget_Base {


	public function get_name() {
		return 'cozy-addons-cf7-styler';
	}

	public function get_title() {
		return __( 'Contact Form 7 Styler', 'cozy-addons' );
	}
	public function get_keywords() {
		return array( 'contact form 7 ', 'form styler', 'cozy addons' );
	}

	public function get_icon() {
		return 'eicon-form-horizontal cozy-widget-icons';
	}

	public function get_categories() {
		return array( 'cozy-addons-items' );
	}

	protected function register_controls() {
		if ( cozy_addons_premium_access() ) {
			$this->cozy_addons_content_options();
			$this->cozy_addons_form_button_options();
			// Styles for widget elements
			$this->cozy_addons_cta_style_box_options();
			$this->cozy_addons_contact_form_style_options();
			$this->cozy_addons_cta_button_options();
		}
	}
	/**
	 * Get all contact form
	 */
	private function cozy_addons_contact_form() {
		$posts = get_posts(
			array(
				'post_type'     => 'wpcf7_contact_form',
				'post_per_page' => -1,
			)
		);
		if ( ! empty( $posts ) ) {
			foreach ( $posts as $form ) {
				$options[ $form->post_title ] = $form->post_title;
			}
			wp_reset_query();
			return $options;
		}
	}

	/**
	 * Header Layout Options.
	 */
	private function cozy_addons_content_options() {
		$this->start_controls_section(
			'content_section',
			array(
				'label' => __( 'General', 'cozy-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'enable_form_header',
			array(
				'label'   => __( 'Enable Form Header', 'cozy-addons' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'no',
			)
		);
		$this->add_control(
			'title_text',
			array(
				'label'       => __( 'Title', 'cozy-addons' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 1,
				'default'     => __( 'Form Header', 'cozy-addons' ),
				'placeholder' => __( 'Form Header', 'cozy-addons' ),
				'condition'   => array(
					'enable_form_header' => 'yes',
				),
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
				'default'   => 'h3',
				'condition' => array(
					'enable_form_header' => 'yes',
				),
			)
		);
		$this->add_control(
			'description_text',
			array(
				'label'       => __( 'Description', 'cozy-addons' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 3,
				'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'cozy-addons' ),
				'placeholder' => __( 'Add description Here', 'cozy-addons' ),
				'condition'   => array(
					'enable_form_header' => 'yes',
				),
			)
		);
		$this->add_control(
			'form_lists',
			array(
				'label'       => __( 'Select form', 'cozy-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'multiple'    => true,
				'options'     => $this->cozy_addons_contact_form(),

			)
		);

		$this->end_controls_section();
	}


	/**
	 * Header Layout Options.
	 */
	private function cozy_addons_form_button_options() {
		$this->start_controls_section(
			'cfseven_form_button_option',
			array(
				'label' => __( 'Submit Button', 'cozy-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'cfform_button_display_condition',
			array(
				'label'   => __( 'Button Position', 'cozy-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'button-position-default',
				'options' => array(
					'button-position-default' => esc_html__( 'Default', 'cozy-addons' ),
					'button-position-inline'  => esc_html__( 'Inline', 'cozy-addons' ),

				),
			)
		);
		$this->add_control(
			'form_cta_button_width',
			array(
				'label'      => __( 'Button width', 'cozy-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => array(
					'%'  => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 500,
					),
				),
				'default'    => array(
					'unit' => 'px',
					'size' => 150,
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}}  section.cozy-addons-cf7-styler form input.wpcf7-submit' => 'width: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'cform_cta_button_top_spacing',
			array(
				'label'     => __( 'Button top spacing', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => -50,
						'max' => 100,
					),
				),
				'default'   => array(
					'unit' => 'px',
					'size' => 0,
				),
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler.button-position-inline form.wpcf7-form .wpcf7-form-control.wpcf7-submit' => 'top: {{SIZE}}{{UNIT}};',
				),
				'condition' => array(
					'cfform_button_display_condition' => 'button-position-inline',
				),
			)
		);
		$this->add_control(
			'cform_cta_button_right_spacing',
			array(
				'label'     => __( 'Button right spacing', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => -50,
						'max' => 100,
					),
				),
				'default'   => array(
					'unit' => 'px',
					'size' => 0,
				),
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler.button-position-inline form.wpcf7-form .wpcf7-form-control.wpcf7-submit ' => 'right: {{SIZE}}{{UNIT}};',
				),
				'condition' => array(
					'cfform_button_display_condition' => 'button-position-inline',
				),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Pricing Footer Options.
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
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'           => 'cta_buttom_typography',
				'scheme'         => Typography::TYPOGRAPHY_1,
				'label'          => __( 'Button Typography', 'cozy-addons' ),
				'selector'       => '{{WRAPPER}} section.cozy-addons-cf7-styler form input.wpcf7-submit',
				'fields_options' => array(
					'typography'  => array( 'default' => 'yes' ),
					'font_size'   => array( 'default' => array( 'size' => 16 ) ),
					'font_weight' => array( 'default' => 600 ),
				),
			)
		);
		$this->add_control(
			'form_cta_button_spacing',
			array(
				'label'     => __( 'Button Vertical Spacing', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => -100,
						'max' => 100,
					),
				),
				'default'   => array(
					'unit' => 'px',
					'size' => 0,
				),
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler form input.wpcf7-submit' => 'margin-top: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'form_cta_button_horizontal_spacing',
			array(
				'label'     => __( 'Button Horizontal Spacing', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => -250,
						'max' => 250,
					),
				),
				'default'   => array(
					'unit' => 'px',
					'size' => 0,
				),
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler form input.wpcf7-submit' => 'margin-right: {{SIZE}}{{UNIT}};',
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
					'top'      => '10',
					'right'    => '20',
					'bottom'   => '10',
					'left'     => '20',
					'isLinked' => false,
				),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler form input.wpcf7-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-cf7-styler form input.wpcf7-submit',
			)
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'button_box_shadow',
				'label'    => __( 'Box Shadow', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} section.cozy-addons-cf7-styler form input.wpcf7-submit',
			)
		);
		// Normal border radius
		$this->add_control(
			'button_border_radius',
			array(
				'label'      => __( 'Border Radius', 'elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'default'    => array(
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'isLinked' => true,
				),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input.wpcf7-form-control.wpcf7-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				),
			)
		);
		// Box color
		$this->add_control(
			'button_bg_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'default'   => '#6EC1E4',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler form input.wpcf7-submit' => 'background: {{VALUE}};',
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
					'value' => Color::COLOR_2,
				),
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler form input.wpcf7-submit' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-cf7-styler form input.wpcf7-submit:hover',
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'button_box_shadow_hover',
				'label'    => __( 'Box Shadow', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} section.cozy-addons-cf7-styler form input.wpcf7-submit:hover',
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
					'{{WRAPPER}} section.cozy-addons-cf7-styler form input.wpcf7-submit:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		// Box color
		$this->add_control(
			'button_bg_color_hover',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'default'   => '#61CE70',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler form input.wpcf7-submit:hover' => 'background: {{VALUE}};',
				),
			)
		);
		// button text color
		$this->add_control(
			'cta_text_color_hover',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Text Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				),
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler form input.wpcf7-submit:hover' => 'color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	/**
	 * Form Style
	 */
	private function cozy_addons_contact_form_style_options() {
		$this->start_controls_section(
			'contact_form_style',
			array(
				'label' => __( 'Form Style', 'cozy-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'form_label_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Label Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				),
				'default'   => '#000000',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form label' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_responsive_control(
			'input_field_style_padding',
			array(
				'label'      => __( 'Input Field Padding', 'cozy-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'    => array(
					'top'      => '10',
					'right'    => '10',
					'bottom'   => '10',
					'left'     => '10',
					'isLinked' => false,
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="text"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="email"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="number"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="url"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="tel"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="date"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				),
			)
		);

		// Normal border radius
		$this->add_control(
			'field_border_radius',
			array(
				'label'      => __( 'Field Border Radius', 'elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="text"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="email"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="number"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="url"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="tel"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form select' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="file"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="date"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'form_field_border',
				'label'    => __( 'Field Border', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input, {{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form textarea',
			)
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'field_box_shadow',
				'label'    => __( 'Field Shadow', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input',
			)
		);
		$this->add_control(
			'cozy_form_fields_space',
			array(
				'label'     => __( 'Form Fieds Bottom Space', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'   => array(
					'size' => '10',
				),
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form select' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form textarea' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="file"]' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="date"]' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'cozy_form_label_space',
			array(
				'label'     => __( 'Form label Bottom Space', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'   => array(
					'size' => '10',
				),
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input' => 'margin-top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form select' => 'margin-top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form textarea' => 'margin-top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="file"]' => 'margin-top: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->start_controls_tabs( 'form_style_tabs' );
		// Normal tab.
		$this->start_controls_tab(
			'form_style_tabs_normal',
			array(
				'label' => __( 'Normal', 'cozy-addons' ),
			)
		);
		// background Color
		$this->add_control(
			'field_background_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Field Background Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="text"]' => 'background: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="email"]' => 'background: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="number"]' => 'background: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="url"]' => 'background: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="tel"]' => 'background: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form select' => 'background: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form textarea' => 'background: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="file"]' => 'background: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="date"]' => 'background: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'placeholder_text_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Field Text Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				),
				'default'   => '#000000',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="text"]' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="date"]' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="email"]' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="number"]' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="url"]' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="tel"]' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form select' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form textarea' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="file"]' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input::placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input::-ms-input-placeholder ' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input:-ms-input-placeholder ' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form textarea::placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form textarea::-ms-input-placeholder ' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form textarea:-ms-input-placeholder ' => 'color: {{VALUE}};',
				),
			)
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'form_style_tabs_hover',
			array(
				'label' => __( 'Focus', 'cozy-addons' ),
			)
		);
		$this->add_control(
			'field_background_hover_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Field Background Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'default'   => '#676767',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input:focus' => 'background: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form select:focus' => 'background: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form textarea:focus' => 'background: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="file"]:focus' => 'background: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="date"]:focus' => 'background: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'field_text_hover_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Field Text Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				),
				'default'   => '#000000',
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="text"]:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="email"]:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="number"]:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="url"]:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="tel"]:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form select:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form textarea:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="file"]:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input[type="date"]:focus' => 'color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->add_control(
			'form_textarea_field_height',
			array(
				'label'     => __( 'Textarea Height', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 50,
						'max' => 500,
					),
				),
				'default'   => array(
					'unit' => 'px',
					'size' => 150,
				),
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form textarea' => 'height: {{SIZE}}{{UNIT}};',
				),
				'separator' => 'before',
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'form_textarea_field_border',
				'label'    => __( 'Textarea Field Border', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form textarea',
			)
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'field_textarea_shadow',
				'label'    => __( 'Textarea Field Shadow', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form textarea',
			)
		);
		$this->add_control(
			'form_select_field_height',
			array(
				'label'     => __( 'Select Field Height', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 25,
						'max' => 150,
					),
				),
				'default'   => array(
					'unit' => 'px',
					'size' => 40,
				),
				'selectors' => array(
					'{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form select' => 'height: {{SIZE}}{{UNIT}};',
				),
				'separator' => 'before',
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'form_select_field_border',
				'label'    => __( 'Select Field Border', 'cozy-addons' ),
				'selector' => 'section.cozy-addons-cf7-styler form.wpcf7-form select',
			)
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'field_select_shadow',
				'label'    => __( 'Select Field Shadow', 'cozy-addons' ),
				'selector' => 'section.cozy-addons-cf7-styler form.wpcf7-form select',
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
					'{{WRAPPER}} .cozy-addons-cf7-styler .form-section-header' => 'text-align: {{VALUE}};',
				),

			)
		);
		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'           => 'form_typography',
				'scheme'         => Typography::TYPOGRAPHY_1,
				'label'          => __( 'Typography', 'cozy-addons' ),
				'selector'       => '{{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form, {{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form input, {{WRAPPER}} section.cozy-addons-cf7-styler form.wpcf7-form ::placeholder',

				'fields_options' => array(
					'typography'  => array( 'default' => 'yes' ),
					'font_size'   => array( 'default' => array( 'size' => 16 ) ),
					'font_weight' => array( 'default' => 400 ),
					// 'line_height' => ['default' => ['size' => 1]],
				),

			)
		);

		// Box internal padding.
		$this->add_responsive_control(
			'cozy_form_padding',
			array(
				'label'      => __( 'Padding', 'cozy-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'    => array(
					'top'      => '40',
					'right'    => '40',
					'bottom'   => '40',
					'left'     => '40',
					'isLinked' => true,
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .cozy-addons-cf7-styler .cf7-holder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				),
			)
		);
		$this->add_control(
			'background_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} .cozy-addons-cf7-styler .cf7-holder' => 'background: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'text_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Text Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'default'   => '#222222',
				'selectors' => array(
					'{{WRAPPER}} .cozy-addons-cf7-styler .cf7-holder' => 'color: {{VALUE}};',
				),
			)
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'border',
				'label'    => __( 'Border', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} .cozy-addons-cf7-styler .cf7-holder',
			)
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'box_shadow',
				'label'    => __( 'Box Shadow', 'cozy-addons' ),
				'selector' => '{{WRAPPER}} .cozy-addons-cf7-styler .cf7-holder',
			)
		);
		// Normal border radius
		$this->add_control(
			'border_radius',
			array(
				'label'      => __( 'Border Radius', 'elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .cozy-addons-cf7-styler .cf7-holder' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'separator'  => 'after',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'           => 'form_title_typography',
				'scheme'         => Typography::TYPOGRAPHY_1,
				'label'          => __( 'Heading Typography', 'cozy-addons' ),
				'selector'       => '{{WRAPPER}} .cozy-addons-cf7-styler .form-section-header .title .section-title',
				'fields_options' => array(
					'typography'  => array( 'default' => 'yes' ),
					'font_size'   => array( 'default' => array( 'size' => 36 ) ),
					'font_weight' => array( 'default' => 700 ),
				),
			)
		);
		$this->add_control(
			'form_heading_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Heading Color', 'cozy-addons' ),
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'default'   => '#000000',
				'selectors' => array(
					'{{WRAPPER}} .cozy-addons-cf7-styler .form-section-header .section-title' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'cozy_form_title_space',
			array(
				'label'     => __( 'Heading Bottom Space', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'   => array(
					'size' => '10',
				),
				'selectors' => array(
					'{{WRAPPER}} .cozy-addons-cf7-styler .form-section-header .section-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'cozy_form_decription_space',
			array(
				'label'     => __( 'Description Bottom Space', 'cozy-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'   => array(
					'size' => '10',
				),
				'selectors' => array(
					'{{WRAPPER}} .cozy-addons-cf7-styler .form-section-header .description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();
	}

	protected function render( $instance = array() ) {

		// Get settings.
		$settings = $this->get_settings(); ?>

		<!-- featured-layout -->
		<section class="cozy-addons-cf7-styler <?php echo esc_attr( $settings['cfform_button_display_condition'] ); ?>">
			<?php
			if ( cozy_addons_premium_access() ) {
				if ( class_exists( 'WPCF7' ) ) {
					?>
					<div class="cf7-holder">
						<?php if ( $settings['enable_form_header'] === 'yes' ) { ?>
							<div class="form-section-header content-block">
								<?php
								if ( $settings['title_text'] ) :
									?>
									<span class="title content-block">
										<?php echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="section-title">' . esc_html( $settings['title_text'] ) . '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>'; ?>

									</span>
									<?php
								endif;
								if ( $settings['description_text'] ) :
									?>
									<span class="description content-block"><?php echo esc_html( $settings['description_text'] ); ?></span>
									<?php
								endif;
								?>
							</div>
							<?php
						}
						$contact_form_title = $settings['form_lists'];
						if ( ! empty( $contact_form_title ) ) {
							$selected_form = new WP_Query(
								array(
									'post_type'      => 'wpcf7_contact_form',
									'post_status'    => 'any',
									'posts_per_page' => 1,
									'title'          => $contact_form_title,
								)
							);
							$form_id       = $selected_form->ID;
							echo do_shortcode( '[contact-form-7 id="' . esc_attr( $form_id ) . '" title="' . esc_attr( $contact_form_title ) . '"]' );
						}

						?>
					</div>
					<?php
				} else {
					echo __( 'Please Install & Activate the Contact Form 7 - https://wordpress.org/plugins/contact-form-7/" Plugin.', 'cozy-addons' );
				}
			} else {
				?>
				<a href="https://cozythemes.com/cozy-addons/" target="_blank"><?php echo __( 'Upgrade To Premium Version - https://cozythemes.com/cozy-addons/', 'cozy-addons' ); ?></a>
			<?php } ?>
		</section> <!-- featured-layout -->

		<?php
	}
}
