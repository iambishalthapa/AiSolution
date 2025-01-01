<?php
/**
 * Title: About us section with stacked image
 * Description: This is about us section with stacked image
 * Slug: cozy-block-patterns/about-us-twenty
 * Categories: cozy-block-patterns, about-us
 * Premium: true
 */

$images = array(
	CT_ASSETS_URL . 'images/about-us_20_1.png',
);
?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'About Us', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"color":{"background":"#fffffe"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","bottom":"80px","left":"16px","right":"16px"},"blockGap":"0","margin":{"top":"0","bottom":"0"}},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}},"typography":{"fontSize":"16px"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#090b10;margin-top:0;margin-bottom:0;padding-top:40px;padding-right:16px;padding-bottom:80px;padding-left:16px;font-size:16px"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"36px","left":"36px"},"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"},"cozyAnimation":{"type":"zoom-in-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:image {"id":1831,"scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-1831" style="object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"536px"},"cozyCustomFont":"Public Sans"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"style":{"typography":{"lineHeight":"1.2","fontSize":"36px","fontStyle":"normal","fontWeight":"600"},"color":{"text":"#161e1f"},"elements":{"link":{"color":{"text":"#161e1f"}}}},"cozyCustomFont":"Inter","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":600}} -->
<h2 class="wp-block-heading has-text-color has-link-color" style="color:#161e1f;font-size:36px;font-style:normal;font-weight:600;line-height:1.2"><?php esc_html_e( 'Your Partner in Personalized Healthcare Solutions', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.5","fontSize":"14px"},"spacing":{"margin":{"top":"8px","bottom":"16px"}},"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}}}} -->
<p class="has-text-color has-link-color" style="color:#646464;margin-top:8px;margin-bottom:16px;font-size:14px;line-height:1.5"><?php esc_html_e( 'Far far away, behind the word mountains, far from the countries Vocalic and Consonantal, there live the blind texts. Separated they live in Bookmarks grove right at the coast of the Semantics, a large language ocean.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained"},"cozyCustomFont":"Inter","cozyAnimation":{"type":"fade-left","easingFunction":"ease","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-group"><!-- wp:cozy-block/icon-list {"blockClientId":"5af4b016-1758-4146-b598-5c2f9c8a35b1","iconColor":"#00c6e1","iconColorHover":"#f49805","containerStyles":{"width":"","height":"","gap":10,"borderRadius":{"top":5,"right":5,"bottom":5,"left":5},"bgColor":"","bgColorHover":""},"typography":{"fontFamily":"","fontSize":16,"color":"#161e1f","colorHover":"","fontWeight":"500"}} -->
<ul class="cozy-block-icon-list vertical default fill" id="cozyBlock_5af4b016_1758_4146_b598_5c2f9c8a35b1"><!-- wp:cozy-block/list-item {"blockClientId":"de161863-30f1-405f-8eed-8b99697ec15f","parentAttrs":{"enableLogo":true,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"left"},"title":"<?php esc_html_e( 'Where Health Meets Happiness.', 'cozy-addons' ); ?>"} -->
<div class="list-inline-block"><li class="cozy-block-list-item" id="cozyBlock_de161863_30f1_405f_8eed_8b99697ec15f"><div class="list-icon-wrapper"><svg viewBox="0 0 25 19" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M8.4911 18.2766L0.366101 10.1516C-0.122034 9.66351 -0.122034 8.87206 0.366101 8.38387L2.13383 6.6161C2.62196 6.12792 3.41346 6.12792 3.9016 6.6161L9.37499 12.0894L21.0984 0.366101C21.5865 -0.122034 22.378 -0.122034 22.8662 0.366101L24.6339 2.13387C25.122 2.62201 25.122 3.41346 24.6339 3.90165L10.2589 18.2767C9.77069 18.7648 8.97924 18.7648 8.4911 18.2766Z"></path></svg></div><p><?php esc_html_e( 'Where Health Meets Happiness.', 'cozy-addons' ); ?></p></li></div>
<!-- /wp:cozy-block/list-item -->

<!-- wp:cozy-block/list-item {"blockClientId":"828c2279-7c66-411e-9aa6-f13763bf0fa5","parentAttrs":{"enableLogo":true,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"left"},"title":"<?php esc_html_e( 'Discover Wellness, Embrace Life.', 'cozy-addons' ); ?>"} -->
<div class="list-inline-block"><li class="cozy-block-list-item" id="cozyBlock_828c2279_7c66_411e_9aa6_f13763bf0fa5"><div class="list-icon-wrapper"><svg viewBox="0 0 25 19" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M8.4911 18.2766L0.366101 10.1516C-0.122034 9.66351 -0.122034 8.87206 0.366101 8.38387L2.13383 6.6161C2.62196 6.12792 3.41346 6.12792 3.9016 6.6161L9.37499 12.0894L21.0984 0.366101C21.5865 -0.122034 22.378 -0.122034 22.8662 0.366101L24.6339 2.13387C25.122 2.62201 25.122 3.41346 24.6339 3.90165L10.2589 18.2767C9.77069 18.7648 8.97924 18.7648 8.4911 18.2766Z"></path></svg></div><p><?php esc_html_e( 'Discover Wellness, Embrace Life.', 'cozy-addons' ); ?></p></li></div>
<!-- /wp:cozy-block/list-item -->

<!-- wp:cozy-block/list-item {"blockClientId":"08bcefca-c3fe-4f3c-899b-4d7226eb5eee","parentAttrs":{"enableLogo":true,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"left"},"title":"<?php esc_html_e( 'Transforming Lives Through Better Health.', 'cozy-addons' ); ?>"} -->
<div class="list-inline-block"><li class="cozy-block-list-item" id="cozyBlock_08bcefca_c3fe_4f3c_899b_4d7226eb5eee"><div class="list-icon-wrapper"><svg viewBox="0 0 25 19" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M8.4911 18.2766L0.366101 10.1516C-0.122034 9.66351 -0.122034 8.87206 0.366101 8.38387L2.13383 6.6161C2.62196 6.12792 3.41346 6.12792 3.9016 6.6161L9.37499 12.0894L21.0984 0.366101C21.5865 -0.122034 22.378 -0.122034 22.8662 0.366101L24.6339 2.13387C25.122 2.62201 25.122 3.41346 24.6339 3.90165L10.2589 18.2767C9.77069 18.7648 8.97924 18.7648 8.4911 18.2766Z"></path></svg></div><p><?php esc_html_e( 'Transforming Lives Through Better Health.', 'cozy-addons' ); ?></p></li></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"26px"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:26px"><!-- wp:cozy-block/icon-list {"blockClientId":"251d75ed-20e5-402d-9b60-6d5f8d2ed135","iconPosition":"right","iconSize":22,"iconColor":"#fffffe","iconColorHover":"#fffffe","iconGap":8,"enableLogo":false,"containerStyles":{"width":106,"height":"","gap":0,"padding":{"top":14,"right":26,"bottom":14,"left":26},"borderType":"none","borderWidth":1,"borderColor":"#000","borderColorHover":"","borderRadius":{"top":10,"right":10,"bottom":10,"left":10},"bgColor":"#00c6e1","bgColorHover":"#ff9900"},"typography":{"fontFamily":"","fontSize":16,"color":"#fffffe","colorHover":"#fffffe","fontWeight":400}} -->
<ul class="cozy-block-icon-list vertical default fill" id="cozyBlock_251d75ed_20e5_402d_9b60_6d5f8d2ed135"><!-- wp:cozy-block/list-item {"blockClientId":"36d2e825-0308-47ec-a5b5-0197c7c45367","iconViewBox":{"vx":"0","vy":"0","vw":"24","vh":"24"},"iconPath":"M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z","parentAttrs":{"enableLogo":false,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"right"},"title":"Find Out More","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_36d2e825_0308_47ec_a5b5_0197c7c45367"><p><?php esc_html_e( 'Find Out More', 'cozy-addons' ); ?></p></li></a></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->