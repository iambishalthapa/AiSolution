<?php

namespace Cozy_Addons\AdvanceHeaderWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Core\Schemes\Color;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class Cozy_Addons_AdvanceHeader_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'cozy-addons-advance-header';
	}

	public function get_title()
	{
		return __('Advanced Text', 'cozy-addons');
	}

	public function get_icon()
	{
		return 'eicon-animated-headline cozy-widget-icons';
	}
	public function get_keywords()
	{
		return ['advanced header and text', 'animated text', 'cozy addons'];
	}
	public function get_categories()
	{
		return ['cozy-addons-items'];
	}

	protected function register_controls()
	{

		$this->cozy_addons_content_options();

		//Styles for widget elements
		$this->cozy_addons_advance_header_style_box_options();
		$this->cozy_addons_shape_style_options();
	}





	/**
	 * Header Layout Options.
	 */
	private function cozy_addons_content_options()
	{
		$this->start_controls_section(
			'at_content_section',
			[
				'label' => __('General', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'at_header_text_style',
			[
				'label' => __('Text Style', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => [
					'text-style-dual-color' => esc_html__('Dual Color', 'cozy-addons'),
					'text-style-highlighted' => esc_html__('Highlighted', 'cozy-addons'),
				],
			]
		);
		$this->add_control(
			'at_highlighted_shape',
			[
				'label' => esc_html__('Shape', 'cozy-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'circle',
				'options' => [
					'circle' => esc_html__('Circle', 'cozy-addons'),
					'underline-zigzag' => esc_html__('Underline Zigzag', 'cozy-addons'),
					'zigzag-style-two' => esc_html__('Underline Zigzag 2', 'cozy-addons'),
					'zigzag-style-three' => esc_html__('Underline Zigzag 3', 'cozy-addons'),
					'curly' => esc_html__('Curly', 'cozy-addons'),
					'curly-two' => esc_html__('Curly 2', 'cozy-addons'),
					'x' => esc_html__('Cross X', 'cozy-addons'),
					'strikethrough' => esc_html__('Linethrough', 'cozy-addons'),
					'underline' => esc_html__('Underline', 'cozy-addons'),
					'double' => esc_html__('Double', 'cozy-addons'),
					'double-underline' => esc_html__('Double Underline', 'cozy-addons'),
					'diagonal' => esc_html__('Diagonal', 'cozy-addons'),
				],
				'condition' => [
					'at_header_text_style' => 'text-style-highlighted',
				],
			]
		);

		$this->add_control(
			'enable_loop_animation',
			[
				'label' => __('Enable Loop on animation', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'at_header_text_style' => 'text-style-highlighted',
				],
			]
		);
		$this->add_control(
			'at_advanced_heading_text',
			[
				'label' => __('Main Text', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => __('Text', 'cozy-addons'),
				'placeholder' => __('Main Text', 'cozy-addons'),
			]
		);
		$this->add_control(
			'at_advanced_heading_prefix_text',
			[
				'label' => __('Prefix Text', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => __('Advanced', 'cozy-addons'),
				'placeholder' => __('Prefix Text', 'cozy-addons'),
			]
		);
		$this->add_control(
			'at_advanced_heading_suffix_text',
			[
				'label' => __('Suffix Text', 'cozy-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => '',
				'placeholder' => __('Suffix Text', 'cozy-addons'),
			]
		);
		$this->add_control(
			'at_text_html_tag',
			[
				'label' => __('Text HTML Tag', 'cozy-addons'),
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
				'default' => 'h1',
			]
		);



		$this->end_controls_section();
	}

	/**
	 * Line style
	 */
	private function cozy_addons_shape_style_options()
	{
		$this->start_controls_section(
			'line_style_box',
			[
				'label' => __('Shape Style', 'cozy-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'at_header_text_style' => 'text-style-highlighted',
				],
			]
		);

		$this->add_control(
			'at_animated_line_width',
			[
				'label' => __('Shape Width', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
					'size' => 100,
				],

				'range' => [
					'%' => [
						'min' => 0,
						'max' => 250,
					],
					'px' => [
						'min' => 0,
						'max' => 650,
					]
				],
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-advanced-text .cozy-addons-highlighted-style svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'at_animated_line_height',
			[
				'label' => __('Shape Height', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
					'size' => 145,
				],

				'range' => [
					'%' => [
						'min' => 0,
						'max' => 250,
					],
					'px' => [
						'min' => 0,
						'max' => 500,
					]
				],
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-advanced-text .cozy-addons-highlighted-style svg' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'at_animated_line_weight',
			[
				'label' => __('Shape Weight', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],

				'range' => [
					'px' => [
						'min' => 0,
						'max' => 25,
					]
				],
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-advanced-text .cozy-addons-highlighted-style svg path' => 'stroke-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'at_animated_line_vertical_adjustment',
			[
				'label' => __('Vertical Adjustment', 'cozy-addons'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],

				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
					],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .cozy-addons-advanced-text .cozy-addons-highlighted-style svg' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'display_shape_under_text',
			[
				'label' => __('Display shape under text', 'cozy-addons'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);
		$this->add_control(
			'at_shape_stroke_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => '#5552EB',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-advanced-text .cozy-addons-highlighted-style svg path' => 'stroke: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}
	/**
	 * Style Box Options.
	 */
	private function cozy_addons_advance_header_style_box_options()
	{

		// Box.
		$this->start_controls_section(
			'section_style_box',
			[
				'label' => __('Content Style', 'cozy-addons'),
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
				'default' => 'left',

				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-advanced-text' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);


		$this->add_control(
			'main_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Main Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-advanced-text .cozy-addons-highlighted-text' => 'color: {{VALUE}};',
				],
				'separator' => 'before'
			]
		);
		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'main_header_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Main Text Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} .cozy-addons-advanced-text .cozy-addons-highlighted-text',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 48]],
					'font_weight' => ['default' => 600],
					'line_height' => ['default' => ['size' => 48]],
				],
				'separator' => 'before',
			]
		);






		$this->add_control(
			'prefix_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Prefix Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-advanced-text .prefix-text' => 'color: {{VALUE}};',
				],
				'separator' => 'before'
			]
		);
		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'prefix_header_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Prefix Text Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} .cozy-addons-advanced-text .prefix-text',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 48]],
					'font_weight' => ['default' => 600],
					'line_height' => ['default' => ['size' => 48]],
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'suffix_text_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __('Suffix Text Color', 'cozy-addons'),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} section.cozy-addons-advanced-text .suffix-text' => 'color: {{VALUE}};',
				],
				'separator' => 'before'
			]
		);
		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'suffix_text_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __('Suffix Text Typography', 'cozy-addons'),

				'selector' => '{{WRAPPER}} section.cozy-addons-advanced-text .suffix-text',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_size' => ['default' => ['size' => 48]],
					'font_weight' => ['default' => 600],
					'line_height' => ['default' => ['size' => 48]],
				],
				'separator' => 'before',
			]
		);
		$this->end_controls_section();
	}




	public function czoy_addons_highlighted_style()
	{
		$settings = $this->get_settings();
		$svg_shape_array = [
			'circle' 			=> ['M284.72,15.61C276.85,14.43,2-2.85,2,80.46c0,34.09,45.22,58.86,196.31,62.81C719.59,154.18,467-74.85,109,29.15'],
			'curly' 			=> ['M1.15,18C64.07,44.13,108.42,1.4,169.63,3.1,182.11,3.76,191.39,6.58,201,10c71.41,33.39,112-8.7,188.65-7,35.22,1.74,69.81,22.6,103,17'],
			'underline' 		=> ['M.68,28.11c110.51-22,247.46-34.55,400.89-14.68,32.94,4.27,64.42,9.74,94.37,16.09'],
			'double' 			=> ['M.58,16s93-15.56,303-12c118,2,180,12,180,12', 'M.58,127s93-13.31,303.15-10.26C421.79,118.48,483.83,127,483.83,127'],
			'double-underline' 	=> ['M.58,16s93-15.56,303-12c118,2,180,12,180,12', 'M29.83,33.28S111.54,17.1,296.13,20.8c103.71,2.08,158.2,12.48,158.2,12.48'],
			'underline-zigzag' 	=> ['M9.3,127.3c49.3-3,150.7-7.6,199.7-7.4c121.9,0.4,189.9,0.4,282.3,7.2C380.1,129.6,181.2,130.6,70,139 c82.6-2.9,254.2-1,335.9,1.3c-56,1.4-137.2-0.3-197.1,9'],
			'diagonal' 			=> ['M.25,3.49C114.44,11.6,252,36.14,397.07,97.15c31.14,13.1,60.52,27,88.18,41.34'],
			'strikethrough' 	=> ['M4,74.8h499.3'],
			'zigzag-style-three' => ['M132.774 14.7062C191.54 12.6657 319.845 8.82964 362.94 9.80907C416.808 11.0334 173.176 -6.10605 78.9057 9.80907C-15.3642 25.7242 70.2157 12.1377 309.071 23.276C781.645 45.3132 276.016 4.28513 3 46.5374'],
			'zigzag-style-two'  => ['M0 7.35096C362.927 7.35098 527.477 2.06135 481.055 7.35087C140.045 46.2072 454.681 24.2418 500 50'],
			'curly-two'			=> ['M0 45.5662C35 45.5662 71.5 39.3274 105.5 23.9981C139.5 8.66889 195.5 -12.9999 159.701 27.5809C152.569 35.6658 142.925 49.3701 167.668 39.3274C176.386 35.7889 190.732 29.7704 233.748 12.8638C263.862 1.02756 281.645 7.13245 261.814 22.0166C244.742 34.8297 233.748 54.5897 298.757 25.0006C310.527 19.6438 325.048 11.5411 346.08 6.12096C367.113 0.700848 367.113 10.5038 360.421 18.931C323.136 56.3543 362.271 39.6092 390.057 27.3609C416.826 15.5611 468.929 0.0535431 500 14.5977'],
			'x' 				=> ['M1.61,3.49C115.8,11.6,253.39,36.14,398.43,97.15c31.14,13.1,60.53,27,88.18,41.34', 'M486.61,3.49C372.42,11.6,234.84,36.14,89.79,97.15c-31.14,13.1-60.52,27-88.18,41.34']
		];
		$shape_display_class = '';
		if ($settings['display_shape_under_text'] == 'yes') {
			$shape_display_class = 'shape-under-text';
		}
?>

		<span class="cozy-addons-highlighted-style <?php echo esc_attr($shape_display_class) ?>">
			<?php if ('' !== $svg_shape_array[$settings['at_highlighted_shape']]) : ?>
				<span class="cozy-addons-highlighted-text"><?php echo wp_kses_post($settings['at_advanced_heading_text']); ?></span>

				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" class="svg-shape cozy-addons-highlight-<?php echo esc_html($settings['at_highlighted_shape']); ?>" preserveAspectRatio="none">
					<?php foreach ($svg_shape_array[$settings['at_highlighted_shape']] as $value) : ?>
						<path d="<?php echo esc_attr($value); ?>"></path>
					<?php endforeach; ?>
				</svg>
			<?php endif; ?>
		</span>
	<?php

	}

	public function cozy_addons_dual_color_layout()
	{
		$settings = $this->get_settings();
	?>
		<span class="cozy-addons-highlighted-style">
			<span class="cozy-addons-highlighted-text"><?php echo wp_kses_post($settings['at_advanced_heading_text']); ?></span>
		</span>
	<?php }


	protected function render($instance = [])
	{
		$settings = $this->get_settings();
		$selected_header_style = $settings['at_header_text_style']; ?>
		<section class="cozy-addons-advanced-text <?php echo esc_attr($selected_header_style); ?>">
			<?php
			echo '<' . esc_attr($settings['at_text_html_tag']) . '>' . '<span class="prefix-text">' . wp_kses_post($settings['at_advanced_heading_prefix_text']) . '</span>';
			if ($settings['at_header_text_style'] == 'text-style-highlighted') {
				$this->czoy_addons_highlighted_style();
			} else {
				$this->cozy_addons_dual_color_layout();
			}
			echo '<span class="suffix-text">' . wp_kses_post($settings['at_advanced_heading_suffix_text']) . '</span></' . esc_attr($settings['at_text_html_tag']) . '>'
			?>
		</section> <!-- featured-layout -->
<?php }
}
