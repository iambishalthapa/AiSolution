<?php
require_once COZY_ADDONS_PLUGIN_DIR . 'public/partials/partial-functions.php';
$column_number_class = '';
$list_column_count   = '';
if ( cozy_addons_premium_access() ) {
	$post_per_page        = $settings['posts_per_page'];
	$selected_team_layout = $settings['team_select_layout'];
	if ( $selected_team_layout == 'layout-grid' || $selected_team_layout == 'layout-grid-overlay' ) {
		$column_number_class = $settings['teams_grid_column'];
	}
	if ( $selected_team_layout == 'layout-list' ) {
		$list_column_count = $settings['teams_list_column'];
	}
} else {
	$post_per_page        = 4;
	$selected_team_layout = 'layout-grid';
	$column_number_class  = 'col-grid-4';
}

$post_offset    = $settings['posts_offset'];
$order_by       = $settings['team_orderby'];
$order          = $settings['team_order'];
$cats           = $settings['team_categories'];
$excerpt_length = $settings['team_excerpt_length'];

$tax_query = array();
if ( $cats ) {
	foreach ( $cats as $cat ) {
		$cat_terms[] = $cat;
	}
	$tax_query[] = array(
		array(
			'taxonomy' => 'cea_team_category',
			'field'    => 'id',
			'terms'    => $cat_terms,
		),
	);
}
$cozy_addons_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$cozy_team_query   = new WP_Query(
	array(
		'post_type'      => 'cea_team',
		'post_status'    => 'publish',
		'posts_per_page' => $post_per_page,
		'orderby'        => $order_by,
		'order'          => $order,
		'paged'          => $cozy_addons_paged,
		'offset'         => $post_offset,
		'tax_query'      => $tax_query,
	)
);

if ( $selected_team_layout == 'layout-carousel' ) {
	$team_slide_id  = 'cozyTeamCarousel';
	$slide_per_view = $settings['cozy_carousel_post_per_view'];
	?>
	<div id="<?php echo esc_attr( $team_slide_id ) . '"' . ' ' . 'data-slidePerView="' . esc_attr( $slide_per_view ) . '" ' . 'data-carouselColumnGap="' . esc_attr( $settings['cozy_carousel_column_gap'] ); ?>" class=" team-box-holder layout-carousel swiper cozy-teams-carousel">
		<div class="swiper-wrapper">
			<?php
			if ( $cozy_team_query->have_posts() ) :
				while ( $cozy_team_query->have_posts() ) :
					$cozy_team_query->the_post();
					$team_position  = get_post_meta( get_the_ID(), 'cea_team_position', true );
					$team_company   = get_post_meta( get_the_ID(), 'cea_team_company', true );
					$team_facebook  = get_post_meta( get_the_ID(), 'cea_team_facebook', true );
					$team_twitter   = get_post_meta( get_the_ID(), 'cea_team_twitter', true );
					$team_linkedin  = get_post_meta( get_the_ID(), 'cea_team_linkedin', true );
					$team_youtube   = get_post_meta( get_the_ID(), 'cea_team_youtube', true );
					$team_github    = get_post_meta( get_the_ID(), 'cea_team_github', true );
					$team_instagram = get_post_meta( get_the_ID(), 'cea_team_instagram', true );
					?>
					<div class="slide swiper-slide">
						<div class="team-box">
							<span class="featured-image-holder">
								<?php if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' ) { ?>
									<a href="<?php the_permalink(); ?>" class="cozy-team-img content-block">
										<?php the_post_thumbnail(); ?>
									</a>
								<?php } ?>
							</span>
							<div class="team-content content-block">
								<?php if ( $settings['show_title'] == 'yes' ) { ?>
									<div class="cozy-team-title content-block">
										<a href="<?php the_permalink(); ?>">
																		<?php
																			echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="team-name">';
																			the_title();
																			echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
																		?>
																			</a>
									</div>
									<?php
								}
								if ( $settings['show_company'] == 'yes' || $settings['show_designation'] == 'yes' ) {
									echo '<div class="team-profession-info content-block">';
									if ( ! empty( $team_position && $settings['show_designation'] ) == 'yes' ) {
										echo '<span class="team-position">' . esc_html( $team_position ) . '</span>';
									}
									if ( ! empty( $team_company ) && $settings['show_company'] == 'yes' ) {
										echo $settings['company_seprator'];
										echo ' <span class="team-company">' . esc_html( $team_company ) . '</span>';
									}
									echo '</div>';
								}
								if ( $settings['show_social_icons'] == 'yes' && $settings['team_social_media_position'] == 'icon-before-excerpt' ) {
									if ( ! empty( $team_facebook ) || ! empty( $team_twitter ) || ! empty( $team_linkedin ) || ! empty( $team_youtube ) || ! empty( $team_github ) || ! empty( $team_instagram ) ) {
										?>
										<div class="cozy-team-social-media before-excerpt content-block">
											<?php
											if ( ! empty( $team_facebook ) ) {
												echo '<a href="' . esc_url( $team_facebook ) . '" target="_blank" class="facebook">';
												\Elementor\Icons_Manager::render_icon( $settings['team_facebook_icon'], array( 'aria-hidden' => 'true' ) );
												echo '</a>';
											}
											?>
											<?php
											if ( ! empty( $team_twitter ) ) {
												echo '<a href="' . esc_url( $team_twitter ) . '" target="_blank" class="twitter">';
												\Elementor\Icons_Manager::render_icon( $settings['team_twitter_icon'], array( 'aria-hidden' => 'true' ) );
												echo '</a>';
											}
											?>
											<?php
											if ( ! empty( $team_linkedin ) ) {
												echo '<a href="' . esc_url( $team_linkedin ) . '" target="_blank" class="linkedin">';
												\Elementor\Icons_Manager::render_icon( $settings['team_linkedin_icon'], array( 'aria-hidden' => 'true' ) );
												echo '</a>';
											}
											?>
											<?php
											if ( ! empty( $team_youtube ) ) {
												echo '<a href="' . esc_url( $team_youtube ) . '" target="_blank" class="youtube">';
												\Elementor\Icons_Manager::render_icon( $settings['team_youtube_icon'], array( 'aria-hidden' => 'true' ) );
												echo '</a>';
											}
											?>
											<?php
											if ( ! empty( $team_github ) ) {
												echo '<a href="' . esc_url( $team_github ) . '" target="_blank" class="github">';
												\Elementor\Icons_Manager::render_icon( $settings['team_github_icon'], array( 'aria-hidden' => 'true' ) );
												echo '</a>';
											}
											?>
											<?php
											if ( ! empty( $team_instagram ) ) {
												echo '<a href="' . esc_url( $team_instagram ) . '" target="_blank" class="instagram">';
												\Elementor\Icons_Manager::render_icon( $settings['team_instagram_icon'], array( 'aria-hidden' => 'true' ) );
												echo '</a>';
											}
											?>
										</div>
										<?php
									}
								}
								if ( $settings['show_excerpt'] == 'yes' && $selected_team_layout != 'layout-grid-overlay' ) {
									echo '<div class="team-excerpt">';
									echo esc_html( cozy_addons_excerpt( $excerpt_length ) );
									echo '</div>';
								}
								if ( $settings['show_social_icons'] == 'yes' && $settings['team_social_media_position'] == 'icon-after-excerpt' ) {
									if ( ! empty( $team_facebook ) || ! empty( $team_twitter ) || ! empty( $team_linkedin ) || ! empty( $team_youtube ) || ! empty( $team_github ) || ! empty( $team_instagram ) ) {
										?>
										<div class="cozy-team-social-media after-excerpt content-block">
											<?php
											if ( ! empty( $team_facebook ) ) {
												echo '<a href="' . esc_url( $team_facebook ) . '" target="_blank" class="facebook">';
												\Elementor\Icons_Manager::render_icon( $settings['team_facebook_icon'], array( 'aria-hidden' => 'true' ) );
												echo '</a>';
											}
											?>
											<?php
											if ( ! empty( $team_twitter ) ) {
												echo '<a href="' . esc_url( $team_twitter ) . '" target="_blank" class="twitter">';
												\Elementor\Icons_Manager::render_icon( $settings['team_twitter_icon'], array( 'aria-hidden' => 'true' ) );
												echo '</a>';
											}
											?>
											<?php
											if ( ! empty( $team_linkedin ) ) {
												echo '<a href="' . esc_url( $team_linkedin ) . '" target="_blank" class="linkedin">';
												\Elementor\Icons_Manager::render_icon( $settings['team_linkedin_icon'], array( 'aria-hidden' => 'true' ) );
												echo '</a>';
											}
											?>
											<?php
											if ( ! empty( $team_youtube ) ) {
												echo '<a href="' . esc_url( $team_youtube ) . '" target="_blank" class="youtube">';
												\Elementor\Icons_Manager::render_icon( $settings['team_youtube_icon'], array( 'aria-hidden' => 'true' ) );
												echo '</a>';
											}
											?>
											<?php
											if ( ! empty( $team_github ) ) {
												echo '<a href="' . esc_url( $team_github ) . '" target="_blank" class="github">';
												\Elementor\Icons_Manager::render_icon( $settings['team_github_icon'], array( 'aria-hidden' => 'true' ) );
												echo '</a>';
											}
											?>
											<?php
											if ( ! empty( $team_instagram ) ) {
												echo '<a href="' . esc_url( $team_instagram ) . '" target="_blank" class="instagram">';
												\Elementor\Icons_Manager::render_icon( $settings['team_instagram_icon'], array( 'aria-hidden' => 'true' ) );
												echo '</a>';
											}
											?>
										</div>
										<?php
									}
								}
								if ( $settings['button_text'] && $settings['show_cta_button'] == 'yes' && $selected_team_layout != 'layout-grid-overlay' ) :
									?>
									<span class="cta content-block">
										<?php

										$icon_class = 'before-text';
										if ( $settings['cta_icon_position'] == 'after-text' ) {
											$icon_class = 'after-text';
										}
										?>
										<a class="cta-button <?php echo esc_attr( $icon_class ); ?>" href="<?php the_permalink(); ?>">
											<?php
											if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text' ) {
												echo '<span class="button-icon">';
												\Elementor\Icons_Manager::render_icon( $settings['team_cta_icon'], array( 'aria-hidden' => 'true' ) );
												echo '</span>';
											}
											echo $settings['button_text'];
											if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text' ) {
												echo '<span class="button-icon">';
												\Elementor\Icons_Manager::render_icon( $settings['team_cta_icon'], array( 'aria-hidden' => 'true' ) );
												echo '</span>';
											}
											?>
										</a>
									</span>
									<?php
								endif;
								?>
							</div>
						</div>
					</div>
					<?php
			endwhile;

			endif;
			wp_reset_postdata();
			?>
		</div>
		<?php if ( $settings['show_carousel_navigation'] == 'yes' ) { ?>
			<div class="cozy-slide-prev cozy-slide-nav">
				<?php \Elementor\Icons_Manager::render_icon( $settings['slide_navigation_left_icon'], array( 'aria-hidden' => 'true' ) ); ?>
			</div>
			<div class="cozy-slide-next cozy-slide-nav">
				<?php \Elementor\Icons_Manager::render_icon( $settings['slide_navigation_right_icon'], array( 'aria-hidden' => 'true' ) ); ?>
			</div>
			<?php
		}
		if ( $settings['show_carousel_pagination'] ) {
			?>
			<div class="cozy-swiper-pagination"></div>
		<?php } ?>
	</div>
	<?php
} else {
	?>
	<div class="team-box-holder <?php echo esc_attr( $selected_team_layout ) . ' ' . esc_attr( $column_number_class ) . ' ' . esc_attr( $list_column_count ); ?>">
		<?php
		if ( $cozy_team_query->have_posts() ) :
			while ( $cozy_team_query->have_posts() ) :
				$cozy_team_query->the_post();
				$team_position  = get_post_meta( get_the_ID(), 'cea_team_position', true );
				$team_company   = get_post_meta( get_the_ID(), 'cea_team_company', true );
				$team_facebook  = get_post_meta( get_the_ID(), 'cea_team_facebook', true );
				$team_twitter   = get_post_meta( get_the_ID(), 'cea_team_twitter', true );
				$team_linkedin  = get_post_meta( get_the_ID(), 'cea_team_linkedin', true );
				$team_youtube   = get_post_meta( get_the_ID(), 'cea_team_youtube', true );
				$team_github    = get_post_meta( get_the_ID(), 'cea_team_github', true );
				$team_instagram = get_post_meta( get_the_ID(), 'cea_team_instagram', true );
				?>
				<div class="team-box">
					<span class="featured-image-holder">
						<?php if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' ) { ?>
							<a href="<?php the_permalink(); ?>" class="cozy-team-img content-block">
								<?php the_post_thumbnail(); ?>
							</a>
							<?php
						}
						echo '</span><div class="team-content content-block">';
						if ( $settings['show_title'] == 'yes' ) {
							?>
							<div class="cozy-team-title content-block">
								<a href="<?php the_permalink(); ?>">
																<?php
																	echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="team-name">';
																	the_title();
																	echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
																?>
																	</a>
							</div>
							<?php
						}

						if ( $settings['show_company'] == 'yes' || $settings['show_designation'] == 'yes' ) {

							echo '<div class="team-profession-info content-block">';
							if ( ! empty( $team_position && $settings['show_designation'] ) == 'yes' ) {
								echo '<span class="team-position">' . esc_html( $team_position ) . '</span>';
							}
							if ( $selected_team_layout != 'layout-grid-overlay' ) {
								if ( ! empty( $team_company ) && $settings['show_company'] == 'yes' ) {
									echo $settings['company_seprator'];
									echo ' <span class="team-company">' . esc_html( $team_company ) . '</span>';
								}
							}
							echo '</div>';
						}
						if ( $settings['show_social_icons'] == 'yes' && $settings['team_social_media_position'] == 'icon-before-excerpt' ) {
							if ( ! empty( $team_facebook ) || ! empty( $team_twitter ) || ! empty( $team_linkedin ) || ! empty( $team_youtube ) || ! empty( $team_github ) || ! empty( $team_instagram ) ) {
								?>
								<div class="cozy-team-social-media before-excerpt content-block">
									<?php
									if ( ! empty( $team_facebook ) ) {
										echo '<a href="' . esc_url( $team_facebook ) . '" target="_blank" class="facebook">';
										\Elementor\Icons_Manager::render_icon( $settings['team_facebook_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</a>';
									}
									?>
									<?php
									if ( ! empty( $team_twitter ) ) {
										echo '<a href="' . esc_url( $team_twitter ) . '" target="_blank" class="twitter">';
										\Elementor\Icons_Manager::render_icon( $settings['team_twitter_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</a>';
									}
									?>
									<?php
									if ( ! empty( $team_linkedin ) ) {
										echo '<a href="' . esc_url( $team_linkedin ) . '" target="_blank" class="linkedin">';
										\Elementor\Icons_Manager::render_icon( $settings['team_linkedin_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</a>';
									}
									?>
									<?php
									if ( ! empty( $team_youtube ) ) {
										echo '<a href="' . esc_url( $team_youtube ) . '" target="_blank" class="youtube">';
										\Elementor\Icons_Manager::render_icon( $settings['team_youtube_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</a>';
									}
									?>
									<?php
									if ( ! empty( $team_github ) ) {
										echo '<a href="' . esc_url( $team_github ) . '" target="_blank" class="github">';
										\Elementor\Icons_Manager::render_icon( $settings['team_github_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</a>';
									}
									?>
									<?php
									if ( ! empty( $team_instagram ) ) {
										echo '<a href="' . esc_url( $team_instagram ) . '" target="_blank" class="instagram">';
										\Elementor\Icons_Manager::render_icon( $settings['team_instagram_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</a>';
									}
									?>
								</div>
								<?php
							}
						}
						if ( $settings['show_excerpt'] == 'yes' && $selected_team_layout != 'layout-grid-overlay' ) {
							echo '<div class="team-excerpt">';
							echo cozy_addons_excerpt( $excerpt_length );
							echo '</div>';
						}
						if ( $settings['show_social_icons'] == 'yes' && $settings['team_social_media_position'] == 'icon-after-excerpt' && $selected_team_layout == 'layout-grid-overlay' ) {
							if ( ! empty( $team_facebook ) || ! empty( $team_twitter ) || ! empty( $team_linkedin ) || ! empty( $team_youtube ) || ! empty( $team_github ) || ! empty( $team_instagram ) ) {
								?>
								<div class="cozy-team-social-media after-excerpt content-block">
									<?php
									if ( ! empty( $team_facebook ) ) {
										echo '<a href="' . esc_url( $team_facebook ) . '" target="_blank" class="facebook">';
										\Elementor\Icons_Manager::render_icon( $settings['team_facebook_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</a>';
									}
									?>
									<?php
									if ( ! empty( $team_twitter ) ) {
										echo '<a href="' . esc_url( $team_twitter ) . '" target="_blank" class="twitter">';
										\Elementor\Icons_Manager::render_icon( $settings['team_twitter_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</a>';
									}
									?>
									<?php
									if ( ! empty( $team_linkedin ) ) {
										echo '<a href="' . esc_url( $team_linkedin ) . '" target="_blank" class="linkedin">';
										\Elementor\Icons_Manager::render_icon( $settings['team_linkedin_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</a>';
									}
									?>
									<?php
									if ( ! empty( $team_youtube ) ) {
										echo '<a href="' . esc_url( $team_youtube ) . '" target="_blank" class="youtube">';
										\Elementor\Icons_Manager::render_icon( $settings['team_youtube_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</a>';
									}
									?>
									<?php
									if ( ! empty( $team_github ) ) {
										echo '<a href="' . esc_url( $team_github ) . '" target="_blank" class="github">';
										\Elementor\Icons_Manager::render_icon( $settings['team_github_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</a>';
									}
									?>
									<?php
									if ( ! empty( $team_instagram ) ) {
										echo '<a href="' . esc_url( $team_instagram ) . '" target="_blank" class="instagram">';
										\Elementor\Icons_Manager::render_icon( $settings['team_instagram_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</a>';
									}
									?>
								</div>
								<?php
							}
						}
						if ( $settings['button_text'] && $settings['show_cta_button'] == 'yes' && $selected_team_layout != 'layout-grid-overlay' ) :
							?>
							<span class="cta content-block">
								<?php

								$icon_class = 'before-text';
								if ( $settings['cta_icon_position'] == 'after-text' ) {
									$icon_class = 'after-text';
								}
								?>
								<a class="cta-button <?php echo esc_attr( $icon_class ); ?>" href="<?php the_permalink(); ?>">
									<?php
									if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text' ) {
										echo '<span class="button-icon">';
										\Elementor\Icons_Manager::render_icon( $settings['team_cta_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</span>';
									}
									echo $settings['button_text'];
									if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text' ) {
										echo '<span class="button-icon">';
										\Elementor\Icons_Manager::render_icon( $settings['team_cta_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</span>';
									}
									echo '</a>';
									?>
							</span>
							<?php
						endif;
						echo '</div>';
						?>
				</div>
				<?php
		endwhile;
		endif;
		wp_reset_postdata();
		?>
	</div>
	<?php
	cozy_pagination_function( $settings, $cozy_team_query, html_entity_decode( get_pagenum_link() ) );
} ?>