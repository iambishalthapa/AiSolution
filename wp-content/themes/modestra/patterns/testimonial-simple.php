<?php

/**
 * Title: Testimonial Simple
 * Slug: modestra/testimonial-simple
 * Categories: modestra-testimoials
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/rating_star.png',
    $modestra_url . 'assets/images/member_2.png',
);
?>
<!-- wp:group {"metadata":{"categories":["modestra-testimoials"],"patternName":"modestra/testimonial-simple","name":"Testimonial Section"},"style":{"spacing":{"padding":{"top":"100px","bottom":"100px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0px","bottom":"0px"}}},"backgroundColor":"primary","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group has-primary-background-color has-background" style="margin-top:0px;margin-bottom:0px;padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"border":{"radius":"12px","width":"0px","style":"none"},"spacing":{"padding":{"top":"30px","bottom":"30px","left":"30px","right":"30px"}}},"layout":{"type":"constrained","contentSize":"680px"}} -->
    <div class="wp-block-group" style="border-style:none;border-width:0px;border-radius:12px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- wp:image {"id":4435,"width":"94px","sizeSlug":"full","linkDestination":"none"} -->
        <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4435" style="width:94px" /></figure>
        <!-- /wp:image -->

        <!-- wp:heading {"textAlign":"left","level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"big"} -->
        <h4 class="wp-block-heading has-text-align-left has-light-color-color has-text-color has-link-color has-big-font-size" style="font-style:normal;font-weight:400"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', 'modestra') ?></h4>
        <!-- /wp:heading -->

        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group"><!-- wp:image {"id":4600,"width":"84px","height":"84px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
            <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-4600" style="border-radius:50px;object-fit:cover;width:84px;height:84px" /></figure>
            <!-- /wp:image -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
            <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"16px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"medium"} -->
                <h5 class="wp-block-heading has-text-align-center has-light-color-color has-text-color has-link-color has-medium-font-size" style="margin-top:16px;font-style:normal;font-weight:600"><?php esc_html_e('Henry Benzamin', 'modestra') ?></h5>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
                <p class="has-text-align-center has-light-color-color has-text-color has-link-color"><?php esc_html_e('Fitness Coach', 'modestra') ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->