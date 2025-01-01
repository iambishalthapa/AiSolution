<?php
/**
 * Title: Hero Section with stacked columns
 * Description: This is a hero section.
 * Slug: cozy-block-patterns/hero-eighteen
 * Categories: cozy-block-patterns, hero
 * Premium: true
 */

$images = array(
	CT_ASSETS_URL . 'images/hero_18.png',
	CT_ASSETS_URL . 'images/hero_18_1.png',
	CT_ASSETS_URL . 'images/hero_18_2.png',
	CT_ASSETS_URL . 'images/hero_18_3.png',
	CT_ASSETS_URL . 'images/hero_18_4.png',
);
?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Hero', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"color":{"background":"#fffffe"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"align":"full","style":{"background":{"backgroundImage":{"url":"<?php echo esc_url( $images[0] ); ?>","id":1815,"source":"file","title":"hero_18-5"}},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-text-color has-link-color" style="color:#fffffe;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;margin-top:0;margin-bottom:0"><!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"right":"16px","left":"16px","top":"80px","bottom":"0px"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:0px;padding-left:16px"><!-- wp:columns {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"26px"}}}} -->
<div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0","padding":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained","contentSize":"628px"}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:0px;padding-bottom:0px"><!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"bottom":"26px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-bottom:26px"><!-- wp:group {"style":{"border":{"left":{"color":"#00c6e1","width":"4px"},"top":[],"right":[],"bottom":[]},"spacing":{"padding":{"left":"10px"}},"typography":{"fontSize":"16px","textTransform":"uppercase"}},"layout":{"type":"constrained","contentSize":"","justifyContent":"center"},"cozyCustomFont":"Poppins"} -->
<div class="wp-block-group" style="border-left-color:#00c6e1;border-left-width:4px;padding-left:10px;font-size:16px;text-transform:uppercase"><!-- wp:paragraph -->
<p><?php esc_html_e( 'Best Health Solution', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"typography":{"fontSize":"44px","lineHeight":"1.2","fontStyle":"normal","fontWeight":"700"}},"cozyCustomFont":"Work Sans"} -->
<h2 class="wp-block-heading has-text-color has-link-color" style="color:#fffffe;font-size:44px;font-style:normal;font-weight:700;line-height:1.2"><?php esc_html_e( 'Healthcare Solutions For Brighter Future', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"14px"},"color":{"text":"#ebebeb"},"elements":{"link":{"color":{"text":"#ebebeb"}}},"spacing":{"margin":{"top":"6px","bottom":"26px"}}},"cozyCustomFont":"Poppins"} -->
<p class="has-text-color has-link-color" style="color:#ebebeb;margin-top:6px;margin-bottom:26px;font-size:14px;font-style:normal;font-weight:500"><?php esc_html_e( 'Frustrated by a slow website? We’ll help you tame those speed demons so you can keep visitors coming back for more!', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"500","textDecoration":"none"}}} -->
<div class="wp-block-buttons has-custom-font-size" style="font-size:16px;font-style:normal;font-weight:500;text-decoration:none"><!-- wp:button {"style":{"border":{"radius":"10px"},"color":{"background":"#00c6e1","text":"#fffffe"},"elements":{"link":{"color":{"text":"#fffffe"}}},"spacing":{"padding":{"left":"36px","right":"36px","top":"14px","bottom":"14px"}}},"cozyHoverEffect":{"boxShadow":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":true,"transform":{"translateX":0,"translateY":"-2","rotate":0,"scale":1}},"cozyHoverStyles":{"bgColor":"#f49805","color":"#fffffe","borderColor":""}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background has-link-color wp-element-button" style="border-radius:10px;color:#fffffe;background-color:#00c6e1;padding-top:14px;padding-right:36px;padding-bottom:14px;padding-left:36px"><?php esc_html_e( 'Book Appointment', 'cozy-addons' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column"><!-- wp:image {"id":1791,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-1791"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"16px","left":"16px","bottom":"40px","top":"0px"}}},"layout":{"type":"constrained","contentSize":"1180px"},"cozyResponsiveShow":{"desktopShow":true,"tabletShow":true,"tabletViewport":980,"mobileShow":false,"mobileViewport":767}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0px;padding-right:16px;padding-bottom:40px;padding-left:16px"><!-- wp:cozy-block/container {"blockClientId":"a9f495c0-590d-44a7-8c89-c8fc3607a654","margin":{"top":"-80","right":"0","bottom":0,"left":"0"},"zIndex":"1"} -->
<div class="wp-block-cozy-block-container"><div class="cozy-block-container visibility-none border-none hover-border-none
		
	" id="cozyBlock_a9f495c0_590d_44a7_8c89_c8fc3607a654"><div style="position:relative;z-index:10"><!-- wp:columns {"style":{"typography":{"fontSize":"14px"},"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}},"spacing":{"blockGap":{"top":"26px","left":"20px"},"padding":{"right":"16px","left":"16px"}}},"cozyCustomFont":"Public Sans"} -->
<div class="wp-block-columns has-text-color has-link-color" style="color:#646464;padding-right:16px;padding-left:16px;font-size:14px"><!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column"><!-- wp:group {"style":{"border":{"radius":"20px"},"spacing":{"padding":{"top":"36px","bottom":"40px","left":"16px","right":"16px"},"blockGap":"0"},"color":{"background":"#fffffe"}},"layout":{"type":"constrained","contentSize":"272px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#b8e4ea","horizontal":0,"vertical":4,"blur":35,"spread":-18,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}},"cozyAnimation":{"type":"fade-right","easingFunction":"ease-in","anchorPlacement":"top-center","duration":800}} -->
<div class="wp-block-group has-background" style="border-radius:20px;background-color:#fffffe;padding-top:36px;padding-right:16px;padding-bottom:40px;padding-left:16px"><!-- wp:image {"id":1792,"scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-1792" style="object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#161e1f"},"elements":{"link":{"color":{"text":"#161e1f"}}},"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"16px","bottom":"6px"}}},"cozyCustomFont":"Inter"} -->
<h3 class="wp-block-heading has-text-color has-link-color" style="color:#161e1f;margin-top:16px;margin-bottom:6px;font-size:20px;font-style:normal;font-weight:500"><?php esc_html_e( 'Qualified Doctors', 'cozy-addons' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Lorem ipsum dolor sit amet, vet elit at consectetur adipiscing elit. liqua vel cur magna at enisus', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column"><!-- wp:group {"style":{"border":{"radius":"20px"},"spacing":{"padding":{"top":"36px","bottom":"40px","left":"16px","right":"16px"},"blockGap":"0"},"color":{"background":"#fffffe"}},"layout":{"type":"constrained","contentSize":"272px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#b8e4ea","horizontal":0,"vertical":4,"blur":35,"spread":-18,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}},"cozyAnimation":{"type":"fade-up","easingFunction":"ease","anchorPlacement":"top-center","duration":600}} -->
<div class="wp-block-group has-background" style="border-radius:20px;background-color:#fffffe;padding-top:36px;padding-right:16px;padding-bottom:40px;padding-left:16px"><!-- wp:image {"id":1805,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $images[3] ); ?>" alt="" class="wp-image-1805"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#161e1f"},"elements":{"link":{"color":{"text":"#161e1f"}}},"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"16px","bottom":"6px"}}},"cozyCustomFont":"Inter"} -->
<h3 class="wp-block-heading has-text-color has-link-color" style="color:#161e1f;margin-top:16px;margin-bottom:6px;font-size:20px;font-style:normal;font-weight:500"><?php esc_html_e( 'Best Treatment', 'cozy-addons' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Lorem ipsum dolor sit amet, vet elit at consectetur adipiscing elit. liqua vel cur magna at enisus', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column"><!-- wp:group {"style":{"border":{"radius":"20px"},"spacing":{"padding":{"top":"36px","bottom":"40px","left":"16px","right":"16px"},"blockGap":"0"},"color":{"background":"#fffffe"}},"layout":{"type":"constrained","contentSize":"272px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#b8e4ea","horizontal":0,"vertical":4,"blur":35,"spread":-18,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}},"cozyAnimation":{"type":"fade-left","easingFunction":"ease-in","anchorPlacement":"top-center","duration":800}} -->
<div class="wp-block-group has-background" style="border-radius:20px;background-color:#fffffe;padding-top:36px;padding-right:16px;padding-bottom:40px;padding-left:16px"><!-- wp:image {"id":1806,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $images[4] ); ?>" alt="" class="wp-image-1806"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#161e1f"},"elements":{"link":{"color":{"text":"#161e1f"}}},"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"16px","bottom":"6px"}}},"cozyCustomFont":"Inter"} -->
<h3 class="wp-block-heading has-text-color has-link-color" style="color:#161e1f;margin-top:16px;margin-bottom:6px;font-size:20px;font-style:normal;font-weight:500"><?php esc_html_e( 'Emergency Service', 'cozy-addons' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Lorem ipsum dolor sit amet, vet elit at consectetur adipiscing elit. liqua vel cur magna at enisus', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div></div>
<!-- /wp:cozy-block/container --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->