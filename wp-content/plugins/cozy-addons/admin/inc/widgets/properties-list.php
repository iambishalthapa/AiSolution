<?php

namespace Cozy_Addons\PropertiesListWidgets;

use Elementor\Conditions;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes\Color;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Cozy_Addons_Properties_List_Widget extends Widget_Base
{
    public function get_name()
    {
        return 'cozy-addons-properties-list';
    }

    public function get_title()
    {
        return __('Properties List', 'cozy-addons');
    }

    public function get_icon()
    {
        return 'eicon-kit-details cozy-widget-icons';
    }
    public function get_keywords()
    {
        return ['property list', 'real estate', 'cozy addons'];
    }

    public function get_categories()
    {
        return ['cozy-addons-items'];
    }

    protected function register_controls()
    {
        $this->cozy_addons_properties_list_header_options();
        $this->cozy_addons_properties_list_content_options();

        //Style widgets
        $this->cozy_addons_properties_box_style_options();
        $this->cozy_addons_properties_list_image_options();
        $this->cozy_addons_properties_list_content_style_options();
        $this->cozy_addons_properties_owner_style_option();
        $this->cozy_addons_property_list_carousel_pagination_options();
        $this->cozy_addons_property_list_carousel_navigation_options();
    }

    private function cozy_addons_properties_list_header_options()
    {
        $this->start_controls_section(
            'header_section',
            [
                'label' => __('General', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        if (cozy_addons_premium_access()) {
            $this->add_control(
                'properties_list_display_layout',
                [
                    'label' => __('Display Layout', 'cozy-addons'),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'cozy-properties-list-grid' => esc_html__('Grid', 'cozy-addons'),
                        'cozy-properties-list-carousel' => esc_html__('Carousel', 'cozy-addons'),
                    ],
                    'default' => 'cozy-properties-list-grid',

                ]
            );
        } else {
            $this->add_control(
                'properties_list_display_layout',
                [
                    'label' => __('Display Layout', 'cozy-addons'),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'cozy-properties-list-grid' => esc_html__('Grid', 'cozy-addons'),
                    ],
                    'default' => 'cozy-properties-list-grid',

                ]
            );
        }

        //Columns select for grid and carousel layout
        if (cozy_addons_premium_access()) {
            $this->add_control(
                'properties_list_column',
                [
                    'label' => __('Display Column', 'cozy-addons'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'col-3',
                    'options' => [
                        'col-1' => esc_html__('1 Column', 'cozy-addons'),
                        'col-2' => esc_html__('2 Column', 'cozy-addons'),
                        'col-3' => esc_html__('3 Column', 'cozy-addons'),
                        'col-4' => esc_html__('4 Column', 'cozy-addons'),
                    ],
                    'condition' => [
                        'properties_list_display_layout' => 'cozy-properties-list-grid',
                    ],
                ]
            );
            $this->add_control(
                'properties_carousel_post_per_view',
                [
                    'label' => __('Display Column', 'cozy-addons'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 3,
                    'min' => 1, // Minimum value
                    'max' => 6, // Maximum value
                    'step' => 0.1,
                    'condition' => [
                        'properties_list_display_layout' => 'cozy-properties-list-carousel',
                    ],
                ]
            );
        } else {
            $this->add_control(
                'properties_list_column',
                [
                    'label' => __('Display Column', 'cozy-addons'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'col-3',
                    'options' => [
                        'col-3' => esc_html__('3 Column', 'cozy-addons'),
                    ],
                    'condition' => [
                        'properties_list_display_layout' => 'cozy-properties-list-grid',
                    ],
                ]
            );
            $this->add_control(
                'cozy_property_layout_notice_text',
                [
                    'type' => \Elementor\Controls_Manager::RAW_HTML,
                    'raw' => __('<a href="https://cozythemes.com/cozy-addons/" target="_blank">Upgrade to premium</a> version to unlock carousel layout and columns option for both layout', 'cozy-addons'),
                    'content_classes' => 'ct-upsell-notice',
                ]
            );
        }

        $this->add_responsive_control(
            'propperties_grid_gap',
            [
                'label' => __('Columns Gap', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.properties-list-items' => 'grid-gap: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'properties_list_display_layout' => 'cozy-properties-list-grid',
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
                    'properties_list_display_layout' => 'cozy-properties-list-carousel',
                ],
            ]
        );
        $this->add_control(
            'show_carousel_pagination',
            [
                'label' => __('Carousel Pagination', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,


                'default' => 'yes',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'properties_list_display_layout',
                            'operator' => '==',
                            'value' => 'cozy-properties-list-carousel',
                        ],

                    ],
                ],
            ]
        );

        $this->add_control(
            'show_carousel_navigation',
            [
                'label' => __('Carousel Navigation', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'properties_list_display_layout',
                            'operator' => 'in',
                            'value' => ['cozy-properties-list-carousel'],
                        ],

                    ],
                ],
            ]
        );

        $this->add_control(
            'slide_navigation_left_icon',
            [
                'label' => __('Preview Icon', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-angle-left',
                    'library' => 'fa-solid',
                ],
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'properties_list_display_layout',
                            'operator' => 'in',
                            'value' => ['cozy-properties-list-carousel'],
                        ],
                        [
                            'name' => 'show_carousel_navigation',
                            'operator' => '===', // it accepts:  =,==, !=,!==,  in, !in etc.
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );

        $this->add_control(
            'slide_navigation_right_icon',
            [
                'label' => __('Preview Icon', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-angle-right',
                    'library' => 'fa-solid',
                ],
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'properties_list_display_layout',
                            'operator' => '===',
                            'value' => 'cozy-properties-list-carousel',
                        ],
                        [
                            'name' => 'show_carousel_navigation',
                            'operator' => '===', // it accepts:  =,==, !=,!==,  in, !in etc.
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_properties_list_content_options()
    {
        $ct_property_action_access = false;
        if (cozy_addons_premium_access()) {
            $ct_property_action_access = true;
        }
        $this->start_controls_section(
            'properties_list_content',
            [
                'label' => __('Property List', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', 'cozy-addons'),
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
                'default' => 'h4',
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'properties_image',
            [
                'label' => esc_html__('Property Image', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'property_location_name',
            [
                'label' => __('Property Title', 'cozy-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 1,
                'default' => __('Property Name/Title', 'cozy-addons'),
                'placeholder' => __('Los Angeles - Single family house', 'cozy-addons'),
            ]
        );

        $repeater->add_control(
            'property_details_link',
            [
                'label' => __('Details Link', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'cozy-addons'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => true,
                ],
            ]
        );

        $repeater->add_control(
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

        $repeater->add_control(
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

        $repeater->add_control(
            'price_amount',
            [
                'label' => __('Price', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'min' => 0,
                'step' => 1,
                'default' => 11,
            ]
        );

        $repeater->add_control(
            'period_text',
            [
                'label' => __('Period', 'cozy-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 1,
                'default' => __('/mo', 'cozy-addons'),
                'placeholder' => __('Add Period Cycle Here', 'cozy-addons'),
            ]
        );

        $repeater->add_control(
            'show_sale_price',
            [
                'label' => __('Enable Sale', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
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

        $repeater->add_control(
            'property_highlight',
            [
                'label' => __('Short Description', 'cozy-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 3,
                'default' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'cozy-addons'),
                'placeholder' => __('Short Description', 'cozy-addons'),
            ]
        );

        $repeater->add_control(
            'property_bedroom_count_icon',
            [
                'label' => __('Bedroom Icon', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-bed',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $repeater->add_control(
            'property_bedroom_count',
            [
                'label' => __('Total Bedroom', 'cozy-addons'),
                'type' => Controls_Manager::NUMBER,
                'rows' => 1,
                'default' => __('1', 'cozy-addons'),
                'placeholder' => __('Count', 'cozy-addons'),
            ]
        );

        $repeater->add_control(
            'property_bathroom_count_icon',
            [
                'label' => __('Bathroom Icon', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-bath',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $repeater->add_control(
            'property_bathroom_count',
            [
                'label' => __('Total Bathroom', 'cozy-addons'),
                'type' => Controls_Manager::NUMBER,
                'rows' => 1,
                'default' => __('1', 'cozy-addons'),
                'placeholder' => __('Count', 'cozy-addons'),
            ]
        );

        $repeater->add_control(
            'property_area_icon',
            [
                'label' => __('Area Icon', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrows-alt',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $repeater->add_control(
            'property_area',
            [
                'label' => __('Property Area(sq ft)', 'cozy-addons'),
                'type' => Controls_Manager::NUMBER,
                'rows' => 1,
                'default' => __('123', 'cozy-addons'),
                'placeholder' => __('sq ft', 'cozy-addons'),
            ]
        );
        $repeater->add_control(
            'enable_property_owner',
            [
                'label' => __('Enable Owner', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'separator' => 'before',
            ]
        );
        $repeater->add_control(
            'property_owner_name',
            [
                'label' => __('Owner', 'cozy-addons'),
                'type' => Controls_Manager::TEXT,
                'rows' => 1,
                'default' => __('Home & Housing', 'cozy-addons'),
                'placeholder' => __('Owner/Seller Name', 'cozy-addons'),
                'condition' => [
                    'enable_property_owner' => 'yes'
                ]
            ]
        );
        $repeater->add_control(
            'property_owener_photo',
            [
                'label' => esc_html__('Owner Photo', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'enable_property_owner' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'properties_list',
            [
                'label' => __('Properties List', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'item_actions' => [
                    'add'       => $ct_property_action_access,
                    'duplicate' => $ct_property_action_access,
                    'remove'    => true,
                    'sort'      => true,
                    'update'    => true,
                ],
                'default' => [
                    [
                        'property_location_name' => __('Property', 'cozy-addons'),
                    ],
                    [
                        'property_location_name' => __('Property', 'cozy-addons'),
                    ],
                    [
                        'property_location_name' => __('Property', 'cozy-addons'),
                    ]
                ],
                'title_field' => '{{{ property_location_name }}}'

            ]
        );
        if (!cozy_addons_premium_access()) {
            $this->add_control(
                'cozy_property_list_notice_text',
                [
                    'type' => \Elementor\Controls_Manager::RAW_HTML,
                    'raw' => __('<a href="https://cozythemes.com/cozy-addons/" target="_blank">Upgrade to premium</a> version to get full acess and add/delete unlimited properties list!', 'cozy-addons'),
                    'content_classes' => 'ct-upsell-notice',
                ]
            );
        }

        $this->end_controls_section();
    }

    /**
     * Style Box Options.
     */

    private function cozy_addons_properties_box_style_options()
    {
        $this->start_controls_section(
            'properties_box_style',
            [
                'label' => __('Box Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'box_content_align',
            [
                'label' => __('Content Align', 'cozy-addons'),
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
                    '{{WRAPPER}} .cozy-addons-properties-list .properties-list-items .properties-list-item' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'box_text_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Text Typography', 'cozy-addons'),

                'selectors' => '{{WRAPPER}} .cozy-addons-properties-list .properties-list-items .properties-list-item',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 500],
                    'line_height' => ['default' => ['size' => 28]],
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => __('Margin', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'isLinked' => false,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons-properties-list .properties-list-items .properties-list-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'box_padding',
            [
                'label'      => __('Padding', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'isLinked' => false,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons-properties-list .properties-list-items .properties-list-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'property_content_padding',
            [
                'label'      => __('Padding', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '20',
                    'right' => '20',
                    'bottom' => '20',
                    'left' => '20',
                    'isLinked' => false,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons.properties-list-item .properties-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'label' => __('Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-properties-list .properties-list-items .properties-list-item',
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

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => __('Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-properties-list .properties-list-items .properties-list-item',
            ]
        );

        $this->add_control(
            'box_border_radius',
            [
                'label' => __('Border Radius', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-properties-list .properties-list-items .properties-list-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'box_background_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Background Color', 'cozy-addons'),
                'default'   => 'rgba(255, 255, 255, 1)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-properties-list .properties-list-items .properties-list-item' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_properties_list_image_options()
    {
        $this->start_controls_section(
            'properties_list_image_style',
            [
                'label' => __('Image Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'image_margin',
            [
                'label'      => __('Margin', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'isLinked' => false,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons-properties-list .properties-list-items .properties-list-item img.properties-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_height',
            [
                'label' => __('Height', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'rem' => [
                        'min' => 18,
                        'max' => 30,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 500
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 250,
                ],
                'size_units' => ['rem', '%', 'px'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-properties-list .properties-list-items .properties-list-item img.properties-image' => 'height: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'image_width',
            [
                'label' => __('Width', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'rem' => [
                        'min' => 18,
                        'max' => 30,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 500
                    ]
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'size_units' => ['rem', '%', 'px'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-properties-list .properties-list-items .properties-list-item img.properties-image' => 'width: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'label' => __('Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-properties-list .properties-list-items .properties-item img.properties-image',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_shadow',
                'label' => __('Border Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-properties-list .properties-list-items .properties-list-item img.properties-image',
            ]
        );

        $this->add_control(
            'image_border-radius',
            [
                'label' => 'Border Radius',
                'type' => Controls_Manager::DIMENSIONS,
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'isLinked' => true,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons-properties-list .properties-list-items .properties-list-item img.properties-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_properties_list_content_style_options()
    {
        $this->start_controls_section(
            'properties_list_content_style',
            [
                'label' => __('Content Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'property_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Text Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} .cozy-addons.properties-list-item .properties-content .section-title',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 20]],
                    'font_weight' => ['default' => 500],
                    'line_height' => ['default' => ['size' => 28]],
                ],

            ]
        );

        $this->start_controls_tabs('properties_list_title_style_tabs');
        // Normal tab.
        $this->start_controls_tab(
            'property_list_tabs_normal',
            [
                'label'     => __('Normal', 'cozy-addons'),
            ]
        );
        $this->add_control(
            'property_text_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Text Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#4B4B4B',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.properties-list-item .properties-content .section-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();

        // Hover border.
        $this->start_controls_tab(
            'property_list_tabs_hover',
            [
                'label'     => __('Hover', 'cozy-addons'),
            ]
        );
        $this->add_control(
            'property_text_color_hover',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Text Hover Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#343434',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.properties-list-item .properties-content .section-title:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'propperties_title_bottom_space',
            [
                'label' => __('Title bottom space', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.properties-list-item .properties-content .section-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'price_text_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Price Text Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#616161',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-properties-list .properties-list-items .properties-list-item .properties-content .price' => 'color: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'price_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Price Text Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} section.cozy-addons-properties-list .properties-list-items .properties-list-item .properties-content .price',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 600],
                    'line_height' => ['default' => ['size' => 28]],
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'propperties_price_bottom_space',
            [
                'label' => __('Price bottom space', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-properties-list .properties-list-items .properties-list-item .properties-content .price' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'property_highlight_text_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Description Text Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#616161',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-properties-list .properties-list-items .properties-list-item .properties-content .highlight' => 'color: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'property_highlight_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Description Text Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} section.cozy-addons-properties-list .properties-list-items .properties-list-item .properties-content .highlight',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                    'line_height' => ['default' => ['size' => 28]],
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'propperties_desc_bottom_space',
            [
                'label' => __('Description bottom space', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-properties-list .properties-list-items .properties-list-item .properties-content .highlight' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'property_specifications_text_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Property Specs Text Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#AFAFAF',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-properties-list .properties-list-items .properties-list-item .properties-content .specifications' => 'color: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'property_specifications_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Property Specs Text Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} section.cozy-addons-properties-list .properties-list-items .properties-list-item .properties-content .specifications',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 18]],
                    'font_weight' => ['default' => 500],
                    'line_height' => ['default' => ['size' => 28]],
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_properties_owner_style_option()
    {
        $this->start_controls_section(
            'properties_list_owner_style',
            [
                'label' => __('Owner Section Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'property_owner_name_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Text Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} .cozy-addons.properties-list-item .property-owner-section',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 18]],
                    'font_weight' => ['default' => 500],
                    'line_height' => ['default' => ['size' => 28]],
                ],
            ]
        );
        $this->add_control(
            'property_owner_text_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Text Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#616161',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.properties-list-item .property-owner-section' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'property_owner_section_padding',
            [
                'label'      => __('Padding', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '10',
                    'right' => '20',
                    'bottom' => '10',
                    'left' => '20',
                    'isLinked' => false,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons.properties-list-item .property-owner-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'property_owner_section_border',
                'label' => __('Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons.properties-list-item .property-owner-section',
                'fields_options' => [
                    'border' => [
                        'default' => 'solid',
                    ],
                    'width' => [
                        'default' => [
                            'top' => '1',
                            'right' => '0',
                            'bottom' => '0',
                            'left' => '0',
                            'isLinked' => false,
                        ],
                    ],
                    'color' => [
                        'default' => '#ededed',
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'propperties_owner_photo_width',
            [
                'label' => __('Image Width', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 250
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 40,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.properties-list-item .property-owner-section img' => 'width: {{SIZE}}{{UNIT}};',
                ]
            ]
        );
        $this->add_responsive_control(
            'propperties_owner_photo_height',
            [
                'label' => __('Image Height', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 250
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 40,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.properties-list-item .property-owner-section  img' => 'height: {{SIZE}}{{UNIT}};',
                ]
            ]
        );
        $this->add_control(
            'propperties_owner_photo_border_radius',
            [
                'label' => __('Image Border Radius', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'default' => [
                    'top' => '50',
                    'right' => '50',
                    'bottom' => '50',
                    'left' => '50',
                    'isLinked' => true,
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.properties-list-item .property-owner-section img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }


    /**
     * slide pagination style
     */
    private function cozy_addons_property_list_carousel_pagination_options()
    {
        $this->start_controls_section(
            'slider_pagination_style',
            [
                'label' => __('Pagination Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_carousel_pagination' => 'yes',
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
                    '{{WRAPPER}} section.cozy-addons-properties-list .cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}}  section.cozy-addons-properties-list .cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}}  section.cozy-addons-properties-list .cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}}  section.cozy-addons-properties-list .cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} section.cozy-addons-properties-list .cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet:hover' => 'background: {{VALUE}};',
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
    private function cozy_addons_property_list_carousel_navigation_options()
    {
        $this->start_controls_section(
            'slider_navigation_style',
            [
                'label' => __('Navigation Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_carousel_navigation' => 'yes',
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
                    'size' => 12,
                ],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-properties-list .cozy-slide-nav' => 'font-size: {{SIZE}}{{UNIT}};',
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
                    'size' => 35,
                ],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-properties-list .cozy-slide-nav' => 'width: {{SIZE}}{{UNIT}};',
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
                    'size' => 35,
                ],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-properties-list .cozy-slide-nav' => 'height: {{SIZE}}{{UNIT}}',
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
                'selector' => '{{WRAPPER}} section.cozy-addons-properties-list .cozy-slide-nav',
            ]
        );
        // Normal border shadow
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'navigation_box_box_shadow',
                'label' => __('Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-properties-list .cozy-slide-nav',
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
                    '{{WRAPPER}} section.cozy-addons-properties-list .cozy-slide-nav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'default'   => '#6EC1E4',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-properties-list .cozy-slide-nav' => 'background: {{VALUE}};',
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
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-properties-list .cozy-slide-nav' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .section.cozy-addons-properties-list .cozy-slide-nav:hover',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'navigation_box_shadow_hover',
                'label' => __('Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-properties-list .cozy-slide-nav:hover',
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
                    '{{WRAPPER}} section.cozy-addons-properties-list .cozy-slide-nav:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'default'   => '#61CE70',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-properties-list .cozy-slide-nav:hover' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} section.cozy-addons-properties-list .cozy-slide-nav:hover' => 'color: {{VALUE}};',
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

?>
        <section class="cozy-addons-properties-list <?php echo $settings['properties_list_display_layout'] ?>">
            <?php
            include(COZY_ADDONS_PLUGIN_DIR . 'public/widgets/properties-list/properties-list.php');
            ?>
        </section>
<?php
    }
}
