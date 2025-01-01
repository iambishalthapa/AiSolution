<?php
require_once(COZY_ADDONS_PLUGIN_DIR . 'public/partials/partial-functions.php');
$selected_blcok_layout = $settings['mag_block_layout'];
$post_per_page = $settings['posts_per_page'];
$post_offset = $settings['posts_offset'];
$order_by = $settings['blogpost_orderby'];
$order = $settings['blogpost_order'];
$selected_category = $settings['mag_block_category'];
$excerpt_length = $settings['blogpost_excerpt_length'];
if ($settings['show_content_overlay'] == 'yes') {
	$content_overlay_class = 'content-overlay-enabled';
} else {
	$content_overlay_class = '';
}

if ($selected_blcok_layout == 'mag-block-3') {
	$blog_slide_id = 'advancedMagCarousel';
	$slide_per_view = $settings['cozy_carousel_post_per_view'];

?>
	<div class=" mag-block-holder">

		<div class="cozy-addons-col-12">
			<div class="mag-section-header">
				<?php if (!empty($selected_category) && $settings['show_section_header'] == 'yes') { ?>
					<h3 class="section-heading"><span><?php echo get_the_category_by_ID($selected_category); ?></span></h3>
				<?php } ?>
				<span class="slider-navigation">
					<?php if ($settings['show_carousel_navigation'] == 'yes') { ?>
						<div class="cozy-slide-prev cozy-slide-nav">
							<?php \Elementor\Icons_Manager::render_icon($settings['slide_navigation_left_icon'], ['aria-hidden' => 'true']); ?>
						</div>
						<div class="cozy-slide-next cozy-slide-nav">
							<?php \Elementor\Icons_Manager::render_icon($settings['slide_navigation_right_icon'], ['aria-hidden' => 'true']); ?>
						</div>

					<?php } ?>
				</span>
			</div>

		</div>
		<div class="cozy-addons-col-12 mag-featured-post">
			<div id="<?php echo esc_attr($blog_slide_id) . '"' . ' ' . 'data-slidePerView="' . esc_attr($slide_per_view) . '" ' . 'data-carouselColumnGap="' . esc_attr($settings['cozy_carousel_column_gap']); ?>" class=" swiper-container posts-holder">
				<div class="swiper-wrapper">
					<?php
					$cozy_query = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => $post_per_page, 'orderby' => $order_by, 'order' => $order, 'cat' => $selected_category, 'offset' => $post_offset));
					if ($cozy_query->have_posts()) :
						while ($cozy_query->have_posts()) : $cozy_query->the_post();
							echo '<div class="slide-holder swiper-slide">';
							echo '<div class="mag-list-item">';
							if (has_post_thumbnail() && $settings['show_featured_image'] == 'yes') { ?>
								<div class="cozy-featured-img">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
								</div>
							<?php } ?>
							<div class="mag-list-content">
								<?php
								if ($settings['show_post_category'] == 'yes' && $settings['post_category_position'] == 'before-title') {
									$categories = get_the_category();
									if (!empty($categories)) {
										echo '<span class="cozy-post-meta post-category before-title">';
										if ($settings['show_post_category_icon'] == 'yes') {
											echo '<span class="meta-icon">';
											\Elementor\Icons_Manager::render_icon($settings['post_meta_category_icon'], ['aria-hidden' => 'true']);
											echo '</span>';
										}
										if ($settings['show_post_category_label'] == 'yes') {
											echo '<span class="meta-label">' . esc_html($settings['post_category_label']) . '</span>';
										}
										cozy_addons_post_category();
										echo '</span>';
									}
								}

								if ($settings['show_title'] == 'yes') { ?>
									<a href="<?php the_permalink(); ?>">
										<?php echo '<h5' . ' class="post-title content-block">';
										the_title();
										echo '</h5>'; ?>
									</a>
								<?php }
								echo '<div class="cozy-post-meta all">'; ?>
								<?php
								if ($settings['show_post_date'] == 'yes') {
									echo '<span class="cozy-post-meta post-date">';
									if ($settings['show_post_date_icon'] == 'yes') {
										echo '<span class="meta-icon">';
										\Elementor\Icons_Manager::render_icon($settings['post_meta_date_icon'], ['aria-hidden' => 'true']);
										echo '</span>';
									}
									if ($settings['show_post_date_label'] == 'yes') {
										echo '<span class="meta-label">' . esc_html($settings['post_date_label']) . '</span>';
									}
									cozy_addons_post_date();
									echo '</span>';
								}
								if ($settings['show_post_author'] == 'yes') {
									echo '<span class="cozy-post-meta post-author">';
									if ($settings['show_post_author_icon'] == 'yes') {
										echo '<span class="meta-icon">';
										\Elementor\Icons_Manager::render_icon($settings['post_meta_author_icon'], ['aria-hidden' => 'true']);
										echo '</span>';
									}
									if ($settings['show_post_author_label'] == 'yes') {
										echo '<span class="meta-label">' . esc_html($settings['post_author_label']) . '</span>';
									}
									cozy_addons_post_author();
									echo '</span>';
								}

								echo '</div>';
								if ($settings['show_excerpt'] == 'yes') { ?>

									<div class="fetured-excerpt">
										<?php echo cozy_addons_excerpt($excerpt_length); ?>
									</div>
								<?php }
								if ($settings['show_cta_button'] == 'yes' && $settings['button_text']) {
									$icon_class = 'before-text';
									if ($settings['cta_icon_position'] == 'after-text') {
										$icon_class = 'after-text';
									} ?>
									<span class="cta content-block">
										<a href="<?php the_permalink(); ?>" class="ca-post-more <?php echo esc_attr($icon_class); ?>">

											<?php
											if ($settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text') {
												echo '<span class="button-icon">';
												\Elementor\Icons_Manager::render_icon($settings['post_cta_icon'], ['aria-hidden' => 'true']);
												echo '</span>';
											} ?>

											<?php echo esc_html($settings['button_text']);

											if ($settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text') {
												echo '<span class="button-icon">';
												\Elementor\Icons_Manager::render_icon($settings['post_cta_icon'], ['aria-hidden' => 'true']);
												echo '</span>';
											} ?>

										</a>
									</span>
								<?php } ?>

							</div>
				</div>
			</div>
	<?php endwhile;
					endif;
					wp_reset_postdata();
	?>
		</div>
	</div>
	</div>
	</div>

<?php } else {
	if ($selected_blcok_layout == 'mag-block-1') {
		$current_col_class = $settings['mag_block_col'];
	} else {
		$current_col_class = $settings['mag_block_list_col'];
	}

?>
	<div class="mag-block-holder <?php echo esc_attr($current_col_class) . ' ' . esc_attr($content_overlay_class); ?>">
		<?php if (!empty($selected_category) && $settings['show_section_header'] == 'yes') { ?>
			<div class="cozy-addons-col-12">
				<div class="mag-section-header">
					<h3 class="section-heading"><span><?php echo get_the_category_by_ID($selected_category); ?></span></h3>
				</div>
			</div>
		<?php } ?>
		<div class="cozy-addons-col-12 mag-featured-post">
			<?php
			$cozy_query = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => $post_per_page, 'orderby' => $order_by, 'order' => $order, 'cat' => $selected_category, 'offset' => $post_offset));
			if ($cozy_query->have_posts()) :
				while ($cozy_query->have_posts()) : $cozy_query->the_post(); ?>
					<div class="mag-list-item">
						<?php
						if ($selected_blcok_layout === 'mag-block-4') {
							if ($settings['featured_image_alignment'] == 'image-align-left') {
								if (has_post_thumbnail() && $settings['show_featured_image'] == 'yes') { ?>
									<div class="cozy-featured-img">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
										</a>
									</div>
								<?php }
							}
						} else {
							if (has_post_thumbnail() && $settings['show_featured_image'] == 'yes') { ?>
								<div class="cozy-featured-img">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
								</div>
						<?php }
						} ?>
						<div class="mag-list-content">
							<?php
							if ($settings['show_post_category'] == 'yes' && $settings['post_category_position'] == 'before-title') {
								$categories = get_the_category();
								if (!empty($categories)) {
									echo '<span class="cozy-post-meta post-category before-title">';
									if ($settings['show_post_category_icon'] == 'yes') {
										echo '<span class="meta-icon">';
										\Elementor\Icons_Manager::render_icon($settings['post_meta_category_icon'], ['aria-hidden' => 'true']);
										echo '</span>';
									}
									if ($settings['show_post_category_label'] == 'yes') {
										echo '<span class="meta-label">' . esc_html($settings['post_category_label']) . '</span>';
									}
									cozy_addons_post_category();
									echo '</span>';
								}
							}

							if ($settings['show_title'] == 'yes') { ?>
								<a href="<?php the_permalink(); ?>">
									<?php echo '<h5' . ' class="post-title content-block">';
									the_title();
									echo '</h5>'; ?>
								</a>
							<?php }
							echo '<div class="cozy-post-meta all">'; ?>
							<?php
							if ($settings['show_post_date'] == 'yes') {
								echo '<span class="cozy-post-meta post-date">';
								if ($settings['show_post_date_icon'] == 'yes') {
									echo '<span class="meta-icon">';
									\Elementor\Icons_Manager::render_icon($settings['post_meta_date_icon'], ['aria-hidden' => 'true']);
									echo '</span>';
								}
								if ($settings['show_post_date_label'] == 'yes') {
									echo '<span class="meta-label">' . esc_html($settings['post_date_label']) . '</span>';
								}
								cozy_addons_post_date();
								echo '</span>';
							}
							if ($settings['show_post_author'] == 'yes') {
								echo '<span class="cozy-post-meta post-author">';
								if ($settings['show_post_author_icon'] == 'yes') {
									echo '<span class="meta-icon">';
									\Elementor\Icons_Manager::render_icon($settings['post_meta_author_icon'], ['aria-hidden' => 'true']);
									echo '</span>';
								}
								if ($settings['show_post_author_label'] == 'yes') {
									echo '<span class="meta-label">' . esc_html($settings['post_author_label']) . '</span>';
								}
								cozy_addons_post_author();
								echo '</span>';
							}

							echo '</div>';
							if ($settings['show_excerpt'] == 'yes') { ?>
								<div class="fetured-excerpt">
									<?php echo cozy_addons_excerpt($excerpt_length); ?>
								</div>
							<?php }
							if ($settings['show_cta_button'] == 'yes' && $settings['button_text']) {
								$icon_class = 'before-text';
								if ($settings['cta_icon_position'] == 'after-text') {
									$icon_class = 'after-text';
								} ?>
								<span class="cta content-block">
									<a href="<?php the_permalink(); ?>" class="ca-post-more <?php echo esc_attr($icon_class); ?>">

										<?php
										if ($settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text') {
											echo '<span class="button-icon">';
											\Elementor\Icons_Manager::render_icon($settings['post_cta_icon'], ['aria-hidden' => 'true']);
											echo '</span>';
										} ?>

										<?php echo esc_html($settings['button_text']);

										if ($settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text') {
											echo '<span class="button-icon">';
											\Elementor\Icons_Manager::render_icon($settings['post_cta_icon'], ['aria-hidden' => 'true']);
											echo '</span>';
										} ?>

									</a>
								</span>
							<?php } ?>
						</div>
						<?php
						if ($selected_blcok_layout == 'mag-block-4' && $settings['featured_image_alignment'] == 'image-align-right') {
							if (has_post_thumbnail() && $settings['show_featured_image'] == 'yes') { ?>
								<div class="cozy-featured-img">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
								</div>
						<?php }
						} ?>
					</div>
			<?php endwhile;
			endif;
			wp_reset_postdata();
			?>
		</div>
	</div>
<?php }
