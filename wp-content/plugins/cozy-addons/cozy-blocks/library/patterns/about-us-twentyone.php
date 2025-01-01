<?php
/**
 * Title: About us section with stacked image
 * Description: This is about us section with stacked image
 * Slug: cozy-block-patterns/about-us-twentyone
 * Categories: cozy-block-patterns, about-us
 * Premium: true
 */

$images = array(
	CT_ASSETS_URL . 'images/about-us_21_1.jpg',
	CT_ASSETS_URL . 'images/about-us_21_2.png',
	CT_ASSETS_URL . 'images/about-us_21_3.png',
	CT_ASSETS_URL . 'images/about-us_21_4.png',
);
?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'About Us', 'cozy-addons' ); ?>"},"align":"full","style":{"color":{"background":"#fffffe"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"16px","right":"16px"},"blockGap":"0","margin":{"top":"0","bottom":"0"}},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}},"typography":{"fontSize":"14px"}},"layout":{"type":"constrained","contentSize":"1180px"},"cozyCustomFont":"Public Sans"} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#090b10;margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px;font-size:14px"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"36px","left":"26px"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"style":{"typography":{"lineHeight":"1.2","fontSize":"44px","fontStyle":"normal","fontWeight":"600"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}}},"cozyCustomFont":"Inter","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":600}} -->
<h2 class="wp-block-heading has-text-color has-link-color" style="color:#090b10;font-size:44px;font-style:normal;font-weight:600;line-height:1.2"><?php esc_html_e( 'Escape the Ordinary, Embrace The Extraordinary', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:columns {"style":{"spacing":{"margin":{"top":"26px","bottom":"26px"}}},"className":"cozy-block-pattern__responsive-border-none","cozyCustomFont":"Poppins"} -->
<div class="wp-block-columns cozy-block-pattern__responsive-border-none" style="margin-top:26px;margin-bottom:26px"><!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"0"},"border":{"right":{"color":"#161e1f26","width":"1px"},"top":{},"bottom":{},"left":{}}},"cozyAnimation":{"type":"none","easingFunction":"ease-in","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-column" style="border-right-color:#161e1f26;border-right-width:1px;padding-top:0;padding-bottom:0"><!-- wp:image {"id":1932,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-1932"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"4px","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:cozy-block/counter {"blockClientId":"856d1fc0-56ac-496f-89ba-f6a8db73fd1e","endNumber":"1200","styles":{"fontFamily":"default","fontSize":34,"color":"#161e1f","fontWeight":"600"}} -->
<div class="cozy-block-counter" id="cozyBlock_856d1fc0_56ac_496f_89ba_f6a8db73fd1e"><span><?php esc_html_e( '0', 'cozy-addons' ); ?></span></div>
<!-- /wp:cozy-block/counter -->

<!-- wp:cozy-block/icon-picker {"blockClientId":"83d4242b-db81-4ded-b794-65f98649821d","view":"stacked","iconSize":14,"iconViewBox":{"vx":"0","vy":"0","vw":"12","vh":"12"},"iconPath":"M10.9449 9.66003C11.3049 10.02 11.3049 10.58 10.9449 10.94C10.7649 11.12 10.5449 11.2 10.3049 11.2C10.0649 11.2 9.84493 11.12 9.66493 10.94L6.00492 7.28004L2.34491 10.94C2.16491 11.12 1.94492 11.2 1.70492 11.2C1.46492 11.2 1.24493 11.12 1.06493 10.94C0.704932 10.58 0.704932 10.02 1.06493 9.66003L4.72492 6.00004L1.06493 2.34004C0.704932 1.98004 0.704932 1.42004 1.06493 1.06004C1.42493 0.700037 1.98491 0.700037 2.34491 1.06004L6.00492 4.72003L9.66493 1.06004C10.0249 0.700037 10.5849 0.700037 10.9449 1.06004C11.3049 1.42004 11.3049 1.98004 10.9449 2.34004L7.2849 6.00004L10.9449 9.66003Z","iconColor":"#161e1f","iconRotate":45,"boxStyles":{"padding":{"top":2,"right":0,"bottom":0,"left":0},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColorHover":""}} -->
<div class="cozy-block-icon-picker stacked" id="cozyBlock_83d4242b_db81_4ded_b794_65f98649821d"><svg width="14" height="14" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="#161e1f"><path d="M10.9449 9.66003C11.3049 10.02 11.3049 10.58 10.9449 10.94C10.7649 11.12 10.5449 11.2 10.3049 11.2C10.0649 11.2 9.84493 11.12 9.66493 10.94L6.00492 7.28004L2.34491 10.94C2.16491 11.12 1.94492 11.2 1.70492 11.2C1.46492 11.2 1.24493 11.12 1.06493 10.94C0.704932 10.58 0.704932 10.02 1.06493 9.66003L4.72492 6.00004L1.06493 2.34004C0.704932 1.98004 0.704932 1.42004 1.06493 1.06004C1.42493 0.700037 1.98491 0.700037 2.34491 1.06004L6.00492 4.72003L9.66493 1.06004C10.0249 0.700037 10.5849 0.700037 10.9449 1.06004C11.3049 1.42004 11.3049 1.98004 10.9449 2.34004L7.2849 6.00004L10.9449 9.66003Z"></path></svg></div>
<!-- /wp:cozy-block/icon-picker --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}}}} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#646464"><?php esc_html_e( 'Successful Trips', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"0"},"border":{"right":{"color":"#161e1f26","width":"1px"},"top":{},"bottom":{},"left":{}}},"cozyAnimation":{"type":"none","easingFunction":"ease-in","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-column" style="border-right-color:#161e1f26;border-right-width:1px;padding-top:0;padding-bottom:0"><!-- wp:image {"id":1933,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-1933"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"4px","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:cozy-block/counter {"blockClientId":"1242b016-db5c-496d-a872-0954ec9bb644","endNumber":"600","styles":{"fontFamily":"default","fontSize":34,"color":"#161e1f","fontWeight":"600"}} -->
<div class="cozy-block-counter" id="cozyBlock_1242b016_db5c_496d_a872_0954ec9bb644"><span><?php esc_html_e( '0', 'cozy-addons' ); ?></span></div>
<!-- /wp:cozy-block/counter -->

<!-- wp:cozy-block/icon-picker {"blockClientId":"c2d5c94f-227c-4ff0-a4d1-043d441dc0f3","view":"stacked","iconSize":14,"iconViewBox":{"vx":"0","vy":"0","vw":"12","vh":"12"},"iconPath":"M10.9449 9.66003C11.3049 10.02 11.3049 10.58 10.9449 10.94C10.7649 11.12 10.5449 11.2 10.3049 11.2C10.0649 11.2 9.84493 11.12 9.66493 10.94L6.00492 7.28004L2.34491 10.94C2.16491 11.12 1.94492 11.2 1.70492 11.2C1.46492 11.2 1.24493 11.12 1.06493 10.94C0.704932 10.58 0.704932 10.02 1.06493 9.66003L4.72492 6.00004L1.06493 2.34004C0.704932 1.98004 0.704932 1.42004 1.06493 1.06004C1.42493 0.700037 1.98491 0.700037 2.34491 1.06004L6.00492 4.72003L9.66493 1.06004C10.0249 0.700037 10.5849 0.700037 10.9449 1.06004C11.3049 1.42004 11.3049 1.98004 10.9449 2.34004L7.2849 6.00004L10.9449 9.66003Z","iconColor":"#161e1f","iconRotate":45,"boxStyles":{"padding":{"top":2,"right":0,"bottom":0,"left":0},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColorHover":""}} -->
<div class="cozy-block-icon-picker stacked" id="cozyBlock_c2d5c94f_227c_4ff0_a4d1_043d441dc0f3"><svg width="14" height="14" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="#161e1f"><path d="M10.9449 9.66003C11.3049 10.02 11.3049 10.58 10.9449 10.94C10.7649 11.12 10.5449 11.2 10.3049 11.2C10.0649 11.2 9.84493 11.12 9.66493 10.94L6.00492 7.28004L2.34491 10.94C2.16491 11.12 1.94492 11.2 1.70492 11.2C1.46492 11.2 1.24493 11.12 1.06493 10.94C0.704932 10.58 0.704932 10.02 1.06493 9.66003L4.72492 6.00004L1.06493 2.34004C0.704932 1.98004 0.704932 1.42004 1.06493 1.06004C1.42493 0.700037 1.98491 0.700037 2.34491 1.06004L6.00492 4.72003L9.66493 1.06004C10.0249 0.700037 10.5849 0.700037 10.9449 1.06004C11.3049 1.42004 11.3049 1.98004 10.9449 2.34004L7.2849 6.00004L10.9449 9.66003Z"></path></svg></div>
<!-- /wp:cozy-block/icon-picker --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}}}} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#646464"><?php esc_html_e( 'International Awards', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"0"}},"cozyAnimation":{"type":"none","easingFunction":"ease-in","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-column" style="padding-top:0;padding-bottom:0"><!-- wp:image {"id":1934,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( $images[3] ); ?>" alt="" class="wp-image-1934"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"4px","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:cozy-block/counter {"blockClientId":"d9bb0ae1-e920-4e85-81ad-1c2e907564ee","endNumber":"35","styles":{"fontFamily":"default","fontSize":34,"color":"#161e1f","fontWeight":"600"}} -->
<div class="cozy-block-counter" id="cozyBlock_d9bb0ae1_e920_4e85_81ad_1c2e907564ee"><span><?php esc_html_e( '0', 'cozy-addons' ); ?></span></div>
<!-- /wp:cozy-block/counter -->

<!-- wp:cozy-block/icon-picker {"blockClientId":"79910d8b-952c-4ebd-b9f4-d590f5b8148f","view":"stacked","iconSize":14,"iconViewBox":{"vx":"0","vy":"0","vw":"12","vh":"12"},"iconPath":"M10.9449 9.66003C11.3049 10.02 11.3049 10.58 10.9449 10.94C10.7649 11.12 10.5449 11.2 10.3049 11.2C10.0649 11.2 9.84493 11.12 9.66493 10.94L6.00492 7.28004L2.34491 10.94C2.16491 11.12 1.94492 11.2 1.70492 11.2C1.46492 11.2 1.24493 11.12 1.06493 10.94C0.704932 10.58 0.704932 10.02 1.06493 9.66003L4.72492 6.00004L1.06493 2.34004C0.704932 1.98004 0.704932 1.42004 1.06493 1.06004C1.42493 0.700037 1.98491 0.700037 2.34491 1.06004L6.00492 4.72003L9.66493 1.06004C10.0249 0.700037 10.5849 0.700037 10.9449 1.06004C11.3049 1.42004 11.3049 1.98004 10.9449 2.34004L7.2849 6.00004L10.9449 9.66003Z","iconColor":"#161e1f","iconRotate":45,"boxStyles":{"padding":{"top":2,"right":0,"bottom":0,"left":0},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColorHover":""}} -->
<div class="cozy-block-icon-picker stacked" id="cozyBlock_79910d8b_952c_4ebd_b9f4_d590f5b8148f"><svg width="14" height="14" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="#161e1f"><path d="M10.9449 9.66003C11.3049 10.02 11.3049 10.58 10.9449 10.94C10.7649 11.12 10.5449 11.2 10.3049 11.2C10.0649 11.2 9.84493 11.12 9.66493 10.94L6.00492 7.28004L2.34491 10.94C2.16491 11.12 1.94492 11.2 1.70492 11.2C1.46492 11.2 1.24493 11.12 1.06493 10.94C0.704932 10.58 0.704932 10.02 1.06493 9.66003L4.72492 6.00004L1.06493 2.34004C0.704932 1.98004 0.704932 1.42004 1.06493 1.06004C1.42493 0.700037 1.98491 0.700037 2.34491 1.06004L6.00492 4.72003L9.66493 1.06004C10.0249 0.700037 10.5849 0.700037 10.9449 1.06004C11.3049 1.42004 11.3049 1.98004 10.9449 2.34004L7.2849 6.00004L10.9449 9.66003Z"></path></svg></div>
<!-- /wp:cozy-block/icon-picker --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}}}} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#646464"><?php esc_html_e( 'Years of Experience', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:cozy-block/icon-list {"blockClientId":"540e7c77-dd21-4226-baff-b25fdebb615f","iconView":"stacked","iconPosition":"right","iconSize":18,"iconColor":"#0824b0","iconColorHover":"#f49805","iconRotate":310,"containerStyles":{"width":149,"height":"","gap":0,"padding":{"top":14,"right":36,"bottom":14,"left":36},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":{"top":100,"right":100,"bottom":100,"left":100},"bgColor":"#0823af","bgColorHover":"#f49805"},"iconBoxStyles":{"padding":{"top":5,"right":5,"bottom":5,"left":5},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColor":"#fffffe"},"typography":{"fontFamily":"","fontSize":14,"fontWeight":"600","color":"#fffffe"}} -->
<ul class="cozy-block-icon-list vertical stacked fill" id="cozyBlock_540e7c77_dd21_4226_baff_b25fdebb615f"><!-- wp:cozy-block/list-item {"blockClientId":"883959ce-0e5e-434b-b717-84539ec7fb2c","iconViewBox":{"vx":"0","vy":"0","vw":"24","vh":"24"},"iconPath":"M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z","parentAttrs":{"enableLogo":true,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"right"},"title":"<?php esc_html_e( 'FIND OUT MORE', 'cozy-addons' ); ?>","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_883959ce_0e5e_434b_b717_84539ec7fb2c"><p><?php esc_html_e( 'FIND OUT MORE', 'cozy-addons' ); ?></p><div class="list-icon-wrapper"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z"></path></svg></div></li></a></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"zoom-in-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-column"><!-- wp:image {"id":1931,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-1931"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->