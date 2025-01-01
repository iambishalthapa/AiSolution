<?php

/**
 * Title: Newsletter 1
 * Slug: modestra/newsletter-layout-1
 * Categories: modestra-contacts
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/extra_image.jpg',
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"100px","bottom":"100px"}},"color":{"gradient":"linear-gradient(180deg,rgba(51,51,51,0.99) 77%,rgb(255,255,255) 77%)"}},"layout":{"type":"constrained","contentSize":"900px"}} -->
<div class="wp-block-group has-background" style="background:linear-gradient(180deg,rgba(51,51,51,0.99) 77%,rgb(255,255,255) 77%);padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:heading {"textAlign":"center","level":1,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
    <h1 class="wp-block-heading has-text-align-center has-light-color-color has-text-color has-link-color"><?php esc_html_e('Subscribe Our Newsletter', 'modestra') ?></h1>
    <!-- /wp:heading -->

    <!-- wp:group {"layout":{"type":"constrained","contentSize":"640px"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|meta-color"}}}},"textColor":"meta-color"} -->
        <p class="has-text-align-center has-meta-color-color has-text-color has-link-color"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"is-style-modestra-boxshadow-medium","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"60px"}}},"backgroundColor":"light-color","layout":{"type":"constrained","contentSize":"100%"}} -->
    <div class="wp-block-group is-style-modestra-boxshadow-medium has-light-color-background-color has-background" style="margin-top:60px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:columns {"verticalAlignment":null,"className":"is-style-default","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0px"},"blockGap":{"top":"0","left":"0"}}}} -->
        <div class="wp-block-columns is-style-default" style="margin-top:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"width":"50%"} -->
            <div class="wp-block-column" style="flex-basis:50%"><!-- wp:image {"id":5241,"sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-5241" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"}}}} -->
            <div class="wp-block-column is-vertically-aligned-center" style="padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:heading {"textAlign":"left","level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"typography":{"lineHeight":"1"}},"textColor":"heading-color","fontSize":"big"} -->
                <h3 class="wp-block-heading has-text-align-left has-heading-color-color has-text-color has-link-color has-big-font-size" style="line-height:1"><?php esc_html_e('Signup Newsletter', 'modestra') ?></h3>
                <!-- /wp:heading -->

                <!-- wp:contact-form-7/contact-form-selector {"id":5254,"hash":"5be0776","title":"Newsletter 2","className":"modestra-form-1"} -->
                <div class="wp-block-contact-form-7-contact-form-selector modestra-form-1">[contact-form-7 id="5be0776" title="Newsletter 2"]</div>
                <!-- /wp:contact-form-7/contact-form-selector -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->