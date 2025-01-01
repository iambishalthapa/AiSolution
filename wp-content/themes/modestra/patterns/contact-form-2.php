<?php

/**
 * Title: Contact Form Full Width 2
 * Slug: modestra/contact-form-2
 * Categories: modestra-contacts
 */
?>
<!-- wp:group {"metadata":{"categories":["modestra-contacts"],"patternName":"modestra/contact-form-2","name":"Contact form with Full width"},"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"100px","bottom":"100px"}}},"backgroundColor":"light-color","layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group has-light-color-background-color has-background" style="padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"layout":{"type":"constrained","contentSize":"740px","justifyContent":"left"}} -->
    <div class="wp-block-group"><!-- wp:heading {"textAlign":"left","level":1,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color"} -->
        <h1 class="wp-block-heading has-text-align-left has-heading-color-color has-text-color has-link-color"><?php esc_html_e('Contact Us', 'modestra') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
        <p class="has-text-align-left has-foreground-color has-text-color has-link-color"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFE","iconBackgroundColor":"primary","iconBackgroundColorValue":"#cdff04","style":{"spacing":{"margin":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"40px","bottom":"var:preset|spacing|30"},"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
        <ul class="wp-block-social-links has-icon-color has-icon-background-color" style="margin-top:40px;margin-right:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30);margin-left:var(--wp--preset--spacing--30)"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

            <!-- wp:social-link {"url":"#","service":"x"} /-->

            <!-- wp:social-link {"url":"#","service":"instagram"} /-->

            <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
        </ul>
        <!-- /wp:social-links -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"is-style-default","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"},"margin":{"top":"60px"}}},"backgroundColor":"light-color","layout":{"type":"constrained","contentSize":"100%"}} -->
    <div class="wp-block-group is-style-default has-light-color-background-color has-background" style="margin-top:60px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:heading {"textAlign":"left","level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"heading-color","fontSize":"big"} -->
        <h3 class="wp-block-heading has-text-align-left has-heading-color-color has-text-color has-link-color has-big-font-size" style="font-style:normal;font-weight:600"><?php esc_html_e('Send Us Message', 'modestra') ?></h3>
        <!-- /wp:heading -->

        <!-- wp:contact-form-7/contact-form-selector {"id":5316,"hash":"9621336","title":"Modestra Contact Form","className":"modestra-contact-form"} -->
        <div class="wp-block-contact-form-7-contact-form-selector modestra-contact-form">[contact-form-7 id="9621336" title="Modestra Contact Form"]</div>
        <!-- /wp:contact-form-7/contact-form-selector -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->