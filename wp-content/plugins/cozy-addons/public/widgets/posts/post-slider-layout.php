<?php
require_once COZY_ADDONS_PLUGIN_DIR . 'public/partials/partial-functions.php';
$selected_slider_layout = $settings['slider_select_layout'];

$selected_category = $settings['slider_category'];
$post_per_page     = $settings['posts_per_page'];

$cozy_query = new WP_Query(
	array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => $post_per_page,
		'cat'            => $selected_category,
	)
);

if ( $selected_slider_layout == 'layout-slider-3' ) { ?>
	<div class="cozy-slider-holder">
		<div class="post-slider swiper-container post-slider-3">
			<?php
			if ( $cozy_query->have_posts() ) :
				echo '<div class="posts-holder swiper-wrapper">';
				while ( $cozy_query->have_posts() ) :
					$cozy_query->the_post();
					echo '<div class="slide-holder swiper-slide">';
					the_post_thumbnail();
					echo '<div class="post-slider-content"><span class="content-inner">';
					if ( $settings['show_post_category'] == 'yes' ) {
						cozy_addons_post_category();
					}
					echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="post-title content-block">';
					?>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
					<?php
					echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
					echo '<div class="post-slider-meta">';
					if ( $settings['show_post_date_icon'] == 'yes' ) {
						echo '<span class="meta-icon">';
						\Elementor\Icons_Manager::render_icon( $settings['post_meta_date_icon'], array( 'aria-hidden' => 'true' ) );
						echo '</span>';
					}
					if ( $settings['show_post_date'] == 'yes' ) {
						cozy_addons_post_date();
					}
					if ( $settings['show_post_author_icon'] == 'yes' ) {
						echo '<span class="meta-icon">';
						\Elementor\Icons_Manager::render_icon( $settings['post_meta_author_icon'], array( 'aria-hidden' => 'true' ) );
						echo '</span>';
					}
					if ( $settings['show_post_author'] == 'yes' ) {
						cozy_addons_post_author();
					}

					echo '</div>';
					echo '</div>';
					echo '</div>';

				endwhile;
				echo '</div>';
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
		<?php } ?>
	</div>
	<?php
} elseif ( $selected_slider_layout == 'layout-slider-2' ) {
	$blog_slide_id = 'cozyPostSliders';
	if ( cozy_addons_premium_access() ) {
		$slide_per_view = $settings['cozy_carousel_post_per_view'];
	} else {
		$slide_per_view = 3;
	}
	?>
	<div class="cozy-slider-holder">
		<div id="<?php echo esc_attr( $blog_slide_id ) . '"' . ' ' . 'data-slidePerView="' . esc_attr( $slide_per_view ) . '" ' . 'data-carouselColumnGap="' . esc_attr( $settings['cozy_carousel_column_gap'] ); ?>" class=" post-slider swiper-container">
			<?php
			if ( $cozy_query->have_posts() ) :
				echo '<div class="posts-holder swiper-wrapper">';
				while ( $cozy_query->have_posts() ) :
					$cozy_query->the_post();
					echo '<div class="slide-holder swiper-slide">';
					the_post_thumbnail();
					echo '<div class="post-slider-content"><span class="content-inner">';
					if ( $settings['show_post_category'] == 'yes' ) {
						cozy_addons_post_category();
					}
					echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="post-title content-block">';
					?>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
					<?php
					echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
					echo '<div class="post-slider-meta">';
					if ( $settings['show_post_date_icon'] == 'yes' ) {
						echo '<span class="meta-icon">';
						\Elementor\Icons_Manager::render_icon( $settings['post_meta_date_icon'], array( 'aria-hidden' => 'true' ) );
						echo '</span>';
					}
					if ( $settings['show_post_date'] == 'yes' ) {
						cozy_addons_post_date();
					}
					if ( $settings['show_post_author_icon'] == 'yes' ) {
						echo '<span class="meta-icon">';
						\Elementor\Icons_Manager::render_icon( $settings['post_meta_author_icon'], array( 'aria-hidden' => 'true' ) );
						echo '</span>';
					}
					if ( $settings['show_post_author'] == 'yes' ) {
						cozy_addons_post_author();
					}

					echo '</div>';
					echo '</div>';
					echo '</div>';

				endwhile;
				echo '</div>';
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
		<?php } ?>
	</div>

	<?php
} else {
	$section_heading = $settings['section_heading_text'];
	?>
	<div class="cozy-slider-holder">
		<div class="section-header">
			<?php echo '<' . esc_attr( $settings['heading_tag'] ) . ' class="section-heading content-block">' . esc_html( $section_heading ) . '</' . esc_attr( $settings['heading_tag'] ) . '>'; ?>
			<span class="slider-navigation">
				<?php if ( $settings['show_carousel_navigation'] == 'yes' ) { ?>
					<div class="cozy-slide-prev cozy-slide-nav">
						<?php \Elementor\Icons_Manager::render_icon( $settings['slide_navigation_left_icon'], array( 'aria-hidden' => 'true' ) ); ?>
					</div>
					<div class="cozy-slide-next cozy-slide-nav">
						<?php \Elementor\Icons_Manager::render_icon( $settings['slide_navigation_right_icon'], array( 'aria-hidden' => 'true' ) ); ?>
					</div>
				<?php } ?>
			</span>
		</div>
		<div class="post-slider swiper-container post-slider-1">
			<?php
			if ( $cozy_query->have_posts() ) :
				echo '<div class="posts-holder swiper-wrapper">';
				while ( $cozy_query->have_posts() ) :
					$cozy_query->the_post();
					echo '<div class="slide-holder swiper-slide">';
					the_post_thumbnail();
					echo '<div class="post-slider-content"><span class="content-inner">';
					if ( $settings['show_post_category'] == 'yes' ) {
						cozy_addons_post_category();
					}
					echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="post-title content-block">';
					?>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
					<?php
					echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
					echo '<div class="post-slider-meta">';
					if ( $settings['show_post_date_icon'] == 'yes' ) {
						echo '<span class="meta-icon">';
						\Elementor\Icons_Manager::render_icon( $settings['post_meta_date_icon'], array( 'aria-hidden' => 'true' ) );
						echo '</span>';
					}
					if ( $settings['show_post_date'] == 'yes' ) {
						cozy_addons_post_date();
					}
					if ( $settings['show_post_author_icon'] == 'yes' ) {
						echo '<span class="meta-icon">';
						\Elementor\Icons_Manager::render_icon( $settings['post_meta_author_icon'], array( 'aria-hidden' => 'true' ) );
						echo '</span>';
					}
					if ( $settings['show_post_author'] == 'yes' ) {
						cozy_addons_post_author();
					}

					echo '</div>';
					echo '</div>';
					echo '</div>';

				endwhile;
				echo '</div>';
			endif;
			wp_reset_postdata();

			?>
		</div>
	</div>
	<?php
}
