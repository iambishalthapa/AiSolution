<?php
if (!defined('MODESTRA_VERSION')) {
    // Replace the version number of the theme on each release.
    define('MODESTRA_VERSION', wp_get_theme()->get('Version'));
}
define('MODESTRA_DEBUG', defined('WP_DEBUG') && WP_DEBUG === true);
define('MODESTRA_DIR', trailingslashit(get_template_directory()));
define('MODESTRA_URL', trailingslashit(get_template_directory_uri()));

if (!function_exists('modestra_support')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * @since walker_fse 1.0.0
     *
     * @return void
     */
    function modestra_support()
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        // Add support for block styles.
        add_theme_support('wp-block-styles');
        add_theme_support('post-thumbnails');
        // Enqueue editor styles.
        add_editor_style('style.css');
        // Removing default patterns.
        remove_theme_support('core-block-patterns');
    }

endif;
add_action('after_setup_theme', 'modestra_support');

/*----------------------------------------------------------------------------------
Enqueue Styles
-----------------------------------------------------------------------------------*/
if (!function_exists('modestra_styles')) :
    function modestra_styles()
    {
        // registering style for theme
        wp_enqueue_style('modestra-style', get_stylesheet_uri(), array(), MODESTRA_VERSION);
        wp_enqueue_style('modestra-blocks-style', get_template_directory_uri() . '/assets/css/blocks.css');
        wp_enqueue_style('modestra-aos-style', get_template_directory_uri() . '/assets/css/aos.css');
        if (is_rtl()) {
            wp_enqueue_style('modestra-rtl-css', get_template_directory_uri() . '/assets/css/rtl.css', 'rtl_css');
        }
        wp_enqueue_script('jquery');
        wp_enqueue_script('modestra-aos-scripts', get_template_directory_uri() . '/assets/js/aos.js', array(), MODESTRA_VERSION, true);
        wp_enqueue_script('modestra-scripts', get_template_directory_uri() . '/assets/js/modestra-scripts.js', array(), MODESTRA_VERSION, true);
    }
endif;

add_action('wp_enqueue_scripts', 'modestra_styles');

/**
 * Enqueue scripts for admin area
 */
function modestra_admin_style()
{
    $hello_notice_current_screen = get_current_screen();
    if (!empty($_GET['page']) && 'about-modestra' === $_GET['page'] || $hello_notice_current_screen->id === 'themes' || $hello_notice_current_screen->id === 'dashboard') {
        wp_enqueue_style('modestra-admin-style', get_template_directory_uri() . '/assets/css/admin-style.css', array(), MODESTRA_VERSION, 'all');
        wp_enqueue_script('modestra-admin-scripts', get_template_directory_uri() . '/assets/js/modestra-admin-scripts.js', array(), MODESTRA_VERSION, true);
        wp_localize_script('modestra-admin-scripts', 'modestra_admin_localize', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('modestra_admin_nonce')
        ));
        wp_enqueue_script('modestra-welcome-notice', get_template_directory_uri() . '/inc/admin/js/modestra-welcome-notice.js', array('jquery'), MODESTRA_VERSION, true);
        wp_localize_script('modestra-welcome-notice', 'modestra_localize', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('modestra_welcome_nonce'),
            'redirect_url' => admin_url('themes.php?page=_cozy_companions')
        ));
    }
}
add_action('admin_enqueue_scripts', 'modestra_admin_style');

/**
 * Enqueue assets scripts for both backend and frontend
 */
function modestra_block_assets()
{
    wp_enqueue_style('modestra-blocks-style', get_template_directory_uri() . '/assets/css/blocks.css');
}
add_action('enqueue_block_assets', 'modestra_block_assets');

/**
 * Load core file.
 */
require_once get_template_directory() . '/inc/core/init.php';

/**
 * Load welcome page file.
 */
require_once get_template_directory() . '/inc/admin/welcome-notice.php';

if (!function_exists('modestra_excerpt_more_postfix')) {
    function modestra_excerpt_more_postfix($more)
    {
        if (is_admin()) {
            return $more;
        }
        return '...';
    }
    add_filter('excerpt_more', 'modestra_excerpt_more_postfix');
}
function modestra_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'modestra_add_woocommerce_support');

function notify_applicant_on_status_change($post_id, $post, $update) {
    // Ensure it's the job application post type
    if ($post->post_type !== 'jobpost_applicants') {
        return;
    }

    // Check if the status was changed
    if (isset($_POST['sjb_jobapp_status'])) {
        $new_status = sanitize_text_field($_POST['sjb_jobapp_status']); // Get the new status from the form
        update_post_meta($post_id, '_application_status', $new_status); // Save the status
    } else {
        // If the status was not updated in the form, get the existing status from the post meta
        $new_status = get_post_meta($post_id, '_application_status', true);
    }

    // Get applicant's information
    $applicant_name = get_post_meta($post_id, 'jobapp_name', true);
    $applicant_email = get_post_meta($post_id, 'jobapp_email', true);
    $job_title = get_the_title($post_id);

    // Prepare the email content
    $subject = "Application Status Update for $job_title";
    $message = "
    Dear $applicant_name,

    Your application for the job '$job_title' has been updated.

    Current Status: $new_status

    Thank you for your interest in this position.

    Regards,
    AI Solution
    ";

    // Send the email if applicant's email is provided
    if (!empty($applicant_email)) {
        wp_mail($applicant_email, $subject, $message);
    }
}

// Hook into save_post to trigger on updates
add_action('save_post', 'notify_applicant_on_status_change', 10, 3);
// Remove the website field from the comment form
function remove_comment_website_field($fields) {
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields', 'remove_comment_website_field');
