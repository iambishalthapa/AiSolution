<?php
/**
 * Title: Hero Section seventeen with cover
 * Description: This is a hero section.
 * Slug: cozy-block-patterns/hero-seventeen
 * Categories: cozy-block-patterns, hero
 * Premium: true
 */

$images = array( CT_ASSETS_URL . 'images/hero_17.jpg' );
?>

<!-- wp:cover {"url":"<?php echo esc_url( $images[0] ); ?>","id":1549,"dimRatio":0,"customOverlayColor":"#c1a46c","isUserOverlayColor":true,"minHeight":700,"minHeightUnit":"px","isDark":false,"metadata":{"name":"Hero"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-cover alignfull is-light" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:700px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#c1a46c"></span><img class="wp-block-cover__image-background wp-image-1549" alt="" src="<?php echo esc_url( $images[0] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"16px","left":"16px","top":"0px","bottom":"0px"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"824px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0px;padding-right:16px;padding-bottom:0px;padding-left:16px"><!-- wp:group {"style":{"color":{"background":"#20190040","text":"#fffffe"},"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"top":"26px","bottom":"26px","left":"16px","right":"16px"}},"elements":{"link":{"color":{"text":"#fffffe"}}}},"layout":{"type":"constrained","contentSize":"731px"},"cozyCustomFont":"Nunito Sans"} -->
<div class="wp-block-group has-text-color has-background has-link-color" style="color:#fffffe;background-color:#20190040;margin-top:0;margin-bottom:0;padding-top:26px;padding-right:16px;padding-bottom:26px;padding-left:16px"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"30px","lineHeight":"1.2"}},"cozyCustomFont":"Great Vibes"} -->
<p class="has-text-align-center" style="font-size:30px;line-height:1.2"><?php esc_html_e( 'Summer Collection', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"typography":{"fontSize":"55px","fontStyle":"normal","fontWeight":"700","lineHeight":"1.2"}},"cozyCustomFont":"Nunito Sans"} -->
<h2 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#fffffe;font-size:55px;font-style:normal;font-weight:700;line-height:1.2"><?php esc_html_e( 'Modern Summer Collection!', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"14px"},"color":{"text":"#ebebeb"},"elements":{"link":{"color":{"text":"#ebebeb"}}}}} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#ebebeb;font-size:14px"><?php esc_html_e( 'Nam vitae sapien dapibus, condimentum ipsum non, porttitor purus. Cras et diam ac – nunc urna magna, porttitor eu laoreet aliquam velit.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"26px"}}},"layout":{"type":"constrained","contentSize":"190px"}} -->
<div class="wp-block-group" style="margin-top:26px"><!-- wp:cozy-block/icon-list {"blockClientId":"b0c69c19-e5d3-431b-a8fe-a3f85f23fa1f","iconPosition":"right","iconSize":22,"iconColor":"#fffffe","containerStyles":{"width":"","height":"","gap":10,"padding":{"top":14,"right":32,"bottom":14,"left":32},"borderType":"solid","borderWidth":2,"borderColor":"#fffffe","borderColorHover":"#2797ff","borderRadius":{"top":100,"right":100,"bottom":100,"left":100},"bgColor":"","bgColorHover":"#2797ff"},"typography":{"fontFamily":"","fontSize":16,"fontWeight":"500"}} -->
<ul class="cozy-block-icon-list vertical default fill" id="cozyBlock_b0c69c19_e5d3_431b_a8fe_a3f85f23fa1f"><!-- wp:cozy-block/list-item {"blockClientId":"0042927d-15cd-42ab-9c21-008a6d862fdf","iconViewBox":{"vx":"0","vy":"0","vw":"24","vh":"24"},"iconPath":"M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z","parentAttrs":{"enableLogo":true,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"right"},"title":"<?php esc_html_e( 'Get Started', 'cozy-addons' ); ?>","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_0042927d_15cd_42ab_9c21_008a6d862fdf"><p><?php esc_html_e( 'Get Started', 'cozy-addons' ); ?></p><div class="list-icon-wrapper"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z"></path></svg></div></li></a></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->