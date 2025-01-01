<?php

/**
 * Title: Testimonial Style with Sticky Section
 * Slug: modestra/testimonial-layout-3
 * Categories: modestra-testimoials
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/rating_star.png',
    $modestra_url . 'assets/images/member_5.png',
    $modestra_url . 'assets/images/member_2.png',
    $modestra_url . 'assets/images/member_1.png',
);
?>
<!-- wp:group {"metadata":{"categories":["modestra-testimoials"],"patternName":"modestra/testimonial-layout-3","name":"Testimonial Section"},"style":{"spacing":{"padding":{"top":"120px","bottom":"120px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0px","bottom":"0px"}}},"gradient":"gradient-light","layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group has-gradient-light-gradient-background has-background" style="margin-top:0px;margin-bottom:0px;padding-top:120px;padding-right:var(--wp--preset--spacing--40);padding-bottom:120px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"style":{"spacing":{"margin":{"top":"0px"},"blockGap":{"left":"64px"}}}} -->
    <div class="wp-block-columns" style="margin-top:0px"><!-- wp:column {"width":"40%"} -->
        <div class="wp-block-column" style="flex-basis:40%"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"60px"}},"position":{"type":"sticky","top":"0px"}},"layout":{"type":"constrained","contentSize":"860px","justifyContent":"center"}} -->
            <div class="wp-block-group" style="margin-bottom:60px"><!-- wp:heading {"textAlign":"left"} -->
                <h2 class="wp-block-heading has-text-align-left"><?php esc_html_e('Testimonials &amp; Reviews', 'modestra') ?></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"left"} -->
                <p class="has-text-align-left"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups. Ut enim ad minim veniam, quis nostrud exercitation ullamco consequat.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"40px","bottom":"70px"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
                <div class="wp-block-buttons is-style-buttons-hover-translate-effect" style="margin-top:40px;margin-bottom:70px"><!-- wp:button {"textColor":"light-color","gradient":"gradient-primary-secondary","className":"is-style-button-gradient-background-style","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"border":{"radius":"60px","width":"0px","style":"none"},"spacing":{"padding":{"left":"32px","right":"32px","top":"18px","bottom":"18px"}}},"fontSize":"normal"} -->
                    <div class="wp-block-button has-custom-font-size is-style-button-gradient-background-style has-normal-font-size"><a class="wp-block-button__link has-light-color-color has-gradient-primary-secondary-gradient-background has-text-color has-background has-link-color wp-element-button" style="border-style:none;border-width:0px;border-radius:60px;padding-top:18px;padding-right:32px;padding-bottom:18px;padding-left:32px">Explore all Reviews</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box is-style-modestra-boxshadow","style":{"border":{"radius":"6px","width":"0px","style":"none"},"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-modestra-boxshadow has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:6px;margin-top:0;margin-bottom:0;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"id":4435,"width":"94px","sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4435" style="width:94px" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph {"align":"left","fontSize":"medium"} -->
                <p class="has-text-align-left has-medium-font-size"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"border":{"top":{"color":"var:preset|color|border-color","width":"1px"}},"spacing":{"padding":{"top":"28px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="border-top-color:var(--wp--preset--color--border-color);border-top-width:1px;padding-top:28px"><!-- wp:image {"id":4600,"width":"80px","height":"80px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-4600" style="border-radius:50px;object-fit:cover;width:80px;height:80px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"textAlign":"left","level":5,"className":"is-style-modestra-heading-gradient-effect","style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"16px"}}}} -->
                        <h5 class="wp-block-heading has-text-align-left is-style-modestra-heading-gradient-effect" style="margin-top:16px;font-style:normal;font-weight:600"><?php esc_html_e('Henry Benzamin', 'modestra') ?></h5>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"align":"left"} -->
                        <p class="has-text-align-left"><?php esc_html_e('Freelancer', 'modestra') ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"modestra-hover-box is-style-modestra-boxshadow","style":{"border":{"radius":"6px","width":"0px","style":"none"},"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"margin":{"top":"24px","bottom":"0"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-modestra-boxshadow has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:6px;margin-top:24px;margin-bottom:0;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"id":4435,"width":"94px","sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4435" style="width:94px" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph {"align":"left","fontSize":"medium"} -->
                <p class="has-text-align-left has-medium-font-size"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"border":{"top":{"color":"var:preset|color|border-color","width":"1px"}},"spacing":{"padding":{"top":"28px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="border-top-color:var(--wp--preset--color--border-color);border-top-width:1px;padding-top:28px"><!-- wp:image {"id":6090,"width":"80px","height":"80px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[2]) ?>" alt="" class="wp-image-6090" style="border-radius:50px;object-fit:cover;width:80px;height:80px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"textAlign":"left","level":5,"className":"is-style-modestra-heading-gradient-effect","style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"16px"}}}} -->
                        <h5 class="wp-block-heading has-text-align-left is-style-modestra-heading-gradient-effect" style="margin-top:16px;font-style:normal;font-weight:600"><?php esc_html_e('Alexa Povmen', 'modestra') ?></h5>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"align":"left"} -->
                        <p class="has-text-align-left"><?php esc_html_e('Blogger', 'modestra') ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"modestra-hover-box is-style-modestra-boxshadow","style":{"border":{"radius":"6px","width":"0px","style":"none"},"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"margin":{"top":"24px","bottom":"0"}}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box is-style-modestra-boxshadow has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:6px;margin-top:24px;margin-bottom:0;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"id":4435,"width":"94px","sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4435" style="width:94px" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph {"align":"left","fontSize":"medium"} -->
                <p class="has-text-align-left has-medium-font-size"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"border":{"top":{"color":"var:preset|color|border-color","width":"1px"}},"spacing":{"padding":{"top":"28px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="border-top-color:var(--wp--preset--color--border-color);border-top-width:1px;padding-top:28px"><!-- wp:image {"id":6089,"width":"80px","height":"80px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[3]) ?>" alt="" class="wp-image-6089" style="border-radius:50px;object-fit:cover;width:80px;height:80px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"textAlign":"left","level":5,"className":"is-style-modestra-heading-gradient-effect","style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"16px"}}}} -->
                        <h5 class="wp-block-heading has-text-align-left is-style-modestra-heading-gradient-effect" style="margin-top:16px;font-style:normal;font-weight:600"><?php esc_html_e('Jon Doe', 'modestra') ?></h5>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"align":"left"} -->
                        <p class="has-text-align-left"><?php esc_html_e('Founder', 'modestra') ?></p>
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