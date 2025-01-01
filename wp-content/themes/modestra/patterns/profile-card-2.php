<?php

/**
 * Title: Profile Card with Links 2
 * Slug: modestra/profile-card-2
 * Categories: modestra
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/member_2.png',
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"640px"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--40)"><!-- wp:image {"id":6090,"width":"130px","height":"130px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"100px"}}} -->
    <figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-6090" style="border-radius:100px;object-fit:cover;width:130px;height:130px" /></figure>
    <!-- /wp:image -->

    <!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"top":"28px"}}},"fontSize":"big"} -->
    <h4 class="wp-block-heading has-text-align-center has-big-font-size" style="margin-top:28px"><?php esc_html_e('Sandrila Raily', 'modestra') ?></h4>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
    <p class="has-text-align-center has-medium-font-size"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"style":{"spacing":{"margin":{"top":"40px"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="margin-top:40px"><!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <div class="wp-block-buttons alignwide"><!-- wp:button {"backgroundColor":"transparent","textColor":"primary","width":100,"className":"is-style-button-gradient-border-style","style":{"border":{"radius":"0px","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}}} -->
            <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-button-gradient-border-style"><a class="wp-block-button__link has-primary-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-width:1px;border-radius:0px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e('Visit my Website', 'modestra') ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->

        <!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <div class="wp-block-buttons alignwide"><!-- wp:button {"backgroundColor":"transparent","textColor":"primary","width":100,"className":"is-style-button-gradient-border-style","style":{"border":{"radius":"0px","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}}} -->
            <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-button-gradient-border-style"><a class="wp-block-button__link has-primary-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-width:1px;border-radius:0px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e('Download My CV', 'modestra') ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->

        <!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <div class="wp-block-buttons alignwide"><!-- wp:button {"backgroundColor":"transparent","textColor":"primary","width":100,"className":"is-style-button-gradient-border-style","style":{"border":{"radius":"0px","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}}} -->
            <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-button-gradient-border-style"><a class="wp-block-button__link has-primary-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-width:1px;border-radius:0px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e('Visit my Portfolios', 'modestra') ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->

        <!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <div class="wp-block-buttons alignwide"><!-- wp:button {"backgroundColor":"transparent","textColor":"primary","width":100,"className":"is-style-button-gradient-border-style","style":{"border":{"radius":"0px","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}}} -->
            <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-button-gradient-border-style"><a class="wp-block-button__link has-primary-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-width:1px;border-radius:0px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e('Download Courses', 'modestra') ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->

        <!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <div class="wp-block-buttons alignwide"><!-- wp:button {"backgroundColor":"transparent","textColor":"primary","width":100,"className":"is-style-button-gradient-border-style","style":{"border":{"radius":"0px","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}}} -->
            <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-button-gradient-border-style"><a class="wp-block-button__link has-primary-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-width:1px;border-radius:0px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e('Other Resources', 'modestra') ?></a></div>
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