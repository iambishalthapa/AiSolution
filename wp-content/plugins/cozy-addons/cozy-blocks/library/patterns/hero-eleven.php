<?php
/**
 * Title: Hero Section with background image
 * Description: This is a hero section with background image.
 * Slug: cozy-block-patterns/hero-eleven
 * Categories: cozy-block-patterns, hero
 */

$images = array( CT_ASSETS_URL . 'images/hero_11.jpg' );
?>

<!-- wp:cover {"url":"<?php echo esc_url( $images[0] ); ?>","id":4007,"dimRatio":30,"isUserOverlayColor":true,"customGradient":"linear-gradient(135deg,rgba(7,14,40,0) 0%,rgb(7,14,40) 100%)","metadata":{"name":"Hero"},"align":"full","style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-cover alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-right:0;padding-bottom:var(--wp--preset--spacing--80);padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-30 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(135deg,rgba(7,14,40,0) 0%,rgb(7,14,40) 100%)"></span><img class="wp-block-cover__image-background wp-image-4007" alt="" src="<?php echo esc_url( $images[0] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"right":"16px","left":"16px","top":"80px","bottom":"80px"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"589px","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"border":{"left":{"color":"#f2024a","width":"4px"}},"spacing":{"padding":{"left":"10px"}},"typography":{"fontSize":"16px","textTransform":"uppercase"}},"layout":{"type":"constrained","contentSize":"","justifyContent":"center"},"cozyCustomFont":"Poppins"} -->
<div class="wp-block-group" style="border-left-color:#f2024a;border-left-width:4px;padding-left:10px;font-size:16px;text-transform:uppercase"><!-- wp:paragraph -->
<p><?php esc_html_e( 'We Provide Digital', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"typography":{"fontSize":"55px","lineHeight":"1.3","fontStyle":"normal","fontWeight":"600"}},"cozyCustomFont":"Work Sans"} -->
<h2 class="wp-block-heading has-text-color has-link-color" style="color:#fffffe;font-size:55px;font-style:normal;font-weight:600;line-height:1.3"><?php esc_html_e( 'Marketing Solution For Your Business!', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"14px"},"color":{"text":"#ebebeb"},"elements":{"link":{"color":{"text":"#ebebeb"}}}},"cozyCustomFont":"Poppins"} -->
<p class="has-text-color has-link-color" style="color:#ebebeb;font-size:14px;font-style:normal;font-weight:500"><?php esc_html_e( 'Frustrated by a slow website? We’ll help you tame those speed demons so you can keep visitors coming back for more!', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"26px"},"blockGap":"26px"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group" style="margin-top:26px"><!-- wp:buttons {"style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"500","textDecoration":"none"}}} -->
<div class="wp-block-buttons has-custom-font-size" style="font-size:16px;font-style:normal;font-weight:500;text-decoration:none"><!-- wp:button {"style":{"border":{"radius":"100px"},"color":{"background":"#f2024a","text":"#fffffe"},"elements":{"link":{"color":{"text":"#fffffe"}}},"spacing":{"padding":{"left":"35px","right":"35px","top":"14px","bottom":"14px"}}},"cozyHoverEffect":{"boxShadow":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":true,"transform":{"translateX":0,"translateY":"-2","rotate":0,"scale":1}},"cozyHoverStyles":{"bgColor":"#f49805","color":"#fffffe","borderColor":""}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background has-link-color wp-element-button" style="border-radius:100px;color:#fffffe;background-color:#f2024a;padding-top:14px;padding-right:35px;padding-bottom:14px;padding-left:35px"><?php esc_html_e( 'Get Started Today', 'cozy-addons' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:group {"style":{"color":{"text":"#f2024a"},"elements":{"link":{"color":{"text":"#f2024a"}}},"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"600"},"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#f2024a;font-size:16px;font-style:normal;font-weight:600"><!-- wp:group {"style":{"border":{"radius":"100px","color":"#ffffff1f","width":"8px"},"spacing":{"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"30px"}} -->
<div class="wp-block-group has-border-color" style="border-color:#ffffff1f;border-width:8px;border-radius:100px"><!-- wp:cozy-block/icon-picker {"blockClientId":"7a27d48d-69cb-44af-86de-72037313a14c","view":"stacked","iconSize":14,"iconViewBox":{"vx":"0","vy":"0","vw":"16","vh":"24"},"iconPath":"M7.42244e-07 0.905071L15.5 12.1316L0 23.9991L7.42244e-07 0.905071Z","iconColor":"#fffffe","boxStyles":{"padding":{"top":9,"right":7,"bottom":9,"left":11},"borderType":"none","borderWidth":1,"borderColor":"#747474","borderColorHover":"","borderRadius":50,"bgColor":"#f2024a","bgColorHover":""}} -->
<div class="cozy-block-icon-picker stacked" id="cozyBlock_7a27d48d_69cb_44af_86de_72037313a14c"><svg width="14" height="14" viewBox="0 0 16 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="#fffffe"><path d="M7.42244e-07 0.905071L15.5 12.1316L0 23.9991L7.42244e-07 0.905071Z"></path></svg></div>
<!-- /wp:cozy-block/icon-picker --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Watch Demo', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->