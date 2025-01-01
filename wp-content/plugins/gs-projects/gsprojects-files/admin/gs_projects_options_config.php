<?php
/**
 * This page shows the procedural or functional example
 * OOP way example is given on the main plugin file.
 * @author GS Plugins <gsamdani@gmail.com>
 */

/**
 * WordPress settings API demo class
 * @author GS Plugins
 */


if ( !class_exists('gs_projects_Settings_Config' ) ):
class gs_projects_Settings_Config {

    private $settings_api;

    function __construct() {
        $this->settings_api = new GS_Projects_WeDevs_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') ); //display options
        add_action( 'admin_menu', array($this, 'admin_menu') ); //display the page of options.
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {

        add_submenu_page( 'edit.php?post_type=gs_projects', 'Projects Settings', 'Projects Settings', 'delete_posts', 'projects-settings', array($this, 'plugin_page'));
    }


    function get_settings_sections() {
        $sections = array(
            array(
                'id'     => 'gs_projects_settings',
                'title' => __( 'GS Project Settings', 'gsprojects' )
            ),
            array(
                'id'    => 'gs_projects_style_settings',
                'title' => __( 'Style Settings', 'gsprojects' )
            )
        );
        return $sections;
    }

    //start all options of "GS project settings" and "Style Settings" under nav
    /*
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(

            // Start of Project settings nav, 'gs_projects_settings' => array()
            'gs_projects_settings' => array(
                // Front page display Columns
                array(
                    'name'      => 'gs_projects_cols',
                    'label'     => __( 'Page Columns', 'gsprojects' ),
                    'desc'      => __( 'Select number of Project columns', 'gsprojects' ),
                    'type'      => 'select',
                    'default'   => '3',
                    'options'   => array(
                        '6'    => '2 Columns',
                        '4'      => '3 Columns',
                        '3'      => '4 Columns',
                    )
                ),
                // Projects theme
                array(
                    'name'  => 'gs_projects_theme',
                    'label' => __( 'Style & Theming', 'gsprojects' ),
                    'desc'  => __( 'Select preferred Style & Theme', 'gsprojects' ),
                    'type'  => 'select',
                    'default'   => 'gs_project_theme1',
                    'options'   => array(
                        'gs_project_theme1'     => 'Square (Lite)',
                        'gs_project_theme2'     => 'Round (Lite)',
                        'gs_project_theme3'     => 'Left Sqr (Pro)',
                        'gs_project_theme4'     => 'Right Sqr (Pro)',
                        'gs_project_theme5'     => 'Left Round (Pro)',
                        'gs_project_theme6'     => 'Right Round (Pro)',
                        'gs_project_theme7'     => 'Slider (Pro)',
                        'gs_project_theme7_1'   => 'Slider & Hover (Pro)',
                        'gs_project_theme8'     => 'Popup (Pro)',
                        'gs_project_theme9'     => 'Filter (Pro)',
                        'gs_project_theme10'    => 'Grey (Pro)',
                        'gs_project_theme11'    => 'To Single (Pro)',
                    )
                ),


                // Projects Project Name
                array(
                    'name'      => 'gs_project_name',
                    'label'     => __( 'Project Name', 'gsprojects' ),
                    'desc'      => __( 'Show or Hide All Projects Name', 'gsprojects' ),
                    'type'      => 'switch',
                    'switch_default' => 'ON'
                ),
                // Projects Project Description/Details
                array(
                    'name'      => 'gs_project_details',
                    'label'     => __( 'Project Details', 'gsprojects' ),
                    'desc'      => __( 'Show or Hide All Projects Details', 'gsprojects' ),
                    'type'      => 'switch',
                    'switch_default' => 'ON'
                ),

                // Projects Project Skill
                array(
                    'name'      => 'gs_project_skill',
                    'label'     => __( 'Project Skill', 'gsprojects' ),
                    'desc'      => __( 'Show or Hide All Projects Skill', 'gsprojects' ),
                    'type'      => 'switch',
                    'switch_default' => 'ON'
                ),

                // Projects Project Client Review
                array(
                    'name'      => 'gs_project_review',
                    'label'     => __( 'Project Review', 'gsprojects' ),
                    'desc'      => __( 'Show or Hide All Projects Review', 'gsprojects' ),
                    'type'      => 'switch',
                    'switch_default' => 'ON'
                ),

                // Projects Project Client Rating
                array(
                    'name'      => 'gs_project_rating',
                    'label'     => __( 'Project Rating', 'gsprojects' ),
                    'desc'      => __( 'Show or Hide All Projects Rating', 'gsprojects' ),
                    'type'      => 'switch',
                    'switch_default' => 'ON'
                ),

                // Projects Project URL
                array(
                    'name'      => 'gs_project_url',
                    'label'     => __( 'Project URL', 'gsprojects' ),
                    'desc'      => __( 'Show or Hide All Projects URL', 'gsprojects' ),
                    'type'      => 'switch',
                    'switch_default' => 'ON'
                ),

                // Projects Project Category
                array(
                    'name'      => 'gs_project_cat',
                    'label'     => __( 'Project Category', 'gsprojects' ),
                    'desc'      => __( 'Show or Hide All Projects Category', 'gsprojects' ),
                    'type'      => 'switch',
                    'switch_default' => 'ON'
                ),

                // Projects Project Link Target
                array(
                    'name'      => 'gs_project_link_tar',
                    'label'     => __( 'Project Link Target', 'gsprojects' ),
                    'desc'      => __( 'Specify target to load the Links, Default New Tab ', 'gsprojects' ),
                    'type'      => 'select',
                    'default'   => '_blank',
                    'options'   => array(
                        '_blank'    => 'New Tab',
                        '_self'     => 'Same Window'
                    )
                ),
                // Projects Project Detail Description char contl
                array(
                    'name'  => 'gs_project_details_contl',
                    'label' => __( 'Description Character Control', 'gswps' ),
                    'desc'  => __( 'Set max no of characters in Project details. Default 100 & Max 300', 'gsprojects' ),
                    'type'  => 'number',
                    'min'   => 1,
                    'max'   => 300,
                    'default' => 100
                )
            ), // end of Project Settings

            // start of Style Settings
            'gs_projects_style_settings' => array(
                array(
                    'name'      => 'gs_proj_setting_banner',
                    'label'     => __( '', 'gsprojects' ),
                    'desc'      => __( '<p class="gsprojects_pro">Available at <a href="https://www.gsplugins.com/product/wordpress-projects-showcase-plugin" target="_blank">PRO</a> version.</p>', 'gsprojects' ),
                    'row_classes' => 'gsproj_banner'
                ),
                // Font Size
                array(
                    'name'      => 'gs_project_fz',
                    'label'     => __( 'Font Size', 'gsprojects' ),
                    'desc'      => __( 'Set Font Size for <b>Project Name</b>', 'gsprojects' ),
                    'type'      => 'number',
                    'default'   => '18',
                    'options'   => array(
                        'min'   => 1,
                        'max'   => 30,
                        'default' => 18
                    )
                ),

                // Font weight
                array(
                    'name'      => 'gs_project_fntw',
                    'label'     => __( 'Font Weight', 'gsprojects' ),
                    'desc'      => __( 'Select Font Weight for <b>Project Name</b>', 'gsprojects' ),
                    'type'      => 'select',
                    'default'   => 'normal',
                    'options'   => array(
                        'normal'    => 'Normal',
                        'bold'      => 'Bold',
                        'lighter'   => 'Lighter'
                    )
                ),

                // Font style
                array(
                    'name'      => 'gs_project_fnstyl',
                    'label'     => __( 'Font Style', 'gsprojects' ),
                    'desc'      => __( 'Select Font Style for <b>Project Name</b>', 'gsprojects' ),
                    'type'      => 'select',
                    'default'   => 'normal',
                    'options'   => array(
                        'normal'    => 'Normal',
                        'italic'      => 'Italic'
                    )
                ),

                // Font Color of Project Name
                array(
                    'name'    => 'gs_project_name_color',
                    'label'   => __( 'Font Color', 'gsprojects' ),
                    'desc'    => __( 'Select color for <b>Project Name</b>.', 'gsprojects' ),
                    'type'    => 'color',
                    'default' => '#141412'
                ),

                // Label Font Size
                array(
                    'name'      => 'gs_project_label_fz',
                    'label'     => __( 'Label Font Size', 'gsprojects' ),
                    'desc'      => __( 'Set Font Size for <b>Project Label</b>', 'gsprojects' ),
                    'type'      => 'number',
                    'default'   => '18',
                    'options'   => array(
                        'min'   => 1,
                        'max'   => 30,
                        'default' => 18
                    )
                ),

                // Label Font Color
               array(
                   'name'    => 'gs_project_label_color',
                   'label'   => __( 'Label Font Color', 'gsprojects' ),
                   'desc'    => __( 'Select color for <b>Project Label</b>.', 'gsprojects' ),
                   'type'    => 'color',
                   'default' => '#0BF'
               ),

               // Label Font Color
               array(
                   'name'    => 'gs_project_BtnNavCls_color',
                   'label'   => __( 'Popup Btn, Nav & Close Color', 'gsprojects' ),
                   'desc'    => __( 'Select color for <b>Popup Btn, Nav & Close Button</b>.', 'gsprojects' ),
                   'type'    => 'color',
                   'default' => '#2148d2'
               ),

                // Projects Custom CSS
                array(
                    'name'    => 'gs_project_custom_css',
                    'label'   => __( 'Your Custom CSS', 'gsprojects' ),
                    'desc'    => __( 'You can write your own custom css', 'gsprojects' ),
                    'type'    => 'textarea'
                ),

            ) // end of Style Settings nav array, 'gs_projects_style_settings' => array()
        ); //end of $settings_fields = array()

        return $settings_fields;
    } // end of function get_settings_fields()




    function plugin_page() {
        settings_errors();
        echo '<div class="wrap gs_projects_wrap" style="width: 845px; float: left;">';
        // echo '<div id="post-body-content">';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';

        ?>
            <div class="gswps-admin-sidebar" style="width: 277px; float: left; margin-top: 62px;">
                <div class="postbox">
                    <h3 class="hndle"><span><?php _e( 'Support / Report a bug' ) ?></span></h3>
                    <div class="inside centered">
                        <p>Please feel free to let us know if you have any bugs to report. Your report / suggestion can make the plugin awesome!</p>
                        <p style="margin-bottom: 1px! important;"><a href="https://www.gsplugins.com/contact/" target="_blank" class="button button-primary">Get Support</a></p>
                    </div>
                </div>
                <div class="postbox">
                    <h3 class="hndle"><span><?php _e( 'Buy me a coffee' ) ?></span></h3>
                    <div class="inside centered">
                        <p>If you like the plugin, please buy me a coffee to inspire me to develop further.</p>
                        <p style="margin-bottom: 1px! important;"><a href='https://www.paypal.com/donate/?hosted_button_id=K7K8YF4U3SCNQ' class="button button-primary" target="_blank">Donate</a></p>
                    </div>
                </div>

                <div class="postbox">
                    <h3 class="hndle"><span><?php _e( 'Join GS Plugins on facebook' ) ?></span></h3>
                    <div class="inside centered">
                        <iframe src="//www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/gsplugins&amp;width&amp;height=258&amp;colorscheme=dark&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=723137171103956" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:220px;" allowTransparency="true"></iframe>
                    </div>
                </div>

                <div class="postbox">
                    <h3 class="hndle"><span><?php _e( 'Follow GS Plugins on twitter' ) ?></span></h3>
                    <div class="inside centered">
                        <a href="https://twitter.com/gsplugins" target="_blank" class="button button-secondary">Follow @gsplugins<span class="dashicons dashicons-twitter" style="position: relative; top: 3px; margin-left: 3px; color: #0fb9da;"></span></a>
                    </div>
                </div>
            </div>
        <?php
    }


    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;

$settings = new gs_projects_Settings_Config();
