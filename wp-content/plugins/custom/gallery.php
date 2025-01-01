<?php
/**
 * Plugin Name: Gallery Photos
 * Description: This plugin allows users to upload and display photos in a gallery with a modal view.
 */
ob_start();

// Add menu page
add_action('admin_menu', 'gallery_image_menu');
function gallery_image_menu() {
    add_menu_page(
        'Gallery Images',
        'Gallery Images',
        'manage_options',
        'gallery-image-manager',
        'gallery_image_page',
        'dashicons-format-gallery',
        20
    );
}

// Menu page callback
function gallery_image_page() {
    ?>
    <div class="wrap">
        <h1>Gallery Images</h1>

        <form method="post" enctype="multipart/form-data">
            <?php wp_nonce_field('gallery_upload_action', 'gallery_upload_nonce'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="gallery_image">Upload Image</label></th>
                    <td><input type="file" name="gallery_image" id="gallery_image" required></td>
                </tr>
            </table>
            <?php submit_button('Upload Image'); ?>
        </form>

        <h2>Uploaded Images</h2>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                global $wpdb;
                $table_name = $wpdb->prefix . 'galleryimage';
                $images = $wpdb->get_results("SELECT * FROM $table_name");

                foreach ($images as $image) {
                    $upload_dir = wp_upload_dir();
                    $image_url = $upload_dir['baseurl'] . '/gallery/' . $image->image;
                    echo '<tr>';
                    echo '<td>' . $image->id . '</td>';
                    echo '<td><img src="' . esc_url($image_url) . '" width="100"></td>';
                    echo '<td>';
                    echo '<a href="?page=gallery-image-manager&action=delete&id=' . $image->id . '">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['gallery_image'])) {
        save_gallery_image();
    }

    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
        delete_gallery_image((int) $_GET['id']);
    }
}

function save_gallery_image() {
    if (!isset($_POST['gallery_upload_nonce']) || !wp_verify_nonce($_POST['gallery_upload_nonce'], 'gallery_upload_action')) {
        die('Invalid nonce.');
    }

    global $wpdb;
    $upload_dir = wp_upload_dir();
    $target_dir = $upload_dir['basedir'] . '/gallery/';

    if (!file_exists($target_dir)) {
        wp_mkdir_p($target_dir);
    }

    $uploaded_file = $_FILES['gallery_image'];
    $file_type = wp_check_filetype($uploaded_file['name']);

    if (!in_array($file_type['ext'], ['jpg', 'jpeg', 'png', 'gif'])) {
        echo '<div class="notice notice-error"><p>Invalid file type. Only images are allowed.</p></div>';
        return;
    }

    $file_name = basename($uploaded_file['name']);
    $target_file = $target_dir . $file_name;

    if (move_uploaded_file($uploaded_file['tmp_name'], $target_file)) {
        $table_name = $wpdb->prefix . 'galleryimage';
        $wpdb->insert(
            $table_name,
            [
                'image' => $file_name,
                'created_at' => current_time('mysql'),
            ]
        );
        wp_redirect(admin_url('admin.php?page=gallery-image-manager'));
        exit;
    } else {
        echo '<div class="notice notice-error"><p>Failed to upload image.</p></div>';
    }
}

function delete_gallery_image($id) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'galleryimage';

    $image = $wpdb->get_var($wpdb->prepare("SELECT image FROM $table_name WHERE id = %d", $id));
    if ($image) {
        $file_path = wp_upload_dir()['basedir'] . '/gallery/' . $image;
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        $wpdb->delete($table_name, ['id' => $id]);
        wp_redirect(admin_url('admin.php?page=gallery-image-manager'));
        exit;
    } else {
        echo '<div class="notice notice-error"><p>Image not found.</p></div>';
    }
}

function aisolutions_display_all_projects($atts) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'galleryimage';

    $atts = shortcode_atts(['items_per_page' => 9], $atts);
    $items_per_page = (int)$atts['items_per_page'];
    $paged = isset($_GET['paged']) ? (int)$_GET['paged'] : 1;
    $offset = ($paged - 1) * $items_per_page;

    $projects = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name LIMIT %d OFFSET %d", $items_per_page, $offset));
    $total_projects = $wpdb->get_var("SELECT COUNT(*) FROM $table_name");
    $total_pages = ceil($total_projects / $items_per_page);

    if (empty($projects)) {
        return "<p>No projects found.</p>";
    }

    $upload_dir = wp_upload_dir();
    $base_url = $upload_dir['baseurl'] . '/gallery/';
    $output = '<div class="all-projects">
    <style>
        .all-projects {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            padding: 20px;
        }
        .gallery-item img {
            width: 100%;
            height: 200px; /* Fixed height to ensure all images are the same size */
            object-fit: cover; /* Ensures images are cropped to fit the box */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .gallery-item img:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .modal img {
            max-width: 60%;
            max-height: 70%;
            border-radius: 10px;
        }
        .modal .close {
            position: absolute;
                top: 61px;
    right: 111px;
            font-size: 35px;
            color: white;
            cursor: pointer;
            background-color: transparent;
            border: none;
            padding: 5px;
            z-index: 1010;
        }
    </style>';

    foreach ($projects as $project) {
        $image_url = esc_url($base_url . $project->image);
        $output .= '<div class="gallery-item">';
        $output .= '<img src="' . $image_url . '" alt="Project Image" data-full="' . $image_url . '" />';
        $output .= '</div>';
    }

    $output .= '</div>';

    // Modal and Pagination
    $output .= '<div id="image-modal" class="modal">
                    <span class="close">&times;</span>
                    <img src="" alt="Modal Image">
                </div>';
    if ($total_pages > 1) {
        $output .= '<div class="pagination">';
        for ($i = 1; $i <= $total_pages; $i++) {
            $class = $paged === $i ? 'current' : '';
            $output .= '<a href="?paged=' . $i . '" class="' . $class . '">' . $i . '</a>';
        }
        $output .= '</div>';
    }

    // Add JavaScript for Modal
    $output .= '<script>
        document.querySelectorAll(".gallery-item img").forEach(img => {
            img.addEventListener("click", function() {
                const modal = document.getElementById("image-modal");
                const modalImg = modal.querySelector("img");
                modal.style.display = "flex";
                modalImg.src = this.getAttribute("data-full");
            });
        });
        document.querySelector(".modal .close").addEventListener("click", function() {
            document.getElementById("image-modal").style.display = "none";
        });
    </script>';

    return $output;
}

add_shortcode('aisolutions_all_projects', 'aisolutions_display_all_projects');
