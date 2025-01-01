<?php
/**
 * Title: Post Magazine section eighteen with carousel
 * Description: This is post magazine section with and carousel
 * Slug: cozy-block-patterns/post-magazine-eighteen
 * Categories: cozy-block-patterns, posts-and-magazine
 * Dynamic: true
 * Premium: true
 */

?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Posts and Magazine', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|40","bottom":"var:preset|spacing|80"},"blockGap":"0"},"color":{"background":"#fffffe"}},"className":"cozy-posts-magazine__stacked-variation-two","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull cozy-posts-magazine__stacked-variation-two has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--30)"><!-- wp:cozy-block/post-carousel {"blockClientId":"af137a22-5db4-45f9-b0cf-f95ad977d7a7","gridOptions":{"displayColumn":"4","masonryEnabled":false,"columnGap":30},"carouselOptions":{"pagination":{"enabled":true,"width":10,"height":10,"borderRadius":10,"activeWidth":10,"activeBorderRadius":10,"activeColor":"#e8b343","color":"#252525","activeColorHover":"#f49805","colorHover":"#a5a5a5","positionVertical":-30},"navigation":{"enabled":false,"iconSize":25,"iconBoxWidth":35,"iconBoxHeight":35,"borderRadius":50,"color":"#fffffe","colorHover":"#ff9900"},"sliderOptions":{"autoplay":{"enabled":true,"pauseOnMouseEnter":true,"delay":2500},"loop":false,"centeredSlides":false,"slidesPerView":"4","spaceBetween":30,"speed":700}}} -->
<div class="cozy-block-post-carousel-wrapper  hover-show" id="cozyBlock_af137a22_5db4_45f9_b0cf_f95ad977d7a7"><!-- wp:query {"queryId":1,"query":{"perPage":"5","postType":"post"},"lock":{"move":false,"remove":true},"className":"cozy-query swiper-container"} -->
<div class="wp-block-query cozy-query swiper-container"><!-- wp:post-template {"lock":{"move":false,"remove":true},"className":"cozy-layout-grid swiper-wrapper"} -->
<!-- wp:cover {"useFeaturedImage":true,"dimRatio":40,"customOverlayColor":"#1b1c1e","isUserOverlayColor":true,"minHeight":280,"contentPosition":"bottom center","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"left":"16px","right":"16px"}}},"className":"cozy-post__content-wrapper","layout":{"type":"constrained","contentSize":"300px"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-center cozy-post__content-wrapper" style="margin-top:0;margin-bottom:0;padding-right:16px;padding-left:16px;min-height:280px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-40 has-background-dim" style="background-color:#1b1c1e"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"6px","padding":{"left":"26px","bottom":"26px","top":"26px","right":"26px"}},"color":{"background":"#fffffe"},"elements":{"link":{":hover":{"color":{"text":"#1262ff"}}}}},"className":"cozy-post__content","layout":{"type":"constrained","contentSize":"100%"},"cozyCustomFont":"Work Sans"} -->
<div class="wp-block-group cozy-post__content has-background" style="background-color:#fffffe;padding-top:26px;padding-right:26px;padding-bottom:26px;padding-left:26px"><!-- wp:post-title {"textAlign":"center","isLink":true,"linkTarget":"_blank","style":{"elements":{"link":{"color":{"text":"#00080c"},":hover":{"color":{"text":"#ff9900"}}}},"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"18px"},"color":{"text":"#00080c"}}} /-->

<!-- wp:post-terms {"term":"category","textAlign":"center","style":{"elements":{"link":{"color":{"text":"#e8b343"}}},"color":{"text":"#e8b343"},"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"none"}},"fontSize":"small"} /--></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
<!-- /wp:post-template --></div>
<!-- /wp:query --><div class="swiper-pagination cozy-pagination"></div></div>
<!-- /wp:cozy-block/post-carousel --></div>
<!-- /wp:group -->