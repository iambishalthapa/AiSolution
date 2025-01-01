<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://cozythemes.com/
 * @since      1.0.0
 *
 * @package    Patternberg
 * @subpackage patternberg/inc
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Cozy_Companions_Menu' ) ) :
	class Cozy_Companions_Menu {


		public function __construct() {
			add_action( 'admin_menu', array( $this, 'register_companions_menus' ), 9 );
		}

		public function register_companions_menus() {
			if ( ! menu_page_url( '_cozy_companions' ) ) {
				add_menu_page( 'Cozy Blocks', 'Cozy Blocks', 'manage_options', '_cozy_companions', array( $this, 'cozy_companion_info' ), CT_COMPANION_SDK_URL . 'images/ct_logo.svg', '2' );
				add_submenu_page(
					'_cozy_companions',
					'Dashboard',
					__( 'Dashboard', 'patternberg' ),
					'manage_options',
					'_cozy_companions'
				);
			}
		}
		public function cozy_companion_info() {
			include_once 'dashboard.php';
		}
	}

	$CT_Companion_Menu = new Cozy_Companions_Menu();

endif;
if ( ! function_exists( '_ct_companion_scripts_loading' ) ) {
	function _ct_companion_scripts_loading() {
		wp_enqueue_style( 'companion-admin-style', CT_COMPANION_SDK_URL . 'css/companions-style.css' );
		wp_enqueue_script( 'companion-admin-scripts', CT_COMPANION_SDK_URL . 'js/companions-scripts.js', array( 'jquery' ), '', true );
		wp_localize_script(
			'companion-admin-scripts',
			'ajax_object',
			array(
				'ajax_url'          => admin_url( 'admin-ajax.php' ),
				'isPremium'         => cozy_addons_premium_access(),
				'isElementorActive' => is_plugin_active( 'elementor/elementor.php' ),
			)
		);
	}
	add_action( 'admin_enqueue_scripts', '_ct_companion_scripts_loading' );
}
