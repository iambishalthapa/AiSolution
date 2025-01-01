<?php
/**
 * Title: Logo Showcase section one with grid animation
 * Description: This is logo showcase section with grid, animation
 * Slug: cozy-block-patterns/logo-showcase-one
 * Categories: cozy-block-patterns, logo-showcase
 */

$images = array(
	CT_ASSETS_URL . 'images/logo_1.png',
	CT_ASSETS_URL . 'images/logo_2.png',
	CT_ASSETS_URL . 'images/logo_4.png',
	CT_ASSETS_URL . 'images/logo_5.png',
);
?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Logo Showcase', 'cozy-addons' ); ?>"},"align":"full","style":{"color":{"background":"#fffffe"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"16px","right":"16px"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:columns {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":{"top":"0"}}}} -->
<div class="wp-block-columns" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"},"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}},"typography":{"fontSize":"14px"}},"cozyCustomFont":"Poppins"} -->
<div class="wp-block-column is-vertically-aligned-center has-text-color has-link-color" style="color:#646464;font-size:14px"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"459px","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#3620be"}}},"color":{"text":"#3620be"},"typography":{"fontSize":"14px","textTransform":"uppercase","fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"}}} -->
<p class="has-text-color has-link-color" style="color:#3620be;font-size:14px;font-style:normal;font-weight:500;line-height:1.2;text-transform:uppercase"><?php esc_html_e( 'Our Partners', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"lineHeight":"1.2","fontSize":"44px","fontStyle":"normal","fontWeight":"600"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}}},"cozyCustomFont":"Public Sans","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<h2 class="wp-block-heading has-text-color has-link-color" style="color:#090b10;font-size:44px;font-style:normal;font-weight:600;line-height:1.2"><?php esc_html_e( 'We Provide Best Solution For Your Company', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"6px"}}}} -->
<p style="margin-top:6px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"zoom-in-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":1000}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","style":{"border":{"color":"#0000001a","width":"1px"},"spacing":{"padding":{"right":"16px","left":"16px","top":"34px","bottom":"34px"},"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-center has-border-color" style="border-color:#0000001a;border-width:1px;padding-top:34px;padding-right:16px;padding-bottom:34px;padding-left:16px"><!-- wp:image {"id":2746,"width":"159px","height":"29px","scale":"contain","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-2746" style="object-fit:contain;width:159px;height:29px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"border":{"color":"#0000001a","width":"1px"},"spacing":{"padding":{"right":"16px","left":"16px","top":"34px","bottom":"30px"},"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-center has-border-color" style="border-color:#0000001a;border-width:1px;padding-top:34px;padding-right:16px;padding-bottom:30px;padding-left:16px"><!-- wp:image {"id":2747,"width":"159px","height":"33px","scale":"contain","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-2747" style="object-fit:contain;width:159px;height:33px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"border":{"color":"#0000001a","width":"1px"},"spacing":{"padding":{"right":"16px","left":"16px","top":"34px","bottom":"34px"},"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-center has-border-color" style="border-color:#0000001a;border-width:1px;padding-top:34px;padding-right:16px;padding-bottom:34px;padding-left:16px"><!-- wp:image {"id":2746,"width":"159px","height":"29px","scale":"contain","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-2746" style="object-fit:contain;width:159px;height:29px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","style":{"border":{"color":"#0000001a","width":"1px"},"spacing":{"padding":{"right":"16px","left":"16px","top":"34px","bottom":"34px"},"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-center has-border-color" style="border-color:#0000001a;border-width:1px;padding-top:34px;padding-right:16px;padding-bottom:34px;padding-left:16px"><!-- wp:image {"id":2748,"width":"159px","height":"33px","scale":"contain","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-2748" style="object-fit:contain;width:159px;height:33px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"border":{"color":"#0000001a","width":"1px"},"spacing":{"padding":{"right":"16px","left":"16px","top":"34px","bottom":"34px"},"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-center has-border-color" style="border-color:#0000001a;border-width:1px;padding-top:34px;padding-right:16px;padding-bottom:34px;padding-left:16px"><!-- wp:image {"id":2781,"width":"159px","height":"33px","scale":"contain","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url( $images[3] ); ?>" alt="" class="wp-image-2781" style="object-fit:contain;width:159px;height:33px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"border":{"color":"#0000001a","width":"1px"},"spacing":{"padding":{"right":"16px","left":"16px","top":"34px","bottom":"34px"},"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-center has-border-color" style="border-color:#0000001a;border-width:1px;padding-top:34px;padding-right:16px;padding-bottom:34px;padding-left:16px"><!-- wp:image {"id":2782,"width":"159px","height":"33px","scale":"contain","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-2782" style="object-fit:contain;width:159px;height:33px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->