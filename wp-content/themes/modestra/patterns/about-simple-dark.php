<?php

/**
 * Title: About Text Simple Dark
 * Slug: modestra/about-simple-dark
 * Categories: about, modestra-testimoials
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/about_9.jpg',
    $modestra_url . 'assets/images/member_2.png',
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"dark-shade","layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group has-dark-shade-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"64px"}}}} -->
    <div class="wp-block-columns"><!-- wp:column {"width":"45%","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
        <div class="wp-block-column" style="flex-basis:45%"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[0]) ?>","id":5979,"dimRatio":0,"customOverlayColor":"#938b85","isUserOverlayColor":true,"minHeight":600,"style":{"color":{"duotone":"var:preset|duotone|white-primary"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="min-height:600px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#938b85"></span><img class="wp-block-cover__image-background wp-image-5979" alt="" src="<?php echo esc_url($modestra_images[0]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40","margin":{"top":"0px"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="margin-top:0px"><!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.3"},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"x-large"} -->
                <h3 class="wp-block-heading has-light-color-color has-text-color has-link-color has-x-large-font-size" style="font-style:normal;font-weight:600;line-height:1.3"><?php esc_html_e('World Class Support', 'modestra') ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"medium"} -->
                <p class="has-light-color-color has-text-color has-link-color has-medium-font-size"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"medium"} -->
                <p class="has-light-color-color has-text-color has-link-color has-medium-font-size"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'modestra') ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"48px"},"padding":{"top":"40px"}},"border":{"top":{"color":"var:preset|color|border-color","style":"dashed","width":"1px"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="border-top-color:var(--wp--preset--color--border-color);border-top-style:dashed;border-top-width:1px;margin-top:48px;padding-top:40px"><!-- wp:columns -->
                <div class="wp-block-columns"><!-- wp:column {"width":"100px"} -->
                    <div class="wp-block-column" style="flex-basis:100px"><!-- wp:image {"id":6090,"width":"100px","height":"100px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"60px"}}} -->
                        <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-6090" style="border-radius:60px;object-fit:cover;width:100px;height:100px" /></figure>
                        <!-- /wp:image -->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column {"width":"","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
                    <div class="wp-block-column"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"medium"} -->
                        <p class="has-light-color-color has-text-color has-link-color has-medium-font-size"><?php esc_html_e('Lorem ipsum dolor sit, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.', 'modestra') ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:heading {"level":5,"className":"is-style-modestra-heading-gradient-effect"} -->
                        <h5 class="wp-block-heading is-style-modestra-heading-gradient-effect"><?php esc_html_e('Liana Rovmen', 'modestra') ?></h5>
                        <!-- /wp:heading -->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->