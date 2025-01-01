<?php
require_once COZY_ADDONS_PLUGIN_DIR . 'public/partials/partial-functions.php';
$selected_product_layout = $settings['product_select_layout'];
$product_slider_class    = '';
if ( $selected_product_layout == 'layout-3' ) {
	$product_slider_class = 'cozy-product-slide-style-3';
} elseif ( $selected_product_layout == 'layout-2' ) {
	$product_slider_class = 'cozy-product-slide-style-2';
} else {
	$product_slider_class = 'cozy-product-slide-default';
}

$post_per_page  = $settings['posts_per_page'];
$cats           = $settings['products_categories'];
$excerpt_length = $settings['product_excerpt_length'];

$tax_query = array();
if ( $cats ) {
	foreach ( $cats as $cat ) {
		$cat_terms[] = $cat;
	}
	$tax_query[] = array(
		array(
			'taxonomy' => 'product_cat',
			'field'    => 'id',
			'terms'    => $cat_terms,
		),
	);
}
$query_args = array(
	'posts_per_page'      => absint( $post_per_page ),
	'post_type'           => 'product',
	'no_found_rows'       => true,
	'post__not_in'        => get_option( 'sticky_posts' ),
	'ignore_sticky_posts' => true,
	'tax_query'           => $tax_query,
);
$cozy_query = new \WP_Query( $query_args );
if ( $selected_product_layout == 'layout-3' ) {
	if ( $cozy_query->have_posts() ) :
		echo '<div class="products-holder swiper ' . esc_attr( $product_slider_class ) . '">';
		echo '<div class="swiper-wrapper">';
		while ( $cozy_query->have_posts() ) :
			$cozy_query->the_post();
			$product_id = get_the_ID();
			$product    = wc_get_product( $product_id );
			echo '<div class="slide swiper-slide"><div class="product-box content-block">'; ?>
			<?php if ( has_post_thumbnail() && $settings['product_slider_image_position'] == 'slide-image-left' ) { ?>
				<div class="cozy-featured-img">
					<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				</div>
			<?php } ?>
			<div class="product-content content-block">
				<div class="content-holder">
					<a href="<?php the_permalink(); ?>">
						<?php
						echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="product-title content-block">';
						the_title();
						echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
						?>
					</a>
					<?php
					if ( $settings['show_product_price'] == 'yes' ) {
						?>
						<div class="product-price content-block">
							<span class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>">
								<?php wc_get_template( 'loop/price.php' ); ?>
							</span>
						</div>
						<?php
					}

					if ( $settings['show_excerpt'] == 'yes' ) {
						echo '<span class="product-details content-block">' . esc_html( cozy_addons_excerpt( $excerpt_length ) ) . '</span>';
					}
					?>

					<div class="cozy-button-group content-block">
						<?php if ( $settings['show_add_to_cart'] == 'yes' ) { ?>
							<div class="cozy-add-to-cart">
							<?php
															$icon_position_class = '';
							if ( $settings['show_cta_icon'] == 'yes' ) {
								if ( $settings['cta_icon_position'] == 'after-text' ) {
									$icon_position_class = 'after-text';
								} else {
									$icon_position_class = 'before-text';
								}
								if ( $settings['cta_cart_icon'] == 'cart-icon-3' ) {
									$cart_icon_class = 'fas fa-shopping-bag';
								} elseif ( $settings['cta_cart_icon'] == 'cart-icon-2' ) {
									$cart_icon_class = 'fas fa-cart-arrow-down';
								} else {
									$cart_icon_class = 'fas fa-shopping-cart';
								}
							}

															printf(
																'<a href="%s" data-quantity="1" class="%s ' . esc_attr( $icon_position_class ) . '" %s> <i class="' . esc_attr( $cart_icon_class ) . ' before-text"></i>' . esc_html( $settings['button_text'] ) . '<i class="' . esc_attr( $cart_icon_class ) . ' after-text"></i></a>',
																esc_url( $product->add_to_cart_url() ),
																esc_attr(
																	implode(
																		' ',
																		array_filter(
																			array(
																				'button',
																				'product_type_' . $product->get_type(),
																				$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
																				$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
																			)
																		)
																	)
																),
																wc_implode_html_attributes(
																	array(
																		'data-product_id'  => $product->get_id(),
																		'data-product_sku' => $product->get_sku(),
																		'aria-label'       => $product->add_to_cart_description(),
																		'rel'              => 'nofollow',
																	)
																)
															);
							?>
							</div>
						<?php } ?>
						<?php
						if ( $settings['show_readmore_cta'] == 'yes' && $settings['readmore_button_text'] ) {
							$icon_class = 'before-text';
							if ( $settings['readmore_cta_icon_position'] == 'after-text' ) {
								$icon_class = 'after-text';
							}
							?>
							<span class="readmore-button">
								<a href="<?php the_permalink(); ?>" class="ca-post-more <?php echo esc_attr( $icon_class ); ?>">
									<?php
									if ( $settings['show_readmore_cta_icon'] == 'yes' && $settings['readmore_cta_icon_position'] == 'before-text' ) {
										echo '<span class="button-icon">';
										\Elementor\Icons_Manager::render_icon( $settings['readmore_cta_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</span>';
									}
									echo esc_html( $settings['readmore_button_text'] );
									if ( $settings['show_readmore_cta_icon'] == 'yes' && $settings['readmore_cta_icon_position'] == 'after-text' ) {
										echo '<span class="button-icon">';
										\Elementor\Icons_Manager::render_icon( $settings['readmore_cta_icon'], array( 'aria-hidden' => 'true' ) );
										echo '</span>';
									}
									?>
								</a>
							</span>
							<?php
						}
						echo '</div>';


						echo '</div></div>';
						if ( has_post_thumbnail() && $settings['product_slider_image_position'] == 'slide-image-right' ) {
							?>
							<div class="cozy-featured-img">
								<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
							</div>
							<?php
						}
						echo '</div></div>';
					endwhile;
					echo '</div>';
		if ( $settings['show_carousel_pagination'] == 'yes' ) {
			?>
						<div class="cozy-swiper-pagination"></div>
					<?php
		}
					echo '<span class="product-slider-navigation">';
		if ( $settings['show_carousel_navigation'] == 'yes' ) {
			?>
						<div class="cozy-slide-prev cozy-slide-nav">
							<?php \Elementor\Icons_Manager::render_icon( $settings['slide_navigation_left_icon'], array( 'aria-hidden' => 'true' ) ); ?>
						</div>
					<?php
		}
		if ( $settings['show_carousel_navigation'] == 'yes' ) {
			?>
						<div class="cozy-slide-next cozy-slide-nav">
							<?php \Elementor\Icons_Manager::render_icon( $settings['slide_navigation_right_icon'], array( 'aria-hidden' => 'true' ) ); ?>
						</div>
					<?php
		}
					echo '</span>';
					echo '</div>';
				endif;
				wp_reset_postdata();
} else {
	$cozy_product_slide_id = '';
	$slide_per_view        = '';
	if ( $selected_product_layout == 'layout-2' ) {
		$cozy_product_slide_id = 'cozyProductSlideCarousel';
		$slide_per_view        = $settings['cozy_carousel_post_per_view'];
	}
	if ( $cozy_query->have_posts() ) :
		?>
					<div id="<?php echo esc_attr( $cozy_product_slide_id ) . '"' . ' ' . 'data-slidePerView="' . esc_attr( $slide_per_view ) . '" ' . 'data-carouselColumnGap="' . esc_attr( $settings['cozy_carousel_column_gap'] ); ?>" class=" products-holder swiper <?php echo esc_attr( $product_slider_class ); ?> ">
						<div class=" swiper-wrapper">
							<?php
							while ( $cozy_query->have_posts() ) :
								$cozy_query->the_post();
								$product_id = get_the_ID();
								$product    = wc_get_product( $product_id );
								echo '<div class="slide swiper-slide"><div class="product-box content-block">';
								?>
								<?php if ( has_post_thumbnail() ) { ?>
									<div class="cozy-featured-img">
										<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
											<?php the_post_thumbnail(); ?>
										</a>
									</div>
								<?php } ?>

								<div class="product-content content-block">
									<a href="<?php the_permalink(); ?>">
										<?php
										echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="product-title content-block">';
										the_title();
										echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
										?>
									</a>
									<?php
									if ( $settings['show_product_price'] == 'yes' ) {
										?>
										<div class="product-price content-block">
											<span class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>">
												<?php wc_get_template( 'loop/price.php' ); ?>
											</span>
										</div>
										<?php
									}

									if ( $settings['show_excerpt'] == 'yes' ) {
										echo '<span class="product-details content-block">' . esc_html( cozy_addons_excerpt( $excerpt_length ) ) . '</span>';
									}
									?>

									<div class="cozy-button-group content-block">
										<?php if ( $settings['show_add_to_cart'] == 'yes' ) { ?>
											<div class="cozy-add-to-cart">
											<?php
																			$icon_position_class = '';
																			$cart_icon_class     = '';
											if ( $settings['show_cta_icon'] == 'yes' ) {
												if ( $settings['cta_icon_position'] == 'after-text' ) {
													$icon_position_class = 'after-text';
												} else {
													$icon_position_class = 'before-text';
												}
												if ( $settings['cta_cart_icon'] == 'cart-icon-3' ) {
													$cart_icon_class = 'fas fa-shopping-bag';
												} elseif ( $settings['cta_cart_icon'] == 'cart-icon-2' ) {
													$cart_icon_class = 'fas fa-cart-arrow-down';
												} else {
													$cart_icon_class = 'fas fa-shopping-cart';
												}
											}

																			printf(
																				'<a href="%s" data-quantity="1" class="%s ' . esc_attr( $icon_position_class ) . '" %s> <i class="' . esc_attr( $cart_icon_class ) . ' before-text"></i>' . esc_html( $settings['button_text'] ) . '<i class="' . esc_attr( $cart_icon_class ) . ' after-text"></i></a>',
																				esc_url( $product->add_to_cart_url() ),
																				esc_attr(
																					implode(
																						' ',
																						array_filter(
																							array(
																								'button',
																								'product_type_' . $product->get_type(),
																								$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
																								$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
																							)
																						)
																					)
																				),
																				wc_implode_html_attributes(
																					array(
																						'data-product_id'  => $product->get_id(),
																						'data-product_sku' => $product->get_sku(),
																						'aria-label'       => $product->add_to_cart_description(),
																						'rel'              => 'nofollow',
																					)
																				)
																			);
											?>
											</div>
										<?php } ?>
										<?php
										if ( $settings['show_readmore_cta'] == 'yes' && $settings['readmore_button_text'] ) {
											$icon_class = 'before-text';
											if ( $settings['readmore_cta_icon_position'] == 'after-text' ) {
												$icon_class = 'after-text';
											}
											?>
											<span class="readmore-button">
												<a href="<?php the_permalink(); ?>" class="ca-post-more <?php echo esc_attr( $icon_class ); ?>">
													<?php
													if ( $settings['show_readmore_cta_icon'] == 'yes' && $settings['readmore_cta_icon_position'] == 'before-text' ) {
														echo '<span class="button-icon">';
														\Elementor\Icons_Manager::render_icon( $settings['readmore_cta_icon'], array( 'aria-hidden' => 'true' ) );
														echo '</span>';
													}
													echo esc_html( $settings['readmore_button_text'] );
													if ( $settings['show_readmore_cta_icon'] == 'yes' && $settings['readmore_cta_icon_position'] == 'after-text' ) {
														echo '<span class="button-icon">';
														\Elementor\Icons_Manager::render_icon( $settings['readmore_cta_icon'], array( 'aria-hidden' => 'true' ) );
														echo '</span>';
													}
													?>
												</a>
											</span>
											<?php
										}
										echo '</div>';
										echo '</div>';
										echo '</div></div>';
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
							if ( $settings['show_carousel_pagination'] ) {
								?>
										<div class="cozy-swiper-pagination"></div>
								<?php
							}
										echo '</div>';
								endif;
					wp_reset_postdata();
}
