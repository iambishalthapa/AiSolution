<?php

use CozyBlock\Helpers\CozyHelpers;

$client_id      = ! empty( $attributes['blockClientId'] ) ? str_replace( array( ';', '=', '(', ')', ' ' ), '', wp_strip_all_tags( $attributes['blockClientId'] ) ) : '';
$cozy_block_var = 'cozyPortfolioGallery_' . str_replace( '-', '_', $client_id );

$attributes['portfolioTemplates'] = array( ...CozyHelpers::get_cozy_portfolio_gallery_templates() );
$attributes['portfolioTax']       = get_terms( array( 'ca_portfolio_gallery_category' ) );

wp_localize_script( 'cozy-block-scripts', $cozy_block_var, $attributes );
wp_add_inline_script( 'cozy-block-scripts', 'document.addEventListener("DOMContentLoaded", function(event) { window.cozyBlockPortfolioGalleryInit( "' . $client_id . '" ) }) ' );

$block_id = 'cozyBlock_' . str_replace( '-', '_', $client_id );

$width1 = $attributes['gridOptions']['displayColumn'] <= 3 ? $attributes['gridOptions']['displayColumn'] : 3;
$width2 = $attributes['gridOptions']['displayColumn'] <= 2 ? $attributes['gridOptions']['displayColumn'] : 2;

$gallery_options_title_color             = isset( $attributes['galleryOptions']['titleColor'] ) ? $attributes['galleryOptions']['titleColor'] : '';
$gallery_options_margin_bottom           = isset( $attributes['galleryOptions']['marginBottom'] ) ? $attributes['galleryOptions']['marginBottom'] : '';
$gallery_options_icon_box_size           = isset( $attributes['galleryOptions']['iconBoxSize'] ) ? $attributes['galleryOptions']['iconBoxSize'] : '';
$gallery_options_icon_box_border_radius  = isset( $attributes['galleryOptions']['iconBoxBorderRadius'] ) ? $attributes['galleryOptions']['iconBoxBorderRadius'] : '';
$gallery_options_icon_box_bg_color       = isset( $attributes['galleryOptions']['iconBoxBgColor'] ) ? $attributes['galleryOptions']['iconBoxBgColor'] : '';
$gallery_options_icon_box_bg_color_hover = isset( $attributes['galleryOptions']['iconBoxBgColorHover'] ) ? $attributes['galleryOptions']['iconBoxBgColorHover'] : '';
$overlay_icon_border                     = isset( $attributes['galleryOptions']['iconBorder'] ) ? cozy_render_TRBL( 'border', $attributes['galleryOptions']['iconBorder'] ) : '';
$button_padding                          = isset( $attributes['galleryOptions']['buttonPadding'] ) ? cozy_render_TRBL( 'padding', $attributes['galleryOptions']['buttonPadding'] ) : '';
$button_border                           = isset( $attributes['galleryOptions']['buttonBorder'] ) ? cozy_render_TRBL( 'border', $attributes['galleryOptions']['buttonBorder'] ) : '';
$button_radius                           = isset( $attributes['galleryOptions']['buttonRadius'] ) ? $attributes['galleryOptions']['buttonRadius'] : '';
$overlay_color                           = array(
	'text'                => isset( $attributes['galleryOptions']['color'] ) ? $attributes['galleryOptions']['color'] : '',
	'icon_hover'          => isset( $attributes['galleryOptions']['iconColorHover'] ) ? $attributes['galleryOptions']['iconColorHover'] : '',
	'bg_hover'            => isset( $attributes['galleryOptions']['iconBoxBgColorHover'] ) ? $attributes['galleryOptions']['iconBoxBgColorHover'] : '',
	'border_hover'        => isset( $attributes['galleryOptions']['iconBorderColorHover'] ) ? $attributes['galleryOptions']['iconBorderColorHover'] : '',
	'button_text'         => isset( $attributes['galleryOptions']['buttonColor'] ) ? $attributes['galleryOptions']['buttonColor'] : '',
	'button_text_hover'   => isset( $attributes['galleryOptions']['buttonColorHover'] ) ? $attributes['galleryOptions']['buttonColorHover'] : '',
	'button_bg'           => isset( $attributes['galleryOptions']['buttonBgColor'] ) ? $attributes['galleryOptions']['buttonBgColor'] : '',
	'button_bg_hover'     => isset( $attributes['galleryOptions']['buttonBgColorHover'] ) ? $attributes['galleryOptions']['buttonBgColorHover'] : '',
	'button_border_hover' => isset( $attributes['galleryOptions']['buttonBorderColorHover'] ) ? $attributes['galleryOptions']['buttonBorderColorHover'] : '',
);
$gallery_text_align                      = isset( $attributes['galleryOptions']['textAlign'] ) ? $attributes['galleryOptions']['textAlign'] : '';

$title_padding = isset( $attributes['titlePadding'] ) ? cozy_render_TRBL( 'padding', $attributes['titlePadding'] ) : '';
$title_color   = array(
	'text'       => isset( $attributes['titleTypography']['color'] ) ? $attributes['titleTypography']['color'] : '',
	'text_hover' => isset( $attributes['titleTypography']['colorHover'] ) ? $attributes['titleTypography']['colorHover'] : '',
);
$title_styles  = array(
	'letter_case'    => isset( $attributes['titleTypography']['letterCase'] ) ? $attributes['titleTypography']['letterCase'] : '',
	'decoration'     => isset( $attributes['titleTypography']['decoration'] ) ? $attributes['titleTypography']['decoration'] : '',
	'line_height'    => isset( $attributes['titleTypography']['lineHeight'] ) ? $attributes['titleTypography']['lineHeight'] : '',
	'letter_spacing' => isset( $attributes['titleTypography']['letterSpacing'] ) ? $attributes['titleTypography']['letterSpacing'] : '',
);

$subtitle_color  = array(
	'text' => isset( $attributes['subtitleTypography']['color'] ) ? $attributes['subtitleTypography']['color'] : '',
);
$subtitle_styles = array(
	'letter_case'    => isset( $attributes['subtitleTypography']['letterCase'] ) ? $attributes['subtitleTypography']['letterCase'] : '',
	'decoration'     => isset( $attributes['subtitleTypography']['decoration'] ) ? $attributes['subtitleTypography']['decoration'] : '',
	'line_height'    => isset( $attributes['subtitleTypography']['lineHeight'] ) ? $attributes['subtitleTypography']['lineHeight'] : '',
	'letter_spacing' => isset( $attributes['subtitleTypography']['letterSpacing'] ) ? $attributes['subtitleTypography']['letterSpacing'] : '',
);

$isotope_tab_align      = isset( $attributes['isotopeStyles']['tabAlign'] ) ? $attributes['isotopeStyles']['tabAlign'] : '';
$isotope_gap            = isset( $attributes['isotopeStyles']['gap'] ) ? $attributes['isotopeStyles']['gap'] : '';
$isotope_margin_top     = isset( $attributes['isotopeStyles']['marginTop'] ) ? $attributes['isotopeStyles']['marginTop'] : '';
$isotope_radius         = isset( $attributes['isotopeStyles']['radius'] ) ? $attributes['isotopeStyles']['radius'] : '';
$isotope_padding        = cozy_render_TRBL( 'padding', $attributes['isotopeStyles']['padding'] );
$isotope_shadow         = array(
	'default' => array(
		'horizontal' => isset( $attributes['isotopeStyles']['default']['shadow']['horizontal'] ) ? $attributes['isotopeStyles']['default']['shadow']['horizontal'] . 'px' : '',
		'vertical'   => isset( $attributes['isotopeStyles']['default']['shadow']['vertical'] ) ? $attributes['isotopeStyles']['default']['shadow']['vertical'] . 'px' : '',
		'blur'       => isset( $attributes['isotopeStyles']['default']['shadow']['blur'] ) ? $attributes['isotopeStyles']['default']['shadow']['blur'] . 'px' : '',
		'spread'     => isset( $attributes['isotopeStyles']['default']['shadow']['spread'] ) ? $attributes['isotopeStyles']['default']['shadow']['spread'] . 'px' : '',
		'position'   => isset( $attributes['isotopeStyles']['default']['shadow']['position'] ) ? $attributes['isotopeStyles']['default']['shadow']['position'] : '',
	),
	'active'  => array(
		'horizontal' => isset( $attributes['isotopeStyles']['active']['shadow']['horizontal'] ) ? $attributes['isotopeStyles']['active']['shadow']['horizontal'] . 'px' : '',
		'vertical'   => isset( $attributes['isotopeStyles']['active']['shadow']['vertical'] ) ? $attributes['isotopeStyles']['active']['shadow']['vertical'] . 'px' : '',
		'blur'       => isset( $attributes['isotopeStyles']['active']['shadow']['blur'] ) ? $attributes['isotopeStyles']['active']['shadow']['blur'] . 'px' : '',
		'spread'     => isset( $attributes['isotopeStyles']['active']['shadow']['spread'] ) ? $attributes['isotopeStyles']['active']['shadow']['spread'] . 'px' : '',
		'position'   => isset( $attributes['isotopeStyles']['active']['shadow']['position'] ) ? $attributes['isotopeStyles']['active']['shadow']['position'] : '',
	),
);
$isotope_default_border = isset( $attributes['isotopeStyles']['default']['border'] ) ? cozy_render_TRBL( 'border', $attributes['isotopeStyles']['default']['border'] ) : '';
$isotope_active_border  = isset( $attributes['isotopeStyles']['active']['border'] ) ? cozy_render_TRBL( 'border', $attributes['isotopeStyles']['active']['border'] ) : '';
$isotope_margin_right   = isset( $attributes['isotopeStyles']['marginRight'] ) ? $attributes['isotopeStyles']['marginRight'] : '';
$isotope_margin_left    = isset( $attributes['isotopeStyles']['marginLeft'] ) ? $attributes['isotopeStyles']['marginLeft'] : '';
$isotope_color          = array(
	'text'          => isset( $attributes['isotopeStyles']['default']['color'] ) ? $attributes['isotopeStyles']['default']['color'] : '',
	'bg'            => isset( $attributes['isotopeStyles']['default']['bgColor'] ) ? $attributes['isotopeStyles']['default']['bgColor'] : '',
	'shadow'        => isset( $attributes['isotopeStyles']['default']['shadow']['color'] ) ? $attributes['isotopeStyles']['default']['shadow']['color'] : '',
	'text_active'   => isset( $attributes['isotopeStyles']['active']['color'] ) ? $attributes['isotopeStyles']['active']['color'] : '',
	'bg_active'     => isset( $attributes['isotopeStyles']['active']['bgColor'] ) ? $attributes['isotopeStyles']['active']['bgColor'] : '',
	'shadow_active' => isset( $attributes['isotopeStyles']['active']['shadow']['color'] ) ? $attributes['isotopeStyles']['active']['shadow']['color'] : '',
);
$isotope_styles         = array(
	'letter_case'    => isset( $attributes['isotopeStyles']['letterCase'] ) ? $attributes['isotopeStyles']['letterCase'] : '',
	'decoration'     => isset( $attributes['isotopeStyles']['decoration'] ) ? $attributes['isotopeStyles']['decoration'] : '',
	'line_height'    => isset( $attributes['isotopeStyles']['lineHeight'] ) ? $attributes['isotopeStyles']['lineHeight'] : '',
	'letter_spacing' => isset( $attributes['isotopeStyles']['letterSpacing'] ) ? $attributes['isotopeStyles']['letterSpacing'] : '',
);

$search_bar_padding = cozy_render_TRBL( 'padding', $attributes['searchBar']['padding'] );
$search_bar_border  = isset( $attributes['searchBar']['border'] ) ? cozy_render_TRBL( 'border', $attributes['searchBar']['border'] ) : '';
$search_bar_color   = array(
	'text'         => isset( $attributes['searchBar']['color'] ) ? $attributes['searchBar']['color'] : '',
	'bg'           => isset( $attributes['searchBar']['bgColor'] ) ? $attributes['searchBar']['bgColor'] : '',
	'bg_focus'     => isset( $attributes['searchBar']['bgColorFocus'] ) ? $attributes['searchBar']['bgColorFocus'] : '',
	'border_focus' => isset( $attributes['searchBar']['borderColorFocus'] ) ? $attributes['searchBar']['borderColorFocus'] : '',
);

$featured_image_radius = isset( $attributes['featuredImage']['borderRadius'] ) ? $attributes['featuredImage']['borderRadius'] : '';

$portfolio_icon_box_padding = cozy_render_TRBL( 'padding', $attributes['iconBoxStyles']['padding'] );
$portfolio_icon_box_border  = isset( $attributes['iconBoxStyles']['border'] ) ? cozy_render_TRBL( 'border', $attributes['iconBoxStyles']['border'] ) : '';
$portfolio_icon_box_radius  = isset( $attributes['iconBoxStyles']['radius'] ) ? $attributes['iconBoxStyles']['radius'] : '';
$portfolio_icon_box_color   = array(
	'bg' => isset( $attributes['iconBoxStyles']['bgColor'] ) ? $attributes['iconBoxStyles']['bgColor'] : '',
);

$popup_padding = cozy_render_TRBL( 'padding', $attributes['popup']['padding'] );
$popup_color   = array(
	'bg' => isset( $attributes['popup']['bgColor'] ) ? $attributes['popup']['bgColor'] : '',
);

$portfolio_cpt_margin  = isset( $attributes['portfolioCPT']['margin'] ) ? cozy_render_TRBL( 'margin', $attributes['portfolioCPT']['margin'] ) : '';
$portfolio_cpt_padding = isset( $attributes['portfolioCPT']['padding'] ) ? cozy_render_TRBL( 'padding', $attributes['portfolioCPT']['padding'] ) : '';
$portfolio_cpt_border  = isset( $attributes['porfolioCPT']['border'] ) ? cozy_render_TRBL( 'border', $attributes['porfolioCPT']['border'] ) : '';
$portfolio_cpt_radius  = isset( $attributes['portfolioCPT']['radius'] ) ? cozy_render_TRBL( 'border-radius', $attributes['portfolioCPT']['radius'] ) : '';
$portfolio_cpt_color   = array(
	'text'       => isset( $attributes['portfolioCPT']['color'] ) ? $attributes['portfolioCPT']['color'] : '',
	'bg'         => isset( $attributes['portfolioCPT']['bgColor'] ) ? $attributes['portfolioCPT']['bgColor'] : '',
	'shadow'     => isset( $attributes['portfolioCPT']['shadow']['color'] ) ? $attributes['portfolioCPT']['shadow']['color'] : '',
	'subtitle'   => isset( $attributes['portfolioCPT']['subtitleColor'] ) ? $attributes['portfolioCPT']['subtitleColor'] : '',
	'link'       => isset( $attributes['portfolioCPT']['linkColor'] ) ? $attributes['portfolioCPT']['linkColor'] : '',
	'link_hover' => isset( $attributes['portfolioCPT']['linkColorHover'] ) ? $attributes['portfolioCPT']['linkColorHover'] : '',
);
$portfolio_cpt_shadow  = array(
	'default' => array(
		'horizontal' => isset( $attributes['portfolioCPT']['shadow']['horizontal'] ) ? $attributes['portfolioCPT']['shadow']['horizontal'] . 'px' : '',
		'vertical'   => isset( $attributes['portfolioCPT']['shadow']['vertical'] ) ? $attributes['portfolioCPT']['shadow']['vertical'] . 'px' : '',
		'blur'       => isset( $attributes['portfolioCPT']['shadow']['blur'] ) ? $attributes['portfolioCPT']['shadow']['blur'] . 'px' : '',
		'spread'     => isset( $attributes['portfolioCPT']['shadow']['spread'] ) ? $attributes['portfolioCPT']['shadow']['spread'] . 'px' : '',
		'position'   => isset( $attributes['portfolioCPT']['shadow']['position'] ) ? $attributes['portfolioCPT']['shadow']['position'] : '',
	),
);

$cat_padding = cozy_render_TRBL( 'padding', $attributes['catStyles']['padding'] );
$cat_border  = isset( $attributes['catStyles']['border'] ) ? cozy_render_TRBL( 'border', $attributes['catStyles']['border'] ) : '';
$cat_color   = array(
	'text' => isset( $attributes['catStyles']['color'] ) ? $attributes['catStyles']['color'] : '',
	'bg'   => isset( $attributes['catStyles']['bgColor'] ) ? $attributes['catStyles']['bgColor'] : '',
);
$cat_styles  = array(
	'letter_case'    => isset( $attributes['catStyles']['letterCase'] ) ? $attributes['catStyles']['letterCase'] : '',
	'decoration'     => isset( $attributes['catStyles']['decoration'] ) ? $attributes['catStyles']['decoration'] : '',
	'line_height'    => isset( $attributes['catStyles']['lineHeight'] ) ? $attributes['catStyles']['lineHeight'] : '',
	'letter_spacing' => isset( $attributes['catStyles']['letterSpacing'] ) ? $attributes['catStyles']['letterSpacing'] : '',
);

$ajax_button_padding = cozy_render_TRBL( 'padding', $attributes['ajaxButton']['padding'] );
$ajax_button_border  = isset( $attributes['ajaxButton']['border'] ) ? cozy_render_TRBL( 'border', $attributes['ajaxButton']['border'] ) : '';
$ajax_button_radius  = isset( $attributes['ajaxButton']['radius'] ) ? $attributes['ajaxButton']['radius'] : '';
$ajax_button_color   = array(
	'text'         => isset( $attributes['ajaxButton']['color'] ) ? $attributes['ajaxButton']['color'] : '',
	'text_hover'   => isset( $attributes['ajaxButton']['colorHover'] ) ? $attributes['ajaxButton']['colorHover'] : '',
	'bg'           => isset( $attributes['ajaxButton']['bgColor'] ) ? $attributes['ajaxButton']['bgColor'] : '',
	'bg_hover'     => isset( $attributes['ajaxButton']['bgColorHover'] ) ? $attributes['ajaxButton']['bgColorHover'] : '',
	'border_hover' => isset( $attributes['ajaxButton']['borderColorHover'] ) ? $attributes['ajaxButton']['borderColorHover'] : '',
);
$ajax_btn_styles     = array(
	'letter_case'    => isset( $attributes['ajaxButton']['letterCase'] ) ? $attributes['ajaxButton']['letterCase'] : '',
	'decoration'     => isset( $attributes['ajaxButton']['decoration'] ) ? $attributes['ajaxButton']['decoration'] : '',
	'line_height'    => isset( $attributes['ajaxButton']['lineHeight'] ) ? $attributes['ajaxButton']['lineHeight'] : '',
	'letter_spacing' => isset( $attributes['ajaxButton']['letterSpacing'] ) ? $attributes['ajaxButton']['letterSpacing'] : '',
);

$nav_size       = isset( $attributes['navigation']['size'] ) ? $attributes['navigation']['size'] : '20px';
$nav_box_width  = isset( $attributes['navigation']['boxWidth'] ) ? $attributes['navigation']['boxWidth'] : '35px';
$nav_box_height = isset( $attributes['navigation']['boxHeight'] ) ? $attributes['navigation']['boxHeight'] : '35px';
$nav_box_radius = isset( $attributes['navigation']['radius'] ) ? $attributes['navigation']['radius'] : '100px';
$nav_border     = isset( $attributes['navigation']['border'] ) ? cozy_render_TRBL( 'border', $attributes['navigation']['border'] ) : '';
$nav_styles     = array(
	'color'              => isset( $attributes['navigation']['color'] ) ? $attributes['navigation']['color'] : '',
	'color_hover'        => isset( $attributes['navigation']['colorHover'] ) ? $attributes['navigation']['colorHover'] : '',
	'bg_color'           => isset( $attributes['navigation']['bgColor'] ) ? $attributes['navigation']['bgColor'] : '',
	'bg_color_hover'     => isset( $attributes['navigation']['bgColorHover'] ) ? $attributes['navigation']['bgColorHover'] : '',
	'border_color_hover' => isset( $attributes['navigation']['borderColorHover'] ) ? $attributes['navigation']['borderColorHover'] : '',
);

$bullet         = array(
	'default' => array(
		'width'  => isset( $attributes['pagination']['default']['width'] ) ? $attributes['pagination']['default']['width'] : '',
		'height' => isset( $attributes['pagination']['default']['height'] ) ? $attributes['pagination']['default']['height'] : '',
		'radius' => isset( $attributes['pagination']['default']['radius'] ) ? $attributes['pagination']['default']['radius'] : '',
	),
	'active'  => array(
		'width'  => isset( $attributes['pagination']['active']['width'] ) ? $attributes['pagination']['active']['width'] : '',
		'height' => isset( $attributes['pagination']['active']['height'] ) ? $attributes['pagination']['active']['height'] : '',
		'radius' => isset( $attributes['pagination']['active']['radius'] ) ? $attributes['pagination']['active']['radius'] : '',
		'offset' => isset( $attributes['pagination']['active']['offset'] ) ? $attributes['pagination']['active']['offset'] : '',
	),
	'gap'     => isset( $attributes['pagination']['gap'] ) ? $attributes['pagination']['gap'] : '4px',
	'align'   => isset( $attributes['pagination']['align'] ) ? $attributes['pagination']['align'] : 'center',
	'left'    => isset( $attributes['pagination']['left'], $attributes['pagination']['align'] ) && 'left' === $attributes['pagination']['align'] ? 'padding-left:' . $attributes['pagination']['left'] . ';' : '',
	'right'   => isset( $attributes['pagination']['right'], $attributes['pagination']['align'] ) && 'right' === $attributes['pagination']['align'] ? 'padding-right:' . $attributes['pagination']['right'] . ';' : '',
);
$bullet_outline = isset( $attributes['pagination']['active']['border'] ) ? cozy_render_TRBL( 'outline', $attributes['pagination']['active']['border'] ) : '';
$bullet_styles  = array(
	'default_color'       => isset( $attributes['pagination']['default']['color'] ) ? $attributes['pagination']['default']['color'] : '',
	'default_color_hover' => isset( $attributes['pagination']['default']['colorHover'] ) ? $attributes['pagination']['default']['colorHover'] : '',
	'active_color'        => isset( $attributes['pagination']['active']['color'] ) ? $attributes['pagination']['active']['color'] : '',
	'active_color_hover'  => isset( $attributes['pagination']['active']['colorHover'] ) ? $attributes['pagination']['active']['colorHover'] : '',
);

$block_styles = <<<BLOCK_STYLES
#$block_id.source-template:not(.layout-type-default) > .cozy-layout-wrapper .cozy-portfolio:hover .cozy-portfolio-gallery__image-overlay {
    background-color: {$attributes['featuredImage']['overlayColor']};
    opacity: {$attributes['featuredImage']['opacity']};
}

#$block_id .cozy-portfolio-gallery__title, #$block_id .cozy-portfolio-gallery__title a {
    font-family: {$attributes['titleTypography']['fontFamily']};
    font-weight: {$attributes['titleTypography']['fontWeight']};
    font-size: {$attributes['titleTypography']['fontSize']};
    text-transform: {$title_styles['letter_case']};
    text-decoration: {$title_styles['decoration']};
    line-height: {$title_styles['line_height']};
    letter-spacing: {$title_styles['letter_spacing']};
    color: {$title_color['text']};
}
#$block_id .cozy-portfolio-gallery__title:hover, #$block_id .cozy-portfolio-gallery__title:hover a {
    color: {$title_color['text_hover']};
}

#$block_id .cozy-portfolio-gallery__subtitle {
    font-family: {$attributes['subtitleTypography']['fontFamily']};
    font-weight: {$attributes['subtitleTypography']['fontWeight']};
    font-size: {$attributes['subtitleTypography']['fontSize']};
    text-transform: {$subtitle_styles['letter_case']};
    text-decoration: {$subtitle_styles['decoration']};
    line-height: {$subtitle_styles['line_height']};
    letter-spacing: {$subtitle_styles['letter_spacing']};
    color: {$subtitle_color['text']};
}

#$block_id .cozy-layout-wrapper {
    text-align: {$attributes['textAlign']};
}

#$block_id.layout-grid .cozy-layout-grid {
    grid-template-columns: repeat({$attributes['gridOptions']['displayColumn']}, 1fr);
    grid-gap: {$attributes['gridOptions']['columnGap']}px;
}
#$block_id.layout-grid.has-masonry .cozy-layout-grid {
    column-count: {$attributes['gridOptions']['displayColumn']};
    grid-column-gap: {$attributes['gridOptions']['columnGap']}px;
}
#$block_id.layout-grid.has-masonry .cozy-layout-grid .cozy-portfolio {
    margin-bottom: {$attributes['gridOptions']['columnGap']}px;
}
@media screen and (max-width: 1024px) {
    #$block_id.layout-grid .cozy-layout-grid {
        grid-template-columns: repeat(
            $width1,
            1fr
        ) !important;
    }
    #$block_id.layout-grid.has-masonry .cozy-layout-grid {
        column-count: $width1 !important;
    }
}

@media screen and (max-width: 767px) {
    #$block_id.layout-grid .cozy-layout-grid {
        grid-template-columns: repeat(
            $width2,
            1fr
        ) !important;
    }
    #$block_id.layout-grid.has-masonry .cozy-layout-grid {
        column-count: $width2 !important;
    }
}

@media screen and (max-width: 400px) {
    #$block_id.layout-grid .cozy-layout-grid {
        grid-template-columns: repeat(
            1,
            1fr
        ) !important;
    }
    #$block_id.layout-grid.has-masonry .cozy-layout-grid {
        column-count: 1 !important;
    }
}

#$block_id.layout-grid.has-isotope .cozy-isotope-filter__wrapper {
    justify-content: {$isotope_tab_align};
    gap: {$isotope_gap};
    margin-top: {$isotope_margin_top}px;
    margin-right: {$isotope_margin_right};
    margin-bottom: {$attributes['isotopeStyles']['marginBottom']};
    margin-left: {$isotope_margin_left};
    font-family: {$attributes['isotopeStyles']['fontFamily']};
    font-weight: {$attributes['isotopeStyles']['fontWeight']};
    font-size: {$attributes['isotopeStyles']['fontSize']};
    text-transform: {$isotope_styles['letter_case']};
    text-decoration: {$isotope_styles['decoration']};
    line-height: {$isotope_styles['line_height']};
    letter-spacing: {$isotope_styles['letter_spacing']};
}
#$block_id.layout-grid.has-isotope .cozy-isotope-filter__label {
    {$isotope_padding}
    {$isotope_default_border}
    border-radius: {$isotope_radius};
    color: {$isotope_color['text']};
    background-color: {$isotope_color['bg']};
}
#$block_id.layout-grid.has-isotope.isotop-filter__has-box-shadow .cozy-isotope-filter__label {
    box-shadow: {$isotope_shadow['default']['horizontal']} {$isotope_shadow['default']['vertical']} {$isotope_shadow['default']['blur']} {$isotope_shadow['default']['spread']} {$isotope_color['shadow']} {$isotope_shadow['default']['position']};
}
#$block_id.layout-grid.has-isotope .cozy-isotope-filter__label.active {
    {$isotope_active_border}
    color: {$isotope_color['text_active']};
    background-color: {$isotope_color['bg_active']};
}
#$block_id.layout-grid.has-isotope.isotop-filter__has-box-shadow .cozy-isotope-filter__label.active {
    box-shadow: {$isotope_shadow['active']['horizontal']} {$isotope_shadow['active']['vertical']} {$isotope_shadow['active']['blur']} {$isotope_shadow['active']['spread']} {$isotope_color['shadow_active']} {$isotope_shadow['active']['position']};
}

#$block_id .cozy-search-bar {
    {$search_bar_padding}
    {$search_bar_border}
    border-radius: {$attributes['searchBar']['radius']};
    background-color: {$search_bar_color['bg']};
    color: {$search_bar_color['text']};
}
#$block_id .cozy-search-bar:focus {
    border-color: {$search_bar_color['border_focus']};
    background-color: {$search_bar_color['bg_focus']};
}
#$block_id .cozy-search-bar:active {
    border-color: {$search_bar_color['border_focus']};
}

#$block_id.source-template:not(.layout-type-default) .cozy-layout-wrapper > .cozy-portfolio .cozy-portfolio-gallery__title-cat-wrapper {
    width: {$attributes['featuredImage']['width']}px;
    {$title_padding}
    color: {$overlay_color['text']};
    text-align: {$gallery_text_align};
}
#$block_id.source-template:not(.layout-type-default) .cozy-layout-wrapper > .cozy-portfolio .cozy-portfolio-gallery__title-cat-wrapper .cozy-portfolio-gallery__title {
    color: {$gallery_options_title_color};
}
#$block_id.source-template.layout-type-overlay .cozy-block-portfolio-gallery__read-more {
    {$button_padding}
    {$button_border}
    border-radius: {$button_radius};
    color: {$overlay_color['button_text']};
    background-color: {$overlay_color['button_bg']};
}
#$block_id.source-template.layout-type-overlay .cozy-block-portfolio-gallery__read-more:hover {
    color: {$overlay_color['button_text_hover']};
    background-color: {$overlay_color['button_bg_hover']};
    border-color: {$overlay_color['button_border_hover']};
}
#$block_id.source-template.layout-type-gallery .cozy-overlay-icon-wrapper {
    padding: {$gallery_options_icon_box_size};
    {$overlay_icon_border}
    border-radius: {$gallery_options_icon_box_border_radius};
    background-color: {$gallery_options_icon_box_bg_color};
}
#$block_id.source-template.layout-type-gallery .cozy-overlay-icon-wrapper:hover {
    background-color: {$gallery_options_icon_box_bg_color_hover};
    border-color: {$overlay_color['border_hover']};
}
#$block_id.source-template.layout-type-gallery .cozy-overlay-icon-wrapper:hover .cozy-portfolio-icon__overlay {
    fill: {$overlay_color['icon_hover']};
}

#$block_id.source-template .cozy-layout-wrapper .cozy-portfolio-gallery__featured-image-wrapper {
    width: {$attributes['featuredImage']['width']}px;
    height: {$attributes['featuredImage']['height']}px;
    border-radius: {$featured_image_radius}px;
}

#$block_id.source-template.layout-type-default.featured-image__position-before .cozy-layout-wrapper > .cozy-portfolio .cozy-portfolio-gallery__title {
    margin-top: {$attributes['featuredImage']['marginTop']}px;
}
#$block_id.source-template.layout-type-default.featured-image__position-after .cozy-layout-wrapper > .cozy-portfolio .cozy-portfolio-gallery__title {
    margin-bottom: {$attributes['featuredImage']['marginBottom']}px;
}

#$block_id.icon-view-stacked .cozy-portfolio-icon__wrapper {
    {$portfolio_icon_box_padding}
    {$portfolio_icon_box_border}
    border-radius: {$portfolio_icon_box_radius};
    background-color: {$portfolio_icon_box_color['bg']};
}
#$block_id.layout-grid.has-isotope .cozy-search-bar__icon-wrapper {
    top: {$attributes['searchIcon']['top']}px;
    right: {$attributes['searchIcon']['right']}px;
}
#$block_id .cozy-portfolio-icon {
    width: {$attributes['portfolioIcon']['size']}px;
    height: {$attributes['portfolioIcon']['size']}px;
}

#$block_id.has-popup-view .cozy-portfolio-popup {
    {$popup_padding}
    background-color: {$popup_color['bg']};
}
#$block_id.has-popup-view.popup-view-dimension__custom .cozy-portfolio-popup {
    width: {$attributes['popup']['width']}px;
    height: {$attributes['popup']['height']}px;
}
#$block_id.has-popup-view .cozy-popup-content__wrapper > .cozy-popup-content__sticky .cozy-portfolio-gallery__cpt {
    {$portfolio_cpt_margin}
    {$portfolio_cpt_padding}
    {$portfolio_cpt_border}
    {$portfolio_cpt_radius}
    color: {$portfolio_cpt_color['text']};
    background-color: {$portfolio_cpt_color['bg']};
}
#$block_id.has-popup-view.portfolio-cpt__has-box-shadow .cozy-popup-content__wrapper > .cozy-popup-content__sticky .cozy-portfolio-gallery__cpt {
    box-shadow: {$portfolio_cpt_shadow['default']['horizontal']} {$portfolio_cpt_shadow['default']['vertical']} {$portfolio_cpt_shadow['default']['blur']} {$portfolio_cpt_shadow['default']['spread']} {$portfolio_cpt_color['shadow']} {$portfolio_cpt_shadow['default']['position']};
}
#$block_id.has-popup-view .cozy-popup-content__wrapper > .cozy-popup-content__sticky .cozy-portfolio-gallery__cpt  .cozy-portfolio-gallery__subtitle {
    color: {$portfolio_cpt_color['subtitle']};
}
#$block_id .cozy-portfolio-gallery__category {
    margin-top: {$attributes['catStyles']['marginTop']};
    margin-bottom: {$attributes['catStyles']['marginBottom']};
    gap: {$attributes['catStyles']['gap']};
}
#$block_id .cozy-portfolio-gallery__category-label {
    {$cat_padding}
    {$cat_border}
    border-radius: {$attributes['catStyles']['radius']};
    background-color: {$cat_color['bg']};
    color: {$cat_color['text']};
    font-size: {$attributes['catStyles']['fontSize']};
    font-weight: {$attributes['catStyles']['fontWeight']};
    font-family: {$attributes['catStyles']['fontFamily']};
    text-transform: {$cat_styles['letter_case']};
    text-decoration: {$cat_styles['decoration']};
    line-height: {$cat_styles['line_height']};
    letter-spacing: {$cat_styles['letter_spacing']};
}
#$block_id.has-popup-view .cozy-popup-content__wrapper > .cozy-popup-content__sticky .cozy-portfolio-gallery__cpt .cozy-portfolio-gallery__url a {
    color: {$portfolio_cpt_color['link']};
}
#$block_id.has-popup-view .cozy-popup-content__wrapper > .cozy-popup-content__sticky .cozy-portfolio-gallery__cpt .cozy-portfolio-gallery__url a:hover p {
    color: {$portfolio_cpt_color['link_hover']};
}
#$block_id.has-popup-view .cozy-popup-content__wrapper > .cozy-popup-content__sticky .cozy-portfolio-gallery__cpt .cozy-portfolio-gallery__url a:hover svg {
    fill: {$portfolio_cpt_color['link_hover']};
}
#$block_id.has-popup-view .cozy-portfolio-popup .cozy-popup-icon.popup-close-icon {
    top: {$attributes['popup']['top']}px;
    left: {$attributes['popup']['left']}%;
}
@media screen and (max-width: {$attributes['popup']['responsiveWidth']}px) {
    #$block_id.has-popup-view.popup-view-dimension__custom .cozy-portfolio-popup {
        max-height: 100vh;
        height: 100%;
        width: 100%;
    }
}

#$block_id .cozy-dynamic-loader {
    margin-top: {$attributes['ajaxButton']['marginTop']}px;
    {$ajax_button_padding}
    {$ajax_button_border}
    border-radius: {$ajax_button_radius};
    background-color: {$ajax_button_color['bg']};
    color: {$ajax_button_color['text']};
    font-size: {$attributes['ajaxButton']['fontSize']};
    font-weight: {$attributes['ajaxButton']['fontWeight']};
    font-family: {$attributes['ajaxButton']['fontFamily']};
    text-transform: {$ajax_btn_styles['letter_case']};
    text-decoration: {$ajax_btn_styles['decoration']};
    line-height: {$ajax_btn_styles['line_height']};
    letter-spacing: {$ajax_btn_styles['letter_spacing']};
}
#$block_id .cozy-dynamic-loader:hover {
    background-color: {$ajax_button_color['bg_hover']};
    color: {$ajax_button_color['text_hover']};
    border-color: {$ajax_button_color['border_hover']};
}

#$block_id .swiper-button-prev::after,
#$block_id .swiper-button-next::after {
	font-size: {$nav_size};
}
#$block_id .swiper-button-prev,
#$block_id .swiper-button-next {
	width: {$nav_box_width};
	height: {$nav_box_height};
	{$nav_border}
	border-radius: {$nav_box_radius};
	color: {$nav_styles['color']};
	background-color: {$nav_styles['bg_color']};
}
#$block_id .swiper-button-prev:hover,
#$block_id .swiper-button-next:hover {
	color: {$nav_styles['color_hover']};
	background-color: {$nav_styles['bg_color_hover']};
	border-color: {$nav_styles['border_color_hover']};
}

#$block_id .swiper-pagination {
	bottom: {$attributes['pagination']['verticalPosition']}px;
    text-align: {$bullet['align']};
    {$bullet['left']}
    {$bullet['right']}
}
#$block_id .swiper-pagination .swiper-pagination-bullet {
	width: {$bullet['default']['width']};
	height: {$bullet['default']['height']};
	border-radius: {$bullet['default']['radius']};
	background-color: {$bullet_styles['default_color']};
}
#$block_id .swiper-pagination .swiper-pagination-bullet-active {
	width: {$bullet['active']['width']};
	height: {$bullet['active']['height']};
	border-radius: {$bullet['active']['radius']};
	background-color: {$bullet_styles['active_color']};
	{$bullet_outline}
	outline-offset: {$bullet['active']['offset']};
}
#$block_id .swiper-pagination .swiper-pagination-bullet:hover {
	background-color: {$bullet_styles['default_color_hover']};
}
#$block_id .swiper-pagination .swiper-pagination-bullet-active:hover {
	background-color: {$bullet_styles['active_color_hover']};
}
#$block_id.swiper-horizontal .swiper-pagination-bullets .swiper-pagination-bullet {
	margin: 0 var(--swiper-pagination-bullet-horizontal-gap, {$bullet['gap']});
}
#$block_id.swiper-vertical .swiper-pagination-bullets .swiper-pagination-bullet {
	margin: var(--swiper-pagination-bullet-vertical-gap, {$bullet['gap']}) 0;
}
BLOCK_STYLES;

$output  = '<div class="cozy-block-wrapper">';
$output .= '<style>' . $block_styles . '</style>';

if ( isset( $attributes['ajaxButton']['fontFamily'] ) && ! empty( $attributes['ajaxButton']['fontFamily'] ) ) {
	$output .= '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=' . rawurlencode( $attributes['ajaxButton']['fontFamily'] ) . ':wght@100;200;300;400;500;600;700;800;900" />';
}
if ( isset( $attributes['catStyles']['fontFamily'] ) && ! empty( $attributes['catStyles']['fontFamily'] ) ) {
	$output .= '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=' . rawurlencode( $attributes['catStyles']['fontFamily'] ) . ':wght@100;200;300;400;500;600;700;800;900" />';
}
if ( isset( $attributes['isotopeStyles']['fontFamily'] ) && ! empty( $attributes['isotopeStyles']['fontFamily'] ) ) {
	$output .= '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=' . rawurlencode( $attributes['isotopeStyles']['fontFamily'] ) . ':wght@100;200;300;400;500;600;700;800;900" />';
}
if ( isset( $attributes['titleTypography']['fontFamily'] ) && ! empty( $attributes['titleTypography']['fontFamily'] ) ) {
	$output .= '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=' . rawurlencode( $attributes['titleTypography']['fontFamily'] ) . ':wght@100;200;300;400;500;600;700;800;900" />';
}
if ( isset( $attributes['subtitleTypography']['fontFamily'] ) && ! empty( $attributes['subtitleTypography']['fontFamily'] ) ) {
	$output .= '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=' . rawurlencode( $attributes['subtitleTypography']['fontFamily'] ) . ':wght@100;200;300;400;500;600;700;800;900" />';
}

$output .= $content;
$output .= '</div>';

echo $output;
