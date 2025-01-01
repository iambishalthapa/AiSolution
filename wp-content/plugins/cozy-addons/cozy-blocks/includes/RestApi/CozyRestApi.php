<?php
/**
 * Main file for initializing our plugins API.
 *
 * @package CozyBlocks\RestApi
 */

namespace CozyBlock\RestApi;

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// if ( ! class_exists( 'CozyRestApi' ) ) {
class CozyRestApi {

	/**
	 * This class instance
	 *
	 * @var CozyRestApi
	 */
	private static $instance;

	protected $controllers = array();

	public static function init() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct() {
		add_action( 'rest_api_init', array( $this, 'cozy_api_init' ) );
	}

	public function cozy_api_init() {
		$namespaces = apply_filters( 'cozy_rest_api_namespaces', $this->get_namespaces() );

		if ( is_array( $namespaces ) && ! empty( $namespaces ) ) {
			foreach ( $namespaces as $namespace => $controllers ) {
				if ( is_array( $controllers ) && ! empty( $controllers ) ) {
					foreach ( $controllers as $rest_base => $controller ) {
						$this->controllers[ $namespace ][ $rest_base ] = new $controller( $namespace, $rest_base );
						$this->controllers[ $namespace ][ $rest_base ]->register_routes();
					}
				}
			}
		}
	}

	public function get_cozy_V1_controllers() {
		return array(
			'block'       => __NAMESPACE__ . '\\Controllers\\V1\\BlockController',
			// 'pattern'     => __NAMESPACE__ . '\\Controllers\\V1\\PatternController',
			'woocommerce' => __NAMESPACE__ . '\\Controllers\\V1\\WooController',
		);
	}

	public function get_namespaces() {
		return array(
			'cozy_block/v1' => $this->get_cozy_V1_controllers(),
		);
	}
}
// }
