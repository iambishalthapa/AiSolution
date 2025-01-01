<?php

namespace Cozy_Addons\DynamicTimezoneWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Core\Schemes\Typography;
use Elementor\Core\Schemes\Color;
use Elementor\Group_Control_Image_Size;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Cozy_Addons_DynamicTimezone_Widget extends Widget_Base
{
    public function get_name()
    {
        return 'cozy-addons-dynamic-timezone';
    }

    public function get_title()
    {
        return __('Date & Time', 'cozy-addons');
    }

    public function get_icon()
    {
        return 'eicon-clock-o cozy-clock-icon cozy-widget-icons';
    }
    public function get_keywords()
    {
        return [
            'dynamic timezone',
            'cozy addons',
            'current date and time',
            'current time',
        ];
    }
    public function get_categories()
    {
        return ['cozy-addons-items'];
    }

    protected function register_controls()
    {
        $this->cozy_addons_dynamic_timezone_contents();

        $this->cozy_addons_dynamic_timezone_date_styles();
        $this->cozy_addons_dynamic_timezone_time_styles();
    }

    private function cozy_addons_dynamic_timezone_contents()
    {
        $this->start_controls_section(
            'cozy_addons_dynamic_timezone_contents',
            [
                'label' => __('General', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'enable_date',
            [
                'label' => __('Enable Date', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'enable_day',
            [
                'label' => __('Enable Day', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'condition' => [
                    'enable_date' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'enable_time',
            [
                'label' => __('Enable Time', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'enable_12_hour_format',
            [
                'label' => __('Enable 12hr format', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'condition' => [
                    'enable_time' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'enable_icon',
            [
                'label' => __('Enable Icon', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'date_icon',
            [
                'label' => __('Icon', 'cozy-addons'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-clock',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'enable_icon' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'display_type',
            [
                'label' => __('Display', 'cozy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'flex' => __('Inline', 'cozy-addons'),
                    'block' => __('Block', 'cozy-addons'),
                ],
                'default' => 'flex',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-dynamic-timezone' => 'display: {{VALUE}}',
                ],
                'condition' => [
                    'enable_date' => 'yes',
                    'enable_time' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'flex_gap',
            [
                'label' => __('Gap', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-dynamic-timezone' => 'gap: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'enable_date' => 'yes',
                    'enable_time' => 'yes',
                    'display_type' => 'flex',
                ],
            ]
        );

        $this->add_control(
            'general_text_color',
            [
                'label' => __('Text Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#505050',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-dynamic-timezone' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'enable_date' => 'yes',
                    'enable_time' => 'yes',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'general_text_typography',
                'label' => __('Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-dynamic-timezone',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                ],
                'condition' => [
                    'enable_date' => 'yes',
                    'enable_time' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'general_text_alignment_block',
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
                    '{{WRAPPER}} .cozy-addons-dynamic-timezone' => 'text-align: {{VALUE}}',
                ],
                'condition' => [
                    'enable_date' => 'yes',
                    'enable_time' => 'yes',
                    'display_type' => 'block',
                ],
            ]
        );

        $this->add_responsive_control(
            'general_text_alignment_flex',
            [
                'label' => __('Text Alignment', 'cozy-addons'),
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
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-dynamic-timezone' => 'justify-content: {{VALUE}}',
                ],
                'condition' => [
                    'enable_date' => 'yes',
                    'enable_time' => 'yes',
                    'display_type' => 'flex',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_dynamic_timezone_date_styles()
    {
        $this->start_controls_section(
            'cozy_addons_dynamic_timezone_date_styles',
            [
                'label' => __('Date Styles', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_date' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'date_text_color',
            [
                'label' => __('Text Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-dynamic-timezone .current-date' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'enable_date' => 'yes',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'date_text_typography',
                'label' => __('Text Typography', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-dynamic-timezone .current-date',
                'condition' => [
                    'enable_date' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'date_text_alignment',
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
                        'title' => __('Left', 'cozy-addons'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-dynamic-timezone .current-date' => 'text-align: {{VALUE}}',
                ],
                'condition' => [
                    'enable_date' => 'yes',
                    'display_type' => 'block',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_dynamic_timezone_time_styles()
    {
        $this->start_controls_section(
            'cozy_addons_dynamic_timezone_time_styles',
            [
                'label' => __('Time Styles', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_time' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'time_padding',
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
                    '{{WRAPPER}} .cozy-addons-dynamic-timezone #current-time' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
                'condition' => [
                    'enable_time' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'time_background_color',
            [
                'label' => __('Background Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-dynamic-timezone #current-time' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'enable_time' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'time_text_color',
            [
                'label' => __('Text Color', 'cozy-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-dynamic-timezone #current-time' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'enable_time' => 'yes',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'time_text_typography',
                'label' => __('Text Typography', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-dynamic-timezone #current-time',
                'condition' => [
                    'enable_time' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'time_text_alignment',
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
                        'title' => __('Left', 'cozy-addons'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-dynamic-timezone #current-time' => 'text-align: {{VALUE}}',
                ],
                'condition' => [
                    'enable_time' => 'yes',
                    'display_type' => 'block',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render($instance = [])
    {
        $settings = $this->get_settings();
        $time_format = '';

        if ('yes' == $settings['enable_12_hour_format']) {
            $time_format = true;
        } else {
            $time_format = false;
        }
?>
        <section class="cozy-addons-dynamic-timezone" data-time_format="<?php echo $time_format ?>">
            <?php
            
            ?>
            <?php
            if ('yes' == $settings['enable_date']) {
                if ('yes' == $settings['enable_day']) {
                    $current_date = date_i18n('l, j M Y');
                } else {
                    $current_date = date_i18n('j M Y');
                }
                
                echo "<p class='current-date'>";
                if ('yes' == $settings['enable_icon']) {
                    \Elementor\Icons_Manager::render_icon($settings['date_icon'], ['aria-hidden' => 'true']);
                }
                echo " " . $current_date; 
                echo "</p>";
            }

            if ('yes' == $settings['enable_time']) {
                echo "<p id='current-time'></p>";
            }
            ?>
        </section>
<?php
    }
}
