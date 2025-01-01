<?php

/**
 * Title: Team Section Style 6
 * Slug: modestra/team-style-6
 * Categories: modestra-team
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/member_1.png',
    $modestra_url . 'assets/images/member_2.png',
    $modestra_url . 'assets/images/member_3.png',
);
?>
<!-- wp:group {"metadata":{"categories":["modestra-team"],"patternName":"modestra/team-style-4","name":"Team Section Style 4"},"style":{"spacing":{"padding":{"top":"120px","bottom":"120px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:120px;padding-right:var(--wp--preset--spacing--40);padding-bottom:120px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"780px"}} -->
    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"textTransform":"uppercase","lineHeight":"1.3"}},"fontSize":"xx-large"} -->
        <h1 class="wp-block-heading has-text-align-center has-xx-large-font-size" style="line-height:1.3;text-transform:uppercase"><?php esc_html_e('Masterminds Powering Modestra', 'modestra') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"64px"},"blockGap":{"left":"30px"}}}} -->
    <div class="wp-block-columns" style="margin-top:64px"><!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[0]) ?>","id":6089,"dimRatio":0,"isUserOverlayColor":true,"minHeight":490,"contentPosition":"bottom center","isDark":false,"className":"is-style-modestra-cover-modestra-translate-effect","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"}},"border":{"radius":"20px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light has-custom-content-position is-position-bottom-center is-style-modestra-cover-modestra-translate-effect" style="border-radius:20px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;min-height:490px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-6089" alt="" src="<?php echo esc_url($modestra_images[0]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"}},"border":{"radius":"20px"}},"backgroundColor":"heading-color","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group has-heading-color-background-color has-background" style="border-radius:20px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
                        <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                            <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:heading {"textAlign":"left","level":4,"style":{"spacing":{"margin":{"top":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"medium"} -->
                                <h4 class="wp-block-heading has-text-align-left has-light-color-color has-text-color has-link-color has-medium-font-size" style="margin-top:0px"><?php esc_html_e('Jon Doe', 'modestra') ?></h4>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
                                <p class="has-text-align-left has-primary-color has-text-color has-link-color"><?php esc_html_e('Founder', 'modestra') ?></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->

                            <!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFE","iconBackgroundColor":"primary","iconBackgroundColorValue":"#5B50FF","className":"is-style-default","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                            <ul class="wp-block-social-links has-icon-color has-icon-background-color is-style-default"><!-- wp:social-link {"url":"#","service":"x"} /-->

                                <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
                            </ul>
                            <!-- /wp:social-links -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[1]) ?>","id":6090,"dimRatio":0,"isUserOverlayColor":true,"minHeight":490,"contentPosition":"bottom center","isDark":false,"className":"is-style-modestra-cover-modestra-translate-effect","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"}},"border":{"radius":"20px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light has-custom-content-position is-position-bottom-center is-style-modestra-cover-modestra-translate-effect" style="border-radius:20px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;min-height:490px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-6090" alt="" src="<?php echo esc_url($modestra_images[1]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"}},"border":{"radius":"20px"}},"backgroundColor":"heading-color","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group has-heading-color-background-color has-background" style="border-radius:20px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
                        <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                            <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:heading {"textAlign":"left","level":4,"style":{"spacing":{"margin":{"top":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"medium"} -->
                                <h4 class="wp-block-heading has-text-align-left has-light-color-color has-text-color has-link-color has-medium-font-size" style="margin-top:0px"><?php esc_html_e('Alexa Powel', 'modestra') ?></h4>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
                                <p class="has-text-align-left has-primary-color has-text-color has-link-color"><?php esc_html_e('Founder', 'modestra') ?></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->

                            <!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFE","iconBackgroundColor":"primary","iconBackgroundColorValue":"#5B50FF","className":"is-style-default","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                            <ul class="wp-block-social-links has-icon-color has-icon-background-color is-style-default"><!-- wp:social-link {"url":"#","service":"x"} /-->

                                <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
                            </ul>
                            <!-- /wp:social-links -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[2]) ?>","id":6091,"dimRatio":0,"isUserOverlayColor":true,"minHeight":490,"minHeightUnit":"px","contentPosition":"bottom center","isDark":false,"className":"is-style-modestra-cover-modestra-translate-effect","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"}},"border":{"radius":"20px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light has-custom-content-position is-position-bottom-center is-style-modestra-cover-modestra-translate-effect" style="border-radius:20px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;min-height:490px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-6091" alt="" src="<?php echo esc_url($modestra_images[2]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"}},"border":{"radius":"20px"}},"backgroundColor":"heading-color","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group has-heading-color-background-color has-background" style="border-radius:20px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
                        <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                            <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:heading {"textAlign":"left","level":4,"style":{"spacing":{"margin":{"top":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"medium"} -->
                                <h4 class="wp-block-heading has-text-align-left has-light-color-color has-text-color has-link-color has-medium-font-size" style="margin-top:0px"><?php esc_html_e('Matt Robert', 'modestra') ?></h4>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
                                <p class="has-text-align-left has-primary-color has-text-color has-link-color"><?php esc_html_e('Founder', 'modestra') ?></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->

                            <!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFE","iconBackgroundColor":"primary","iconBackgroundColorValue":"#5B50FF","className":"is-style-default","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                            <ul class="wp-block-social-links has-icon-color has-icon-background-color is-style-default"><!-- wp:social-link {"url":"#","service":"x"} /-->

                                <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
                            </ul>
                            <!-- /wp:social-links -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->