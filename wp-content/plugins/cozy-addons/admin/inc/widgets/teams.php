<?php

namespace Cozy_Addons\TeamWidgets;

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
class Cozy_Addons_Team_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'cozy-addons-team-block';
	}

	public function get_title()
	{
		return __('Team', 'cozy-addons');
	}
	public function get_keywords()
	{
		return ['team', 'cozy', 'cozy addons'];
	}
	public function get_icon()
	{
		return 'fas fa-users cozy-team-icon cozy-widget-icons';
	}

	public function get_categories()
	{
		return ['cozy-addons-items'];
	}

	protected function register_controls()
	{
		$this->cozy_addons_team_general_options();
		$this->cozy_addons_team_content_options();
		$this->cozy_addons_team_socialmedia_options();
		$this->cozy_addons_team_cta_button_options();

		//Styles for widget elements
		$this->cozy_addons_team_style_box_options();
		$this->cozy_addons_content_image_options();
		$this->cozy_addons_content_title_options();
		$this->cozy_addons_content_designation_options();
		$this->cozy_addons_content_company_options();
		$this->cozy_addons_content_social_media_options();
		$this->cozy_addons_teams_pagination_options();
		$this->cozy_addons_teams_carousel_pagination_options();
		$this->cozy_addons_teams_carousel_navigation_options();
		$this->cozy_addons_cta_button_options();
	}


	/**
	 * Get all category of Teams
	 */
	private function cozy_addons_team_categories()
	{
		$taxonomy = 'cea_team_category';
		$terms = get_terms($taxonomy);
		$options = array();

		if ($terms) {
			foreach ($terms as $term) {
				if (isset($term)) {
					if (isset($term->term_id) && isset($term->name)) {
						$options[$term->term_id] = $term->name;
					}
				}
			}
		}
		wp_reset_query();
		return $options;
	}
	/**
	 * Header Layout Options.
	 */
	private function cozy_addons_team_general_options()
	{
		$this->start_controls_section(
			'general_section',
			[
				'label' => __('Query Setting', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		if (cozy_addons_premium_access()) {
			$this->add_control(
				'team_select_layout',
				[
					'label' => __('Select Layout', 'cozy-addons'),
					'type' => Controls_Manager::SELECT,
					'default' => 'layout-grid',
					'options' => [
						'layout-grid' => esc_html__('Grid', 'cozy-addons'),
						'layout-grid-overlay' => esc_html__('Grid: Overlay Style', 'cozy-addons'),
						'layout-list' => esc_html__('List', 'cozy-addons'),
						'layout-carousel' => esc_html__('Carousel', 'cozy-addons'),
					],
				]
			);
		} else {
			$this->add_control(
				'team_select_layout',
				[
					'label' => __('Select Layout', 'cozy-addons'),
					'type' => Controls_Manager::SELECT,
					'default' => 'layout-grid',
					'options' => [
						'layout-grid' => esc_html__('Grid', 'cozy-addons'),
					],
				]
			);
		}
		if (cozy_addons_premium_access()) {
			$this->add_control(
				'teams_grid_column',
				[
					'label' => __('Grid Column', 'cozy-addons'),
					'type' => Controls_Manager::SELECT,
					'default' => 'col-grid-4',
					'options' => [
						'col-grid-1' => esc_html__('1 Column', 'cozy-addons'),
						'col-grid-2' => esc_html__('2 Column', 'cozy-addons'),
						'col-grid-3' => esc_html__('3 Column', 'cozy-addons'),
						'col-grid-4' => esc_html__('4 Column', 'cozy-addons'),
						'col-grid-5' => esc_html__('5 Column', 'cozy-addons'),
						'col-grid-6' => esc_html__('6 Column', 'cozy-addons'),
					],
					'conditions' => [
						'terms' => [
							[
								'name' => 'team_select_layout',
								'operator' => 'in',
								'value' => [
									'layout-grid',
									'layout-grid-overlay',
								]
							],
						],
					],
				]
			);

			$this->add_control(
				'cozy_carousel_post_per_view',
				[
					'label' => __('Display Column', 'cozy-addons'),
					'type' => Controls_Manager::NUMBER,
					'default' => 4,
					'min' => 1, // Minimum value
					'max' => 6, // Maximum value
					'step' => 0.1,
					'condition' => [
						'team_select_layout' => 'layout-carousel',
					],
				]
			);
			$this->add_control(
				'teams_list_column',
				[
					'label' => __('List Column', 'cozy-addons'),
					'type' => Controls_Manager::SELECT,
					'default' => 'col-list-1',
					'options' => [
						'col-list-1' => esc_html__('1 Column', 'cozy-addons'),
						'col-list-2' => esc_html__('2 Column', 'cozy-addons'),
					],
					'condition' => [
						'team_select_layout' => 'layout-list',
					],
				]
			);
		} else {
			$this->add_control(
				'cozy_slider_layout_notice_text',
				[
					'type' => \Elementor\Controls_Manager::RAW_HTML,
					'raw' => __('<a href="https://cozythemes.com/cozy-addons/" target="_blank">Upgrade to premium</a> version to unlock 3 more layout with columns option and show unlimited team members', 'cozy-addons'),
					'content_classes' => 'ct-upsell-notice',
				]
			);
		}
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
					'team_select_layout' => 'layout-carousel',
				],
			]
		);
		$this->add_control(
			'show_carousel_pagination',
			[
				'label' => __('Show Carousel Pagination', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'team_select_layout' => 'layout-carousel',
				],
			]
		);
		$this->add_control(
			'show_carousel_navigation',
			[
				'label' => __('Show Carousel Navigation', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'team_select_layout' => 'layout-carousel',
				],
			]
		);
		$this->add_control(
			'slide_navigation_left_icon',
			[
				'label' => __('Preview Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-left',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_carousel_navigation' => 'yes',
					'team_select_layout' => 'layout-carousel',
				],
			]
		);
		$this->add_control(
			'slide_navigation_right_icon',
			[
				'label' => __('Next Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-right',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_carousel_navigation' => 'yes',
					'team_select_layout' => 'layout-carousel',
				],
			]
		);
		$this->add_control(
			'teams_grid_column_gap',
			[
				'label' => __('Column Gap', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 15,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box-holder.layout-grid' => 'grid-column-gap: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-teams .team-box-holder.layout-grid-overlay' => 'grid-column-gap: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-teams .team-box-holder.layout-list' => 'grid-column-gap: {{SIZE}}{{UNIT}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'team_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-grid',
								'layout-grid-overlay',
								'layout-list',
							]
						],
					],
				],
			]
		);
		$this->add_control(
			'teams_grid_rows_gap',
			[
				'label' => __('Rows Gap', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 15,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box-holder.layout-grid .team-box' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-teams .team-box-holder.layout-grid-overlay .team-box' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-teams .team-box-holder.layout-list .team-box' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'team_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-grid',
								'layout-grid-overlay',
								'layout-list',
							]
						],
					],
				],
			]
		);
		// Team categories
		$this->add_control(
			'team_categories',
			[
				'label'       => __('Select Categories', 'cozy-addons'),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'options'     => $this->cozy_addons_team_categories(),

			]
		);
		if (cozy_addons_premium_access()) {
			$this->add_control(
				'posts_per_page',
				[
					'label' => __('Posts Per Page', 'cozy-addons'),
					'type' => Controls_Manager::NUMBER,
					'default' => 4
				]
			);
		}
		$this->add_control(
			'enable_pagination',
			[
				'label' => __('Enable Pagination', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'conditions' => [
					'terms' => [
						[
							'name' => 'team_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-grid',
								'layout-grid-overlay',
								'layout-list',
							]
						],
					],
				],
			]
		);
		$this->add_control(
			'posts_offset',
			[
				'label' => __('Post Offset', 'cozy-addons'),
				'type' => Controls_Manager::NUMBER,
				'default' => 0
			]
		);
		$this->add_control(
			'team_orderby',
			[
				'label' => __('Order By', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'post_date',
				'options' => [
					'post_date' => __('Date', 'cozy-addons'),
					'post_title' => __('Title', 'cozy-addons'),
					'rand' => __('Random', 'cozy-addons'),
				],
			]
		);

		$this->add_control(
			'team_order',
			[
				'label' => __('Order', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => [
					'asc' => __('ASC', 'cozy-addons'),
					'desc' => __('DESC', 'cozy-addons'),
				],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * team conetnt
	 */

	private function cozy_addons_team_content_options()
	{
		$this->start_controls_section(
			'general_content_section',
			[
				'label' => __('Content Setting', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'show_featured_image',
			[
				'label' => __('Enable Image', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'show_title',
			[
				'label' => __('Enable Title', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'cozy-addons'),
				'label_off' => __('Hide', 'cozy-addons'),
				'default' => 'yes',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label' => __('Title HTML Tag', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h4',
				'condition' => [
					'show_title' => 'yes',
				],
			]
		);
		$this->add_control(
			'show_designation',
			[
				'label' => __('Enable Designation', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator' => 'before',
				'conditions' => [
					'terms' => [
						[
							'name' => 'team_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-grid',
								'layout-carousel',
								'layout-list',
								'layout-grid-overlay',
							]
						],
					],
				],
			]
		);
		$this->add_control(
			'show_company',
			[
				'label' => __('Enable Company', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'conditions' => [
					'terms' => [
						[
							'name' => 'team_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-grid',
								'layout-carousel',
								'layout-list',
							]
						],
					],
				],
			]
		);
		$this->add_control(
			'company_seprator',
			[
				'label' => __('Company & Designation Seprator', 'cozy-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => __(',', 'cozy-addons'),
				'placeholder' => __('Add Seprator like dash, comma', 'cozy-addons'),
				'condition' => [
					'show_company' => 'yes',
				],
			]
		);
		$this->add_control(
			'show_excerpt',
			[
				'label' => __('Enable Excerpt', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator' => 'before',
				'conditions' => [
					'terms' => [
						[
							'name' => 'team_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-grid',
								'layout-carousel',
								'layout-list',
							]
						],
					],
				],
			]
		);
		$this->add_control(
			'team_excerpt_length',
			[
				'label' => __('Excerpt Length', 'cozy-addons'),
				'type' => Controls_Manager::NUMBER,
				'default' => 30,
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'team_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-grid',
								'layout-carousel',
								'layout-list',
							]
						],
						[
							'name' => 'show_excerpt',
							'operator' => '==',
							'value' => 'yes',
						]
					],
				],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * team social media
	 */
	private function cozy_addons_team_socialmedia_options()
	{
		$this->start_controls_section(
			'general_social_media_section',
			[
				'label' => __('Social Media Setting', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
				'conditions' => [
					'terms' => [
						[
							'name' => 'team_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-grid',
								'layout-carousel',
								'layout-list',
								'layout-grid-overlay',
							]
						],
					],
				],

			]
		);
		$this->add_control(
			'show_social_icons',
			[
				'label' => __('Enable Social Media', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'team_social_media_position',
			[
				'label' => __('Display Postion', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'icon-after-excerpt',
				'options' => [
					'icon-after-excerpt' => esc_html__('Below Excerpt', 'cozy-addons'),
					'icon-before-excerpt' => esc_html__('Above Excerpt', 'cozy-addons'),
				],
				'condition' => [
					'show_social_icons' => 'yes',
				],
			]
		);
		$this->add_control(
			'team_facebook_icon',
			[
				'label' => __('Select Facebook Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_social_icons' => 'yes',
				],
			]
		);
		$this->add_control(
			'team_twitter_icon',
			[
				'label' => __('Select Twitter Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-twitter',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_social_icons' => 'yes',
				],
			]
		);
		$this->add_control(
			'team_linkedin_icon',
			[
				'label' => __('Select Linkedin Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-linkedin-in',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_social_icons' => 'yes',
				],
			]
		);
		$this->add_control(
			'team_youtube_icon',
			[
				'label' => __('Select Youtube Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-youtube',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_social_icons' => 'yes',
				],
			]
		);
		$this->add_control(
			'team_github_icon',
			[
				'label' => __('Select Github Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-github',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_social_icons' => 'yes',
				],
			]
		);
		$this->add_control(
			'team_instagram_icon',
			[
				'label' => __('Select Instagram Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-instagram',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_social_icons' => 'yes',
				],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * team cta button
	 */

	private function cozy_addons_team_cta_button_options()
	{
		$this->start_controls_section(
			'general_team_cta_section',
			[
				'label' => __('CTA Button Setting', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
				'conditions' => [
					'terms' => [
						[
							'name' => 'team_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-grid',
								'layout-carousel',
								'layout-list',
							]
						],
					],
				],
			]
		);
		$this->add_control(
			'show_cta_button',
			[
				'label' => __('Enable CTA Button', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);
		$this->add_control(
			'show_cta_icon',
			[
				'label' => __('Show Button Icon', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'condition' => [
					'show_cta_button' => 'yes'
				],
			]
		);
		$this->add_control(
			'team_cta_icon',
			[
				'label' => __('Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_cta_icon' => 'yes',
					'show_cta_button' => 'yes',
				],
			]
		);
		$this->add_control(
			'cta_icon_position',
			[
				'label' => __('Icon option', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'before-text',
				'options' => [
					'before-text' => esc_html__('Before Text', 'cozy-addons'),
					'after-text' => esc_html__('After Text', 'cozy-addons'),
				],
				'condition' => [
					'show_cta_icon' => 'yes',
					'show_cta_button' => 'yes',
				],
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' => __('Button Label', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => __('Read More', 'cozy-addons'),
				'placeholder' => __('Read More', 'cozy-addons'),
				'condition' => [
					'show_cta_button' => 'yes',
				],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * button cta Options.
	 */
	private function cozy_addons_cta_button_options()
	{

		// Box.
		$this->start_controls_section(
			'section_footer_box',
			[
				'label' => __('Button Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'team_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-grid',
								'layout-carousel',
								'layout-list',
							]
						],
						[
							'name' => 'show_cta_button',
							'operator' => '==',
							'value' => 'yes',
						]
					],
				],
			]
		);
		$this->add_control(
			'cta_button_spacing',
			[
				'label' => __('Button Top Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box span.cta' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
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
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 14,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box a.cta-button .button-icon' => 'font-size: {{SIZE}}{{UNIT}};',
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
						'min' => 1,
						'max' => 50,
					],
				],
				'default' => [
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box a.cta-button.before-text .button-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-teams .team-box a.cta-button.after-text .button-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'cta_button_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-teams .team-box a.cta-button',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 14]],
					'font_weight' => ['default' => 500],
					// 'line_height' => ['default' => ['size' => 1]],
				],
			]
		);

		// cta button padding
		$this->add_responsive_control(
			'cta_button_padding',
			[
				'label'      => __('Button Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default'	 => [
					'top' => '6',
					'right' => '20',
					'bottom' => '6',
					'left' => '20',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box a.cta-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],

			]
		);
		$this->start_controls_tabs('cta_button_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'cta_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-teams .team-box a.cta-button',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-teams .team-box a.cta-button',
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
					'{{WRAPPER}} section.cozy-addons-teams .team-box a.cta-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// Box color
		$this->add_control(
			'button_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#6EC1E4',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box a.cta-button' => 'background: {{VALUE}};',
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
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box a.cta-button' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'cta_style_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);
		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-teams .team-box a.cta-button:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow_hover',
				'label' => __('Box Shadow', 'plugin-domain'),
				'selector' => '{{WRAPPER}} section.cozy-addons-teams .team-box a.cta-button:hover',
			]
		);

		// Hover border radius
		$this->add_control(
			'button_border_radius_hover',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box a.cta-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// Box color
		$this->add_control(
			'button_bg_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#61CE70',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box a.cta-button:hover' => 'background: {{VALUE}};',
				],
			]
		);
		//button text color
		$this->add_control(
			'cta_text_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box a.cta-button:hover' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}
	/**
	 * team image style
	 */
	private function cozy_addons_content_image_options()
	{
		$this->start_controls_section(
			'team_image_style',
			[
				'label' => __('Image Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_featured_image' => 'yes',
				],
			]
		);



		$this->start_controls_tabs('team_image_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'team_image_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'team_image_overlay_color',
				'label' => esc_html__('Image Overlay Color', 'cozy-addons'),
				'types' => ['gradient'],
				'selector' => '{{WRAPPER}} section.cozy-addons-teams .team-box .featured-image-holder:after',
			]
		);

		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'team_image_style_tabs_normal_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]

		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'team_image_overlay_color_hover',
				'label' => esc_html__('Image Overlay Color', 'cozy-addons'),
				'types' => ['gradient'],
				'selector' => '{{WRAPPER}} section.cozy-addons-teams .team-box:hover .featured-image-holder:after',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();



		$this->add_responsive_control(
			'team_image_box_style_padding',
			[
				'label'      => __('Image Box Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box .cozy-team-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'team_image_bottom_spacing',
			[
				'label' => __('Image Bottom Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -50,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box .cozy-team-img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'team_image_col_width',
			[
				'label' => __('Image Column Width', 'cozy-addons'),
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
					'size' => 50,
				],
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}}  section.cozy-addons-teams .team-box .cozy-team-img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'team_select_layout' => 'layout-list',
				],
			]
		);
		$this->add_control(
			'team_image_width',
			[
				'label' => __('Image Width', 'cozy-addons'),
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
					'{{WRAPPER}}  section.cozy-addons-teams .team-box .cozy-team-img img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'team_image_height',
			[
				'label' => __('Image Height', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
				],
				'default' => [
					'size' => 330,
				],
				'selectors' => [
					'{{WRAPPER}}  section.cozy-addons-teams .team-box .cozy-team-img img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'team_image_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box .cozy-team-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-teams .team-box .cozy-team-img:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-teams .team-box .cozy-team-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'team_image_box_shadow',
				'label' => __('Image Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-teams .team-box .cozy-team-img img',
			]
		);
		$this->end_controls_section();
	}
	/**
	 * Title style
	 */
	private function cozy_addons_content_title_options()
	{
		//Title style holder
		$this->start_controls_section(
			'title_box_style',
			[
				'label' => __('Title Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_title' => 'yes',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'team_title_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} .team-box-holder .team-box .team-content .team-name',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 24]],
					'font_weight' => ['default' => 600],
					'line_height' => ['default' => ['size' => 24]],
				],
				'separator' => 'before',
			]
		);

		// Box internal padding.
		$this->add_control(
			'team_title_bottom_space',
			[
				'label' => __('Title Bottom Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .team-box-holder .team-box .team-content .team-name' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'tile_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .team-box-holder .team-box .team-content .team-name' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}
	/**
	 * Designation style
	 */
	private function cozy_addons_content_designation_options()
	{
		//Title style holder
		$this->start_controls_section(
			'designation_box_style',
			[
				'label' => __('Designation Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'team_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-grid',
								'layout-carousel',
								'layout-list',
								'layout-grid-overlay',
							]
						],
						[
							'name' => 'show_designation',
							'operator' => '==',
							'value' => 'yes',
						]
					],
				],

			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'designation_title_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} .team-box-holder .team-box .team-content .team-profession-info .team-position',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 16]],
					'font_weight' => ['default' => 400],
					'line_height' => ['default' => ['size' => 20]],
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'team_company_bottom_space',
			[
				'label' => __('Designation Bottom Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .team-box-holder .team-box .team-content .team-profession-info' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		// Box internal padding.
		$this->add_control(
			'designation_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .team-box-holder .team-box .team-content .team-profession-info .team-position' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}
	/**
	 * Company style
	 */
	private function cozy_addons_content_company_options()
	{
		//Title style holder
		$this->start_controls_section(
			'company_box_style',
			[
				'label' => __('Company Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'team_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-grid',
								'layout-carousel',
								'layout-list',
							]
						],
						[
							'name' => 'show_company',
							'operator' => '==',
							'value' => 'yes',
						]
					],
				],


			]
		);

		// Box internal padding.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'company_text_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} .team-box-holder .team-box .team-content .team-profession-info .team-company',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 16]],
					'font_weight' => ['default' => 400],
					'line_height' => ['default' => ['size' => 20]],
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'company_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => 'rgba(192, 192, 192, 1)',
				'selectors' => [
					'{{WRAPPER}} .team-box-holder .team-box .team-content .team-profession-info .team-company' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}
	/**
	 * Social style
	 */
	private function cozy_addons_content_social_media_options()
	{
		//Title style holder
		$this->start_controls_section(
			'social_box_style',
			[
				'label' => __('Social Media Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'team_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-grid',
								'layout-carousel',
								'layout-list',
								'layout-grid-overlay',
							]
						],
						[
							'name' => 'show_social_icons',
							'operator' => '==',
							'value' => 'yes',
						]
					],
				],

			]
		);

		$this->add_control(
			'social_media_top_space',
			[
				'label' => __('Social Media Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .team-box-holder .team-box .team-content .cozy-team-social-media.before-excerpt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .team-box-holder .team-box .team-content .cozy-team-social-media.after-excerpt' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'social_media_icon_size',
			[
				'label' => __('Social Icon Size', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 12,
				],
				'selectors' => [
					'{{WRAPPER}} .team-box-holder .team-box .team-content .cozy-team-social-media a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'social_media_icon_spacing',
			[
				'label' => esc_html__('Icon Spacing', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => true,
				],
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .team-box-holder .team-box .team-content .cozy-team-social-media a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'social_media_icon_box_width',
			[
				'label' => __('Icon Box Width', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 250,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 25,
				],
				'selectors' => [
					'{{WRAPPER}} .team-box-holder .team-box .team-content .cozy-team-social-media a ' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'social_media_icon_box_height',
			[
				'label' => __('Icon Box Height', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 250,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 25,
				],
				'selectors' => [
					'{{WRAPPER}} .team-box-holder .team-box .team-content .cozy-team-social-media a ' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs('social_box_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'social_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);
		// background Color
		$this->add_control(
			'social_icon_background_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ededed',
				'selectors' => [
					'{{WRAPPER}} .team-box-holder .team-box .team-content .cozy-team-social-media a' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'social_icon_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Icon Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#232323',
				'selectors' => [
					'{{WRAPPER}} .team-box-holder .team-box .team-content .cozy-team-social-media a' => 'color: {{VALUE}};',
				],
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'social_icon_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .team-box-holder .team-box .team-content .cozy-team-social-media a',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'social_icon_shadow',
				'label' => __('Icon Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .team-box-holder .team-box .team-content .cozy-team-social-media a',
			]
		);
		// Normal border radius
		$this->add_control(
			'social_icon_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .team-box-holder .team-box .team-content .cozy-team-social-media a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'social_icon_style_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);
		$this->add_control(
			'social_icon_background_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#787878',
				'selectors' => [
					'{{WRAPPER}} .team-box-holder .team-box .team-content .cozy-team-social-media a:hover' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'social_icon_text_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .team-box-holder .team-box .team-content .cozy-team-social-media a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'social_border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .team-box-holder .team-box .team-content .cozy-team-social-media a:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'social_icon_box_shadow_hover',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} .team-box-holder .team-box .team-content .cozy-team-social-media a:hover',
			]
		);

		// Hover border radius
		$this->add_control(
			'social_border_radius_hover',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .team-box-holder .team-box .team-content .cozy-team-social-media a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
	private function cozy_addons_team_style_box_options()
	{

		// Box.
		$this->start_controls_section(
			'section_style_box',
			[
				'label' => __('Box Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Box alignment		
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
					'{{WRAPPER}} section.cozy-addons-teams .team-box-holder' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'pricing_table_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-teams .team-box',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 14]],
					'font_weight' => ['default' => 500],
					// 'line_height' => ['default' => ['size' => 1]],
				],
				'separator' => 'before',
			]
		);

		// Box internal padding.
		$this->add_responsive_control(
			'team_box_style_padding',
			[
				'label'      => __('Box Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'team_box_content_padding',
			[
				'label'      => __('Content Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '15',
					'right' => '15',
					'bottom' => '15',
					'left' => '15',
					'isLinked' => true,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box .team-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);


		$this->start_controls_tabs('box_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'box_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);
		// background Color
		$this->add_control(
			'background_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(255, 255, 255, 1)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => 'rgba(0, 0, 0, 0.7)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box' => 'color: {{VALUE}};',
				],
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-teams .team-box',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-teams .team-box',
			]
		);
		// Normal border radius
		$this->add_control(
			'border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'box_style_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);
		$this->add_control(
			'background_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(255, 255, 255, 1)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box:hover' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'text_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box:hover' => 'color: {{VALUE}};',
				],
			]
		);
		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-teams .team-box:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-teams .team-box:hover',
			]
		);

		// Hover border radius
		$this->add_control(
			'border_radius_hover',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-teams .team-box:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}
	/**
	 * slide pagination style
	 */
	private function cozy_addons_teams_carousel_pagination_options()
	{
		$this->start_controls_section(
			'slider_pagination_style',
			[
				'label' => __('Pagination Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_carousel_pagination' => 'yes',
					'team_select_layout' => 'layout-carousel',
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
					'{{WRAPPER}} section.cozy-addons-teams .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-teams .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-teams .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-teams .swiper-pagination-bullet' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-teams .swiper-pagination-bullet:hover' => 'background: {{VALUE}};',
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
	private function cozy_addons_teams_carousel_navigation_options()
	{
		$this->start_controls_section(
			'slider_navigation_style',
			[
				'label' => __('Navigation Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_carousel_navigation' => 'yes',
					'team_select_layout' => 'layout-carousel',
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
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-teams .cozy-slide-nav' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-teams .cozy-slide-nav' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-teams .cozy-slide-nav' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-teams .cozy-slide-nav.cozy-slide-next' => 'line-height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-teams .cozy-slide-nav.cozy-slide-prev' => 'line-height: {{SIZE}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-teams .cozy-slide-nav',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_box_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-teams .cozy-slide-nav',
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
					'{{WRAPPER}} section.cozy-addons-teams .cozy-slide-nav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-teams .cozy-slide-nav' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-teams .cozy-slide-nav' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} section.cozy-addons-teams .cozy-slide-nav:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_box_shadow_hover',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-teams .cozy-slide-nav:hover',
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
					'{{WRAPPER}} section.cozy-addons-teams .cozy-slide-nav:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} section.cozy-addons-teams .cozy-slide-nav:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-teams .cozy-slide-nav:hover' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}
	private function cozy_addons_teams_pagination_options()
	{
		$this->start_controls_section(
			'teams_pagination_style_setup',
			[
				'label' => __('Pagination Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'conditions' => [
					'terms' => [
						[
							'name' => 'team_select_layout',
							'operator' => 'in',
							'value' => [
								'layout-grid',
								'layout-grid-overlay',
								'layout-list',
							],
						],
					],
				],
			]
		);
		$this->add_control(
			'pagination_content_align',
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
					'{{WRAPPER}} .cozy-addons-pagination' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'teams_pagination_style_padding',
			[
				'label'      => __('Pagination Section Spacing', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default'	 => [
					'top' => '2',
					'right' => '10',
					'bottom' => '2',
					'left' => '10',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .cozy-addons-pagination' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],

			]
		);
		$this->add_control(
			'teams_pagination_style_spacing',
			[
				'label' => __('Section Top Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 250,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'teams_pagination_paginate_style_spacing',
			[
				'label' => __('Pagination Spacing', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 2,
				],
				'range' => [
					'px' => [
						'min' => -5,
						'max' => 30,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination a' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cozy-addons-pagination span.page-numbers.current' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'teams_pagination_paginate_style_padding',
			[
				'label'      => __('Pagination Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default'	 => [
					'top' => '2',
					'right' => '6',
					'bottom' => '2',
					'left' => '6',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .cozy-addons-pagination a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
					'{{WRAPPER}} .cozy-addons-pagination span.page-numbers.current' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],

			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'teams_pagination_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} .cozy-addons-pagination',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 16]],
					'font_weight' => ['default' => 400],
				],
			]
		);
		$this->start_controls_tabs('teams_pagination_box_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'teams_pagination_style_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);

		$this->add_control(
			'teams_pagination_bgcolor',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#676767',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination a' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'teams_pagination_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'teams_pagination_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}}  .cozy-addons-pagination a',
			]
		);
		// Hover border radius
		$this->add_control(
			'teams_pagination_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}}  .cozy-addons-pagination a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'teams_pagination_style_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);
		$this->add_control(
			'teams_pagination_bgcolor_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#343434',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination a:hover' => 'background: {{VALUE}};',
					'{{WRAPPER}} .cozy-addons-pagination span.page-numbers.current' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'teams_pagination_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cozy-addons-pagination span.page-numbers.current' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'teams_pagination_border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination a:hover',
					'{{WRAPPER}} .cozy-addons-pagination span.page-numbers.current',
				],
			]
		);
		// Hover border radius
		$this->add_control(
			'teams_pagination_border_radius_hover',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-pagination a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cozy-addons-pagination span.page-numbers.current' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);



		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}
	protected function render($instance = [])
	{
		if (post_type_exists('cea_team')) {
			$settings = $this->get_settings(); ?>
			<section class="cozy-addons-teams">
				<?php
				include(COZY_ADDONS_PLUGIN_DIR . 'public/widgets/team/team-layout.php');
				?>
			</section> <!-- featured-layout -->
<?php } else {
			echo __('Please Install & Activate the "Cozy Essential Addons - https://wordpress.org/plugins/cozy-essential-addons/" Plugin', 'cozy-addons');
		}
	}
}
