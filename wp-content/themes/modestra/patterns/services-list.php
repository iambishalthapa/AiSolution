<?php

/**
 * Title: Service List
 * Slug: modestra/services-list
 * Categories: services
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/service_1.png',
    $modestra_url . 'assets/images/service_2.png',
    $modestra_url . 'assets/images/service_3.png',
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"100px","bottom":"100px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"light-color","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group has-light-color-background-color has-background" style="padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"64px"},"margin":{"top":"64px","bottom":"0"}}}} -->
    <div class="wp-block-columns" style="margin-top:64px;margin-bottom:0"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"980px","justifyContent":"left"}} -->
            <div class="wp-block-group"><!-- wp:heading {"textAlign":"left","level":1} -->
                <h1 class="wp-block-heading has-text-align-left"><?php esc_html_e('Crafting Unique Solutions Together!', 'modestra') ?></h1>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
                <p class="has-text-align-left has-foreground-color has-text-color has-link-color"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"40px","bottom":"70px"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
                <div class="wp-block-buttons is-style-buttons-hover-translate-effect" style="margin-top:40px;margin-bottom:70px"><!-- wp:button {"backgroundColor":"dark-shade","textColor":"light-color","className":"is-style-button-hover-primary-arrow-style","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"border":{"radius":"60px","width":"1px"},"typography":{"textTransform":"uppercase"},"spacing":{"padding":{"left":"32px","right":"32px","top":"16px","bottom":"16px"}}},"fontSize":"normal","borderColor":"heading-color"} -->
                    <div class="wp-block-button has-custom-font-size is-style-button-hover-primary-arrow-style has-normal-font-size" style="text-transform:uppercase"><a class="wp-block-button__link has-light-color-color has-dark-shade-background-color has-text-color has-background has-link-color has-border-color has-heading-color-border-color wp-element-button" style="border-width:1px;border-radius:60px;padding-top:16px;padding-right:32px;padding-bottom:16px;padding-left:32px"><?php esc_html_e('Explore More', 'modestra') ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-default","style":{"border":{"width":"0px","style":"none","radius":"5px"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-default has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:5px;margin-top:0;margin-bottom:0;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:image {"id":4630,"width":"55px","height":"55px","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4630" style="object-fit:cover;width:55px;height:55px" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"28px","bottom":"0"},"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:28px;margin-bottom:0;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:heading {"textAlign":"left","level":5,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"heading-color","fontSize":"big"} -->
                    <h5 class="wp-block-heading has-text-align-left has-heading-color-color has-text-color has-link-color has-big-font-size" style="font-style:normal;font-weight:600"><a href="#"><?php esc_html_e('Business Strategy', 'modestra') ?></a></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"left"} -->
                    <p class="has-text-align-left"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"is-style-default","style":{"border":{"width":"0px","style":"none","radius":"5px"},"spacing":{"margin":{"top":"60px","bottom":"60px"},"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-default" style="border-style:none;border-width:0px;border-radius:5px;margin-top:60px;margin-bottom:60px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:image {"id":4643,"width":"55px","height":"55px","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-4643" style="object-fit:cover;width:55px;height:55px" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"28px","bottom":"0"},"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:28px;margin-bottom:0;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:heading {"textAlign":"left","level":5,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"heading-color","fontSize":"big"} -->
                    <h5 class="wp-block-heading has-text-align-left has-heading-color-color has-text-color has-link-color has-big-font-size" style="font-style:normal;font-weight:600"><a href="#"><?php esc_html_e('Digital Marketing', 'modestra') ?></a></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"left"} -->
                    <p class="has-text-align-left"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"is-style-default","style":{"border":{"width":"0px","style":"none","radius":"5px"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-default" style="border-style:none;border-width:0px;border-radius:5px;margin-top:0;margin-bottom:0;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:image {"id":4644,"width":"55px","height":"55px","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[2]) ?>" alt="" class="wp-image-4644" style="object-fit:cover;width:55px;height:55px" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"28px","bottom":"0"},"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:28px;margin-bottom:0;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:heading {"textAlign":"left","level":5,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"heading-color","fontSize":"big"} -->
                    <h5 class="wp-block-heading has-text-align-left has-heading-color-color has-text-color has-link-color has-big-font-size" style="font-style:normal;font-weight:600"><a href="#"><?php esc_html_e('UI/UX Design', 'modestra') ?></a></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"left"} -->
                    <p class="has-text-align-left"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->
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