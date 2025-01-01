<?php

namespace Cozy_Addons\AuthorBoxWidgets;

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
class Cozy_Addons_AuthorBox_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'cozy-addons-author-box';
	}

	public function get_title()
	{
		return __('Author Box', 'cozy-addons');
	}

	public function get_icon()
	{
		return 'eicon-person cozy-widget-icons';
	}
	public function get_keywords()
	{
		return ['author box', 'cozy addons'];
	}
	public function get_categories()
	{
		return ['cozy-addons-items'];
	}

	protected function register_controls()
	{
		$this->cozy_addons_content_options();
		//Styles for widget elements
		$this->cozy_addons_author_box_content_options();
		$this->cozy_addons_author_box_image_options();
		$this->cozy_addons_author_box_title_options();
		$this->cozy_addons_author_box_social_icon_options();
	}

	/**
	 * Header Layout Options.
	 */
	private function cozy_addons_content_options()
	{
		$this->start_controls_section(
			'content_section',
			[
				'label' => __('General', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'author_box_image',
			[
				'label' => esc_html__('Author Photo', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'author_name',
			[
				'label' => __('Name', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => __('Author', 'cozy-addons'),
				'placeholder' => __('Author Name', 'cozy-addons'),
			]
		);
		$this->add_control(
			'author_bio',
			[
				'label' => __('Description Text', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'default' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'cozy-addons'),
				'placeholder' => __('Add description Here', 'cozy-addons'),
			]
		);

		$this->add_control(
			'show_media_profile',
			[
				'label' => __('Show Media Profile', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);


		// List Repeater
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'media_icon_label',
			[
				'label' => __('Label', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Facebook', 'cozy-addons'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'select_icon',
			[
				'label' => __('Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook',
					'library' => 'fa-brands',
					// 'library' => 'fa-solid',
				],
			]
		);
		$repeater->add_control(
			'social_icon_link',
			[
				'label' => __('Link', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://profilelink.com', 'cozy-addons'),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => true,
				],
			]
		);
		$repeater->add_control(
			'icon_background_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Icon Background Color', 'cozy-addons'),
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder li {{CURRENT_ITEM}}' => 'background: {{VALUE}};',
				],
			]
		);
		$repeater->add_control(
			'icon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Icon Color', 'cozy-addons'),
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder li {{CURRENT_ITEM}}' => 'color: {{VALUE}};',
				],
			]
		);
		//addig featurs list
		$this->add_control(
			'social_media_list',
			[
				'label' => __('Social Icons', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'media_icon_label' => __('Facebook', 'cozy-addons'),
						'select_icon' => [
							'value' => 'fab fa-facebook',
							'library' => 'fa-brands',
						],
						'social_icon_link' => [
							'url' => '',
							'is_external' => false,
							'nofollow' => true,
						],
					],
					[
						'media_icon_label' => __('Twitter', 'cozy-addons'),
						'select_icon' => [
							'value' => 'fab fa-twitter',
							'library' => 'fa-brands',
						],
						'social_icon_link' => [
							'url' => '',
							'is_external' => false,
							'nofollow' => true,
						],
					],
					[
						'media_icon_label' => __('Instagram', 'cozy-addons'),
						'select_icon' => [
							'value' => 'fab fa-instagram',
							'library' => 'fa-brands',
						],
						'social_icon_link' => [
							'url' => '',
							'is_external' => false,
							'nofollow' => true,
						],
					],
				],
				'title_field' => '{{{ media_icon_label }}}',
				'condition' => [
					'show_media_profile' => 'yes',
				]
			]
		);

		$this->end_controls_section();
	}
	/*button content option*/




	/**
	 * Content Option
	 */
	private function cozy_addons_author_box_content_options()
	{
		$this->start_controls_section(
			'section_conetnt_style',
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'author_box_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 14]],
					'font_weight' => ['default' => 400],
					'line_height' => ['default' => ['size' => 20]],
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
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'box_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#232323',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'author_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder',
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'author_box_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder',
			]
		);

		$this->add_control(
			'author_box_border_radius',
			[
				'label' => __('Border Radius', 'cozy-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'author_box_style_padding',
			[
				'label'      => __('Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => true,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->end_controls_section();
	}
	/**
	 * Image Option
	 */
	private function cozy_addons_author_box_image_options()
	{
		$this->start_controls_section(
			'section_conetnt_image_style',
			[
				'label' => __('Image Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'author_box_image_width',
			[
				'label' => __('Image Width', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 500,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-authorbox .cozy-addons-author-image img' => 'width: {{SIZE}}{{UNIT}};',
				],

			]
		);
		$this->add_control(
			'author_box_image_height',
			[
				'label' => __('Image Height', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 500,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-authorbox .cozy-addons-author-image img' => 'height: {{SIZE}}{{UNIT}};',
				],

			]
		);
		$this->add_control(
			'author_box_image_space_bottom',
			[
				'label' => __('Image Bottom Space', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '20',
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-authorbox .cozy-addons-author-image img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],

			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'author_image_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-authorbox .cozy-addons-author-image img',
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'author_box_image_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-authorbox .cozy-addons-author-image img',
			]
		);
		$this->add_control(
			'author_box_image_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-authorbox .cozy-addons-author-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Title Option
	 */
	private function cozy_addons_author_box_title_options()
	{
		$this->start_controls_section(
			'section_conetnt_title_style',
			[
				'label' => __('Author Name Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'author_name_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} .author-box-content-holder span.cozy-addons-author-name',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 20]],
					'font_weight' => ['default' => 600],
					'line_height' => ['default' => ['size' => 25]],
				],
			]
		);
		$this->add_control(
			'author_box_title_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#232323',
				'selectors' => [
					'{{WRAPPER}} .author-box-content-holder span.cozy-addons-author-name' => 'color: {{VALUE}};',
				],
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'author_box_title_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .author-box-content-holder span.cozy-addons-author-name',
			]
		);
		$this->add_control(
			'author_box_title_space_bottom',
			[
				'label' => __('Name Bottom Space', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '20',
				],
				'selectors' => [
					'{{WRAPPER}} .author-box-content-holder span.cozy-addons-author-name' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],

			]
		);
		$this->end_controls_section();
	}

	/**
	 * Title Option
	 */
	private function cozy_addons_author_box_social_icon_options()
	{
		$this->start_controls_section(
			'section_content_social_icon_style',
			[
				'label' => __('Social Icons Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'author_box_title_social_icons_size',
			[
				'label' => __('Icon Size', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '15',
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder li a' => 'font-size: {{SIZE}}{{UNIT}};',
				],

			]
		);
		$this->add_control(
			'author_box_title_social_icons_width',
			[
				'label' => __('Icon Box Width', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '40',
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder li a' => 'width: {{SIZE}}{{UNIT}};',
				],

			]
		);
		$this->add_control(
			'author_box_title_social_icons_height',
			[
				'label' => __('Icon Box Height', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '40',
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder li a' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder li a' => 'line-height: {{SIZE}}{{UNIT}};',
				],

			]
		);

		$this->add_control(
			'author_box_icon_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'author_box_social_icons_padding',
			[
				'label'      => __('Icons Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '20',
					'right' => '2',
					'bottom' => '0',
					'left' => '2',
					'isLinked' => true,
				],
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->start_controls_tabs('author_box_icon_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'author_box_icon_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);
		$this->add_control(
			'author_box_icon_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#565656',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder li a' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'author_box_icon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder li  a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'author_box_icon_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder li a',
			]
		);

		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'author_box_icon_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);

		$this->add_control(
			'author_box_icon_bg_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#787878',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder li a:hover' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'author_box_icon_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder li a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'author_box_icon_border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-authorbox .author-box-content-holder li a:hover',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	protected function render($instance = [])
	{
		$settings = $this->get_settings(); ?>
		<section class="cozy-addons-authorbox">
			<?php
			include(COZY_ADDONS_PLUGIN_DIR . 'public/widgets/authorbox/author-box.php');
			?>
		</section> <!-- featured-layout -->

<?php }
}
