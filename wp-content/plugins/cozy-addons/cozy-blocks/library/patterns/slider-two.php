<?php
	/**
	 * Title: Slider section two with background image
	 * Description: This is slider section with background cover
	 * Slug: cozy-block-patterns/slider-two
	 * Categories: cozy-block-patterns, slider
	 * Premium: true
	 */

	$images = array(
		CT_ASSETS_URL . 'images/slider_2_1.jpg',
		CT_ASSETS_URL . 'images/slider_2_2.jpg',
		CT_ASSETS_URL . 'images/slider_2_3.jpg',
	);
	?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Slider', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"color":{"background":"#fffffe"}},"className":"cozy-block-pattern__slider-nav-bottom-right","layout":{"type":"constrained","contentSize":"100%"},"cozyCustomFont":"Public Sans"} -->
<div class="wp-block-group alignfull cozy-block-pattern__slider-nav-bottom-right has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cozy-block/slider {"blockClientId":"eea374d7-ffd2-46c5-aaef-dd892c29e407","hasPagination":false,"hoverShow":false,"navigation":{"iconSize":18,"iconBoxWidth":44,"iconBoxHeight":44,"borderRadius":50,"borderType":"solid","borderWidth":1,"borderColor":"#ffffff","borderColorHover":"#f49805","color":"#fffffe","colorHover":"#f49805","padding":{"top":5,"right":5,"bottom":5,"left":5,"responsive":"desktop"},"arrowIconNext":"\u003csvg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='0' class='svg-inline\u002d\u002dfa fa-0 ' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512'\u003e\u003cpath fill='currentColor' d='M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z'\u003e\u003c/path\u003e\u003c/svg\u003e","arrowIconPrev":"\u003csvg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='angle-left' class='svg-inline\u002d\u002dfa fa-angle-left ' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512'\u003e\u003cpath fill='currentColor' d='M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z'\u003e\u003c/path\u003e\u003c/svg\u003e"},"sliderOptions":{"loop":false,"speed":1500,"slidesPerView":1,"autoplay":{"status":true,"pauseOnMouseEnter":true,"delay":2500},"effect":"none"},"thumbMedia":["","",""]} -->
<div class="wp-block-cozy-block-slider"><div class="cozy-block-slider swiper-container  " id="cozyBlock_eea374d7_ffd2_46c5_aaef_dd892c29e407"><div class="swiper-wrapper"><!-- wp:cozy-block/slide {"blockClientId":"b0b109f0-c99b-4d19-a9eb-462f36d1dedb","className":"swiper-slide"} -->
<!-- wp:cover {"url":"<?php echo esc_url( $images[0] ); ?>","id":2051,"dimRatio":20,"customOverlayColor":"#372725","isUserOverlayColor":true,"minHeight":850,"contentPosition":"bottom center","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0px","right":"0px"}},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"typography":{"fontSize":"14px"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-center has-text-color has-link-color" style="color:#fffffe;padding-top:0;padding-right:0px;padding-bottom:0;padding-left:0px;font-size:14px;min-height:850px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-20 has-background-dim" style="background-color:#372725"></span><img class="wp-block-cover__image-background wp-image-2051" alt="" src="<?php echo esc_url( $images[0] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"right":"16px","left":"16px","top":"20px","bottom":"80px"}},"dimensions":{"minHeight":"650px"},"elements":{"link":{":hover":{"color":{"text":"#f49805"}}}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
<div class="wp-block-group" style="min-height:650px;margin-top:0;margin-bottom:0;padding-top:20px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"blockGap":"0px","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"493px","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"typography":{"fontSize":"90px","fontStyle":"normal","fontWeight":"700","lineHeight":"1.2"},"color":{"text":"#fffffe"}},"cozyCustomFont":"Figtree"} -->
<h2 class="wp-block-heading has-text-color has-link-color" style="color:#fffffe;font-size:90px;font-style:normal;font-weight:700;line-height:1.2"><?php esc_html_e( 'Night Challenging', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"6px"}}}} -->
<p style="margin-top:6px;font-style:normal;font-weight:500;text-transform:uppercase"><?php esc_html_e( 'With Dance', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"26px","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"272px","justifyContent":"right"}} -->
<div class="wp-block-group" style="margin-top:26px;margin-bottom:0"><!-- wp:paragraph {"align":"right","style":{"spacing":{"margin":{"bottom":"16px"}}}} -->
<p class="has-text-align-right" style="margin-bottom:16px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained","justifyContent":"right","contentSize":"44px"}} -->
<div class="wp-block-group"><!-- wp:cozy-block/icon-list {"blockClientId":"2a78c48b-d340-4248-b240-40b9cf8a4256","enableLogo":false,"containerStyles":{"width":42,"height":"","gap":0,"padding":{"top":0,"right":0,"bottom":0,"left":0},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":{"top":5,"right":5,"bottom":5,"left":5},"bgColor":"","bgColorHover":""},"typography":{"fontFamily":"","fontSize":14,"colorHover":"","fontWeight":400}} -->
<ul class="cozy-block-icon-list vertical default fill" id="cozyBlock_2a78c48b_d340_4248_b240_40b9cf8a4256"><!-- wp:cozy-block/list-item {"blockClientId":"59b35149-1295-494b-877b-d0aa0e6303e2","parentAttrs":{"enableLogo":false,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"left"},"title":"<?php esc_html_e( 'MORE', 'cozy-addons' ); ?>","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_59b35149_1295_494b_877b_d0aa0e6303e2"><p><?php esc_html_e( 'MORE', 'cozy-addons' ); ?></p></li></a></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:cozy-block/social-icon {"blockClientId":"b077a269-8554-4f51-b002-73daec9b7fe1","iconSize":12,"iconColorLayout":"custom","iconColor":"#ffffff","iconColorHover":"#fffffe","boxStyles":{"padding":{"top":10,"right":10,"bottom":10,"left":10},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColor":"#272121","bgColorHover":"#f49805"}} -->
<div class="cozy-block-social-icon stacked fill icon-color-custom" id="cozyBlock_b077a269_8554_4f51_b002_73daec9b7fe1"><!-- wp:cozy-block/social-icon-picker {"blockClientId":"770929d8-38bd-43c6-ac72-ec20cd8f2eaf","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#1877f2","bgDefaultColor":"#1877f2"} -->
<style>
		#cozyBlock_770929d8_38bd_43c6_ac72_ec20cd8f2eaf.stacked.icon-color-default {
		background: #1877f2;
		}
		#cozyBlock_770929d8_38bd_43c6_ac72_ec20cd8f2eaf.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_770929d8_38bd_43c6_ac72_ec20cd8f2eaf.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_770929d8_38bd_43c6_ac72_ec20cd8f2eaf.fill.icon-color-default svg {
		fill: #1877f2;
		}
		#cozyBlock_770929d8_38bd_43c6_ac72_ec20cd8f2eaf.outline.icon-color-default svg {
		stroke: #1877f2;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_770929d8_38bd_43c6_ac72_ec20cd8f2eaf"><svg viewBox="0 0 14 25" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12.5122 14.0625L13.2065 9.53809H8.86523V6.60205C8.86523 5.36426 9.47168 4.15771 11.416 4.15771H13.3896V0.305664C13.3896 0.305664 11.5986 0 9.88623 0C6.31104 0 3.97412 2.16699 3.97412 6.08984V9.53809H0V14.0625H3.97412V25H8.86523V14.0625H12.5122Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"dee098f9-7f15-490d-811c-0b670ed38cdd","iconViewBox":{"vx":0,"vy":0,"vw":24,"vh":24},"iconPath":"M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#000","bgDefaultColor":"#000"} -->
<style>
		#cozyBlock_dee098f9_7f15_490d_811c_0b670ed38cdd.stacked.icon-color-default {
		background: #000;
		}
		#cozyBlock_dee098f9_7f15_490d_811c_0b670ed38cdd.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_dee098f9_7f15_490d_811c_0b670ed38cdd.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_dee098f9_7f15_490d_811c_0b670ed38cdd.fill.icon-color-default svg {
		fill: #000;
		}
		#cozyBlock_dee098f9_7f15_490d_811c_0b670ed38cdd.outline.icon-color-default svg {
		stroke: #000;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_dee098f9_7f15_490d_811c_0b670ed38cdd"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"f187788a-58dc-4424-bd8d-75718a05167c","iconViewBox":{"vx":0,"vy":0,"vw":22,"vh":22},"iconPath":"M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)","bgDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)"} -->
<style>
		#cozyBlock_f187788a_58dc_4424_bd8d_75718a05167c.stacked.icon-color-default {
		background: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_f187788a_58dc_4424_bd8d_75718a05167c.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_f187788a_58dc_4424_bd8d_75718a05167c.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_f187788a_58dc_4424_bd8d_75718a05167c.fill.icon-color-default svg {
		fill: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_f187788a_58dc_4424_bd8d_75718a05167c.outline.icon-color-default svg {
		stroke: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_f187788a_58dc_4424_bd8d_75718a05167c"><svg viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker --></div>
<!-- /wp:cozy-block/social-icon --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
<!-- /wp:cozy-block/slide -->

<!-- wp:cozy-block/slide {"blockClientId":"8b2b0832-1718-4fd9-baed-751c90018260","className":"swiper-slide"} -->
<!-- wp:cover {"url":"<?php echo esc_url( $images[1] ); ?>","id":2059,"dimRatio":20,"customOverlayColor":"#372725","isUserOverlayColor":true,"minHeight":850,"contentPosition":"bottom center","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0px","right":"0px"}},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"typography":{"fontSize":"14px"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-center has-text-color has-link-color" style="color:#fffffe;padding-top:0;padding-right:0px;padding-bottom:0;padding-left:0px;font-size:14px;min-height:850px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-20 has-background-dim" style="background-color:#372725"></span><img class="wp-block-cover__image-background wp-image-2059" alt="" src="<?php echo esc_url( $images[1] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"right":"16px","left":"16px","top":"20px","bottom":"80px"}},"dimensions":{"minHeight":"650px"},"elements":{"link":{":hover":{"color":{"text":"#f49805"}}}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
<div class="wp-block-group" style="min-height:650px;margin-top:0;margin-bottom:0;padding-top:20px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"blockGap":"26px","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"493px","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"typography":{"fontSize":"90px","fontStyle":"normal","fontWeight":"700","lineHeight":"1.2"},"color":{"text":"#fffffe"}},"cozyCustomFont":"Figtree"} -->
<h2 class="wp-block-heading has-text-color has-link-color" style="color:#fffffe;font-size:90px;font-style:normal;font-weight:700;line-height:1.2">Move Step Smoothly</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"6px"}}}} -->
<p style="margin-top:6px;font-style:normal;font-weight:500;text-transform:uppercase"><?php esc_html_e( 'With Dance', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"272px","justifyContent":"right"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0"><!-- wp:paragraph {"align":"right","style":{"spacing":{"margin":{"bottom":"16px"}}}} -->
<p class="has-text-align-right" style="margin-bottom:16px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained","justifyContent":"right","contentSize":"44px"}} -->
<div class="wp-block-group"><!-- wp:cozy-block/icon-list {"blockClientId":"db677a98-1029-48a4-a47d-d41e1a758409","enableLogo":false,"containerStyles":{"width":42,"height":"","gap":0,"padding":{"top":0,"right":0,"bottom":0,"left":0},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":{"top":5,"right":5,"bottom":5,"left":5},"bgColor":"","bgColorHover":""},"typography":{"fontFamily":"","fontSize":14,"colorHover":"","fontWeight":400}} -->
<ul class="cozy-block-icon-list vertical default fill" id="cozyBlock_db677a98_1029_48a4_a47d_d41e1a758409"><!-- wp:cozy-block/list-item {"blockClientId":"b4cdf79c-0ea6-442d-a9d7-aa3d55873381","parentAttrs":{"enableLogo":false,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"left"},"title":"<?php esc_html_e( 'MORE', 'cozy-addons' ); ?>","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_b4cdf79c_0ea6_442d_a9d7_aa3d55873381"><p><?php esc_html_e( 'MORE', 'cozy-addons' ); ?></p></li></a></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:cozy-block/social-icon {"blockClientId":"0dbd5d97-db0f-4c6a-a9a6-5644e2bf9c72","iconSize":12,"iconColorLayout":"custom","iconColor":"#ffffff","iconColorHover":"#fffffe","boxStyles":{"padding":{"top":10,"right":10,"bottom":10,"left":10},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColor":"#272121","bgColorHover":"#f49805"}} -->
<div class="cozy-block-social-icon stacked fill icon-color-custom" id="cozyBlock_0dbd5d97_db0f_4c6a_a9a6_5644e2bf9c72"><!-- wp:cozy-block/social-icon-picker {"blockClientId":"163515f5-b4eb-4851-990b-715c0da0b4e5","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#1877f2","bgDefaultColor":"#1877f2"} -->
<style>
		#cozyBlock_163515f5_b4eb_4851_990b_715c0da0b4e5.stacked.icon-color-default {
		background: #1877f2;
		}
		#cozyBlock_163515f5_b4eb_4851_990b_715c0da0b4e5.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_163515f5_b4eb_4851_990b_715c0da0b4e5.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_163515f5_b4eb_4851_990b_715c0da0b4e5.fill.icon-color-default svg {
		fill: #1877f2;
		}
		#cozyBlock_163515f5_b4eb_4851_990b_715c0da0b4e5.outline.icon-color-default svg {
		stroke: #1877f2;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_163515f5_b4eb_4851_990b_715c0da0b4e5"><svg viewBox="0 0 14 25" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12.5122 14.0625L13.2065 9.53809H8.86523V6.60205C8.86523 5.36426 9.47168 4.15771 11.416 4.15771H13.3896V0.305664C13.3896 0.305664 11.5986 0 9.88623 0C6.31104 0 3.97412 2.16699 3.97412 6.08984V9.53809H0V14.0625H3.97412V25H8.86523V14.0625H12.5122Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"99780560-6e4c-4927-bb0b-1f4ee4099146","iconViewBox":{"vx":0,"vy":0,"vw":24,"vh":24},"iconPath":"M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#000","bgDefaultColor":"#000"} -->
<style>
		#cozyBlock_99780560_6e4c_4927_bb0b_1f4ee4099146.stacked.icon-color-default {
		background: #000;
		}
		#cozyBlock_99780560_6e4c_4927_bb0b_1f4ee4099146.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_99780560_6e4c_4927_bb0b_1f4ee4099146.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_99780560_6e4c_4927_bb0b_1f4ee4099146.fill.icon-color-default svg {
		fill: #000;
		}
		#cozyBlock_99780560_6e4c_4927_bb0b_1f4ee4099146.outline.icon-color-default svg {
		stroke: #000;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_99780560_6e4c_4927_bb0b_1f4ee4099146"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"ee3e4266-3b78-45e9-bfe8-8ee5f8b0ff92","iconViewBox":{"vx":0,"vy":0,"vw":22,"vh":22},"iconPath":"M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)","bgDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)"} -->
<style>
		#cozyBlock_ee3e4266_3b78_45e9_bfe8_8ee5f8b0ff92.stacked.icon-color-default {
		background: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_ee3e4266_3b78_45e9_bfe8_8ee5f8b0ff92.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_ee3e4266_3b78_45e9_bfe8_8ee5f8b0ff92.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_ee3e4266_3b78_45e9_bfe8_8ee5f8b0ff92.fill.icon-color-default svg {
		fill: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_ee3e4266_3b78_45e9_bfe8_8ee5f8b0ff92.outline.icon-color-default svg {
		stroke: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_ee3e4266_3b78_45e9_bfe8_8ee5f8b0ff92"><svg viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker --></div>
<!-- /wp:cozy-block/social-icon --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
<!-- /wp:cozy-block/slide -->

<!-- wp:cozy-block/slide {"blockClientId":"a19fcb1d-e685-4811-97e4-bf5470dc18e8","className":"swiper-slide"} -->
<!-- wp:cover {"url":"<?php echo esc_url( $images[2] ); ?>","id":2061,"dimRatio":20,"customOverlayColor":"#372725","isUserOverlayColor":true,"minHeight":850,"contentPosition":"bottom center","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0px","right":"0px"}},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"typography":{"fontSize":"14px"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-center has-text-color has-link-color" style="color:#fffffe;padding-top:0;padding-right:0px;padding-bottom:0;padding-left:0px;font-size:14px;min-height:850px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-20 has-background-dim" style="background-color:#372725"></span><img class="wp-block-cover__image-background wp-image-2061" alt="" src="<?php echo esc_url( $images[2] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"right":"16px","left":"16px","top":"20px","bottom":"80px"}},"dimensions":{"minHeight":"650px"},"elements":{"link":{":hover":{"color":{"text":"#f49805"}}}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
<div class="wp-block-group" style="min-height:650px;margin-top:0;margin-bottom:0;padding-top:20px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"blockGap":"0px","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"495px","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"typography":{"fontSize":"90px","fontStyle":"normal","fontWeight":"700","lineHeight":"1.2"},"color":{"text":"#fffffe"}},"cozyCustomFont":"Figtree"} -->
<h2 class="wp-block-heading has-text-color has-link-color" style="color:#fffffe;font-size:90px;font-style:normal;font-weight:700;line-height:1.2">Brilliant Every Steps</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"6px"}}}} -->
<p style="margin-top:6px;font-style:normal;font-weight:500;text-transform:uppercase"><?php esc_html_e( 'With Dance', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"26px","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"272px","justifyContent":"right"}} -->
<div class="wp-block-group" style="margin-top:26px;margin-bottom:0"><!-- wp:paragraph {"align":"right","style":{"spacing":{"margin":{"bottom":"16px"}}}} -->
<p class="has-text-align-right" style="margin-bottom:16px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained","justifyContent":"right","contentSize":"44px"}} -->
<div class="wp-block-group"><!-- wp:cozy-block/icon-list {"blockClientId":"1f63aed0-673e-4777-b26b-4f4b53919b78","enableLogo":false,"containerStyles":{"width":42,"height":"","gap":0,"padding":{"top":0,"right":0,"bottom":0,"left":0},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":{"top":5,"right":5,"bottom":5,"left":5},"bgColor":"","bgColorHover":""},"typography":{"fontFamily":"","fontSize":14,"colorHover":"","fontWeight":400}} -->
<ul class="cozy-block-icon-list vertical default fill" id="cozyBlock_1f63aed0_673e_4777_b26b_4f4b53919b78"><!-- wp:cozy-block/list-item {"blockClientId":"ba2a7dc9-98d9-4a9b-8cf1-cd72f9305fed","parentAttrs":{"enableLogo":false,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"left"},"title":"<?php esc_html_e( 'MORE', 'cozy-addons' ); ?>","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_ba2a7dc9_98d9_4a9b_8cf1_cd72f9305fed"><p><?php esc_html_e( 'MORE', 'cozy-addons' ); ?></p></li></a></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:cozy-block/social-icon {"blockClientId":"72b64acc-2fd6-4346-971c-0b326a2aeddc","iconSize":12,"iconColorLayout":"custom","iconColor":"#ffffff","iconColorHover":"#fffffe","boxStyles":{"padding":{"top":10,"right":10,"bottom":10,"left":10},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColor":"#272121","bgColorHover":"#f49805"}} -->
<div class="cozy-block-social-icon stacked fill icon-color-custom" id="cozyBlock_72b64acc_2fd6_4346_971c_0b326a2aeddc"><!-- wp:cozy-block/social-icon-picker {"blockClientId":"577a40d9-5326-443b-bfea-7d8445ce8006","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#1877f2","bgDefaultColor":"#1877f2"} -->
<style>
		#cozyBlock_577a40d9_5326_443b_bfea_7d8445ce8006.stacked.icon-color-default {
		background: #1877f2;
		}
		#cozyBlock_577a40d9_5326_443b_bfea_7d8445ce8006.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_577a40d9_5326_443b_bfea_7d8445ce8006.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_577a40d9_5326_443b_bfea_7d8445ce8006.fill.icon-color-default svg {
		fill: #1877f2;
		}
		#cozyBlock_577a40d9_5326_443b_bfea_7d8445ce8006.outline.icon-color-default svg {
		stroke: #1877f2;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_577a40d9_5326_443b_bfea_7d8445ce8006"><svg viewBox="0 0 14 25" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12.5122 14.0625L13.2065 9.53809H8.86523V6.60205C8.86523 5.36426 9.47168 4.15771 11.416 4.15771H13.3896V0.305664C13.3896 0.305664 11.5986 0 9.88623 0C6.31104 0 3.97412 2.16699 3.97412 6.08984V9.53809H0V14.0625H3.97412V25H8.86523V14.0625H12.5122Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"81d0f8e0-7575-415a-90b0-2e0aed882c25","iconViewBox":{"vx":0,"vy":0,"vw":24,"vh":24},"iconPath":"M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#000","bgDefaultColor":"#000"} -->
<style>
		#cozyBlock_81d0f8e0_7575_415a_90b0_2e0aed882c25.stacked.icon-color-default {
		background: #000;
		}
		#cozyBlock_81d0f8e0_7575_415a_90b0_2e0aed882c25.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_81d0f8e0_7575_415a_90b0_2e0aed882c25.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_81d0f8e0_7575_415a_90b0_2e0aed882c25.fill.icon-color-default svg {
		fill: #000;
		}
		#cozyBlock_81d0f8e0_7575_415a_90b0_2e0aed882c25.outline.icon-color-default svg {
		stroke: #000;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_81d0f8e0_7575_415a_90b0_2e0aed882c25"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"590a260f-0ee4-4fd9-bd58-8e5e9e96b431","iconViewBox":{"vx":0,"vy":0,"vw":22,"vh":22},"iconPath":"M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)","bgDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)"} -->
<style>
		#cozyBlock_590a260f_0ee4_4fd9_bd58_8e5e9e96b431.stacked.icon-color-default {
		background: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_590a260f_0ee4_4fd9_bd58_8e5e9e96b431.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_590a260f_0ee4_4fd9_bd58_8e5e9e96b431.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_590a260f_0ee4_4fd9_bd58_8e5e9e96b431.fill.icon-color-default svg {
		fill: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_590a260f_0ee4_4fd9_bd58_8e5e9e96b431.outline.icon-color-default svg {
		stroke: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_590a260f_0ee4_4fd9_bd58_8e5e9e96b431"><svg viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker --></div>
<!-- /wp:cozy-block/social-icon --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
<!-- /wp:cozy-block/slide --></div><div class="swiper-button-prev cozy-block-button-prev"></div><div class="swiper-button-next cozy-block-button-next"></div></div></div>
<!-- /wp:cozy-block/slider --></div>
<!-- /wp:group -->