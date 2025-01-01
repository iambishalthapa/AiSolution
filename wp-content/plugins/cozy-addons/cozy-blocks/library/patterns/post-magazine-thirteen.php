<?php
/**
 * Title: Post Magazine section thirteen with grid
 * Description: This is post magazine section with grid
 * Slug: cozy-block-patterns/post-magazine-thirteen
 * Categories: cozy-block-patterns, posts-and-magazine
 * Dynamic: true
 */
?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Posts and Magazine', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":"0"},"color":{"background":"#fffffe"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"16px","left":"16px","top":"20px","bottom":"20px"}}},"layout":{"type":"constrained","contentSize":"1180px"},"cozyAnimation":{"type":"fade-right","easingFunction":"ease-in","anchorPlacement":"top-center","duration":600}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:20px;padding-right:16px;padding-bottom:20px;padding-left:16px"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"12px","left":"12px"},"margin":{"top":"0","bottom":"26px"}}}} -->
<div class="wp-block-columns" style="margin-top:0;margin-bottom:26px"><!-- wp:column {"verticalAlignment":"top","width":"20%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:20%"><!-- wp:heading {"style":{"color":{"text":"#2d2d2d"},"elements":{"link":{"color":{"text":"#2d2d2d"}}},"typography":{"fontSize":"30px","fontStyle":"normal","fontWeight":"600"}},"cozyCustomFont":"Montserrat"} -->
<h2 class="wp-block-heading has-text-color has-link-color" style="color:#2d2d2d;font-size:30px;font-style:normal;font-weight:600"><?php esc_html_e( "Editor's Picks", 'cozy-addons' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"border":{"top":{"color":"#2d2d2d","width":"1px"}},"spacing":{"margin":{"top":"16px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-top-color:#2d2d2d;border-top-width:1px;margin-top:16px"></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:cozy-block/post-carousel {"blockClientId":"6250780d-c9bc-4ea9-bbfe-b9adaf4cbcde","layout":"grid","gridOptions":{"displayColumn":"4","masonryEnabled":false,"columnGap":30}} -->
<div class="cozy-block-post-grid-wrapper  hover-show" id="cozyBlock_6250780d_c9bc_4ea9_bbfe_b9adaf4cbcde"><!-- wp:query {"queryId":1,"query":{"perPage":"4","postType":"post"},"lock":{"move":false,"remove":true},"className":"cozy-query swiper-container"} -->
<div class="wp-block-query cozy-query swiper-container"><!-- wp:post-template {"lock":{"move":false,"remove":true},"style":{"color":{"text":"#2d2d2d"},"elements":{"link":{"color":{"text":"#2d2d2d"}}},"spacing":{"blockGap":"0"}},"className":"cozy-layout-grid swiper-wrapper"} -->
<!-- wp:post-featured-image {"isLink":true,"width":"","height":"300px","style":{"border":{"radius":"0px"}}} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"16px","left":"16px","top":"0","bottom":"0"},"blockGap":"6px","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"250px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:16px;padding-bottom:0;padding-left:16px"><!-- wp:post-title {"isLink":true,"linkTarget":"_blank","style":{"typography":{"textTransform":"capitalize","fontStyle":"normal","fontWeight":"600","fontSize":"20px"},"elements":{"link":{":hover":{"color":{"text":"#f49805"}}}}}} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"6px","margin":{"top":"6px"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"text":"#6a6a6a"},"elements":{"link":{"color":{"text":"#6a6a6a"}}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#6a6a6a;margin-top:6px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0px"},"blockGap":"0px","padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0px;padding-top:0;padding-bottom:0"><!-- wp:cozy-block/icon-picker {"blockClientId":"203fe19f-23d7-4f6d-980f-32ddff353469","iconSize":14,"iconViewBox":{"vx":"0","vy":"0","vw":"14","vh":"14"},"iconPath":"M9.1987 10.1335L10.132 9.20016L7.66536 6.7335V3.66683H6.33203V7.26683L9.1987 10.1335ZM6.9987 13.6668C6.07648 13.6668 5.20981 13.4918 4.3987 13.1418C3.58759 12.7918 2.88203 12.3168 2.28203 11.7168C1.68203 11.1168 1.20703 10.4113 0.857031 9.60016C0.507031 8.78905 0.332031 7.92239 0.332031 7.00016C0.332031 6.07794 0.507031 5.21127 0.857031 4.40016C1.20703 3.58905 1.68203 2.8835 2.28203 2.2835C2.88203 1.6835 3.58759 1.2085 4.3987 0.858496C5.20981 0.508496 6.07648 0.333496 6.9987 0.333496C7.92092 0.333496 8.78759 0.508496 9.5987 0.858496C10.4098 1.2085 11.1154 1.6835 11.7154 2.2835C12.3154 2.8835 12.7904 3.58905 13.1404 4.40016C13.4904 5.21127 13.6654 6.07794 13.6654 7.00016C13.6654 7.92239 13.4904 8.78905 13.1404 9.60016C12.7904 10.4113 12.3154 11.1168 11.7154 11.7168C11.1154 12.3168 10.4098 12.7918 9.5987 13.1418C8.78759 13.4918 7.92092 13.6668 6.9987 13.6668ZM6.9987 12.3335C8.47648 12.3335 9.73481 11.8141 10.7737 10.7752C11.8126 9.73627 12.332 8.47794 12.332 7.00016C12.332 5.52239 11.8126 4.26405 10.7737 3.22516C9.73481 2.18627 8.47648 1.66683 6.9987 1.66683C5.52092 1.66683 4.26259 2.18627 3.2237 3.22516C2.18481 4.26405 1.66536 5.52239 1.66536 7.00016C1.66536 8.47794 2.18481 9.73627 3.2237 10.7752C4.26259 11.8141 5.52092 12.3335 6.9987 12.3335Z","iconColor":"#6a6a6a"} -->
<div class="cozy-block-icon-picker default" id="cozyBlock_203fe19f_23d7_4f6d_980f_32ddff353469"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="#6a6a6a"><path d="M9.1987 10.1335L10.132 9.20016L7.66536 6.7335V3.66683H6.33203V7.26683L9.1987 10.1335ZM6.9987 13.6668C6.07648 13.6668 5.20981 13.4918 4.3987 13.1418C3.58759 12.7918 2.88203 12.3168 2.28203 11.7168C1.68203 11.1168 1.20703 10.4113 0.857031 9.60016C0.507031 8.78905 0.332031 7.92239 0.332031 7.00016C0.332031 6.07794 0.507031 5.21127 0.857031 4.40016C1.20703 3.58905 1.68203 2.8835 2.28203 2.2835C2.88203 1.6835 3.58759 1.2085 4.3987 0.858496C5.20981 0.508496 6.07648 0.333496 6.9987 0.333496C7.92092 0.333496 8.78759 0.508496 9.5987 0.858496C10.4098 1.2085 11.1154 1.6835 11.7154 2.2835C12.3154 2.8835 12.7904 3.58905 13.1404 4.40016C13.4904 5.21127 13.6654 6.07794 13.6654 7.00016C13.6654 7.92239 13.4904 8.78905 13.1404 9.60016C12.7904 10.4113 12.3154 11.1168 11.7154 11.7168C11.1154 12.3168 10.4098 12.7918 9.5987 13.1418C8.78759 13.4918 7.92092 13.6668 6.9987 13.6668ZM6.9987 12.3335C8.47648 12.3335 9.73481 11.8141 10.7737 10.7752C11.8126 9.73627 12.332 8.47794 12.332 7.00016C12.332 5.52239 11.8126 4.26405 10.7737 3.22516C9.73481 2.18627 8.47648 1.66683 6.9987 1.66683C5.52092 1.66683 4.26259 2.18627 3.2237 3.22516C2.18481 4.26405 1.66536 5.52239 1.66536 7.00016C1.66536 8.47794 2.18481 9.73627 3.2237 10.7752C4.26259 11.8141 5.52092 12.3335 6.9987 12.3335Z"></path></svg></div>
<!-- /wp:cozy-block/icon-picker --></div>
<!-- /wp:group -->

<!-- wp:post-date {"fontSize":"x-small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:cozy-block/post-carousel --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->