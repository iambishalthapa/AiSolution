<?php

namespace Cozy_Addons\SiteLogoWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Core\Schemes\Color;


if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Cozy_Addons_SiteLogo_Widget extends Widget_Base
{
    public function get_name()
    {
        return 'cozy-addons-site-logo';
    }

    public function get_title()
    {
        return __('Site Logo', 'cozy-addons');
    }

    public function get_icon()
    {
        return ' eicon-site-logo cozy-widget-icons ';
    }

    public function get_keywords()
    {
        return [
            'cozy addons',
            'logo',
            'site',
            'identity',
        ];
    }

    public function get_categories()
    {
        return ['cozy-addons-items'];
    }

    protected function register_controls()
    {
        $this->cozy_addons_siteLogo_content_options();

        $this->cozy_addons_site_logo_style_options();
        $this->cozy_addons_site_title_style_options();
    }

    private function cozy_addons_siteLogo_content_options()
    {
        $this->start_controls_section(
            'cozy_site_logo_content',
            [
                'label' => __('General', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'enable_site_logo',
            [
                'label' => __('Enable Logo', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'site_logo_option',
            [
                'label' => __('Select Logo Source', 'cozy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'wp-site-logo' => 'Default',
                    'custom' => 'Custom',
                ],
                'default' => 'wp-site-logo',
                'condition' => [
                    'enable_site_logo' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'custom_logo',
            [
                'label' => __('Logo', 'cozy-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'site_logo_option' => 'custom',
                    'enable_site_logo' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'site_logo_position',
            [
                'label' => __('Logo Position', 'cozy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'above-title' => __('Above Title', 'cozy-addons'),
                    'beside-title' => __('Beside Title', 'cozy-addons'),
                ],
                'default' => 'above-title',
                'condition' => [
                    'enable_site_logo' => 'yes',
                    'enable_site_title' => 'yes',
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
            'enable_site_title',
            [
                'label' => __('Enable Site Title', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'site_title_option',
            [
                'label' => __('Select Title Source', 'cozy-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'wp-site-title',
                'options' => [
                    'wp-site-title' => __('Default', 'cozy-addons'),
                    'custom' => __('Custom', 'cozy-addons'),
                ],
            ]
        );

        $this->add_control(
            'custom_site_title',
            [
                'label' => __('Site Title', 'cozy-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Site Title',
                'placeholder' => 'Site Title',
                'label_block' => true,
                'condition' => [
                    'enable_site_title' => 'yes',
                    'site_title_option' => 'custom',
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
            'enable_site_link',
            [
                'label' => __('Enable Site Link', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'enable_site_logo',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'enable_site_title',
                            'operator' => '==',
                            'value' => 'yes',
                        ]
                    ],
                ]
            ]
        );

        $this->add_control(
            'site_link_option',
            [
                'label' => __('Site Link Options', 'cozy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'wp-site-link' => __('Default', 'cozy-addons'),
                    'custom' => __('Custom', 'cozy-addons'),
                ],
                'default' => 'wp-site-link',
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'enable_site_link',
                            'operator' => '===',
                            'value' => 'yes',

                        ],
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name' => 'enable_site_logo',
                                    'operator' => '==',
                                    'value' => 'yes',
                                ],
                                [
                                    'name' => 'enable_site_title',
                                    'operator' => '==',
                                    'value' => 'yes',
                                ],
                            ],
                        ],
                    ]

                ],
            ]
        );

        $this->add_control(
            'custom_site_link',
            [
                'label' => __('Custom Link', 'cozy-addons'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://www.your-link.com',
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'enable_site_link',
                            'operator' => '===',
                            'value' => 'yes',

                        ],
                        [
                            'name' => 'site_link_option',
                            'operator' => '===',
                            'value' => 'custom',
                        ],
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name' => 'enable_site_logo',
                                    'operator' => '==',
                                    'value' => 'yes',
                                ],
                                [
                                    'name' => 'enable_site_title',
                                    'operator' => '==',
                                    'value' => 'yes',
                                ],
                            ],
                        ],
                    ]

                ],

            ]
        );

        $this->add_responsive_control(
            'content_alignment',
            [
                'label' => __('Alignment', 'cozy-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => esc_html__('Left', 'textdomain'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'textdomain'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'end' => [
                        'title' => esc_html__('Right', 'textdomain'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'start',
                'selectors' => [
                    '{{WRAPPER}} .cozy-site-identity-wrapper' => 'align-items: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_site_logo_style_options()
    {
        $this->start_controls_section(
            'cozy_site_logo_style_options',
            [
                'label' => __('Logo Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'site_logo_background_color',
            [
                'label' => __('Background Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => 'rgba(0,0,0,0)',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-site-logo .cozy-site-identity-wrapper .site-logo img' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'enable_site_link' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'site_logo_wrapper_width',
            [
                'label' => __('Logo Wrapper Width', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-site-logo .cozy-site-identity-wrapper' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'site_logo_width',
            [
                'label' => __('Logo Size', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 200,
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-site-logo .cozy-site-identity-wrapper .site-logo img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'site_logo_padding',
            [
                'label' => __('Logo Spacing', 'cozy-addons'),
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
                    '{{WRAPPER}} section.cozy-addons-site-logo .cozy-site-identity-wrapper .site-logo img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]

        );



        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'site_logo_border',
                'label' => __('Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-site-logo .cozy-site-identity-wrapper .site-logo img',
            ]
        );

        $this->add_responsive_control(
            'site_logo_margin',
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
                    '{{WRAPPER}} section.cozy-addons-site-logo .cozy-site-identity-wrapper .site-logo img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],

            ]
        );

        $this->add_control(
            'site_logo_border_radius',
            [
                'label' => __('Border Radius', 'cozy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [
                    'px',
                    '%',
                ],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-site-logo .cozy-site-identity-wrapper .site-logo img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_site_title_style_options()
    {
        $this->start_controls_section(
            'cozy_site_title_style_options',
            [
                'label' => __('Title Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_site_title' => 'yes',
                ]
            ]
        );

        $this->add_responsive_control(
            'site_title_marign',
            [
                'label'      => __('Margin', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '10',
                    'right' => '10',
                    'bottom' => '10',
                    'left' => '10',
                    'isLinked' => false,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} section.cozy-addons-site-logo .cozy-site-identity-wrapper .site-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'site_title_padding',
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
                    '{{WRAPPER}} section.cozy-addons-site-logo .cozy-site-identity-wrapper .site-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'site_title_typography',
                'label' => __('Title Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} section.cozy-addons-site-logo .cozy-site-identity-wrapper',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 20]],
                    'font_weight' => ['default' => 600],
                ],
            ]
        );

        $this->add_control(
            'site_title_text_color',
            [
                'label'     => __('Title Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#000000',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-site-logo .cozy-site-identity-wrapper' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'enable_site_link!' => 'yes',
                ]
            ]
        );

        $this->start_controls_tabs('site_link_enabled');
        $this->start_controls_tab(
            'site_link_normal',
            [
                'label' => __('Normal', 'cozy-addons'),
                'condition' => [
                    'enable_site_link' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'site_url_color',
            [
                'label' => __('Title Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#000000',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-site-logo .cozy-site-identity-wrapper a' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'enable_site_link' => 'yes',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'site_link_hover',
            [
                'label' => __('Hover', 'cozy-addons'),
                'condition' => [
                    'enable_site_link' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'site_url_color_hover',
            [
                'label' => __('Hover Title Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#000000',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-site-logo .cozy-site-identity-wrapper a' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'enable_site_link' => 'yes',
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
        <section class="cozy-addons-site-logo <?php echo $settings['site_logo_position'] ?>">
            <?php
            include COZY_ADDONS_PLUGIN_DIR . 'public/widgets/site-logo/site-logo.php';
            ?>
        </section>
<?php
    }
}
