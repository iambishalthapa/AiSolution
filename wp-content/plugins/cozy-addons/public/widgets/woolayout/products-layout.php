<?php
require_once COZY_ADDONS_PLUGIN_DIR . 'public/partials/partial-functions.php';
$selected_product_layout = $settings['product_select_layout'];
$column_number_class     = '';
if ( $selected_product_layout == 'layout-grid' || $selected_product_layout == 'layout-masonry' ) {
	$column_number_class = $settings['product_grid_column'];
}
if ( $selected_product_layout == 'layout-list' ) {
	$column_number_class = $settings['product_list_column'];
}

$post_per_page  = $settings['posts_per_page'];
$post_offset    = $settings['posts_offset'];
$order_by       = $settings['product_orderby'];
$order          = $settings['product_order'];
$cats           = $settings['product_categories'];
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
$cozy_addons_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$cozy_query        = new WP_Query(
	array(
		'post_type'      => 'product',
		'post_status'    => 'publish',
		'posts_per_page' => $post_per_page,
		'orderby'        => $order_by,
		'order'          => $order,
		'paged'          => $cozy_addons_paged,
		'offset'         => $post_offset,
		'tax_query'      => $tax_query,
	)
);
if ( $selected_product_layout == 'layout-carousel' ) {
	$product_slide_id = 'cozyProductsCarousel';
	$slide_per_view   = $settings['cozy_carousel_post_per_view'];
	if ( $cozy_query->have_posts() ) : ?>
		<div id="<?php echo esc_attr( $product_slide_id ) . '"' . ' ' . 'data-slidePerView="' . esc_attr( $slide_per_view ) . '" ' . 'data-carouselColumnGap="' . esc_attr( $settings['cozy_carousel_column_gap'] ); ?>" class=" products-holder swiper">
			<div class="swiper-wrapper">
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
							<?php
							if ( $product->is_on_sale() && $settings['show_sale_badge'] == 'yes' ) {
								echo '<span class="onsale">' . __( 'Sale', 'cozy-addons' ) . '</span>';
							}
							?>
						</div>
					<?php } ?>
					<div class="product-content content-block">
						<?php
						$cozy_product_categories = get_the_terms( $cozy_query->post->ID, 'product_cat' );
						if ( ! empty( $cozy_product_categories ) && $settings['show_product_category'] == 'yes' ) {
							?>
							<div class="product-categories">
								<?php
								foreach ( $cozy_product_categories as $cozy_category ) {
									$cozy_product_term_url = get_term_link( $cozy_category );
									?>
									<a href="<?php echo esc_url( $cozy_product_term_url ); ?>">
										<?php echo esc_html( $cozy_category->name ); ?>
									</a>
								<?php } ?>
							</div>
							<?php
						}



						if ( $settings['show_title'] == 'yes' ) {
							?>
							<a href="<?php the_permalink(); ?>">
							<?php
							echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="product-title content-block">';
							the_title();
							echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
							echo '</a>';
						}
						if ( $settings['show_product_price'] == 'yes' ) {
							?>
								<div class="product-price content-block">
									<span class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>">
										<?php wc_get_template( 'loop/price.php' ); ?>
									</span>
								</div>
							<?php
						}
						if ( $settings['show_product_rating'] == 'yes' ) {
							?>
								<div class="product-rating content-block">
									<?php
									if ( $product->is_type( 'simple' ) ) {
										woocommerce_template_loop_rating( $cozy_query->post, $product );
									}
									?>
								</div>
							<?php
						}
						if ( $settings['show_excerpt'] == 'yes' ) {
							echo '<span class="product-details content-block">' . esc_html( cozy_addons_excerpt( $excerpt_length ) ) . '</span>';
						}
						?>

							<div class="cozy-button-group content-block">
								<?php
								if ( cozy_addons_premium_access() ) {
									$product_addtocart_status = $settings['show_add_to_cart'];
								} else {
									$product_addtocart_status = 'yes';
								}

								if ( $product_addtocart_status == 'yes' ) {
									?>
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
								if ( cozy_addons_premium_access() ) {
									$product_readmore_status = $settings['show_readmore_cta'];
								} else {
									$product_readmore_status = 'no';
								}
								if ( $product_readmore_status == 'yes' && $settings['readmore_button_text'] ) {
									$icon_class = 'before-text';
									if ( $settings['readmore_cta_icon_position'] == 'after-text' ) {
										$icon_class = 'after-text';
									}
									?>
									<span class="readmore-button">
										<a href="<?php the_permalink(); ?>" class="post-more <?php echo esc_attr( $icon_class ); ?>">
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
				if ( $settings['show_carousel_pagination'] == 'yes' ) {
					?>
								<div class="cozy-swiper-pagination"></div>
							<?php
				}
							echo '</div>';
						endif;
						wp_reset_postdata();
} else {
	if ( $cozy_query->have_posts() ) :
		echo '<div class="products-holder ' . esc_attr( $column_number_class ) . '">';
		while ( $cozy_query->have_posts() ) :
			$cozy_query->the_post();
			$product_id = get_the_ID();
			$product    = wc_get_product( $product_id );
			echo '<div class="product-box content-block">';
			?>

								<?php if ( has_post_thumbnail() ) { ?>
									<div class="cozy-featured-img">
										<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
											<?php the_post_thumbnail(); ?>
										</a>
										<?php
										if ( $product->is_on_sale() && $settings['show_sale_badge'] == 'yes' ) {
											echo '<span class="onsale">' . __( 'Sale', 'cozy-addons' ) . '</span>';
										}
										?>
									</div>
								<?php } ?>
								<div class="product-content content-block">
									<?php
									$cozy_product_categories = get_the_terms( $cozy_query->post->ID, 'product_cat' );
									if ( ! empty( $cozy_product_categories ) && $settings['show_product_category'] == 'yes' ) {
										?>
										<div class="product-categories">
											<?php
											foreach ( $cozy_product_categories as $cozy_category ) {
												$cozy_product_term_url = get_term_link( $cozy_category );
												?>
												<a href="<?php echo esc_url( $cozy_product_term_url ); ?>">
													<?php echo esc_html( $cozy_category->name ); ?>
												</a>
											<?php } ?>
										</div>
										<?php
									}



									if ( $settings['show_title'] == 'yes' ) {
										?>
										<a href="<?php the_permalink(); ?>">
										<?php
										echo '<' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . ' class="product-title content-block">';
										the_title();
										echo '</' . esc_attr( cozy_filter_html_tags( $settings['title_tag'] ) ) . '>';
										echo '</a>';
									}
									if ( $settings['show_product_price'] == 'yes' ) {
										?>
											<div class="product-price content-block">
												<span class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>">
													<?php wc_get_template( 'loop/price.php' ); ?>
												</span>
											</div>
										<?php
									}
									if ( $settings['show_product_rating'] == 'yes' ) {
										?>
											<div class="product-rating content-block">
												<?php
												if ( $product->is_type( 'simple' ) ) {
													woocommerce_template_loop_rating( $cozy_query->post, $product );
												}
												?>
											</div>
										<?php
									}
									if ( $settings['show_excerpt'] == 'yes' ) {
										echo '<span class="product-details content-block">' . esc_html( cozy_addons_excerpt( $excerpt_length ) ) . '</span>';
									}
									?>

										<div class="cozy-button-group content-block">
											<?php
											if ( cozy_addons_premium_access() ) {
												$product_addtocart_status = $settings['show_add_to_cart'];
											} else {
												$product_addtocart_status = 'yes';
											}

											if ( $product_addtocart_status == 'yes' ) {
												?>
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
											if ( cozy_addons_premium_access() ) {
												$product_readmore_status = $settings['show_readmore_cta'];
											} else {
												$product_readmore_status = 'no';
											}
											if ( $product_readmore_status == 'yes' && $settings['readmore_button_text'] ) {
												$icon_class = 'before-text';
												if ( $settings['readmore_cta_icon_position'] == 'after-text' ) {
													$icon_class = 'after-text';
												}
												?>
												<span class="readmore-button">
													<a href="<?php the_permalink(); ?>" class="post-more <?php echo esc_attr( $icon_class ); ?>">
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
											echo '</div>';
										endwhile;
					echo '</div>';
					cozy_pagination_function( $settings, $cozy_query, html_entity_decode( get_pagenum_link() ) );
				endif;
				wp_reset_postdata();
}
