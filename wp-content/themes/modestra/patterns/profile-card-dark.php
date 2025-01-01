<?php

/**
 * Title: Profile Card with Links Dark Background
 * Slug: modestra/profile-card-dark
 * Categories: modestra
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/member_2.png',
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}},"backgroundColor":"dark-shade","layout":{"type":"constrained","contentSize":"640px"}} -->
<div class="wp-block-group has-dark-shade-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--40)"><!-- wp:image {"id":6090,"width":"130px","height":"130px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"100px"}}} -->
    <figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-6090" style="border-radius:100px;object-fit:cover;width:130px;height:130px" /></figure>
    <!-- /wp:image -->

    <!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"top":"28px"}},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"big"} -->
    <h4 class="wp-block-heading has-text-align-center has-light-color-color has-text-color has-link-color has-big-font-size" style="margin-top:28px"><?php esc_html_e('Sandrila Raily', 'modestra') ?></h4>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"medium"} -->
    <p class="has-text-align-center has-light-color-color has-text-color has-link-color has-medium-font-size"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"style":{"spacing":{"margin":{"top":"40px"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="margin-top:40px"><!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <div class="wp-block-buttons alignwide"><!-- wp:button {"backgroundColor":"primary","width":100,"className":"is-style-fill","style":{"border":{"radius":"0px","width":"0px","style":"none"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
            <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-fill"><a class="wp-block-button__link has-primary-background-color has-background wp-element-button" href="#" style="border-style:none;border-width:0px;border-radius:0px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e('Visit my Website', 'modestra') ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->

        <!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <div class="wp-block-buttons alignwide"><!-- wp:button {"width":100,"style":{"border":{"radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
            <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:0px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e('Download My CV', 'modestra') ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->

        <!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <div class="wp-block-buttons alignwide"><!-- wp:button {"width":100,"style":{"border":{"radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
            <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:0px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e('Visit my Portfolio', 'modestra') ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->

        <!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <div class="wp-block-buttons alignwide"><!-- wp:button {"width":100,"style":{"border":{"radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
            <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:0px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e('Download Courses', 'modestra') ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->

        <!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <div class="wp-block-buttons alignwide"><!-- wp:button {"width":100,"style":{"border":{"radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
            <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:0px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e('Other Recources', 'modestra') ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->

    <!-- wp:social-links {"className":"is-style-default","style":{"spacing":{"margin":{"top":"48px"},"blockGap":{"left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
    <ul class="wp-block-social-links is-style-default" style="margin-top:48px"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

        <!-- wp:social-link {"url":"#","service":"linkedin"} /-->

        <!-- wp:social-link {"url":"#","service":"youtube"} /-->

        <!-- wp:social-link {"url":"#","service":"x"} /-->
    </ul>
    <!-- /wp:social-links -->
</div>
<!-- /wp:group -->