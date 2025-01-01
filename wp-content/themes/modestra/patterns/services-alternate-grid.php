<?php

/**
 * Title: Service Alternate Grid
 * Slug: modestra/services-alternate-grid
 * Categories: services
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/service_image_1.jpg',
    $modestra_url . 'assets/images/service_image_5.jpg',
    $modestra_url . 'assets/images/service_image_2.jpg',
    $modestra_url . 'assets/images/service_image_4.jpg',
);
?>
<!-- wp:group {"metadata":{"categories":["services"],"patternName":"modestra/services-grid-with-image","name":"Service Grid with Image"},"style":{"spacing":{"padding":{"top":"100px","bottom":"100px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group" style="padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"780px"}} -->
    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1} -->
        <h1 class="wp-block-heading has-text-align-center"><?php esc_html_e('Our Services', 'modestra') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
        <p class="has-text-align-center has-foreground-color has-text-color has-link-color"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"0px"},"margin":{"top":"64px","bottom":"0"}}}} -->
    <div class="wp-block-columns" style="margin-top:64px;margin-bottom:0"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"border":{"width":"0px","style":"none"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="border-style:none;border-width:0px;margin-top:0;margin-bottom:0"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[0]) ?>","id":4606,"dimRatio":0,"customOverlayColor":"#9f9a98","minHeight":340,"isDark":false,"layout":{"type":"constrained"}} -->
                <div class="wp-block-cover is-light" style="min-height:340px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#9f9a98"></span><img class="wp-block-cover__image-background wp-image-4606" alt="" src="<?php echo esc_url($modestra_images[0]) ?>" data-object-fit="cover" />
                    <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                        <p class="has-text-align-center has-large-font-size"></p>
                        <!-- /wp:paragraph -->
                    </div>
                </div>
                <!-- /wp:cover -->

                <!-- wp:cover {"overlayColor":"light-shade","isUserOverlayColor":true,"minHeight":340,"isDark":false,"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"24px","bottom":"24px","left":"24px","right":"24px"}}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-cover is-light" style="margin-top:0;margin-bottom:0;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px;min-height:340px"><span aria-hidden="true" class="wp-block-cover__background has-light-shade-background-color has-background-dim-100 has-background-dim"></span>
                    <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"heading-color","fontSize":"big"} -->
                        <h4 class="wp-block-heading has-text-align-center has-heading-color-color has-text-color has-link-color has-big-font-size"><a href="#"><?php esc_html_e('Business Strategy', 'modestra') ?></a></h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"align":"center"} -->
                        <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                        <div class="wp-block-buttons" style="margin-top:24px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
                            <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-color is-style-button-hover-simple-arrow has-normal-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e('Read More', 'modestra') ?></a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                </div>
                <!-- /wp:cover -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"border":{"width":"0px","style":"none"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="border-style:none;border-width:0px;margin-top:0;margin-bottom:0"><!-- wp:cover {"overlayColor":"light-shade","isUserOverlayColor":true,"minHeight":340,"isDark":false,"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"24px","bottom":"24px","left":"24px","right":"24px"}}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-cover is-light" style="margin-top:0;margin-bottom:0;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px;min-height:340px"><span aria-hidden="true" class="wp-block-cover__background has-light-shade-background-color has-background-dim-100 has-background-dim"></span>
                    <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"typography":{"fontSize":"24px"}},"textColor":"heading-color"} -->
                        <h4 class="wp-block-heading has-text-align-center has-heading-color-color has-text-color has-link-color" style="font-size:24px"><a href="#"><?php esc_html_e('Website Development', 'modestra') ?></a></h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"align":"center"} -->
                        <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                        <div class="wp-block-buttons" style="margin-top:24px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
                            <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-color is-style-button-hover-simple-arrow has-normal-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e('Read More', 'modestra') ?></a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                </div>
                <!-- /wp:cover -->

                <!-- wp:cover {"url":"<?php echo esc_url($modestra_images[1]) ?>","id":4625,"dimRatio":0,"customOverlayColor":"#b8b7b5","minHeight":340,"isDark":false,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-cover is-light" style="margin-top:0;margin-bottom:0;min-height:340px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#b8b7b5"></span><img class="wp-block-cover__image-background wp-image-4625" alt="" src="<?php echo esc_url($modestra_images[1]) ?>" data-object-fit="cover" />
                    <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                        <p class="has-text-align-center has-large-font-size"></p>
                        <!-- /wp:paragraph -->
                    </div>
                </div>
                <!-- /wp:cover -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"border":{"width":"0px","style":"none"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="border-style:none;border-width:0px;margin-top:0;margin-bottom:0"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[2]) ?>","id":4619,"dimRatio":0,"customOverlayColor":"#c3c3c6","minHeight":340,"isDark":false,"layout":{"type":"constrained"}} -->
                <div class="wp-block-cover is-light" style="min-height:340px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#c3c3c6"></span><img class="wp-block-cover__image-background wp-image-4619" alt="" src="<?php echo esc_url($modestra_images[2]) ?>" data-object-fit="cover" />
                    <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                        <p class="has-text-align-center has-large-font-size"></p>
                        <!-- /wp:paragraph -->
                    </div>
                </div>
                <!-- /wp:cover -->

                <!-- wp:cover {"overlayColor":"light-shade","isUserOverlayColor":true,"minHeight":340,"isDark":false,"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"24px","bottom":"24px","left":"24px","right":"24px"}}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-cover is-light" style="margin-top:0;margin-bottom:0;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px;min-height:340px"><span aria-hidden="true" class="wp-block-cover__background has-light-shade-background-color has-background-dim-100 has-background-dim"></span>
                    <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"heading-color","fontSize":"big"} -->
                        <h4 class="wp-block-heading has-text-align-center has-heading-color-color has-text-color has-link-color has-big-font-size"><a href="#"><?php esc_html_e('User-Centric Design', 'modestra') ?></a></h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"align":"center"} -->
                        <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                        <div class="wp-block-buttons" style="margin-top:24px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
                            <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-color is-style-button-hover-simple-arrow has-normal-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e('Read More', 'modestra') ?></a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                </div>
                <!-- /wp:cover -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"border":{"width":"0px","style":"none"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="border-style:none;border-width:0px;margin-top:0;margin-bottom:0"><!-- wp:cover {"overlayColor":"light-shade","isUserOverlayColor":true,"minHeight":340,"isDark":false,"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"24px","bottom":"24px","left":"24px","right":"24px"}}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-cover is-light" style="margin-top:0;margin-bottom:0;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px;min-height:340px"><span aria-hidden="true" class="wp-block-cover__background has-light-shade-background-color has-background-dim-100 has-background-dim"></span>
                    <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"heading-color","fontSize":"big"} -->
                        <h4 class="wp-block-heading has-text-align-center has-heading-color-color has-text-color has-link-color has-big-font-size"><a href="#"><?php esc_html_e('Digital Marketing', 'modestra') ?></a></h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"align":"center"} -->
                        <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                        <div class="wp-block-buttons" style="margin-top:24px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
                            <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-color is-style-button-hover-simple-arrow has-normal-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e('Read More', 'modestra') ?></a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                </div>
                <!-- /wp:cover -->

                <!-- wp:cover {"url":"<?php echo esc_url($modestra_images[3]) ?>","id":4624,"dimRatio":0,"customOverlayColor":"#b5b1b0","minHeight":340,"isDark":false,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-cover is-light" style="margin-top:0;margin-bottom:0;min-height:340px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#b5b1b0"></span><img class="wp-block-cover__image-background wp-image-4624" alt="" src="<?php echo esc_url($modestra_images[3]) ?>" data-object-fit="cover" />
                    <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                        <p class="has-text-align-center has-large-font-size"></p>
                        <!-- /wp:paragraph -->
                    </div>
                </div>
                <!-- /wp:cover -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->