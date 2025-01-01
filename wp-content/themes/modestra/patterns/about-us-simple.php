<?php

/**
 * Title: About Us Simple
 * Slug: modestra/about-us-simple
 * Categories: about
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/about_22.jpg',
);
?>
<!-- wp:group {"metadata":{"categories":["about"],"patternName":"modestra/about-us-simple","name":"About Us Simple"},"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"100px","bottom":"100px"}}},"gradient":"gradient-light","layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group has-gradient-light-gradient-background has-background" style="padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"64px"},"margin":{"top":"0px"},"padding":{"bottom":"0px"}},"border":{"bottom":{"width":"0px","style":"none"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center" style="border-bottom-style:none;border-bottom-width:0px;margin-top:0px;padding-bottom:0px"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"16px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
            <div class="wp-block-group" style="margin-bottom:16px"><!-- wp:group {"className":"is-style-modestra-group-gradient-border","style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"15px","right":"15px"}},"border":{"radius":"50px","width":"1px"}},"backgroundColor":"transparent","layout":{"type":"constrained"}} -->
                <div class="wp-block-group is-style-modestra-group-gradient-border has-transparent-background-color has-background" style="border-width:1px;border-radius:50px;padding-top:8px;padding-right:15px;padding-bottom:8px;padding-left:15px"><!-- wp:heading {"level":5,"className":"is-style-default","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color","fontSize":"small"} -->
                    <h5 class="wp-block-heading is-style-default has-heading-color-color has-text-color has-link-color has-small-font-size"><?php esc_html_e('About Us', 'modestra') ?></h5>
                    <!-- /wp:heading -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:heading {"level":1,"style":{"typography":{"lineHeight":"1.3"}},"fontSize":"xx-large"} -->
            <h1 class="wp-block-heading has-xx-large-font-size" style="line-height:1.3"><?php esc_html_e('Transforming Ideas into Reality', 'modestra') ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p><?php esc_html_e('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"40px","bottom":"0px"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
            <div class="wp-block-buttons is-style-buttons-hover-translate-effect" style="margin-top:40px;margin-bottom:0px"><!-- wp:button {"textColor":"light-color","gradient":"gradient-primary-secondary","className":"is-style-button-gradient-background-style","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"border":{"radius":"60px","width":"0px","style":"none"},"typography":{"textTransform":"uppercase"},"spacing":{"padding":{"left":"40px","right":"40px","top":"20px","bottom":"20px"}}},"fontSize":"normal"} -->
                <div class="wp-block-button has-custom-font-size is-style-button-gradient-background-style has-normal-font-size" style="text-transform:uppercase"><a class="wp-block-button__link has-light-color-color has-gradient-primary-secondary-gradient-background has-text-color has-background has-link-color wp-element-button" style="border-style:none;border-width:0px;border-radius:60px;padding-top:20px;padding-right:40px;padding-bottom:20px;padding-left:40px"><?php esc_html_e('Explore More', 'modestra') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:cover {"url":"<?php echo esc_url($modestra_images[0]) ?>","id":6648,"dimRatio":0,"customOverlayColor":"#948477","isUserOverlayColor":true,"minHeight":540,"isDark":false,"className":"is-style-modestra-cover-modestra-translate-effect","style":{"color":{"duotone":"var:preset|duotone|white-primary"},"border":{"radius":"40px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light is-style-modestra-cover-modestra-translate-effect" style="border-radius:40px;min-height:540px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#948477"></span><img class="wp-block-cover__image-background wp-image-6648" alt="" src="<?php echo esc_url($modestra_images[0]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->