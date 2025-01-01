<?php
require_once(COZY_ADDONS_PLUGIN_DIR . 'public/partials/partial-functions.php');
if (cozy_addons_premium_access()) {
	$selected_focus_layout = $settings['focuspost_select_layout'];
} else {
	$selected_focus_layout	= 'focus-layout-1';
}
$focus_title_length = $settings['focus_post_title_length'];
$post_per_page = $settings['posts_per_page'];

if ($settings['focuspost_post_source'] == 'from-category') {
	$cats = $settings['post_categories'];
	$tax_query = array();
	if ($cats) {
		foreach ($cats as $cat) {
			$cat_terms[] = $cat;
		}
		$tax_query[] = array(
			array(
				'taxonomy' => 'category',
				'field' => 'id',
				'terms' => $cat_terms,
			),
		);
	}
	$cozy_query = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => $post_per_page, 'tax_query' => $tax_query));
} else {
	$cozy_query = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => $post_per_page));
}

if ($selected_focus_layout == 'focus-layout-4') {
	$selectd_vertical_item = $settings['focus_post_scroller_item'];
	if ($selectd_vertical_item == 'col-item-4') {
		$vertical_layout_item = 'focusNewsVertical4';
	} else {
		$vertical_layout_item = 'focusNewsVertical3';
	}





	echo '<div class="focus-post-holder">';
	echo '<div class="section-header">';
	if ($settings['section_heading_text']) {
		echo '<' . esc_attr($settings['heading_tag']) . ' class="section-heading"><span>' . esc_html($settings['section_heading_text']) . '</span></' . esc_attr($settings['heading_tag']) . '>';
	}

	if ('yes' === $settings['show_carousel_navigation']) :
?>
		<span class="scroll-nav">
			<span class="cozy-slide-nav cozy-slide-prev newsfocusup">
				<?php
				\Elementor\Icons_Manager::render_icon($settings['slide_navigation_prev_icon'], ['aria-hidden' => 'true']);
				?>
			</span>
			<span class="cozy-slide-nav cozy-slide-next newsfocusdown">
				<?php
				\Elementor\Icons_Manager::render_icon($settings['slide_navigation_next_icon'], ['aria-hidden' => 'true']);
				?>
			</span>
		</span>
	<?php endif; ?>

	</div>
	<div class="posts-holder <?php echo esc_attr($vertical_layout_item); ?>">
		<?php
		if ($cozy_query->have_posts()) :
			echo '<ul>';
			while ($cozy_query->have_posts()) : $cozy_query->the_post();
				echo '<li class="post-box">';
				if (has_post_thumbnail() && $settings['show_featured_image'] == 'yes') { ?>
					<div class="cozy-featured-img">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
					</div>
				<?php } ?>
				<span class="post-content">
					<a href="<?php the_permalink(); ?>" class="post-title">
						<?php
						the_title();
						echo '</a>';
						echo '<div class="cozy-post-meta all">'; ?>
				<?php
				if ($settings['show_post_date'] == 'yes') {
					echo '<span class="cozy-post-meta post-date">';
					if ($settings['show_post_date_icon'] == 'yes') {
						echo '<span class="meta-icon">';
						\Elementor\Icons_Manager::render_icon($settings['post_meta_date_icon'], ['aria-hidden' => 'true']);
						echo '</span>';
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
					cozy_addons_post_author();
					echo '</span>';
				}
				echo '</div>';
				echo '</span>';
				echo '</li>';
			endwhile;
			echo '</ul>';
		endif;
				?>
	</div>

	</div>

<?php } elseif ($selected_focus_layout == 'focus-layout-3') {

	$selected_thumb_col = $settings['focus_post_grid_column'];
	if ($selected_thumb_col == 'col-grid-5') {
		$focus_carousel_class = 'focuspost-thumb-5';
	} elseif ($selected_thumb_col == 'col-grid-4') {
		$focus_carousel_class = 'focuspost-thumb-4';
	} else {
		$focus_carousel_class = 'focuspost-thumb-3';
	}

	echo '<div class="focus-post-holder">';
	echo '<div class="section-header">';
	if ($settings['section_heading_text']) {
		echo '<' . esc_attr($settings['heading_tag']) . ' class="section-heading"><span>' . esc_html($settings['section_heading_text']) . '</span></' . esc_attr($settings['heading_tag']) . '>';
	}
	echo '</div>'; ?>
	<div class="posts-holder swiper <?php echo esc_attr($focus_carousel_class); ?>">
		<div class="swiper-wrapper">
			<?php
			if ($cozy_query->have_posts()) :
				while ($cozy_query->have_posts()) : $cozy_query->the_post();
					echo '<div class="slide swiper-slide"> <div class="post-box">';
					if (has_post_thumbnail() && $settings['show_featured_image'] == 'yes') { ?>
						<div class="cozy-featured-img">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(); ?>
							</a>
						</div>
					<?php } ?>
					<span class="post-content">
						<?php if ($settings['show_list_title_icon'] === 'yes') { ?>
							<span class="separator-icon">
								<?php
								\Elementor\Icons_Manager::render_icon($settings['focus_post_title_list_icon'], ['aria-hidden' => 'true']);
								?>
							</span>
						<?php } ?>
						<a href="<?php the_permalink(); ?>" class="post-title">
							<?php
							$post_id = get_the_ID();
							$title = get_the_title($post_id);
							$trimmed_title = mb_substr($title, 0, $focus_title_length);

							echo $trimmed_title . '...';
							echo '</a>';
							echo '<div class="cozy-post-meta all">'; ?>
					<?php
					if ($settings['show_post_date'] == 'yes') {
						echo '<span class="cozy-post-meta post-date">';
						if ($settings['show_post_date_icon'] == 'yes') {
							echo '<span class="meta-icon">';
							\Elementor\Icons_Manager::render_icon($settings['post_meta_date_icon'], ['aria-hidden' => 'true']);
							echo '</span>';
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
						cozy_addons_post_author();
						echo '</span>';
					}
					echo '</div>';
					echo '</span>';
					echo '</div></div>';
				endwhile;
			endif;
					?>
		</div>
	</div>
	<?php if ('yes' === $settings['show_carousel_navigation']) : ?>
		<span class="cozy-slide-nav cozy-slide-prev">
			<?php
			\Elementor\Icons_Manager::render_icon($settings['slide_navigation_prev_icon'], ['aria-hidden' => 'true']);
			?>
		</span>
		<span class="cozy-slide-nav cozy-slide-next">
			<?php
			\Elementor\Icons_Manager::render_icon($settings['slide_navigation_next_icon'], ['aria-hidden' => 'true']);
			?>
		</span>
	<?php endif; ?>
	</div>
<?php } elseif ($selected_focus_layout == 'focus-layout-2') {
	$selected_col = $settings['focus_post_grid_column'];
	if ($selected_col == 'col-grid-5') {
		$focus_carousel_class = 'focuspost-carousel-5';
	} elseif ($selected_col == 'col-grid-4') {
		$focus_carousel_class = 'focuspost-carousel-4';
	} else {
		$focus_carousel_class = 'focuspost-carousel-3';
	}
	echo '<div class="focus-post-holder">';
	echo '<div class="section-header">';
	if ($settings['section_heading_text']) {
		echo '<' . esc_attr($settings['heading_tag']) . ' class="section-heading"><span>' . esc_html($settings['section_heading_text']) . '</span></' . esc_attr($settings['heading_tag']) . '>';
	}
	echo '</div>'; ?>
	<div class="posts-holder swiper <?php echo esc_attr($focus_carousel_class); ?>">
		<div class="swiper-wrapper">
			<?php
			if ($cozy_query->have_posts()) :
				while ($cozy_query->have_posts()) : $cozy_query->the_post();
					echo '<div class="slide swiper-slide"> <div class="post-box">';
					if (has_post_thumbnail() && $settings['show_featured_image'] == 'yes') { ?>
						<div class="cozy-featured-img">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(); ?>
							</a>
						</div>
					<?php } ?>
					<span class="post-content">
						<a href="<?php the_permalink(); ?>" class="post-title">
							<?php the_title();
							echo '</a>';
							echo '<div class="cozy-post-meta all">'; ?>
					<?php
					if ($settings['show_post_date'] == 'yes') {
						echo '<span class="cozy-post-meta post-date">';
						if ($settings['show_post_date_icon'] == 'yes') {
							echo '<span class="meta-icon">';
							\Elementor\Icons_Manager::render_icon($settings['post_meta_date_icon'], ['aria-hidden' => 'true']);
							echo '</span>';
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
						cozy_addons_post_author();
						echo '</span>';
					}
					echo '</div>';
					echo '</span>';
					echo '</div></div>';
				endwhile;
			endif;
					?>
		</div>
	</div>
	<?php if ('yes' === $settings['show_carousel_navigation']) : ?>
		<span class="cozy-slide-nav cozy-slide-prev">
			<?php
			\Elementor\Icons_Manager::render_icon($settings['slide_navigation_prev_icon'], ['aria-hidden' => 'true']);
			?>
		</span>
		<span class="cozy-slide-nav cozy-slide-next">
			<?php
			\Elementor\Icons_Manager::render_icon($settings['slide_navigation_next_icon'], ['aria-hidden' => 'true']);
			?>
		</span>
	<?php endif; ?>
	</div>
	<?php } else {
	echo '<div class="focus-post-holder">';
	echo '<div class="post-box">';
	echo '<div class="section-header">';
	if ($settings['section_heading_text']) {
		echo '<' . esc_attr($settings['heading_tag']) . ' class="section-heading"><span>' . esc_html($settings['section_heading_text']) . '</span></' . esc_attr($settings['heading_tag']) . '>';
	}
	echo '</div>';
	echo '<div class="focusNewsTicker">';
	if ($cozy_query->have_posts()) :
		echo '<ul class="posts-holder">';
		while ($cozy_query->have_posts()) : $cozy_query->the_post();
			echo '<li class="post-box-content">'; ?>
			<a href="<?php the_permalink(); ?>" class="post-title">
			<?php the_title();
			echo '</a>';
			echo '</li>';
		endwhile;
		echo '</ul>';
	endif;
	echo '</div>';/* end of ticker section*/
	echo '</div>';

	if ('yes' === $settings['show_carousel_navigation']) :
			?>
			<span class="scroll-nav">
				<span class="cozy-slide-nav cozy-slide-prev focusup">
					<?php
					\Elementor\Icons_Manager::render_icon($settings['slide_navigation_prev_icon'], ['aria-hidden' => 'true']);
					?>
				</span>
				<span class="cozy-slide-nav cozy-slide-next focusdown">
					<?php
					\Elementor\Icons_Manager::render_icon($settings['slide_navigation_next_icon'], ['aria-hidden' => 'true']);
					?>
				</span>
			</span>
	<?php
	endif;
	echo '</div>';
}
