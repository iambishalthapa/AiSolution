<?php
$target     = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
$nofollow   = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';
$icon_class = 'before-text';
if ( $settings['cta_icon_position'] == 'after-text' ) {
	$icon_class = 'after-text';
} ?>
<div class="hoverbox-content-box">
	<a href="<?php echo esc_attr( $settings['button_link']['url'] ) . '"' . esc_attr( $target ) . esc_attr( $nofollow ); ?> >
		<?php
		if ( $settings['hover_box_image'] && $settings['show_hoverbox_main_image'] == 'yes' ) :
			echo '<div class="hoverbox-image content-block"><img src="' . esc_url( $settings['hover_box_image']['url'] ) . '"></div>';
		endif;
		?>
	</a>
	<div class=" box-content vertical-align-<?php echo esc_attr( $settings['hoverbox_content_vertical_align'] ); ?>">
		<div class="content-holder <?php echo esc_attr( $settings['button_display_condition'] ); ?>">
			<?php
			if ( $settings['show_hoverbox_icon'] == 'yes' ) :
				if ( $settings['icon_options'] == 'option-image' ) {
					if ( $settings['icon_image'] ) :
						$icon_invert_class = '';
						if ( $settings['enable_invert_filter_icon'] == 'yes' ) {
							$icon_invert_class = 'invert-enable';
						}
						echo '<div class="hover-box-image content-block ' . esc_attr( $icon_invert_class ) . '"><img src="' . esc_url( $settings['icon_image']['url'] ) . '"></div>';
					endif;
				} else {
					echo '<div class="hover-box-icon content-block">';
					echo '<span class="hover-icon">';
					\Elementor\Icons_Manager::render_icon( $settings['hover_box_icon'], array( 'aria-hidden' => 'true' ) );
					echo '</span>';
					echo '</div>';
				}
			endif;
			if ( $settings['title_text'] ) :
				?>
				<div class="title content-block">
					<?php echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="section-title">' . esc_html( $settings['title_text'] ) . '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>'; ?>
				</div>
				<?php
			endif;
			if ( $settings['description_text'] ) :
				?>
				<div class="description content-block"><?php echo esc_attr( $settings['description_text'] ); ?></div>
				<?php
			endif;
			if ( $settings['button_text'] && $settings['show_cta_button'] == 'yes' ) :
				?>
				<span class="cta content-block">
					<?php
					echo '<a class="cta-button ' . esc_attr( $icon_class ) . '" href="' . esc_attr( $settings['button_link']['url'] ) . '"' . esc_attr( $target ) . esc_attr( $nofollow ) . '>';
					if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text' ) {
						echo '<span class="button-icon">';
						\Elementor\Icons_Manager::render_icon( $settings['hoverbox_cta_icon'], array( 'aria-hidden' => 'true' ) );
						echo '</span>';
					}
					echo esc_html( $settings['button_text'] );
					if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text' ) {
						echo '<span class="button-icon">';
						\Elementor\Icons_Manager::render_icon( $settings['hoverbox_cta_icon'], array( 'aria-hidden' => 'true' ) );
						echo '</span>';
					}
					echo '</a>';
					?>
				</span>
			<?php endif; ?>
		</div>
		<?php
		if ( $settings['show_hoverbox_link_icon'] == 'yes' ) {
			?>
			<div class="linked-icon <?php echo esc_attr( $settings['link_icon_display_condition'] ); ?>">
				<?php \Elementor\Icons_Manager::render_icon( $settings['hoverbox_link_icon'], array( 'aria-hidden' => 'true' ) ); ?>
			</div>
		<?php } ?>
</div><!--end of box content-->
</div>