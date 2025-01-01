<?php 
// ============== Displaying Additional Columns ===============

if ( ! function_exists('gs_projects_screen_columns') ) {
    add_filter( 'manage_edit-gs_projects_columns', 'gs_projects_screen_columns' );

    function gs_projects_screen_columns( $columns ) {
        unset( $columns['date'] );
        unset( $columns['taxonomy-projects_group'] );
        $columns['title'] = 'Project Name';
        $columns['gsprojects_featured_image'] = 'Project Image';
        $columns['_gs_skil'] = 'Skill';
        $columns['date'] = 'Date';
        return $columns;
    }
}

// GET FEATURED IMAGE
if ( ! function_exists('gs_projects_featured_image') ) {
    function gs_projects_featured_image($post_ID) {
        $post_thumbnail_id = get_post_thumbnail_id($post_ID);
        if ($post_thumbnail_id) {
            $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id);
            return $post_thumbnail_img[0];
        }
    }
}

if ( ! function_exists('gs_projects_columns_content') ) {
    add_action('manage_posts_custom_column', 'gs_projects_columns_content', 10, 2);
    // SHOW THE FEATURED IMAGE
    function gs_projects_columns_content($column_name, $post_ID) {
        if ($column_name == 'gsprojects_featured_image') {
            $post_featured_image = gs_projects_featured_image($post_ID);
            if ($post_featured_image) {
                echo '<img src="' . $post_featured_image . '" width="34"/>';
            }
        }
    }
}

//Populating the Columns
if ( ! function_exists('gs_projects_populate_columns') ) {
    
    add_action( 'manage_posts_custom_column', 'gs_projects_populate_columns' );

    function gs_projects_populate_columns( $column ) {
        if ( '_gs_skil' == $column ) {
            $proj_m_desig = get_post_meta( get_the_ID(), '_gs_skil', true );
            echo $proj_m_desig;
        }
    }
}

// Columns as Sortable
if ( ! function_exists('gs_projects_sort') ) {
    add_filter( 'manage_edit-gs_projects_sortable_columns', 'gs_projects_sort' );

    function gs_projects_sort( $columns ) {
        $columns['taxonomy-projects_group'] = 'taxonomy-projects_group';
        return $columns;
    }
}