<?php

/**
 * Title: Team Section Style 3
 * Slug: modestra/team-style-3
 * Categories: modestra-team
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/member_1.png',
    $modestra_url . 'assets/images/member_2.png',
    $modestra_url . 'assets/images/member_3.png',
    $modestra_url . 'assets/images/member_4.png',
    $modestra_url . 'assets/images/member_5.png',
    $modestra_url . 'assets/images/member_6.png',
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"100px","bottom":"120px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group" style="padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:120px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"740px"}} -->
    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1} -->
        <h1 class="wp-block-heading has-text-align-center"><?php esc_html_e('Meet Our Team', 'modestra') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"100px"},"blockGap":{"left":"60px"}}}} -->
    <div class="wp-block-columns" style="margin-top:100px"><!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column"><!-- wp:image {"id":4571,"width":"250px","height":"250px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"200px"}}} -->
            <figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4571" style="border-radius:200px;object-fit:cover;width:250px;height:250px" /></figure>
            <!-- /wp:image -->

            <!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"big"} -->
            <h4 class="wp-block-heading has-text-align-center has-big-font-size" style="margin-top:20px"><?php esc_html_e('Jon Doe', 'modestra') ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center"><?php esc_html_e('Founder', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"16px","bottom":"24px"}}}} -->
            <p class="has-text-align-center" style="margin-top:16px;margin-bottom:24px"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:social-links {"className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
            <ul class="wp-block-social-links is-style-logos-only"><!-- wp:social-link {"url":"#","service":"x"} /-->

                <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                <!-- wp:social-link {"url":"#","service":"dribbble"} /-->
            </ul>
            <!-- /wp:social-links -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column"><!-- wp:image {"id":4581,"width":"250px","height":"250px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"200px"}}} -->
            <figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-4581" style="border-radius:200px;object-fit:cover;width:250px;height:250px" /></figure>
            <!-- /wp:image -->

            <!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"big"} -->
            <h4 class="wp-block-heading has-text-align-center has-big-font-size" style="margin-top:20px"><?php esc_html_e('Liana Powel', 'modestra') ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center"><?php esc_html_e('Founder', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"16px","bottom":"24px"}}}} -->
            <p class="has-text-align-center" style="margin-top:16px;margin-bottom:24px"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:social-links {"className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
            <ul class="wp-block-social-links is-style-logos-only"><!-- wp:social-link {"url":"#","service":"x"} /-->

                <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                <!-- wp:social-link {"url":"#","service":"dribbble"} /-->
            </ul>
            <!-- /wp:social-links -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column"><!-- wp:image {"id":4587,"width":"250px","height":"250px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"200px"}}} -->
            <figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[2]) ?>" alt="" class="wp-image-4587" style="border-radius:200px;object-fit:cover;width:250px;height:250px" /></figure>
            <!-- /wp:image -->

            <!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"big"} -->
            <h4 class="wp-block-heading has-text-align-center has-big-font-size" style="margin-top:20px"><?php esc_html_e('Matt Marlow', 'modestra') ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center"><?php esc_html_e('Founder', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"16px","bottom":"24px"}}}} -->
            <p class="has-text-align-center" style="margin-top:16px;margin-bottom:24px"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:social-links {"className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
            <ul class="wp-block-social-links is-style-logos-only"><!-- wp:social-link {"url":"#","service":"x"} /-->

                <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                <!-- wp:social-link {"url":"#","service":"dribbble"} /-->
            </ul>
            <!-- /wp:social-links -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"60px"},"blockGap":{"left":"60px"}}}} -->
    <div class="wp-block-columns" style="margin-top:60px"><!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column"><!-- wp:image {"id":4588,"width":"250px","height":"250px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"200px"}}} -->
            <figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[3]) ?>" alt="" class="wp-image-4588" style="border-radius:200px;object-fit:cover;width:250px;height:250px" /></figure>
            <!-- /wp:image -->

            <!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"big"} -->
            <h4 class="wp-block-heading has-text-align-center has-big-font-size" style="margin-top:20px"><?php esc_html_e('Lexy Jorel', 'modestra') ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center"><?php esc_html_e('Founder', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"16px","bottom":"24px"}}}} -->
            <p class="has-text-align-center" style="margin-top:16px;margin-bottom:24px"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:social-links {"className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
            <ul class="wp-block-social-links is-style-logos-only"><!-- wp:social-link {"url":"#","service":"x"} /-->

                <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                <!-- wp:social-link {"url":"#","service":"dribbble"} /-->
            </ul>
            <!-- /wp:social-links -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column"><!-- wp:image {"id":4600,"width":"250px","height":"250px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"200px"}}} -->
            <figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[4]) ?>" alt="" class="wp-image-4600" style="border-radius:200px;object-fit:cover;width:250px;height:250px" /></figure>
            <!-- /wp:image -->

            <!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"big"} -->
            <h4 class="wp-block-heading has-text-align-center has-big-font-size" style="margin-top:20px"><?php esc_html_e('Robert Potter', 'modestra') ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center"><?php esc_html_e('Founder', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"16px","bottom":"24px"}}}} -->
            <p class="has-text-align-center" style="margin-top:16px;margin-bottom:24px"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:social-links {"className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
            <ul class="wp-block-social-links is-style-logos-only"><!-- wp:social-link {"url":"#","service":"x"} /-->

                <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                <!-- wp:social-link {"url":"#","service":"dribbble"} /-->
            </ul>
            <!-- /wp:social-links -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column"><!-- wp:image {"id":4601,"width":"250px","height":"250px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"200px"}}} -->
            <figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[5]) ?>" alt="" class="wp-image-4601" style="border-radius:200px;object-fit:cover;width:250px;height:250px" /></figure>
            <!-- /wp:image -->

            <!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"big"} -->
            <h4 class="wp-block-heading has-text-align-center has-big-font-size" style="margin-top:20px"><?php esc_html_e('Peter Barlow', 'modestra') ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center"><?php esc_html_e('Founder', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"16px","bottom":"24px"}}}} -->
            <p class="has-text-align-center" style="margin-top:16px;margin-bottom:24px"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:social-links {"className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
            <ul class="wp-block-social-links is-style-logos-only"><!-- wp:social-link {"url":"#","service":"x"} /-->

                <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                <!-- wp:social-link {"url":"#","service":"dribbble"} /-->
            </ul>
            <!-- /wp:social-links -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->