<?php

/**
 * Title: Newsletter 3
 * Slug: modestra/newsletter-layout-3
 * Categories: modestra-contacts
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/icon_paper.png',
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"100px","bottom":"100px"}}},"backgroundColor":"heading-color","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group has-heading-color-background-color has-background" style="padding-top:100px;padding-right:0;padding-bottom:100px;padding-left:0"><!-- wp:group {"layout":{"type":"constrained","contentSize":"620px","justifyContent":"center"}} -->
    <div class="wp-block-group"><!-- wp:image {"id":5273,"width":"auto","height":"70px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
        <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-5273" style="width:auto;height:70px" /></figure>
        <!-- /wp:image -->

        <!-- wp:heading {"textAlign":"center","level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"large"} -->
        <h3 class="wp-block-heading has-text-align-center has-light-color-color has-text-color has-link-color has-large-font-size"><?php esc_html_e('Subscribe Our Newsletter', 'modestra') ?></h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|meta-color"}}}},"textColor":"meta-color"} -->
        <p class="has-text-align-center has-meta-color-color has-text-color has-link-color"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:contact-form-7/contact-form-selector {"id":253,"hash":"f245613","title":"Newsletter","className":"modestra-form-3"} -->
        <div class="wp-block-contact-form-7-contact-form-selector modestra-form-3">[contact-form-7 id="f245613" title="Newsletter"]</div>
        <!-- /wp:contact-form-7/contact-form-selector -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->