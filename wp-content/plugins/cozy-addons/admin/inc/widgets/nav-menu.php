<?php

namespace Cozy_Addons\NavMenuWidgets;

use Custom_Walker_Nav_Menu;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Core\Schemes\Color;


if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Cozy_Addons_Nav_Menu_Widget extends Widget_Base
{
    public function get_name()
    {
        return 'cozy-addons-nav-menu';
    }

    public function get_title()
    {
        return __('Navigation Menu', 'cozy-addons');
    }

    public function get_icon()
    {
        return 'eicon-nav-menu cozy-widget-icons';
    }

    public function get_keywords()
    {
        return [
            'cozy addons',
            'navigation',
            'menu',
            'navbar'
        ];
    }

    public function get_categories()
    {
        return ['cozy-addons-items'];
    }

    protected function register_controls()
    {
        $this->cozy_addons_nav_menu_query();
        $this->cozy_addons_nav_menu_options();
        $this->cozy_addons_nav_mobile_menu();

        $this->cozy_addons_nav_menu_styles();
        $this->cozy_addons_sub_menu_styles();
        $this->cozy_addons_nav_sub_menu_icon();
        $this->cozy_addons_nav_responsive_style();
        $this->cozy_addons_nav_responsive_toggle_style();
    }

    private function get_available_menus()
    {
        $menus = wp_get_nav_menus();

        $options = [];

        foreach ($menus as $menu) {
            $options[$menu->slug] = $menu->name;
        }
        return $options;
    }

    private function cozy_addons_nav_menu_query()
    {
        $this->start_controls_section(
            'cozy_addons_nav_menu_query',
            [
                'label' => __('General', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $menus = $this->get_available_menus();
        if (!empty($menus)) {
            $this->add_control(
                'nav_menus_option',
                [
                    'label' => __('Select Menu', 'cozy-addons'),
                    'type' => Controls_Manager::SELECT,
                    'options' => $menus,
                    'default' => array_keys($menus)[0],
                    'description' => sprintf(__('Go to <a href="%s" target="_blank">Appearance > Menus</a> to manage your menus.', 'cozy-addons'), admin_url('nav-menus.php')),
                ]
            );
        } else {
            $this->add_control(
                'nav_menus_not_available',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => sprintf(__('<strong>Menus not found!</strong><br><a href="%s" target="_blank">Click Here</a> to create a new Menu.', 'cozy-addons'), admin_url('nav-menus.php?action=edit&menu=0')),
                    'separator' => 'after',
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
                ]
            );
        }

        $this->add_responsive_control(
            'nav_menus_alignment',
            [
                'label' => __('Alignment', 'cozy-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => __('Left', 'cozy-addons'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'cozy-addons'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'end' => [
                        'title' => __('Right', 'cozy-addons'),
                        'icon' => 'eicon-h-align-right',
                    ]
                ],
                'default' => 'start',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-nav-menu ul' => 'justify-content: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_nav_menu_options()
    {
        $this->start_controls_section(
            'cozy_addons_nav_menu_options',
            [
                'label' => __('Menu Items', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_responsive_control(
            'nav_menu_gap',
            [
                'label' => __('Menu Gap', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 150,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu ul' => 'gap: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'show_sub_menu_display_event',
            [
                'label' => __('Submenu Display Event', 'cozy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'event-hover' => __('Hover', 'cozy-addons'),
                    'event-click' => __('Click', 'cozy-addons'),
                ],
                'default' => 'event-hover',
            ]
        );

        $this->add_control(
            'nav_sub_menu_icon_options',
            [
                'label' => __('Sub Menu Icon', 'cozy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'angle' => __('Angle', 'cozy-addons'),
                    'chevron' => __('Chevron', 'cozy-addons'),
                    'triangle' => __('Triangle', 'cozy-addons'),
                    'plus' => __('Plus', 'cozy-addons'),
                ],
                'default' => 'chevron',
            ]
        );
        $this->add_control(
            'nav_submenu_display_options',
            [
                'label' => __('Submenu Display Option', 'cozy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'submenu-default' => __('Default', 'cozy-addons'),
                    'submenu-animated' => __('Animated', 'cozy-addons'),
                ],
                'default' => 'submenu-default',
                'label_block' => true,
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_nav_mobile_menu()
    {
        $this->start_controls_section(
            'cozy_addons_nav_mobile_menu',
            [
                'label' => __('Responsive Menu', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'responsive_menu_responsive_size_option',
            [
                'label' => __('Responsive Size', 'cozy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'responsive-tablet' => __('Tablet ( < 1025px )', 'cozy-addons'),
                    'responsive-mobile' => __('Mobile ( < 768px )', 'cozy-addons'),
                    'responsive-always' => __('All Devices', 'cozy-addons'), //Hamburger Icon for every size
                    'responsive-none' => __('None', 'cozy-addons'),
                    'responsive-custom' => __('Custom Width', 'cozy-addons'),
                ],
                'default' => 'responsive-tablet',
            ]
        );

        $this->add_control(
            'mobile_menu_max_width',
            [
                'label' => __('Max Width (px)', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 400,
                        'max' => 1125,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 1125,
                ],
                'condition' => [
                    'responsive_menu_responsive_size_option' => 'responsive-custom',
                ]
            ]
        );

        $this->add_control(
            'responsive_menu_layout_option',
            [
                'label' => __('Display Layout', 'cozy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'responsive-layout-full' => __('Full Screen', 'cozy-addons'),
                    'responsive-sidebar-panel' => __('Sidebar Panel', 'cozy-addons'),
                    'responsive-layout-classic' => __('Classic', 'cozy-addons'),
                ],
                'default' => 'responsive-layout-classic',
            ]
        );
        $this->add_control(
            'responsive_menu_sidebar_position',
            [
                'label' => __('Panel Location', 'cozy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'sidebar-panel-left' => __('Left', 'cozy-addons'),
                    'sidebar-panel-right' => __('Right', 'cozy-addons'),
                ],
                'default' => 'sidebar-panel-left',
                'condition' => [
                    'responsive_menu_layout_option' => 'responsive-sidebar-panel',
                ],
            ]
        );
        $this->add_control(
            'mobile_menu_container_size',
            [
                'label' => __('Container Width (px)', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 200,
                        'max' => 1125,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 360,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-responsive-navigation.responsive-sidebar-panel .cozy-navigation-container' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'responsive_menu_layout_option' => 'responsive-sidebar-panel',
                ]
            ]
        );

        $this->add_control(
            'mobile_menu_horizontal_alignment',
            [
                'label' => __('Toggle Icon Alignment', 'cozy-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => __('Left', 'cozy-addons'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'cozy-addons'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'end' => [
                        'title' => __('Right', 'cozy-addons'),
                        'icon' => 'eicon-h-align-right',
                    ]
                ],
                'default' => 'start',
                'selectors' => [
                    '{{WRAPPER}} .cozy-responsive-navigation.responsive-sidebar-panel .toggle-button' => 'justify-content: {{VALUE}}',
                    '{{WRAPPER}} .cozy-responsive-navigation.responsive-layout-full .toggle-button' => 'justify-content: {{VALUE}}'
                ],

                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'responsive_menu_layout_option',
                            'operator' => 'in',
                            'value' => [
                                'responsive-sidebar-panel',
                                'responsive-layout-full',
                            ],
                        ],
                    ],
                ],

            ]
        );

        $this->add_control(
            'mobile_menu_classic_horizontal_alignment',
            [
                'label' => __('Toggle Icon Alignment', 'cozy-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => __('Left', 'cozy-addons'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'cozy-addons'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'end' => [
                        'title' => __('Right', 'cozy-addons'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'space-between' => [
                        'title' => __('Justify', 'cozy-addons'),
                        'icon' => 'eicon-text-align-justify',
                    ]
                ],
                'default' => 'space-between',
                'selectors' => [
                    '{{WRAPPER}} .cozy-responsive-navigation.responsive-layout-classic .toggle-button' => 'justify-content: {{VALUE}}',
                ],

                'condition' => [
                    'responsive_menu_layout_option' => 'responsive-layout-classic',
                ],

            ]
        );

        $this->add_control(
            'enable_mobile_menu_icon',
            [
                'label' => __('Enable Toggle Icon', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'responsive_menu_toggle_icon',
            [
                'label' => __('Toggle Icon', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-bars',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'enable_mobile_menu_icon' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'responsive_menu_close_icon',
            [
                'label' => __('Close Icon', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-times',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->add_responsive_control(
            'close_icon_vertical_position',
            [
                'label' => __('Vertical Position', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-responsive-navigation .close-button.active' => 'top: {{SIZE}}{{UNIT}};',
                ]
            ]
        );
        $this->add_responsive_control(
            'close_icon_horizontal_position',
            [
                'label' => __('Horizontal Position', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 320,
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-responsive-navigation .close-button.active' => 'left: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'enable_mobile_menu_text',
            [
                'label' => __('Enable Responsive Menu Text', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'mobile_menu_text',
            [
                'label' => __('Menu Text', 'cozy-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Menu', 'cozy-addons'),
                'placeholder' => __('Menu Text', 'cozy-addons'),
                'label_block' => true,
                'condition' => [
                    'enable_mobile_menu_text' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_nav_menu_styles()
    {
        $this->start_controls_section(
            'cozy_nav_menu_styles',
            [
                'label' => __('Menu Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'cozy_menu_padding',
            [
                'label'      => __('Item Padding', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default'     => [
                    'top' => '10',
                    'right' => '0',
                    'bottom' => '10',
                    'left' => '0',
                    'isLinked' => false,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons-nav-menu ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],

            ]
        );
        // Normal border shadow
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'menu_box_shadow',
                'label' => __('Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-nav-menu ul > li > a',
            ]
        );
        // Normal border radius
        $this->add_control(
            'cozy_menu_radius',
            [
                'label' => __('Border Radius', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-nav-menu ul > li > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs('nav_menu');

        $this->start_controls_tab(
            'nav_menu_normal',
            [
                'label' => __('Normal', 'cozy_addons'),
            ]
        );

        $this->add_control(
            'menu_background_color',
            [
                'label'     => __('Background', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => 'rgba(0,0,0,0)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-nav-menu ul > li > a' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'menu_text_color',
            [
                'label'     => __('Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#464646',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-nav-menu ul > li > a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cozy-addons-nav-menu ul > li > a svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'menu_text_typography',
                'label' => __('Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-nav-menu ul li',
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
                'name' => 'menu_border',
                'label' => __('Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-nav-menu ul > li > a',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'nav_menu_hover',
            [
                'label' => __('Hover', 'cozy-addons'),
            ]
        );

        $this->add_control(
            'menu_background_color_hover',
            [
                'label'     => __('Background', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => 'rgba(0,0,0,0)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-nav-menu ul > li > a:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'menu_text_color_hover',
            [
                'label'     => __('Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#5552EB',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-nav-menu ul > li > a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cozy-addons-nav-menu ul > li > a:hover svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'menu_text_typography_hover',
                'label' => __('Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-nav-menu ul li:hover',
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
                'name' => 'menu_border_hover',
                'label' => __('Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-nav-menu ul > li > a:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }

    private function cozy_addons_sub_menu_styles()
    {
        $this->start_controls_section(
            'nav_sub_menu_styles',
            [
                'label' => __('Sub Menu Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'cozy_submenu_padding',
            [
                'label'      => __('Box Padding', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default'     => [
                    'top' => '10',
                    'right' => '0',
                    'bottom' => '10',
                    'left' => '0',
                    'isLinked' => false,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons-nav-menu ul ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],

            ]
        );


        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'submenu_border',
                'label' => __('Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-nav-menu ul ul',
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
                        'default' => '#ededed',
                    ],
                ],
            ]
        );
        // Normal border shadow
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'submenu_box_shadow',
                'label' => __('Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-nav-menu ul ul',
                'fields_options' =>
                [
                    'box_shadow_type' =>
                    [
                        'default' => 'yes'
                    ],
                    'box_shadow' => [
                        'default' =>
                        [
                            'horizontal' => 0,
                            'vertical' => 0,
                            'blur' => 30,
                            'spread' => 0,
                            'color' => 'rgba(0,0,0,0.092)'
                        ]
                    ]
                ]
            ]
        );
        // Normal border radius
        $this->add_control(
            'submenu_border_radius',
            [
                'label' => __('Border Radius', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-nav-menu ul ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '6',
                    'right' => '6',
                    'bottom' => '6',
                    'left' => '6',
                    'isLinked' => true,
                ],
            ]
        );
        $this->add_responsive_control(
            'cozy_submenu_list_padding',
            [
                'label'      => __('List Padding', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default'     => [
                    'top' => '10',
                    'right' => '20',
                    'bottom' => '10',
                    'left' => '20',
                    'isLinked' => false,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons-nav-menu ul ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],

            ]
        );
        $this->add_control(
            'list_item_border_radius',
            [
                'label' => __('List Border Radius', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-nav-menu ul ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'isLinked' => true,
                ],
            ]
        );
        $this->start_controls_tabs('nav_sub_menu');

        $this->start_controls_tab(
            'nav_sub_menu_normal',
            [
                'label' => __('Normal', 'cozy-addons'),
            ]
        );

        $this->add_control(
            'sub_menu_background_color',
            [
                'label'     => __('Background Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-nav-menu ul ul' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sub_menu_text_color',
            [
                'label'     => __('Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#464646',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-nav-menu ul ul li a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cozy-addons-nav-menu ul > li > a svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_menu_text_typography',
                'label' => __('Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-nav-menu ul ul li a',
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
                'name' => 'submenu_item_border',
                'label' => __('Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-nav-menu ul ul li a',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'nav_sub_menu_hover',
            [
                'label' => __('Hover', 'cozy-addons'),
            ]
        );

        $this->add_control(
            'sub_menu_background_color_hover',
            [
                'label'     => __('Background Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-nav-menu ul ul li a:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sub_menu_text_color_hover',
            [
                'label'     => __('Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#5552EB',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-nav-menu ul ul li a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cozy-addons-nav-menu ul > li > a:hover svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_menu_text_typography_hover',
                'label' => __('Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-nav-menu ul ul li a:hover',
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
                'name' => 'submenu_item_border_hover',
                'label' => __('Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-nav-menu ul ul li a:hover',
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    private function cozy_addons_nav_sub_menu_icon()
    {
        $this->start_controls_section(
            'nav_sub_menu_icon',
            [
                'label' => __('Dropdown Icon Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'nav_sub_menu_icon_padding',
            [
                'label' => __('Padding', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '3',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'isLinked' => false,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu ul li a .dropdown-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'nav_sub_menu_icon_wrapper_width',
            [
                'label' => __('Icon size', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 35,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu ul li a svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'nav_sub_menu_icon_spacing',
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
                    'unit' => 'px',
                    'size' => 5,
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu ul li a .dropdown-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->start_controls_tabs('nav_submenu_dropdown_icon');
        $this->start_controls_tab(
            'submenu_dropdown_icon',
            [
                'label' => __('Normal', 'cozy-addons'),
            ]
        );

        $this->add_responsive_control(
            'dropdown_icon_background_color',
            [
                'label'     => __('Background Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => 'rgba(0,0,0,0)',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu ul li a .dropdown-icon' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dropdown_icon_color',
            [
                'label'     => __('Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#464646',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu ul li a .dropdown-icon svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'dropdown_icon_border',
                'label' => __('Item Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-nav-menu ul li a .dropdown-icon',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'submenu_dropdown_icon_hover',
            [
                'label' => __('Hover', 'cozy-addons'),
            ]
        );

        $this->add_responsive_control(
            'dropdown_icon_background_color_hover',
            [
                'label'     => __('Background Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => 'rgba(0,0,0,0)',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu ul li a:hover .dropdown-icon' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dropdown_icon_color_hover',
            [
                'label'     => __('Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#464646',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu ul li a:hover .dropdown-icon svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'dropdown_icon_border_hover',
                'label' => __('Item Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-nav-menu ul li a:hover .dropdown-icon',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();






        $this->start_controls_tabs('nav_submenu_sub_dropdown_icon');
        $this->start_controls_tab(
            'submenu_sub_dropdown_icon',
            [
                'label' => __('Submenu Normal', 'cozy-addons'),
            ]
        );

        $this->add_responsive_control(
            'sub_dropdown_icon_background_color',
            [
                'label'     => __('Background Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => 'rgba(0,0,0,0)',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu ul ul li a .dropdown-icon' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sub_dropdown_icon_color',
            [
                'label'     => __('Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#464646',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu ul ul li a .dropdown-icon svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sub_dropdown_icon_border',
                'label' => __('Item Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-nav-menu ul ul li a .dropdown-icon',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'submenu_sub_dropdown_icon_hover',
            [
                'label' => __('Submenu Hover', 'cozy-addons'),
            ]
        );

        $this->add_responsive_control(
            'sub_dropdown_icon_background_color_hover',
            [
                'label'     => __('Background Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => 'rgba(0,0,0,0)',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu ul ul li a:hover .dropdown-icon' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sub_dropdown_icon_color_hover',
            [
                'label'     => __('Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#464646',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu ul ul li a:hover .dropdown-icon svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sub_dropdown_icon_border_hover',
                'label' => __('Item Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-nav-menu ul ul li a:hover .dropdown-icon',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();









        $this->end_controls_section();
    }
    private function cozy_addons_nav_responsive_style()
    {
        $this->start_controls_section(
            'navmenu_responsive_stye',
            [
                'label' => __('Responsive Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'responsive_content_align',
            [
                'label' => __('Content Alignment', 'cozy-addons'),
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
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation ul li a' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'nav_responsive_container_background',
            [
                'label' => __('Nav Container Background', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => 'rgba(0,0,0,0)',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'responsive_box_border',
                'label' => __('Nav Container Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation',
            ]
        );


        $this->add_responsive_control(
            'responsive_navholder_padding',
            [
                'label' => __('Nav Container Padding', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'isLinked' => false,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'nav_responsive_menunav_background',
            [
                'label' => __('Nav Menu Background', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ededed',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .cozy-navigation-container' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'responsive_navmenu_border',
                'label' => __('Nav Menu Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .cozy-navigation-container',
            ]
        );

        $this->add_responsive_control(
            'responsive_navmenu_padding',
            [
                'label' => __('Menu Container Padding', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '20',
                    'right' => '20',
                    'bottom' => '20',
                    'left' => '20',
                    'isLinked' => false,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .cozy-navigation-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'responsive_submenu_padding',
            [
                'label' => __('Submenu Container Padding', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'isLinked' => false,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .cozy-navigation-container ul ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );
        $this->add_control(
            'responsive_menu_item_border_radius',
            [
                'label' => __('Item Border Radius', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .cozy-navigation-container li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .cozy-navigation-container ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );



        $this->start_controls_tabs('nav_responsive_menu_item');
        $this->start_controls_tab(
            'responsive_navmenu_item_normal',
            [
                'label' => __('Menu Normal', 'cozy-addons'),
            ]
        );

        $this->add_control(
            'responsive_background_color',
            [
                'label'     => __('Background Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ededed',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .cozy-navigation-container li a' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'responsive_background_text_color',
            [
                'label'     => __('Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#464646',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .cozy-navigation-container li a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'responsive_menu_item_border',
                'label' => __('Item Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .cozy-navigation-container a',
            ]
        );

        $this->add_responsive_control(
            'responsive_menu_item_padding',
            [
                'label' => __('List Padding', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '5',
                    'right' => '0',
                    'bottom' => '5',
                    'left' => '0',
                    'isLinked' => false,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .cozy-navigation-container li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );



        $this->end_controls_tab();

        $this->start_controls_tab(
            'responsive_navmenu_item_hover',
            [
                'label' => __('Menu Hover', 'cozy-addons'),
            ]
        );

        $this->add_control(
            'responsive_background_color_hover',
            [
                'label'     => __('Background Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ededed',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .cozy-navigation-container li a:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'responsive_background_text_color_hover',
            [
                'label'     => __('Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#464646',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .cozy-navigation-container li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'responsive_menu_item_border_hover',
                'label' => __('Item Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .cozy-navigation-container li a:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    private function cozy_addons_nav_responsive_toggle_style()
    {
        $this->start_controls_section(
            'navmenu_responsive_toggle_stye',
            [
                'label' => __('Responsive Toggle Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'toggle_menu_text_typography',
                'label' => __('Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .toggle-button',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                ],
            ]
        );

        $this->add_responsive_control(
            'responsive_menu_icon_size',
            [
                'label' => __('Toggle Icon size', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .toggle-button .icon-toggle' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .close-button' => 'font-size: {{SIZE}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'responsive_menu_toggle_box_width',
            [
                'label' => __('Toggle Box width', 'cozy-addons'),
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
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .toggle-button .icon-toggle' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .close-button' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'responsive_menu_toggle_box_height',
            [
                'label' => __('Toggle Box height', 'cozy-addons'),
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
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .toggle-button .icon-toggle' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .close-button' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('nav_responsive_menu_toggle');
        $this->start_controls_tab(
            'responsive_navmenu_toggle_normal',
            [
                'label' => __('Toggle Normal', 'cozy-addons'),
            ]
        );

        $this->add_control(
            'responsive_toggle_background_color',
            [
                'label'     => __('Box Background Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .toggle-button .icon-toggle' => 'background: {{VALUE}};',
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .close-button' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'responsive_background_toggle_color',
            [
                'label'     => __('Icon Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#464646',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .toggle-button .icon-toggle' => 'color: {{VALUE}};',
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .close-button' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'responsive_background_toggle_border',
                'label' => __('Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .toggle-button .icon-toggle, {{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .close-button',
                'description' => __('Toggle Button Border', 'cozy-addons'),
            ]
        );
        $this->add_control(
            'responsive_toggle_border_radius',
            [
                'label' => __('Border Radius', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .toggle-button .icon-toggle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .close-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'responsive_navmenu_toggle_hover',
            [
                'label' => __('Toggle Hover', 'cozy-addons'),
            ]
        );

        $this->add_control(
            'responsive_toggle_background_color_hover',
            [
                'label'     => __('Box Background color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .toggle-button .icon-toggle:hover' => 'background: {{VALUE}};',
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .close-button:hover' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'responsive_background_toggle_color_hover',
            [
                'label'     => __('Icon Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#464646',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .toggle-button .icon-toggle:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .close-button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'responsive_background_toggle_border_hover',
                'label' => __('Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-nav-menu .cozy-responsive-navigation .toggle-button .icon-toggle:hover',
                'description' => __('Toggle Button Border', 'cozy-addons'),
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }

    protected function render($instance = [])
    {
        $settings = $this->get_settings();

        $customWidth = '';
        $selected_responsive_size = '';
        $selected_cr_class = '';
        $nav_responsive_size = $settings['responsive_menu_responsive_size_option'];
        if ($nav_responsive_size == 'responsive-custom') {
            $selected_cr_class = 'responsive-custom-size';
            $selected_responsive_size =  $settings['mobile_menu_max_width']['size'];
        } elseif ($nav_responsive_size == 'responsive-always') {
            $selected_responsive_size = 'ct-responsive-always';
        } elseif ($nav_responsive_size == 'responsive-none') {
            $selected_responsive_size = 'ct-responsive-none';
        } elseif ($nav_responsive_size == 'responsive-mobile') {
            $selected_responsive_size = 'ct-responsive-mobile';
        } else {
            $selected_responsive_size = 'ct-responsive-tablet';
        }
        $selected_dropdown_icon = $settings['nav_sub_menu_icon_options'];
        $selected_responsive_screen = $settings['responsive_menu_layout_option'];
        $toggle_menu_id = $this->get_id();

        $sidebar_panel_location = '';
        if ($settings['responsive_menu_layout_option'] === 'responsive-sidebar-panel') {
            $sidebar_panel_location = $settings['responsive_menu_sidebar_position'];
        }
        $chk_menus = $this->get_available_menus();
        if (!empty($chk_menus)) {
?>
            <section class="cozy-addons-nav-menu <?php echo  $settings['show_sub_menu_display_event'] . ' ' . esc_attr($selected_responsive_size) . ' ' . esc_attr($selected_cr_class); ?>" data-dropDownIcon="<?php echo esc_attr($selected_dropdown_icon) ?>" data-ctResponsiveSize="<?php echo esc_attr($selected_responsive_size) ?>">
                <nav class="cozy-responsive-navigation <?php echo 'ct-responsive-nav-' . esc_attr($toggle_menu_id) . ' ' . esc_attr($selected_responsive_screen) . ' ' . esc_attr($sidebar_panel_location) ?>" data-ctResponsiveSize="<?php echo esc_attr($selected_responsive_size) ?>">
                    <button class="close-button">
                        <?php
                        if ($settings['responsive_menu_close_icon']) {
                            \Elementor\Icons_Manager::render_icon($settings['responsive_menu_close_icon'], ['aria-hidden' => 'true']);
                        }
                        ?>
                    </button>
                    <?php

                    ?>
                    <button class="toggle-button mobile-toggle-<?php echo esc_attr($toggle_menu_id) ?>" data-mobileToggleID="<?php echo esc_attr($toggle_menu_id) ?>">
                        <?php
                        if ($settings['enable_mobile_menu_text'] == 'yes') {
                            echo "<span>" . esc_html($settings['mobile_menu_text']) . "</span>";
                        }
                        if ($settings['enable_mobile_menu_icon']) {
                            echo '<span class="icon-toggle">';
                            \Elementor\Icons_Manager::render_icon($settings['responsive_menu_toggle_icon'], ['aria-hidden' => 'true']);
                            echo '</span>';
                        }
                        ?>
                    </button>
                    <?php
                    $ct_responsive_container = 'cozy-navigation-container cozy-navigation-container-' . $toggle_menu_id;
                    wp_nav_menu(array(
                        'menu' => $settings['nav_menus_option'],
                        'menu_class' => 'cozy-navigation',
                        'depth' => 3,
                        'container_class' => $ct_responsive_container,
                    ));
                    ?>
                </nav>
                <nav class="cozy-main-navigation <?php echo esc_attr($settings['nav_submenu_display_options']) ?>">
                    <?php
                    wp_nav_menu(array(
                        'menu' => $settings['nav_menus_option'],
                        'menu_class' => 'cozy-navigation',
                        'depth' => 3,
                        'container_class' => 'cozy-navigation-container'
                    ));
                    ?>
                </nav>

            </section>
<?php
        }
    }
}
