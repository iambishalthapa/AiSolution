<?php
require_once COZY_ADDONS_PLUGIN_DIR . 'public/partials/partial-functions.php';
if ( cozy_addons_premium_access() ) {
	$selected_blog_layout = $settings['popular_post_select_layout'];
} else {
	$selected_blog_layout = 'layout-grid';
}
$column_number_class = '';
if ( $selected_blog_layout == 'layout-grid' ) {
	$column_number_class = $settings['popularpost_grid_column'];
}
$post_per_page  = $settings['posts_per_page'];
$excerpt_length = $settings['popular_post_excerpt_length'];

$query_args = array(
	'meta_key'       => 'cozy_post_views_count', // set custom meta key
	'orderby'        => 'meta_value_num',
	'order'          => 'DESC',
	'posts_per_page' => $post_per_page,
);
$cozy_query = new WP_Query( $query_args );
if ( $selected_blog_layout == 'layout-vertical' ) {
	if ( $settings['popularpost_vertical_column'] == 'col-vertical-4' ) {
		$post_scroller_class = 'popularTickerFour';
	} elseif ( $settings['popularpost_vertical_column'] == 'col-vertical-2' ) {
		$post_scroller_class = 'popularTickerTwo';
	} elseif ( $settings['popularpost_vertical_column'] == 'col-vertical-1' ) {
		$post_scroller_class = 'popularTickerOne';
	} else {
		$post_scroller_class = 'popularTickerThree';
	}
	if ( $settings['show_section_header'] == 'yes' ) {?>
	<div class="section-header">
		<h3 class="section-heading">
			<span>
					<?php echo esc_html( $settings['header_text_label'] ); ?>
			</span>
		</h3>
		<span class="scroll-nav">
			<span class="cozy-slide-nav cozy-slide-prev up">
					<?php
					\Elementor\Icons_Manager::render_icon( $settings['slide_navigation_up_icon'], array( 'aria-hidden' => 'true' ) );
					?>
			</span>
			<span class="cozy-slide-nav cozy-slide-next down">
					<?php
					\Elementor\Icons_Manager::render_icon( $settings['slide_navigation_down_icon'], array( 'aria-hidden' => 'true' ) );
					?>
			</span>
		</span>
	</div>
	<?php } ?>

<div class="scroller-holder <?php echo esc_attr( $post_scroller_class ); ?>">
		<?php
		if ( $cozy_query->have_posts() ) :
				echo '<ul class="posts-holder ' . esc_attr( $column_number_class ) . '">';
			while ( $cozy_query->have_posts() ) :
				$cozy_query->the_post();
				echo '<li class="post-box">';
				if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' ) {
					?>
								<div class="cozy-featured-img">
									<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
									</a>
								</div>
							<?php
				}
					echo '<div class="post-content">';
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
				if ( $settings['show_post_author'] == 'yes' ) {
							echo '<span class="cozy-post-meta post-author">';
					if ( $settings['show_post_author_icon'] == 'yes' ) {
						echo '<span class="meta-icon">';
						\Elementor\Icons_Manager::render_icon( $settings['post_meta_author_icon'], array( 'aria-hidden' => 'true' ) );
						echo '</span>';
					}
								cozy_addons_post_author();
							echo '</span>';
				}
				if ( $settings['show_post_date'] == 'yes' ) {
					echo '<span class="cozy-post-meta post-date">';
					if ( $settings['show_post_date_icon'] == 'yes' ) {
										echo '<span class="meta-icon">';
											\Elementor\Icons_Manager::render_icon( $settings['post_meta_date_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</span>';
					}
						cozy_addons_post_date();
							echo '</span>';
				}

								echo '</div>';
								echo '</div>';
								echo '</li>';

					endwhile;
			echo '</ul>';
		endif;




		?>











	</ul>
</div>
	<?php
} elseif ( $selected_blog_layout == 'layout-carousel' ) {
	$selected_carousel_layout = $settings['popularpost_carousel_column'];
	if ( $selected_carousel_layout == 'col-carousel-4' ) {
		$column_number_class = 'cozy-popularpost-four';
	} elseif ( $selected_carousel_layout == 'col-carousel-2' ) {
		$column_number_class = 'cozy-popularpost-double';
	} else {
		$column_number_class = 'cozy-popularpost-default';
	}



	if ( $cozy_query->have_posts() ) :
		echo '<div class="posts-holder swiper ' . esc_attr( $column_number_class ) . '">';
			echo '<div class="swiper-wrapper">';
		while ( $cozy_query->have_posts() ) :
			$cozy_query->the_post();
			echo '<div class="slide swiper-slide"><div class="post-box">';
			if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' ) {
				?>
						<div class="cozy-featured-img">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(); ?>
							</a>
							<?php if ( $settings['show_post_ert'] == 'yes' ) { ?>
								<span class="cozy-post-meta estimated-reading-time" title="<?php echo esc_attr( 'Estimated Reading Time Of Article', 'cozy-addons' ); ?>">
									<?php
									if ( $settings['show_post_ert_icon'] == 'yes' ) {
										echo '<span class="meta-icon">';
										\Elementor\Icons_Manager::render_icon( $settings['post_meta_ert_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</span>';
									}
									cozy_addons_article_reading_time();
									?>
								</span>
							<?php } ?>
						</div>
					<?php
			}
			echo '<div class="post-content">';
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
							echo '<div class="cozy-post-meta all">';
							if ( $settings['show_post_author'] == 'yes' ) {
									echo '<span class="cozy-post-meta post-author">';
								if ( $settings['show_post_author_icon'] == 'yes' ) {
									echo '<span class="meta-icon">';
									\Elementor\Icons_Manager::render_icon( $settings['post_meta_author_icon'], array( 'aria-hidden' => 'true' ) );
									echo '</span>';
								}
										cozy_addons_post_author();
									echo '</span>';
							}
							if ( $settings['show_post_date'] == 'yes' ) {
								echo '<span class="cozy-post-meta post-date">';
								if ( $settings['show_post_date_icon'] == 'yes' ) {
									echo '<span class="meta-icon">';
									\Elementor\Icons_Manager::render_icon( $settings['post_meta_date_icon'], array( 'aria-hidden' => 'true' ) );
									echo '</span>';
								}
									cozy_addons_post_date();
									echo '</span>';
							}
							if ( $settings['show_post_category'] == 'yes' ) {
								$categories = get_the_category();
								if ( ! empty( $categories ) ) {
									echo '<span class="cozy-post-meta post-category">';
									if ( $settings['show_post_category_icon'] == 'yes' ) {
										echo '<span class="meta-icon">';
											\Elementor\Icons_Manager::render_icon( $settings['post_meta_category_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</span>';
									}
										cozy_addons_post_category();
										echo '</span>';
								}
							}

								echo '</div>';
							if ( $settings['show_excerpt'] == 'yes' ) {
								echo esc_html( cozy_addons_excerpt( $excerpt_length ) );
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
										\Elementor\Icons_Manager::render_icon( $settings['post_cta_icon'], array( 'aria-hidden' => 'true' ) );
									}
									echo esc_html( $settings['button_text'] );
									if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text' ) {
										\Elementor\Icons_Manager::render_icon( $settings['post_cta_icon'], array( 'aria-hidden' => 'true' ) );
									}
									?>
										</a>
									</span>
									<?php
							}
							?>
							</a>
						<?php
			}
					echo '</div>';
					echo '</div></div>';
				endwhile;
			echo '</div>';
		if ( $settings['show_carousel_navigation'] == 'yes' ) {
			?>
				<div class="cozy-slide-prev cozy-slide-nav">
					<?php \Elementor\Icons_Manager::render_icon( $settings['slide_navigation_left_icon'], array( 'aria-hidden' => 'true' ) ); ?>
				</div>
				<div class="cozy-slide-next cozy-slide-nav">
					<?php \Elementor\Icons_Manager::render_icon( $settings['slide_navigation_right_icon'], array( 'aria-hidden' => 'true' ) ); ?>
				</div>
			<?php
		}
		if ( $settings['show_carousel_pagination'] == 'yes' ) {
			?>
				<div class="cozy-swiper-pagination"></div>
			<?php
		}
		echo '</div>';
	endif;
	wp_reset_postdata();
} else {
	if ( $cozy_query->have_posts() ) :
		echo '<div class="posts-holder ' . esc_attr( $column_number_class ) . '">';
		while ( $cozy_query->have_posts() ) :
			$cozy_query->the_post();
			echo '<div class="post-box">';
			if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' ) {
				?>
					<div class="cozy-featured-img">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
						<?php if ( $settings['show_post_ert'] == 'yes' ) { ?>
							<span class="cozy-post-meta estimated-reading-time" title="<?php echo esc_attr( 'Estimated Reading Time Of Article', 'cozy-addons' ); ?>">
								<?php
								if ( $settings['show_post_ert_icon'] == 'yes' ) {
									echo '<span class="meta-icon">';
									\Elementor\Icons_Manager::render_icon( $settings['post_meta_ert_icon'], array( 'aria-hidden' => 'true' ) );
									echo '</span>';
								}
								cozy_addons_article_reading_time();
								?>
							</span>
						<?php } ?>
					</div>
				<?php
			}
			echo '<div class="post-content">';
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
						echo '<div class="cozy-post-meta all">';
						if ( $settings['show_post_author'] == 'yes' ) {
								echo '<span class="cozy-post-meta post-author">';
							if ( $settings['show_post_author_icon'] == 'yes' ) {
								echo '<span class="meta-icon">';
								\Elementor\Icons_Manager::render_icon( $settings['post_meta_author_icon'], array( 'aria-hidden' => 'true' ) );
								echo '</span>';
							}
									cozy_addons_post_author();
								echo '</span>';
						}
						if ( $settings['show_post_date'] == 'yes' ) {
							echo '<span class="cozy-post-meta post-date">';
							if ( $settings['show_post_date_icon'] == 'yes' ) {
								echo '<span class="meta-icon">';
								\Elementor\Icons_Manager::render_icon( $settings['post_meta_date_icon'], array( 'aria-hidden' => 'true' ) );
								echo '</span>';
							}
								cozy_addons_post_date();
								echo '</span>';
						}
						if ( $settings['show_post_category'] == 'yes' ) {
							$categories = get_the_category();
							if ( ! empty( $categories ) ) {
								echo '<span class="cozy-post-meta post-category">';
								if ( $settings['show_post_category_icon'] == 'yes' ) {
									echo '<span class="meta-icon">';
										\Elementor\Icons_Manager::render_icon( $settings['post_meta_category_icon'], array( 'aria-hidden' => 'true' ) );
									echo '</span>';
								}
									cozy_addons_post_category();
									echo '</span>';
							}
						}

							echo '</div>';
						if ( $settings['show_excerpt'] == 'yes' ) {
							echo esc_html( cozy_addons_excerpt( $excerpt_length ) );
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
								echo esc_attr( $settings['button_text'] );
								if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text' ) {
									echo '<span class="button-icon">';
										\Elementor\Icons_Manager::render_icon( $settings['post_cta_icon'], array( 'aria-hidden' => 'true' ) );
									echo '</span>';
								}
								?>
									</a>
								</span>
								<?php
						}
						?>
						</a>
					<?php
			}
				echo '</div>';
				echo '</div>';
			endwhile;
		echo '</div>';
	endif;
	wp_reset_postdata();
}