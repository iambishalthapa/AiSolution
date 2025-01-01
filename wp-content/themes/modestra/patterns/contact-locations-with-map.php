<?php

/**
 * Title: Contact Locations with Map
 * Slug: modestra/contact-locations-with-map
 * Categories: modestra-contacts
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/map_image.jpg',
);
?>
<!-- wp:group {"metadata":{"categories":["modestra-contacts"],"patternName":"modestra/contact-locations-with-map","name":"Contact Locations with Map"},"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"100px","bottom":"100px"}}},"backgroundColor":"primary-shade","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group has-primary-shade-background-color has-background" style="padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:image {"id":5288,"sizeSlug":"large","linkDestination":"none","align":"wide","style":{"color":{"duotone":"var:preset|duotone|white-primary"}}} -->
    <figure class="wp-block-image alignwide size-large"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-5288" /></figure>
    <!-- /wp:image -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"60px"},"blockGap":{"left":"80px"}}}} -->
    <div class="wp-block-columns" style="margin-top:60px"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:heading {"level":1,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color"} -->
            <h1 class="wp-block-heading has-heading-color-color has-text-color has-link-color"><?php esc_html_e('Contact Us', 'modestra') ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
            <p class="has-foreground-color has-text-color has-link-color"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFE","iconBackgroundColor":"primary","iconBackgroundColorValue":"#cdff04","style":{"spacing":{"margin":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"40px","bottom":"var:preset|spacing|30"},"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
            <ul class="wp-block-social-links has-icon-color has-icon-background-color" style="margin-top:40px;margin-right:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30);margin-left:var(--wp--preset--spacing--30)"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                <!-- wp:social-link {"url":"#","service":"x"} /-->

                <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
            </ul>
            <!-- /wp:social-links -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:columns -->
            <div class="wp-block-columns"><!-- wp:column -->
                <div class="wp-block-column"><!-- wp:heading {"level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color","fontSize":"big"} -->
                    <h4 class="wp-block-heading has-heading-color-color has-text-color has-link-color has-big-font-size"><?php esc_html_e('New York', 'modestra') ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
                    <p class="has-foreground-color has-text-color has-link-color"><?php esc_html_e('17 Park Ave', 'modestra') ?><br><?php esc_html_e('Port Washington, New York', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
                    <p class="has-foreground-color has-text-color has-link-color"><?php esc_html_e('+1 (000) 123-4567', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
                    <p class="has-foreground-color has-text-color has-link-color"><?php esc_html_e('email@example.com', 'modestra') ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column"><!-- wp:heading {"level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color","fontSize":"big"} -->
                    <h4 class="wp-block-heading has-heading-color-color has-text-color has-link-color has-big-font-size"><?php esc_html_e('London', 'modestra') ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
                    <p class="has-foreground-color has-text-color has-link-color"><?php esc_html_e('7 Pequa Ln', 'modestra') ?><br><?php esc_html_e('Commack, London', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
                    <p class="has-foreground-color has-text-color has-link-color"><?php esc_html_e('+1 (000) 123-4567', 'modestra') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
                    <p class="has-foreground-color has-text-color has-link-color"><?php esc_html_e('email@example.com', 'modestra') ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->