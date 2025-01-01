<?php

namespace Cozy_Addons\EventsListWidgets;

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
class Cozy_Addons_EventsList_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'cozy-addons-events-list';
    }

    public function get_title()
    {
        return __('Events List', 'cozy-addons');
    }

    public function get_icon()
    {
        return 'eicon-post cozy-events-icon cozy-widget-icons';
    }
    public function get_keywords()
    {
        return ['events list', 'cozy addons products'];
    }
    public function get_categories()
    {
        return ['cozy-addons-items'];
    }

    protected function register_controls()
    {

        $this->cozy_addons_eventslist_options();
        $this->cozy_addons_events_list_content_options();

        $this->cozy_addons_events_box_styles();
        $this->cozy_addons_events_list_image_options();
        $this->cozy_addons_calendar_styles();
        $this->cozy_addons_events_content_styles();
        $this->cozy_addons_events_list_guest_details_styles();
        $this->cozy_addons_events_list_carousel_pagination_options();
        $this->cozy_addons_events_list_carousel_navigation_options();
        $this->cozy_addons_events_list_cta_button();
    }

    /**
     * front content
     */
    private function cozy_addons_eventslist_options()
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
                'events_list_display_layout',
                [
                    'label' => __('Display Layout', 'cozy-addons'),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'cozy-events-list' => esc_html__('List', 'cozy-addons'),
                        'cozy-events-descriptive-list' => esc_html__('Descriptive List', 'cozy-addons'),
                        'cozy-events-list-grid' => esc_html__('Grid', 'cozy-addons'),
                        'cozy-events-list-carousel' => esc_html__('Carousel', 'cozy-addons'),
                    ],
                    'default' => 'cozy-events-list-grid',

                ]
            );
        } else {
            $this->add_control(
                'events_list_display_layout',
                [
                    'label' => __('Display Layout', 'cozy-addons'),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'cozy-events-list' => esc_html__('List', 'cozy-addons'),
                        'cozy-events-list-grid' => esc_html__('Grid', 'cozy-addons'),
                    ],
                    'default' => 'cozy-events-list-grid',

                ]
            );
        }

        //Columns select for grid and carousel layout
        if (cozy_addons_premium_access()) {
            $this->add_control(
                'events_list_column',
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
                        'events_list_display_layout' => 'cozy-events-list-grid',
                    ],
                ]
            );
            $this->add_control(
                'events_carousel_content_layout',
                [
                    'label' => __('Content Display Layout', 'cozy-addons'),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'grid' => __('Grid', 'cozy-addons'),
                        'flex' => __('Flex', 'cozy-addons'),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .cozy-addons-events .cozy-events-list-items.cozy-events-list-carousel .cozy-events-list-item' => 'display: {{VALUE}}',
                    ],
                    'default' => 'grid',
                    'condition' => [
                        'events_list_display_layout' => 'cozy-events-list-carousel',
                    ],
                ]
            );
            $this->add_control(
                'events_carousel_post_per_view',
                [
                    'label' => __('Display Column', 'cozy-addons'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 3,
                    'min' => 1, // Minimum value
                    'max' => 6, // Maximum value
                    'step' => 0.1,
                    'condition' => [
                        'events_list_display_layout' => 'cozy-events-list-carousel',
                    ],
                ]
            );
        } else {
            $this->add_control(
                'events_list_column',
                [
                    'label' => __('Display Column', 'cozy-addons'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'col-3',
                    'options' => [
                        'col-3' => esc_html__('3 Column', 'cozy-addons'),
                    ],
                    'condition' => [
                        'events_list_display_layout' => 'cozy-events-list-grid',
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
            'events_grid_gap',
            [
                'label' => __('Rows/Columns Gap', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-events-list-items.cozy-events-list-grid' => 'grid-gap: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .cozy-events-list-items.cozy-events-descriptive-list' => 'grid-gap: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'events_list_display_layout' => ['cozy-events-list-grid', 'cozy-events-descriptive-list'],
                ],
            ]
        );

        $this->add_responsive_control(
            'events_display_list_gap',
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
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-events-list-items.cozy-events-list .cozy-events-list-item' => 'gap: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .cozy-events-list-items.cozy-events-descriptive-list .cozy-events-list-item' => 'gap: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'events_list_display_layout' => ['cozy-events-list', 'cozy-events-descriptive-list'],
                ],
            ]
        );

        $this->add_control(
            'events_display_list_justify_content',
            [
                'label' => __('Justify Content'),
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
                    ],
                    'space-between' => [
                        'title' => __('Justify', 'cozy-addons'),
                        'icon' => 'eicon-h-align-stretch',
                    ],
                ],
                'default' => 'space-between',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-items.cozy-events-list .cozy-events-list-item' => 'justify-content: {{VALUE}};',
                ],
                'condition' => [
                    'events_list_display_layout' => 'cozy-events-list',
                ],
            ]
        );

        $this->add_responsive_control(
            'events_display_list_date_width',
            [
                'label' => __( 'Event Date Width', 'cozy-addons' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'rem' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 1,
                    ],
                ],
                'size_units' => [ 'px', 'rem', '%' ],
                'default' => [
                    'unit' => 'rem',
                    'size' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-items.cozy-events-list .event-date' => 'width: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'events_list_display_layout' => 'cozy-events-list',
                ],
            ]
        );

        $this->add_responsive_control(
            'events_display_list_title_width',
            [
                'label' => __( 'Event Title Width', 'cozy-addons' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'rem' => [
                        'min' => 1,
                        'max' => 20,
                        'step' => 1,
                    ],
                ],
                'size_units' => [ 'px', 'rem', '%' ],
                'default' => [
                    'unit' => 'rem',
                    'size' => 11,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-items.cozy-events-list .event-title' => 'width: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'events_list_display_layout' => 'cozy-events-list',
                ],
            ]
        );

        $this->add_responsive_control(
            'events_display_list_venue_width',
            [
                'label' => __( 'Event Venue Width', 'cozy-addons' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'rem' => [
                        'min' => 1,
                        'max' => 20,
                        'step' => 1,
                    ],
                ],
                'size_units' => [ 'px', 'rem', '%' ],
                'default' => [
                    'unit' => 'rem',
                    'size' => 11,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-items.cozy-events-list .event-venue' => 'width: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'events_list_display_layout' => 'cozy-events-list',
                ],
            ]
        );

        $this->add_responsive_control(
            'events_display_list_cta_button_width',
            [
                'label' => __( 'Event CTA Button Width', 'cozy-addons' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'rem' => [
                        'min' => 1,
                        'max' => 20,
                        'step' => 1,
                    ],
                ],
                'size_units' => [ 'px', 'rem', '%' ],
                'default' => [
                    'unit' => 'rem',
                    'size' => 11,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-items .cta-button' => 'width: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'events_list_display_layout!' => 'cozy-events-list-grid',
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
                    'events_list_display_layout' => 'cozy-events-list-carousel',
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
                            'name' => 'events_list_display_layout',
                            'operator' => '==',
                            'value' => 'cozy-events-list-carousel',
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
                            'name' => 'events_list_display_layout',
                            'operator' => 'in',
                            'value' => ['cozy-events-list-carousel'],
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
                            'name' => 'events_list_display_layout',
                            'operator' => 'in',
                            'value' => ['cozy-events-list-carousel'],
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
                            'name' => 'events_list_display_layout',
                            'operator' => '==',
                            'value' => 'cozy-events-list-carousel',
                        ],
                        [
                            'name' => 'show_carousel_navigation',
                            'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_events_list_content_options()
    {
        $ct_property_action_access = false;
        if (cozy_addons_premium_access()) {
            $ct_property_action_access = true;
        }

        $this->start_controls_section(
            'events_list_content',
            [
                'label' => __('Event List', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'add_image',
            [
                'label' => __('Enable Image', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $repeater->add_control(
            'events_image',
            [
                'label' => esc_html__('Event Image', 'cozy-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'add_image' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'event_title',
            [
                'label' => __('Event Title', 'cozy-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 1,
                'default' => __('Event Title', 'cozy-addons'),
                'placeholder' => __('Event Title', 'cozy-addons'),
            ]
        );

        $repeater->add_control(
            'event_venue',
            [
                'label' => __('Event Venue', 'cozy-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 1,
                'default' => __('Event Venue', 'cozy-addons'),
                'placeholder' => __('Los Angeles', 'cozy-addons'),
            ]
        );

        $repeater->add_control(
            'enable_event_venue_link',
            [
                'label' => __('Enable Link', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $repeater->add_control(
            'venue_link',
            [
                'label'  => __('Event Link', 'cozy-addons'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'https:://venue-location.com',
            ]
        );

        $repeater->add_control(
            'event_date',
            [
                'label' => esc_html__('Event Date', 'cozy-addons'),
                'type' => Controls_Manager::DATE_TIME,
            ]
        );

        $repeater->add_control(
            'enable_time',
            [
                'label' => __('Enable Time', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $repeater->add_control(
            'enable_guest_speaker',
            [
                'label' => __( 'Enable Guest', 'cozy-addons' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $repeaterSpeaker = new \Elementor\Repeater();

        $repeaterSpeaker->add_control(
            'guest_image',
            [
                'label' => __('Guest Name', 'cozy-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeaterSpeaker->add_control(
            'guest_name',
            [
                'label' => __('Guest Name', 'cozy-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('John Doe', 'cozy-addons'),
                'placeholder' => __('Guest Name', 'cozy-addons'),
            ]
        );

        $repeaterSpeaker->add_control(
            'guest_designation',
            [
                'label' => __('Guest Designation', 'cozy-addons'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('Designation', 'cozy-addons'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'guest_details',
            [
                'label' => __('Guest Details', 'cozy-addons'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeaterSpeaker->get_controls(),
                'default' => [
                    [
                        'guest_name' => __('John Doe', 'cozy-addons'),
                    ]
                ],
                'item_actions' => [
                    'add' => false,
                ],
                'title_field' => '{{{guest_name}}}',
                'condition' => [
                    'enable_guest_speaker' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'event_description',
            [
                'label' => __('Event Description', 'cozy-addons'),
                'type' => Controls_Manager::WYSIWYG,
                'placholder' => __('Event Description', 'cozy-addons'),
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
                'placeholder' => __('Currency Symbol', 'cozy-addons'),
                'condition' => [
                    'select_currency' => 'cozy_addons_custom',
                ],
            ]
        );

        $repeater->add_control(
            'price_amount',
            [
                'label' => __('Price', 'cozy-addons'),
                'type' => Controls_Manager::TEXT,
                'min' => 0,
                'step' => 1,
                'default' => 11,
            ]
        );

        $repeater->add_control(
            'sold_out_option',
            [
                'label' => __('Sold Out?', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $repeater->add_control(
            'sold_out_label',
            [
                'label' => __('Sold Out Label', 'cozy-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Sold Out', 'cozy-addons'),
                'placeholder' => __('Sold Out', 'cozy-addons'),
                'condition' => [
                    'sold_out_option' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'enable_ticket',
            [
                'label' => __('Enable Booking Link', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'condition' => [
                    'sold_out_option!' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'enable_cta_icon',
            [
                'label' => __('Enable Icon', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'condition' => [
                    'enable_ticket' => 'yes',
                    'sold_out_option!' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'cta_icon',
            [
                'label' => __('CTA Icon', 'cozy-addons'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-ticket-alt',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'enable_ticket' => 'yes',
                    'enable_cta_icon' => 'yes',
                    'sold_out_option!' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'button_label',
            [
                'label' => __('Button Label', 'cozy-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Buy Tickets', 'cozy-addons'),
                'placeholder' => __('Book your seat now', 'cozy-addons'),
                'condition' => [
                    'enable_ticket' => 'yes',
                    'sold_out_option!' => 'yes',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => __('Button Link', 'cozy-addons'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://event-ticket.com',
                'condition' => [
                    'enable_ticket' => 'yes',
                    'sold_out_option!' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'events_list',
            [
                'label' => __('Events List', 'cozy-addons'),
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
                        'event_title' => __('Event Title', 'cozy-addons'),
                    ],
                    [
                        'event_title' => __('Event Title', 'cozy-addons'),
                    ],
                    [
                        'event_title' => __('Event Title', 'cozy-addons'),
                    ]
                ],
                'title_field' => '{{{ event_title }}}'

            ]
        );
        if (!cozy_addons_premium_access()) {
            $this->add_control(
                'cozy_events_list_notice_text',
                [
                    'type' => \Elementor\Controls_Manager::RAW_HTML,
                    'raw' => __('<a href="https://cozythemes.com/cozy-addons/" target="_blank">Upgrade to premium</a> version to get full acess and add/delete unlimited properties list!', 'cozy-addons'),
                    'content_classes' => 'ct-upsell-notice',
                ]
            );
        }

        $this->end_controls_section();
    }

    private function cozy_addons_events_box_styles()
    {
        $this->start_controls_section(
            'events_box_styles',
            [
                'label' => __('Box Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
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
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'box_content_padding',
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
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .event-details' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'label' => __('Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item',
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
                'selector' => '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item',
            ]
        );

        $this->add_control(
            'box_border_radius',
            [
                'label' => __('Border Radius', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'box_background_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Background Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgba(255, 255, 255, 1)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'box_text_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Text Color', 'cozy-addons'),
                'default'   => '#3A3A3A',
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'box_horizontal_alignment',
            [
                'label' => __('Horizontal Alignment', 'cozy-addons'),
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
                        'title' => __('Right', 'cozy-addons'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'box_text_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Text Typography', 'cozy-addons'),

                'selectors' => '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 500],
                    'line_height' => ['default' => ['size' => 28]],
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_events_list_image_options()
    {
        $this->start_controls_section(
            'events_image_list_style',
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
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .event-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .event-image img' => 'height: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'image_wrapper_width',
            [
                'label' => __('Image Wrapper Width', 'cozy-addons'),
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
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .event-image' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .event-image img' => 'width: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'Image_border',
                'label' => __('Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .event-image img',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'Image_shadow',
                'label' => __('Border Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .event-image img',
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
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .event-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_calendar_styles()
    {
        $this->start_controls_section(
            'cozy_addons_calendar_styles',
            [
                'label' => __( 'Calendar Styles', 'cozy-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'events_list_display_layout' => 'cozy-events-descriptive-list',
                ],
            ]
        );

        $this->add_control(
            'calendar_width',
            [
                'label' => __( 'Width', 'cozy-addons' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 150,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-items .date' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'calendar_text_alignment',
            [
                'label' => __('Text Alignment', 'cozy-addons'),
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
                        'title' => __('Right', 'cozy-addons'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-items .date' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'weekdays_padding',
            [
                'label' => __('Weekdays Padding', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['%', 'px'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-events-list-items.cozy-events-descriptive-list .weekdays' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'weekdays_border_radius',
            [
                'label' => __('Weekdays Border Radius', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['%', 'px'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-events-list-items.cozy-events-descriptive-list .weekdays' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'weekdays_background_color',
            [
                'label' => __('Weekdays Background Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#ddd',
                'selectors' => [
                    '{{WRAPPER}} .cozy-events-list-items.cozy-events-descriptive-list .weekdays' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'weekdays_text_color',
            [
                'label' => __('Weekdays Text Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#000',
                'selectors' => [
                    '{{WRAPPER}} .cozy-events-list-items.cozy-events-descriptive-list .weekdays' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'weekdays_text_typography',
                'label' => __('Weekdays Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-events-list-items.cozy-events-descriptive-list .weekdays',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                ],
            ]
        );

        $this->add_control(
            'day_text_color',
            [
                'label' => __('Day Text Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#000',
                'selectors' => [
                    '{{WRAPPER}} .cozy-events-list-items.cozy-events-descriptive-list .day' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'day_text_typography',
                'label' => __('Day Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-events-list-items.cozy-events-descriptive-list .day',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 25]],
                    'font_weight' => ['default' => 500],
                ],
            ]
        );

        $this->add_control(
            'month_background_color',
            [
                'label' => __('Month Background Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'blue',
                'selectors' => [
                    '{{WRAPPER}} .cozy-events-list-items.cozy-events-descriptive-list .month' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'month_text_color',
            [
                'label' => __('Month Text Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .cozy-events-list-items.cozy-events-descriptive-list .month' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'month_text_typography',
                'label' => __('Month Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-events-list-items.cozy-events-descriptive-list .month',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 600],
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_events_content_styles()
    {
        $this->start_controls_section(
            'events_content_styles',
            [
                'label' => __('Content Styles', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'event_title_color',
            [
                'label' => __('Event Title Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'default'   => '#5A5A5A',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .event-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'event_title_text_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Title Text Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .event-title',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 18]],
                    'font_weight' => ['default' => 500],
                    'line_height' => ['default' => ['size' => 28]],
                ],
                'separator' => 'before',
            ]
        );

        $this->start_controls_tabs('event_venue_hover');

        $this->start_controls_tab(
            'event_venue_link',
            [
                'label' => __('Normal'),
            ]
        );

        $this->add_control(
            'event_venue_color',
            [
                'label' => __('Event Venue Text Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'default'   => 'blue',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .event-venue a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'event_venue_text_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Event Venue Text Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .event-venue a',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                    'line_height' => ['default' => ['size' => 28]],
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'event_venue_link_hover',
            [
                'label' => __('Hover'),
            ]
        );

        $this->add_control(
            'event_venue_color_hover',
            [
                'label' => __('Hover Event Venue Text Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'default'   => 'green',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .event-venue:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'event_venue_text_typography_hover',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Hover Event Venue Text Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .event-venue:hover a',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 18]],
                    'font_weight' => ['default' => 500],
                    'line_height' => ['default' => ['size' => 28]],
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    private function cozy_addons_events_list_guest_details_styles()
    {
        $this->start_controls_section(
            'cozy_addons_events_list_guest_details_styles',
            [
                'label' => __('Guest Details Styles', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'events_list_display_layout',
                            'operator' => 'in',
                            'value' => [
                                'cozy-events-descriptive-list',
                                'cozy-events-list-grid',
                                'cozy-events-list-carousel',
                            ],
                        ],
                    ],
                ],
            ]
        );

        $this->add_responsive_control(
            'guest_details_padding',
            [
                'label'      => __('Padding', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '10',
                    'right' => '20',
                    'bottom' => '0',
                    'left' => '20',
                    'isLinked' => false,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-events-list-item .guest-details-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'guest_details_horizontal_spacing',
            [
                'label' => __('Horizontal Spacing', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 30,
                    ],
                ],
                'size_units' => ['px', '%'],
                'default' => [
                    'size' => 15,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-items.cozy-events-list-grid .guest-details-wrapper .guest-detail' => 'margin: {{SIZE}}{{UNIT}} 0',
                ],
                'condition' => [
                    'events_list_display_layout' => 'cozy-events-list-grid',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'property_owner_section_border',
                'label' => __('Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-events-list-item .guest-details-wrapper',
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
            'guest_photo_width',
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
                    '{{WRAPPER}} .cozy-events-list-item .guest-details-wrapper img' => 'width: {{SIZE}}{{UNIT}};',
                ]
            ]
        );
        $this->add_responsive_control(
            'guest_photo_height',
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
                    '{{WRAPPER}} .cozy-events-list-item .guest-details-wrapper img' => 'height: {{SIZE}}{{UNIT}};',
                ]
            ]
        );
        $this->add_control(
            'guest_photo_border_radius',
            [
                'label' => __('Image Border Radius', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'default' => [
                    'top' => '50',
                    'right' => '50',
                    'bottom' => '50',
                    'left' => '50',
                    'isLinked' => true,
                    'unit' => '%',
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-events-list-item .guest-details-wrapper img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_events_list_cta_button()
    {
        $this->start_controls_section(
            'cta_button_styles',
            [
                'label' => __('CTA Button Styles', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'cta_button_margin',
            [
                'label'      => __('Margin', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .cta-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'cta_button_padding',
            [
                'label'      => __('Padding', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '10',
                    'right' => '10',
                    'bottom' => '10',
                    'left' => '10',
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .cta-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'cta_button_horizontal_spacing',
            [
                'label' => __('Text Spacing', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 30,
                    ],
                ],
                'default' => [
                    'size' => 5,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .cta-button span' => 'margin: 0 {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'cta_button_text_alignment',
            [
                'label' => __('Text Alignment', 'cozy-addons'),
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
                        'title' => __('Right', 'cozy-addons'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .cta-button' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->start_controls_tabs('cta_button_hover_effect');

        $this->start_controls_tab(
            'cta_button_normal',
            [
                'label' => __('Normal', 'cozy-addons'),
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => __('Icon Size', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 14,
                        'max' => 30,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .cta-button i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cta_button_border',
                'label' => __('Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .cta-button',

            ]
        );

        $this->add_responsive_control(
            'cta_button_border_radius',
            [
                'label'      => __('Border Radius', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '6',
                    'right' => '6',
                    'bottom' => '6',
                    'left' => '6',
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .cta-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'cta_button_background_color',
            [
                'label' => __('Background Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_1,
                ],
                'default'   => '#ddd',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .cta-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cta_button_text_color',
            [
                'label' => __('Text Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_1,
                ],
                'default'   => '#4D4D4D',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .cta-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'cta_button_text_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Text Typography', 'cozy-addons'),

                'selectors' => '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .cta-button',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 500],
                    'line_height' => ['default' => ['size' => 28]],
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'cta_button_hover',
            [
                'label' => __('Hover', 'cozy-addons'),
            ]
        );

        $this->add_control(
            'icon_size_hover',
            [
                'label' => __('Hover Icon Size', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 14,
                        'max' => 30,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .cta-button:hover i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cta_button_border_hover',
                'label' => __('Hover Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .cta-button:hover',
            ]
        );

        $this->add_responsive_control(
            'cta_button_border_radius_hover',
            [
                'label'      => __('Hover Border Radius', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '10',
                    'right' => '10',
                    'bottom' => '10',
                    'left' => '10',
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .cta-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'cta_button_background_color_hover',
            [
                'label' => __('Hover Background Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_1,
                ],
                'default'   => '#C5C5C5',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .cta-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cta_button_text_color_hover',
            [
                'label' => __('Hover Text Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_1,
                ],
                'default'   => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .cta-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'cta_button_text_typography_hover',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Hover Text Typography', 'cozy-addons'),

                'selectors' => '{{WRAPPER}} .cozy-addons-events .cozy-events-list-item .cta-button:hover',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 500],
                    'line_height' => ['default' => ['size' => 28]],
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    private function cozy_addons_events_list_carousel_pagination_options()
    {
        $this->start_controls_section(
            'slider_pagination_style',
            [
                'label' => __('Pagination Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_carousel_pagination' => 'yes',
                    'events_list_display_layout' => 'cozy-events-list-carousel',
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
                    '{{WRAPPER}} .cozy-addons-events .cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}}  .cozy-addons-events .cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}}  .cozy-addons-events .cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}}  .cozy-addons-events .cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} .cozy-addons-events .cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet:hover' => 'background: {{VALUE}};',
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
    private function cozy_addons_events_list_carousel_navigation_options()
    {
        $this->start_controls_section(
            'slider_navigation_style',
            [
                'label' => __('Navigation Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_carousel_navigation' => 'yes',
                    'events_list_display_layout' => 'cozy-events-list-carousel',
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
                    '{{WRAPPER}} .cozy-addons-events .cozy-slide-nav' => 'font-size: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .cozy-addons-events .cozy-slide-nav' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .cozy-addons-events .cozy-slide-nav' => 'height: {{SIZE}}{{UNIT}}',
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
                'selector' => '{{WRAPPER}} .cozy-addons-events .cozy-slide-nav',
            ]
        );
        // Normal border shadow
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'navigation_box_box_shadow',
                'label' => __('Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-events .cozy-slide-nav',
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
                    '{{WRAPPER}} .cozy-addons-events .cozy-slide-nav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .cozy-addons-events .cozy-slide-nav' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} .cozy-addons-events .cozy-slide-nav' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .cozy-addons-events .cozy-slide-nav:hover',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'navigation_box_shadow_hover',
                'label' => __('Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-events .cozy-slide-nav:hover',
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
                    '{{WRAPPER}} .cozy-addons-events .cozy-slide-nav:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .cozy-addons-events .cozy-slide-nav:hover' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} .cozy-addons-events .cozy-slide-nav:hover' => 'color: {{VALUE}};',
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
        <section class="cozy-addons-events">
            <?php
            include COZY_ADDONS_PLUGIN_DIR . 'public/widgets/events-list/events-list.php';
            ?>
        </section> <!-- featured-layout -->
<?php }
}
