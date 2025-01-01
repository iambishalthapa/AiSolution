<?php
require_once COZY_ADDONS_PLUGIN_DIR . 'public/partials/partial-functions.php';
$selected_portfolio_layout = $settings['portfolio_select_layout'];
$portfolio_column_class    = '';
if ( $selected_portfolio_layout == 'layout-carousel' || $selected_portfolio_layout == 'layout-masonry' || $selected_portfolio_layout == 'layout-grid' || $selected_portfolio_layout == 'layout-grid-overlay' ) {
	$portfolio_column_class = $settings['masonry_grid_column'];
}
?>

<?php
$post_per_page = $settings['posts_per_page'];
$post_offset   = $settings['posts_offset'];
$order_by      = $settings['portfolio_orderby'];
$order         = $settings['portfolio_order'];
$cats          = $settings['portfolio_categories'];
$tax_query     = array();
if ( $cats ) {
	foreach ( $cats as $cat ) {
		$cat_terms[] = $cat;
	}
	$tax_query[] = array(
		array(
			'taxonomy' => 'cea_portfolio_category',
			'field'    => 'id',
			'terms'    => $cat_terms,
		),
	);
}
$excerpt_length = $settings['portfolio_excerpt_length'];
if ( $selected_portfolio_layout == 'layout-list' ) {
	?>

	<div class="portfolio-holder <?php echo esc_attr( $portfolio_column_class ); ?>">

		<?php
		global $post;
		$cozy_addons_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$cozy_query        = new WP_Query(
			array(
				'post_type'      => 'cea_portfolio',
				'post_status'    => 'publish',
				'posts_per_page' => $post_per_page,
				'orderby'        => $order_by,
				'order'          => $order,
				'paged'          => $cozy_addons_paged,
				'offset'         => $post_offset,
				'tax_query'      => $tax_query,
			)
		);
		if ( $cozy_query->have_posts() ) :
			while ( $cozy_query->have_posts() ) :
				$cozy_query->the_post();
				echo '<div class="portfolio-box content-block">';
				if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' ) {
					?>
					<div class="cozy-featured-img">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
					</div>
				<?php } ?>

				<div class="overlay-content">
					<?php
					if ( $settings['show_title'] == 'yes' ) {
						?>
						<a href="<?php the_permalink(); ?>">
							<?php
							echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="portfolio-title content-block">';
							the_title();
							echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
							?>
						</a>
						<?php
					}
					$portfolio_terms = get_the_terms( $post, 'cea_portfolio_category' );
					if ( ! empty( $portfolio_terms ) && $settings['show_category'] == 'yes' ) {
						?>
						<span class="cozy-portfolio-categories">
							<?php
							foreach ( $portfolio_terms as $portfolio_term ) {
								echo '<a href="' . get_term_link( $portfolio_term->slug, 'cea_portfolio_category' ) . '">';
								echo '<span>' . esc_html( $portfolio_term->name ) . '</span>';
								echo '</a>';
							}
							?>
						</span>
						<?php
					}
					if ( $settings['show_excerpt'] == 'yes' ) {
						echo '<div class="portfolio-excerpt content-block">' . esc_html( cozy_addons_excerpt( $excerpt_length ) ) . '</div>';
					}
					if ( $settings['show_cta_button'] == 'yes' && $settings['button_text'] ) {
						$icon_class = 'before-text';
						if ( $settings['cta_icon_position'] == 'after-text' ) {
							$icon_class = 'after-text';
						}
						?>
						<span class="cta content-block">
							<a href="<?php the_permalink(); ?>" class="portfolio-more <?php echo esc_attr( $icon_class ); ?>">
								<?php
								if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text' ) {
									echo '<span class="button-icon">';
									\Elementor\Icons_Manager::render_icon( $settings['portfolio_cta_icon'], array( 'aria-hidden' => 'true' ) );
									echo '</span>';
								}
								echo esc_html( $settings['button_text'] );
								if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text' ) {
									echo '<span class="button-icon">';
									\Elementor\Icons_Manager::render_icon( $settings['portfolio_cta_icon'], array( 'aria-hidden' => 'true' ) );
									echo '</span>';
								}
								?>
							</a>
						</span>
					<?php } ?>

				</div>
				<?php
				echo '</div>';
			endwhile;

		endif;
		wp_reset_postdata();

		echo '</div>';
		cozy_pagination_function( $settings, $cozy_query, html_entity_decode( get_pagenum_link() ) );
} elseif ( $selected_portfolio_layout == 'layout-grid' ) {
	?>

		<div class="portfolio-holder <?php echo esc_attr( $portfolio_column_class ); ?>">
			<?php
			global $post;
			$cozy_addons_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$cozy_query        = new WP_Query(
				array(
					'post_type'      => 'cea_portfolio',
					'post_status'    => 'publish',
					'posts_per_page' => $post_per_page,
					'orderby'        => $order_by,
					'order'          => $order,
					'paged'          => $cozy_addons_paged,
					'offset'         => $post_offset,
					'tax_query'      => $tax_query,
				)
			);
			if ( $cozy_query->have_posts() ) :
				while ( $cozy_query->have_posts() ) :
					$cozy_query->the_post();
					echo '<div class="portfolio-box content-block">';
					if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' ) {
						?>
						<div class="cozy-featured-img">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(); ?>
							</a>
						</div>
					<?php } ?>

					<div class="portfolio-content">
						<?php
						if ( $settings['show_title'] == 'yes' ) {
							?>
							<a href="<?php the_permalink(); ?>">
								<?php
								echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="portfolio-title content-block">';
								the_title();
								echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
								?>
							</a>
							<?php
						}
						$portfolio_terms = get_the_terms( $post, 'cea_portfolio_category' );
						if ( ! empty( $portfolio_terms ) && $settings['show_category'] == 'yes' ) {
							?>
							<span class="cozy-portfolio-categories">
								<?php
								foreach ( $portfolio_terms as $portfolio_term ) {
									echo '<a href="' . get_term_link( $portfolio_term->slug, 'cea_portfolio_category' ) . '">';
									echo '<span>' . esc_html( $portfolio_term->name ) . '</span>';
									echo '</a>';
								}
								?>
							</span>
							<?php
						}
						if ( $settings['show_excerpt'] == 'yes' ) {
							echo '<div class="portfolio-excerpt content-block">' . esc_html( cozy_addons_excerpt( $excerpt_length ) ) . '</div>';
						}
						if ( $settings['show_cta_button'] == 'yes' && $settings['button_text'] ) {
							$icon_class = 'before-text';
							if ( $settings['cta_icon_position'] == 'after-text' ) {
								$icon_class = 'after-text';
							}
							?>
							<span class="cta content-block">
								<a href="<?php the_permalink(); ?>" class="portfolio-more <?php echo esc_attr( $icon_class ); ?>">
									<?php
									if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text' ) {
										echo '<span class="button-icon">';
										\Elementor\Icons_Manager::render_icon( $settings['portfolio_cta_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</span>';
									}
									echo esc_html( $settings['button_text'] );
									if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text' ) {
										echo '<span class="button-icon">';
										\Elementor\Icons_Manager::render_icon( $settings['portfolio_cta_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</span>';
									}
									?>
								</a>
							</span>
						<?php } ?>

					</div>
					<?php
					echo '</div>';
				endwhile;
			endif;
			wp_reset_postdata();
			echo '</div>';
			cozy_pagination_function( $settings, $cozy_query, html_entity_decode( get_pagenum_link() ) );
} elseif ( $selected_portfolio_layout == 'layout-grid-overlay' ) {
	?>

			<div class="portfolio-holder <?php echo esc_attr( $portfolio_column_class ); ?>">
				<?php
				global $post;
				$cozy_addons_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$cozy_query        = new WP_Query(
					array(
						'post_type'      => 'cea_portfolio',
						'post_status'    => 'publish',
						'posts_per_page' => $post_per_page,
						'orderby'        => $order_by,
						'order'          => $order,
						'paged'          => $cozy_addons_paged,
						'offset'         => $post_offset,
						'tax_query'      => $tax_query,
					)
				);
				if ( $cozy_query->have_posts() ) :
					while ( $cozy_query->have_posts() ) :
						$cozy_query->the_post();
						echo '<div class="portfolio-box content-block">';
						if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' ) {
							?>
							<div class="cozy-featured-img">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
							</div>
						<?php } ?>

						<div class="overlay-content">
							<?php
							if ( $settings['show_title'] == 'yes' ) {
								?>
								<a href="<?php the_permalink(); ?>">
									<?php
									echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="portfolio-title content-block">';
									the_title();
									echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
									?>
								</a>
								<?php
							}
							$portfolio_terms = get_the_terms( $post, 'cea_portfolio_category' );
							if ( ! empty( $portfolio_terms ) && $settings['show_category'] == 'yes' ) {
								?>
								<span class="cozy-portfolio-categories">
									<?php
									foreach ( $portfolio_terms as $portfolio_term ) {
										echo '<a href="' . get_term_link( $portfolio_term->slug, 'cea_portfolio_category' ) . '">';
										echo '<span>' . esc_html( $portfolio_term->name ) . '</span>';
										echo '</a>';
									}
									?>
								</span>
								<?php
							}
							if ( $settings['show_excerpt'] == 'yes' ) {
								echo '<div class="portfolio-excerpt content-block">' . esc_html( cozy_addons_excerpt( $excerpt_length ) ) . '</div>';
							}
							?>

						</div>
						<?php
						echo '</div>';
					endwhile;
				endif;
				wp_reset_postdata();
				echo '</div>';
				cozy_pagination_function( $settings, $cozy_query, html_entity_decode( get_pagenum_link() ) );
} elseif ( $selected_portfolio_layout == 'layout-carousel' ) {
	?>
				<div class="portfolio-holder <?php echo esc_attr( $portfolio_column_class ); ?>">
					<?php
					$portfolio_slide_id = 'cozyPortfolioCarousel';
					$slide_per_view     = $settings['cozy_carousel_post_per_view'];
					global $post;
					$cozy_query = new WP_Query(
						array(
							'post_type'      => 'cea_portfolio',
							'post_status'    => 'publish',
							'posts_per_page' => $post_per_page,
							'orderby'        => $order_by,
							'offset'         => $post_offset,
							'order'          => $order,
						)
					);
					if ( $cozy_query->have_posts() ) :
						?>
						<div id="<?php echo esc_attr( $portfolio_slide_id ) . '"' . ' ' . 'data-slidePerView="' . esc_attr( $slide_per_view ) . '" ' . 'data-carouselColumnGap="' . esc_attr( $settings['cozy_carousel_column_gap'] ); ?>" class=" carousel-holder swiper">
							<div class="swiper-wrapper">
								<?php
								while ( $cozy_query->have_posts() ) :
									$cozy_query->the_post();
									echo '<div class="slide swiper-slide"><div class="portfolio-box content-block">';
									if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' ) {
										?>
										<div class="cozy-featured-img">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail(); ?>
											</a>
										</div>
									<?php } ?>
									<div class="overlay-content">
										<?php
										if ( $settings['show_title'] == 'yes' ) {
											?>
											<a href="<?php the_permalink(); ?>">
												<?php
												echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="portfolio-title content-block">';
												the_title();
												echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
												?>
											</a>
											<?php
										}
										$portfolio_terms = get_the_terms( $post, 'cea_portfolio_category' );
										if ( ! empty( $portfolio_terms ) && $settings['show_category'] == 'yes' ) {
											?>
											<span class="cozy-portfolio-categories">
												<?php
												foreach ( $portfolio_terms as $portfolio_term ) {
													echo '<a href="' . get_term_link( $portfolio_term->slug, 'cea_portfolio_category' ) . '">';
													echo '<span>' . esc_html( $portfolio_term->name ) . '</span>';
													echo '</a>';
												}
												?>
											</span>
										<?php } ?>
									</div>
									<?php
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
	?>
							<div class="portfolio-holder <?php echo esc_attr( $portfolio_column_class ); ?>">
								<?php
								global $post;
								$cozy_addons_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
								$cozy_query        = new WP_Query(
									array(
										'post_type'      => 'cea_portfolio',
										'post_status'    => 'publish',
										'posts_per_page' => $post_per_page,
										'orderby'        => $order_by,
										'order'          => $order,
										'paged'          => $cozy_addons_paged,
										'offset'         => $post_offset,
										'tax_query'      => $tax_query,
									)
								);
								if ( $cozy_query->have_posts() ) :
									while ( $cozy_query->have_posts() ) :
										$cozy_query->the_post();
										echo '<div class="portfolio-box content-block">';
										if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' ) {
											?>
											<div class="cozy-featured-img">
												<a href="<?php the_permalink(); ?>">
													<?php the_post_thumbnail(); ?>
												</a>
											</div>
										<?php } ?>

										<div class="portfolio-content">
											<?php
											if ( $settings['show_title'] == 'yes' ) {
												?>
												<a href="<?php the_permalink(); ?>">
													<?php
													echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="portfolio-title content-block">';
													the_title();
													echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
													?>
												</a>
												<?php
											}
											$portfolio_terms = get_the_terms( $post, 'cea_portfolio_category' );
											if ( ! empty( $portfolio_terms ) && $settings['show_category'] == 'yes' ) {
												?>
												<span class="cozy-portfolio-categories">
													<?php
													foreach ( $portfolio_terms as $portfolio_term ) {
														echo '<a href="' . get_term_link( $portfolio_term->slug, 'cea_portfolio_category' ) . '">';
														echo '<span>' . esc_html( $portfolio_term->name ) . '</span>';
														echo '</a>';
													}
													?>
												</span>
												<?php
											}
											if ( $settings['show_excerpt'] == 'yes' ) {
												echo '<div class="portfolio-excerpt content-block">' . esc_html( cozy_addons_excerpt( $excerpt_length ) ) . '</div>';
											}
											if ( $settings['show_cta_button'] == 'yes' && $settings['button_text'] ) {
												$icon_class = 'before-text';
												if ( $settings['cta_icon_position'] == 'after-text' ) {
													$icon_class = 'after-text';
												}
												?>
												<span class="cta content-block">
													<a href="<?php the_permalink(); ?>" class="portfolio-more <?php echo esc_attr( $icon_class ); ?>">
														<?php
														if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text' ) {
															echo '<span class="button-icon">';
															\Elementor\Icons_Manager::render_icon( $settings['portfolio_cta_icon'], array( 'aria-hidden' => 'true' ) );
															echo '</span>';
														}
														echo esc_html( $settings['button_text'] );
														if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text' ) {
															echo '<span class="button-icon">';
															\Elementor\Icons_Manager::render_icon( $settings['portfolio_cta_icon'], array( 'aria-hidden' => 'true' ) );
															echo '</span>';
														}
														?>
													</a>
												</span>
											<?php } ?>

										</div>
										<?php
										echo '</div>';
									endwhile;
								endif;
								wp_reset_postdata();
								echo '</div>';
								cozy_pagination_function( $settings, $cozy_query, html_entity_decode( get_pagenum_link() ) );
} ?>