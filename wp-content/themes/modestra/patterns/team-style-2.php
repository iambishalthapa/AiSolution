<?php

/**
 * Title: Team Section Style 2
 * Slug: modestra/team-style-2
 * Categories: modestra-team
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/member_1.png',
    $modestra_url . 'assets/images/member_2.png',
    $modestra_url . 'assets/images/member_4.png',
    $modestra_url . 'assets/images/member_3.png',
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

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"90px"}}}} -->
    <div class="wp-block-columns" style="margin-top:90px"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:columns {"verticalAlignment":"center"} -->
            <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
                <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":4571,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"10px"}}} -->
                    <figure class="wp-block-image size-full has-custom-border"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4571" style="border-radius:10px" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
                <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"level":4,"fontSize":"big"} -->
                    <h4 class="wp-block-heading has-big-font-size"><?php esc_html_e('Jon Doe', 'modestra') ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php esc_html_e('Founder', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"16px","bottom":"24px"}}}} -->
                    <p style="margin-top:16px;margin-bottom:24px"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
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
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:columns {"verticalAlignment":"center"} -->
            <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
                <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":4581,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"10px"}}} -->
                    <figure class="wp-block-image size-full has-custom-border"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-4581" style="border-radius:10px" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
                <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"level":4,"fontSize":"big"} -->
                    <h4 class="wp-block-heading has-big-font-size"><?php esc_html_e('Alexa Lorel', 'modestra') ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php esc_html_e('CTO', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"16px","bottom":"24px"}}}} -->
                    <p style="margin-top:16px;margin-bottom:24px"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
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
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"60px"}}}} -->
    <div class="wp-block-columns" style="margin-top:60px"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:columns {"verticalAlignment":"center"} -->
            <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
                <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":4588,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"10px"}}} -->
                    <figure class="wp-block-image size-full has-custom-border"><img src="<?php echo esc_url($modestra_images[2]) ?>" alt="" class="wp-image-4588" style="border-radius:10px" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
                <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"level":4,"fontSize":"big"} -->
                    <h4 class="wp-block-heading has-big-font-size"><?php esc_html_e('Liana Powel', 'modestra') ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php esc_html_e('Manager', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"16px","bottom":"24px"}}}} -->
                    <p style="margin-top:16px;margin-bottom:24px"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
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
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:columns {"verticalAlignment":"center"} -->
            <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
                <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":4587,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"10px"}}} -->
                    <figure class="wp-block-image size-full has-custom-border"><img src="<?php echo esc_url($modestra_images[3]) ?>" alt="" class="wp-image-4587" style="border-radius:10px" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
                <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"level":4,"fontSize":"big"} -->
                    <h4 class="wp-block-heading has-big-font-size"><?php esc_html_e('Matt Barlow', 'modestra') ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php esc_html_e('Project Manager', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"16px","bottom":"24px"}}}} -->
                    <p style="margin-top:16px;margin-bottom:24px"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
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
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->