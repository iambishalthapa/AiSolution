<?php

/**
 * Title: Logos Showcase
 * Slug: modestra/logo-showcase
 * Categories: modestra
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/logo_1.png',
    $modestra_url . 'assets/images/logo_2.png',
    $modestra_url . 'assets/images/logo_3.png',
    $modestra_url . 'assets/images/logo_4.png',
    $modestra_url . 'assets/images/logo_5.png',
    $modestra_url . 'assets/images/logo_6.png',
);
?>
<!-- wp:group {"metadata":{"categories":["modestra"],"patternName":"modestra/logo-showcase","name":"Logos Showcase"},"style":{"spacing":{"padding":{"top":"50px","bottom":"80px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"bottom":{"width":"0px","style":"none"},"top":[],"right":[],"left":[]}},"backgroundColor":"light-color","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group has-light-color-background-color has-background" style="border-bottom-style:none;border-bottom-width:0px;padding-top:50px;padding-right:var(--wp--preset--spacing--40);padding-bottom:80px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"680px"}} -->
    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"className":"is-style-modestra-heading-gradient-effect","style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.7"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"medium"} -->
        <h3 class="wp-block-heading has-text-align-center is-style-modestra-heading-gradient-effect has-medium-font-size" style="margin-top:0;margin-bottom:0;font-style:normal;font-weight:500;line-height:1.7"><?php esc_html_e('Partnering with Top Brands to Deliver Exceptional Products!', 'modestra') ?></h3>
        <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"margin":{"top":"74px","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
    <div class="wp-block-group" style="margin-top:74px;margin-bottom:0"><!-- wp:gallery {"columns":7,"imageCrop":false,"linkTo":"none","className":"modestra-brands is-style-default","style":{"spacing":{"margin":{"top":"40px"},"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
        <figure class="wp-block-gallery has-nested-images columns-7 modestra-brands is-style-default" style="margin-top:40px"><!-- wp:image {"id":1469,"sizeSlug":"large","linkDestination":"none"} -->
            <figure class="wp-block-image size-large"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-1469" /></figure>
            <!-- /wp:image -->

            <!-- wp:image {"id":1467,"sizeSlug":"large","linkDestination":"none"} -->
            <figure class="wp-block-image size-large"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-1467" /></figure>
            <!-- /wp:image -->

            <!-- wp:image {"id":1466,"sizeSlug":"large","linkDestination":"none"} -->
            <figure class="wp-block-image size-large"><img src="<?php echo esc_url($modestra_images[2]) ?>" alt="" class="wp-image-1466" /></figure>
            <!-- /wp:image -->

            <!-- wp:image {"id":1464,"sizeSlug":"large","linkDestination":"none"} -->
            <figure class="wp-block-image size-large"><img src="<?php echo esc_url($modestra_images[3]) ?>" alt="" class="wp-image-1464" /></figure>
            <!-- /wp:image -->

            <!-- wp:image {"id":1463,"sizeSlug":"large","linkDestination":"none"} -->
            <figure class="wp-block-image size-large"><img src="<?php echo esc_url($modestra_images[4]) ?>" alt="" class="wp-image-1463" /></figure>
            <!-- /wp:image -->

            <!-- wp:image {"id":1458,"sizeSlug":"large","linkDestination":"none"} -->
            <figure class="wp-block-image size-large"><img src="<?php echo esc_url($modestra_images[5]) ?>" alt="" class="wp-image-1458" /></figure>
            <!-- /wp:image -->
        </figure>
        <!-- /wp:gallery -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->