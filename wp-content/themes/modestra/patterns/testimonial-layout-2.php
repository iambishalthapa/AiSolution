<?php

/**
 * Title: Testimonial Style 2
 * Slug: modestra/testimonial-layout-2
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
<!-- wp:group {"metadata":{"categories":["modestra-testimoials"],"patternName":"modestra/testimonial-layout-2","name":"Testimonial Section"},"style":{"spacing":{"padding":{"top":"120px","bottom":"120px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0px","bottom":"0px"}}},"backgroundColor":"light-shade","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group has-light-shade-background-color has-background" style="margin-top:0px;margin-bottom:0px;padding-top:120px;padding-right:var(--wp--preset--spacing--40);padding-bottom:120px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"60px"}}},"layout":{"type":"constrained","contentSize":"780px","justifyContent":"center"}} -->
    <div class="wp-block-group" style="margin-bottom:60px"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"10px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
        <div class="wp-block-group" style="margin-bottom:10px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"5px","bottom":"5px","left":"14px","right":"14px"}},"border":{"radius":"50px"},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"backgroundColor":"primary-shade","textColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-light-color-color has-primary-shade-background-color has-text-color has-background has-link-color" style="border-radius:50px;padding-top:5px;padding-right:14px;padding-bottom:5px;padding-left:14px"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"textColor":"primary","fontSize":"small"} -->
                <p class="has-text-align-center has-primary-color has-text-color has-link-color has-small-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php esc_html_e('Trusted Voices', 'modestra') ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

        <!-- wp:heading {"textAlign":"center","style":{"typography":{"textTransform":"uppercase","lineHeight":"1.3"}},"fontSize":"xx-large"} -->
        <h2 class="wp-block-heading has-text-align-center has-xx-large-font-size" style="line-height:1.3;text-transform:uppercase"><?php esc_html_e('Words from Satisfied Customers', 'modestra') ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups enim ad minim veniam, quis nostru.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"0px"},"blockGap":{"left":"30px"}}}} -->
    <div class="wp-block-columns" style="margin-top:0px"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box is-style-modestra-boxshadow-medium","style":{"border":{"radius":"24px","width":"0px","style":"none"},"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-modestra-boxshadow-medium has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:24px;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
                <p style="font-size:18px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"40px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="margin-top:40px"><!-- wp:image {"id":4600,"width":"80px","height":"80px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-4600" style="border-radius:50px;object-fit:cover;width:80px;height:80px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
                        <h5 class="wp-block-heading" style="font-style:normal;font-weight:600"><?php esc_html_e('Matt Cobel', 'modestra') ?></h5>
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
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box is-style-modestra-boxshadow-medium","style":{"border":{"radius":"24px","width":"0px","style":"none"},"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-modestra-boxshadow-medium has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:24px;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
                <p style="font-size:18px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"40px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="margin-top:40px"><!-- wp:image {"id":6090,"width":"80px","height":"80px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[2]) ?>" alt="" class="wp-image-6090" style="border-radius:50px;object-fit:cover;width:80px;height:80px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
                        <h5 class="wp-block-heading" style="font-style:normal;font-weight:600"><?php esc_html_e('Liana Rode', 'modestra') ?></h5>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph -->
                        <p><?php esc_html_e('Blogger', 'modestra') ?></p>
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
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box is-style-modestra-boxshadow-medium","style":{"border":{"radius":"24px","width":"0px","style":"none"},"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-modestra-boxshadow-medium has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:24px;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
                <p style="font-size:18px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"40px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="margin-top:40px"><!-- wp:image {"id":4588,"width":"80px","height":"80px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[3]) ?>" alt="" class="wp-image-4588" style="border-radius:50px;object-fit:cover;width:80px;height:80px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
                        <h5 class="wp-block-heading" style="font-style:normal;font-weight:600"><?php esc_html_e('Lyra Powel', 'modestra') ?></h5>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph -->
                        <p><?php esc_html_e('Founder', 'modestra') ?></p>
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
</div>
<!-- /wp:group -->