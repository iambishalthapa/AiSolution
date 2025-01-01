<?php

/**
 * Title: Footer minimal with Newsletter
 * Slug: modestra/footer-minimal-with-newsletter
 * Categories: footer
 */
?>
<!-- wp:group {"metadata":{"categories":["footer"],"patternName":"modestra/footer-minimal-with-newsletter","name":"Footer with newsletter"},"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"className":"modestra-footer","style":{"spacing":{"padding":{"top":"40px","right":"0","left":"0","bottom":"0px"},"margin":{"top":"0","bottom":"0"}},"border":{"width":"0px","style":"none"}},"backgroundColor":"dark-shade","layout":{"type":"constrained","contentSize":"100%"}} -->
    <div class="wp-block-group modestra-footer has-dark-shade-background-color has-background" style="border-style:none;border-width:0px;margin-top:0;margin-bottom:0;padding-top:40px;padding-right:0;padding-bottom:0px;padding-left:0"><!-- wp:group {"style":{"border":{"width":"0px","style":"none"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|30","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"680px"}} -->
        <div class="wp-block-group" style="border-style:none;border-width:0px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40)"><!-- wp:site-title {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"margin":{"bottom":"40px"}}},"fontSize":"xxx-large"} /-->

            <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"spacing":{"margin":{"bottom":"40px"}}},"textColor":"light-color"} -->
            <p class="has-text-align-center has-light-color-color has-text-color has-link-color" style="margin-bottom:40px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:contact-form-7/contact-form-selector {"id":253,"hash":"f245613","title":"Newsletter","className":"modestra-footer-newsletter"} -->
            <div class="wp-block-contact-form-7-contact-form-selector modestra-footer-newsletter">[contact-form-7 id="f245613" title="Newsletter"]</div>
            <!-- /wp:contact-form-7/contact-form-selector -->

            <!-- wp:social-links {"iconColor":"primary","iconColorValue":"#5b50ff","iconBackgroundColor":"light-color","iconBackgroundColorValue":"#FFFFFE","style":{"spacing":{"margin":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
            <ul class="wp-block-social-links has-icon-color has-icon-background-color" style="margin-top:var(--wp--preset--spacing--30);margin-right:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30);margin-left:var(--wp--preset--spacing--30)"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                <!-- wp:social-link {"url":"#","service":"x"} /-->

                <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
            </ul>
            <!-- /wp:social-links -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"40px","bottom":"40px"},"margin":{"top":"64px","bottom":"0"}},"border":{"top":{"color":"var:preset|color|border-color-black","width":"1px"}}},"layout":{"type":"constrained","contentSize":"980px"}} -->
        <div class="wp-block-group" style="border-top-color:var(--wp--preset--color--border-color-black);border-top-width:1px;margin-top:64px;margin-bottom:0;padding-top:40px;padding-right:var(--wp--preset--spacing--40);padding-bottom:40px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
            <div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"light-color"} -->
                <p class="has-light-color-color has-text-color has-link-color"><a href="#"><?php esc_html_e('Home', 'modestra') ?></a></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"light-color"} -->
                <p class="has-light-color-color has-text-color has-link-color"><a href="#"><?php esc_html_e('About', 'modestra') ?></a></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"light-color"} -->
                <p class="has-light-color-color has-text-color has-link-color"><a href="#"><?php esc_html_e('Terms &amp; Conditions', 'modestra') ?></a></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"typography":{"lineHeight":"1.5"}},"textColor":"light-color","fontSize":"normal"} -->
            <p class="has-text-align-center has-light-color-color has-text-color has-link-color has-normal-font-size" style="line-height:1.5"><?php esc_html_e('Proudly Powered by WordPress | Modestra Theme by', 'modestra') ?> <a href="https://cozythemes.com/"><?php esc_html_e('CozyThemes', 'modestra') ?></a>.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
    <div class="wp-block-buttons" style="margin-top:0;margin-bottom:0"><!-- wp:button {"backgroundColor":"tertiary","textColor":"foregound-alt","className":"modestra-scrollto-top is-style-button-hover-secondary-bgcolor","style":{"border":{"radius":"50%"}}} -->
        <div class="wp-block-button modestra-scrollto-top is-style-button-hover-secondary-bgcolor"><a class="wp-block-button__link has-foregound-alt-color has-tertiary-background-color has-text-color has-background wp-element-button" style="border-radius:50%"><?php esc_html_e('Scroll to Top', 'modestra') ?></a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->