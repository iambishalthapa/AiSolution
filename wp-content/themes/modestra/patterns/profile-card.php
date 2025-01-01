<?php

/**
 * Title: Profile Card with Links
 * Slug: modestra/profile-card
 * Categories: modestra
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/member_2.png',
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"40px","right":"40px"}}},"backgroundColor":"light-shade","layout":{"type":"constrained","contentSize":"740px"}} -->
    <div class="wp-block-group has-light-shade-background-color has-background" style="padding-top:80px;padding-right:40px;padding-bottom:80px;padding-left:40px"><!-- wp:image {"id":6090,"width":"130px","height":"130px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"100px"}}} -->
        <figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-6090" style="border-radius:100px;object-fit:cover;width:130px;height:130px" /></figure>
        <!-- /wp:image -->

        <!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"top":"28px","bottom":"16px"}}},"fontSize":"big"} -->
        <h4 class="wp-block-heading has-text-align-center has-big-font-size" style="margin-top:28px;margin-bottom:16px"><?php esc_html_e('Sandrila Raily', 'modestra') ?></h4>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"medium"} -->
        <p class="has-text-align-center has-medium-font-size" style="margin-top:0;margin-bottom:0"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'modestra') ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:social-links {"className":"is-style-default","style":{"spacing":{"margin":{"top":"28px"},"blockGap":{"left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
        <ul class="wp-block-social-links is-style-default" style="margin-top:28px"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

            <!-- wp:social-link {"url":"#","service":"linkedin"} /-->

            <!-- wp:social-link {"url":"#","service":"youtube"} /-->

            <!-- wp:social-link {"url":"#","service":"x"} /-->
        </ul>
        <!-- /wp:social-links -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"margin":{"top":"48px"},"blockGap":"10px"}},"layout":{"type":"constrained","contentSize":"580px"}} -->
    <div class="wp-block-group" style="margin-top:48px"><!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <div class="wp-block-buttons alignwide"><!-- wp:button {"gradient":"gradient-primary-secondary","width":100,"className":"is-style-button-gradient-background-style","style":{"border":{"radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
            <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-button-gradient-background-style"><a class="wp-block-button__link has-gradient-primary-secondary-gradient-background has-background wp-element-button" href="#" style="border-radius:0px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e('Visit my Website', 'modestra') ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->

        <!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <div class="wp-block-buttons alignwide"><!-- wp:button {"gradient":"gradient-primary-secondary","width":100,"className":"is-style-button-gradient-background-style","style":{"border":{"radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
            <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-button-gradient-background-style"><a class="wp-block-button__link has-gradient-primary-secondary-gradient-background has-background wp-element-button" href="#" style="border-radius:0px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e('Download My CV', 'modestra') ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->

        <!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <div class="wp-block-buttons alignwide"><!-- wp:button {"gradient":"gradient-primary-secondary","width":100,"className":"is-style-button-gradient-background-style","style":{"border":{"radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
            <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-button-gradient-background-style"><a class="wp-block-button__link has-gradient-primary-secondary-gradient-background has-background wp-element-button" href="#" style="border-radius:0px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e('Visit my Portfolios', 'modestra') ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->

        <!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <div class="wp-block-buttons alignwide"><!-- wp:button {"gradient":"gradient-primary-secondary","width":100,"className":"is-style-button-gradient-background-style","style":{"border":{"radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
            <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-button-gradient-background-style"><a class="wp-block-button__link has-gradient-primary-secondary-gradient-background has-background wp-element-button" href="#" style="border-radius:0px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e('Download Courses', 'modestra') ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->

        <!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <div class="wp-block-buttons alignwide"><!-- wp:button {"gradient":"gradient-primary-secondary","width":100,"className":"is-style-button-gradient-background-style","style":{"border":{"radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
            <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-button-gradient-background-style"><a class="wp-block-button__link has-gradient-primary-secondary-gradient-background has-background wp-element-button" href="#" style="border-radius:0px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e('Other Resources', 'modestra') ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->