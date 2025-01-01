<?php

$client_id  = ! empty( $attributes['blockClientId'] ) ? str_replace( array( ';', '=', '(', ')', ' ' ), '', wp_strip_all_tags( $attributes['blockClientId'] ) ) : '';
$slider_var = 'slider_' . str_replace( '-', '_', $client_id );

$block_id = 'cozyBlock_' . str_replace( '-', '_', $client_id );

$bullet_styles = array(
	'active' => array(
		'border' => isset( $attributes['pagination']['activeBorder'] ) ? cozy_render_TRBL( 'outline', $attributes['pagination']['activeBorder'] ) : '',
		'offset' => isset( $attributes['pagination']['activeOffset'] ) ? $attributes['pagination']['activeOffset'] : '4px',
	),
	'color'  => array(
		'active_border_hover' => isset( $attributes['pagination']['activeBorderHover'] ) ? $attributes['pagination']['activeBorderHover'] : '',
	),
);

$block_styles = <<<BLOCK_STYLES
#$block_id .swiper-pagination .swiper-pagination-bullet-active {
    {$bullet_styles['active']['border']}
    outline-offset: {$bullet_styles['active']['offset']};

    &:hover {
        outline-color: {$bullet_styles['color']['active_border_hover']};
    }
}
BLOCK_STYLES;

wp_localize_script( 'cozy-block-scripts', $slider_var, $attributes );
wp_add_inline_script( 'cozy-block-scripts', 'document.addEventListener("DOMContentLoaded", function(event) { window.cozyBlockSliderInit( "' . $client_id . '" ) }) ' );

$wrapper_attributes = get_block_wrapper_attributes();

$output = '<div class="cozy-block-wrapper cozy-block-slider-wrapper"><div ' . $wrapper_attributes . '>';

$output .= '<style>' . $block_styles . '</style>';

$output .= $content;

$output .= '</div></div>';

echo $output;
