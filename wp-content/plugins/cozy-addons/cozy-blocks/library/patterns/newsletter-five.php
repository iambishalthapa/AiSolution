<?php
	/**
	 * Title: Newsletter section five with contact form
	 * Description: This is newsletter section with contact form
	 * Slug: cozy-block-patterns/newsletter-five
	 * Categories: cozy-block-patterns, newsletter
	 * Premium: true
	 * Dynamic: true
	 */

	$images = array(
		CT_ASSETS_URL . 'images/newsletter_5_1.png',
	);

	?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Newsletter', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"gradient":"linear-gradient(135deg,rgb(96,0,217) 0%,rgb(33,30,177) 100%)"}},"className":"cozy-block-pattern__newsletter-five","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull cozy-block-pattern__newsletter-five has-background" style="background:linear-gradient(135deg,rgb(96,0,217) 0%,rgb(33,30,177) 100%);margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:columns {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"0","left":"36px"},"padding":{"top":"0","bottom":"0"}}},"cozyAnimation":{"type":"none","easingFunction":"ease","anchorPlacement":"top-bottom","duration":900}} -->
<div class="wp-block-columns" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0"><!-- wp:column {"verticalAlignment":"bottom","style":{"spacing":{"blockGap":"0","padding":{"top":"20px","bottom":"0","left":"0","right":"0"}},"color":{"text":"#030305"},"elements":{"link":{"color":{"text":"#030305"}}}},"cozyCustomFont":"Public Sans","cozyAnimation":{"type":"none","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":800}} -->
<div class="wp-block-column is-vertically-aligned-bottom has-text-color has-link-color" style="color:#030305;padding-top:20px;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:image {"id":4683,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-4683"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"}}} -->
<div class="wp-block-column is-vertically-aligned-center has-text-color has-link-color" style="color:#fffffe;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"color":{"text":"#ebebeb"},"elements":{"link":{"color":{"text":"#ebebeb"}}},"typography":{"fontSize":"14px"},"spacing":{"margin":{"bottom":"0px"},"padding":{"top":"40px","bottom":"80px"}}},"layout":{"type":"constrained"},"cozyCustomFont":"Poppins"} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#ebebeb;margin-bottom:0px;padding-top:40px;padding-bottom:80px;font-size:14px"><!-- wp:group {"style":{"spacing":{"blockGap":"6px","padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"566px","justifyContent":"left"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:heading {"textAlign":"left","style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"typography":{"fontSize":"44px","lineHeight":"1.2","fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"bottom":"0"}},"color":{"text":"#fffffe"}},"cozyCustomFont":"Public Sans"} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color" style="color:#fffffe;margin-bottom:0;font-size:44px;font-style:normal;font-weight:600;line-height:1.2"><?php esc_html_e( 'Stay Subscribed With Our Newsletter', 'cozy-addons' ); ?>!</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","fontSize":"x-small"} -->
<p class="has-text-align-left has-x-small-font-size"><?php esc_html_e( 'In the context of a SaaS WordPress theme, the term "process" typically refers to the workflow or sequence of steps involved in setting up.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"26px","bottom":"26px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:26px;margin-bottom:26px"><!-- wp:shortcode -->
[contact-form-7 id="325f512" title="Newsletter with stacked button"]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->

<!-- wp:cozy-block/icon-list {"blockClientId":"4c224231-9507-493b-a349-144e9d036db5","iconPosition":"right","iconSize":18,"iconColor":"#fffffe","iconColorHover":"#ff9900","iconGap":0,"containerStyles":{"width":205,"height":"","gap":0,"padding":{"top":0,"right":0,"bottom":0,"left":0},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":{"top":5,"right":5,"bottom":5,"left":5},"bgColor":"","bgColorHover":""},"typography":{"fontFamily":"","fontSize":16,"colorHover":"#ff9900","fontWeight":400}} -->
<ul class="cozy-block-icon-list vertical default fill" id="cozyBlock_4c224231_9507_493b_a349_144e9d036db5"><!-- wp:cozy-block/list-item {"blockClientId":"822be83c-1fbd-4364-90bf-595b4737b1f5","iconViewBox":{"vx":"0","vy":"0","vw":"24","vh":"24"},"iconPath":"M15.405 12C15.405 12.22 15.325 12.42 15.165 12.58L9.96501 17.58C9.80501 17.72 9.605 17.8 9.405 17.8C9.185 17.8 8.985 17.72 8.825 17.56C8.525 17.24 8.52499 16.74 8.84499 16.42L13.445 12L8.84499 7.57999C8.52499 7.27999 8.525 6.76 8.825 6.44C9.125 6.12 9.64501 6.12 9.96501 6.42L15.165 11.42C15.325 11.58 15.405 11.78 15.405 12Z","parentAttrs":{"enableLogo":true,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"right"},"title":"<?php esc_html_e( 'Get the Latest Updates', 'cozy-addons' ); ?>","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_822be83c_1fbd_4364_90bf_595b4737b1f5"><p><?php esc_html_e( 'Get the Latest Updates', 'cozy-addons' ); ?></p><div class="list-icon-wrapper"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M15.405 12C15.405 12.22 15.325 12.42 15.165 12.58L9.96501 17.58C9.80501 17.72 9.605 17.8 9.405 17.8C9.185 17.8 8.985 17.72 8.825 17.56C8.525 17.24 8.52499 16.74 8.84499 16.42L13.445 12L8.84499 7.57999C8.52499 7.27999 8.525 6.76 8.825 6.44C9.125 6.12 9.64501 6.12 9.96501 6.42L15.165 11.42C15.325 11.58 15.405 11.78 15.405 12Z"></path></svg></div></li></a></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->