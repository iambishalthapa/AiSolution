<?php

/**
 * Title: Testimonial Section Centered
 * Slug: modestra/testimonial-section-centered
 * Categories: modestra-testimoials
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/rating_star.png',
    $modestra_url . 'assets/images/member_5.png',
    $modestra_url . 'assets/images/member_2.png',
    $modestra_url . 'assets/images/member_6.png',
);
?>
<!-- wp:group {"metadata":{"categories":["modestra-testimoials"],"patternName":"modestra/testimonial-layout-2","name":"Testimonial Section"},"style":{"spacing":{"padding":{"top":"100px","bottom":"100px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0px","bottom":"0px"}}},"backgroundColor":"primary-shade","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group has-primary-shade-background-color has-background" style="margin-top:0px;margin-bottom:0px;padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"60px"}}},"layout":{"type":"constrained","contentSize":"860px","justifyContent":"center"}} -->
    <div class="wp-block-group" style="margin-bottom:60px"><!-- wp:heading {"textAlign":"center"} -->
        <h2 class="wp-block-heading has-text-align-center"><?php esc_html_e('Testimonials &amp; Reviews', 'modestra') ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups. Ut enim ad minim veniam, quis nostrud exercitation ullamco consequat.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"0px"},"blockGap":{"left":"30px"}}}} -->
    <div class="wp-block-columns" style="margin-top:0px"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box is-style-modestra-boxshadow-medium","style":{"border":{"radius":"12px","width":"0px","style":"none"},"spacing":{"padding":{"top":"30px","bottom":"30px","left":"30px","right":"30px"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-modestra-boxshadow-medium has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:12px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- wp:image {"id":4435,"width":"94px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4435" style="width:94px" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group"><!-- wp:image {"id":4600,"width":"100px","height":"100px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-4600" style="border-radius:50px;object-fit:cover;width:100px;height:100px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"textAlign":"center","level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"16px"}}}} -->
                    <h5 class="wp-block-heading has-text-align-center" style="margin-top:16px;font-style:normal;font-weight:600"><?php esc_html_e('Henry Benzamin', 'modestra') ?></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><?php esc_html_e('Fitness Coach', 'modestra') ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box is-style-modestra-boxshadow-medium","style":{"border":{"radius":"12px","width":"0px","style":"none"},"spacing":{"padding":{"top":"30px","bottom":"30px","left":"30px","right":"30px"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-modestra-boxshadow-medium has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:12px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- wp:image {"id":4435,"width":"94px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4435" style="width:94px" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group"><!-- wp:image {"id":4581,"width":"100px","height":"100px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[2]) ?>" alt="" class="wp-image-4581" style="border-radius:50px;object-fit:cover;width:100px;height:100px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"textAlign":"center","level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"16px"}}}} -->
                    <h5 class="wp-block-heading has-text-align-center" style="margin-top:16px;font-style:normal;font-weight:600"><?php esc_html_e('Rose Loyar', 'modestra') ?></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><?php esc_html_e('Fitness Coach', 'modestra') ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box is-style-modestra-boxshadow-medium","style":{"border":{"radius":"12px","width":"0px","style":"none"},"spacing":{"padding":{"top":"30px","bottom":"30px","left":"30px","right":"30px"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-modestra-boxshadow-medium has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:12px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- wp:image {"id":4435,"width":"94px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4435" style="width:94px" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group"><!-- wp:image {"id":4601,"width":"100px","height":"100px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[3]) ?>" alt="" class="wp-image-4601" style="border-radius:50px;object-fit:cover;width:100px;height:100px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"textAlign":"center","level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"16px"}}}} -->
                    <h5 class="wp-block-heading has-text-align-center" style="margin-top:16px;font-style:normal;font-weight:600"><?php esc_html_e('Robert Matt', 'modestra') ?></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><?php esc_html_e('Fitness Coach', 'modestra') ?></p>
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