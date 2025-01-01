<?php
// Add custom setting to Section block in Elementor
function custom_section_advanced_settings($element)
{
    $element->start_controls_section(
        'cozy_addons_advanced_section_settings',
        [
            'label' => __('Sticky Section -Cozy Blocks', 'cozy-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
        ]
    );


    $element->add_responsive_control(
        'cozy_addons_section_enable_sticky',
        [
            'label' => __('Enable Sticky', 'cozy-addons'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'no',
            'prefix_class' => 'ct-sticky-section-enabled-',
        ]
    );

    $element->add_control(
        'cozy_addons_section_position_type',
        [
            'label' => __('Position type', 'cozy-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'cozy-section-sticky-on-scroll',
            'prefix_class' => 'ct-',
            'options' => [
                'cozy-sticky-on-scroll' => esc_html__('Sticky On Scroll', 'cozy-addons'),
                'cozy-sticky-by-default' => esc_html__('Fixed by Default', 'cozy-addons'),
            ],
            'condition' => [
                'cozy_addons_section_enable_sticky' => 'yes',
            ],
            'selectors' => [
                '{{WRAPPER}}.ct-sticky-section-enabled-yes' => 'position: {{value}}',
            ],
        ]
    );
    $element->add_control(
        'cozy_addons_section_sticky_location',
        [
            'label' => __('Location', 'cozy-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'sticky-top',
            'prefix_class' => 'ct-',
            'options' => [
                'sticky-top' => esc_html__('Top', 'cozy-addons'),
                'sticky-bottom' => esc_html__('Bottom', 'cozy-addons'),
            ],
            'condition' => [
                'cozy_addons_section_enable_sticky' => 'yes',
            ],
        ]
    );
    $element->add_responsive_control(
        'cozy_addons_section_sticky_top_offset',
        [
            'label' => esc_html__('Offset', 'cozy-addons'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'condition' => [
                'cozy_addons_section_enable_sticky' => 'yes',
                'cozy_addons_section_sticky_location' => 'sticky-top',
            ],
            'selectors' => [
                '{{WRAPPER}}.ct-sticky-section-enabled-yes.ct-sticky-top' => 'top: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $element->add_responsive_control(
        'cozy_addons_section_sticky_bottom_offset',
        [
            'label' => esc_html__('Offset', 'cozy-addons'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'condition' => [
                'cozy_addons_section_enable_sticky' => 'yes',
                'cozy_addons_section_sticky_location' => 'sticky-bottom',
            ],
            'selectors' => [
                '{{WRAPPER}}.ct-sticky-section-enabled-yes.ct-sticky-bottom' => 'bottom: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $element->add_responsive_control(
        'cozy_addons_section_sticky_zindex',
        [
            'label' => __('z-index', 'cozy-addons'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 2,
            'min' => 0, // Minimum value
            'max' => 99999, // Maximum value
            'step' => 1,
            'condition' => [
                'cozy_addons_section_enable_sticky' => 'yes',
            ],
            'selectors' => [
                '{{WRAPPER}}.ct-sticky-section-enabled-yes' => 'z-index: {{value}}',
            ],
        ]
    );
    $element->add_responsive_control(
        'cozy_addons_section_enable_sticky_style',
        [
            'label' => __('Enable Sticky Style', 'cozy-addons'),
            'description' => __('Stikcy section styles applies on front view only', 'cozy-addons'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'no',
            'condition' => [
                'cozy_addons_section_enable_sticky' => 'yes',
            ],
        ]
    );
    $element->add_control(
        'section_sticky_background_color',
        [
            'type'      => \Elementor\Controls_Manager::COLOR,
            'label'     => __('Background Color', 'cozy-addons'),
            'default'   => '',
            'selectors' => [
                '{{WRAPPER}}.ct-sticky-section-enabled-yes.ct-section-scrollup' => 'background: {{VALUE}};',
            ],
            'condition' => [
                'cozy_addons_section_enable_sticky' => 'yes',
                'cozy_addons_section_enable_sticky_style' => 'yes'
            ],

        ]
    );
    $element->add_responsive_control(
        'sticky_section_style_padding',
        [
            'label'      => __('Padding', 'cozy-addons'),
            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
            'default'     => [
                'top' => '5',
                'right' => '20',
                'bottom' => '5',
                'left' => '20',
                'isLinked' => true,
            ],
            'size_units' => ['px', '%'],
            'selectors'  => [
                '{{WRAPPER}}.ct-sticky-section-enabled-yes.ct-section-scrollup' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
            ],
            'condition' => [
                'cozy_addons_section_enable_sticky' => 'yes',
                'cozy_addons_section_enable_sticky_style' => 'yes'
            ],
        ]
    );
    $element->end_controls_section();
}
add_action('elementor/element/section/section_advanced/after_section_end', 'custom_section_advanced_settings');

// Add custom CSS section to Section block in Elementor

function cozy_custom_section_advanced_settings($element)
{
    $element->start_controls_section(
        'ct_custom_css_section',
        [
            'label' => __('Custom CSS - Cozy Blocks', 'cozy-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
        ]
    );

    $element->add_control(
        'ct_custom_css',
        [
            'label' => __('Custom CSS Code', 'cozy-addons'),
            'type' => \Elementor\Controls_Manager::CODE,
            'language' => 'css',
            'rows' => 10,
            'default' => '',
            'description' => __('Enter your custom CSS code.', 'cozy-addons'),
        ]
    );

    $element->end_controls_section();
}
add_action('elementor/element/section/section_advanced/after_section_end', 'cozy_custom_section_advanced_settings');


// Render custom styles for Section block in Elementor
function render_custom_section_styles($section)
{
    $settings = $section->get_settings();

    // Get the custom CSS code from the settings
    $custom_css = isset($settings['ct_custom_css']) ? $settings['ct_custom_css'] : '';

    if (!empty($custom_css)) {
        // Output the custom CSS code
        echo '<style>' . $custom_css . '</style>';
    }
}
add_action('elementor/frontend/section/before_render', 'render_custom_section_styles', 10, 1);
