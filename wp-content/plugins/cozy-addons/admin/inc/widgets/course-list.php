<?php

namespace Cozy_Addons\CourseListWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes\Color;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Cozy_Addons_Course_List_Widget extends Widget_Base
{
    public function get_name()
    {
        return 'cozy-addons-course-list';
    }

    public function get_title()
    {
        return __('Course List', 'cozy-addons');
    }

    public function get_icon()
    {
        return 'fas fa-graduation-cap cozy-course-icon cozy-widget-icons';
    }

    public function get_keywords()
    {
        return [
            'cozy addons',
            'course list',
            'online course',
            'lms',
        ];
    }

    public function get_categories()
    {
        return ['cozy-addons-items'];
    }

    protected function register_controls()
    {
        $this->cozy_addons_query_options();
        $this->cozy_addons_content_options();

        $this->cozy_addons_box_model_styles();
        $this->cozy_addons_course_featured_image_styles();
        $this->cozy_addons_course_title_styles();
        $this->cozy_addons_course_section_styles();
        $this->cozy_addons_course_lecturer_styles();
        $this->cozy_addons_course_cta_button_styles();
        $this->cozy_addons_course_list_carousel_pagination_options();
        $this->cozy_addons_course_list_carousel_navigation_options();
    }

    private function cozy_addons_query_options()
    {

        $this->start_controls_section(
            'cozy_addons_course_list_query_section',
            [
                'label' => esc_html__('General Settings', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        if (cozy_addons_premium_access()) {
            $this->add_control(
                'cozy_layout',
                [
                    'label' => __('Select Layout', 'cozy-addons'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'cozy-layout-grid',
                    'options' => [
                        'cozy-layout-grid' => __("Grid", 'cozy-addons'),
                        'cozy-layout-carousel' => __("Carousel", 'cozy-addons'),
                    ],
                ]
            );
        } else {
            $this->add_control(
                'cozy_layout',
                [
                    'label' => __('Select Layout', 'cozy-addons'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'cozy-layout-grid',
                    'options' => [
                        'cozy-layout-grid' => __("Grid", 'cozy-addons'),
                    ],
                ]
            );
        }
        if (cozy_addons_premium_access()) {
            $this->add_control(
                'cozy_grid_column',
                [
                    'label' => __('Display Column', 'cozy-addons'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'cozy-col-3',
                    'options' => [
                        'cozy-col-1' => esc_html__('1 Column', 'cozy-addons'),
                        'cozy-col-2' => esc_html__('2 Column', 'cozy-addons'),
                        'cozy-col-3' => esc_html__('3 Column', 'cozy-addons'),
                        'cozy-col-4' => esc_html__('4 Column', 'cozy-addons'),
                    ],
                    'condition' => [
                        'cozy_layout' => 'cozy-layout-grid',
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
                        'cozy_layout' => 'cozy-layout-carousel',
                    ],
                ]
            );
        } else {
            $this->add_control(
                'cozy_grid_column',
                [
                    'label' => __('Display Column', 'cozy-addons'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'cozy-col-3',
                    'options' => [
                        'cozy-col-3' => esc_html__('3 Column', 'cozy-addons'),
                    ],
                    'condition' => [
                        'cozy_layout' => 'cozy-layout-grid',
                    ],
                ]
            );
            $this->add_control(
                'cozy_notice_layout_notice_text',
                [
                    'type' => \Elementor\Controls_Manager::RAW_HTML,
                    'raw' => __('<a href="https://cozythemes.com/cozy-addons/" target="_blank">Upgrade to premium</a> version to unlock carousel layout and columns option for both layout', 'cozy-addons'),
                    'content_classes' => 'ct-upsell-notice',
                ]
            );
        }

        $this->add_control(
            'cozy_grid_gap',
            [
                'label' => __('Column Gap', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.course-list-items' => 'grid-gap: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'cozy_layout' => 'cozy-layout-grid',
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
                    'cozy_layout' => 'cozy-layout-carousel',
                ],
            ]
        );

        $this->add_control(
            'show_carousel_pagination',
            [
                'label' => __('Carousel Pagination', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'condition' => [
                    'cozy_layout' => 'cozy-layout-carousel',
                ]
            ]

        );

        $this->add_control(
            'show_carousel_navigation',
            [
                'label' => __('Carousel Navigation', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'condition' => [
                    'cozy_layout' => 'cozy-layout-carousel',
                ],
            ]
        );

        $this->add_control(
            'slide_navigation_left_icon',
            [
                'label' => __('Preview Icon', 'cozy-addons'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-angle-left',
                    'library' => 'fa-solid',
                ],
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'cozy_layout',
                            'operator' => 'in',
                            'value' => ['cozy-layout-carousel'],
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

        $this->add_control(
            'slide_navigation_right_icon',
            [
                'label' => __('Preview Icon', 'cozy-addons'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-angle-right',
                    'library' => 'fa-solid',
                ],
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'cozy_layout',
                            'operator' => '==',
                            'value' => ['cozy-layout-carousel'],
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

    private function cozy_addons_content_options()
    {
        $ct_course_action_access = false;
        if (cozy_addons_premium_access()) {
            $ct_course_action_access = true;
        }
        $this->start_controls_section(
            'cozy_addons_course_list_content_section',
            [
                'label' => esc_html__('Add Courses', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'cozy_course_featured_image',
            [
                'label' => __('Featured Image', 'cozy-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'cozy_course_title',
            [
                'label' => __('Title'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Course Title', 'cozy-addons'),
                'placeholder' => __('Course Title', 'cozy-addons'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'cozy_course_duration',
            [
                'label' => __('Course Duration', 'cozy-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('10 days', 'cozy-addons'),
                'placeholder' => __('e.g. 10 days', 'cozy-addons'),
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
                'label' => __('Custom Currency', 'cozy-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Currency Symbol', 'cozy-addons'),
                'placeholder' => __('Add Period Cycle', 'cozy-addons'),
                'condition' => [
                    'select_currency' => 'cozy_addons_custom',
                ],
            ]
        );

        $repeater->add_control(
            'cozy_price',
            [
                'label' => __('Course Price', 'cozy-addons'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'step' => 5,
                'default' => 33,
            ]
        );

        $repeater->add_control(
            'hr1',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );

        $repeater->add_control(
            'cozy_course_description',
            [
                'label' => __('Course Description'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'cozy-addons'),
                'placeholder' => __('Short Description', 'cozy-addons'),
            ]
        );

        $repeater->add_control(
            'hr2',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );

        $repeater->add_control(
            'cozy_enable_lecturer',
            [
                'label' => __('Show Lecturer', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $repeater->add_control(
            'cozy_course_lecturer_image',
            [
                'label' => __('Lecturer Image', 'cozy-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'cozy_enable_lecturer' => 'yes',
                ]
            ]
        );

        $repeater->add_control(
            'cozy_course_lecturer_name',
            [
                'label' => __('Lecturer Name', 'cozy-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('John Doe', 'cozy-addons'),
                'placeholder' => __('e.g. John Doe', 'cozy-addons'),
                'label_block' => true,
                'condition' => [
                    'cozy_enable_lecturer' => 'yes',
                ]
            ]
        );

        $repeater->add_control(
            'cozy_course_cta_label',
            [
                'label' => __('Button Label', 'cozy-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Read More', 'cozy-addons'),
                'placeholder' => __('Button Label', 'cozy-addons'),
            ]
        );

        $repeater->add_control(
            'cozy_course_cta_link',
            [
                'label' => __('Link', 'cozy-addons'),
                'type' => Controls_Manager::URL,
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
            'cozy_course_cta_icon',
            [
                'label' => __('Button Icon', 'cozy-addons'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'fa-solid',
                ]
            ]
        );

        $this->add_control(
            'cozy_course_list',
            [
                'label' => __('Course List', 'cozy-addons'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'item_actions' => [
                    'add'       => $ct_course_action_access,
                    'duplicate' => $ct_course_action_access,
                    'remove'    => true,
                    'sort'      => true,
                    'update'    => true,
                ],
                'default' => [
                    [
                        'cozy_course_title' => __('Popular Course', 'cozy-addons'),
                    ],
                    [
                        'cozy_course_title' => __('Popular Course', 'cozy-addons'),
                    ],
                    [
                        'cozy_course_title' => __('Popular Course', 'cozy-addons'),
                    ],
                ],
                'title_field' => '{{{ cozy_course_title }}}',
            ]
        );
        if (!cozy_addons_premium_access()) {
            $this->add_control(
                'cozy_courses_list_notice_text',
                [
                    'type' => \Elementor\Controls_Manager::RAW_HTML,
                    'raw' => __('<a href="https://cozythemes.com/cozy-addons/" target="_blank">Upgrade to premium</a> version to get full acess and add/delete unlimited courses!', 'cozy-addons'),
                    'content_classes' => 'ct-upsell-notice',
                ]
            );
        }
        $this->end_controls_section();
    }

    /**
     * Style Box Options.
     */
    private function cozy_addons_box_model_styles()
    {
        $this->start_controls_section(
            'cozy_course_list_box_style',
            [
                'label' => __('Box Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
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
                    '{{WRAPPER}} .cozy-addons-course-list .course-list-items' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'box_text_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Text Typography', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-course-list .course-list-items',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                    'line_height' => ['default' => ['size' => 25]],
                ],
            ]
        );

        $this->add_control(
            'box_text_color',
            [
                'label' => __('Text Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPPER}} .cozy-addons-course-list .course-list-items' => 'color: {{VALUE}};',
                ],
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
                    '{{WRAPPER}} .cozy-addons-course-list .course-list-items .course-list-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
                    '{{WRAPPER}} .cozy-addons-course-list .course-list-items .course-list-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'box_content_padding',
            [
                'label'      => __('Content Padding', 'cozy-addons'),
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
                    '{{WRAPPER}} .cozy-addons-course-list .course-list-items .course-list-item .course-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'label' => __('Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-course-list .course-list-items .course-list-item',
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
                'selector' => '{{WRAPPER}} .cozy-addons-course-list .course-list-items .course-list-item',
            ]
        );

        $this->add_control(
            'box_border_radius',
            [
                'label' => __('Border Radius', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-course-list .course-list-items .course-list-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'box_background_color',
            [
                'label'     => __('Background Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => 'rgba(255, 255, 255, 1)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-course-list .course-list-items .course-list-item' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_course_featured_image_styles()
    {
        $this->start_controls_section(
            'cozy_course_featured_image_style',
            [
                'label' => __('Image Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'image_margin',
            [
                'label' => __('Margin', 'cozy-addons'),
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
                    '{{WRAPPER}} .cozy-addons-course-list .course-list-items .course-list-item .course-list-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
                    '{{WRAPPER}} .cozy-addons-course-list .course-list-items .course-list-item .course-list-image' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .cozy-addons-course-list .course-list-items .course-list-item .course-list-image' => 'width: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'label' => __('Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-course-list .course-list-items .course-list-item .course-list-image',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_shadow',
                'label' => __('Border Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-course-list .course-list-items .course-list-item .course-list-image',
            ]
        );

        $this->add_control(
            'image_border-radius',
            [
                'label' => __('Border Radius', 'cozy-addons'),
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
                    '{{WRAPPER}} .cozy-addons-course-list .course-list-items .course-list-item .course-list-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_course_title_styles()
    {
        $this->start_controls_section(
            'cozy_course_content_style',
            [
                'label' => __('Course Title Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'course_title_padding',
            [
                'label' => __('Padding', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '10',
                    'left' => '0',
                    'isLinked' => true,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons.course-list-item .course-content .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'course_title_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Text Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} .cozy-addons.course-list-item .course-content .title',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 20]],
                    'font_weight' => ['default' => 500],
                    'line_height' => ['default' => ['size' => 28]],
                ],

            ]
        );

        $this->start_controls_tabs('course_list_title_style_tabs');

        $this->start_controls_tab(
            'course_list_tabs_normal',
            [
                'label' => __('Normal', 'cozy-addons'),
            ]
        );

        $this->add_control(
            'course_title_color',
            [
                'label'     => __('Text Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#4B4B4B',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.course-list-item .course-content .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'course_list_tabs_hover',
            [
                'label' => __('Hover', 'cozy-addons'),
            ]
        );

        $this->add_control(
            'course_title_color_hover',
            [
                'label'     => __('Text Hover Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#4B4B4B',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.course-list-item .course-content .title:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    private function cozy_addons_course_section_styles()
    {
        $this->start_controls_section(
            'course_list_price_styles',
            [
                'label' => __('Course Duration & Price Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'course_section_padding',
            [
                'label' => __('Padding', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '10',
                    'left' => '0',
                    'isLinked' => true,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons.course-list-item .course-content .course-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'hr3',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'course_duration_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Duration Text Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} .cozy-addons.course-list-item .course-content .course-section .duration',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 20]],
                    'font_weight' => ['default' => 500],
                    'line_height' => ['default' => ['size' => 28]],
                ],

            ]
        );

        $this->add_control(
            'duration_background_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Duration Background Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgba(0, 0, 0,0)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.course-list-item .course-content .course-section .duration' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} .cozy-addons.course-list-item .course-content .course-section .duration' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'duration_border',
                'label' => __('Duration Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons.course-list-item .course-content .course-section .duration',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'duration_box_shadow',
                'label' => __('Duration Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons.course-list-item .course-content .course-section .duration',
            ]
        );

        $this->add_control(
            'duration_border_radius',
            [
                'label' => __('Duration Border Radius', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.course-list-item .course-content .course-section .duration' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'hr4',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'course_price_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Price Text Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} .cozy-addons.course-list-item .course-content .course-section .price',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 20]],
                    'font_weight' => ['default' => 500],
                    'line_height' => ['default' => ['size' => 28]],
                ],

            ]
        );

        $this->add_control(
            'price_background_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Price Background Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgba(0, 0, 0,0)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.course-list-item .course-content .course-section .price' => 'background: {{VALUE}};',
                ],
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
                'default'   => 'rgba(0, 0, 0, 1)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.course-list-item .course-content .course-section .price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'pricing_button_border',
                'label' => __('Price Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons.course-list-item .course-content .course-section .price',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'pricing_box_shadow',
                'label' => __('Price Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons.course-list-item .course-content .course-section .price',
            ]
        );

        $this->add_control(
            'pricing_border_radius',
            [
                'label' => __('Price Border Radius', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.course-list-item .course-content .course-section .price' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_course_lecturer_styles()
    {
        $this->start_controls_section(
            'course_lecturer_styles',
            [
                'label' => __('Footer & Lecturer Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'course_footer_top_spacing',
            [
                'label' => __('Footer Vertical Spacing', 'cozy-addons'),
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
                    'size' => 10,
                ],
                'size_units' => ['rem', '%', 'px'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.course-footer' => 'margin-top: {{SIZE}}{{UNIT}};',
                ]
            ]
        );
        $this->add_responsive_control(
            'course_lecturer_padding',
            [
                'label'      => __('Footer Padding', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '10',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'isLinked' => false,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cozy-addons.course-footer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'course_lecturer_section_border',
                'label' => __('Footer Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons.course-footer',
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
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'course_lecturer_name_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Lecturer Text Typography', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons.course-footer .lecturer-info',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                    'line_height' => ['default' => ['size' => 28]],
                ],
            ]
        );

        $this->add_control(
            'course_lecturer_name_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Text Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#616161',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.course-footer .lecturer-info' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->add_responsive_control(
            'course_lecturer_image_width',
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
                    '{{WRAPPER}} .cozy-addons.course-footer .lecturer-info .lecturer-image' => 'width: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'course_lecturer_image_height',
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
                    '{{WRAPPER}} .cozy-addons.course-footer .lecturer-info .lecturer-image' => 'height: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'course_lecturer_image_border_radius',
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
                    '{{WRAPPER}} .cozy-addons.course-footer .lecturer-info .lecturer-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_course_cta_button_styles()
    {
        $this->start_controls_section(
            'cozy_course_cta_button_styles',
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
                    '{{WRAPPER}} .cozy-addons.course-cta-button .cta-link .icon' => 'font-size: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .cozy-addons.course-cta-button .cta-link .icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'cta_button_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Text Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} .cozy-addons.course-cta-button',
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
            'cta_button_margin',
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
                    '{{WRAPPER}} .cozy-addons.course-cta-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'cta_button_padding',
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
                    '{{WRAPPER}} .cozy-addons.course-cta-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->start_controls_tabs('cta_buttons_hover_effect');
        $this->start_controls_tab(
            'cta_button_normal',
            [
                'label' => __('Normal', 'cozy-addons'),
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cta_button_border',
                'label' => __('Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons.course-cta-button',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'cta_button_shadow',
                'label' => __('Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons.course-cta-button',
            ]
        );

        $this->add_control(
            'cta_button_border_radius',
            [
                'label' => __('Border Radius', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.course-cta-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'cta_button_background_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Background Color', 'cozy-addons'),
                'default'   => 'rgba(255, 255, 255, 1)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.course-cta-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cta_button_text_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Text Color', 'cozy-addons'),
                'default'   => 'rgba(0, 0, 0, 1)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.course-cta-button .cta-link' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'cta_button_hover',
            [
                'label' => __('Hover', 'cozy-addons'),
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cta_button_border_hover',
                'label' => __('Hover Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons.course-cta-button:hover',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'cta_button_shadow_hover',
                'label' => __('Hover Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons.course-cta-button:hover',
            ]
        );

        $this->add_control(
            'cta_button_border_radius_hover',
            [
                'label' => __('Hover Border Radius', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.course-cta-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'cta_button_background_color_hover',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Hover Background Color', 'cozy-addons'),
                'default'   => 'rgba(255, 255, 255, 1)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.course-cta-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cta_button_text_color_hover',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Hover Text Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgba(0, 0, 0, 1)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons.course-cta-button .cta-link:hover' => 'color: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    /**
     * slide pagination style
     */
    private function cozy_addons_course_list_carousel_pagination_options()
    {
        $this->start_controls_section(
            'slider_pagination_style',
            [
                'label' => __('Pagination Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_carousel_pagination' => 'yes',
                    'cozy_layout' => 'cozy-layout-carousel',
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
                    '{{WRAPPER}} section.cozy-addons-course-list .cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}}  section.cozy-addons-course-list .cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}}  section.cozy-addons-course-list .cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}}  section.cozy-addons-course-list .cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} section.cozy-addons-course-list .cozy-swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet:hover' => 'background: {{VALUE}};',
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
    private function cozy_addons_course_list_carousel_navigation_options()
    {
        $this->start_controls_section(
            'slider_navigation_style',
            [
                'label' => __('Navigation Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_carousel_navigation' => 'yes',
                    'cozy_layout' => 'cozy-layout-carousel',
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
                    '{{WRAPPER}} section.cozy-addons-course-list .cozy-slide-nav' => 'font-size: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} section.cozy-addons-course-list .cozy-slide-nav' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} section.cozy-addons-course-list .cozy-slide-nav' => 'height: {{SIZE}}{{UNIT}}',
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
                'selector' => '{{WRAPPER}} section.cozy-addons-course-list .cozy-slide-nav',
            ]
        );
        // Normal border shadow
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'navigation_box_box_shadow',
                'label' => __('Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-course-list .cozy-slide-nav',
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
                    '{{WRAPPER}} section.cozy-addons-course-list .cozy-slide-nav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} section.cozy-addons-course-list .cozy-slide-nav' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} section.cozy-addons-course-list .cozy-slide-nav' => 'color: {{VALUE}};',
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
                'label' => __('Hover Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .section.cozy-addons-course-list .cozy-slide-nav:hover',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'navigation_box_shadow_hover',
                'label' => __('Hover Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-course-list .cozy-slide-nav:hover',
            ]
        );

        // Hover border radius
        $this->add_control(
            'navigation_box_border_radius_hover',
            [
                'label' => __('Hover Border Radius', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-course-list .cozy-slide-nav:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Box color
        $this->add_control(
            'navigation_box_bg_color_hover',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Hover Background Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_1,
                ],
                'default'   => '#61CE70',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-course-list .cozy-slide-nav:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        //button text color
        $this->add_control(
            'navigation_box_text_color_hover',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Hover Text Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-course-list .cozy-slide-nav:hover' => 'color: {{VALUE}};',
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
        <section class="<?php echo $this->get_name(); ?>">
            <?php
            include COZY_ADDONS_PLUGIN_DIR . 'public/widgets/course-list/course-list.php';
            ?>
        </section>
<?php
    }
}
