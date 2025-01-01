<?php
	/**
	 * Title: Testimonials section eight with columns animation
	 * Description: This is testimonials section with columns, animation
	 * Slug: cozy-block-patterns/testimonials-eight
	 * Categories: cozy-block-patterns, testimonials
	 */


	$images = array(
		CT_ASSETS_URL . 'images/team_1_1.jpg',
		CT_ASSETS_URL . 'images/team_1_2.jpg',
		CT_ASSETS_URL . 'images/team_1_3.jpg',
	);
	?>
	
<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Testimonials', 'cozy-addons' ); ?>"},"align":"full","style":{"color":{"background":"#fffffe"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"16px","right":"16px"},"blockGap":"0","margin":{"top":"0","bottom":"0"}},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}},"typography":{"fontSize":"14px"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#090b10;margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px;font-size:14px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"445px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"#01ae8f"}}},"color":{"text":"#01ae8f"},"typography":{"fontSize":"14px","textTransform":"uppercase","fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"}}} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#01ae8f;font-size:14px;font-style:normal;font-weight:500;line-height:1.2;text-transform:uppercase"><?php esc_html_e( 'Testimonials', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"1.3","fontSize":"35px","fontStyle":"normal","fontWeight":"600"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}}},"cozyCustomFont":"Public Sans","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#090b10;font-size:35px;font-style:normal;font-weight:600;line-height:1.3"><?php esc_html_e( 'Review from Customers', 'cozy-addons' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:columns {"verticalAlignment":null,"style":{"spacing":{"blockGap":{"top":"26px","left":"26px"},"margin":{"top":"36px","bottom":"0"}},"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}},"typography":{"fontSize":"14px"}}} -->
<div class="wp-block-columns has-text-color has-link-color" style="color:#646464;margin-top:36px;margin-bottom:0;font-size:14px"><!-- wp:column {"verticalAlignment":"top","width":"","style":{"spacing":{"blockGap":"0","padding":{"right":"0px","left":"0px","top":"0px","bottom":"0px"}},"color":{"background":"#f8f8f8"}},"layout":{"type":"constrained","contentSize":"470px"},"cozyAnimation":{"type":"flip-up","easingFunction":"ease","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-column is-vertically-aligned-top has-background" style="background-color:#f8f8f8;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:group {"style":{"dimensions":{"minHeight":""},"spacing":{"padding":{"right":"16px","left":"16px","top":"40px","bottom":"40px"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group" style="padding-top:40px;padding-right:16px;padding-bottom:40px;padding-left:16px"><!-- wp:image {"id":4444,"width":"70px","height":"70px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"100px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-4444" style="border-radius:100px;object-fit:cover;width:70px;height:70px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"16px","bottom":"16px"}}}} -->
<p class="has-text-align-center" style="margin-top:16px;margin-bottom:16px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat sed nunc at laoreet. In ultricies aliquam dui cursus volutpat. Morbi vitae tortor eu velit fermentum ultricies in at dolor.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"#090b10"}}},"color":{"text":"#090b10"}},"cozyCustomFont":"Inter"} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#090b10;font-size:18px;font-style:normal;font-weight:600"><?php esc_html_e( 'Benjamin Kerry', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","fontSize":"x-small"} -->
<p class="has-text-align-center has-x-small-font-size"><?php esc_html_e( 'CEO', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"","style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0"}}},"cozyAnimation":{"type":"none","easingFunction":"ease","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-column is-vertically-aligned-top" style="padding-right:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"26px","margin":{"bottom":"26px"},"padding":{"top":"26px","bottom":"26px","left":"16px","right":"16px"}},"color":{"background":"#f8f8f8","text":"#6a6a6a"},"elements":{"link":{"color":{"text":"#6a6a6a"}}},"dimensions":{"minHeight":""}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"top"},"cozyAnimation":{"type":"fade-left","easingFunction":"ease-in","anchorPlacement":"top-center","duration":800}} -->
<div class="wp-block-group has-text-color has-background has-link-color" style="color:#6a6a6a;background-color:#f8f8f8;margin-bottom:26px;padding-top:26px;padding-right:16px;padding-bottom:26px;padding-left:16px"><!-- wp:image {"id":4451,"width":"70px","height":"70px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"100px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-4451" style="border-radius:100px;object-fit:cover;width:70px;height:70px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"constrained","contentSize":"432px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"left"} -->
<p class="has-text-align-left"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat sed nunc at laoreet. In ultricies aliquam.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"left","style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"#090b10"}}},"color":{"text":"#090b10"}},"cozyCustomFont":"Inter"} -->
<p class="has-text-align-left has-text-color has-link-color" style="color:#090b10;font-size:18px;font-style:normal;font-weight:600"><?php esc_html_e( 'Angelina', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"left","fontSize":"x-small"} -->
<p class="has-text-align-left has-x-small-font-size"><?php esc_html_e( 'Happy Customer', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"26px","margin":{"top":"0","bottom":"0"},"padding":{"top":"26px","bottom":"26px","left":"16px","right":"16px"}},"color":{"background":"#f8f8f8","text":"#6a6a6a"},"elements":{"link":{"color":{"text":"#6a6a6a"}}},"dimensions":{"minHeight":""}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"top"},"cozyAnimation":{"type":"fade-left","easingFunction":"ease-in","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-group has-text-color has-background has-link-color" style="color:#6a6a6a;background-color:#f8f8f8;margin-top:0;margin-bottom:0;padding-top:26px;padding-right:16px;padding-bottom:26px;padding-left:16px"><!-- wp:image {"id":1220,"width":"70px","height":"70px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"100px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-1220" style="border-radius:100px;object-fit:cover;width:70px;height:70px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"constrained","contentSize":"432px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"left"} -->
<p class="has-text-align-left"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat sed nunc at laoreet. In ultricies aliquam.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"left","style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"#090b10"}}},"color":{"text":"#090b10"}},"cozyCustomFont":"Inter"} -->
<p class="has-text-align-left has-text-color has-link-color" style="color:#090b10;font-size:18px;font-style:normal;font-weight:600"><?php esc_html_e( 'Tom', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"left","fontSize":"x-small"} -->
<p class="has-text-align-left has-x-small-font-size"><?php esc_html_e( 'Happy Customer', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->