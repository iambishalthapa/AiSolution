<?php

/**
 * Title: Newsletter 4
 * Slug: modestra/newsletter-layout-4
 * Categories: modestra-contacts
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"100px","bottom":"100px"}}},"backgroundColor":"heading-color","layout":{"type":"constrained","contentSize":"780px"}} -->
<div class="wp-block-group has-heading-color-background-color has-background" style="padding-top:100px;padding-right:0;padding-bottom:100px;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"48px","left":"48px","right":"48px"}}},"backgroundColor":"light-color","layout":{"type":"constrained","contentSize":"620px","justifyContent":"center"}} -->
    <div class="wp-block-group has-light-color-background-color has-background" style="padding-top:48px;padding-right:48px;padding-left:48px"><!-- wp:heading {"textAlign":"center","level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color","fontSize":"large"} -->
        <h3 class="wp-block-heading has-text-align-center has-heading-color-color has-text-color has-link-color has-large-font-size"><?php esc_html_e('Subscribe Our Newsletter', 'modestra') ?></h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
        <p class="has-text-align-center has-foreground-color has-text-color has-link-color"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:contact-form-7/contact-form-selector {"id":253,"hash":"f245613","title":"Newsletter","className":"modestra-form-3"} -->
        <div class="wp-block-contact-form-7-contact-form-selector modestra-form-3">[contact-form-7 id="f245613" title="Newsletter"]</div>
        <!-- /wp:contact-form-7/contact-form-selector -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->