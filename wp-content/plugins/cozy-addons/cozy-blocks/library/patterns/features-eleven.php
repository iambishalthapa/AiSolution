<?php
/**
 * Title: Features section eleven with grid animation
 * Description: This is features section with grid animation.
 * Slug: cozy-block-patterns/features-eleven
 * Categories: cozy-block-patterns, features
 * Premium: true
 */

$images = array(
	CT_ASSETS_URL . 'images/features_11_1.png',
	CT_ASSETS_URL . 'images/features_11_2.png',
	CT_ASSETS_URL . 'images/features_11_3.png',
	CT_ASSETS_URL . 'images/features_11_4.png',
	CT_ASSETS_URL . 'images/features_11_5.png',
	CT_ASSETS_URL . 'images/features_11_6.png',
);
?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Features', 'cozy-addons' ); ?>"},"align":"full","style":{"color":{"background":"#003d4b"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#003d4b;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"16px","right":"16px"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"572px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"1.3","fontSize":"44px"},"elements":{"link":{"color":{"text":"#fffffe"}}},"spacing":{"margin":{"bottom":"6px"}},"color":{"text":"#fffffe"}},"cozyCustomFont":"Playfair Display","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#fffffe;margin-bottom:6px;font-size:44px;line-height:1.3"><?php esc_html_e( 'Our Practice Area', 'cozy-addons' ); ?> !</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.3","fontSize":"14px"},"color":{"text":"#ebebeb"},"elements":{"link":{"color":{"text":"#ebebeb"}}}},"cozyCustomFont":"Public Sans"} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#ebebeb;font-size:14px;line-height:1.3"><?php esc_html_e( 'Far far away, behind the word mountains, far from the countries Vocalic and Consonantal, there live the blind texts.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"margin":{"top":"44px","bottom":"36px"},"blockGap":{"top":"26px","left":"36px"}}}} -->
<div class="wp-block-columns" style="margin-top:44px;margin-bottom:36px"><!-- wp:column {"style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"fade-down-right","easingFunction":"ease-in","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-column"><!-- wp:group {"style":{"color":{"background":"#fffffe","text":"#6a6a6a"},"spacing":{"blockGap":"16px","padding":{"top":"28px","bottom":"28px","left":"26px","right":"26px"}},"elements":{"link":{"color":{"text":"#6a6a6a"}}}},"layout":{"type":"constrained","contentSize":"300px"},"cozyCustomFont":"Work Sans"} -->
<div class="wp-block-group has-text-color has-background has-link-color" style="color:#6a6a6a;background-color:#fffffe;padding-top:28px;padding-right:26px;padding-bottom:28px;padding-left:26px"><!-- wp:image {"id":4756,"width":"50px","height":"50px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-4756" style="object-fit:contain;width:50px;height:50px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":5,"style":{"color":{"text":"#00080c"},"elements":{"link":{"color":{"text":"#00080c"}}},"typography":{"fontSize":"25px","fontStyle":"normal","fontWeight":"500"}},"cozyCustomFont":"Playfair Display"} -->
<h5 class="wp-block-heading has-text-color has-link-color" style="color:#00080c;font-size:25px;font-style:normal;font-weight:500"><?php esc_html_e( 'Family Law', 'cozy-addons' ); ?></h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"26px"}},"typography":{"fontSize":"14px"}},"cozyCustomFont":"Public Sans"} -->
<p style="margin-bottom:26px;font-size:14px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:cozy-block/icon-list {"blockClientId":"413e0d80-936a-48de-9c15-6f2d5cafd72c","iconPosition":"right","iconSize":24,"iconColor":"#6a6a6a","iconColorHover":"#ff9900","typography":{"fontFamily":"","fontSize":16,"colorHover":"#ff9900","fontWeight":400}} -->
<ul class="cozy-block-icon-list vertical default fill" id="cozyBlock_413e0d80_936a_48de_9c15_6f2d5cafd72c"><!-- wp:cozy-block/list-item {"blockClientId":"d09fe6f9-175f-4832-b55e-63160f092cf3","iconViewBox":{"vx":"0","vy":"0","vw":"24","vh":"24"},"iconPath":"M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z","parentAttrs":{"enableLogo":true,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"right"},"title":"<?php esc_html_e( 'READ MORE', 'cozy-addons' ); ?>","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_d09fe6f9_175f_4832_b55e_63160f092cf3"><p><?php esc_html_e( 'READ MORE', 'cozy-addons' ); ?></p><div class="list-icon-wrapper"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z"></path></svg></div></li></a></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"fade-up","easingFunction":"ease","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-column"><!-- wp:group {"style":{"color":{"background":"#fffffe","text":"#6a6a6a"},"spacing":{"blockGap":"16px","padding":{"top":"28px","bottom":"28px","left":"26px","right":"26px"}},"elements":{"link":{"color":{"text":"#6a6a6a"}}}},"layout":{"type":"constrained","contentSize":"300px"},"cozyCustomFont":"Work Sans"} -->
<div class="wp-block-group has-text-color has-background has-link-color" style="color:#6a6a6a;background-color:#fffffe;padding-top:28px;padding-right:26px;padding-bottom:28px;padding-left:26px"><!-- wp:image {"id":850,"width":"50px","height":"50px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-850" style="object-fit:contain;width:50px;height:50px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":5,"style":{"color":{"text":"#00080c"},"elements":{"link":{"color":{"text":"#00080c"}}},"typography":{"fontSize":"25px","fontStyle":"normal","fontWeight":"500"}},"cozyCustomFont":"Playfair Display"} -->
<h5 class="wp-block-heading has-text-color has-link-color" style="color:#00080c;font-size:25px;font-style:normal;font-weight:500"><?php esc_html_e( 'Corporate Law', 'cozy-addons' ); ?></h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"26px"}},"typography":{"fontSize":"14px"}},"cozyCustomFont":"Public Sans"} -->
<p style="margin-bottom:26px;font-size:14px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:cozy-block/icon-list {"blockClientId":"007c4766-3a95-45ac-a6cc-1a87969ff1c4","iconPosition":"right","iconSize":24,"iconColor":"#6a6a6a","iconColorHover":"#ff9900","typography":{"fontFamily":"","fontSize":16,"colorHover":"#ff9900","fontWeight":400}} -->
<ul class="cozy-block-icon-list vertical default fill" id="cozyBlock_007c4766_3a95_45ac_a6cc_1a87969ff1c4"><!-- wp:cozy-block/list-item {"blockClientId":"538d3878-eb8e-4aa2-b543-49268007beaa","iconViewBox":{"vx":"0","vy":"0","vw":"24","vh":"24"},"iconPath":"M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z","parentAttrs":{"enableLogo":true,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"right"},"title":"<?php esc_html_e( 'READ MORE', 'cozy-addons' ); ?>","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_538d3878_eb8e_4aa2_b543_49268007beaa"><p><?php esc_html_e( 'READ MORE', 'cozy-addons' ); ?></p><div class="list-icon-wrapper"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z"></path></svg></div></li></a></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"fade-up-left","easingFunction":"ease-in","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-column"><!-- wp:group {"style":{"color":{"background":"#fffffe","text":"#6a6a6a"},"spacing":{"blockGap":"16px","padding":{"top":"28px","bottom":"28px","left":"26px","right":"26px"}},"elements":{"link":{"color":{"text":"#6a6a6a"}}}},"layout":{"type":"constrained","contentSize":"300px"},"cozyCustomFont":"Work Sans"} -->
<div class="wp-block-group has-text-color has-background has-link-color" style="color:#6a6a6a;background-color:#fffffe;padding-top:28px;padding-right:26px;padding-bottom:28px;padding-left:26px"><!-- wp:image {"id":851,"width":"50px","height":"50px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-851" style="object-fit:contain;width:50px;height:50px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":5,"style":{"color":{"text":"#00080c"},"elements":{"link":{"color":{"text":"#00080c"}}},"typography":{"fontSize":"25px","fontStyle":"normal","fontWeight":"500"}},"cozyCustomFont":"Playfair Display"} -->
<h5 class="wp-block-heading has-text-color has-link-color" style="color:#00080c;font-size:25px;font-style:normal;font-weight:500"><?php esc_html_e( 'Business Law', 'cozy-addons' ); ?></h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"26px"}},"typography":{"fontSize":"14px"}},"cozyCustomFont":"Public Sans"} -->
<p style="margin-bottom:26px;font-size:14px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:cozy-block/icon-list {"blockClientId":"3f3058ed-5ce9-4a8b-9b08-358c98a497c6","iconPosition":"right","iconSize":24,"iconColor":"#6a6a6a","iconColorHover":"#ff9900","typography":{"fontFamily":"","fontSize":16,"colorHover":"#ff9900","fontWeight":400}} -->
<ul class="cozy-block-icon-list vertical default fill" id="cozyBlock_3f3058ed_5ce9_4a8b_9b08_358c98a497c6"><!-- wp:cozy-block/list-item {"blockClientId":"7c2a2840-349d-4685-8e34-0601da6b3ab0","iconViewBox":{"vx":"0","vy":"0","vw":"24","vh":"24"},"iconPath":"M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z","parentAttrs":{"enableLogo":true,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"right"},"title":"<?php esc_html_e( 'READ MORE', 'cozy-addons' ); ?>","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_7c2a2840_349d_4685_8e34_0601da6b3ab0"><p><?php esc_html_e( 'READ MORE', 'cozy-addons' ); ?></p><div class="list-icon-wrapper"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z"></path></svg></div></li></a></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"26px","left":"36px"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"fade-up-right","easingFunction":"ease-in","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-column"><!-- wp:group {"style":{"color":{"background":"#fffffe","text":"#6a6a6a"},"spacing":{"blockGap":"16px","padding":{"top":"28px","bottom":"28px","left":"26px","right":"26px"}},"elements":{"link":{"color":{"text":"#6a6a6a"}}}},"layout":{"type":"constrained","contentSize":"300px"},"cozyCustomFont":"Work Sans"} -->
<div class="wp-block-group has-text-color has-background has-link-color" style="color:#6a6a6a;background-color:#fffffe;padding-top:28px;padding-right:26px;padding-bottom:28px;padding-left:26px"><!-- wp:image {"id":855,"width":"50px","height":"50px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $images[3] ); ?>" alt="" class="wp-image-855" style="object-fit:contain;width:50px;height:50px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":5,"style":{"color":{"text":"#00080c"},"elements":{"link":{"color":{"text":"#00080c"}}},"typography":{"fontSize":"25px","fontStyle":"normal","fontWeight":"500"}},"cozyCustomFont":"Playfair Display"} -->
<h5 class="wp-block-heading has-text-color has-link-color" style="color:#00080c;font-size:25px;font-style:normal;font-weight:500"><?php esc_html_e( 'Criminal Law', 'cozy-addons' ); ?></h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"26px"}},"typography":{"fontSize":"14px"}},"cozyCustomFont":"Public Sans"} -->
<p style="margin-bottom:26px;font-size:14px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:cozy-block/icon-list {"blockClientId":"f45f173b-9ef8-47bd-878c-cd4ba78a748b","iconPosition":"right","iconSize":24,"iconColor":"#6a6a6a","iconColorHover":"#ff9900","typography":{"fontFamily":"","fontSize":16,"colorHover":"#ff9900","fontWeight":400}} -->
<ul class="cozy-block-icon-list vertical default fill" id="cozyBlock_f45f173b_9ef8_47bd_878c_cd4ba78a748b"><!-- wp:cozy-block/list-item {"blockClientId":"0b972385-6eb0-4b30-9438-8d1e02d2dadc","iconViewBox":{"vx":"0","vy":"0","vw":"24","vh":"24"},"iconPath":"M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z","parentAttrs":{"enableLogo":true,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"right"},"title":"<?php esc_html_e( 'READ MORE', 'cozy-addons' ); ?>","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_0b972385_6eb0_4b30_9438_8d1e02d2dadc"><p><?php esc_html_e( 'READ MORE', 'cozy-addons' ); ?></p><div class="list-icon-wrapper"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z"></path></svg></div></li></a></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"fade-up","easingFunction":"ease","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-column"><!-- wp:group {"style":{"color":{"background":"#fffffe","text":"#6a6a6a"},"spacing":{"blockGap":"16px","padding":{"top":"28px","bottom":"28px","left":"26px","right":"26px"}},"elements":{"link":{"color":{"text":"#6a6a6a"}}}},"layout":{"type":"constrained","contentSize":"300px"},"cozyCustomFont":"Work Sans"} -->
<div class="wp-block-group has-text-color has-background has-link-color" style="color:#6a6a6a;background-color:#fffffe;padding-top:28px;padding-right:26px;padding-bottom:28px;padding-left:26px"><!-- wp:image {"id":856,"width":"50px","height":"50px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $images[4] ); ?>" alt="" class="wp-image-856" style="object-fit:contain;width:50px;height:50px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":5,"style":{"color":{"text":"#00080c"},"elements":{"link":{"color":{"text":"#00080c"}}},"typography":{"fontSize":"25px","fontStyle":"normal","fontWeight":"500"}},"cozyCustomFont":"Playfair Display"} -->
<h5 class="wp-block-heading has-text-color has-link-color" style="color:#00080c;font-size:25px;font-style:normal;font-weight:500"><?php esc_html_e( 'Health Law', 'cozy-addons' ); ?></h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"26px"}},"typography":{"fontSize":"14px"}},"cozyCustomFont":"Public Sans"} -->
<p style="margin-bottom:26px;font-size:14px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:cozy-block/icon-list {"blockClientId":"2c27ba20-e4c1-4679-a74d-dd8e90a97bfc","iconPosition":"right","iconSize":24,"iconColor":"#6a6a6a","iconColorHover":"#ff9900","typography":{"fontFamily":"","fontSize":16,"colorHover":"#ff9900","fontWeight":400}} -->
<ul class="cozy-block-icon-list vertical default fill" id="cozyBlock_2c27ba20_e4c1_4679_a74d_dd8e90a97bfc"><!-- wp:cozy-block/list-item {"blockClientId":"702fc15b-29ef-4072-9107-403db4a8c87a","iconViewBox":{"vx":"0","vy":"0","vw":"24","vh":"24"},"iconPath":"M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z","parentAttrs":{"enableLogo":true,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"right"},"title":"<?php esc_html_e( 'READ MORE', 'cozy-addons' ); ?>","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_702fc15b_29ef_4072_9107_403db4a8c87a"><p><?php esc_html_e( 'READ MORE', 'cozy-addons' ); ?></p><div class="list-icon-wrapper"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z"></path></svg></div></li></a></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"0"}},"cozyAnimation":{"type":"fade-down-left","easingFunction":"ease-in","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-column"><!-- wp:group {"style":{"color":{"background":"#fffffe","text":"#6a6a6a"},"spacing":{"blockGap":"16px","padding":{"top":"28px","bottom":"28px","left":"26px","right":"26px"}},"elements":{"link":{"color":{"text":"#6a6a6a"}}}},"layout":{"type":"constrained","contentSize":"300px"},"cozyCustomFont":"Work Sans"} -->
<div class="wp-block-group has-text-color has-background has-link-color" style="color:#6a6a6a;background-color:#fffffe;padding-top:28px;padding-right:26px;padding-bottom:28px;padding-left:26px"><!-- wp:image {"id":857,"width":"50px","height":"50px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $images[5] ); ?>" alt="" class="wp-image-857" style="object-fit:contain;width:50px;height:50px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":5,"style":{"color":{"text":"#00080c"},"elements":{"link":{"color":{"text":"#00080c"}}},"typography":{"fontSize":"25px","fontStyle":"normal","fontWeight":"500"}},"cozyCustomFont":"Playfair Display"} -->
<h5 class="wp-block-heading has-text-color has-link-color" style="color:#00080c;font-size:25px;font-style:normal;font-weight:500"><?php esc_html_e( 'Personal Law', 'cozy-addons' ); ?></h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"26px"}},"typography":{"fontSize":"14px"}},"cozyCustomFont":"Public Sans"} -->
<p style="margin-bottom:26px;font-size:14px"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:cozy-block/icon-list {"blockClientId":"28499014-9995-45c9-b058-9ca08895b7d2","iconPosition":"right","iconSize":24,"iconColor":"#6a6a6a","iconColorHover":"#ff9900","typography":{"fontFamily":"","fontSize":16,"colorHover":"#ff9900","fontWeight":400}} -->
<ul class="cozy-block-icon-list vertical default fill" id="cozyBlock_28499014_9995_45c9_b058_9ca08895b7d2"><!-- wp:cozy-block/list-item {"blockClientId":"6ee07e51-cb65-4461-ab5f-f5053784f09d","iconViewBox":{"vx":"0","vy":"0","vw":"24","vh":"24"},"iconPath":"M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z","parentAttrs":{"enableLogo":true,"enableTitle":true,"linkType":"full","linkNewTab":true,"iconPosition":"right"},"title":"<?php esc_html_e( 'READ MORE', 'cozy-addons' ); ?>","url":"#"} -->
<div class="list-inline-block"><a href="#" target="_blank" rel="noopener"><li class="cozy-block-list-item" id="cozyBlock_6ee07e51_cb65_4461_ab5f_f5053784f09d"><p><?php esc_html_e( 'READ MORE', 'cozy-addons' ); ?></p><div class="list-icon-wrapper"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M19.3651 12.56L14.3851 17.56C14.2251 17.72 14.0251 17.8 13.8251 17.8C13.6251 17.8 13.4251 17.72 13.2651 17.56C12.9451 17.24 12.9451 16.74 13.2651 16.42L16.8851 12.78H5.20511C4.76511 12.78 4.40511 12.42 4.40511 11.98C4.40511 11.54 4.76511 11.18 5.20511 11.18H16.8851L13.2651 7.54001C12.9451 7.22001 12.9451 6.72 13.2651 6.4C13.5851 6.08 14.0851 6.08 14.4051 6.4L19.3851 11.4C19.6851 11.74 19.6851 12.26 19.3651 12.56Z"></path></svg></div></li></a></div>
<!-- /wp:cozy-block/list-item --></ul>
<!-- /wp:cozy-block/icon-list --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->