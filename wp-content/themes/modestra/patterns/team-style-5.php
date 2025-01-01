<?php

/**
 * Title: Team Section Style 5
 * Slug: modestra/team-style-5
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
<!-- wp:group {"metadata":{"categories":["modestra-team"],"patternName":"modestra/team-style-5","name":"Team Section Style 5"},"style":{"spacing":{"padding":{"top":"100px","bottom":"120px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:120px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"740px"}} -->
    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1} -->
        <h1 class="wp-block-heading has-text-align-center"><?php esc_html_e('Meet Our Team', 'modestra') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"84px"},"blockGap":{"left":"64px"}}}} -->
    <div class="wp-block-columns" style="margin-top:84px"><!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[0]) ?>","id":4571,"dimRatio":0,"customOverlayColor":"#a8a19d","minHeight":380,"isDark":false,"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light" style="min-height:380px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#a8a19d"></span><img class="wp-block-cover__image-background wp-image-4571" alt="" src="<?php echo esc_url($modestra_images[0]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->

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
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[1]) ?>","id":4581,"dimRatio":0,"customOverlayColor":"#8c706b","minHeight":380,"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="min-height:380px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#8c706b"></span><img class="wp-block-cover__image-background wp-image-4581" alt="" src="<?php echo esc_url($modestra_images[1]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->

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
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[2]) ?>","id":4587,"dimRatio":0,"customOverlayColor":"#cfcdce","minHeight":380,"isDark":false,"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light" style="min-height:380px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#cfcdce"></span><img class="wp-block-cover__image-background wp-image-4587" alt="" src="<?php echo esc_url($modestra_images[2]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->

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

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"64px"},"blockGap":{"left":"64px"}}}} -->
    <div class="wp-block-columns" style="margin-top:64px"><!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[3]) ?>","id":4588,"dimRatio":0,"customOverlayColor":"#b3aeac","minHeight":380,"isDark":false,"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light" style="min-height:380px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#b3aeac"></span><img class="wp-block-cover__image-background wp-image-4588" alt="" src="<?php echo esc_url($modestra_images[3]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->

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
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[4]) ?>","id":4600,"dimRatio":0,"customOverlayColor":"#7e6b61","minHeight":380,"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="min-height:380px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#7e6b61"></span><img class="wp-block-cover__image-background wp-image-4600" alt="" src="<?php echo esc_url($modestra_images[4]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->

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
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[5]) ?>","id":4601,"dimRatio":0,"customOverlayColor":"#bfbcb4","minHeight":380,"isDark":false,"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light" style="min-height:380px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#bfbcb4"></span><img class="wp-block-cover__image-background wp-image-4601" alt="" src="<?php echo esc_url($modestra_images[5]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->

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