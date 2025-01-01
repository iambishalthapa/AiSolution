<?php

/**
 * Title: About Us Section
 * Slug: modestra/about-us
 * Categories: about
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/about_1.jpg',
    $modestra_url . 'assets/images/photo_stack.png',
    $modestra_url . 'assets/images/about_2.jpg',
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"120px","bottom":"140px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"bottom":{"width":"0px","style":"none"},"top":[],"right":[],"left":[]}},"backgroundColor":"light-color","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group has-light-color-background-color has-background" style="border-bottom-style:none;border-bottom-width:0px;padding-top:120px;padding-right:var(--wp--preset--spacing--40);padding-bottom:140px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"780px"}} -->
    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"lineHeight":"1.4"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"xx-large"} -->
        <h1 class="wp-block-heading has-text-align-center has-xx-large-font-size" style="margin-top:0;margin-bottom:0;line-height:1.4"><?php esc_html_e('We Transform Visions Into Visual Masterpieces.', 'modestra') ?></h1>
        <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"verticalAlignment":"top","style":{"spacing":{"margin":{"top":"84px"},"blockGap":{"left":"40px"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-top" style="margin-top:84px"><!-- wp:column {"verticalAlignment":"top","width":"40%","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}}} -->
        <div class="wp-block-column is-vertically-aligned-top" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:40%"><!-- wp:image {"id":4361,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"20px"}}} -->
            <figure class="wp-block-image size-full has-custom-border"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4361" style="border-radius:20px" /></figure>
            <!-- /wp:image -->

            <!-- wp:group {"style":{"border":{"radius":"20px"},"spacing":{"padding":{"top":"33px","bottom":"33px","left":"30px","right":"30px"}}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-primary-background-color has-background" style="border-radius:20px;padding-top:33px;padding-right:30px;padding-bottom:33px;padding-left:30px"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group"><!-- wp:image {"id":4210,"width":"auto","height":"60px","sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-4210" style="width:auto;height:60px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"lineHeight":"1","fontSize":"32px"},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color"} -->
                        <h2 class="wp-block-heading has-light-color-color has-text-color has-link-color" style="font-size:32px;line-height:1"><?php esc_html_e('2000+', 'modestra') ?></h2>
                        <!-- /wp:heading -->

                        <!-- wp:heading {"level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"medium"} -->
                        <h4 class="wp-block-heading has-light-color-color has-text-color has-link-color has-medium-font-size"><?php esc_html_e('Trusted Customer', 'modestra') ?></h4>
                        <!-- /wp:heading -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"top","width":"60%"} -->
        <div class="wp-block-column is-vertically-aligned-top" style="flex-basis:60%"><!-- wp:heading {"style":{"typography":{"fontSize":"32px"}}} -->
            <h2 class="wp-block-heading" style="font-size:32px"><?php esc_html_e('Who We Are', 'modestra') ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p><?php esc_html_e('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'modestra') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect","style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"40px","bottom":"70px"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
            <div class="wp-block-buttons is-style-buttons-hover-translate-effect" style="margin-top:40px;margin-bottom:70px"><!-- wp:button {"backgroundColor":"primary","textColor":"light-color","className":"is-style-button-hover-white-arrow-style","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"border":{"radius":"60px","width":"1px"},"typography":{"textTransform":"uppercase"},"spacing":{"padding":{"left":"32px","right":"32px","top":"16px","bottom":"16px"}}},"fontSize":"normal","borderColor":"primary"} -->
                <div class="wp-block-button has-custom-font-size is-style-button-hover-white-arrow-style has-normal-font-size" style="text-transform:uppercase"><a class="wp-block-button__link has-light-color-color has-primary-background-color has-text-color has-background has-link-color has-border-color has-primary-border-color wp-element-button" style="border-width:1px;border-radius:60px;padding-top:16px;padding-right:32px;padding-bottom:16px;padding-left:32px"><?php esc_html_e('Explore More', 'modestra') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->

            <!-- wp:image {"id":4362,"scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"20px"}}} -->
            <figure class="wp-block-image size-full has-custom-border"><img src="<?php echo esc_url($modestra_images[2]) ?>" alt="" class="wp-image-4362" style="border-radius:20px;object-fit:cover" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->