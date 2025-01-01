<?php

/**
 * Title: Hero Section with Stats Counter
 * Slug: modestra/hero-section-stats
 * Categories: modestra-hero
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/hero_img_filter.jpg',
    $modestra_url . 'assets/images/play_icon.png',
);
?>
<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"120px"}},"border":{"bottom":{"color":"#e3e2f0","width":"1px"},"top":[],"right":[],"left":[]}},"gradient":"gradient-light","layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group has-gradient-light-gradient-background has-background" style="border-bottom-color:#e3e2f0;border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:120px;padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"980px"}} -->
    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"68px","fontStyle":"normal","fontWeight":"700","textTransform":"none","lineHeight":"1.3"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color"} -->
        <h1 class="wp-block-heading has-text-align-center has-heading-color-color has-text-color has-link-color" style="font-size:68px;font-style:normal;font-weight:700;line-height:1.3;text-transform:none"><?php esc_html_e('Simplifying Your', 'modestra') ?> <mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-primary-color"><?php esc_html_e('Business with Cutting-Edge', 'modestra') ?></mark> <?php esc_html_e('Technology', 'modestra') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","fontSize":"medium"} -->
        <p class="has-text-align-center has-foreground-color has-text-color has-link-color has-medium-font-size"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam ullamco laboris.', 'modestra') ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"40px"}}},"fontSize":"medium","layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-buttons has-custom-font-size is-style-buttons-hover-translate-effect has-medium-font-size" style="margin-top:40px;font-style:normal;font-weight:500"><!-- wp:button {"gradient":"gradient-primary-secondary","className":"is-style-button-gradient-background-style","style":{"spacing":{"padding":{"left":"44px","right":"44px","top":"23px","bottom":"23px"}},"border":{"radius":"60px"}}} -->
            <div class="wp-block-button is-style-button-gradient-background-style"><a class="wp-block-button__link has-gradient-primary-secondary-gradient-background has-background wp-element-button" style="border-radius:60px;padding-top:23px;padding-right:44px;padding-bottom:23px;padding-left:44px"><?php esc_html_e('Download Now', 'modestra') ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->

    <!-- wp:cover {"url":"<?php echo esc_url($modestra_images[0]) ?>","id":6587,"dimRatio":0,"customOverlayColor":"#20134a","isUserOverlayColor":true,"minHeight":640,"style":{"border":{"radius":"40px"},"spacing":{"margin":{"top":"64px"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover" style="border-radius:40px;margin-top:64px;min-height:640px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#20134a"></span><img class="wp-block-cover__image-background wp-image-6587" alt="" src="<?php echo esc_url($modestra_images[0]) ?>" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container"><!-- wp:image {"lightbox":{"enabled":false},"id":6590,"width":"100px","height":"100px","scale":"cover","sizeSlug":"full","linkDestination":"custom","align":"center","className":"is-style-modestra-image-pulse"} -->
            <figure class="wp-block-image aligncenter size-full is-resized is-style-modestra-image-pulse"><a href="#"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-6590" style="object-fit:cover;width:100px;height:100px" /></a></figure>
            <!-- /wp:image -->
        </div>
    </div>
    <!-- /wp:cover -->

    <!-- wp:columns {"style":{"spacing":{"padding":{"top":"60px","bottom":"60px","left":"0","right":"0"},"blockGap":{"left":"48px"},"margin":{"top":"0","bottom":"0"}}}} -->
    <div class="wp-block-columns" style="margin-top:0;margin-bottom:0;padding-top:60px;padding-right:0;padding-bottom:60px;padding-left:0"><!-- wp:column {"width":"48%","style":{"spacing":{"padding":{"top":"14px"}}}} -->
        <div class="wp-block-column" style="padding-top:14px;flex-basis:48%"><!-- wp:heading {"level":1,"style":{"typography":{"lineHeight":"1.2"}},"fontSize":"xx-large"} -->
            <h1 class="wp-block-heading has-xx-large-font-size" style="line-height:1.2"><?php esc_html_e('Incredible Stats That Showcase Our Progress and Impact!', 'modestra') ?></h1>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"26%","style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column" style="flex-basis:26%"><!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:heading {"level":1,"className":"is-style-modestra-heading-gradient-effect","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontSize":"74px"}},"textColor":"primary"} -->
                <h1 class="wp-block-heading is-style-modestra-heading-gradient-effect has-primary-color has-text-color has-link-color" style="font-size:74px"><?php esc_html_e('20k+', 'modestra') ?></h1>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the publishing industries.', 'modestra') ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"26%"} -->
        <div class="wp-block-column" style="flex-basis:26%"><!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:heading {"level":1,"className":"is-style-modestra-heading-gradient-effect","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontSize":"74px"}},"textColor":"primary"} -->
                <h1 class="wp-block-heading is-style-modestra-heading-gradient-effect has-primary-color has-text-color has-link-color" style="font-size:74px"><?php esc_html_e('78%', 'modestra') ?></h1>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the publishing industries.', 'modestra') ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->