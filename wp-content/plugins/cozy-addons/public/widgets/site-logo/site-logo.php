<?php
function get_custom_theme_logo_url()
{
    $custom_logo_id =  get_theme_mod('custom_logo');
    $image = wp_get_attachment_image_src($custom_logo_id, 'full');
    return $image[0];
}

if ('yes' === $settings['enable_site_link']) :
    $site_link = '';
    if ('wp-site-link' === $settings['site_link_option'] || empty($settings['custom_site_link']['url'])) {
        $site_link = get_bloginfo('url');
    } else {
        $site_link = $settings['custom_site_link']['url'];
    }
    echo '<a href="' . $site_link . '">';
endif;
?>
<div class="cozy-site-identity-wrapper">
    <?php

    if ('yes' === $settings['enable_site_logo']) :
    ?>
        <div class="site-logo">
            <?php
            $site_logo_source = $settings['site_logo_option'];

            if ('wp-site-logo' === $site_logo_source) {
                if (!get_custom_logo()) {
                    echo '<img src="' . \Elementor\Utils::get_placeholder_image_src() . '">';
                } else {
                    echo '<img src="' . get_custom_theme_logo_url() . '">';
                }
            }

            if ('custom' === $site_logo_source) {
                echo '<img src="' . $settings['custom_logo']['url'] . '" >';
            }
            ?>
        </div>
    <?php
    endif;

    if ('yes' === $settings['enable_site_title']) :
    ?>
        <div class="site-title">
            <?php
            $site_title_source = $settings['site_title_option'];
            if ('wp-site-title' ===  $site_title_source) {
                if (!get_bloginfo('name')) {
                    echo "Site Title";
                } else {
                    echo get_bloginfo('name');
                }
            } else {
                echo $settings['custom_site_title'];
            }
            ?>
        </div>
    <?php
    endif;


    ?>
</div>
<?php
if ('yes' === $settings['enable_site_link']) :
    echo "</a>";
endif;
?>