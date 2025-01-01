<?php

namespace Cozy_Addons\TravelAgencyWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes\Color;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;


if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Cozy_Addons_Travel_Agency_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'cozy-addons-travel-destination-list';
    }

    public function get_title()
    {
        return __('Travel Package List', 'cozy-addons');
    }

    public function get_icon()
    {
        return 'eicon-kit-upload-alt cozy-widget-icons';
    }

    public function get_categories()
    {
        return ['cozy-addons-items'];
    }
    public function get_keywords()
    {
        return ['travel package', 'cozy', 'cozy addons', 'destination'];
    }
    protected function register_controls()
    {
        $this->cozy_addons_content_header_options();
        $this->cozy_addons_content_travel_list_options();

        //Styles for widget elements
        $this->cozy_addons_travel_destination_list_box_options();
        $this->cozy_addons_travel_destination_list_image_options();
        $this->cozy_addons_travel_destination_list_title_options();
        $this->cozy_addons_travel_destination_location_options();
        $this->cozy_addons_travel_destination_pricing_options();
        $this->cozy_addons_travel_destination_list_duration_options();
        $this->cozy_addons_travel_destination_list_button_options();
        $this->cozy_addons_package_list_carousel_pagination_options();
        $this->cozy_addons_package_list_carousel_navigation_options();
    }

    /** 
     * Header Layout Options
     */
    private function cozy_addons_content_header_options()
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
                'travel_destination_list_display_layout',
                [
                    'label' => __('Display Layout', 'cozy-addons'),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'cozy-travel-destination-list-grid' => esc_html__('Grid', 'cozy-addons'),
                        'cozy-travel-destination-list-carousel' => esc_html__('Carousel', 'cozy-addons'),
                    ],
                    'default' => 'cozy-travel-destination-list-grid',

                ]
            );
        } else {
            $this->add_control(
                'travel_destination_list_display_layout',
                [
                    'label' => __('Display Layout', 'cozy-addons'),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'cozy-travel-destination-list-grid' => esc_html__('Grid', 'cozy-addons'),
                    ],
                    'default' => 'cozy-travel-destination-list-grid',

                ]
            );
        }
        if (cozy_addons_premium_access()) {
            $this->add_control(
                'travel_destination_list_column',
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
                        'travel_destination_list_display_layout' => 'cozy-travel-destination-list-grid',
                    ],
                ]
            );
            $this->add_control(
                'cozy_carousel_post_per_view',
                [
                    'label' => __('Display Column', 'cozy-addons'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 3,
                    'min' => 1, // Minimum value
                    'max' => 6, // Maximum value
                    'step' => 0.1,
                    'condition' => [
                        'travel_destination_list_display_layout' => 'cozy-travel-destination-list-carousel',
                    ],
                ]
            );
        } else {
            $this->add_control(
                'travel_destination_list_column',
                [
                    'label' => __('Display Column', 'cozy-addons'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'col-3',
                    'options' => [
                        'col-3' => esc_html__('3 Column', 'cozy-addons'),
                    ],
                    'condition' => [
                        'travel_destination_list_display_layout' => 'cozy-travel-destination-list-grid',
                    ],
                ]
            );

            $this->add_control(
                'cozy_packages_layout_notice_text',
                [
                    'type' => \Elementor\Controls_Manager::RAW_HTML,
                    'raw' => __('<a href="https://cozythemes.com/cozy-addons/" target="_blank">Upgrade to premium</a> version to unlock carousel layout and columns option for both layout', 'cozy-addons'),
                    'content_classes' => 'ct-upsell-notice',
                ]
            );
        }
        $this->add_control(
            'enable_ovelay_content_layout',
            [
                'label' => __('Enable Overlay Content', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );
        $this->add_responsive_control(
            'enable_ovelay_content_vertical_adjustment',
            [
                'label' => __('Content Vertical Adjustment', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => -100,
                        'max' => 100
                    ]
                ],
                'default' => [
                    'unit' => '%',
                    'size' => -100,
                ],
                'size_units' => ['%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-travel-destination-list.overlay-content-enabled .travel-destination-content' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'enable_ovelay_content_layout' => 'yes',
                ],
            ]
        );
        $this->add_responsive_control(
            'packagebox_grid_gap',
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
                    '{{WRAPPER}} .cozy-addons.travel-destination-list-items' => 'grid-gap: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'travel_destination_list_display_layout' => 'cozy-travel-destination-list-grid',
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
                    'travel_destination_list_display_layout' => 'cozy-travel-destination-list-carousel',
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
                            'name' => 'travel_destination_list_display_layout',
                            'operator' => '==',
                            'value' => 'cozy-travel-destination-list-carousel',
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
                            'name' => 'travel_destination_list_display_layout',
                            'operator' => 'in',
                            'value' => ['cozy-travel-destination-list-carousel'],
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
                            'name' => 'travel_destination_list_display_layout',
                            'operator' => 'in',
                            'value' => ['cozy-travel-destination-list-carousel'],
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
                            'name' => 'travel_destination_list_display_layout',
                            'operator' => 'in',
                            'value' => ['cozy-travel-destination-list-carousel'],
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

    /** 
     * Travel List Layout Options
     */

    private function cozy_addons_content_travel_list_options()
    {
        $ct_travelpackage_action_access = false;
        if (cozy_addons_premium_access()) {
            $ct_travelpackage_action_access = true;
        }
        $this->start_controls_section(
            'travel_list',
            [
                'label' => __('Packages List', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        // List Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'travel_destination_image',
            [
                'label' => esc_html__('Destination Image', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'travel_destination',
            [
                'label' => __('Destination Title', 'cozy-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 1,
                'default' => __('Popular Destination', 'cozy-addons'),
                'placeholder' => __('Niagara Falls, Canada', 'cozy-addons'),
            ]
        );

        $repeater->add_control(
            'destination_location',
            [
                'label' => __('Location', 'cozy-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 1,
                'default' => __('Main Street 24, Brooklyn, NY', 'cozy-addons'),
                'placeholder' => __('Destination Location', 'cozy-addons'),
            ]
        );
        $repeater->add_control(
            'select_location_icon',
            [
                'label' => __('Location Icon', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-map-marker-alt',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $repeater->add_control(
            'enable_price_prefix',
            [
                'label' => __('Enable Price Prefix', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $repeater->add_control(
            'price_prefix',
            [
                'label' => __('Price Prefix', 'cozy-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('From', 'cozy-addons'),
                'placeholder' => __('Prefix for Price', 'cozy-addons'),
                'condition' => [
                    'enable_price_prefix' => 'yes',
                ]
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
                'default' => 500.00,
            ]
        );


        $repeater->add_control(
            'travel_duration',
            [
                'label' => __('Duration', 'cozy-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 1,
                'default' => __('8 Days Trip', 'cozy-addons'),
                'placeholder' => __('Travel duration', 'cozy-addons'),
            ]
        );
        $repeater->add_control(
            'select_icon',
            [
                'label' => __('Duration Icon', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-clock',
                    'library' => 'fa-regular',
                ],
            ]
        );

        $repeater->add_control(
            'travel_spotlight',
            [
                'label' => __('Short Description', 'cozy-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 4,
                'default' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'cozy-addons'),
                'placeholder' => __('Short Description', 'cozy-addons'),
            ]
        );

        $repeater->add_control(
            'url_label',
            [
                'label' => __('Button Label', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Explore More', 'cozy-addons'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'url_link',
            [
                'label' => __('Link', 'cozy-addons'),
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
            'url_icon',
            [
                'label' => __('Button Icon', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'fa-solid',
                ],
            ]
        );

        //adding featurs list
        $this->add_control(
            'travel_destination_list',
            [
                'label' => __('Destination List', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'item_actions' => [
                    'add'       => $ct_travelpackage_action_access,
                    'duplicate' => $ct_travelpackage_action_access,
                    'remove'    => true,
                    'sort'      => true,
                    'update'    => true,
                ],
                'default' => [
                    [
                        'travel_destination' => __('Popular Destination', 'cozy-addons'),
                    ],
                    [
                        'travel_destination' => __('Popular Destination', 'cozy-addons'),
                    ],
                    [
                        'travel_destination' => __('Popular Destination', 'cozy-addons'),
                    ],
                ],
                'title_field' => '{{{ travel_destination }}}'

            ]
        );
        if (!cozy_addons_premium_access()) {
            $this->add_control(
                'cozy_travelpackage_list_notice_text',
                [
                    'type' => \Elementor\Controls_Manager::RAW_HTML,
                    'raw' => __('<a href="https://cozythemes.com/cozy-addons/" target="_blank">Upgrade to premium</a> version to get full acess and add/delete unlimited packages!', 'cozy-addons'),
                    'content_classes' => 'ct-upsell-notice',
                ]
            );
        }

        $this->end_controls_section();
    }

    /**
     * Style Box Options.
     */
    private function cozy_addons_travel_destination_list_box_options()
    {
        $this->start_controls_section(
            'travel_destination_list_box_style',
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
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-item' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'box_text_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Text Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-item .travel-destination-content',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                    'line_height' => ['default' => ['size' => 25]],
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
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_description_padding',
            [
                'label'      => __('Content Padding', 'cozy-addons'),
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
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-item .travel-destination-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'label' => __('Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-item',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => __('Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-item',
            ]
        );

        $this->add_control(
            'box_border_radius',
            [
                'label' => __('Border Radius', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-item' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'box_text_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Text Color', 'cozy-addons'),
                'default'   => '#565656',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-item' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->end_controls_section();
    }

    private function cozy_addons_travel_destination_list_image_options()
    {
        $this->start_controls_section(
            'travel_destination_list_image_style',
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
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-list-item img.travel-destination-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_height',
            [
                'label' => 'Height',
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
                    'unit' => 'rem',
                    'size' => 18,
                ],
                'size_units' => ['rem', '%', 'px'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-list-item img.travel-destination-image' => 'height: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'image_width',
            [
                'label' => 'Width',
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
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-list-item img.travel-destination-image' => 'width: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'label' => __('Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-list-item img.travel-destination-image',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_shadow',
                'label' => __('Border Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-list-item img.travel-destination-image',
            ]
        );

        $this->add_control(
            'image_border-radius',
            [
                'label' => __('Border Radius', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'default' => [
                    'top' => '6',
                    'right' => '6',
                    'bottom' => '6',
                    'left' => '6',
                    'isLinked' => true,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-list-item img.travel-destination-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .cozy-addons.travel-destination-list-item:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'image_background_overlay_color',
                'label' => esc_html__('Image Overlay Color', 'cozy-addons'),
                'types' => ['gradient'],
                'condition' => [
                    'enable_ovelay_content_layout' => 'yes',
                ],
                'selector' => '{{WRAPPER}} .cozy-addons-travel-destination-list .cozy-addons.travel-destination-list-item:before',
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_travel_destination_list_title_options()
    {

        $this->start_controls_section(
            'travel_destination_list_text_style',
            [
                'label' => __('Destination Title Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'destination_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Title Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-content .heading .destination',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 18]],
                    'font_weight' => ['default' => 500],
                    'line_height' => ['default' => ['size' => 28]],
                ],
            ]
        );

        $this->add_responsive_control(
            'destination_title_padding',
            [
                'label'      => __('Padding', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '10',
                    'right' => '0',
                    'bottom' => '20',
                    'left' => '0',
                    'isLinked' => false,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-content .heading .destination' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->start_controls_tabs('destination_title_style_tabs');
        // Normal tab.
        $this->start_controls_tab(
            'destination_title_style_tabs_normal',
            [
                'label'     => __('Normal', 'cozy-addons'),
            ]
        );
        // Normal border
        // Box color
        $this->add_control(
            'destination_text_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Destination Text Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#343434',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-list-item .travel-destination-content .heading .destination' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover border.
        $this->start_controls_tab(
            'destination_title_style_tabs_hover',
            [
                'label'     => __('Hover', 'cozy-addons'),
            ]
        );

        // Box color
        $this->add_control(
            'destination_text_color_hover',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Destination Text Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#343434',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-list-item .travel-destination-content .heading .destination:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }

    /**
     * Location style
     */
    private function cozy_addons_travel_destination_location_options()
    {

        $this->start_controls_section(
            'destination_lcoation_style',
            [
                'label' => __('Location Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'location_section_padding',
            [
                'label'      => __('Padding', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '10',
                    'left' => '0',
                    'isLinked' => true,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items .location-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'location_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Location Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items .destination-location',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                    'line_height' => ['default' => ['size' => 28]],
                ],
            ]
        );
        $this->add_control(
            'location_text_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Location Text Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgba(0, 0, 0, 1)',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items .destination-location' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'location_icon_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Icon Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgba(0, 0, 0, 1)',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items  .destination-location .icon' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'location_icon_size',
            [
                'label' => __('Icon Size', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 150,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 14,
                ],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items  .destination-location .icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'location_icon_spacing',
            [
                'label' => __('Icon Spacing', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items  .destination-location .icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();
    }




    /**
     * pricing style
     */
    private function cozy_addons_travel_destination_pricing_options()
    {

        $this->start_controls_section(
            'destination_pricing_style',
            [
                'label' => __('Price Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'pricing_section_padding',
            [
                'label'      => __('Padding', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'isLinked' => true,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items .package-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'pricing_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items .package-price',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                    'line_height' => ['default' => ['size' => 28]],
                ],
            ]
        );
        $this->add_control(
            'price_background_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Background Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgba(0, 0, 0,0)',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items .package-price' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'price_text_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Text Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgba(0, 0, 0, 1)',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items .package-price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'pricing_button_border',
                'label' => __('Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items .package-price',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'pricing_box_shadow',
                'label' => __('Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items .package-price',
            ]
        );

        $this->add_control(
            'pricing_border_radius',
            [
                'label' => __('Border Radius', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items .package-price' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );



        $this->end_controls_section();
    }

    /**
     * Duration style
     */
    private function cozy_addons_travel_destination_list_duration_options()
    {

        $this->start_controls_section(
            'travel_destination_list_duration_style',
            [
                'label' => __('Footer & Duration Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'box_footer_content_align',
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
                    'space-between' => [
                        'title' => __('Justify', 'cozy-addons'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'space-between',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .package-footer' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'footer_section_margin',
            [
                'label'      => __('Margin', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '15',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'isLinked' => true,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items .package-footer' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'footer_section_padding',
            [
                'label'      => __('Padding', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'isLinked' => true,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items .package-footer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'package_footer_border',
                'label' => __('Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items .package-footer',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'duration_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Duration Text Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items .duration',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                    'line_height' => ['default' => ['size' => 28]],
                ],
            ]
        );
        $this->add_control(
            'duration_text_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Duration Text Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgba(0, 0, 0, 1)',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items  .duration' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'duration_icon_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Icon Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgba(0, 0, 0, 1)',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items  .duration-icon' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'duration_icon_size',
            [
                'label' => __('Icon Size', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 150,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 14,
                ],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items  .duration-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'duration_icon_spacing',
            [
                'label' => __('Icon Spacing', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items  .duration-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();
    }
    private function cozy_addons_travel_destination_list_button_options()
    {
        $this->start_controls_section(
            'travel_destination_list_link_style',
            [
                'label' => __('CTA Button Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'cta_button_icon_size',
            [
                'label' => __('Icon Size', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 150,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 14,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-items  .travel-destination-content .destination-more .icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'cta_button_icon_spacing',
            [
                'label' => __('Icon Spacing', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-items  .travel-destination-content .destination-more .icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'cta_button_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-items  .travel-destination-content .destination-more',
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
            'more_url_margin',
            [
                'label'      => __('Margin', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'isLinked' => true,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-list-item .travel-destination-content .destination-more' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'more_button_padding',
            [
                'label'      => __('Padding', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'isLinked' => true,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-list-item .travel-destination-content .destination-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->start_controls_tabs(
            'cozy_addons_box_button_style_tabs'
        );

        $this->start_controls_tab(
            'box_button_normal',
            [
                'label' => esc_html__('Normal', 'cozy-addons'),
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'box_button_border',
                'label' => __('Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-list-item .destination-more',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_button_shadow',
                'label' => __('Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-list-item .destination-more',
            ]
        );

        $this->add_control(
            'box_button_border_radius',
            [
                'label' => __('Border Radius', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-list-item .destination-more' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'url_background_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Background Color', 'cozy-addons'),
                'default'   => 'rgba(255, 255, 255, 1)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-list-item .destination-more' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'url_label_text_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Text Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgba(0, 0, 0, 1)',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-list-item .travel-destination-content .destination-more' => 'color: {{VALUE}} !important;',
                ],
                'separator' => 'before'
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'box_button_hover',
            [
                'label' => esc_html__('Hover', 'cozy-addons'),
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'box_button_border_hover',
                'label' => __('Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-list-item .travel-destination-content .destination-more:hover',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_button_shadow_hover',
                'label' => __('Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-list-item .travel-destination-content .destination-more:hover',
            ]
        );

        $this->add_control(
            'box_button_border_radius_hover',
            [
                'label' => __('Border Radius', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-list-item .travel-destination-content .destination-more:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'url_background_color_hover',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Background Color', 'cozy-addons'),
                'default'   => 'rgba(255, 255, 255, 1)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-list-item .travel-destination-content .destination-more:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'url_label_text_color_hover',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Text Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgba(0, 0, 0, 1)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-travel-destination-list .travel-destination-list-items .travel-destination-list-item .travel-destination-content .destination-more:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    /**
     * slide pagination style
     */
    private function cozy_addons_package_list_carousel_pagination_options()
    {
        $this->start_controls_section(
            'slider_pagination_style',
            [
                'label' => __('Pagination Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_carousel_pagination' => 'yes',
                    'travel_destination_list_display_layout' => 'cozy-travel-destination-list-carousel',
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
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}}  section.cozy-addons-travel-destination-list .cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}}  section.cozy-addons-travel-destination-list .cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}}  section.cozy-addons-travel-destination-list .cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet:hover' => 'background: {{VALUE}};',
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
    private function cozy_addons_package_list_carousel_navigation_options()
    {
        $this->start_controls_section(
            'slider_navigation_style',
            [
                'label' => __('Navigation Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_carousel_navigation' => 'yes',
                    'travel_destination_list_display_layout' => 'cozy-travel-destination-list-carousel',
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
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .cozy-slide-nav' => 'font-size: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .cozy-slide-nav' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .cozy-slide-nav' => 'height: {{SIZE}}{{UNIT}}',
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
                'selector' => '{{WRAPPER}} section.cozy-addons-travel-destination-list .cozy-slide-nav',
            ]
        );
        // Normal border shadow
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'navigation_box_box_shadow',
                'label' => __('Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-travel-destination-list .cozy-slide-nav',
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
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .cozy-slide-nav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .cozy-slide-nav' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .cozy-slide-nav' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .section.cozy-addons-travel-destination-list .cozy-slide-nav:hover',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'navigation_box_shadow_hover',
                'label' => __('Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-travel-destination-list .cozy-slide-nav:hover',
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
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .cozy-slide-nav:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .cozy-slide-nav:hover' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} section.cozy-addons-travel-destination-list .cozy-slide-nav:hover' => 'color: {{VALUE}};',
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
        $overlay_style_class = '';
        if ($settings['enable_ovelay_content_layout'] == 'yes') {
            $overlay_style_class = 'overlay-content-enabled';
        }


?>
        <section class="cozy-addons-travel-destination-list <?php echo esc_attr($overlay_style_class) ?>">
            <?php
            include(COZY_ADDONS_PLUGIN_DIR . 'public/widgets/travel-list/travel-list.php');
            ?>
        </section>
<?php
    }
}
