<?php
$client_id      = ! empty( $attributes['blockClientId'] ) ? str_replace( array( ';', '=', '(', ')', ' ' ), '', wp_strip_all_tags( $attributes['blockClientId'] ) ) : '';
$cozy_block_var = 'cozyPostSlider_' . str_replace( '-', '_', $client_id );
wp_localize_script( 'cozy-block-scripts', $cozy_block_var, $attributes );
wp_add_inline_script( 'cozy-block-scripts', 'document.addEventListener("DOMContentLoaded", function(event) { window.cozyBlockPostSliderInit( "' . $client_id . '" ) }) ' );

$block_id = 'cozyBlock_' . str_replace( '-', '_', $client_id );

$nav_styles = array(
	'border' => isset( $attributes['carouselOptions']['navigation']['border'] ) ? cozy_render_TRBL( 'border', $attributes['carouselOptions']['navigation']['border'] ) : '',
	'color'  => array(
		'border_hover' => isset( $attributes['carouselOptions']['navigation']['borderHover'] ) ? $attributes['carouselOptions']['navigation']['borderHover'] : '',
	),
);

$bullet_styles = array(
	'gap'    => isset( $attributes['carouselOptions']['pagination']['gap'] ) ? $attributes['carouselOptions']['pagination']['gap'] : '4',
	'active' => array(
		'height' => isset( $attributes['carouselOptions']['pagination']['activeHeight'] ) ? $attributes['carouselOptions']['pagination']['activeHeight'] : '',
		'border' => isset( $attributes['carouselOptions']['pagination']['activeBorder'] ) ? cozy_render_TRBL( 'outline', $attributes['carouselOptions']['pagination']['activeBorder'] ) : '',
		'offset' => isset( $attributes['carouselOptions']['pagination']['activeOffset'] ) ? $attributes['carouselOptions']['pagination']['activeOffset'] : '',
	),
);


$block_styles = <<<BLOCK_STYLES
#$block_id .swiper-button-prev,
#$block_id .swiper-button-next {
    {$nav_styles['border']}

    &:hover {
        border-color: {$nav_styles['color']['border_hover']};
    }
}

#$block_id .swiper-pagination-bullets .swiper-pagination-bullet {
    margin: 0 var(--swiper-pagination-bullet-horizontal-gap, {$bullet_styles['gap']}px);
}
#$block_id .swiper-pagination-bullet-active {
    height: {$bullet_styles['active']['height']}px !important;
    {$bullet_styles['active']['border']}
    outline-offset: {$bullet_styles['active']['offset']}px;
}
BLOCK_STYLES;

$output  = '<div class="cozy-block-wrapper">';

$output .= '<style>' . $block_styles . '</style>';

$output .= $content;
$output .= '</div>';

echo $output;
