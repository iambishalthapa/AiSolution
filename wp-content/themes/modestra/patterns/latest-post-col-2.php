<?php

/**
 * Title: Latest News and Articles column 2
 * Slug: modestra/latest-post-col-2
 * Categories: posts
 */
?>
<!-- wp:group {"metadata":{"categories":["posts"],"patternName":"modestra/latest-post-col-2","name":"Latest News and Articles"},"style":{"spacing":{"padding":{"top":"120px","bottom":"120px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"light-color","layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group has-light-color-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:120px;padding-right:var(--wp--preset--spacing--40);padding-bottom:120px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"48px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group" style="margin-top:0;margin-bottom:48px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"780px"}} -->
        <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:heading {"level":1,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"typography":{"textTransform":"none"}},"textColor":"heading-color","fontSize":"xx-large"} -->
            <h1 class="wp-block-heading has-heading-color-color has-text-color has-link-color has-xx-large-font-size" style="text-transform:none"><?php esc_html_e('Latest Articles and Resources', 'modestra') ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
            <p class="has-foreground-color has-text-color has-link-color"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"64px","bottom":"0px"}}},"fontSize":"medium","layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-buttons has-custom-font-size is-style-buttons-hover-translate-effect has-medium-font-size" style="margin-top:64px;margin-bottom:0px;font-style:normal;font-weight:500"><!-- wp:button {"gradient":"gradient-primary-secondary","className":"is-style-button-gradient-background-style","style":{"spacing":{"padding":{"left":"32px","right":"32px","top":"20px","bottom":"20px"}},"border":{"radius":"80px"}}} -->
            <div class="wp-block-button is-style-button-gradient-background-style"><a class="wp-block-button__link has-gradient-primary-secondary-gradient-background has-background wp-element-button" style="border-radius:80px;padding-top:20px;padding-right:32px;padding-bottom:20px;padding-left:32px"><?php esc_html_e('Explore All Articles', 'modestra') ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->

    <!-- wp:query {"queryId":22,"query":{"perPage":"2","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
    <div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"48px"}},"layout":{"type":"grid","columnCount":"2"}} -->
        <!-- wp:group {"className":"is-style-default modestra-hover-box","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
        <div class="wp-block-group is-style-default modestra-hover-box has-light-color-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"isUserOverlayColor":true,"minHeight":460,"gradient":"gradient-primary-secondary","contentPosition":"bottom left","isDark":false,"style":{"spacing":{"margin":{"bottom":"0px"},"padding":{"top":"18px","bottom":"18px","left":"28px","right":"28px"}},"border":{"radius":"30px"},"color":{"duotone":"var:preset|duotone|white-primary"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light has-custom-content-position is-position-bottom-left" style="border-radius:30px;margin-bottom:0px;padding-top:18px;padding-right:28px;padding-bottom:18px;padding-left:28px;min-height:460px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim has-background-gradient has-gradient-primary-secondary-gradient-background"></span>
                <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                    <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:post-terms {"term":"category","className":"is-style-categories-background-with-round","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"x-small"} /--></div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"},"margin":{"top":"32px","bottom":"0"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="margin-top:32px;margin-bottom:0;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.4","fontSize":"32px"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"margin":{"top":"0px"}}}} /-->

                <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group"><!-- wp:post-date /-->

                    <!-- wp:paragraph -->
                    <p>//</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:post-author-name {"style":{"typography":{"textTransform":"capitalize"}}} /-->
                </div>
                <!-- /wp:group -->

                <!-- wp:post-excerpt {"moreText":"","excerptLength":21,"style":{"elements":{"link":{"color":{"text":"var:preset|color|dark-shade"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}}} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->