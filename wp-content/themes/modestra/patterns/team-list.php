<?php

/**
 * Title: Team List Section
 * Slug: modestra/team-list
 * Categories: modestra-team
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/member_1.png',
    $modestra_url . 'assets/images/member_2.png',
    $modestra_url . 'assets/images/member_3.png',
);
?>
<!-- wp:group {"metadata":{"categories":["modestra-team"],"patternName":"modestra/team-list","name":"Team List Section"},"className":"has-primary-shade-background-color has-background","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"100px","bottom":"100px"}}},"layout":{"type":"constrained","contentSize":"940px"}} -->
<div class="wp-block-group has-primary-shade-background-color has-background" style="padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"740px","justifyContent":"left"}} -->
    <div class="wp-block-group"><!-- wp:heading {"textAlign":"left","level":1} -->
        <h1 class="wp-block-heading has-text-align-left"><?php esc_html_e('Meet Our Team', 'modestra') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"left"} -->
        <p class="has-text-align-left"><?php esc_html_e('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'modestra') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"100px"},"blockGap":{"left":"64px"}}}} -->
    <div class="wp-block-columns" style="margin-top:100px"><!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group"><!-- wp:heading {"textAlign":"left","level":4,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"big"} -->
                <h4 class="wp-block-heading has-text-align-left has-big-font-size" style="margin-top:20px"><?php esc_html_e('Jon Doe', 'modestra') ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"left"} -->
                <p class="has-text-align-left"><?php esc_html_e('Founder', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"left","style":{"spacing":{"margin":{"top":"16px","bottom":"24px"}}}} -->
                <p class="has-text-align-left" style="margin-top:16px;margin-bottom:24px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:social-links {"className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
                <ul class="wp-block-social-links is-style-logos-only"><!-- wp:social-link {"url":"#","service":"x"} /-->

                    <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                    <!-- wp:social-link {"url":"#","service":"dribbble"} /-->
                </ul>
                <!-- /wp:social-links -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"250px","style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column" style="flex-basis:250px"><!-- wp:image {"id":4571,"width":"250px","height":"250px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"200px"},"color":{"duotone":"var:preset|duotone|white-primary"}}} -->
            <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4571" style="border-radius:200px;object-fit:cover;width:250px;height:250px" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"64px"},"blockGap":{"left":"64px"}}}} -->
    <div class="wp-block-columns" style="margin-top:64px"><!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group"><!-- wp:heading {"textAlign":"left","level":4,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"big"} -->
                <h4 class="wp-block-heading has-text-align-left has-big-font-size" style="margin-top:20px"><?php esc_html_e('Maria Powel', 'modestra') ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"left"} -->
                <p class="has-text-align-left"><?php esc_html_e('Project Manager', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"left","style":{"spacing":{"margin":{"top":"16px","bottom":"24px"}}}} -->
                <p class="has-text-align-left" style="margin-top:16px;margin-bottom:24px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:social-links {"className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
                <ul class="wp-block-social-links is-style-logos-only"><!-- wp:social-link {"url":"#","service":"x"} /-->

                    <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                    <!-- wp:social-link {"url":"#","service":"dribbble"} /-->
                </ul>
                <!-- /wp:social-links -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"250px","style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column" style="flex-basis:250px"><!-- wp:image {"id":4581,"width":"250px","height":"250px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"200px"},"color":{"duotone":"var:preset|duotone|white-primary"}}} -->
            <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-4581" style="border-radius:200px;object-fit:cover;width:250px;height:250px" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"64px"},"blockGap":{"left":"64px"}}}} -->
    <div class="wp-block-columns" style="margin-top:64px"><!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group"><!-- wp:heading {"textAlign":"left","level":4,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"big"} -->
                <h4 class="wp-block-heading has-text-align-left has-big-font-size" style="margin-top:20px"><?php esc_html_e('Robert Mathew', 'modestra') ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"left"} -->
                <p class="has-text-align-left"><?php esc_html_e('HR Manager', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"left","style":{"spacing":{"margin":{"top":"16px","bottom":"24px"}}}} -->
                <p class="has-text-align-left" style="margin-top:16px;margin-bottom:24px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'modestra') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:social-links {"className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
                <ul class="wp-block-social-links is-style-logos-only"><!-- wp:social-link {"url":"#","service":"x"} /-->

                    <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                    <!-- wp:social-link {"url":"#","service":"dribbble"} /-->
                </ul>
                <!-- /wp:social-links -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"250px","style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-column" style="flex-basis:250px"><!-- wp:image {"id":4587,"width":"250px","height":"250px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"200px"},"color":{"duotone":"var:preset|duotone|white-primary"}}} -->
            <figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url($modestra_images[2]) ?>" alt="" class="wp-image-4587" style="border-radius:200px;object-fit:cover;width:250px;height:250px" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->