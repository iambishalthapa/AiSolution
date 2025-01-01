<?php

/**
 * Title: Contact Form 4
 * Slug: modestra/contact-form-4
 * Categories: modestra-contacts
 */
?>
<!-- wp:group {"metadata":{"categories":["modestra-contacts"],"patternName":"modestra/newsletter-layout-1","name":"Newsletter 1"},"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"100px","bottom":"100px"}}},"backgroundColor":"dark-shade","layout":{"type":"constrained","contentSize":"1040px"}} -->
<div class="wp-block-group has-dark-shade-background-color has-background" style="padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"60px"}}},"layout":{"type":"constrained","contentSize":"740px","justifyContent":"center"}} -->
    <div class="wp-block-group" style="margin-bottom:60px"><!-- wp:heading {"textAlign":"center","level":1,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
        <h1 class="wp-block-heading has-text-align-center has-light-color-color has-text-color has-link-color"><?php esc_html_e('Contact Us', 'modestra') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-shade"}}}},"textColor":"light-shade"} -->
        <p class="has-text-align-center has-light-shade-color has-text-color has-link-color"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:contact-form-7/contact-form-selector {"id":5316,"hash":"9621336","title":"Modestra Contact Form","className":"modestra-contact-form form-4"} -->
    <div class="wp-block-contact-form-7-contact-form-selector modestra-contact-form form-4">[contact-form-7 id="9621336" title="Modestra Contact Form"]</div>
    <!-- /wp:contact-form-7/contact-form-selector -->
</div>
<!-- /wp:group -->