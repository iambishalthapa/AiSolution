<?php
/**
 * Title: Features section eight with media
 * Description: This is features section with media
 * Slug: cozy-block-patterns/features-eight
 * Categories: cozy-block-patterns, features
 */

$images = array(
	CT_ASSETS_URL . 'images/features_8_1.jpg',
	CT_ASSETS_URL . 'images/features_8_2.jpg',
	CT_ASSETS_URL . 'images/features_8_3.jpg',
);
?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Features', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"color":{"background":"#fffffe"}},"className":"cozy-block-pattern__features-eight","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull cozy-block-pattern__features-eight has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"16px","left":"16px","top":"80px","bottom":"80px"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"430px"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"border":{"left":{"color":"#f2024a","width":"4px"}},"spacing":{"padding":{"left":"10px"}},"typography":{"fontSize":"16px"}},"layout":{"type":"constrained","contentSize":"","justifyContent":"center"}} -->
<div class="wp-block-group" style="border-left-color:#f2024a;border-left-width:4px;padding-left:10px;font-size:16px"><!-- wp:paragraph {"style":{"color":{"text":"#f2024a"},"elements":{"link":{"color":{"text":"#f2024a"}}},"typography":{"textTransform":"uppercase","fontSize":"12px"}}} -->
<p class="has-text-color has-link-color" style="color:#f2024a;font-size:12px;text-transform:uppercase"><?php esc_html_e( 'About Us', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"42px","lineHeight":"1.3","fontStyle":"normal","fontWeight":"600"},"color":{"text":"#070e28"},"elements":{"link":{"color":{"text":"#070e28"}}}},"cozyCustomFont":"Work Sans"} -->
<h2 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#070e28;font-size:42px;font-style:normal;font-weight:600;line-height:1.3"><?php esc_html_e( 'Our Featured Works', 'cozy-addons' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"margin":{"top":"36px","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":{"left":"26px"}}}} -->
<div class="wp-block-columns" style="margin-top:36px;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"top","width":"40%","style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:40%"><!-- wp:group {"style":{"spacing":{"blockGap":"26px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:cover {"url":"<?php echo esc_url( $images[0] ); ?>","id":4097,"dimRatio":0,"customOverlayColor":"#070e28","isUserOverlayColor":true,"isDark":false,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"20px"}},"className":"cozy-features-eight__cover"} -->
<div class="wp-block-cover is-light cozy-features-eight__cover" style="border-radius:20px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#070e28"></span><img class="wp-block-cover__image-background wp-image-4097" alt="" src="<?php echo esc_url( $images[0] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"className":"cozy-features-eight__content","layout":{"type":"constrained"}} -->
<div class="wp-block-group cozy-features-eight__content" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"typography":{"fontSize":"30px"}}} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#fffffe;font-size:30px"><?php esc_html_e( 'Flex Art Design', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"60px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cozy-block/icon-picker {"blockClientId":"1bc68959-dc7f-4f2b-9279-c9138d9ac3d7","iconSize":50,"iconViewBox":{"vx":"0","vy":"0","vw":"24","vh":"24"},"iconPath":"M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z","iconColor":"#f2024a","iconColorHover":"#ff9900","iconRotate":320} -->
<div class="cozy-block-icon-picker default" id="cozyBlock_1bc68959_dc7f_4f2b_9279_c9138d9ac3d7"><svg width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="#f2024a"><path d="M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z"></path></svg></div>
<!-- /wp:cozy-block/icon-picker --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:cover {"url":"<?php echo esc_url( $images[1] ); ?>","id":4111,"dimRatio":0,"customOverlayColor":"#070e28","isUserOverlayColor":true,"isDark":false,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"20px"}},"className":"cozy-features-eight__cover"} -->
<div class="wp-block-cover is-light cozy-features-eight__cover" style="border-radius:20px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#070e28"></span><img class="wp-block-cover__image-background wp-image-4111" alt="" src="<?php echo esc_url( $images[1] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"className":"cozy-features-eight__content","layout":{"type":"constrained"}} -->
<div class="wp-block-group cozy-features-eight__content" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"typography":{"fontSize":"30px"}}} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#fffffe;font-size:30px"><?php esc_html_e( 'Flex Art Design', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"60px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cozy-block/icon-picker {"blockClientId":"47711664-1dec-4c95-836a-7a084401b361","iconSize":50,"iconViewBox":{"vx":"0","vy":"0","vw":"24","vh":"24"},"iconPath":"M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z","iconColor":"#f2024a","iconRotate":320} -->
<div class="cozy-block-icon-picker default" id="cozyBlock_47711664_1dec_4c95_836a_7a084401b361"><svg width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="#f2024a"><path d="M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z"></path></svg></div>
<!-- /wp:cozy-block/icon-picker --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"zoom-in-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":1000}} -->
<div class="wp-block-column"><!-- wp:image {"id":4095,"style":{"color":{}},"className":"cozy-features-eight__cover"} -->
<figure class="wp-block-image cozy-features-eight__cover"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-4095"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->