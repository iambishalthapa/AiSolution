<?php
/**
 * Title: Portfolio section four with images
 * Description: This is portfolio with image hover effect
 * Slug: cozy-block-patterns/portfolio-four
 * Categories: cozy-block-patterns, portfolio, gallery
 */

$images = array(
	CT_ASSETS_URL . 'images/portfolio_4_1.jpg',
	CT_ASSETS_URL . 'images/portfolio_4_2.jpg',
	CT_ASSETS_URL . 'images/portfolio_4_3.jpg',
	CT_ASSETS_URL . 'images/portfolio_4_4.jpg',
);

?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Portfolio', 'cozy-addons' ); ?>"},"align":"full","style":{"color":{"background":"#fffffe"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"className":"cozy-block-pattern__portfolio-four","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull cozy-block-pattern__portfolio-four has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","bottom":"80px","left":"16px","right":"16px"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:40px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:columns {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"left":"36px"}}}} -->
<div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"top","style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-top"><!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"constrained","contentSize":"476px","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"left","style":{"typography":{"lineHeight":"1.3","fontSize":"35px","fontStyle":"normal","fontWeight":"600","textTransform":"uppercase"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}}},"cozyCustomFont":"Inter","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color" style="color:#090b10;font-size:35px;font-style:normal;font-weight:600;line-height:1.3;text-transform:uppercase"><?php esc_html_e( 'Latest Projects', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","style":{"typography":{"fontSize":"14px"},"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}}},"cozyCustomFont":"Poppins"} -->
<p class="has-text-align-left has-text-color has-link-color" style="color:#646464;font-size:14px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat sed nunc at laoreet. In ultricies aliquam dui cursus volutpat.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:cover {"url":"<?php echo esc_url( $images[0] ); ?>","id":4307,"dimRatio":0,"customOverlayColor":"#8c9490","isUserOverlayColor":true,"contentPosition":"bottom left","isDark":false,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"36px","bottom":"36px"}},"border":{"radius":"20px"}},"className":"cozy-portfolio-four__cover","layout":{"type":"constrained"},"cozyAnimation":{"type":"fade-right","easingFunction":"ease","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-left cozy-portfolio-four__cover" style="border-radius:20px;margin-top:36px;margin-bottom:36px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#8c9490"></span><img class="wp-block-cover__image-background wp-image-4307" alt="" src="<?php echo esc_url( $images[0] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"spacing":{"blockGap":"26px","padding":{"right":"26px","left":"26px","top":"30px","bottom":"30px"}}},"className":"cozy-portfolio-four__content","layout":{"type":"constrained"},"cozyCustomFont":"Inter"} -->
<div class="wp-block-group cozy-portfolio-four__content has-text-color has-link-color" style="color:#fffffe;padding-top:30px;padding-right:26px;padding-bottom:30px;padding-left:26px"><!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"fontSize":"25px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"#fffffe"},":hover":{"color":{"text":"#f49900"}}}},"color":{"text":"#fffffe"}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#fffffe;font-size:25px;font-style:normal;font-weight:600"><a href="#"><?php esc_html_e( 'Fusion Works', 'cozy-addons' ); ?></a></h4>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left"},"style":{"typography":{"fontStyle":"normal","fontWeight":"500","textDecoration":"none"}},"fontSize":"x-small"} -->
<div class="wp-block-buttons has-custom-font-size has-x-small-font-size" style="font-style:normal;font-weight:500;text-decoration:none"><!-- wp:button {"style":{"spacing":{"padding":{"left":"10px","right":"10px","top":"4px","bottom":"4px"}},"border":{"radius":"5px"},"color":{"background":"#ff9900"}},"cozyHoverStyles":{"bgColor":"#fffffe","color":"#090b10","borderColor":""}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background wp-element-button" style="border-radius:5px;background-color:#ff9900;padding-top:4px;padding-right:10px;padding-bottom:4px;padding-left:10px"><?php esc_html_e( 'View Details', 'cozy-addons' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:cover {"url":"<?php echo esc_url( $images[1] ); ?>","id":4308,"dimRatio":0,"customOverlayColor":"#8c9490","isUserOverlayColor":true,"contentPosition":"bottom left","isDark":false,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"border":{"radius":"20px"}},"className":"cozy-portfolio-four__cover","layout":{"type":"constrained"},"cozyAnimation":{"type":"fade-right","easingFunction":"ease","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-left cozy-portfolio-four__cover" style="border-radius:20px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#8c9490"></span><img class="wp-block-cover__image-background wp-image-4308" alt="" src="<?php echo esc_url( $images[1] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"spacing":{"blockGap":"26px","padding":{"right":"26px","left":"26px","top":"30px","bottom":"30px"}}},"className":"cozy-portfolio-four__content","layout":{"type":"constrained"},"cozyCustomFont":"Inter"} -->
<div class="wp-block-group cozy-portfolio-four__content has-text-color has-link-color" style="color:#fffffe;padding-top:30px;padding-right:26px;padding-bottom:30px;padding-left:26px"><!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"fontSize":"25px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"#fffffe"},":hover":{"color":{"text":"#f49900"}}}},"color":{"text":"#fffffe"}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#fffffe;font-size:25px;font-style:normal;font-weight:600"><a href="#"><?php esc_html_e( 'Fusion Works', 'cozy-addons' ); ?></a></h4>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left"},"style":{"typography":{"fontStyle":"normal","fontWeight":"500","textDecoration":"none"}},"fontSize":"x-small"} -->
<div class="wp-block-buttons has-custom-font-size has-x-small-font-size" style="font-style:normal;font-weight:500;text-decoration:none"><!-- wp:button {"style":{"spacing":{"padding":{"left":"10px","right":"10px","top":"4px","bottom":"4px"}},"border":{"radius":"5px"},"color":{"background":"#ff9900"}},"cozyHoverStyles":{"bgColor":"#fffffe","color":"#090b10","borderColor":""}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background wp-element-button" style="border-radius:5px;background-color:#ff9900;padding-top:4px;padding-right:10px;padding-bottom:4px;padding-left:10px"><?php esc_html_e( 'View Details', 'cozy-addons' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top"} -->
<div class="wp-block-column is-vertically-aligned-top"><!-- wp:cover {"url":"<?php echo esc_url( $images[2] ); ?>","id":4310,"dimRatio":0,"customOverlayColor":"#8c9490","isUserOverlayColor":true,"contentPosition":"bottom left","isDark":false,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"36px"}},"border":{"radius":"20px"}},"className":"cozy-portfolio-four__cover","layout":{"type":"constrained"},"cozyAnimation":{"type":"fade-left","easingFunction":"ease","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-left cozy-portfolio-four__cover" style="border-radius:20px;margin-top:0;margin-bottom:36px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#8c9490"></span><img class="wp-block-cover__image-background wp-image-4310" alt="" src="<?php echo esc_url( $images[2] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"spacing":{"blockGap":"26px","padding":{"right":"26px","left":"26px","top":"30px","bottom":"30px"}}},"className":"cozy-portfolio-four__content","layout":{"type":"constrained"},"cozyCustomFont":"Inter"} -->
<div class="wp-block-group cozy-portfolio-four__content has-text-color has-link-color" style="color:#fffffe;padding-top:30px;padding-right:26px;padding-bottom:30px;padding-left:26px"><!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"fontSize":"25px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"#fffffe"},":hover":{"color":{"text":"#f49900"}}}},"color":{"text":"#fffffe"}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#fffffe;font-size:25px;font-style:normal;font-weight:600"><a href="#"><?php esc_html_e( 'Fusion Works', 'cozy-addons' ); ?></a></h4>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left"},"style":{"typography":{"fontStyle":"normal","fontWeight":"500","textDecoration":"none"}},"fontSize":"x-small"} -->
<div class="wp-block-buttons has-custom-font-size has-x-small-font-size" style="font-style:normal;font-weight:500;text-decoration:none"><!-- wp:button {"style":{"spacing":{"padding":{"left":"10px","right":"10px","top":"4px","bottom":"4px"}},"border":{"radius":"5px"},"color":{"background":"#ff9900"}},"cozyHoverStyles":{"bgColor":"#fffffe","color":"#090b10","borderColor":""}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background wp-element-button" style="border-radius:5px;background-color:#ff9900;padding-top:4px;padding-right:10px;padding-bottom:4px;padding-left:10px"><?php esc_html_e( 'View Details', 'cozy-addons' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:cover {"url":"<?php echo esc_url( $images[3] ); ?>","id":4311,"dimRatio":0,"customOverlayColor":"#8c9490","isUserOverlayColor":true,"contentPosition":"bottom left","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"border":{"radius":"20px"}},"className":"cozy-portfolio-four__cover","layout":{"type":"constrained"},"cozyAnimation":{"type":"fade-left","easingFunction":"ease","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left cozy-portfolio-four__cover" style="border-radius:20px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#8c9490"></span><img class="wp-block-cover__image-background wp-image-4311" alt="" src="<?php echo esc_url( $images[3] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"spacing":{"blockGap":"26px","padding":{"right":"26px","left":"26px","top":"30px","bottom":"30px"}}},"className":"cozy-portfolio-four__content","layout":{"type":"constrained"},"cozyCustomFont":"Inter"} -->
<div class="wp-block-group cozy-portfolio-four__content has-text-color has-link-color" style="color:#fffffe;padding-top:30px;padding-right:26px;padding-bottom:30px;padding-left:26px"><!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"fontSize":"25px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"#fffffe"},":hover":{"color":{"text":"#f49900"}}}},"color":{"text":"#fffffe"}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#fffffe;font-size:25px;font-style:normal;font-weight:600"><a href="#"><?php esc_html_e( 'Fusion Works', 'cozy-addons' ); ?></a></h4>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left"},"style":{"typography":{"fontStyle":"normal","fontWeight":"500","textDecoration":"none"}},"fontSize":"x-small"} -->
<div class="wp-block-buttons has-custom-font-size has-x-small-font-size" style="font-style:normal;font-weight:500;text-decoration:none"><!-- wp:button {"style":{"spacing":{"padding":{"left":"10px","right":"10px","top":"4px","bottom":"4px"}},"border":{"radius":"5px"},"color":{"background":"#ff9900"}},"cozyHoverStyles":{"bgColor":"#fffffe","color":"#090b10","borderColor":""}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background wp-element-button" style="border-radius:5px;background-color:#ff9900;padding-top:4px;padding-right:10px;padding-bottom:4px;padding-left:10px"><?php esc_html_e( 'View Details', 'cozy-addons' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->