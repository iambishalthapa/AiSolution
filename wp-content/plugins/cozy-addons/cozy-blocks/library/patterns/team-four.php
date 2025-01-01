<?php
/**
 * Title: Team section four with carousel
 * Description: This is team section with carousel
 * Slug: cozy-block-patterns/team-four
 * Categories: cozy-block-patterns, teams
 * Premium: true
 */

$images = array(
	CT_ASSETS_URL . 'images/team_4.png',
	CT_ASSETS_URL . 'images/team_4_1.png',
	CT_ASSETS_URL . 'images/team_4_2.png',
	CT_ASSETS_URL . 'images/team_4_3.png',
	CT_ASSETS_URL . 'images/team_4_4.png',
);
?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Teams', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"color":{"background":"#024469"},"background":{"backgroundImage":{"url":"<?php echo esc_url( $images[0] ); ?>","id":1853,"source":"file","title":"team_4"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#024469;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"right":"16px","left":"16px","top":"80px","bottom":"100px"}},"color":{"text":"#ebebeb"},"elements":{"link":{"color":{"text":"#ebebeb"}}},"typography":{"fontSize":"14px"}},"layout":{"type":"constrained","contentSize":"1180px"},"cozyCustomFont":"Public Sans"} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#ebebeb;margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:100px;padding-left:16px;font-size:14px"><!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"bottom":"36px"}}},"layout":{"type":"constrained","contentSize":"586px"}} -->
<div class="wp-block-group" style="margin-bottom:36px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"44px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"}},"cozyCustomFont":"Inter","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":600}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#fffffe;font-size:44px;font-style:normal;font-weight:600"><?php esc_html_e( 'Meet Our Expert Doctors', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:cozy-block/teams {"blockClientId":"49892963-1405-49ee-99fe-4e8e8c02a456","layout":"carousel","carouselOptions":{"pagination":{"enabled":true,"width":10,"height":10,"borderRadius":10,"activeWidth":10,"activeBorderRadius":10,"activeColor":"#f49805","color":"#fffffe","activeColorHover":"#164861","colorHover":"#a5a5a5","positionVertical":-34},"navigation":{"enabled":false,"iconSize":15,"iconBoxWidth":35,"iconBoxHeight":35,"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"backgroundColor":"#fff","color":"#007cba","backgroundColorHover":"#007cba","colorHover":"#fff","padding":{"top":5,"right":5,"bottom":5,"left":5}},"sliderOptions":{"loop":false,"speed":"1500","autoplay":{"enabled":true,"pauseOnMouseEnter":true,"delay":2500},"centeredSlides":false,"slidesPerView":"4","spaceBetween":30}}} -->
<div class="cozy-block-teams display-carousel  swiper-container hover-show" id="cozyBlock_49892963_1405_49ee_99fe_4e8e8c02a456"><div class="cozy-block-carousel-wrapper swiper-wrapper"><!-- wp:cozy-block/carousel -->
<div class="cozy-block-carousel swiper-slide"><!-- wp:group {"style":{"color":{"background":"#fffffe","text":"#646464"},"border":{"radius":"20px"},"spacing":{"padding":{"top":"36px","bottom":"36px","left":"16px","right":"16px"},"blockGap":"0"},"elements":{"link":{"color":{"text":"#646464"}}}},"layout":{"type":"constrained","contentSize":"222px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#204c51","horizontal":0,"vertical":4,"blur":40,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}}} -->
<div class="wp-block-group has-text-color has-background has-link-color" style="border-radius:20px;color:#646464;background-color:#fffffe;padding-top:36px;padding-right:16px;padding-bottom:36px;padding-left:16px"><!-- wp:group {"layout":{"type":"constrained","contentSize":"100px"}} -->
<div class="wp-block-group"><!-- wp:image {"id":1854,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-1854"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","level":4,"placeholder":"John Carter","style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#161e1f"},"elements":{"link":{"color":{"text":"#161e1f"}}},"spacing":{"margin":{"top":"6px"}}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#161e1f;margin-top:6px;font-size:20px;font-style:normal;font-weight:500"><?php esc_html_e( 'Dr. Benjamin', 'cozy-addons' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"typography":{"fontSize":"12px"}}} -->
<p class="has-text-align-center" style="font-size:12px"><?php esc_html_e( 'Neurology Doctor', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"spacing":{"margin":{"top":"6px","bottom":"26px"}}}} -->
<p class="has-text-align-center" style="margin-top:6px;margin-bottom:26px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, vet elit at consectetur', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"110px"}} -->
<div class="wp-block-group"><!-- wp:cozy-block/social-icon {"blockClientId":"5581b609-8d2d-43cd-8c20-a5b480e26889","iconSize":12,"iconColorLayout":"custom","iconColorHover":"#fffffe","gap":6,"boxStyles":{"padding":{"top":8,"right":8,"bottom":8,"left":8},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColor":"#00c6e1","bgColorHover":"#f49805"}} -->
<div class="cozy-block-social-icon stacked fill icon-color-custom" id="cozyBlock_5581b609_8d2d_43cd_8c20_a5b480e26889"><!-- wp:cozy-block/social-icon-picker {"blockClientId":"ce413d8b-6ec7-4a73-b5c1-08916e38a1ff","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#1877f2","bgDefaultColor":"#1877f2"} -->
<style>
		#cozyBlock_ce413d8b_6ec7_4a73_b5c1_08916e38a1ff.stacked.icon-color-default {
		background: #1877f2;
		}
		#cozyBlock_ce413d8b_6ec7_4a73_b5c1_08916e38a1ff.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_ce413d8b_6ec7_4a73_b5c1_08916e38a1ff.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_ce413d8b_6ec7_4a73_b5c1_08916e38a1ff.fill.icon-color-default svg {
		fill: #1877f2;
		}
		#cozyBlock_ce413d8b_6ec7_4a73_b5c1_08916e38a1ff.outline.icon-color-default svg {
		stroke: #1877f2;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_ce413d8b_6ec7_4a73_b5c1_08916e38a1ff"><svg viewBox="0 0 14 25" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12.5122 14.0625L13.2065 9.53809H8.86523V6.60205C8.86523 5.36426 9.47168 4.15771 11.416 4.15771H13.3896V0.305664C13.3896 0.305664 11.5986 0 9.88623 0C6.31104 0 3.97412 2.16699 3.97412 6.08984V9.53809H0V14.0625H3.97412V25H8.86523V14.0625H12.5122Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"10328406-9ea9-44d4-b384-bb4d429c0fce","iconViewBox":{"vx":0,"vy":0,"vw":24,"vh":24},"iconPath":"M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#000","bgDefaultColor":"#000"} -->
<style>
		#cozyBlock_10328406_9ea9_44d4_b384_bb4d429c0fce.stacked.icon-color-default {
		background: #000;
		}
		#cozyBlock_10328406_9ea9_44d4_b384_bb4d429c0fce.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_10328406_9ea9_44d4_b384_bb4d429c0fce.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_10328406_9ea9_44d4_b384_bb4d429c0fce.fill.icon-color-default svg {
		fill: #000;
		}
		#cozyBlock_10328406_9ea9_44d4_b384_bb4d429c0fce.outline.icon-color-default svg {
		stroke: #000;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_10328406_9ea9_44d4_b384_bb4d429c0fce"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"c92f9dcb-99c8-496f-a456-275abdab2770","iconViewBox":{"vx":0,"vy":0,"vw":22,"vh":22},"iconPath":"M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)","bgDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)"} -->
<style>
		#cozyBlock_c92f9dcb_99c8_496f_a456_275abdab2770.stacked.icon-color-default {
		background: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_c92f9dcb_99c8_496f_a456_275abdab2770.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_c92f9dcb_99c8_496f_a456_275abdab2770.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_c92f9dcb_99c8_496f_a456_275abdab2770.fill.icon-color-default svg {
		fill: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_c92f9dcb_99c8_496f_a456_275abdab2770.outline.icon-color-default svg {
		stroke: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_c92f9dcb_99c8_496f_a456_275abdab2770"><svg viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker --></div>
<!-- /wp:cozy-block/social-icon --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/carousel -->

<!-- wp:cozy-block/carousel -->
<div class="cozy-block-carousel swiper-slide"><!-- wp:group {"style":{"color":{"background":"#fffffe","text":"#646464"},"border":{"radius":"20px"},"spacing":{"padding":{"top":"36px","bottom":"36px","left":"16px","right":"16px"},"blockGap":"0"},"elements":{"link":{"color":{"text":"#646464"}}}},"layout":{"type":"constrained","contentSize":"222px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#204c51","horizontal":0,"vertical":4,"blur":40,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}}} -->
<div class="wp-block-group has-text-color has-background has-link-color" style="border-radius:20px;color:#646464;background-color:#fffffe;padding-top:36px;padding-right:16px;padding-bottom:36px;padding-left:16px"><!-- wp:group {"layout":{"type":"constrained","contentSize":"100px"}} -->
<div class="wp-block-group"><!-- wp:image {"id":1860,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-1860"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","level":4,"placeholder":"John Carter","style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#161e1f"},"elements":{"link":{"color":{"text":"#161e1f"}}},"spacing":{"margin":{"top":"6px"}}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#161e1f;margin-top:6px;font-size:20px;font-style:normal;font-weight:500"><?php esc_html_e( 'Sister Curry', 'cozy-addons' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"typography":{"fontSize":"12px"}}} -->
<p class="has-text-align-center" style="font-size:12px"><?php esc_html_e( 'Neurology Doctor', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"spacing":{"margin":{"top":"6px","bottom":"26px"}}}} -->
<p class="has-text-align-center" style="margin-top:6px;margin-bottom:26px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, vet elit at consectetur', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"110px"}} -->
<div class="wp-block-group"><!-- wp:cozy-block/social-icon {"blockClientId":"62e995a6-bef1-4dfa-85e3-ea0ebffe1296","iconSize":12,"iconColorLayout":"custom","iconColorHover":"#fffffe","gap":6,"boxStyles":{"padding":{"top":8,"right":8,"bottom":8,"left":8},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColor":"#00c6e1","bgColorHover":"#f49805"}} -->
<div class="cozy-block-social-icon stacked fill icon-color-custom" id="cozyBlock_62e995a6_bef1_4dfa_85e3_ea0ebffe1296"><!-- wp:cozy-block/social-icon-picker {"blockClientId":"ffb620e5-eaf1-4084-82fe-c9cfdf47d064","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#1877f2","bgDefaultColor":"#1877f2"} -->
<style>
		#cozyBlock_ffb620e5_eaf1_4084_82fe_c9cfdf47d064.stacked.icon-color-default {
		background: #1877f2;
		}
		#cozyBlock_ffb620e5_eaf1_4084_82fe_c9cfdf47d064.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_ffb620e5_eaf1_4084_82fe_c9cfdf47d064.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_ffb620e5_eaf1_4084_82fe_c9cfdf47d064.fill.icon-color-default svg {
		fill: #1877f2;
		}
		#cozyBlock_ffb620e5_eaf1_4084_82fe_c9cfdf47d064.outline.icon-color-default svg {
		stroke: #1877f2;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_ffb620e5_eaf1_4084_82fe_c9cfdf47d064"><svg viewBox="0 0 14 25" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12.5122 14.0625L13.2065 9.53809H8.86523V6.60205C8.86523 5.36426 9.47168 4.15771 11.416 4.15771H13.3896V0.305664C13.3896 0.305664 11.5986 0 9.88623 0C6.31104 0 3.97412 2.16699 3.97412 6.08984V9.53809H0V14.0625H3.97412V25H8.86523V14.0625H12.5122Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"13ebc5c2-efae-499d-89a4-cd32e484fb73","iconViewBox":{"vx":0,"vy":0,"vw":24,"vh":24},"iconPath":"M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#000","bgDefaultColor":"#000"} -->
<style>
		#cozyBlock_13ebc5c2_efae_499d_89a4_cd32e484fb73.stacked.icon-color-default {
		background: #000;
		}
		#cozyBlock_13ebc5c2_efae_499d_89a4_cd32e484fb73.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_13ebc5c2_efae_499d_89a4_cd32e484fb73.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_13ebc5c2_efae_499d_89a4_cd32e484fb73.fill.icon-color-default svg {
		fill: #000;
		}
		#cozyBlock_13ebc5c2_efae_499d_89a4_cd32e484fb73.outline.icon-color-default svg {
		stroke: #000;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_13ebc5c2_efae_499d_89a4_cd32e484fb73"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"d6c411ba-0247-4cda-8204-ec7a2db7dcb5","iconViewBox":{"vx":0,"vy":0,"vw":22,"vh":22},"iconPath":"M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)","bgDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)"} -->
<style>
		#cozyBlock_d6c411ba_0247_4cda_8204_ec7a2db7dcb5.stacked.icon-color-default {
		background: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_d6c411ba_0247_4cda_8204_ec7a2db7dcb5.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_d6c411ba_0247_4cda_8204_ec7a2db7dcb5.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_d6c411ba_0247_4cda_8204_ec7a2db7dcb5.fill.icon-color-default svg {
		fill: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_d6c411ba_0247_4cda_8204_ec7a2db7dcb5.outline.icon-color-default svg {
		stroke: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_d6c411ba_0247_4cda_8204_ec7a2db7dcb5"><svg viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker --></div>
<!-- /wp:cozy-block/social-icon --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/carousel -->

<!-- wp:cozy-block/carousel -->
<div class="cozy-block-carousel swiper-slide"><!-- wp:group {"style":{"color":{"background":"#fffffe","text":"#646464"},"border":{"radius":"20px"},"spacing":{"padding":{"top":"36px","bottom":"36px","left":"16px","right":"16px"},"blockGap":"0"},"elements":{"link":{"color":{"text":"#646464"}}}},"layout":{"type":"constrained","contentSize":"222px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#204c51","horizontal":0,"vertical":4,"blur":40,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}}} -->
<div class="wp-block-group has-text-color has-background has-link-color" style="border-radius:20px;color:#646464;background-color:#fffffe;padding-top:36px;padding-right:16px;padding-bottom:36px;padding-left:16px"><!-- wp:group {"layout":{"type":"constrained","contentSize":"100px"}} -->
<div class="wp-block-group"><!-- wp:image {"id":1862,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( $images[3] ); ?>" alt="" class="wp-image-1862"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","level":4,"placeholder":"John Carter","style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#161e1f"},"elements":{"link":{"color":{"text":"#161e1f"}}},"spacing":{"margin":{"top":"6px"}}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#161e1f;margin-top:6px;font-size:20px;font-style:normal;font-weight:500"><?php esc_html_e( 'Dr. Smith', 'cozy-addons' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"typography":{"fontSize":"12px"}}} -->
<p class="has-text-align-center" style="font-size:12px"><?php esc_html_e( 'Neurology Doctor', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"spacing":{"margin":{"top":"6px","bottom":"26px"}}}} -->
<p class="has-text-align-center" style="margin-top:6px;margin-bottom:26px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, vet elit at consectetur', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"110px"}} -->
<div class="wp-block-group"><!-- wp:cozy-block/social-icon {"blockClientId":"26fab0e2-0831-44f3-9ac1-514ada41a9e3","iconSize":12,"iconColorLayout":"custom","iconColorHover":"#fffffe","gap":6,"boxStyles":{"padding":{"top":8,"right":8,"bottom":8,"left":8},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColor":"#00c6e1","bgColorHover":"#f49805"}} -->
<div class="cozy-block-social-icon stacked fill icon-color-custom" id="cozyBlock_26fab0e2_0831_44f3_9ac1_514ada41a9e3"><!-- wp:cozy-block/social-icon-picker {"blockClientId":"fa834f90-8594-4a7a-baa2-da61b52ebc3a","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#1877f2","bgDefaultColor":"#1877f2"} -->
<style>
		#cozyBlock_fa834f90_8594_4a7a_baa2_da61b52ebc3a.stacked.icon-color-default {
		background: #1877f2;
		}
		#cozyBlock_fa834f90_8594_4a7a_baa2_da61b52ebc3a.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_fa834f90_8594_4a7a_baa2_da61b52ebc3a.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_fa834f90_8594_4a7a_baa2_da61b52ebc3a.fill.icon-color-default svg {
		fill: #1877f2;
		}
		#cozyBlock_fa834f90_8594_4a7a_baa2_da61b52ebc3a.outline.icon-color-default svg {
		stroke: #1877f2;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_fa834f90_8594_4a7a_baa2_da61b52ebc3a"><svg viewBox="0 0 14 25" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12.5122 14.0625L13.2065 9.53809H8.86523V6.60205C8.86523 5.36426 9.47168 4.15771 11.416 4.15771H13.3896V0.305664C13.3896 0.305664 11.5986 0 9.88623 0C6.31104 0 3.97412 2.16699 3.97412 6.08984V9.53809H0V14.0625H3.97412V25H8.86523V14.0625H12.5122Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"15fb6baf-86a4-4abb-9806-6a9cae08b441","iconViewBox":{"vx":0,"vy":0,"vw":24,"vh":24},"iconPath":"M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#000","bgDefaultColor":"#000"} -->
<style>
		#cozyBlock_15fb6baf_86a4_4abb_9806_6a9cae08b441.stacked.icon-color-default {
		background: #000;
		}
		#cozyBlock_15fb6baf_86a4_4abb_9806_6a9cae08b441.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_15fb6baf_86a4_4abb_9806_6a9cae08b441.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_15fb6baf_86a4_4abb_9806_6a9cae08b441.fill.icon-color-default svg {
		fill: #000;
		}
		#cozyBlock_15fb6baf_86a4_4abb_9806_6a9cae08b441.outline.icon-color-default svg {
		stroke: #000;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_15fb6baf_86a4_4abb_9806_6a9cae08b441"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"93fbf596-e017-4793-8544-6b4e5ce2589a","iconViewBox":{"vx":0,"vy":0,"vw":22,"vh":22},"iconPath":"M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)","bgDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)"} -->
<style>
		#cozyBlock_93fbf596_e017_4793_8544_6b4e5ce2589a.stacked.icon-color-default {
		background: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_93fbf596_e017_4793_8544_6b4e5ce2589a.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_93fbf596_e017_4793_8544_6b4e5ce2589a.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_93fbf596_e017_4793_8544_6b4e5ce2589a.fill.icon-color-default svg {
		fill: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_93fbf596_e017_4793_8544_6b4e5ce2589a.outline.icon-color-default svg {
		stroke: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_93fbf596_e017_4793_8544_6b4e5ce2589a"><svg viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker --></div>
<!-- /wp:cozy-block/social-icon --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/carousel -->

<!-- wp:cozy-block/carousel -->
<div class="cozy-block-carousel swiper-slide"><!-- wp:group {"style":{"color":{"background":"#fffffe","text":"#646464"},"border":{"radius":"20px"},"spacing":{"padding":{"top":"36px","bottom":"36px","left":"16px","right":"16px"},"blockGap":"0"},"elements":{"link":{"color":{"text":"#646464"}}}},"layout":{"type":"constrained","contentSize":"222px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#204c51","horizontal":0,"vertical":4,"blur":40,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}}} -->
<div class="wp-block-group has-text-color has-background has-link-color" style="border-radius:20px;color:#646464;background-color:#fffffe;padding-top:36px;padding-right:16px;padding-bottom:36px;padding-left:16px"><!-- wp:group {"layout":{"type":"constrained","contentSize":"100px"}} -->
<div class="wp-block-group"><!-- wp:image {"id":1863,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( $images[4] ); ?>" alt="" class="wp-image-1863"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","level":4,"placeholder":"John Carter","style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#161e1f"},"elements":{"link":{"color":{"text":"#161e1f"}}},"spacing":{"margin":{"top":"6px"}}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#161e1f;margin-top:6px;font-size:20px;font-style:normal;font-weight:500"><?php esc_html_e( 'Jessica Nguyen', 'cozy-addons' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"typography":{"fontSize":"12px"}}} -->
<p class="has-text-align-center" style="font-size:12px"><?php esc_html_e( 'Neurology Doctor', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"spacing":{"margin":{"top":"6px","bottom":"26px"}}}} -->
<p class="has-text-align-center" style="margin-top:6px;margin-bottom:26px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, vet elit at consectetur', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"110px"}} -->
<div class="wp-block-group"><!-- wp:cozy-block/social-icon {"blockClientId":"7f18d042-b22a-471e-8a5c-e510149e07c7","iconSize":12,"iconColorLayout":"custom","iconColorHover":"#fffffe","gap":6,"boxStyles":{"padding":{"top":8,"right":8,"bottom":8,"left":8},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColor":"#00c6e1","bgColorHover":"#f49805"}} -->
<div class="cozy-block-social-icon stacked fill icon-color-custom" id="cozyBlock_7f18d042_b22a_471e_8a5c_e510149e07c7"><!-- wp:cozy-block/social-icon-picker {"blockClientId":"be17cbe1-38c4-4dca-9cbe-fe29d7f7dc5d","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#1877f2","bgDefaultColor":"#1877f2"} -->
<style>
		#cozyBlock_be17cbe1_38c4_4dca_9cbe_fe29d7f7dc5d.stacked.icon-color-default {
		background: #1877f2;
		}
		#cozyBlock_be17cbe1_38c4_4dca_9cbe_fe29d7f7dc5d.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_be17cbe1_38c4_4dca_9cbe_fe29d7f7dc5d.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_be17cbe1_38c4_4dca_9cbe_fe29d7f7dc5d.fill.icon-color-default svg {
		fill: #1877f2;
		}
		#cozyBlock_be17cbe1_38c4_4dca_9cbe_fe29d7f7dc5d.outline.icon-color-default svg {
		stroke: #1877f2;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_be17cbe1_38c4_4dca_9cbe_fe29d7f7dc5d"><svg viewBox="0 0 14 25" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12.5122 14.0625L13.2065 9.53809H8.86523V6.60205C8.86523 5.36426 9.47168 4.15771 11.416 4.15771H13.3896V0.305664C13.3896 0.305664 11.5986 0 9.88623 0C6.31104 0 3.97412 2.16699 3.97412 6.08984V9.53809H0V14.0625H3.97412V25H8.86523V14.0625H12.5122Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"63ec8454-c579-4350-8ffe-a40008808b36","iconViewBox":{"vx":0,"vy":0,"vw":24,"vh":24},"iconPath":"M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#000","bgDefaultColor":"#000"} -->
<style>
		#cozyBlock_63ec8454_c579_4350_8ffe_a40008808b36.stacked.icon-color-default {
		background: #000;
		}
		#cozyBlock_63ec8454_c579_4350_8ffe_a40008808b36.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_63ec8454_c579_4350_8ffe_a40008808b36.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_63ec8454_c579_4350_8ffe_a40008808b36.fill.icon-color-default svg {
		fill: #000;
		}
		#cozyBlock_63ec8454_c579_4350_8ffe_a40008808b36.outline.icon-color-default svg {
		stroke: #000;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_63ec8454_c579_4350_8ffe_a40008808b36"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"3be3a3d8-5fa9-4a5c-b78b-04a31cb05a35","iconViewBox":{"vx":0,"vy":0,"vw":22,"vh":22},"iconPath":"M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)","bgDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)"} -->
<style>
		#cozyBlock_3be3a3d8_5fa9_4a5c_b78b_04a31cb05a35.stacked.icon-color-default {
		background: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_3be3a3d8_5fa9_4a5c_b78b_04a31cb05a35.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_3be3a3d8_5fa9_4a5c_b78b_04a31cb05a35.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_3be3a3d8_5fa9_4a5c_b78b_04a31cb05a35.fill.icon-color-default svg {
		fill: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_3be3a3d8_5fa9_4a5c_b78b_04a31cb05a35.outline.icon-color-default svg {
		stroke: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_3be3a3d8_5fa9_4a5c_b78b_04a31cb05a35"><svg viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker --></div>
<!-- /wp:cozy-block/social-icon --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/carousel -->

<!-- wp:cozy-block/carousel -->
<div class="cozy-block-carousel swiper-slide"><!-- wp:group {"style":{"color":{"background":"#fffffe","text":"#646464"},"border":{"radius":"20px"},"spacing":{"padding":{"top":"36px","bottom":"36px","left":"16px","right":"16px"},"blockGap":"0"},"elements":{"link":{"color":{"text":"#646464"}}}},"layout":{"type":"constrained","contentSize":"222px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#204c51","horizontal":0,"vertical":4,"blur":40,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}}} -->
<div class="wp-block-group has-text-color has-background has-link-color" style="border-radius:20px;color:#646464;background-color:#fffffe;padding-top:36px;padding-right:16px;padding-bottom:36px;padding-left:16px"><!-- wp:group {"layout":{"type":"constrained","contentSize":"100px"}} -->
<div class="wp-block-group"><!-- wp:image {"id":1862,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( $images[3] ); ?>" alt="" class="wp-image-1862"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","level":4,"placeholder":"John Carter","style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#161e1f"},"elements":{"link":{"color":{"text":"#161e1f"}}},"spacing":{"margin":{"top":"6px"}}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#161e1f;margin-top:6px;font-size:20px;font-style:normal;font-weight:500"><?php esc_html_e( 'Dr. Smith', 'cozy-addons' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"typography":{"fontSize":"12px"}}} -->
<p class="has-text-align-center" style="font-size:12px"><?php esc_html_e( 'Neurology Doctor', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"spacing":{"margin":{"top":"6px","bottom":"26px"}}}} -->
<p class="has-text-align-center" style="margin-top:6px;margin-bottom:26px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, vet elit at consectetur', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"110px"}} -->
<div class="wp-block-group"><!-- wp:cozy-block/social-icon {"blockClientId":"4aa63a0a-bf21-460c-91a1-61f53963aad7","iconSize":12,"iconColorLayout":"custom","iconColorHover":"#fffffe","gap":6,"boxStyles":{"padding":{"top":8,"right":8,"bottom":8,"left":8},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColor":"#00c6e1","bgColorHover":"#f49805"}} -->
<div class="cozy-block-social-icon stacked fill icon-color-custom" id="cozyBlock_4aa63a0a_bf21_460c_91a1_61f53963aad7"><!-- wp:cozy-block/social-icon-picker {"blockClientId":"266ce6a7-3783-4663-b2d3-d5f31554a845","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#1877f2","bgDefaultColor":"#1877f2"} -->
<style>
		#cozyBlock_266ce6a7_3783_4663_b2d3_d5f31554a845.stacked.icon-color-default {
		background: #1877f2;
		}
		#cozyBlock_266ce6a7_3783_4663_b2d3_d5f31554a845.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_266ce6a7_3783_4663_b2d3_d5f31554a845.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_266ce6a7_3783_4663_b2d3_d5f31554a845.fill.icon-color-default svg {
		fill: #1877f2;
		}
		#cozyBlock_266ce6a7_3783_4663_b2d3_d5f31554a845.outline.icon-color-default svg {
		stroke: #1877f2;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_266ce6a7_3783_4663_b2d3_d5f31554a845"><svg viewBox="0 0 14 25" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12.5122 14.0625L13.2065 9.53809H8.86523V6.60205C8.86523 5.36426 9.47168 4.15771 11.416 4.15771H13.3896V0.305664C13.3896 0.305664 11.5986 0 9.88623 0C6.31104 0 3.97412 2.16699 3.97412 6.08984V9.53809H0V14.0625H3.97412V25H8.86523V14.0625H12.5122Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"2b130845-340f-4564-acf3-1fa9e1cd5293","iconViewBox":{"vx":0,"vy":0,"vw":24,"vh":24},"iconPath":"M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#000","bgDefaultColor":"#000"} -->
<style>
		#cozyBlock_2b130845_340f_4564_acf3_1fa9e1cd5293.stacked.icon-color-default {
		background: #000;
		}
		#cozyBlock_2b130845_340f_4564_acf3_1fa9e1cd5293.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_2b130845_340f_4564_acf3_1fa9e1cd5293.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_2b130845_340f_4564_acf3_1fa9e1cd5293.fill.icon-color-default svg {
		fill: #000;
		}
		#cozyBlock_2b130845_340f_4564_acf3_1fa9e1cd5293.outline.icon-color-default svg {
		stroke: #000;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_2b130845_340f_4564_acf3_1fa9e1cd5293"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"0c733b38-5f48-40b8-ba81-41af9a53cd7a","iconViewBox":{"vx":0,"vy":0,"vw":22,"vh":22},"iconPath":"M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)","bgDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)"} -->
<style>
		#cozyBlock_0c733b38_5f48_40b8_ba81_41af9a53cd7a.stacked.icon-color-default {
		background: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_0c733b38_5f48_40b8_ba81_41af9a53cd7a.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_0c733b38_5f48_40b8_ba81_41af9a53cd7a.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_0c733b38_5f48_40b8_ba81_41af9a53cd7a.fill.icon-color-default svg {
		fill: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_0c733b38_5f48_40b8_ba81_41af9a53cd7a.outline.icon-color-default svg {
		stroke: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_0c733b38_5f48_40b8_ba81_41af9a53cd7a"><svg viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker --></div>
<!-- /wp:cozy-block/social-icon --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/carousel --></div><div class="swiper-pagination cozy-pagination"></div></div>
<!-- /wp:cozy-block/teams --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->