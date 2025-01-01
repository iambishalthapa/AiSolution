<?php

require_once COZY_ADDONS_PLUGIN_DIR . 'public/partials/partial-functions.php';
$column_number_class = '';
if ( cozy_addons_premium_access() ) {
	$selected_testimonial_layout = $settings['testimonial_select_layout'];
	$post_per_page               = $settings['posts_per_page'];
	if ( $selected_testimonial_layout == 'layout-grid' ) {
		$column_number_class = $settings['testimonial_grid_column'];
	}
} else {
	$selected_testimonial_layout = 'layout-carousel';
	$post_per_page               = 3;
}

$post_offset    = $settings['posts_offset'];
$order_by       = $settings['testimonial_orderby'];
$order          = $settings['testimonial_order'];
$cats           = $settings['testimonial_categories'];
$excerpt_length = $settings['testimonial_excerpt_length'];

$tax_query = array();
if ( $cats ) {
	foreach ( $cats as $cat ) {
		$cat_terms[] = $cat;
	}
	$tax_query[] = array(
		array(
			'taxonomy' => 'cea_testimonial_category',
			'field'    => 'id',
			'terms'    => $cat_terms,
		),
	);
}
$cozy_addons_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$cozy_query        = new WP_Query(
	array(
		'post_type'      => 'cea_testimonial',
		'post_status'    => 'publish',
		'posts_per_page' => $post_per_page,
		'paged'          => $cozy_addons_paged,
		'orderby'        => $order_by,
		'order'          => $order,
		'offset'         => $post_offset,
		'tax_query'      => $tax_query,
	)
);

if ( $selected_testimonial_layout == 'layout-list' ) {

	if ( $cozy_query->have_posts() ) :
		echo '<div class="testimonials-holder ' . esc_attr( $column_number_class ) . '">';
		while ( $cozy_query->have_posts() ) :
			$cozy_query->the_post();
			// echo the_post();

			$reviewer_position = get_post_meta( get_the_ID(), 'cea_testimonial_position', true );
			$reviewer_company  = get_post_meta( get_the_ID(), 'cea_testimonial_company', true );
			echo '<div class="testimonial-box content-block">';
			if ( has_post_thumbnail() && $settings['show_featured_image'] === 'yes' ) { ?>
				<div class="cozy-testimonial-img content-block">
					<?php
					the_post_thumbnail( 'medium' );
					?>
				</div>
				<?php
			}
			echo '<div class="list-content">';
			echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="reviewer-name content-block">';
			the_title();
			echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
			if ( $settings['show_company'] == 'yes' || $settings['show_designation'] == 'yes' ) {
				echo '<div class="company-details">';
				if ( ! empty( $reviewer_position && $settings['show_designation'] ) == 'yes' ) {
					echo '<span class="testimonial-position">' . esc_html( $reviewer_position ) . '</span>';
				}
				if ( ! empty( $reviewer_company ) && $settings['show_company'] == 'yes' ) {
					echo $settings['company_separator'];
					echo ' <span class="testimonial-company">' . esc_html( $reviewer_company ) . '</span>';
				}
				echo '</div>';
			}
			if ( $settings['show_review_star_icon'] == 'yes' ) {
				echo "<span class='cozy-addons-review-star'>";
				for ( $rs = 1; $rs <= 5; $rs++ ) {
					\Elementor\Icons_Manager::render_icon( $settings['select_rating_star_icon'] );
				}
				echo '</span>';
			}
			echo '<div class="testimonial-content content-block">';
			if ( $settings['testimonial_description_type'] == 'testimonial-excerpt' ) {
				echo esc_html( cozy_addons_excerpt( $excerpt_length ) );
			} else {
				the_content();
			}
			echo '</div>';
			echo '<div class="reviewer-info content-block">';

			echo '</div>';
			echo '</div>';
			if ( $settings['show_review_quote_icon'] == 'yes' ) {
				echo "<span class='cozy-addons-quote-icon'>";
				if ( $settings['review_quote_icon_type'] == 'quote-type-icon' && $settings['review_quote_icon'] ) {
					\Elementor\Icons_Manager::render_icon( $settings['review_quote_icon'] );
				}
				if ( $settings['review_quote_icon_type'] == 'quote-type-image' && $settings['review_quote_icon_image'] ) {
					?>
					<img src="<?php echo esc_url( $settings['review_quote_icon_image']['url'] ); ?>" />
					<?php
				}
				echo '</span>';
			}
			echo '</div>';
			// wp_link_pages();

		endwhile;
		echo '</div>';
		cozy_pagination_function( $settings, $cozy_query, html_entity_decode( get_pagenum_link() ) );
	endif;
	wp_reset_postdata();
} elseif ( $selected_testimonial_layout == 'layout-slide' ) {

	if ( $cozy_query->have_posts() ) :
		echo '<div class="testimonials-holder swiper cozy-testimonial-slide">';
		echo '<div class="swiper-wrapper">';
		while ( $cozy_query->have_posts() ) :
			$cozy_query->the_post();
			$reviewer_position = get_post_meta( get_the_ID(), 'cea_testimonial_position', true );
			$reviewer_company  = get_post_meta( get_the_ID(), 'cea_testimonial_company', true );
			echo '<div class="slide swiper-slide">';
			echo '<div class="testimonial-box content-block">';
			if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' && $settings['featured_image_position'] == 'above-content' ) {
				?>
				<div class="cozy-testimonial-img content-block">
					<?php the_post_thumbnail(); ?>
				</div>
				<?php
			}
			echo '<div class="content-holder">';
			echo '<div class="testimonial-content content-block">';
			if ( $settings['testimonial_description_type'] == 'testimonial-excerpt' ) {

				echo esc_html( cozy_addons_excerpt( $excerpt_length ) );
			} else {

				the_content();
			}
			echo '</div>';
			if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' && $settings['featured_image_position'] == 'below-content' ) {
				?>
				<div class="cozy-testimonial-img content-block">
					<?php the_post_thumbnail(); ?>
				</div>
				<?php
			}
			echo '<div class="reviewer-info content-block">';
			echo '<' . cozy_filter_html_tags( $settings['title_tag'] ) . ' class="reviewer-name content-block">';
			the_title();
			echo '</' . cozy_filter_html_tags( $settings['title_tag'] ) . '>';
			if ( $settings['show_company'] == 'yes' || $settings['show_designation'] == 'yes' ) {
				echo '<div class="company-details">';
				if ( ! empty( $reviewer_position && $settings['show_designation'] ) == 'yes' ) {
					echo '<span class="testimonial-position">' . esc_html( $reviewer_position ) . '</span>';
				}
				if ( ! empty( $reviewer_company ) && $settings['show_company'] == 'yes' ) {
					echo $settings['company_separator'];
					echo ' <span class="testimonial-company">' . esc_html( $reviewer_company ) . '</span>';
				}
				echo '</div>';
			}
			if ( $settings['show_review_star_icon'] == 'yes' ) {
				echo "<span class='cozy-addons-review-star'>";
				for ( $rs = 1; $rs <= 5; $rs++ ) {
					\Elementor\Icons_Manager::render_icon( $settings['select_rating_star_icon'] );
				}
				echo '</span>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			if ( $settings['show_review_quote_icon'] == 'yes' ) {
				echo "<span class='cozy-addons-quote-icon'>";
				if ( $settings['review_quote_icon_type'] == 'quote-type-icon' && $settings['review_quote_icon'] ) {
					\Elementor\Icons_Manager::render_icon( $settings['review_quote_icon'] );
				}
				if ( $settings['review_quote_icon_type'] == 'quote-type-image' && $settings['review_quote_icon_image'] ) {
					?>
					<img src="<?php echo esc_url( $settings['review_quote_icon_image']['url'] ); ?>" />
					<?php
				}
				echo '</span>';
			}
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
			echo '<div class="cozy-swiper-pagination"></div>';
		}
		echo '</div>';
	endif;
	wp_reset_postdata();
} elseif ( $selected_testimonial_layout == 'layout-carousel-style-2' ) {

	if ( $cozy_query->have_posts() ) :
		echo '<div class="testimonials-holder swiper cozy-testimonial-centered">';
		echo '<div class="swiper-wrapper">';
		while ( $cozy_query->have_posts() ) :
			$cozy_query->the_post();
			$reviewer_position = get_post_meta( get_the_ID(), 'cea_testimonial_position', true );
			$reviewer_company  = get_post_meta( get_the_ID(), 'cea_testimonial_company', true );
			echo '<div class="slide swiper-slide">';
			echo '<div class="testimonial-box content-block">';
			if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' && $settings['featured_image_position'] == 'above-content' ) {
				?>
				<div class="cozy-testimonial-img content-block">
					<?php the_post_thumbnail(); ?>
				</div>
				<?php
				echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="reviewer-name content-block">';
				the_title();
				echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
				if ( $settings['show_company'] == 'yes' || $settings['show_designation'] == 'yes' ) {
					echo '<div class="company-details">';
					if ( ! empty( $reviewer_position && $settings['show_designation'] ) == 'yes' ) {
						echo '<span class="testimonial-position">' . esc_html( $reviewer_position ) . '</span>';
					}
					if ( ! empty( $reviewer_company ) && $settings['show_company'] == 'yes' ) {
						echo $settings['company_separator'];
						echo ' <span class="testimonial-company">' . esc_html( $reviewer_company ) . '</span>';
					}
					echo '</div>';
				}
				if ( $settings['show_review_star_icon'] == 'yes' ) {
					echo "<span class='cozy-addons-review-star'>";
					for ( $rs = 1; $rs <= 5; $rs++ ) {
						\Elementor\Icons_Manager::render_icon( $settings['select_rating_star_icon'] );
					}
					echo '</span>';
				}
			}
			echo '<div class="testimonial-content content-block">';
			if ( $settings['testimonial_description_type'] == 'testimonial-excerpt' ) {
				echo cozy_addons_excerpt( $excerpt_length );
			} else {
				the_content();
			}
			echo '</div>';
			if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' && $settings['featured_image_position'] == 'below-content' ) {
				?>
				<div class="cozy-testimonial-img content-block">
					<?php the_post_thumbnail(); ?>
				</div>
				<?php
				echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="reviewer-name content-block">';
				the_title();
				echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
				if ( $settings['show_company'] == 'yes' || $settings['show_designation'] == 'yes' ) {
					echo '<div class="company-details">';
					if ( ! empty( $reviewer_position && $settings['show_designation'] ) == 'yes' ) {
						echo '<span class="testimonial-position">' . esc_html( $reviewer_position ) . '</span>';
					}
					if ( ! empty( $reviewer_company ) && $settings['show_company'] == 'yes' ) {
						echo $settings['company_separator'];
						echo ' <span class="testimonial-company">' . esc_html( $reviewer_company ) . '</span>';
					}
					echo '</div>';
				}
				if ( $settings['show_review_star_icon'] == 'yes' ) {
					echo "<span class='cozy-addons-review-star'>";
					for ( $rs = 1; $rs <= 5; $rs++ ) {
						\Elementor\Icons_Manager::render_icon( $settings['select_rating_star_icon'] );
					}
					echo '</span>';
				}
			}
			echo '</div>';
			if ( $settings['show_review_quote_icon'] == 'yes' ) {
				echo "<span class='cozy-addons-quote-icon'>";
				if ( $settings['review_quote_icon_type'] == 'quote-type-icon' && $settings['review_quote_icon'] ) {
					\Elementor\Icons_Manager::render_icon( $settings['review_quote_icon'] );
				}
				if ( $settings['review_quote_icon_type'] == 'quote-type-image' && $settings['review_quote_icon_image'] ) {
					?>
					<img src="<?php echo esc_url( $settings['review_quote_icon_image']['url'] ); ?>" />
					<?php
				}
				echo '</span>';
			}
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
			echo '<div class="cozy-swiper-pagination"></div>';
		}
		echo '</div>';
	endif;
	wp_reset_postdata();
} elseif ( $selected_testimonial_layout == 'layout-carousel' ) {

	$testimonial_slide_id = 'cozyTestimonialCarousel';
	$slide_per_view       = 3;
	if ( cozy_addons_premium_access() ) {
		$slide_per_view = $settings['cozy_carousel_post_per_view'];
	}

	if ( $cozy_query->have_posts() ) :
		?>
		<div id="<?php echo esc_attr( $testimonial_slide_id ) . '"' . ' ' . 'data-slidePerView="' . esc_attr( $slide_per_view ) . '" ' . 'data-carouselColumnGap="' . esc_attr( $settings['cozy_carousel_column_gap'] ); ?>" class=" testimonials-holder swiper">
			<div class="swiper-wrapper">
				<?php
				while ( $cozy_query->have_posts() ) :
					$cozy_query->the_post();
					$reviewer_position = get_post_meta( get_the_ID(), 'cea_testimonial_position', true );
					$reviewer_company  = get_post_meta( get_the_ID(), 'cea_testimonial_company', true );
					echo '<div class="slide swiper-slide">';
					echo '<div class="testimonial-box content-block">';
					if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' && $settings['featured_image_position'] == 'above-content' ) {
						?>
						<div class="cozy-testimonial-img content-block">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php
						echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="reviewer-name content-block">';
						the_title();
						echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
						if ( $settings['show_company'] == 'yes' || $settings['show_designation'] == 'yes' ) {
							echo '<div class="company-details">';
							if ( ! empty( $reviewer_position && $settings['show_designation'] ) == 'yes' ) {
								echo '<span class="testimonial-position">' . esc_html( $reviewer_position ) . '</span>';
							}
							if ( ! empty( $reviewer_company ) && $settings['show_company'] == 'yes' ) {
								echo $settings['company_separator'];
								echo ' <span class="testimonial-company">' . esc_html( $reviewer_company ) . '</span>';
							}
							echo '</div>';
						}
						if ( $settings['show_review_star_icon'] == 'yes' ) {
							echo "<span class='cozy-addons-review-star'>";
							for ( $rs = 1; $rs <= 5; $rs++ ) {
								\Elementor\Icons_Manager::render_icon( $settings['select_rating_star_icon'] );
							}
							echo '</span>';
						}
					}
					echo '<div class="testimonial-content content-block">';
					if ( $settings['testimonial_description_type'] == 'testimonial-excerpt' ) {

						echo cozy_addons_excerpt( $excerpt_length );
					} else {

						the_content();
					}
					echo '</div>';
					if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' && $settings['featured_image_position'] == 'below-content' ) {
						?>
						<div class="cozy-testimonial-img content-block">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php
						echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="reviewer-name content-block">';
						the_title();
						echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
						if ( $settings['show_company'] == 'yes' || $settings['show_designation'] == 'yes' ) {
							echo '<div class="company-details">';
							if ( ! empty( $reviewer_position && $settings['show_designation'] ) == 'yes' ) {
								echo '<span class="testimonial-position">' . esc_html( $reviewer_position ) . '</span>';
							}
							if ( ! empty( $reviewer_company ) && $settings['show_company'] == 'yes' ) {
								echo $settings['company_separator'];
								echo ' <span class="testimonial-company">' . esc_html( $reviewer_company ) . '</span>';
							}
							echo '</div>';
						}
						if ( $settings['show_review_star_icon'] == 'yes' ) {
							echo "<span class='cozy-addons-review-star'>";
							for ( $rs = 1; $rs <= 5; $rs++ ) {
								\Elementor\Icons_Manager::render_icon( $settings['select_rating_star_icon'] );
							}
							echo '</span>';
						}
					}

					echo '</div>';
					if ( $settings['show_review_quote_icon'] == 'yes' ) {
						echo "<span class='cozy-addons-quote-icon'>";
						if ( $settings['review_quote_icon_type'] == 'quote-type-icon' && $settings['review_quote_icon'] ) {
							\Elementor\Icons_Manager::render_icon( $settings['review_quote_icon'] );
						}
						if ( $settings['review_quote_icon_type'] == 'quote-type-image' && $settings['review_quote_icon_image'] ) {
							?>
							<img src="<?php echo esc_url( $settings['review_quote_icon_image']['url'] ); ?>" />
							<?php
						}
						echo '</span>';
					}
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
					echo '<div class="cozy-swiper-pagination"></div>';
				}

				echo '</div>';
			endif;
			wp_reset_postdata();
} else {
	if ( $cozy_query->have_posts() ) :
		echo '<div class="testimonials-holder ' . esc_attr( $column_number_class ) . '">';
		while ( $cozy_query->have_posts() ) :
			$cozy_query->the_post();
			$reviewer_position = get_post_meta( get_the_ID(), 'cea_testimonial_position', true );
			$reviewer_company  = get_post_meta( get_the_ID(), 'cea_testimonial_company', true );
			echo '<div class="testimonial-box content-block">';
			if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' && $settings['featured_image_position'] == 'above-content' ) {
				?>
						<div class="cozy-testimonial-img content-block">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php
						echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="reviewer-name content-block">';
						the_title();
						echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
						if ( $settings['show_company'] == 'yes' || $settings['show_designation'] == 'yes' ) {
							echo '<div class="company-details">';
							if ( ! empty( $reviewer_position && $settings['show_designation'] ) == 'yes' ) {
								echo '<span class="testimonial-position">' . esc_html( $reviewer_position ) . '</span>';
							}
							if ( ! empty( $reviewer_company ) && $settings['show_company'] == 'yes' ) {
								echo $settings['company_separator'];
								echo ' <span class="testimonial-company">' . esc_html( $reviewer_company ) . '</span>';
							}
							echo '</div>';
						}
						if ( $settings['show_review_star_icon'] == 'yes' ) {
							echo "<span class='cozy-addons-review-star'>";
							for ( $rs = 1; $rs <= 5; $rs++ ) {
								\Elementor\Icons_Manager::render_icon( $settings['select_rating_star_icon'] );
							}
							echo '</span>';
						}
			}
			echo '<div class="testimonial-content content-block">';

			if ( $settings['testimonial_description_type'] == 'testimonial-excerpt' ) {

				echo cozy_addons_excerpt( $excerpt_length );
			} else {
				the_content();
			}
			echo '</div>';
			if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' && $settings['featured_image_position'] == 'below-content' ) {
				?>
						<div class="cozy-testimonial-img content-block">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php
						echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="reviewer-name content-block">';
						the_title();
						echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
						if ( $settings['show_company'] == 'yes' || $settings['show_designation'] == 'yes' ) {
							echo '<div class="company-details">';
							if ( ! empty( $reviewer_position && $settings['show_designation'] ) == 'yes' ) {
								echo '<span class="testimonial-position">' . esc_html( $reviewer_position ) . '</span>';
							}
							if ( ! empty( $reviewer_company ) && $settings['show_company'] == 'yes' ) {
								echo $settings['company_separator'];
								echo ' <span class="testimonial-company">' . esc_html( $reviewer_company ) . '</span>';
							}
							echo '</div>';
						}
						if ( $settings['show_review_star_icon'] == 'yes' ) {
							echo "<span class='cozy-addons-review-star'>";
							for ( $rs = 1; $rs <= 5; $rs++ ) {
								\Elementor\Icons_Manager::render_icon( $settings['select_rating_star_icon'] );
							}
							echo '</span>';
						}
			}
			if ( $settings['show_review_quote_icon'] == 'yes' ) {
				echo "<span class='cozy-addons-quote-icon'>";
				if ( $settings['review_quote_icon_type'] == 'quote-type-icon' && $settings['review_quote_icon'] ) {
					\Elementor\Icons_Manager::render_icon( $settings['review_quote_icon'] );
				}
				if ( $settings['review_quote_icon_type'] == 'quote-type-image' && $settings['review_quote_icon_image'] ) {
					?>
							<img src="<?php echo esc_url( $settings['review_quote_icon_image']['url'] ); ?>" />
					<?php
				}
				echo '</span>';
			}
			echo '</div>';
		endwhile;
		echo '</div>';
		cozy_pagination_function( $settings, $cozy_query, html_entity_decode( get_pagenum_link() ) );
	endif;
	wp_reset_postdata();
}
