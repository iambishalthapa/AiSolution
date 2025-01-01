<?php
/**
 * Title: Contact Us section seven with form
 * Description: This is contact us section with form
 * Slug: cozy-block-patterns/contact-us-seven
 * Categories: cozy-block-patterns, contact-us
 * Dynamic: true
 * Premium: true
 */

$images = array(
	CT_ASSETS_URL . 'images/contact-us_7_1.jpg',
);
?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Contact Us', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"},"color":{"background":"#fffffe"}},"className":"cozy-block-pattern__contact-us-seven","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull cozy-block-pattern__contact-us-seven has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:columns {"verticalAlignment":null,"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"26px","left":"var:preset|spacing|70"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<div class="wp-block-columns" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"stretch","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"}},"cozyResponsiveShow":{"desktopShow":true,"tabletShow":true,"tabletViewport":980,"mobileShow":false,"mobileViewport":767}} -->
<div class="wp-block-column is-vertically-aligned-stretch" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"<?php echo esc_url( $images[0] ); ?>","id":213,"dimRatio":10,"focalPoint":{"x":0.5,"y":0.3},"minHeight":650,"minHeightUnit":"px","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}}} -->
<div class="wp-block-cover" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:650px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-10 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-213" alt="" src="<?php echo esc_url( $images[0] ); ?>" style="object-position:50% 30%" data-object-fit="cover" data-object-position="50% 30%"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0","padding":{"top":"40px","bottom":"40px","left":"16px","right":"16px"}}},"layout":{"type":"constrained","contentSize":"520px","justifyContent":"left"}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:40px;padding-right:16px;padding-bottom:40px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"26px"},"padding":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":""}},"layout":{"type":"constrained","contentSize":"518px","justifyContent":"left"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:26px;padding-top:0;padding-bottom:0"><!-- wp:heading {"style":{"typography":{"fontSize":"30px"},"color":{"text":"#00080c"},"elements":{"link":{"color":{"text":"#00080c"}}}},"cozyCustomFont":"Playfair Display"} -->
<h2 class="wp-block-heading has-text-color has-link-color" style="color:#00080c;font-size:30px"><?php esc_html_e( 'If You Believe Us Solving Your Problems', 'cozy-addons' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:shortcode -->
[contact-form-7 id="9acd6c0" title="Contact form 1"]
<!-- /wp:shortcode --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->