<?php

/**
 * Title: Featured Content 4
 * Slug: modestra/featured-content-4
 * Categories: call-to-action, about, services
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/g1.jpg',
    $modestra_url . 'assets/images/g4.jpg',
);

?>
<!-- wp:group {"metadata":{"categories":["about"],"patternName":"modestra/featured-content-4","name":"Featured Content 2"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"60px"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"20px"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"35%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[0]) ?>","id":7674,"dimRatio":0,"customOverlayColor":"#c2c0c0","isUserOverlayColor":true,"minHeight":410,"isDark":false,"className":"is-style-modestra-cover-modestra-zoom-effect","style":{"color":{"duotone":"unset"},"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light is-style-modestra-cover-modestra-zoom-effect" style="border-radius:0px;min-height:410px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#c2c0c0"></span><img class="wp-block-cover__image-background wp-image-7674" alt="" src="<?php echo esc_url($modestra_images[0]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"24px","bottom":"24px","left":"24px","right":"24px"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0px"}},"typography":{"fontSize":"28px"}}} -->
            <h3 class="wp-block-heading" style="margin-top:0px;font-size:28px"><?php esc_html_e('Featured Title', 'modestra') ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"fontSize":"medium"} -->
            <p class="has-medium-font-size"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"className":"is-style-default","style":{"spacing":{"margin":{"top":"24px"}}}} -->
            <div class="wp-block-buttons is-style-default" style="margin-top:24px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-simple-arrow","style":{"spacing":{"padding":{"left":"0px","right":"0px","top":"10px","bottom":"10px"}},"border":{"radius":"0px","bottom":{"width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"fontSize":"medium"} -->
                <div class="wp-block-button has-custom-font-size is-style-button-hover-simple-arrow has-medium-font-size"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:0px;border-bottom-width:1px;padding-top:10px;padding-right:0px;padding-bottom:10px;padding-left:0px"><?php esc_html_e('Explore More', 'modestra') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"20px"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"35%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[1]) ?>","id":7674,"dimRatio":0,"customOverlayColor":"#c2c0c0","isUserOverlayColor":true,"minHeight":410,"isDark":false,"className":"is-style-modestra-cover-modestra-zoom-effect","style":{"color":{"duotone":"unset"},"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light is-style-modestra-cover-modestra-zoom-effect" style="border-radius:0px;min-height:410px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#c2c0c0"></span><img class="wp-block-cover__image-background wp-image-7674" alt="" src="<?php echo esc_url($modestra_images[1]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"24px","bottom":"24px","left":"24px","right":"24px"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0px"}},"typography":{"fontSize":"28px"}}} -->
            <h3 class="wp-block-heading" style="margin-top:0px;font-size:28px"><?php esc_html_e('Featured Title', 'modestra') ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"fontSize":"medium"} -->
            <p class="has-medium-font-size"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"className":"is-style-default","style":{"spacing":{"margin":{"top":"24px"}}}} -->
            <div class="wp-block-buttons is-style-default" style="margin-top:24px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-simple-arrow","style":{"spacing":{"padding":{"left":"0px","right":"0px","top":"10px","bottom":"10px"}},"border":{"radius":"0px","bottom":{"width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"fontSize":"medium"} -->
                <div class="wp-block-button has-custom-font-size is-style-button-hover-simple-arrow has-medium-font-size"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:0px;border-bottom-width:1px;padding-top:10px;padding-right:0px;padding-bottom:10px;padding-left:0px"><?php esc_html_e('Explore More', 'modestra') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->