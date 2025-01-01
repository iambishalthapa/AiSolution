<?php

/**
 * Title: Hero With Background Image
 * Slug: modestra/hero-with-background-image
 * Categories: modestra-hero
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/hero_bg.jpg',
);
?>
<!-- wp:group {"metadata":{"categories":["modestra-hero"],"patternName":"modestra/hero-with-background-image","name":"Hero With Background Image"},"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[0]) ?>","id":4775,"dimRatio":50,"overlayColor":"dark-shade","isUserOverlayColor":true,"minHeight":680,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
    <div class="wp-block-cover" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:680px"><span aria-hidden="true" class="wp-block-cover__background has-dark-shade-background-color has-background-dim"></span><img class="wp-block-cover__image-background wp-image-4775" alt="" src="<?php echo esc_url($modestra_images[0]) ?>" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"24px","bottom":"24px"},"margin":{"top":"0","bottom":"0"}},"border":{"bottom":{"color":"#e9ebdf33","width":"1px"},"top":[],"right":[],"left":[]}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
            <div class="wp-block-group" style="border-bottom-color:#e9ebdf33;border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:24px;padding-right:var(--wp--preset--spacing--40);padding-bottom:24px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
                <div class="wp-block-group"><!-- wp:site-title {"fontSize":"x-large"} /-->

                    <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right"}} -->
                    <div class="wp-block-group"><!-- wp:navigation {"ref":4450} /-->

                        <!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"layout":{"selfStretch":"fit","flexSize":null}}} -->
                        <div class="wp-block-buttons is-style-buttons-hover-translate-effect"><!-- wp:button {"backgroundColor":"primary","textColor":"light-color","className":"is-style-button-hover-secondary-bgcolor","style":{"spacing":{"padding":{"left":"40px","right":"40px","top":"16px","bottom":"16px"}},"border":{"radius":"60px"},"typography":{"textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}}} -->
                            <div class="wp-block-button is-style-button-hover-secondary-bgcolor" style="text-transform:uppercase"><a class="wp-block-button__link has-light-color-color has-primary-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:60px;padding-top:16px;padding-right:40px;padding-bottom:16px;padding-left:40px"><?php esc_html_e('Get Started', 'modestra') ?></a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"120px","bottom":"120px"},"margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":"600px"}},"layout":{"type":"constrained","contentSize":"980px","justifyContent":"center"}} -->
            <div class="wp-block-group" style="min-height:600px;margin-top:0;margin-bottom:0;padding-top:120px;padding-right:var(--wp--preset--spacing--40);padding-bottom:120px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"100px","textTransform":"uppercase"}}} -->
                <h1 class="wp-block-heading has-text-align-center" style="font-size:100px;text-transform:uppercase"><?php esc_html_e('Creative Thinker', 'modestra') ?></h1>
                <!-- /wp:heading -->

                <!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"48px","bottom":"0px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons is-style-buttons-hover-translate-effect" style="margin-top:48px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"light-color","textColor":"primary","className":"is-style-button-hover-primary-arrow-style","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"border":{"radius":"60px","width":"1px"},"typography":{"textTransform":"uppercase"},"spacing":{"padding":{"left":"32px","right":"32px","top":"14px","bottom":"14px"}}},"fontSize":"normal","borderColor":"light-color"} -->
                    <div class="wp-block-button has-custom-font-size is-style-button-hover-primary-arrow-style has-normal-font-size" style="text-transform:uppercase"><a class="wp-block-button__link has-primary-color has-light-color-background-color has-text-color has-background has-link-color has-border-color has-light-color-border-color wp-element-button" style="border-width:1px;border-radius:60px;padding-top:14px;padding-right:32px;padding-bottom:14px;padding-left:32px"><?php esc_html_e('Explore More', 'modestra') ?></a></div>
                    <!-- /wp:button -->

                    <!-- wp:button {"backgroundColor":"transparent","textColor":"light-color","className":"is-style-button-hover-secondary-bgcolor","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"border":{"radius":"60px","width":"1px"},"typography":{"textTransform":"uppercase"},"spacing":{"padding":{"left":"40px","right":"40px","top":"22px","bottom":"22px"}}},"fontSize":"normal","borderColor":"light-color"} -->
                    <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-bgcolor has-normal-font-size" style="text-transform:uppercase"><a class="wp-block-button__link has-light-color-color has-transparent-background-color has-text-color has-background has-link-color has-border-color has-light-color-border-color wp-element-button" style="border-width:1px;border-radius:60px;padding-top:22px;padding-right:40px;padding-bottom:22px;padding-left:40px"><?php esc_html_e('Request Demo', 'modestra') ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->