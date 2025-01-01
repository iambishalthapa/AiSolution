<?php

/**
 * Title: Latest News and Articles 2
 * Slug: modestra/latest-post-2
 * Categories: posts
 */
?>
<!-- wp:group {"metadata":{"categories":["posts"],"patternName":"modestra/latest-post-2","name":"Latest News and Articles"},"style":{"spacing":{"padding":{"top":"7rem","bottom":"7rem","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"light-color","layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group has-light-color-background-color has-background" style="padding-top:7rem;padding-right:var(--wp--preset--spacing--40);padding-bottom:7rem;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40","margin":{"bottom":"44px"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"780px"}} -->
    <div class="wp-block-group" style="margin-bottom:44px"><!-- wp:heading {"textAlign":"left","level":1,"fontSize":"xx-large"} -->
        <h1 class="wp-block-heading has-text-align-left has-xx-large-font-size"><?php esc_html_e('Latest News &amp; Articles', 'modestra') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:query {"queryId":22,"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"className":""} -->
    <div class="wp-block-query modestra-slide-up"><!-- wp:post-template {"style":{"spacing":{"blockGap":"28px"}},"layout":{"type":"grid","columnCount":3}} -->
        <!-- wp:group {"style":{"border":{"width":"1px","color":"#E3E2F0","radius":"0px"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group has-border-color" style="border-color:#E3E2F0;border-width:1px;border-radius:0px"><!-- wp:cover {"overlayColor":"light-color","isUserOverlayColor":true,"minHeight":200,"contentPosition":"top left","isDark":false,"style":{"spacing":{"padding":{"right":"24px","left":"24px","top":"24px","bottom":"24px"}},"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light has-custom-content-position is-position-top-left" style="border-radius:0px;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px;min-height:200px"><span aria-hidden="true" class="wp-block-cover__background has-light-color-background-color has-background-dim-100 has-background-dim"></span>
                <div class="wp-block-cover__inner-container"><!-- wp:post-terms {"term":"category","className":"is-style-categories-background-faded-round","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"uppercase"}},"fontSize":"x-small"} /-->

                    <!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"700","lineHeight":"1.4"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"margin":{"top":"0px","bottom":"15px"}}},"fontSize":"medium"} /-->

                    <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                    <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:post-author-name /-->

                        <!-- wp:paragraph -->
                        <p>/</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:post-date /-->
                    </div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"customOverlayColor":"#2b342e","isUserOverlayColor":true,"minHeight":280,"contentPosition":"bottom left","isDark":false,"style":{"spacing":{"margin":{"bottom":"0px"}},"color":{"duotone":"var:preset|duotone|white-primary"},"border":{"radius":{"bottomLeft":"0px","bottomRight":"0px","topRight":"0px"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light has-custom-content-position is-position-bottom-left" style="border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;margin-bottom:0px;min-height:280px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#2b342e"></span>
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->