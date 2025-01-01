<?php
	/**
	 * Title: Testimonials section ten with masonry layout
	 * Description: This is testimonials section with masonry layout
	 * Slug: cozy-block-patterns/testimonials-ten
	 * Categories: cozy-block-patterns, testimonials
	 * Premium: true
	 */

	$images = array(
		CT_ASSETS_URL . 'images/team_1_2.jpg',
		CT_ASSETS_URL . 'images/team_1_3.jpg',
		CT_ASSETS_URL . 'images/team_1_1.jpg',
		CT_ASSETS_URL . 'images/testimonial_1_1.png',
		CT_ASSETS_URL . 'images/team_2_1.jpg',
		CT_ASSETS_URL . 'images/testimonial_1_2.png',
	);
	?>
	
<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Testimonials', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"color":{"background":"#f8f8ff"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f8f8ff;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"16px","right":"16px"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}},"typography":{"fontSize":"14px"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#646464;margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px;font-size:14px"><!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"36px"}},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}}},"layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#090b10;margin-top:0;margin-bottom:36px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"typography":{"fontStyle":"normal","fontWeight":"500","textDecoration":"none","textTransform":"uppercase","fontSize":"12px"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-buttons has-custom-font-size" style="margin-top:0;margin-bottom:0;font-size:12px;font-style:normal;font-weight:500;text-decoration:none;text-transform:uppercase"><!-- wp:button {"style":{"color":{"text":"#211eb1","background":"#fffffe00"},"elements":{"link":{"color":{"text":"#211eb1"}}},"border":{"radius":"100px","color":"#211eb140","width":"1px"},"spacing":{"padding":{"left":"12px","right":"12px","top":"6px","bottom":"6px"}}},"cozyHoverStyles":{"bgColor":"#ff9900","color":"#fffffe","borderColor":"#ff9900"}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background has-link-color has-border-color wp-element-button" style="border-color:#211eb140;border-width:1px;border-radius:100px;color:#211eb1;background-color:#fffffe00;padding-top:6px;padding-right:12px;padding-bottom:6px;padding-left:12px">Testimonials</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"1.3","fontSize":"44px","fontStyle":"normal","fontWeight":"600"}},"cozyCustomFont":"Inter","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<h2 class="wp-block-heading has-text-align-center" style="font-size:44px;font-style:normal;font-weight:600;line-height:1.3"><?php esc_html_e( 'Review From Our Customers', 'cozy-addons' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:cozy-block/testimonial {"blockClientId":"1e9addec-5b2b-4e38-834f-b71548fa0c98","layout":"grid","gridOptions":{"displayColumn":3,"masonryEnabled":true,"columnGap":24}} -->
<div class="cozy-block-testimonial display-grid  has-masonry  hover-show" id="cozyBlock_1e9addec_5b2b_4e38_834f_b71548fa0c98"><div class="cozy-block-grid-wrapper "><!-- wp:cozy-block/grid -->
<div class="cozy-block-grid"><!-- wp:group {"style":{"spacing":{"padding":{"top":"30px","bottom":"30px","left":"16px","right":"16px"},"blockGap":"26px"},"color":{"background":"#fffffe"},"border":{"radius":"20px"}},"layout":{"type":"constrained","contentSize":"327px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#ededff","horizontal":0,"vertical":4,"blur":25,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}},"cozyAnimation":{"type":"fade-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":600}} -->
<div class="wp-block-group has-background" style="border-radius:20px;background-color:#fffffe;padding-top:30px;padding-right:16px;padding-bottom:30px;padding-left:16px"><!-- wp:paragraph {"align":"left","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry."} -->
<p class="has-text-align-left"><?php esc_html_e( '“Vivamus sagittis lacus augue laoreet rutrum faucibus dolor auctor. ligula porta felis euismod semper.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"12px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:image {"id":2558,"width":"60px","height":"60px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-2558" style="border-radius:50px;object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"left","placeholder":"George Mathew","style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"600"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}}},"cozyCustomFont":"Raleway"} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color" style="color:#090b10;font-size:16px;font-style:normal;font-weight:600"><?php esc_html_e( 'Linda', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Customer', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/grid -->

<!-- wp:cozy-block/grid -->
<div class="cozy-block-grid"><!-- wp:group {"style":{"spacing":{"padding":{"top":"30px","bottom":"30px","left":"16px","right":"16px"},"blockGap":"26px"},"color":{"background":"#fffffe"},"border":{"radius":"20px"}},"layout":{"type":"constrained","contentSize":"327px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#ededff","horizontal":0,"vertical":4,"blur":25,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}},"cozyAnimation":{"type":"fade-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":800}} -->
<div class="wp-block-group has-background" style="border-radius:20px;background-color:#fffffe;padding-top:30px;padding-right:16px;padding-bottom:30px;padding-left:16px"><!-- wp:paragraph {"align":"left","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry."} -->
<p class="has-text-align-left"><?php esc_html_e( '“Vivamus sagittis lacus augue laoreet rutrum faucibus dolor auctor. ligula porta felis euismod semper.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"12px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:image {"id":2558,"width":"60px","height":"60px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-2558" style="border-radius:50px;object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"left","placeholder":"George Mathew","style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"600"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}}},"cozyCustomFont":"Raleway"} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color" style="color:#090b10;font-size:16px;font-style:normal;font-weight:600"><?php esc_html_e( 'Jeams Wantanf', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Customer', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/grid -->

<!-- wp:cozy-block/grid -->
<div class="cozy-block-grid"><!-- wp:group {"style":{"spacing":{"padding":{"top":"30px","bottom":"30px","left":"16px","right":"16px"},"blockGap":"26px"},"color":{"background":"#fffffe"},"border":{"radius":"20px"}},"layout":{"type":"constrained","contentSize":"327px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#ededff","horizontal":0,"vertical":4,"blur":25,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}},"cozyAnimation":{"type":"fade-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-group has-background" style="border-radius:20px;background-color:#fffffe;padding-top:30px;padding-right:16px;padding-bottom:30px;padding-left:16px"><!-- wp:paragraph {"align":"left","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry."} -->
<p class="has-text-align-left"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat sed nunc at laoreet. In ultricies aliquam dui cursus volutpat. Morbi vitae tortor eu velit fermentum ultricies in at dolor.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"12px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:image {"id":2558,"width":"60px","height":"60px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-2558" style="border-radius:50px;object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"left","placeholder":"George Mathew","style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"600"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}}},"cozyCustomFont":"Raleway"} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color" style="color:#090b10;font-size:16px;font-style:normal;font-weight:600"><?php esc_html_e( 'Benjamin', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Customer', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/grid -->

<!-- wp:cozy-block/grid -->
<div class="cozy-block-grid"><!-- wp:group {"style":{"spacing":{"padding":{"top":"30px","bottom":"30px","left":"16px","right":"16px"},"blockGap":"26px"},"color":{"background":"#fffffe"},"border":{"radius":"20px"}},"layout":{"type":"constrained","contentSize":"327px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#ededff","horizontal":0,"vertical":4,"blur":25,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}},"cozyAnimation":{"type":"fade-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":600}} -->
<div class="wp-block-group has-background" style="border-radius:20px;background-color:#fffffe;padding-top:30px;padding-right:16px;padding-bottom:30px;padding-left:16px"><!-- wp:paragraph {"align":"left","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry."} -->
<p class="has-text-align-left"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat sed nunc at laoreet. In ultricies aliquam dui cursus volutpat. Morbi vitae tortor eu velit fermentum ultricies in at dolor.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"12px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:image {"id":2558,"width":"60px","height":"60px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[3] ); ?>" alt="" class="wp-image-2558" style="border-radius:50px;object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"left","placeholder":"George Mathew","style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"600"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}}},"cozyCustomFont":"Raleway"} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color" style="color:#090b10;font-size:16px;font-style:normal;font-weight:600"><?php esc_html_e( 'Angelina', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Customer', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/grid -->

<!-- wp:cozy-block/grid -->
<div class="cozy-block-grid"><!-- wp:group {"style":{"spacing":{"padding":{"top":"30px","bottom":"30px","left":"16px","right":"16px"},"blockGap":"26px"},"color":{"background":"#fffffe"},"border":{"radius":"20px"}},"layout":{"type":"constrained","contentSize":"327px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#ededff","horizontal":0,"vertical":4,"blur":25,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}},"cozyAnimation":{"type":"fade-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":900}} -->
<div class="wp-block-group has-background" style="border-radius:20px;background-color:#fffffe;padding-top:30px;padding-right:16px;padding-bottom:30px;padding-left:16px"><!-- wp:paragraph {"align":"left","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry."} -->
<p class="has-text-align-left"><?php esc_html_e( '“Vivamus sagittis lacus augue laoreet rutrum faucibus dolor auctor. ligula porta felis euismod semper.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"12px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:image {"id":2558,"width":"60px","height":"60px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[4] ); ?>" alt="" class="wp-image-2558" style="border-radius:50px;object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"left","placeholder":"George Mathew","style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"600"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}}},"cozyCustomFont":"Raleway"} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color" style="color:#090b10;font-size:16px;font-style:normal;font-weight:600"><?php esc_html_e( 'Margaret', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Customer', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/grid -->

<!-- wp:cozy-block/grid -->
<div class="cozy-block-grid"><!-- wp:group {"style":{"spacing":{"padding":{"top":"30px","bottom":"30px","left":"16px","right":"16px"},"blockGap":"26px"},"color":{"background":"#fffffe"},"border":{"radius":"20px"}},"layout":{"type":"constrained","contentSize":"327px"},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#ededff","horizontal":0,"vertical":4,"blur":25,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}},"cozyAnimation":{"type":"fade-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":1200}} -->
<div class="wp-block-group has-background" style="border-radius:20px;background-color:#fffffe;padding-top:30px;padding-right:16px;padding-bottom:30px;padding-left:16px"><!-- wp:paragraph {"align":"left","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry."} -->
<p class="has-text-align-left"><?php esc_html_e( '“Vivamus sagittis lacus augue laoreet rutrum faucibus dolor auctor. ligula porta felis euismod semper.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"12px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:image {"id":2558,"width":"60px","height":"60px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[5] ); ?>" alt="" class="wp-image-2558" style="border-radius:50px;object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"left","placeholder":"George Mathew","style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"600"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}}},"cozyCustomFont":"Raleway"} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color" style="color:#090b10;font-size:16px;font-style:normal;font-weight:600"><?php esc_html_e( 'Richard', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Customer', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/grid --></div></div>
<!-- /wp:cozy-block/testimonial --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->