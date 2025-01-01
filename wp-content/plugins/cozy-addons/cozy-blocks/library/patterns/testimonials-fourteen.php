<?php
	/**
	 * Title: Testimonials section fourteen with carousel
	 * Description: This is testimonials section with carousel
	 * Slug: cozy-block-patterns/testimonials-fourteen
	 * Categories: cozy-block-patterns, testimonials
	 * Premium: true
	 */

	$images = array(
		CT_ASSETS_URL . 'images/testimonial_3_1.png',
		CT_ASSETS_URL . 'images/testimonial_1_1.png',
		CT_ASSETS_URL . 'images/testimonial_1_2.png',
	);
	?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Testimonials', 'cozy-addons' ); ?>"},"align":"full","style":{"color":{"gradient":"linear-gradient(135deg,rgb(8,35,175) 0%,rgb(55,128,245) 100%)"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-background" style="background:linear-gradient(135deg,rgb(8,35,175) 0%,rgb(55,128,245) 100%);margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"80px","bottom":"100px","left":"16px","right":"16px"}},"typography":{"fontSize":"14px"},"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}}},"layout":{"type":"constrained","contentSize":"1180px"},"cozyCustomFont":"Public Sans"} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#646464;padding-top:80px;padding-right:16px;padding-bottom:100px;padding-left:16px;font-size:14px"><!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"36px"}},"color":{"text":"#ebebeb"},"elements":{"link":{"color":{"text":"#ebebeb"}}}},"layout":{"type":"constrained","contentSize":"603px"}} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#ebebeb;margin-top:0;margin-bottom:36px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"34px","fontStyle":"normal","fontWeight":"600","lineHeight":"1.2"},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"}},"cozyCustomFont":"Poppins","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":600}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#fffffe;font-size:34px;font-style:normal;font-weight:600;line-height:1.2"><?php esc_html_e( 'Testimonials', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"4px"}}}} -->
<p class="has-text-align-center" style="margin-top:4px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:cozy-block/testimonial {"blockClientId":"7bbea91a-29db-4a3c-9029-e9dcc1ec1c91","carouselOptions":{"pagination":{"enabled":true,"width":10,"height":10,"borderRadius":10,"activeWidth":10,"activeBorderRadius":10,"activeColor":"#f49805","color":"#fffffe","activeColorHover":"#164861","colorHover":"#a5a5a5","positionVertical":-36},"navigation":{"enabled":false,"iconSize":15,"iconBoxWidth":35,"iconBoxHeight":35,"borderRadius":50,"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","backgroundColor":"#fff","color":"#007cba","backgroundColorHover":"#007cba","colorHover":"#fff","padding":{"top":5,"right":5,"bottom":5,"left":5}},"sliderOptions":{"loop":false,"autoplay":{"enabled":true,"pauseOnMouseEnter":true,"delay":2500},"centeredSlides":false,"slidesPerView":"3","spaceBetween":0,"speed":"1500"}}} -->
<div class="cozy-block-testimonial display-carousel   swiper-container hover-show" id="cozyBlock_7bbea91a_29db_4a3c_9029_e9dcc1ec1c91"><div class="cozy-block-carousel-wrapper swiper-wrapper"><!-- wp:cozy-block/carousel -->
<div class="cozy-block-carousel swiper-slide"><!-- wp:group {"style":{"spacing":{"padding":{"left":"26px","right":"26px"},"margin":{"top":"16px","bottom":"16px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:16px;margin-bottom:16px;padding-right:26px;padding-left:26px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"26px","bottom":"26px","left":"26px","right":"26px"},"blockGap":"0","margin":{"top":"0px","bottom":"0px"}},"color":{"background":"#fffffe"}},"layout":{"type":"constrained","contentSize":"327px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#4f5574","horizontal":0,"vertical":4,"blur":26,"spread":-7,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}}} -->
<div class="wp-block-group has-background" style="background-color:#fffffe;margin-top:0px;margin-bottom:0px;padding-top:26px;padding-right:26px;padding-bottom:26px;padding-left:26px"><!-- wp:image {"id":1872,"width":"auto","height":"16px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-1872" style="width:auto;height:16px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"left","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"spacing":{"margin":{"bottom":"16px","top":"8px"}}}} -->
<p class="has-text-align-left" style="margin-top:8px;margin-bottom:16px"><?php esc_html_e( 'I had an unexpectedly successful holiday. The choice of hotel was very good, being one that offers everything you need for a pleasant holiday. The staff was very receptive, kind and attentive. The food was great for everyone. Transport to the most important points of interest was free of charge. Thank you Neve Agency for a wonderful holiday.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":4,"placeholder":"George Mathew","style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"600","lineHeight":"1.2"},"spacing":{"margin":{"bottom":"14px"}}},"cozyCustomFont":"Poppins"} -->
<h4 class="wp-block-heading has-text-align-center" style="margin-bottom:14px;font-size:18px;font-style:normal;font-weight:600;line-height:1.2"><?php esc_html_e( 'Angelina', 'cozy-addons' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:image {"id":1224,"width":"70px","height":"70px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-1224" style="border-radius:50px;object-fit:cover;width:70px;height:70px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/carousel -->

<!-- wp:cozy-block/carousel -->
<div class="cozy-block-carousel swiper-slide"><!-- wp:group {"style":{"spacing":{"padding":{"left":"26px","right":"26px"},"margin":{"top":"16px","bottom":"16px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:16px;margin-bottom:16px;padding-right:26px;padding-left:26px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"26px","bottom":"26px","left":"26px","right":"26px"},"blockGap":"0","margin":{"top":"0px","bottom":"0px"}},"color":{"background":"#fffffe"}},"layout":{"type":"constrained","contentSize":"327px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#4f5574","horizontal":0,"vertical":4,"blur":26,"spread":-7,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}}} -->
<div class="wp-block-group has-background" style="background-color:#fffffe;margin-top:0px;margin-bottom:0px;padding-top:26px;padding-right:26px;padding-bottom:26px;padding-left:26px"><!-- wp:image {"id":1872,"width":"auto","height":"16px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-1872" style="width:auto;height:16px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"left","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"spacing":{"margin":{"bottom":"16px","top":"8px"}}}} -->
<p class="has-text-align-left" style="margin-top:8px;margin-bottom:16px"><?php esc_html_e( 'I had an unexpectedly successful holiday. The choice of hotel was very good, being one that offers everything you need for a pleasant holiday. The staff was very receptive, kind and attentive. The food was great for everyone. Transport to the most important points of interest was free of charge. Thank you Neve Agency for a wonderful holiday.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":4,"placeholder":"George Mathew","style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"600","lineHeight":"1.2"},"spacing":{"margin":{"bottom":"14px"}}},"cozyCustomFont":"Poppins"} -->
<h4 class="wp-block-heading has-text-align-center" style="margin-bottom:14px;font-size:18px;font-style:normal;font-weight:600;line-height:1.2"><?php esc_html_e( 'Richard', 'cozy-addons' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:image {"id":1224,"width":"70px","height":"70px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-1224" style="border-radius:50px;object-fit:cover;width:70px;height:70px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/carousel -->

<!-- wp:cozy-block/carousel -->
<div class="cozy-block-carousel swiper-slide"><!-- wp:group {"style":{"spacing":{"padding":{"left":"26px","right":"26px"},"margin":{"top":"16px","bottom":"16px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:16px;margin-bottom:16px;padding-right:26px;padding-left:26px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"26px","bottom":"26px","left":"26px","right":"26px"},"blockGap":"0","margin":{"top":"0px","bottom":"0px"}},"color":{"background":"#fffffe"}},"layout":{"type":"constrained","contentSize":"327px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#4f5574","horizontal":0,"vertical":4,"blur":26,"spread":-7,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}}} -->
<div class="wp-block-group has-background" style="background-color:#fffffe;margin-top:0px;margin-bottom:0px;padding-top:26px;padding-right:26px;padding-bottom:26px;padding-left:26px"><!-- wp:image {"id":1872,"width":"auto","height":"16px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-1872" style="width:auto;height:16px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"left","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"spacing":{"margin":{"bottom":"16px","top":"8px"}}}} -->
<p class="has-text-align-left" style="margin-top:8px;margin-bottom:16px"><?php esc_html_e( 'I had an unexpectedly successful holiday. The choice of hotel was very good, being one that offers everything you need for a pleasant holiday. The staff was very receptive, kind and attentive. The food was great for everyone. Transport to the most important points of interest was free of charge. Thank you Neve Agency for a wonderful holiday.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":4,"placeholder":"George Mathew","style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"600","lineHeight":"1.2"},"spacing":{"margin":{"bottom":"14px"}}},"cozyCustomFont":"Poppins"} -->
<h4 class="wp-block-heading has-text-align-center" style="margin-bottom:14px;font-size:18px;font-style:normal;font-weight:600;line-height:1.2"><?php esc_html_e( 'Angelina', 'cozy-addons' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:image {"id":1224,"width":"70px","height":"70px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-1224" style="border-radius:50px;object-fit:cover;width:70px;height:70px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/carousel -->

<!-- wp:cozy-block/carousel -->
<div class="cozy-block-carousel swiper-slide"><!-- wp:group {"style":{"spacing":{"padding":{"left":"26px","right":"26px"},"margin":{"top":"16px","bottom":"16px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:16px;margin-bottom:16px;padding-right:26px;padding-left:26px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"26px","bottom":"26px","left":"26px","right":"26px"},"blockGap":"0","margin":{"top":"0px","bottom":"0px"}},"color":{"background":"#fffffe"}},"layout":{"type":"constrained","contentSize":"327px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#4f5574","horizontal":0,"vertical":4,"blur":26,"spread":-7,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}}} -->
<div class="wp-block-group has-background" style="background-color:#fffffe;margin-top:0px;margin-bottom:0px;padding-top:26px;padding-right:26px;padding-bottom:26px;padding-left:26px"><!-- wp:image {"id":1872,"width":"auto","height":"16px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-1872" style="width:auto;height:16px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"left","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"spacing":{"margin":{"bottom":"16px","top":"8px"}}}} -->
<p class="has-text-align-left" style="margin-top:8px;margin-bottom:16px"><?php esc_html_e( 'I had an unexpectedly successful holiday. The choice of hotel was very good, being one that offers everything you need for a pleasant holiday. The staff was very receptive, kind and attentive. The food was great for everyone. Transport to the most important points of interest was free of charge. Thank you Neve Agency for a wonderful holiday.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":4,"placeholder":"George Mathew","style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"600","lineHeight":"1.2"},"spacing":{"margin":{"bottom":"14px"}}},"cozyCustomFont":"Poppins"} -->
<h4 class="wp-block-heading has-text-align-center" style="margin-bottom:14px;font-size:18px;font-style:normal;font-weight:600;line-height:1.2"><?php esc_html_e( 'Richard', 'cozy-addons' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:image {"id":1224,"width":"70px","height":"70px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-1224" style="border-radius:50px;object-fit:cover;width:70px;height:70px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/carousel --></div><div class="swiper-pagination cozy-pagination"></div></div>
<!-- /wp:cozy-block/testimonial --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->