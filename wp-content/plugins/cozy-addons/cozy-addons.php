<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://cozythemes.com/
 * @since             1.0.0
 * @package           Cozy_Addons
 *
 * @wordpress-plugin
 * Plugin Name:       Cozy Blocks
 * Plugin URI:        https://cozythemes.com/cozy-addons
 * Description:       Streamline your website designs with our library of advanced blocks designed to extend the WordPress Site Editor.
 * Version:           2.0.29
 * Author:            CozyThemes
 * Author URI:        https://cozythemes.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cozy-addons
 * Domain Path:       /languages/
 * Requires at least: 5.8
 * Requires PHP: 7.3
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
if ( ! function_exists( 'cc_fs' ) ) {
	// Create a helper function for easy SDK access.
	function cc_fs() {
		global $cc_fs;
		if ( ! isset( $cc_fs ) ) {
			// Include Freemius SDK.
			require_once __DIR__ . '/freemius/start.php';

			$cc_fs = fs_dynamic_init(
				array(
					'id'                  => '12692',
					'slug'                => 'cozy-addons',
					'premium_slug'        => 'cozy-companions-premium',
					'type'                => 'plugin',
					'public_key'          => 'pk_fbca81b65cb25c89dcf0662ce4cc6',
					'is_premium'          => true,
					'premium_suffix'      => 'Pro',
					// If your plugin is a serviceware, set this option to false.
					'has_premium_version' => false,
					'has_addons'          => false,
					'has_affiliation'     => true,
					'has_paid_plans'      => true,
					'menu'                => array(
						'slug'    => '_cozy_companions',
						'support' => false,
					),
				)
			);
		}

		return $cc_fs;
	}

	// Init Freemius.
	cc_fs();
	// Signal that SDK was initiated.
	do_action( 'cc_fs_loaded' );
}
define( 'COZY_ADDONS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'COZY_ADDONS_PLUGIN_URL', plugins_url( '', __FILE__ ) );
if ( ! defined( 'CT_COMPANION_SDK_URL' ) ) {
	define( 'CT_COMPANION_SDK_URL', COZY_ADDONS_PLUGIN_URL . '/admin/ct-companions/' );
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cozy-addons-activator.php
 */
function activate_cozy_addons() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cozy-addons-activator.php';
	Cozy_Addons_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cozy-addons-deactivator.php
 */
function deactivate_cozy_addons() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cozy-addons-deactivator.php';
	Cozy_Addons_Deactivator::deactivate();
}

function cc_fs_uninstall_cleanup() {
	register_uninstall_hook( __FILE__, 'cozy_addons_uninstall' );
}

register_activation_hook( __FILE__, 'activate_cozy_addons' );
register_deactivation_hook( __FILE__, 'deactivate_cozy_addons' );
// cc_fs()->add_action('after_uninstall', 'cc_fs_uninstall_cleanup');
/**
 * Main Elementor Layout Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */

define( 'COZY_ADDONS_VERSION', '2.0.29' );

if ( ! class_exists( 'Cozy_Addons' ) ) :
	final class Cozy_Addons {
		/**
		 * Minimum PHP Version
		 *
		 * @since 1.0.0
		 *
		 * @var string Minimum PHP version required to run the plugin.
		 */
		const MINIMUM_PHP_VERSION = '7.0';

		/**
		 * Instance
		 *
		 * @since 1.0.0
		 *
		 * @access private
		 * @static
		 *
		 * @var Cozy_Addons The single instance of the class.
		 */
		private static $_instance = null;

		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 * @static
		 *
		 * @return Cozy_Addons An instance of the class.
		 */
		public static function instance() {

			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Constructor
		 *
		 * @since 1.0.0
		 * @access public
		 */
		public function __construct() {
			// Load translation.
			add_action( 'init', array( $this, 'i18n' ) );

			// Init Plugin.
			$this->cozy_addons_load_files();
			add_action( 'plugins_loaded', array( $this, 'init' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'cozy_addons_dashboard_style' ) );
		}

		private function cozy_addons_load_files() {
			/**
			 * Register menu for cozy addons
			 */
			require_once COZY_ADDONS_PLUGIN_DIR . 'admin/admin-notice.php';
			require_once COZY_ADDONS_PLUGIN_DIR . 'admin/functions.php';
			require COZY_ADDONS_PLUGIN_DIR . 'admin/ct-companions/ct-companions.php';

			$ct_header_footer_enabled = get_option( 'ct_header_footer_enabled' );
			if ( '1' === $ct_header_footer_enabled ) {
				require_once COZY_ADDONS_PLUGIN_DIR . 'admin/inc/ct-header-footer.php';
			}

			$ct_custom_assets_enabled = get_option( 'ct_custom_assets_enabled' );
			if ( '1' === $ct_custom_assets_enabled ) {
				require COZY_ADDONS_PLUGIN_DIR . 'admin/ct-companions/ct-custom-scripts.php';
			}

			require_once COZY_ADDONS_PLUGIN_DIR . 'admin/inc/ct-extensions.php';

			$ct_custom_fonts_enabled = get_option( 'ct_custom_fonts_enabled' );
			if ( '1' === $ct_custom_fonts_enabled ) {
				require_once COZY_ADDONS_PLUGIN_DIR . 'admin/ct-companions/ct-custom-fonts.php';
			}

			// Cozy Addons CPT
			require_once COZY_ADDONS_PLUGIN_DIR . 'admin/cpt/cpt-init.php';
		}

		/**
		 * Load Textdomain
		 *
		 * Load plugin localization files.
		 *
		 * Fired by `init` action hook.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function i18n() {
			$lang_dir = dirname( plugin_basename( __FILE__ ) ) . '/languages/';

			load_plugin_textdomain( 'cozy-addons', false, $lang_dir );
		}

		/**
		 * Initialize the plugin
		 *
		 * Load the plugin only after Elementor (and other plugins) are loaded.
		 * Checks for basic plugin requirements, if one check fail don't continue,
		 * if all check have passed load the files required to run the plugin.
		 *
		 * Fired by `plugins_loaded` action hook.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function init() {
			// Add Plugin actions
			require_once 'init.php';

			// Register cozy block.
			if ( cozy_addons_is_block_theme() && file_exists( COZY_ADDONS_PLUGIN_DIR . 'cozy-blocks/cozy-block.php' ) ) {
				require_once COZY_ADDONS_PLUGIN_DIR . 'cozy-blocks/cozy-block.php';
			}
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required PHP version.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function admin_notice_minimum_php_version() {

			if ( isset( $_GET['activate'] ) ) {
				unset( $_GET['activate'] );
			}

			$message = sprintf(
				/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'cozy-addons' ),
				'<strong>' . esc_html__( 'Cozy Blocks', 'cozy-addons' ) . '</strong>',
				'<strong>' . esc_html__( 'PHP', 'cozy-addons' ) . '</strong>',
				self::MINIMUM_PHP_VERSION
			);

			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}
		public function cozy_addons_dashboard_style() {
			wp_enqueue_style( 'cozy-addons-admin-style', plugin_dir_url( __FILE__ ) . '/admin/css/cozy-addons-admin.css', array(), '', 'all' );
		}
	}

	// Instantiate Cozy Addons.
	Cozy_Addons::instance();

endif;
