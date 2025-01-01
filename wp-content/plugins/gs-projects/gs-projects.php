<?php
/**
 *
 * @package   GS_Projects
 * @author    GS Plugins <hello@gsplugins.com>
 * @license   GPL-2.0+
 * @link      https://www.gsplugins.com
 * @copyright 2016 GS Plugins
 *
 * @wordpress-plugin
 * Plugin Name:         GS Projects Lite
 * Plugin URI:          https://www.gsplugins.com/wordpress-plugins
 * Description:         Best Responsive Projects plugin for WordPress to showcase Projects with Title, Desc, Category, Skills, Project URL, Client review & ratings, Project Image / Gallery, Youtube / Vimeo video. Display anywhere at your site using shortcode like [gs_projects theme="gs_project_theme1"] & widgets. Check more shortcode examples and documentation at <a href="https://projects.gsplugins.com">GS Projects PRO Demos & Docs</a>
 * Version:             1.1.2
 * Author:              GS Plugins
 * Author URI:          https://www.gsplugins.com
 * Text Domain:         gsprojects
 * License:             GPL-2.0+
 * License URI:         http://www.gnu.org/licenses/gpl-2.0.txt
 */

if( ! defined( 'GSPROJECTS_HACK_MSG' ) ) define( 'GSPROJECTS_HACK_MSG', __( 'Sorry cowboy! This is not your place', 'gsprojects' ) );

/**
 * Protect direct access
 */
if ( ! defined( 'ABSPATH' ) ) die( GSPROJECTS_HACK_MSG );

if( !function_exists( 'remove_admin_notices' ) ) {
    function remove_admin_notices( ) {
        if ( isset($_GET['post_type']) && $_GET['post_type'] === 'gs_projects' ) {
            remove_all_actions( 'network_admin_notices' );
            remove_all_actions( 'user_admin_notices' );
            remove_all_actions( 'admin_notices' );
            remove_all_actions( 'all_admin_notices' );
        }
    }
}
add_action( 'in_admin_header',  'remove_admin_notices' );

/**
 * Defining constants
 */
if( ! defined( 'GSPROJECTS_VERSION' ) ) define( 'GSPROJECTS_VERSION', '1.1.2' );
if( ! defined( 'GSPROJECTS_MENU_POSITION' ) ) define( 'GSPROJECTS_MENU_POSITION', 40 );
if( ! defined( 'GSPROJECTS_PLUGIN_DIR' ) ) define( 'GSPROJECTS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
if( ! defined( 'GSPROJECTS_PLUGIN_URI' ) ) define( 'GSPROJECTS_PLUGIN_URI', plugins_url( '', __FILE__ ) );
if( ! defined( 'GSPROJECTS_FILES_DIR' ) ) define( 'GSPROJECTS_FILES_DIR', GSPROJECTS_PLUGIN_DIR . 'gsprojects-files' );
if( ! defined( 'GSPROJECTS_FILES_URI' ) ) define( 'GSPROJECTS_FILES_URI', GSPROJECTS_PLUGIN_URI . '/gsprojects-files' );

require_once GSPROJECTS_FILES_DIR . '/includes/gs-projects-cpt.php';
require_once GSPROJECTS_FILES_DIR . '/includes/gs-projects-meta-fields.php';
require_once GSPROJECTS_FILES_DIR . '/includes/gs-projects-column.php';
require_once GSPROJECTS_FILES_DIR . '/includes/gs-projects-shortcode.php';
require_once GSPROJECTS_FILES_DIR . '/gs-projects-scripts.php';
require_once GSPROJECTS_FILES_DIR . '/admin/class.settings-api.php';
require_once GSPROJECTS_FILES_DIR . '/admin/gs_projects_options_config.php';
require_once GSPROJECTS_FILES_DIR . '/gs-common-pages/gs-project-common-pages.php';

if ( ! function_exists('gs_projects_pro_link') ) {
    function gs_projects_pro_link( $gsProject_links ) {
        $gsProject_links[] = '<a class="gs-project-pro-link" href="https://www.gsplugins.com/product/wordpress-projects-showcase-plugin" target="_blank">Go Pro!</a>';
        $gsProject_links[] = '<a href="https://www.gsplugins.com/wordpress-plugins" target="_blank">GS Plugins</a>';
        return $gsProject_links;
    }
    add_filter( 'plugin_action_links_' .plugin_basename(__FILE__), 'gs_projects_pro_link' );
}

/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_gs_projects() {

    if ( ! class_exists( 'GS_Projects_Appsero\Client' ) ) {
        require_once GSPROJECTS_FILES_DIR . '/appsero/Client.php';
    }

    $client = new GS_Projects_Appsero\Client( '782c9661-ef27-45dd-a28f-d1925c253fdf', 'GS Projects Lite', __FILE__ );

    // Active insights
    $client->insights()->init();

}

appsero_init_tracker_gs_projects();


/**
 * @gs_projects_review_dismiss()
 * @gs_projects_review_pending()
 * @gs_projects_review_notice_message()
 * Make all the above functions working.
 */

add_action( 'admin_init', 'gs_projects_review_notice' );

function gs_projects_review_notice() {

    gs_projects_review_dismiss();
    gs_projects_review_pending();

    $activation_time    = get_site_option( 'gs_projects_active_time' );
    $review_dismissal   = get_site_option( 'gs_projects_review_dismiss' );

    if ( 'yes' == $review_dismissal ) return;

    if ( ! $activation_time ) :

        $activation_time = time();
        add_site_option( 'gs_projects_active_time', $activation_time );
    endif;

    if ( time() - $activation_time > 259200 ) :
        add_action( 'admin_notices' , 'gs_projects_review_notice_message' );
    endif;

}

/**
 * For the notice preview.
 */
function gs_projects_review_notice_message(){
    $scheme      = (parse_url( $_SERVER['REQUEST_URI'], PHP_URL_QUERY )) ? '&' : '?';
    $url         = $_SERVER['REQUEST_URI'] . $scheme . 'gs_projects_review_dismiss=yes';
    $dismiss_url = wp_nonce_url( $url, 'gs-projects-review-nonce' );

    $_later_link = $_SERVER['REQUEST_URI'] . $scheme . 'gs_projects_review_later=yes';
    $later_url   = wp_nonce_url( $_later_link, 'gs-projects-review-nonce' );
    ?>
    
    <div class="gslogo-review-notice">
        <div class="gslogo-review-thumbnail">
            <img src="<?php echo GSPROJECTS_FILES_URI . '/assets/img/icon-128x128.png'; ?>" alt="">
        </div>
        <div class="gslogo-review-text">
            <h3><?php _e( 'Leave A Review?', 'gsprojects' ) ?></h3>
            <p><?php _e( 'We hope you\'ve enjoyed using <b>GS Projects Lite</b>! Would you consider leaving us a review on WordPress.org?', 'gsprojects' ) ?></p>
            <ul class="gslogo-review-ul">
                <li>
                    <a href="https://wordpress.org/support/plugin/gs-projects/reviews/" target="_blank">
                        <span class="dashicons dashicons-external"></span>
                        <?php _e( 'Sure! I\'d love to!', 'gsprojects' ) ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $dismiss_url ?>">
                        <span class="dashicons dashicons-smiley"></span>
                        <?php _e( 'I\'ve already left a review', 'gsprojects' ) ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $later_url ?>">
                        <span class="dashicons dashicons-calendar-alt"></span>
                        <?php _e( 'Maybe Later', 'gsprojects' ) ?>
                    </a>
                </li>
                <li>
                    <a href="https://www.gsplugins.com/contact/" target="_blank">
                        <span class="dashicons dashicons-sos"></span>
                        <?php _e( 'I need help!', 'gsprojects' ) ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $dismiss_url ?>">
                        <span class="dashicons dashicons-dismiss"></span>
                        <?php _e( 'Never show again', 'gsprojects' ) ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    <?php
}

/**
 * For Dismiss! 
 */
function gs_projects_review_dismiss(){

    if ( ! is_admin() ||
        ! current_user_can( 'manage_options' ) ||
        ! isset( $_GET['_wpnonce'] ) ||
        ! wp_verify_nonce( sanitize_key( wp_unslash( $_GET['_wpnonce'] ) ), 'gs-projects-review-nonce' ) ||
        ! isset( $_GET['gs_projects_review_dismiss'] ) ) {

        return;
    }

    add_site_option( 'gs_projects_review_dismiss', 'yes' );   
}

/**
 * For Maybe Later Update.
 */
function gs_projects_review_pending() {

    if ( ! is_admin() ||
        ! current_user_can( 'manage_options' ) ||
        ! isset( $_GET['_wpnonce'] ) ||
        ! wp_verify_nonce( sanitize_key( wp_unslash( $_GET['_wpnonce'] ) ), 'gs-projects-review-nonce' ) ||
        ! isset( $_GET['gs_projects_review_later'] ) ) {

        return;
    }
    // Reset Time to current time.
    update_site_option( 'gs_projects_active_time', time() );

}

/**
 * Remove Reviews Metadata on plugin Deactivation.
 */
function gs_projects_deactivate() {
    delete_option('gs_projects_active_time');
}
register_deactivation_hook(__FILE__, 'gs_projects_deactivate');



if ( ! function_exists('gsprojects_row_meta') ) {
    function gsprojects_row_meta( $meta_fields, $file ) {
  
    if ( $file != 'gs-projects-lite/gs-projects.php' ) {
        return $meta_fields;
    }
    
        echo "<style>.gsprojects-rate-stars { display: inline-block; color: #ffb900; position: relative; top: 3px; }.gsprojects-rate-stars svg{ fill:#ffb900; } .gsprojects-rate-stars svg:hover{ fill:#ffb900 } .gsprojects-rate-stars svg:hover ~ svg{ fill:none; } </style>";

        $plugin_rate   = "https://wordpress.org/support/plugin/gs-projects/reviews/?rate=5#new-post";
        $plugin_filter = "https://wordpress.org/support/plugin/gs-projects/reviews/?filter=5";
        $svg_xmlns     = "https://www.w3.org/2000/svg";
        $svg_icon      = '';

        for ( $i = 0; $i < 5; $i++ ) {
            $svg_icon .= "<svg xmlns='" . esc_url( $svg_xmlns ) . "' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>";
        }

        // Set icon for thumbsup.
        $meta_fields[] = '<a href="' . esc_url( $plugin_filter ) . '" target="_blank"><span class="dashicons dashicons-thumbs-up"></span>' . __( 'Vote!', 'gscs' ) . '</a>';

        // Set icon for 5-star reviews. v1.1.22
        $meta_fields[] = "<a href='" . esc_url( $plugin_rate ) . "' target='_blank' title='" . esc_html__( 'Rate', 'gscs' ) . "'><i class='gsprojects-rate-stars'>" . $svg_icon . "</i></a>";

        return $meta_fields;
    }
    add_filter( 'plugin_row_meta','gsprojects_row_meta', 10, 2 );
  }
