<?php

/**
 * Title: Call to Action with Background Image
 * Slug: modestra/call-to-action-3
 * Categories: call-to-action
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/cta_bg.jpg',
);
?>
<!-- wp:group {"metadata":{"categories":["call-to-action"],"patternName":"modestra/call-to-action","name":"Call to Action"},"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0px","bottom":"0px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"light-color","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group has-light-color-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0px;padding-right:0;padding-bottom:0px;padding-left:0"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[0]) ?>","id":4701,"dimRatio":20,"overlayColor":"dark-shade","isUserOverlayColor":true,"minHeight":500,"layout":{"type":"constrained","contentSize":"780px"}} -->
    <div class="wp-block-cover" style="min-height:500px"><span aria-hidden="true" class="wp-block-cover__background has-dark-shade-background-color has-background-dim-20 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-4701" alt="" src="<?php echo esc_url($modestra_images[0]) ?>" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1} -->
            <h1 class="wp-block-heading has-text-align-center"><?php esc_html_e('Ready to Transform Your Website?', 'modestra') ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"className":"modestra-translate-effect is-style-buttons-hover-translate-effect","style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"40px","bottom":"20px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-buttons modestra-translate-effect is-style-buttons-hover-translate-effect" style="margin-top:40px;margin-bottom:20px"><!-- wp:button {"backgroundColor":"light-color","textColor":"heading-color","className":"is-style-button-hover-dark-arrow-style","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"border":{"radius":"60px","width":"0px","style":"none"},"typography":{"textTransform":"uppercase"},"spacing":{"padding":{"left":"32px","right":"32px","top":"14px","bottom":"14px"}}},"fontSize":"normal"} -->
                <div class="wp-block-button has-custom-font-size is-style-button-hover-dark-arrow-style has-normal-font-size" style="text-transform:uppercase"><a class="wp-block-button__link has-heading-color-color has-light-color-background-color has-text-color has-background has-link-color wp-element-button" style="border-style:none;border-width:0px;border-radius:60px;padding-top:14px;padding-right:32px;padding-bottom:14px;padding-left:32px"><?php esc_html_e('Schedule an Appointment', 'modestra') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->