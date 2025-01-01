<?php
require_once COZY_ADDONS_PLUGIN_DIR . 'public/partials/partial-functions.php';
$selected_blcok_layout = $settings['mag_block_layout'];
$post_per_page         = $settings['posts_per_page'];
$post_offset           = $settings['posts_offset'];
$order_by              = $settings['blogpost_orderby'];
$order                 = $settings['blogpost_order'];
$selected_category     = $settings['mag_block_category'];
$excerpt_length        = $settings['blogpost_excerpt_length'];



if ( $selected_blcok_layout == 'mag-block-3' ) {?>
	<div class="mag-block-holder">
		<?php
		if ( ! empty( $selected_category ) ) {
			if ( $settings['show_section_heading'] == 'yes' ) {
				?>
					<div class="cozy-addons-col-12">
						<div class="mag-section-header">
							<h3 class="section-heading"><?php echo get_the_category_by_ID( $selected_category ); ?></h3>
						</div>
					</div>
				<?php
			}
		}
		?>
		<div class="cozy-addons-col-12 mag-featured-post">
			<?php
				$cozy_query = new WP_Query(
					array(
						'post_type'      => 'post',
						'post_status'    => 'publish',
						'posts_per_page' => $post_per_page,
						'orderby'        => $order_by,
						'order'          => $order,
						'cat'            => $selected_category,
						'offset'         => $post_offset,
					)
				);
			if ( $cozy_query->have_posts() ) :
				while ( $cozy_query->have_posts() ) :
					$cozy_query->the_post();
					$cozy_addons_post_overlay_class = '';
					if ( $settings['enable_overlay_content'] == 'yes' ) {
						$cozy_addons_post_overlay_class = 'content-overlay-enabled';
					}
					?>
							<div class="mag-list-item <?php echo esc_attr( $cozy_addons_post_overlay_class ); ?>">
							<?php	if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' ) { ?>
									<div class="cozy-featured-img">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
										</a>
									</div>
								<?php } ?>
								<div class="mag-list-content">
								<?php
								if ( $settings['show_post_category'] == 'yes' && $settings['post_category_position'] == 'before-title' ) {
										$categories = get_the_category();
									if ( ! empty( $categories ) ) {
										echo '<span class="cozy-post-meta post-category before-title">';
										if ( $settings['show_post_category_icon'] == 'yes' ) {
											echo '<span class="meta-icon">';
												\Elementor\Icons_Manager::render_icon( $settings['post_meta_category_icon'], array( 'aria-hidden' => 'true' ) );
											echo '</span>';
										}
										if ( $settings['show_post_category_label'] == 'yes' ) {
											echo '<span class="meta-label">' . esc_html( $settings['post_category_label'] ) . '</span>';
										}
											cozy_addons_post_category();
											echo '</span>';
									}
								}

								if ( $settings['show_title'] == 'yes' ) {
									?>
											<a href="<?php the_permalink(); ?>">
										<?php
										echo '<h5' . ' class="post-title content-block">';
										the_title();
										echo '</h5>';
										?>
											</a>
										<?php
								}
											echo '<div class="cozy-post-meta all">';
								?>
									<?php
									if ( $settings['show_post_date'] == 'yes' ) {
										echo '<span class="cozy-post-meta post-date">';
										if ( $settings['show_post_date_icon'] == 'yes' ) {
											echo '<span class="meta-icon">';
												\Elementor\Icons_Manager::render_icon( $settings['post_meta_date_icon'], array( 'aria-hidden' => 'true' ) );
											echo '</span>';
										}
										if ( $settings['show_post_date_label'] == 'yes' ) {
											echo '<span class="meta-label">' . esc_html( $settings['post_date_label'] ) . '</span>';
										}
											cozy_addons_post_date();
										echo '</span>';
									}
									if ( $settings['show_post_author'] == 'yes' ) {
										echo '<span class="cozy-post-meta post-author">';
										if ( $settings['show_post_author_icon'] == 'yes' ) {
											echo '<span class="meta-icon">';
												\Elementor\Icons_Manager::render_icon( $settings['post_meta_author_icon'], array( 'aria-hidden' => 'true' ) );
											echo '</span>';
										}
										if ( $settings['show_post_author_label'] == 'yes' ) {
											echo '<span class="meta-label">' . esc_html( $settings['post_author_label'] ) . '</span>';
										}
											cozy_addons_post_author();
										echo '</span>';
									}

									echo '</div>';
									if ( $settings['show_excerpt'] == 'yes' ) {
										?>
									<div class="fetured-excerpt">
											<?php echo cozy_addons_excerpt( $excerpt_length ); ?>
									</div>
										<?php
									}
									if ( $settings['show_cta_button'] == 'yes' && $settings['button_text'] ) {
										$icon_class = 'before-text';
										if ( $settings['cta_icon_position'] == 'after-text' ) {
											$icon_class = 'after-text';
										}
										?>
									<span class="cta content-block">
										<a href="<?php the_permalink(); ?>" class="ca-post-more <?php echo esc_attr( $icon_class ); ?>">
											
												<?php
												if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text' ) {
													echo '<span class="button-icon">';
														\Elementor\Icons_Manager::render_icon( $settings['post_cta_icon'], array( 'aria-hidden' => 'true' ) );
													echo '</span>';
												}
												?>
											
												<?php
												echo esc_html( $settings['button_text'] );

												if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text' ) {
													echo '<span class="button-icon">';
														\Elementor\Icons_Manager::render_icon( $settings['post_cta_icon'], array( 'aria-hidden' => 'true' ) );
													echo '</span>';
												}
												?>
											
										</a>
									</span>
									<?php } ?>
								
								</div>
							</div>
						<?php
						endwhile;
					endif;
				wp_reset_postdata();
			?>
		</div>
	</div>
<?php } elseif ( $selected_blcok_layout == 'mag-block-2' ) { ?>
	<div class="mag-block-holder">
		<?php
		if ( ! empty( $selected_category ) ) {
			if ( $settings['show_section_heading'] == 'yes' ) {
				?>
					<div class="cozy-addons-col-12">
						<div class="mag-section-header">
							<h3 class="section-heading"><?php echo get_the_category_by_ID( $selected_category ); ?></h3>
						</div>
					</div>
				<?php
			}
		}
		?>
		<div class="cozy-addons-col-12 mag-featured-post">
			<?php
				$cozy_query = new WP_Query(
					array(
						'post_type'      => 'post',
						'post_status'    => 'publish',
						'posts_per_page' => $post_per_page,
						'orderby'        => $order_by,
						'order'          => $order,
						'cat'            => $selected_category,
						'offset'         => $post_offset,
					)
				);
			if ( $cozy_query->have_posts() ) :
				while ( $cozy_query->have_posts() ) :
					$cozy_query->the_post();
					echo '<div class="mag-list-item">';
					if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' ) {
						?>
								
									<div class="cozy-featured-img">
										<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail(); ?>
										</a>
									</div>
								<?php } ?>
								<div class="mag-list-content">
										<?php
										if ( $settings['show_post_category'] == 'yes' && $settings['post_category_position'] == 'before-title' ) {
											$categories = get_the_category();
											if ( ! empty( $categories ) ) {
												echo '<span class="cozy-post-meta post-category before-title">';
												if ( $settings['show_post_category_icon'] == 'yes' ) {
													echo '<span class="meta-icon">';
														\Elementor\Icons_Manager::render_icon( $settings['post_meta_category_icon'], array( 'aria-hidden' => 'true' ) );
													echo '</span>';
												}
												if ( $settings['show_post_category_label'] == 'yes' ) {
													echo '<span class="meta-label">' . esc_html( $settings['post_category_label'] ) . '</span>';
												}
													cozy_addons_post_category();
												echo '</span>';
											}
										}

										if ( $settings['show_title'] == 'yes' ) {
											?>
											<a href="<?php the_permalink(); ?>">
												<?php
												echo '<h5' . ' class="post-title content-block">';
												the_title();
												echo '</h5>';
												?>
											</a>
											<?php
										}
											echo '<div class="cozy-post-meta all">';
										?>
									<?php
									if ( $settings['show_post_date'] == 'yes' ) {
										echo '<span class="cozy-post-meta post-date">';
										if ( $settings['show_post_date_icon'] == 'yes' ) {
											echo '<span class="meta-icon">';
												\Elementor\Icons_Manager::render_icon( $settings['post_meta_date_icon'], array( 'aria-hidden' => 'true' ) );
											echo '</span>';
										}
										if ( $settings['show_post_date_label'] == 'yes' ) {
											echo '<span class="meta-label">' . esc_html( $settings['post_date_label'] ) . '</span>';
										}
											cozy_addons_post_date();
										echo '</span>';
									}
									if ( $settings['show_post_author'] == 'yes' ) {
										echo '<span class="cozy-post-meta post-author">';
										if ( $settings['show_post_author_icon'] == 'yes' ) {
											echo '<span class="meta-icon">';
												\Elementor\Icons_Manager::render_icon( $settings['post_meta_author_icon'], array( 'aria-hidden' => 'true' ) );
											echo '</span>';
										}
										if ( $settings['show_post_author_label'] == 'yes' ) {
											echo '<span class="meta-label">' . esc_html( $settings['post_author_label'] ) . '</span>';
										}
											cozy_addons_post_author();
										echo '</span>';
									}

									echo '</div>';
									if ( $settings['show_excerpt'] == 'yes' ) {
										?>
									<div class="fetured-excerpt">
											<?php echo cozy_addons_excerpt( $excerpt_length ); ?>
									</div>
										<?php
									}
									if ( $settings['show_cta_button'] == 'yes' && $settings['button_text'] ) {
										$icon_class = 'before-text';
										if ( $settings['cta_icon_position'] == 'after-text' ) {
											$icon_class = 'after-text';
										}
										?>
									<span class="cta content-block">
										<a href="<?php the_permalink(); ?>" class="ca-post-more <?php echo esc_attr( $icon_class ); ?>">
											
												<?php
												if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text' ) {
													echo '<span class="button-icon">';
														\Elementor\Icons_Manager::render_icon( $settings['post_cta_icon'], array( 'aria-hidden' => 'true' ) );
													echo '</span>';
												}
												?>
											
												<?php
												echo esc_html( $settings['button_text'] );

												if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text' ) {
													echo '<span class="button-icon">';
														\Elementor\Icons_Manager::render_icon( $settings['post_cta_icon'], array( 'aria-hidden' => 'true' ) );
													echo '</span>';
												}
												?>
											
										</a>
									</span>
									<?php } ?>
								</div>
							</div>
						<?php
						endwhile;
					endif;
				wp_reset_postdata();
			?>
		</div>
	</div>
	 
<?php } else { ?>
	<div class="mag-block-holder">
		<?php
		if ( ! empty( $selected_category ) ) {
			if ( $settings['show_section_heading'] == 'yes' ) {
				?>
				<div class="cozy-addons-col-12">
					<div class="mag-section-header">
						<h3 class="section-heading"><?php echo get_the_category_by_ID( $selected_category ); ?></h3>
					</div>
				</div>
				<?php
			}
		}
		?>
		<div class="cozy-addons-col-6 mag-featured-post">
			<?php
				$cozy_query = new WP_Query(
					array(
						'post_type'      => 'post',
						'post_status'    => 'publish',
						'posts_per_page' => 1,
						'orderby'        => $order_by,
						'order'          => $order,
						'cat'            => $selected_category,
						'offset'         => $post_offset,
					)
				);
			if ( $cozy_query->have_posts() ) :
				while ( $cozy_query->have_posts() ) :
					$cozy_query->the_post();
					if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' ) {
						?>
								<div class="cozy-featured-img">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
										</a>
									</div>
								<?php } ?>
								<div class="mag-featured-content">
										<?php
										if ( $settings['show_post_category'] == 'yes' && $settings['post_category_position'] == 'before-title' ) {
											$categories = get_the_category();
											if ( ! empty( $categories ) ) {
												echo '<span class="cozy-post-meta post-category before-title">';
												if ( $settings['show_post_category_icon'] == 'yes' ) {
													echo '<span class="meta-icon">';
														\Elementor\Icons_Manager::render_icon( $settings['post_meta_category_icon'], array( 'aria-hidden' => 'true' ) );
													echo '</span>';
												}
												if ( $settings['show_post_category_label'] == 'yes' ) {
													echo '<span class="meta-label">' . esc_html( $settings['post_category_label'] ) . '</span>';
												}
													cozy_addons_post_category();
												echo '</span>';
											}
										}

										if ( $settings['show_title'] == 'yes' ) {
											?>
											<a href="<?php the_permalink(); ?>">
												<?php
													echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="post-title content-block">';
												the_title();
												echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
												?>
											</a>
											<?php
										}
											echo '<div class="cozy-post-meta all">';
										?>
									<?php
									if ( $settings['show_post_date'] == 'yes' ) {
										echo '<span class="cozy-post-meta post-date">';
										if ( $settings['show_post_date_icon'] == 'yes' ) {
											echo '<span class="meta-icon">';
												\Elementor\Icons_Manager::render_icon( $settings['post_meta_date_icon'], array( 'aria-hidden' => 'true' ) );
											echo '</span>';
										}
										if ( $settings['show_post_date_label'] == 'yes' ) {
											echo '<span class="meta-label">' . esc_html( $settings['post_date_label'] ) . '</span>';
										}
											cozy_addons_post_date();
										echo '</span>';
									}
									if ( $settings['show_post_author'] == 'yes' ) {
										echo '<span class="cozy-post-meta post-author">';
										if ( $settings['show_post_author_icon'] == 'yes' ) {
											echo '<span class="meta-icon">';
												\Elementor\Icons_Manager::render_icon( $settings['post_meta_author_icon'], array( 'aria-hidden' => 'true' ) );
											echo '</span>';
										}
										if ( $settings['show_post_author_label'] == 'yes' ) {
											echo '<span class="meta-label">' . esc_html( $settings['post_author_label'] ) . '</span>';
										}
											cozy_addons_post_author();
										echo '</span>';
									}

									if ( $settings['show_post_category'] == 'yes' && $settings['post_category_position'] == 'after-title' ) {
										$categories = get_the_category();
										if ( ! empty( $categories ) ) {
											echo '<span class="cozy-post-meta post-category">';
											if ( $settings['show_post_category_icon'] == 'yes' ) {
												echo '<span class="meta-icon">';
													\Elementor\Icons_Manager::render_icon( $settings['post_meta_category_icon'], array( 'aria-hidden' => 'true' ) );
												echo '</span>';
											}
											if ( $settings['show_post_category_label'] == 'yes' ) {
												echo '<span class="meta-label">' . esc_html( $settings['post_category_label'] ) . '</span>';
											}
												cozy_addons_post_category();
											echo '</span>';
										}
									}

									if ( $settings['show_post_tag'] == 'yes' ) :
										$cozy_addons_tags = get_the_tag_list();
										if ( ! empty( get_the_tag_list() ) ) {
											?>
											<span class="cozy-post-meta post-tags">
												<?php
												if ( $settings['show_post_tag_icon'] == 'yes' ) {
													echo '<span class="meta-icon">';
														\Elementor\Icons_Manager::render_icon( $settings['post_meta_tags_icon'], array( 'aria-hidden' => 'true' ) );
													echo '</span>';
												}
												if ( $settings['show_post_tags_label'] == 'yes' ) {
													echo '<span class="meta-label">' . esc_html( $settings['post_tags_label'] ) . '</span>';
												}
												cozy_addons_post_tag();
												?>
											</span>
											<?php
										}
									endif;
									if ( $settings['show_post_comment'] == 'yes' ) {
										echo '<span class="cozy-post-meta post-comments">';
										if ( $settings['show_post_comment_icon'] == 'yes' ) {
											echo '<span class="meta-icon">';
												\Elementor\Icons_Manager::render_icon( $settings['post_meta_comment_icon'], array( 'aria-hidden' => 'true' ) );
											echo '</span>';
										}
										if ( $settings['show_post_comment_label'] == 'yes' ) {
											echo '<span class="meta-label">' . esc_html( $settings['post_comment_label'] ) . '</span>';
										}
											cozy_addons_post_comments();
										echo '</span>';
									}
									echo '</div>';
									if ( $settings['show_excerpt'] == 'yes' ) {
										?>
									<div class="fetured-excerpt">
											<?php echo cozy_addons_excerpt( $excerpt_length ); ?>
									</div>
										<?php
									}
									if ( $settings['show_cta_button'] == 'yes' && $settings['button_text'] ) {
										$icon_class = 'before-text';
										if ( $settings['cta_icon_position'] == 'after-text' ) {
											$icon_class = 'after-text';
										}
										?>
									<span class="cta content-block">
										<a href="<?php the_permalink(); ?>" class="ca-post-more <?php echo esc_attr( $icon_class ); ?>">
											
												<?php
												if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text' ) {
													echo '<span class="button-icon">';
														\Elementor\Icons_Manager::render_icon( $settings['post_cta_icon'], array( 'aria-hidden' => 'true' ) );
													echo '</span>';
												}
												?>
											
												<?php
												echo esc_html( $settings['button_text'] );

												if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text' ) {
													echo '<span class="button-icon">';
														\Elementor\Icons_Manager::render_icon( $settings['post_cta_icon'], array( 'aria-hidden' => 'true' ) );
													echo '</span>';
												}
												?>
											
										</a>
									</span>
									<?php } ?>
								</div>
						<?php
						endwhile;
					endif;
				wp_reset_postdata();
			?>
		</div>
		<div class="cozy-addons-col-6 mag-list-post">

			<?php
			$new_offset        = $post_offset + 1;
			$new_post_per_page = $post_per_page - 1;
				$cozy_query    = new WP_Query(
					array(
						'post_type'      => 'post',
						'post_status'    => 'publish',
						'posts_per_page' => $new_post_per_page,
						'orderby'        => $order_by,
						'order'          => $order,
						'cat'            => $selected_category,
						'offset'         => $new_offset,
					)
				);
			if ( $cozy_query->have_posts() ) :
				while ( $cozy_query->have_posts() ) :
					$cozy_query->the_post();
					echo '<div class="mag-list-item">';
					if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' ) {
						?>
									<div class="cozy-featured-img">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
										</a>
									</div>
								<?php } ?>
								<div class="mag-list-content">
										<?php
										if ( $settings['show_post_category'] == 'yes' && $settings['post_category_position'] == 'before-title' ) {
											$categories = get_the_category();
											if ( ! empty( $categories ) ) {
												echo '<span class="cozy-post-meta post-category before-title">';
												if ( $settings['show_post_category_icon'] == 'yes' ) {
													echo '<span class="meta-icon">';
														\Elementor\Icons_Manager::render_icon( $settings['post_meta_category_icon'], array( 'aria-hidden' => 'true' ) );
													echo '</span>';
												}
												if ( $settings['show_post_category_label'] == 'yes' ) {
													echo '<span class="meta-label">' . esc_html( $settings['post_category_label'] ) . '</span>';
												}
													cozy_addons_post_category();
												echo '</span>';
											}
										}

										if ( $settings['show_title'] == 'yes' ) {
											?>
											<a href="<?php the_permalink(); ?>">
												<?php
													echo '<h5' . ' class="post-title content-block">';
												the_title();
												echo '</h5>';
												?>
											</a>
											<?php
										}
											echo '<div class="cozy-post-meta all">';
										?>
									<?php
									if ( $settings['show_post_date'] == 'yes' ) {
										echo '<span class="cozy-post-meta post-date">';
										if ( $settings['show_post_date_icon'] == 'yes' ) {
											echo '<span class="meta-icon">';
												\Elementor\Icons_Manager::render_icon( $settings['post_meta_date_icon'], array( 'aria-hidden' => 'true' ) );
											echo '</span>';
										}
										if ( $settings['show_post_date_label'] == 'yes' ) {
											echo '<span class="meta-label">' . esc_html( $settings['post_date_label'] ) . '</span>';
										}
											cozy_addons_post_date();
										echo '</span>';
									}
									if ( $settings['show_post_author'] == 'yes' ) {
										echo '<span class="cozy-post-meta post-author">';
										if ( $settings['show_post_author_icon'] == 'yes' ) {
											echo '<span class="meta-icon">';
												\Elementor\Icons_Manager::render_icon( $settings['post_meta_author_icon'], array( 'aria-hidden' => 'true' ) );
											echo '</span>';
										}
										if ( $settings['show_post_author_label'] == 'yes' ) {
											echo '<span class="meta-label">' . esc_html( $settings['post_author_label'] ) . '</span>';
										}
											cozy_addons_post_author();
										echo '</span>';
									}





									echo '</div>';
									?>
								
								</div>
							</div>
						<?php
						endwhile;
					endif;
				wp_reset_postdata();
			?>
		</div>
	</div>
	<?php
}