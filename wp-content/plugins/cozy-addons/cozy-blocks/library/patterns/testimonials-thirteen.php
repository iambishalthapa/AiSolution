<?php
	/**
	 * Title: Testimonials section thirteen with carousel
	 * Description: This is testimonials section with carousel
	 * Slug: cozy-block-patterns/testimonials-thirteen
	 * Categories: cozy-block-patterns, testimonials
	 * Premium: true
	 */

	$images = array(
		CT_ASSETS_URL . 'images/testimonial_3_1.png',
		CT_ASSETS_URL . 'images/double_quote.png',
		CT_ASSETS_URL . 'images/testimonial_1_1.png',
		CT_ASSETS_URL . 'images/testimonial_1_2.png',
	);
	?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Testimonials', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"color":{"background":"#fffffe"}},"className":"cozy-block-pattern__navigation-variation-one","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull cozy-block-pattern__navigation-variation-one has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"right":"26px","left":"26px","top":"80px","bottom":"80px"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}},"typography":{"fontSize":"14px"}},"layout":{"type":"constrained","contentSize":"1180px"},"cozyCustomFont":"Public Sans"} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#646464;margin-top:0;margin-bottom:0;padding-top:80px;padding-right:26px;padding-bottom:80px;padding-left:26px;font-size:14px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"36px"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"459px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:36px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"44px","fontStyle":"normal","fontWeight":"600","lineHeight":"1.2"}},"cozyCustomFont":"Inter","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":600}} -->
<h2 class="wp-block-heading has-text-align-center" style="font-size:44px;font-style:normal;font-weight:600;line-height:1.2"><?php esc_html_e( 'Our Patients Say', 'cozy-addons' ); ?>!</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"6px"}}}} -->
<p class="has-text-align-center" style="margin-top:6px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:cozy-block/testimonial {"blockClientId":"1f214f45-243d-4dd6-8c68-ff621b1a8a8b","hoverShow":false,"carouselOptions":{"pagination":{"enabled":false,"width":10,"height":10,"borderRadius":10,"activeWidth":10,"activeBorderRadius":10,"activeColor":"#007cba","color":"#252525","activeColorHover":"#164861","colorHover":"#a5a5a5","positionVertical":18},"navigation":{"enabled":true,"iconSize":15,"iconBoxWidth":35,"iconBoxHeight":35,"borderRadius":50,"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","backgroundColor":"#fff","color":"#00c6e1","backgroundColorHover":"#00c6e1","colorHover":"#fffffe","padding":{"top":5,"right":5,"bottom":5,"left":5}},"sliderOptions":{"loop":false,"autoplay":{"enabled":true,"pauseOnMouseEnter":true,"delay":2500},"centeredSlides":false,"slidesPerView":"2","spaceBetween":30,"speed":"1500"}}} -->
<div class="cozy-block-testimonial display-carousel   swiper-container " id="cozyBlock_1f214f45_243d_4dd6_8c68_ff621b1a8a8b"><div class="cozy-block-carousel-wrapper swiper-wrapper"><!-- wp:cozy-block/carousel -->
<div class="cozy-block-carousel swiper-slide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"20px","right":"20px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:40px;padding-right:20px;padding-bottom:40px;padding-left:20px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"44px","bottom":"44px","left":"16px","right":"16px"},"margin":{"top":"0px","bottom":"0px"},"blockGap":"0px"},"border":{"radius":"20px"}},"layout":{"type":"constrained","contentSize":"419px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#eaeceb","horizontal":0,"vertical":4,"blur":20,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}}} -->
<div class="wp-block-group" style="border-radius:20px;margin-top:0px;margin-bottom:0px;padding-top:44px;padding-right:16px;padding-bottom:44px;padding-left:16px"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:image {"id":1224,"width":"60px","height":"60px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-1224" style="border-radius:50px;object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":4,"placeholder":"George Mathew","style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"600"}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center" style="font-size:16px;font-style:normal;font-weight:600"><?php esc_html_e( 'Angelina', 'cozy-addons' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Patient', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:image {"id":1871,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-1871"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"left","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"spacing":{"margin":{"bottom":"16px","top":"12px"}}}} -->
<p class="has-text-align-left" style="margin-top:12px;margin-bottom:16px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat sed nunc at laoreet. In ultricies aliquam dui cursus volutpat. Morbi vitae tortor eu velit fermentum ultricies in at dolor.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":1872,"width":"auto","height":"20px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-1872" style="width:auto;height:20px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/carousel -->

<!-- wp:cozy-block/carousel -->
<div class="cozy-block-carousel swiper-slide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"20px","right":"20px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:40px;padding-right:20px;padding-bottom:40px;padding-left:20px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"44px","bottom":"44px","left":"16px","right":"16px"},"margin":{"top":"0px","bottom":"0px"},"blockGap":"0px"},"border":{"radius":"20px"}},"layout":{"type":"constrained","contentSize":"419px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#eaeceb","horizontal":0,"vertical":4,"blur":20,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}}} -->
<div class="wp-block-group" style="border-radius:20px;margin-top:0px;margin-bottom:0px;padding-top:44px;padding-right:16px;padding-bottom:44px;padding-left:16px"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:image {"id":1225,"width":"60px","height":"60px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[3] ); ?>" alt="" class="wp-image-1225" style="border-radius:50px;object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":4,"placeholder":"George Mathew","style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"600"}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center" style="font-size:16px;font-style:normal;font-weight:600">Richard</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Patient', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:image {"id":1871,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-1871"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"left","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"spacing":{"margin":{"bottom":"16px","top":"12px"}}}} -->
<p class="has-text-align-left" style="margin-top:12px;margin-bottom:16px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat sed nunc at laoreet. In ultricies aliquam dui cursus volutpat. Morbi vitae tortor eu velit fermentum ultricies in at dolor.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":1872,"width":"auto","height":"20px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-1872" style="width:auto;height:20px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/carousel -->

<!-- wp:cozy-block/carousel -->
<div class="cozy-block-carousel swiper-slide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"20px","right":"20px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:40px;padding-right:20px;padding-bottom:40px;padding-left:20px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"44px","bottom":"44px","left":"16px","right":"16px"},"margin":{"top":"0px","bottom":"0px"},"blockGap":"0px"},"border":{"radius":"20px"}},"layout":{"type":"constrained","contentSize":"419px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#eaeceb","horizontal":0,"vertical":4,"blur":20,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}}} -->
<div class="wp-block-group" style="border-radius:20px;margin-top:0px;margin-bottom:0px;padding-top:44px;padding-right:16px;padding-bottom:44px;padding-left:16px"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:image {"id":1224,"width":"60px","height":"60px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-1224" style="border-radius:50px;object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":4,"placeholder":"George Mathew","style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"600"}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center" style="font-size:16px;font-style:normal;font-weight:600"><?php esc_html_e( 'Angelina', 'cozy-addons' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Patient', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:image {"id":1871,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-1871"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"left","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"spacing":{"margin":{"bottom":"16px","top":"12px"}}}} -->
<p class="has-text-align-left" style="margin-top:12px;margin-bottom:16px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat sed nunc at laoreet. In ultricies aliquam dui cursus volutpat. Morbi vitae tortor eu velit fermentum ultricies in at dolor.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":1872,"width":"auto","height":"20px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-1872" style="width:auto;height:20px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/carousel --></div><div class="swiper-button-prev cozy-block-button-prev"></div><div class="swiper-button-next cozy-block-button-next"></div></div>
<!-- /wp:cozy-block/testimonial --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->