<?php

/**
 * Title: Header with Topbar
 * Slug: modestra/header-with-topbar
 * Categories:header
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/icon_map.png',
    $modestra_url . 'assets/images/icon_call.png',
    $modestra_url . 'assets/images/icon_message.png',
);
?>
<!-- wp:group {"metadata":{"categories":["header"],"patternName":"modestra/header-with-topbar","name":"Header with Topbar"},"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0px","bottom":"0px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0px;padding-right:0;padding-bottom:0px;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"12px","bottom":"12px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"gradient":"gradient-primary-secondary","layout":{"type":"constrained","contentSize":"1180px"}} -->
    <div class="wp-block-group has-gradient-primary-secondary-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:12px;padding-right:var(--wp--preset--spacing--40);padding-bottom:12px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"className":"modestra-info-icons","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
        <div class="wp-block-group modestra-info-icons" style="margin-top:0;margin-bottom:0"><!-- wp:group {"className":"modestra-info-icons","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
            <div class="wp-block-group modestra-info-icons" style="margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group"><!-- wp:image {"id":4525,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","style":{"layout":{"selfStretch":"fit","flexSize":null},"color":{"duotone":"var:preset|duotone|primary-duo"}}} -->
                    <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4525" style="width:auto;height:18px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
                    <p class="has-light-color-color has-text-color has-link-color"><?php esc_html_e('14th Street, Caltech, New Jersey, Alabama', 'modestra') ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group"><!-- wp:image {"id":4515,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|primary-duo"}}} -->
                    <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-4515" style="width:auto;height:18px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
                    <p class="has-light-color-color has-text-color has-link-color"><?php esc_html_e('+1 (000) 123-456', 'modestra') ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group"><!-- wp:image {"id":4521,"width":"auto","height":"14px","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|primary-duo"}}} -->
                    <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[2]) ?>" alt="" class="wp-image-4521" style="width:auto;height:14px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
                    <p class="has-light-color-color has-text-color has-link-color"><?php esc_html_e('email@example.com', 'modestra') ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFE","className":"is-style-logos-only","style":{"spacing":{"margin":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"right"}} -->
            <ul class="wp-block-social-links has-icon-color is-style-logos-only" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                <!-- wp:social-link {"url":"#","service":"x"} /-->

                <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
            </ul>
            <!-- /wp:social-links -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"24px","bottom":"24px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:24px;padding-right:var(--wp--preset--spacing--40);padding-bottom:24px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"25%","style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:25%"><!-- wp:site-title {"textAlign":"left","fontSize":"large"} /--></div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
            <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:navigation {"textColor":"heading-color","layout":{"type":"flex","justifyContent":"center"}} /--></div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"25%"} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:25%"><!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"right"}} -->
                <div class="wp-block-buttons" style="margin-top:0;margin-bottom:0"><!-- wp:button {"textColor":"light-color","gradient":"gradient-primary-secondary","className":"is-style-button-gradient-background-style","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"spacing":{"padding":{"left":"28px","right":"28px","top":"18px","bottom":"18px"}},"border":{"radius":"70px"}},"fontSize":"normal"} -->
                    <div class="wp-block-button has-custom-font-size is-style-button-gradient-background-style has-normal-font-size"><a class="wp-block-button__link has-light-color-color has-gradient-primary-secondary-gradient-background has-text-color has-background has-link-color wp-element-button" style="border-radius:70px;padding-top:18px;padding-right:28px;padding-bottom:18px;padding-left:28px"><?php esc_html_e('Schedule Appointment', 'modestra') ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->