<?php
	/**
	 * Title: Testimonials section twelve with carousel layout
	 * Description: This is testimonials section with carousel layout
	 * Slug: cozy-block-patterns/testimonials-twelve
	 * Categories: cozy-block-patterns, testimonials
	 * Premium: true
	 */

	$images = array(
		CT_ASSETS_URL . 'images/testimonial_3_1.png',
		CT_ASSETS_URL . 'images/team_1_2.jpg',
		CT_ASSETS_URL . 'images/team_1_1.jpg',
	);
	?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Testimonials', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"color":{"background":"#000711"}},"className":"cozy-block-pattern__navigation-variation-one","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull cozy-block-pattern__navigation-variation-one has-background" style="background-color:#000711;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"16px","right":"16px"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"typography":{"fontSize":"14px"}},"layout":{"type":"constrained","contentSize":"1180px"},"cozyCustomFont":"Questrial"} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#fffffe;margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px;font-size:14px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"1.3","fontSize":"44px","fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"}},"cozyCustomFont":"Questrial","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#fffffe;font-size:44px;font-style:normal;font-weight:500;line-height:1.3"><?php esc_html_e( 'Our Client’s Successful Stories', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"12px","right":"12px"},"margin":{"top":"0px","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"772px"},"cozyCustomFont":"Public Sans"} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0;padding-top:0;padding-right:12px;padding-bottom:0;padding-left:12px"><!-- wp:cozy-block/testimonial {"blockClientId":"db22eaa8-e6d8-4c35-84cc-15f1a23795ed","hoverShow":false,"carouselOptions":{"pagination":{"enabled":false,"width":10,"height":10,"borderRadius":10,"activeWidth":10,"activeBorderRadius":10,"activeColor":"#003d4b","color":"#252525","activeColorHover":"#e8b343","colorHover":"#a5a5a5","positionVertical":-10},"navigation":{"enabled":true,"iconSize":22,"iconBoxWidth":35,"iconBoxHeight":35,"borderRadius":50,"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","color":"#fffffe","colorHover":"#f49805","padding":{"top":5,"right":5,"bottom":5,"left":5}},"sliderOptions":{"loop":false,"autoplay":{"enabled":true,"pauseOnMouseEnter":true,"delay":2500},"centeredSlides":false,"slidesPerView":1,"spaceBetween":30,"speed":"1500"}}} -->
<div class="cozy-block-testimonial display-carousel   swiper-container " id="cozyBlock_db22eaa8_e6d8_4c35_84cc_15f1a23795ed"><div class="cozy-block-carousel-wrapper swiper-wrapper"><!-- wp:cozy-block/carousel -->
<div class="cozy-block-carousel swiper-slide"><!-- wp:group {"style":{"spacing":{"padding":{"left":"14px","right":"14px"},"blockGap":"16px"}},"layout":{"type":"constrained","contentSize":"777px"}} -->
<div class="wp-block-group" style="padding-right:14px;padding-left:14px"><!-- wp:group {"style":{"spacing":{"blockGap":"6px","margin":{"top":"26px"}}},"layout":{"type":"constrained","contentSize":"117px"}} -->
<div class="wp-block-group" style="margin-top:26px"><!-- wp:group {"layout":{"type":"constrained","contentSize":"72px"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"3px","bottom":"3px","left":"3px","right":"3px"}},"border":{"radius":"100px","color":"#ffffff40","width":"2px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color" style="border-color:#ffffff40;border-width:2px;border-radius:100px;padding-top:3px;padding-right:3px;padding-bottom:3px;padding-left:3px"><!-- wp:image {"id":2558,"width":"60px","height":"60px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-2558" style="border-radius:50px;object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"18px","lineHeight":"1.2"}}} -->
<p class="has-text-align-center" style="font-size:18px;line-height:1.2"><?php esc_html_e( 'Margaret', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"14px"},"color":{"text":"#ebebeb"},"elements":{"link":{"color":{"text":"#ebebeb"}}}}} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#ebebeb;font-size:14px"><?php esc_html_e( 'Director', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"26px"}}}} -->
<p class="has-text-align-center" style="margin-top:26px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat sed nunc at laoreet. In ultricies aliquam dui cursus volutpat.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat sed nunc at laoreet. In ultricies aliquam dui cursus volutpat. Morbi vitae tortor eu velit fermentum ultricies in at dolor.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":2932,"width":"100px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-2932" style="width:100px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/carousel -->

<!-- wp:cozy-block/carousel -->
<div class="cozy-block-carousel swiper-slide"><!-- wp:group {"style":{"spacing":{"padding":{"left":"14px","right":"14px"},"blockGap":"16px"}},"layout":{"type":"constrained","contentSize":"777px"}} -->
<div class="wp-block-group" style="padding-right:14px;padding-left:14px"><!-- wp:group {"style":{"spacing":{"blockGap":"6px","margin":{"top":"26px"}}},"layout":{"type":"constrained","contentSize":"117px"}} -->
<div class="wp-block-group" style="margin-top:26px"><!-- wp:group {"layout":{"type":"constrained","contentSize":"72px"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"3px","bottom":"3px","left":"3px","right":"3px"}},"border":{"radius":"100px","color":"#ffffff40","width":"2px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color" style="border-color:#ffffff40;border-width:2px;border-radius:100px;padding-top:3px;padding-right:3px;padding-bottom:3px;padding-left:3px"><!-- wp:image {"id":2558,"width":"60px","height":"60px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-2558" style="border-radius:50px;object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"18px","lineHeight":"1.2"}}} -->
<p class="has-text-align-center" style="font-size:18px;line-height:1.2"><?php esc_html_e( 'Ben', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"14px"},"color":{"text":"#ebebeb"},"elements":{"link":{"color":{"text":"#ebebeb"}}}}} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#ebebeb;font-size:14px"><?php esc_html_e( 'CUstomer', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"26px"}}}} -->
<p class="has-text-align-center" style="margin-top:26px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat sed nunc at laoreet. In ultricies aliquam dui cursus volutpat.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat sed nunc at laoreet. In ultricies aliquam dui cursus volutpat. Morbi vitae tortor eu velit fermentum ultricies in at dolor.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":2932,"width":"100px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-2932" style="width:100px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/carousel --></div><div class="swiper-button-prev cozy-block-button-prev"></div><div class="swiper-button-next cozy-block-button-next"></div></div>
<!-- /wp:cozy-block/testimonial --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->