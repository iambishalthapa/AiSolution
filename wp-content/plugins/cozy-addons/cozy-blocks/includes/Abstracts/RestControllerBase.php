<?php
/**
 * Base class for controllers.
 *
 * @package CozyBlock\Abstracts
 */

namespace CozyBlock\Abstracts;

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Base class for controllers.
 *
 * @since 1.0.0
 */
class RestControllerBase extends \WP_REST_Controller {
	/**
	 * Class construct.
	 *
	 * @param string $class_namespace API namespace.
	 * @param string $rest_base API rest or route base.
	 */
	public function __construct( $class_namespace, $rest_base ) {
		$this->namespace = $class_namespace;
		$this->rest_base = $rest_base;

	}

	/**
	 * {@inheritDoc}
	 */
	public function get_items_permissions_check( $request ) {
		return current_user_can( 'manage_options' );
	}

	/**
	 * {@inheritDoc}
	 */
	public function get_item_permissions_check( $request ) {
		return current_user_can( 'manage_options' );
	}

	/**
	 * {@inheritDoc}
	 */
	public function update_item_permissions_check( $request ) {
		return current_user_can( 'manage_options' );
	}

	/**
	 * {@inheritDoc}
	 */
	public function delete_item_permissions_check( $request ) {
		return current_user_can( 'manage_options' );
	}
}
