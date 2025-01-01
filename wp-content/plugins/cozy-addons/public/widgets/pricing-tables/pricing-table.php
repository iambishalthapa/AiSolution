<div class="cozy-pricing-table content-block">
	<?php if ('yes' == $settings['show_badge']) : ?>
		<?php if ($settings['badge_position'] == 'right') {
			$badge_align_class = 'badge-right';
		} elseif ($settings['badge_position'] == 'center') {
			$badge_align_class = 'badge-center';
		} else {
			$badge_align_class = 'badge-left';
		} ?>
		<div class="cozy-pt-badge <?php echo esc_attr($badge_align_class); ?>" style="text-align: <?php echo esc_attr($settings['badge_position']); ?> ">
			<span class="badge-style"><?php echo esc_html($settings['badge_text']); ?></span>
		</div>
	<?php endif; ?>
	<?php
	if ('yes' == $settings['show_header_icon']) :
		if ($settings['icon_position'] == 'top') {
			if ($settings['icon_options'] == 'option-image') {
				if ($settings['icon_image']) :
					echo '<div class="pricing-table-image content-block"><img src="' . esc_url($settings['icon_image']['url']) . '"></div>';
				endif;
			} else {
				echo '<div class="pricing-table-icon content-block">';
				\Elementor\Icons_Manager::render_icon($settings['pricing_table_icon'], ['aria-hidden' => 'true']);
				echo '</div>';
			}
		}
	endif;
	?>
	<div class="cozy-pt-header content-block">

		<?php if ($settings['title_text']) : ?>
			<span class="title content-block"><?php echo esc_html($settings['title_text']); ?></span>
		<?php endif; ?>

		<?php if ($settings['description_text']) : ?>
			<span class="cozy-pt-description content-block"><?php echo esc_html($settings['description_text']); ?></span>
		<?php endif; ?>
	</div><!-- end of header block -->
	<?php
	if ('yes' == $settings['show_header_icon']) :
		if ($settings['icon_position'] == 'bottom') {
			if ($settings['icon_options'] == 'option-image') {
				if ($settings['icon_image']) :
					echo '<div class="pricing-table-image content-block"><img src="' . esc_url($settings['icon_image']['url']) . '"></div>';
				endif;
			} else {
				echo '<div class="pricing-table-icon content-block">';
				\Elementor\Icons_Manager::render_icon($settings['pricing_table_icon'], ['aria-hidden' => 'true']);
				echo '</div>';
			}
		}
	endif;
	?>
	<div class="cozy-pt-pricing content-block">
		<div class="price-amount">
			<div class="price-amount-inner">
				<?php if ($settings['currency_align'] == 'top') {
					$currency_align_class = 'align-top';
				} elseif ($settings['currency_align'] == 'center') {
					$currency_align_class = 'align-center';
				} else {
					$currency_align_class = 'align-bottom';
				} ?>
				<span class="price-currency <?php echo $currency_align_class; ?>">
					<?php
					switch ($settings['select_currency']) {
						case 'cozy_addons_custom':
							echo esc_html($settings['custom_currency']);
							break;
						case 'dollar':
							echo esc_html('$');
							break;
						case 'euro':
							echo esc_html('€');
							break;
						case 'baht':
							echo esc_html('฿');
							break;
						case 'franc':
							echo esc_html('₣');
							break;
						case 'guilder':
							echo esc_html('ƒ');
							break;
						case 'pound':
							echo esc_html('£');
							break;
						case 'real':
							echo esc_html('R$');
							break;
						case 'rupee':
							echo esc_html('₨');
							break;
						case 'indian_rupee':
							echo esc_html('₹');
							break;

						case 'yen':
							echo esc_html('¥');
							break;
						default:
							# default execution...
							break;
					}

					?>
				</span>
				<?php if ('yes' == $settings['show_sale_price']) : ?>
					<span class="price-sale" style="text-decoration: line-through; opacity: 0.55;"><?php echo esc_html($settings['price_sale']); ?></span>
					<?php endif;

				if ($settings['price_amount']) :
					$get_price = $settings['price_amount'];
					if ($settings['pt_price_format'] == 'currency_format_1') { ?>
						<?php
						$count_sep = preg_match_all('/\./', $get_price);
						if ($count_sep >= 1) {
							$main_digit = substr($get_price, 0, strrpos($get_price, '.'));
							echo '<span class="price-main">' . esc_html($main_digit) . '</span>';
							if ($settings['pt_decimal_postion'] == 'bottom') {
								$decimal_position = 'align-bottom';
							} else {
								$decimal_position = 'align-top';
							}
							$decimal_number = substr($get_price, strrpos($get_price, '.') + 1); ?>
							<span class="decimal-digit <?php echo esc_attr($decimal_position); ?>"><?php echo esc_html($decimal_number); ?></span>
						<?php } else {
							echo '<span class="price-main">' . esc_html($settings['price_amount']) . '</span>';
						}
					} else {
						$count_sep = preg_match_all('/\,/', $get_price);
						if ($count_sep >= 1) {
							$main_digit = substr($get_price, 0, strrpos($get_price, ','));
							echo '<span class="price-main">' . esc_html($main_digit) . '</span>';
							if ($settings['pt_decimal_postion'] == 'bottom') {
								$decimal_position = 'align-bottom';
							} else {
								$decimal_position = 'align-top';
							}
							$decimal_number = substr($get_price, strrpos($get_price, ',') + 1); ?>
							<span class="decimal-digit <?php echo esc_attr($decimal_position); ?>"><?php echo esc_html($decimal_number); ?></span>
				<?php } else {
							echo '<span class="price-main">' . esc_html($settings['price_amount']) . '</span>';
						}
					}
				endif; ?>

			</div>
			<?php if ($settings['period_text']) :
				if ($settings['period_text_position'] == 'period-after-price') { ?>
					<span class="time-period after-price"><?php echo esc_html($settings['period_text']); ?></span>
			<?php }
			endif; ?>
		</div><!-- end of price amount block-->
		<?php if ($settings['period_text']) :
			if ($settings['period_text_position'] == 'period-below-price') { ?>
				<span class="time-period below-price"><?php echo esc_html($settings['period_text']); ?></span>
		<?php }
		endif; ?>
	</div><!-- end of pricing block -->
	<?php if ($settings['feature_list']  &&  $settings['show_features_list'] == 'yes') : ?>
		<div class="cozy-pt-features content-block">
			<?php foreach ($settings['feature_list'] as $item) : ?>
				<?php if ('yes' == $item['disable_feature']) { ?>
					<div class="feature-list elementor-repeater-item-<?php echo esc_attr($item['_id']) ?>"><span style="text-decoration: line-through; opacity: 0.50;">
							<?php \Elementor\Icons_Manager::render_icon($item['feature_icon'], ['aria-hidden' => 'true']); ?> <?php echo esc_html($item['feature_text']); ?>
						</span>
					</div>
				<?php } else { ?>
					<div class="feature-list elementor-repeater-item-<?php echo esc_attr($item['_id']) ?>">
						<?php \Elementor\Icons_Manager::render_icon($item['feature_icon'], ['aria-hidden' => 'true']); ?> <?php echo esc_html($item['feature_text']); ?>
					</div>
			<?php }
			endforeach; ?>
		</div><!-- end of features block -->
	<?php endif; ?>
	<div class="cozy-pt-footer content-block">
		<?php $settings = $this->get_settings_for_display();
		$target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';
		$icon_class = 'before-text';
		if ($settings['cta_icon_position'] == 'after-text') {
			$icon_class = 'after-text';
		}
		echo '<a class="pricing-button ' . esc_attr($icon_class) . '" href="' . esc_url($settings['button_link']['url']) . '"' . esc_attr($target) . esc_attr($nofollow) . '>';
		if ($settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text') {
			echo '<span class="button-icon">';
			\Elementor\Icons_Manager::render_icon($settings['pt_cta_icon'], ['aria-hidden' => 'true']);
			echo '</span>';
		}
		echo esc_html($settings['cta_text']);
		if ($settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text') {
			echo '<span class="button-icon">';
			\Elementor\Icons_Manager::render_icon($settings['pt_cta_icon'], ['aria-hidden' => 'true']);
			echo '</span>';
		}
		echo '</a>';
		if ('yes' == $settings['show_disclaimer']) : ?>
			<span class="pricing-table-disclaimer content-block"><?php echo esc_html($settings['footer_disclaimer_text']); ?></span>
		<?php endif; ?>
	</div><!-- end of footer block -->
</div>