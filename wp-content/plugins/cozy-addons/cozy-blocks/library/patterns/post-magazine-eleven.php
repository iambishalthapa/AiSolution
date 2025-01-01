<?php
/**
 * Title: Post Magazine section eleven with grid
 * Description: This is post magazine section with and grid
 * Slug: cozy-block-patterns/post-magazine-eleven
 * Categories: cozy-block-patterns, posts-and-magazine
 * Dynamic: true
 */

?>

<!-- wp:group {"metadata":{"name":"<?php esc_html_e( 'Posts and Magazine', 'cozy-addons' ); ?>"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":"0"},"color":{"background":"#fffffe"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#fffffe;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"16px","left":"16px","top":"80px","bottom":"80px"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:16px;padding-bottom:80px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"36px"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"410px"}} -->
<div class="wp-block-group" style="margin-bottom:36px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"border":{"left":{"color":"#f2024a","width":"4px"}},"spacing":{"padding":{"left":"var:preset|spacing|20"}},"typography":{"fontSize":"16px"}},"layout":{"type":"constrained","contentSize":"","justifyContent":"center"}} -->
<div class="wp-block-group" style="border-left-color:#f2024a;border-left-width:4px;padding-left:var(--wp--preset--spacing--20);font-size:16px"><!-- wp:paragraph {"style":{"color":{"text":"#f2024a"},"elements":{"link":{"color":{"text":"#f2024a"}}},"typography":{"textTransform":"uppercase"}},"fontSize":"xx-small"} -->
<p class="has-text-color has-link-color has-xx-small-font-size" style="color:#f2024a;text-transform:uppercase"><?php esc_html_e( 'Blog', 'cozy-addons' ); ?> &amp; <?php esc_html_e( 'Article', 'cozy-addons' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"42px","lineHeight":"1.3","fontStyle":"normal","fontWeight":"600"},"color":{"text":"#070e28"},"elements":{"link":{"color":{"text":"#070e28"}}}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#070e28;font-size:42px;font-style:normal;font-weight:600;line-height:1.3"><?php esc_html_e( 'Our Latest Blogs', 'cozy-addons' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:cozy-block/post-carousel {"blockClientId":"21dc3c4c-4d26-4dba-9796-c67af4322dc0","layout":"grid","gridOptions":{"displayColumn":"3","masonryEnabled":false,"columnGap":30}} -->
<div class="cozy-block-post-grid-wrapper  hover-show" id="cozyBlock_21dc3c4c_4d26_4dba_9796_c67af4322dc0"><!-- wp:query {"queryId":1,"query":{"perPage":"3","postType":"post"},"lock":{"move":false,"remove":true},"className":"cozy-query swiper-container"} -->
<div class="wp-block-query cozy-query swiper-container"><!-- wp:post-template {"lock":{"move":false,"remove":true},"className":"cozy-layout-grid swiper-wrapper"} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"0"},"typography":{"fontSize":"14px"}},"layout":{"type":"constrained","justifyContent":"left"},"cozyCustomFont":"Poppins"} -->
<div class="wp-block-group" style="font-size:14px"><!-- wp:post-featured-image {"isLink":true,"height":"250px","style":{"border":{"radius":"10px"}}} /-->

<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"#f2024a"}}},"color":{"text":"#f2024a"},"typography":{"fontSize":"16px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"8px"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":"16px"}},"layout":{"type":"flex","flexWrap":"nowrap"},"cozyCustomFont":"Alumni Sans"} -->
<div class="wp-block-group has-text-color has-link-color" style="color:#f2024a;margin-top:8px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-size:16px;font-style:normal;font-weight:600;text-transform:capitalize"><!-- wp:group {"style":{"spacing":{"blockGap":"6px","padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cozy-block/icon-picker {"blockClientId":"11ec363d-e4b5-48a6-b805-d2dfc1bed02f","iconSize":12,"iconViewBox":{"vx":"0","vy":"0","vw":"25","vh":"25"},"iconPath":"M12.5 14.0625C16.3818 14.0625 19.5312 10.9131 19.5312 7.03125C19.5312 3.14941 16.3818 0 12.5 0C8.61816 0 5.46875 3.14941 5.46875 7.03125C5.46875 10.9131 8.61816 14.0625 12.5 14.0625ZM18.75 15.625H16.0596C14.9756 16.123 13.7695 16.4062 12.5 16.4062C11.2305 16.4062 10.0293 16.123 8.94043 15.625H6.25C2.79785 15.625 0 18.4229 0 21.875V22.6562C0 23.9502 1.0498 25 2.34375 25H22.6562C23.9502 25 25 23.9502 25 22.6562V21.875C25 18.4229 22.2021 15.625 18.75 15.625Z","iconColor":"#f2024a"} -->
<div class="cozy-block-icon-picker default" id="cozyBlock_11ec363d_e4b5_48a6_b805_d2dfc1bed02f"><svg width="12" height="12" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="#f2024a"><path d="M12.5 14.0625C16.3818 14.0625 19.5312 10.9131 19.5312 7.03125C19.5312 3.14941 16.3818 0 12.5 0C8.61816 0 5.46875 3.14941 5.46875 7.03125C5.46875 10.9131 8.61816 14.0625 12.5 14.0625ZM18.75 15.625H16.0596C14.9756 16.123 13.7695 16.4062 12.5 16.4062C11.2305 16.4062 10.0293 16.123 8.94043 15.625H6.25C2.79785 15.625 0 18.4229 0 21.875V22.6562C0 23.9502 1.0498 25 2.34375 25H22.6562C23.9502 25 25 23.9502 25 22.6562V21.875C25 18.4229 22.2021 15.625 18.75 15.625Z"></path></svg></div>
<!-- /wp:cozy-block/icon-picker -->

<!-- wp:post-author-name {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"6px","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cozy-block/icon-picker {"blockClientId":"cc3512b7-0aa9-4867-8f62-3ae76e25b03c","iconSize":12,"iconViewBox":{"vx":"0","vy":"0","vw":"25","vh":"25"},"iconPath":"M12.1094 0C5.41992 0 0 5.41992 0 12.1094C0 18.7988 5.41992 24.2188 12.1094 24.2188C18.7988 24.2188 24.2188 18.7988 24.2188 12.1094C24.2188 5.41992 18.7988 0 12.1094 0ZM14.8975 17.0947L10.5908 13.9648C10.4395 13.8525 10.3516 13.6768 10.3516 13.4912V5.27344C10.3516 4.95117 10.6152 4.6875 10.9375 4.6875H13.2812C13.6035 4.6875 13.8672 4.95117 13.8672 5.27344V11.9971L16.9678 14.2529C17.2314 14.4434 17.2852 14.8096 17.0947 15.0732L15.7178 16.9678C15.5273 17.2266 15.1611 17.2852 14.8975 17.0947Z","iconColor":"#f2024a"} -->
<div class="cozy-block-icon-picker default" id="cozyBlock_cc3512b7_0aa9_4867_8f62_3ae76e25b03c"><svg width="12" height="12" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="#f2024a"><path d="M12.1094 0C5.41992 0 0 5.41992 0 12.1094C0 18.7988 5.41992 24.2188 12.1094 24.2188C18.7988 24.2188 24.2188 18.7988 24.2188 12.1094C24.2188 5.41992 18.7988 0 12.1094 0ZM14.8975 17.0947L10.5908 13.9648C10.4395 13.8525 10.3516 13.6768 10.3516 13.4912V5.27344C10.3516 4.95117 10.6152 4.6875 10.9375 4.6875H13.2812C13.6035 4.6875 13.8672 4.95117 13.8672 5.27344V11.9971L16.9678 14.2529C17.2314 14.4434 17.2852 14.8096 17.0947 15.0732L15.7178 16.9678C15.5273 17.2266 15.1611 17.2852 14.8975 17.0947Z"></path></svg></div>
<!-- /wp:cozy-block/icon-picker -->

<!-- wp:post-date /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:post-title {"isLink":true,"linkTarget":"_blank","style":{"color":{"text":"#070e28"},"elements":{"link":{"color":{"text":"#070e28"}}},"typography":{"textTransform":"capitalize","fontSize":"20px"},"spacing":{"margin":{"top":"6px","bottom":"4px"}}}} /-->

<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":15,"style":{"typography":{"textTransform":"none","fontStyle":"normal","fontWeight":"400"},"elements":{"link":{"color":{"text":"#070e28"},":hover":{"color":{"text":"#ff9900"}}}},"color":{"text":"#6a6a6a"}},"fontSize":"x-small"} /-->

<!-- wp:buttons {"style":{"typography":{"textDecoration":"none","fontSize":"16px"},"spacing":{"margin":{"top":"26px"}}}} -->
<div class="wp-block-buttons has-custom-font-size" style="margin-top:26px;font-size:16px;text-decoration:none"><!-- wp:button {"style":{"border":{"radius":"100px"},"color":{"background":"#f2024a","text":"#fffffe"},"elements":{"link":{"color":{"text":"#fffffe"}}},"spacing":{"padding":{"left":"36px","right":"36px","top":"14px","bottom":"14px"}}},"cozyHoverEffect":{"boxShadow":{"enabled":true,"color":"#cab8be","horizontal":0,"vertical":6,"blur":40,"spread":0,"position":""},"boxShadowHover":{"enabled":false,"color":"#000","horizontal":0,"vertical":0,"blur":10,"spread":0,"position":""},"transformEnabled":false,"transform":{"translateX":0,"translateY":0,"rotate":0,"scale":1}},"cozyHoverStyles":{"bgColor":"#ff9900","color":"#fffffe","borderColor":""}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background has-link-color wp-element-button" style="border-radius:100px;color:#fffffe;background-color:#f2024a;padding-top:14px;padding-right:36px;padding-bottom:14px;padding-left:36px"><?php esc_html_e( 'Learn More', 'cozy-addons' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:cozy-block/post-carousel --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->