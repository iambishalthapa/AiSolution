<?php

/**
 * Title: Portfolio Gallery columns 4
 * Slug: modestra/porftfolio-gallery-1
 * Categories: modestra-portfolio
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/g1.jpg',
    $modestra_url . 'assets/images/g4.jpg',
    $modestra_url . 'assets/images/g7.jpg',
    $modestra_url . 'assets/images/g8.jpg',
);
?>
<!-- wp:group {"metadata":{"categories":["modestra-portfolio"],"patternName":"modestra/photo-gallery","name":"Photo Gallery"},"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"100px","bottom":"100px"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group" style="padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"bottom":"48px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group" style="margin-bottom:48px"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"bottom":"0px"}}},"layout":{"type":"constrained","contentSize":"680px","justifyContent":"left"}} -->
        <div class="wp-block-group" style="margin-bottom:0px"><!-- wp:heading {"textAlign":"left","level":1,"style":{"spacing":{"margin":{"bottom":"0px"}},"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
            <h1 class="wp-block-heading has-text-align-left" style="margin-bottom:0px;font-style:normal;font-weight:600"><?php esc_html_e('Portfolio &amp; Gallery', 'modestra') ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"fontSize":"medium"} -->
            <p class="has-medium-font-size"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:buttons {"className":"is-style-default","style":{"spacing":{"margin":{"top":"24px"}}}} -->
        <div class="wp-block-buttons is-style-default" style="margin-top:24px"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","className":"is-style-button-hover-simple-arrow","style":{"spacing":{"padding":{"left":"0px","right":"0px","top":"10px","bottom":"10px"}},"border":{"radius":"0px","bottom":{"width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"fontSize":"medium"} -->
            <div class="wp-block-button has-custom-font-size is-style-button-hover-simple-arrow has-medium-font-size"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:0px;border-bottom-width:1px;padding-top:10px;padding-right:0px;padding-bottom:10px;padding-left:0px"><?php esc_html_e('Explore More', 'modestra') ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->

    <!-- wp:gallery {"columns":6,"linkTo":"none","sizeSlug":"full","className":"is-style-enable-grayscale-mode-on-image"} -->
    <figure class="wp-block-gallery has-nested-images columns-6 is-cropped is-style-enable-grayscale-mode-on-image"><!-- wp:image {"id":7670,"sizeSlug":"full","linkDestination":"none"} -->
        <figure class="wp-block-image size-full"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-7670" /></figure>
        <!-- /wp:image -->

        <!-- wp:image {"id":7674,"sizeSlug":"full","linkDestination":"none"} -->
        <figure class="wp-block-image size-full"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-7674" /></figure>
        <!-- /wp:image -->

        <!-- wp:image {"id":7672,"sizeSlug":"full","linkDestination":"none"} -->
        <figure class="wp-block-image size-full"><img src="<?php echo esc_url($modestra_images[2]) ?>" alt="" class="wp-image-7672" /></figure>
        <!-- /wp:image -->

        <!-- wp:image {"id":7680,"sizeSlug":"full","linkDestination":"none"} -->
        <figure class="wp-block-image size-full"><img src="<?php echo esc_url($modestra_images[3]) ?>" alt="" class="wp-image-7680" /></figure>
        <!-- /wp:image -->
    </figure>
    <!-- /wp:gallery -->
</div>
<!-- /wp:group -->