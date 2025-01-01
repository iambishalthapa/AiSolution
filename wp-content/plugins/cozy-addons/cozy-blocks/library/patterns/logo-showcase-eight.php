<?php
/**
 * Title: Logo Showcase section eight with column animation
 * Description: This is logo showcase section with column, animation
 * Slug: cozy-block-patterns/logo-showcase-eight
 * Categories: cozy-block-patterns, logo-showcase
 * Premium: true
 */

$images = array(
	CT_ASSETS_URL . 'images/logo_6.png',
	CT_ASSETS_URL . 'images/logo_7.png',
	CT_ASSETS_URL . 'images/logo_8.png',
	CT_ASSETS_URL . 'images/logo_9.png',
	CT_ASSETS_URL . 'images/logo_10.png',
);
?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Logo Showcase', 'cozy-addons' ); ?>"},"align":"full","style":{"color":{"background":"#12171e"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#12171e;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"16px","right":"16px"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:columns {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":{"top":"var:preset|spacing|50","left":"0"}}},"cozyAnimation":{"type":"fade-up","easingFunction":"ease","anchorPlacement":"top-bottom","duration":600}} -->
<div class="wp-block-columns" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"fade-right","easingFunction":"ease-in","anchorPlacement":"top-center","duration":600}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":1754,"width":"159px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-1754" style="width:159px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"fade-down","easingFunction":"ease-in","anchorPlacement":"top-center","duration":600}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":1755,"width":"159px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-1755" style="width:159px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"zoom-in-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":600}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":1756,"width":"159px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-1756" style="width:159px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"fade-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":600}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":1757,"width":"159px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url( $images[3] ); ?>" alt="" class="wp-image-1757" style="width:159px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"fade-left","easingFunction":"ease-in","anchorPlacement":"top-center","duration":600}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":1758,"width":"159px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url( $images[4] ); ?>" alt="" class="wp-image-1758" style="width:159px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->