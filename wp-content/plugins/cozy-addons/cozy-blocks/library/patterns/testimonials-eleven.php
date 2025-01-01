<?php
	/**
	 * Title: Testimonials section eleven with carousel
	 * Description: This is testimonials section with carousel
	 * Slug: cozy-block-patterns/testimonials-eleven
	 * Categories: cozy-block-patterns, testimonials
	 * Premium: true
	 */

	$images = array(
		CT_ASSETS_URL . 'images/testimonial_3_1.png',
		CT_ASSETS_URL . 'images/team_1_2.jpg',
		CT_ASSETS_URL . 'images/team_1_1.jpg',
	);
	?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Testimonials', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"color":{"background":"#fffffe"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"16px","right":"16px"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"1.3","fontSize":"44px","fontStyle":"normal","fontWeight":"600"}},"cozyCustomFont":"Playfair Display","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<h2 class="wp-block-heading has-text-align-center" style="font-size:44px;font-style:normal;font-weight:600;line-height:1.3"><?php esc_html_e( 'Our Client’s Successful Stories', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"26px","bottom":"0"}},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}}},"layout":{"type":"constrained","contentSize":"772px"},"cozyCustomFont":"Public Sans"} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#090b10;margin-top:26px;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cozy-block/testimonial {"blockClientId":"d64727df-1925-4426-b285-006a77b0126a","carouselOptions":{"pagination":{"enabled":true,"width":10,"height":10,"borderRadius":10,"activeWidth":10,"activeBorderRadius":10,"activeColor":"#003d4b","color":"#252525","activeColorHover":"#e8b343","colorHover":"#a5a5a5","positionVertical":-10},"navigation":{"enabled":false,"iconSize":15,"iconBoxWidth":35,"iconBoxHeight":35,"borderRadius":50,"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","backgroundColor":"#fff","color":"#007cba","backgroundColorHover":"#007cba","colorHover":"#fff","padding":{"top":5,"right":5,"bottom":5,"left":5}},"sliderOptions":{"loop":false,"autoplay":{"enabled":true,"pauseOnMouseEnter":true,"delay":2500},"centeredSlides":false,"slidesPerView":1,"spaceBetween":30,"speed":"1500"}}} -->
<div class="cozy-block-testimonial display-carousel   swiper-container hover-show" id="cozyBlock_d64727df_1925_4426_b285_006a77b0126a"><div class="cozy-block-carousel-wrapper swiper-wrapper"><!-- wp:cozy-block/carousel -->
<div class="cozy-block-carousel swiper-slide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"26px","bottom":"26px","left":"16px","right":"16px"},"blockGap":"16px"}},"layout":{"type":"constrained","contentSize":"777px"}} -->
<div class="wp-block-group" style="padding-top:26px;padding-right:16px;padding-bottom:26px;padding-left:16px"><!-- wp:image {"id":2932,"width":"100px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-2932" style="width:100px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"16px"},"color":{"text":"#6a6a6a"},"elements":{"link":{"color":{"text":"#6a6a6a"}}}}} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#6a6a6a;font-size:16px"><em><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat sed nunc at laoreet. In ultricies aliquam dui cursus volutpat.', 'cozy-addons' ); ?></em></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"16px"},"color":{"text":"#6a6a6a"},"elements":{"link":{"color":{"text":"#6a6a6a"}}}}} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#6a6a6a;font-size:16px"><em><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat sed nunc at laoreet. In ultricies aliquam dui cursus volutpat. Morbi vitae tortor eu velit fermentum ultricies in at dolor.', 'cozy-addons' ); ?></em></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"16px","margin":{"top":"26px"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:26px"><!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"3px","bottom":"3px","left":"3px","right":"3px"}},"border":{"color":"#e8b343","width":"1px","radius":"100px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color" style="border-color:#e8b343;border-width:1px;border-radius:100px;padding-top:3px;padding-right:3px;padding-bottom:3px;padding-left:3px"><!-- wp:image {"id":2558,"width":"60px","height":"60px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-2558" style="border-radius:50px;object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"left","placeholder":"George Mathew","style":{"typography":{"fontSize":"18px"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}}},"cozyCustomFont":"Inter"} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color" style="color:#090b10;font-size:18px"><?php esc_html_e( 'Margaret', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"},"color":{"text":"#6a6a6a"},"elements":{"link":{"color":{"text":"#6a6a6a"}}}}} -->
<p class="has-text-color has-link-color" style="color:#6a6a6a;font-size:14px"><?php esc_html_e( 'Director', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/carousel -->

<!-- wp:cozy-block/carousel -->
<div class="cozy-block-carousel swiper-slide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"26px","bottom":"26px","left":"16px","right":"16px"},"blockGap":"16px"}},"layout":{"type":"constrained","contentSize":"777px"}} -->
<div class="wp-block-group" style="padding-top:26px;padding-right:16px;padding-bottom:26px;padding-left:16px"><!-- wp:image {"id":2932,"width":"100px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-2932" style="width:100px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"16px"},"color":{"text":"#6a6a6a"},"elements":{"link":{"color":{"text":"#6a6a6a"}}}}} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#6a6a6a;font-size:16px"><em><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat sed nunc at laoreet. In ultricies aliquam dui cursus volutpat.', 'cozy-addons' ); ?></em></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"16px"},"color":{"text":"#6a6a6a"},"elements":{"link":{"color":{"text":"#6a6a6a"}}}}} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#6a6a6a;font-size:16px"><em><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat sed nunc at laoreet. In ultricies aliquam dui cursus volutpat. Morbi vitae tortor eu velit fermentum ultricies in at dolor.', 'cozy-addons' ); ?></em></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"16px","margin":{"top":"26px"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:26px"><!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"3px","bottom":"3px","left":"3px","right":"3px"}},"border":{"color":"#e8b343","width":"1px","radius":"100px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color" style="border-color:#e8b343;border-width:1px;border-radius:100px;padding-top:3px;padding-right:3px;padding-bottom:3px;padding-left:3px"><!-- wp:image {"id":2558,"width":"60px","height":"60px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-2558" style="border-radius:50px;object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"left","placeholder":"George Mathew","style":{"typography":{"fontSize":"18px"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}}},"cozyCustomFont":"Inter"} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color" style="color:#090b10;font-size:18px"><?php esc_html_e( 'Ben', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"},"color":{"text":"#6a6a6a"},"elements":{"link":{"color":{"text":"#6a6a6a"}}}}} -->
<p class="has-text-color has-link-color" style="color:#6a6a6a;font-size:14px"><?php esc_html_e( 'Client', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/carousel --></div><div class="swiper-pagination cozy-pagination"></div></div>
<!-- /wp:cozy-block/testimonial --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->