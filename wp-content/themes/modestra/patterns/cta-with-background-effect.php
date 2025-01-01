<?php

/**
 * Title: Call to Action with Background Effect
 * Slug: modestra/cta-with-background-effect
 * Categories: call-to-action
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/rocket.jpg',
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","bottom":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"light-shade","layout":{"type":"constrained","contentSize":"100%"}} -->
    <div class="wp-block-group has-light-shade-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[0]) ?>","id":7743,"dimRatio":30,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":450,"style":{"color":{"duotone":"var:preset|duotone|primary-white"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-cover" style="min-height:450px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-30 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-7743" alt="" src="<?php echo esc_url($modestra_images[0]) ?>" data-object-fit="cover" />
            <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"right":"40px","left":"40px","top":"40px","bottom":"40px"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:heading {"textAlign":"center","level":5,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
                    <h5 class="wp-block-heading has-text-align-center has-light-color-color has-text-color has-link-color"><?php esc_html_e('Your Vision, Our Expertise', 'modestra') ?></h5>
                    <!-- /wp:heading -->

                    <!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"1.2"},"spacing":{"margin":{"bottom":"20px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"xx-large"} -->
                    <h2 class="wp-block-heading has-text-align-center has-light-color-color has-text-color has-link-color has-xx-large-font-size" style="margin-bottom:20px;line-height:1.2"><?php esc_html_e('Transforming Ideas into Impactful Solutions', 'modestra') ?></h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"medium"} -->
                    <p class="has-text-align-center has-light-color-color has-text-color has-link-color has-medium-font-size"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups. sed do eiusmod tempor incididunt ut labore.', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"spacing":{"margin":{"top":"40px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons is-style-buttons-hover-translate-effect" style="margin-top:40px"><!-- wp:button {"style":{"spacing":{"padding":{"left":"28px","right":"28px","top":"17px","bottom":"17px"}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
                        <div class="wp-block-button has-custom-font-size has-normal-font-size" style="font-style:normal;font-weight:500"><a class="wp-block-button__link wp-element-button" style="padding-top:17px;padding-right:28px;padding-bottom:17px;padding-left:28px"><?php esc_html_e('Get Started', 'modestra') ?></a></div>
                        <!-- /wp:button -->

                        <!-- wp:button {"backgroundColor":"transparent","textColor":"light-color","className":"is-style-button-hover-secondary-bgcolor","style":{"spacing":{"padding":{"left":"28px","right":"28px","top":"16px","bottom":"16px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"border":{"width":"1px"},"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
                        <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-bgcolor has-normal-font-size" style="font-style:normal;font-weight:500"><a class="wp-block-button__link has-light-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="border-width:1px;padding-top:16px;padding-right:28px;padding-bottom:16px;padding-left:28px"><?php esc_html_e('Download Modestra', 'modestra') ?></a></div>
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
</div>
<!-- /wp:group -->