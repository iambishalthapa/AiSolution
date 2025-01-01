<?php
	/**
	 * Title: Slider section three with vertical slider
	 * Description: This is slider section with vertical slider
	 * Slug: cozy-block-patterns/slider-three
	 * Categories: cozy-block-patterns, slider
	 * Premium: true
	 */

	$images = array(
		CT_ASSETS_URL . 'images/slider_3_1.jpg',
		CT_ASSETS_URL . 'images/slider_3_2.jpg',
		CT_ASSETS_URL . 'images/slider_3_3.jpg',
	);
	?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Slider', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"color":{"background":"#fffffe"}},"className":"cozy-block-pattern__slider-nav-bottom-right","layout":{"type":"constrained","contentSize":"100%"},"cozyCustomFont":"Public Sans"} -->
<div class="wp-block-group alignfull cozy-block-pattern__slider-nav-bottom-right has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cozy-block/slider {"blockClientId":"e4df6342-c03b-4eb7-8da6-3078b3ba8eab","direction":"vertical","height":850,"hasPagination":false,"hoverShow":false,"navigation":{"iconSize":18,"iconBoxWidth":44,"iconBoxHeight":44,"borderRadius":50,"borderType":"solid","borderWidth":1,"borderColor":"#ffffff","borderColorHover":"#f49805","color":"#fffffe","colorHover":"#f49805","padding":{"top":5,"right":5,"bottom":5,"left":5,"responsive":"desktop"},"arrowIconNext":"\u003csvg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='0' class='svg-inline\u002d\u002dfa fa-0 ' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512'\u003e\u003cpath fill='currentColor' d='M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z'\u003e\u003c/path\u003e\u003c/svg\u003e","arrowIconPrev":"\u003csvg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='angle-left' class='svg-inline\u002d\u002dfa fa-angle-left ' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512'\u003e\u003cpath fill='currentColor' d='M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z'\u003e\u003c/path\u003e\u003c/svg\u003e","iconRotate":90},"sliderOptions":{"loop":false,"speed":1500,"slidesPerView":1,"autoplay":{"status":true,"pauseOnMouseEnter":true,"delay":2500},"effect":"none"},"thumbMedia":["","",""]} -->
<div class="wp-block-cozy-block-slider"><div class="cozy-block-slider swiper-container  " id="cozyBlock_e4df6342_c03b_4eb7_8da6_3078b3ba8eab"><div class="swiper-wrapper"><!-- wp:cozy-block/slide {"blockClientId":"c9c4077f-ac3c-4fae-b39e-2e6cc22d0053","className":"swiper-slide"} -->
<!-- wp:cover {"url":"<?php echo esc_url( $images[0] ); ?>","id":2074,"dimRatio":20,"customOverlayColor":"#372725","isUserOverlayColor":true,"minHeight":850,"contentPosition":"center center","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0px","right":"0px"}},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"typography":{"fontSize":"14px"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-cover has-text-color has-link-color" style="color:#fffffe;padding-top:0;padding-right:0px;padding-bottom:0;padding-left:0px;font-size:14px;min-height:850px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-20 has-background-dim" style="background-color:#372725"></span><img class="wp-block-cover__image-background wp-image-2074" alt="" src="<?php echo esc_url( $images[0] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"0px","margin":{"top":"0px","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"493px","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"typography":{"fontSize":"90px","fontStyle":"normal","fontWeight":"700","lineHeight":"1.2","textTransform":"uppercase"},"color":{"text":"#fffffe"}},"cozyCustomFont":"Figtree"} -->
<h2 class="wp-block-heading has-text-color has-link-color" style="color:#fffffe;font-size:90px;font-style:normal;font-weight:700;line-height:1.2;text-transform:uppercase"><?php esc_html_e( 'Magical Vibes', 'cozy-addons' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"26px","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"272px","justifyContent":"right"}} -->
<div class="wp-block-group" style="margin-top:26px;margin-bottom:0"><!-- wp:paragraph {"align":"right","style":{"spacing":{"margin":{"bottom":"16px"}}}} -->
<p class="has-text-align-right" style="margin-bottom:16px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained","justifyContent":"right","contentSize":"44px"}} -->
<div class="wp-block-group"><!-- wp:cozy-block/icon-list {"blockClientId":"5f825a67-9e04-45b3-a2d9-2c6ead0e5e38","enableLogo":false,"containerStyles":{"width":42,"height":"","gap":0,"padding":{"top":0,"right":0,"bottom":0,"left":0},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":{"top":5,"right":5,"bottom":5,"left":5},"bgColor":"","bgColorHover":""},"typography":{"fontFamily":"","fontSize":14,"colorHover":"","fontWeight":400}} -->
<ul class="cozy-block-icon-list vertical default fill" id="cozyBlock_5f825a67_9e04_45b3_a2d9_2c6ead0e5e38"><!-- wp:cozy-block/list-item {"blockClientId":"68cc1b9e-2196-4748-a3b5-2eea38f40873","parentAttrs":{"enableLogo":false,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"left"},"title":"<?php esc_html_e( 'MORE', 'cozy-addons' ); ?>","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_68cc1b9e_2196_4748_a3b5_2eea38f40873"><p><?php esc_html_e( 'MORE', 'cozy-addons' ); ?></p></li></a></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
<!-- /wp:cozy-block/slide -->

<!-- wp:cozy-block/slide {"blockClientId":"db8369be-4eac-4ee1-87ca-67fdc709801b","className":"swiper-slide"} -->
<!-- wp:cover {"url":"<?php echo esc_url( $images[1] ); ?>","id":2076,"dimRatio":20,"customOverlayColor":"#372725","isUserOverlayColor":true,"minHeight":850,"contentPosition":"center center","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0px","right":"0px"}},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"typography":{"fontSize":"14px"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-cover has-text-color has-link-color" style="color:#fffffe;padding-top:0;padding-right:0px;padding-bottom:0;padding-left:0px;font-size:14px;min-height:850px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-20 has-background-dim" style="background-color:#372725"></span><img class="wp-block-cover__image-background wp-image-2076" alt="" src="<?php echo esc_url( $images[1] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"26px","margin":{"top":"0px","bottom":"0"}}},"layout":{"type":"constrained","justifyContent":"right"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"410px","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"left","style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"typography":{"fontSize":"90px","fontStyle":"normal","fontWeight":"700","lineHeight":"1.2","textTransform":"uppercase"},"color":{"text":"#fffffe"}},"cozyCustomFont":"Figtree"} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color" style="color:#fffffe;font-size:90px;font-style:normal;font-weight:700;line-height:1.2;text-transform:uppercase"><?php esc_html_e( 'Magical Vibes', 'cozy-addons' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"6px","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"400px","justifyContent":"right"}} -->
<div class="wp-block-group" style="margin-top:6px;margin-bottom:0"><!-- wp:paragraph {"align":"left","style":{"spacing":{"margin":{"bottom":"16px"}}}} -->
<p class="has-text-align-left" style="margin-bottom:16px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained","justifyContent":"left","contentSize":"44px"}} -->
<div class="wp-block-group"><!-- wp:cozy-block/icon-list {"blockClientId":"04534ef9-5986-40f7-b385-3b61a3537654","enableLogo":false,"containerStyles":{"width":42,"height":"","gap":0,"padding":{"top":0,"right":0,"bottom":0,"left":0},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":{"top":5,"right":5,"bottom":5,"left":5},"bgColor":"","bgColorHover":""},"typography":{"fontFamily":"","fontSize":14,"colorHover":"","fontWeight":400}} -->
<ul class="cozy-block-icon-list vertical default fill" id="cozyBlock_04534ef9_5986_40f7_b385_3b61a3537654"><!-- wp:cozy-block/list-item {"blockClientId":"d93b0929-31d6-4760-b8cd-c479a3ad7037","parentAttrs":{"enableLogo":false,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"left"},"title":"<?php esc_html_e( 'MORE', 'cozy-addons' ); ?>","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_d93b0929_31d6_4760_b8cd_c479a3ad7037"><p><?php esc_html_e( 'MORE', 'cozy-addons' ); ?></p></li></a></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
<!-- /wp:cozy-block/slide -->

<!-- wp:cozy-block/slide {"blockClientId":"bfdf8a11-26e3-413e-a36f-f992a7e1b3a4","className":"swiper-slide"} -->
<!-- wp:cover {"url":"<?php echo esc_url( $images[2] ); ?>","id":2077,"dimRatio":20,"customOverlayColor":"#372725","isUserOverlayColor":true,"minHeight":850,"contentPosition":"center center","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0px","right":"0px"}},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"typography":{"fontSize":"14px"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-cover has-text-color has-link-color" style="color:#fffffe;padding-top:0;padding-right:0px;padding-bottom:0;padding-left:0px;font-size:14px;min-height:850px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-20 has-background-dim" style="background-color:#372725"></span><img class="wp-block-cover__image-background wp-image-2077" alt="" src="<?php echo esc_url( $images[2] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"26px","margin":{"top":"0px","bottom":"0"}}},"layout":{"type":"constrained","justifyContent":"right"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"484px","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"left","style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"typography":{"fontSize":"90px","fontStyle":"normal","fontWeight":"700","lineHeight":"1.2","textTransform":"uppercase"},"color":{"text":"#fffffe"}},"cozyCustomFont":"Figtree"} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color" style="color:#fffffe;font-size:90px;font-style:normal;font-weight:700;line-height:1.2;text-transform:uppercase"><?php esc_html_e( 'Heart Touching', 'cozy-addons' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"6px","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"330px","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:6px;margin-bottom:0"><!-- wp:paragraph {"align":"left","style":{"spacing":{"margin":{"bottom":"16px"}}}} -->
<p class="has-text-align-left" style="margin-bottom:16px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained","justifyContent":"left","contentSize":"44px"}} -->
<div class="wp-block-group"><!-- wp:cozy-block/icon-list {"blockClientId":"e4a0e333-e590-4f9d-8492-f0a5f9bd431b","enableLogo":false,"containerStyles":{"width":42,"height":"","gap":0,"padding":{"top":0,"right":0,"bottom":0,"left":0},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":{"top":5,"right":5,"bottom":5,"left":5},"bgColor":"","bgColorHover":""},"typography":{"fontFamily":"","fontSize":14,"colorHover":"","fontWeight":400}} -->
<ul class="cozy-block-icon-list vertical default fill" id="cozyBlock_e4a0e333_e590_4f9d_8492_f0a5f9bd431b"><!-- wp:cozy-block/list-item {"blockClientId":"a966f8fb-8a8f-4a7c-87b9-0db5b09c8b02","parentAttrs":{"enableLogo":false,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"left"},"title":"<?php esc_html_e( 'MORE', 'cozy-addons' ); ?>","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_a966f8fb_8a8f_4a7c_87b9_0db5b09c8b02"><p><?php esc_html_e( 'MORE', 'cozy-addons' ); ?></p></li></a></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
<!-- /wp:cozy-block/slide --></div><div class="swiper-button-prev cozy-block-button-prev"></div><div class="swiper-button-next cozy-block-button-next"></div></div></div>
<!-- /wp:cozy-block/slider --></div>
<!-- /wp:group -->