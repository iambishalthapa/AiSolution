<?php
// -- Enqueue Latest jQuery

if ( ! function_exists('enqueue_gs_projects_latest_jquery') ) {
    function enqueue_gs_projects_latest_jquery(){
        if(!wp_script_is('jquery', 'enqueued' )){
            wp_enqueue_script('jquery');
        }
    }
    add_action('init', 'enqueue_gs_projects_latest_jquery');
}

if ( ! function_exists('enqueue_gs_projects_admin_style')) {
    function enqueue_gs_projects_admin_style($screen){
        $s_action = $screen->action;
        $s_post_type = $screen->post_type;
        $s_parent_base = $screen->parent_base;
        $s_base = $screen->base;

        if(($s_action == 'add' || $s_action == null) && $s_base == 'post' && $s_post_type == 'gs_projects'){
            function gs_projects_admin_style() {

                $media = 'all';
            
                wp_register_style('gsprojects-fa-icons-admin', GSPROJECTS_FILES_URI . '/assets/fa-icons/css/font-awesome.min.css','', GSPROJECTS_VERSION, $media);
                wp_enqueue_style('gsprojects-fa-icons-admin');
            
                wp_register_style( 'gs-projects-admin', GSPROJECTS_FILES_URI . '/admin/css/gs-projects-admin.css', '', GSPROJECTS_VERSION, $media );
                wp_enqueue_style( 'gs-projects-admin' );
            } 

            add_action('admin_enqueue_scripts', 'gs_projects_admin_style' );
        }
    }
    add_action('current_screen', 'enqueue_gs_projects_admin_style');
}


// -- Include css files
if ( ! function_exists('gs_enqueue_projects_styles') ) {
    function gs_enqueue_projects_styles() {
        if (!is_admin()) {
            $media = 'all';

            if(!wp_style_is('gsprojects-fa-icons','registered')){
                wp_register_style('gsprojects-fa-icons', GSPROJECTS_FILES_URI . '/assets/fa-icons/css/font-awesome.min.css','', GSPROJECTS_VERSION, $media);
            }
            if(!wp_style_is('gsprojects-fa-icons','enqueued')){
                wp_enqueue_style('gsprojects-fa-icons');
            }

            wp_register_style('gsprojects-custom-bootstrap', GSPROJECTS_FILES_URI . '/assets/css/gs-projects-custom-bootstrap.css','', GSPROJECTS_VERSION, $media);
            wp_enqueue_style('gsprojects-custom-bootstrap');

            // Plugin main stylesheet
            wp_register_style('gs_projects_csutom_css', GSPROJECTS_FILES_URI . '/assets/css/gs-projects-custom.css','', GSPROJECTS_VERSION, $media);
            wp_enqueue_style('gs_projects_csutom_css');
        }
    }
    add_action( 'init', 'gs_enqueue_projects_styles' );
}

function gsproject_enque_admin_style() {
    $media = 'all';
    wp_register_style( 'gs-plugins-free-proj', GSPROJECTS_FILES_URI . '/admin/css/gs_free_plugins.css', '', GSPROJECTS_VERSION, $media );
    wp_enqueue_style( 'gs-plugins-free-proj' );
}
add_action( 'admin_enqueue_scripts', 'gsproject_enque_admin_style' );