<?php

/**
 * Title: About with Features List
 * Slug: modestra/about-features
 * Categories: about
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/service_image_3.jpg',
);
?>
<!-- wp:group {"metadata":{"categories":["about"],"patternName":"modestra/about-features","name":"About with Features List"},"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"100px","bottom":"120px"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:120px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"44px"},"margin":{"top":"120px"},"padding":{"bottom":"40px"}},"border":{"bottom":{"width":"0px","style":"none"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center" style="border-bottom-style:none;border-bottom-width:0px;margin-top:120px;padding-bottom:40px"><!-- wp:column {"verticalAlignment":"center","width":"60%","style":{"spacing":{"padding":{"top":"0px"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0px;flex-basis:60%"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[0]) ?>","id":4620,"dimRatio":0,"customOverlayColor":"#908884","minHeight":600,"isDark":false,"style":{"color":{"duotone":"var:preset|duotone|white-primary"},"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light" style="border-radius:0px;min-height:600px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#908884"></span><img class="wp-block-cover__image-background wp-image-4620" alt="" src="<?php echo esc_url($modestra_images[0]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"level":1,"style":{"typography":{"lineHeight":"1.3"}}} -->
            <h1 class="wp-block-heading" style="line-height:1.3"><?php esc_html_e('Crafting Digital Excellence', 'modestra') ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p><?php esc_html_e('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem architecto beatae vitae dicta sunt explicabo.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:columns {"style":{"spacing":{"margin":{"top":"60px"},"padding":{"bottom":"28px"}},"border":{"bottom":{"color":"var:preset|color|border-color","width":"1px"}}}} -->
            <div class="wp-block-columns" style="border-bottom-color:var(--wp--preset--color--border-color);border-bottom-width:1px;margin-top:60px;padding-bottom:28px"><!-- wp:column {"width":"75px"} -->
                <div class="wp-block-column" style="flex-basis:75px"><!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"large"} -->
                    <h3 class="wp-block-heading has-primary-color has-text-color has-link-color has-large-font-size"><?php esc_html_e('01.', 'modestra') ?></h3>
                    <!-- /wp:heading -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"width":""} -->
                <div class="wp-block-column"><!-- wp:paragraph -->
                    <p><?php esc_html_e('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->

            <!-- wp:columns {"style":{"spacing":{"margin":{"top":"28px"},"padding":{"bottom":"28px"}},"border":{"bottom":{"color":"var:preset|color|border-color","width":"1px"}}}} -->
            <div class="wp-block-columns" style="border-bottom-color:var(--wp--preset--color--border-color);border-bottom-width:1px;margin-top:28px;padding-bottom:28px"><!-- wp:column {"width":"75px"} -->
                <div class="wp-block-column" style="flex-basis:75px"><!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"large"} -->
                    <h3 class="wp-block-heading has-primary-color has-text-color has-link-color has-large-font-size"><?php esc_html_e('02.', 'modestra') ?></h3>
                    <!-- /wp:heading -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"width":""} -->
                <div class="wp-block-column"><!-- wp:paragraph -->
                    <p><?php esc_html_e('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->

            <!-- wp:columns {"style":{"spacing":{"margin":{"top":"28px"},"padding":{"bottom":"28px"}},"border":{"bottom":{"width":"0px","style":"none"},"top":{},"right":{},"left":{}}}} -->
            <div class="wp-block-columns" style="border-bottom-style:none;border-bottom-width:0px;margin-top:28px;padding-bottom:28px"><!-- wp:column {"width":"75px"} -->
                <div class="wp-block-column" style="flex-basis:75px"><!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"large"} -->
                    <h3 class="wp-block-heading has-primary-color has-text-color has-link-color has-large-font-size"><?php esc_html_e('03.', 'modestra') ?></h3>
                    <!-- /wp:heading -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"width":""} -->
                <div class="wp-block-column"><!-- wp:paragraph -->
                    <p><?php esc_html_e('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->