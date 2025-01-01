<?php

/**
 * Title: Contact Form 5
 * Slug: modestra/contact-form-5
 * Categories: modestra-contacts
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"100px","bottom":"100px"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns -->
    <div class="wp-block-columns"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:heading -->
            <h2 class="wp-block-heading"><?php esc_html_e('Contact Us', 'modestra') ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","margin":{"top":"40px","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="margin-top:40px;margin-bottom:0"><!-- wp:heading {"level":4,"fontSize":"medium"} -->
                <h4 class="wp-block-heading has-medium-font-size"><?php esc_html_e('Location', 'modestra') ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"fontSize":"medium"} -->
                <p class="has-medium-font-size"><?php esc_html_e('17 Park Ave Port Washington,&nbsp;New York', 'modestra') ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group"><!-- wp:heading {"level":4,"fontSize":"medium"} -->
                <h4 class="wp-block-heading has-medium-font-size"><?php esc_html_e('Phone', 'modestra') ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"fontSize":"medium"} -->
                <p class="has-medium-font-size"><?php esc_html_e('+1 (000) 123-4567', 'modestra') ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group"><!-- wp:heading {"level":4,"fontSize":"medium"} -->
                <h4 class="wp-block-heading has-medium-font-size"><?php esc_html_e('Email', 'modestra') ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"fontSize":"medium"} -->
                <p class="has-medium-font-size"><?php esc_html_e('email@example.com', 'modestra') ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"}}},"backgroundColor":"dark-shade","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-dark-shade-background-color has-background" style="padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:heading {"level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"big"} -->
                <h4 class="wp-block-heading has-light-color-color has-text-color has-link-color has-big-font-size"><?php esc_html_e('Send Us Message', 'modestra') ?></h4>
                <!-- /wp:heading -->

                <!-- wp:contact-form-7/contact-form-selector {"id":4031,"hash":"2420281","title":"Contact Form for Home"} -->
                <div class="wp-block-contact-form-7-contact-form-selector">[contact-form-7 id="2420281" title="Contact Form for Home"]</div>
                <!-- /wp:contact-form-7/contact-form-selector -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->