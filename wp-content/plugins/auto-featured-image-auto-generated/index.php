<?php

/*
 * Plugin Name: Auto Featured Image (Auto Generated)
 * description: Automatically generate a featured image from the post title (Background with post title overlay). This plugins generate a featured image using the post title. The image is saved in the media library and set as featured image.
 * Version: 2.2.4
 * Author: Jodacame
 * Author URI: https://jodacame.dev
 * Text Domain: auto-featured-image-auto-generated
 * Domain Path: /languages
 * Tested up to: 6.6.2
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
if ( !defined( 'WP_FS__ENABLE_GARBAGE_COLLECTOR' ) ) {
    define( 'WP_FS__ENABLE_GARBAGE_COLLECTOR', true );
}
/**
 * Define plugin constants
 */
define( 'ATFIT_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'ATFIT_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'ATFIT_PLUGIN_FILE', __FILE__ );
define( 'ATFIT_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'ATFIT_PLUGIN_VERSION', '2.2.4' );
define( 'ATFIT_PLUGIN_SLUG', 'auto-featured-image-auto-generated' );
define( 'ATFIT_PLUGIN_TEXT_DOMAIN', 'auto-featured-image-auto-generated' );
define( 'ATFIT_PLUGIN_NAME', 'Auto Featured Image (Auto Generated)' );
// Load text domain
add_action( 'plugins_loaded', function () {
    load_plugin_textdomain( 'auto-featured-image-auto-generated', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
} );
require_once ATFIT_PLUGIN_DIR . 'freemius.php';
require_once ATFIT_PLUGIN_DIR . 'admin/Admin.class.php';
require_once ATFIT_PLUGIN_DIR . 'admin/Trigger.class.php';
if ( function_exists( 'ttfi_fs' ) ) {
    ttfi_fs()->set_basename( false, __FILE__ );
}
ATFIT_Admin::instance();
ATFIT_Trigger::instance();
ttfi_fs()->add_action( 'after_uninstall', 'atfit_uninstall' );
function atfit_uninstall() {
    $settings = get_option( 'atfit_settings' );
    $action = $settings['on_uninstall'];
    if ( $action == 'delete' ) {
        delete_option( 'atfit_settings' );
    }
}

// Helpers
if ( !function_exists( 'mb_strtolower' ) ) {
    function mb_strtolower(  $str, $encoding = null  ) {
        if ( $encoding === null ) {
            return strtolower( $str );
        } else {
            return strtolower( iconv( $encoding, 'UTF-8', $str ) );
        }
    }

}
if ( !function_exists( 'mb_detect_encoding' ) ) {
    function mb_detect_encoding(  $str, $encodingList = null, $strict = false  ) {
        return 'UTF-8';
    }

}