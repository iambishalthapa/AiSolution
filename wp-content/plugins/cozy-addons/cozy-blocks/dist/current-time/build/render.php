<?php
$client_id = ! empty( $attributes['blockClientId'] ) ? str_replace( array( ';', '=', '(', ')', ' ' ), '', wp_strip_all_tags( $attributes['blockClientId'] ) ) : '';
$block_id  = 'cozyBlock_' . str_replace( '-', '_', $client_id );

$cozy_block_var = 'cozyDateTime_' . str_replace( '-', '_', $client_id );
wp_localize_script( 'cozy-block-scripts', $cozy_block_var, $attributes );
wp_add_inline_script( 'cozy-block-scripts', 'document.addEventListener("DOMContentLoaded", function(event) { window.cozyBlockDateTimeInit( "' . $client_id . '" ) }) ' );

$typography_styles = array(
	'letter_case'    => isset( $attributes['layout']['styles']['letterCase'] ) ? $attributes['layout']['styles']['letterCase'] : '',
	'decoration'     => isset( $attributes['layout']['styles']['decoration'] ) ? $attributes['layout']['styles']['decoration'] : '',
	'line_height'    => isset( $attributes['layout']['styles']['lineHeight'] ) ? $attributes['layout']['styles']['lineHeight'] : '',
	'letter_spacing' => isset( $attributes['layout']['styles']['letterSpacing'] ) ? $attributes['layout']['styles']['letterSpacing'] : '',
);

$time_styles = array(
	'font_family'    => isset( $attributes['time']['styles']['fontFamily'] ) ? $attributes['time']['styles']['fontFamily'] : '',
	'letter_case'    => isset( $attributes['time']['styles']['letterCase'] ) ? $attributes['time']['styles']['letterCase'] : '',
	'decoration'     => isset( $attributes['time']['styles']['decoration'] ) ? $attributes['time']['styles']['decoration'] : '',
	'line_height'    => isset( $attributes['time']['styles']['lineHeight'] ) ? $attributes['time']['styles']['lineHeight'] : '',
	'letter_spacing' => isset( $attributes['time']['styles']['letterSpacing'] ) ? $attributes['time']['styles']['letterSpacing'] : '',
);

$block_styles = <<<BLOCK_STYLES
#$block_id {
    text-transform: {$typography_styles['letter_case']};
    text-decoration: {$typography_styles['decoration']};
    line-height: {$typography_styles['line_height']};
    letter-spacing: {$typography_styles['letter_spacing']};

    & .cozy-time {
        font-family: {$time_styles['font_family']};
        text-transform: {$time_styles['letter_case']};
        text-decoration: {$time_styles['decoration']};
        line-height: {$time_styles['line_height']};
        letter-spacing: {$time_styles['letter_spacing']};
    }
}
BLOCK_STYLES;

$output = '<div class="cozy-block-wrapper">';

$output .= '<style>' . $block_styles . '</style>';

if ( isset( $attributes['layout']['styles']['fontFamily'] ) && ! empty( $attributes['layout']['styles']['fontFamily'] ) ) {
	$output .= '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=' . $attributes['layout']['styles']['fontFamily'] . ':wght@100;200;300;400;500;600;700;800;900" />';
}

if ( isset( $attributes['time']['styles']['fontFamily'] ) && ! empty( $attributes['time']['styles']['fontFamily'] ) ) {
	$output .= '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=' . $attributes['time']['styles']['fontFamily'] . ':wght@100;200;300;400;500;600;700;800;900" />';
}

$output .= $content;
$output .= '</div>';

echo $output;
