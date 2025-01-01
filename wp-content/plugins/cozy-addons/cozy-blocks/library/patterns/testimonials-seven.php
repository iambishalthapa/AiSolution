<?php
	/**
	 * Title: Testimonials section seven with carousel layout
	 * Description: This is testimonials section with carousel layout
	 * Slug: cozy-block-patterns/testimonials-seven
	 * Categories: cozy-block-patterns, testimonials
	 */

	$images = array(
		CT_ASSETS_URL . 'images/team_1_2.jpg',
		CT_ASSETS_URL . 'images/testimonial_1_2.png',
		CT_ASSETS_URL . 'images/testimonial_1_1.png',
	);
	?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Testimonials', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"color":{"background":"#f9faff"}},"className":"cozy-block-pattern__testimonials-two","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull cozy-block-pattern__testimonials-two has-background" style="background-color:#f9faff;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"16px","right":"16px"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"typography":{"fontSize":"14px"},"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}}},"layout":{"type":"constrained","contentSize":"1180px"},"cozyCustomFont":"Poppins"} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#646464;margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px;font-size:14px"><!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"64px"}},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}}},"layout":{"type":"constrained","contentSize":"460px","justifyContent":"left"}} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#090b10;margin-top:0;margin-bottom:64px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:heading {"textAlign":"left","style":{"typography":{"lineHeight":"1.3","fontSize":"40px","fontStyle":"normal","fontWeight":"600"},"color":{"text":"#070e28"},"elements":{"link":{"color":{"text":"#070e28"}}}},"cozyCustomFont":"Work Sans","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color" style="color:#070e28;font-size:40px;font-style:normal;font-weight:600;line-height:1.3"><?php esc_html_e( 'What Our Customers Are Saying', 'cozy-addons' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:cozy-block/testimonial {"blockClientId":"a25a1654-de9d-4a94-829d-d9b2b38d3eae","hoverShow":false,"gridOptions":{"displayColumn":3,"masonryEnabled":true,"columnGap":24},"carouselOptions":{"pagination":{"enabled":false,"width":10,"height":10,"borderRadius":10,"activeWidth":10,"activeBorderRadius":10,"activeColor":"#007cba","color":"#252525","activeColorHover":"#164861","colorHover":"#a5a5a5","positionVertical":18},"navigation":{"enabled":true,"iconSize":15,"iconBoxWidth":35,"iconBoxHeight":35,"borderRadius":50,"backgroundColor":"#f2024a","color":"#fffffe","backgroundColorHover":"#ff9900","colorHover":"#fff","padding":{"top":5,"right":5,"bottom":5,"left":5}},"sliderOptions":{"loop":false,"autoplay":{"enabled":false,"pauseOnMouseEnter":true,"delay":2500},"centeredSlides":false,"slidesPerView":"2","spaceBetween":30,"speed":700}}} -->
<div class="cozy-block-testimonial display-carousel   swiper-container " id="cozyBlock_a25a1654_de9d_4a94_829d_d9b2b38d3eae"><div class="cozy-block-carousel-wrapper swiper-wrapper"><!-- wp:cozy-block/carousel -->
<div class="cozy-block-carousel swiper-slide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"0","right":"0"},"blockGap":"6px"},"border":{"radius":"20px"}},"layout":{"type":"constrained","contentSize":"440px"},"cozyHoverEffect":{"boxShadow":{"enabled":false,"color":"#e0e0e0","horizontal":0,"vertical":6,"blur":25,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}},"cozyAnimation":{"type":"fade-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<div class="wp-block-group" style="border-radius:20px;padding-top:40px;padding-right:0;padding-bottom:40px;padding-left:0"><!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-color has-link-color" style="color:#090b10;font-size:20px;font-style:normal;font-weight:500"><?php esc_html_e( 'Helped Us Improve Our Productivity', 'cozy-addons' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry."} -->
<p class="has-text-align-left"><?php esc_html_e( '“Vivamus sagittis lacus augue laoreet rutrum faucibus dolor auctor. ligula porta felis euismod semper.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"16px","margin":{"top":"26px"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group" style="margin-top:26px"><!-- wp:image {"id":2558,"width":"60px","height":"60px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-2558" style="border-radius:50px;object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"#090b10"}}},"color":{"text":"#090b10"},"typography":{"fontSize":"18px"}}} -->
<p class="has-text-align-left has-text-color has-link-color" style="color:#090b10;font-size:18px"><?php esc_html_e( 'Linda', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"},"color":{"text":"#6a6a6a"},"elements":{"link":{"color":{"text":"#6a6a6a"}}}}} -->
<p class="has-text-color has-link-color" style="color:#6a6a6a;font-size:14px"><?php esc_html_e( 'Customer', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/carousel -->

<!-- wp:cozy-block/carousel -->
<div class="cozy-block-carousel swiper-slide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"0","right":"0"},"blockGap":"6px"},"border":{"radius":"20px"}},"layout":{"type":"constrained","contentSize":"440px"},"cozyHoverEffect":{"boxShadow":{"enabled":false,"color":"#e0e0e0","horizontal":0,"vertical":6,"blur":25,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}},"cozyAnimation":{"type":"fade-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<div class="wp-block-group" style="border-radius:20px;padding-top:40px;padding-right:0;padding-bottom:40px;padding-left:0"><!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-color has-link-color" style="color:#090b10;font-size:20px;font-style:normal;font-weight:500"><?php esc_html_e( "Couldn't be any happier!", 'cozy-addons' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry."} -->
<p class="has-text-align-left"><?php esc_html_e( '“Vivamus sagittis lacus augue laoreet rutrum faucibus dolor auctor. ligula porta felis euismod semper.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"16px","margin":{"top":"26px"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group" style="margin-top:26px"><!-- wp:image {"id":1225,"width":"60px","height":"60px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-1225" style="border-radius:50px;object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"#090b10"}}},"color":{"text":"#090b10"},"typography":{"fontSize":"18px"}}} -->
<p class="has-text-align-left has-text-color has-link-color" style="color:#090b10;font-size:18px"><?php esc_html_e( 'Richard', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"},"color":{"text":"#6a6a6a"},"elements":{"link":{"color":{"text":"#6a6a6a"}}}}} -->
<p class="has-text-color has-link-color" style="color:#6a6a6a;font-size:14px"><?php esc_html_e( 'Customer', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/carousel -->

<!-- wp:cozy-block/carousel -->
<div class="cozy-block-carousel swiper-slide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"0","right":"0"},"blockGap":"6px"},"border":{"radius":"20px"}},"layout":{"type":"constrained","contentSize":"440px"},"cozyHoverEffect":{"boxShadow":{"enabled":false,"color":"#e0e0e0","horizontal":0,"vertical":6,"blur":25,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}},"cozyAnimation":{"type":"fade-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<div class="wp-block-group" style="border-radius:20px;padding-top:40px;padding-right:0;padding-bottom:40px;padding-left:0"><!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-color has-link-color" style="color:#090b10;font-size:20px;font-style:normal;font-weight:500"><?php esc_html_e( 'Helped Us Improve Our Productivity', 'cozy-addons' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry."} -->
<p class="has-text-align-left"><?php esc_html_e( '“Vivamus sagittis lacus augue laoreet rutrum faucibus dolor auctor. ligula porta felis euismod semper.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"16px","margin":{"top":"26px"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group" style="margin-top:26px"><!-- wp:image {"id":2558,"width":"60px","height":"60px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-2558" style="border-radius:50px;object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"#090b10"}}},"color":{"text":"#090b10"},"typography":{"fontSize":"18px"}}} -->
<p class="has-text-align-left has-text-color has-link-color" style="color:#090b10;font-size:18px"><?php esc_html_e( 'Angelina', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"},"color":{"text":"#6a6a6a"},"elements":{"link":{"color":{"text":"#6a6a6a"}}}}} -->
<p class="has-text-color has-link-color" style="color:#6a6a6a;font-size:14px"><?php esc_html_e( 'Customer', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/carousel --></div><div class="swiper-button-prev cozy-block-button-prev"></div><div class="swiper-button-next cozy-block-button-next"></div></div>
<!-- /wp:cozy-block/testimonial --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->