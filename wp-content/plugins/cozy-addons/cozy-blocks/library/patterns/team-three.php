<?php
/**
 * Title: Team section three with grid animation
 * Description: This is team section with grid, animation
 * Slug: cozy-block-patterns/team-three
 * Categories: cozy-block-patterns, teams
 */

$images = array(
	CT_ASSETS_URL . 'images/team_1_1.jpg',
	CT_ASSETS_URL . 'images/team_3_1.jpg',
	CT_ASSETS_URL . 'images/team_1_2.jpg',
	CT_ASSETS_URL . 'images/team_1_3.jpg',
);
?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Team', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"color":{"background":"#fffffe"}},"className":"cozy-block-pattern__team-three","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull cozy-block-pattern__team-three has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"16px","left":"16px","top":"80px","bottom":"80px"},"blockGap":"var:preset|spacing|70"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:columns {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":{"top":"var:preset|spacing|70","left":"44px"}}}} -->
<div class="wp-block-columns" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"36%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:36%"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}}},"layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#090b10;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"left","style":{"typography":{"fontSize":"14px","textTransform":"uppercase","lineHeight":"1.3","fontStyle":"normal","fontWeight":"500"}},"cozyCustomFont":"Public Sans"} -->
<p class="has-text-align-left" style="font-size:14px;font-style:normal;font-weight:500;line-height:1.3;text-transform:uppercase"><?php esc_html_e( 'Professional Team', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"left","style":{"typography":{"lineHeight":"1.3","fontSize":"44px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"#090b10"}}},"color":{"text":"#090b10"}},"cozyCustomFont":"Inter","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color" style="color:#090b10;font-size:44px;font-style:normal;font-weight:600;line-height:1.3"><?php esc_html_e( 'Our Team Members', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}}}} -->
<p class="has-text-color has-link-color" style="color:#646464"><?php esc_html_e( 'Far far away, behind the word mountains, far from the countries Vocalic and Consonantal, there live the blind texts. Separated they live.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"typography":{"fontSize":"18px","textDecoration":"none"},"spacing":{"margin":{"top":"26px"}}},"cozyHoverEffect":{"boxShadow":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":"-4","rotate":0,"scale":1}}} -->
<div class="wp-block-buttons has-custom-font-size" style="margin-top:26px;font-size:18px;text-decoration:none"><!-- wp:button {"style":{"color":{"background":"#3620be","text":"#fffffe"},"elements":{"link":{"color":{"text":"#fffffe"}}},"border":{"radius":"0px"},"spacing":{"padding":{"left":"36px","right":"36px","top":"14px","bottom":"14px"}}},"cozyHoverStyles":{"bgColor":"#f49805","color":"#fffffe","borderColor":"#f49805"}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background has-link-color wp-element-button" style="border-radius:0px;color:#fffffe;background-color:#3620be;padding-top:14px;padding-right:36px;padding-bottom:14px;padding-left:36px"><?php esc_html_e( 'Meet All Members', 'cozy-addons' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"36px"}}} -->
<div class="wp-block-column"><!-- wp:cozy-block/teams {"blockClientId":"0f1b77b8-fd9e-4949-be9a-48c5d7d7e309","gridOptions":{"displayColumn":"2","masonryEnabled":false,"columnGap":30}} -->
<div class="cozy-block-teams display-grid   hover-show" id="cozyBlock_0f1b77b8_fd9e_4949_be9a_48c5d7d7e309"><div class="cozy-block-grid-wrapper "><!-- wp:cozy-block/grid -->
<div class="cozy-block-grid"><!-- wp:cover {"url":"<?php echo esc_url( $images[0] ); ?>","id":2534,"dimRatio":20,"isUserOverlayColor":true,"customGradient":"linear-gradient(261deg,rgba(9,11,16,0) 0%,rgb(9,11,16) 100%)","contentPosition":"bottom left","style":{"spacing":{"padding":{"right":"16px","left":"16px","top":"30px","bottom":"30px"}}},"cozyAnimation":{"type":"fade-right","easingFunction":"ease-in","anchorPlacement":"top-center","duration":800}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="padding-top:30px;padding-right:16px;padding-bottom:30px;padding-left:16px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-20 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(261deg,rgba(9,11,16,0) 0%,rgb(9,11,16) 100%)"></span><img class="wp-block-cover__image-background wp-image-2534" alt="" src="<?php echo esc_url( $images[0] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"0"},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"}},"className":"cozy-team-three__content","layout":{"type":"constrained","contentSize":"200px","justifyContent":"left"}} -->
<div class="wp-block-group cozy-team-three__content has-text-color has-link-color" style="color:#fffffe"><!-- wp:heading {"textAlign":"center","level":4,"placeholder":"John Carter","style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#fffffe;font-size:20px;font-style:normal;font-weight:600"><?php esc_html_e( 'Daniel Wilson', 'cozy-addons' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"color":{"text":"#ebebeb"},"elements":{"link":{"color":{"text":"#ebebeb"}}}},"fontSize":"small"} -->
<p class="has-text-align-left has-text-color has-link-color has-small-font-size" style="color:#ebebeb"><?php esc_html_e( 'Web Developer', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"left":"0px","top":"0","bottom":"0","right":"0px"},"margin":{"top":"16px"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":""}} -->
<div class="wp-block-group" style="margin-top:16px;padding-top:0;padding-right:0px;padding-bottom:0;padding-left:0px"><!-- wp:cozy-block/social-icon {"blockClientId":"f5fb3ec7-9677-4afc-a594-14c3458c3b54","iconSize":14,"iconColorLayout":"custom","iconColor":"#000000","iconColorHover":"#fffffe","gap":2,"boxStyles":{"padding":{"top":6,"right":6,"bottom":6,"left":6},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColor":"#ffffff","bgColorHover":"#f49805"}} -->
<div class="cozy-block-social-icon stacked fill icon-color-custom" id="cozyBlock_f5fb3ec7_9677_4afc_a594_14c3458c3b54"><!-- wp:cozy-block/social-icon-picker {"blockClientId":"9a9b8afa-8575-429c-8d82-974c75fef69f","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#1877f2","bgDefaultColor":"#1877f2"} -->
<style>
		#cozyBlock_9a9b8afa_8575_429c_8d82_974c75fef69f.stacked.icon-color-default {
		background: #1877f2;
		}
		#cozyBlock_9a9b8afa_8575_429c_8d82_974c75fef69f.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_9a9b8afa_8575_429c_8d82_974c75fef69f.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_9a9b8afa_8575_429c_8d82_974c75fef69f.fill.icon-color-default svg {
		fill: #1877f2;
		}
		#cozyBlock_9a9b8afa_8575_429c_8d82_974c75fef69f.outline.icon-color-default svg {
		stroke: #1877f2;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_9a9b8afa_8575_429c_8d82_974c75fef69f"><svg viewBox="0 0 14 25" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12.5122 14.0625L13.2065 9.53809H8.86523V6.60205C8.86523 5.36426 9.47168 4.15771 11.416 4.15771H13.3896V0.305664C13.3896 0.305664 11.5986 0 9.88623 0C6.31104 0 3.97412 2.16699 3.97412 6.08984V9.53809H0V14.0625H3.97412V25H8.86523V14.0625H12.5122Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"31a871ca-7d63-42c0-a159-f04abe82c419","iconViewBox":{"vx":0,"vy":0,"vw":24,"vh":24},"iconPath":"M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#000","bgDefaultColor":"#000"} -->
<style>
		#cozyBlock_31a871ca_7d63_42c0_a159_f04abe82c419.stacked.icon-color-default {
		background: #000;
		}
		#cozyBlock_31a871ca_7d63_42c0_a159_f04abe82c419.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_31a871ca_7d63_42c0_a159_f04abe82c419.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_31a871ca_7d63_42c0_a159_f04abe82c419.fill.icon-color-default svg {
		fill: #000;
		}
		#cozyBlock_31a871ca_7d63_42c0_a159_f04abe82c419.outline.icon-color-default svg {
		stroke: #000;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_31a871ca_7d63_42c0_a159_f04abe82c419"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"b255c1e6-1198-474f-a571-974e63e5ac79","iconViewBox":{"vx":0,"vy":0,"vw":22,"vh":22},"iconPath":"M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)","bgDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)"} -->
<style>
		#cozyBlock_b255c1e6_1198_474f_a571_974e63e5ac79.stacked.icon-color-default {
		background: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_b255c1e6_1198_474f_a571_974e63e5ac79.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_b255c1e6_1198_474f_a571_974e63e5ac79.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_b255c1e6_1198_474f_a571_974e63e5ac79.fill.icon-color-default svg {
		fill: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_b255c1e6_1198_474f_a571_974e63e5ac79.outline.icon-color-default svg {
		stroke: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_b255c1e6_1198_474f_a571_974e63e5ac79"><svg viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker --></div>
<!-- /wp:cozy-block/social-icon --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:cozy-block/grid -->

<!-- wp:cozy-block/grid -->
<div class="cozy-block-grid"><!-- wp:cover {"url":"<?php echo esc_url( $images[1] ); ?>","id":2564,"dimRatio":20,"isUserOverlayColor":true,"customGradient":"linear-gradient(135deg,rgba(9,11,16,0) 0%,rgb(9,11,16) 100%)","contentPosition":"bottom left","isDark":false,"style":{"spacing":{"padding":{"top":"30px","bottom":"30px","left":"16px","right":"16px"}}},"cozyAnimation":{"type":"fade-left","easingFunction":"ease-in","anchorPlacement":"top-center","duration":800}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-left" style="padding-top:30px;padding-right:16px;padding-bottom:30px;padding-left:16px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-20 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(135deg,rgba(9,11,16,0) 0%,rgb(9,11,16) 100%)"></span><img class="wp-block-cover__image-background wp-image-2564" alt="" src="<?php echo esc_url( $images[1] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"0"},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"}},"className":"cozy-team-three__content","layout":{"type":"constrained","contentSize":"200px","justifyContent":"left"}} -->
<div class="wp-block-group cozy-team-three__content has-text-color has-link-color" style="color:#fffffe"><!-- wp:heading {"textAlign":"center","level":4,"placeholder":"John Carter","style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#fffffe;font-size:20px;font-style:normal;font-weight:600"><?php esc_html_e( 'Angelique', 'cozy-addons' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"color":{"text":"#ebebeb"},"elements":{"link":{"color":{"text":"#ebebeb"}}}},"fontSize":"small"} -->
<p class="has-text-align-left has-text-color has-link-color has-small-font-size" style="color:#ebebeb"><?php esc_html_e( 'Content Writer', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"left":"0px","top":"0","bottom":"0","right":"0px"},"margin":{"top":"16px"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":""}} -->
<div class="wp-block-group" style="margin-top:16px;padding-top:0;padding-right:0px;padding-bottom:0;padding-left:0px"><!-- wp:cozy-block/social-icon {"blockClientId":"0d03e78d-7819-43dc-a9e1-89d4537e5995","iconSize":14,"iconColorLayout":"custom","iconColor":"#000000","iconColorHover":"#fffffe","gap":2,"boxStyles":{"padding":{"top":6,"right":6,"bottom":6,"left":6},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColor":"#ffffff","bgColorHover":"#f49805"}} -->
<div class="cozy-block-social-icon stacked fill icon-color-custom" id="cozyBlock_0d03e78d_7819_43dc_a9e1_89d4537e5995"><!-- wp:cozy-block/social-icon-picker {"blockClientId":"b4afa2d6-c42b-47d8-8860-b830b7c87515","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#1877f2","bgDefaultColor":"#1877f2"} -->
<style>
		#cozyBlock_b4afa2d6_c42b_47d8_8860_b830b7c87515.stacked.icon-color-default {
		background: #1877f2;
		}
		#cozyBlock_b4afa2d6_c42b_47d8_8860_b830b7c87515.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_b4afa2d6_c42b_47d8_8860_b830b7c87515.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_b4afa2d6_c42b_47d8_8860_b830b7c87515.fill.icon-color-default svg {
		fill: #1877f2;
		}
		#cozyBlock_b4afa2d6_c42b_47d8_8860_b830b7c87515.outline.icon-color-default svg {
		stroke: #1877f2;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_b4afa2d6_c42b_47d8_8860_b830b7c87515"><svg viewBox="0 0 14 25" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12.5122 14.0625L13.2065 9.53809H8.86523V6.60205C8.86523 5.36426 9.47168 4.15771 11.416 4.15771H13.3896V0.305664C13.3896 0.305664 11.5986 0 9.88623 0C6.31104 0 3.97412 2.16699 3.97412 6.08984V9.53809H0V14.0625H3.97412V25H8.86523V14.0625H12.5122Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"c1790379-08b1-4b85-9f2f-0cb0375180a3","iconViewBox":{"vx":0,"vy":0,"vw":24,"vh":24},"iconPath":"M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#000","bgDefaultColor":"#000"} -->
<style>
		#cozyBlock_c1790379_08b1_4b85_9f2f_0cb0375180a3.stacked.icon-color-default {
		background: #000;
		}
		#cozyBlock_c1790379_08b1_4b85_9f2f_0cb0375180a3.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_c1790379_08b1_4b85_9f2f_0cb0375180a3.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_c1790379_08b1_4b85_9f2f_0cb0375180a3.fill.icon-color-default svg {
		fill: #000;
		}
		#cozyBlock_c1790379_08b1_4b85_9f2f_0cb0375180a3.outline.icon-color-default svg {
		stroke: #000;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_c1790379_08b1_4b85_9f2f_0cb0375180a3"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"bcfcd514-6617-47ef-b2e6-dfeadcfda2e2","iconViewBox":{"vx":0,"vy":0,"vw":22,"vh":22},"iconPath":"M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)","bgDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)"} -->
<style>
		#cozyBlock_bcfcd514_6617_47ef_b2e6_dfeadcfda2e2.stacked.icon-color-default {
		background: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_bcfcd514_6617_47ef_b2e6_dfeadcfda2e2.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_bcfcd514_6617_47ef_b2e6_dfeadcfda2e2.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_bcfcd514_6617_47ef_b2e6_dfeadcfda2e2.fill.icon-color-default svg {
		fill: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_bcfcd514_6617_47ef_b2e6_dfeadcfda2e2.outline.icon-color-default svg {
		stroke: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_bcfcd514_6617_47ef_b2e6_dfeadcfda2e2"><svg viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker --></div>
<!-- /wp:cozy-block/social-icon --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:cozy-block/grid --></div></div>
<!-- /wp:cozy-block/teams -->

<!-- wp:cozy-block/teams {"blockClientId":"a6adf3c2-e877-4ee3-986e-50f3f55fd4e8","gridOptions":{"displayColumn":"2","masonryEnabled":false,"columnGap":30}} -->
<div class="cozy-block-teams display-grid   hover-show" id="cozyBlock_a6adf3c2_e877_4ee3_986e_50f3f55fd4e8"><div class="cozy-block-grid-wrapper "><!-- wp:cozy-block/grid -->
<div class="cozy-block-grid"><!-- wp:cover {"url":"<?php echo esc_url( $images[2] ); ?>","id":2568,"dimRatio":20,"isUserOverlayColor":true,"customGradient":"linear-gradient(261deg,rgba(9,11,16,0) 0%,rgb(9,11,16) 100%)","contentPosition":"bottom left","style":{"spacing":{"padding":{"right":"16px","left":"16px","top":"30px","bottom":"30px"}}},"cozyAnimation":{"type":"fade-left","easingFunction":"ease-out","anchorPlacement":"top-center","duration":800}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="padding-top:30px;padding-right:16px;padding-bottom:30px;padding-left:16px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-20 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(261deg,rgba(9,11,16,0) 0%,rgb(9,11,16) 100%)"></span><img class="wp-block-cover__image-background wp-image-2568" alt="" src="<?php echo esc_url( $images[2] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"0"},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"}},"className":"cozy-team-three__content","layout":{"type":"constrained","contentSize":"200px","justifyContent":"left"}} -->
<div class="wp-block-group cozy-team-three__content has-text-color has-link-color" style="color:#fffffe"><!-- wp:heading {"textAlign":"left","level":4,"placeholder":"John Carter","style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-left has-text-color has-link-color" style="color:#fffffe;font-size:20px;font-style:normal;font-weight:600"><?php esc_html_e( 'Sylphia', 'cozy-addons' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"color":{"text":"#ebebeb"},"elements":{"link":{"color":{"text":"#ebebeb"}}}},"fontSize":"small"} -->
<p class="has-text-align-left has-text-color has-link-color has-small-font-size" style="color:#ebebeb"><?php esc_html_e( 'Designer', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"left":"0px","top":"0","bottom":"0","right":"0px"},"margin":{"top":"16px"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":""}} -->
<div class="wp-block-group" style="margin-top:16px;padding-top:0;padding-right:0px;padding-bottom:0;padding-left:0px"><!-- wp:cozy-block/social-icon {"blockClientId":"505525d9-ea33-4a99-84c6-e8b585a34f0e","iconSize":14,"iconColorLayout":"custom","iconColor":"#000000","iconColorHover":"#fffffe","gap":2,"boxStyles":{"padding":{"top":6,"right":6,"bottom":6,"left":6},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColor":"#ffffff","bgColorHover":"#f49805"}} -->
<div class="cozy-block-social-icon stacked fill icon-color-custom" id="cozyBlock_505525d9_ea33_4a99_84c6_e8b585a34f0e"><!-- wp:cozy-block/social-icon-picker {"blockClientId":"eef61d30-f8fb-4b5f-8f2e-be395affcb5e","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#1877f2","bgDefaultColor":"#1877f2"} -->
<style>
		#cozyBlock_eef61d30_f8fb_4b5f_8f2e_be395affcb5e.stacked.icon-color-default {
		background: #1877f2;
		}
		#cozyBlock_eef61d30_f8fb_4b5f_8f2e_be395affcb5e.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_eef61d30_f8fb_4b5f_8f2e_be395affcb5e.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_eef61d30_f8fb_4b5f_8f2e_be395affcb5e.fill.icon-color-default svg {
		fill: #1877f2;
		}
		#cozyBlock_eef61d30_f8fb_4b5f_8f2e_be395affcb5e.outline.icon-color-default svg {
		stroke: #1877f2;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_eef61d30_f8fb_4b5f_8f2e_be395affcb5e"><svg viewBox="0 0 14 25" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12.5122 14.0625L13.2065 9.53809H8.86523V6.60205C8.86523 5.36426 9.47168 4.15771 11.416 4.15771H13.3896V0.305664C13.3896 0.305664 11.5986 0 9.88623 0C6.31104 0 3.97412 2.16699 3.97412 6.08984V9.53809H0V14.0625H3.97412V25H8.86523V14.0625H12.5122Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"deb1146b-6787-4736-888b-478871b824e1","iconViewBox":{"vx":0,"vy":0,"vw":24,"vh":24},"iconPath":"M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#000","bgDefaultColor":"#000"} -->
<style>
		#cozyBlock_deb1146b_6787_4736_888b_478871b824e1.stacked.icon-color-default {
		background: #000;
		}
		#cozyBlock_deb1146b_6787_4736_888b_478871b824e1.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_deb1146b_6787_4736_888b_478871b824e1.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_deb1146b_6787_4736_888b_478871b824e1.fill.icon-color-default svg {
		fill: #000;
		}
		#cozyBlock_deb1146b_6787_4736_888b_478871b824e1.outline.icon-color-default svg {
		stroke: #000;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_deb1146b_6787_4736_888b_478871b824e1"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"a3d15a95-4c40-4696-aa04-e85632e5f9f3","iconViewBox":{"vx":0,"vy":0,"vw":22,"vh":22},"iconPath":"M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)","bgDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)"} -->
<style>
		#cozyBlock_a3d15a95_4c40_4696_aa04_e85632e5f9f3.stacked.icon-color-default {
		background: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_a3d15a95_4c40_4696_aa04_e85632e5f9f3.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_a3d15a95_4c40_4696_aa04_e85632e5f9f3.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_a3d15a95_4c40_4696_aa04_e85632e5f9f3.fill.icon-color-default svg {
		fill: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_a3d15a95_4c40_4696_aa04_e85632e5f9f3.outline.icon-color-default svg {
		stroke: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_a3d15a95_4c40_4696_aa04_e85632e5f9f3"><svg viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker --></div>
<!-- /wp:cozy-block/social-icon --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:cozy-block/grid -->

<!-- wp:cozy-block/grid -->
<div class="cozy-block-grid"><!-- wp:cover {"url":"<?php echo esc_url( $images[3] ); ?>","id":2569,"dimRatio":20,"isUserOverlayColor":true,"customGradient":"linear-gradient(261deg,rgba(9,11,16,0) 0%,rgb(9,11,16) 100%)","contentPosition":"bottom left","isDark":false,"style":{"spacing":{"padding":{"right":"16px","left":"16px","top":"30px","bottom":"30px"}}},"cozyAnimation":{"type":"fade-right","easingFunction":"ease-out","anchorPlacement":"top-center","duration":800}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-left" style="padding-top:30px;padding-right:16px;padding-bottom:30px;padding-left:16px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-20 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(261deg,rgba(9,11,16,0) 0%,rgb(9,11,16) 100%)"></span><img class="wp-block-cover__image-background wp-image-2569" alt="" src="<?php echo esc_url( $images[3] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"0"},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"}},"className":"cozy-team-three__content","layout":{"type":"constrained","contentSize":"200px","justifyContent":"left"}} -->
<div class="wp-block-group cozy-team-three__content has-text-color has-link-color" style="color:#fffffe"><!-- wp:heading {"textAlign":"left","level":4,"placeholder":"John Carter","style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-left has-text-color has-link-color" style="color:#fffffe;font-size:20px;font-style:normal;font-weight:600"><?php esc_html_e( 'Tom', 'cozy-addons' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"color":{"text":"#ebebeb"},"elements":{"link":{"color":{"text":"#ebebeb"}}}},"fontSize":"small"} -->
<p class="has-text-align-left has-text-color has-link-color has-small-font-size" style="color:#ebebeb"><?php esc_html_e( 'CEO', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"left":"0px","top":"0","bottom":"0","right":"0px"},"margin":{"top":"16px"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":""}} -->
<div class="wp-block-group" style="margin-top:16px;padding-top:0;padding-right:0px;padding-bottom:0;padding-left:0px"><!-- wp:cozy-block/social-icon {"blockClientId":"ca88575f-d74a-4612-b56e-b01f6fc56312","iconSize":14,"iconColorLayout":"custom","iconColor":"#000000","iconColorHover":"#fffffe","gap":2,"boxStyles":{"padding":{"top":6,"right":6,"bottom":6,"left":6},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColor":"#ffffff","bgColorHover":"#f49805"}} -->
<div class="cozy-block-social-icon stacked fill icon-color-custom" id="cozyBlock_ca88575f_d74a_4612_b56e_b01f6fc56312"><!-- wp:cozy-block/social-icon-picker {"blockClientId":"b276a745-ae89-4e15-922a-806f7fffb35e","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#1877f2","bgDefaultColor":"#1877f2"} -->
<style>
		#cozyBlock_b276a745_ae89_4e15_922a_806f7fffb35e.stacked.icon-color-default {
		background: #1877f2;
		}
		#cozyBlock_b276a745_ae89_4e15_922a_806f7fffb35e.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_b276a745_ae89_4e15_922a_806f7fffb35e.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_b276a745_ae89_4e15_922a_806f7fffb35e.fill.icon-color-default svg {
		fill: #1877f2;
		}
		#cozyBlock_b276a745_ae89_4e15_922a_806f7fffb35e.outline.icon-color-default svg {
		stroke: #1877f2;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_b276a745_ae89_4e15_922a_806f7fffb35e"><svg viewBox="0 0 14 25" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12.5122 14.0625L13.2065 9.53809H8.86523V6.60205C8.86523 5.36426 9.47168 4.15771 11.416 4.15771H13.3896V0.305664C13.3896 0.305664 11.5986 0 9.88623 0C6.31104 0 3.97412 2.16699 3.97412 6.08984V9.53809H0V14.0625H3.97412V25H8.86523V14.0625H12.5122Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"4d3ab383-9deb-4457-adba-c9bc18c4bac7","iconViewBox":{"vx":0,"vy":0,"vw":24,"vh":24},"iconPath":"M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#000","bgDefaultColor":"#000"} -->
<style>
		#cozyBlock_4d3ab383_9deb_4457_adba_c9bc18c4bac7.stacked.icon-color-default {
		background: #000;
		}
		#cozyBlock_4d3ab383_9deb_4457_adba_c9bc18c4bac7.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_4d3ab383_9deb_4457_adba_c9bc18c4bac7.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_4d3ab383_9deb_4457_adba_c9bc18c4bac7.fill.icon-color-default svg {
		fill: #000;
		}
		#cozyBlock_4d3ab383_9deb_4457_adba_c9bc18c4bac7.outline.icon-color-default svg {
		stroke: #000;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_4d3ab383_9deb_4457_adba_c9bc18c4bac7"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"c2ea917d-3708-489d-9391-e61ec5b5a575","iconViewBox":{"vx":0,"vy":0,"vw":22,"vh":22},"iconPath":"M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)","bgDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)"} -->
<style>
		#cozyBlock_c2ea917d_3708_489d_9391_e61ec5b5a575.stacked.icon-color-default {
		background: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_c2ea917d_3708_489d_9391_e61ec5b5a575.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_c2ea917d_3708_489d_9391_e61ec5b5a575.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_c2ea917d_3708_489d_9391_e61ec5b5a575.fill.icon-color-default svg {
		fill: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_c2ea917d_3708_489d_9391_e61ec5b5a575.outline.icon-color-default svg {
		stroke: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_c2ea917d_3708_489d_9391_e61ec5b5a575"><svg viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker --></div>
<!-- /wp:cozy-block/social-icon --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:cozy-block/grid --></div></div>
<!-- /wp:cozy-block/teams --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->