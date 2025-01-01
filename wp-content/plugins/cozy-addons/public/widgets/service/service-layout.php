<?php
require_once COZY_ADDONS_PLUGIN_DIR . 'public/partials/partial-functions.php';
$selected_service_layout = $settings['service_select_layout'];
$column_number_class     = '';
if ( $selected_service_layout == 'layout-grid' ) {
	$column_number_class = $settings['services_grid_column'];
}
$post_per_page  = $settings['posts_per_page'];
$post_offset    = $settings['posts_offset'];
$order_by       = $settings['service_orderby'];
$order          = $settings['service_order'];
$cats           = $settings['service_categories'];
$excerpt_length = $settings['service_excerpt_length'];

$tax_query = array();
if ( $cats ) {
	foreach ( $cats as $cat ) {
		$cat_terms[] = $cat;
	}
	$tax_query[] = array(
		array(
			'taxonomy' => 'cea_service_category',
			'field'    => 'id',
			'terms'    => $cat_terms,
		),
	);
}
$cozy_addons_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$cozy_query        = new WP_Query(
	array(
		'post_type'      => 'cea_service',
		'post_status'    => 'publish',
		'posts_per_page' => $post_per_page,
		'orderby'        => $order_by,
		'order'          => $order,
		'paged'          => $cozy_addons_paged,
		'offset'         => $post_offset,
		'tax_query'      => $tax_query,
	)
);
if ( $selected_service_layout == 'layout-carousel' ) {
	if ( $cozy_query->have_posts() ) :
		if ( $settings['services_carousel_column'] == 'col-carousel-4' ) {
			$column_carousel_class = 'cozy-service-four';
		} else {
			$column_carousel_class = 'cozy-service-default';
		}
		echo '<div class="services-holder swiper ' . esc_attr( $column_carousel_class ) . '">';
		echo '<div class="swiper-wrapper">';
		while ( $cozy_query->have_posts() ) :
			$cozy_query->the_post();
			echo '<div class="slide swiper-slide">';
			echo '<div class="service-box content-block">';
			if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' ) { ?>
				<div class="cozy-service-img">
					<?php
					the_post_thumbnail();
					?>
				</div>
				<?php
			}
			if ( $settings['show_title'] == 'yes' ) {
				echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="service-title content-block">';
				the_title();
				echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
			}
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
					<a href="<?php the_permalink(); ?>" class="service-more <?php echo esc_attr( $icon_class ); ?>">
						<?php
						if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text' ) {
							echo '<span class="button-icon">';
							\Elementor\Icons_Manager::render_icon( $settings['service_cta_icon'], array( 'aria-hidden' => 'true' ) );
							echo '</span>';
						}
						echo esc_html( $settings['button_text'] );
						if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text' ) {
							echo '<span class="button-icon">';
							\Elementor\Icons_Manager::render_icon( $settings['service_cta_icon'], array( 'aria-hidden' => 'true' ) );
							echo '</span>';
						}
						?>
					</a>
				</span>
				<?php
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
} elseif ( $cozy_query->have_posts() ) {
		echo '<div class="services-holder ' . esc_attr( $column_number_class ) . '">';
	while ( $cozy_query->have_posts() ) :
		$cozy_query->the_post();
		echo '<div class="service-box content-block">';
		if ( has_post_thumbnail() && $settings['show_featured_image'] == 'yes' ) {
			?>
				<div class="cozy-service-img">
				<?php
				the_post_thumbnail();
				?>
				</div>
			<?php
		}
		if ( $settings['show_title'] == 'yes' ) {
			echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="service-title content-block">';
			the_title();
			echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
		}
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
					<a href="<?php the_permalink(); ?>" class="service-more <?php echo esc_attr( $icon_class ); ?>">
					<?php
					if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text' ) {
						echo '<span class="button-icon">';
						\Elementor\Icons_Manager::render_icon( $settings['service_cta_icon'], array( 'aria-hidden' => 'true' ) );
						echo '</span>';
					}
					echo esc_html( $settings['button_text'] );
					if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text' ) {
						echo '<span class="button-icon">';
						\Elementor\Icons_Manager::render_icon( $settings['service_cta_icon'], array( 'aria-hidden' => 'true' ) );
						echo '</span>';
					}
					?>
					</a>
				</span>
			<?php
		}
		echo '</div>';
		endwhile;
		echo '</div>';
		cozy_pagination_function( $settings, $cozy_query, html_entity_decode( get_pagenum_link() ) );
}
