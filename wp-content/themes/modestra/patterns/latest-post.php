<?php

/**
 * Title: Latest News and Articles
 * Slug: modestra/latest-post
 * Categories: posts
 */
?>
<!-- wp:group {"metadata":{"categories":["posts"],"patternName":"modestra/latest-post","name":"Latest News and Articles"},"style":{"spacing":{"padding":{"top":"7rem","bottom":"7rem","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"light-shade","layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group has-light-shade-background-color has-background" style="padding-top:7rem;padding-right:var(--wp--preset--spacing--40);padding-bottom:7rem;padding-left:var(--wp--preset--spacing--40)"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"xx-large"} -->
    <h1 class="wp-block-heading has-text-align-center has-xx-large-font-size" style="font-style:normal;font-weight:600"><?php esc_html_e('Latest News &amp; Articles', 'modestra') ?></h1>
    <!-- /wp:heading -->

    <!-- wp:query {"queryId":22,"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"className":""} -->
    <div class="wp-block-query modestra-slide-up"><!-- wp:post-template {"style":{"spacing":{"blockGap":"28px"}},"layout":{"type":"grid","columnCount":3}} -->
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
        <div class="wp-block-group has-light-color-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"customOverlayColor":"#2b342e","isUserOverlayColor":true,"minHeight":280,"contentPosition":"bottom left","isDark":false,"style":{"border":{"radius":{"topLeft":"0px","topRight":"0px","bottomLeft":"0px","bottomRight":"0px"}},"spacing":{"margin":{"bottom":"0px"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light has-custom-content-position is-position-bottom-left" style="border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;margin-bottom:0px;min-height:280px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#2b342e"></span>
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"24px","bottom":"24px","left":"24px","right":"24px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:post-terms {"term":"category","className":"is-style-categories-background-with-round","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}}} /--></div>
                <!-- /wp:group -->

                <!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"700","lineHeight":"1.4"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"margin":{"top":"0px"}}},"fontSize":"medium"} /-->

                <!-- wp:post-excerpt {"moreText":"Read More","excerptLength":21,"style":{"elements":{"link":{"color":{"text":"var:preset|color|dark-shade"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}}} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->