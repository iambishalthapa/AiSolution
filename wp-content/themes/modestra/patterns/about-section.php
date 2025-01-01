<?php

/**
 * Title: About Section
 * Slug: modestra/about-section
 * Categories: about
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/about_9.jpg',
    $modestra_url . 'assets/images/streaks_icon.png',
);
?>
<!-- wp:group {"metadata":{"categories":["about"],"patternName":"modestra/about-section","name":"About Section"},"style":{"spacing":{"padding":{"top":"120px","bottom":"120px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"light-shade","layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group has-light-shade-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:120px;padding-right:var(--wp--preset--spacing--40);padding-bottom:120px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"80px"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:image {"id":5979,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"40px"}}} -->
            <figure class="wp-block-image size-full has-custom-border"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-5979" style="border-radius:40px" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:heading {"level":1,"className":"is-style-modestra-heading-gradient-effect","style":{"typography":{"textTransform":"none","lineHeight":"1.3"}},"fontSize":"xx-large"} -->
            <h1 class="wp-block-heading is-style-modestra-heading-gradient-effect has-xx-large-font-size" style="line-height:1.3;text-transform:none"><?php esc_html_e('Building Trust and Relationships', 'modestra') ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip consequat.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:columns {"style":{"spacing":{"margin":{"top":"32px"},"padding":{"top":"32px"}},"border":{"top":{"color":"var:preset|color|border-color","width":"1px"}}}} -->
            <div class="wp-block-columns" style="border-top-color:var(--wp--preset--color--border-color);border-top-width:1px;margin-top:32px;padding-top:32px"><!-- wp:column -->
                <div class="wp-block-column"><!-- wp:image {"id":5991,"width":"22px","height":"24px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|white-primary"}}} -->
                    <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-5991" style="object-fit:cover;width:22px;height:24px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph -->
                    <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column"><!-- wp:image {"id":5991,"width":"22px","height":"24px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|white-primary"}}} -->
                    <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-5991" style="object-fit:cover;width:22px;height:24px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph -->
                    <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->

            <!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"40px","bottom":"0px"}}},"fontSize":"medium","layout":{"type":"flex","justifyContent":"left"}} -->
            <div class="wp-block-buttons has-custom-font-size is-style-buttons-hover-translate-effect has-medium-font-size" style="margin-top:40px;margin-bottom:0px;font-style:normal;font-weight:500"><!-- wp:button {"gradient":"gradient-primary-secondary","className":"is-style-button-gradient-background-style","style":{"spacing":{"padding":{"left":"32px","right":"32px","top":"18px","bottom":"18px"}},"border":{"radius":"60px"}}} -->
                <div class="wp-block-button is-style-button-gradient-background-style"><a class="wp-block-button__link has-gradient-primary-secondary-gradient-background has-background wp-element-button" style="border-radius:60px;padding-top:18px;padding-right:32px;padding-bottom:18px;padding-left:32px"><?php esc_html_e('Explore More', 'modestra') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->