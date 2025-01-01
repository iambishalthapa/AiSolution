<?php

require_once ATFIT_PLUGIN_DIR . 'admin/inc/Image.class.php';
class ATFIT_Admin {
    private static $_instance = null;

    public $image = null;

    public $addons = array();

    public static function instance() {
        if ( null === self::$_instance ) {
            self::$_instance = new self();
            self::$_instance->hooks();
            self::$_instance->image = ATFIT_Image::instance();
        }
        return self::$_instance;
    }

    public function hooks() {
        add_action( 'admin_menu', array($this, 'add_menu') );
        // Load jquery-ui library
        add_action( 'admin_enqueue_scripts', array($this, 'enqueue_scripts') );
        // Load admin css
        add_action( 'admin_enqueue_scripts', array($this, 'enqueue_styles') );
        // add_action('admin_init', array($this, 'set_default_settings'));
        $this->set_default_settings();
        register_setting( ATFIT_PLUGIN_SLUG, 'atfit_settings', array($this, 'sanitize_post') );
        // add custom label to media library
        add_filter(
            'attachment_fields_to_edit',
            array($this, 'attachment_fields_to_edit'),
            10,
            2
        );
        // add custom sorter column to media library
        add_filter( 'manage_media_columns', array($this, 'manage_media_columns') );
        add_action(
            'manage_media_custom_column',
            array($this, 'manage_media_custom_column'),
            10,
            2
        );
        add_filter( 'manage_upload_sortable_columns', array($this, 'manage_upload_sortable_columns') );
        // Register ajax action
        add_action( 'wp_ajax_atfit_get_image', array($this, 'ajax_get_image') );
        add_action( 'wp_ajax_atfit_bulk_image', array($this, 'ajax_bulk_image') );
        // Register vars to localize
        add_action( 'admin_enqueue_scripts', array($this, 'localize_vars') );
        // Allow upload ttf fonts to media library
        add_filter( 'upload_mimes', array($this, 'upload_mimes') );
        add_filter(
            'wp_check_filetype_and_ext',
            array($this, 'allow_correct_filetypes'),
            10,
            5
        );
        // Add filter ttf into media library select
        add_filter(
            'post_mime_types',
            array($this, 'add_ttf_mime_types'),
            1,
            1
        );
        // Add custom thumbnail image to media library mime types
        add_filter(
            'wp_prepare_attachment_for_js',
            array($this, 'wp_prepare_attachment_for_js'),
            10,
            3
        );
        // Add metabox to all post types
        add_action( 'add_meta_boxes', array($this, 'add_meta_boxes') );
        $settings = get_option( 'atfit_settings' );
        $post_types = ( isset( $settings['post_types'] ) ? $settings['post_types'] : array('post') );
        foreach ( $post_types as $post_type ) {
            add_action(
                'save_post_' . $post_type,
                array($this, 'save_metabox_data'),
                10,
                3
            );
        }
        add_action(
            'edit_attachment',
            array($this, 'save_attachment_fields'),
            10,
            1
        );
    }

    public function set_default_settings() {
        $current_settings = get_option( 'atfit_settings', array() );
        if ( empty( $current_settings ) ) {
            $settings = $this->get_default_settings();
            update_option( 'atfit_settings', $settings );
        }
    }

    public function restrict_manage_posts() {
        global $typenow;
        if ( $typenow === 'attachment' ) {
            $atfit_source = ( isset( $_GET['atfit_source'] ) ? sanitize_text_field( $_GET['atfit_source'] ) : '' );
            $sources = array(
                'unsplash'     => esc_html__( 'Unsplash', 'auto-featured-image-auto-generated' ),
                'pexels'       => esc_html__( 'Pexels', 'auto-featured-image-auto-generated' ),
                'pixabay'      => esc_html__( 'Pixabay', 'auto-featured-image-auto-generated' ),
                'youtube'      => esc_html__( 'Youtube', 'auto-featured-image-auto-generated' ),
                'dall-e'       => esc_html__( 'Dall-E', 'auto-featured-image-auto-generated' ),
                'imagick'      => esc_html__( 'Imagick', 'auto-featured-image-auto-generated' ),
                'solid'        => esc_html__( 'Solid Color', 'auto-featured-image-auto-generated' ),
                'all'          => esc_html__( 'All With Source', 'auto-featured-image-auto-generated' ),
                'custom_solid' => esc_html__( 'Custom Solid Color', 'auto-featured-image-auto-generated' ),
                'getimg.ai'    => esc_html__( 'Stable Diffusion (getimg.ai)', 'auto-featured-image-auto-generated' ),
                'stability.ai' => esc_html__( 'Stable Diffusion (stability.ai)', 'auto-featured-image-auto-generated' ),
            );
            echo '<select name="atfit_source">';
            echo '<option value="">' . esc_html__( 'All', 'auto-featured-image-auto-generated' ) . '</option>';
            foreach ( $sources as $key => $value ) {
                echo '<option value="' . esc_html( $key ) . '" ' . selected( $atfit_source, $key, false ) . '>' . esc_html( $value ) . '</option>';
            }
            // Layers
            echo '<option value="atfit_use_as_layer" ' . selected( $atfit_source, 'atfit_use_as_layer', false ) . '>' . esc_html__( 'All Layers', 'auto-featured-image-auto-generated' ) . '</option>';
            echo '<option value="atfit_use_as_layer_back" ' . selected( $atfit_source, 'atfit_use_as_layer_back', false ) . '>' . esc_html__( 'Layer (Back)', 'auto-featured-image-auto-generated' ) . '</option>';
            echo '<option value="atfit_use_as_layer_front" ' . selected( $atfit_source, 'atfit_use_as_layer_front', false ) . '>' . esc_html__( 'Layer (Front)', 'auto-featured-image-auto-generated' ) . '</option>';
            echo '</select>';
        }
    }

    public function parse_query( $query ) {
        global $pagenow;
        $qv =& $query->query_vars;
        if ( $pagenow === 'upload.php' ) {
            if ( isset( $_GET['atfit_source'] ) && $_GET['atfit_source'] !== '' ) {
                if ( sanitize_text_field( $_GET['atfit_source'] ) === 'all' ) {
                    $qv['meta_query'][] = array(
                        'key'     => 'atfit_source',
                        'compare' => 'EXISTS',
                    );
                    return;
                } else {
                    // Layers
                    if ( sanitize_text_field( $_GET['atfit_source'] ) === 'atfit_use_as_layer_back' ) {
                        $qv['meta_query'][] = array(
                            'key'     => 'atfit_use_as_layer_back',
                            'compare' => 'EXISTS',
                        );
                    } elseif ( sanitize_text_field( $_GET['atfit_source'] ) === 'atfit_use_as_layer_front' ) {
                        $qv['meta_query'][] = array(
                            'key'     => 'atfit_use_as_layer_front',
                            'compare' => 'EXISTS',
                        );
                    } elseif ( sanitize_text_field( $_GET['atfit_source'] ) === 'atfit_use_as_layer' ) {
                        $qv['meta_query'][] = array(
                            'relation' => 'OR',
                            array(
                                'key'     => 'atfit_use_as_layer_back',
                                'compare' => 'EXISTS',
                            ),
                            array(
                                'key'     => 'atfit_use_as_layer_front',
                                'compare' => 'EXISTS',
                            ),
                        );
                    } else {
                        $qv['meta_query'][] = array(
                            'key'     => 'atfit_source',
                            'value'   => sanitize_text_field( $_GET['atfit_source'] ),
                            'compare' => '=',
                        );
                    }
                }
            }
        }
    }

    public function manage_media_columns( $columns ) {
        $columns['atfit_source'] = esc_html__( 'Source', 'auto-featured-image-auto-generated' );
        $columns['atfit_custom_id'] = esc_html__( 'Custom ID', 'auto-featured-image-auto-generated' );
        return $columns;
    }

    public function manage_media_custom_column( $column_name, $post_id ) {
        if ( $column_name == 'atfit_source' ) {
            $atfit_source = get_post_meta( $post_id, 'atfit_source', true );
            if ( $atfit_source ) {
                echo "<img \n                src='" . ATFIT_PLUGIN_URL . "admin/assets/images/" . mb_strtolower( esc_html( $atfit_source ) ) . ".png' height='14' alt='" . esc_html( $atfit_source ) . "' />";
            }
        }
        if ( $column_name == 'atfit_custom_id' ) {
            $atfit_custom_id = get_post_meta( $post_id, 'atfit_custom_id', true );
            echo esc_html( $atfit_custom_id );
        }
    }

    public function manage_upload_sortable_columns( $columns ) {
        $columns['atfit_source'] = 'atfit_source';
        return $columns;
    }

    public function attachment_fields_to_edit( $form_fields, $post ) {
        $atfit_source = get_post_meta( $post->ID, 'atfit_source', true );
        $atfit_custom_id = get_post_meta( $post->ID, 'atfit_custom_id', true );
        $atfit_prompt = get_post_meta( $post->ID, 'atfit_prompt', true );
        if ( $atfit_custom_id ) {
            $form_fields['atfit_source'] = array(
                'label' => esc_html__( 'Source', 'auto-featured-image-auto-generated' ),
                'input' => 'html',
                'html'  => "<img src='" . ATFIT_PLUGIN_URL . "admin/assets/images/" . mb_strtolower( esc_html( $atfit_source ) ) . ".png' height='20'  />",
            );
            $form_fields['atfit_custom_id'] = array(
                'label' => esc_html__( 'Custom ID', 'auto-featured-image-auto-generated' ),
                'input' => 'html',
                'html'  => esc_html( $atfit_custom_id ),
                'value' => $atfit_custom_id,
            );
            if ( $atfit_prompt ) {
                $form_fields['atfit_prompt'] = array(
                    'label' => esc_html__( 'Prompt', 'auto-featured-image-auto-generated' ),
                    'input' => 'html',
                    'html'  => esc_html( $atfit_prompt ),
                    'value' => $atfit_prompt,
                );
            }
        }
        return $form_fields;
    }

    public function save_attachment_fields( $post_id ) {
        if ( isset( $_REQUEST['attachments'][$post_id]['atfit_use_as_layer_back'] ) ) {
            update_post_meta( $post_id, 'atfit_use_as_layer_back', absint( sanitize_text_field( $_REQUEST['attachments'][$post_id]['atfit_use_as_layer_back'] ) ) );
        } else {
            delete_post_meta( $post_id, 'atfit_use_as_layer_back' );
        }
        if ( isset( $_REQUEST['attachments'][$post_id]['atfit_use_as_layer_front'] ) ) {
            update_post_meta( $post_id, 'atfit_use_as_layer_front', absint( sanitize_text_field( $_REQUEST['attachments'][$post_id]['atfit_use_as_layer_front'] ) ) );
        } else {
            delete_post_meta( $post_id, 'atfit_use_as_layer_front' );
        }
    }

    public function add_meta_boxes() {
        $settings = get_option( 'atfit_settings' );
        $post_types = ( isset( $settings['post_types'] ) ? $settings['post_types'] : array('post') );
        foreach ( $post_types as $post_type ) {
            // add_meta_box('atfit_metabox', esc_html__('Auto Featured Image', 'auto-featured-image-auto-generated'), array($this, 'metabox'), $post_type, 'side', 'high');
            // add_meta_box to featured image
            add_meta_box(
                'atfit_metabox',
                esc_html__( 'Auto Featured Image', 'auto-featured-image-auto-generated' ),
                array($this, 'metabox'),
                $post_type,
                'side',
                'high'
            );
        }
    }

    public function metabox( $post ) {
        $settings = get_option( 'atfit_settings' );
        $post_types = $settings['post_types'];
        $post_type = $post->post_type;
        if ( in_array( $post_type, $post_types ) ) {
            // Add checkbox to metabox to disable title to featured image
            $checked = get_post_meta( $post->ID, 'atfit_disable', true );
            $checked = ( $checked ? 'checked' : '' );
            ?>
            <p class="description"><?php 
            esc_html( 'Disable auto featured image for this post', 'auto-featured-image-auto-generated' );
            ?></p>
            <label><input type="checkbox" name="atfit_disable" value="1" <?php 
            echo $checked;
            ?> /> <?php 
            echo esc_html__( 'Disabled', 'auto-featured-image-auto-generated' );
            ?></label>
<?php 
        }
    }

    public function save_metabox_data( $post_id ) {
        if ( isset( $_POST['atfit_disable'] ) ) {
            update_post_meta( $post_id, 'atfit_disable', absint( sanitize_text_field( $_POST['atfit_disable'] ) ) );
        } else {
            delete_post_meta( $post_id, 'atfit_disable' );
        }
    }

    public function enqueue_scripts() {
        $screen = get_current_screen();
        if ( $this->is_setting_page() ) {
            // add main.js
            $version = ATFIT_PLUGIN_VERSION;
            if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
                $version = time();
            }
            wp_enqueue_script(
                'atfit-js',
                ATFIT_PLUGIN_URL . 'admin/assets/js/main.js',
                array('jquery', 'jquery-ui-tabs'),
                $version,
                false
            );
        }
    }

    public function enqueue_styles() {
        $screen = get_current_screen();
        if ( $this->is_setting_page() ) {
            // add main.css
            $version = ATFIT_PLUGIN_VERSION;
            if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
                $version = time();
            }
            wp_enqueue_style(
                'atfit-css',
                ATFIT_PLUGIN_URL . 'admin/assets/css/main.css',
                array(),
                $version
            );
        }
    }

    public function is_setting_page() {
        $screen = get_current_screen();
        if ( $screen->id === 'settings_page_' . ATFIT_PLUGIN_SLUG || $screen->id === 'toplevel_page_' . ATFIT_PLUGIN_SLUG ) {
            return true;
        }
        return false;
    }

    public function add_ttf_mime_types( $post_mime_types ) {
        $post_mime_types['font/ttf'] = array(esc_html__( 'TTF Fonts', 'auto-featured-image-auto-generated' ), esc_html__( 'Manage TTF Fonts', 'auto-featured-image-auto-generated' ), _n_noop( 'TTF Font <span class="count">(%s)</span>', 'TTF Fonts <span class="count">(%s)</span>' ));
        return $post_mime_types;
    }

    public function upload_mimes( $mimes ) {
        $mimes['ttf'] = 'font/ttf';
        return $mimes;
    }

    public function wp_prepare_attachment_for_js( $response, $attachment, $meta ) {
        if ( $response['mime'] == 'font/ttf' ) {
            $response['image'] = array(
                'src'    => ATFIT_PLUGIN_URL . 'admin/assets/images/ttf.png',
                'width'  => 100,
                'height' => 100,
            );
            $response['sizes'] = array(
                'full' => array(
                    'url'         => ATFIT_PLUGIN_URL . 'admin/assets/images/ttf.png',
                    'width'       => 150,
                    'height'      => 150,
                    'orientation' => 'landscape',
                ),
            );
            $title = $response['title'];
            $title = str_replace( '.ttf', '', $title );
            $title = str_replace( '-', ' ', $title );
            // Add white space CamelCase
            $title = preg_replace( '/(?<!\\ )[A-Z]/', ' $0', $title );
            $response['title'] = $title;
        }
        return $response;
    }

    public function allow_correct_filetypes(
        $data,
        $file,
        $filename,
        $mimes,
        $real_mime
    ) {
        if ( !empty( $data['ext'] ) && !empty( $data['type'] ) ) {
            return $data;
        }
        $wp_file_type = wp_check_filetype( $filename, $mimes );
        // Check for the file type you want to enable, e.g. 'svg'.
        if ( 'ttf' === $wp_file_type['ext'] ) {
            $data['ext'] = 'ttf';
            $data['type'] = 'font/ttf';
        }
        return $data;
    }

    public function add_menu() {
        add_menu_page(
            esc_html__( 'Auto Featured Image', 'auto-featured-image-auto-generated' ),
            esc_html__( 'Auto Featured Image', 'auto-featured-image-auto-generated' ),
            'manage_options',
            ATFIT_PLUGIN_SLUG,
            array($this, 'settings_page'),
            'dashicons-format-image',
            81
        );
        add_submenu_page(
            ATFIT_PLUGIN_SLUG,
            esc_html__( 'Settings', 'auto-featured-image-auto-generated' ),
            esc_html__( 'Settings', 'auto-featured-image-auto-generated' ),
            'manage_options',
            ATFIT_PLUGIN_SLUG,
            array($this, 'settings_page')
        );
    }

    public function settings_page() {
        $settings = $this->get_settings();
        // get all fonts from media library
        $fonts_family_availables = $this->image->get_fonts();
        $post_types = get_post_types( array(
            'public' => true,
        ), 'objects' );
        // Remore Media from post types
        unset($post_types['attachment']);
        // Count all images into media library
        $args = array(
            'post_type'      => 'attachment',
            'post_status'    => 'inherit',
            'posts_per_page' => -1,
            'post_mime_type' => 'image',
            'meta_query'     => array(array(
                'key'     => 'atfit_source',
                'compare' => 'EXISTS',
            )),
        );
        $images_generated = new WP_Query($args);
        // Get all images as layer
        $args = array(
            'post_type'      => 'attachment',
            'post_status'    => 'inherit',
            'posts_per_page' => -1,
            'post_mime_type' => 'image',
            'meta_query'     => array(
                'relation' => 'OR',
                array(
                    'key'     => 'atfit_use_as_layer_back',
                    'compare' => 'EXISTS',
                ),
                array(
                    'key'     => 'atfit_use_as_layer_front',
                    'compare' => 'EXISTS',
                ),
            ),
        );
        $images_as_layer = new WP_Query($args);
        // Get all post status registered
        $posts_statuses = get_post_statuses();
        // Detect GD library
        $system['gdlibrary'] = ( extension_loaded( 'gd' ) && function_exists( 'gd_info' ) ? true : false );
        // detect if shell_exec is enabled
        $system['exec'] = ( function_exists( 'exec' ) ? true : false );
        // detetect if ffmpeg is installed
        if ( $system['exec'] ) {
            $system['ffmpeg'] = ( exec( 'ffmpeg -version' ) ? true : false );
        } else {
            $system['ffmpeg'] = false;
        }
        $system['file_get_contents'] = ( function_exists( 'file_get_contents' ) ? true : false );
        $system['multibyte_string'] = ( function_exists( 'mb_strtolower' ) ? true : false );
        //  $system['pixabay'] =    $settings['pixabay_apikey'] ?  $this->image->get_from_pixabay('test', $settings, true) : null;
        $system['unsplash'] = false;
        // TODO: Validar apikey
        $system['media-library'] = $images_generated->found_posts;
        $system['layer-images'] = $images_as_layer->found_posts;
        $system['imagick'] = ( class_exists( 'Imagick' ) ? true : false );
        $atfit_images_generated = $system['media-library'];
        // Get all post whitout featured image
        $args = array(
            'post_type'      => $settings['post_types'],
            'post_status'    => $settings['post_status'],
            'posts_per_page' => 50,
            'orderby'        => 'ID',
            'order'          => 'DESC',
            'meta_query'     => array(array(
                'key'     => '_thumbnail_id',
                'compare' => 'NOT EXISTS',
            )),
        );
        $post_with_tags = $settings['post_with_tags'];
        if ( $post_with_tags && is_array( $post_with_tags ) ) {
            $args['tag__in'] = $post_with_tags;
        }
        $post_from_categories = $settings['post_from_categories'];
        if ( $post_from_categories && is_array( $post_from_categories ) ) {
            $args['category__in'] = $post_from_categories;
        }
        $posts = new WP_Query($args);
        $background_source_availables = array(
            'local'            => array(
                'name'    => esc_html__( 'Local (From Media Library)', 'auto-featured-image-auto-generated' ),
                'premium' => false,
            ),
            'happi.dev:flux'   => array(
                'name'    => esc_html__( 'Happi.dev (FLUX.1 Schnell)', 'auto-featured-image-auto-generated' ),
                'premium' => false,
            ),
            'unsplash'         => array(
                'name'    => esc_html__( '[PRO] - Unsplash', 'auto-featured-image-auto-generated' ),
                'premium' => true,
            ),
            'pixabay'          => array(
                'name'    => esc_html__( '[PRO] - Pixabay', 'auto-featured-image-auto-generated' ),
                'premium' => true,
            ),
            'pexels'           => array(
                'name'    => esc_html__( '[PRO] - Pexels', 'auto-featured-image-auto-generated' ),
                'premium' => true,
            ),
            'dall-e'           => array(
                'name'    => esc_html__( '[PRO] - Dall-E (AI)', 'auto-featured-image-auto-generated' ),
                'premium' => true,
            ),
            'getimg.ai'        => array(
                'name'    => esc_html__( '[PRO] - Stable Diffusion (Getimg.ai)', 'auto-featured-image-auto-generated' ),
                'premium' => true,
            ),
            'stability.ai'     => array(
                'name'    => esc_html__( '[PRO] - Stable Diffusion (stability.ai)', 'auto-featured-image-auto-generated' ),
                'premium' => true,
            ),
            'imagick:gradient' => array(
                'name'    => esc_html__( 'Random Gradient (Imagick)', 'auto-featured-image-auto-generated' ),
                'premium' => false,
            ),
            'imagick:plasma'   => array(
                'name'    => esc_html__( 'Random Plasma (Imagick)', 'auto-featured-image-auto-generated' ),
                'premium' => false,
            ),
            'solid'            => array(
                'name'    => esc_html__( 'Random Solid Color', 'auto-featured-image-auto-generated' ),
                'premium' => false,
            ),
            'custom_solid'     => array(
                'name'    => esc_html__( 'Custom Solid Color', 'auto-featured-image-auto-generated' ),
                'premium' => false,
            ),
            'automatic1111'    => array(
                'name'    => esc_html__( '[PRO] - AUTOMATIC1111 (Stable Diffusion)', 'auto-featured-image-auto-generated' ),
                'premium' => true,
            ),
        );
        // Get all tags availables from post type selected
        $tags = array();
        foreach ( $settings['post_types'] as $post_type ) {
            $tags = array_merge( $tags, get_terms( array(
                'taxonomy'   => 'post_tag',
                'hide_empty' => false,
            ) ) );
        }
        $tags = array_unique( $tags, SORT_REGULAR );
        // get all categories availables from post type selected
        $categories = array();
        foreach ( $settings['post_types'] as $post_type ) {
            // Get taxonomies from post type
            $taxonomies = get_object_taxonomies( $post_type, 'objects' );
            // echo '<pre>';
            // print_r($taxonomies);
            // echo '</pre>';
            foreach ( $taxonomies as $taxonomy ) {
                $categories = array_merge( $categories, get_terms( array(
                    'taxonomy'   => $taxonomy->name,
                    'hide_empty' => false,
                ) ) );
            }
        }
        // IF PARENT GET NAME PARENT
        foreach ( $categories as $key => $category ) {
            if ( $category->parent ) {
                $parent = get_term( $category->parent );
                $categories[$key]->name = $parent->name . ' → ' . $category->name;
            }
            $categories[$key]->name = $category->name . ' (' . $category->count . ')';
        }
        include ATFIT_PLUGIN_DIR . 'admin/views/settings.php';
    }

    public function wp_get( $url ) {
        $response = wp_remote_get( $url );
        if ( !is_wp_error( $response ) && $response['response']['code'] == 200 ) {
            $body = wp_remote_retrieve_body( $response );
            return json_decode( $body, true );
        }
        return false;
    }

    public function get_default_settings() {
        $default = array(
            'font_size'                          => 3,
            'font_color'                         => '#ffffff',
            'font_family'                        => 'arial-bold',
            'text_transform'                     => 'none',
            'background_color'                   => '#000000',
            'highlight_color'                    => '#F8DC25',
            'text_align'                         => 'center',
            'highlight_opacity'                  => 0,
            'background_opacity'                 => 50,
            'on_uninstall'                       => 'keep',
            'text_position'                      => 'center',
            'background_source'                  => array('solid'),
            'background_source_query'            => 'title',
            'background_source_custom_query'     => '',
            'pixabay_apikey'                     => '',
            'unsplash_apikey'                    => '',
            'pexels_apikey'                      => '',
            'post_types'                         => array('post'),
            'post_status'                        => array(
                'publish',
                'pending',
                'draft',
                'future',
                'private'
            ),
            'prefix_text'                        => '',
            'suffix_text'                        => '',
            'print'                              => 'title',
            'dalle_apikey'                       => '',
            'getimgai_apikey'                    => '',
            'stabilityai_apikey'                 => '',
            'dalle_prompt'                       => 'A photo of a %query%',
            'use_youtube_background'             => false,
            'unique_image'                       => false,
            'flip_image'                         => false,
            'slug_as_filename'                   => false,
            'title_connector'                    => ' - ',
            'reuse_local_image'                  => false,
            'post_with_tags'                     => array(),
            'post_from_categories'               => array(),
            'image_size_width'                   => 1024,
            'image_size_height'                  => 1024,
            'custom_solid_color'                 => array('#ff0000', '#F8DC25', '#0000ff'),
            'text_offset_top'                    => 0,
            'text_offset_left'                   => 0,
            'enable_layers'                      => false,
            'enable_automatic_stable_diffusion'  => false,
            'automatic_stable_diffusion_url'     => '',
            'automatic_stable_diffusion_model'   => '',
            'automatic_stable_diffusion_vae'     => '',
            'automatic_stable_diffusion_style'   => '',
            'automatic_stable_diffusion_steps'   => 30,
            'automatic_stable_diffusion_sampler' => '',
            'max_length'                         => 100,
            'happi_key'                          => '',
        );
        return $default;
    }

    public function get_settings() {
        $settings = get_option( 'atfit_settings', array() );
        $defaults = $this->get_default_settings();
        return wp_parse_args( $settings, $defaults );
    }

    public function sanitize_post() {
        return $this->sanitize_settings( ( isset( $_POST['atfit_settings'] ) ? $_POST['atfit_settings'] : array() ) );
    }

    public function sanitize_settings( $DATA ) {
        $DATA['background_source_query'] = 'title';
        $DATA['text_align'] = 'center';
        $DATA['post_types'] = array('post');
        $DATA['suffix_text'] = '';
        $DATA['prefix_text'] = '';
        $DATA['pixabay_apikey'] = '';
        $DATA['unsplash_apikey'] = '';
        $DATA['pexels_apikey'] = '';
        $DATA['getimgai_apikey'] = '';
        $DATA['stabilityai_apikey'] = '';
        $DATA['title_connector'] = '';
        $DATA['enable_layers'] = false;
        $DATA['enable_automatic_stable_diffusion'] = false;
        $DATA['automatic_stable_diffusion_url'] = '';
        $DATA['automatic_stable_diffusion_model'] = '';
        $DATA['automatic_stable_diffusion_vae'] = '';
        $DATA['automatic_stable_diffusion_style'] = '';
        $DATA['automatic_stable_diffusion_steps'] = 30;
        $DATA['automatic_stable_diffusion_sampler'] = '';
        if ( !is_array( $DATA['background_source'] ) && $DATA['background_source'] ) {
            $DATA['background_source'] = array($DATA['background_source']);
        }
        if ( isset( $DATA['post_types'] ) ) {
            if ( !is_array( $DATA['post_types'] ) && $DATA['post_types'] ) {
                $DATA['post_types'] = array($DATA['post_types']);
            }
        } else {
            $DATA['post_types'] = array();
        }
        if ( !is_array( $DATA['post_status'] ) && $DATA['post_status'] ) {
            $DATA['post_status'] = array($DATA['post_status']);
        }
        $settings = array(
            'font_size'                          => abs( $DATA['font_size'] ),
            'font_color'                         => sanitize_hex_color( $DATA['font_color'] ),
            'font_family'                        => sanitize_text_field( $DATA['font_family'] ),
            'text_transform'                     => sanitize_text_field( $DATA['text_transform'] ),
            'background_color'                   => sanitize_hex_color( $DATA['background_color'] ),
            'background_opacity'                 => absint( $DATA['background_opacity'] ),
            'text_position'                      => sanitize_text_field( $DATA['text_position'] ),
            'text_align'                         => sanitize_text_field( $DATA['text_align'] ),
            'background_source'                  => array_map( 'sanitize_text_field', ( isset( $DATA['background_source'] ) ? $DATA['background_source'] : array() ) ),
            'background_source_query'            => sanitize_text_field( $DATA['background_source_query'] ),
            'background_source_custom_query'     => sanitize_text_field( $DATA['background_source_custom_query'] ),
            'pixabay_apikey'                     => sanitize_text_field( $DATA['pixabay_apikey'] ),
            'unsplash_apikey'                    => sanitize_text_field( $DATA['unsplash_apikey'] ),
            'pexels_apikey'                      => sanitize_text_field( $DATA['pexels_apikey'] ),
            'post_types'                         => array_map( 'sanitize_text_field', ( isset( $DATA['post_types'] ) ? $DATA['post_types'] : array() ) ),
            'prefix_text'                        => sanitize_text_field( $DATA['prefix_text'] ),
            'suffix_text'                        => sanitize_text_field( $DATA['suffix_text'] ),
            'post_status'                        => array_map( 'sanitize_text_field', ( isset( $DATA['post_status'] ) ? $DATA['post_status'] : array() ) ),
            'on_uninstall'                       => sanitize_text_field( $DATA['on_uninstall'] ),
            'highlight_color'                    => sanitize_hex_color( $DATA['highlight_color'] ),
            'highlight_opacity'                  => absint( $DATA['highlight_opacity'] ),
            'print'                              => sanitize_text_field( $DATA['print'] ),
            'dalle_apikey'                       => sanitize_text_field( $DATA['dalle_apikey'] ),
            'getimgai_apikey'                    => sanitize_text_field( $DATA['getimgai_apikey'] ),
            'stabilityai_apikey'                 => sanitize_text_field( $DATA['stabilityai_apikey'] ),
            'dalle_prompt'                       => sanitize_text_field( $DATA['dalle_prompt'] ),
            'title_connector'                    => sanitize_text_field( $DATA['title_connector'] ),
            'use_youtube_background'             => ( isset( $DATA['use_youtube_background'] ) ? true : false ),
            'unique_image'                       => ( isset( $DATA['unique_image'] ) ? true : false ),
            'flip_image'                         => ( isset( $DATA['flip_image'] ) ? true : false ),
            'slug_as_filename'                   => ( isset( $DATA['slug_as_filename'] ) ? true : false ),
            'reuse_local_image'                  => ( isset( $DATA['reuse_local_image'] ) ? true : false ),
            'post_with_tags'                     => array_map( 'absint', ( isset( $DATA['post_with_tags'] ) ? $DATA['post_with_tags'] : array() ) ),
            'post_from_categories'               => array_map( 'absint', ( isset( $DATA['post_from_categories'] ) ? $DATA['post_from_categories'] : array() ) ),
            'image_size_width'                   => absint( $DATA['image_size_width'] ),
            'image_size_height'                  => absint( $DATA['image_size_height'] ),
            'custom_solid_color'                 => array_map( 'sanitize_hex_color', ( isset( $DATA['custom_solid_color'] ) ? $DATA['custom_solid_color'] : array() ) ),
            'text_offset_top'                    => absint( $DATA['text_offset_top'] ),
            'text_offset_left'                   => absint( $DATA['text_offset_left'] ),
            'enable_layers'                      => ( isset( $DATA['enable_layers'] ) ? true : false ),
            'enable_automatic_stable_diffusion'  => ( isset( $DATA['enable_automatic_stable_diffusion'] ) ? true : false ),
            'automatic_stable_diffusion_url'     => ( isset( $DATA['automatic_stable_diffusion_url'] ) ? sanitize_text_field( $DATA['automatic_stable_diffusion_url'] ) : '' ),
            'automatic_stable_diffusion_model'   => ( isset( $DATA['automatic_stable_diffusion_model'] ) ? sanitize_text_field( $DATA['automatic_stable_diffusion_model'] ) : '' ),
            'automatic_stable_diffusion_vae'     => ( isset( $DATA['automatic_stable_diffusion_vae'] ) ? sanitize_text_field( $DATA['automatic_stable_diffusion_vae'] ) : '' ),
            'automatic_stable_diffusion_style'   => ( isset( $DATA['automatic_stable_diffusion_style'] ) ? sanitize_text_field( $DATA['automatic_stable_diffusion_style'] ) : '' ),
            'automatic_stable_diffusion_steps'   => ( isset( $DATA['automatic_stable_diffusion_steps'] ) ? absint( $DATA['automatic_stable_diffusion_steps'] ) : 30 ),
            'automatic_stable_diffusion_sampler' => ( isset( $DATA['automatic_stable_diffusion_sampler'] ) ? sanitize_text_field( $DATA['automatic_stable_diffusion_sampler'] ) : '' ),
            'max_length'                         => ( isset( $DATA['max_length'] ) ? absint( $DATA['max_length'] ) : 100 ),
            'happi_key'                          => ( isset( $DATA['happi_key'] ) ? sanitize_text_field( $DATA['happi_key'] ) : '' ),
        );
        return $settings;
    }

    public function ajax_bulk_image() {
        // Validate the nonce
        if ( !wp_verify_nonce( $_POST['nonce'], 'atfit' ) ) {
            die( 'Permission denied' );
        }
        // User can
        if ( !current_user_can( 'edit_posts' ) ) {
            die( 'Permission denied' );
        }
        $settings = get_option( 'atfit_settings' );
        $args = array(
            'post_type'      => $settings['post_types'],
            'post_status'    => $settings['post_status'],
            'posts_per_page' => 1,
            'orderby'        => 'ID',
            'order'          => 'DESC',
            'meta_query'     => array(array(
                'key'     => '_thumbnail_id',
                'compare' => 'NOT EXISTS',
            )),
        );
        $posts = new WP_Query($args);
        $post = null;
        if ( $posts->posts ) {
            $post = $posts->posts[0];
        }
        if ( !$post ) {
            return wp_send_json_success( array(
                'success' => false,
                'message' => esc_html__( 'No post found', 'auto-featured-image-auto-generated' ),
            ) );
        }
        $query = $this->image->get_query( $post, $settings );
        $image = $this->image->get_from_source( $query, $settings, $post );
        if ( !$image ) {
            return wp_send_json_success( array(
                'success' => false,
                'post'    => $post,
            ) );
        }
        $attachment_id = $this->image->generate(
            $post,
            $image,
            $settings,
            true
        );
        if ( !$attachment_id ) {
            return wp_send_json_success( array(
                'success' => false,
                'post'    => $post,
            ) );
        }
        set_post_thumbnail( $post->ID, $attachment_id );
        // set post_parent to attachment
        $attachment = array(
            'ID'          => $attachment_id,
            'post_parent' => $post->ID,
            'url'         => wp_get_attachment_url( $attachment_id ),
        );
        wp_update_post( $attachment );
        wp_send_json_success( array(
            'success'    => true,
            'post'       => $post,
            'attachment' => $attachment,
        ) );
    }

    public function ajax_get_image() {
        // $settings = $this->get_settings();
        $post_id = absint( $_POST['post_id'] );
        $settings = $this->sanitize_settings( $_POST['settings'] );
        $post = get_post( $post_id );
        $query = $this->image->get_query( $post, $settings );
        $attachment = $this->image->get_from_source( $query, $settings, $post );
        if ( !$attachment || isset( $attachment['error'] ) ) {
            $errorMessage = ( isset( $attachment['error'] ) ? $attachment['error'] : esc_html__( 'No image found', 'auto-featured-image-auto-generated' ) );
            return wp_send_json_error( array(
                'message'           => $errorMessage,
                'query'             => $query,
                'prompt'            => str_replace( '%query%', $query, $settings['dalle_prompt'] ),
                'background_source' => $settings['background_source'],
            ) );
        }
        try {
            $image = $this->image->generate( $post, $attachment, $settings );
        } catch ( Exception $e ) {
            return wp_send_json_error( array(
                'message'           => $e->getMessage(),
                'query'             => $query,
                'prompt'            => str_replace( '%query%', $query, $settings['dalle_prompt'] ),
                'background_source' => $settings['background_source'],
            ) );
        }
        // delete attachment from media library if reuse_local_image is false
        if ( !$settings['reuse_local_image'] ) {
            wp_delete_attachment( $attachment['id'], true );
        }
        wp_send_json_success( array(
            'query'                   => $query,
            'background_source'       => implode( ',', $settings['background_source'] ),
            'background_source_query' => esc_html( $settings['background_source_query'] ),
            'prompt'                  => str_replace( '%query%', $query, $settings['dalle_prompt'] ),
            'image'                   => $image,
        ) );
    }

    public function localize_vars() {
        if ( !is_admin() ) {
            return;
        }
        wp_localize_script( 'atfit-js', 'atfit_data', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce'    => wp_create_nonce( 'atfit' ),
        ) );
    }

}
