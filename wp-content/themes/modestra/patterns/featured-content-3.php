<?php

/**
 * Title: Featured Content 3
 * Slug: modestra/featured-content-3
 * Categories: call-to-action, about, services
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/g1.jpg',
    $modestra_url . 'assets/images/g4.jpg',
    $modestra_url . 'assets/images/g8.jpg',
);

?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"dark-shade","layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group has-dark-shade-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"48px"}}}} -->
    <div class="wp-block-columns"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[0]) ?>","id":7674,"dimRatio":0,"customOverlayColor":"#c2c0c0","minHeight":340,"isDark":false,"className":"is-style-modestra-cover-modestra-zoom-effect","style":{"color":{"duotone":"unset"},"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light is-style-modestra-cover-modestra-zoom-effect" style="border-radius:0px;min-height:340px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#c2c0c0"></span><img class="wp-block-cover__image-background wp-image-7674" alt="" src="<?php echo esc_url($modestra_images[0]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"28px"}},"typography":{"fontSize":"28px"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} -->
            <h3 class="wp-block-heading has-background-color has-text-color has-link-color" style="margin-top:28px;font-size:28px"><?php esc_html_e('Featured Title', 'modestra') ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"medium"} -->
            <p class="has-light-color-color has-text-color has-link-color has-medium-font-size"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"className":"is-style-default","style":{"spacing":{"margin":{"top":"24px"}}}} -->
            <div class="wp-block-buttons is-style-default" style="margin-top:24px"><!-- wp:button {"backgroundColor":"transparent","textColor":"light-color","className":"is-style-fill","style":{"spacing":{"padding":{"left":"0px","right":"0px","top":"10px","bottom":"10px"}},"border":{"radius":"0px","bottom":{"width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"fontSize":"medium"} -->
                <div class="wp-block-button has-custom-font-size is-style-fill has-medium-font-size"><a class="wp-block-button__link has-light-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:0px;border-bottom-width:1px;padding-top:10px;padding-right:0px;padding-bottom:10px;padding-left:0px"><?php esc_html_e('Explore More', 'modestra') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[1]) ?>","id":7679,"dimRatio":0,"customOverlayColor":"#827d78","minHeight":340,"className":"is-style-modestra-cover-modestra-zoom-effect","style":{"color":{"duotone":"unset"},"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-style-modestra-cover-modestra-zoom-effect" style="border-radius:0px;min-height:340px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#827d78"></span><img class="wp-block-cover__image-background wp-image-7679" alt="" src="<?php echo esc_url($modestra_images[1]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"28px"}},"typography":{"fontSize":"28px"},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
            <h3 class="wp-block-heading has-light-color-color has-text-color has-link-color" style="margin-top:28px;font-size:28px"><?php esc_html_e('Featured Title', 'modestra') ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"medium"} -->
            <p class="has-light-color-color has-text-color has-link-color has-medium-font-size"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"className":"is-style-default","style":{"spacing":{"margin":{"top":"24px"}}}} -->
            <div class="wp-block-buttons is-style-default" style="margin-top:24px"><!-- wp:button {"backgroundColor":"transparent","textColor":"light-color","className":"is-style-fill","style":{"spacing":{"padding":{"left":"0px","right":"0px","top":"10px","bottom":"10px"}},"border":{"radius":"0px","bottom":{"width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"fontSize":"medium"} -->
                <div class="wp-block-button has-custom-font-size is-style-fill has-medium-font-size"><a class="wp-block-button__link has-light-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:0px;border-bottom-width:1px;padding-top:10px;padding-right:0px;padding-bottom:10px;padding-left:0px"><?php esc_html_e('Explore More', 'modestra') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[2]) ?>","id":7672,"dimRatio":0,"customOverlayColor":"#cdd0db","minHeight":340,"isDark":false,"className":"is-style-modestra-cover-modestra-zoom-effect","style":{"color":{"duotone":"unset"},"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light is-style-modestra-cover-modestra-zoom-effect" style="border-radius:0px;min-height:340px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#cdd0db"></span><img class="wp-block-cover__image-background wp-image-7672" alt="" src="<?php echo esc_url($modestra_images[2]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"28px"}},"typography":{"fontSize":"28px"},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
            <h3 class="wp-block-heading has-light-color-color has-text-color has-link-color" style="margin-top:28px;font-size:28px"><?php esc_html_e('Featured Title', 'modestra') ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"medium"} -->
            <p class="has-light-color-color has-text-color has-link-color has-medium-font-size"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"className":"is-style-default","style":{"spacing":{"margin":{"top":"24px"}}}} -->
            <div class="wp-block-buttons is-style-default" style="margin-top:24px"><!-- wp:button {"backgroundColor":"transparent","textColor":"light-color","className":"is-style-fill","style":{"spacing":{"padding":{"left":"0px","right":"0px","top":"10px","bottom":"10px"}},"border":{"radius":"0px","bottom":{"width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"fontSize":"medium"} -->
                <div class="wp-block-button has-custom-font-size is-style-fill has-medium-font-size"><a class="wp-block-button__link has-light-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:0px;border-bottom-width:1px;padding-top:10px;padding-right:0px;padding-bottom:10px;padding-left:0px"><?php esc_html_e('Explore More', 'modestra') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->