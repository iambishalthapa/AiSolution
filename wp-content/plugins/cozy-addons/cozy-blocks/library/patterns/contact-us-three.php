<?php
/**
 * Title: Contact Us section three with column animation map
 * Description: This is contact us section with column, animation, map
 * Slug: cozy-block-patterns/contact-us-three
 * Categories: cozy-block-patterns, contact-us
 */


$images = array(
	CT_ASSETS_URL . 'images/contact-us_3_1.jpg',
);
?>


<!-- wp:group {"metadata":{"name":"Contact Us"},"align":"full","style":{"color":{"background":"#fffffe","text":"#646464"},"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}},"typography":{"fontSize":"14px"},"elements":{"link":{"color":{"text":"#646464"}}}},"layout":{"type":"constrained","contentSize":"100%"},"cozyCustomFont":"Public Sans"} -->
<div class="wp-block-group alignfull has-text-color has-background has-link-color" style="color:#646464;background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-size:14px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"top":"80px","bottom":"80px"}},"background":{"backgroundImage":{"url":"<?php echo esc_url( $images[0] ); ?>","id":1411,"source":"file","title":"contact-us_3_1"}}},"layout":{"type":"constrained","contentSize":"570px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-bottom:80px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"1.3","fontSize":"44px","fontStyle":"normal","fontWeight":"600"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}}},"cozyCustomFont":"Inter","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#090b10;font-size:44px;font-style:normal;font-weight:600;line-height:1.3"><?php esc_html_e( 'Contact Us', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.3"},"spacing":{"margin":{"top":"6px","bottom":"6px"}}},"fontSize":"x-small"} -->
<p class="has-text-align-center has-x-small-font-size" style="margin-top:6px;margin-bottom:6px;line-height:1.3"><?php esc_html_e( 'Far far away, behind the word mountains, far from the countries Vocalic and Consonantal, there live the blind texts. Separated they live.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"16px","left":"16px","top":"60px","bottom":"60px"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:60px;padding-right:16px;padding-bottom:60px;padding-left:16px"><!-- wp:columns {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"40%","style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"fade-up","easingFunction":"ease","anchorPlacement":"top-center","duration":600}} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:heading {"textAlign":"left","style":{"typography":{"lineHeight":"1.3","fontSize":"44px","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}},"spacing":{"margin":{"bottom":"16px"}}},"cozyCustomFont":"Inter","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color" style="color:#090b10;margin-bottom:16px;font-size:44px;font-style:normal;font-weight:500;line-height:1.3"><?php esc_html_e( 'You Can Find Us At', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:cozy-block/icon-list {"blockClientId":"f425c722-a369-4736-beb3-eda0ce2d445d","iconSize":20,"iconColor":"#3620be","iconColorHover":"#f49805","iconGap":12,"containerStyles":{"width":311,"height":"","gap":16,"padding":{"top":0,"right":0,"bottom":0,"left":0},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":{"top":5,"right":5,"bottom":5,"left":5},"bgColor":"","bgColorHover":""},"typography":{"fontFamily":"","fontSize":16,"color":"#090b10","colorHover":"#f49805","fontWeight":400}} -->
<ul class="cozy-block-icon-list vertical default fill" id="cozyBlock_f425c722_a369_4736_beb3_eda0ce2d445d"><!-- wp:cozy-block/list-item {"blockClientId":"5e1902b2-469b-4d78-8d78-85de2a749706","iconViewBox":{"vx":"0","vy":"0","vw":"16","vh":"16"},"iconPath":"M14.292 15.5C12.5559 15.5 10.8406 15.1215 9.14616 14.3646C7.45171 13.6076 5.91005 12.5347 4.52116 11.1458C3.13227 9.75694 2.05935 8.21528 1.30241 6.52083C0.545464 4.82639 0.166992 3.11111 0.166992 1.375C0.166992 1.125 0.250326 0.916667 0.416992 0.75C0.583659 0.583333 0.791992 0.5 1.04199 0.5H4.41699C4.61144 0.5 4.78505 0.565972 4.93783 0.697917C5.0906 0.829861 5.18088 0.986111 5.20866 1.16667L5.75033 4.08333C5.7781 4.30556 5.77116 4.49306 5.72949 4.64583C5.68783 4.79861 5.61144 4.93056 5.50033 5.04167L3.47949 7.08333C3.75727 7.59722 4.08713 8.09375 4.46908 8.57292C4.85102 9.05208 5.27116 9.51389 5.72949 9.95833C6.16005 10.3889 6.61144 10.7882 7.08366 11.1562C7.55588 11.5243 8.05588 11.8611 8.58366 12.1667L10.542 10.2083C10.667 10.0833 10.8302 9.98958 11.0316 9.92708C11.233 9.86458 11.4309 9.84722 11.6253 9.875L14.5003 10.4583C14.6948 10.5139 14.8545 10.6146 14.9795 10.7604C15.1045 10.9062 15.167 11.0694 15.167 11.25V14.625C15.167 14.875 15.0837 15.0833 14.917 15.25C14.7503 15.4167 14.542 15.5 14.292 15.5Z","parentAttrs":{"enableLogo":true,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"left"},"title":"<?php esc_html_e( '(321)234-8756', 'cozy-addons' ); ?>"} -->
<div class="list-inline-block"><li class="cozy-block-list-item" id="cozyBlock_5e1902b2_469b_4d78_8d78_85de2a749706"><div class="list-icon-wrapper"><svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M14.292 15.5C12.5559 15.5 10.8406 15.1215 9.14616 14.3646C7.45171 13.6076 5.91005 12.5347 4.52116 11.1458C3.13227 9.75694 2.05935 8.21528 1.30241 6.52083C0.545464 4.82639 0.166992 3.11111 0.166992 1.375C0.166992 1.125 0.250326 0.916667 0.416992 0.75C0.583659 0.583333 0.791992 0.5 1.04199 0.5H4.41699C4.61144 0.5 4.78505 0.565972 4.93783 0.697917C5.0906 0.829861 5.18088 0.986111 5.20866 1.16667L5.75033 4.08333C5.7781 4.30556 5.77116 4.49306 5.72949 4.64583C5.68783 4.79861 5.61144 4.93056 5.50033 5.04167L3.47949 7.08333C3.75727 7.59722 4.08713 8.09375 4.46908 8.57292C4.85102 9.05208 5.27116 9.51389 5.72949 9.95833C6.16005 10.3889 6.61144 10.7882 7.08366 11.1562C7.55588 11.5243 8.05588 11.8611 8.58366 12.1667L10.542 10.2083C10.667 10.0833 10.8302 9.98958 11.0316 9.92708C11.233 9.86458 11.4309 9.84722 11.6253 9.875L14.5003 10.4583C14.6948 10.5139 14.8545 10.6146 14.9795 10.7604C15.1045 10.9062 15.167 11.0694 15.167 11.25V14.625C15.167 14.875 15.0837 15.0833 14.917 15.25C14.7503 15.4167 14.542 15.5 14.292 15.5Z"></path></svg></div><p><?php esc_html_e( '(321)234-8756', 'cozy-addons' ); ?></p></li></div>
<!-- /wp:cozy-block/list-item -->

<!-- wp:cozy-block/list-item {"blockClientId":"101e9fd3-ea58-421c-8243-0609ac1cfb86","iconViewBox":{"vx":"0","vy":"0","vw":"25","vh":"19"},"iconPath":"M24.5264 6.19141C24.7168 6.04004 25 6.18164 25 6.4209V16.4062C25 17.7002 23.9502 18.75 22.6562 18.75H2.34375C1.0498 18.75 0 17.7002 0 16.4062V6.42578C0 6.18164 0.27832 6.04492 0.473633 6.19629C1.56738 7.0459 3.01758 8.125 7.99805 11.7432C9.02832 12.4951 10.7666 14.0771 12.5 14.0674C14.2432 14.082 16.0156 12.4658 17.0068 11.7432C21.9873 8.125 23.4326 7.04102 24.5264 6.19141ZM12.5 12.5C13.6328 12.5195 15.2637 11.0742 16.084 10.4785C22.5635 5.77637 23.0566 5.36621 24.5508 4.19434C24.834 3.97461 25 3.63281 25 3.27148V2.34375C25 1.0498 23.9502 0 22.6562 0H2.34375C1.0498 0 0 1.0498 0 2.34375V3.27148C0 3.63281 0.166016 3.96973 0.449219 4.19434C1.94336 5.36133 2.43652 5.77637 8.91602 10.4785C9.73633 11.0742 11.3672 12.5195 12.5 12.5Z","parentAttrs":{"enableLogo":true,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"left"},"title":"<?php esc_html_e( 'sample@email.com', 'cozy-addons' ); ?>","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_101e9fd3_ea58_421c_8243_0609ac1cfb86"><div class="list-icon-wrapper"><svg viewBox="0 0 25 19" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M24.5264 6.19141C24.7168 6.04004 25 6.18164 25 6.4209V16.4062C25 17.7002 23.9502 18.75 22.6562 18.75H2.34375C1.0498 18.75 0 17.7002 0 16.4062V6.42578C0 6.18164 0.27832 6.04492 0.473633 6.19629C1.56738 7.0459 3.01758 8.125 7.99805 11.7432C9.02832 12.4951 10.7666 14.0771 12.5 14.0674C14.2432 14.082 16.0156 12.4658 17.0068 11.7432C21.9873 8.125 23.4326 7.04102 24.5264 6.19141ZM12.5 12.5C13.6328 12.5195 15.2637 11.0742 16.084 10.4785C22.5635 5.77637 23.0566 5.36621 24.5508 4.19434C24.834 3.97461 25 3.63281 25 3.27148V2.34375C25 1.0498 23.9502 0 22.6562 0H2.34375C1.0498 0 0 1.0498 0 2.34375V3.27148C0 3.63281 0.166016 3.96973 0.449219 4.19434C1.94336 5.36133 2.43652 5.77637 8.91602 10.4785C9.73633 11.0742 11.3672 12.5195 12.5 12.5Z"></path></svg></div><p><?php esc_html_e( 'sample@email.com', 'cozy-addons' ); ?></p></li></a></div>
<!-- /wp:cozy-block/list-item -->

<!-- wp:cozy-block/list-item {"blockClientId":"16d8cc07-5add-42e6-85ea-f491b4903be3","iconViewBox":{"vx":"0","vy":"0","vw":"19","vh":"25"},"iconPath":"M8.41152 24.4956C1.31689 14.2105 0 13.1549 0 9.375C0 4.19731 4.19731 0 9.375 0C14.5527 0 18.75 4.19731 18.75 9.375C18.75 13.1549 17.4331 14.2105 10.3385 24.4956C9.8729 25.1682 8.87705 25.1681 8.41152 24.4956ZM9.375 13.2812C11.5324 13.2812 13.2812 11.5324 13.2812 9.375C13.2812 7.21763 11.5324 5.46875 9.375 5.46875C7.21763 5.46875 5.46875 7.21763 5.46875 9.375C5.46875 11.5324 7.21763 13.2812 9.375 13.2812Z","parentAttrs":{"enableLogo":true,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"left"},"title":"<?php esc_html_e( '2345 Beach,Rd Metrocity USA, HWY 1235', 'cozy-addons' ); ?>"} -->
<div class="list-inline-block"><li class="cozy-block-list-item" id="cozyBlock_16d8cc07_5add_42e6_85ea_f491b4903be3"><div class="list-icon-wrapper"><svg viewBox="0 0 19 25" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M8.41152 24.4956C1.31689 14.2105 0 13.1549 0 9.375C0 4.19731 4.19731 0 9.375 0C14.5527 0 18.75 4.19731 18.75 9.375C18.75 13.1549 17.4331 14.2105 10.3385 24.4956C9.8729 25.1682 8.87705 25.1681 8.41152 24.4956ZM9.375 13.2812C11.5324 13.2812 13.2812 11.5324 13.2812 9.375C13.2812 7.21763 11.5324 5.46875 9.375 5.46875C7.21763 5.46875 5.46875 7.21763 5.46875 9.375C5.46875 11.5324 7.21763 13.2812 9.375 13.2812Z"></path></svg></div><p><?php esc_html_e( '2345 Beach,Rd Metrocity USA, HWY 1235', 'cozy-addons' ); ?></p></li></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"402px","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"26px"},"padding":{"top":"14px"}},"border":{"top":{"color":"#3620be40","width":"1px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-top-color:#3620be40;border-top-width:1px;margin-top:26px;padding-top:14px"><!-- wp:cozy-block/social-icon {"blockClientId":"21a57a91-a1be-4538-a3a0-c7b9cfb45d99","iconSize":14,"iconColorLayout":"custom","boxStyles":{"padding":{"top":10,"right":10,"bottom":10,"left":10},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColor":"#3620be","bgColorHover":"#f48905"}} -->
<div class="cozy-block-social-icon stacked fill icon-color-custom" id="cozyBlock_21a57a91_a1be_4538_a3a0_c7b9cfb45d99"><!-- wp:cozy-block/social-icon-picker {"blockClientId":"c083735e-7b46-427c-a387-3f27eac1786e","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#1877f2","bgDefaultColor":"#1877f2"} -->
<style>
		#cozyBlock_c083735e_7b46_427c_a387_3f27eac1786e.stacked.icon-color-default {
		background: #1877f2;
		}
		#cozyBlock_c083735e_7b46_427c_a387_3f27eac1786e.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_c083735e_7b46_427c_a387_3f27eac1786e.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_c083735e_7b46_427c_a387_3f27eac1786e.fill.icon-color-default svg {
		fill: #1877f2;
		}
		#cozyBlock_c083735e_7b46_427c_a387_3f27eac1786e.outline.icon-color-default svg {
		stroke: #1877f2;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_c083735e_7b46_427c_a387_3f27eac1786e"><svg viewBox="0 0 14 25" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12.5122 14.0625L13.2065 9.53809H8.86523V6.60205C8.86523 5.36426 9.47168 4.15771 11.416 4.15771H13.3896V0.305664C13.3896 0.305664 11.5986 0 9.88623 0C6.31104 0 3.97412 2.16699 3.97412 6.08984V9.53809H0V14.0625H3.97412V25H8.86523V14.0625H12.5122Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"c7ffc013-a791-4b8b-86bc-dc8b747a0e42","iconViewBox":{"vx":0,"vy":0,"vw":24,"vh":24},"iconPath":"M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#000","bgDefaultColor":"#000"} -->
<style>
		#cozyBlock_c7ffc013_a791_4b8b_86bc_dc8b747a0e42.stacked.icon-color-default {
		background: #000;
		}
		#cozyBlock_c7ffc013_a791_4b8b_86bc_dc8b747a0e42.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_c7ffc013_a791_4b8b_86bc_dc8b747a0e42.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_c7ffc013_a791_4b8b_86bc_dc8b747a0e42.fill.icon-color-default svg {
		fill: #000;
		}
		#cozyBlock_c7ffc013_a791_4b8b_86bc_dc8b747a0e42.outline.icon-color-default svg {
		stroke: #000;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_c7ffc013_a791_4b8b_86bc_dc8b747a0e42"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"265847da-be13-493c-bb55-480a5644cf0a","iconViewBox":{"vx":"0","vy":"0","vw":"22","vh":"22"},"iconPath":"M4.89648 21.8745H0.361328V7.27002H4.89648V21.8745ZM2.62646 5.27783C1.17627 5.27783 0 4.07666 0 2.62646C1.03799e-08 1.92988 0.276716 1.26183 0.769274 0.769274C1.26183 0.276716 1.92988 0 2.62646 0C3.32305 0 3.9911 0.276716 4.48366 0.769274C4.97621 1.26183 5.25293 1.92988 5.25293 2.62646C5.25293 4.07666 4.07617 5.27783 2.62646 5.27783ZM21.8701 21.8745H17.3447V14.7651C17.3447 13.0708 17.3105 10.8979 14.9868 10.8979C12.6289 10.8979 12.2676 12.7388 12.2676 14.6431V21.8745H7.73731V7.27002H12.0869V9.26221H12.1504C12.7559 8.11475 14.2349 6.90381 16.4414 6.90381C21.0312 6.90381 21.875 9.92627 21.875 13.8521V21.8745H21.8701Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"#0a66c2","bgDefaultColor":"#0a66c2"} -->
<style>
		#cozyBlock_265847da_be13_493c_bb55_480a5644cf0a.stacked.icon-color-default {
		background: #0a66c2;
		}
		#cozyBlock_265847da_be13_493c_bb55_480a5644cf0a.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_265847da_be13_493c_bb55_480a5644cf0a.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_265847da_be13_493c_bb55_480a5644cf0a.fill.icon-color-default svg {
		fill: #0a66c2;
		}
		#cozyBlock_265847da_be13_493c_bb55_480a5644cf0a.outline.icon-color-default svg {
		stroke: #0a66c2;
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_265847da_be13_493c_bb55_480a5644cf0a"><svg viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M4.89648 21.8745H0.361328V7.27002H4.89648V21.8745ZM2.62646 5.27783C1.17627 5.27783 0 4.07666 0 2.62646C1.03799e-08 1.92988 0.276716 1.26183 0.769274 0.769274C1.26183 0.276716 1.92988 0 2.62646 0C3.32305 0 3.9911 0.276716 4.48366 0.769274C4.97621 1.26183 5.25293 1.92988 5.25293 2.62646C5.25293 4.07666 4.07617 5.27783 2.62646 5.27783ZM21.8701 21.8745H17.3447V14.7651C17.3447 13.0708 17.3105 10.8979 14.9868 10.8979C12.6289 10.8979 12.2676 12.7388 12.2676 14.6431V21.8745H7.73731V7.27002H12.0869V9.26221H12.1504C12.7559 8.11475 14.2349 6.90381 16.4414 6.90381C21.0312 6.90381 21.875 9.92627 21.875 13.8521V21.8745H21.8701Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker -->

<!-- wp:cozy-block/social-icon-picker {"blockClientId":"7233fa21-100c-48fd-a20d-11914319e7ac","iconViewBox":{"vx":0,"vy":0,"vw":22,"vh":22},"iconPath":"M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z","parentAttrs":{"view":"stacked","layout":"fill","iconColorLayout":"custom"},"iconDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)","bgDefaultColor":"linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%)"} -->
<style>
		#cozyBlock_7233fa21_100c_48fd_a20d_11914319e7ac.stacked.icon-color-default {
		background: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_7233fa21_100c_48fd_a20d_11914319e7ac.stacked.fill.icon-color-default svg {
		fill: #fff;
		}
		#cozyBlock_7233fa21_100c_48fd_a20d_11914319e7ac.stacked.outline.icon-color-default svg {
		stroke: #fff;
		fill: none;
		}
		#cozyBlock_7233fa21_100c_48fd_a20d_11914319e7ac.fill.icon-color-default svg {
		fill: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		}
		#cozyBlock_7233fa21_100c_48fd_a20d_11914319e7ac.outline.icon-color-default svg {
		stroke: linear-gradient(180deg, #DA5353 -38.62%, #595FF4 61.38%);
		fill: none;
		}
	</style><a href="#" target="" rel="noopener"><div class="cozy-block-social-icon-picker stacked fill icon-color-custom" id="cozyBlock_7233fa21_100c_48fd_a20d_11914319e7ac"><svg viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M10.946 5.33081C7.84058 5.33081 5.33569 7.83569 5.33569 10.9412C5.33569 14.0466 7.84058 16.5515 10.946 16.5515C14.0515 16.5515 16.5564 14.0466 16.5564 10.9412C16.5564 7.83569 14.0515 5.33081 10.946 5.33081ZM10.946 14.5886C8.93921 14.5886 7.29858 12.9529 7.29858 10.9412C7.29858 8.92944 8.93433 7.2937 10.946 7.2937C12.9578 7.2937 14.5935 8.92944 14.5935 10.9412C14.5935 12.9529 12.9529 14.5886 10.946 14.5886ZM18.0945 5.10132C18.0945 5.82886 17.5085 6.40991 16.7859 6.40991C16.0584 6.40991 15.4773 5.82397 15.4773 5.10132C15.4773 4.37866 16.0632 3.79272 16.7859 3.79272C17.5085 3.79272 18.0945 4.37866 18.0945 5.10132ZM21.8103 6.42944C21.7273 4.67651 21.3269 3.12378 20.0427 1.84448C18.7634 0.565185 17.2107 0.164795 15.4578 0.0769043C13.6511 -0.0256348 8.23608 -0.0256348 6.42944 0.0769043C4.6814 0.159912 3.12866 0.560303 1.84448 1.8396C0.560303 3.1189 0.164795 4.67163 0.0769043 6.42456C-0.0256348 8.2312 -0.0256348 13.6462 0.0769043 15.4529C0.159912 17.2058 0.560303 18.7585 1.84448 20.0378C3.12866 21.3171 4.67651 21.7175 6.42944 21.8054C8.23608 21.908 13.6511 21.908 15.4578 21.8054C17.2107 21.7224 18.7634 21.322 20.0427 20.0378C21.322 18.7585 21.7224 17.2058 21.8103 15.4529C21.9128 13.6462 21.9128 8.23608 21.8103 6.42944ZM19.4763 17.3914C19.0955 18.3484 18.3582 19.0857 17.3962 19.4714C15.9558 20.0427 12.5378 19.9109 10.946 19.9109C9.35425 19.9109 5.9314 20.0378 4.49585 19.4714C3.53882 19.0906 2.80151 18.3533 2.41577 17.3914C1.84448 15.9509 1.97632 12.533 1.97632 10.9412C1.97632 9.34937 1.84937 5.92651 2.41577 4.49097C2.79663 3.53394 3.53394 2.79663 4.49585 2.41089C5.93628 1.8396 9.35425 1.97144 10.946 1.97144C12.5378 1.97144 15.9607 1.84448 17.3962 2.41089C18.3533 2.79175 19.0906 3.52905 19.4763 4.49097C20.0476 5.9314 19.9158 9.34937 19.9158 10.9412C19.9158 12.533 20.0476 15.9558 19.4763 17.3914Z"></path></svg></div></a>
<!-- /wp:cozy-block/social-icon-picker --></div>
<!-- /wp:cozy-block/social-icon --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"fade-up","easingFunction":"ease","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-column is-vertically-aligned-top"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","right":"0","left":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:html -->
<p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d87875.42875656532!2d-86.37198421745961!3d32.388118773485566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x888e8194b0d481f9%3A0x8e1b511d354285ff!2sMontgomery%2C%20AL%2C%20USA!5e0!3m2!1sen!2snp!4v1689317919328!5m2!1sen!2snp" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
<!-- /wp:html --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->