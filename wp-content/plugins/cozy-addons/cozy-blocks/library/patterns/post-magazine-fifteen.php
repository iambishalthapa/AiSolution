<?php
/**
 * Title: Post Magazine section fifteen with sticky section
 * Description: This is post magazine section with sticky section
 * Slug: cozy-block-patterns/post-magazine-fifteen
 * Categories: cozy-block-patterns, posts-and-magazine
 * Dynamic: true
 */

$images = array(
	CT_ASSETS_URL . 'images/post-magazine_15_1.jpg',
);
?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Posts and Magazine', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":"0"},"color":{"background":"#fffffe"}},"className":"cozy-block-pattern__post-fifteen","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull cozy-block-pattern__post-fifteen has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"16px","left":"16px","top":"20px","bottom":"80px"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:20px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"top","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"className":"cozy-post-fifteen__recent-post","layout":{"type":"constrained","contentSize":"780px","justifyContent":"left"}} -->
<div class="wp-block-group cozy-post-fifteen__recent-post"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"16px","left":"16px"},"margin":{"bottom":"36px"}}}} -->
<div class="wp-block-columns" style="margin-bottom:36px"><!-- wp:column {"verticalAlignment":"top","width":"197px"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:197px"><!-- wp:heading {"style":{"color":{"text":"#2d2d2d"},"elements":{"link":{"color":{"text":"#2d2d2d"}}},"typography":{"fontSize":"30px","fontStyle":"normal","fontWeight":"700"}},"cozyCustomFont":"Montserrat"} -->
<h2 class="wp-block-heading has-text-color has-link-color" style="color:#2d2d2d;font-size:30px;font-style:normal;font-weight:700"><?php esc_html_e( 'Most Recent', 'cozy-addons' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"border":{"top":{"color":"#2d2d2d","width":"1px"}},"spacing":{"margin":{"top":"16px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-top-color:#2d2d2d;border-top-width:1px;margin-top:16px"></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:cozy-block/post-carousel {"blockClientId":"55f6fbd9-d7a6-4b46-b751-6c84ff779f3c","layout":"grid","gridOptions":{"displayColumn":"1","masonryEnabled":false,"columnGap":16},"carouselOptions":{"pagination":{"enabled":true,"width":10,"height":10,"borderRadius":10,"activeWidth":10,"activeBorderRadius":10,"activeColor":"#3620be","color":"#252525","activeColorHover":"#f49805","colorHover":"#a5a5a5","positionVertical":-35},"navigation":{"enabled":false,"iconSize":15,"iconBoxWidth":35,"iconBoxHeight":35,"borderRadius":50,"backgroundColor":"#fff","color":"#007cba","backgroundColorHover":"#007cba","colorHover":"#fff"},"sliderOptions":{"autoplay":{"enabled":true,"pauseOnMouseEnter":true,"delay":2500},"loop":false,"centeredSlides":false,"slidesPerView":"1","spaceBetween":30,"speed":"1000"}}} -->
<div class="cozy-block-post-grid-wrapper  hover-show" id="cozyBlock_55f6fbd9_d7a6_4b46_b751_6c84ff779f3c"><!-- wp:query {"queryId":1,"query":{"perPage":"5","postType":"post"},"lock":{"move":false,"remove":true},"className":"cozy-query swiper-container"} -->
<div class="wp-block-query cozy-query swiper-container"><!-- wp:post-template {"lock":{"move":false,"remove":true},"style":{"spacing":{"blockGap":"0"}},"className":"cozy-layout-grid swiper-wrapper"} -->
<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"50%","style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:group {"className":"position__relative","layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group position__relative"><!-- wp:post-featured-image {"height":"300px","style":{"border":{"radius":"0px"}}} /-->

<!-- wp:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"typography":{"fontSize":"12px","fontStyle":"normal","fontWeight":"500","textTransform":"uppercase"},"spacing":{"padding":{"top":"10px","bottom":"10px","left":"10px","right":"10px"}}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"50%","style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"10px","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"},"cozyCustomFont":"Inter"} -->
<div class="wp-block-group" style="margin-top:10px;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-title {"isLink":true,"linkTarget":"_blank","style":{"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}},"typography":{"textTransform":"capitalize","fontSize":"26px"}}} /-->

<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"#6a6a6a"}}},"color":{"text":"#6a6a6a"},"typography":{"textTransform":"capitalize","fontStyle":"normal","fontWeight":"600","fontSize":"14px"},"spacing":{"margin":{"top":"6px","bottom":"6px"},"blockGap":"16px"}},"layout":{"type":"flex","flexWrap":"nowrap"},"cozyCustomFont":"Montserrat"} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#6a6a6a;margin-top:6px;margin-bottom:6px;font-size:14px;font-style:normal;font-weight:600;text-transform:capitalize"><!-- wp:group {"style":{"spacing":{"blockGap":"6px","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cozy-block/icon-picker {"blockClientId":"0219c9d8-2684-40a1-be4b-ce369a6e3b18","layout":"outline","iconSize":10,"iconViewBox":{"vx":"0","vy":"0","vw":"25","vh":"25"},"iconPath":"M12.5 14.0625C16.3818 14.0625 19.5312 10.9131 19.5312 7.03125C19.5312 3.14941 16.3818 0 12.5 0C8.61816 0 5.46875 3.14941 5.46875 7.03125C5.46875 10.9131 8.61816 14.0625 12.5 14.0625ZM18.75 15.625H16.0596C14.9756 16.123 13.7695 16.4062 12.5 16.4062C11.2305 16.4062 10.0293 16.123 8.94043 15.625H6.25C2.79785 15.625 0 18.4229 0 21.875V22.6562C0 23.9502 1.0498 25 2.34375 25H22.6562C23.9502 25 25 23.9502 25 22.6562V21.875C25 18.4229 22.2021 15.625 18.75 15.625Z","iconColor":"#6a6a6a"} -->
<div class="cozy-block-icon-picker default" id="cozyBlock_0219c9d8_2684_40a1_be4b_ce369a6e3b18"><svg width="15" height="15" viewBox="-1.5 -1.5 28 28" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="none" stroke="#6a6a6a" stroke-opacity="1" stroke-width="2"><path d="M12.5 14.0625C16.3818 14.0625 19.5312 10.9131 19.5312 7.03125C19.5312 3.14941 16.3818 0 12.5 0C8.61816 0 5.46875 3.14941 5.46875 7.03125C5.46875 10.9131 8.61816 14.0625 12.5 14.0625ZM18.75 15.625H16.0596C14.9756 16.123 13.7695 16.4062 12.5 16.4062C11.2305 16.4062 10.0293 16.123 8.94043 15.625H6.25C2.79785 15.625 0 18.4229 0 21.875V22.6562C0 23.9502 1.0498 25 2.34375 25H22.6562C23.9502 25 25 23.9502 25 22.6562V21.875C25 18.4229 22.2021 15.625 18.75 15.625Z"></path></svg></div>
<!-- /wp:cozy-block/icon-picker -->

<!-- wp:post-author-name {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"2px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:2px"><!-- wp:cozy-block/icon-picker {"blockClientId":"3f448a63-15d5-4902-b7d7-58847a4dd3ac","iconSize":14,"iconViewBox":{"vx":"0","vy":"0","vw":"14","vh":"14"},"iconPath":"M9.1987 10.1335L10.132 9.20016L7.66536 6.7335V3.66683H6.33203V7.26683L9.1987 10.1335ZM6.9987 13.6668C6.07648 13.6668 5.20981 13.4918 4.3987 13.1418C3.58759 12.7918 2.88203 12.3168 2.28203 11.7168C1.68203 11.1168 1.20703 10.4113 0.857031 9.60016C0.507031 8.78905 0.332031 7.92239 0.332031 7.00016C0.332031 6.07794 0.507031 5.21127 0.857031 4.40016C1.20703 3.58905 1.68203 2.8835 2.28203 2.2835C2.88203 1.6835 3.58759 1.2085 4.3987 0.858496C5.20981 0.508496 6.07648 0.333496 6.9987 0.333496C7.92092 0.333496 8.78759 0.508496 9.5987 0.858496C10.4098 1.2085 11.1154 1.6835 11.7154 2.2835C12.3154 2.8835 12.7904 3.58905 13.1404 4.40016C13.4904 5.21127 13.6654 6.07794 13.6654 7.00016C13.6654 7.92239 13.4904 8.78905 13.1404 9.60016C12.7904 10.4113 12.3154 11.1168 11.7154 11.7168C11.1154 12.3168 10.4098 12.7918 9.5987 13.1418C8.78759 13.4918 7.92092 13.6668 6.9987 13.6668ZM6.9987 12.3335C8.47648 12.3335 9.73481 11.8141 10.7737 10.7752C11.8126 9.73627 12.332 8.47794 12.332 7.00016C12.332 5.52239 11.8126 4.26405 10.7737 3.22516C9.73481 2.18627 8.47648 1.66683 6.9987 1.66683C5.52092 1.66683 4.26259 2.18627 3.2237 3.22516C2.18481 4.26405 1.66536 5.52239 1.66536 7.00016C1.66536 8.47794 2.18481 9.73627 3.2237 10.7752C4.26259 11.8141 5.52092 12.3335 6.9987 12.3335Z","iconColor":"#6a6a6a"} -->
<div class="cozy-block-icon-picker default" id="cozyBlock_3f448a63_15d5_4902_b7d7_58847a4dd3ac"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="#6a6a6a"><path d="M9.1987 10.1335L10.132 9.20016L7.66536 6.7335V3.66683H6.33203V7.26683L9.1987 10.1335ZM6.9987 13.6668C6.07648 13.6668 5.20981 13.4918 4.3987 13.1418C3.58759 12.7918 2.88203 12.3168 2.28203 11.7168C1.68203 11.1168 1.20703 10.4113 0.857031 9.60016C0.507031 8.78905 0.332031 7.92239 0.332031 7.00016C0.332031 6.07794 0.507031 5.21127 0.857031 4.40016C1.20703 3.58905 1.68203 2.8835 2.28203 2.2835C2.88203 1.6835 3.58759 1.2085 4.3987 0.858496C5.20981 0.508496 6.07648 0.333496 6.9987 0.333496C7.92092 0.333496 8.78759 0.508496 9.5987 0.858496C10.4098 1.2085 11.1154 1.6835 11.7154 2.2835C12.3154 2.8835 12.7904 3.58905 13.1404 4.40016C13.4904 5.21127 13.6654 6.07794 13.6654 7.00016C13.6654 7.92239 13.4904 8.78905 13.1404 9.60016C12.7904 10.4113 12.3154 11.1168 11.7154 11.7168C11.1154 12.3168 10.4098 12.7918 9.5987 13.1418C8.78759 13.4918 7.92092 13.6668 6.9987 13.6668ZM6.9987 12.3335C8.47648 12.3335 9.73481 11.8141 10.7737 10.7752C11.8126 9.73627 12.332 8.47794 12.332 7.00016C12.332 5.52239 11.8126 4.26405 10.7737 3.22516C9.73481 2.18627 8.47648 1.66683 6.9987 1.66683C5.52092 1.66683 4.26259 2.18627 3.2237 3.22516C2.18481 4.26405 1.66536 5.52239 1.66536 7.00016C1.66536 8.47794 2.18481 9.73627 3.2237 10.7752C4.26259 11.8141 5.52092 12.3335 6.9987 12.3335Z"></path></svg></div>
<!-- /wp:cozy-block/icon-picker --></div>
<!-- /wp:group -->

<!-- wp:post-date {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:post-excerpt {"moreText":"Read More","showMoreOnNewLine":false,"excerptLength":30,"style":{"elements":{"link":{"color":{"text":"#3620be"},":hover":{"color":{"text":"#f49805"}}}},"color":{"text":"#6a6a6a"},"typography":{"textTransform":"none","fontSize":"14px"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:cozy-block/post-carousel --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"position":{"type":"sticky","top":"0px"},"spacing":{"padding":{"right":"0","left":"0"}}},"className":"cozy-post-fifteen__popular-post","layout":{"type":"constrained","contentSize":"360px","justifyContent":"left"}} -->
<div class="wp-block-group cozy-post-fifteen__popular-post" style="padding-right:0;padding-left:0"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"16px","left":"16px"},"margin":{"top":"0px","bottom":"36px"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}}} -->
<div class="wp-block-columns" style="margin-top:0px;margin-bottom:36px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"top","width":"124px"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:124px"><!-- wp:heading {"style":{"color":{"text":"#2d2d2d"},"elements":{"link":{"color":{"text":"#2d2d2d"}}},"typography":{"fontSize":"30px","fontStyle":"normal","fontWeight":"700"}},"cozyCustomFont":"Montserrat"} -->
<h2 class="wp-block-heading has-text-color has-link-color" style="color:#2d2d2d;font-size:30px;font-style:normal;font-weight:700"><?php esc_html_e( 'Popular', 'cozy-addons' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"border":{"top":{"color":"#2d2d2d","width":"1px"}},"spacing":{"margin":{"top":"16px"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-top-color:#2d2d2d;border-top-width:1px;margin-top:16px"></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:cozy-block/post-carousel {"blockClientId":"9bb8049b-9f9d-4373-9f2e-882e19b39bce","layout":"grid","gridOptions":{"displayColumn":"1","masonryEnabled":false,"columnGap":25}} -->
<div class="cozy-block-post-grid-wrapper  hover-show" id="cozyBlock_9bb8049b_9f9d_4373_9f2e_882e19b39bce"><!-- wp:query {"queryId":1,"query":{"perPage":"4","postType":"post"},"lock":{"move":false,"remove":true},"className":"cozy-query swiper-container"} -->
<div class="wp-block-query cozy-query swiper-container"><!-- wp:post-template {"lock":{"move":false,"remove":false},"className":"cozy-layout-grid swiper-wrapper"} -->
<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"26px"},"blockGap":"16px"},"border":{"bottom":{"color":"#1010101a","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="border-bottom-color:#1010101a;border-bottom-width:1px;padding-bottom:26px"><!-- wp:post-featured-image {"aspectRatio":"1","width":"130px","height":"120px","style":{"spacing":{"margin":{"right":"0","left":"0","top":"0","bottom":"0"},"padding":{"right":"0","left":"0"}},"border":{"radius":"0px"}}} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"12px","margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"typography":{"fontSize":"12px","fontStyle":"normal","fontWeight":"500","textTransform":"uppercase"}}} /-->

<!-- wp:post-title {"isLink":true,"linkTarget":"_blank","style":{"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}},"typography":{"textTransform":"capitalize","fontSize":"16px"}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:cozy-block/post-carousel -->

<!-- wp:cover {"url":"<?php echo esc_url( $images[0] ); ?>","id":4245,"dimRatio":30,"isUserOverlayColor":true,"minHeightUnit":"px","contentPosition":"center center","style":{"spacing":{"padding":{"top":"0","bottom":"0px","left":"0","right":"0"},"margin":{"top":"0"},"blockGap":"0"}}} -->
<div class="wp-block-cover" style="margin-top:0;padding-top:0;padding-right:0;padding-bottom:0px;padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-30 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-4245" alt="" src="<?php echo esc_url( $images[0] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"typography":{"fontSize":"16px","textDecoration":"none"},"spacing":{"blockGap":"0","margin":{"top":"44px","bottom":"0"}}}} -->
<div class="wp-block-buttons has-custom-font-size" style="margin-top:44px;margin-bottom:0;font-size:16px;text-decoration:none"><!-- wp:button {"style":{"color":{"text":"#0142de","background":"#fffffe"},"elements":{"link":{"color":{"text":"#0142de"}}},"border":{"radius":"0px"},"spacing":{"padding":{"left":"26px","right":"26px"}}},"cozyHoverStyles":{"bgColor":"#f49805","color":"#fffffe","borderColor":""}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background has-link-color wp-element-button" style="border-radius:0px;color:#0142de;background-color:#fffffe;padding-right:26px;padding-left:26px">Buy Now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->