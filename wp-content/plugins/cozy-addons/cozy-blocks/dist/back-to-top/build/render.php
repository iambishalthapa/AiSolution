<?php

$client_id      = ! empty( $attributes['blockClientId'] ) ? str_replace( array( ';', '=', '(', ')', ' ' ), '', wp_strip_all_tags( $attributes['blockClientId'] ) ) : '';
$cozy_block_var = 'cozyScrollTop_' . str_replace( '-', '_', $client_id );
wp_localize_script( 'cozy-block-scripts', $cozy_block_var, $attributes );
wp_add_inline_script( 'cozy-block-scripts', 'document.addEventListener("DOMContentLoaded", function(event) { window.cozyBlockScrollTopInit( "' . $client_id . '" ) }) ' );

$block_id = 'cozyBlock_' . str_replace( '-', '_', $client_id );

$color = array(
	'bg'         => isset( $attributes['styles']['bgColor'] ) ? $attributes['styles']['bgColor'] : '',
	'bg_hover'   => isset( $attributes['styles']['bgColorHover'] ) ? $attributes['styles']['bgColorHover'] : '',
	'icon'       => isset( $attributes['styles']['iconColor'] ) ? $attributes['styles']['iconColor'] : '',
	'icon_hover' => isset( $attributes['styles']['iconColorHover'] ) ? $attributes['styles']['iconColorHover'] : '',
);

$block_styles = <<<BLOCK_STYLES
#$block_id {
    width: {$attributes['styles']['boxWidth']}px;
    height: {$attributes['styles']['boxHeight']}px;
    border-radius: {$attributes['styles']['borderRadius']}px;
    background-color: {$color['bg']};
    right: {$attributes['position']['right']}px;
    bottom: {$attributes['position']['bottom']}px;
}

#$block_id:hover {
    background-color: {$color['bg_hover']};
}

#$block_id svg {
    width: {$attributes['styles']['iconSize']}px;
    height: {$attributes['styles']['iconSize']}px;
    fill: {$color['icon']};
}

#$block_id:hover svg {
    fill: {$color['icon_hover']};
}
BLOCK_STYLES;

$output  = '<div class="cozy-block-wrapper position-fixed">';
$output .= '<style>' . $block_styles . '</style>';
$output .= $content;
$output .= '</div>';

echo $output;
