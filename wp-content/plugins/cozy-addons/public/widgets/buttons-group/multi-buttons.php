<div class="buttons-group-holder content-block">
	<?php if ($settings['cozy_multi_button_list']) :
		foreach ($settings['cozy_multi_button_list'] as $button) : ?>
			<?php
			$target = $button['multi_button_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $button['multi_button_link']['nofollow'] ? ' rel="nofollow"' : '';
			$icon_class = 'icon-before';
			if ($button['select_icon_position'] == 'icon-after') {
				$icon_class = 'icon-after';
			}
			$button_custom_class = '';
			if (!empty($button['multi_button_custom_class'])) {
				$button_custom_class = $button['multi_button_custom_class'];
			}
			echo '<a class="cozy-buttons elementor-repeater-item-' . esc_attr($button['_id']) . ' ' . esc_attr($icon_class) . ' ' . esc_attr($button_custom_class) . '" href="' . esc_url($button['multi_button_link']['url']) . '"' . esc_attr($target) . esc_attr($nofollow) . '>';
			if ($button['enable_icon'] == 'yes' && $button['select_icon_position'] == 'icon-before') {
				echo '<span class="button-icon">';
				\Elementor\Icons_Manager::render_icon($button['multi_button_icon'], ['aria-hidden' => 'true']);
				echo '</span>';
			}
			echo esc_html($button['multi_button_label']);
			if ($button['enable_icon'] == 'yes' && $button['select_icon_position'] == 'icon-after') {
				echo '<span class="button-icon">';
				\Elementor\Icons_Manager::render_icon($button['multi_button_icon'], ['aria-hidden' => 'true']);
				echo '</span>';
			}
			echo '</a>';
			?>
	<?php endforeach;
	endif; ?>
</div>