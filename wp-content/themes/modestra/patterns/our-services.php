<?php

/**
 * Title: Our Service
 * Slug: modestra/our-services
 * Categories: services
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/icon_20.png',
    $modestra_url . 'assets/images/icon_21.png',
    $modestra_url . 'assets/images/icon_22.png',
    $modestra_url . 'assets/images/icon_23.png',
    $modestra_url . 'assets/images/icon_24.png',
    $modestra_url . 'assets/images/icon_24.png'
);
?>
<!-- wp:group {"metadata":{"categories":["services"],"patternName":"modestra/service-offered","name":"Service Section"},"style":{"spacing":{"padding":{"bottom":"120px","left":"var:preset|spacing|40","right":"var:preset|spacing|40","top":"120px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"primary-shade","layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group has-primary-shade-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:120px;padding-right:var(--wp--preset--spacing--40);padding-bottom:120px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"760px","justifyContent":"center"}} -->
    <div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
        <div class="wp-block-group"><!-- wp:group {"className":"is-style-modestra-group-gradient-border","style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"15px","right":"15px"}},"border":{"radius":"50px","width":"1px"}},"backgroundColor":"transparent","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-modestra-group-gradient-border has-transparent-background-color has-background" style="border-width:1px;border-radius:50px;padding-top:8px;padding-right:15px;padding-bottom:8px;padding-left:15px"><!-- wp:heading {"level":5,"className":"is-style-default","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color","fontSize":"small"} -->
                <h5 class="wp-block-heading is-style-default has-heading-color-color has-text-color has-link-color has-small-font-size"><?php esc_html_e('Our Services', 'modestra') ?></h5>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

        <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"textTransform":"none"}}} -->
        <h1 class="wp-block-heading has-text-align-center" style="text-transform:none"><?php esc_html_e('Tailored Solutions for Your Needs', 'modestra') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"border":{"width":"0px","style":"none"},"spacing":{"margin":{"top":"64px"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
    <div class="wp-block-group" style="border-style:none;border-width:0px;margin-top:64px"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"32px"},"margin":{"top":"28px"}}}} -->
        <div class="wp-block-columns" style="margin-top:28px"><!-- wp:column -->
            <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box primary-hover-style is-style-modestra-boxshadow","style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"blockGap":"var:preset|spacing|30","margin":{"top":"0","bottom":"0"}},"border":{"radius":"20px","width":"0px","style":"none"}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
                <div class="wp-block-group modestra-hover-box primary-hover-style is-style-modestra-boxshadow has-background-background-color has-background" style="border-style:none;border-width:0px;border-radius:20px;margin-top:0;margin-bottom:0;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"lightbox":{"enabled":false},"id":6665,"width":"75px","height":"75px","scale":"cover","sizeSlug":"full","linkDestination":"custom","style":{"border":{"radius":"12px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-6665" style="border-radius:12px;object-fit:cover;width:75px;height:75px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"30px"}}},"fontSize":"medium"} -->
                    <h3 class="wp-block-heading has-text-align-left has-medium-font-size" style="margin-top:30px;font-style:normal;font-weight:600"><?php esc_html_e('Web Application', 'modestra') ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php esc_html_e('Our team specializes in crafting compelling brand identities that resonate with your audience.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
                    <div class="wp-block-buttons" style="margin-top:24px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
                        <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-color is-style-button-hover-simple-arrow has-normal-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e('Read More', 'modestra') ?></a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box primary-hover-style is-style-modestra-boxshadow","style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"blockGap":"var:preset|spacing|30","margin":{"top":"0","bottom":"0"}},"border":{"radius":"20px","width":"0px","style":"none"}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
                <div class="wp-block-group modestra-hover-box primary-hover-style is-style-modestra-boxshadow has-background-background-color has-background" style="border-style:none;border-width:0px;border-radius:20px;margin-top:0;margin-bottom:0;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"lightbox":{"enabled":false},"id":7101,"width":"75px","height":"75px","scale":"cover","sizeSlug":"full","linkDestination":"custom","style":{"border":{"radius":"12px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-7101" style="border-radius:12px;object-fit:cover;width:75px;height:75px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"30px"}}},"fontSize":"medium"} -->
                    <h3 class="wp-block-heading has-text-align-left has-medium-font-size" style="margin-top:30px;font-style:normal;font-weight:600"><?php esc_html_e('SAAS Application', 'modestra') ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php esc_html_e('Our team specializes in crafting compelling brand identities that resonate with your audience.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
                    <div class="wp-block-buttons" style="margin-top:24px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
                        <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-color is-style-button-hover-simple-arrow has-normal-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e('Read More', 'modestra') ?></a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box primary-hover-style is-style-modestra-boxshadow","style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"blockGap":"var:preset|spacing|30","margin":{"top":"0","bottom":"0"}},"border":{"radius":"20px","width":"0px","style":"none"}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
                <div class="wp-block-group modestra-hover-box primary-hover-style is-style-modestra-boxshadow has-background-background-color has-background" style="border-style:none;border-width:0px;border-radius:20px;margin-top:0;margin-bottom:0;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"lightbox":{"enabled":false},"id":7102,"width":"75px","height":"75px","scale":"cover","sizeSlug":"full","linkDestination":"custom","style":{"border":{"radius":"12px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[2]) ?>" alt="" class="wp-image-7102" style="border-radius:12px;object-fit:cover;width:75px;height:75px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"30px"}}},"fontSize":"medium"} -->
                    <h3 class="wp-block-heading has-text-align-left has-medium-font-size" style="margin-top:30px;font-style:normal;font-weight:600"><?php esc_html_e('Mobile Application', 'modestra') ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php esc_html_e('Our team specializes in crafting compelling brand identities that resonate with your audience.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
                    <div class="wp-block-buttons" style="margin-top:24px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
                        <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-color is-style-button-hover-simple-arrow has-normal-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e('Read More', 'modestra') ?></a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->

        <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"32px"},"margin":{"top":"32px"}}}} -->
        <div class="wp-block-columns" style="margin-top:32px"><!-- wp:column -->
            <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box primary-hover-style is-style-modestra-boxshadow","style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"blockGap":"var:preset|spacing|30","margin":{"top":"0","bottom":"0"}},"border":{"radius":"20px","width":"0px","style":"none"}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
                <div class="wp-block-group modestra-hover-box primary-hover-style is-style-modestra-boxshadow has-background-background-color has-background" style="border-style:none;border-width:0px;border-radius:20px;margin-top:0;margin-bottom:0;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"lightbox":{"enabled":false},"id":7103,"width":"75px","height":"75px","scale":"cover","sizeSlug":"full","linkDestination":"custom","style":{"border":{"radius":"12px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[3]) ?>" alt="" class="wp-image-7103" style="border-radius:12px;object-fit:cover;width:75px;height:75px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"30px"}}},"fontSize":"medium"} -->
                    <h3 class="wp-block-heading has-text-align-left has-medium-font-size" style="margin-top:30px;font-style:normal;font-weight:600"><?php esc_html_e('CRM Services', 'modestra') ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php esc_html_e('Our team specializes in crafting compelling brand identities that resonate with your audience.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
                    <div class="wp-block-buttons" style="margin-top:24px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
                        <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-color is-style-button-hover-simple-arrow has-normal-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e('Read More', 'modestra') ?></a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box primary-hover-style is-style-modestra-boxshadow","style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"blockGap":"var:preset|spacing|30","margin":{"top":"0","bottom":"0"}},"border":{"radius":"20px","width":"0px","style":"none"}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
                <div class="wp-block-group modestra-hover-box primary-hover-style is-style-modestra-boxshadow has-background-background-color has-background" style="border-style:none;border-width:0px;border-radius:20px;margin-top:0;margin-bottom:0;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"lightbox":{"enabled":false},"id":7104,"width":"75px","height":"75px","scale":"cover","sizeSlug":"full","linkDestination":"custom","style":{"border":{"radius":"12px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[4]) ?>" alt="" class="wp-image-7104" style="border-radius:12px;object-fit:cover;width:75px;height:75px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"30px"}}},"fontSize":"medium"} -->
                    <h3 class="wp-block-heading has-text-align-left has-medium-font-size" style="margin-top:30px;font-style:normal;font-weight:600"><?php esc_html_e('Digital Marketing', 'modestra') ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php esc_html_e('Our team specializes in crafting compelling brand identities that resonate with your audience.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
                    <div class="wp-block-buttons" style="margin-top:24px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
                        <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-color is-style-button-hover-simple-arrow has-normal-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e('Read More', 'modestra') ?></a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box primary-hover-style is-style-modestra-boxshadow","style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"blockGap":"var:preset|spacing|30","margin":{"top":"0","bottom":"0"}},"border":{"radius":"20px","width":"0px","style":"none"}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
                <div class="wp-block-group modestra-hover-box primary-hover-style is-style-modestra-boxshadow has-background-background-color has-background" style="border-style:none;border-width:0px;border-radius:20px;margin-top:0;margin-bottom:0;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"lightbox":{"enabled":false},"id":7105,"width":"75px","height":"75px","scale":"cover","sizeSlug":"full","linkDestination":"custom","style":{"border":{"radius":"12px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[5]) ?>" alt="" class="wp-image-7105" style="border-radius:12px;object-fit:cover;width:75px;height:75px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"30px"}}},"fontSize":"medium"} -->
                    <h3 class="wp-block-heading has-text-align-left has-medium-font-size" style="margin-top:30px;font-style:normal;font-weight:600"><?php esc_html_e('Branding', 'modestra') ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php esc_html_e('Our team specializes in crafting compelling brand identities that resonate with your audience.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"24px"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
                    <div class="wp-block-buttons" style="margin-top:24px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-secondary-color is-style-button-hover-simple-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
                        <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-color is-style-button-hover-simple-arrow has-normal-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e('Read More', 'modestra') ?></a></div>
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

    <!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"74px","bottom":"0px"}}},"fontSize":"medium","layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-buttons has-custom-font-size is-style-buttons-hover-translate-effect has-medium-font-size" style="margin-top:74px;margin-bottom:0px;font-style:normal;font-weight:500"><!-- wp:button {"gradient":"gradient-primary-secondary","className":"is-style-button-gradient-background-style","style":{"spacing":{"padding":{"left":"36px","right":"36px","top":"22px","bottom":"22px"}},"border":{"radius":"60px"}}} -->
        <div class="wp-block-button is-style-button-gradient-background-style"><a class="wp-block-button__link has-gradient-primary-secondary-gradient-background has-background wp-element-button" style="border-radius:60px;padding-top:22px;padding-right:36px;padding-bottom:22px;padding-left:36px"><?php esc_html_e('Explore All Services', 'modestra') ?></a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->