<?php

/**
 * Title: Latest News and Articles 3
 * Slug: modestra/latest-post-3
 * Categories: posts
 */
?>
<!-- wp:group {"metadata":{"categories":["posts"],"patternName":"modestra/latest-post","name":"Latest News and Articles"},"style":{"spacing":{"padding":{"top":"7rem","bottom":"7rem","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"light-color","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group has-light-color-background-color has-background" style="padding-top:7rem;padding-right:var(--wp--preset--spacing--40);padding-bottom:7rem;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40","margin":{"bottom":"84px"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"780px"}} -->
    <div class="wp-block-group" style="margin-bottom:84px"><!-- wp:heading {"textAlign":"left","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"xx-large"} -->
        <h1 class="wp-block-heading has-text-align-left has-xx-large-font-size" style="font-style:normal;font-weight:600"><?php esc_html_e('Latest News &amp; Articles', 'modestra') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:query {"queryId":22,"query":{"perPage":"4","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"className":""} -->
    <div class="wp-block-query modestra-slide-up"><!-- wp:post-template {"style":{"spacing":{"blockGap":"28px"}},"layout":{"type":"default","columnCount":"1"}} -->
        <!-- wp:group {"style":{"border":{"top":{"style":"none","width":"0px"},"right":{"style":"none","width":"0px"},"bottom":{"width":"1px","color":"var:preset|color|border-color"},"left":{"style":"none","width":"0px"}},"spacing":{"padding":{"bottom":"28px"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
        <div class="wp-block-group" style="border-top-style:none;border-top-width:0px;border-right-style:none;border-right-width:0px;border-bottom-color:var(--wp--preset--color--border-color);border-bottom-width:1px;border-left-style:none;border-left-width:0px;padding-bottom:28px"><!-- wp:columns {"verticalAlignment":"top","style":{"spacing":{"blockGap":{"left":"64px"}}}} -->
            <div class="wp-block-columns are-vertically-aligned-top"><!-- wp:column {"verticalAlignment":"top","width":"30%"} -->
                <div class="wp-block-column is-vertically-aligned-top" style="flex-basis:30%"><!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"700","lineHeight":"1.4"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"margin":{"top":"0px","bottom":"15px"}}},"fontSize":"medium"} /--></div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"top","width":"200px"} -->
                <div class="wp-block-column is-vertically-aligned-top" style="flex-basis:200px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                    <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:paragraph -->
                        <p><?php esc_html_e('Posted On', 'modestra') ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:post-date /-->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"top"} -->
                <div class="wp-block-column is-vertically-aligned-top"><!-- wp:post-excerpt {"excerptLength":29} /--></div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->