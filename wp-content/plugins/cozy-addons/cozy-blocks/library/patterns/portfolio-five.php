<?php
/**
 * Title: Portfolio section five with images animation
 * Description: This is portfolio with image animation
 * Slug: cozy-block-patterns/portfolio-five
 * Categories: cozy-block-patterns, portfolio, gallery
 */

$images = array(
	CT_ASSETS_URL . 'images/portfolio_5_1.jpg',
	CT_ASSETS_URL . 'images/portfolio_5_2.jpg',
);

?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Portfolio', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"},"color":{"background":"#fffffe"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"80px","bottom":"80px","left":"16px","right":"16px"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"1180px"},"cozyCustomFont":"Libre Caslon Text"} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"typography":{"fontSize":"40px","lineHeight":"1.2","fontStyle":"normal","fontWeight":"500"}},"textColor":"black","cozyCustomFont":"Libre Caslon Text"} -->
<h2 class="wp-block-heading has-black-color has-text-color has-link-color" style="font-size:40px;font-style:normal;font-weight:500;line-height:1.2"><?php esc_html_e( 'Featured Works', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:cozy-block/icon-list {"blockClientId":"0f110e2e-6a7a-4fef-b538-22a713ae4482","iconPosition":"right","iconSize":18,"iconColor":"#0a587b","iconColorHover":"#ff9900","iconRotate":310,"iconGap":0,"containerStyles":{"width":95,"height":"","gap":0,"padding":{"top":0,"right":0,"bottom":0,"left":0},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":{"top":5,"right":5,"bottom":5,"left":5},"bgColor":"","bgColorHover":""},"typography":{"fontFamily":"","fontSize":14,"colorHover":"#ff9900","fontWeight":400,"color":"#0a587b"}} -->
<ul class="cozy-block-icon-list vertical default fill" id="cozyBlock_0f110e2e_6a7a_4fef_b538_22a713ae4482"><!-- wp:cozy-block/list-item {"blockClientId":"5602135b-0f5a-4b07-b5bc-852b99264a92","iconViewBox":{"vx":"0","vy":"0","vw":"24","vh":"24"},"iconPath":"M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z","parentAttrs":{"enableLogo":true,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"right"},"title":"View More","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_5602135b_0f5a_4b07_b5bc_852b99264a92"><p><?php esc_html_e( 'View More', 'cozy-addons' ); ?></p><div class="list-icon-wrapper"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z"></path></svg></div></li></a></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"margin":{"top":"36px"}}}} -->
<div class="wp-block-columns" style="margin-top:36px"><!-- wp:column {"style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"fade-right","easingFunction":"ease","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-column"><!-- wp:image {"id":4544,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-4544"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"10px","margin":{"top":"12px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:12px"><!-- wp:heading {"style":{"typography":{"fontSize":"20px"},"color":{"text":"#111915"},"elements":{"link":{"color":{"text":"#111915"}}}},"cozyCustomFont":"Libre Caslon Text"} -->
<h2 class="wp-block-heading has-text-color has-link-color" style="color:#111915;font-size:20px"><?php esc_html_e( 'Wild Animals', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:cozy-block/icon-list {"blockClientId":"0b885822-3fc8-4e57-8db6-09bf02628a89","iconPosition":"right","iconSize":18,"iconColor":"#0a587b","iconColorHover":"#ff9900","iconRotate":310,"iconGap":0,"containerStyles":{"width":95,"height":"","gap":0,"padding":{"top":0,"right":0,"bottom":0,"left":0},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":{"top":5,"right":5,"bottom":5,"left":5},"bgColor":"","bgColorHover":""},"typography":{"fontFamily":"","fontSize":14,"colorHover":"#ff9900","fontWeight":400,"color":"#0a587b"}} -->
<ul class="cozy-block-icon-list vertical default fill" id="cozyBlock_0b885822_3fc8_4e57_8db6_09bf02628a89"><!-- wp:cozy-block/list-item {"blockClientId":"78816770-bb08-4ae3-94c9-670dc7031bfb","iconViewBox":{"vx":"0","vy":"0","vw":"24","vh":"24"},"iconPath":"M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z","parentAttrs":{"enableLogo":true,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"right"},"title":"<?php esc_html_e( 'View More', 'cozy-addons' ); ?>","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_78816770_bb08_4ae3_94c9_670dc7031bfb"><p><?php esc_html_e( 'View More', 'cozy-addons' ); ?></p><div class="list-icon-wrapper"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z"></path></svg></div></li></a></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"fade-left","easingFunction":"ease","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-column"><!-- wp:image {"id":4545,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-4545"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"10px","margin":{"top":"12px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:12px"><!-- wp:heading {"style":{"typography":{"fontSize":"20px"},"color":{"text":"#111915"},"elements":{"link":{"color":{"text":"#111915"}}}},"cozyCustomFont":"Libre Caslon Text"} -->
<h2 class="wp-block-heading has-text-color has-link-color" style="color:#111915;font-size:20px"><?php esc_html_e( 'Graphics Designer', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:cozy-block/icon-list {"blockClientId":"5e95a70b-0488-4d9d-ad8d-1c1c49491b3d","iconPosition":"right","iconSize":18,"iconColor":"#0a587b","iconColorHover":"#ff9900","iconRotate":310,"iconGap":0,"containerStyles":{"width":95,"height":"","gap":0,"padding":{"top":0,"right":0,"bottom":0,"left":0},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":{"top":5,"right":5,"bottom":5,"left":5},"bgColor":"","bgColorHover":""},"typography":{"fontFamily":"","fontSize":14,"colorHover":"#ff9900","fontWeight":400,"color":"#0a587b"}} -->
<ul class="cozy-block-icon-list vertical default fill" id="cozyBlock_5e95a70b_0488_4d9d_ad8d_1c1c49491b3d"><!-- wp:cozy-block/list-item {"blockClientId":"a9ed0200-c51c-46ed-87e9-b268523ab218","iconViewBox":{"vx":"0","vy":"0","vw":"24","vh":"24"},"iconPath":"M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z","parentAttrs":{"enableLogo":true,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"right"},"title":"<?php esc_html_e( 'View More', 'cozy-addons' ); ?>","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_a9ed0200_c51c_46ed_87e9_b268523ab218"><p><?php esc_html_e( 'View More', 'cozy-addons' ); ?></p><div class="list-icon-wrapper"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z"></path></svg></div></li></a></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->