<?php
/**
 * Title: Hero Section nineteen
 * Description: This is a hero section.
 * Slug: cozy-block-patterns/hero-nineteen
 * Categories: cozy-block-patterns, hero
 * Premium: true
 */

$images = array(
	CT_ASSETS_URL . 'images/hero_19.jpg',
);
?>

<!-- wp:cover {"url":"<?php echo esc_url( $images[0] ); ?>","id":1921,"dimRatio":30,"isUserOverlayColor":true,"minHeight":700,"customGradient":"linear-gradient(135deg,rgba(7,14,40,0) 0%,rgb(7,14,40) 100%)","metadata":{"name":"Hero"},"align":"full","style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-cover alignfull" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:700px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-30 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(135deg,rgba(7,14,40,0) 0%,rgb(7,14,40) 100%)"></span><img class="wp-block-cover__image-background wp-image-1921" alt="" src="<?php echo esc_url( $images[0] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"right":"16px","left":"16px","top":"80px","bottom":"80px"}}},"layout":{"type":"constrained","contentSize":"1180px"},"cozyCustomFont":"Public Sans"} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"blockGap":"0"},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"}},"layout":{"type":"constrained","contentSize":"839px","justifyContent":"center"}} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#fffffe"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"500","textDecoration":"none","textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-buttons has-custom-font-size" style="margin-top:0;margin-bottom:0;font-size:14px;font-style:normal;font-weight:500;text-decoration:none;text-transform:uppercase"><!-- wp:button {"style":{"border":{"radius":"100px"},"color":{"background":"#ffffff26","text":"#fffffe"},"elements":{"link":{"color":{"text":"#fffffe"}}},"spacing":{"padding":{"left":"12px","right":"12px","top":"8px","bottom":"8px"}}},"cozyHoverEffect":{"boxShadow":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":true,"transform":{"translateX":0,"translateY":"-2","rotate":0,"scale":1}},"cozyHoverStyles":{"bgColor":"#f49805","color":"#fffffe","borderColor":""}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background has-link-color wp-element-button" style="border-radius:100px;color:#fffffe;background-color:#ffffff26;padding-top:8px;padding-right:12px;padding-bottom:8px;padding-left:12px"><?php esc_html_e( 'Welcome to destiny', 'cozy-addons' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"typography":{"fontSize":"55px","lineHeight":"1.3","fontStyle":"normal","fontWeight":"700","textTransform":"uppercase"}},"cozyCustomFont":"Work Sans"} -->
<h2 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#fffffe;font-size:55px;font-style:normal;font-weight:700;line-height:1.3;text-transform:uppercase"><?php esc_html_e( 'Journey with Confidence Travel with Us', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"26px"}}},"layout":{"type":"constrained","contentSize":"206px"}} -->
<div class="wp-block-group" style="margin-top:26px"><!-- wp:cozy-block/icon-list {"blockClientId":"0d6e6e2c-58ed-44a7-8975-962cb83c6b8b","iconView":"stacked","iconPosition":"right","iconSize":18,"iconColor":"#0824b0","iconColorHover":"#fffffe","iconRotate":310,"containerStyles":{"width":133,"height":"","gap":0,"padding":{"top":14,"right":36,"bottom":14,"left":36},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":{"top":100,"right":100,"bottom":100,"left":100},"bgColor":"#3780f5","bgColorHover":"#fffffe"},"iconBoxStyles":{"padding":{"top":5,"right":5,"bottom":5,"left":5},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColor":"#fffffe","bgColorHover":"#ff9900"},"typography":{"fontFamily":"","fontSize":14,"colorHover":"#ff9900","fontWeight":"600"}} -->
<ul class="cozy-block-icon-list vertical stacked fill" id="cozyBlock_0d6e6e2c_58ed_44a7_8975_962cb83c6b8b"><!-- wp:cozy-block/list-item {"blockClientId":"26263d3f-dce5-47b7-9592-36a86718e7a2","iconViewBox":{"vx":"0","vy":"0","vw":"24","vh":"24"},"iconPath":"M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z","parentAttrs":{"enableLogo":true,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"right"},"title":"<?php esc_html_e( 'GET STARTED', 'cozy-addons' ); ?>","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_26263d3f_dce5_47b7_9592_36a86718e7a2"><p><?php esc_html_e( 'GET STARTED', 'cozy-addons' ); ?></p><div class="list-icon-wrapper"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z"></path></svg></div></li></a></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->