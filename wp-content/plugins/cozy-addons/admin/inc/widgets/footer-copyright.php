<?php

namespace Cozy_Addons\FooterCopyrightWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Core\Schemes\Typography;
use Elementor\Core\Schemes\Color;
use Elementor\Group_Control_Image_Size;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Cozy_Addons_FooterCopyright_Widget extends Widget_Base
{
    public function get_name()
    {
        return 'cozy-addons-footer-copyright';
    }

    public function get_title()
    {
        return __('Footer Copyright Text', 'cozy-addons');
    }

    public function get_icon()
    {
        return 'eicon-footer cozy-widget-icons';
    }
    public function get_keywords()
    {
        return ['footer copyright', 'cozy addons'];
    }
    public function get_categories()
    {
        return ['cozy-addons-items'];
    }

    protected function register_controls()
    {
        $this->cozy_addons_footer_copyright_contents();

        $this->cozy_addons_footer_copyright_styles();
    }

    private function cozy_addons_footer_copyright_contents()
    {
        $this->start_controls_section(
            'cozy_addons_footer_copyright_contents',
            [
                'label' => __( 'General', 'cozy-addons' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'enable_copyright_year',
            [
                'label' => __( 'Enable Copyright Year', 'cozy-addons' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'enable_copyright_icon',
            [
                'label' => __( 'Enable Copyright Icon', 'cozy-addons' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'copyright_text_alignment',
            [
                'label' => __( 'Text Alignment', 'cozy-addons' ),
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
                        'title' => __( 'Left', 'cozy-addons' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-footer-copyright' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'copyright_icon',
            [
                'label' => __( 'Copyright Icon', 'cozy-addons' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-copyright',
                    'library' => 'fa-regular',
                ],
                'condition' => [
                    'enable_copyright_icon' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'copyright_icon_style',
            [
                'label' => __( 'Icon Style', 'cozy-addons' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'icon-default' => __( 'Default', 'cozy-addons' ),
                    'icon-sup' => __( 'Superscript', 'cozy-addons' ), 
                ],
                'default' => 'icon-default',
                'condition' => [
                    'enable_copyright_icon' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'copyright_icon_size',
            [
                'label' => __( 'Icon Size', 'cozy-addons' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 40,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-footer-copyright i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'enable_copyright_icon' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'copyright_before_text',
            [
                'label' => __( 'Before Text', 'cozy-addons' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Before Text', 'cozy-addons' ),
                'default' => __( 'Copyright', 'cozy-addons' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'copyright_middle_text',
            [
                'label' => __( 'Middle Text', 'cozy-addons' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Middle Text', 'cozy-addons' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'copyright_after_text',
            [
                'label' => __( 'After Text', 'cozy-addons' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'After Text', 'cozy-addons' ),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_footer_copyright_styles()
    {
        $this->start_controls_section(
            'cozy_addons_footer_copyright_styles',
            [
                'label' => __( 'Copyright Styles', 'cozy-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'copyright_text_color',
            [
                'label' => __( 'Text Color', 'cozy-addons' ),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-footer-copyright' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'copyright_icon_color',
            [
                'label' => __( 'Icon Color', 'cozy-addons' ),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#B6B6B6',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-footer-copyright i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'copyright_text_typography',
                'label' => __('Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-footer-copyright',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                ],
            ]
        );

        $this->start_controls_tabs('copyright_url_styles');

        $this->start_controls_tab(
            'copyright_url_normal',
            [
                'label' => __( 'Normal', 'cozy-addons' ),
            ]
        );

        $this->add_control(
            'copyright_url_color',
            [
                'label' => __( 'Link Color', 'cozy-addons' ),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#1740FF',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-footer-copyright a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'url_text_typography',
                'label' => __('Link Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-footer-copyright a',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'copyright_url_hover',
            [
                'label' => __( 'Hover', 'cozy-addons' ),
            ]
        );

        $this->add_control(
            'copyright_url_color_hover',
            [
                'label' => __( 'Hover Link Color', 'cozy-addons' ),
                'type' => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#737683',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-footer-copyright a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'url_text_typography_hover',
                'label' => __('Hover Link Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-footer-copyright a:hover',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
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
        <section class="cozy-addons-footer-copyright">
            <?php
            echo $settings['copyright_before_text'];

            if( 'yes' == $settings['enable_copyright_icon'] ){
                if( 'icon-sup' == $settings['copyright_icon_style'] ){
                    echo "<sup>";
                }
                \Elementor\Icons_Manager::render_icon($settings['copyright_icon'], ['aria-hidden' => 'true']);
                if( 'icon-sup' == $settings['copyright_icon_style'] ){
                    echo "</sup>";
                }
            }
            echo $settings['copyright_middle_text'];
            
            if( 'yes' == $settings['enable_copyright_year'] ){
                echo " " . date('Y');
            }
            echo $settings['copyright_after_text'];
            
            ?>
        </section>
<?php
    }
}