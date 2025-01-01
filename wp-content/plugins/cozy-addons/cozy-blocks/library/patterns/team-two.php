<?php
/**
 * Title: Team section two with grid animation
 * Description: This is team section with grid, animation
 * Slug: cozy-block-patterns/team-two
 * Categories: cozy-block-patterns, teams
 * Premium: true
 */

$images = array(
	CT_ASSETS_URL . 'images/team_2_1.jpg',
	CT_ASSETS_URL . 'images/team_1_1.jpg',
	CT_ASSETS_URL . 'images/team_1_2.jpg',
	CT_ASSETS_URL . 'images/team_1_3.jpg',
);
?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Team', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"color":{"background":"#f4f8ff"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f4f8ff;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"16px","left":"16px","top":"80px","bottom":"80px"},"blockGap":"var:preset|spacing|70"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"721px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"#0d5fff"}}},"typography":{"fontSize":"14px","textTransform":"uppercase","lineHeight":"1.2","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#0d5fff"}},"cozyCustomFont":"Public Sans"} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#0d5fff;font-size:14px;font-style:normal;font-weight:500;line-height:1.2;text-transform:uppercase"><?php esc_html_e( 'Professional Team', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"1.3","fontSize":"44px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"#090b10"}}},"color":{"text":"#090b10"}},"cozyCustomFont":"Inter","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#090b10;font-size:44px;font-style:normal;font-weight:600;line-height:1.3"><?php esc_html_e( 'Our Team Members', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}},"typography":{"fontSize":"14px"}},"cozyCustomFont":"Public Sans"} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#646464;font-size:14px"><?php esc_html_e( 'Far far away, behind the word mountains, far from the countries Vocalic and Consonantal, there live the blind texts. Separated they live.', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"26px","padding":{"right":"0","left":"0"},"margin":{"top":"40px","bottom":"0"}},"color":{"text":"#646464"},"elements":{"link":{"color":{"text":"#646464"}}},"typography":{"fontSize":"14px"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#646464;margin-top:40px;margin-bottom:0;padding-right:0;padding-left:0;font-size:14px"><!-- wp:cozy-block/teams {"blockClientId":"39cd26c8-0c2d-4aa4-98b7-351d8fea5d3a"} -->
<div class="cozy-block-teams display-grid   hover-show" id="cozyBlock_39cd26c8_0c2d_4aa4_98b7_351d8fea5d3a"><div class="cozy-block-grid-wrapper "><!-- wp:cozy-block/grid -->
<div class="cozy-block-grid"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"cozyAnimation":{"type":"slide-up","easingFunction":"ease","anchorPlacement":"top-center","duration":1000}} -->
<div class="wp-block-group"><!-- wp:image {"id":2557,"width":"300px","height":"300px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"100%"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[0] ); ?>" alt="" class="wp-image-2557" style="border-radius:100%;object-fit:cover;width:300px;height:300px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"10px","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"200px"}} -->
<div class="wp-block-group" style="margin-top:10px;margin-bottom:0"><!-- wp:paragraph {"align":"center","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry."} -->
<p class="has-text-align-center"><?php esc_html_e( 'Web Developer', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":4,"placeholder":"John Carter","style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}},"spacing":{"margin":{"top":"4px"}}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#090b10;margin-top:4px;font-size:20px;font-style:normal;font-weight:500"><?php esc_html_e( 'Kate Green', 'cozy-addons' ); ?></h4>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/grid -->

<!-- wp:cozy-block/grid -->
<div class="cozy-block-grid"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"cozyAnimation":{"type":"fade-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":800}} -->
<div class="wp-block-group"><!-- wp:image {"id":2534,"width":"300px","height":"300px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"100%"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[1] ); ?>" alt="" class="wp-image-2534" style="border-radius:100%;object-fit:cover;width:300px;height:300px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"10px","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"200px"}} -->
<div class="wp-block-group" style="margin-top:10px;margin-bottom:0"><!-- wp:paragraph {"align":"center","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry."} -->
<p class="has-text-align-center">Designer</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":4,"placeholder":"John Carter","style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}},"spacing":{"margin":{"top":"4px"}}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#090b10;margin-top:4px;font-size:20px;font-style:normal;font-weight:500"><?php esc_html_e( 'Ben', 'cozy-addons' ); ?></h4>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/grid -->

<!-- wp:cozy-block/grid -->
<div class="cozy-block-grid"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"cozyAnimation":{"type":"zoom-in-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":800}} -->
<div class="wp-block-group"><!-- wp:image {"id":2540,"width":"300px","height":"300px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"100%"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-2540" style="border-radius:100%;object-fit:cover;width:300px;height:300px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"10px","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"200px"}} -->
<div class="wp-block-group" style="margin-top:10px;margin-bottom:0"><!-- wp:paragraph {"align":"center","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry."} -->
<p class="has-text-align-center"><?php esc_html_e( 'CEO', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":4,"placeholder":"John Carter","style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}},"spacing":{"margin":{"top":"4px"}}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#090b10;margin-top:4px;font-size:20px;font-style:normal;font-weight:500"><?php esc_html_e( 'Sylphia', 'cozy-addons' ); ?></h4>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/grid --></div></div>
<!-- /wp:cozy-block/teams -->

<!-- wp:cozy-block/teams {"blockClientId":"cf7e1447-c7b8-4df2-a127-86e0321c43f1","gridOptions":{"displayColumn":"2","masonryEnabled":false,"columnGap":0}} -->
<div class="cozy-block-teams display-grid   hover-show" id="cozyBlock_cf7e1447_c7b8_4df2_a127_86e0321c43f1"><div class="cozy-block-grid-wrapper "><!-- wp:cozy-block/grid -->
<div class="cozy-block-grid"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"cozyAnimation":{"type":"fade-down","easingFunction":"ease","anchorPlacement":"top-center","duration":800}} -->
<div class="wp-block-group"><!-- wp:image {"id":2558,"width":"300px","height":"300px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"100%"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[2] ); ?>" alt="" class="wp-image-2558" style="border-radius:100%;object-fit:cover;width:300px;height:300px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"10px","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"200px"}} -->
<div class="wp-block-group" style="margin-top:10px;margin-bottom:0"><!-- wp:paragraph {"align":"center","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry."} -->
<p class="has-text-align-center"><?php esc_html_e( 'CEO', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":4,"placeholder":"John Carter","style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}},"spacing":{"margin":{"top":"4px"}}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#090b10;margin-top:4px;font-size:20px;font-style:normal;font-weight:500"><?php esc_html_e( 'Sylphia', 'cozy-addons' ); ?></h4>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/grid -->

<!-- wp:cozy-block/grid -->
<div class="cozy-block-grid"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":800}} -->
<div class="wp-block-group"><!-- wp:image {"id":2559,"width":"300px","height":"300px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"100%"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( $images[3] ); ?>" alt="" class="wp-image-2559" style="border-radius:100%;object-fit:cover;width:300px;height:300px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"10px","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"200px"}} -->
<div class="wp-block-group" style="margin-top:10px;margin-bottom:0"><!-- wp:paragraph {"align":"center","placeholder":"Lorem Ipsum is simply dummy text of the printing and typesetting industry."} -->
<p class="has-text-align-center"><?php esc_html_e( 'Director', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":4,"placeholder":"John Carter","style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}},"spacing":{"margin":{"top":"4px"}}},"cozyCustomFont":"Inter"} -->
<h4 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#090b10;margin-top:4px;font-size:20px;font-style:normal;font-weight:500"><?php esc_html_e( 'Tom', 'cozy-addons' ); ?></h4>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:cozy-block/grid --></div></div>
<!-- /wp:cozy-block/teams --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->