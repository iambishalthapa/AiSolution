<?php

/**
 * Title: Call to Action with full width image
 * Slug: modestra/cta-with-media
 * Categories: call-to-action, about
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/rocket.jpg',
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","bottom":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"light-shade","layout":{"type":"constrained","contentSize":"100%"}} -->
    <div class="wp-block-group has-light-shade-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[0]) ?>","id":7743,"dimRatio":0,"customOverlayColor":"#7a8292","minHeight":450,"isDark":false,"style":{"color":{"duotone":"var:preset|duotone|white-primary"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-cover is-light" style="min-height:450px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#7a8292"></span><img class="wp-block-cover__image-background wp-image-7743" alt="" src="<?php echo esc_url($modestra_images[0]) ?>" data-object-fit="cover" />
            <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                <p class="has-text-align-center has-large-font-size"></p>
                <!-- /wp:paragraph -->
            </div>
        </div>
        <!-- /wp:cover -->

        <!-- wp:group {"style":{"spacing":{"padding":{"right":"40px","left":"40px","top":"40px","bottom":"40px"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
        <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:heading {"level":5} -->
            <h5 class="wp-block-heading"><?php esc_html_e('Your Vision, Our Expertise', 'modestra') ?></h5>
            <!-- /wp:heading -->

            <!-- wp:heading {"style":{"typography":{"lineHeight":"1.2","fontSize":"40px"},"spacing":{"margin":{"bottom":"20px"}}}} -->
            <h2 class="wp-block-heading" style="margin-bottom:20px;font-size:40px;line-height:1.2"><?php esc_html_e('Transforming Ideas into Impactful Solutions', 'modestra') ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"fontSize":"medium"} -->
            <p class="has-medium-font-size"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"spacing":{"margin":{"top":"28px"}}}} -->
            <div class="wp-block-buttons is-style-buttons-hover-translate-effect" style="margin-top:28px"><!-- wp:button {"style":{"spacing":{"padding":{"left":"28px","right":"28px","top":"17px","bottom":"17px"}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
                <div class="wp-block-button has-custom-font-size has-normal-font-size" style="font-style:normal;font-weight:500"><a class="wp-block-button__link wp-element-button" style="padding-top:17px;padding-right:28px;padding-bottom:17px;padding-left:28px"><?php esc_html_e('Download Modestra', 'modestra') ?></a></div>
                <!-- /wp:button -->

                <!-- wp:button {"backgroundColor":"transparent","textColor":"primary","className":"is-style-button-gradient-border-style","style":{"spacing":{"padding":{"left":"28px","right":"28px","top":"16px","bottom":"16px"}},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"border":{"width":"1px"},"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal"} -->
                <div class="wp-block-button has-custom-font-size is-style-button-gradient-border-style has-normal-font-size" style="font-style:normal;font-weight:500"><a class="wp-block-button__link has-primary-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="border-width:1px;padding-top:16px;padding-right:28px;padding-bottom:16px;padding-left:28px"><?php esc_html_e('Explore More about Modestra', 'modestra') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->