<?php

/**
 * Title: Newsletter 2
 * Slug: modestra/newsletter-layout-2
 * Categories: modestra-contacts
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/extra_image_2.jpg',
    $modestra_url . 'assets/images/icon_paper.png',
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0px","bottom":"0px"}}},"backgroundColor":"heading-color","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group has-heading-color-background-color has-background" style="padding-top:0px;padding-right:0;padding-bottom:0px;padding-left:0"><!-- wp:columns {"className":"is-style-default","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0px"},"blockGap":{"top":"0","left":"0"}}}} -->
    <div class="wp-block-columns is-style-default" style="margin-top:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"width":"50%"} -->
        <div class="wp-block-column" style="flex-basis:50%"><!-- wp:image {"id":5268,"sizeSlug":"full","linkDestination":"none"} -->
            <figure class="wp-block-image size-full"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-5268" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:group {"layout":{"type":"constrained","contentSize":"620px","justifyContent":"left"}} -->
            <div class="wp-block-group"><!-- wp:image {"id":5273,"width":"auto","height":"70px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-5273" style="width:auto;height:70px" /></figure>
                <!-- /wp:image -->

                <!-- wp:heading {"textAlign":"center","level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"large"} -->
                <h3 class="wp-block-heading has-text-align-center has-light-color-color has-text-color has-link-color has-large-font-size"><?php esc_html_e('Subscribe Our Newsletter', 'modestra') ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|meta-color"}}}},"textColor":"meta-color"} -->
                <p class="has-text-align-center has-meta-color-color has-text-color has-link-color"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:contact-form-7/contact-form-selector {"id":253,"hash":"f245613","title":"Newsletter","className":"modestra-form-2"} -->
                <div class="wp-block-contact-form-7-contact-form-selector modestra-form-2">[contact-form-7 id="f245613" title="Newsletter"]</div>
                <!-- /wp:contact-form-7/contact-form-selector -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:group {"className":"is-style-modestra-boxshadow-medium","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"60px"}}},"backgroundColor":"light-color","layout":{"type":"constrained","contentSize":"100%"}} -->
    <div class="wp-block-group is-style-modestra-boxshadow-medium has-light-color-background-color has-background" style="margin-top:60px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"></div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->