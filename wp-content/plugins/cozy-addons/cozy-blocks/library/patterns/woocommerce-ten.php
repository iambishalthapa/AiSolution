<?php
/**
 * Title: Woocommerce section ten with product grid
 * Description: This is woocommerce section with product grid
 * Slug: cozy-block-patterns/woocommerce-ten
 * Categories: cozy-block-patterns, woocommerce
 * Dynamic: true
 * Premium: true
 */

$images = array(
	CT_ASSETS_URL . 'images/woocommerce_10_1.jpg',
);
?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'WooCommerce', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}},"color":{"background":"#fffffe"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"40px","bottom":"80px","left":"16px","right":"16px"},"margin":{"top":"0","bottom":"0"}},"typography":{"fontSize":"14px"},"color":{"text":"#6a6a6a"},"elements":{"link":{"color":{"text":"#6a6a6a"}}}},"layout":{"type":"constrained","contentSize":"1180px"},"cozyCustomFont":"Nunito Sans"} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#6a6a6a;margin-top:0;margin-bottom:0;padding-top:40px;padding-right:16px;padding-bottom:80px;padding-left:16px;font-size:14px"><!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"614px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"30px","fontStyle":"normal","fontWeight":"700"}},"cozyCustomFont":"Nunito Sans"} -->
<h2 class="wp-block-heading has-text-align-center" style="font-size:30px;font-style:normal;font-weight:700"><?php esc_html_e( "What's New", 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"italic","fontWeight":"400"}}} -->
<p class="has-text-align-center" style="font-style:italic;font-weight:400"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat sed nunc at laoreet. In ultricies aliquam dui cursus volutpat.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"margin":{"top":"36px"},"blockGap":{"top":"26px","left":"20px"}}}} -->
<div class="wp-block-columns" style="margin-top:36px"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:cozy-block/product-carousel {"blockClientId":"c5755890-720e-4a0c-95a0-6aaf7b6abc24","namespace":"cozy-block/product-carousel","saleBadge":{"enabled":true,"display":"flex","position":"right","top":10,"right":10,"left":0,"marginBottom":0,"gap":0,"labelBefore":"","contentType":"default","labelAfter":"","padding":{"top":10,"right":8,"bottom":10,"left":8},"borderType":"none","borderWidth":1,"borderColor":"#000","borderRadius":50,"rotate":0,"bgColor":"#2d2d2d","typography":{"fontFamily":"","fontSize":10,"color":"#fff","fontWeight":400},"labelTypography":{"fontFamily":"","fontSize":10,"color":"","fontWeight":400}},"gridOptions":{"displayColumn":2,"columnGap":20}} -->
<div class="cozy-block-product-carousel layout-grid hover-show  on-sale sale-badge-position-right sale-badge-display-flex  " id="cozyBlock_c5755890_720e_4a0c_95a0_6aaf7b6abc24"><!-- wp:query {"queryId":1,"query":{"perPage":"4","postType":"product"},"namespace":"cozy-block/cozy-woo-query","lock":{"move":false,"remove":true},"className":"cozy-query cozy-product-carousel__swiper-container"} -->
<div class="wp-block-query cozy-query cozy-product-carousel__swiper-container"><!-- wp:post-template {"lock":{"move":false,"remove":true},"style":{"spacing":{"blockGap":"0"}},"className":"cozy-layout-grid swiper-wrapper cozy-product-carousel-template"} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"},"cozyAnimation":{"type":"fade-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":800}} -->
<div class="wp-block-group"><!-- wp:post-featured-image {"style":{"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}},"typography":{"fontSize":"14px"},"border":{"radius":"0px"}}} /-->

<!-- wp:post-title {"textAlign":"center","level":4,"isLink":true,"linkTarget":"_blank","style":{"color":{"text":"#2d2d2d"},"elements":{"link":{"color":{"text":"#2d2d2d"}}},"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"6px","bottom":"4px"}}},"__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","style":{"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}},"typography":{"fontSize":"14px"}}} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:cozy-block/product-carousel --></div>
<!-- /wp:column -->

<!-- wp:column {"cozyAnimation":{"type":"fade-left","easingFunction":"ease","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url( $images[0] ); ?>","id":1596,"dimRatio":40,"customOverlayColor":"#d7d7d9","isUserOverlayColor":true,"minHeight":750,"contentPosition":"top left","isDark":false,"style":{"spacing":{"blockGap":"2px","padding":{"right":"26px","left":"26px"}},"color":{"text":"#6a6a6a"},"elements":{"link":{"color":{"text":"#6a6a6a"}}},"typography":{"fontSize":"14px"}},"layout":{"type":"constrained","contentSize":"368px"}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-top-left has-text-color has-link-color" style="color:#6a6a6a;padding-right:26px;padding-left:26px;font-size:14px;min-height:750px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-40 has-background-dim" style="background-color:#d7d7d9"></span><img class="wp-block-cover__image-background wp-image-1596" alt="" src="<?php echo esc_url( $images[0] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"style":{"color":{"text":"#2d2d2d"},"elements":{"link":{"color":{"text":"#2d2d2d"}}},"typography":{"fontSize":"35px","fontStyle":"normal","fontWeight":"700"},"spacing":{"margin":{"top":"44px"}}},"cozyCustomFont":"Nunito Sans"} -->
<h2 class="wp-block-heading has-text-color has-link-color" style="color:#2d2d2d;margin-top:44px;font-size:35px;font-style:normal;font-weight:700"><?php esc_html_e( "The Summer Men's Collection", 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","placeholder":"Write title…","style":{"typography":{"fontStyle":"italic","fontWeight":"400"}}} -->
<p class="has-text-align-left" style="font-style:italic;font-weight:400"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat sed nunc at laoreet. In ultricies aliquam dui cursus volutpat.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"500","textDecoration":"none"},"spacing":{"margin":{"top":"26px"}}}} -->
<div class="wp-block-buttons has-custom-font-size" style="margin-top:26px;font-size:16px;font-style:normal;font-weight:500;text-decoration:none"><!-- wp:button {"style":{"color":{"background":"#ffffff00","text":"#2d2d2d"},"elements":{"link":{"color":{"text":"#2d2d2d"}}},"border":{"color":"#2d2d2d","width":"1px","radius":"100px"}},"cozyHoverStyles":{"bgColor":"#ff9900","color":"#fffffe","borderColor":"#ff9900"}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background has-link-color has-border-color wp-element-button" style="border-color:#2d2d2d;border-width:1px;border-radius:100px;color:#2d2d2d;background-color:#ffffff00"><?php esc_html_e( 'Shop Now', 'cozy-addons' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->