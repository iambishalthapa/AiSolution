<?php

namespace Cozy_Addons\MenuAccountWidgets;

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
class Cozy_Addons_MenuAccount_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'cozy-addons-menu-account';
    }

    public function get_title()
    {
        return __('My Account', 'cozy-addons');
    }

    public function get_icon()
    {
        return 'eicon-user-circle-o cozy-account-icon cozy-widget-icons';
    }
    public function get_keywords()
    {
        return ['my account menu icon login', 'cozy addons products'];
    }
    public function get_categories()
    {
        return ['cozy-addons-items'];
    }

    protected function register_controls()
    {

        $this->cozy_addons_myaccount_content_options();

        $this->cozy_addons_menu_account_styles();
        $this->cozy_addons_menu_account_login_form_styles();
        $this->login_form_cta_styles();
    }

    /**
     * front content
     */
    private function cozy_addons_myaccount_content_options()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('General', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'account_logged_in_icon',
            [
                'label' => __('Account Icon', 'cozy-addons'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-user-circle',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->add_control(
            'account_icon_size',
            [
                'label' => __('Icon Size', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 30,
                    ],
                ],
                'size_units' => ['px'],
                'default' => [
                    'size' => 30,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account .cozy-menu-account-wrapper i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'enable_account_logged_in_label',
            [
                'label' => __('Enable Account Label', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'account_logged_in_label',
            [
                'label' => __('Account Label', 'cozy-addons'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('My Account', 'cozy-addons'),
                'default' => __('My Account', 'cozy-addons'),
                'condition' => [
                    'enable_account_logged_in_label' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'account_gap',
            [
                'label' => __('Spacing', 'cozy-addons'),
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
                    '{{WRAPPER}} .cozy-addons-menu-account .cozy-menu-account-wrapper' => 'gap: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'enable_account_logged_in_label' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'icon_alignment',
            [
                'label' => __('Icon Alignment', 'cozy-addons'),
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
                'default' => 'end',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account .cozy-menu-account-wrapper' => 'justify-content: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'text_alignment',
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
                'default' => 'right',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account' => 'text-align: {{VALUE}}',
                ]
            ]
        );

        $this->end_controls_section();
    }

    private function cozy_addons_menu_account_styles()
    {
        $this->start_controls_section(
            'cozy_addons_menu_account_styles',
            [
                'label' => __('Icon Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'account_text_typography',
                'label' => __('Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-menu-account a',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                ],
            ]
        );

        $this->add_control(
            'account_icon_box_width',
            [
                'label' => __('Icon Box Width', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 30,
                    ],
                ],
                'size_units' => ['px'],
                'default' => [
                    'size' => 30,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account a i' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_control(
            'account_icon_box_height',
            [
                'label' => __('Icon Box Height', 'cozy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 30,
                    ],
                ],
                'size_units' => ['px'],
                'default' => [
                    'size' => 30,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account a i' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'account_icon_box_height_border_radius',
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
                    '{{WRAPPER}} .cozy-addons-menu-account a i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );


        $this->start_controls_tabs('menu_account_icon_styles');

        $this->start_controls_tab(
            'account_icon_styles',
            [
                'label' => __('Normal', 'cozy-addons'),
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'account_icon_box_height_border',
                'label' => __('Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-menu-account a i',
            ]
        );
        $this->add_control(
            'account_icon_bgcolor',
            [
                'label' => __('Icon Background Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_1,
                ],
                'default'   => 'rgba(0,0,0,0)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account a i' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'account_icon_text_color',
            [
                'label' => __('Icon Text Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_1,
                ],
                'default'   => '#454545',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account a i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'account_icon_color',
            [
                'label' => __('Text Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#000',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'account_icon_styles_hover',
            [
                'label' => __('Hover', 'cozy-addons')
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'account_icon_box_height_border_hover',
                'label' => __('Border Type', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-menu-account a i',
            ]
        );
        $this->add_control(
            'account_icon_bgcolor_hover',
            [
                'label' => __('Icon Background Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_1,
                ],
                'default'   => 'rgba(0,0,0,0)',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account a:hover i' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'account_icon_text_color_hover',
            [
                'label' => __('Icon Text Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_1,
                ],
                'default'   => '#757575',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account a i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'account_icon_color_hover',
            [
                'label' => __('Hover Text Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#ddd',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    private function cozy_addons_menu_account_login_form_styles()
    {
        $this->start_controls_section(
            'cozy_addons_menu_account_login_form_styles',
            [
                'label' => __('Login Form Styles', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'form_text_alignment',
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
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account .cozy-login-form' => 'text-align: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'login_form_text_color',
            [
                'label' => __('Text Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#000',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account .cozy-login-form' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'login_form_typography',
                'label' => __('Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-menu-account .cozy-login-form',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                ],
            ]
        );

        $this->add_control(
            'login_form_input_label_text_color',
            [
                'label' => __('Label Text Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#000',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account .cozy-login-form label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'login_form_label_typography',
                'label' => __('Label Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-menu-account .cozy-login-form label',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                ],
            ]
        );

        $this->add_control(
            'login_form_input_text_color',
            [
                'label' => __('Input Text Color', 'cozy-addons'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#000',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account .cozy-login-form input' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'login_form_input_typography',
                'label' => __('Input Text Typography', 'cozy-addons'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cozy-addons-menu-account .cozy-login-form input',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function login_form_cta_styles()
    {
        $this->start_controls_section(
            'login_form_cta_styles',
            [
                'label' => __('Form CTA Styles', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('form_cta_styles');

        $this->start_controls_tab(
            'cta_styles',
            [
                'label' => __('Normal', 'cozy-addons'),
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'label' => __('Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-menu-account .cozy-login-form button',
            ]
        );
        // Normal border shadow
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'label' => __('Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-menu-account .cozy-login-form button',
            ]
        );
        // Normal border radius
        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account .cozy-login-form button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Box color
        $this->add_control(
            'button_bg_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Background Color', 'cozy-addons'),
                'default'   => '#6EC1E4',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account .cozy-login-form button' => 'background: {{VALUE}};',
                ],
            ]
        );
        //button text color
        $this->add_control(
            'button_text_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Text Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_1,
                ],
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account .cozy-login-form button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'cta_styles_hover',
            [
                'label' => __('Hover', 'cozy-addons'),
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border_hover',
                'label' => __('Hover Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-menu-account .cozy-login-form button:hover',
            ]
        );
        // Normal border shadow
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow_hover',
                'label' => __('Hover Box Shadow', 'cozy-addons'),
                'selector' => '{{WRAPPER}} .cozy-addons-menu-account .cozy-login-form button:hover',
            ]
        );
        // Normal border radius
        $this->add_control(
            'button_border_radius_hover',
            [
                'label' => __('Hover Border Radius', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account .cozy-login-form button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Box color
        $this->add_control(
            'button_bg_color_hover',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Hover Background Color', 'cozy-addons'),
                'default'   => '#61CE70',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account .cozy-login-form button:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        //button text color
        $this->add_control(
            'button_text_color_hover',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Hover Text Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_1,
                ],
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .cozy-addons-menu-account .cozy-login-form button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render($instance = [])
    {
        if (is_plugin_active('woocommerce/woocommerce.php')) {
            $settings = $this->get_settings(); ?>
            <section class="cozy-addons-menu-account">
                <?php
                if (is_user_logged_in()) {
                    // Get the ID of the My Account page
                    $account_page_id = get_option('woocommerce_myaccount_page_id');

                    if ($account_page_id) {
                        // Get the permalink of the My Account page
                        $account_page_url = get_permalink($account_page_id);

                        // Output the My Account page URL
                        echo "<a href='" . esc_url($account_page_url) . "'>";
                    }

                    echo "<div class='cozy-menu-account-wrapper'>";
                    \Elementor\Icons_Manager::render_icon($settings['account_logged_in_icon'], ['aria-hidden' => 'true']);
                    if ('yes' == $settings['enable_account_logged_in_label']) {
                        echo "<span>" . $settings['account_logged_in_label'] . "</span>";
                    }
                    echo "</div>";
                    if ($account_page_id) {
                        echo "</a>";
                    }
                } else {
                    ob_start();
                    wc_get_template('myaccount/form-login.php');
                    $login_form = ob_get_clean();

                    echo "<a class='cozy-login-label'>Login</a>";
                    echo "<div class='cozy-login-form'><div class='close-icon-wrapper'><span class='close-icon'>&times;</span></div>" . $login_form . "</div>";
                }
                ?>
            </section> <!-- featured-layout -->
<?php } else {
            echo __('Please Install & Activate the Woocommerce Plugin', 'cozy-addons');
        }
    }
}
