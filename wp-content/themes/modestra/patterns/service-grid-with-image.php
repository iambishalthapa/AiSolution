<?php

/**
 * Title: Service Grid with Image
 * Slug: modestra/services-grid-with-image
 * Categories: services
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/service_image_1.jpg',
    $modestra_url . 'assets/images/service_image_2.jpg',
    $modestra_url . 'assets/images/service_image_3.jpg',
    $modestra_url . 'assets/images/service_image_4.jpg',
    $modestra_url . 'assets/images/service_image_5.jpg',
    $modestra_url . 'assets/images/service_image_6.jpg',
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"100px","bottom":"100px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group" style="padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"780px"}} -->
    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1} -->
        <h1 class="wp-block-heading has-text-align-center"><?php esc_html_e('Our Services', 'modestra') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
        <p class="has-text-align-center has-foreground-color has-text-color has-link-color"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"30px"},"margin":{"top":"64px","bottom":"0"}}}} -->
    <div class="wp-block-columns" style="margin-top:64px;margin-bottom:0"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"border":{"width":"1px"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"borderColor":"border-color-black","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-border-color has-border-color-black-border-color" style="border-width:1px;margin-top:0;margin-bottom:0"><!-- wp:image {"id":4606,"sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4606" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"28px","bottom":"28px","left":"28px","right":"28px"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:28px;padding-right:28px;padding-bottom:28px;padding-left:28px"><!-- wp:heading {"textAlign":"center","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"heading-color","fontSize":"big"} -->
                    <h4 class="wp-block-heading has-text-align-center has-heading-color-color has-text-color has-link-color has-big-font-size"><a href="#"><?php esc_html_e('Website Development', 'modestra') ?></a></h4>
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
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"border":{"width":"1px"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"borderColor":"border-color-black","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-border-color has-border-color-black-border-color" style="border-width:1px;margin-top:0;margin-bottom:0"><!-- wp:image {"id":4619,"sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-4619" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"28px","bottom":"28px","left":"28px","right":"28px"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:28px;padding-right:28px;padding-bottom:28px;padding-left:28px"><!-- wp:heading {"textAlign":"center","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"heading-color","fontSize":"big"} -->
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
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"border":{"width":"1px"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"borderColor":"border-color-black","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-border-color has-border-color-black-border-color" style="border-width:1px;margin-top:0;margin-bottom:0"><!-- wp:image {"id":4620,"sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full"><img src="<?php echo esc_url($modestra_images[2]) ?>" alt="" class="wp-image-4620" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"28px","bottom":"28px","left":"28px","right":"28px"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:28px;padding-right:28px;padding-bottom:28px;padding-left:28px"><!-- wp:heading {"textAlign":"center","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"heading-color","fontSize":"big"} -->
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
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"30px"},"margin":{"top":"30px","bottom":"0"}}}} -->
    <div class="wp-block-columns" style="margin-top:30px;margin-bottom:0"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"border":{"width":"1px"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"borderColor":"border-color-black","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-border-color has-border-color-black-border-color" style="border-width:1px;margin-top:0;margin-bottom:0"><!-- wp:image {"id":4624,"sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full"><img src="<?php echo esc_url($modestra_images[3]) ?>" alt="" class="wp-image-4624" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"28px","bottom":"28px","left":"28px","right":"28px"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:28px;padding-right:28px;padding-bottom:28px;padding-left:28px"><!-- wp:heading {"textAlign":"center","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"heading-color","fontSize":"big"} -->
                    <h4 class="wp-block-heading has-text-align-center has-heading-color-color has-text-color has-link-color has-big-font-size"><a href="#"><?php esc_html_e('UI/UX', 'modestra') ?></a></h4>
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
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"border":{"width":"1px"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"borderColor":"border-color-black","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-border-color has-border-color-black-border-color" style="border-width:1px;margin-top:0;margin-bottom:0"><!-- wp:image {"id":4625,"sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full"><img src="<?php echo esc_url($modestra_images[4]) ?>" alt="" class="wp-image-4625" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"28px","bottom":"28px","left":"28px","right":"28px"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:28px;padding-right:28px;padding-bottom:28px;padding-left:28px"><!-- wp:heading {"textAlign":"center","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"heading-color","fontSize":"big"} -->
                    <h4 class="wp-block-heading has-text-align-center has-heading-color-color has-text-color has-link-color has-big-font-size"><a href="#"><?php esc_html_e('SAAS Develop', 'modestra') ?></a></h4>
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
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"border":{"width":"1px"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"borderColor":"border-color-black","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-border-color has-border-color-black-border-color" style="border-width:1px;margin-top:0;margin-bottom:0"><!-- wp:image {"id":4626,"sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full"><img src="<?php echo esc_url($modestra_images[5]) ?>" alt="" class="wp-image-4626" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"28px","bottom":"28px","left":"28px","right":"28px"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:28px;padding-right:28px;padding-bottom:28px;padding-left:28px"><!-- wp:heading {"textAlign":"center","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"heading-color","fontSize":"big"} -->
                    <h4 class="wp-block-heading has-text-align-center has-heading-color-color has-text-color has-link-color has-big-font-size"><a href="#"><?php esc_html_e('Branding', 'modestra') ?></a></h4>
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
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->