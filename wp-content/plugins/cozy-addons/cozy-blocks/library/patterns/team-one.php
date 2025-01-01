<?php
/**
 * Title: Team section one with grid animation
 * Description: This is team section with grid, animation
 * Slug: cozy-block-patterns/team-one
 * Categories: cozy-block-patterns, teams
 */

$images = array(
	CT_ASSETS_URL . 'images/team_1_1.jpg',
	CT_ASSETS_URL . 'images/team_1_2.jpg',
	CT_ASSETS_URL . 'images/team_1_3.jpg',
);
?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Team', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"color":{"background":"#fffffe"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"16px","left":"16px","top":"80px","bottom":"80px"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"blockGap":"6px","margin":{"top":"0","bottom":"36px"}},"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#646464;margin-top:0;margin-bottom:36px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"497px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"#01ae8f"}}},"typography":{"fontSize":"14px","textTransform":"uppercase","lineHeight":"1.2","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#01ae8f"}},"cozyCustomFont":"Public Sans"} -->
<p class="has-text-align-left has-text-color has-link-color" style="color:#01ae8f;font-size:14px;font-style:normal;font-weight:500;line-height:1.2;text-transform:uppercase"><?php esc_html_e( 'Professional Team', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"left","style":{"typography":{"lineHeight":"1.2","fontSize":"44px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"#090b10"}}},"color":{"text":"#090b10"}},"cozyCustomFont":"Inter","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color" style="color:#090b10;font-size:44px;font-style:normal;font-weight:600;line-height:1.2"><?php esc_html_e( 'Our Team Members', 'cozy-addons' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"497px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}}} -->
<p style="font-size:14px"><?php esc_html_e( 'Far far away, behind the word mountains, far from the countries Vocalic and Consonantal, there live the blind texts. Separated they live.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"typography":{"fontSize":"16px","textDecoration":"none"},"spacing":{"margin":{"top":"26px"}}},"cozyHoverEffect":{"boxShadow":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":"-4","rotate":0,"scale":1}}} -->
<div class="wp-block-buttons has-custom-font-size" style="margin-top:26px;font-size:16px;text-decoration:none"><!-- wp:button {"style":{"color":{"background":"#01ae8f","text":"#fffffe"},"elements":{"link":{"color":{"text":"#fffffe"}}},"border":{"radius":"0px"},"spacing":{"padding":{"left":"36px","right":"36px","top":"14px","bottom":"14px"}}},"cozyHoverStyles":{"bgColor":"#f49805","color":"#fffffe","borderColor":"#f49805"}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background has-link-color wp-element-button" style="border-radius:0px;color:#fffffe;background-color:#01ae8f;padding-top:14px;padding-right:36px;padding-bottom:14px;padding-left:36px"><?php esc_html_e( 'View All Services', 'cozy-addons' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:cozy-block/teams {"blockClientId":"c5101483-0ac3-4a8d-a188-a3aa3917eadd"} -->
<div class="cozy-block-teams display-grid   hover-show" id="cozyBlock_c5101483_0ac3_4a8d_a188_a3aa3917eadd"><div class="cozy-block-grid-wrapper "><!-- wp:cozy-block/grid -->
<div class="cozy-block-grid"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"zoom-in-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":800}} -->
<div class="wp-block-group"><!-- wp:image {"id":2534,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-2534"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":4,"placeholder":"John Carter","style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}},"spacing":{"margin":{"top":"10px","bottom":"4px"}}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#090b10;margin-top:10px;margin-bottom:4px;font-size:20px;font-style:normal;font-weight:500">Daniel Wilson</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}}},"fontSize":"small"} -->
<p class="has-text-align-center has-text-color has-link-color has-small-font-size" style="color:#646464"><?php esc_html_e( 'Web Developer', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"left":"16px"},"margin":{"top":"12px"}}},"layout":{"type":"constrained","contentSize":"144px"}} -->
<div class="wp-block-group" style="margin-top:12px;padding-left:16px"><!-- wp:cozy-block/social-icon {"blockClientId":"b891f63e-dc4c-463f-852f-447d77e3e8ba","iconSize":12,"iconColorLayout":"custom","gap":6,"boxStyles":{"padding":{"top":6,"right":6,"bottom":6,"left":6},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColor":"#646464","bgColorHover":"#f49805"}} -->
<div class="cozy-block-social-icon stacked fill icon-color-custom" id="cozyBlock_b891f63e_dc4c_463f_852f_447d77e3e8ba"><!-- wp:cozy-block/social-icon-picker {"blockClientId":"4ee5e2c9-024a-43c4-a7f4-e54e2d307c16","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#1877f2","bgDefaultColor":"#1877f2"} -->
<style>
		#cozyBlock_4ee5e2c9_024a_43c4_a7f4_e54e2d307c16.stacked.icon-color-default {
		background: #1877f2;
		}
		#cozyBlock_4ee5e2c9_024a_43c4_a7f4_e54e2d307c16.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_4ee5e2c9_024a_43c4_a7f4_e54e2d307c16.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_4ee5e2c9_024a_43c4_a7f4_e54e2d307c16.fill.icon-color-default svg {
		fill: #1877f2;
		}
		#cozyBlock_4ee5e2c9_024a_43c4_a7f4_e54e2d307c16.outline.icon-color-default svg {
		stroke: #1877f2;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_4ee5e2c9_024a_43c4_a7f4_e54e2d307c16"><svg viewBox="0 0 14 25" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12.5122 14.0625L13.2065 9.53809H8.86523V6.60205C8.86523 5.36426 9.47168 4.15771 11.416 4.15771H13.3896V0.305664C13.3896 0.305664 11.5986 0 9.88623 0C6.31104 0 3.97412 2.16699 3.97412 6.08984V9.53809H0V14.0625H3.97412V25H8.86523V14.0625H12.5122Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"d8a27cb2-3e30-4f34-b3f9-672d400f7991","iconViewBox":{"vx":0,"vy":0,"vw":24,"vh":24},"iconPath":"M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#000","bgDefaultColor":"#000"} -->
<style>
		#cozyBlock_d8a27cb2_3e30_4f34_b3f9_672d400f7991.stacked.icon-color-default {
		background: #000;
		}
		#cozyBlock_d8a27cb2_3e30_4f34_b3f9_672d400f7991.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_d8a27cb2_3e30_4f34_b3f9_672d400f7991.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_d8a27cb2_3e30_4f34_b3f9_672d400f7991.fill.icon-color-default svg {
		fill: #000;
		}
		#cozyBlock_d8a27cb2_3e30_4f34_b3f9_672d400f7991.outline.icon-color-default svg {
		stroke: #000;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_d8a27cb2_3e30_4f34_b3f9_672d400f7991"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"f0b720d3-68c8-48cb-a6cf-fff45c17b1b1","iconViewBox":{"vx":0,"vy":0,"vw":24,"vh":17},"iconPath":"M23.2084 2.60777C22.9358 1.58129 22.1326 0.772873 21.1128 0.498524C19.2642 0 11.8519 0 11.8519 0C11.8519 0 4.43954 0 2.59097 0.498524C1.57114 0.772917 0.767925 1.58129 0.495312 2.60777C0 4.46832 0 8.35017 0 8.35017C0 8.35017 0 12.232 0.495312 14.0926C0.767925 15.1191 1.57114 15.8938 2.59097 16.1681C4.43954 16.6667 11.8519 16.6667 11.8519 16.6667C11.8519 16.6667 19.2642 16.6667 21.1128 16.1681C22.1326 15.8938 22.9358 15.1191 23.2084 14.0926C23.7037 12.232 23.7037 8.35017 23.7037 8.35017C23.7037 8.35017 23.7037 4.46832 23.2084 2.60777ZM9.4276 11.8746V4.82574L15.6229 8.35026L9.4276 11.8746Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#ff0000","bgDefaultColor":"#ff0000"} -->
<style>
		#cozyBlock_f0b720d3_68c8_48cb_a6cf_fff45c17b1b1.stacked.icon-color-default {
		background: #ff0000;
		}
		#cozyBlock_f0b720d3_68c8_48cb_a6cf_fff45c17b1b1.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_f0b720d3_68c8_48cb_a6cf_fff45c17b1b1.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_f0b720d3_68c8_48cb_a6cf_fff45c17b1b1.fill.icon-color-default svg {
		fill: #ff0000;
		}
		#cozyBlock_f0b720d3_68c8_48cb_a6cf_fff45c17b1b1.outline.icon-color-default svg {
		stroke: #ff0000;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_f0b720d3_68c8_48cb_a6cf_fff45c17b1b1"><svg viewBox="0 0 24 17" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M23.2084 2.60777C22.9358 1.58129 22.1326 0.772873 21.1128 0.498524C19.2642 0 11.8519 0 11.8519 0C11.8519 0 4.43954 0 2.59097 0.498524C1.57114 0.772917 0.767925 1.58129 0.495312 2.60777C0 4.46832 0 8.35017 0 8.35017C0 8.35017 0 12.232 0.495312 14.0926C0.767925 15.1191 1.57114 15.8938 2.59097 16.1681C4.43954 16.6667 11.8519 16.6667 11.8519 16.6667C11.8519 16.6667 19.2642 16.6667 21.1128 16.1681C22.1326 15.8938 22.9358 15.1191 23.2084 14.0926C23.7037 12.232 23.7037 8.35017 23.7037 8.35017C23.7037 8.35017 23.7037 4.46832 23.2084 2.60777ZM9.4276 11.8746V4.82574L15.6229 8.35026L9.4276 11.8746Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"84b1caad-1f4b-4f5f-a11a-0334fcb58593","iconViewBox":{"vx":0,"vy":0,"vw":22,"vh":22},"iconPath":"M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)","bgDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)"} -->
<style>
		#cozyBlock_84b1caad_1f4b_4f5f_a11a_0334fcb58593.stacked.icon-color-default {
		background: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_84b1caad_1f4b_4f5f_a11a_0334fcb58593.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_84b1caad_1f4b_4f5f_a11a_0334fcb58593.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_84b1caad_1f4b_4f5f_a11a_0334fcb58593.fill.icon-color-default svg {
		fill: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_84b1caad_1f4b_4f5f_a11a_0334fcb58593.outline.icon-color-default svg {
		stroke: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_84b1caad_1f4b_4f5f_a11a_0334fcb58593"><svg viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker --></div>
<!-- /wp:cozy-block/social-icon --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/grid -->

<!-- wp:cozy-block/grid -->
<div class="cozy-block-grid"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"zoom-in-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":800}} -->
<div class="wp-block-group"><!-- wp:image {"id":2540,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-2540"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":4,"placeholder":"John Carter","style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}},"spacing":{"margin":{"top":"10px","bottom":"4px"}}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#090b10;margin-top:10px;margin-bottom:4px;font-size:20px;font-style:normal;font-weight:500">Sophia Winget</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}}},"fontSize":"small"} -->
<p class="has-text-align-center has-text-color has-link-color has-small-font-size" style="color:#646464"><?php esc_html_e( 'CEO', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"left":"16px"},"margin":{"top":"12px"}}},"layout":{"type":"constrained","contentSize":"144px"}} -->
<div class="wp-block-group" style="margin-top:12px;padding-left:16px"><!-- wp:cozy-block/social-icon {"blockClientId":"b078be18-1bc3-4ed9-b913-4f1af21b187e","iconSize":12,"iconColorLayout":"custom","gap":6,"boxStyles":{"padding":{"top":6,"right":6,"bottom":6,"left":6},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColor":"#646464","bgColorHover":"#f49805"}} -->
<div class="cozy-block-social-icon stacked fill icon-color-custom" id="cozyBlock_b078be18_1bc3_4ed9_b913_4f1af21b187e"><!-- wp:cozy-block/social-icon-picker {"blockClientId":"909f06fd-da17-47a8-9417-49f4efe8bc3b","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#1877f2","bgDefaultColor":"#1877f2"} -->
<style>
		#cozyBlock_909f06fd_da17_47a8_9417_49f4efe8bc3b.stacked.icon-color-default {
		background: #1877f2;
		}
		#cozyBlock_909f06fd_da17_47a8_9417_49f4efe8bc3b.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_909f06fd_da17_47a8_9417_49f4efe8bc3b.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_909f06fd_da17_47a8_9417_49f4efe8bc3b.fill.icon-color-default svg {
		fill: #1877f2;
		}
		#cozyBlock_909f06fd_da17_47a8_9417_49f4efe8bc3b.outline.icon-color-default svg {
		stroke: #1877f2;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_909f06fd_da17_47a8_9417_49f4efe8bc3b"><svg viewBox="0 0 14 25" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12.5122 14.0625L13.2065 9.53809H8.86523V6.60205C8.86523 5.36426 9.47168 4.15771 11.416 4.15771H13.3896V0.305664C13.3896 0.305664 11.5986 0 9.88623 0C6.31104 0 3.97412 2.16699 3.97412 6.08984V9.53809H0V14.0625H3.97412V25H8.86523V14.0625H12.5122Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"3ea7b8ea-ebb3-4964-ba6a-f0889e3ca84d","iconViewBox":{"vx":0,"vy":0,"vw":24,"vh":24},"iconPath":"M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#000","bgDefaultColor":"#000"} -->
<style>
		#cozyBlock_3ea7b8ea_ebb3_4964_ba6a_f0889e3ca84d.stacked.icon-color-default {
		background: #000;
		}
		#cozyBlock_3ea7b8ea_ebb3_4964_ba6a_f0889e3ca84d.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_3ea7b8ea_ebb3_4964_ba6a_f0889e3ca84d.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_3ea7b8ea_ebb3_4964_ba6a_f0889e3ca84d.fill.icon-color-default svg {
		fill: #000;
		}
		#cozyBlock_3ea7b8ea_ebb3_4964_ba6a_f0889e3ca84d.outline.icon-color-default svg {
		stroke: #000;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_3ea7b8ea_ebb3_4964_ba6a_f0889e3ca84d"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"04bd8c60-1788-4786-9b31-740e891c1eef","iconViewBox":{"vx":0,"vy":0,"vw":24,"vh":17},"iconPath":"M23.2084 2.60777C22.9358 1.58129 22.1326 0.772873 21.1128 0.498524C19.2642 0 11.8519 0 11.8519 0C11.8519 0 4.43954 0 2.59097 0.498524C1.57114 0.772917 0.767925 1.58129 0.495312 2.60777C0 4.46832 0 8.35017 0 8.35017C0 8.35017 0 12.232 0.495312 14.0926C0.767925 15.1191 1.57114 15.8938 2.59097 16.1681C4.43954 16.6667 11.8519 16.6667 11.8519 16.6667C11.8519 16.6667 19.2642 16.6667 21.1128 16.1681C22.1326 15.8938 22.9358 15.1191 23.2084 14.0926C23.7037 12.232 23.7037 8.35017 23.7037 8.35017C23.7037 8.35017 23.7037 4.46832 23.2084 2.60777ZM9.4276 11.8746V4.82574L15.6229 8.35026L9.4276 11.8746Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#ff0000","bgDefaultColor":"#ff0000"} -->
<style>
		#cozyBlock_04bd8c60_1788_4786_9b31_740e891c1eef.stacked.icon-color-default {
		background: #ff0000;
		}
		#cozyBlock_04bd8c60_1788_4786_9b31_740e891c1eef.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_04bd8c60_1788_4786_9b31_740e891c1eef.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_04bd8c60_1788_4786_9b31_740e891c1eef.fill.icon-color-default svg {
		fill: #ff0000;
		}
		#cozyBlock_04bd8c60_1788_4786_9b31_740e891c1eef.outline.icon-color-default svg {
		stroke: #ff0000;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_04bd8c60_1788_4786_9b31_740e891c1eef"><svg viewBox="0 0 24 17" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M23.2084 2.60777C22.9358 1.58129 22.1326 0.772873 21.1128 0.498524C19.2642 0 11.8519 0 11.8519 0C11.8519 0 4.43954 0 2.59097 0.498524C1.57114 0.772917 0.767925 1.58129 0.495312 2.60777C0 4.46832 0 8.35017 0 8.35017C0 8.35017 0 12.232 0.495312 14.0926C0.767925 15.1191 1.57114 15.8938 2.59097 16.1681C4.43954 16.6667 11.8519 16.6667 11.8519 16.6667C11.8519 16.6667 19.2642 16.6667 21.1128 16.1681C22.1326 15.8938 22.9358 15.1191 23.2084 14.0926C23.7037 12.232 23.7037 8.35017 23.7037 8.35017C23.7037 8.35017 23.7037 4.46832 23.2084 2.60777ZM9.4276 11.8746V4.82574L15.6229 8.35026L9.4276 11.8746Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"cb7b9f40-a70b-4272-8c97-4a5a2484772e","iconViewBox":{"vx":0,"vy":0,"vw":22,"vh":22},"iconPath":"M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)","bgDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)"} -->
<style>
		#cozyBlock_cb7b9f40_a70b_4272_8c97_4a5a2484772e.stacked.icon-color-default {
		background: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_cb7b9f40_a70b_4272_8c97_4a5a2484772e.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_cb7b9f40_a70b_4272_8c97_4a5a2484772e.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_cb7b9f40_a70b_4272_8c97_4a5a2484772e.fill.icon-color-default svg {
		fill: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_cb7b9f40_a70b_4272_8c97_4a5a2484772e.outline.icon-color-default svg {
		stroke: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_cb7b9f40_a70b_4272_8c97_4a5a2484772e"><svg viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker --></div>
<!-- /wp:cozy-block/social-icon --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/grid -->

<!-- wp:cozy-block/grid -->
<div class="cozy-block-grid"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"zoom-in-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":800}} -->
<div class="wp-block-group"><!-- wp:image {"id":2541,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-2541"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":4,"placeholder":"John Carter","style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}},"spacing":{"margin":{"top":"10px","bottom":"4px"}}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#090b10;margin-top:10px;margin-bottom:4px;font-size:20px;font-style:normal;font-weight:500">Carl</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","style":{"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}}},"fontSize":"small"} -->
<p class="has-text-align-center has-text-color has-link-color has-small-font-size" style="color:#646464"><?php esc_html_e( 'UI/UX Designer', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"left":"16px"},"margin":{"top":"12px"}}},"layout":{"type":"constrained","contentSize":"144px"}} -->
<div class="wp-block-group" style="margin-top:12px;padding-left:16px"><!-- wp:cozy-block/social-icon {"blockClientId":"27a143e1-3eac-4593-ac0b-412ced32d8b7","iconSize":12,"iconColorLayout":"custom","gap":6,"boxStyles":{"padding":{"top":6,"right":6,"bottom":6,"left":6},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColor":"#646464","bgColorHover":"#f49805"}} -->
<div class="cozy-block-social-icon stacked fill icon-color-custom" id="cozyBlock_27a143e1_3eac_4593_ac0b_412ced32d8b7"><!-- wp:cozy-block/social-icon-picker {"blockClientId":"e31d6500-317d-4956-bc32-d7656a7c2ebd","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#1877f2","bgDefaultColor":"#1877f2"} -->
<style>
		#cozyBlock_e31d6500_317d_4956_bc32_d7656a7c2ebd.stacked.icon-color-default {
		background: #1877f2;
		}
		#cozyBlock_e31d6500_317d_4956_bc32_d7656a7c2ebd.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_e31d6500_317d_4956_bc32_d7656a7c2ebd.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_e31d6500_317d_4956_bc32_d7656a7c2ebd.fill.icon-color-default svg {
		fill: #1877f2;
		}
		#cozyBlock_e31d6500_317d_4956_bc32_d7656a7c2ebd.outline.icon-color-default svg {
		stroke: #1877f2;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_e31d6500_317d_4956_bc32_d7656a7c2ebd"><svg viewBox="0 0 14 25" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12.5122 14.0625L13.2065 9.53809H8.86523V6.60205C8.86523 5.36426 9.47168 4.15771 11.416 4.15771H13.3896V0.305664C13.3896 0.305664 11.5986 0 9.88623 0C6.31104 0 3.97412 2.16699 3.97412 6.08984V9.53809H0V14.0625H3.97412V25H8.86523V14.0625H12.5122Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"892dad60-5ca9-4ea0-9f66-b791e72c0df9","iconViewBox":{"vx":0,"vy":0,"vw":24,"vh":24},"iconPath":"M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#000","bgDefaultColor":"#000"} -->
<style>
		#cozyBlock_892dad60_5ca9_4ea0_9f66_b791e72c0df9.stacked.icon-color-default {
		background: #000;
		}
		#cozyBlock_892dad60_5ca9_4ea0_9f66_b791e72c0df9.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_892dad60_5ca9_4ea0_9f66_b791e72c0df9.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_892dad60_5ca9_4ea0_9f66_b791e72c0df9.fill.icon-color-default svg {
		fill: #000;
		}
		#cozyBlock_892dad60_5ca9_4ea0_9f66_b791e72c0df9.outline.icon-color-default svg {
		stroke: #000;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_892dad60_5ca9_4ea0_9f66_b791e72c0df9"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"028a28b6-d877-4e4e-b074-e831bc459119","iconViewBox":{"vx":0,"vy":0,"vw":24,"vh":17},"iconPath":"M23.2084 2.60777C22.9358 1.58129 22.1326 0.772873 21.1128 0.498524C19.2642 0 11.8519 0 11.8519 0C11.8519 0 4.43954 0 2.59097 0.498524C1.57114 0.772917 0.767925 1.58129 0.495312 2.60777C0 4.46832 0 8.35017 0 8.35017C0 8.35017 0 12.232 0.495312 14.0926C0.767925 15.1191 1.57114 15.8938 2.59097 16.1681C4.43954 16.6667 11.8519 16.6667 11.8519 16.6667C11.8519 16.6667 19.2642 16.6667 21.1128 16.1681C22.1326 15.8938 22.9358 15.1191 23.2084 14.0926C23.7037 12.232 23.7037 8.35017 23.7037 8.35017C23.7037 8.35017 23.7037 4.46832 23.2084 2.60777ZM9.4276 11.8746V4.82574L15.6229 8.35026L9.4276 11.8746Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#ff0000","bgDefaultColor":"#ff0000"} -->
<style>
		#cozyBlock_028a28b6_d877_4e4e_b074_e831bc459119.stacked.icon-color-default {
		background: #ff0000;
		}
		#cozyBlock_028a28b6_d877_4e4e_b074_e831bc459119.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_028a28b6_d877_4e4e_b074_e831bc459119.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_028a28b6_d877_4e4e_b074_e831bc459119.fill.icon-color-default svg {
		fill: #ff0000;
		}
		#cozyBlock_028a28b6_d877_4e4e_b074_e831bc459119.outline.icon-color-default svg {
		stroke: #ff0000;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_028a28b6_d877_4e4e_b074_e831bc459119"><svg viewBox="0 0 24 17" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M23.2084 2.60777C22.9358 1.58129 22.1326 0.772873 21.1128 0.498524C19.2642 0 11.8519 0 11.8519 0C11.8519 0 4.43954 0 2.59097 0.498524C1.57114 0.772917 0.767925 1.58129 0.495312 2.60777C0 4.46832 0 8.35017 0 8.35017C0 8.35017 0 12.232 0.495312 14.0926C0.767925 15.1191 1.57114 15.8938 2.59097 16.1681C4.43954 16.6667 11.8519 16.6667 11.8519 16.6667C11.8519 16.6667 19.2642 16.6667 21.1128 16.1681C22.1326 15.8938 22.9358 15.1191 23.2084 14.0926C23.7037 12.232 23.7037 8.35017 23.7037 8.35017C23.7037 8.35017 23.7037 4.46832 23.2084 2.60777ZM9.4276 11.8746V4.82574L15.6229 8.35026L9.4276 11.8746Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"0e88c22d-f53f-4942-b5b5-c5890eeb21a9","iconViewBox":{"vx":0,"vy":0,"vw":22,"vh":22},"iconPath":"M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)","bgDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)"} -->
<style>
		#cozyBlock_0e88c22d_f53f_4942_b5b5_c5890eeb21a9.stacked.icon-color-default {
		background: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_0e88c22d_f53f_4942_b5b5_c5890eeb21a9.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_0e88c22d_f53f_4942_b5b5_c5890eeb21a9.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_0e88c22d_f53f_4942_b5b5_c5890eeb21a9.fill.icon-color-default svg {
		fill: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_0e88c22d_f53f_4942_b5b5_c5890eeb21a9.outline.icon-color-default svg {
		stroke: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_0e88c22d_f53f_4942_b5b5_c5890eeb21a9"><svg viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker --></div>
<!-- /wp:cozy-block/social-icon --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/grid --></div></div>
<!-- /wp:cozy-block/teams --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->