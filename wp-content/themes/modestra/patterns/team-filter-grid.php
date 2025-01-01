<?php

/**
 * Title: Team Grid with Filter Style
 * Slug: modestra/team-filter-grid
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
<!-- wp:group {"metadata":{"categories":["modestra-team"],"patternName":"modestra/team-style-4","name":"Team Section Style 4"},"style":{"spacing":{"padding":{"top":"100px","bottom":"120px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group" style="padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:120px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"840px"}} -->
    <div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
        <div class="wp-block-group"><!-- wp:group {"className":"is-style-modestra-group-gradient-border","style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"15px","right":"15px"}},"border":{"radius":"50px","width":"1px"}},"backgroundColor":"transparent","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-modestra-group-gradient-border has-transparent-background-color has-background" style="border-width:1px;border-radius:50px;padding-top:8px;padding-right:15px;padding-bottom:8px;padding-left:15px"><!-- wp:heading {"level":5,"className":"is-style-default","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color","fontSize":"small"} -->
                <h5 class="wp-block-heading is-style-default has-heading-color-color has-text-color has-link-color has-small-font-size"><?php esc_html_e('Our Team', 'modestra') ?></h5>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

        <!-- wp:heading {"textAlign":"center","level":1} -->
        <h1 class="wp-block-heading has-text-align-center"><?php esc_html_e('Get to Know the People Behind the Brand', 'modestra') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"64px"},"blockGap":{"left":"0px"}}}} -->
    <div class="wp-block-columns" style="margin-top:64px"><!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[0]) ?>","id":4571,"dimRatio":50,"isUserOverlayColor":true,"minHeight":410,"customGradient":"linear-gradient(180deg,rgba(255,84,51,0) 54%,rgb(0,0,0) 100%)","contentPosition":"bottom center","className":"is-style-modestra-cover-modestra-translate-effect","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"24px","bottom":"24px","left":"24px","right":"24px"}},"color":{"duotone":"var:preset|duotone|white-primary"},"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center is-style-modestra-cover-modestra-translate-effect" style="border-radius:0px;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px;min-height:410px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(180deg,rgba(255,84,51,0) 54%,rgb(0,0,0) 100%)"></span><img class="wp-block-cover__image-background wp-image-4571" alt="" src="<?php echo esc_url($modestra_images[0]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"left","level":4,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"big"} -->
                    <h4 class="wp-block-heading has-text-align-left has-big-font-size" style="margin-top:20px"><?php esc_html_e('Jon Doe', 'modestra') ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"left"} -->
                    <p class="has-text-align-left"><?php esc_html_e('Founder', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFE","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
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
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[1]) ?>","id":4581,"dimRatio":50,"isUserOverlayColor":true,"minHeight":410,"gradient":"gradient-bg-one","contentPosition":"bottom center","className":"is-style-modestra-cover-modestra-translate-effect","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"24px","bottom":"24px","left":"24px","right":"24px"}},"color":{"duotone":"var:preset|duotone|secodnary-white"},"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center is-style-modestra-cover-modestra-translate-effect" style="border-radius:0px;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px;min-height:410px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-gradient-bg-one-gradient-background"></span><img class="wp-block-cover__image-background wp-image-4581" alt="" src="<?php echo esc_url($modestra_images[1]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"left","level":4,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"big"} -->
                    <h4 class="wp-block-heading has-text-align-left has-big-font-size" style="margin-top:20px"><?php esc_html_e('Liyana Porel', 'modestra') ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"left"} -->
                    <p class="has-text-align-left"><?php esc_html_e('Project Manager', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFE","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
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
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[2]) ?>","id":4587,"dimRatio":50,"isUserOverlayColor":true,"minHeight":410,"gradient":"gradient-bg-one","contentPosition":"bottom center","className":"is-style-modestra-cover-modestra-translate-effect","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"24px","bottom":"24px","left":"24px","right":"24px"}},"color":{"duotone":"var:preset|duotone|white-primary"},"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center is-style-modestra-cover-modestra-translate-effect" style="border-radius:0px;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px;min-height:410px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-gradient-bg-one-gradient-background"></span><img class="wp-block-cover__image-background wp-image-4587" alt="" src="<?php echo esc_url($modestra_images[2]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"left","level":4,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"big"} -->
                    <h4 class="wp-block-heading has-text-align-left has-big-font-size" style="margin-top:20px"><?php esc_html_e('Robert Matt', 'modestra') ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"left"} -->
                    <p class="has-text-align-left"><?php esc_html_e('CTO', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFE","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
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

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"0px"},"blockGap":{"left":"0px"}}}} -->
    <div class="wp-block-columns" style="margin-top:0px"><!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[3]) ?>","id":4571,"dimRatio":50,"isUserOverlayColor":true,"minHeight":410,"customGradient":"linear-gradient(180deg,rgba(255,84,51,0) 54%,rgb(0,0,0) 100%)","contentPosition":"bottom center","className":"is-style-modestra-cover-modestra-translate-effect","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"24px","bottom":"24px","left":"24px","right":"24px"}},"color":{"duotone":"var:preset|duotone|secodnary-white"},"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center is-style-modestra-cover-modestra-translate-effect" style="border-radius:0px;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px;min-height:410px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(180deg,rgba(255,84,51,0) 54%,rgb(0,0,0) 100%)"></span><img class="wp-block-cover__image-background wp-image-4571" alt="" src="<?php echo esc_url($modestra_images[3]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"left","level":4,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"big"} -->
                    <h4 class="wp-block-heading has-text-align-left has-big-font-size" style="margin-top:20px"><?php esc_html_e('Jon Doe', 'modestra') ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"left"} -->
                    <p class="has-text-align-left"><?php esc_html_e('Founder', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFE","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
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
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[4]) ?>","id":4581,"dimRatio":50,"isUserOverlayColor":true,"minHeight":410,"gradient":"gradient-bg-one","contentPosition":"bottom center","className":"is-style-modestra-cover-modestra-translate-effect","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"24px","bottom":"24px","left":"24px","right":"24px"}},"color":{"duotone":"var:preset|duotone|white-primary"},"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center is-style-modestra-cover-modestra-translate-effect" style="border-radius:0px;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px;min-height:410px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-gradient-bg-one-gradient-background"></span><img class="wp-block-cover__image-background wp-image-4581" alt="" src="<?php echo esc_url($modestra_images[4]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"left","level":4,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"big"} -->
                    <h4 class="wp-block-heading has-text-align-left has-big-font-size" style="margin-top:20px"><?php esc_html_e('Liyana Porel', 'modestra') ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"left"} -->
                    <p class="has-text-align-left"><?php esc_html_e('Project Manager', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFE","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
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
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[5]) ?>","id":4587,"dimRatio":50,"isUserOverlayColor":true,"minHeight":410,"gradient":"gradient-bg-one","contentPosition":"bottom center","className":"is-style-modestra-cover-modestra-translate-effect","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"24px","bottom":"24px","left":"24px","right":"24px"}},"color":{"duotone":"var:preset|duotone|secodnary-white"},"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center is-style-modestra-cover-modestra-translate-effect" style="border-radius:0px;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px;min-height:410px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-gradient-bg-one-gradient-background"></span><img class="wp-block-cover__image-background wp-image-4587" alt="" src="<?php echo esc_url($modestra_images[5]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"left","level":4,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"big"} -->
                    <h4 class="wp-block-heading has-text-align-left has-big-font-size" style="margin-top:20px"><?php esc_html_e('Robert Matt', 'modestra') ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"left"} -->
                    <p class="has-text-align-left"><?php esc_html_e('CTO', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFE","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
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