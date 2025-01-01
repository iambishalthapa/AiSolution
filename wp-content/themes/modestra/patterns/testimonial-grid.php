<?php

/**
 * Title: Testimonial Grid
 * Slug: modestra/testimonial-grid
 * Categories: modestra-testimoials
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/rating_star.png',
    $modestra_url . 'assets/images/member_5.png',
    $modestra_url . 'assets/images/member_3.png',
    $modestra_url . 'assets/images/member_2.png',
    $modestra_url . 'assets/images/member_6.png',
    $modestra_url . 'assets/images/member_1.png',
    $modestra_url . 'assets/images/member_4.png',
);
?>
<!-- wp:group {"metadata":{"categories":["modestra-testimoials"],"patternName":"modestra/testimonial-layout-2","name":"Testimonial Section"},"style":{"spacing":{"padding":{"top":"20px","bottom":"130px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0px","bottom":"0px"}}},"gradient":"gradient-light-alt","layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group has-gradient-light-alt-gradient-background has-background" style="margin-top:0px;margin-bottom:0px;padding-top:20px;padding-right:var(--wp--preset--spacing--40);padding-bottom:130px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"60px"}}},"layout":{"type":"constrained","contentSize":"780px","justifyContent":"center"}} -->
    <div class="wp-block-group" style="margin-bottom:60px"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
        <div class="wp-block-group"><!-- wp:group {"className":"is-style-modestra-group-gradient-border","style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"15px","right":"15px"}},"border":{"radius":"50px","width":"1px"}},"backgroundColor":"transparent","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-modestra-group-gradient-border has-transparent-background-color has-background" style="border-width:1px;border-radius:50px;padding-top:8px;padding-right:15px;padding-bottom:8px;padding-left:15px"><!-- wp:heading {"level":5,"className":"is-style-default","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color","fontSize":"small"} -->
                <h5 class="wp-block-heading is-style-default has-heading-color-color has-text-color has-link-color has-small-font-size"><?php esc_html_e('Reviews &amp; Testimonials', 'modestra') ?></h5>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

        <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"textTransform":"none","lineHeight":"1.3"}}} -->
        <h1 class="wp-block-heading has-text-align-center" style="line-height:1.3;text-transform:none"><?php esc_html_e('Words From Satisfied Customers', 'modestra') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups enim ad minim veniam, quis nostru.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"0px"},"blockGap":{"left":"28px"}}}} -->
    <div class="wp-block-columns" style="margin-top:0px"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box is-style-modestra-boxshadow","style":{"border":{"radius":"30px","width":"0px","style":"none"},"spacing":{"padding":{"top":"28px","bottom":"28px","left":"28px","right":"28px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-modestra-boxshadow has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:30px;margin-top:0;margin-bottom:0;padding-top:28px;padding-right:28px;padding-bottom:28px;padding-left:28px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
                <p style="font-size:18px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"40px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="margin-top:40px"><!-- wp:image {"id":4600,"width":"80px","height":"80px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-4600" style="border-radius:50px;object-fit:cover;width:80px;height:80px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":5,"className":"is-style-modestra-heading-gradient-effect","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
                        <h5 class="wp-block-heading is-style-modestra-heading-gradient-effect" style="font-style:normal;font-weight:600"><?php esc_html_e('Matt Cobel', 'modestra') ?></h5>
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
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box is-style-modestra-boxshadow","style":{"border":{"radius":"30px","width":"0px","style":"none"},"spacing":{"padding":{"top":"28px","bottom":"28px","left":"28px","right":"28px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-modestra-boxshadow has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:30px;margin-top:0;margin-bottom:0;padding-top:28px;padding-right:28px;padding-bottom:28px;padding-left:28px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
                <p style="font-size:18px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"40px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="margin-top:40px"><!-- wp:image {"id":6090,"width":"80px","height":"80px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[2]) ?>" alt="" class="wp-image-6090" style="border-radius:50px;object-fit:cover;width:80px;height:80px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":5,"className":"is-style-modestra-heading-gradient-effect","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
                        <h5 class="wp-block-heading is-style-modestra-heading-gradient-effect" style="font-style:normal;font-weight:600"><?php esc_html_e('Alexa Peter', 'modestra') ?></h5>
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
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box is-style-modestra-boxshadow","style":{"border":{"radius":"30px","width":"0px","style":"none"},"spacing":{"padding":{"top":"28px","bottom":"28px","left":"28px","right":"28px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-modestra-boxshadow has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:30px;margin-top:0;margin-bottom:0;padding-top:28px;padding-right:28px;padding-bottom:28px;padding-left:28px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
                <p style="font-size:18px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"40px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="margin-top:40px"><!-- wp:image {"id":6091,"width":"80px","height":"80px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[3]) ?>" alt="" class="wp-image-6091" style="border-radius:50px;object-fit:cover;width:80px;height:80px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":5,"className":"is-style-modestra-heading-gradient-effect","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
                        <h5 class="wp-block-heading is-style-modestra-heading-gradient-effect" style="font-style:normal;font-weight:600"><?php esc_html_e('Robert Mathew', 'modestra') ?></h5>
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
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"28px"},"blockGap":{"left":"28px"}}}} -->
    <div class="wp-block-columns" style="margin-top:28px"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box is-style-modestra-boxshadow","style":{"border":{"radius":"30px","width":"0px","style":"none"},"spacing":{"padding":{"top":"28px","bottom":"28px","left":"28px","right":"28px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-modestra-boxshadow has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:30px;margin-top:0;margin-bottom:0;padding-top:28px;padding-right:28px;padding-bottom:28px;padding-left:28px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
                <p style="font-size:18px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"40px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="margin-top:40px"><!-- wp:image {"id":4600,"width":"80px","height":"80px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[4]) ?>" alt="" class="wp-image-4600" style="border-radius:50px;object-fit:cover;width:80px;height:80px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":5,"className":"is-style-modestra-heading-gradient-effect","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
                        <h5 class="wp-block-heading is-style-modestra-heading-gradient-effect" style="font-style:normal;font-weight:600"><?php esc_html_e('Matt Powel', 'modestra') ?></h5>
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
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box is-style-modestra-boxshadow","style":{"border":{"radius":"30px","width":"0px","style":"none"},"spacing":{"padding":{"top":"28px","bottom":"28px","left":"28px","right":"28px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-modestra-boxshadow has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:30px;margin-top:0;margin-bottom:0;padding-top:28px;padding-right:28px;padding-bottom:28px;padding-left:28px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
                <p style="font-size:18px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"40px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="margin-top:40px"><!-- wp:image {"id":6090,"width":"80px","height":"80px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[5]) ?>" alt="" class="wp-image-6090" style="border-radius:50px;object-fit:cover;width:80px;height:80px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":5,"className":"is-style-modestra-heading-gradient-effect","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
                        <h5 class="wp-block-heading is-style-modestra-heading-gradient-effect" style="font-style:normal;font-weight:600"><?php esc_html_e('Liana Rollex', 'modestra') ?></h5>
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
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box is-style-modestra-boxshadow","style":{"border":{"radius":"30px","width":"0px","style":"none"},"spacing":{"padding":{"top":"28px","bottom":"28px","left":"28px","right":"28px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-modestra-boxshadow has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:30px;margin-top:0;margin-bottom:0;padding-top:28px;padding-right:28px;padding-bottom:28px;padding-left:28px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
                <p style="font-size:18px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"40px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="margin-top:40px"><!-- wp:image {"id":6091,"width":"80px","height":"80px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[6]) ?>" alt="" class="wp-image-6091" style="border-radius:50px;object-fit:cover;width:80px;height:80px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":5,"className":"is-style-modestra-heading-gradient-effect","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
                        <h5 class="wp-block-heading is-style-modestra-heading-gradient-effect" style="font-style:normal;font-weight:600"><?php esc_html_e('Alex Pandiyan', 'modestra') ?></h5>
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
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"74px","bottom":"0px"}}},"fontSize":"medium","layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-buttons has-custom-font-size is-style-buttons-hover-translate-effect has-medium-font-size" style="margin-top:74px;margin-bottom:0px;font-style:normal;font-weight:500"><!-- wp:button {"gradient":"gradient-primary-secondary","className":"is-style-button-gradient-background-style","style":{"spacing":{"padding":{"left":"40px","right":"40px","top":"22px","bottom":"22px"}},"border":{"radius":"60px"}}} -->
        <div class="wp-block-button is-style-button-gradient-background-style"><a class="wp-block-button__link has-gradient-primary-secondary-gradient-background has-background wp-element-button" style="border-radius:60px;padding-top:22px;padding-right:40px;padding-bottom:22px;padding-left:40px"><?php esc_html_e('Read all Reviews', 'modestra') ?></a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->