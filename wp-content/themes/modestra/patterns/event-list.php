<?php

/**
 * Title: Events List Section
 * Slug: modestra/event-list
 * Categories: modestra
 */
?>
<!-- wp:group {"metadata":{"categories":["modestra"],"patternName":"modestra/event-list","name":"Events List Section"},"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"100px","bottom":"100px"}}},"backgroundColor":"light-shade","layout":{"type":"constrained","contentSize":"860px"}} -->
<div class="wp-block-group has-light-shade-background-color has-background" style="padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"layout":{"type":"constrained","contentSize":"680px"}} -->
    <div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
        <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"}},"border":{"radius":"60px"}},"backgroundColor":"primary-shade","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-primary-shade-background-color has-background" style="border-radius:60px;padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px"><!-- wp:heading {"textAlign":"center","level":5,"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"normal"} -->
                <h5 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-link-color has-normal-font-size"><?php esc_html_e('Upcoming Events', 'modestra') ?></h5>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

        <!-- wp:heading {"textAlign":"center"} -->
        <h2 class="wp-block-heading has-text-align-center"><?php esc_html_e('Mark Your Calendar', 'modestra') ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"verticalAlignment":"center","className":"is-style-modestra-boxshadow","style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"},"margin":{"top":"60px"}},"border":{"radius":"12px"}},"backgroundColor":"light-color"} -->
    <div class="wp-block-columns are-vertically-aligned-center is-style-modestra-boxshadow has-light-color-background-color has-background" style="border-radius:12px;margin-top:60px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:column {"verticalAlignment":"center","width":"80px"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:80px"><!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"10px","bottom":"10px","left":"10px","right":"10px"},"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"border":{"radius":"10px","width":"1px"}},"textColor":"primary","borderColor":"primary","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
            <div class="wp-block-group has-border-color has-primary-border-color has-primary-color has-text-color has-link-color" style="border-width:1px;border-radius:10px;margin-top:0;margin-bottom:0;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"x-small"} -->
                <p class="has-primary-color has-text-color has-link-color has-x-small-font-size"><?php esc_html_e('MON', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":1,"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"28px"}},"textColor":"secondary"} -->
                <h1 class="wp-block-heading has-secondary-color has-text-color has-link-color" style="font-size:28px"><?php esc_html_e('05', 'modestra') ?></h1>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:heading {"level":4,"fontSize":"medium"} -->
                <h4 class="wp-block-heading has-medium-font-size"><?php esc_html_e('The Rock Music Concerts', 'modestra') ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php esc_html_e('10:00AM - 8:00 PM', 'modestra') ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"150px"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:150px"><!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"right"}} -->
            <div class="wp-block-buttons is-style-buttons-hover-translate-effect" style="margin-top:0;margin-bottom:0"><!-- wp:button {"textColor":"light-color","gradient":"gradient-primary-secondary","className":"is-style-button-gradient-background-style","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"border":{"radius":"60px"},"typography":{"textTransform":"uppercase"}}} -->
                <div class="wp-block-button is-style-button-gradient-background-style" style="text-transform:uppercase"><a class="wp-block-button__link has-light-color-color has-gradient-primary-secondary-gradient-background has-text-color has-background has-link-color wp-element-button" style="border-radius:60px"><?php esc_html_e('Buy Ticket', 'modestra') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"verticalAlignment":"center","className":"is-style-modestra-boxshadow","style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"}},"border":{"radius":"12px"}},"backgroundColor":"light-color"} -->
    <div class="wp-block-columns are-vertically-aligned-center is-style-modestra-boxshadow has-light-color-background-color has-background" style="border-radius:12px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:column {"verticalAlignment":"center","width":"80px"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:80px"><!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"10px","bottom":"10px","left":"10px","right":"10px"},"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"border":{"radius":"10px","width":"1px"}},"textColor":"primary","borderColor":"primary","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
            <div class="wp-block-group has-border-color has-primary-border-color has-primary-color has-text-color has-link-color" style="border-width:1px;border-radius:10px;margin-top:0;margin-bottom:0;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"x-small"} -->
                <p class="has-primary-color has-text-color has-link-color has-x-small-font-size"><?php esc_html_e('WED', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":1,"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"28px"}},"textColor":"secondary"} -->
                <h1 class="wp-block-heading has-secondary-color has-text-color has-link-color" style="font-size:28px"><?php esc_html_e('30', 'modestra') ?></h1>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:heading {"level":4,"fontSize":"medium"} -->
                <h4 class="wp-block-heading has-medium-font-size"><?php esc_html_e('100 Men\'s Trekking for Jungle Rally', 'modestra') ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php esc_html_e('6:00 AM - 4:00PM', 'modestra') ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"150px"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:150px"><!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"right"}} -->
            <div class="wp-block-buttons is-style-buttons-hover-translate-effect" style="margin-top:0;margin-bottom:0"><!-- wp:button {"textColor":"light-color","gradient":"gradient-primary-secondary","className":"is-style-button-gradient-background-style","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"border":{"radius":"60px"},"typography":{"textTransform":"uppercase"}}} -->
                <div class="wp-block-button is-style-button-gradient-background-style" style="text-transform:uppercase"><a class="wp-block-button__link has-light-color-color has-gradient-primary-secondary-gradient-background has-text-color has-background has-link-color wp-element-button" style="border-radius:60px"><?php esc_html_e('Buy Ticket', 'modestra') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"verticalAlignment":"center","className":"is-style-modestra-boxshadow","style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"}},"border":{"radius":"12px"}},"backgroundColor":"light-color"} -->
    <div class="wp-block-columns are-vertically-aligned-center is-style-modestra-boxshadow has-light-color-background-color has-background" style="border-radius:12px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:column {"verticalAlignment":"center","width":"80px"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:80px"><!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"10px","bottom":"10px","left":"10px","right":"10px"},"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"border":{"radius":"10px","width":"1px"}},"textColor":"primary","borderColor":"primary","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
            <div class="wp-block-group has-border-color has-primary-border-color has-primary-color has-text-color has-link-color" style="border-width:1px;border-radius:10px;margin-top:0;margin-bottom:0;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"x-small"} -->
                <p class="has-primary-color has-text-color has-link-color has-x-small-font-size"><?php esc_html_e('FRI', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":1,"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"28px"}},"textColor":"secondary"} -->
                <h1 class="wp-block-heading has-secondary-color has-text-color has-link-color" style="font-size:28px"><?php esc_html_e('21', 'modestra') ?></h1>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:heading {"level":4,"fontSize":"medium"} -->
                <h4 class="wp-block-heading has-medium-font-size"><?php esc_html_e('The Rock Music Concerts', 'modestra') ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php esc_html_e('10:00AM - 8:00 PM', 'modestra') ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"150px"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:150px"><!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"right"}} -->
            <div class="wp-block-buttons is-style-buttons-hover-translate-effect" style="margin-top:0;margin-bottom:0"><!-- wp:button {"textColor":"light-color","gradient":"gradient-primary-secondary","className":"is-style-button-gradient-background-style","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"border":{"radius":"60px"},"typography":{"textTransform":"uppercase"}}} -->
                <div class="wp-block-button is-style-button-gradient-background-style" style="text-transform:uppercase"><a class="wp-block-button__link has-light-color-color has-gradient-primary-secondary-gradient-background has-text-color has-background has-link-color wp-element-button" style="border-radius:60px"><?php esc_html_e('Buy Ticket', 'modestra') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->