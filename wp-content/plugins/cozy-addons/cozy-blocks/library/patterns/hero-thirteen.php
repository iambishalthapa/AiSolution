<?php
/**
 * Title: Hero Section with background image
 * Description: This is a hero section.
 * Slug: cozy-block-patterns/hero-thirteen
 * Categories: cozy-block-patterns, hero
 */

$images = array( CT_ASSETS_URL . 'images/hero_13.jpg' );
?>


<!-- wp:cover {"url":"<?php echo esc_url( $images[0] ); ?>","id":4053,"dimRatio":10,"customOverlayColor":"#223e42","isUserOverlayColor":true,"minHeight":695,"minHeightUnit":"px","contentPosition":"top center","metadata":{"name":"Hero"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-cover alignfull has-custom-content-position is-position-top-center" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:695px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-10 has-background-dim" style="background-color:#223e42"></span><img class="wp-block-cover__image-background wp-image-4053" alt="" src="<?php echo esc_url( $images[0] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"top":"26px","bottom":"26px","left":"16px","right":"16px"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="padding-top:26px;padding-right:16px;padding-bottom:26px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":45} /-->

<!-- wp:site-title {"style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"600","textDecoration":"none"},"elements":{"link":{"color":{"text":"#fffffe"},":hover":{"color":{"text":"#fa9805"}}}},"color":{"text":"#fffffe"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:navigation {"textColor":"background","customOverlayTextColor":"#090b10","style":{"typography":{"fontSize":"15px","fontStyle":"normal","fontWeight":"500","textDecoration":"none"},"spacing":{"blockGap":"26px"}},"cozyHoverColor":{"menuText":"#fa9805","menuBg":"","submenuText":"","submenuBg":""}} -->
<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Home', 'cozy-addons' ); ?>","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"<?php esc_html_e( 'About Us', 'cozy-addons' ); ?>","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Projects', 'cozy-addons' ); ?>","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Blog', 'cozy-addons' ); ?>","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Contact', 'cozy-addons' ); ?>","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- /wp:navigation -->

<!-- wp:search {"label":"Search","showLabel":false,"buttonText":"Search","buttonPosition":"button-only","buttonUseIcon":true,"isSearchFieldHidden":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"radius":"0px"},"color":{"background":"#fffffe00"}},"textColor":"background","className":"cozy-block-pattern__search-bar","fontSize":"small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"120px","bottom":"120px"},"margin":{"top":"50px","bottom":"0"},"blockGap":"6px"}},"layout":{"type":"constrained","contentSize":"1003px"}} -->
<div class="wp-block-group" style="margin-top:50px;margin-bottom:0;padding-top:120px;padding-right:0;padding-bottom:120px;padding-left:0"><!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"typography":{"fontSize":"70px","fontStyle":"normal","fontWeight":"600","lineHeight":"1.3"},"color":{"text":"#fffffe"}},"cozyCustomFont":"Raleway","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#fffffe;font-size:70px;font-style:normal;font-weight:600;line-height:1.3"><?php esc_html_e( "Building Tomorrow's Digital World, Today.", 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"684px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"16px"},"color":{"text":"#ebebeb"},"elements":{"link":{"color":{"text":"#ebebeb"}}}}} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#ebebeb;font-size:16px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat sed nunc at laoreet. In ultricies aliquam dui cursus volutpat.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"typography":{"textDecoration":"none","fontSize":"16px"},"spacing":{"margin":{"top":"26px","bottom":"26px"}}}} -->
<div class="wp-block-buttons has-custom-font-size" style="margin-top:26px;margin-bottom:26px;font-size:16px;text-decoration:none"><!-- wp:button {"style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"border":{"radius":"100px","color":"#fffffe","width":"1px"},"typography":{"fontStyle":"normal","fontWeight":"500","textDecoration":"none"},"spacing":{"padding":{"left":"36px","right":"36px","top":"14px","bottom":"14px"}},"color":{"background":"#fffffe00","text":"#fffffe"}},"cozyHoverEffect":{"boxShadow":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#ebaf4e","horizontal":10,"vertical":10,"blur":5,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}},"cozyHoverStyles":{"bgColor":"#fa9805","color":"#fffffe","borderColor":"#f49805"},"cozyAnimation":{"type":"none","easingFunction":"ease-in","anchorPlacement":"bottom-center","duration":600}} -->
<div class="wp-block-button" style="font-style:normal;font-weight:500;text-decoration:none"><a class="wp-block-button__link has-text-color has-background has-link-color has-border-color wp-element-button" style="border-color:#fffffe;border-width:1px;border-radius:100px;color:#fffffe;background-color:#fffffe00;padding-top:14px;padding-right:36px;padding-bottom:14px;padding-left:36px"><?php esc_html_e( 'Get Started', 'cozy-addons' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->