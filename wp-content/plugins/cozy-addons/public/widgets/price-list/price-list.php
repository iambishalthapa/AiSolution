<div class="pricelist-holder content-block">
	<?php if ($settings['item_lists']) : ?>
		<ul class="items-list">
			<?php foreach ($settings['item_lists'] as $item) :
				if ($item['icon_image'] && $item['show_list_icon'] == 'yes') {
					$content_sub_class = "list-image-exist";
				} else {
					$content_sub_class = "list-image-not-exist";
				}
				if ($item['enable_list_link'] == 'yes') {
					$target = $item['link_url']['is_external'] ? ' target="_blank"' : '';
					$nofollow = $item['link_url']['nofollow'] ? ' rel="nofollow"' : ''; ?>
					<a href="<?php echo esc_url($item['link_url']['url']); ?>" <?php echo esc_attr($target) . esc_attr($nofollow); ?> s>
					<?php }
				echo '<li class="elementor-repeater-item-' . esc_attr($item['_id']) . '">'; ?>
					<div class="item-holder">
						<?php if ($item['icon_image'] && $item['show_list_icon'] == 'yes' && $item['icon_image_align'] == 'align-left') :
							echo '<div class="list-image align-left content-block"><img src="' . esc_url($item['icon_image']['url']) . '"></div>';
						endif; ?>
						<div class="item-content <?php echo esc_attr($content_sub_class); ?>">
							<div class="item-header-holder">
								<div class="item-name"><?php echo esc_html($item['item_name']); ?></div>
								<div class="seprator-line"></div>
								<div class="item-price"><?php
														if ($item['show_discount_price'] == 'yes' && $item['original_price_sale']) {
															echo '<span class="original-price">' . esc_html($item['original_price_sale']) . '</span>';
														}
														echo esc_html($item['item_price']);
														?></div>
							</div>
							<div class="item-details"><?php echo esc_html($item['item_details']); ?></div>
						</div>
						<?php if ($item['icon_image'] && $item['show_list_icon'] == 'yes' && $item['icon_image_align'] == 'align-right') :
							echo '<div class="list-image align-right content-block"><img src="' . esc_url($item['icon_image']['url']) . '"></div>';
						endif; ?>
					</div>
					</li>
				<?php if ($item['enable_list_link'] == 'yes') {
					echo '</a>';
				}
			endforeach; ?>
		</ul>
	<?php endif; ?>
</div>