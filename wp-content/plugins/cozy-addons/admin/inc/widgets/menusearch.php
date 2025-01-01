<?php

namespace Cozy_Addons\MenuSearchWidgets;

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
class Cozy_Addons_MenuSearch_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'cozy-addons-menu-search';
    }

    public function get_title()
    {
        return __('Menu Search', 'cozy-addons');
    }

    public function get_icon()
    {
        return 'eicon-search cozy-menusearch-icon cozy-widget-icons';
    }
    public function get_keywords()
    {
        return ['menu search', 'cozy addons products'];
    }
    public function get_categories()
    {
        return ['cozy-addons-items'];
    }

    protected function register_controls()
    {

        $this->cozy_addons_menusearch_options();
        $this->cozy_addons_menu_searchbox_icon_styles();
        $this->cozy_addons_menu_searchbox_styles();
        $this->cozy_addons_menu_search_button_styles();
    }

    /**
     * front content
     */
    private function cozy_addons_menusearch_options()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('General', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'menu_search_display_option',
            [
                'label' => __('Display Option', 'cozy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'display-default' => __('Default', 'cozy-addons'),
                    'display-full-screen' => __('Full Screen', 'cozy-addons'),
                ],
                'default' => 'display-default',
            ]
        );

        $this->add_control(
            'searchbox_default_placement',
            [
                'label' => __('Searchbox Placement', 'cozy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'placement-left' => __('Left', 'cozy-addons'),
                    'placement-right' => __('Right', 'cozy-addons'),
                ],
                'default' => 'placement-right',
                'condition' => [
                    'menu_search_display_option' => 'display-default',
                ],
            ]
        );

        $this->add_responsive_control(
            'searchbox_width',
            [
                'label' => __('Search Box Width', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'default' => [
                    'unit' => 'px',
                    'size' => 350,
                ],
                'range' => [
                    'px' => [
                        'min' => 40,
                        'max' => 300,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox.display-default #search' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_control(
            'searchbox_field_height',
            [
                'label' => __('Search Height', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 150,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox #search' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_control(
            'search_icon',
            [
                'label' => __('Search Icon', 'cozy-addons'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-search',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->add_control(
            'searchbox_icon_alignment',
            [
                'label' => __('Icon Alignment', 'cozy-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'cozy-addons'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'cozy-addons'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __('Left', 'cozy-addons'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'right',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-search-icon' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_menu_search_button_styles()
    {
        $this->start_controls_section(
            'menu_searchbox_button_styles',
            [
                'label' => __('Button Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'searchbox_default_icon_top_orientation',
            [
                'label' => __('Search Icon Top Orientation', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'default' => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox.display-default button' => 'top: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'menu_search_display_option' => 'display-default',
                ],
            ]
        );

        $this->add_responsive_control(
            'searchbox_default_icon_right_orientation',
            [
                'label' => __('Search Icon Right Orientation', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'default' => [
                    'unit' => 'px',
                    'size' => 2,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox.display-default button' => 'right: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'menu_search_display_option' => 'display-default',
                ],
            ]
        );

        $this->add_responsive_control(
            'searchbox_fullscreen_icon_top_orientation',
            [
                'label' => __('Search Icon Top Orientation', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'default' => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox.display-full-screen button' => 'top: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'menu_search_display_option' => 'display-full-screen',
                ],
            ]
        );

        $this->add_responsive_control(
            'searchbox_fullscreen_icon_right_orientation',
            [
                'label' => __('Search Icon Right Orientation', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox.display-full-screen button' => 'right: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'menu_search_display_option' => 'display-full-screen',
                ],
            ]
        );

        $this->add_control(
            'searchbox_icon_size',
            [
                'label' => __('Icon Size', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 16,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox button i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'search_box_button_icon_padding',
            [
                'label'      => __('Padding', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox button i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'search_box_button_icon_border_radius',
            [
                'label'      => __('Border Radius', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox button i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );
        $this->start_controls_tabs('searchbox_button_icon_tabs');

        $this->start_controls_tab(
            'searchbox_button_icon_normal',
            [
                'label' => __('Normal', 'cozy-addons'),
            ]
        );
        $this->add_control(
            'searchbox_button_icon_background_color',
            [
                'label' => __('Background Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgba(0,0,0,0)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox button i' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'searchbox_button_icon_color',
            [
                'label' => __('Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#B6B6B6',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox button i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'searchbox_nutton_icon_hover',
            [
                'label' => __('Hover', 'cozy-addons'),
            ]
        );
        $this->add_control(
            'searchbox_button_icon_background_color_hover',
            [
                'label' => __('Background Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgba(0,0,0,0)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox button i:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'searchbox_button_icon_color_hover',
            [
                'label' => __('Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#676767',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox button i:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }


    private function cozy_addons_menu_searchbox_icon_styles()
    {
        $this->start_controls_section(
            'menu_searchbox_icon_styles',
            [
                'label' => __('Search Icon Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'searchbox_main_icon_box_width',
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
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-search-icon i' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_control(
            'searchbox_main_icon_box_height',
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
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-search-icon i' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'search_box_icon_border_radius',
            [
                'label'      => __('Border Radius', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons-menu-search  .cozy-search-icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );
        $this->add_control(
            'searchbox_main_icon_size',
            [
                'label' => __('Icon Size', 'cozy-addons'),
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
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-search-icon .search-icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-search-icon .search-icon img' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->start_controls_tabs('searchbox_icon_tabs');

        $this->start_controls_tab(
            'searchbox_icon_normal',
            [
                'label' => __('Normal', 'cozy-addons'),
            ]
        );
        $this->add_control(
            'searchbox_icon_background_color',
            [
                'label' => __('Background Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgba(0,0,0,0)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-search-icon i' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'searchbox_icon_color',
            [
                'label' => __('Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#B6B6B6',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-search-icon .search-icon i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'search_icon_box_border',
                'label' => __('Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-menu-search .cozy-search-icon i',
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'searchbox_icon_hover',
            [
                'label' => __('Hover', 'cozy-addons'),
            ]
        );
        $this->add_control(
            'searchbox_icon_background_color_hover',
            [
                'label' => __('Background Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgba(0,0,0,0)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-search-icon i:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'searchbox_icon_color_hover',
            [
                'label' => __('Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#676767',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-search-icon i:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'search_icon_box_border_hover',
                'label' => __('Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-menu-search .cozy-search-icon i:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }


    private function cozy_addons_menu_searchbox_styles()
    {
        $this->start_controls_section(
            'menu_searchbox_styles',
            [
                'label' => __('Search Field Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'searchbox_default_margin',
            [
                'label'      => __('Margin', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '0',
                    'right' => '20',
                    'bottom' => '0',
                    'left' => '0',
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox form' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
                'condition' => [
                    'menu_search_display_option' => 'display-default',
                ],
            ]
        );

        $this->add_responsive_control(
            'search_box_padding',
            [
                'label'      => __('Padding', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '0',
                    'right' => '15',
                    'bottom' => '0',
                    'left' => '15',
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons-menu-search #search' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'searchbox_fullscreen_vertical_placement',
            [
                'label' => __('Searchbox Vertical Placement', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -300,
                        'max' => 300
                    ]
                ],
                'size_units' => ['px', '%'],
                'default' => [
                    'unit' => '%',
                    'size' => 45,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox.display-full-screen form' => 'transform: translateY({{SIZE}}{{UNIT}})',
                ],
                'condition' => [
                    'menu_search_display_option' => 'display-full-screen',
                ],
            ]
        );



        $this->start_controls_tabs('searchbox_focus_effect');

        $this->start_controls_tab(
            'searchbox_normal',
            [
                'label' => __('Normal', 'cozy-addons'),
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'searchbox_border',
                'label' => __('Searchbox Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox #search',
                'default' => [],
            ]
        );

        $this->add_responsive_control(
            'search_box_border_radius',
            [
                'label'      => __('Border Radius', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} section.cozy-addons-menu-search #search' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'searchbox_box_shadow',
                'label' => __('Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox #search',
            ]
        );

        $this->add_control(
            'searchbox_background_color',
            [
                'label' => __('Background Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox #search' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->start_controls_tab(
            'searchbox_focus',
            [
                'label' => __('Focus', 'cozy-addons'),
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'searchbox_border_focus',
                'label' => __('Focus Searchbox Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox #search:focus',
            ]
        );

        $this->add_responsive_control(
            'search_box_border_radius_focus',
            [
                'label'      => __('Focus Border Radius', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '4',
                    'right' => '4',
                    'bottom' => '4',
                    'left' => '4',
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} section.cozy-addons-menu-search #search:focus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'searchbox_box_shadow_focus',
                'label' => __('Focus Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox #search:focus',
            ]
        );

        $this->add_control(
            'searchbox_background_color_focus',
            [
                'label' => __('Focus Background Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#EEEEEE',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-search .cozy-searchbox #search:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }

    protected function render($instance = [])
    {
        $settings = $this->get_settings(); ?>
        <section class="cozy-addons-menu-search">
            <div class="cozy-search-icon">
                <span class="search-icon">
                    <?php
                    \Elementor\Icons_Manager::render_icon($settings['search_icon'], ['aria-hidden' => 'true']);
                    ?>
                </span>
                <i aria-hidden="true" class="fas fa-times"></i>
            </div>

            <div class="cozy-searchbox <?php echo $settings['menu_search_display_option'] . " " . $settings['searchbox_default_placement'] ?>">
                <div class="cozy-form-holder">
                    <form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="form-inline">
                        <input type="text" name="s" id="search" placeholder="<?php _e("Search", "cozy-addons"); ?>" value="<?php the_search_query(); ?>" class="form-control">
                        <button type="submit">
                            <span>
                                <?php
                                \Elementor\Icons_Manager::render_icon($settings['search_icon'], ['aria-hidden' => 'true']);
                                ?>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </section>
<?php }
}
