<?php
/**
 * Title: Post Magazine section seventeen with grid
 * Description: This is post magazine section with and grid
 * Slug: cozy-block-patterns/post-magazine-seventeen
 * Categories: cozy-block-patterns, posts-and-magazine
 * Dynamic: true
 */
?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Posts and Magazine', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"}},"className":"cozy-posts-magazine__stacked-variation-one","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull cozy-posts-magazine__stacked-variation-one" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"80px","bottom":"80px","left":"16px","right":"16px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1180px"},"cozyCustomFont":"Libre Caslon Text"} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"35px"},"color":{"text":"#111915"},"elements":{"link":{"color":{"text":"#111915"}}},"spacing":{"margin":{"bottom":"36px"}}},"cozyCustomFont":"Libre Caslon Text","cozyAnimation":{"type":"flip-up","easingFunction":"ease-in","anchorPlacement":"top-center","duration":600}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#111915;margin-bottom:36px;font-size:35px"><?php esc_html_e( 'Latest News and Insights', 'cozy-addons' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:cozy-block/post-carousel {"blockClientId":"ad2bd3ec-faff-4368-8e85-3e7819563004","layout":"grid","gridOptions":{"displayColumn":"2","masonryEnabled":false,"columnGap":30}} -->
<div class="cozy-block-post-grid-wrapper  hover-show" id="cozyBlock_ad2bd3ec_faff_4368_8e85_3e7819563004"><!-- wp:query {"queryId":1,"query":{"perPage":"2","postType":"post"},"lock":{"move":false,"remove":true},"className":"cozy-query swiper-container"} -->
<div class="wp-block-query cozy-query swiper-container"><!-- wp:post-template {"lock":{"move":false,"remove":true},"style":{"color":{"text":"#111915"},"elements":{"link":{"color":{"text":"#111915"},":hover":{"color":{"text":"#ff9900"}}}},"spacing":{"blockGap":"0"}},"className":"cozy-layout-grid swiper-wrapper","fontSize":"small"} -->
<!-- wp:group {"className":"position__relative","layout":{"type":"constrained"}} -->
<div class="wp-block-group position__relative"><!-- wp:post-featured-image {"height":"400px","style":{"border":{"radius":"10px"}}} /-->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"16px","left":"16px","top":"16px","bottom":"16px"}}},"className":"position__absolute","layout":{"type":"constrained","contentSize":"78px","justifyContent":"left"}} -->
<div class="wp-block-group position__absolute" style="margin-top:0;margin-bottom:0;padding-top:16px;padding-right:16px;padding-bottom:16px;padding-left:16px"><!-- wp:group {"style":{"color":{"background":"#0a587b","text":"#fffffe"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"20px","left":"20px","top":"5px","bottom":"5px"},"blockGap":"0"},"elements":{"link":{"color":{"text":"#fffffe"}}}},"layout":{"type":"constrained"},"cozyCustomFont":"Libre Caslon Text"} -->
<div class="wp-block-group has-text-color has-background has-link-color" style="color:#fffffe;background-color:#0a587b;margin-top:0;margin-bottom:0;padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><!-- wp:post-date {"textAlign":"center","format":"M","style":{"color":{"text":"#efefef"},"elements":{"link":{"color":{"text":"#efefef"}}}},"fontSize":"small"} /-->

<!-- wp:post-date {"textAlign":"center","format":"m","style":{"typography":{"fontSize":"30px"},"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"10px","bottom":"6px"}}},"className":"cozy-posts-magazine__category","layout":{"type":"constrained"},"cozyCustomFont":"Inter"} -->
<div class="wp-block-group cozy-posts-magazine__category" style="margin-top:10px;margin-bottom:6px;font-style:normal;font-weight:500"><!-- wp:post-terms {"term":"category"} /--></div>
<!-- /wp:group -->

<!-- wp:post-title {"level":4,"isLink":true,"linkTarget":"_blank","style":{"typography":{"fontSize":"30px","fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"0","bottom":"4px"}}}} /-->

<!-- wp:post-excerpt {"moreText":"View More","excerptLength":29,"style":{"color":{"text":"#6a6a6a"},"elements":{"link":{"color":{"text":"#0a587b"}}},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"x-small"} /-->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:cozy-block/post-carousel --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->