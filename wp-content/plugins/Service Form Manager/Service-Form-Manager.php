<?php
/**
 * Plugin Name: Service Form Manager
 * Description: A plugin to manage services with icons, names, and descriptions. Admin can add, edit, and delete services.
 * Version: 1.1.1
 * Author: Your Name
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Create custom database table on activation
function sfm_create_service_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'services';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id INT(11) NOT NULL AUTO_INCREMENT,
        service_icon VARCHAR(255) NOT NULL,
        service_name VARCHAR(100) NOT NULL,
        service_description TEXT NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'sfm_create_service_table');

// Enqueue Scripts and Styles
function sfm_enqueue_scripts() {
    wp_enqueue_style('sfm-styles', plugins_url('style.css', __FILE__));
    wp_enqueue_script('sfm-scripts', plugins_url('script.js', __FILE__), array('jquery'), null, true);
    wp_localize_script('sfm-scripts', 'sfm_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'sfm_enqueue_scripts');

// Admin Menu for Services
function sfm_admin_menu() {
    add_menu_page(
        'Services',
        'Services',
        'manage_options',
        'sfm_services_list',
        'sfm_services_list_page',
        'dashicons-admin-tools',
        6
    );
    add_submenu_page(
        'sfm_services_list',
        'Add New Service',
        'Add New Service',
        'manage_options',
        'sfm_add_new_service',
        'sfm_add_new_service_page'
    );
}
add_action('admin_menu', 'sfm_admin_menu');

// Admin Page: Services List
function sfm_services_list_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'services';
    $services = $wpdb->get_results("SELECT * FROM $table_name ORDER BY id DESC");

    ?>
    <div class="wrap">
        <h1>Services</h1>
        <a href="?page=sfm_add_new_service" class="page-title-action">Add New Service</a>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Service Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $service): ?>
                    <tr>
                        <td><?php echo $service->id; ?></td>
                        <td><img src="<?php echo esc_url($service->service_icon); ?>" alt="<?php echo esc_attr($service->service_name); ?>" width="50"></td>
                        <td><?php echo esc_html($service->service_name); ?></td>
                        <td><?php echo esc_html(substr($service->service_description, 0, 100)); ?>...</td>
                        <td>
                            <a href="?page=sfm_add_new_service&edit_service=<?php echo $service->id; ?>" class="button">Edit</a>
                            <a href="?page=sfm_services_list&delete_service=<?php echo $service->id; ?>" class="button" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php

    // Handle deletion
    if (isset($_GET['delete_service'])) {
        $delete_id = intval($_GET['delete_service']);
        $wpdb->delete($table_name, array('id' => $delete_id), array('%d'));
        wp_redirect(admin_url('admin.php?page=sfm_services_list'));
        exit;
    }
}

// Admin Page: Add/Edit Service
function sfm_add_new_service_page() {
    global $wpdb;

    $service_id = isset($_GET['edit_service']) ? intval($_GET['edit_service']) : '';
    $service = $service_id ? $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}services WHERE id = %d", $service_id)) : null;

    if (isset($_POST['sfm_add_service'])) {
        $service_icon = sanitize_text_field($_POST['service_icon']);
        $service_name = sanitize_text_field($_POST['service_name']);
        $service_description = sanitize_textarea_field($_POST['service_description']);

        if ($service_id) {
            $wpdb->update(
                "{$wpdb->prefix}services",
                array(
                    'service_icon' => $service_icon,
                    'service_name' => $service_name,
                    'service_description' => $service_description,
                ),
                array('id' => $service_id),
                array('%s', '%s', '%s'),
                array('%d')
            );
            echo '<div class="updated"><p>Service updated successfully!</p></div>';
        } else {
            $wpdb->insert(
                "{$wpdb->prefix}services",
                array(
                    'service_icon' => $service_icon,
                    'service_name' => $service_name,
                    'service_description' => $service_description,
                ),
                array('%s', '%s', '%s')
            );
            echo '<div class="updated"><p>Service added successfully!</p></div>';
        }
    }

    ?>
<div class="wrap">
    <h1><?php echo $service_id ? 'Edit' : 'Add New'; ?> Service</h1>
    <form method="post" action="" id="serviceForm">
        <div style="margin-bottom: 15px; max-width: 600px;">
            <label for="service_icon" style="display: block; font-weight: bold; margin-bottom: 5px;">Service Image:</label>
            <input type="button" class="button" value="Upload Image" id="upload_service_icon">
            <input type="hidden" id="service_icon" name="service_icon" value="<?php echo esc_attr($service ? $service->service_icon : ''); ?>">
            <span id="service_icon_file_name" style="display: block; margin-top: 10px; color: #555;">
        <?php echo $service && $service->service_icon ? basename($service->service_icon) : 'No file selected'; ?>
    </span>
        </div>

        <div style="margin-bottom: 15px; max-width: 600px;">
            <label for="service_name" style="display: block; font-weight: bold; margin-bottom: 5px;">Service Name:</label>
            <input 
                type="text" 
                id="service_name" 
                name="service_name" 
                value="<?php echo esc_attr($service ? $service->service_name : ''); ?>" 
                required 
                style="width: 100%; padding: 8px; font-size: 14px; border: 1px solid #ddd; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px; max-width: 600px;">
            <label for="service_description" style="display: block; font-weight: bold; margin-bottom: 5px;">Service Description:</label>
            <textarea 
                id="service_description" 
                name="service_description" 
                required 
                maxlength="100" 
                style="width: 100%; padding: 8px; font-size: 14px; border: 1px solid #ddd; border-radius: 4px; height: 80px;"
                oninput="updateCountdown(this)"><?php echo esc_textarea($service ? $service->service_description : ''); ?></textarea>
            <small style="display: block; margin-top: 5px; color: #555;" id="descriptionCountdown">100 characters remaining</small>
        </div>

        <input 
            type="submit" 
            name="sfm_add_service" 
            class="button-primary" 
            value="<?php echo $service_id ? 'Update Service' : 'Add Service'; ?>" 
            style="padding: 10px 20px; font-size: 16px;">
    </form>
</div>
    <script>
    jQuery(document).ready(function ($) {
    var custom_uploader;
    $('#upload_service_icon').click(function (e) {
        e.preventDefault();
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Select or Upload Service Icon',
            button: { text: 'Select Icon' },
            multiple: false
        });
        custom_uploader.on('select', function () {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('#service_icon').val(attachment.url);
            $('#service_icon_file_name').text(attachment.filename || 'No file selected');
        });
        custom_uploader.open();
    });
});

    </script>
    <?php
}

// Shortcode to Display Services
function sfm_display_service_cards() {
    global $wpdb;
    $services = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}services ORDER BY id DESC");

    ob_start();
    echo '<div id="sfm-service-cards" class="sfm-service-cards">';
    foreach ($services as $service) {
        echo '<div class="service-card">';
        echo '<div class="service-icon-container"><img src="' . esc_url($service->service_icon) . '" class="service-icon"></div>';
        echo '<h3 class="service-name">' . esc_html($service->service_name) . '</h3>';
        echo '<p class="service-description">' . esc_html($service->service_description) . '</p>';
        //( no need to do anything just addinng rating with services in this all are done just adding )
        //I want to Rating here 5 Start after descprtion ( start average and in side ( number of rater))
        // Here I want to View More Option and I want to add one Own a Rate option when use click Then one model is open where Visitor can rate the services:  Form like Rate 5 star icon where user can click that and rate , User Name< User Email filled an click add Comment to save )
        echo '</div>';
    }
    echo '</div>';
    return ob_get_clean();
}
add_shortcode('sfm_services', 'sfm_display_service_cards');


// Frontend CSS Styling
function sfm_add_styles() {
    ?>
    <style>
    #sfm-service-cards {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    padding: 20px;
}

.service-card {
    width: 280px;
    min-height: 350px;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    background: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}

.service-icon-container {
    margin-bottom: 20px;
}

.service-icon {
    max-width: 80px;
    max-height: 80px;
    border-radius: 50%;
    border: 3px solid #ddd;
    padding: 5px;
    background-color: #f4f4f4;
}

.service-name {
    font-size: 18px;
    font-weight: 600;
    color: #333;
    margin-bottom: 10px;
}

.service-description {
    font-size: 14px;
    color: #666;
    line-height: 1.6;
    text-align: center;
    flex-grow: 1;
    margin-bottom: 10px;
}

/* Responsive Design */
@media (max-width: 768px) {
    #sfm-service-cards {
        flex-direction: column;
        align-items: center;
    }

    .service-card {
        width: 90%;
        margin-bottom: 20px;
    }
}
</style>
<script>
    // Countdown functionality for service description
    function updateCountdown(textarea) {
            const maxLength = 100;
            const remaining = maxLength - textarea.value.length;
            const countdownElement = document.getElementById('descriptionCountdown');

            countdownElement.textContent = remaining + ' characters remaining';

            if (remaining < 0) {
                countdownElement.style.color = 'red';
            } else {
                countdownElement.style.color = '#555';
            }
        }

        // Initialize countdown on page load
        document.addEventListener('DOMContentLoaded', function () {
            const textarea = document.getElementById('service_description');
            if (textarea) {
                updateCountdown(textarea);
            }
        });
</script>

    <?php
}
add_action('wp_head', 'sfm_add_styles');  
