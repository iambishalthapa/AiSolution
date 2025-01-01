<?php
$selected_brands_layout = $settings['brand_select_layout'];
$grascale_image_mode = '';
if (cozy_addons_premium_access()) {
	if ($settings['enable_gray_scale'] == 'yes') {
		$grascale_image_mode = 'grayscale-mode-enabled';
	}
}
$display_column = $settings['brand_grid_column'];
if ($selected_brands_layout == 'layout-carousel') {
	$brands_slide_id = 'cozyBrandsCarousel';
	$slide_per_view = $settings['cozy_carousel_post_per_view'];


?>
	<div id="<?php echo esc_attr($brands_slide_id) . '"' . ' ' . 'data-slidePerView="' . esc_attr($slide_per_view) . '" ' . 'data-carouselColumnGap="' . esc_attr($settings['cozy_carousel_column_gap']); ?>" class=" cozy-brands content-block swiper">
		<div class="swiper-wrapper">
			<?php if ($settings['brand_list']) : ?>

				<?php foreach ($settings['brand_list'] as $brand) : ?>

					<div class="slide swiper-slide">
						<?php if ($brand['brand_image']) :
							if ($brand['show_brands_web_url'] === 'yes') {
								$target = $brand['brand_image_link']['is_external'] ? ' target="_blank"' : '';
								$nofollow = $brand['brand_image_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
								<a href="<?php echo esc_url($brand['brand_image_link']['url']) . '"' . esc_attr($target) . esc_attr($nofollow) ?>>
						<?php }
							echo '<div class="brand-logo content-block ' . esc_attr($grascale_image_mode) . '"><img src="' . esc_url($brand['brand_image']['url']) . '"></div>';
							if ($brand['show_brands_web_url'] === 'yes') {
								echo '</a>';
							}
						endif; ?>

					</div>
				<?php endforeach; ?>

			<?php endif; ?>
		</div>
		<?php if ($settings['show_slider_navigation'] == 'yes') { ?>
			<div class=" cozy-slide-prev cozy-slide-nav">
									<?php \Elementor\Icons_Manager::render_icon($settings['slide_navigation_left_icon'], ['aria-hidden' => 'true']); ?>
					</div>
					<div class="cozy-slide-next cozy-slide-nav">
						<?php \Elementor\Icons_Manager::render_icon($settings['slide_navigation_right_icon'], ['aria-hidden' => 'true']); ?>
					</div>
				<?php }
			if ($settings['show_slider_pagination'] == 'yes') { ?>
					<div class="cozy-swiper-pagination"></div>
				<?php } ?>

		</div>
		<?php } else {
		if ($settings['brand_list']) : ?>
			<ul class="logo-list <?php echo esc_attr($display_column); ?>">
				<?php foreach ($settings['brand_list'] as $brand) :
					echo '<li class="elementor-repeater-item-' . esc_attr($brand['_id']) . '">'; ?>
					<?php if ($brand['brand_image']) :
						if ($brand['show_brands_web_url'] === 'yes') {
							$target = $brand['brand_image_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow = $brand['brand_image_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
							<a href="<?php echo esc_url($brand['brand_image_link']['url']) . '"' . esc_attr($target) . esc_attr($nofollow) ?>>
					<?php }
						echo '<div class="brand-logo content-block ' . esc_attr($grascale_image_mode) . '"><img src="' . esc_url($brand['brand_image']['url']) . '"></div>';
						if ($brand['show_brands_web_url'] === 'yes') {
							echo '</a>';
						}
					endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
<?php endif;
	}
