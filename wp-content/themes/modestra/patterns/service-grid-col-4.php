<?php

/**
 * Title: Service Grid with 4 Column
 * Slug: modestra/service-grid-col-4
 * Categories: services
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/service_1.png',
    $modestra_url . 'assets/images/service_2.png',
    $modestra_url . 'assets/images/service_3.png',
    $modestra_url . 'assets/images/service_4.png',
    $modestra_url . 'assets/images/service_5.png',
    $modestra_url . 'assets/images/service_6.png',
    $modestra_url . 'assets/images/service_7.png',
    $modestra_url . 'assets/images/service_8.png',
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"100px","bottom":"100px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"light-shade","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group has-light-shade-background-color has-background" style="padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"780px"}} -->
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
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-modestra-boxshadow-hover","style":{"border":{"width":"0px","style":"none","radius":"5px"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"28px","bottom":"28px","left":"24px","right":"24px"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-modestra-boxshadow-hover has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:5px;margin-top:0;margin-bottom:0;padding-top:28px;padding-right:24px;padding-bottom:28px;padding-left:24px"><!-- wp:image {"id":4630,"width":"55px","height":"55px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4630" style="object-fit:cover;width:55px;height:55px" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"28px","bottom":"0"},"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:28px;margin-bottom:0;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:heading {"textAlign":"center","level":5,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"heading-color","fontSize":"normal"} -->
                    <h5 class="wp-block-heading has-text-align-center has-heading-color-color has-text-color has-link-color has-normal-font-size" style="font-style:normal;font-weight:600"><a href="#"><?php esc_html_e('Business Strategy', 'modestra') ?></a></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px","bottom":"0px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons" style="margin-top:24px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
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
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-modestra-boxshadow-hover","style":{"border":{"width":"0px","style":"none","radius":"5px"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"28px","bottom":"28px","left":"24px","right":"24px"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-modestra-boxshadow-hover has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:5px;margin-top:0;margin-bottom:0;padding-top:28px;padding-right:24px;padding-bottom:28px;padding-left:24px"><!-- wp:image {"id":4643,"width":"55px","height":"55px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-4643" style="object-fit:cover;width:55px;height:55px" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"28px","bottom":"0"},"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:28px;margin-bottom:0;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:heading {"textAlign":"center","level":5,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"heading-color","fontSize":"normal"} -->
                    <h5 class="wp-block-heading has-text-align-center has-heading-color-color has-text-color has-link-color has-normal-font-size" style="font-style:normal;font-weight:600"><a href="#"><?php esc_html_e('Digital Marketing', 'modestra') ?></a></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px","bottom":"0px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons" style="margin-top:24px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
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
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-modestra-boxshadow-hover","style":{"border":{"width":"0px","style":"none","radius":"5px"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"28px","bottom":"28px","left":"24px","right":"24px"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-modestra-boxshadow-hover has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:5px;margin-top:0;margin-bottom:0;padding-top:28px;padding-right:24px;padding-bottom:28px;padding-left:24px"><!-- wp:image {"id":4644,"width":"55px","height":"55px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($modestra_images[2]) ?>" alt="" class="wp-image-4644" style="object-fit:cover;width:55px;height:55px" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"28px","bottom":"0"},"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:28px;margin-bottom:0;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:heading {"textAlign":"center","level":5,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"heading-color","fontSize":"normal"} -->
                    <h5 class="wp-block-heading has-text-align-center has-heading-color-color has-text-color has-link-color has-normal-font-size" style="font-style:normal;font-weight:600"><a href="#"><?php esc_html_e('UI/UX Design', 'modestra') ?></a></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px","bottom":"0px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons" style="margin-top:24px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
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
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-modestra-boxshadow-hover","style":{"border":{"width":"0px","style":"none","radius":"5px"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"28px","bottom":"28px","left":"24px","right":"24px"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-modestra-boxshadow-hover has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:5px;margin-top:0;margin-bottom:0;padding-top:28px;padding-right:24px;padding-bottom:28px;padding-left:24px"><!-- wp:image {"id":4645,"width":"55px","height":"55px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($modestra_images[3]) ?>" alt="" class="wp-image-4645" style="object-fit:cover;width:55px;height:55px" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"28px","bottom":"0"},"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:28px;margin-bottom:0;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:heading {"textAlign":"center","level":5,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"heading-color","fontSize":"normal"} -->
                    <h5 class="wp-block-heading has-text-align-center has-heading-color-color has-text-color has-link-color has-normal-font-size" style="font-style:normal;font-weight:600"><a href="#"><?php esc_html_e('Ecommerce', 'modestra') ?></a></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px","bottom":"0px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons" style="margin-top:24px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
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
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-modestra-boxshadow-hover","style":{"border":{"width":"0px","style":"none","radius":"5px"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"28px","bottom":"28px","left":"24px","right":"24px"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-modestra-boxshadow-hover has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:5px;margin-top:0;margin-bottom:0;padding-top:28px;padding-right:24px;padding-bottom:28px;padding-left:24px"><!-- wp:image {"id":4651,"width":"55px","height":"55px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($modestra_images[4]) ?>" alt="" class="wp-image-4651" style="object-fit:cover;width:55px;height:55px" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"28px","bottom":"0"},"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:28px;margin-bottom:0;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:heading {"textAlign":"center","level":5,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"heading-color","fontSize":"normal"} -->
                    <h5 class="wp-block-heading has-text-align-center has-heading-color-color has-text-color has-link-color has-normal-font-size" style="font-style:normal;font-weight:600"><a href="#"><?php esc_html_e('Data Analytics', 'modestra') ?></a></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px","bottom":"0px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons" style="margin-top:24px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
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
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-modestra-boxshadow-hover","style":{"border":{"width":"0px","style":"none","radius":"5px"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"28px","bottom":"28px","left":"24px","right":"24px"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-modestra-boxshadow-hover has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:5px;margin-top:0;margin-bottom:0;padding-top:28px;padding-right:24px;padding-bottom:28px;padding-left:24px"><!-- wp:image {"id":4652,"width":"55px","height":"55px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($modestra_images[5]) ?>" alt="" class="wp-image-4652" style="object-fit:cover;width:55px;height:55px" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"28px","bottom":"0"},"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:28px;margin-bottom:0;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:heading {"textAlign":"center","level":5,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"heading-color","fontSize":"normal"} -->
                    <h5 class="wp-block-heading has-text-align-center has-heading-color-color has-text-color has-link-color has-normal-font-size" style="font-style:normal;font-weight:600"><a href="#"><?php esc_html_e('SEO', 'modestra') ?></a></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px","bottom":"0px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons" style="margin-top:24px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
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
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-modestra-boxshadow-hover","style":{"border":{"width":"0px","style":"none","radius":"5px"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"28px","bottom":"28px","left":"24px","right":"24px"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-modestra-boxshadow-hover has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:5px;margin-top:0;margin-bottom:0;padding-top:28px;padding-right:24px;padding-bottom:28px;padding-left:24px"><!-- wp:image {"id":4653,"width":"55px","height":"55px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($modestra_images[6]) ?>" alt="" class="wp-image-4653" style="object-fit:cover;width:55px;height:55px" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"28px","bottom":"0"},"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:28px;margin-bottom:0;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:heading {"textAlign":"center","level":5,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"heading-color","fontSize":"normal"} -->
                    <h5 class="wp-block-heading has-text-align-center has-heading-color-color has-text-color has-link-color has-normal-font-size" style="font-style:normal;font-weight:600"><a href="#"><?php esc_html_e('QA &amp; Testing', 'modestra') ?></a></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px","bottom":"0px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons" style="margin-top:24px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
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
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-modestra-boxshadow-hover","style":{"border":{"width":"0px","style":"none","radius":"5px"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"28px","bottom":"28px","left":"24px","right":"24px"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-modestra-boxshadow-hover has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:5px;margin-top:0;margin-bottom:0;padding-top:28px;padding-right:24px;padding-bottom:28px;padding-left:24px"><!-- wp:image {"id":4654,"width":"55px","height":"55px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($modestra_images[7]) ?>" alt="" class="wp-image-4654" style="object-fit:cover;width:55px;height:55px" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"28px","bottom":"0"},"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:28px;margin-bottom:0;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:heading {"textAlign":"center","level":5,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"heading-color","fontSize":"normal"} -->
                    <h5 class="wp-block-heading has-text-align-center has-heading-color-color has-text-color has-link-color has-normal-font-size" style="font-style:normal;font-weight:600"><a href="#"><?php esc_html_e('Branding', 'modestra') ?></a></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px","bottom":"0px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons" style="margin-top:24px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
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