<?php

/**
 * Title: About Us alternate Content
 * Slug: modestra/about-alternate
 * Categories: about
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/about_21.jpg',
    $modestra_url . 'assets/images/about_22.jpg',
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"120px","bottom":"140px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"},"blockGap":"150px"}},"backgroundColor":"background","layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group has-background-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:120px;padding-right:var(--wp--preset--spacing--40);padding-bottom:140px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"100px"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group"><!-- wp:group {"className":"is-style-modestra-group-gradient-border","style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"15px","right":"15px"}},"border":{"radius":"50px","width":"1px"}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
                <div class="wp-block-group is-style-modestra-group-gradient-border has-light-color-background-color has-background" style="border-width:1px;border-radius:50px;padding-top:8px;padding-right:15px;padding-bottom:8px;padding-left:15px"><!-- wp:heading {"level":5,"className":"is-style-default","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color","fontSize":"small"} -->
                    <h5 class="wp-block-heading is-style-default has-heading-color-color has-text-color has-link-color has-small-font-size"><?php esc_html_e('About Us', 'modestra') ?></h5>
                    <!-- /wp:heading -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:heading {"level":1,"style":{"typography":{"textTransform":"none","lineHeight":"1.3"},"spacing":{"margin":{"top":"18px"}}}} -->
            <h1 class="wp-block-heading" style="margin-top:18px;line-height:1.3;text-transform:none"><?php esc_html_e('Delivering Digital Excellence Since 2010', 'modestra') ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"20px"}}}} -->
            <p style="margin-top:20px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"className":"is-style-default","style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"20px","bottom":"0px"}}},"fontSize":"medium","layout":{"type":"flex","justifyContent":"left"}} -->
            <div class="wp-block-buttons has-custom-font-size is-style-default has-medium-font-size" style="margin-top:20px;margin-bottom:0px;font-style:normal;font-weight:500"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-simple-arrow","style":{"spacing":{"padding":{"left":"0px","right":"0px","top":"10px","bottom":"10px"}},"border":{"radius":"0px"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}}} -->
                <div class="wp-block-button is-style-button-hover-simple-arrow"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:0px;padding-top:10px;padding-right:0px;padding-bottom:10px;padding-left:0px"><?php esc_html_e('Explore More', 'modestra') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":6621,"sizeSlug":"full","linkDestination":"none","className":"is-style-modestra-boxshadow-larger","style":{"border":{"radius":"70px"},"color":{"duotone":"unset"}}} -->
            <figure class="wp-block-image size-full has-custom-border is-style-modestra-boxshadow-larger"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-6621" style="border-radius:70px" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"100px"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":6648,"sizeSlug":"full","linkDestination":"none","className":"is-style-modestra-boxshadow-larger","style":{"border":{"radius":"70px"},"color":{"duotone":"unset"}}} -->
            <figure class="wp-block-image size-full has-custom-border is-style-modestra-boxshadow-larger"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-6648" style="border-radius:70px" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group"><!-- wp:group {"className":"is-style-modestra-group-gradient-border","style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"15px","right":"15px"}},"border":{"radius":"50px","width":"1px"}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
                <div class="wp-block-group is-style-modestra-group-gradient-border has-light-color-background-color has-background" style="border-width:1px;border-radius:50px;padding-top:8px;padding-right:15px;padding-bottom:8px;padding-left:15px"><!-- wp:heading {"level":5,"className":"is-style-default","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color","fontSize":"small"} -->
                    <h5 class="wp-block-heading is-style-default has-heading-color-color has-text-color has-link-color has-small-font-size"><?php esc_html_e('One Team, One Goal', 'modestra') ?></h5>
                    <!-- /wp:heading -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:heading {"level":1,"style":{"typography":{"textTransform":"none","lineHeight":"1.3"},"spacing":{"margin":{"top":"18px"}}}} -->
            <h1 class="wp-block-heading" style="margin-top:18px;line-height:1.3;text-transform:none"><?php esc_html_e('Harnessing Our Strengths: The Power of Teamwork', 'modestra') ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"20px"}}}} -->
            <p style="margin-top:20px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"className":"is-style-default","style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"20px","bottom":"0px"}}},"fontSize":"medium","layout":{"type":"flex","justifyContent":"left"}} -->
            <div class="wp-block-buttons has-custom-font-size is-style-default has-medium-font-size" style="margin-top:20px;margin-bottom:0px;font-style:normal;font-weight:500"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-simple-arrow","style":{"spacing":{"padding":{"left":"0px","right":"0px","top":"10px","bottom":"10px"}},"border":{"radius":"0px"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}}} -->
                <div class="wp-block-button is-style-button-hover-simple-arrow"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:0px;padding-top:10px;padding-right:0px;padding-bottom:10px;padding-left:0px"><?php esc_html_e('Explore More', 'modestra') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->