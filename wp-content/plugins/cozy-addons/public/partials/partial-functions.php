<?php
function cozy_addons_excerpt($limit)
{
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt) >= $limit) {
		array_pop($excerpt);
	}
	$excerpt = implode(" ", $excerpt) . '...';
	$excerpt = preg_replace('`[[^]]*]`', '', $excerpt);
	return esc_html($excerpt);
}

if (!function_exists('cozy_addons_post_category')) {
	function cozy_addons_post_category()
	{ ?>
		<span class="category">

			<?php $categories = get_the_category();
			if (!empty($categories)) :
				foreach ($categories as $category) { ?>
					<a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_html($category->name); ?></a>
			<?php }
			endif; ?>

		</span>
	<?php }
}

if (!function_exists('cozy_addons_post_date')) {
	function cozy_addons_post_date()
	{
		$archive_year  = get_the_time('Y');
		$archive_month = get_the_time('m');
		$archive_day = get_the_time('d'); ?>
		<a href="<?php echo esc_url(get_day_link($archive_year, $archive_month, $archive_day)); ?>"> <?php echo get_the_date(); ?>
		</a>

	<?php }
}

if (!function_exists('cozy_addons_post_author')) {
	function cozy_addons_post_author()
	{ ?>
		<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="post-author">
			<?php echo esc_html(get_the_author()); ?>
		</a>
<?php }
}

if (!function_exists('cozy_addons_post_tag')) :
	function cozy_addons_post_tag()
	{
		$cozy_addons_tags = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'cozy-addons'));
		if ($cozy_addons_tags) {
			/* translators: 1: list of tags. */
			printf('<span class="tags-links">  ' . esc_html__('%1$s', 'cozy-addons') . '</span>', $cozy_addons_tags); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
endif;

if (!function_exists('cozy_addons_post_comments')) :
	function cozy_addons_post_comments()
	{
		if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__('0 Comment <span class="screen-reader-text"> on %s</span>', 'cozy-addons'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				)
			);
			echo '</span>';
		}
	}
endif;

if (!function_exists('cozy_addons_post_estimate_reading_time')) :
	function cozy_addons_post_estimate_reading_time()
	{
		$reading_content = get_post_field('post_content', get_the_ID());
		$word_count = str_word_count(strip_tags($reading_content));
		$image_count = substr_count($reading_content, '<img');
		$reading_time = $word_count / 200;
		$image_time = ($image_count * 10) / 60;
		$total_time = round($reading_time + $image_time);


		if ($total_time == 1) {
			$minute = __(' Minute', 'cozy-addons');
		} else {
			$minute =  __(' Minutes', 'cozy-addons');
		}
		if ($total_time < 1) {
			return $minute = __(' Less than 1 minute', 'cozy-addons');
		} else {
			return $total_time . $minute;
		}
	}
endif;

if (!function_exists('cozy_addons_article_reading_time')) :
	function cozy_addons_article_reading_time()
	{
		echo cozy_addons_post_estimate_reading_time();
	}
endif;

