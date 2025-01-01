<?php

/**
 * Title: Hero Section with Slant Background
 * Slug: modestra/hero-section
 * Categories: modestra-hero
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/about_image.jpg',
);
?>
<!-- wp:group {"className":"modestra-slant-section","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"80px","bottom":"0px"}}},"backgroundColor":"primary","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group modestra-slant-section has-primary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:var(--wp--preset--spacing--40);padding-bottom:0px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"className":"modestra-hero-content","layout":{"type":"constrained","contentSize":"860px"}} -->
    <div class="wp-block-group modestra-hero-content"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"64px","lineHeight":"1.4","textTransform":"none"},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
        <h1 class="wp-block-heading has-text-align-center has-light-color-color has-text-color has-link-color" style="font-size:64px;line-height:1.4;text-transform:none"><?php esc_html_e('Everything Your Product Team Needs, All in One Place!', 'modestra') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
        <p class="has-text-align-center has-light-color-color has-text-color has-link-color"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"40px","bottom":"60px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-buttons is-style-buttons-hover-translate-effect" style="margin-top:40px;margin-bottom:60px"><!-- wp:button {"backgroundColor":"light-color","textColor":"primary","className":"is-style-button-hover-primary-arrow-style","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"border":{"radius":"60px","width":"1px"},"typography":{"textTransform":"uppercase"},"spacing":{"padding":{"left":"32px","right":"32px","top":"14px","bottom":"14px"}}},"fontSize":"normal","borderColor":"heading-color"} -->
            <div class="wp-block-button has-custom-font-size is-style-button-hover-primary-arrow-style has-normal-font-size" style="text-transform:uppercase"><a class="wp-block-button__link has-primary-color has-light-color-background-color has-text-color has-background has-link-color has-border-color has-heading-color-border-color wp-element-button" style="border-width:1px;border-radius:60px;padding-top:14px;padding-right:32px;padding-bottom:14px;padding-left:32px"><?php esc_html_e('Explore More', 'modestra') ?></a></div>
            <!-- /wp:button -->

            <!-- wp:button {"backgroundColor":"transparent","textColor":"light-color","className":"is-style-button-hover-secondary-bgcolor","style":{"border":{"radius":"60px","width":"1px"},"typography":{"textTransform":"uppercase"},"spacing":{"padding":{"left":"40px","right":"40px","top":"22px","bottom":"22px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"fontSize":"normal","borderColor":"light-color"} -->
            <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-bgcolor has-normal-font-size" style="text-transform:uppercase"><a class="wp-block-button__link has-light-color-color has-transparent-background-color has-text-color has-background has-link-color has-border-color has-light-color-border-color wp-element-button" style="border-width:1px;border-radius:60px;padding-top:22px;padding-right:40px;padding-bottom:22px;padding-left:40px"><?php esc_html_e('Request demo', 'modestra') ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->

    <!-- wp:image {"id":4173,"sizeSlug":"large","linkDestination":"none","align":"wide","style":{"border":{"radius":"30px"}}} -->
    <figure class="wp-block-image alignwide size-large has-custom-border"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4173" style="border-radius:30px" /></figure>
    <!-- /wp:image -->
</div>
<!-- /wp:group -->