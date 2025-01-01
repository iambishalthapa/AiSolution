<?php

/**
 * Title: Contact Form Full Width
 * Slug: modestra/contact-fullwidth-form
 * Categories: modestra-contacts
 */
?>
<!-- wp:group {"metadata":{"categories":["modestra-contacts"],"patternName":"modestra/contact-fullwidth-form","name":"Contact Form Full Width"},"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"100px","bottom":"100px"}},"color":{"gradient":"linear-gradient(180deg,rgba(51,51,51,0.99) 68%,rgb(255,255,255) 68%)"}},"layout":{"type":"constrained","contentSize":"980px"}} -->
<div class="wp-block-group has-background" style="background:linear-gradient(180deg,rgba(51,51,51,0.99) 68%,rgb(255,255,255) 68%);padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:heading {"textAlign":"center","level":1,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
    <h1 class="wp-block-heading has-text-align-center has-light-color-color has-text-color has-link-color"><?php esc_html_e('Contact Us', 'modestra') ?></h1>
    <!-- /wp:heading -->

    <!-- wp:group {"layout":{"type":"constrained","contentSize":"640px"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|meta-color"}}}},"textColor":"meta-color"} -->
        <p class="has-text-align-center has-meta-color-color has-text-color has-link-color"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"is-style-modestra-boxshadow-medium","style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"margin":{"top":"60px"}}},"backgroundColor":"light-color","layout":{"type":"constrained","contentSize":"100%"}} -->
    <div class="wp-block-group is-style-modestra-boxshadow-medium has-light-color-background-color has-background" style="margin-top:60px;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:heading {"textAlign":"left","level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"heading-color","fontSize":"big"} -->
        <h3 class="wp-block-heading has-text-align-left has-heading-color-color has-text-color has-link-color has-big-font-size" style="font-style:normal;font-weight:600"><?php esc_html_e('Send Us Message', 'modestra') ?></h3>
        <!-- /wp:heading -->

        <!-- wp:contact-form-7/contact-form-selector {"id":5316,"hash":"9621336","title":"Modestra Contact Form","className":"modestra-contact-form"} -->
        <div class="wp-block-contact-form-7-contact-form-selector modestra-contact-form">[contact-form-7 id="9621336" title="Modestra Contact Form"]</div>
        <!-- /wp:contact-form-7/contact-form-selector -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->