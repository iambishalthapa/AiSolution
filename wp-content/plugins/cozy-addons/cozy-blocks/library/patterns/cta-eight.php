<?php
/**
 * Title: Call to Action section eight with animation
 * Description: This is call to action section with animation
 * Slug: cozy-block-patterns/cta-eight
 * Categories: cozy-block-patterns, call-to-action
 */

$images = array(
	CT_ASSETS_URL . 'images/cta_8.jpg',
);
?>

<!-- wp:cover {"url":"<?php echo esc_url( $images[0] ); ?>","id":4456,"dimRatio":30,"isUserOverlayColor":true,"metadata":{"name":"<?php esc_html_e( 'Call To Action', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-cover alignfull" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-30 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-4456" alt="" src="<?php echo esc_url( $images[0] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"top":"120px","bottom":"120px","left":"16px","right":"16px"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:120px;padding-right:16px;padding-bottom:120px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"blockGap":"0"},"elements":{"link":{"color":{"text":"#ebebeb"}}},"color":{"text":"#ebebeb"},"typography":{"fontSize":"14px"}},"layout":{"type":"constrained","contentSize":"733px"},"cozyCustomFont":"Public Sans"} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#ebebeb;font-size:14px"><!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"typography":{"fontSize":"48px","lineHeight":"1.3","fontStyle":"normal","fontWeight":"600"}},"cozyCustomFont":"Inter","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#fffffe;font-size:48px;font-style:normal;font-weight:600;line-height:1.3"><?php esc_html_e( 'Get Free Tech Consultation With Us.', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php esc_html_e( 'Frustrated by a slow website? We’ll help you tame those speed demons so you can keep visitors coming back for more!', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"500","textDecoration":"none","textTransform":"uppercase"},"spacing":{"margin":{"top":"26px"}}}} -->
<div class="wp-block-buttons has-custom-font-size" style="margin-top:26px;font-size:16px;font-style:normal;font-weight:500;text-decoration:none;text-transform:uppercase"><!-- wp:button {"style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe","background":"#ff5c00"},"spacing":{"padding":{"left":"36px","right":"36px","top":"14px","bottom":"14px"}},"border":{"radius":"100px"}},"cozyHoverStyles":{"bgColor":"#f49805","color":"#fffffe","borderColor":""},"cozyAnimation":{"type":"fade-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background has-link-color wp-element-button" style="border-radius:100px;color:#fffffe;background-color:#ff5c00;padding-top:14px;padding-right:36px;padding-bottom:14px;padding-left:36px"><?php esc_html_e( 'Get Started', 'cozy-addons' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->