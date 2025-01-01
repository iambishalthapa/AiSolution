<?php
if ( ! function_exists( 'getCurrency' ) ) {
	function getCurrency( $currency, $show_sale_price, $price_sale, $price_amount, $period ) {
		if ( 'yes' == $show_sale_price ) : ?>
			<span class="price-sale" style="text-decoration: line-through; opacity: 0.55;"><?php echo $currency . esc_html( $price_sale ); ?></span>
			<?php
	endif;
		echo $currency . $price_amount . $period;
	}
}
if ( $settings['properties_list'] ) :
	$property_slide_id = '';
	$slide_per_view    = '';
	if ( $settings['properties_list_display_layout'] === 'cozy-properties-list-carousel' ) {
		$property_slide_id = 'cozyPropertyCarousel';
		$slide_per_view    = $settings['properties_carousel_post_per_view'];
	}
	?>

	<div id="<?php echo esc_attr( $property_slide_id ) . '"' . ' ' . 'data-slidePerView="' . esc_attr( $slide_per_view ) . '" ' . 'data-carouselColumnGap="' . esc_attr( $settings['cozy_carousel_column_gap'] ); ?>" class=" cozy-addons properties-list-items <?php echo $settings['properties_list_display_layout'] === 'cozy-properties-list-carousel' ? 'swiper ' . $settings['properties_list_display_layout'] . '-' . $settings['properties_list_column'] : $settings['properties_list_display_layout'] . ' ' . $settings['properties_list_column']; ?>">
		<?php
		echo $settings['properties_list_display_layout'] === 'cozy-properties-list-carousel' ? '<div class="swiper-wrapper">' : '';

		foreach ( $settings['properties_list'] as $property ) :
			echo $settings['properties_list_display_layout'] === 'cozy-properties-list-carousel' ? '<div class="swiper-slide">' : '';

			?>

			<div class="cozy-addons properties-list-item">
				<?php if ( $property['property_details_link']['url'] ) { ?>
					<a class="url" href='<?php echo $property['property_details_link']['url']; ?>'>
					<?php } ?>
					<img class="properties-image" src="<?php echo $property['properties_image']['url']; ?>" alt="Property image">
					<?php
					if ( $property['property_details_link'] ) {
						echo '</a>';
					}
					?>
					<div class="properties-content">
						<div class="title">
							<?php if ( $property['property_details_link']['url'] ) { ?>
								<a class="url" href='<?php echo $property['property_details_link']['url']; ?>'>
								<?php } ?>
								<?php echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="section-title">' . esc_html( $property['property_location_name'] ) . '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>'; ?>
								<?php
								if ( $property['property_details_link'] ) {
									echo '</a>';
								}
								?>
						</div>
						<div class="price">
							<?php
							switch ( $property['select_currency'] ) {
								case 'cozy_addons_custom':
									getCurrency( $property['custom_currency'], $property['show_sale_price'], $property['price_sale'], $property['price_amount'], $property['period_text'] );
									break;
								case 'dollar':
									getCurrency( esc_html( '$' ), $property['show_sale_price'], $property['price_sale'], $property['price_amount'], $property['period_text'] );
									break;
								case 'euro':
									getCurrency( esc_html( '€' ), $property['show_sale_price'], $property['price_sale'], $property['price_amount'], $property['period_text'] );
									break;
								case 'baht':
									getCurrency( esc_html( '฿' ), $property['show_sale_price'], $property['price_sale'], $property['price_amount'], $property['period_text'] );
									break;
								case 'franc':
									getCurrency( esc_html( '₣' ), $property['show_sale_price'], $property['price_sale'], $property['price_amount'], $property['period_text'] );
									break;
								case 'guilder':
									getCurrency( esc_html( 'ƒ' ), $property['show_sale_price'], $property['price_sale'], $property['price_amount'], $property['period_text'] );
									break;
								case 'pound':
									getCurrency( esc_html( '£' ), $property['show_sale_price'], $property['price_sale'], $property['price_amount'], $property['period_text'] );
									break;
								case 'real':
									getCurrency( esc_html( 'R$' ), $property['show_sale_price'], $property['price_sale'], $property['price_amount'], $property['period_text'] );
									break;
								case 'rupee':
									getCurrency( esc_html( '₨' ), $property['show_sale_price'], $property['price_sale'], $property['price_amount'], $property['period_text'] );
									break;
								case 'indian_rupee':
									getCurrency( esc_html( '₹' ), $property['show_sale_price'], $property['price_sale'], $property['price_amount'], $property['period_text'] );
									break;

								case 'yen':
									getCurrency( esc_html( '¥' ), $property['show_sale_price'], $property['price_sale'], $property['price_amount'], $property['period_text'] );
									break;
								default:
									// default execution...
									break;
							}

							?>
						</div>
						<div class="highlight">
							<?php echo $property['property_highlight']; ?>
						</div>
						<div class="specifications">
							<span class="icon cozy-icon">
								<?php \Elementor\Icons_Manager::render_icon( $property['property_area_icon'], array( 'aria-hidden' => 'true' ) ); ?>
							</span>
							<span>
								<?php
								if ( $property['property_area'] ) {
									echo $property['property_area'];

									echo __( ' ft', 'cozy-addons' );
									?>
									<sup><?php echo __( '2', 'cozy-addons' ); ?></sup>
								<?php } ?>
							</span>

							<span class="icon">
								<?php \Elementor\Icons_Manager::render_icon( $property['property_bedroom_count_icon'], array( 'aria-hidden' => 'true' ) ); ?>
							</span>
							<span>
								<?php echo $property['property_bedroom_count']; ?>
							</span>

							<span class="icon">
								<?php \Elementor\Icons_Manager::render_icon( $property['property_bathroom_count_icon'], array( 'aria-hidden' => 'true' ) ); ?>
							</span>
							<span>
								<?php echo $property['property_bathroom_count']; ?>
							</span>
						</div>
					</div>
					<?php if ( $property['enable_property_owner'] == 'yes' ) { ?>
						<div class="property-owner-section">

							<img class="properties-owner-photo" src="<?php echo esc_url( $property['property_owener_photo']['url'] ); ?>" alt="<?php echo esc_attr( 'Owner photo', 'cozy-addons' ); ?>">

							<span class="owner-name"><?php echo esc_html__( $property['property_owner_name'] ); ?></span>
						</div>
					<?php } ?>
			</div>
			<?php
			echo $settings['properties_list_display_layout'] === 'cozy-properties-list-carousel' ? '</div>' : ''; // swiper-slide closing div
		endforeach;
		echo $settings['properties_list_display_layout'] === 'cozy-properties-list-carousel' ? '</div>' : ''; // swiper-wrapper closing div

		if ( $settings['show_carousel_navigation'] == 'yes' && $settings['properties_list_display_layout'] === 'cozy-properties-list-carousel' ) {
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
	if ( $settings['show_carousel_pagination'] == 'yes' && $settings['properties_list_display_layout'] === 'cozy-properties-list-carousel' ) {
		echo '<div class="cozy-swiper-pagination"></div>';
	}
endif;


?>