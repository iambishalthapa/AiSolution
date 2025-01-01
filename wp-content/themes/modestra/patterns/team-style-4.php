<?php

/**
 * Title: Team Section Style 4
 * Slug: modestra/team-style-4
 * Categories: modestra-team
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/member_1.png',
    $modestra_url . 'assets/images/member_2.png',
    $modestra_url . 'assets/images/member_3.png',
);
?>
<!-- wp:group {"metadata":{"categories":["modestra-team"],"patternName":"modestra/team-style-4","name":"Team Section Style 4"},"style":{"spacing":{"padding":{"top":"100px","bottom":"120px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group" style="padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:120px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"740px"}} -->
    <div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
        <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":5,"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"small"} -->
            <h5 class="wp-block-heading has-text-align-center has-small-font-size" style="text-transform:uppercase"><?php esc_html_e('Our Team', 'modestra') ?></h5>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:heading {"textAlign":"center","level":1} -->
        <h1 class="wp-block-heading has-text-align-center"><?php esc_html_e('Meet Our Team', 'modestra') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"80px"},"blockGap":{"left":"40px"}}}} -->
    <div class="wp-block-columns" style="margin-top:80px"><!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[0]) ?>","id":4571,"dimRatio":50,"isUserOverlayColor":true,"minHeight":460,"customGradient":"linear-gradient(180deg,rgba(255,84,51,0) 54%,rgb(0,0,0) 100%)","contentPosition":"bottom center","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"24px","bottom":"24px","left":"24px","right":"24px"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px;min-height:460px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(180deg,rgba(255,84,51,0) 54%,rgb(0,0,0) 100%)"></span><img class="wp-block-cover__image-background wp-image-4571" alt="" src="<?php echo esc_url($modestra_images[0]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"big"} -->
                    <h4 class="wp-block-heading has-text-align-center has-big-font-size" style="margin-top:20px"><?php esc_html_e('Jon Doe', 'modestra') ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><?php esc_html_e('Founder', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFE","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                    <ul class="wp-block-social-links has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"x"} /-->

                        <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                        <!-- wp:social-link {"url":"#","service":"dribbble"} /-->
                    </ul>
                    <!-- /wp:social-links -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[1]) ?>","id":4581,"dimRatio":50,"isUserOverlayColor":true,"minHeight":460,"gradient":"gradient-bg-one","contentPosition":"bottom center","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"24px","bottom":"24px","left":"24px","right":"24px"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px;min-height:460px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-gradient-bg-one-gradient-background"></span><img class="wp-block-cover__image-background wp-image-4581" alt="" src="<?php echo esc_url($modestra_images[1]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"big"} -->
                    <h4 class="wp-block-heading has-text-align-center has-big-font-size" style="margin-top:20px"><?php esc_html_e('Liyana Porel', 'modestra') ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><?php esc_html_e('Project Manager', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFE","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                    <ul class="wp-block-social-links has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"x"} /-->

                        <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                        <!-- wp:social-link {"url":"#","service":"dribbble"} /-->
                    </ul>
                    <!-- /wp:social-links -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[2]) ?>","id":4587,"dimRatio":50,"isUserOverlayColor":true,"minHeight":460,"gradient":"gradient-bg-one","contentPosition":"bottom center","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"24px","bottom":"24px","left":"24px","right":"24px"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px;min-height:460px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-gradient-bg-one-gradient-background"></span><img class="wp-block-cover__image-background wp-image-4587" alt="" src="<?php echo esc_url($modestra_images[2]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"big"} -->
                    <h4 class="wp-block-heading has-text-align-center has-big-font-size" style="margin-top:20px"><?php esc_html_e('Robert Matt', 'modestra') ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><?php esc_html_e('CTO', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFE","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                    <ul class="wp-block-social-links has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"x"} /-->

                        <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                        <!-- wp:social-link {"url":"#","service":"dribbble"} /-->
                    </ul>
                    <!-- /wp:social-links -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->