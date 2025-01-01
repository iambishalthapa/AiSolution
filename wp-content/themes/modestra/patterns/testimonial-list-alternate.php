<?php

/**
 * Title: Testimonial Alternate List
 * Slug: modestra/testimonial-list-alternate
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
<!-- wp:group {"metadata":{"categories":["modestra-testimoials"],"patternName":"modestra/testimonial-section","name":"Testimonial Section"},"style":{"spacing":{"padding":{"top":"100px","bottom":"100px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0px","bottom":"0px"}}},"backgroundColor":"light-color","layout":{"type":"constrained","contentSize":"980px"}} -->
<div class="wp-block-group has-light-color-background-color has-background" style="margin-top:0px;margin-bottom:0px;padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"60px"}}},"layout":{"type":"constrained","contentSize":"860px","justifyContent":"center"}} -->
    <div class="wp-block-group" style="margin-bottom:60px"><!-- wp:heading {"textAlign":"center"} -->
        <h2 class="wp-block-heading has-text-align-center"><?php esc_html_e('Testimonials &amp; Reviews', 'modestra') ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups. Ut enim ad minim veniam, quis nostrud exercitation ullamco consequat.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"border":{"radius":"12px","width":"0px","style":"none"},"spacing":{"padding":{"top":"30px","bottom":"30px","left":"30px","right":"30px"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
    <div class="wp-block-group has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:12px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"64px"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":4600,"width":"300px","height":"300px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"right","style":{"border":{"radius":"50%"}}} -->
                <figure class="wp-block-image alignright size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-4600" style="border-radius:50%;object-fit:cover;width:300px;height:300px" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"big"} -->
                <h5 class="wp-block-heading has-big-font-size" style="font-style:normal;font-weight:600"><?php esc_html_e('Great plugin, most recommended', 'modestra') ?></h5>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group"><!-- wp:heading {"level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"normal"} -->
                    <h5 class="wp-block-heading has-normal-font-size" style="font-style:normal;font-weight:600"><?php esc_html_e('Henry Benzamin Clark', 'modestra') ?></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php esc_html_e('Fitness Coach', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:image {"id":4435,"width":"94px","sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4435" style="width:94px" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"border":{"radius":"12px","width":"0px","style":"none"},"spacing":{"padding":{"top":"30px","bottom":"30px","left":"30px","right":"30px"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
    <div class="wp-block-group has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:12px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"64px"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":""} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"big"} -->
                <h5 class="wp-block-heading has-big-font-size" style="font-style:normal;font-weight:600"><?php esc_html_e('Great plugin, most recommended', 'modestra') ?></h5>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group"><!-- wp:heading {"level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"normal"} -->
                    <h5 class="wp-block-heading has-normal-font-size" style="font-style:normal;font-weight:600"><?php esc_html_e('Liyana Powel', 'modestra') ?></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php esc_html_e('Fitness Coach', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:image {"id":4435,"width":"94px","sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4435" style="width:94px" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":4581,"width":"300px","height":"300px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"left","style":{"border":{"radius":"50%"}}} -->
                <figure class="wp-block-image alignleft size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[2]) ?>" alt="" class="wp-image-4581" style="border-radius:50%;object-fit:cover;width:300px;height:300px" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"border":{"radius":"12px","width":"0px","style":"none"},"spacing":{"padding":{"top":"30px","bottom":"30px","left":"30px","right":"30px"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
    <div class="wp-block-group has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:12px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"64px"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":4601,"width":"300px","height":"300px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"right","style":{"border":{"radius":"50%"}}} -->
                <figure class="wp-block-image alignright size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[3]) ?>" alt="" class="wp-image-4601" style="border-radius:50%;object-fit:cover;width:300px;height:300px" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":""} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"big"} -->
                <h5 class="wp-block-heading has-big-font-size" style="font-style:normal;font-weight:600"><?php esc_html_e('Great plugin, most recommended', 'modestra') ?></h5>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group"><!-- wp:heading {"level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"normal"} -->
                    <h5 class="wp-block-heading has-normal-font-size" style="font-style:normal;font-weight:600"><?php esc_html_e('Matt Robertson', 'modestra') ?></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php esc_html_e('Fitness Coach', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:image {"id":4435,"width":"94px","sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4435" style="width:94px" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->