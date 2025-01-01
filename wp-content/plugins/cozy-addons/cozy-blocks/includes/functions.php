<?php
/**
 * Retrieves the path to theme.json file of the active theme.
 */
function get_theme_json_url() {
	$theme_directory = '';
	$theme_json_url  = '';

	$active_theme = wp_get_theme();
	$parent_theme = $active_theme->parent();
	if ( false !== $parent_theme ) {
		$parent_theme_uri = get_template_directory_uri();
		$theme_json_url   = $parent_theme_uri . '/theme.json';
		return esc_url( $theme_json_url ); // Return the URL of theme.json
	} else {
		$theme_directory = get_theme_file_uri(); // Get URL to the theme directory
		$theme_json_url  = trailingslashit( $theme_directory ) . 'theme.json';
	}

	return esc_url( $theme_json_url ); // Return the URL of theme.json
}

/**
 * Retrieves the fonts from the theme.json file of the active theme.
 */
function cozy_get_fonts_from_active_theme() {
	$theme_json_url = get_theme_json_url(); // Path to theme.json

	// Make an HTTP request to fetch the contents of theme.json
	$response = wp_remote_get( $theme_json_url );

	if ( ! is_wp_error( $response ) && 200 === $response['response']['code'] ) {
		$json_content = wp_remote_retrieve_body( $response ); // Get the JSON content

		// Decode JSON content
		$decoded_json = json_decode( $json_content, true );

		// Identify fields containing translatable text and extract them
		$translatables = array();
		if ( isset( $decoded_json['settings']['typography']['fontFamilies'] ) ) {
			$font_data_array = $decoded_json['settings']['typography']['fontFamilies']; // Example field
			// Add more fields as needed

			foreach ( $font_data_array as $font_data ) {
				if ( isset( $font_data['fontFamily'] ) ) {
					if (
						isset( $font_data['fontFamily'] ) &&
						! preg_match( '/^(sans|serif|system)/i', $font_data['fontFamily'] ) &&
						substr_count( $font_data['fontFamily'], ',' ) <= 1
					) {
						$font_family_parts = explode( ',', $font_data['fontFamily'] );
						$first_part        = trim( $font_family_parts[0] );
						$translatables[]   = array(
							'label' => str_replace( '"', '', $first_part ),
							'value' => $first_part,
						);
					}
				}
			}
		}
		return $translatables;
	}

	return array();
}

/**
 * Adds data attributes for the responsive show/hide in the block.
 *
 * @param string $block_content The content serialized block content.
 * @param array  $block The parsed block.
 */
function append_cozy_responsive_data_attributes( &$block_content, &$block ) {
	$enabled_blocks = array(
		'core/buttons',
		'core/button',
		'core/columns',
		'core/column',
		'core/group',
		'core/heading',
		'core/paragraph',
	);

	if ( ! isset( $block['attrs']['cozyResponsiveShow'] ) && ! in_array( $block['blockName'], $enabled_blocks, true ) ) {
		return $block_content;
	}

	if ( isset( $block['attrs']['cozyResponsiveShow'] ) && in_array( $block['blockName'], $enabled_blocks, true ) ) {
		$cozy_responsive_show = $block['attrs']['cozyResponsiveShow'];

		// Extract the existing class attribute.
		preg_match( '/<div class="([^"]+)"/', $block_content, $matches );
		$existing_class = isset( $matches[1] ) ? $matches[1] : '';

		// Append the custom class and inline styles to the class attribute
		$updated_class = trim( $existing_class . ' cozy-responsive-show__initialized' );

		$cozy_responsive_string = ' data-desktop-show="' . $cozy_responsive_show['desktopShow'] . '" data-tablet-show="' . $cozy_responsive_show['tabletShow'] . '" data-tablet-viewport-width="' . $cozy_responsive_show['tabletViewport'] . '" data-mobile-show="' . $cozy_responsive_show['mobileShow'] . '" data-mobile-viewport-width="' . $cozy_responsive_show['mobileViewport'] . '"';

		if ( 'core/heading' === $block['blockName'] ) {
			$level = $block['attrs']['level'] ?? '2';

			preg_match( '/<h' . $level . ' class="([^"]+)"/', $block_content, $matches );
			$existing_class = isset( $matches[1] ) ? $matches[1] : '';

			$updated_class = trim( $existing_class . ' cozy-responsive-show__initialized' );

			$block_content = preg_replace( '/<h' . $level . ' class="' . preg_quote( $existing_class ) . '.*?"/', '<h' . $level . ' class="' . esc_attr( $updated_class ) . '"' . $cozy_responsive_string, $block_content );

		} elseif ( 'core/paragraph' === $block['blockName'] ) {
			preg_match( '/<p(?:\s+class="([^"]+)")?/', $block_content, $matches );
			$existing_class = isset( $matches[1] ) ? $matches[1] : '';

			$updated_class = trim( $existing_class . ' cozy-responsive-show__initialized' );

			if ( $existing_class ) {
				$block_content = preg_replace( '/<p(\s+class="' . preg_quote( $existing_class ) . '.*?)?"/', '<p class="' . esc_attr( $updated_class ) . '"' . $cozy_responsive_string, $block_content );
			} else {
				$block_content = preg_replace( '/<p/', '<p class="' . esc_attr( $updated_class ) . '"' . $cozy_responsive_string, $block_content, 1 );
			}
		} else {
			$block_content = preg_replace(
				'/<div class="' . preg_quote( $existing_class ) . '.*?"/',
				'<div class="' . esc_attr( $updated_class ) . '"' . $cozy_responsive_string,
				$block_content
			);
		}
	}

	return $block_content;
}

/**
 * Adds data attributes for the hover effect in the block.
 *
 * @param string $block_content The content serialized block content.
 * @param array  $block The parsed block.
 */
function append_cozy_hover_effect_data_attributes( &$block_content, &$block ) {
	$enabled_blocks = array(
		'core/buttons',
		'core/button',
		'core/group',
		'core/columns',
		'core/column',
		'core/image',
	);

	if ( ! isset( $block['attrs']['cozyHoverEffect'] ) && ! in_array( $block['blockName'], $enabled_blocks, true ) ) {
		return $block_content;
	}

	if ( isset( $block['attrs']['cozyHoverEffect'] ) && in_array( $block['blockName'], $enabled_blocks, true ) ) {
		$cozy_hover_effect = $block['attrs']['cozyHoverEffect'];

		// Extract the existing class attribute
		preg_match( '/<div class="([^"]+)"/', $block_content, $matches );
		$existing_class = isset( $matches[1] ) ? $matches[1] : '';

		preg_match(
			'/<div[^>]*\bclass=".*?\b' . preg_quote( $existing_class, '/' ) . '\b.*?"[^>]*\sstyle="([^"]*)"/',
			$block_content,
			$matches
		);
		$existing_styles = isset( $matches[1] ) ? $matches[1] : '';

		// Append the custom class and inline styles to the class attribute
		$updated_class = trim( $existing_class . ' cozy-hover-effect__initialized' );

		if ( filter_var( $cozy_hover_effect['boxShadow']['enabled'], FILTER_VALIDATE_BOOLEAN ) ) {
			$updated_class .= ' cozy-hover-effect__has-default-box-shadow';
		}

		if ( filter_var( $cozy_hover_effect['boxShadowHover']['enabled'], FILTER_VALIDATE_BOOLEAN ) ) {
			$updated_class .= ' cozy-hover-effect__has-hover-box-shadow';
		}

		$cozy_hover_string = ' style="';

		// Hover Transform.
		if ( isset( $cozy_hover_effect['transformEnabled'] ) && filter_var( $cozy_hover_effect['transformEnabled'], FILTER_VALIDATE_BOOLEAN ) ) {
			$cozy_hover_string .= '--cozyHoverTranslateX:' . esc_attr( $cozy_hover_effect['transform']['translateX'] ) . 'px; --cozyHoverTranslateY:' . esc_attr( $cozy_hover_effect['transform']['translateY'] ) . 'px; --cozyHoverRotate: ' . esc_attr( $cozy_hover_effect['transform']['rotate'] ) . 'deg; --cozyHoverScale: ' . esc_attr( $cozy_hover_effect['transform']['scale'] ) . ';';
		}

		$shadow_color = array(
			'default' => isset( $cozy_hover_effect['boxShadow']['color'] ) ? $cozy_hover_effect['boxShadow']['color'] : '',
			'hover'   => isset( $cozy_hover_effect['boxShadowHover']['color'] ) ? $cozy_hover_effect['boxShadowHover']['color'] : '',
		);
		// Default Box Shadow.
		if ( isset( $cozy_hover_effect['boxShadow']['enabled'] ) && filter_var( $cozy_hover_effect['boxShadow']['enabled'], FILTER_VALIDATE_BOOLEAN ) ) {
			$cozy_hover_string .= '--cozyDefaultBoxShadow: ' . $cozy_hover_effect['boxShadow']['horizontal'] . 'px ' . $cozy_hover_effect['boxShadow']['vertical'] . 'px ' . $cozy_hover_effect['boxShadow']['blur'] . 'px ' . $cozy_hover_effect['boxShadow']['spread'] . 'px ' . $shadow_color['default'] . ' ' . $cozy_hover_effect['boxShadow']['position'] . ';';
		}
		// Hover Box Shadow.
		if ( isset( $cozy_hover_effect['boxShadowHover']['enabled'] ) && filter_var( $cozy_hover_effect['boxShadowHover']['enabled'], FILTER_VALIDATE_BOOLEAN ) ) {
			$cozy_hover_string .= '--cozyHoverBoxShadow: ' . $cozy_hover_effect['boxShadowHover']['horizontal'] . 'px ' . $cozy_hover_effect['boxShadowHover']['vertical'] . 'px ' . $cozy_hover_effect['boxShadowHover']['blur'] . 'px ' . $cozy_hover_effect['boxShadowHover']['spread'] . 'px ' . $shadow_color['hover'] . ' ' . $cozy_hover_effect['boxShadowHover']['position'] . ';';
		}

		// Z Index attribute.
		if ( isset( $cozy_hover_effect['hasZIndex'] ) && filter_var( $cozy_hover_effect['hasZIndex'], FILTER_VALIDATE_BOOLEAN ) ) {
			$cozy_hover_string .= 'z-index:' . $cozy_hover_effect['zIndex'] . ';';
		}

		// Transform Default.
		if ( isset( $cozy_hover_effect['transformDefaultEnabled'] ) && filter_var( $cozy_hover_effect['transformDefaultEnabled'], FILTER_VALIDATE_BOOLEAN ) ) {
			$translate_x = isset( $cozy_hover_effect['transformDefault']['translateX'] ) ? 'translateX(' . esc_attr( $cozy_hover_effect['transformDefault']['translateX'] ) . 'px) ' : '';
			$translate_y = isset( $cozy_hover_effect['transformDefault']['translateY'] ) ? 'translateY(' . esc_attr( $cozy_hover_effect['transformDefault']['translateY'] ) . 'px) ' : '';
			$rotate      = isset( $cozy_hover_effect['transformDefault']['rotate'] ) ? 'rotate(' . esc_attr( $cozy_hover_effect['transformDefault']['rotate'] ) . 'deg) ' : '';
			$scale       = isset( $cozy_hover_effect['transformDefault']['scale'] ) ? 'scale(' . esc_attr( $cozy_hover_effect['transformDefault']['scale'] ) . ')' : '';

			if ( ! empty( $translate_x ) || ! empty( $translate_y ) || ! empty( $rotate ) || ! empty( $scale ) ) {
				$cozy_hover_string .= 'transform: ' . $translate_x . $translate_y . $rotate . $scale . ';';
			}
		}

		// Overflow.
		if ( isset( $cozy_hover_effect['hasOverflow'] ) && filter_var( $cozy_hover_effect['hasOverflow'], FILTER_VALIDATE_BOOLEAN ) ) {
			$updated_class .= ' cozy-hover-effect__overflow-' . $cozy_hover_effect['overflow'] . ' ';
		}

		if ( 'core/button' === $block['blockName'] ) {
			$cozy_hover_string .= '"';
		} else {
			$cozy_hover_string .= $existing_styles . '"';
		}

		if ( 'core/image' === $block['blockName'] ) {
			preg_match( '/<figure class="([^"]+)"/', $block_content, $matches );
			$existing_class = isset( $matches[1] ) ? $matches[1] : '';

			preg_match(
				'/<figure class=".*?\b' . preg_quote( $existing_class, '/' ) . '\b.*?"(?: style="([^"]*)")?/',
				$block_content,
				$matches
			);
			$existing_styles = isset( $matches[1] ) ? $matches[1] : '';

			$updated_class = trim( $existing_class . ' cozy-hover-effect__initialized' );

			if ( filter_var( $cozy_hover_effect['boxShadow']['enabled'], FILTER_VALIDATE_BOOLEAN ) ) {
				$updated_class .= ' cozy-hover-effect__has-default-box-shadow';
			}

			if ( filter_var( $cozy_hover_effect['boxShadowHover']['enabled'], FILTER_VALIDATE_BOOLEAN ) ) {
				$updated_class .= ' cozy-hover-effect__has-hover-box-shadow';
			}

			$cozy_hover_string = ' style="';

			// Hover Transform.
			if ( isset( $cozy_hover_effect['transformEnabled'] ) && filter_var( $cozy_hover_effect['transformEnabled'], FILTER_VALIDATE_BOOLEAN ) ) {
				$cozy_hover_string .= '--cozyHoverTranslateX:' . esc_attr( $cozy_hover_effect['transform']['translateX'] ) . 'px; --cozyHoverTranslateY:' . esc_attr( $cozy_hover_effect['transform']['translateY'] ) . 'px; --cozyHoverRotate: ' . esc_attr( $cozy_hover_effect['transform']['rotate'] ) . 'deg; --cozyHoverScale: ' . esc_attr( $cozy_hover_effect['transform']['scale'] ) . ';';
			}

			$shadow_color = array(
				'default' => isset( $cozy_hover_effect['boxShadow']['color'] ) ? $cozy_hover_effect['boxShadow']['color'] : '',
				'hover'   => isset( $cozy_hover_effect['boxShadowHover']['color'] ) ? $cozy_hover_effect['boxShadowHover']['color'] : '',
			);
			// Default Box Shadow.
			if ( isset( $cozy_hover_effect['boxShadow']['enabled'] ) && filter_var( $cozy_hover_effect['boxShadow']['enabled'], FILTER_VALIDATE_BOOLEAN ) ) {
				$cozy_hover_string .= '--cozyDefaultBoxShadow: ' . $cozy_hover_effect['boxShadow']['horizontal'] . 'px ' . $cozy_hover_effect['boxShadow']['vertical'] . 'px ' . $cozy_hover_effect['boxShadow']['blur'] . 'px ' . $cozy_hover_effect['boxShadow']['spread'] . 'px ' . $shadow_color['default'] . ' ' . $cozy_hover_effect['boxShadow']['position'] . ';';
			}
			// Hover Box Shadow.
			if ( isset( $cozy_hover_effect['boxShadowHover']['enabled'] ) && filter_var( $cozy_hover_effect['boxShadowHover']['enabled'], FILTER_VALIDATE_BOOLEAN ) ) {
				$cozy_hover_string .= '--cozyHoverBoxShadow: ' . $cozy_hover_effect['boxShadowHover']['horizontal'] . 'px ' . $cozy_hover_effect['boxShadowHover']['vertical'] . 'px ' . $cozy_hover_effect['boxShadowHover']['blur'] . 'px ' . $cozy_hover_effect['boxShadowHover']['spread'] . 'px ' . $shadow_color['hover'] . ' ' . $cozy_hover_effect['boxShadowHover']['position'] . ';';
			}

			// Z Index attribute.
			if ( isset( $cozy_hover_effect['hasZIndex'] ) && filter_var( $cozy_hover_effect['hasZIndex'], FILTER_VALIDATE_BOOLEAN ) ) {
				$cozy_hover_string .= 'z-index:' . $cozy_hover_effect['zIndex'] . ';';
			}

			// Transform Default.
			if ( isset( $cozy_hover_effect['transformDefaultEnabled'] ) && filter_var( $cozy_hover_effect['transformDefaultEnabled'], FILTER_VALIDATE_BOOLEAN ) ) {
				$translate_x = isset( $cozy_hover_effect['transformDefault']['translateX'] ) ? 'translateX(' . esc_attr( $cozy_hover_effect['transformDefault']['translateX'] ) . 'px) ' : '';
				$translate_y = isset( $cozy_hover_effect['transformDefault']['translateY'] ) ? 'translateY(' . esc_attr( $cozy_hover_effect['transformDefault']['translateY'] ) . 'px) ' : '';
				$rotate      = isset( $cozy_hover_effect['transformDefault']['rotate'] ) ? 'rotate(' . esc_attr( $cozy_hover_effect['transformDefault']['rotate'] ) . 'deg) ' : '';
				$scale       = isset( $cozy_hover_effect['transformDefault']['scale'] ) ? 'scale(' . esc_attr( $cozy_hover_effect['transformDefault']['scale'] ) . ')' : '';

				if ( ! empty( $translate_x ) || ! empty( $translate_y ) || ! empty( $rotate ) || ! empty( $scale ) ) {
					$cozy_hover_string .= 'transform: ' . $translate_x . $translate_y . $rotate . $scale . ';';
				}
			}

			// Overflow.
			if ( isset( $cozy_hover_effect['hasOverflow'] ) && filter_var( $cozy_hover_effect['hasOverflow'], FILTER_VALIDATE_BOOLEAN ) ) {
				// $cozy_hover_string .= 'overflow:' . $cozy_hover_effect['overflow'] . ';';
				$updated_class .= ' cozy-hover-effect__overflow-' . $cozy_hover_effect['overflow'] . ' ';
			}

			$cozy_hover_string .= $existing_styles . '"';

			// $block_content = preg_replace( '/<figure class="' . preg_quote( $existing_class ) . '.*?"/', '<figure class="' . esc_attr( $updated_class ) . '"' . $cozy_hover_string, $block_content );

			$block_content = preg_replace(
				'/<figure class=".*?\b' . preg_quote( $existing_class, '/' ) . '\b.*?"/',
				'<figure class="' . esc_attr( $updated_class ) . '"' . $cozy_hover_string,
				$block_content,
				1
			);

		} else {
			// $cozy_hover_string .= $existing_styles . '"';

			$block_content = preg_replace(
				'/<div class=".*?\b' . preg_quote( $existing_class, '/' ) . '\b.*?"/',
				'<div class="' . esc_attr( $updated_class ) . '"' . $cozy_hover_string,
				$block_content,
				1
			);
		}
	}
}

function append_cozy_custom_font_data_attributes( &$block_content, &$block ) {
	$enabled_blocks = array(
		'core/buttons',
		'core/button',
		'core/group',
		'core/columns',
		'core/column',
		'core/heading',
		'core/paragraph',
		'cozy-block/mega-menu',
	);

	if ( ! isset( $block['attrs']['cozyCustomFont'] ) && ! in_array( $block['blockName'], $enabled_blocks, true ) ) {
		return $block_content;
	}

	if ( isset( $block['attrs']['cozyCustomFont'] ) && in_array( $block['blockName'], $enabled_blocks, true ) ) {

		$custom_font = $block['attrs']['cozyCustomFont'];

		if ( ! empty( $custom_font ) ) {
			preg_match( '/<div(?:\s+class="([^"]+)")?/', $block_content, $matches );
			$existing_class = isset( $matches[1] ) ? $matches[1] : '';

			preg_match( '/<div\s[^>]*\bstyle="(.*?)"/', $block_content, $matches );
			$existing_styles = isset( $matches[1] ) ? $matches[1] : '';

			// Append your styles to the existing styles
			$new_styles      = 'font-family: ' . $custom_font . ' !important;';
			$appended_styles = $existing_styles ? $existing_styles . '; ' . $new_styles : $new_styles;

			if ( 'core/heading' === $block['blockName'] ) {
				$level = $block['attrs']['level'] ?? '2';

				preg_match( '/<h' . $level . ' class="([^"]+)"/', $block_content, $matches );
				$existing_class = isset( $matches[1] ) ? $matches[1] : '';

				preg_match( '/<h' . $level . '\s[^>]*\bstyle="(.*?)"/', $block_content, $matches );
				$existing_styles = isset( $matches[1] ) ? $matches[1] : '';
				$appended_styles = $existing_styles ? $existing_styles . '; ' . $new_styles : $new_styles;

				$block_content = preg_replace( '/<h' . $level . ' class="' . preg_quote( $existing_class ) . '.*?"/', '<h' . $level . ' class="' . esc_attr( $existing_class ) . '" style="' . $appended_styles . '"', $block_content );

			} elseif ( 'core/paragraph' === $block['blockName'] ) {
				preg_match( '/<p(?:\s+class="([^"]+)")?/', $block_content, $matches );
				$existing_class = isset( $matches[1] ) ? $matches[1] : '';

				preg_match( '/<p\s[^>]*\bstyle="(.*?)"/', $block_content, $matches );
				$existing_styles = isset( $matches[1] ) ? $matches[1] : '';

				$appended_styles = $existing_styles ? $existing_styles . '; ' . $new_styles : $new_styles;

				if ( $existing_class ) {
					$block_content = preg_replace( '/<p class="' . preg_quote( $existing_class ) . '.*?"/', '<p class="' . esc_attr( $existing_class ) . '" style="' . $appended_styles . '"', $block_content );

				} else {
					$block_content = preg_replace( '/<p/', '<p style="' . $appended_styles . '"', $block_content, 1 );
				}
			} else {
				// Replace the existing style attribute with the appended styles.
				$block_content = preg_replace( '/<div class="' . preg_quote( $existing_class ) . '.*?"/', '<div class="' . esc_attr( $existing_class ) . '" style="' . $appended_styles . '"', $block_content );
			}

			$block_content = '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=' . $custom_font . ':wght@400;500;600;700;800" />' . $block_content;

		}
	}
}

/**
 * Adds data attributes for the animation in the block.
 *
 * @param string $block_content The content serialized block content.
 * @param array  $block The parsed block.
 */
function apply_cozy_block_animation_responsive_hover_filter( $block_content, $block ) {
	$enabled_blocks = array(
		'core/buttons',
		'core/button',
		'core/cover',
		'core/group',
		'core/heading',
		'core/columns',
		'core/column',
		'core/image',
		'core/paragraph',
		'cozy-block/slider',
		'cozy-block/post-slider',
		'cozy-block/product-slider',
		'cozy-block/mega-menu',
	);

	if ( ! isset( $block['attrs']['cozyAnimation'] ) && ! in_array( $block['blockName'], $enabled_blocks, true ) ) {
		return $block_content;
	}

	if ( isset( $block['attrs']['cozyAnimation'] ) && in_array( $block['blockName'], $enabled_blocks, true ) ) {
		if ( 'none' === $block['attrs']['cozyAnimation'] ) {
			return $block_content;
		}

		// Extract the existing class attribute
		preg_match( '/<div class="([^"]+)"/', $block_content, $matches );
		$existing_class = isset( $matches[1] ) ? $matches[1] : '';

		$cozy_animation = $block['attrs']['cozyAnimation'];

		// Append the custom class and inline styles to the class attribute
		$updated_class = trim( $existing_class . ' cozy-animation__initialized' );

		$aos_string = '';
		if ( 'none' !== $cozy_animation['type'] ) {
			$aos_string = ' data-aos="' . esc_attr( $cozy_animation['type'] ) . '" data-aos-easing="' . esc_attr( $cozy_animation['easingFunction'] ) . '" data-aos-anchor-placement="' . esc_attr( $cozy_animation['anchorPlacement'] ?? '' ) . '" data-aos-duration="' . esc_attr( $cozy_animation['duration'] ?? '600' ) . '"';
		}

		if ( 'core/heading' === $block['blockName'] ) {

			$level = $block['attrs']['level'] ?? '2';

			preg_match( '/<h' . $level . ' class="([^"]+)"/', $block_content, $matches );
			$existing_class = isset( $matches[1] ) ? $matches[1] : '';

			$updated_class = trim( $existing_class . ' cozy-animation__initialized' );

			$block_content = preg_replace( '/<h' . $level . ' class="' . preg_quote( $existing_class ) . '.*?"/', '<h' . $level . ' class="' . esc_attr( $updated_class ) . '"' . $aos_string, $block_content );
		} elseif ( 'core/paragraph' === $block['blockName'] ) {
			preg_match( '/<p(?:\s+class="([^"]+)")?/', $block_content, $matches );
			$existing_class = isset( $matches[1] ) ? $matches[1] : '';

			$updated_class = trim( $existing_class . ' cozy-animation__initialized' );

			if ( $existing_class ) {
				$block_content = preg_replace( '/<p(\s+class="' . preg_quote( $existing_class ) . '.*?)?"/', '<p class="' . esc_attr( $updated_class ) . '"' . $aos_string, $block_content );
			} else {
				$block_content = preg_replace( '/<p/', '<p class="' . esc_attr( $updated_class ) . '"' . $aos_string, $block_content, 1 );
			}
		} elseif ( 'core/image' === $block['blockName'] ) {
			preg_match( '/<figure class="([^"]+)"/', $block_content, $matches );
			$existing_class = isset( $matches[1] ) ? $matches[1] : '';

			$updated_class = trim( $existing_class . ' cozy-animation__initialized' );

			$block_content = preg_replace( '/<figure class="' . preg_quote( $existing_class ) . '.*?"/', '<figure class="' . esc_attr( $updated_class ) . '"' . $aos_string, $block_content );

		} else {
			// $block_content = preg_replace(
			// '/<div class="' . preg_quote( $existing_class ) . '.*?"/',
			// '<div class="' . esc_attr( $updated_class ) . '"' . $aos_string,
			// $block_content
			// );

			$found         = false;
			$block_content = preg_replace_callback(
				'/<div class="' . preg_quote( $existing_class, '/' ) . '.*?"/',
				function ( $matches ) use ( $updated_class, $aos_string, &$found ) {
					if ( ! $found ) {
						$found = true;
						return '<div class="' . esc_attr( $updated_class ) . '"' . $aos_string;
					}
					return $matches[0]; // Return the original match for subsequent occurrences.
				},
				$block_content
			);
		}
	}

	append_cozy_responsive_data_attributes( $block_content, $block );

	append_cozy_hover_effect_data_attributes( $block_content, $block );

	append_cozy_custom_font_data_attributes( $block_content, $block );

	return $block_content;
}
add_filter( 'render_block', 'apply_cozy_block_animation_responsive_hover_filter', 10, 2 );

/**
 * Sets the style variables for the button hover styles.
 *
 * @param string $block_content The content serialized block content.
 * @param array  $block The parsed block.
 */
function add_cozy_hover_color_styles( $block_content, $block ) {
	if ( ! isset( $block['attrs']['cozyHoverStyles'] ) && ! isset( $block['attrs']['cozyHoverColor'] ) && ! isset( $block['attrs']['cozyMenuPadding'] ) ) {
		return $block_content;
	}

	// Check if it's a core/button block
	if ( 'core/button' === $block['blockName'] ) {
		// Extract the existing class attribute
		// preg_match( '/<div class="([^"]+)"/', $block_content, $matches );
		preg_match( '/<div\s[^>]*\bclass="(.*?)"/', $block_content, $matches );
		$existing_class = isset( $matches[1] ) ? $matches[1] : '';

		// Extract the custom styles from block attributes
		$custom_styles = array(
			'--cozyButtonBgColorHover' => 'inherit',
			'--cozyButtonColorHover'   => 'inherit',
			'--cozyButtonBorderHover'  => 'inherit',
		);

		if ( isset( $block['attrs']['cozyHoverStyles'] ) ) {
			$cozyHoverStyles = $block['attrs']['cozyHoverStyles'];

			$custom_styles = array(
				'--cozyButtonBgColorHover' => strtolower( $cozyHoverStyles['bgColor'] ?? 'inherit' ),
				'--cozyButtonColorHover'   => strtolower( $cozyHoverStyles['color'] ?? 'inherit' ),
				'--cozyButtonBorderHover'  => strtolower( $cozyHoverStyles['borderColor'] ?? 'inherit' ),
			);
		}

		// Build the inline style string
		$inline_styles = '';
		foreach ( $custom_styles as $style => $value ) {
			$inline_styles .= "$style: $value; ";
		}

		// Append the custom class and inline styles to the class attribute
		$updated_class = trim( $existing_class . ' cozy-button-hover-styles' );

		preg_match( '/<div\s[^>]*\bstyle="(.*?)"/', $block_content, $matches );
		$existing_styles = isset( $matches[1] ) ? $matches[1] : '';
		$appended_styles = $existing_styles . '; ' . $inline_styles;

		$block_content = preg_replace( '/<div class="' . preg_quote( $existing_class ) . '.*?"/', '<div class="' . esc_attr( $updated_class ) . '" style="' . $appended_styles . '"', $block_content );

	}

	if ( 'core/navigation' === $block['blockName'] ) {
		// Extract the custom styles from block attributes.
		$custom_styles = array(
			'--cozyMenuPadding'      => 0,
			'--cozyHoverMenuText'    => '',
			'--cozyHoverMenuBg'      => '',
			'--cozyHoverSubmenuText' => '',
			'--cozyHoverSubmenuBg'   => '',
		);

		if ( isset( $block['attrs']['cozyMenuPadding'] ) || isset( $block['attrs']['cozyHoverColor'] ) ) {
			$padding          = $block['attrs']['cozyMenuPadding'] ?? array();
			$cozy_hover_color = $block['attrs']['cozyHoverColor'] ?? array();

			$custom_styles = array(
				'--cozyMenuPadding'      => ( $padding['top'] ?? 0 ) . 'px ' . ( $padding['right'] ?? 0 ) . 'px ' . ( $padding['bottom'] ?? 0 ) . 'px ' . ( $padding['left'] ?? 0 ) . 'px',
				'--cozyHoverMenuText'    => strtolower( $cozy_hover_color['menuText'] ?? '' ),
				'--cozyHoverMenuBg'      => strtolower( $cozy_hover_color['menuBg'] ?? '' ),
				'--cozyHoverSubmenuText' => strtolower( $cozy_hover_color['submenuText'] ?? '' ),
				'--cozyHoverSubmenuBg'   => strtolower( $cozy_hover_color['submenuBg'] ?? '' ),
			);
		}

		// Build the inline style string.
		$inline_styles = '';
		foreach ( $custom_styles as $style => $value ) {
			$inline_styles .= "$style: $value; ";
		}

		$updated_class = 'cozy-nav-hover-color';

		preg_match( '/<ul[^>]*?\s+class="([^"]+)"/', $block_content, $class_matches );
		$existing_class_attribute = $class_matches[1] ?? '';

		preg_match( '/<ul[^>]*?\s+style="([^"]*)"/', $block_content, $style_matches );
		$existing_style_attribute = $style_matches[1] ?? '';

		$block_content = preg_replace(
			'/<ul[^>]*?\s+class="([^"]+)"/',
			'<ul class="' . esc_attr( $updated_class ) . ' ' . esc_attr( $existing_class_attribute ) . '" style="' . esc_attr( $existing_style_attribute . $inline_styles ) . '"',
			$block_content
		);

	}

	return $block_content;
}
add_filter( 'render_block', 'add_cozy_hover_color_styles', 10, 2 );

if ( ! function_exists( 'cozy_render_TRBL' ) ) {
	function cozy_render_TRBL( $type, $attr ) {
		if ( isset( $attr ) && count( $attr ) > 2 && count( $attr ) < 4 ) {
			if ( isset( $attr['width'], $attr['style'], $attr['color'] ) ) {
				return "{$type}: {$attr['width']} {$attr['style']} {$attr['color']};";
			}
			return "{$type}: ;";
		} elseif ( isset( $attr ) && count( $attr ) === 4 ) {
			$topWidth = $attr['top']['width'] ?? 'initial';
			$topStyle = $attr['top']['style'] ?? 'initial';
			$topColor = $attr['top']['color'] ?? 'initial';

			$rightWidth = $attr['right']['width'] ?? 'initial';
			$rightStyle = $attr['right']['style'] ?? 'initial';
			$rightColor = $attr['right']['color'] ?? 'initial';

			$bottomWidth = $attr['bottom']['width'] ?? 'initial';
			$bottomStyle = $attr['bottom']['style'] ?? 'initial';
			$bottomColor = $attr['bottom']['color'] ?? 'initial';

			$leftWidth = $attr['left']['width'] ?? 'initial';
			$leftStyle = $attr['left']['style'] ?? 'initial';
			$leftColor = $attr['left']['color'] ?? 'initial';

			if ( $type === 'border' ) {
				return "
                    border-top: {$topWidth} {$topStyle} {$topColor};
                    border-right: {$rightWidth} {$rightStyle} {$rightColor};
                    border-bottom: {$bottomWidth} {$bottomStyle} {$bottomColor};
                    border-left: {$leftWidth} {$leftStyle} {$leftColor};
                ";
			}
			return "{$type}: {$attr['top']} {$attr['right']} {$attr['bottom']} {$attr['left']};";
		} else {
			return '';
		}
	}
}

if ( ! function_exists( 'cozy_create_excerpt' ) ) {
	function cozy_create_excerpt( $content, $length = 20 ) {
		// Strip HTML tags and shortcodes.
		$content = wp_strip_all_tags( strip_shortcodes( $content ) );

		// Split the content into words.
		$words = explode( ' ', $content );

		// Truncate to the specified length.
		if ( count( $words ) > $length ) {
			$words   = array_slice( $words, 0, $length );
			$content = implode( ' ', $words ) . '...';
		} else {
			$content = implode( ' ', $words );
		}

		return esc_html_x( $content, 'cozy-addons' );
	}
}
