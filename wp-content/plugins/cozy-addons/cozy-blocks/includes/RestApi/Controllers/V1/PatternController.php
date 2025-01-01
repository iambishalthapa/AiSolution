<?php
namespace CozyBlock\RestApi\Controllers\V1;

use CozyBlock\Abstracts\RestControllerBase;
use CozyBlock\Pattern\CozyPattern;

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PatternController extends RestControllerBase {
	public function register_routes() {
		try {
			register_rest_route(
				'cozy-block/v1',
				'/patterns/category-count',
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( CozyPattern::init(), 'get_cozy_pattern_category_count' ),
					'permission_callback' => '__return_true',
				)
			);

			register_rest_route(
				'cozy-block/v1',
				'/patterns/collection',
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( CozyPattern::init(), 'get_cozy_block_patterns' ),
					'permission_callback' => '__return_true',
				)
			);

			register_rest_route(
				'cozy-block/v1',
				'/patterns/all',
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( CozyPattern::init(), 'get_all_cozy_block_patterns' ),
					'permission_callback' => '__return_true',
				)
			);

			register_rest_route(
				'cozy-block/v1',
				'/templates/all',
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( CozyPattern::init(), 'get_all_cozy_block_templates' ),
					'permission_callback' => '__return_true',
				)
			);
		} catch ( \Exception $e ) {
			// error_log( 'Error registering route: ' . $e->getMessage() );
		}
	}
}
