<?php
namespace CozyBlock\Pattern;

use WP_Block_Patterns_Registry;

/**
 * Cozy Patterns.
 * source: https://github.com/WordPress/wordpress-develop/blob/6.1/src/wp-includes/block-patterns.php#L198-L336
 * Register any patterns that the active theme may provide under its
 * `./patterns/` directory. Each pattern is defined as a PHP file and defines
 * its metadata using plugin-style headers. The minimum required definition is:
 *
 *     /**
 *      * Title: My Pattern
 *      * Slug: my-theme/my-pattern
 *      *
 *
 * The output of the PHP source corresponds to the content of the pattern, e.g.:
 *
 *     <main><p><?php echo "Hello"; ?></p></main>
 *
 * If applicable, this will collect from both parent and child theme.
 *
 * Other settable fields include:
 *
 *   - Description
 *   - Viewport Width
 *   - Categories       (comma-separated values)
 *   - Keywords         (comma-separated values)
 *   - Block Types      (comma-separated values)
 *   - Post Types       (comma-separated values)
 *   - Inserter         (yes/no)
 *
 * @since 1.3.13
 *
 * @package CozyBlock\Pattern
 */
class CozyPattern {
	/**
	 * The instance of CozyPattern.
	 *
	 * @var \CozyPattern $instance */
	private static $instance = null;

	/**
	 *  Create instance of CozyPattern.
	 * */
	public static function init() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 *  Default function.
	 * */
	public function __construct() {
		add_action(
			'init',
			array( $this, 'register_cozy_pattern_category' )
		);
	}

	/**
	 *  Register pattern category.
	 * */
	public function register_cozy_pattern_category() {
		register_block_pattern_category(
			'cozy-block-patterns',
			array(
				'label' => __( 'Cozy Block Patterns', 'cozy-addons' ),
			)
		);
	}

	private function get_patterns_data( $category = '' ) {
		$pattern_dir_path = COZY_ADDONS_PLUGIN_DIR . 'cozy-blocks/library/patterns/';
		if ( ! is_dir( $pattern_dir_path ) || ! is_readable( $pattern_dir_path ) ) {
			return array();
		}

		$default_headers = array(
			'title'         => 'Title',
			'slug'          => 'Slug',
			'description'   => 'Description',
			'viewportWidth' => 'Viewport Width',
			'categories'    => 'Categories',
			'keywords'      => 'Keywords',
			'blockTypes'    => 'Block Types',
			'postTypes'     => 'Post Types',
			'inserter'      => 'Inserter',
			'premium'       => 'Premium',
			'dynamic'       => 'Dynamic',
			'template'      => 'Template',
		);

		if ( file_exists( $pattern_dir_path ) ) {
			$patterns_collection = array();
			$files               = glob( $pattern_dir_path . '*.php' );

			// return $files;
			if ( $files ) {
				foreach ( $files as $key => $file ) {
					// code...
					$pattern_data = get_file_data( $file, $default_headers );

					// For properties of type array, parse data as comma-separated.
					foreach ( array( 'categories', 'keywords', 'blockTypes', 'postTypes' ) as $property ) {
						if ( ! empty( $pattern_data[ $property ] ) ) {
							$pattern_data[ $property ] = array_filter(
								preg_split(
									'/[\s,]+/',
									(string) $pattern_data[ $property ]
								)
							);
						} else {
							unset( $pattern_data[ $property ] );
						}
					}

					// Parse properties of type int.
					foreach ( array( 'viewportWidth' ) as $property ) {
						if ( ! empty( $pattern_data[ $property ] ) ) {
							$pattern_data[ $property ] = (int) $pattern_data[ $property ];
						} else {
							unset( $pattern_data[ $property ] );
						}
					}

					// Parse properties of type bool.
					foreach ( array( 'inserter' ) as $property ) {
						if ( ! empty( $pattern_data[ $property ] ) ) {
							$pattern_data[ $property ] = in_array(
								strtolower( $pattern_data[ $property ] ),
								array( 'yes', 'true' ),
								true
							);
						} else {
							unset( $pattern_data[ $property ] );
						}
					}

					// Parse properties of type bool.
					foreach ( array( 'premium' ) as $property ) {
						if ( ! empty( $pattern_data[ $property ] ) ) {
							$pattern_data[ $property ] = in_array(
								strtolower( $pattern_data[ $property ] ),
								array( 'yes', 'true' ),
								true
							);
						} else {
							$pattern_data[ $property ] = false;
						}
					}

					// Parse properties of type bool.
					foreach ( array( 'dynamic' ) as $property ) {
						if ( ! empty( $pattern_data[ $property ] ) ) {
							$pattern_data[ $property ] = in_array(
								strtolower( $pattern_data[ $property ] ),
								array( 'yes', 'true' ),
								true
							);
						} else {
							$pattern_data[ $property ] = false;
						}
					}

					$pattern_data['title'] = _x( $pattern_data['title'], 'Pattern title', 'cozy-addons' );
					if ( ! empty( $pattern_data['description'] ) ) {
						$pattern_data['description'] = _x( $pattern_data['description'], 'Pattern description', 'cozy-addons' );
					}

					// The actual pattern content is the output of the file.
					ob_start();
					include $file;
					$pattern_data['content'] = ob_get_clean();
					if ( ! $pattern_data['content'] ) {
						continue;
					}
					array_push( $patterns_collection, $pattern_data );
				}
			}

			if ( empty( $category ) ) {
				return $patterns_collection;
			} else {
				$filtered_patterns = array_filter(
					$patterns_collection,
					function ( $pattern ) use ( $category ) {
						return in_array( $category, $pattern['categories'] );
					}
				);

				return $filtered_patterns;
			}
		}

		return array();
	}

	private function get_template_data( $category = '' ) {
		$template_dir_path = COZY_ADDONS_PLUGIN_DIR . 'cozy-blocks/library/templates/';
		if ( ! is_dir( $template_dir_path ) || ! is_readable( $template_dir_path ) ) {
			return array();
		}

		$default_headers = array(
			'title'         => 'Title',
			'slug'          => 'Slug',
			'description'   => 'Description',
			'viewportWidth' => 'Viewport Width',
			'categories'    => 'Categories',
			'keywords'      => 'Keywords',
			'blockTypes'    => 'Block Types',
			'postTypes'     => 'Post Types',
			'inserter'      => 'Inserter',
			'premium'       => 'Premium',
			'dynamic'       => 'Dynamic',
			'template'      => 'Template',
		);

		if ( file_exists( $template_dir_path ) ) {
			$template_collection = array();
			$files               = glob( $template_dir_path . '*.php' );

			// return $files;
			if ( $files ) {
				foreach ( $files as $key => $file ) {
					// code...
					$template = get_file_data( $file, $default_headers );

					// For properties of type array, parse data as comma-separated.
					foreach ( array( 'categories', 'keywords', 'blockTypes', 'postTypes' ) as $property ) {
						if ( ! empty( $template[ $property ] ) ) {
							$template[ $property ] = array_filter(
								preg_split(
									'/[\s,]+/',
									(string) $template[ $property ]
								)
							);
						} else {
							unset( $template[ $property ] );
						}
					}

					// Parse properties of type int.
					foreach ( array( 'viewportWidth' ) as $property ) {
						if ( ! empty( $template[ $property ] ) ) {
							$template[ $property ] = (int) $template[ $property ];
						} else {
							unset( $template[ $property ] );
						}
					}

					// Parse properties of type bool.
					foreach ( array( 'inserter' ) as $property ) {
						if ( ! empty( $template[ $property ] ) ) {
							$template[ $property ] = in_array(
								strtolower( $template[ $property ] ),
								array( 'yes', 'true' ),
								true
							);
						} else {
							unset( $template[ $property ] );
						}
					}

					// Parse properties of type bool.
					foreach ( array( 'premium' ) as $property ) {
						if ( ! empty( $template[ $property ] ) ) {
							$template[ $property ] = in_array(
								strtolower( $template[ $property ] ),
								array( 'yes', 'true' ),
								true
							);
						} else {
							$template[ $property ] = false;
						}
					}

					// Parse properties of type bool.
					foreach ( array( 'dynamic' ) as $property ) {
						if ( ! empty( $template[ $property ] ) ) {
							$template[ $property ] = in_array(
								strtolower( $template[ $property ] ),
								array( 'yes', 'true' ),
								true
							);
						} else {
							$template[ $property ] = false;
						}
					}

					$template['title'] = _x( $template['title'], 'Template title', 'cozy-addons' );
					if ( ! empty( $template['description'] ) ) {
						$template['description'] = _x( $template['description'], 'Template description', 'cozy-addons' );
					}

					// The actual pattern content is the output of the file.
					ob_start();
					$template_file       = include $file;
					$template['content'] = $template_file['content'];
					if ( ! $template['content'] ) {
						continue;
					}
					array_push( $template_collection, $template );
				}
			}

			if ( empty( $category ) ) {
				return $template_collection;
			} else {
				$filtered_templates = array_filter(
					$template_collection,
					function ( $template ) use ( $category ) {
						return in_array( $category, $template['categories'] );
					}
				);

				return $filtered_templates;
			}
		}

		return array();
	}

	public function get_all_cozy_block_patterns() {
		$all_patterns = $this->get_patterns_data( '' );

		return $all_patterns;
	}

	public function get_all_cozy_block_templates() {
		$all_templates = $this->get_template_data( '' );

		return $all_templates;
	}

	/**
	 *  Retrieve patterns.
	 * */
	public function get_cozy_block_patterns() {

		$category = isset( $_GET['category'] ) && 'all' != $_GET['category'] ? wp_unslash( $_GET['category'] ) : '';
		$offset   = isset( $_GET['offset'] ) ? intval( wp_unslash( $_GET['offset'] ) ) : 0;
		$limit    = isset( $_GET['limit'] ) ? intval( wp_unslash( $_GET['limit'] ) ) : 6;
		$search   = isset( $_GET['search'] ) && 'all' != $_GET['search'] ? wp_unslash( $_GET['search'] ) : '';

		$patterns_collection = $this->get_patterns_data( $category );
		// Ensure $patterns_collection is an array
		if ( ! empty( $search ) ) {
			$filtered_collection = array();
			if ( ! is_array( $patterns_collection ) ) {
				$patterns_collection = (array) $patterns_collection;
			}

			$filtered_collection = array_filter(
				$patterns_collection,
				function ( $pattern ) use ( $search ) {
					return stripos( strtolower( $pattern['title'] ), strtolower( $search ) ) !== false;
				}
			);

			if ( is_object( $filtered_collection ) ) {
				$filtered_collection = (array) $filtered_collection;

			}

			$sliced_patterns = array_slice( $filtered_collection, $offset, $limit );
			wp_send_json(
				array(
					'collection' => $sliced_patterns,
					'search'     => $search,
					'list'       => $filtered_collection,
				)
			);
		} else {
			$sliced_patterns = array_slice( $patterns_collection, $offset, $limit );
			wp_send_json(
				array(
					'collection' => $sliced_patterns,
					'search'     => $search,
				)
			);
		}
	}

	public function get_cozy_pattern_category_count() {
		$templates_collection = $this->get_template_data();

		$template_categories = array(
			// 'all'      => count( $templates_collection ),
			'home' => 0,
		// 'about-us' => 0,
		// 'contact'  => 0,
		// 'services' => 0,
		// 'others'   => 0,
		);

		foreach ( $templates_collection as $template ) {
			foreach ( $template_categories as $key => $value ) {
				if ( in_array( $key, $template['categories'], true ) ) {
					++$template_categories[ $key ];
				}
			}
		}

		wp_send_json(
			array(
				'template_categories' => $template_categories,
			)
		);
	}
}
