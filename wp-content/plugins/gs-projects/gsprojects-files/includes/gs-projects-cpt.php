<?php
/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
if ( ! function_exists( 'GS_Projects' ) ) {

    function GS_Projects() {
        $labels = array(
            'name'               => _x( 'Projects', 'gsprojects' ),
            'singular_name'      => _x( 'Project', 'gsprojects' ),
            'menu_name'          => _x( 'GS Projects', 'admin menu', 'gsprojects' ),
            'name_admin_bar'     => _x( 'GS Projects', 'add new on admin bar', 'gsprojects' ),
            'add_new'            => _x( 'Add New Project', 'project', 'gsprojects' ),
            'add_new_item'       => __( 'Add New Project', 'gsprojects' ),
            'new_item'           => __( 'New Projects', 'gsprojects' ),
            'edit_item'          => __( 'Edit Projects', 'gsprojects' ),
            'view_item'          => __( 'View Projects', 'gsprojects' ),
            'all_items'          => __( 'All Projects', 'gsprojects' ),
            'search_items'       => __( 'Search Projects', 'gsprojects' ),
            'parent_item_colon'  => __( 'Parent Projects:', 'gsprojects' ),
            'not_found'          => __( 'No Projects found.', 'gsprojects' ),
            'not_found_in_trash' => __( 'No Projects found in Trash.', 'gsprojects' ),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'projects' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => GSPROJECTS_MENU_POSITION,
            'menu_icon'          => 'dashicons-image-filter',
            'supports'           => array( 'title', 'editor','thumbnail')
        );

        register_post_type( 'gs_projects', $args );
    }
}

add_action( 'init', 'GS_Projects' );

// Register Theme Features (feature image for Projects)
if ( ! function_exists('gs_projects_theme_support') ) {

    function gs_projects_theme_support()  {
        // Add theme support for Featured Images
        add_theme_support( 'post-thumbnails', array( 'gs_projects' ) );
        add_theme_support( 'post-thumbnails', array( 'post' ) ); // Add it for posts
        add_theme_support( 'post-thumbnails', array( 'page' ) ); // Add it for pages
        add_theme_support( 'post-thumbnails', array( 'product' ) ); // Add it for products
        add_theme_support( 'post-thumbnails');
        // Add Shortcode support in text widget
        add_filter('widget_text', 'do_shortcode');
    }

    // Hook into the 'after_setup_theme' action
    add_action( 'after_setup_theme', 'gs_projects_theme_support' );
}

// SIDEBAR Ad for PRO version
function gs_projects_pro_features_meta_box() {
    add_meta_box(
        'gs_project_sectionid_pro_sidebar',
        __( "GS Projects Pro Features" , 'gsprojects' ),
        'gs_projects_pro_features',
        'gs_projects',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'gs_projects_pro_features_meta_box' );

function gs_projects_pro_features() { ?>
    <ul class="gsproj_pro_fea">
        <li>11 different themes</li>
        <li>Project Image (default) / Youtube / Vimeo / Gallery</li>
        <li>Single Project Template included</li>
        <li>Archive Project Template included</li>
        <li>GS Project Widget available</li>
        <li>GS Project Shortcode generator available at page / post</li>
        <li>Display Projects by Group / category wise</li>
        <li>Limit number of Projects to display.</li>
        <li>Limit number of characters for description.</li>
        <li>Custom CSS – Add Custom CSS to GS Project</li>
        <li>Priority Email Support.</li>
        <li>Free Installation ( If needed ).</li>
        <li>Life time free update.</li>
        <li>Well documentation and support.</li>
        <li>And many more..</li>
    </ul>
    <p><a class="button button-primary button-large" href="https://www.gsplugins.com/product/wordpress-projects-showcase-plugin" target="_blank">Go for PRO</a></p>
    <div style="clear:both"></div>
<?php
}