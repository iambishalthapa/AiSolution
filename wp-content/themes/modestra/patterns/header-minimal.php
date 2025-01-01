<?php

/**
 * Title: Header Minimal with background
 * Slug: modestra/header-minimal
 * Categories:header
 */
?>
<!-- wp:group {"metadata":{"categories":["header"],"patternName":"modestra/header-default","name":"Header Default"},"className":"modestra-header","style":{"spacing":{"padding":{"top":"22px","right":"var:preset|spacing|40","bottom":"22px","left":"var:preset|spacing|40"}},"border":{"bottom":{"color":"var:preset|color|border-color-dark","width":"1px"},"top":[],"right":[],"left":[]}},"backgroundColor":"primary","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group modestra-header has-primary-background-color has-background" style="border-bottom-color:var(--wp--preset--color--border-color-dark);border-bottom-width:1px;padding-top:22px;padding-right:var(--wp--preset--spacing--40);padding-bottom:22px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group"><!-- wp:site-logo {"width":32,"shouldSyncIcon":false,"style":{"color":{"duotone":["#FFFFFF","#FFFFFF"]}}} /-->

            <!-- wp:site-title {"style":{"typography":{"fontStyle":"normal","fontWeight":"600","textTransform":"none","letterSpacing":"0px","fontSize":"28px"},"elements":{"link":{"color":{"text":"var:preset|color|light-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"margin":{"top":"5px"}}}} /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"}} -->
        <div class="wp-block-group"><!-- wp:navigation {"textColor":"light-color","overlayBackgroundColor":"secondary-bg","overlayTextColor":"heading-color","className":"modestra-navigation","style":{"typography":{"textTransform":"none","fontStyle":"normal","fontWeight":"500","lineHeight":"2","fontSize":"18px"},"spacing":{"blockGap":"24px"}},"layout":{"type":"flex","justifyContent":"center"}} /-->

            <!-- wp:buttons {"className":"is-style-buttons-hover-translate-effect"} -->
            <div class="wp-block-buttons is-style-buttons-hover-translate-effect"><!-- wp:button {"backgroundColor":"light-color","textColor":"primary","className":"is-style-button-hover-secondary-bgcolor","style":{"spacing":{"padding":{"left":"28px","right":"28px","top":"14px","bottom":"14px"}},"border":{"radius":"60px"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}}} -->
                <div class="wp-block-button is-style-button-hover-secondary-bgcolor"><a class="wp-block-button__link has-primary-color has-light-color-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:60px;padding-top:14px;padding-right:28px;padding-bottom:14px;padding-left:28px"><?php esc_html_e('Download Now', 'modestra') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->