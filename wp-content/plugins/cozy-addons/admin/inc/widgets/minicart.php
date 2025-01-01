<?php

namespace Cozy_Addons\MiniCartWidgets;

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
class Cozy_Addons_MiniCart_Widget extends Widget_Base
{


    public function get_name()
    {
        return 'cozy-addons-mini-cart';
    }

    public function get_title()
    {
        return __('Menu Cart', 'cozy-addons');
    }

    public function get_icon()
    {
        return 'eicon-cart-light cozy-cart-icon cozy-widget-icons';
    }
    public function get_keywords()
    {
        return [
            'cozy addons',
            'mini cart',
            'header cart icon',
        ];
    }
    public function get_categories()
    {
        return ['cozy-addons-items'];
    }

    protected function register_controls()
    {

        $this->cozy_addons_minicart_options();

        $this->cozy_addons_minicart_icon_styles();
        $this->cozy_addons_minicart_image_options();
        $this->cozy_addons_minicart_count_styles();
        $this->cozy_addons_minicart_sidebar_styles();
        $this->cozy_addons_minicart_sidebar_panel_content_styles();
        $this->cozy_addons_minicart_cta_styles();
    }

    /**
     * front content
     */
    private function cozy_addons_minicart_options()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('General', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'cart_icon_type',
            [
                'label' => __('Icon Type', 'cozy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'cart-type-icon' => __('Icon', 'cozy-addons'),
                    'cart-type-image' => __('Image', 'cozy-addons'),
                ],
                'default' => 'cart-type-icon',
            ]
        );

        $this->add_control(
            'cart_icon_alignment',
            [
                'label' => __( 'Horizontal Alignment', 'cozy-addons' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => __( 'Left', 'cozy-addons' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'cozy-addons' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'end' => [
                        'title' => __( 'Right', 'cozy-addons' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'end',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-minicart-icon' => 'justify-content: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'cart_icon',
            [
                'label' => __('Cart Icon', 'cozy-addons'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-shopping-cart',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'cart_icon_type' => 'cart-type-icon',
                ],
            ]
        );
        $this->add_control(
            'icon_image',
            [
                'label' => esc_html__('Upload Image', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'cart_icon_type' => 'cart-type-image',
                ],
            ]
        );

        $this->add_responsive_control(
            'cart_icon_height',
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
                    'size' => 25,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-cart-icon .icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-cart-icon .icon img' => 'height:{{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'hr1',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'cart_open_sidebar_panel',
            [
                'label' => __('Open with sidebar panel', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'sidebar_panel_close_icon',
            [
                'label' => __('Close Icon', 'cozy-addons'),
                'type' => Controls_Manager::ICONS,
                'default' =>  [
                    'value' => 'fas fa-window-close',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'cart_open_sidebar_panel' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'sidebar_panel_close_icon_height',
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
                    'size' => 25,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sidebar-panel-header .cozy-close-icon-wrapper i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'cart_open_sidebar_panel' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'hr2',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'enable_cart_amount',
            [
                'label' => __('Enable Cart Amount', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_responsive_control(
            'cart_amount_gap',
            [
                'label' => __('Gap', 'cozy-addons'),
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
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-cart-subtotal' => 'margin-right: {{SIZE}}{{UNIT}}',
                ], 'condition' => [
                    'enable_cart_amount' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'hr3',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'enable_cart_count',
            [
                'label' => __('Enable Cart Count', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'hr4',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'enable_cart_text',
            [
                'label' => __('Enable Cart Text', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'cart_text',
            [
                'label' => __('Cart Text', 'cozy-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Cart', 'cozy-addons'),
                'placeholder' => __('Cart Text', 'cozy-addons'),
                'condition' => [
                    'enable_cart_text' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'text_placement',
            [
                'label' => __('Placement', 'cozy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'before-icon' => __('Before Icon', 'cozy-addons'),
                    'after-icon' => __('After Icon', 'cozy-addons'),
                ],
                'default' => 'after-icon',
                'condition' => [
                    'enable_cart_text' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'cart_text_gap',
            [
                'label' => __('Gap', 'cozy-addons'),
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
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-cart-text-before' => 'margin-right: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-cart-text-after' => 'margin-left: {{SIZE}}{{UNIT}}',
                ], 'condition' => [
                    'enable_cart_text' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_minicart_icon_styles()
    {
        $this->start_controls_section(
            'minicart_content_styles',
            [
                'label' => __('Icon Styles', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cozy_cart_text_typography_normal',
                'label' => __('Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-menu-cart .cozy-cart-icon',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                ],
            ]
        );

        $this->add_responsive_control(
            'cart_box_icon_width',
            [
                'label' => __('Cart Icon Box Width', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 25,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-cart-icon .icon' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'cart_box_icon_height',
            [
                'label' => __('Cart Icon Box height', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 25,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-cart-icon .icon' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'cart_box_border_radius',
            [
                'label' => __('Cart Box Border Radius', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'default' => [
                    'top' => 50,
                    'right' => 50,
                    'bottom' => 50,
                    'left' => 50,
                    'unit' => '%',
                ],
                'size_units' => ['%', 'px'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-cart-icon .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'minicart_box_border',
                'label' => __('Cart Box Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-menu-cart .cozy-cart-icon .icon',
            ]
        );

        $this->start_controls_tabs('minicart_icon_hover_effect');

        $this->start_controls_tab(
            'minicart_icon_normal',
            [
                'label' => __('Normal', 'cozy-addons'),
            ]
        );

        $this->add_control(
            'minicart_cart_box_background_normal',
            [
                'label' => __('Background Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgba(0,0,0,0)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-cart-icon .icon' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'minicart_icon_color_normal',
            [
                'label' => __('Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#7A7A7A',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cozy-addons-menu-cart a svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );



        $this->end_controls_tab();

        $this->start_controls_tab(
            'minicart_icon_hover',
            [
                'label' => __('Hover', 'cozy-addons'),
            ]
        );

        $this->add_control(
            'minicart_cart_box_background_hover',
            [
                'label' => __('Background Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgba(0,0,0,0)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-cart-icon .icon:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'minicart_icon_color_hover',
            [
                'label' => __('Hover Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cozy-addons-menu-cart a:hover svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'minicart_icon_invert_hover',
            [
                'label' => __('Icon Image Filter - Invert', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    private function cozy_addons_minicart_count_styles()
    {
        $this->start_controls_section(
            'cozy_addons_minicart_count_styles',
            [
                'label' => __('Cart Count Styles', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_cart_count' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'minicart_count_width',
            [
                'label' => __('Width', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 25,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-cart-count' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'minicart_count_height',
            [
                'label' => __('Height', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 25,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-cart-count' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'minicart_count_border_radius',
            [
                'label' => __('Border Radius', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'default' => [
                    'top' => 50,
                    'right' => 50,
                    'bottom' => 50,
                    'left' => 50,
                    'unit' => '%',
                ],
                'size_units' => ['%', 'px'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart a .cozy-cart-count' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'cart_count_margin',
            [
                'label' => __('Position', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '3',
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-cart-count' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'enable_cart_count' => 'yes',
                ],

            ]
        );

        $this->start_controls_tabs('cozy_addons_minicart_count_hover_effect');

        $this->start_controls_tab(
            'minicart_count_normal',
            [
                'label' => __('Normal', 'cozy-addons'),
            ]
        );

        $this->add_control(
            'minicart_count_background_color',
            [
                'label' => __('Background Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default' => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart a .cozy-cart-count' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'minicart_count_text_color',
            [
                'label' => __('Text Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart a .cozy-cart-count' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'minicart_text_typography',
                'label' => __('Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-menu-cart a .cozy-cart-count',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'minicart_count_border',
                'label' => __('Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-menu-cart a .cozy-cart-count',
                'default' => [
                    'border_type' => 'solid',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'minicart_count_hover',
            [
                'label' => __('Hover', 'cozy-addons'),
            ]
        );

        $this->add_control(
            'minicart_count_background_color_hover',
            [
                'label' => __('Hover Background Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart a:hover .cozy-cart-count' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'minicart_count_text_color_hover',
            [
                'label' => __('Hover Text Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart a:hover .cozy-cart-count' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'minicart_text_typography_hover',
                'label' => __('Hover Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-menu-cart a:hover .cozy-cart-count',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'minicart_count_border_hover',
                'label' => __('Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-menu-cart a:hover .cozy-cart-count',
            ]
        );

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    private function cozy_addons_minicart_sidebar_styles()
    {
        $this->start_controls_section(
            'cozy_addons_minicart_sidebar_styles',
            [
                'label' => __('Sidebar Panel Styles', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'cart_open_sidebar_panel' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'sidebar_panel_padding',
            [
                'label' => __('Padding', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'default' => [
                    'top' => '2',
                    'right' => '2',
                    'bottom' => '0',
                    'left' => '2',
                    'unit' => 'rem',
                ],
                'size_units' => ['px', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-menu-sidebar-panel .sidebar-panel-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-menu-sidebar-panel .cozy-minicart-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'cart_sidebar_panel_width',
            [
                'label' => __('Panel Width', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 500,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_control(
            'sidepanel_background_color',
            [
                'label' => __('Background Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-menu-sidebar-panel' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sidepanel_background_text_color',
            [
                'label' => __('Text Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default' => '#878787',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-menu-sidebar-panel' => 'color: {{VALUE}}',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sidebar_panel_text_typography_hover',
                'label' => __('Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-menu-cart .cozy-menu-sidebar-panel',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 14]],
                    'font_weight' => ['default' => 400],
                ],
            ]
        );

        $this->start_controls_tabs('panel_close_button_effect');

        $this->start_controls_tab(
            'panel_sidebar_close_button_normal',
            [
                'label' => __('Close Button Normal', 'cozy-addons'),
            ]
        );

        $this->add_control(
            'clsoe_button_color',
            [
                'label' => __('Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#9B9B9B',
                'selectors' => [
                    '{{WRAPPER}} .sidebar-panel-header .cozy-close-icon-wrapper i' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->start_controls_tab(
            'panel_sidebar_close_button_hover',
            [
                'label' => __('Close Button Hover', 'cozy-addons'),
            ]
        );

        $this->add_control(
            'clsoe_button_color_hover',
            [
                'label' => __('Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#767676',
                'selectors' => [
                    '{{WRAPPER}} .sidebar-panel-header .cozy-close-icon-wrapper:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    private function cozy_addons_minicart_sidebar_panel_content_styles()
    {
        $this->start_controls_section(
            'sidebar_panel_content_styles',
            [
                'label' => __('Sidebar Panel Content Styles', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'cart_open_sidebar_panel' => 'yes',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sidebar_header_text_typography_hover',
                'label' => __('Header Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-menu-cart .cozy-menu-sidebar-panel .sidebar-panel-header',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 20]],
                    'font_weight' => ['default' => 500],
                ],
            ]
        );
        $this->add_control(
            'sidepanel_background_heading_text_color',
            [
                'label' => __('Header Text Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default' => '#565656',
                'selectors' => [
                    '{{WRAPPER}}  .cozy-addons-menu-cart .cozy-menu-sidebar-panel .sidebar-panel-header' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'sidebar_empty_cart_text',
            [
                'label' => __('Empty Cart Text', 'cozy-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Your cart is empty!', 'cozy-addons'),
                'placeholder' => __('Empty Cart Text', 'cozy-addons'),
                'label_block' => 'yes'
            ]
        );

        $this->add_control(
            'sidebar_empty_cart_text_color',
            [
                'label' => __('Empty Cart Text Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#3B3B3B',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .empty-cart' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sidebar_empty_cart_text_typography',
                'label' => __('Empty Cart Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .empty-cart',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 18]],
                    'font_weight' => ['default' => 500],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'product_title_text_typography',
                'label' => __('Product Title Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .cozy-minicart-item .item-details .product-title',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 18]],
                    'font_weight' => ['default' => 600],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'product_price_text_typography',
                'label' => __('Product Price Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .cozy-minicart-item .total-price',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 18]],
                    'font_weight' => ['default' => 500],
                ],
            ]
        );

        $this->add_control(
            'sidebar_product_title_and_price_color',
            [
                'label' => __('Product Title & Price Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#565656',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .cozy-minicart-item .product-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .cozy-minicart-item .total-price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sidebar_remove_item_text_color',
            [
                'label' => __('Remove Item Text Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#3B3B3B',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .cozy-cart-remove-product' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_minicart_cta_styles()
    {
        $this->start_controls_section(
            'cozy_addons_minicart_cta_styles',
            [
                'label' => __('Sidebar Panel Footer Styles', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'cart_open_sidebar_panel' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'sidebar_panel_footer_box_padding',
            [
                'label' => __('Box Padding', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'default' => [
                    'top' => 2,
                    'right' => 2,
                    'bottom' => 2,
                    'left' => 2,
                    'unit' => 'rem',
                ],
                'size_units' => ['px', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .sidebar-panel-footer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'cta_buttons_padding',
            [
                'label' => __('CTA Button Padding', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'default' => [
                    'top' => 10,
                    'right' => 45,
                    'bottom' => 10,
                    'left' => 45,
                    'unit' => 'px',
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .cta-links div' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_control(
            'cta_buttons_vertical_gap',
            [
                'label' => __('Vertical Button Gap', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 30,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .cta-links' => 'margin-top: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'cta_background_color',
            [
                'label' => __('Background Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgb(245, 245, 245)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .sidebar-panel-footer' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtotal_text_typography',
                'label' => __('Subtotal Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .subtotal',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 18]],
                    'font_weight' => ['default' => 600],
                ],
            ]
        );

        $this->add_control(
            'cta_subtotal_text_color',
            [
                'label' => __('Subtotal Text Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#232323',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .sidebar-panel-footer .subtotal' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->start_controls_tabs('cta_buttons_hover_effect');

        $this->start_controls_tab(
            'cta_buttons_normal',
            [
                'label' => __('Normal', 'cozy-addons'),
            ]
        );

        $this->add_control(
            'cta_buttons_background_color',
            [
                'label' => __('Buttons Background Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#9B9B9B',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .cta-links div' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cta_buttons_text_color',
            [
                'label' => __('Buttons Text Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .cta-links div' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cta_buttons_text_typography',
                'label' => __('Buttons Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .cta-links div',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 500],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cta_button_border',
                'label' => __('Button Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .cta-links div',
                'default' => [
                    'border_type' => 'default',
                ]
            ]
        );

        $this->add_responsive_control(
            'cta_buttons_border_radius',
            [
                'label' => __('Button Border Radius', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'default' => [
                    'top' => 6,
                    'right' => 6,
                    'bottom' => 6,
                    'left' => 6,
                    'unit' => 'px',
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .cta-links div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'cta_buttons_hover',
            [
                'label' => __('Hover', 'cozy-addons'),
            ]
        );

        $this->add_control(
            'cta_buttons_background_color_hover',
            [
                'label' => __('Buttons Background Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#343434',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .cta-links div:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cta_buttons_text_color_hover',
            [
                'label' => __('Hover Buttons Text Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .cta-links div:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cta_buttons_text_typography_hover',
                'label' => __('Hover Buttons Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .cta-links div:hover',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 500],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cta_button_border_hover',
                'label' => __('Button Border Hover', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .cta-links div:hover',
                'default' => [
                    'border_type' => 'default',
                ]
            ]
        );

        $this->add_responsive_control(
            'cta_buttons_border_radius_hover',
            [
                'label' => __('Hover Button Border Radius', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'default' => [
                    'top' => 6,
                    'right' => 6,
                    'bottom' => 6,
                    'left' => 6,
                    'unit' => 'px',
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-cart .cozy-sidebar-panel-wrapper .cta-links div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    /**
     * Image Option
     */
    private function cozy_addons_minicart_image_options()
    {
        $this->start_controls_section(
            'minicart_product_image_style',
            [
                'label' => __('Image Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'minicart_product_image_width',
            [
                'label' => __('Image Width', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 500,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '100',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-minicart-wrapper .cozy-minicart-item .item-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );
        $this->add_control(
            'minicart_product_image_height',
            [
                'label' => __('Image Height', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 500,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '100',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-minicart-wrapper .cozy-minicart-item .item-image img' => 'height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        // Normal border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'minicart_product_image_border',
                'label' => __('Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-minicart-wrapper .cozy-minicart-item .item-image img',
            ]
        );
        $this->add_control(
            'minicart_product_image_border_radius',
            [
                'label' => __('Border Radius', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-minicart-wrapper .cozy-minicart-item .item-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render($instance = [])
    {
        if (is_plugin_active('woocommerce/woocommerce.php')) {

            $settings = $this->get_settings();

            $cartUrl = '';

            if ('yes' != $settings['cart_open_sidebar_panel']) {
                $cartUrl = 'href="' . wc_get_cart_url() . '"';
            }

?>
            <section class="cozy-addons-menu-cart">
                <?php
                include COZY_ADDONS_PLUGIN_DIR . 'public/widgets/mini-cart/mini-cart.php';

                ?>
            </section>
<?php } else {
            echo __('Please Install & Activate the Woocommerce Plugin', 'cozy-addons');
        }
    }
}
