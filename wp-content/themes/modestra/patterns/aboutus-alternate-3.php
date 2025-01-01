<?php

/**
 * Title: About Us alternate Content 3
 * Slug: modestra/aboutus-alternate-3
 * Categories: about
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/extra_image.jpg',
    $modestra_url . 'assets/images/service_image_3.jpg',
    $modestra_url . 'assets/images/service_image_1.jpg',
);
?>
<!-- wp:group {"metadata":{"categories":["about"],"patternName":"modestra/aboutus-alternate-3","name":"About Us alternate Content 3"},"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"100px","bottom":"100px"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[0]) ?>","id":5241,"dimRatio":0,"customOverlayColor":"#717070","isUserOverlayColor":true,"minHeight":480,"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="min-height:480px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#717070"></span><img class="wp-block-cover__image-background wp-image-5241" alt="" src="<?php echo esc_url($modestra_images[0]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"padding":{"top":"48px","bottom":"48px","left":"48px","right":"48px"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="padding-top:48px;padding-right:48px;padding-bottom:48px;padding-left:48px"><!-- wp:heading -->
                <h2 class="wp-block-heading"><?php esc_html_e('Who We Are', 'modestra') ?></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"spacing":{"margin":{"top":"32px"}}}} -->
                <div class="wp-block-buttons is-style-buttons-hover-translate-effect" style="margin-top:32px"><!-- wp:button {"textColor":"light-color","gradient":"gradient-primary-secondary","className":"is-style-button-gradient-background-style","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"spacing":{"padding":{"left":"32px","right":"32px","top":"16px","bottom":"16px"}},"border":{"radius":"60px"}},"fontSize":"medium"} -->
                    <div class="wp-block-button has-custom-font-size is-style-button-gradient-background-style has-medium-font-size"><a class="wp-block-button__link has-light-color-color has-gradient-primary-secondary-gradient-background has-text-color has-background has-link-color wp-element-button" style="border-radius:60px;padding-top:16px;padding-right:32px;padding-bottom:16px;padding-left:32px"><?php esc_html_e('Explore More', 'modestra') ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"padding":{"top":"48px","bottom":"48px","left":"48px","right":"48px"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="padding-top:48px;padding-right:48px;padding-bottom:48px;padding-left:48px"><!-- wp:heading -->
                <h2 class="wp-block-heading"><?php esc_html_e('Our Journey', 'modestra') ?></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"spacing":{"margin":{"top":"32px"}}}} -->
                <div class="wp-block-buttons is-style-buttons-hover-translate-effect" style="margin-top:32px"><!-- wp:button {"textColor":"light-color","gradient":"gradient-primary-secondary","className":"is-style-button-gradient-background-style","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"spacing":{"padding":{"left":"32px","right":"32px","top":"16px","bottom":"16px"}},"border":{"radius":"60px"}},"fontSize":"medium"} -->
                    <div class="wp-block-button has-custom-font-size is-style-button-gradient-background-style has-medium-font-size"><a class="wp-block-button__link has-light-color-color has-gradient-primary-secondary-gradient-background has-text-color has-background has-link-color wp-element-button" style="border-radius:60px;padding-top:16px;padding-right:32px;padding-bottom:16px;padding-left:32px"><?php esc_html_e('Explore More', 'modestra') ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[1]) ?>","id":4620,"dimRatio":0,"customOverlayColor":"#908884","isUserOverlayColor":true,"minHeight":480,"isDark":false,"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light" style="min-height:480px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#908884"></span><img class="wp-block-cover__image-background wp-image-4620" alt="" src="<?php echo esc_url($modestra_images[1]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[2]) ?>","id":4375,"dimRatio":0,"customOverlayColor":"#b4aeae","isUserOverlayColor":true,"minHeight":480,"isDark":false,"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light" style="min-height:480px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#b4aeae"></span><img class="wp-block-cover__image-background wp-image-4375" alt="" src="<?php echo esc_url($modestra_images[2]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"padding":{"top":"48px","bottom":"48px","left":"48px","right":"48px"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="padding-top:48px;padding-right:48px;padding-bottom:48px;padding-left:48px"><!-- wp:heading -->
                <h2 class="wp-block-heading"><?php esc_html_e('Mission &amp; Goal', 'modestra') ?></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"spacing":{"margin":{"top":"32px"}}}} -->
                <div class="wp-block-buttons is-style-buttons-hover-translate-effect" style="margin-top:32px"><!-- wp:button {"textColor":"light-color","gradient":"gradient-primary-secondary","className":"is-style-button-gradient-background-style","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"spacing":{"padding":{"left":"32px","right":"32px","top":"16px","bottom":"16px"}},"border":{"radius":"60px"}},"fontSize":"medium"} -->
                    <div class="wp-block-button has-custom-font-size is-style-button-gradient-background-style has-medium-font-size"><a class="wp-block-button__link has-light-color-color has-gradient-primary-secondary-gradient-background has-text-color has-background has-link-color wp-element-button" style="border-radius:60px;padding-top:16px;padding-right:32px;padding-bottom:16px;padding-left:32px"><?php esc_html_e('Explore More', 'modestra') ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->