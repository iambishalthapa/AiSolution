<?php
/**
 * Plugin name: Project Videos
 * Description: This plugin allows users to upload and manage videos for their projects.
 */

// Add a menu for managing project videos
add_action('admin_menu', 'project_videos_menu');

function project_videos_menu() {
    add_menu_page(
        'Project Videos',
        'Project Videos',
        'manage_options',
        'project-videos',
        'project_videos_page',
        'dashicons-video-alt3',
        20
    );
}

function project_videos_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'videosdemo';
    $upload_dir = WP_CONTENT_DIR . '/projectvideos/';

    // Ensure the upload directory exists
    if (!file_exists($upload_dir)) {
        wp_mkdir_p($upload_dir);
    }

    // Handle file upload
    if (isset($_POST['submit']) && isset($_FILES['project_video'])) {
        $video = $_FILES['project_video'];
        $video_name = sanitize_text_field($_POST['video_name']);
        $target_file = $upload_dir . basename($video['name']);

        if (move_uploaded_file($video['tmp_name'], $target_file)) {
            $wpdb->insert($table_name, [
                'name' => $video_name,
                'video' => basename($video['name']),
                'created_at' => current_time('mysql'),
            ]);
            echo "<div class='notice notice-success'>Video uploaded successfully.</div>";
        } else {
            echo "<div class='notice notice-error'>Failed to upload video.</div>";
        }
    }

    // Handle delete action
    if (isset($_GET['delete'])) {
        $video_id = intval($_GET['delete']);
        $video = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $video_id));

        if ($video) {
            $file_path = $upload_dir . $video->video;

            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $wpdb->delete($table_name, ['id' => $video_id]);
            echo "<div class='notice notice-success'>Video deleted successfully.</div>";
        }
    }

    // Fetch all videos
    $videos = $wpdb->get_results("SELECT * FROM $table_name");

    // Display the form and video list
    ?>
    <div class="wrap">
        <h1>Manage Project Videos</h1>
        <form method="post" enctype="multipart/form-data">
            <table class="form-table">
                <tr>
                    <th><label for="video_name">Video Name</label></th>
                    <td><input type="text" name="video_name" id="video_name" required /></td>
                </tr>
                <tr>
                    <th><label for="project_video">Upload Video</label></th>
                    <td><input type="file" name="project_video" id="project_video" required /></td>
                </tr>
            </table>
            <p><input type="submit" name="submit" class="button button-primary" value="Upload Video" /></p>
        </form>

        <h2>Uploaded Videos</h2>
        <table class="widefat">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Video Name</th>
                    <th>Video</th>
                    <th>Uploaded At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($videos): ?>
                    <?php foreach ($videos as $video): ?>
                        <tr>
                            <td><?php echo esc_html($video->id); ?></td>
                            <td><?php echo esc_html($video->name); ?></td>
                            <td>
                                <a href="<?php echo content_url('/projectvideos/' . esc_html($video->video)); ?>" target="_blank">
                                    <?php echo esc_html($video->video); ?>
                                </a>
                            </td>
                            <td><?php echo esc_html($video->created_at); ?></td>
                            <td>
                                <a href="<?php echo admin_url('admin.php?page=project-videos&delete=' . $video->id); ?>" class="button button-danger">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No videos found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}

// Add shortcode to display videos
add_shortcode('display_project_videos', 'display_project_videos_shortcode');

function display_project_videos_shortcode() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'videosdemo';
    $upload_dir = content_url('/projectvideos/');
    $default_poster = content_url('/images/default-poster.jpg'); // Path to a default image

    // Fetch videos from the database
    $videos = $wpdb->get_results("SELECT * FROM $table_name");

    // Start output buffering
    ob_start();
    ?>
    <style>
        * {
            box-sizing: border-box;
            font-family: Poppins, sans-serif;
        }

        .courses {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        .course-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .course-card {
            background-color: #F2F1F8;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            padding: 10px;
        }

        .course-card video,
        .course-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 4px;
        }

        .course-card h2 {
            font-size: 1.1rem;
            margin: 10px 0;
            color: #FF6600;
        }

        .course-card p {
            font-size: 0.9rem;
            color: #666;
        }
    </style>

    <section class="courses">
        <div class="course-grid">
            <?php if ($videos): ?>
                <?php foreach ($videos as $video): 
                    $video_url = esc_url($upload_dir . $video->video);
                    $poster_url = esc_url($upload_dir . $video->video . '.jpg'); // Assuming poster named same as video
                    $final_poster = @get_headers($poster_url)[0] === 'HTTP/1.1 200 OK' ? $poster_url : $default_poster;
                    ?>
                    <div class="course-card">
                        <video preload="metadata" controls>
                            <source src="<?php echo $video_url; ?>" type="video/mp4">
                        </video>
                        <h2><?php echo esc_html($video->name); ?></h2>
                        <p>Uploaded on <?php echo date('F j, Y', strtotime($video->created_at)); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No videos found.</p>
            <?php endif; ?>
        </div>
    </section>
    <?php

    // Return the buffered output
    return ob_get_clean();
}
