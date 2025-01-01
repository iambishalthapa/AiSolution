<?php
require_once COZY_ADDONS_PLUGIN_DIR . 'public/partials/partial-functions.php';
$selected_promotion_layout = $settings['promotion_select_layout'];
$column_number_class       = $settings['promotion_grid_column'];
$post_per_page             = $settings['posts_per_page'];
$post_offset               = $settings['posts_offset'];
$order_by                  = $settings['promotion_orderby'];
$order                     = $settings['promotion_order'];
$cats                      = $settings['promotion_categories'];
$excerpt_length            = $settings['promotion_excerpt_length'];

$tax_query = array();
if ( $cats ) {
	foreach ( $cats as $cat ) {
		$cat_terms[] = $cat;
	}
	$tax_query[] = array(
		array(
			'taxonomy' => 'cea_promotion_category',
			'field'    => 'id',
			'terms'    => $cat_terms,
		),
	);
}
$cozy_addons_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$cozy_query        = new WP_Query(
	array(
		'post_type'      => 'cea_promotion',
		'post_status'    => 'publish',
		'posts_per_page' => $post_per_page,
		'orderby'        => $order_by,
		'order'          => $order,
		'paged'          => $cozy_addons_paged,
		'offset'         => $post_offset,
		'tax_query'      => $tax_query,
	)
);
if ( $selected_promotion_layout == 'layout-carousel' ) {
	$promotion_slide_id = 'cozyOfferCarousel';
	$slide_per_view     = $settings['cozy_carousel_post_per_view'];
	if ( $cozy_query->have_posts() ) : ?>
		<div id="<?php echo esc_attr( $promotion_slide_id ) . '"' . ' ' . 'data-slidePerView="' . esc_attr( $slide_per_view ) . '" ' . 'data-carouselColumnGap="' . esc_attr( $settings['cozy_carousel_column_gap'] ); ?>" class=" promotion-holder swiper">
			<div class="swiper-wrapper">
				<?php
				while ( $cozy_query->have_posts() ) :
					$cozy_query->the_post();
					echo '<div class="slide swiper-slide">';
					echo '<div class="promotion-box content-block">';
					if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' ) {
						?>
						<div class="cozy-promotion-img">
							<?php
							if ( $settings['linked_featured_image'] == 'yes' ) {
								?>
								<a href="<?php the_permalink(); ?>">
								<?php
							}
							the_post_thumbnail();
							if ( $settings['linked_featured_image'] == 'yes' ) {
								?>
								</a>
								<?php
							}
							?>
						</div>
						<?php
					}
					if ( $settings['show_title'] == 'yes' || $settings['show_content'] == 'yes' || $settings['show_cta_button'] == 'yes' ) {
						echo '<div class="promotion-content content-block">';
						if ( $settings['show_title'] == 'yes' ) {
							echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="promotion-title content-block">';
							the_title();
							echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
						}
						if ( $settings['show_content'] == 'yes' ) {
							if ( $settings['promotion_description_type'] == 'promotion-content' ) {
								the_content();
							} else {
								echo esc_html( cozy_addons_excerpt( $excerpt_length ) );
							}
						}
						if ( $settings['show_cta_button'] == 'yes' && $settings['button_text'] ) {
							$icon_class = 'before-text';
							if ( $settings['cta_icon_position'] == 'after-text' ) {
								$icon_class = 'after-text';
							}
							?>
							<span class="cta content-block">
								<a href="<?php the_permalink(); ?>" class="promotion-more <?php echo esc_attr( $icon_class ); ?>">
									<?php
									if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text' ) {
										echo '<span class="button-icon">';
										\Elementor\Icons_Manager::render_icon( $settings['promotion_cta_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</span>';
									}
									echo esc_html( $settings['button_text'] );
									if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text' ) {
										echo '<span class="button-icon">';
										\Elementor\Icons_Manager::render_icon( $settings['promotion_cta_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</span>';
									}
									?>
								</a>
							</span>
							<?php
						}
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
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
		echo '<div class="promotion-holder ' . esc_attr( $column_number_class ) . '">';
		while ( $cozy_query->have_posts() ) :
			$cozy_query->the_post();
			echo '<div class="promotion-box content-block">';
			if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' ) {
				?>
						<div class="cozy-promotion-img">
							<?php
							if ( $settings['linked_featured_image'] == 'yes' ) {
								?>
								<a href="<?php the_permalink(); ?>">
								<?php
							}
							the_post_thumbnail();
							if ( $settings['linked_featured_image'] == 'yes' ) {
								?>
								</a>
								<?php
							}
							?>
						</div>
						<?php
			}
			if ( $settings['show_title'] == 'yes' || $settings['show_content'] == 'yes' || $settings['show_cta_button'] == 'yes' ) {
				echo '<div class="promotion-content content-block">';
				if ( $settings['show_title'] == 'yes' ) {
					echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="promotion-title content-block">';
					the_title();
					echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
				}
				if ( $settings['show_content'] == 'yes' ) {
					if ( $settings['promotion_description_type'] == 'promotion-content' ) {
						the_content();
					} else {
						echo esc_html( cozy_addons_excerpt( $excerpt_length ) );
					}
				}
				if ( $settings['show_cta_button'] == 'yes' && $settings['button_text'] ) {
					$icon_class = 'before-text';
					if ( $settings['cta_icon_position'] == 'after-text' ) {
						$icon_class = 'after-text';
					}
					?>
							<span class="cta content-block">
								<a href="<?php the_permalink(); ?>" class="promotion-more <?php echo esc_attr( $icon_class ); ?>">
							<?php
							if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text' ) {
								echo '<span class="button-icon">';
								\Elementor\Icons_Manager::render_icon( $settings['promotion_cta_icon'], array( 'aria-hidden' => 'true' ) );
								echo '</span>';
							}
							echo esc_html( $settings['button_text'] );
							if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text' ) {
								echo '<span class="button-icon">';
								\Elementor\Icons_Manager::render_icon( $settings['promotion_cta_icon'], array( 'aria-hidden' => 'true' ) );
								echo '</span>';
							}
							?>
								</a>
							</span>
					<?php
				}
				echo '</div>';
			}
			echo '</div>';
		endwhile;
		echo '</div>';
		cozy_pagination_function( $settings, $cozy_query, html_entity_decode( get_pagenum_link() ) );

	endif;
	wp_reset_postdata();
}
