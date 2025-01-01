<?php

/**
 * Title: Team Section
 * Slug: modestra/team-section
 * Categories: modestra-team
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/member_1.png',
    $modestra_url . 'assets/images/member_2.png',
    $modestra_url . 'assets/images/member_3.png'
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"120px","bottom":"120px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"dark-shade","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group has-dark-shade-background-color has-background" style="padding-top:120px;padding-right:var(--wp--preset--spacing--40);padding-bottom:120px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"780px"}} -->
    <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"10px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
        <div class="wp-block-group" style="margin-bottom:10px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"5px","bottom":"5px","left":"14px","right":"14px"}},"border":{"radius":"50px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="border-radius:50px;padding-top:5px;padding-right:14px;padding-bottom:5px;padding-left:14px"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"textTransform":"uppercase"}},"textColor":"primary","fontSize":"normal"} -->
                <p class="has-text-align-center has-primary-color has-text-color has-link-color has-normal-font-size" style="text-transform:uppercase"><?php esc_html_e('Our Team', 'modestra') ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

        <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"textTransform":"capitalize"},"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"xx-large"} -->
        <h1 class="wp-block-heading has-text-align-center has-light-color-color has-text-color has-link-color has-xx-large-font-size" style="margin-top:0;margin-bottom:0;text-transform:capitalize"><?php esc_html_e('Backed by dedicated professionals committed to excellence!', 'modestra') ?></h1>
        <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"48px"},"margin":{"top":"100px"}}}} -->
    <div class="wp-block-columns" style="margin-top:100px"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box"><!-- wp:image {"id":4571,"width":"200px","height":"200px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"200px"}}} -->
                <figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4571" style="border-radius:200px;object-fit:cover;width:200px;height:200px" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group"><!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"big"} -->
                    <h3 class="wp-block-heading has-light-color-color has-text-color has-link-color has-big-font-size" style="font-style:normal;font-weight:600"><?php esc_html_e('John Doe', 'modestra') ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
                    <p class="has-primary-color has-text-color has-link-color"><?php esc_html_e('Founder', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-shade"}}},"spacing":{"margin":{"top":"20px"}}},"textColor":"light-shade"} -->
                    <p class="has-text-align-center has-light-shade-color has-text-color has-link-color" style="margin-top:20px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFE","iconBackgroundColor":"primary","iconBackgroundColorValue":"#cdff04","style":{"spacing":{"margin":{"top":"20px"},"blockGap":{"left":"var:preset|spacing|30"}}}} -->
                    <ul class="wp-block-social-links has-icon-color has-icon-background-color" style="margin-top:20px"><!-- wp:social-link {"url":"#","service":"x"} /-->

                        <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                        <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
                    </ul>
                    <!-- /wp:social-links -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box"><!-- wp:image {"id":161,"width":"200px","height":"200px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"200px"}}} -->
                <figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-161" style="border-radius:200px;object-fit:cover;width:200px;height:200px" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group"><!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"big"} -->
                    <h3 class="wp-block-heading has-light-color-color has-text-color has-link-color has-big-font-size" style="font-style:normal;font-weight:600"><?php esc_html_e('Liana Torel', 'modestra') ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
                    <p class="has-primary-color has-text-color has-link-color"><?php esc_html_e('Founder', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-shade"}}},"spacing":{"margin":{"top":"20px"}}},"textColor":"light-shade"} -->
                    <p class="has-text-align-center has-light-shade-color has-text-color has-link-color" style="margin-top:20px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFE","iconBackgroundColor":"primary","iconBackgroundColorValue":"#cdff04","style":{"spacing":{"margin":{"top":"20px"},"blockGap":{"left":"var:preset|spacing|30"}}}} -->
                    <ul class="wp-block-social-links has-icon-color has-icon-background-color" style="margin-top:20px"><!-- wp:social-link {"url":"#","service":"x"} /-->

                        <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                        <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
                    </ul>
                    <!-- /wp:social-links -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-hover-box","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-hover-box"><!-- wp:image {"id":162,"width":"200px","height":"200px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"200px"}}} -->
                <figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[2]) ?>" alt="" class="wp-image-162" style="border-radius:200px;object-fit:cover;width:200px;height:200px" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group"><!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"big"} -->
                    <h3 class="wp-block-heading has-light-color-color has-text-color has-link-color has-big-font-size" style="font-style:normal;font-weight:600"><?php esc_html_e('Matt Marlow', 'modestra') ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
                    <p class="has-primary-color has-text-color has-link-color"><?php esc_html_e('Founder', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-shade"}}},"spacing":{"margin":{"top":"20px"}}},"textColor":"light-shade"} -->
                    <p class="has-text-align-center has-light-shade-color has-text-color has-link-color" style="margin-top:20px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFE","iconBackgroundColor":"primary","iconBackgroundColorValue":"#cdff04","style":{"spacing":{"margin":{"top":"20px"},"blockGap":{"left":"var:preset|spacing|30"}}}} -->
                    <ul class="wp-block-social-links has-icon-color has-icon-background-color" style="margin-top:20px"><!-- wp:social-link {"url":"#","service":"x"} /-->

                        <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                        <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
                    </ul>
                    <!-- /wp:social-links -->
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