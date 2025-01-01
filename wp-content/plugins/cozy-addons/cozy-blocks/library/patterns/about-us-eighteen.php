<?php
	/**
	 * Title: About us section eighteen with columns animation
	 * Description: This is about us section with columns, animation
	 * Slug: cozy-block-patterns/about-us-eighteen
	 * Categories: cozy-block-patterns, about-us
	 * Premium: true
	 */

	$images = array(
		CT_ASSETS_URL . 'images/about-us_18_1.jpg',
		CT_ASSETS_URL . 'images/about-us_18_2.jpg',
	);
	?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'About Us', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"background":"#fffffe"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"right":"16px","left":"16px","top":"80px","bottom":"80px"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"36px","left":"36px"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"525px","justifyContent":"left"},"cozyCustomFont":"Public Sans"} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:image {"id":4740,"sizeSlug":"full","linkDestination":"none","align":"full"} -->
<figure class="wp-block-image alignfull size-full"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-4740"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"style":{"typography":{"fontSize":"44px","lineHeight":"1.3","fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"10px","bottom":"6px"}}},"cozyCustomFont":"Playfair Display","cozyAnimation":{"type":"flip-up","easingFunction":"ease","anchorPlacement":"top-bottom","duration":1000}} -->
<h2 class="wp-block-heading" style="margin-top:10px;margin-bottom:6px;font-size:44px;font-style:normal;font-weight:600;line-height:1.3"><?php esc_html_e( 'Navigating Challenges, Delivering Results.', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#646464"}}},"color":{"text":"#646464"},"typography":{"fontSize":"14px"}}} -->
<p class="has-text-color has-link-color" style="color:#646464;font-size:14px"><?php esc_html_e( 'Far far away, behind the word mountains, far from the countries Vocalic and Consonantal, there live the blind texts. Separated they live in Bookmarks grove right at the coast of the Semantics, a large language ocean.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"uppercase","textDecoration":"none","fontSize":"14px"},"spacing":{"margin":{"top":"26px"}}},"cozyCustomFont":"Poppins","cozyAnimation":{"type":"fade-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":1000}} -->
<div class="wp-block-buttons has-custom-font-size" style="margin-top:26px;font-size:14px;font-style:normal;font-weight:500;text-decoration:none;text-transform:uppercase"><!-- wp:button {"style":{"color":{"background":"#003d4b","text":"#fffffe"},"elements":{"link":{"color":{"text":"#fffffe"}}},"border":{"radius":"5px"},"spacing":{"padding":{"left":"36px","right":"36px","top":"14px","bottom":"14px"}}},"cozyHoverStyles":{"bgColor":"#0d5fff","color":"#fffffe","borderColor":""}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background has-link-color wp-element-button" style="border-radius:5px;color:#fffffe;background-color:#003d4b;padding-top:14px;padding-right:36px;padding-bottom:14px;padding-left:36px"><?php esc_html_e( 'About The Company', 'cozy-addons' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"zoom-in-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":1000}} -->
<div class="wp-block-column"><!-- wp:image {"id":4739,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-4739"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->