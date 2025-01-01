<?php
/**
 * Title: Post Magazine section sixteen with columns
 * Description: This is post magazine section with columns
 * Slug: cozy-block-patterns/post-magazine-sixteen
 * Categories: cozy-block-patterns, posts-and-magazine
 * Dynamic: true
 */

$images = array(
	CT_ASSETS_URL . 'images/post-magazine_16_1.jpg',
);
?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Posts and Magazine', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":"0"},"color":{"background":"#f4f7ff"}},"className":"cozy-block-pattern__post-sixteen","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull cozy-block-pattern__post-sixteen has-background" style="background-color:#f4f7ff;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"16px","left":"16px","top":"80px","bottom":"80px"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"16px","left":"0"},"margin":{"bottom":"36px"}}}} -->
<div class="wp-block-columns" style="margin-bottom:36px"><!-- wp:column {"verticalAlignment":"top","width":"20%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:20%"><!-- wp:heading {"style":{"color":{"text":"#2d2d2d"},"elements":{"link":{"color":{"text":"#2d2d2d"}}},"typography":{"fontSize":"30px","fontStyle":"normal","fontWeight":"700"}},"cozyCustomFont":"Montserrat"} -->
<h2 class="wp-block-heading has-text-color has-link-color" style="color:#2d2d2d;font-size:30px;font-style:normal;font-weight:700"><?php esc_html_e( 'You Missed It', 'cozy-addons' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"border":{"top":{"color":"#2d2d2d","width":"1px"}},"spacing":{"margin":{"top":"16px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-top-color:#2d2d2d;border-top-width:1px;margin-top:16px"></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|70","left":"26px"},"margin":{"top":"36px"}}}} -->
<div class="wp-block-columns" style="margin-top:36px"><!-- wp:column {"className":"cozy-post-sixteen__popular-post","cozyAnimation":{"type":"fade-right","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<div class="wp-block-column cozy-post-sixteen__popular-post"><!-- wp:cozy-block/post-carousel {"blockClientId":"c89cc882-c61b-4748-8908-5e3063687d9a","layout":"grid","gridOptions":{"displayColumn":"1","masonryEnabled":false,"columnGap":25}} -->
<div class="cozy-block-post-grid-wrapper  hover-show" id="cozyBlock_c89cc882_c61b_4748_8908_5e3063687d9a"><!-- wp:query {"queryId":1,"query":{"perPage":"3","postType":"post"},"lock":{"move":false,"remove":true},"className":"cozy-query swiper-container"} -->
<div class="wp-block-query cozy-query swiper-container"><!-- wp:post-template {"lock":{"move":false,"remove":false},"className":"cozy-layout-grid swiper-wrapper"} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"16px","padding":{"bottom":"20px"}},"border":{"bottom":{"color":"#1010101a","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top","justifyContent":"left"}} -->
<div class="wp-block-group" style="border-bottom-color:#1010101a;border-bottom-width:1px;padding-bottom:20px"><!-- wp:post-featured-image {"aspectRatio":"1","width":"130px","height":"130px","style":{"border":{"radius":"0px"}}} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"constrained","contentSize":"270px","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"typography":{"fontSize":"12px","fontStyle":"normal","fontWeight":"500","textTransform":"uppercase"}}} /-->

<!-- wp:post-title {"isLink":true,"linkTarget":"_blank","style":{"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}},"typography":{"textTransform":"capitalize","fontSize":"16px","fontStyle":"italic","fontWeight":"600"}}} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"6px","margin":{"top":"0","bottom":"0"}},"color":{"text":"#6a6a6a"},"elements":{"link":{"color":{"text":"#6a6a6a"}}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#6a6a6a;margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:cozy-block/icon-picker {"blockClientId":"8e421c3d-70b7-461d-aedd-a1abc20ab547","iconSize":12,"iconViewBox":{"vx":"0","vy":"0","vw":"14","vh":"14"},"iconPath":"M9.1987 10.1335L10.132 9.20016L7.66536 6.7335V3.66683H6.33203V7.26683L9.1987 10.1335ZM6.9987 13.6668C6.07648 13.6668 5.20981 13.4918 4.3987 13.1418C3.58759 12.7918 2.88203 12.3168 2.28203 11.7168C1.68203 11.1168 1.20703 10.4113 0.857031 9.60016C0.507031 8.78905 0.332031 7.92239 0.332031 7.00016C0.332031 6.07794 0.507031 5.21127 0.857031 4.40016C1.20703 3.58905 1.68203 2.8835 2.28203 2.2835C2.88203 1.6835 3.58759 1.2085 4.3987 0.858496C5.20981 0.508496 6.07648 0.333496 6.9987 0.333496C7.92092 0.333496 8.78759 0.508496 9.5987 0.858496C10.4098 1.2085 11.1154 1.6835 11.7154 2.2835C12.3154 2.8835 12.7904 3.58905 13.1404 4.40016C13.4904 5.21127 13.6654 6.07794 13.6654 7.00016C13.6654 7.92239 13.4904 8.78905 13.1404 9.60016C12.7904 10.4113 12.3154 11.1168 11.7154 11.7168C11.1154 12.3168 10.4098 12.7918 9.5987 13.1418C8.78759 13.4918 7.92092 13.6668 6.9987 13.6668ZM6.9987 12.3335C8.47648 12.3335 9.73481 11.8141 10.7737 10.7752C11.8126 9.73627 12.332 8.47794 12.332 7.00016C12.332 5.52239 11.8126 4.26405 10.7737 3.22516C9.73481 2.18627 8.47648 1.66683 6.9987 1.66683C5.52092 1.66683 4.26259 2.18627 3.2237 3.22516C2.18481 4.26405 1.66536 5.52239 1.66536 7.00016C1.66536 8.47794 2.18481 9.73627 3.2237 10.7752C4.26259 11.8141 5.52092 12.3335 6.9987 12.3335Z","iconColor":"#6a6a6a"} -->
<div class="cozy-block-icon-picker default" id="cozyBlock_8e421c3d_70b7_461d_aedd_a1abc20ab547"><svg width="12" height="12" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="#6a6a6a"><path d="M9.1987 10.1335L10.132 9.20016L7.66536 6.7335V3.66683H6.33203V7.26683L9.1987 10.1335ZM6.9987 13.6668C6.07648 13.6668 5.20981 13.4918 4.3987 13.1418C3.58759 12.7918 2.88203 12.3168 2.28203 11.7168C1.68203 11.1168 1.20703 10.4113 0.857031 9.60016C0.507031 8.78905 0.332031 7.92239 0.332031 7.00016C0.332031 6.07794 0.507031 5.21127 0.857031 4.40016C1.20703 3.58905 1.68203 2.8835 2.28203 2.2835C2.88203 1.6835 3.58759 1.2085 4.3987 0.858496C5.20981 0.508496 6.07648 0.333496 6.9987 0.333496C7.92092 0.333496 8.78759 0.508496 9.5987 0.858496C10.4098 1.2085 11.1154 1.6835 11.7154 2.2835C12.3154 2.8835 12.7904 3.58905 13.1404 4.40016C13.4904 5.21127 13.6654 6.07794 13.6654 7.00016C13.6654 7.92239 13.4904 8.78905 13.1404 9.60016C12.7904 10.4113 12.3154 11.1168 11.7154 11.7168C11.1154 12.3168 10.4098 12.7918 9.5987 13.1418C8.78759 13.4918 7.92092 13.6668 6.9987 13.6668ZM6.9987 12.3335C8.47648 12.3335 9.73481 11.8141 10.7737 10.7752C11.8126 9.73627 12.332 8.47794 12.332 7.00016C12.332 5.52239 11.8126 4.26405 10.7737 3.22516C9.73481 2.18627 8.47648 1.66683 6.9987 1.66683C5.52092 1.66683 4.26259 2.18627 3.2237 3.22516C2.18481 4.26405 1.66536 5.52239 1.66536 7.00016C1.66536 8.47794 2.18481 9.73627 3.2237 10.7752C4.26259 11.8141 5.52092 12.3335 6.9987 12.3335Z"></path></svg></div>
<!-- /wp:cozy-block/icon-picker --></div>
<!-- /wp:group -->

<!-- wp:post-date {"fontSize":"xx-small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:cozy-block/post-carousel --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"40%","cozyAnimation":{"type":"fade-up","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:cover {"url":"<?php echo esc_url( $images[0] ); ?>","id":1540,"dimRatio":50,"customOverlayColor":"#414775","className":"has-custom-content-position is-position-bottom-left has-text-color has-link-color"} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left has-text-color has-link-color"><span aria-hidden="true" class="wp-block-cover__background has-background-dim" style="background-color:#414775"></span><img class="wp-block-cover__image-background wp-image-1540" alt="" src="<?php echo esc_url( $images[0] ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:buttons {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"uppercase","fontSize":"14px"},"spacing":{"blockGap":"10px"}},"cozyCustomFont":"Montserrat"} -->
<div class="wp-block-buttons has-custom-font-size" style="font-size:14px;font-style:normal;font-weight:500;text-transform:uppercase"><!-- wp:button {"style":{"spacing":{"padding":{"left":"6px","right":"6px","top":"4px","bottom":"4px"}},"border":{"radius":"0px"},"color":{"background":"#f72585"}},"cozyHoverStyles":{"bgColor":"#ff9900","color":"#fffffe","borderColor":""}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background wp-element-button" style="border-radius:0px;background-color:#f72585;padding-top:4px;padding-right:6px;padding-bottom:4px;padding-left:6px"><?php esc_html_e( 'Fitness', 'cozy-addons' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"style":{"spacing":{"padding":{"left":"8px","right":"8px","top":"4px","bottom":"4px"}},"border":{"radius":"0px"},"color":{"background":"#0142de"}},"cozyHoverStyles":{"bgColor":"#ff9900","color":"#fffffe","borderColor":""}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background wp-element-button" style="border-radius:0px;background-color:#0142de;padding-top:4px;padding-right:8px;padding-bottom:4px;padding-left:8px"><?php esc_html_e( 'Technology', 'cozy-addons' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"#fffffe"},":hover":{"color":{"text":"#ff9900"}}}},"color":{"text":"#fffffe"},"typography":{"fontSize":"25px","textDecoration":"underline","fontStyle":"normal","fontWeight":"600"}}} -->
<h3 class="wp-block-heading has-text-color has-link-color" style="color:#fffffe;font-size:25px;font-style:normal;font-weight:600;text-decoration:underline"><a href="#"><?php esc_html_e( 'Ultimate Source for Magazine', 'cozy-addons' ); ?><br><?php esc_html_e( 'and Blog Brilliance!', 'cozy-addons' ); ?></a></h3>
<!-- /wp:heading -->

<!-- wp:group {"style":{"color":{"text":"#ebebeb"},"elements":{"link":{"color":{"text":"#ebebeb"}}},"spacing":{"blockGap":"16px"}},"layout":{"type":"flex","flexWrap":"nowrap"},"cozyCustomFont":"Montserrat"} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#ebebeb"><!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:cozy-block/icon-picker {"blockClientId":"f77b4ab5-15ab-444c-b7f7-28e03bf430ce","layout":"outline","iconSize":12,"strokeWidth":3,"iconViewBox":{"vx":"0","vy":"0","vw":"25","vh":"25"},"iconPath":"M12.5 14.0625C16.3818 14.0625 19.5312 10.9131 19.5312 7.03125C19.5312 3.14941 16.3818 0 12.5 0C8.61816 0 5.46875 3.14941 5.46875 7.03125C5.46875 10.9131 8.61816 14.0625 12.5 14.0625ZM18.75 15.625H16.0596C14.9756 16.123 13.7695 16.4062 12.5 16.4062C11.2305 16.4062 10.0293 16.123 8.94043 15.625H6.25C2.79785 15.625 0 18.4229 0 21.875V22.6562C0 23.9502 1.0498 25 2.34375 25H22.6562C23.9502 25 25 23.9502 25 22.6562V21.875C25 18.4229 22.2021 15.625 18.75 15.625Z","iconColor":"#ebebeb"} -->
<div class="cozy-block-icon-picker default" id="cozyBlock_f77b4ab5_15ab_444c_b7f7_28e03bf430ce"><svg width="17" height="17" viewBox="-1.5 -1.5 28 28" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="none" stroke="#ebebeb" stroke-opacity="1" stroke-width="3"><path d="M12.5 14.0625C16.3818 14.0625 19.5312 10.9131 19.5312 7.03125C19.5312 3.14941 16.3818 0 12.5 0C8.61816 0 5.46875 3.14941 5.46875 7.03125C5.46875 10.9131 8.61816 14.0625 12.5 14.0625ZM18.75 15.625H16.0596C14.9756 16.123 13.7695 16.4062 12.5 16.4062C11.2305 16.4062 10.0293 16.123 8.94043 15.625H6.25C2.79785 15.625 0 18.4229 0 21.875V22.6562C0 23.9502 1.0498 25 2.34375 25H22.6562C23.9502 25 25 23.9502 25 22.6562V21.875C25 18.4229 22.2021 15.625 18.75 15.625Z"></path></svg></div>
<!-- /wp:cozy-block/icon-picker -->

<!-- wp:paragraph {"fontSize":"xx-small"} -->
<p class="has-xx-small-font-size"><?php esc_html_e( 'CozyThemes', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:cozy-block/icon-picker {"blockClientId":"f0e6339b-a19f-477c-8b75-145468c1e3ae","iconSize":14,"iconViewBox":{"vx":"0","vy":"0","vw":"14","vh":"14"},"iconPath":"M9.1987 10.1335L10.132 9.20016L7.66536 6.7335V3.66683H6.33203V7.26683L9.1987 10.1335ZM6.9987 13.6668C6.07648 13.6668 5.20981 13.4918 4.3987 13.1418C3.58759 12.7918 2.88203 12.3168 2.28203 11.7168C1.68203 11.1168 1.20703 10.4113 0.857031 9.60016C0.507031 8.78905 0.332031 7.92239 0.332031 7.00016C0.332031 6.07794 0.507031 5.21127 0.857031 4.40016C1.20703 3.58905 1.68203 2.8835 2.28203 2.2835C2.88203 1.6835 3.58759 1.2085 4.3987 0.858496C5.20981 0.508496 6.07648 0.333496 6.9987 0.333496C7.92092 0.333496 8.78759 0.508496 9.5987 0.858496C10.4098 1.2085 11.1154 1.6835 11.7154 2.2835C12.3154 2.8835 12.7904 3.58905 13.1404 4.40016C13.4904 5.21127 13.6654 6.07794 13.6654 7.00016C13.6654 7.92239 13.4904 8.78905 13.1404 9.60016C12.7904 10.4113 12.3154 11.1168 11.7154 11.7168C11.1154 12.3168 10.4098 12.7918 9.5987 13.1418C8.78759 13.4918 7.92092 13.6668 6.9987 13.6668ZM6.9987 12.3335C8.47648 12.3335 9.73481 11.8141 10.7737 10.7752C11.8126 9.73627 12.332 8.47794 12.332 7.00016C12.332 5.52239 11.8126 4.26405 10.7737 3.22516C9.73481 2.18627 8.47648 1.66683 6.9987 1.66683C5.52092 1.66683 4.26259 2.18627 3.2237 3.22516C2.18481 4.26405 1.66536 5.52239 1.66536 7.00016C1.66536 8.47794 2.18481 9.73627 3.2237 10.7752C4.26259 11.8141 5.52092 12.3335 6.9987 12.3335Z","iconColor":"#ebebeb"} -->
<div class="cozy-block-icon-picker default" id="cozyBlock_f0e6339b_a19f_477c_8b75_145468c1e3ae"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="#ebebeb"><path d="M9.1987 10.1335L10.132 9.20016L7.66536 6.7335V3.66683H6.33203V7.26683L9.1987 10.1335ZM6.9987 13.6668C6.07648 13.6668 5.20981 13.4918 4.3987 13.1418C3.58759 12.7918 2.88203 12.3168 2.28203 11.7168C1.68203 11.1168 1.20703 10.4113 0.857031 9.60016C0.507031 8.78905 0.332031 7.92239 0.332031 7.00016C0.332031 6.07794 0.507031 5.21127 0.857031 4.40016C1.20703 3.58905 1.68203 2.8835 2.28203 2.2835C2.88203 1.6835 3.58759 1.2085 4.3987 0.858496C5.20981 0.508496 6.07648 0.333496 6.9987 0.333496C7.92092 0.333496 8.78759 0.508496 9.5987 0.858496C10.4098 1.2085 11.1154 1.6835 11.7154 2.2835C12.3154 2.8835 12.7904 3.58905 13.1404 4.40016C13.4904 5.21127 13.6654 6.07794 13.6654 7.00016C13.6654 7.92239 13.4904 8.78905 13.1404 9.60016C12.7904 10.4113 12.3154 11.1168 11.7154 11.7168C11.1154 12.3168 10.4098 12.7918 9.5987 13.1418C8.78759 13.4918 7.92092 13.6668 6.9987 13.6668ZM6.9987 12.3335C8.47648 12.3335 9.73481 11.8141 10.7737 10.7752C11.8126 9.73627 12.332 8.47794 12.332 7.00016C12.332 5.52239 11.8126 4.26405 10.7737 3.22516C9.73481 2.18627 8.47648 1.66683 6.9987 1.66683C5.52092 1.66683 4.26259 2.18627 3.2237 3.22516C2.18481 4.26405 1.66536 5.52239 1.66536 7.00016C1.66536 8.47794 2.18481 9.73627 3.2237 10.7752C4.26259 11.8141 5.52092 12.3335 6.9987 12.3335Z"></path></svg></div>
<!-- /wp:cozy-block/icon-picker --></div>
<!-- /wp:group -->

<!-- wp:cozy-block/date-time {"blockClientId":"1b051bdc-a492-48e5-b150-8af93e0fbfe7","layout":{"padding":{"top":0,"right":0,"bottom":0,"left":0},"borderRadius":{"topL":0,"topR":0,"bottomL":0,"bottomR":0},"textAlign":"center","display":"flex","gap":10,"marginBottom":10,"styles":{"fontFamily":"default","fontSize":12,"fontWeight":"400"}},"week":{"enabled":false},"time":{"enabled":false,"timeFormat":true,"padding":{"top":0,"right":0,"bottom":0,"left":0},"borderRadius":{"topL":0,"topR":0,"bottomL":0,"bottomR":0},"styles":{"fontSize":"","fontWeight":"","color":"","bgColor":""}}} -->
<div class="cozy-block-date-time flex" id="cozyBlock_1b051bdc_a492_48e5_b150_8af93e0fbfe7"><div class="cozy-date"></div></div>
<!-- /wp:cozy-block/date-time --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"cozy-post-sixteen__popular-post","cozyAnimation":{"type":"fade-left","easingFunction":"ease-in","anchorPlacement":"top-bottom","duration":600}} -->
<div class="wp-block-column cozy-post-sixteen__popular-post"><!-- wp:cozy-block/post-carousel {"blockClientId":"f9729d19-d897-4e19-9333-aeab08ea6772","layout":"grid","gridOptions":{"displayColumn":"1","masonryEnabled":false,"columnGap":25}} -->
<div class="cozy-block-post-grid-wrapper  hover-show" id="cozyBlock_f9729d19_d897_4e19_9333_aeab08ea6772"><!-- wp:query {"queryId":1,"query":{"perPage":"3","postType":"post"},"lock":{"move":false,"remove":true},"className":"cozy-query swiper-container"} -->
<div class="wp-block-query cozy-query swiper-container"><!-- wp:post-template {"lock":{"move":false,"remove":false},"className":"cozy-layout-grid swiper-wrapper"} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"16px","padding":{"bottom":"20px"}},"border":{"bottom":{"color":"#1010101a","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top","justifyContent":"left"}} -->
<div class="wp-block-group" style="border-bottom-color:#1010101a;border-bottom-width:1px;padding-bottom:20px"><!-- wp:post-featured-image {"aspectRatio":"1","width":"130px","height":"130px","style":{"border":{"radius":"0px"}}} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"constrained","contentSize":"270px","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"#fffffe"}}},"color":{"text":"#fffffe"},"typography":{"fontSize":"12px","fontStyle":"normal","fontWeight":"500","textTransform":"uppercase"}}} /-->

<!-- wp:post-title {"isLink":true,"linkTarget":"_blank","style":{"color":{"text":"#090b10"},"elements":{"link":{"color":{"text":"#090b10"}}},"typography":{"textTransform":"capitalize","fontSize":"16px","fontStyle":"italic","fontWeight":"600"}}} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"6px"},"color":{"text":"#6a6a6a"},"elements":{"link":{"color":{"text":"#6a6a6a"}}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#6a6a6a"><!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:cozy-block/icon-picker {"blockClientId":"8f13c02c-d5f5-46d6-a8de-ec62e0c12470","iconSize":12,"iconViewBox":{"vx":"0","vy":"0","vw":"14","vh":"14"},"iconPath":"M9.1987 10.1335L10.132 9.20016L7.66536 6.7335V3.66683H6.33203V7.26683L9.1987 10.1335ZM6.9987 13.6668C6.07648 13.6668 5.20981 13.4918 4.3987 13.1418C3.58759 12.7918 2.88203 12.3168 2.28203 11.7168C1.68203 11.1168 1.20703 10.4113 0.857031 9.60016C0.507031 8.78905 0.332031 7.92239 0.332031 7.00016C0.332031 6.07794 0.507031 5.21127 0.857031 4.40016C1.20703 3.58905 1.68203 2.8835 2.28203 2.2835C2.88203 1.6835 3.58759 1.2085 4.3987 0.858496C5.20981 0.508496 6.07648 0.333496 6.9987 0.333496C7.92092 0.333496 8.78759 0.508496 9.5987 0.858496C10.4098 1.2085 11.1154 1.6835 11.7154 2.2835C12.3154 2.8835 12.7904 3.58905 13.1404 4.40016C13.4904 5.21127 13.6654 6.07794 13.6654 7.00016C13.6654 7.92239 13.4904 8.78905 13.1404 9.60016C12.7904 10.4113 12.3154 11.1168 11.7154 11.7168C11.1154 12.3168 10.4098 12.7918 9.5987 13.1418C8.78759 13.4918 7.92092 13.6668 6.9987 13.6668ZM6.9987 12.3335C8.47648 12.3335 9.73481 11.8141 10.7737 10.7752C11.8126 9.73627 12.332 8.47794 12.332 7.00016C12.332 5.52239 11.8126 4.26405 10.7737 3.22516C9.73481 2.18627 8.47648 1.66683 6.9987 1.66683C5.52092 1.66683 4.26259 2.18627 3.2237 3.22516C2.18481 4.26405 1.66536 5.52239 1.66536 7.00016C1.66536 8.47794 2.18481 9.73627 3.2237 10.7752C4.26259 11.8141 5.52092 12.3335 6.9987 12.3335Z","iconColor":"#6a6a6a"} -->
<div class="cozy-block-icon-picker default" id="cozyBlock_8f13c02c_d5f5_46d6_a8de_ec62e0c12470"><svg width="12" height="12" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="#6a6a6a"><path d="M9.1987 10.1335L10.132 9.20016L7.66536 6.7335V3.66683H6.33203V7.26683L9.1987 10.1335ZM6.9987 13.6668C6.07648 13.6668 5.20981 13.4918 4.3987 13.1418C3.58759 12.7918 2.88203 12.3168 2.28203 11.7168C1.68203 11.1168 1.20703 10.4113 0.857031 9.60016C0.507031 8.78905 0.332031 7.92239 0.332031 7.00016C0.332031 6.07794 0.507031 5.21127 0.857031 4.40016C1.20703 3.58905 1.68203 2.8835 2.28203 2.2835C2.88203 1.6835 3.58759 1.2085 4.3987 0.858496C5.20981 0.508496 6.07648 0.333496 6.9987 0.333496C7.92092 0.333496 8.78759 0.508496 9.5987 0.858496C10.4098 1.2085 11.1154 1.6835 11.7154 2.2835C12.3154 2.8835 12.7904 3.58905 13.1404 4.40016C13.4904 5.21127 13.6654 6.07794 13.6654 7.00016C13.6654 7.92239 13.4904 8.78905 13.1404 9.60016C12.7904 10.4113 12.3154 11.1168 11.7154 11.7168C11.1154 12.3168 10.4098 12.7918 9.5987 13.1418C8.78759 13.4918 7.92092 13.6668 6.9987 13.6668ZM6.9987 12.3335C8.47648 12.3335 9.73481 11.8141 10.7737 10.7752C11.8126 9.73627 12.332 8.47794 12.332 7.00016C12.332 5.52239 11.8126 4.26405 10.7737 3.22516C9.73481 2.18627 8.47648 1.66683 6.9987 1.66683C5.52092 1.66683 4.26259 2.18627 3.2237 3.22516C2.18481 4.26405 1.66536 5.52239 1.66536 7.00016C1.66536 8.47794 2.18481 9.73627 3.2237 10.7752C4.26259 11.8141 5.52092 12.3335 6.9987 12.3335Z"></path></svg></div>
<!-- /wp:cozy-block/icon-picker --></div>
<!-- /wp:group -->

<!-- wp:post-date {"fontSize":"xx-small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:cozy-block/post-carousel --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->