<?php
$post_per_page       = $settings['posts_per_page'];
$post_offset         = $settings['posts_offset'];
$order_by            = $settings['faq_orderby'];
$order               = $settings['faq_order'];
$cats                = $settings['faq_categories'];
$selected_layout_faq = $settings['faq_select_layout'];


$tax_query = array();
if ( $cats ) {
	foreach ( $cats as $cat ) {
		$cat_terms[] = $cat;
	}
	$tax_query[] = array(
		array(
			'taxonomy' => 'cea_faq_category',
			'field'    => 'id',
			'terms'    => $cat_terms,
		),
	);
}
$cozy_addons_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$cozy_query        = new WP_Query(
	array(
		'post_type'      => 'cea_faq',
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
	if ( $selected_layout_faq == 'layout-accordion' ) { ?>
		<div class="cozy-accordion">
			<?php
	}
	while ( $cozy_query->have_posts() ) :
		$cozy_query->the_post();
		if ( $selected_layout_faq == 'layout-accordion' ) {
			?>
				<div class="faq-item-holder">
					<?php
					echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="faq-title">';
					the_title();
					?>
					<span class="close-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['faq_title_collapse_icon'], array( 'aria-hidden' => 'true' ) ); ?></span><span class="open-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['faq_title_open_icon'], array( 'aria-hidden' => 'true' ) ); ?></span>
					<?php echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>'; ?>
					<div class="faq-content">
						<?php the_content(); ?>
					</div>
				</div>
			<?php } else { ?>
				<div class="faq-item-holder content-block">
					<?php
					echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="faq-title content-block">';
					the_title();
					echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
					?>
					<div class="faq-content content-block">
						<?php the_content(); ?>
					</div>
				</div>
			<?php
			}
		endwhile;
		cozy_pagination_function( $settings, $cozy_query, html_entity_decode( get_pagenum_link() ) );
	if ( $selected_layout_faq == 'layout-accordion' ) {
		?>
		</div>
<?php }
	endif;
	wp_reset_postdata();
?>