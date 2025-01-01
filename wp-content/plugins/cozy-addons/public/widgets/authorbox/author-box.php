<div class="author-box-content-holder">
	<?php
	if ($settings['author_box_image']) {
		echo '<div class="cozy-addons-author-image content-block"><img src="' . esc_url($settings['author_box_image']['url']) . '"></div>';
	}
	if ($settings['author_name']) : ?>
		<span class="cozy-addons-author-name content-block">
			<?php echo esc_html($settings['author_name']); ?>
		</span>
	<?php endif;

	if ($settings['author_bio']) : ?>
		<span class="cozy-addons-author-bio content-block"><?php echo esc_html($settings['author_bio']); ?></span>
	<?php endif;

	if ($settings['show_media_profile'] === 'yes' && $settings['social_media_list']) : ?>
		<ul class="cozy-addons-author-icons">
			<?php foreach ($settings['social_media_list'] as $icon) :
				echo '<li>'; ?>
				<?php
				$target = $icon['social_icon_link']['is_external'] ? ' target="_blank"' : '';
				$nofollow = $icon['social_icon_link']['nofollow'] ? ' rel="nofollow"' : '';
				echo '<a class="social-icon elementor-repeater-item-' . esc_attr($icon['_id']) . '" href="' . esc_url($icon['social_icon_link']['url']) . '"' . esc_attr($target) . esc_attr($nofollow) . '>';
				\Elementor\Icons_Manager::render_icon($icon['select_icon'], ['aria-hidden' => 'true']);
				echo '</a>'; ?>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

</div>