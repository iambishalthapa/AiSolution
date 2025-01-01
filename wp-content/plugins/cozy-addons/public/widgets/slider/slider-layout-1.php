<?php
if ($settings['slides_list']) : ?>
	<div class="cozy-slides content-block swiper cozySlider1">
		<div class="swiper-wrapper">
			<?php foreach ($settings['slides_list'] as $slide) : ?>

				<div class="slide swiper-slide">
					<div class="slide-img content-block"><img src="<?php echo $slide['cozy_slider_image']['url']; ?>"></div>
					<div class="ca-slide-content content-block"><span class="slide-text">
							<?php echo '<span class="slide-sub-title">' . $slide['cozy_slide_sub_heading'] . '</span>'; ?>
							<?php echo '<' . $slide['title_tag'] . ' class="section-title">' . $slide['cozy_slide_heading'] . '</' . $slide['title_tag'] . '>'; ?>
							<?php echo '<p class="slide-description">' . $slide['cozy_slide_description'] . '</p>'; ?>
							<div class="buttons-group">
								<?php
								if ($slide['show_primary_btn'] == 'yes') {
									$target = $slide['primary_button_link']['is_external'] ? ' target="_blank"' : '';
									$nofollow = $slide['primary_button_link']['nofollow'] ? ' rel="nofollow"' : '';
									$icon_class = 'before-text';
									if ($slide['primary_cta_icon_position'] == 'after-text') {
										$icon_class = 'after-text';
									}
									echo '<a class="primary-button ' . $icon_class . '" href="' . $slide['primary_button_link']['url'] . '"' . $target . $nofollow . '>';
									if ($slide['primary_cta_icon_position'] == 'before-text') {
										echo '<span class="button-icon">';
										\Elementor\Icons_Manager::render_icon($slide['primary_cta_icon'], ['aria-hidden' => 'true']);
										echo '</span>';
									}
									echo $slide['primary_button_label'];
									if ($slide['primary_cta_icon_position'] == 'after-text') {
										echo '<span class="button-icon">';
										\Elementor\Icons_Manager::render_icon($slide['primary_cta_icon'], ['aria-hidden' => 'true']);
										echo '</span>';
									}
									echo '</a>';
								}
								?>
								<?php
								if ($slide['show_secondary_btn'] == 'yes') {
									$target = $slide['secondary_button_link']['is_external'] ? ' target="_blank"' : '';
									$nofollow = $slide['secondary_button_link']['nofollow'] ? ' rel="nofollow"' : '';
									$icon_class = 'before-text';
									if ($slide['secondary_cta_icon_position'] == 'after-text') {
										$icon_class = 'after-text';
									}
									echo '<a class="secondary-button ' . $icon_class . '" href="' . $slide['secondary_button_link']['url'] . '"' . $target . $nofollow . '>';
									if ($slide['secondary_cta_icon_position'] == 'before-text') {
										echo '<span class="button-icon">';
										\Elementor\Icons_Manager::render_icon($slide['secondary_cta_icon'], ['aria-hidden' => 'true']);
										echo '</span>';
									}
									echo $slide['secondary_button_label'];
									if ($slide['secondary_cta_icon_position'] == 'after-text') {
										echo '<span class="button-icon">';
										\Elementor\Icons_Manager::render_icon($slide['secondary_cta_icon'], ['aria-hidden' => 'true']);
										echo '</span>';
									}
									echo '</a>';
								}
								?>
							</div>
						</span>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php if ($settings['show_slider_navigation'] == 'yes') { ?>
			<div class="cozy-slide-prev cozy-slide-nav">
				<?php \Elementor\Icons_Manager::render_icon($settings['slide_navigation_left_icon'], ['aria-hidden' => 'true']); ?>
			</div>
			<div class="cozy-slide-next cozy-slide-nav">
				<?php \Elementor\Icons_Manager::render_icon($settings['slide_navigation_right_icon'], ['aria-hidden' => 'true']); ?>
			</div>
		<?php }
		if ($settings['show_slider_pagination'] == 'yes') { ?>
			<div class="cozy-swiper-pagination"></div>
		<?php }
		?>


	</div><!-- end of features block -->
<?php endif; ?>