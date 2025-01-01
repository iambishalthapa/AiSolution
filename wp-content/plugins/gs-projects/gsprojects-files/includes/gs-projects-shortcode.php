<?php

// -- Getting values from setting panel

function gs_projects_getoption( $option, $section, $default = '' ) {
    $options = get_option( $section );
    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }
    return $default;
}

// -- Shortcode [gs_projects]

add_shortcode('gs_projects','gs_projects_shortcode');

function gs_projects_shortcode( $atts ) {

    $gs_projects_cols      = gs_projects_getoption('gs_projects_cols', 'gs_projects_settings', 3);
    $gs_projects_theme     = gs_projects_getoption('gs_projects_theme', 'gs_projects_settings', 'theme1');
    $gs_project_name       = gs_projects_getoption('gs_project_name', 'gs_projects_settings', 'on');
    $gs_project_details    = gs_projects_getoption('gs_project_details', 'gs_projects_settings', 'on');
    $gs_project_skill      = gs_projects_getoption('gs_project_skill', 'gs_projects_settings', 'on');
    $gs_project_review     = gs_projects_getoption('gs_project_review', 'gs_projects_settings', 'on');
    $gs_project_rating     = gs_projects_getoption('gs_project_rating', 'gs_projects_settings', 'on');
    $gs_project_url        = gs_projects_getoption('gs_project_url', 'gs_projects_settings', 'on');
    $gs_project_cat        = gs_projects_getoption('gs_project_cat', 'gs_projects_settings', 'on');
    $gs_project_link_tar   = gs_projects_getoption('gs_project_link_tar', 'gs_projects_settings', '_blank');
    $gs_proj_details_contl = gs_projects_getoption('gs_project_details_contl', 'gs_projects_settings', 100);

    $atts = gs_projects_validate_attributes($atts);

    extract(shortcode_atts(
        array(
        'num'         => -1,
        'order'       => 'DESC',
        'orderby'     => 'date',
        'theme'       => $gs_projects_theme,
        'cols'        => $gs_projects_cols,
        'desc_limit'  => $gs_proj_details_contl
        ), $atts
    ));

    $GLOBALS['gs_projects_loop'] = new WP_Query(
        array(
        'post_type'         => 'gs_projects',
        'order'             => $order,
        'orderby'           => $orderby,
        'posts_per_page'    => $num
    ));

    $output = '';
    $output = '<div class="wrap gs_projects_area '.$theme.'">';

    if ( $theme == 'gs_project_theme1' || $theme == 'gs_project_theme2') {
        include GSPROJECTS_FILES_DIR . '/includes/templates/gs_projects_structure_1_square.php';
    } else {
        echo('<h4 style="text-align: center;">Select correct Theme or Upgrade to <a href="https://www.gsplugins.com/product/wordpress-projects-showcase-plugin" target="_blank">Pro version</a> for more Options<br><a href="https://projects.gsplugins.com" target="_blank">Chcek available demos</a></h4>');
    }

    $output .= '</div>'; // end wrap

    return $output;
}

function gs_projects_validate_attributes( $atts ) {

    $atts['num']        = isset( $atts['num'] ) ? intval( $atts['num'] ) : -1;
    $atts['order']      = isset( $atts['order'] ) ? esc_html( $atts['order'] ) : 'ASC';
    $atts['orderby']    = isset( $atts['orderby'] ) ? esc_html( $atts['orderby'] ) : 'date';
    $atts['theme']      = isset( $atts['theme'] ) ? esc_html( $atts['theme'] ) : 'theme1';
    $atts['cols']       = isset( $atts['cols'] ) ? intval( $atts['cols'] ) : 3;
    $atts['desc_limit'] = isset( $atts['desc_limit'] ) ? intval( $atts['desc_limit'] ) : 100;

    return $atts;
}