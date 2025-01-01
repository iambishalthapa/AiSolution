<?php

namespace Cozy_Addons\PageListWidgets;

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
class Cozy_Addons_PageList_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'cozy-addons-page-list';
    }

    public function get_title()
    {
        return __('Pages List', 'cozy-addons');
    }

    public function get_icon()
    {
        return 'eicon-document-file cozy-widget-icons';
    }
    public function get_keywords()
    {
        return ['Pages List', 'cozy addons'];
    }
    public function get_categories()
    {
        return ['cozy-addons-items'];
    }

    protected function register_controls()
    {

        $this->cozy_addons_list_content_options();
    }

    /**
     * front content
     */
    private function cozy_addons_list_content_options()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('General', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_responsive_control(
            'content_align',
            [
                'label' => __('Alignment', 'cozy-addons'),
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
                    '{{WRAPPER}} section.cozy-addons-pages-list' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'pagelist_per_page',
            [
                'label' => __('Post Per Page', 'cozy-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => -1,
                'min' => -1, // Minimum value
                'max' => 1000, // Maximum value
                'step' => 1,
            ]
        );
        $this->add_control(
            'pagelist_columns',
            [
                'label' => __('Display Columns', 'cozy-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 1,
                'min' => 1, // Minimum value
                'max' => 8, // Maximum value
                'step' => 1,
            ]
        );
        $this->add_control(
            'enable_page_list_icon',
            [
                'label' => __('Enable List Icon', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'page_list_icon',
            [
                'label' => __('Icon', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-check',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'enable_page_list_icon' => 'yes'
                ],
            ]
        );
        $this->add_responsive_control(
            'list_icon_size',
            [
                'label' => esc_html__('Icon Size', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 14,
                ],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-pages-list a.ct-page .pagelist-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'enable_page_list_icon' => 'yes'
                ],
            ]
        );
        $this->add_responsive_control(
            'list_icon_spacing',
            [
                'label' => esc_html__('Icon Spacing', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-pages-list a.ct-page .pagelist-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'enable_page_list_icon' => 'yes'
                ],
            ]
        );


        // Description typography.
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'pagelist_content_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} section.cozy-addons-pages-list a.ct-page',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                ],
                'separator' => 'before',
            ]
        );

        // Box internal padding.
        $this->add_responsive_control(
            'pagelist_style_padding',
            [
                'label'      => __('Padding', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '10',
                    'right' => '0',
                    'bottom' => '10',
                    'left' => '0',
                    'isLinked' => false,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} section.cozy-addons-pages-list a.ct-page' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );




        $this->start_controls_tabs('pagelist_style_tabs');
        // Normal tab.
        $this->start_controls_tab(
            'pagelist_style_tabs_normal',
            [
                'label'     => __('Normal', 'cozy-addons'),
            ]
        );

        //button text color
        $this->add_control(
            'pagelist_title_text_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#6EC1E4',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-pages-list a.ct-page' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'pagelist_title_icon_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Icon Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#6EC1E4',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-pages-list a.ct-page .pagelist-icon i' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'enable_page_list_icon' => 'yes'
                ],
            ]
        );
        $this->end_controls_tab();

        // Hover border.
        $this->start_controls_tab(
            'pagelist_style_tabs_normal_hover',
            [
                'label'     => __('Hover', 'cozy-addons'),
            ]
        );
        // Hover border shadow

        //button text color
        $this->add_control(
            'pagelist_title_text_color_hover',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#61CE70',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-pages-list a.ct-page:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'pagelist_title_icon_color_hover',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Icon Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#61CE70',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-pages-list a.ct-page:hover .pagelist-icon i' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'enable_page_list_icon' => 'yes'
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
        <section class="cozy-addons-pages-list pagelist-column-<?php echo esc_attr($settings['pagelist_columns']); ?>">
            <?php
            $pagelist_args = array(
                'post_type'      => 'page',
                'posts_per_page' => $settings['pagelist_per_page'],
            );
            $pagelist_query =  new \WP_Query($pagelist_args);;
            if ($pagelist_query->have_posts()) {
                while ($pagelist_query->have_posts()) {
                    $pagelist_query->the_post();
            ?>
                    <a class="ct-page" href="<?php the_permalink(); ?>">
                        <?php
                        if ($settings['enable_page_list_icon'] === 'yes') {
                            echo '<span class="pagelist-icon">';
                            \Elementor\Icons_Manager::render_icon($settings['page_list_icon'], ['aria-hidden' => 'true']);
                            echo '</span>';
                        }
                        the_title();
                        ?></a>
            <?php
                }
            }
            ?>
        </section> <!-- featured-layout -->
<?php }
}
