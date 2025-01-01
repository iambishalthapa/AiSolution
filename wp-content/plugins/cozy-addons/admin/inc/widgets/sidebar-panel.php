<?php

namespace Cozy_Addons\SidebarPanelWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Core\Schemes\Typography;
use Elementor\Core\Schemes\Color;
use Elementor\Group_Control_Image_Size;
use WP_Query;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class Cozy_Addons_SidebarPanel_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'cozy-addons-sidebar-panel';
    }

    public function get_title()
    {
        return __('Sidebar Panel', 'cozy-addons');
    }

    public function get_icon()
    {
        return 'eicon-post cozy-sidebarpanel-icon cozy-widget-icons';
    }
    public function get_keywords()
    {
        return ['Sidebar Panel Hamburger', 'cozy addons'];
    }
    public function get_categories()
    {
        return ['cozy-addons-items'];
    }

    protected function register_controls()
    {

        $this->cozy_addons_sidebar_panel_options();
        $this->cozy_addons_sidebar_panel_contents();
        
        $this->cozy_addons_sidebar_panel_styles();
        $this->cozy_addons_icon_styles();
    }

    /**
     * front content
     */
    private function cozy_addons_sidebar_panel_options()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('General', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'select_display_type',
            [
                'label' => __( 'Display Type', 'cozy-addons' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'display-icon' => __( 'Icon', 'cozy-addons' ),
                    'display-image' => __( 'Image', 'cozy-addons' ),
                ],
                'default' => 'display-icon',
            ]
        );

        $this->add_control(
            'display_type_icon',
            [
                'label' => __( 'Select Icon', 'cozy-addons' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-grip-lines',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'select_display_type' => 'display-icon',
                ],
            ]
        );

        $this->add_control(
            'display_type_image',
            [
                'label' => __( 'Select Image', 'cozy-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'select_display_type' => 'display-image',
                ],
            ]
        );

        $this->add_responsive_control(
            'display_image_height',
            [
                'label' => __( 'Image Height', 'cozy-addons' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 25,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .display-icon img' => 'height: {{SIZE}}{{UNIT}} !important',
                ],
                'condition' => [
                    'select_display_type' => 'display-image',
                ],
            ]
        );

        $this->add_control(
            'display_icon_position',
            [
                'label' => __( 'Icon/Image Position', 'cozy-addons' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'relative' => __( 'Default', 'cozy-addons' ),
                    'absolute' => __( 'Absolute', 'cozy-addons' ),
                    'fixed' => __( 'Fixed', 'cozy-addons' ),
                ],
                'default' => 'relative',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .display-icon' => 'position: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'display_icon_position_top',
            [
                'label' => __( 'Top', 'cozy-addons' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'size' => 0,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .display-icon' => 'top: {{SIZE}}{{UNIT}}',
                ],
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'display_icon_position',
                            'operator' => 'in',
                            'value' => [
                                'absolute',
                                'fixed',
                            ],  
                        ]
                    ]
                ], 
            ]
        );

        $this->add_responsive_control(
            'display_icon_position_left',
            [
                'label' => __( 'Left', 'cozy-addons' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'size' => 0,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .display-icon' => 'left: {{SIZE}}{{UNIT}}',
                ],
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'display_icon_position',
                            'operator' => 'in',
                            'value' => [
                                'absolute',
                                'fixed',
                            ],  
                        ]
                    ]
                ], 
            ]
        );

        $this->add_control(
            'enable_sidebar_text',
            [
                'label' => __('Enable Text', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'sidebar_text',
            [
                'label' => __( 'Text', 'cozy-addons' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Sidebar Panel', 'cozy-addons' ),
                'placeholder' => __( 'Panel Text', 'cozy-addons' ),
                'condition' => [
                    'enable_sidebar_text' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'text_placement',
            [
                'label' => __( 'Placement', 'cozy-addons' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'before-icon' => __( 'Before Icon/Image', 'cozy-addons' ),
                    'after-icon' => __( 'After Icon/Image', 'cozy-addons' ),
                ],
                'default' => 'before-icon',
                'condition' => [
                    'enable_sidebar_text' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'text_gap',
            [
                'label' => __( 'Gap', 'cozy-addons' ),
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
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .cozy-sidebar-text-before' => 'margin-right: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .cozy-sidebar-text-after' => 'margin-left: {{SIZE}}{{UNIT}}',
                ],'condition' => [
                    'enable_sidebar_text' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'sidebar_panel_close_icon',
            [
                'label' => __( 'Close Icon', 'cozy-addons' ),
                'type' => Controls_Manager::ICONS,
                'default' =>  [
                    'value' => 'fas fa-window-close',
                    'library' => 'fa-solid',
                ],
                
            ]
        );

        $this->add_responsive_control(
            'close_icon_height',
            [
                'label' => __( 'Close Icon Height', 'cozy-addons' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 25,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .cozy-close-icon-wrapper i' => 'font-size: {{SIZE}}{{UNIT}} !important',
                ],
            ]
        );

        $this->add_responsive_control(
            'close_icon_horizontal_alignment',
            [
                'label' => __( 'Icon Horizontal Alignment', 'cozy-addons' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    '0' => [
                        'title' => __( 'Left', 'cozy-addons' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    '0 auto' => [
                        'title' => __( 'Center', 'cozy-addons' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    '0 0 0 auto' => [
                        'title' => __( 'Right', 'cozy-addons' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .cozy-menu-sidebar-panel .cozy-close-icon-wrapper' => 'margin: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_sidebar_panel_contents()
    {
        $this->start_controls_section(
            'sidebar_panel_contents',
            [
                'label' => __( 'Sidebar Panel Contents', 'cozy-addons' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sidebar_display_location',
            [
                'label' => __( 'Display Location', 'cozy-addons' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'display-left' => __( 'Left', 'cozy-addons' ),
                    'display-right' => __( 'Right', 'cozy-addons' ),
                ],
                'default' => 'display-right',
            ]
        );

        $this->add_control(
            'select_content_type',
            [
                'label' => __( 'Select Content Type', 'cozy-addons' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'content-editor' => __( 'Text Editor', 'cozy-addons' ),
                    'content-template' => __( 'Custom Template', 'cozy-addons' ),
                ],
                'default' => 'content-editor',
            ]
        );

        $this->add_control(
            'editor_font_size',
            [
                'label' => __( 'Font Size', 'cozy-addons' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 25,
                ],
                'condition' => [
                    'select_content_type' => 'content-editor',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .cozy-sidebar-panel-content' => 'font-size: {{SIZE}}{{UNIT}} !important',
                ],
            ]
        );

        $this->add_control(
            'editor_text_alignment',
            [
                'label' => __( 'Text Align', 'cozy-addons' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'cozy-addons' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'cozy-addons' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'cozy-addons' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => __( 'Justify', 'cozy-addons' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'center',
                'condition' => [
                    'select_content_type' => 'content-editor',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .cozy-sidebar-panel-content' => 'text-align: {{VALUE}}',
                ],
                
            ]
        );

        $this->add_responsive_control(
            'image_horizontal_alignment',
            [
                'label' => __( 'Image Horizontal Alignment', 'cozy-addons' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    '0' => [
                        'title' => __( 'Left', 'cozy-addons' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    '0 auto' => [
                        'title' => __( 'Center', 'cozy-addons' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    '0 0 0 auto' => [
                        'title' => __( 'Right', 'cozy-addons' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'condition' => [
                    'select_content_type' => 'content-editor',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .cozy-sidebar-panel-content img' => 'margin: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'content_type_editor',
            [
                'label' => __( 'Text Editor', 'cozy-addons' ),
                'type' => Controls_Manager::WYSIWYG,
                'condition' => [
                    'select_content_type' => 'content-editor',
                ],
                'default' => __( 'Place your content here!', 'cozy-addons' ),
                'placeholder' => __( 'Your Text Content', 'cozy-addons' ),
            ]
        );

        $args = array(
            'post_type'      => 'elementor_library',
            'tabs_group' => 'library',
          );
          
        $elementor_templates = get_posts($args);
        $options = [];
        foreach ($elementor_templates as $elementor_template) {
            $options[$elementor_template->ID] = $elementor_template->post_title;
        }

        $this->add_control(
            'content_type_template',
            [
                'label' => __( 'Select Template', 'cozy-addons' ),
                'type' => Controls_Manager::SELECT,
                'options' => $options,
                'condition' => [
                    'select_content_type' => 'content-template',
                ],
            ]
        );

        $this->add_control(
            'display_template_title',
            [
                'label' => __( 'Display Title', 'cozy-addons' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'condition' => [
                    'select_content_type' => 'content-template',
                ],
            ]
        );

        $this->add_control(
            'template_title_vertical_spacing',
            [
                'label' => __( 'Vertical Spacing', 'cozy-addons' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'size' => 10,
                    'unit' => 'px',
                ],
                'condition' => [
                    'select_content_type' => 'content-template',
                    'display_template_title' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .cozy-menu-sidebar-panel .template-title' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'template_title_alignment',
            [
                'label' => __( 'Horizontal Alignment', 'cozy-addons' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'cozy-addons' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'cozy-addons' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'cozy-addons' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'condition' => [
                    'select_content_type' => 'content-template',
                    'display_template_title' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .cozy-sidebar-panel-content .template-title' => 'text-align: {{VALUE}}',
                ]
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_icon_styles()
    {
        $this->start_controls_section(
            'icon_styles',
            [
                'label' => __( 'Icon Styles', 'cozy-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_display_type' => 'display-icon',
                ],
            ]
        );

        $this->start_controls_tabs('icon_hover_effect');

        $this->start_controls_tab(
            'display_icon_styles',
            [
                'label' => __( 'Normal', 'cozy-addons' ),
            ]
        );

        $this->add_responsive_control(
            'display_icon_size',
            [
                'label' => __( 'Icon Size', 'cozy-addons' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 25,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .display-icon i' => 'font-size: {{SIZE}}{{UNIT}} !important',
                ],
            ]
        );

        $this->add_control(
            'icon_background_color',
            [
                'label' => __( 'Background Color', 'cozy-addons' ),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .display-icon i' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon Color', 'cozy-addons' ),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#000',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .display-icon i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'icon_styles_hover',
            [
                'label' => __( 'Hover', 'cozy-addons' ),
            ]
        );

        $this->add_responsive_control(
            'display_icon_size_hover',
            [
                'label' => __( 'Hover Icon Size', 'cozy-addons' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 25,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .display-icon:hover i' => 'font-size: {{SIZE}}{{UNIT}} !important',
                ],
            ]
        );

        $this->add_control(
            'icon_background_color_hover',
            [
                'label' => __( 'Hover Background Color', 'cozy-addons' ),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .display-icon:hover i' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_color_hover',
            [
                'label' => __( 'Hover Icon Color', 'cozy-addons' ),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#ddd',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .display-icon:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    private function cozy_addons_sidebar_panel_styles()
    {
        $this->start_controls_section(
            'cozy_addons_sidebar_panel_styles',
            [
                'label' => __( 'Sidebar Panel Styles', 'cozy-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'sidebar_panel_width',
            [
                'label' => __( 'Panel Width', 'cozy-addons' ),
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
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .cozy-sidebar-panel-wrapper' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'sidebar_panel_height',
            [
                'label' => __( 'Panel Height', 'cozy-addons' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'vh' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'vh',
                    'size' => 100,
                ],
                'size_units' => ['vh'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .cozy-menu-sidebar-panel' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'sidebar_panel_padding',
            [
                'label' => __('Padding', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'default' => [
                    'top' => 20,
                    'right' => 20,
                    'bottom' => 20,
                    'left' => 20,
                    'unit' => 'px',
                ],
                'size_units' => ['%', 'px'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .cozy-menu-sidebar-panel' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'sidepanel_background_color',
            [
                'label' => __( 'Background Color', 'cozy-addons' ),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .cozy-menu-sidebar-panel' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sidepanel_close_icon_color',
            [
                'label' => __( 'Close Icon Color', 'cozy-addons' ),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#9B9B9B',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .cozy-menu-sidebar-panel .cozy-close-icon-wrapper i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sidepanel_text_color',
            [
                'label' => __( 'Text Color', 'cozy-addons' ),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .cozy-menu-sidebar-panel' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sidebar_panel_text_typography',
                'label' => __('Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-sidebar-panel .cozy-menu-sidebar-panel',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                ],
            ]
        );

        $this->add_control(
            'hr1',
            [
                'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'select_content_type' => 'content-template',
                    'display_template_title' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'template_title_color',
            [
                'label' => __( 'Template Title Color', 'cozy-addons' ),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#5C5C5C',
                'condition' => [
                    'select_content_type' => 'content-template',
                    'display_template_title' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-sidebar-panel .cozy-menu-sidebar-panel .template-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'template_page_title_typography',
                'label' => __('Template Title Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'condition' => [
                    'select_content_type' => 'content-template',
                    'display_template_title' => 'yes',
                ],
                'selector' => '{{WRAPPER}} .cozy-addons-sidebar-panel .cozy-menu-sidebar-panel .template-title',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 25]],
                    'font_weight' => ['default' => 500],
                ],
            ]
        );

        $this->end_controls_section();
    }


    protected function render($instance = [])
    {
        $settings = $this->get_settings(); ?>
        <section class="cozy-addons-sidebar-panel">
            <div class="display-icon">
                <?php 
                if( 'yes' == $settings['enable_sidebar_text'] && 'before-icon' == $settings['text_placement'] ){
                    echo "<span class='cozy-sidebar-text-before'>" . $settings['sidebar_text'] . "</span>";
                }
                if( 'display-icon' == $settings['select_display_type'] )
                {
                    \Elementor\Icons_Manager::render_icon($settings['display_type_icon'], ['aria-hidden' => 'true']);
                }else{
                    echo '<img src="' . $settings["display_type_image"]["url"] . '">';
                }
                if( 'yes' == $settings['enable_sidebar_text'] && 'after-icon' == $settings['text_placement'] ){
                    echo "<span class='cozy-sidebar-text-after'>" . $settings['sidebar_text'] . "</span>";
                }
                ?>
            </div>
            <div class="cozy-sidebar-panel-wrapper <?php echo $settings['sidebar_display_location'] ?>">
                <div class="cozy-menu-sidebar-panel">
                    <div class="cozy-close-icon-wrapper">
                        <?php
                        \Elementor\Icons_Manager::render_icon($settings['sidebar_panel_close_icon'], ['aria-hidden' => 'true']);
                        ?>
                    </div>
                    <div class="cozy-sidebar-panel-content">
                        <?php
                        if( 'content-editor' == $settings['select_content_type'] ){
                            echo $settings['content_type_editor'];
                        }else{
                            $page_id = $settings['content_type_template'];
                            $args = array(
                                'post_type'      => 'elementor_library',
                                'tabs_group' => 'library',
                              );
                              
                            $elementor_templates = get_posts($args);

                            foreach ($elementor_templates as $key => $template) {
                                # code...
                                if($template->ID == $page_id){
                                    if( 'yes' == $settings['display_template_title'] ){
                                        echo "<div class='template-title'>" . $template->post_title . "</div>";
                                    }

                                    if(empty( $template->post_content )){
                                        echo "<div class='empty-template'>No contents here!</div>";
                                    }else{
                                        echo "<div class='template-content'>" . \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($template->ID) . "</div>";
                                    }
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
<?php }
}
