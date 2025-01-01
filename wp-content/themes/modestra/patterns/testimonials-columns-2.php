<?php

/**
 * Title: Testimonial Layout Columns 2
 * Slug: modestra/testimonials-columns-2
 * Categories: modestra-testimoials
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/rating_star.png',
    $modestra_url . 'assets/images/member_1.png',
    $modestra_url . 'assets/images/member_2.png',
    $modestra_url . 'assets/images/member_3.png',
    $modestra_url . 'assets/images/member_6.png',
);
?>
<!-- wp:group {"metadata":{"categories":["modestra-testimoials"],"patternName":"modestra/testimonials-columns-2","name":"Testimonial Section"},"style":{"spacing":{"padding":{"top":"100px","bottom":"100px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0px","bottom":"0px"}}},"backgroundColor":"light-color","layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group has-light-color-background-color has-background" style="margin-top:0px;margin-bottom:0px;padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"60px"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"740px","justifyContent":"center"}} -->
    <div class="wp-block-group" style="margin-bottom:60px"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"18px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
        <div class="wp-block-group" style="margin-bottom:18px"><!-- wp:group {"className":"is-style-modestra-group-gradient-border","style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"15px","right":"15px"}},"border":{"radius":"50px","width":"1px"}},"backgroundColor":"transparent","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-modestra-group-gradient-border has-transparent-background-color has-background" style="border-width:1px;border-radius:50px;padding-top:8px;padding-right:15px;padding-bottom:8px;padding-left:15px"><!-- wp:heading {"level":5,"className":"is-style-default","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color","fontSize":"small"} -->
                <h5 class="wp-block-heading is-style-default has-heading-color-color has-text-color has-link-color has-small-font-size"><?php esc_html_e('Reviews &amp; Testimonials', 'modestra') ?></h5>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

        <!-- wp:heading {"textAlign":"center"} -->
        <h2 class="wp-block-heading has-text-align-center"><?php esc_html_e('What Our Customer Says!', 'modestra') ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"24px"}}}} -->
        <p class="has-text-align-center" style="margin-top:24px"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups. Ut enim ad minim veniam, quis nostrud.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"0px"},"blockGap":{"left":"30px"}}}} -->
    <div class="wp-block-columns" style="margin-top:0px"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box is-style-modestra-group-gradient-border","style":{"border":{"radius":"6px","width":"1px"},"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-modestra-group-gradient-border has-light-color-background-color has-background" style="border-width:1px;border-radius:6px;margin-top:0;margin-bottom:0;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"id":4435,"width":"94px","sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4435" style="width:94px" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph -->
                <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"40px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="margin-top:40px"><!-- wp:image {"id":4600,"width":"auto","height":"60px","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-4600" style="border-radius:50px;aspect-ratio:1;object-fit:cover;width:auto;height:60px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":5,"className":"is-style-modestra-heading-gradient-effect","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
                        <h5 class="wp-block-heading is-style-modestra-heading-gradient-effect" style="font-style:normal;font-weight:600"><?php esc_html_e('Henry Benzamin Clark', 'modestra') ?></h5>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph -->
                        <p><?php esc_html_e('Fitness Coach', 'modestra') ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box is-style-modestra-group-gradient-border","style":{"border":{"radius":"6px","width":"1px"},"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-modestra-group-gradient-border has-light-color-background-color has-background" style="border-width:1px;border-radius:6px;margin-top:0;margin-bottom:0;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"id":4435,"width":"94px","sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4435" style="width:94px" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph -->
                <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"40px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="margin-top:40px"><!-- wp:image {"id":6090,"width":"auto","height":"60px","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[2]) ?>" alt="" class="wp-image-6090" style="border-radius:50px;aspect-ratio:1;object-fit:cover;width:auto;height:60px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":5,"className":"is-style-modestra-heading-gradient-effect","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
                        <h5 class="wp-block-heading is-style-modestra-heading-gradient-effect" style="font-style:normal;font-weight:600"><?php esc_html_e('Merry Lemor', 'modestra') ?></h5>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph -->
                        <p><?php esc_html_e('Fitness Coach', 'modestra') ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"30px"},"blockGap":{"left":"30px"}}}} -->
    <div class="wp-block-columns" style="margin-top:30px"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box is-style-modestra-group-gradient-border","style":{"border":{"radius":"6px","width":"1px"},"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-modestra-group-gradient-border has-light-color-background-color has-background" style="border-width:1px;border-radius:6px;margin-top:0;margin-bottom:0;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"id":4435,"width":"94px","sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4435" style="width:94px" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph -->
                <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"40px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="margin-top:40px"><!-- wp:image {"id":4600,"width":"auto","height":"60px","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[4]) ?>" alt="" class="wp-image-4600" style="border-radius:50px;aspect-ratio:1;object-fit:cover;width:auto;height:60px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":5,"className":"is-style-modestra-heading-gradient-effect","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
                        <h5 class="wp-block-heading is-style-modestra-heading-gradient-effect" style="font-style:normal;font-weight:600"><?php esc_html_e('Henry Benzamin Clark', 'modestra') ?></h5>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph -->
                        <p><?php esc_html_e('Fitness Coach', 'modestra') ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box is-style-modestra-group-gradient-border","style":{"border":{"radius":"6px","width":"1px"},"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-modestra-group-gradient-border has-light-color-background-color has-background" style="border-width:1px;border-radius:6px;margin-top:0;margin-bottom:0;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"id":4435,"width":"94px","sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4435" style="width:94px" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph -->
                <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"40px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="margin-top:40px"><!-- wp:image {"id":6090,"width":"auto","height":"60px","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[2]) ?>" alt="" class="wp-image-6090" style="border-radius:50px;aspect-ratio:1;object-fit:cover;width:auto;height:60px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":5,"className":"is-style-modestra-heading-gradient-effect","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
                        <h5 class="wp-block-heading is-style-modestra-heading-gradient-effect" style="font-style:normal;font-weight:600"><?php esc_html_e('Merry Lemor', 'modestra') ?></h5>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph -->
                        <p><?php esc_html_e('Fitness Coach', 'modestra') ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
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