<?php
require_once COZY_ADDONS_PLUGIN_DIR . 'public/partials/partial-functions.php';
$selected_blog_layout = $settings['blog_select_layout'];
$column_number_class  = '';
if ( $selected_blog_layout == 'layout-grid' ) {
	$column_number_class = $settings['blog_grid_column'];
}
if ( $selected_blog_layout == 'layout-list' ) {
	$column_number_class = $settings['blog_list_column'];
}
if ( $selected_blog_layout == 'layout-masonry' ) {
	$column_number_class = $settings['masonry_grid_column'];
}
$post_per_page  = $settings['posts_per_page'];
$post_offset    = $settings['posts_offset'];
$order_by       = $settings['blogpost_orderby'];
$order          = $settings['blogpost_order'];
$cats           = $settings['post_categories'];
$excerpt_length = $settings['blogpost_excerpt_length'];

$tax_query = array();
if ( $cats ) {
	foreach ( $cats as $cat ) {
		$cat_terms[] = $cat;
	}
	$tax_query[] = array(
		array(
			'taxonomy' => 'category',
			'field'    => 'id',
			'terms'    => $cat_terms,
		),
	);
}
$cozy_addons_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$cozy_query        = new WP_Query(
	array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => $post_per_page,
		'orderby'        => $order_by,
		'order'          => $order,
		'paged'          => $cozy_addons_paged,
		'offset'         => $post_offset,
		'tax_query'      => $tax_query,
	)
);
if ( $selected_blog_layout == 'layout-timeline' ) {
	if ( $cozy_query->have_posts() ) :
		echo '<div class="posts-holder ' . esc_attr( $column_number_class ) . '">';
		while ( $cozy_query->have_posts() ) :
			$cozy_query->the_post();
			echo '<div class="post-article">';
			echo '<div class="timeline-time">';
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
			echo '</div>';
			echo '<div class="timeline-content">';
			echo '<span class="date-node"></span>';
			echo '<div class="post-box content-block">';
			if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' ) { ?>
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
							if ( $settings['show_post_ert_label'] == 'yes' ) {
								echo '<span class="meta-label">' . esc_html( $settings['post_estimated_time_label'] ) . '</span>';
							}
							cozy_addons_article_reading_time();
							?>
						</span>
					<?php } ?>
				</div>
				<?php
			}
			echo '<div class="post-content">';
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
				echo cozy_addons_excerpt( $excerpt_length );
			}
			if ( $settings['show_cta_button'] == 'yes' && $settings['button_text'] ) {
				$icon_class = 'before-text';
				if ( $settings['cta_icon_position'] == 'after-text' ) {
					$icon_class = 'after-text';
				}
				?>
				<span class="cta content-block">
					<a href="<?php the_permalink(); ?>" class="ca-post-more <?php echo esc_attr( $icon_class ); ?>">
						<span class="button-icon">
							<?php
							if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text' ) {
								echo '<span class="button-icon">';
								\Elementor\Icons_Manager::render_icon( $settings['post_cta_icon'], array( 'aria-hidden' => 'true' ) );
								echo '</span>';
							}
							?>
						</span>
						<?php
						echo esc_html( $settings['button_text'] );
						echo '<span class="button-icon">';
						if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text' ) {
							echo '<span class="button-icon">';
							\Elementor\Icons_Manager::render_icon( $settings['post_cta_icon'], array( 'aria-hidden' => 'true' ) );
							echo '</span>';
						}
						?>
				</span>
				</a>
				</span>
				<?php
			}
			echo '</div></div>';
			echo '</div>';
			echo '</div>';
		endwhile;
		echo '</div>';
		cozy_pagination_function( $settings, $cozy_query, html_entity_decode( get_pagenum_link() ) );
	endif;
	wp_reset_postdata();
} elseif ( $selected_blog_layout == 'layout-carousel' ) {
	$blog_slide_id  = 'cozyPostsCarousel';
	$slide_per_view = $settings['cozy_carousel_post_per_view'];
	if ( $cozy_query->have_posts() ) :
		?>
		<div id="<?php echo esc_attr( $blog_slide_id ) . '"' . ' ' . 'data-slidePerView="' . esc_attr( $slide_per_view ) . '" ' . 'data-carouselColumnGap="' . esc_attr( $settings['cozy_carousel_column_gap'] ); ?>" class=" posts-holder swiper">
			<div class="swiper-wrapper">
				<?php
				while ( $cozy_query->have_posts() ) :
					$cozy_query->the_post();
					echo '<div class="slide swiper-slide"><div class="post-box content-block">';
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
									if ( $settings['show_post_ert_label'] == 'yes' ) {
										echo '<span class="meta-label">' . esc_html( $settings['post_estimated_time_label'] ) . '</span>';
									}
									cozy_addons_article_reading_time();
									?>
								</span>
							<?php } ?>
						</div>
						<?php
					}
					echo '<div class="post-content">';
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
						echo cozy_addons_excerpt( $excerpt_length );
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
								echo esc_html( $settings['button_text'] );
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
			echo '<div class="post-box content-block">';
			if ( $settings['blog_select_layout'] === 'layout-list' ) {
				if ( $settings['featured_image_alignment'] === 'image-align-left' ) {
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
											if ( $settings['show_post_ert_label'] == 'yes' ) {
												echo '<span class="meta-label">' . esc_html( $settings['post_estimated_time_label'] ) . '</span>';
											}
											cozy_addons_article_reading_time();
											?>
										</span>
									<?php } ?>
								</div>
							<?php
					}
				}
			} elseif ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' ) {
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
										if ( $settings['show_post_ert_label'] == 'yes' ) {
											echo '<span class="meta-label">' . esc_html( $settings['post_estimated_time_label'] ) . '</span>';
										}
										cozy_addons_article_reading_time();
										?>
									</span>
								<?php } ?>
							</div>
						<?php

			}
			echo '<div class="post-content">';
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
								echo esc_html( $settings['button_text'] );
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
					echo '</div>';
					if ( $settings['blog_select_layout'] === 'layout-list' ) {
						if ( $settings['featured_image_alignment'] === 'image-align-right' ) {
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
											if ( $settings['show_post_ert_label'] == 'yes' ) {
												echo '<span class="meta-label">' . esc_html( $settings['post_estimated_time_label'] ) . '</span>';
											}
											cozy_addons_article_reading_time();
											?>
										</span>
									<?php } ?>
								</div>
								<?php
							}
						}
					}
					echo '</div>';
				endwhile;
		echo '</div>';
		cozy_pagination_function( $settings, $cozy_query, html_entity_decode( get_pagenum_link() ) );


	endif;
	wp_reset_postdata();
}
