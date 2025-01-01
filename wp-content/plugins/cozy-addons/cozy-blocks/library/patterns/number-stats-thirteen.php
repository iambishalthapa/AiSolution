<?php
	/**
	 * Title: Number and Stats section thirteen with counter
	 * Description: This is number and stats section with counter.
	 * Slug: cozy-block-patterns/number-and-stats-thirteen
	 * Categories: cozy-block-patterns, number-and-stats
	 * Premium: true
	 */

	$images = array(
		CT_ASSETS_URL . 'images/number-stats_13_1.png',
		CT_ASSETS_URL . 'images/number-stats_13_2.png',
		CT_ASSETS_URL . 'images/number-stats_13_3.png',
		CT_ASSETS_URL . 'images/number-stats_13_4.png',
	);
	?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Number and Stats', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"color":{"background":"#024469"},"border":{"bottom":{"color":"#ffffff26","width":"1px"},"top":[],"right":[],"left":[]}},"className":"cozy-block-pattern__responsive-border-none","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull cozy-block-pattern__responsive-border-none has-background" style="border-bottom-color:#ffffff26;border-bottom-width:1px;background-color:#024469;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"16px","left":"16px","top":"80px","bottom":"80px"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:columns {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"26px","left":"0px"}},"elements":{"link":{"color":{"text":"#ebebeb"},":hover":{"color":{"text":"#1262ff"}}}},"color":{"text":"#ebebeb"},"typography":{"fontSize":"14px"}},"cozyCustomFont":"Inter","cozyAnimation":{"type":"none","easingFunction":"ease-in","anchorPlacement":"top-center","duration":600}} -->
<div class="wp-block-columns has-text-color has-link-color" style="color:#ebebeb;margin-top:0;margin-bottom:0;font-size:14px"><!-- wp:column {"style":{"spacing":{"blockGap":"0"},"border":{"right":{"color":"#ffffff26","width":"1px"},"top":[],"bottom":[],"left":[]}},"layout":{"type":"default"},"cozyAnimation":{"type":"none","easingFunction":"ease-in","anchorPlacement":"top-center","duration":600}} -->
<div class="wp-block-column" style="border-right-color:#ffffff26;border-right-width:1px"><!-- wp:image {"id":1836,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-1836"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:cozy-block/counter {"blockClientId":"a8d6e552-dab3-49fb-983d-d3875146d4b5","endNumber":"1200","textAlign":"left","styles":{"fontFamily":"default","fontSize":44,"fontWeight":"700"}} -->
<div class="cozy-block-counter" id="cozyBlock_a8d6e552_dab3_49fb_983d_d3875146d4b5"><span><?php esc_html_e( '0', 'cozy-addons' ); ?></span></div>
<!-- /wp:cozy-block/counter -->

<!-- wp:cozy-block/icon-picker {"blockClientId":"0ac633c0-40a0-42f5-8851-cbcb2f36cbc2","view":"stacked","iconSize":16,"iconViewBox":{"vx":"0","vy":"0","vw":"12","vh":"12"},"iconPath":"M10.9449 9.66003C11.3049 10.02 11.3049 10.58 10.9449 10.94C10.7649 11.12 10.5449 11.2 10.3049 11.2C10.0649 11.2 9.84493 11.12 9.66493 10.94L6.00492 7.28004L2.34491 10.94C2.16491 11.12 1.94492 11.2 1.70492 11.2C1.46492 11.2 1.24493 11.12 1.06493 10.94C0.704932 10.58 0.704932 10.02 1.06493 9.66003L4.72492 6.00004L1.06493 2.34004C0.704932 1.98004 0.704932 1.42004 1.06493 1.06004C1.42493 0.700037 1.98491 0.700037 2.34491 1.06004L6.00492 4.72003L9.66493 1.06004C10.0249 0.700037 10.5849 0.700037 10.9449 1.06004C11.3049 1.42004 11.3049 1.98004 10.9449 2.34004L7.2849 6.00004L10.9449 9.66003Z","iconColor":"#fffffe","iconRotate":46,"boxStyles":{"padding":{"top":4,"right":0,"bottom":0,"left":0},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColorHover":""}} -->
<div class="cozy-block-icon-picker stacked" id="cozyBlock_0ac633c0_40a0_42f5_8851_cbcb2f36cbc2"><svg width="16" height="16" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="#fffffe"><path d="M10.9449 9.66003C11.3049 10.02 11.3049 10.58 10.9449 10.94C10.7649 11.12 10.5449 11.2 10.3049 11.2C10.0649 11.2 9.84493 11.12 9.66493 10.94L6.00492 7.28004L2.34491 10.94C2.16491 11.12 1.94492 11.2 1.70492 11.2C1.46492 11.2 1.24493 11.12 1.06493 10.94C0.704932 10.58 0.704932 10.02 1.06493 9.66003L4.72492 6.00004L1.06493 2.34004C0.704932 1.98004 0.704932 1.42004 1.06493 1.06004C1.42493 0.700037 1.98491 0.700037 2.34491 1.06004L6.00492 4.72003L9.66493 1.06004C10.0249 0.700037 10.5849 0.700037 10.9449 1.06004C11.3049 1.42004 11.3049 1.98004 10.9449 2.34004L7.2849 6.00004L10.9449 9.66003Z"></path></svg></div>
<!-- /wp:cozy-block/icon-picker --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php esc_html_e( 'Successful Cases', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"0"},"border":{"right":{"color":"#ffffff26","width":"1px"}}},"layout":{"type":"default"},"cozyAnimation":{"type":"none","easingFunction":"ease-in","anchorPlacement":"top-center","duration":600}} -->
<div class="wp-block-column" style="border-right-color:#ffffff26;border-right-width:1px"><!-- wp:image {"id":1837,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-1837"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:cozy-block/counter {"blockClientId":"2e5ba209-88ad-4842-b0be-42473f283764","endNumber":"600","styles":{"fontFamily":"default","fontSize":44,"fontWeight":"700"}} -->
<div class="cozy-block-counter" id="cozyBlock_2e5ba209_88ad_4842_b0be_42473f283764"><span><?php esc_html_e( '0', 'cozy-addons' ); ?></span></div>
<!-- /wp:cozy-block/counter -->

<!-- wp:cozy-block/icon-picker {"blockClientId":"ea97938e-baaf-47e0-88bb-408388f242d2","view":"stacked","iconSize":16,"iconViewBox":{"vx":"0","vy":"0","vw":"12","vh":"12"},"iconPath":"M10.9449 9.66003C11.3049 10.02 11.3049 10.58 10.9449 10.94C10.7649 11.12 10.5449 11.2 10.3049 11.2C10.0649 11.2 9.84493 11.12 9.66493 10.94L6.00492 7.28004L2.34491 10.94C2.16491 11.12 1.94492 11.2 1.70492 11.2C1.46492 11.2 1.24493 11.12 1.06493 10.94C0.704932 10.58 0.704932 10.02 1.06493 9.66003L4.72492 6.00004L1.06493 2.34004C0.704932 1.98004 0.704932 1.42004 1.06493 1.06004C1.42493 0.700037 1.98491 0.700037 2.34491 1.06004L6.00492 4.72003L9.66493 1.06004C10.0249 0.700037 10.5849 0.700037 10.9449 1.06004C11.3049 1.42004 11.3049 1.98004 10.9449 2.34004L7.2849 6.00004L10.9449 9.66003Z","iconColor":"#fffffe","iconRotate":46,"boxStyles":{"padding":{"top":4,"right":0,"bottom":0,"left":0},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColorHover":""}} -->
<div class="cozy-block-icon-picker stacked" id="cozyBlock_ea97938e_baaf_47e0_88bb_408388f242d2"><svg width="16" height="16" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="#fffffe"><path d="M10.9449 9.66003C11.3049 10.02 11.3049 10.58 10.9449 10.94C10.7649 11.12 10.5449 11.2 10.3049 11.2C10.0649 11.2 9.84493 11.12 9.66493 10.94L6.00492 7.28004L2.34491 10.94C2.16491 11.12 1.94492 11.2 1.70492 11.2C1.46492 11.2 1.24493 11.12 1.06493 10.94C0.704932 10.58 0.704932 10.02 1.06493 9.66003L4.72492 6.00004L1.06493 2.34004C0.704932 1.98004 0.704932 1.42004 1.06493 1.06004C1.42493 0.700037 1.98491 0.700037 2.34491 1.06004L6.00492 4.72003L9.66493 1.06004C10.0249 0.700037 10.5849 0.700037 10.9449 1.06004C11.3049 1.42004 11.3049 1.98004 10.9449 2.34004L7.2849 6.00004L10.9449 9.66003Z"></path></svg></div>
<!-- /wp:cozy-block/icon-picker --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php esc_html_e( 'International Awards', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"0"},"border":{"right":{"color":"#ffffff26","width":"1px"},"top":[],"bottom":[],"left":[]}},"cozyAnimation":{"type":"none","easingFunction":"ease-in","anchorPlacement":"top-center","duration":600}} -->
<div class="wp-block-column" style="border-right-color:#ffffff26;border-right-width:1px"><!-- wp:image {"id":1838,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-1838"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:cozy-block/counter {"blockClientId":"43752889-f3d8-4b51-8fa9-3d5fcae288cb","endNumber":"35","styles":{"fontFamily":"default","fontSize":44,"fontWeight":"700"}} -->
<div class="cozy-block-counter" id="cozyBlock_43752889_f3d8_4b51_8fa9_3d5fcae288cb"><span><?php esc_html_e( '0', 'cozy-addons' ); ?></span></div>
<!-- /wp:cozy-block/counter -->

<!-- wp:cozy-block/icon-picker {"blockClientId":"4ae761a8-bfa8-468b-9c2c-27f7e49777bb","view":"stacked","iconSize":16,"iconViewBox":{"vx":"0","vy":"0","vw":"12","vh":"12"},"iconPath":"M10.9449 9.66003C11.3049 10.02 11.3049 10.58 10.9449 10.94C10.7649 11.12 10.5449 11.2 10.3049 11.2C10.0649 11.2 9.84493 11.12 9.66493 10.94L6.00492 7.28004L2.34491 10.94C2.16491 11.12 1.94492 11.2 1.70492 11.2C1.46492 11.2 1.24493 11.12 1.06493 10.94C0.704932 10.58 0.704932 10.02 1.06493 9.66003L4.72492 6.00004L1.06493 2.34004C0.704932 1.98004 0.704932 1.42004 1.06493 1.06004C1.42493 0.700037 1.98491 0.700037 2.34491 1.06004L6.00492 4.72003L9.66493 1.06004C10.0249 0.700037 10.5849 0.700037 10.9449 1.06004C11.3049 1.42004 11.3049 1.98004 10.9449 2.34004L7.2849 6.00004L10.9449 9.66003Z","iconColor":"#fffffe","iconRotate":46,"boxStyles":{"padding":{"top":4,"right":0,"bottom":0,"left":0},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColorHover":""}} -->
<div class="cozy-block-icon-picker stacked" id="cozyBlock_4ae761a8_bfa8_468b_9c2c_27f7e49777bb"><svg width="16" height="16" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="#fffffe"><path d="M10.9449 9.66003C11.3049 10.02 11.3049 10.58 10.9449 10.94C10.7649 11.12 10.5449 11.2 10.3049 11.2C10.0649 11.2 9.84493 11.12 9.66493 10.94L6.00492 7.28004L2.34491 10.94C2.16491 11.12 1.94492 11.2 1.70492 11.2C1.46492 11.2 1.24493 11.12 1.06493 10.94C0.704932 10.58 0.704932 10.02 1.06493 9.66003L4.72492 6.00004L1.06493 2.34004C0.704932 1.98004 0.704932 1.42004 1.06493 1.06004C1.42493 0.700037 1.98491 0.700037 2.34491 1.06004L6.00492 4.72003L9.66493 1.06004C10.0249 0.700037 10.5849 0.700037 10.9449 1.06004C11.3049 1.42004 11.3049 1.98004 10.9449 2.34004L7.2849 6.00004L10.9449 9.66003Z"></path></svg></div>
<!-- /wp:cozy-block/icon-picker --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php esc_html_e( 'Years of Experience', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"none","easingFunction":"ease-in","anchorPlacement":"top-center","duration":600}} -->
<div class="wp-block-column"><!-- wp:image {"id":1839,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( $images[3] ); ?>" alt="" class="wp-image-1839"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:cozy-block/counter {"blockClientId":"056d3190-3238-4d71-af0c-31b4c236ab2d","endNumber":"900","styles":{"fontFamily":"default","fontSize":44,"fontWeight":"700"}} -->
<div class="cozy-block-counter" id="cozyBlock_056d3190_3238_4d71_af0c_31b4c236ab2d"><span><?php esc_html_e( '0', 'cozy-addons' ); ?></span></div>
<!-- /wp:cozy-block/counter -->

<!-- wp:cozy-block/icon-picker {"blockClientId":"8874d487-42b1-4d3e-ae6e-c070f163b81a","view":"stacked","iconSize":16,"iconViewBox":{"vx":"0","vy":"0","vw":"12","vh":"12"},"iconPath":"M10.9449 9.66003C11.3049 10.02 11.3049 10.58 10.9449 10.94C10.7649 11.12 10.5449 11.2 10.3049 11.2C10.0649 11.2 9.84493 11.12 9.66493 10.94L6.00492 7.28004L2.34491 10.94C2.16491 11.12 1.94492 11.2 1.70492 11.2C1.46492 11.2 1.24493 11.12 1.06493 10.94C0.704932 10.58 0.704932 10.02 1.06493 9.66003L4.72492 6.00004L1.06493 2.34004C0.704932 1.98004 0.704932 1.42004 1.06493 1.06004C1.42493 0.700037 1.98491 0.700037 2.34491 1.06004L6.00492 4.72003L9.66493 1.06004C10.0249 0.700037 10.5849 0.700037 10.9449 1.06004C11.3049 1.42004 11.3049 1.98004 10.9449 2.34004L7.2849 6.00004L10.9449 9.66003Z","iconColor":"#fffffe","iconRotate":46,"boxStyles":{"padding":{"top":4,"right":0,"bottom":0,"left":0},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":50,"bgColorHover":""}} -->
<div class="cozy-block-icon-picker stacked" id="cozyBlock_8874d487_42b1_4d3e_ae6e_c070f163b81a"><svg width="16" height="16" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="#fffffe"><path d="M10.9449 9.66003C11.3049 10.02 11.3049 10.58 10.9449 10.94C10.7649 11.12 10.5449 11.2 10.3049 11.2C10.0649 11.2 9.84493 11.12 9.66493 10.94L6.00492 7.28004L2.34491 10.94C2.16491 11.12 1.94492 11.2 1.70492 11.2C1.46492 11.2 1.24493 11.12 1.06493 10.94C0.704932 10.58 0.704932 10.02 1.06493 9.66003L4.72492 6.00004L1.06493 2.34004C0.704932 1.98004 0.704932 1.42004 1.06493 1.06004C1.42493 0.700037 1.98491 0.700037 2.34491 1.06004L6.00492 4.72003L9.66493 1.06004C10.0249 0.700037 10.5849 0.700037 10.9449 1.06004C11.3049 1.42004 11.3049 1.98004 10.9449 2.34004L7.2849 6.00004L10.9449 9.66003Z"></path></svg></div>
<!-- /wp:cozy-block/icon-picker --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php esc_html_e( 'Expert Doctors', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->