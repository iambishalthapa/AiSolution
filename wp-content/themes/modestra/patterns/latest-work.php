<?php

/**
 * Title: Latest Works Section
 * Slug: modestra/latest-work
 * Categories: modestra-portfolio
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/folio_marketing.jpg',
    $modestra_url . 'assets/images/folio_app.jpg',
    $modestra_url . 'assets/images/folio_design.jpg',
    $modestra_url . 'assets/images/folio_brand.jpg'
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"100px","bottom":"140px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"dark-shade","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group has-dark-shade-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:140px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"60px"}}}} -->
    <div class="wp-block-columns"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group"><!-- wp:heading {"level":1,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
                <h1 class="wp-block-heading has-light-color-color has-text-color has-link-color"><strong><?php esc_html_e('Portfolio', 'modestra') ?></strong></h1>
                <!-- /wp:heading -->

                <!-- wp:heading {"level":1,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
                <h1 class="wp-block-heading has-light-color-color has-text-color has-link-color"><strong><?php esc_html_e('Highlights', 'modestra') ?></strong></h1>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"modestra-portfolio-box","style":{"spacing":{"padding":{"right":"30px","left":"30px","top":"30px","bottom":"30px"},"margin":{"top":"40px"}},"border":{"radius":"20px"}},"backgroundColor":"dark-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-portfolio-box has-dark-color-background-color has-background" style="border-radius:20px;margin-top:40px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[0]) ?>","id":4374,"dimRatio":0,"customOverlayColor":"#cbbab4","isUserOverlayColor":true,"minHeight":480,"isDark":false,"style":{"border":{"radius":"20px"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-cover is-light" style="border-radius:20px;min-height:480px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#cbbab4"></span><img class="wp-block-cover__image-background wp-image-4374" alt="" src="<?php echo esc_url($modestra_images[0]) ?>" data-object-fit="cover" />
                    <div class="wp-block-cover__inner-container"><!-- wp:buttons {"className":"modestra-portfolio-details","layout":{"type":"flex","justifyContent":"center"}} -->
                        <div class="wp-block-buttons modestra-portfolio-details"><!-- wp:button {"backgroundColor":"primary","textColor":"heading-color","className":"is-style-button-hover-secondary-bgcolor","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"border":{"radius":"100px"}}} -->
                            <div class="wp-block-button is-style-button-hover-secondary-bgcolor"><a class="wp-block-button__link has-heading-color-color has-primary-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:100px"><?php esc_html_e('Learn More', 'modestra') ?></a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                </div>
                <!-- /wp:cover -->

                <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"top":"10px","bottom":"10px","left":"20px","right":"20px"}},"border":{"radius":"60px"}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group has-primary-background-color has-background" style="border-radius:60px;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px"><!-- wp:heading {"level":6,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
                        <h6 class="wp-block-heading has-light-color-color has-text-color has-link-color"><?php esc_html_e('Marketing', 'modestra') ?></h6>
                        <!-- /wp:heading -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->

                <!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"light-color","fontSize":"big"} -->
                <h3 class="wp-block-heading has-light-color-color has-text-color has-link-color has-big-font-size" style="font-style:normal;font-weight:500"><?php esc_html_e('Power up on-the-go with our app.', 'modestra') ?></h3>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"modestra-portfolio-box","style":{"spacing":{"padding":{"right":"30px","left":"30px","top":"30px","bottom":"30px"},"margin":{"top":"60px"}},"border":{"radius":"20px"}},"backgroundColor":"dark-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-portfolio-box has-dark-color-background-color has-background" style="border-radius:20px;margin-top:60px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[1]) ?>","id":4376,"dimRatio":0,"customOverlayColor":"#cbbab4","isUserOverlayColor":true,"minHeight":480,"style":{"border":{"radius":"20px"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-cover" style="border-radius:20px;min-height:480px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#cbbab4"></span><img class="wp-block-cover__image-background wp-image-4376" alt="" src="<?php echo esc_url($modestra_images[1]) ?>" data-object-fit="cover" />
                    <div class="wp-block-cover__inner-container"><!-- wp:buttons {"className":"modestra-portfolio-details","layout":{"type":"flex","justifyContent":"center"}} -->
                        <div class="wp-block-buttons modestra-portfolio-details"><!-- wp:button {"textColor":"heading-color","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"border":{"radius":"100px"}}} -->
                            <div class="wp-block-button"><a class="wp-block-button__link has-heading-color-color has-text-color has-link-color wp-element-button" href="#" style="border-radius:100px"><?php esc_html_e('Learn More', 'modestra') ?></a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                </div>
                <!-- /wp:cover -->

                <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"top":"10px","bottom":"10px","left":"20px","right":"20px"}},"border":{"radius":"60px"}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group has-primary-background-color has-background" style="border-radius:60px;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px"><!-- wp:heading {"level":6,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
                        <h6 class="wp-block-heading has-light-color-color has-text-color has-link-color"><?php esc_html_e('Mobile App', 'modestra') ?></h6>
                        <!-- /wp:heading -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->

                <!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"light-color","fontSize":"big"} -->
                <h3 class="wp-block-heading has-light-color-color has-text-color has-link-color has-big-font-size" style="font-style:normal;font-weight:500"><?php esc_html_e('Power up on-the-go with our app.', 'modestra') ?></h3>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"modestra-portfolio-box","style":{"spacing":{"padding":{"right":"30px","left":"30px","top":"30px","bottom":"30px"},"margin":{"top":"0px"}},"border":{"radius":"20px"}},"backgroundColor":"dark-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-portfolio-box has-dark-color-background-color has-background" style="border-radius:20px;margin-top:0px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[2]) ?>","id":4375,"dimRatio":0,"customOverlayColor":"#cbbab4","isUserOverlayColor":true,"minHeight":480,"isDark":false,"style":{"border":{"radius":"20px"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-cover is-light" style="border-radius:20px;min-height:480px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#cbbab4"></span><img class="wp-block-cover__image-background wp-image-4375" alt="" src="<?php echo esc_url($modestra_images[2]) ?>" data-object-fit="cover" />
                    <div class="wp-block-cover__inner-container"><!-- wp:buttons {"className":"modestra-portfolio-details","layout":{"type":"flex","justifyContent":"center"}} -->
                        <div class="wp-block-buttons modestra-portfolio-details"><!-- wp:button {"textColor":"heading-color","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"border":{"radius":"100px"}}} -->
                            <div class="wp-block-button"><a class="wp-block-button__link has-heading-color-color has-text-color has-link-color wp-element-button" href="#" style="border-radius:100px"><?php esc_html_e('Learn More', 'modestra') ?></a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                </div>
                <!-- /wp:cover -->

                <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"top":"10px","bottom":"10px","left":"20px","right":"20px"}},"border":{"radius":"60px"},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"backgroundColor":"primary","textColor":"light-color","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group has-light-color-color has-primary-background-color has-text-color has-background has-link-color" style="border-radius:60px;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px"><!-- wp:heading {"level":6,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
                        <h6 class="wp-block-heading has-light-color-color has-text-color has-link-color"><?php esc_html_e('UI/UX', 'modestra') ?></h6>
                        <!-- /wp:heading -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->

                <!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"light-color","fontSize":"big"} -->
                <h3 class="wp-block-heading has-light-color-color has-text-color has-link-color has-big-font-size" style="font-style:normal;font-weight:500"><?php esc_html_e('Power up on-the-go with our app.', 'modestra') ?></h3>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"modestra-portfolio-box","style":{"spacing":{"padding":{"right":"30px","left":"30px","top":"30px","bottom":"30px"},"margin":{"top":"60px"}},"border":{"radius":"20px"}},"backgroundColor":"dark-color","layout":{"type":"constrained"}} -->
            <div class="wp-block-group modestra-portfolio-box has-dark-color-background-color has-background" style="border-radius:20px;margin-top:60px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[3]) ?>","id":4377,"dimRatio":0,"customOverlayColor":"#cbbab4","isUserOverlayColor":true,"minHeight":480,"style":{"border":{"radius":"20px"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-cover" style="border-radius:20px;min-height:480px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#cbbab4"></span><img class="wp-block-cover__image-background wp-image-4377" alt="" src="<?php echo esc_url($modestra_images[3]) ?>" data-object-fit="cover" />
                    <div class="wp-block-cover__inner-container"><!-- wp:buttons {"className":"modestra-portfolio-details","layout":{"type":"flex","justifyContent":"center"}} -->
                        <div class="wp-block-buttons modestra-portfolio-details"><!-- wp:button {"textColor":"heading-color","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"border":{"radius":"100px"}}} -->
                            <div class="wp-block-button"><a class="wp-block-button__link has-heading-color-color has-text-color has-link-color wp-element-button" href="#" style="border-radius:100px"><?php esc_html_e('Learn More', 'modestra') ?></a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                </div>
                <!-- /wp:cover -->

                <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"top":"10px","bottom":"10px","left":"20px","right":"20px"}},"border":{"radius":"60px"}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group has-primary-background-color has-background" style="border-radius:60px;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px"><!-- wp:heading {"level":6,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
                        <h6 class="wp-block-heading has-light-color-color has-text-color has-link-color"><?php esc_html_e('Branding', 'modestra') ?></h6>
                        <!-- /wp:heading -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->

                <!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"light-color","fontSize":"big"} -->
                <h3 class="wp-block-heading has-light-color-color has-text-color has-link-color has-big-font-size" style="font-style:normal;font-weight:500"><?php esc_html_e('Power up on-the-go with our app.', 'modestra') ?></h3>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:group -->

            <!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"60px","bottom":"0px"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
            <div class="wp-block-buttons is-style-buttons-hover-translate-effect" style="margin-top:60px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"light-color","textColor":"primary","className":"is-style-button-hover-primary-arrow-style","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"border":{"radius":"60px","width":"0px","style":"none"},"typography":{"textTransform":"uppercase"},"spacing":{"padding":{"left":"32px","right":"32px","top":"17px","bottom":"17px"}}},"fontSize":"normal"} -->
                <div class="wp-block-button has-custom-font-size is-style-button-hover-primary-arrow-style has-normal-font-size" style="text-transform:uppercase"><a class="wp-block-button__link has-primary-color has-light-color-background-color has-text-color has-background has-link-color wp-element-button" style="border-style:none;border-width:0px;border-radius:60px;padding-top:17px;padding-right:32px;padding-bottom:17px;padding-left:32px"><?php esc_html_e('View all Portfolios', 'modestra') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->