<div class="flip-box-holder">
	<div class="front-content">
		<div class="content-holder">
			<span class="box-inner">

				<?php
				if ( 'yes' == $settings['show_flip_box_icon'] ) :
					if ( $settings['icon_options'] == 'option-image' ) {
						if ( $settings['icon_image'] ) :
								echo '<div class="flip-box-image content-block"><img src="' . esc_attr( $settings['icon_image']['url'] ) . '"></div>';
							endif;
					} else {
						echo '<div class="flip-box-icon content-block">';
							\Elementor\Icons_Manager::render_icon( $settings['flip_box_icon'], array( 'aria-hidden' => 'true' ) );
						echo '</div>';
					}
				endif;
				if ( $settings['heading_text'] ) : ?>
					<span class="title content-block">
						<?php echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="section-title">' . esc_html( $settings['heading_text'] ) . '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>'; ?>
							
					</span>
				<?php endif; ?>
				<?php if ( $settings['description_text'] ) : ?>
					<span class="decription content-block">
						<?php echo esc_html( $settings['description_text'] ); ?>
							
					</span>
				<?php endif; ?>
			</span>
		</div>
		</div><!--end of front content -->
	<div class="back-content">
		<div class="content-holder">
			<span class="box-inner">
				<?php
				if ( 'yes' == $settings['show_flip_box_back_icon'] ) :
					if ( $settings['back_icon_options'] == 'option-image' ) {
						if ( $settings['back_icon_image'] ) :
								echo '<div class="flip-box-image content-block"><img src="' . esc_url( $settings['back_icon_image']['url'] ) . '"></div>';
							endif;
					} else {
						echo '<div class="flip-box-icon content-block">';
						\Elementor\Icons_Manager::render_icon( $settings['flip_box_back_icon'], array( 'aria-hidden' => 'true' ) );
						echo '</div>';
					}
				endif;
				if ( $settings['back_heading_text'] ) :
					?>
					<span class="title content-block">
							<?php echo '<' . esc_attr( $settings['back_title_tag'] ) . ' class="section-title">' . esc_html( $settings['back_heading_text'] ) . '</' . esc_attr( $settings['back_title_tag'] ) . '>'; ?>
							
					</span>
					<?php endif; ?>
				<?php if ( $settings['back_description_text'] ) : ?>
					<span class="decription content-block">
						<?php echo esc_attr( $settings['back_description_text'] ); ?>
							
					</span>
					<?php
				endif;
				if ( $settings['button_text'] ) :
					?>
					<span class="cta content-block">
					<?php
						$target     = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
						$nofollow   = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';
						$icon_class = 'before-text';
					if ( $settings['cozy_cta_icon_position'] == 'after-text' ) {
						$icon_class = 'after-text';
					}
						echo '<a class="cta-button ' . esc_attr( $icon_class ) . '" href="' . esc_url( $settings['button_link']['url'] ) . '"' . esc_attr( $target ) . esc_attr( $nofollow ) . '>';
					if ( $settings['show_cta_icon'] == 'yes' && $settings['cozy_cta_icon_position'] == 'before-text' ) {
						echo '<span class="button-icon">';
							\Elementor\Icons_Manager::render_icon( $settings['cozy_cta_icon'], array( 'aria-hidden' => 'true' ) );
						echo '</span>';
					}
							echo esc_html( $settings['button_text'] );
					if ( $settings['show_cta_icon'] == 'yes' && $settings['cozy_cta_icon_position'] == 'after-text' ) {
						echo '<span class="button-icon">';
							\Elementor\Icons_Manager::render_icon( $settings['cozy_cta_icon'], array( 'aria-hidden' => 'true' ) );
						echo '</span>';
					}
						echo '</a>';
					?>
					</span>
				<?php endif; ?>
			</span>
		</div>
		</div><!--end of back content -->
</div>