<?php

/**
 * Title: Photo Gallery with Column 4
 * Slug: modestra/photo-gallery-2
 * Categories: modestra-portfolio
 */
$modestra_url = trailingslashit(get_template_directory_uri());
$modestra_images = array(
    $modestra_url . 'assets/images/g1.jpg',
    $modestra_url . 'assets/images/g2.jpg',
    $modestra_url . 'assets/images/g3.jpg',
    $modestra_url . 'assets/images/g4.jpg',
    $modestra_url . 'assets/images/g5.jpg',
    $modestra_url . 'assets/images/g6.jpg',
    $modestra_url . 'assets/images/g7.jpg',
    $modestra_url . 'assets/images/g8.jpg'
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"100px","bottom":"100px"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"margin":{"bottom":"48px"}}}} -->
    <h1 class="wp-block-heading has-text-align-center" style="margin-bottom:48px"><?php esc_html_e('Photo Gallery', 'modestra') ?></h1>
    <!-- /wp:heading -->

    <!-- wp:gallery {"columns":4,"linkTarget":"_blank","linkTo":"media","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
    <figure class="wp-block-gallery has-nested-images columns-4 is-cropped"><!-- wp:image {"id":4377,"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url($modestra_images[0]) ?>" target="_blank" rel="noopener"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4377" /></a>
            <figcaption class="wp-element-caption"><strong><?php esc_html_e('Branding', 'modestra') ?></strong></figcaption>
        </figure>
        <!-- /wp:image -->

        <!-- wp:image {"id":4376,"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url($modestra_images[1]) ?>" target="_blank" rel="noopener"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-4376" /></a>
            <figcaption class="wp-element-caption"><strong><?php esc_html_e('Mobile App', 'modestra') ?></strong></figcaption>
        </figure>
        <!-- /wp:image -->

        <!-- wp:image {"id":4377,"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url($modestra_images[2]) ?>" target="_blank" rel="noopener"><img src="<?php echo esc_url($modestra_images[0]) ?>" alt="" class="wp-image-4377" /></a>
            <figcaption class="wp-element-caption"><strong><?php esc_html_e('Portfolio Title', 'modestra') ?></strong></figcaption>
        </figure>
        <!-- /wp:image -->

        <!-- wp:image {"id":4375,"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url($modestra_images[3]) ?>" target="_blank" rel="noopener"><img src="<?php echo esc_url($modestra_images[4]) ?>" alt="" class="wp-image-4375" /></a>
            <figcaption class="wp-element-caption"><strong><?php esc_html_e('UI/UX Design', 'modestra') ?></strong></figcaption>
        </figure>
        <!-- /wp:image -->

        <!-- wp:image {"id":4376,"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url($modestra_images[4]) ?>" target="_blank" rel="noopener"><img src="<?php echo esc_url($modestra_images[1]) ?>" alt="" class="wp-image-4376" /></a>
            <figcaption class="wp-element-caption"><strong><?php esc_html_e('Project Title', 'modestra') ?></strong></figcaption>
        </figure>
        <!-- /wp:image -->

        <!-- wp:image {"id":4374,"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url($modestra_images[5]) ?>" target="_blank" rel="noopener"><img src="<?php echo esc_url($modestra_images[5]) ?>" alt="" class="wp-image-4374" /></a>
            <figcaption class="wp-element-caption"><strong><?php esc_html_e('Digital Marketing', 'modestra') ?></strong></figcaption>
        </figure>
        <!-- /wp:image -->

        <!-- wp:image {"id":4375,"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url($modestra_images[6]) ?>" target="_blank" rel="noopener"><img src="<?php echo esc_url($modestra_images[4]) ?>" alt="" class="wp-image-4375" /></a>
            <figcaption class="wp-element-caption"><strong><?php esc_html_e('Digital Product Title', 'modestra') ?></strong></figcaption>
        </figure>
        <!-- /wp:image -->

        <!-- wp:image {"id":4374,"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url($modestra_images[7]) ?>" target="_blank" rel="noopener"><img src="<?php echo esc_url($modestra_images[5]) ?>" alt="" class="wp-image-4374" /></a>
            <figcaption class="wp-element-caption"><strong><?php esc_html_e('Product Title', 'modestra') ?></strong></figcaption>
        </figure>
        <!-- /wp:image -->
    </figure>
    <!-- /wp:gallery -->
</div>
<!-- /wp:group -->