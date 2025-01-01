<?php
/**
 * Title: Services section ten with grid animation
 * Description: This is service section with grid animation
 * Slug: cozy-block-patterns/services-ten
 * Categories: cozy-block-patterns, services
 * Premium: true
 */

$images = array(
	CT_ASSETS_URL . 'images/services_10_1.png',
	CT_ASSETS_URL . 'images/services_10_2.png',
	CT_ASSETS_URL . 'images/services_10_3.png',
	CT_ASSETS_URL . 'images/services_10_4.png',
	CT_ASSETS_URL . 'images/services_10_5.png',
	CT_ASSETS_URL . 'images/services_10_6.png',
);
?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Services', 'cozy-addons' ); ?>"},"align":"full","style":{"color":{"background":"#f5f7fa"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f5f7fa;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"16px","left":"16px","top":"80px","bottom":"80px"},"blockGap":"var:preset|spacing|70"},"typography":{"fontSize":"14px"},"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}}},"layout":{"type":"constrained","contentSize":"1180px"},"cozyCustomFont":"Public Sans"} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#646464;margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px;font-size:14px"><!-- wp:group {"style":{"spacing":{"blockGap":"2px","padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"1.2","fontSize":"44px","fontStyle":"normal","fontWeight":"600"}},"cozyCustomFont":"Inter","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<h2 class="wp-block-heading has-text-align-center" style="font-size:44px;font-style:normal;font-weight:600;line-height:1.2"><?php esc_html_e( 'Best Services in World', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","cozyCustomFont":"Public Sans"} -->
<p class="has-text-align-center"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"margin":{"top":"36px","bottom":"26px"},"blockGap":{"top":"26px","left":"26px"}}}} -->
<div class="wp-block-columns" style="margin-top:36px;margin-bottom:26px"><!-- wp:column {"style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"cozyAnimation":{"type":"fade-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":800}} -->
<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"44px","bottom":"44px","left":"16px","right":"16px"},"blockGap":"0"},"color":{"background":"#fffffe"},"border":{"radius":"20px"}},"layout":{"type":"constrained","contentSize":"283px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#e0eef0","horizontal":0,"vertical":4,"blur":35,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}}} -->
<div class="wp-block-group has-background" style="border-radius:20px;background-color:#fffffe;padding-top:44px;padding-right:16px;padding-bottom:44px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"10px"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"border":{"bottom":{"color":"#00c6e11a","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="border-bottom-color:#00c6e11a;border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:10px;padding-left:0"><!-- wp:image {"id":1842,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-1842"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#161e1f"},"elements":{"link":{"color":{"text":"#161e1f"}}},"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"34px","lineHeight":"1.2"}},"cozyCustomFont":"Inter"} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#161e1f;font-size:34px;font-style:normal;font-weight:600;line-height:1.2"><?php esc_html_e( '01', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"16px","bottom":"6px"}}},"cozyCustomFont":"Inter"} -->
<h3 class="wp-block-heading has-text-align-left" style="margin-top:16px;margin-bottom:6px;font-size:20px;font-style:normal;font-weight:600"><?php esc_html_e( 'Cardiology', 'cozy-addons' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left"} -->
<p class="has-text-align-left"><?php esc_html_e( 'Lorem ipsum dolor sit amet, vet elit at consectetur adipiscing elit. liqua vel cur magna at enisus', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"cozyAnimation":{"type":"flip-down","easingFunction":"ease-in","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"44px","bottom":"44px","left":"16px","right":"16px"},"blockGap":"0"},"color":{"background":"#fffffe"},"border":{"radius":"20px"}},"layout":{"type":"constrained","contentSize":"283px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#e0eef0","horizontal":0,"vertical":4,"blur":35,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}}} -->
<div class="wp-block-group has-background" style="border-radius:20px;background-color:#fffffe;padding-top:44px;padding-right:16px;padding-bottom:44px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"10px"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"border":{"bottom":{"color":"#00c6e11a","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="border-bottom-color:#00c6e11a;border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:10px;padding-left:0"><!-- wp:image {"id":1843,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-1843"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#161e1f"},"elements":{"link":{"color":{"text":"#161e1f"}}},"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"34px","lineHeight":"1.2"}},"cozyCustomFont":"Inter"} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#161e1f;font-size:34px;font-style:normal;font-weight:600;line-height:1.2"><?php esc_html_e( '02', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"16px","bottom":"6px"}}},"cozyCustomFont":"Inter"} -->
<h3 class="wp-block-heading has-text-align-left" style="margin-top:16px;margin-bottom:6px;font-size:20px;font-style:normal;font-weight:600"><?php esc_html_e( 'Pharmacies', 'cozy-addons' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left"} -->
<p class="has-text-align-left"><?php esc_html_e( 'Lorem ipsum dolor sit amet, vet elit at consectetur adipiscing elit. liqua vel cur magna at enisus', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"cozyAnimation":{"type":"zoom-in-left","easingFunction":"ease-in","anchorPlacement":"top-center","duration":600}} -->
<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"44px","bottom":"44px","left":"16px","right":"16px"},"blockGap":"0"},"color":{"background":"#fffffe"},"border":{"radius":"20px"}},"layout":{"type":"constrained","contentSize":"283px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#e0eef0","horizontal":0,"vertical":4,"blur":35,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}}} -->
<div class="wp-block-group has-background" style="border-radius:20px;background-color:#fffffe;padding-top:44px;padding-right:16px;padding-bottom:44px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"10px"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"border":{"bottom":{"color":"#00c6e11a","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="border-bottom-color:#00c6e11a;border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:10px;padding-left:0"><!-- wp:image {"id":1844,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-1844"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#161e1f"},"elements":{"link":{"color":{"text":"#161e1f"}}},"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"34px","lineHeight":"1.2"}},"cozyCustomFont":"Inter"} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#161e1f;font-size:34px;font-style:normal;font-weight:600;line-height:1.2"><?php esc_html_e( '03', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"16px","bottom":"6px"}}},"cozyCustomFont":"Inter"} -->
<h3 class="wp-block-heading has-text-align-left" style="margin-top:16px;margin-bottom:6px;font-size:20px;font-style:normal;font-weight:600"><?php esc_html_e( 'Dentistry', 'cozy-addons' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left"} -->
<p class="has-text-align-left"><?php esc_html_e( 'Lorem ipsum dolor sit amet, vet elit at consectetur adipiscing elit. liqua vel cur magna at enisus', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"style":{"spacing":{"margin":{"top":"0px","bottom":"26px"},"blockGap":{"top":"26px","left":"26px"}}}} -->
<div class="wp-block-columns" style="margin-top:0px;margin-bottom:26px"><!-- wp:column {"style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"cozyAnimation":{"type":"fade-up-right","easingFunction":"ease-in","anchorPlacement":"top-center","duration":1200}} -->
<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"44px","bottom":"44px","left":"16px","right":"16px"},"blockGap":"0"},"color":{"background":"#fffffe"},"border":{"radius":"20px"}},"layout":{"type":"constrained","contentSize":"283px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#e0eef0","horizontal":0,"vertical":4,"blur":35,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}}} -->
<div class="wp-block-group has-background" style="border-radius:20px;background-color:#fffffe;padding-top:44px;padding-right:16px;padding-bottom:44px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"10px"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"border":{"bottom":{"color":"#00c6e11a","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="border-bottom-color:#00c6e11a;border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:10px;padding-left:0"><!-- wp:image {"id":1842,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $images[3] ); ?>" alt="" class="wp-image-1842"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#161e1f"},"elements":{"link":{"color":{"text":"#161e1f"}}},"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"34px","lineHeight":"1.2"}},"cozyCustomFont":"Inter"} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#161e1f;font-size:34px;font-style:normal;font-weight:600;line-height:1.2"><?php esc_html_e( '04', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"16px","bottom":"6px"}}},"cozyCustomFont":"Inter"} -->
<h3 class="wp-block-heading has-text-align-left" style="margin-top:16px;margin-bottom:6px;font-size:20px;font-style:normal;font-weight:600"><?php esc_html_e( 'Neurology', 'cozy-addons' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left"} -->
<p class="has-text-align-left"><?php esc_html_e( 'Lorem ipsum dolor sit amet, vet elit at consectetur adipiscing elit. liqua vel cur magna at enisus', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"cozyAnimation":{"type":"zoom-in-down","easingFunction":"ease-in","anchorPlacement":"top-center","duration":1100}} -->
<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"44px","bottom":"44px","left":"16px","right":"16px"},"blockGap":"0"},"color":{"background":"#fffffe"},"border":{"radius":"20px"}},"layout":{"type":"constrained","contentSize":"283px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#e0eef0","horizontal":0,"vertical":4,"blur":35,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}}} -->
<div class="wp-block-group has-background" style="border-radius:20px;background-color:#fffffe;padding-top:44px;padding-right:16px;padding-bottom:44px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"10px"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"border":{"bottom":{"color":"#00c6e11a","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="border-bottom-color:#00c6e11a;border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:10px;padding-left:0"><!-- wp:image {"id":1843,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $images[4] ); ?>" alt="" class="wp-image-1843"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#161e1f"},"elements":{"link":{"color":{"text":"#161e1f"}}},"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"34px","lineHeight":"1.2"}},"cozyCustomFont":"Inter"} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#161e1f;font-size:34px;font-style:normal;font-weight:600;line-height:1.2"><?php esc_html_e( '05', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"16px","bottom":"6px"}}},"cozyCustomFont":"Inter"} -->
<h3 class="wp-block-heading has-text-align-left" style="margin-top:16px;margin-bottom:6px;font-size:20px;font-style:normal;font-weight:600"><?php esc_html_e( 'Orthopedics', 'cozy-addons' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left"} -->
<p class="has-text-align-left"><?php esc_html_e( 'Lorem ipsum dolor sit amet, vet elit at consectetur adipiscing elit. liqua vel cur magna at enisus', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"cozyAnimation":{"type":"zoom-out","easingFunction":"ease-in","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"44px","bottom":"44px","left":"16px","right":"16px"},"blockGap":"0"},"color":{"background":"#00c6e1"},"border":{"radius":"20px"}},"layout":{"type":"constrained","contentSize":"283px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#e0eef0","horizontal":0,"vertical":4,"blur":35,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}}} -->
<div class="wp-block-group has-background" style="border-radius:20px;background-color:#00c6e1;padding-top:44px;padding-right:16px;padding-bottom:44px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"10px"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"border":{"bottom":{"color":"#00c6e11a","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="border-bottom-color:#00c6e11a;border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:10px;padding-left:0"><!-- wp:image {"id":1846,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $images[5] ); ?>" alt="" class="wp-image-1846"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"34px","lineHeight":"1.2"},"color":{"text":"#fffffe"}},"cozyCustomFont":"Inter"} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#fffffe;font-size:34px;font-style:normal;font-weight:600;line-height:1.2"><?php esc_html_e( '06', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"16px","bottom":"6px"}},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"}},"cozyCustomFont":"Inter"} -->
<h3 class="wp-block-heading has-text-align-left has-text-color has-link-color" style="color:#fffffe;margin-top:16px;margin-bottom:6px;font-size:20px;font-style:normal;font-weight:600">Optometrists</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","style":{"color":{"text":"#ebebeb"},"elements":{"link":{"color":{"text":"#ebebeb"}}}}} -->
<p class="has-text-align-left has-text-color has-link-color" style="color:#ebebeb"><?php esc_html_e( 'Lorem ipsum dolor sit amet, vet elit at consectetur adipiscing elit. liqua vel cur magna at enisus', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->