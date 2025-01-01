<?php
/**
 * Title: Hero Section with background image shape divider
 * Description: This is a hero section with background image shape divider.
 * Slug: cozy-block-patterns/hero-fifteen
 * Categories: cozy-block-patterns, hero
 * Premium: true
 */

$images = array(
	CT_ASSETS_URL . 'images/hero_15_2.png',
	CT_ASSETS_URL . 'images/hero_15_1.png',
);
?>


<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Hero', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}},"color":{"gradient":"linear-gradient(135deg,rgb(96,0,217) 0%,rgb(33,30,177) 53%,rgb(33,30,177) 100%)"},"dimensions":{"minHeight":""}},"layout":{"type":"constrained","contentSize":"100%","justifyContent":"center"}} -->
<div class="wp-block-group alignfull has-background" style="background:linear-gradient(135deg,rgb(96,0,217) 0%,rgb(33,30,177) 53%,rgb(33,30,177) 100%);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cozy-block/container {"blockClientId":"baee9e61-cf2e-49aa-a900-1e4584fcc854","mediaId":4617,"mediaUrl":"<?php echo esc_url( $images[0] ); ?>","margin":{"top":"0","right":"0","bottom":"0","left":"0"},"shapeDivider":{"enabled":true,"margin":{"top":"0","right":0,"bottom":"0","left":0},"height":200,"position":"bottom","flip":"right","svg":"\u003csvg viewBox=\u00220 0 519 74\u0022 fill=\u0022none\u0022 xmlns=\u0022http://www.w3.org/2000/svg\u0022 preserveAspectRatio=\u0022none\u0022\u003e\n\t\t\t\u003cpath d=\u0022M169.098 27.8138C51.2243 -15.9419 -3.33485 24.3353 0.157424 74L519 74V0C443.169 94.8591 313.592 81.4516 169.098 27.8138Z\u0022/\u003e\n\t\t  \t\u003c/svg\u003e","color":"#fff"}} -->
<div class="wp-block-cozy-block-container"><div class="cozy-block-container visibility-none border-none hover-border-none
		shape-divider-position-bottom shape-divider-flip-right 
	" id="cozyBlock_baee9e61_cf2e_49aa_a900_1e4584fcc854"><div style="position:relative;z-index:10"><!-- wp:group {"style":{"spacing":{"padding":{"top":"10px","bottom":"10px","left":"16px","right":"16px"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="padding-top:10px;padding-right:16px;padding-bottom:10px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0"><!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":45} /-->

<!-- wp:site-title {"textAlign":"left","style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"typography":{"fontSize":"25px"}}} /--></div>
<!-- /wp:group -->

<!-- wp:navigation {"customTextColor":"#fffffe","customOverlayTextColor":"#090b10","layout":{"type":"flex","justifyContent":"center"},"style":{"typography":{"fontSize":"16px"}},"cozyHoverColor":{"menuText":"#f49805","menuBg":"","submenuText":"","submenuBg":""}} -->
<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Home', 'cozy-addons' ); ?>","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"<?php esc_html_e( 'About Us', 'cozy-addons' ); ?>","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Pricing', 'cozy-addons' ); ?>","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Blog', 'cozy-addons' ); ?>","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Contact', 'cozy-addons' ); ?>","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- /wp:navigation -->
<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"fontSize":"16px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right"},"cozyCustomFont":"Poppins"} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#fffffe;margin-top:0;margin-bottom:0;font-size:16px"><!-- wp:loginout /-->

<!-- wp:buttons {"style":{"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"500","textDecoration":"none"}}} -->
<div class="wp-block-buttons has-custom-font-size" style="font-size:14px;font-style:normal;font-weight:500;text-decoration:none"><!-- wp:button {"style":{"color":{"text":"#211eb1","background":"#fffffe"},"elements":{"link":{"color":{"text":"#211eb1"}}},"border":{"radius":"100px"},"spacing":{"padding":{"left":"24px","right":"24px","top":"10px","bottom":"10px"}}},"cozyHoverStyles":{"bgColor":"#ff9900","color":"#fffffe","borderColor":""}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background has-link-color wp-element-button" style="border-radius:100px;color:#211eb1;background-color:#fffffe;padding-top:10px;padding-right:24px;padding-bottom:10px;padding-left:24px"><?php esc_html_e( 'Start Free Trial', 'cozy-addons' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"60px","bottom":"var:preset|spacing|70","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:60px;padding-right:0;padding-bottom:var(--wp--preset--spacing--70);padding-left:0"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"0px","padding":{"right":"16px","left":"16px"}}},"layout":{"type":"constrained","contentSize":"561px"}} -->
<div class="wp-block-group" style="padding-right:16px;padding-left:16px"><!-- wp:buttons {"style":{"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"500","textDecoration":"none","textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-buttons has-custom-font-size" style="margin-top:0;margin-bottom:0;font-size:14px;font-style:normal;font-weight:500;text-decoration:none;text-transform:uppercase"><!-- wp:button {"style":{"color":{"text":"#fffffe","background":"#fffffe00"},"elements":{"link":{"color":{"text":"#fffffe"}}},"border":{"radius":"100px","color":"#ffffff40","width":"1px"},"spacing":{"padding":{"left":"16px","right":"16px","top":"6px","bottom":"6px"}}},"cozyHoverStyles":{"bgColor":"#ff9900","color":"#fffffe","borderColor":"#ff9900"}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background has-link-color has-border-color wp-element-button" style="border-color:#ffffff40;border-width:1px;border-radius:100px;color:#fffffe;background-color:#fffffe00;padding-top:6px;padding-right:16px;padding-bottom:6px;padding-left:16px"><?php esc_html_e( 'Your Best Template', 'cozy-addons' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"#ebebeb"}}},"color":{"text":"#ebebeb"},"spacing":{"blockGap":"6px"}},"layout":{"type":"constrained"},"cozyCustomFont":"Poppins"} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#ebebeb"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"typography":{"lineHeight":"1.3","fontSize":"54px","fontStyle":"normal","fontWeight":"600"}},"cozyCustomFont":"Public Sans"} -->
<h2 class="wp-block-heading has-text-color has-link-color" style="color:#fffffe;font-size:54px;font-style:normal;font-weight:600;line-height:1.3"><?php esc_html_e( 'Discover Our Cutting-Edge SaaS Templates', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}}} -->
<p style="font-size:14px"><?php esc_html_e( 'Far far away, behind the word mountains, far from the countries Vocalic and Consonantal, there live the blind texts.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"500","textDecoration":"none"},"spacing":{"margin":{"top":"26px","bottom":"26px"}}}} -->
<div class="wp-block-buttons has-custom-font-size" style="margin-top:26px;margin-bottom:26px;font-size:14px;font-style:normal;font-weight:500;text-decoration:none"><!-- wp:button {"style":{"color":{"background":"#2797ff","text":"#fffffe"},"elements":{"link":{"color":{"text":"#fffffe"}}},"border":{"radius":"100px"},"spacing":{"padding":{"left":"36px","right":"36px","top":"14px","bottom":"14px"}}},"cozyHoverStyles":{"bgColor":"#ff9900","color":"#fffffe","borderColor":""}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background has-link-color wp-element-button" style="border-radius:100px;color:#fffffe;background-color:#2797ff;padding-top:14px;padding-right:36px;padding-bottom:14px;padding-left:36px"><?php esc_html_e( 'Discover More', 'cozy-addons' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":"0"}}} -->
<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:image {"id":4616,"sizeSlug":"full","linkDestination":"none","align":"right"} -->
<figure class="wp-block-image alignright size-full"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-4616"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div><div class="cozy-shape-divider-wrapper"><svg viewBox="0 0 519 74" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
			<path d="M169.098 27.8138C51.2243 -15.9419 -3.33485 24.3353 0.157424 74L519 74V0C443.169 94.8591 313.592 81.4516 169.098 27.8138Z"/>
				</svg></div></div></div>
<!-- /wp:cozy-block/container --></div>
<!-- /wp:group -->