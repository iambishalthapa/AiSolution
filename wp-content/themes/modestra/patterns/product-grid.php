<?php

/**
 * Title: Product Grid
 * Slug: modestra/product-grid
 * Categories: modestra, woo-commerce
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"100px","bottom":"100px"}}},"backgroundColor":"light-shade","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group has-light-shade-background-color has-background" style="padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"780px"}} -->
    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1} -->
        <h1 class="wp-block-heading has-text-align-center"><?php esc_html_e('Featured Products', 'modestra') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"margin":{"top":"60px"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
    <div class="wp-block-group" style="margin-top:60px"><!-- wp:query {"queryId":3,"query":{"perPage":"4","pages":0,"offset":0,"postType":"product","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]},"className":"modestra-product-box"} -->
        <div class="wp-block-query modestra-product-box"><!-- wp:post-template {"layout":{"type":"grid","columnCount":"4"}} -->
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-light-color-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:woocommerce/product-image {"isDescendentOfQueryLoop":true,"height":"360px"} /--></div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"padding":{"right":"24px","left":"24px","top":"24px","bottom":"24px"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:post-terms {"term":"product_cat","textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|meta-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"uppercase"}},"fontSize":"x-small"} /-->

                    <!-- wp:post-title {"textAlign":"center","level":4,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"margin":{"bottom":"10px"}}},"fontSize":"medium"} /-->

                    <!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center"} /-->

                    <!-- wp:woocommerce/product-button {"isDescendentOfQueryLoop":true,"className":"is-style-outline","backgroundColor":"transparent","textColor":"heading-color","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"border":{"radius":"0px"},"spacing":{"margin":{"top":"16px"}}}} /-->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
            <!-- /wp:post-template -->

            <!-- wp:query-no-results -->
            <!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
            <p></p>
            <!-- /wp:paragraph -->
            <!-- /wp:query-no-results -->
        </div>
        <!-- /wp:query -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->