<?php

namespace Cozy_Addons\PostCategoriesWidgets;

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
class Cozy_Addons_PostCategories_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'cozy-addons-post-categories';
    }

    public function get_title()
    {
        return __('Post Categories', 'cozy-addons');
    }

    public function get_icon()
    {
        return 'eicon-theme-builder cozy-widget-icons';
    }
    public function get_keywords()
    {
        return ['Post Categories', 'cozy addons'];
    }
    public function get_categories()
    {
        return ['cozy-addons-items'];
    }

    protected function register_controls()
    {

        $this->cozy_addons_list_content_options();
        $this->cozy_addons_cta_style_box_options();
        $this->cozy_addons_cta_style_count_options();
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
        $this->add_control(
            'enable_category_count',
            [
                'label' => __('Enable Post Count', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );
        $this->add_control(
            'categories_count_alignment',
            [
                'label' => __('Count Alignment', 'cozy-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'align-default',
                'options' => [
                    'align-default' => esc_html__('Default', 'cozy-addons'),
                    'align-inline' => esc_html__('Inline', 'cozy-addons'),
                ],
                'condition' => [
                    'enable_category_count' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'enable_cat_list_icon',
            [
                'label' => __('Enable List Icon', 'cozy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'cat_list_icon',
            [
                'label' => __('Icon', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-check',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'enable_cat_list_icon' => 'yes'
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
                    '{{WRAPPER}} section.cozy-addons-post-categories .content-holder .title a i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'enable_cat_list_icon' => 'yes'
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
                    '{{WRAPPER}} section.cozy-addons-post-categories .content-holder .title a i' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'enable_cat_list_icon' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'catlist_columns',
            [
                'label' => __('Display Columns', 'cozy-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 1,
                'min' => 1, // Minimum value
                'max' => 8, // Maximum value
                'step' => 1,
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Style Box Options.
     */
    private function cozy_addons_cta_style_box_options()
    {

        // Box.
        $this->start_controls_section(
            'section_style_box',
            [
                'label' => __('Box Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
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
                    '{{WRAPPER}} section.cozy-addons-post-categories .content-holder .title a' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        // Description typography.
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'catlist_content_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} section.cozy-addons-post-categories .content-holder .title a',
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
            'catlist_style_margin',
            [
                'label'      => __('Margin', 'cozy-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'     => [
                    'top' => '5',
                    'right' => '0',
                    'bottom' => '5',
                    'left' => '0',
                    'isLinked' => false,
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} section.cozy-addons-post-categories .content-holder .title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'catlist_style_padding',
            [
                'label'      => __('padding', 'cozy-addons'),
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
                    '{{WRAPPER}} section.cozy-addons-post-categories .content-holder .title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'post_category_list_border',
                'label' => __('Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-post-categories .content-holder .title a',
            ]
        );



        $this->start_controls_tabs('catlist_style_tabs');
        // Normal tab.
        $this->start_controls_tab(
            'catlist_style_tabs_normal',
            [
                'label'     => __('Normal', 'cozy-addons'),
            ]
        );

        //button text color
        $this->add_control(
            'catlist_title_text_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#6EC1E4',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-post-categories .content-holder .title a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'catlist_title_icon_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Icon Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#6EC1E4',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-post-categories .content-holder .title a i' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'enable_cat_list_icon' => 'yes'
                ],
            ]
        );
        $this->end_controls_tab();

        // Hover border.
        $this->start_controls_tab(
            'catlist_style_tabs_normal_hover',
            [
                'label'     => __('Hover', 'cozy-addons'),
            ]
        );
        // Hover border shadow

        //button text color
        $this->add_control(
            'catlist_title_text_color_hover',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#61CE70',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-post-categories .content-holder .title a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'catlist_title_icon_color_hover',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Icon Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#61CE70',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-post-categories .content-holder .title a i' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'enable_cat_list_icon' => 'yes'
                ],
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->end_controls_section();
    }

    /**
     * Style Box Options.
     */
    private function cozy_addons_cta_style_count_options()
    {

        // Box.
        $this->start_controls_section(
            'post_count_style_box',
            [
                'label' => __('Count Style', 'cozy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_category_count' => 'yes'
                ],
            ]
        );
        // Description typography.
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'catlist_count_typography',
                'scheme'   => Typography::TYPOGRAPHY_1,
                'label' => __('Typography', 'cozy-addons'),

                'selector' => '{{WRAPPER}} section.cozy-addons-post-categories .content-holder .count',
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
            'catlist_style_count_padding',
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
                    '{{WRAPPER}} section.cozy-addons-post-categories .content-holder .count' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'categories_count_spacing',
            [
                'label' => esc_html__('Count Spacing', 'cozy-addons'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 250,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-post-categories .content-holder .count' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'categories_count_alignment' => 'align-inline',

                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'category_post_count_border',
                'label' => __('Border', 'cozy-addons'),
                'selector' => '{{WRAPPER}} section.cozy-addons-post-categories .content-holder .count',
            ]
        );
        $this->add_control(
            'category_post_count_border_radius',
            [
                'label' => __('Border Radius', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-post-categories .content-holder .count' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );



        $this->start_controls_tabs('catlist_style_count_tabs');
        // Normal tab.
        $this->start_controls_tab(
            'catlist_style_count_tabs_normal',
            [
                'label'     => __('Normal', 'cozy-addons'),
            ]
        );

        //button text color
        $this->add_control(
            'catlist_count_background_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Background Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgba(0,0,0,0)',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-post-categories .content-holder .count' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'catlist_count_text_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#6EC1E4',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-post-categories .content-holder .count' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->end_controls_tab();

        // Hover border.
        $this->start_controls_tab(
            'catlist_style_count_tabs_hover',
            [
                'label'     => __('Hover', 'cozy-addons'),
            ]
        );
        // Hover border shadow

        //button text color
        $this->add_control(
            'catlist_count_background_color_hover',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Background Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => 'rgba(0,0,0,0)',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-post-categories .content-holder .count:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'catlist_count_text_color_hover',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => __('Color', 'cozy-addons'),
                'scheme'    => [
                    'type'  => Color::get_type(),
                    'value' => Color::COLOR_2,
                ],
                'default'   => '#61CE70',
                'selectors' => [
                    '{{WRAPPER}} section.cozy-addons-post-categories .content-holder .count:hover' => 'color: {{VALUE}};',
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
        <section class="cozy-addons-post-categories <?php echo esc_attr($settings['categories_count_alignment']) ?>">
            <div class="post-categories-holder  list-column-<?php echo esc_attr($settings['catlist_columns']); ?>">
                <?php
                $ct_categories = get_categories();
                // Loop through each category
                foreach ($ct_categories as $category) { ?>
                    <div class="content-holder">
                        <div class="title">

                            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                                <span class="text">
                                    <?php if ($settings['enable_cat_list_icon'] === 'yes') {
                                        echo '<span class="catlist-icon">';
                                        \Elementor\Icons_Manager::render_icon($settings['cat_list_icon'], ['aria-hidden' => 'true']);
                                        echo '</span>';
                                    }
                                    echo  esc_html($category->name);
                                    echo '</span>';
                                    if ($settings['enable_category_count'] === 'yes') {
                                        echo '<span class="count">' . esc_html($category->count) . '</span>';
                                    }
                                    ?>
                            </a>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        </section> <!-- featured-layout -->

<?php }
}
