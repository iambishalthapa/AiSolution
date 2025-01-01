<?php
$client_id = ! empty( $attributes['blockClientId'] ) ? str_replace( array( ';', '=', '(', ')', ' ' ), '', wp_strip_all_tags( $attributes['blockClientId'] ) ) : '';
$block_id  = 'cozyBlock_' . str_replace( '-', '_', $client_id );

$output     = '<div class="cozy-block-wrapper">';
$typography = $attributes['typography'];
$style      = '--cozyFontSize: ' . $typography['fontSize'] . 'px;';
$style     .= ' --cozyFontWeight: ' . $typography['fontWeight'] . ';';
$style     .= ' --cozyFontFamily: ' . str_replace( '"', '', $typography['fontFamily'] ) . ';';
$style     .= ' --cozyColor: ' . $typography['color'] . ';';
$style     .= ' --cozyLinkColor: ' . $typography['linkColor'] . ';';
$style     .= ' --cozyHoverColor: ' . $typography['hoverColor'] . ';';

$typography_styles = array(
	'letter_case'    => isset( $attributes['typography']['letterCase'] ) ? $attributes['typography']['letterCase'] : '',
	'decoration'     => isset( $attributes['typography']['decoration'] ) ? $attributes['typography']['decoration'] : '',
	'line_height'    => isset( $attributes['typography']['lineHeight'] ) ? $attributes['typography']['lineHeight'] : '',
	'letter_spacing' => isset( $attributes['typography']['letterSpacing'] ) ? $attributes['typography']['letterSpacing'] : '',
);

$block_styles = <<<BLOCK_STYLES
#$block_id {
	text-transform: {$typography_styles['letter_case']};
	line-height: {$typography_styles['line_height']};
	letter-spacing: {$typography_styles['letter_spacing']};
	
	& a {
		text-decoration: {$typography_styles['decoration']} !important;
	}
}
BLOCK_STYLES;

if ( ! is_home() ) {
	$output .= '<style>' . $block_styles . '</style>';

	if ( isset( $attributes['typography']['fontFamily'] ) && ! empty( $attributes['typography']['fontFamily'] ) ) {
		$output .= '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=' . $attributes['typography']['fontFamily'] . ':wght@100;200;300;400;500;600;700;800;900" />';
	}

	$output .= '<p class="cozy-block-breadcrumb" id="' . $block_id . '" style=" ' . $style . '">';
	$output .= '<a href="' . home_url( '/' ) . '">Home</a> / ';
	if ( is_category() ) {
		$category = single_cat_title( '', false );
		$output  .= $category;
	} elseif ( is_single() ) {
		$categories = get_the_category();
		if ( is_single() && $categories ) {
			$output .= '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a> / ';
		}
		$output .= get_the_title();
	} elseif ( is_page() ) {
		$output .= the_title( '', '', false );
	}

	$output .= '</p>';
}

$output .= '</div>';

echo $output;
