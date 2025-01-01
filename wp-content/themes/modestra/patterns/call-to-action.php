<?php

/**
 * Title: Call to Action
 * Slug: modestra/call-to-action
 * Categories: call-to-action
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"100px","bottom":"120px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"primary","layout":{"type":"constrained","contentSize":"780px"}} -->
<div class="wp-block-group has-primary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:120px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:heading {"textAlign":"center","level":1,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
    <h1 class="wp-block-heading has-text-align-center has-light-color-color has-text-color has-link-color"><?php esc_html_e('Ready to Transform Your Website?', 'modestra') ?></h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
    <p class="has-text-align-center has-light-color-color has-text-color has-link-color"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries.', 'modestra') ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons {"className":"modestra-translate-effect is-style-buttons-hover-translate-effect","style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"40px","bottom":"60px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-buttons modestra-translate-effect is-style-buttons-hover-translate-effect" style="margin-top:40px;margin-bottom:60px"><!-- wp:button {"backgroundColor":"light-color","textColor":"primary","className":"is-style-button-hover-primary-arrow-style","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"border":{"radius":"60px","width":"1px"},"typography":{"textTransform":"uppercase"},"spacing":{"padding":{"left":"32px","right":"32px","top":"14px","bottom":"14px"}}},"fontSize":"normal","borderColor":"heading-color"} -->
        <div class="wp-block-button has-custom-font-size is-style-button-hover-primary-arrow-style has-normal-font-size" style="text-transform:uppercase"><a class="wp-block-button__link has-primary-color has-light-color-background-color has-text-color has-background has-link-color has-border-color has-heading-color-border-color wp-element-button" style="border-width:1px;border-radius:60px;padding-top:14px;padding-right:32px;padding-bottom:14px;padding-left:32px"><?php esc_html_e('Schedule an Appointment', 'modestra') ?></a></div>
        <!-- /wp:button -->

        <!-- wp:button {"backgroundColor":"transparent","textColor":"light-color","className":"is-style-button-hover-secondary-bgcolor","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"border":{"radius":"60px","width":"1px"},"typography":{"textTransform":"uppercase"},"spacing":{"padding":{"left":"40px","right":"40px","top":"22px","bottom":"22px"}}},"fontSize":"normal","borderColor":"light-color"} -->
        <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-bgcolor has-normal-font-size" style="text-transform:uppercase"><a class="wp-block-button__link has-light-color-color has-transparent-background-color has-text-color has-background has-link-color has-border-color has-light-color-border-color wp-element-button" style="border-width:1px;border-radius:60px;padding-top:22px;padding-right:40px;padding-bottom:22px;padding-left:40px"><?php esc_html_e('Request demo', 'modestra') ?></a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->