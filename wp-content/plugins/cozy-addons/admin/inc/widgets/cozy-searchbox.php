<?php

namespace Cozy_Addons\SearchBoxWidgets;

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
class Cozy_Addons_SearchBox_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'cozy-addons-search-box';
	}

	public function get_title()
	{
		return __('Search Form', 'cozy-addons');
	}

	public function get_icon()
	{
		return 'eicon-site-search cozy-widget-icons';
	}
	public function get_keywords()
	{
		return ['search box', 'cozy addons'];
	}
	public function get_categories()
	{
		return ['cozy-addons-items'];
	}

	protected function register_controls()
	{
		$this->cozy_addons_content_options();
		//Styles for widget elements
		$this->cozy_addons_search_box_content_options();
		$this->cozy_addons_search_box_searchfield_options();
		$this->cozy_addons_search_box_button_options();
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
			'heading_text',
			[
				'label' => __('Heading', 'cozy-addons'),
				'type' => Controls_Manager::TEXT,
				'rows' => 1,
				'placeholder' => __('Form Header', 'cozy-addons'),
			]
		);
		$this->add_control(
			'cozy_search_button_position',
			[
				'label' => __('Button Position', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'button-layout-1',
				'options' => [
					'button-layout-1' => esc_html__('Normal', 'cozy-addons'),
					'button-layout-2' => esc_html__('Inside Search Field', 'cozy-addons'),
				],
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' => __('Button Label', 'cozy-addons'),
				'type' => Controls_Manager::TEXT,
				'rows' => 1,
				'placeholder' => __('Button Label', 'cozy-addons'),
			]
		);
		$this->add_control(
			'search_button_icon',
			[
				'label' => __('Search Icon', 'cozy-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-search',
					'library' => 'fa-solid',
				],
			]
		);
		$this->add_control(
			'button_icon_position',
			[
				'label' => __('Icon Position', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'before-text',
				'options' => [
					'before-text' => esc_html__('Before Text', 'cozy-addons'),
					'after-text' => esc_html__('After Text', 'cozy-addons'),
				],
			]
		);
		$this->end_controls_section();
	}
	/*button content option*/




	/**
	 * Content Option
	 */
	private function cozy_addons_search_box_content_options()
	{
		$this->start_controls_section(
			'section_conetnt_style',
			[
				'label' => __('Box Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'search_box_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder',
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
					'{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'search_box_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder',
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'search_box_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder',
			]
		);
		$this->add_control(
			'search_box_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'search_box_style_padding',
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
					'{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Search Field Option
	 */
	private function cozy_addons_search_box_searchfield_options()
	{
		$this->start_controls_section(
			'section_conetnt_search_field_style',
			[
				'label' => __('Search Field Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'search_field_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder input#search',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 14]],
					'font_weight' => ['default' => 400],
					'line_height' => ['default' => ['size' => 20]],
				],
			]
		);
		$this->add_control(
			'search_field_background_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder input#search' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'search_field_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#232323',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder input#search::placeholder' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'search_field_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder input#search',
			]
		);
		$this->add_responsive_control(
			'search_field_style_padding',
			[
				'label'      => __('Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '10',
					'right' => '10',
					'bottom' => '10',
					'left' => '10',
					'isLinked' => true,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder input#search' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'search_box_field_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder input#search',
			]
		);
		$this->add_control(
			'search_field_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder input#search' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'search_box_field_margin_top',
			[
				'label' => __('Top Space', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '15',
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder .input-group' => 'margin-top: {{SIZE}}{{UNIT}};',
				],

			]
		);
		$this->add_control(
			'search_box_field_margin_right',
			[
				'label' => __('Space between text field and button', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '15',
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder input#search' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'cozy_search_button_position' => 'button-layout-1',
				],

			]
		);
		$this->end_controls_section();
	}

	/**
	 * Search button Option
	 */
	private function cozy_addons_search_box_button_options()
	{
		$this->start_controls_section(
			'section_conetnt_search_button_style',
			[
				'label' => __('Button Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'search_box_button_icon_size',
			[
				'label' => __('Icon Size', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '15',
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder span.search-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],

			]
		);
		$this->add_control(
			'search_box_button_icon_space',
			[
				'label' => __('Icon Space', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '5',
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder .button-text.before-text' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder .button-text.after-text' => 'margin-right: {{SIZE}}{{UNIT}};',
				],

			]
		);
		$this->add_control(
			'search_box_button_top_space',
			[
				'label' => __('Button Top Space', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '5',
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-search-box.button-layout-2  .searchbox-holder  span.input-group-btn' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'cozy_search_button_position' => 'button-layout-2',
				],

			]
		);
		$this->add_control(
			'search_box_button_right_space',
			[
				'label' => __('Button Right Space', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '5',
				],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-search-box.button-layout-2  .searchbox-holder  span.input-group-btn' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'cozy_search_button_position' => 'button-layout-2',
				],

			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder button.btn.btn-default',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 14]],
					'font_weight' => ['default' => 400],
					'line_height' => ['default' => ['size' => 20]],
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'search_button_shadow',
				'label' => __('Box Shadow', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder button.btn.btn-default',
			]
		);
		$this->add_responsive_control(
			'search_button_style_padding',
			[
				'label'      => __('Padding', 'cozy-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '9',
					'right' => '15',
					'bottom' => '9',
					'left' => '15',
					'isLinked' => false,
				],
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder button.btn.btn-default' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'search_button_border_radius',
			[
				'label' => __('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder button.btn.btn-default' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->start_controls_tabs('search_box_button_style_tabs');
		// Normal tab.
		$this->start_controls_tab(
			'search_box_button_tabs_normal',
			[
				'label'     => __('Normal', 'cozy-addons'),
			]
		);
		$this->add_control(
			'search_box_button_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#6EC1E4',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder button.btn.btn-default' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'search_box_button_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder button.btn.btn-default' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'search_box_button_border',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder button.btn.btn-default',
			]
		);

		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'search_box_button_tabs_hover',
			[
				'label'     => __('Hover', 'cozy-addons'),
			]
		);

		$this->add_control(
			'search_box_button_bg_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Background Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#61CE70',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder button.btn.btn-default:hover' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'search_box_button_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder button.btn.btn-default:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'search_box_button_border_hover',
				'label' => __('Border', 'cozy-addons'),
				'selector' => '{{WRAPPER}} section.cozy-addons-search-box .searchbox-holder button.btn.btn-default:hover',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}
	protected function render($instance = [])
	{
		$settings = $this->get_settings();
		$search_button_position_class = $settings['cozy_search_button_position'];
?>
		<section class="cozy-addons-search-box <?php echo esc_attr($search_button_position_class); ?>">
			<div class="searchbox-holder">
				<?php
				if (!empty($settings['heading_text'])) { ?>
					<div class="search-header">
						<?php echo esc_html($settings['heading_text']); ?>
					</div>
				<?php } ?>
				<form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="form-inline">
					<fieldset>
						<div class="input-group">
							<input type="text" name="s" id="search" placeholder="<?php _e("Search", "cozy-addons"); ?>" value="<?php the_search_query(); ?>" class="form-control" />
							<span class="input-group-btn">
								<button type="submit" class="btn btn-default">
									<?php
									if ($settings['button_icon_position'] == 'after-text') {
										$button_icon_class = 'after-text';
									} else {
										$button_icon_class = 'before-text';
									}
									if ($settings['button_icon_position'] == 'before-text') { ?>
										<span class="search-icon">
											<?php \Elementor\Icons_Manager::render_icon($settings['search_button_icon'], ['aria-hidden' => 'true']); ?>
										</span>
									<?php } ?>
									<?php if (!empty($settings['button_text'])) { ?>
										<span class="button-text <?php echo esc_attr($button_icon_class); ?>"><?php echo esc_html($settings['button_text']); ?></span>
									<?php } ?>
									<?php if ($settings['button_icon_position'] == 'after-text') { ?>
										<span class="search-icon">
											<?php \Elementor\Icons_Manager::render_icon($settings['search_button_icon'], ['aria-hidden' => 'true']); ?>
										</span>
									<?php } ?>
								</button>
							</span>
						</div>
					</fieldset>
				</form>
			</div>
		</section> <!-- featured-layout -->

<?php }
}
