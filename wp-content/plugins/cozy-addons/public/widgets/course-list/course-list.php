<?php
if ( count( $settings['cozy_course_list'] ) > 0 ) :
	$slide_id       = '';
	$slide_per_view = '';
	if ( $settings['cozy_layout'] === 'cozy-layout-carousel' ) {
		$slide_id       = 'cozyCourseCarousel';
		$slide_per_view = $settings['cozy_carousel_post_per_view'];
	}

	if ( ! function_exists( 'getCourseClass' ) ) {
		function getCourseClass( $settings ) {
			echo $settings['cozy_layout'] . ' ';
			echo $settings['cozy_layout'] === 'cozy-layout-grid' ? $settings['cozy_grid_column'] : '';
			echo $settings['cozy_layout'] === 'cozy-layout-carousel' ? 'swiper ' : '';
		}
	}
	?>
	<div id="<?php echo esc_attr( $slide_id ) . '"' . ' ' . 'data-slidePerView="' . esc_attr( $slide_per_view ) . '" ' . 'data-carouselColumnGap="' . esc_attr( $settings['cozy_carousel_column_gap'] ); ?>" class="cozy-addons course-list-items <?php getCourseClass( $settings ); ?>">
		<?php
		echo $settings['cozy_layout'] === 'cozy-layout-carousel' ? '<div class="swiper-wrapper">' : '';

		foreach ( $settings['cozy_course_list'] as $course ) :
			echo $settings['cozy_layout'] === 'cozy-layout-carousel' ? '<div class="swiper-slide">' : '';
			?>
			<div class="cozy-addons course-list-item">
				<img class="course-list-image" src="<?php echo $course['cozy_course_featured_image']['url']; ?>">
				<div class="course-content">
					<div class="title">
						<?php echo $course['cozy_course_title']; ?>
					</div>
					<div class="cozy-addons course-section">
						<div class="duration">
							<?php echo $course['cozy_course_duration']; ?>
						</div>
						<div class="price">
							<span class="price-currency">
								<?php
								switch ( $course['select_currency'] ) {
									case 'cozy_addons_custom':
										echo esc_html( $course['custom_currency'] );
										break;
									case 'dollar':
										echo esc_html( '$' );
										break;
									case 'euro':
										echo esc_html( '€' );
										break;
									case 'baht':
										echo esc_html( '฿' );
										break;
									case 'franc':
										echo esc_html( '₣' );
										break;
									case 'guilder':
										echo esc_html( 'ƒ' );
										break;
									case 'pound':
										echo esc_html( '£' );
										break;
									case 'real':
										echo esc_html( 'R$' );
										break;
									case 'rupee':
										echo esc_html( '₨' );
										break;
									case 'indian_rupee':
										echo esc_html( '₹' );
										break;

									case 'yen':
										echo esc_html( '¥' );
										break;
									default:
										// default execution...
										break;
								}
								?>
							</span>
							<?php echo '<span class="amount">' . esc_html( $course['cozy_price'] ); ?>
						</div>
					</div>
					<div class="description">
						<?php echo $course['cozy_course_description']; ?>
					</div>
					<div class="cozy-addons course-footer">
						<?php
						if ( 'yes' === $course['cozy_enable_lecturer'] ) :
							?>
							<div class="lecturer-info">
								<img class="lecturer-image" src="<?php echo esc_url( $course['cozy_course_lecturer_image']['url'] ); ?>" alt="">
								<span>
									<?php echo esc_html( $course['cozy_course_lecturer_name'] ); ?>
								</span>
							</div>
							<?php
						endif;
						?>
						<div class="cozy-addons course-cta-button">
							<a class="cta-link" href="<?php echo $course['cozy_course_cta_link']['url']; ?>">
								<?php echo $course['cozy_course_cta_label']; ?>
								<span class="icon">
									<?php
									\Elementor\Icons_Manager::render_icon( $course['cozy_course_cta_icon'] );
									?>
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<?php
			echo $settings['cozy_layout'] === 'cozy-layout-carousel' ? '</div>' : ''; // swiper-slide closing div
		endforeach;
		echo $settings['cozy_layout'] === 'cozy-layout-carousel' ? '</div>' : ''; // swiper-wrapper closing div

		if ( 'yes' == $settings['show_carousel_navigation'] && 'cozy-layout-carousel' == $settings['cozy_layout'] ) {
			?>
			<div class="cozy-swiper-navigation">
				<div class="cozy-slide-prev cozy-slide-nav">
					<?php \Elementor\Icons_Manager::render_icon( $settings['slide_navigation_left_icon'], array( 'aria-hidden' => 'true' ) ); ?>
				</div>
				<div class="cozy-slide-next cozy-slide-nav">
					<?php \Elementor\Icons_Manager::render_icon( $settings['slide_navigation_right_icon'], array( 'aria-hidden' => 'true' ) ); ?>
				</div>
			</div>
			<?php
		}


		?>
	</div>

	<?php

	if ( 'yes' === $settings['show_carousel_pagination'] && 'cozy-layout-carousel' === $settings['cozy_layout'] ) {
		echo '<div class="cozy-swiper-pagination"></div>';
	}
endif;
