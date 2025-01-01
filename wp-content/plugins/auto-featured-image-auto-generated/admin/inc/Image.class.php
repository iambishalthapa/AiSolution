<?php

class ATFIT_Image {
    private static $_instance = null;

    public $areaheight = null;

    public $position_y = 0;

    public $addons = array();

    public $gradients_seeds = array();

    public static function instance() {
        if ( null === self::$_instance ) {
            self::$_instance = new self();
            self::$_instance->load_gradients();
        }
        return self::$_instance;
    }

    public function load_gradients() {
        // load data/gradient.json file from folder plugin
        $gradients_seeds = file_get_contents( ATFIT_PLUGIN_DIR . 'admin/inc/data/gradient.json' );
        $gradients_seeds = json_decode( $gradients_seeds, true );
        $gradients_seeds = array_map( function ( $item ) {
            return $item['colors'];
        }, $gradients_seeds );
        $this->gradients_seeds = $gradients_seeds;
    }

    public function get_text( $post, $settings ) {
        $post_id = $post->ID;
        $text = '';
        if ( $settings['print'] === 'title' ) {
            $text = $post->post_title;
        } elseif ( $settings['print'] === 'category' ) {
            $categories = get_the_category( $post_id );
            if ( $categories ) {
                $text = $categories[0]->name;
            }
        } elseif ( $settings['print'] === 'excerpt' ) {
            $text = $post->post_excerpt;
            $text = strip_tags( $text );
            // remove new lines
            $text = preg_replace( '/\\s+/', ' ', $text );
            // remove new lines and tabs
            if ( !$text ) {
                $text = strip_tags( $post->post_content );
                if ( function_exists( 'mb_substr' ) ) {
                    $text = mb_substr( $text, 0, 150 ) . '...';
                } else {
                    $text = substr( $text, 0, 150 ) . '...';
                }
            }
            // remove new lines
            $text = preg_replace( '/\\s+/', ' ', $text );
            // remove new lines and tabs
        } elseif ( $settings['print'] === 'title_and_excerpt' ) {
            if ( !$post->post_excerpt ) {
                $post->post_excerpt = strip_tags( $post->post_content );
                if ( function_exists( 'mb_substr' ) ) {
                    $post->post_excerpt = mb_substr( $post->post_excerpt, 0, 150 ) . '...';
                } else {
                    $post->post_excerpt = substr( $post->post_excerpt, 0, 150 ) . '...';
                }
            }
            $text = $post->post_title . $settings['title_connector'] . $post->post_excerpt;
            $text = preg_replace( '/\\s+/', ' ', $text );
        }
        $text = $settings['prefix_text'] . $text;
        $text = $text . $settings['suffix_text'];
        if ( $settings['text_transform'] == 'uppercase' ) {
            $text = strtoupper( $text );
        } elseif ( $settings['text_transform'] == 'lowercase' ) {
            $text = strtolower( $text );
        } elseif ( $settings['text_transform'] == 'capitalize' ) {
            $text = ucwords( $text );
        }
        return $text;
    }

    public function get_query( $post, $settings ) {
        $query = $post->post_title;
        $post_id = $post->ID;
        // From primary category
        if ( $settings['background_source_query'] == 'category' ) {
            $categories = get_the_category( $post_id );
            if ( $categories ) {
                $query = $categories[0]->name;
            }
        }
        // From first tag
        if ( $settings['background_source_query'] == 'tag' ) {
            $tags = get_the_tags( $post_id );
            if ( $tags ) {
                $query = $tags[0]->name;
            }
        }
        if ( $settings['background_source_query'] == 'custom' ) {
            $queries = explode( ',', $settings['background_source_custom_query'] );
            $query = $queries[array_rand( $queries )];
            if ( !$query ) {
                $query = $post->post_title;
            }
        }
        if ( $settings['background_source_query'] == 'custom-field' ) {
            $key = $settings['background_source_custom_query'];
            $query = get_post_meta( $post_id, $key, true );
            if ( !$query ) {
                error_log( 'Custom field not found: ' . $key . ' in post: ' . $post_id );
                $query = $key;
            }
        }
        return $query;
    }

    public function generate(
        $post,
        $attachment,
        $settings,
        $add_attachment = false
    ) {
        // If reuse local image is enabled, return the attachment id, without generate a new image
        if ( $settings['reuse_local_image'] ) {
            if ( !$add_attachment ) {
                // return base 64 image using base64_encode
                $path = $attachment['path'];
                $ext = pathinfo( $path, PATHINFO_EXTENSION );
                // read image file from local
                $image = file_get_contents( $path );
                return "data:image/{$ext};base64," . base64_encode( $image );
            }
            return $attachment['id'];
        }
        $this->prepare_layer( $attachment, $settings, 'back' );
        if ( !isset( $attachment['path'] ) ) {
            return null;
        }
        $path = $attachment['path'];
        if ( !$path ) {
            return null;
        }
        if ( !file_exists( $path ) ) {
            return null;
        }
        $attachment_id = $attachment['id'];
        // Read image to GD Library native
        $text = $this->get_text( $post, $settings );
        // $ext = pathinfo($path, PATHINFO_EXTENSION);
        $image_info = getimagesize( $path );
        if ( $image_info['mime'] === 'image/jpeg' ) {
            $ext = 'jpeg';
            $image = imagecreatefromjpeg( $path );
        } else {
            if ( $image_info['mime'] === 'image/png' ) {
                $ext = 'png';
                $image = imagecreatefrompng( $path );
            } else {
                if ( $image_info['mime'] === 'image/gif' ) {
                    $ext = 'gif';
                    $image = imagecreatefromgif( $path );
                } else {
                    $ext = 'jpeg';
                    $image = imagecreatefromjpeg( $path );
                }
            }
        }
        // Flip image
        if ( isset( $settings['flip_image'] ) && $settings['flip_image'] ) {
            $image = $this->flip_image( $image );
        }
        // Get image size
        $image_size = getimagesize( $path );
        // Get image width and height
        $image_width = $image_size[0];
        $image_height = $image_size[1];
        // Load Font
        $font_default = ATFIT_PLUGIN_DIR . 'admin/assets/fonts/arial-bold.ttf';
        $font = ATFIT_PLUGIN_DIR . 'admin/assets/fonts/' . mb_strtolower( $settings['font_family'] ) . '.ttf';
        if ( is_numeric( $settings['font_family'] ) || $settings['font_family'] === 'random' ) {
            $font = $this->get_fonts( $settings['font_family'] );
            if ( $font ) {
                $font = $font['url'];
            }
        }
        if ( !file_exists( $font ) ) {
            $font = $font_default;
        }
        // Get font size
        $font_size = $settings['font_size'];
        // Porcentual value 1-10
        $font_size = $image_width * ($font_size / 100);
        // Get font color
        $font_color = $this->hex2rgb( $settings['font_color'], true );
        // Multi line text
        $original_length = mb_strlen( $text );
        $text = mb_substr( $text, 0, absint( $settings['max_length'] ) );
        if ( $original_length > absint( $settings['max_length'] ) ) {
            $text = $text . '...';
        }
        $textWrappped = $this->textWrap(
            $text,
            $font,
            $font_size,
            $image_width * 0.8
        );
        $line_height = 2;
        $box_color = $this->hex2rgb( $settings['background_color'], true );
        $box_opacity = $settings['background_opacity'];
        // 0-100
        $highlight_opacity = $settings['highlight_opacity'];
        $highlight_color = $this->hex2rgb( $settings['highlight_color'], true );
        $text_position = $settings['text_position'];
        $text_align = ( $settings['text_align'] ? $settings['text_align'] : 'center' );
        if ( $box_opacity > 0 ) {
            $image = $this->drawBox(
                $image,
                0,
                0,
                $image_width,
                $image_height,
                $box_color,
                $box_opacity
            );
        }
        if ( $text_align === 'random' ) {
            $text_align = array('left', 'center', 'right');
            $text_align = $text_align[rand( 0, 2 )];
        }
        if ( $text_position === 'random' ) {
            $text_position = array('top', 'center', 'bottom');
            $text_position = $text_position[rand( 0, 2 )];
        }
        foreach ( $textWrappped as $line => $text ) {
            if ( $text ) {
                $this->drawTextLine(
                    $image,
                    $text,
                    $font,
                    $font_size,
                    $font_color,
                    $image_height,
                    $image_width,
                    $line,
                    count( $textWrappped ),
                    $line_height,
                    $highlight_color,
                    $highlight_opacity,
                    $text_position,
                    $text_align,
                    $settings['text_offset_top'],
                    $settings['text_offset_left']
                );
            }
        }
        // Return base 64 image using base64_encode
        if ( $add_attachment ) {
            // Overwrite image using $attachment_id
            // Save image to media library
            $this->prepare_layer( $image, $settings, 'front' );
            $this->output( $image, $attachment );
            return $attachment_id;
        }
        $image = $this->prepare_layer( $image, $settings, 'front' );
        return "data:image/{$ext};base64," . $this->output( $image );
    }

    public function flip_image( $image ) {
        $image_width = imagesx( $image );
        $image_height = imagesy( $image );
        $temp = imagecreatetruecolor( $image_width, $image_height );
        imagecopyresampled(
            $temp,
            $image,
            0,
            0,
            0,
            0,
            $image_width,
            $image_height,
            $image_width,
            $image_height
        );
        // Flip Mirror effect
        imageflip( $temp, IMG_FLIP_HORIZONTAL );
        return $temp;
    }

    public function get_fonts( $id_attachment = null ) {
        // Query fonts into media library by mime type
        $args = array(
            'post_type'      => 'attachment',
            'post_mime_type' => 'font/ttf',
            'post_status'    => 'inherit',
            'posts_per_page' => -1,
        );
        if ( $id_attachment ) {
            if ( $id_attachment === 'random' ) {
                $args['orderby'] = 'rand';
            } else {
                $args['p'] = $id_attachment;
            }
        }
        $query = new WP_Query($args);
        $fonts = array();
        foreach ( $query->posts as $post ) {
            $post->post_title = str_ireplace( '.ttf', '', $post->post_title );
            $post->post_title = str_ireplace( '-', ' ', $post->post_title );
            // Add white space to CamelCase
            $post->post_title = preg_replace( '/([a-z])([A-Z])/', '$1 $2', $post->post_title );
            $fonts[] = array(
                'id'    => $post->ID,
                'title' => $post->post_title,
                'url'   => get_attached_file( $post->ID ),
            );
        }
        // If count > 1 add random option font
        if ( count( $fonts ) > 1 ) {
            $fonts[] = array(
                'id'    => 'random',
                'title' => __( 'Random Custom Font', 'auto-featured-image-auto-generated' ),
                'url'   => 'random',
            );
        }
        return ( $id_attachment ? $fonts[0] : $fonts );
    }

    public function fetch( $type, $url, $data = array() ) {
        // wp_remote_get
        if ( $type == 'get' ) {
            $response = wp_remote_get( $url );
        }
        // wp_remote_post
        if ( $type == 'post' ) {
            $response = wp_remote_post( $url, $data );
        }
        // wp_remote_request
        if ( $type == 'request' ) {
            $response = wp_remote_request( $url, $data );
        }
        // wp_remote_retrieve_body
        $body = wp_remote_retrieve_body( $response );
        // wp_remote_retrieve_response_code
        $code = wp_remote_retrieve_response_code( $response );
        if ( $code == 200 ) {
            return $body;
        } else {
            return false;
        }
    }

    public function drawTextLine(
        $image,
        $text,
        $font,
        $font_size,
        $font_color,
        $image_height,
        $image_width,
        $line,
        $total_lines,
        $line_height,
        $highlight_color,
        $highlight_opacity,
        $text_position,
        $text_align,
        $text_offset_top = 0,
        $text_offset_left = 0
    ) {
        if ( mb_detect_encoding( $text, 'UTF-8', true ) !== 'UTF-8' ) {
            $text = mb_convert_encoding( $text, 'UTF-8' );
        }
        $padding_y = 5;
        $padding_x = 5;
        $line = $line + 1;
        $textbox = imagettfbbox(
            $font_size,
            0,
            $font,
            $text
        );
        $text_width = $textbox[2] - $textbox[0];
        $text_height = $textbox[1] - $textbox[7];
        // 7 is the top of the text box and 1 is the bottom
        // $x = ($image_width - $text_width) / 2; // Center text
        // $x = $padding_x * 4; // Left Text
        // $x = $image_width - $text_width - $padding_x * 2; // Right Text
        if ( $text_align === 'left' ) {
            $x = $padding_x * 4;
        } else {
            if ( $text_align === 'right' ) {
                $x = $image_width - $text_width - $padding_x * 2;
            } else {
                if ( $text_align === 'center' ) {
                    $x = ($image_width - $text_width) / 2;
                }
            }
        }
        if ( !$this->areaheight ) {
            $this->areaheight = $text_height * $total_lines;
        }
        if ( $line > 1 ) {
            $this->position_y += $text_height + $padding_y * 2 + $line_height;
        }
        if ( $text_position == 'top' ) {
            $y = $this->position_y;
            if ( $line == 1 ) {
                $y = $this->position_y + $text_height + $padding_y * 2;
                $this->position_y = $y;
            }
        } else {
            if ( $text_position == 'bottom' ) {
                $y = $this->position_y + ($image_height - $padding_y * 4 * $total_lines) - $this->areaheight;
            } elseif ( $text_position == 'center' ) {
                $y = $this->position_y + ($image_height - $this->areaheight) / 2;
            }
        }
        $y = $y + $text_offset_top;
        $x = $x + $text_offset_left;
        $highlight = true;
        if ( $highlight ) {
            $factor_y = 2;
            $factor_x = 2;
            $factor_y_font = 0;
            if ( $line > 1 ) {
                //$padding_y = $padding_y / 2;
                $factor_y = 0.1;
                $factor_x = 2;
                $factor_y_font = 0;
            }
            if ( $line == $total_lines && $total_lines > 1 ) {
                // $padding_y = $padding_y * 2;
                $factor_y = 0.1;
                $factor_x = 2;
            }
            if ( $total_lines == 1 ) {
                $factor_y = 2;
                $factor_x = ceil( $font_size / $image_width ) + 2;
                $padding_x = 20;
            }
            $this->drawBox(
                $image,
                $x,
                $y - $text_height - $factor_y_font,
                $text_width,
                $text_height,
                $highlight_color,
                $highlight_opacity,
                $padding_x,
                $padding_y,
                $factor_x,
                $factor_y
            );
        }
        $x = intval( $x );
        $y = intval( $y );
        imagettftext(
            $image,
            $font_size,
            0,
            $x,
            $y,
            imagecolorallocate(
                $image,
                $font_color[0],
                $font_color[1],
                $font_color[2]
            ),
            $font,
            $text
        );
        return $image;
    }

    public function drawBox(
        $image,
        $x,
        $y,
        $width,
        $height,
        $color,
        $opacity = 100,
        $padding_x = 0,
        $padding_y = 0,
        $factor_x = 1,
        $factor_y = 1
    ) {
        if ( $opacity == 0 ) {
            return $image;
        }
        $x = intval( $x );
        $y = intval( $y );
        $opacity = 127 - $opacity * 1.27;
        // 127 is the max value of alpha
        $opacity = intval( $opacity );
        // Max value of alpha is 127
        // Min value of alpha is 0
        if ( $opacity < 0 ) {
            $opacity = 0;
        }
        if ( $opacity > 127 ) {
            $opacity = 127;
        }
        $color = imagecolorallocatealpha(
            $image,
            $color[0],
            $color[1],
            $color[2],
            $opacity
        );
        // Fixed integer value
        $padding_x = floor( $padding_x );
        $padding_y = floor( $padding_y );
        $factor_x = floor( $factor_x );
        $factor_y = floor( $factor_y );
        imagefilledrectangle(
            $image,
            $x - $padding_x * 2,
            $y - $padding_y * $factor_y,
            $x + $width + $padding_x * 2,
            $y + $height + $padding_y * $factor_x,
            $color
        );
        return $image;
    }

    public function textWrap(
        $text,
        $font,
        $font_size,
        $image_width
    ) {
        $sep = " ";
        $words = explode( " ", $text );
        if ( count( $words ) == 1 ) {
            $words = preg_split(
                '//u',
                $text,
                -1,
                PREG_SPLIT_NO_EMPTY
            );
            // Split text
            $sep = "";
        }
        $textWrappped = array();
        $line = "";
        foreach ( $words as $word ) {
            $testbox = imagettfbbox(
                $font_size,
                0,
                $font,
                $line . $sep . $word
            );
            if ( $testbox[2] > $image_width || $line == "" ) {
                array_push( $textWrappped, $line );
                $line = $word;
            } else {
                if ( $line == "" ) {
                    $line = $word;
                } else {
                    $line .= $sep . $word;
                }
            }
        }
        array_push( $textWrappped, $line );
        return $textWrappped;
    }

    public function output( $image, $attachment = null ) {
        if ( $attachment ) {
            $path = $attachment['path'];
            $id = $attachment['id'];
            imagejpeg( $image, $path, 100 );
            imagedestroy( $image );
            require_once ABSPATH . 'wp-admin/includes/image.php';
            $attach_data = wp_generate_attachment_metadata( $id, $path );
            wp_update_attachment_metadata( $id, $attach_data );
            return $attachment;
        }
        ob_start();
        imagejpeg( $image );
        $image_data = ob_get_contents();
        ob_end_clean();
        imagedestroy( $image );
        return base64_encode( $image_data );
    }

    public function get_from_source( $query, $settings, $post ) {
        if ( !$query ) {
            return null;
        }
        // Check if GD Library is installed
        if ( !function_exists( 'imagecreatetruecolor' ) ) {
            return array(
                'error' => 'GD Library is not installed',
            );
        }
        // Check if use youtube video as background
        if ( isset( $settings['use_youtube_background'] ) ) {
            if ( $settings['use_youtube_background'] ) {
                $attachment = $this->get_from_youtube( $post->post_content, $settings, $post );
                if ( $attachment ) {
                    return $attachment;
                } else {
                    $attachment = $this->get_from_local_video( $post->post_content, $settings, $post );
                    if ( $attachment ) {
                        return $attachment;
                    }
                }
            }
        }
        $sources = $settings['background_source'];
        if ( !$sources ) {
            $source = 'local';
        } else {
            $source = $sources[rand( 0, count( $sources ) - 1 )];
        }
        if ( $source === 'happi.dev:flux' ) {
            return $this->get_from_happi_dev(
                $query,
                $settings,
                $post,
                'flux'
            );
        }
        if ( $source === 'local' ) {
            return $this->get_from_local( $query, $settings, $post );
        }
        if ( $source === 'imagick:gradient' ) {
            return $this->get_from_imagick(
                $query,
                $settings,
                'gradient',
                $post
            );
        }
        if ( $source === 'imagick:plasma' ) {
            return $this->get_from_imagick(
                $query,
                $settings,
                'plasma',
                $post
            );
        }
        if ( $source === 'solid' ) {
            return $this->get_from_solid_color( $query, $settings, $post );
        }
        if ( $source === 'custom_solid' ) {
            $solidColors = $settings['custom_solid_color'];
            $randomSolidColor = $solidColors[rand( 0, count( $solidColors ) - 1 )];
            return $this->get_from_solid_color(
                $query,
                $settings,
                $post,
                $randomSolidColor
            );
        }
    }

    public function prepare_layer( $image, $settings, $type = 'back' ) {
        if ( !isset( $settings['enable_layers'] ) || !$settings['enable_layers'] ) {
            return $image;
        }
        $layers = $this->get_all_layers( $type );
        if ( $layers ) {
            $layer = $layers[rand( 0, count( $layers ) - 1 )];
            $layer = get_attached_file( $layer->ID );
            $image = $this->add_overlay_image( $image, $layer, $settings );
        }
        return $image;
    }

    public function get_near_color( $color ) {
        $color = $this->hex_to_rgb( $color );
        $newColor = array($color[0] + rand( -20, 20 ), $color[1] + rand( -20, 20 ), $color[2] + rand( -20, 20 ));
        if ( $newColor[0] < 0 ) {
            $newColor[0] = $color[0];
        }
        if ( $newColor[1] < 0 ) {
            $newColor[1] = $color[1];
        }
        if ( $newColor[2] < 0 ) {
            $newColor[2] = $color[2];
        }
        if ( $newColor[0] > 255 ) {
            $newColor[0] = $color[0];
        }
        if ( $newColor[1] > 255 ) {
            $newColor[1] = $color[1];
        }
        if ( $newColor[2] > 255 ) {
            $newColor[2] = $color[2];
        }
        return $this->rgb_to_hex( $newColor );
    }

    public function get_all_layers( $type ) {
        // Get all images as layer
        $args = array(
            'post_type'      => 'attachment',
            'post_status'    => 'inherit',
            'posts_per_page' => 1,
            'orderby'        => 'rand',
            'post_mime_type' => 'image',
            'meta_query'     => array(array(
                'key'     => 'atfit_use_as_layer_' . $type,
                'compare' => 'EXISTS',
            )),
        );
        $query = new WP_Query($args);
        $layers = array();
        foreach ( $query->posts as $post ) {
            $layers[] = $post;
        }
        return ( $layers ? $layers : false );
    }

    public function rgb_to_hex( $rgb ) {
        $hex = "#";
        $hex .= str_pad(
            dechex( $rgb[0] ),
            2,
            "0",
            STR_PAD_LEFT
        );
        $hex .= str_pad(
            dechex( $rgb[1] ),
            2,
            "0",
            STR_PAD_LEFT
        );
        $hex .= str_pad(
            dechex( $rgb[2] ),
            2,
            "0",
            STR_PAD_LEFT
        );
        return $hex;
    }

    public function hex_to_rgb( $color ) {
        if ( $color[0] == '#' ) {
            $color = substr( $color, 1 );
        }
        if ( strlen( $color ) == 6 ) {
            list( $r, $g, $b ) = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
        } elseif ( strlen( $color ) == 3 ) {
            list( $r, $g, $b ) = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
        } else {
            return false;
        }
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );
        return array($r, $g, $b);
    }

    public function get_from_error( $text, $settings ) {
        // create image with GD white with black text if Imagick is not installed
        $image = imagecreatetruecolor( $settings['image_size_width'], $settings['image_size_height'] );
        $white = imagecolorallocate(
            $image,
            255,
            255,
            255
        );
        $black = imagecolorallocate(
            $image,
            0,
            0,
            0
        );
        imagefilledrectangle(
            $image,
            0,
            0,
            $settings['image_size_width'],
            $settings['image_size_height'],
            $black
        );
        $font = ATFIT_PLUGIN_DIR . 'admin/assets/fonts/arial-bold.ttf';
        $text_size = imagettfbbox(
            20,
            0,
            $font,
            $text
        );
        $text_width = $text_size[2] - $text_size[0];
        $x = 1000 / 2 - $text_width / 2;
        $y = 650;
        imagettftext(
            $image,
            20,
            0,
            $x,
            $y,
            $white,
            $font,
            $text
        );
        // save the image into media library
        $filename = 'error';
        $upload_dir = wp_upload_dir();
        $filename = sha1( $filename ) . '.png';
        if ( wp_mkdir_p( $upload_dir['path'] ) ) {
            $file = $upload_dir['path'] . '/' . $filename;
        } else {
            $file = $upload_dir['basedir'] . '/' . $filename;
        }
        imagepng( $image, $file );
        $attachment = array(
            'post_mime_type' => 'image/png',
            'post_title'     => $filename,
            'post_content'   => '',
            'post_status'    => 'inherit',
            'alt_text'       => '',
        );
        $attach_id = wp_insert_attachment( $attachment, $file );
        require_once ABSPATH . 'wp-admin/includes/image.php';
        $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
        wp_update_attachment_metadata( $attach_id, $attach_data );
        update_post_meta( $attach_id, 'atfit_custom_id', 'None' );
        update_post_meta( $attach_id, 'atfit_source', 'Error' );
        update_post_meta( $attach_id, 'atfit_plugin', 'ATFIT' );
        update_post_meta( $attach_id, '_wp_attachment_image_alt', $post->post_title );
        return array(
            'id'   => $attach_id,
            'path' => get_attached_file( $attach_id ),
        );
    }

    public function calculate_contrast( $color_1, $color_2 ) {
        $l1 = 0.2126 * pow( $color_1[0] / 255, 2.2 ) + 0.7151999999999999 * pow( $color_1[1] / 255, 2.2 ) + 0.0722 * pow( $color_1[2] / 255, 2.2 );
        $l2 = 0.2126 * pow( $color_2[0] / 255, 2.2 ) + 0.7151999999999999 * pow( $color_2[1] / 255, 2.2 ) + 0.0722 * pow( $color_2[2] / 255, 2.2 );
        if ( $l1 > $l2 ) {
            return ($l1 + 0.05) / ($l2 + 0.05);
        } else {
            return ($l2 + 0.05) / ($l1 + 0.05);
        }
    }

    public function get_from_solid_color(
        $query,
        $settings,
        $post,
        $color = null
    ) {
        // create image with GD white with black text if Imagick is not installed
        $image = imagecreatetruecolor( $settings['image_size_width'], $settings['image_size_height'] );
        if ( !$color ) {
            $colorRGB = array(rand( 0, 255 ), rand( 0, 255 ), rand( 0, 255 ));
            // Check contrast to white and change color if needed
            $font_color = $this->hex2rgb( $settings['font_color'], true );
            // calculatrre contrast to $font_color
            $contrast = $this->calculate_contrast( $font_color, $colorRGB );
            $iterances = 0;
            if ( $contrast < 3 ) {
                do {
                    $iterances++;
                    $colorRGB = array(rand( 0, 255 ), rand( 0, 255 ), rand( 0, 255 ));
                    $contrast = $this->calculate_contrast( $font_color, $colorRGB );
                    // try max 100 times to get a color with enough contrast
                    if ( $iterances > 100 ) {
                        break;
                    }
                } while ( $contrast < 3 );
            }
        } else {
            $colorRGB = $this->hex2rgb( $color, true );
        }
        $color = imagecolorallocate(
            $image,
            $colorRGB[0],
            $colorRGB[1],
            $colorRGB[2]
        );
        imagefilledrectangle(
            $image,
            0,
            0,
            $settings['image_size_width'],
            $settings['image_size_height'],
            $color
        );
        // save the image into media library
        $upload_dir = wp_upload_dir();
        $filename = sha1( time() ) . '.png';
        // time() is used to make sure the file name is unique
        $filename = $this->get_filename( $filename, $settings, $post );
        if ( wp_mkdir_p( $upload_dir['path'] ) ) {
            $file = $upload_dir['path'] . '/' . $filename;
        } else {
            $file = $upload_dir['basedir'] . '/' . $filename;
        }
        imagepng( $image, $file );
        $attachment = array(
            'post_mime_type' => 'image/png',
            'post_title'     => $post->post_title,
            'post_content'   => $post->post_title,
            'post_status'    => 'inherit',
            'alt_text'       => $post->post_title,
        );
        $attach_id = wp_insert_attachment( $attachment, $file );
        require_once ABSPATH . 'wp-admin/includes/image.php';
        $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
        wp_update_attachment_metadata( $attach_id, $attach_data );
        update_post_meta( $attach_id, 'atfit_custom_id', 'None' );
        update_post_meta( $attach_id, 'atfit_source', 'solid' );
        update_post_meta( $attach_id, 'atfit_plugin', 'ATFIT' );
        update_post_meta( $attach_id, '_wp_attachment_image_alt', $post->post_title );
        return array(
            'id'   => $attach_id,
            'path' => get_attached_file( $attach_id ),
        );
    }

    public function get_from_imagick(
        $query,
        $settings,
        $type,
        $post
    ) {
        // check if Imagick class is installed
        $imagick_installed = class_exists( 'Imagick' );
        if ( !$imagick_installed ) {
            return $this->get_from_error( 'Imagick is not installed', $settings );
        }
        // random color
        $gradient = $this->gradients_seeds[rand( 0, count( $this->gradients_seeds ) - 1 )];
        if ( !$gradient ) {
            $gradient = array('#ffffff', '#ffffff');
        }
        $start_color = $gradient[0];
        $middle_color = $gradient[1];
        $end_color = end( $gradient );
        $start_color = $this->get_near_color( $start_color );
        $end_color = $this->get_near_color( $end_color );
        // create image good wuality
        $imagick = new Imagick();
        $imagick->setResolution( 2000, 2000 );
        // $imagick->newPseudoImage(2000, 2000, 'gradient:' . $start_color . '-' . $middle_color . '-' . $end_color);
        // $imagick->newPseudoImage(2000, 2000, 'plasma:' . $start_color . '-' . $middle_color . '-' . $end_color);
        $imagick->newPseudoImage( 2000, 2000, $type . ':' . $start_color . '-' . $middle_color . '-' . $end_color );
        // rotate image random (90 or -90
        $rotate = rand( 0, 1 );
        $imagick->rotateImage( new ImagickPixel('none'), ( $rotate ? 90 : -90 ) );
        // resize image
        $imagick->resizeImage(
            $settings['image_size_width'],
            $settings['image_size_height'],
            Imagick::FILTER_LANCZOS,
            1
        );
        $imagick->setImageFormat( "png" );
        // save the image into media library
        $upload_dir = wp_upload_dir();
        $filename = sha1( time() ) . '.png';
        $filename = $this->get_filename( $filename, $settings, $post );
        if ( wp_mkdir_p( $upload_dir['path'] ) ) {
            $file = $upload_dir['path'] . '/' . $filename;
        } else {
            $file = $upload_dir['basedir'] . '/' . $filename;
        }
        // Output image and set image file name.
        $imagick->writeImage( $file );
        $imagick->destroy();
        $attachment = array(
            'post_mime_type' => 'image/png',
            'post_title'     => $post->post_title,
            'post_content'   => $post->post_title,
            'post_status'    => 'inherit',
            'alt_text'       => $post->post_title,
        );
        $attach_id = wp_insert_attachment( $attachment, $file );
        require_once ABSPATH . 'wp-admin/includes/image.php';
        $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
        wp_update_attachment_metadata( $attach_id, $attach_data );
        update_post_meta( $attach_id, 'atfit_custom_id', 'None' );
        update_post_meta( $attach_id, 'atfit_source', 'imagick' );
        update_post_meta( $attach_id, 'atfit_plugin', 'ATFIT' );
        update_post_meta( $attach_id, '_wp_attachment_image_alt', $post->post_title );
        return array(
            'id'   => $attach_id,
            'path' => get_attached_file( $attach_id ),
        );
    }

    public function get_from_dalle( $query, $settings, $post ) {
    }

    /**
     * Generate image from Happi.dev
     * @param string $query - The query to search
     * @param array $settings - The settings array
     * @param object $post - The post object
     * @param string $model - The model to use (SDXL, FLUX, LCM, SD3)
     */
    public function get_from_happi_dev(
        $query,
        $settings,
        $post,
        $model = 'FLUX'
    ) {
        $api_key = $settings['happi_key'];
        if ( !$api_key ) {
            return array(
                'error' => 'No API key found',
            );
        }
        $prompt = $settings['dalle_prompt'];
        $width = intval( $settings['image_size_width'] );
        $height = intval( $settings['image_size_height'] );
        $model = strtoupper( $model );
        $url = "https://api.happi.dev/v1/images-create";
        $response = wp_remote_post( $url, array(
            'headers' => array(
                'accept'        => 'application/json',
                'x-happi-token' => $api_key,
                'content-type'  => 'application/json',
            ),
            'timeout' => 50000,
            'body'    => wp_json_encode( array(
                'prompt' => str_replace( '%query%', $query, $prompt ),
                'model'  => $model,
                'width'  => $width,
                'height' => $height,
            ) ),
        ) );
        if ( is_wp_error( $response ) ) {
            return array(
                'error' => $response->get_error_message(),
            );
        }
        if ( wp_remote_retrieve_response_code( $response ) != 200 ) {
            return array(
                'error' => $response['body'],
            );
        }
        $response = json_decode( $response['body'] );
        if ( isset( $response->error ) ) {
            return array(
                'error' => $response->error,
            );
        }
        if ( !isset( $response->data ) ) {
            return array(
                'error' => 'No image found',
            );
        }
        $image = $response->data;
        // Base64 image
        // remove data:image/jpeg;base64,
        $image = str_replace( 'data:image/jpeg;base64,', '', $image );
        $image_data = base64_decode( $image );
        $upload_dir = wp_upload_dir();
        $filename = basename( $post->post_title );
        // sha1 hash
        $filename = sha1( $filename ) . '.jpg';
        $filename = $this->get_filename( $filename, $settings, $post );
        if ( wp_mkdir_p( $upload_dir['path'] ) ) {
            $file = $upload_dir['path'] . '/' . $filename;
        } else {
            $file = $upload_dir['basedir'] . '/' . $filename;
        }
        file_put_contents( $file, $image_data );
        $attachment = array(
            'post_mime_type' => 'image/jpg',
            'post_title'     => $post->post_title,
            'post_content'   => $post->post_title,
            'post_status'    => 'inherit',
            'alt_text'       => $post->post_title,
        );
        $attach_id = wp_insert_attachment( $attachment, $file );
        require_once ABSPATH . 'wp-admin/includes/image.php';
        $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
        wp_update_attachment_metadata( $attach_id, $attach_data );
        update_post_meta( $attach_id, 'atfit_custom_id', 'None' );
        update_post_meta( $attach_id, 'atfit_source', 'happi.dev' );
        update_post_meta( $attach_id, 'atfit_plugin', 'ATFIT' );
        update_post_meta( $attach_id, 'atfit_prompt', str_replace( '%query%', $query, $prompt ) );
        update_post_meta( $attach_id, '_wp_attachment_image_alt', $post->post_title );
        return array(
            'id'   => $attach_id,
            'path' => get_attached_file( $attach_id ),
        );
    }

    public function get_from_stable_diffusion_stability( $query, $settings, $post ) {
    }

    public function get_from_stable_diffusion_getimgai( $query, $settings, $post ) {
    }

    public function get_from_stable_diffusion_automatic1111( $query, $settings, $post ) {
    }

    public function exixts_in_local( $id ) {
        $args = array(
            'post_type'      => 'attachment',
            'posts_per_page' => 1,
            'post_mime_type' => 'image',
            'post_status'    => 'inherit',
            'post_parent'    => 0,
            'meta_query'     => array(array(
                'key'     => 'atfit_custom_id',
                'value'   => $id,
                'compare' => '=',
            )),
        );
        $images = new WP_Query($args);
        if ( $images->found_posts ) {
            $image = $images->posts[0];
            return array(
                'id'   => $image->ID,
                'path' => get_attached_file( $image->ID ),
            );
        }
        return false;
    }

    public function get_from_unsplash( $query, $settings, $post ) {
    }

    public function get_from_pexels( $query, $settings, $post ) {
        return null;
    }

    public function get_from_local_video( $content, $settings, $post ) {
        // detect <video> tag and extract the video url
        $video_url = null;
        $matches = array();
        preg_match( '/<video.*src="([^"]*)".*<\\/video>/', $content, $matches );
        if ( count( $matches ) > 1 ) {
            $video_url = $matches[1];
            $exec = ( function_exists( 'exec' ) ? true : false );
            if ( !$exec ) {
                return null;
            }
            $ffmpeg = ( exec( 'ffmpeg -version' ) ? true : false );
            if ( !$ffmpeg ) {
                return null;
            }
        } else {
            // try guttenber block all formats
            preg_match( '/\\[video.*(webm|mp4)="([^"]*)".*\\[\\/video\\]/', $content, $matches );
            if ( count( $matches ) > 2 ) {
                $video_url = $matches[2];
            } else {
                return null;
            }
        }
        // extract frame using ffmpeg and exec  command
        $upload_dir = wp_upload_dir();
        $filename = basename( $video_url );
        $filename = $this->get_filename( $filename, $settings, $post );
        $file = $upload_dir['path'] . '/' . $filename . '.jpg';
        $cmd = "ffmpeg -i " . escapeshellarg( $video_url ) . " -ss 00:00:10 -vframes 1 " . escapeshellarg( $file );
        exec( $cmd );
        $attachment = array(
            'post_mime_type' => 'image/jpeg',
            'post_title'     => $post->post_title,
            'post_content'   => $post->post_title,
            'post_status'    => 'inherit',
            'alt_text'       => $post->post_title,
        );
        $attach_id = wp_insert_attachment( $attachment, $file );
        $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
        wp_update_attachment_metadata( $attach_id, $attach_data );
        update_post_meta( $attach_id, 'atfit_custom_id', 'None' );
        update_post_meta( $attach_id, 'atfit_source', 'local_video' );
        update_post_meta( $attach_id, 'atfit_plugin', 'ATFIT' );
        update_post_meta( $attach_id, '_wp_attachment_image_alt', $post->post_title );
        return array(
            'path' => get_attached_file( $attach_id ),
            'id'   => $attach_id,
        );
    }

    public function get_from_youtube( $content, $settings, $post ) {
        // Find the first youtube link and extract the video id for use image full
        $video_id = null;
        $matches = array();
        // Find the first youtube link guttenber block embed  <!-- wp:embed
        preg_match( '/<!-- wp:embed {.*"url":"https:\\/\\/www.youtube.com\\/watch\\?v=([^"]*)".*} -->/', $content, $matches );
        if ( count( $matches ) > 1 ) {
            $video_id = $matches[1];
        } else {
            //https://youtu.be/QoaDkejcHSc?si=HuRIGbuMXaAf8tpJ
            preg_match( '/https:\\/\\/youtu.be\\/([^"]*)/', $content, $matches );
        }
        if ( count( $matches ) > 1 ) {
            $video_id = $matches[1];
            $video_id = explode( '?', $video_id )[0];
        }
        // Find the first youtube link classic editor
        if ( !$video_id ) {
            preg_match( '/https:\\/\\/www.youtube.com\\/watch\\?v=([^"]*)/', $content, $matches );
            if ( count( $matches ) > 1 ) {
                $video_id = $matches[1];
            }
        }
        if ( $video_id ) {
            $video_id = explode( '\\', $video_id )[0];
            $image_url = "https://img.youtube.com/vi/{$video_id}/maxresdefault.jpg";
            $image_data = wp_remote_get( $image_url );
            if ( is_wp_error( $image_data ) ) {
                return null;
            }
            $image_data = $image_data['body'];
            $upload_dir = wp_upload_dir();
            $filename = $video_id . '.jpg';
            $filename = $this->get_filename( $filename, $settings, $post );
            if ( wp_mkdir_p( $upload_dir['path'] ) ) {
                $file = $upload_dir['path'] . '/' . $filename;
            } else {
                $file = $upload_dir['basedir'] . '/' . $filename;
            }
            file_put_contents( $file, $image_data );
            $attachment = array(
                'post_mime_type' => 'image/jpeg',
                'post_title'     => $post->post_title,
                'post_content'   => $post->post_title,
                'post_status'    => 'inherit',
                'alt_text'       => $post->post_title,
            );
            // Check if image already exists in media library
            $exists = $this->exixts_in_local( $video_id );
            if ( $exists ) {
                return $exists;
            }
            require_once ABSPATH . 'wp-admin/includes/image.php';
            $attach_id = wp_insert_attachment( $attachment, $file );
            $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
            wp_update_attachment_metadata( $attach_id, $attach_data );
            update_post_meta( $attach_id, 'atfit_custom_id', $video_id );
            update_post_meta( $attach_id, 'atfit_source', 'youtube' );
            update_post_meta( $attach_id, 'atfit_plugin', 'ATFIT' );
            update_post_meta( $attach_id, '_wp_attachment_image_alt', $post->post_title );
            return array(
                'path' => get_attached_file( $attach_id ),
                'id'   => $attach_id,
            );
        }
        return null;
    }

    public function get_from_pixabay( $query, $settings, $post ) {
    }

    public function add_overlay_image( $image_base, $overlay, $settings ) {
        $isFile = true;
        // check if is array $image_base
        if ( is_array( $image_base ) ) {
            $image_base = $image_base['path'];
        }
        // check if is GdImage Object
        if ( is_object( $image_base ) ) {
            $isFile = false;
            $image = $image_base;
        } else {
            // check if is PNG or JPG or JPEG
            $image_info = getimagesize( $image_base );
            if ( $image_info['mime'] == 'image/png' ) {
                $image = imagecreatefrompng( $image_base );
            } else {
                if ( $image_info['mime'] == 'image/jpeg' ) {
                    $image = imagecreatefromjpeg( $image_base );
                } else {
                    if ( $image_info['mime'] == 'image/jpg' ) {
                        $image = imagecreatefromjpeg( $image_base );
                    } else {
                        error_log( 'Image type not supported' );
                        return $image_base;
                    }
                }
            }
        }
        $overlay = imagecreatefrompng( $overlay );
        // $overlay = imagescale($overlay, $settings['image_size_width'], $settings['image_size_height']);
        // TODO: Settings for scale, position, opacity, rotation and padding for overlay image
        // add from right bottom
        imagecopy(
            $image,
            $overlay,
            imagesx( $image ) - imagesx( $overlay ),
            imagesy( $image ) - imagesy( $overlay ),
            0,
            0,
            imagesx( $overlay ),
            imagesy( $overlay )
        );
        // Overwrite the image
        if ( $isFile ) {
            imagepng( $image, $image_base );
        }
        return $image;
    }

    public function get_from_local( $query, $settings, $post ) {
        // Images from local media library without post parent
        $args = array(
            'post_type'      => 'attachment',
            'posts_per_page' => -1,
            'post_mime_type' => 'image',
            'post_status'    => 'inherit',
            'post_parent'    => 0,
            's'              => $query,
        );
        $reUseImage = false;
        if ( isset( $settings['reuse_local_image'] ) ) {
            if ( $settings['reuse_local_image'] ) {
                // Allow images from local media library with post parent
                $args['post_status'] = 'any';
                $reUseImage = true;
                unset($args['post_parent']);
            }
        }
        $images = new WP_Query($args);
        if ( !$images->found_posts ) {
            return null;
        }
        // Get Radom Image from array
        $image = $images->posts[array_rand( $images->posts )];
        if ( $reUseImage ) {
            // return the image without duplicating it
            return array(
                'id'     => $image->ID,
                'path'   => get_attached_file( $image->ID ),
                'reused' => true,
            );
        }
        // Duplicate image to media library
        $upload_dir = wp_upload_dir();
        $filename = basename( $image->guid );
        $filename = explode( "?", $filename )[0];
        $filename = $this->get_filename( $filename, $settings, $post );
        if ( wp_mkdir_p( $upload_dir['path'] ) ) {
            $file = $upload_dir['path'] . '/' . $filename;
        } else {
            $file = $upload_dir['basedir'] . '/' . $filename;
        }
        copy( get_attached_file( $image->ID ), $file );
        $attachment = array(
            'post_mime_type' => $image->post_mime_type,
            'post_title'     => $post->post_title,
            'post_content'   => $post->post_title,
            'post_status'    => 'inherit',
            'alt_text'       => ( $image->post_excerpt ? $image->post_excerpt : $post->post_title ),
        );
        $attach_id = wp_insert_attachment( $attachment, $file );
        require_once ABSPATH . 'wp-admin/includes/image.php';
        $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
        wp_update_attachment_metadata( $attach_id, $attach_data );
        update_post_meta( $attach_id, 'atfit_custom_id', $image->ID );
        update_post_meta( $attach_id, 'atfit_source', 'local' );
        update_post_meta( $attach_id, 'atfit_plugin', 'ATFIT' );
        update_post_meta( $attach_id, '_wp_attachment_image_alt', $post->post_title );
        return array(
            'id'   => $attach_id,
            'path' => get_attached_file( $attach_id ),
        );
    }

    public function get_filename( $filenameInit, $settings, $post ) {
        $filename = $filenameInit;
        if ( isset( $settings['slug_as_filename'] ) && $settings['slug_as_filename'] ) {
            $wp_filetype = wp_check_filetype( $filenameInit, null );
            $filename = $post->post_name;
            if ( !$filename ) {
                $filename = $post->post_title;
                // Convert to slug
                $filename = sanitize_title( $filename );
                // Remove special characters
                $filename = preg_replace( '/[^A-Za-z0-9\\-]/', '-', $filename );
                // Remove dashes
                $filename = preg_replace( '/-+/', '-', $filename );
            }
            if ( $wp_filetype['ext'] ) {
                $filename .= '.' . $wp_filetype['ext'];
            }
        }
        if ( $filename ) {
            return $filename;
        }
        return $filenameInit;
    }

    public function hex2rgb( $hex, $only_values = false ) {
        $hex = str_replace( "#", "", $hex );
        if ( strlen( $hex ) == 3 ) {
            $r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
            $g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
            $b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
        } else {
            $r = hexdec( substr( $hex, 0, 2 ) );
            $g = hexdec( substr( $hex, 2, 2 ) );
            $b = hexdec( substr( $hex, 4, 2 ) );
        }
        $rgb = array(
            'r' => $r,
            'g' => $g,
            'b' => $b,
        );
        if ( $only_values ) {
            return array(intval( $r ), intval( $g ), intval( $b ));
        }
        return $rgb;
    }

}
