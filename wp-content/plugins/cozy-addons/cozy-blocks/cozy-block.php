<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'COZY_BLOCK_VERSION', '1.0.0' );
define( 'COZY_BLOCK_PLUGIN_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'COZY_BLOCK_PLUGIN_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );

if ( ! defined( 'CT_ASSETS_URL' ) ) {
	define( 'CT_ASSETS_URL', 'https://assets.cozythemes.com/' );
}

$autoloader_path = COZY_BLOCK_PLUGIN_DIR . 'vendor/autoload.php';

if ( file_exists( $autoloader_path ) ) {
	include_once $autoloader_path;

	// Ensure the class exists before calling the method.
	if ( class_exists( 'CozyBlock\CozyBlockInit' ) ) {
		CozyBlock\CozyBlockInit::instance();
	} else {
		// Handle the case where the class doesn't exist.
		echo 'Class CozyBlock\CozyBlockInit does not exist.';
	}
} else {
	// Handle the case where the autoloader file doesn't exist.
	echo 'Autoloader file not found.';
}
