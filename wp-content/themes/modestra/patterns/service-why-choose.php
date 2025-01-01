<?php

/**
 * Title: Service Why Choose Us
 * Slug: modestra/services-why-choose
 * Categories: services
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/service_1.png',
    $modestra_url . 'assets/images/service_2.png',
    $modestra_url . 'assets/images/service_3.png',
);
?>
<!-- wp:group {"metadata":{"categories":["services"],"patternName":"modestra/services-why-choose","name":"Service Section"},"style":{"spacing":{"padding":{"top":"120px","bottom":"120px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:120px;padding-right:var(--wp--preset--spacing--40);padding-bottom:120px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"760px"}} -->
    <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"10px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
        <div class="wp-block-group" style="margin-bottom:10px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"5px","bottom":"5px","left":"14px","right":"14px"}},"border":{"radius":"50px"}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-primary-background-color has-background" style="border-radius:50px;padding-top:5px;padding-right:14px;padding-bottom:5px;padding-left:14px"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"typography":{"textTransform":"uppercase"}},"textColor":"light-color","fontSize":"small"} -->
                <p class="has-text-align-center has-light-color-color has-text-color has-link-color has-small-font-size" style="text-transform:uppercase"><?php esc_html_e('Our Services', 'modestra') ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

        <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"xx-large"} -->
        <h1 class="wp-block-heading has-text-align-center has-xx-large-font-size" style="font-style:normal;font-weight:600"><?php esc_html_e('Why Choose Us', 'modestra') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"64px"},"blockGap":{"left":"40px"}}}} -->
    <div class="wp-block-columns" style="margin-top:64px"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box is-style-default primary-hover-style","style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"blockGap":"var:preset|spacing|30","margin":{"top":"0","bottom":"0"}},"border":{"radius":"10px","width":"0px","style":"none"}},"backgroundColor":"light-shade","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-default primary-hover-style has-light-shade-background-color has-background" style="border-style:none;border-width:0px;border-radius:10px;margin-top:0;margin-bottom:0;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"lightbox":{"enabled":false},"id":4630,"width":"auto","height":"60px","sizeSlug":"full","linkDestination":"custom","align":"center","style":{"border":{"radius":"0px"}}} -->
                <figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4630" style="border-radius:0px;width:auto;height:60px" /></figure>
                <!-- /wp:image -->

                <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"30px"}}},"fontSize":"medium"} -->
                <h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:30px;font-style:normal;font-weight:600"><?php esc_html_e('Business Strategy', 'modestra') ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center"><?php esc_html_e('Our team specializes in crafting compelling brand identities that resonate with your audience.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons" style="margin-top:24px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
                    <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-color is-style-button-hover-simple-arrow has-normal-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">Read More', 'modestra') ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box is-style-default primary-hover-style","style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"blockGap":"var:preset|spacing|30","margin":{"top":"0","bottom":"0"}},"border":{"radius":"10px","width":"0px","style":"none"}},"backgroundColor":"light-shade","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-default primary-hover-style has-light-shade-background-color has-background" style="border-style:none;border-width:0px;border-radius:10px;margin-top:0;margin-bottom:0;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"lightbox":{"enabled":false},"id":4643,"width":"auto","height":"60px","sizeSlug":"full","linkDestination":"custom","align":"center","style":{"border":{"radius":"0px"}}} -->
                <figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-4643" style="border-radius:0px;width:auto;height:60px" /></figure>
                <!-- /wp:image -->

                <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"30px"}}},"fontSize":"medium"} -->
                <h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:30px;font-style:normal;font-weight:600"><?php esc_html_e('Digital Marketing', 'modestra') ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center"><?php esc_html_e('Our team specializes in crafting compelling brand identities that resonate with your audience.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons" style="margin-top:24px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
                    <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-color is-style-button-hover-simple-arrow has-normal-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">Read More', 'modestra') ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box is-style-default primary-hover-style","style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"blockGap":"var:preset|spacing|30","margin":{"top":"0","bottom":"0"}},"border":{"radius":"10px","width":"0px","style":"none"}},"backgroundColor":"light-shade","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-default primary-hover-style has-light-shade-background-color has-background" style="border-style:none;border-width:0px;border-radius:10px;margin-top:0;margin-bottom:0;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"lightbox":{"enabled":false},"id":4644,"width":"auto","height":"60px","sizeSlug":"full","linkDestination":"custom","align":"center","style":{"border":{"radius":"0px"}}} -->
                <figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[2]) ?>" alt="" class="wp-image-4644" style="border-radius:0px;width:auto;height:60px" /></figure>
                <!-- /wp:image -->

                <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"30px"}}},"fontSize":"medium"} -->
                <h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:30px;font-style:normal;font-weight:600"><?php esc_html_e('UI/UX Design', 'modestra') ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center"><?php esc_html_e('Our team specializes in crafting compelling brand identities that resonate with your audience.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons" style="margin-top:24px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
                    <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-color is-style-button-hover-simple-arrow has-normal-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">Read More', 'modestra') ?></a></div>
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