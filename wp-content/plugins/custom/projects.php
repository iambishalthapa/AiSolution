<?php
/**
 * Plugin name: AI-Solutions Projects
 * Description: Custom plugin made to save past projects/future projects in the database.
 */

// Register admin menu for adding projects
function aisolutions_add_project_menu()
{
    add_menu_page(
        'AI-Solutions Projects',
        'Add projects',
        'manage_options',
        'aisolutions_add_project',
        'aisolutions_add_project_callback',
        'dashicons-portfolio',
        20
    );
}
add_action('admin_menu', 'aisolutions_add_project_menu');

// Render the Add Project form
function aisolutions_add_project_callback()
{
    global $wpdb;

    if (isset($_POST['submit_project'])) {
        $project_name = sanitize_text_field($_POST['project_name']);
        $project_type = sanitize_text_field($_POST['project_type']);
        $project_status = sanitize_text_field($_POST['project_status']);
        $description = sanitize_textarea_field($_POST['description']);
        $start_date = sanitize_text_field($_POST['start_date']);
        $end_date = sanitize_text_field($_POST['end_date']);
        $image_id = '';

        if (!empty($_FILES['project_image']['name'])) {
            $upload_dir = wp_upload_dir();
            $upload_path = WP_CONTENT_DIR . '/projectsimages/';
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0755, true);
            }
            $file_name = basename($_FILES['project_image']['name']);
            $target_file = $upload_path . $file_name;
            if (move_uploaded_file($_FILES['project_image']['tmp_name'], $target_file)) {
                $image_id = content_url('projectsimages/' . $file_name);
            } else {
                echo "<div class='error'><p>Failed to upload image to projectsimages directory.</p></div>";
                $image_id = '';
            }
        }
        

        $table_name = $wpdb->prefix . 'custompost';
        $wpdb->insert(
            $table_name,
            array(
                'projectname' => $project_name,
                'projecttype' => $project_type,
                'projectstatus' => $project_status,
                'description' => $description,
                'startdate' => $start_date,
                'enddate' => $end_date,
                'image' => $image_id,
                'created_at' => current_time('mysql'),
                'updated_at' => current_time('mysql')
            )
        );

        echo "<div class='updated'><p>Project added successfully!</p></div>";
    }

    ?>
    <div class="wrap">
    <h1 class="wp-heading-inline">Add New Project</h1>
    <p>Use this form to add a new project with all necessary details.</p>
    <form method="post" enctype="multipart/form-data" style="max-width: 800px;">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="project_name">Project Name</label></th>
                    <td><input type="text" id="project_name" name="project_name" class="regular-text" required /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="project_type">Project Type</label></th>
                    <td>
                        <select id="project_type" name="project_type" class="regular-text">
                            <option value="past">Past</option>
                            <option value="future">Future</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="project_status">Project Status</label></th>
                    <td>
                        <select id="project_status" name="project_status" class="regular-text">
                            <option value="planned">Planned</option>
                            <option value="in-progress">In Progress</option>
                            <option value="completed">Completed</option>
                            <option value="on-hold">On Hold</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="description">Description</label></th>
                    <td><textarea id="description" name="description" class="large-text" rows="5" placeholder="Provide a detailed description of the project"></textarea></td>
                </tr>
                <tr>
                    <th scope="row"><label for="start_date">Start Date</label></th>
                    <td><input type="date" id="start_date" name="start_date" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="end_date">End Date</label></th>
                    <td><input type="date" id="end_date" name="end_date" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="project_image">Project Image</label></th>
                    <td>
                        <input type="file" id="project_image" name="project_image" />
                        <p class="description">Upload an image that represents the project (optional).</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <button type="submit" name="submit_project" class="button button-primary">Add Project</button>
        </p>
    </form>
</div>

<style>
    .form-table th {
        width: 20%;
        text-align: left;
        vertical-align: top;
        padding: 10px 0;
    }

    .form-table td {
        padding: 10px 0;
    }

    .form-table input[type="text"],
    .form-table textarea,
    .form-table select {
        width: 100%;
        max-width: 400px;
    }

    .form-table textarea {
        resize: vertical;
    }

    .wp-heading-inline {
        margin-bottom: 20px;
    }

    .button {
        padding: 10px 20px;
    }

    .form-table .description {
        font-size: 0.9em;
        color: #555;
    }
</style>

    <?php
}


// Register submenu for listing projects
function aisolutions_project_list_menu()
{
    add_submenu_page(
        'aisolutions_add_project',
        'Project List',
        'Project List',
        'manage_options',
        'aisolutions_project_list',
        'aisolutions_project_list_callback'
    );
}
add_action('admin_menu', 'aisolutions_project_list_menu');

// Display the project list with edit and delete options
// Display the project list with edit, delete options, and images
function aisolutions_project_list_callback()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'custompost';

    if (isset($_GET['action']) && $_GET['action'] === 'delete' && !empty($_GET['id'])) {
        $wpdb->delete($table_name, array('id' => intval($_GET['id'])));
        echo "<div class='updated'><p>Project deleted successfully!</p></div>";
    }

    if (isset($_POST['update_project'])) {
        $image_path = $_POST['existing_image']; // Keep existing image by default

        if (!empty($_FILES['project_image']['name'])) {
            $upload_dir = wp_upload_dir();
            $upload_path = WP_CONTENT_DIR . '/projectsimages/';
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0755, true);
            }
            $file_name = basename($_FILES['project_image']['name']);
            $target_file = $upload_path . $file_name;
            if (move_uploaded_file($_FILES['project_image']['tmp_name'], $target_file)) {
                $image_path = content_url('projectsimages/' . $file_name);
            }
        }

        $wpdb->update(
            $table_name,
            array(
                'projectname' => sanitize_text_field($_POST['project_name']),
                'projecttype' => sanitize_text_field($_POST['project_type']),
                'projectstatus' => sanitize_text_field($_POST['project_status']),
                'description' => sanitize_textarea_field($_POST['description']),
                'startdate' => sanitize_text_field($_POST['start_date']),
                'enddate' => sanitize_text_field($_POST['end_date']),
                'image' => $image_path,
            ),
            array('id' => intval($_POST['project_id']))
        );
        echo "<div class='updated'><p>Project updated successfully!</p></div>";
    }

    $projects = $wpdb->get_results("SELECT * FROM $table_name");
    $search_query = isset($_POST['search_query']) ? sanitize_text_field($_POST['search_query']) : '';
    $sql = "SELECT * FROM $table_name";
    if (!empty($search_query)) {
        $sql .= $wpdb->prepare(" WHERE projectname LIKE %s", '%' . $wpdb->esc_like($search_query) . '%');
    }
    $projects = $wpdb->get_results($sql);
    echo '<div class="wrap"><h1>Project List</h1>';
    echo '<form method="post" style="margin-bottom: 20px;">
            <input type="text" name="search_query" value="' . esc_attr($search_query) . '" placeholder="Search by project name..." />
            <button type="submit" class="button">Search</button>
          </form>';
    echo '<table class="widefat fixed" cellspacing="0">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Project Name</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>';
    foreach ($projects as $project) {
        echo '<tr>
                <td>';
        if ($project->image) {
            echo '<img src="' . esc_url($project->image) . '" style="width: 50px; height: auto;" />';
        }
        echo '</td>
                <td>' . esc_html($project->projectname) . '</td>
                <td>' . esc_html($project->projecttype) . '</td>
                <td>' . esc_html($project->projectstatus) . '</td>
                <td>' . esc_html($project->startdate) . '</td>
                <td>' . esc_html($project->enddate) . '</td>
                <td>
                    <a href="?page=aisolutions_project_list&action=edit&id=' . intval($project->id) . '">Edit</a> |
                    <a href="?page=aisolutions_project_list&action=delete&id=' . intval($project->id) . '" onclick="return confirm(\'Are you sure?\')">Delete</a>
                </td>
              </tr>';
    }
    echo '</tbody></table></div>';

    if (isset($_GET['action']) && $_GET['action'] === 'edit' && !empty($_GET['id'])) {
        $project = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", intval($_GET['id'])));
        if ($project) {
            ?>
            <div class="wrap">
                <h1>Edit Project</h1>
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="project_id" value="<?php echo intval($project->id); ?>" />
                    <table class="form-table">
                        <tr>
                            <th><label for="project_name">Project Name</label></th>
                            <td><input type="text" id="project_name" name="project_name"
                                    value="<?php echo esc_attr($project->projectname); ?>" required /></td>
                        </tr>
                        <tr>
                            <th><label for="project_type">Project Type</label></th>
                            <td>
                                <select id="project_type" name="project_type">
                                    <option value="past" <?php selected($project->projecttype, 'past'); ?>>Past</option>
                                    <option value="future" <?php selected($project->projecttype, 'future'); ?>>Future</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="project_status">Project Status</label></th>
                            <td><input type="text" id="project_status" name="project_status"
                                    value="<?php echo esc_attr($project->projectstatus); ?>" required /></td>
                        </tr>
                        <tr>
                            <th><label for="description">Description</label></th>
                            <td><textarea id="description"
                                    name="description"><?php echo esc_textarea($project->description); ?></textarea></td>
                        </tr>
                        <tr>
                            <th><label for="start_date">Start Date</label></th>
                            <td><input type="date" id="start_date" name="start_date"
                                    value="<?php echo esc_attr($project->startdate); ?>" /></td>
                        </tr>
                        <tr>
                            <th><label for="end_date">End Date</label></th>
                            <td><input type="date" id="end_date" name="end_date"
                                    value="<?php echo esc_attr($project->enddate); ?>" /></td>
                        </tr>
                        <tr>
                            <th><label for="project_image">Project Image</label></th>
                            <td>
                                <input type="file" id="project_image" name="project_image" />
                                <?php if ($project->image): ?>
                                    <p>Current Image: <img src="<?php echo esc_url($project->image); ?>"
                                            style="width: 100px; height: auto;" /></p>
                                    <input type="hidden" name="existing_image" value="<?php echo esc_url($project->image); ?>" />
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                    <?php submit_button('Update Project', 'primary', 'update_project'); ?>
                </form>
            </div>
            <?php
        }
    }
}

// Fetch projects by type
// Fetch projects by type from the database
// Shortcode to display only "past" projects
function aisolutions_display_past_projects()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'custompost';

    // Fetch past projects
    $projects = $wpdb->get_results("SELECT * FROM $table_name WHERE projecttype = 'past'");

    if (empty($projects)) {
        return "<p>No past projects found.</p>";
    }

    $output = '<div class="course-list">
    <style>
   .course-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    font-family: Poppins, Arial, sans-serif;
    justify-content: center; /* Ensures cards align to the left */
    margin: 0 auto; /* Center alignment if the container is smaller than the screen width */
    padding: 10px; /* Adds padding around the container */
}

.course-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 16px;
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 16px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    min-width: 250px;
    max-width: 300px;
    flex-grow: 1; /* Allows cards to resize evenly */
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.course-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.course-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 8px;
}

.course-content {
    text-align: center;
}

.course-content h3 {
    font-size: 20px;
    color: #333;
    font-weight: 700;
    margin: 0 0 10px;
}

.course-details {
    font-size: 14px;
    color: #555;
    margin-bottom: 10px;
    display: none;
}

.more-btn {
    padding: 10px 15px;
    background-color: rgb(79,67,255);
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.2s ease;
}

.more-btn:hover {
    background-color:rgb(79,67,255); /* Slightly darker orange for hover */
    color: white;
}

@media (max-width: 768px) {
    .course-list {
        justify-content: center; /* Center-align the cards on smaller screens */
        gap: 15px; /* Reduce gap for better spacing on smaller screens */
    }
    .course-card {
        min-width: 100%;
        max-width: 100%;
    }
    .course-card img {
        height: auto;
    }
}

    </style>';
    foreach ($projects as $index => $project) {
        $output .= '<div class="course-card">';
        if ($project->image) {
            $output .= '<img src="' . esc_url($project->image) . '" alt="' . esc_attr($project->projectname) . '">';
        }
        $output .= '<div class="course-content">';
        $output .= '<h3>' . esc_html($project->projectname) . '</h3>';
        $output .= '<div class="course-details" id="past-details-' . $index . '">';
        $output .= '<p><strong>Status:</strong> ' . esc_html($project->projectstatus) . '</p>';
        $output .= '<p>' . esc_html($project->description) . '</p>';
        $output .= '<p><strong>Start Date:</strong> ' . esc_html($project->startdate) . '</p>';
        $output .= '</div>';
        $output .= '<button class="more-btn" onclick="toggleDetails(\'past\', ' . $index . ', this)">Read More</button>';
        $output .= '</div>';
        $output .= '</div>';
    }

    $output .= '</div>';
    
    $output .= project_toggle_script(); // Shared toggle script

    return $output;
}
add_shortcode('aisolutions_past_projects', 'aisolutions_display_past_projects');

function aisolutions_display_future_projects()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'custompost';

    // Fetch future projects
    $projects = $wpdb->get_results("SELECT * FROM $table_name WHERE projecttype = 'future'");

    if (empty($projects)) {
        return "<p>No future projects found.</p>";
    }

    $output = '<div class="course-list">';

    foreach ($projects as $index => $project) {
        $output .= '<div class="course-card">';
        if ($project->image) {
            $output .= '<img src="' . esc_url($project->image) . '" alt="' . esc_attr($project->projectname) . '">';
        }
        $output .= '<div class="course-content">';
        $output .= '<h3>' . esc_html($project->projectname) . '</h3>';
        $output .= '<div class="course-details" id="future-details-' . $index . '">';
        $output .= '<p><strong>Status:</strong> ' . esc_html($project->projectstatus) . '</p>';
        $output .= '<p>' . esc_html($project->description) . '</p>';
        $output .= '<p><strong>Start Date:</strong> ' . esc_html($project->startdate) . '</p>';
        $output .= '</div>';
        $output .= '<button class="more-btn" onclick="toggleDetails(\'future\', ' . $index . ', this)">Read More</button>';
        $output .= '</div>';
        $output .= '</div>';
    }

    $output .= '</div>';
    $output .= project_toggle_script(); // Shared toggle script

    return $output;
}
add_shortcode('aisolutions_future_projects', 'aisolutions_display_future_projects');

function project_toggle_script()
{
    return '<script>
        function toggleDetails(type, index, button) {
            const details = document.getElementById(type + "-details-" + index);
            const isVisible = details.style.display === "block";
            details.style.display = isVisible ? "none" : "block";
            button.textContent = isVisible ? "Read More" : "Read Less";
        }
    </script>';
}




// Shortcode to display all projects with name, photo, and start date

function aisolutions_display_longest_projects()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'custompost';

    // Fetch projects with both start and end dates
    $projects = $wpdb->get_results("SELECT * FROM $table_name WHERE startdate IS NOT NULL AND enddate IS NOT NULL");

    // Calculate duration for each project and store it with project details
    $projects_with_duration = [];
    foreach ($projects as $project) {
        $start_date = strtotime($project->startdate);
        $end_date = strtotime($project->enddate);

        if ($end_date && $start_date && $end_date > $start_date) {
            $duration = $end_date - $start_date;
            $projects_with_duration[] = (object) array_merge((array) $project, ['duration' => $duration]);
        }
    }

    // Sort projects by duration in descending order
    usort($projects_with_duration, function ($a, $b) {
        return $b->duration <=> $a->duration;
    });

    // Get the top 2 projects with the longest duration
    $top_projects = array_slice($projects_with_duration, 0, 2);

    // Generate output for the shortcode
    if (empty($top_projects)) {
        return "<p>No projects found with valid start and end dates.</p>";
    }

   

    foreach ($top_projects as $index => $project) {
        $output .= '<div class="course-card">';
        if ($project->image) {
            $output .= '<img src="' . esc_url($project->image) . '" alt="' . esc_attr($project->projectname) . '">';
        }
        $output .= '<div class="course-content">';
        $output .= '<h3>' . esc_html($project->projectname) . '</h3>';
        $output .= '<div class="course-details" id="details-' . $index . '">';
        $output .= '<p><strong>Status:</strong> ' . esc_html($project->projectstatus) . '</p>';
        $output .= '<p>' . esc_html($project->description) . '</p>';
        $output .= '<p><strong>Start Date:</strong> ' . esc_html($project->startdate) . '</p>';
        $output .= '<p><strong>Duration:</strong> ' . round($project->duration / (60 * 60 * 24)) . ' days</p>';
        $output .= '</div>';
        $output .= '<button class="more-btn" onclick="toggleDetails(' . $index . ', this)">Read More</button>';
        $output .= '</div>';
        $output .= '</div>';
    }

    $output .= '</div>';

    $output .= '<script>
        function toggleDetails(index, button) {
            const details = document.getElementById("details-" + index);
            const isVisible = details.style.display === "block";
            details.style.display = isVisible ? "none" : "block";
            button.textContent = isVisible ? "Read More" : "Read Less";
        }
    </script>';

    return $output;
}

add_shortcode('topprojects', 'aisolutions_display_longest_projects');
?>
