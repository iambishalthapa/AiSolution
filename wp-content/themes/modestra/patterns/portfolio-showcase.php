<?php

/**
 * Title: Portfolio Showcase
 * Slug: modestra/portfolio-showcase
 * Categories: modestra-portfolio
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/g1.jpg',
    $modestra_url . 'assets/images/g2.jpg',
    $modestra_url . 'assets/images/g3.jpg',
    $modestra_url . 'assets/images/g4.jpg',
    $modestra_url . 'assets/images/g5.jpg',
    $modestra_url . 'assets/images/g6.jpg'
);
?>
<!-- wp:group {"metadata":{"categories":["modestra-portfolio"],"patternName":"modestra/portfolio-showcase","name":"Portfolio Showcase"},"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"100px","bottom":"120px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"primary-shade","layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group has-primary-shade-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:120px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"780px"}} -->
        <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:heading {"level":1,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"typography":{"textTransform":"none"}},"textColor":"heading-color","fontSize":"xx-large"} -->
            <h1 class="wp-block-heading has-heading-color-color has-text-color has-link-color has-xx-large-font-size" style="text-transform:none"><?php esc_html_e('Portfolios', 'modestra') ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
            <p class="has-foreground-color has-text-color has-link-color"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"64px","bottom":"0px"}}},"fontSize":"medium","layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-buttons has-custom-font-size is-style-buttons-hover-translate-effect has-medium-font-size" style="margin-top:64px;margin-bottom:0px;font-style:normal;font-weight:500"><!-- wp:button {"gradient":"gradient-primary-secondary","className":"is-style-button-gradient-background-style","style":{"spacing":{"padding":{"left":"34px","right":"34px","top":"22px","bottom":"22px"}},"border":{"radius":"80px"}}} -->
            <div class="wp-block-button is-style-button-gradient-background-style"><a class="wp-block-button__link has-gradient-primary-secondary-gradient-background has-background wp-element-button" style="border-radius:80px;padding-top:22px;padding-right:34px;padding-bottom:22px;padding-left:34px"><?php esc_html_e('Explore All Portfolio', 'modestra') ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"64px"},"blockGap":{"left":"28px"}}}} -->
    <div class="wp-block-columns" style="margin-top:64px"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[0]) ?>","id":5241,"dimRatio":0,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":286,"contentPosition":"bottom center","className":"is-style-modestra-cover-modestra-overlay-content","style":{"spacing":{"padding":{"top":"24px","bottom":"24px","left":"28px","right":"28px"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center is-style-modestra-cover-modestra-overlay-content" style="padding-top:24px;padding-right:28px;padding-bottom:24px;padding-left:28px;min-height:286px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-5241" alt="" src="<?php echo esc_url($modestra_images[0]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":4} -->
                        <h4 class="wp-block-heading"><?php esc_html_e('Photography', 'modestra') ?></h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph -->
                        <p><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts.', 'modestra') ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons -->
                        <div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"transparent","textColor":"light-color","className":"is-style-fill","style":{"spacing":{"padding":{"left":"0","right":"0","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}},"border":{"radius":"0px","bottom":{"width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"typography":{"fontSize":"18px"}}} -->
                            <div class="wp-block-button has-custom-font-size is-style-fill" style="font-size:18px"><a class="wp-block-button__link has-light-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:0px;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--20);padding-right:0;padding-bottom:var(--wp--preset--spacing--20);padding-left:0"><?php esc_html_e('Learn more', 'modestra') ?></a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[1]) ?>","id":4619,"dimRatio":0,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":286,"contentPosition":"bottom center","isDark":false,"className":"is-style-modestra-cover-modestra-overlay-content","style":{"spacing":{"padding":{"top":"24px","bottom":"24px","left":"28px","right":"28px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light has-custom-content-position is-position-bottom-center is-style-modestra-cover-modestra-overlay-content has-light-color-color has-text-color has-link-color" style="padding-top:24px;padding-right:28px;padding-bottom:24px;padding-left:28px;min-height:286px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-4619" alt="" src="<?php echo esc_url($modestra_images[1]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":4} -->
                        <h4 class="wp-block-heading"><?php esc_html_e('Photography', 'modestra') ?></h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph -->
                        <p><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts.', 'modestra') ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons -->
                        <div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"transparent","textColor":"light-color","className":"is-style-fill","style":{"spacing":{"padding":{"left":"0","right":"0","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}},"border":{"radius":"0px","bottom":{"width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"typography":{"fontSize":"18px"}}} -->
                            <div class="wp-block-button has-custom-font-size is-style-fill" style="font-size:18px"><a class="wp-block-button__link has-light-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:0px;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--20);padding-right:0;padding-bottom:var(--wp--preset--spacing--20);padding-left:0"><?php esc_html_e('Learn more', 'modestra') ?></a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[2]) ?>","id":4793,"dimRatio":0,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":286,"contentPosition":"bottom center","isDark":false,"className":"is-style-modestra-cover-modestra-overlay-content","style":{"spacing":{"padding":{"top":"24px","bottom":"24px","left":"28px","right":"28px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light has-custom-content-position is-position-bottom-center is-style-modestra-cover-modestra-overlay-content has-light-color-color has-text-color has-link-color" style="padding-top:24px;padding-right:28px;padding-bottom:24px;padding-left:28px;min-height:286px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-4793" alt="" src="<?php echo esc_url($modestra_images[2]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":4} -->
                        <h4 class="wp-block-heading"><?php esc_html_e('Photography', 'modestra') ?></h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph -->
                        <p><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts.', 'modestra') ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons -->
                        <div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"transparent","textColor":"light-color","className":"is-style-fill","style":{"spacing":{"padding":{"left":"0","right":"0","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}},"border":{"radius":"0px","bottom":{"width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"typography":{"fontSize":"18px"}}} -->
                            <div class="wp-block-button has-custom-font-size is-style-fill" style="font-size:18px"><a class="wp-block-button__link has-light-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:0px;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--20);padding-right:0;padding-bottom:var(--wp--preset--spacing--20);padding-left:0"><?php esc_html_e('Learn more', 'modestra') ?></a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"28px"},"blockGap":{"left":"28px"}}}} -->
    <div class="wp-block-columns" style="margin-top:28px"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[3]) ?>","id":4375,"dimRatio":0,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":286,"contentPosition":"bottom center","isDark":false,"className":"is-style-modestra-cover-modestra-overlay-content","style":{"spacing":{"padding":{"top":"24px","bottom":"24px","left":"28px","right":"28px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light has-custom-content-position is-position-bottom-center is-style-modestra-cover-modestra-overlay-content has-light-color-color has-text-color has-link-color" style="padding-top:24px;padding-right:28px;padding-bottom:24px;padding-left:28px;min-height:286px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-4375" alt="" src="<?php echo esc_url($modestra_images[3]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":4} -->
                        <h4 class="wp-block-heading"><?php esc_html_e('Photography', 'modestra') ?></h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph -->
                        <p><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts.', 'modestra') ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons -->
                        <div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"transparent","textColor":"light-color","className":"is-style-fill","style":{"spacing":{"padding":{"left":"0","right":"0","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}},"border":{"radius":"0px","bottom":{"width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"typography":{"fontSize":"18px"}}} -->
                            <div class="wp-block-button has-custom-font-size is-style-fill" style="font-size:18px"><a class="wp-block-button__link has-light-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:0px;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--20);padding-right:0;padding-bottom:var(--wp--preset--spacing--20);padding-left:0"><?php esc_html_e('Learn more', 'modestra') ?></a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[4]) ?>","id":4138,"dimRatio":0,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":286,"contentPosition":"bottom center","isDark":false,"className":"is-style-modestra-cover-modestra-overlay-content","style":{"spacing":{"padding":{"top":"24px","bottom":"24px","left":"28px","right":"28px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light has-custom-content-position is-position-bottom-center is-style-modestra-cover-modestra-overlay-content has-light-color-color has-text-color has-link-color" style="padding-top:24px;padding-right:28px;padding-bottom:24px;padding-left:28px;min-height:286px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-4138" alt="" src="<?php echo esc_url($modestra_images[4]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":4} -->
                        <h4 class="wp-block-heading"><?php esc_html_e('Photography', 'modestra') ?></h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph -->
                        <p><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts.', 'modestra') ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons -->
                        <div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"transparent","textColor":"light-color","className":"is-style-fill","style":{"spacing":{"padding":{"left":"0","right":"0","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}},"border":{"radius":"0px","bottom":{"width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"typography":{"fontSize":"18px"}}} -->
                            <div class="wp-block-button has-custom-font-size is-style-fill" style="font-size:18px"><a class="wp-block-button__link has-light-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:0px;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--20);padding-right:0;padding-bottom:var(--wp--preset--spacing--20);padding-left:0"><?php esc_html_e('Learn more', 'modestra') ?></a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[5]) ?>","id":3918,"dimRatio":0,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":286,"contentPosition":"bottom center","isDark":false,"className":"is-style-modestra-cover-modestra-overlay-content","style":{"spacing":{"padding":{"top":"24px","bottom":"24px","left":"28px","right":"28px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light has-custom-content-position is-position-bottom-center is-style-modestra-cover-modestra-overlay-content has-light-color-color has-text-color has-link-color" style="padding-top:24px;padding-right:28px;padding-bottom:24px;padding-left:28px;min-height:286px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-3918" alt="" src="<?php echo esc_url($modestra_images[5]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":4} -->
                        <h4 class="wp-block-heading"><?php esc_html_e('Photography', 'modestra') ?></h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph -->
                        <p><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts.', 'modestra') ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons -->
                        <div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"transparent","textColor":"light-color","className":"is-style-fill","style":{"spacing":{"padding":{"left":"0","right":"0","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}},"border":{"radius":"0px","bottom":{"width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"typography":{"fontSize":"18px"}}} -->
                            <div class="wp-block-button has-custom-font-size is-style-fill" style="font-size:18px"><a class="wp-block-button__link has-light-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:0px;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--20);padding-right:0;padding-bottom:var(--wp--preset--spacing--20);padding-left:0"><?php esc_html_e('Learn more', 'modestra') ?></a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
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