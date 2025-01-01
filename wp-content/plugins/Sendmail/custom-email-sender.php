<?php
/**
 * Plugin Name: Feedback Responder
 * Description: A plugin to view Fluent Form feedback and send responses via email.
 * Version: 1.3
 * Author: Your Name
 * License: GPL2
 */

// Hook to add a menu item in WordPress Admin
add_action('admin_menu', 'fr_add_menu');

function fr_add_menu() {
    add_menu_page('Feedback Responder', 'Feedback Responder', 'manage_options', 'feedback-responder', 'fr_feedback_page', 'dashicons-feedback');
}

// Admin page content
function fr_feedback_page() {
    if (!is_plugin_active('fluentform/fluentform.php')) {
        echo '<div class="error"><p>Fluent Forms plugin must be installed and activated to use this feature.</p></div>';
        return;
    }

    echo '<div class="wrap">';
    echo '<h1>Feedback Entries</h1>';

    $search_query = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';

    $entries_per_page = 10;
    $current_page = isset($_GET['paged']) ? intval($_GET['paged']) : 1;
    $offset = ($current_page - 1) * $entries_per_page;

    $entries = fr_get_form_entries($search_query, $offset, $entries_per_page);

    if ($entries) {
        echo '<form method="get">';
        echo '<input type="hidden" name="page" value="feedback-responder" />';
        echo '<input type="text" name="search" value="' . esc_attr($search_query) . '" placeholder="Search by Name, Email or Company" />';
        echo '<button type="submit" class="button">Search</button>';
        echo '</form>';

        echo '<table class="widefat">';
        echo '<thead><tr><th>S.N.</th><th>First Name</th><th>Last Name</th><th>Phone</th><th>Email</th><th>Company</th><th>Country</th><th>Job Title</th><th>Job Description</th><th>Action</th></tr></thead>';
        echo '<tbody>';
        $sn = 1;
        foreach ($entries as $entry) {
            echo '<tr>';
            echo '<td>' . $sn++ . '</td>';
            echo '<td>' . esc_html($entry['first_name']) . '</td>';
            echo '<td>' . esc_html($entry['last_name']) . '</td>';
            echo '<td>' . esc_html($entry['phone']) . '</td>';
            echo '<td>' . esc_html($entry['email']) . '</td>';
            echo '<td>' . esc_html($entry['company']) . '</td>';
            echo '<td>' . esc_html($entry['country']) . '</td>';
            echo '<td>' . esc_html($entry['job_title']) . '</td>';
            echo '<td>' . (empty($entry['job_description']) ? 'Job Description is not given' : esc_html(truncate_text($entry['job_description'], 100))) . '</td>';
            echo '<td><button class="button fr-respond" data-email="' . esc_attr($entry['email']) . '" data-name="' . esc_attr($entry['first_name'] . ' ' . $entry['last_name']) . '">Send Email</button></td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';

        $total_entries = fr_get_total_entries($search_query);
        $total_pages = ceil($total_entries / $entries_per_page);
        if ($total_pages > 1) {
            echo '<div class="pagination">';
            if ($current_page > 1) {
                echo '<a href="?page=feedback-responder&paged=' . ($current_page - 1) . '&search=' . esc_attr($search_query) . '" class="prev">Previous</a>';
            }

            for ($i = 1; $i <= $total_pages; $i++) {
                echo '<a href="?page=feedback-responder&paged=' . $i . '&search=' . esc_attr($search_query) . '" class="' . ($i === $current_page ? 'current' : '') . '">' . $i . '</a> ';
            }

            if ($current_page < $total_pages) {
                echo '<a href="?page=feedback-responder&paged=' . ($current_page + 1) . '&search=' . esc_attr($search_query) . '" class="next">Next</a>';
            }
            echo '</div>';
        }
    } else {
        echo '<p>No feedback entries found.</p>';
    }

    echo '<div id="fr-email-form-container" style="display:none; margin-top: 20px;">';
    echo '<h2 style="text-align: center;">Send Email</h2>';
    echo '<form id="fr-email-form" class="fr-email-form">';
    echo '<label for="fr-email-subject">Subject:</label><br>';
    echo '<input type="text" id="fr-email-subject" name="subject" class="regular-text" required><br><br>';
    echo '<label for="fr-email-message">Message:</label><br>';
    echo '<textarea id="fr-email-message" name="message" rows="10" class="large-text" required></textarea><br><br>';
    echo '<label for="fr-email-recipient">Recipient Email:</label><br>';
    echo '<input type="text" id="fr-email-recipient" name="recipient" class="regular-text" readonly><br><br>';
    echo '<label for="fr-email-sender">Sender Email:</label><br>';
    echo '<input type="text" id="fr-email-sender" name="sender" class="regular-text" value="' . get_bloginfo('admin_email') . '" readonly><br><br>';
    echo '<button type="submit" class="button button-primary">Send Email</button>';
    echo '<button type="button" id="fr-close-email-form" class="button">Close</button>';
    echo '<div id="fr-loading-spinner" style="display:none;">Sending...</div>';
    echo '<div id="fr-email-sent-message" style="display:none; color: green; font-weight: bold;">Email Sent Successfully!</div>';
    echo '</form>';
    echo '</div>';

    echo '</div>';

    echo '<script>
    jQuery(document).ready(function($) {
        $(".fr-respond").click(function(e) {
            e.preventDefault();
            const email = $(this).data("email");
            const name = $(this).data("name");
            $("#fr-email-recipient").val(email);
            $("#fr-email-form-container").show();
        });

        $("#fr-email-form").submit(function(e) {
            e.preventDefault();
            const formData = $(this).serialize();
            $("#fr-loading-spinner").show();

            $.ajax({
                url: "' . admin_url('admin-ajax.php') . '",
                method: "POST",
                data: {
                    action: "fr_send_email",
                    security: "' . wp_create_nonce('fr_email_nonce') . '",
                    ...Object.fromEntries(new URLSearchParams(formData))
                },
                success: function(response) {
                    $("#fr-loading-spinner").hide();
                    $("#fr-email-sent-message").show();
                    setTimeout(function() {
                        $("#fr-email-form-container").hide();
                    }, 3000);
                },
                error: function(response) {
                    $("#fr-loading-spinner").hide();
                    alert(response.responseJSON.data.message);
                }
            });
        });

        $("#fr-close-email-form").click(function() {
            $("#fr-email-form-container").hide();
        });
    });
    </script>';
    // Add CSS for pagination and modern UI styling
    echo '<style>
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    .pagination a {
        padding: 5px 10px;
        margin: 0 5px;
        text-decoration: none;
        background-color: #f1f1f1;
        color: #0073aa;
        border: 1px solid #ddd;
        border-radius: 3px;
    }
    .pagination a.current {
        background-color: #0073aa;
        color: white;
    }
    .pagination a:hover {
        background-color: #ddd;
    }
    .pagination .prev,
    .pagination .next {
        font-weight: bold;
    }
    .fr-email-form {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 8px;
        background-color: #f9f9f9;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .fr-email-form input,
    .fr-email-form textarea {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }
    #fr-loading-spinner {
        font-size: 16px;
        font-weight: bold;
        color: #0073aa;
    }
    #fr-email-sent-message {
        font-size: 18px;
        font-weight: bold;
        color: green;
    }
    </style>';

}

function truncate_text($text, $length = 20) {
    if (strlen($text) > $length) {
        return substr($text, 0, $length) . '...';
    }
    return $text;
}

function fr_get_form_entries($search_query = '', $offset = 0, $limit = 10) {
    global $wpdb;

    $form_id = 1;
    $table_name = $wpdb->prefix . 'fluentform_submissions';

    $search_sql = '';
    if ($search_query) {
        $search_sql = " AND (response LIKE '%" . $wpdb->esc_like($search_query) . "%')";
    }

    $entries = $wpdb->get_results($wpdb->prepare(
        "SELECT * FROM $table_name WHERE form_id = %d $search_sql LIMIT %d OFFSET %d", 
        $form_id, $limit, $offset
    ), ARRAY_A);

    $data = [];
    foreach ($entries as $entry) {
        $meta = json_decode($entry['response'], true);

        $data[] = [
            'first_name' => $meta['names']['first_name'] ?? '',
            'last_name' => $meta['names']['last_name'] ?? '',
            'phone' => $meta['numeric_field'] ?? '',
            'email' => $meta['email'] ?? '',
            'company' => $meta['input_text'] ?? '',
            'country' => $meta['country-list'] ?? '',
            'job_title' => $meta['input_text_1'] ?? '',
            'job_description' => $meta['description'] ?? '',
        ];
    }

    return $data;
}

function fr_get_total_entries($search_query = '') {
    global $wpdb;

    $form_id = 1;
    $table_name = $wpdb->prefix . 'fluentform_submissions';

    $search_sql = '';
    if ($search_query) {
        $search_sql = " AND (response LIKE '%" . $wpdb->esc_like($search_query) . "%')";
    }

    $total_entries = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(*) FROM $table_name WHERE form_id = %d $search_sql", 
        $form_id
    ));

    return $total_entries;
}

add_action('wp_ajax_fr_send_email', 'fr_send_email_ajax');

function fr_send_email_ajax() {
    check_ajax_referer('fr_email_nonce', 'security');

    $recipient = sanitize_email($_POST['recipient']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);
    $sender = sanitize_email($_POST['sender']);

    if (!is_email($recipient) || !is_email($sender)) {
        wp_send_json_error(['message' => 'Invalid email address.']);
    }

    $headers = [
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . $sender . '>',
    ];

    $mail_sent = wp_mail($recipient, $subject, $message, $headers);

    if ($mail_sent) {
        wp_send_json_success(['message' => 'Email sent successfully.']);
    } else {
        wp_send_json_error(['message' => 'Failed to send email.']);
    }
}
