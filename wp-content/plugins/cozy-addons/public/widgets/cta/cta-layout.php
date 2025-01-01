<?php
$current_cta_layout = $settings['cozy_cta_layout'];
if ( empty( $current_cta_layout ) ) {
	$current_cta_layout = 'layout-1';
}
?>
<div class="cozy-cta-box <?php echo esc_attr( $current_cta_layout ); ?>">
<?php
if ( $settings['cozy_cta_layout'] == 'layout-3' ) {
	echo '<div class="cta-content content-block cozy-addons-container">';

	if ( $settings['cta_image'] && $settings['cta_image_position'] == 'align-left' ) :
		echo '<div class="cozy-addons-col-6 img-col">';
			echo '<div class="cta-img content-block"><img src="' . esc_url( $settings['cta_image']['url'] ) . '"></div>';
		echo '</div>';
		endif;
		echo '<div class="cozy-addons-col-6 content-col">';
	if ( $settings['title_text'] ) :
		?>
				<span class="title content-block">
					<?php echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="section-title">' . esc_html( $settings['title_text'] ) . '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>'; ?>
						
				</span>
			<?php
			endif;
	if ( $settings['description_text'] ) :
		?>
				<span class="description content-block"><?php echo esc_html( $settings['description_text'] ); ?></span>
			<?php
			endif;
	if ( $settings['button_text'] ) :
		?>
			<span class="cta content-block">
			<?php
			$target     = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow   = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';
			$icon_class = 'before-text';
			if ( $settings['cta_icon_position'] == 'after-text' ) {
					$icon_class = 'after-text';
			}
					echo '<a class="cta-button ' . esc_attr( $icon_class ) . '" href="' . esc_url( $settings['button_link']['url'] ) . '"' . esc_attr( $target ) . esc_attr( $nofollow ) . '>';
			if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text' ) {
				echo '<span class="button-icon">';
				\Elementor\Icons_Manager::render_icon( $settings['pt_cta_icon'], array( 'aria-hidden' => 'true' ) );
				echo '</span>';
			}
					echo esc_html( $settings['button_text'] );
			if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text' ) {
				echo '<span class="button-icon">';
				\Elementor\Icons_Manager::render_icon( $settings['pt_cta_icon'], array( 'aria-hidden' => 'true' ) );
				echo '</span>';
			}
					echo '</a>';
			?>
			</span>
		<?php
		endif;
		echo '</div>';
	if ( $settings['cta_image'] && $settings['cta_image_position'] == 'align-right' ) :
		echo '<div class="cozy-addons-col-6 img-col">';
			echo '<div class="cta-img content-block"><img src="' . esc_url( $settings['cta_image']['url'] ) . '"></div>';
		echo '</div>';
		endif;

	echo '</div>';

} elseif ( $settings['cozy_cta_layout'] == 'layout-2' ) {
	echo '<div class="cta-content content-block cozy-addons-container">';
		echo '<div class="cozy-addons-col-9">';
	if ( $settings['title_text'] ) :
		?>
				<span class="title content-block">
					<?php echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="section-title">' . esc_html( $settings['title_text'] ) . '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>'; ?>
						
				</span>
			<?php
			endif;
	if ( $settings['description_text'] ) :
		?>
				<span class="description content-block"><?php echo esc_html( $settings['description_text'] ); ?></span>
			<?php
			endif;
		echo '</div>';
		echo '<div class="cozy-addons-col-3">';
	if ( $settings['button_text'] ) :
		?>
				<span class="cta content-block">
				<?php
				$target     = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
				$nofollow   = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';
				$icon_class = 'before-text';
				if ( $settings['cta_icon_position'] == 'after-text' ) {
						$icon_class = 'after-text';
				}
						echo '<a class="cta-button ' . esc_attr( $icon_class ) . '" href="' . esc_url( $settings['button_link']['url'] ) . '"' . esc_attr( $target ) . esc_attr( $nofollow ) . '>';
				if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text' ) {
					echo '<span class="button-icon">';
						\Elementor\Icons_Manager::render_icon( $settings['pt_cta_icon'], array( 'aria-hidden' => 'true' ) );
					echo '</span>';
				}
						echo esc_html( $settings['button_text'] );
				if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text' ) {
					echo '<span class="button-icon">';
						\Elementor\Icons_Manager::render_icon( $settings['pt_cta_icon'], array( 'aria-hidden' => 'true' ) );
					echo '</span>';
				}
						echo '</a>';
				?>
				</span>
			<?php
			endif;
		echo '</div>';
	echo '</div>';
} else {
	echo '<div class="cta-content content-block">';
	if ( $settings['title_text'] ) :
		?>
			<span class="title content-block">
				<?php echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="section-title">' . esc_html( $settings['title_text'] ) . '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>'; ?>
					
			</span>
		<?php
		endif;
	if ( $settings['description_text'] ) :
		?>
			<span class="description content-block"><?php echo esc_html( $settings['description_text'] ); ?></span>
		<?php
		endif;
	if ( $settings['button_text'] ) :
		?>
			<span class="cta content-block">
			<?php
			$target     = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow   = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';
			$icon_class = 'before-text';
			if ( $settings['cta_icon_position'] == 'after-text' ) {
				$icon_class = 'after-text';
			}
			echo '<a class="cta-button ' . esc_attr( $icon_class ) . '" href="' . esc_url( $settings['button_link']['url'] ) . '"' . esc_attr( $target ) . esc_attr( $nofollow ) . '>';
			if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'before-text' ) {
				echo '<span class="button-icon">';
					\Elementor\Icons_Manager::render_icon( $settings['pt_cta_icon'], array( 'aria-hidden' => 'true' ) );
				echo '</span>';
			}
			echo esc_html( $settings['button_text'] );
			if ( $settings['show_cta_icon'] == 'yes' && $settings['cta_icon_position'] == 'after-text' ) {
				echo '<span class="button-icon">';
					\Elementor\Icons_Manager::render_icon( $settings['pt_cta_icon'], array( 'aria-hidden' => 'true' ) );
				echo '</span>';
			}
			echo '</a>';
			?>
			</span>
		<?php
		endif;
	echo '</div>';
}
?>
</div><!-- end of cta-box -->