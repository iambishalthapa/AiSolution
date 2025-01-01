<?php

/**
 * Title: Header with Contact Info
 * Slug: modestra/header-with-contact-info
 * Categories:header
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/icon_phone.png',
    $modestra_url . 'assets/images/icon_location.png',
);
?>
<!-- wp:group {"metadata":{"categories":["header"],"patternName":"modestra/header-with-contact-info","name":"Header with Contact Info"},"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0px","bottom":"0px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0px;padding-right:0;padding-bottom:0px;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"12px","bottom":"12px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"gradient":"gradient-primary-secondary","layout":{"type":"constrained","contentSize":"1180px"}} -->
    <div class="wp-block-group has-gradient-primary-secondary-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:12px;padding-right:var(--wp--preset--spacing--40);padding-bottom:12px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"className":"modestra-info-icons","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
        <div class="wp-block-group modestra-info-icons" style="margin-top:0;margin-bottom:0"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
            <p class="has-light-color-color has-text-color has-link-color"><?php esc_html_e('Get a 30% discount on all services when you refer someone.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFE","className":"is-style-logos-only","style":{"spacing":{"margin":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"right"}} -->
            <ul class="wp-block-social-links has-icon-color is-style-logos-only" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                <!-- wp:social-link {"url":"#","service":"x"} /-->

                <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
            </ul>
            <!-- /wp:social-links -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"40px","bottom":"40px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"bottom":{"color":"var:preset|color|border-color","width":"1px"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
    <div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--border-color);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:40px;padding-right:var(--wp--preset--spacing--40);padding-bottom:40px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
        <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group"><!-- wp:site-logo {"width":32} /-->

                <!-- wp:site-title {"textAlign":"left","fontSize":"large"} /-->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group"><!-- wp:image {"id":4559,"width":"44px","height":"44px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|white-primary"}}} -->
                    <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4559" style="object-fit:cover;width:44px;height:44px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"layout":{"type":"constrained","contentSize":"200px"}} -->
                    <div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color"} -->
                        <p class="has-heading-color-color has-text-color has-link-color"><?php esc_html_e('14th Street, Caltech, New Jersey, Alabama', 'modestra') ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="padding-right:0;padding-left:0"><!-- wp:image {"id":4561,"width":"44px","height":"44px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|white-primary"}}} -->
                    <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-4561" style="object-fit:cover;width:44px;height:44px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color"} -->
                    <p class="has-heading-color-color has-text-color has-link-color"><?php esc_html_e('+1 (000) 123-345', 'modestra') ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"right"}} -->
                <div class="wp-block-buttons" style="margin-top:0;margin-bottom:0"><!-- wp:button {"textColor":"light-color","gradient":"gradient-primary-secondary","className":"is-style-button-gradient-background-style","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"spacing":{"padding":{"left":"32px","right":"32px","top":"20px","bottom":"20px"}},"border":{"radius":"70px"}},"fontSize":"normal"} -->
                    <div class="wp-block-button has-custom-font-size is-style-button-gradient-background-style has-normal-font-size"><a class="wp-block-button__link has-light-color-color has-gradient-primary-secondary-gradient-background has-text-color has-background has-link-color wp-element-button" style="border-radius:70px;padding-top:20px;padding-right:32px;padding-bottom:20px;padding-left:32px"><?php esc_html_e('Schedule and Appointment', 'modestra') ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"10px","bottom":"10px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:10px;padding-right:var(--wp--preset--spacing--40);padding-bottom:10px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
        <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:navigation {"textColor":"heading-color","layout":{"type":"flex","justifyContent":"center"}} /-->

            <!-- wp:search {"label":"Search","showLabel":false,"buttonText":"Search","buttonPosition":"button-only","buttonUseIcon":true,"isSearchFieldHidden":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"backgroundColor":"transparent","textColor":"primary"} /-->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->