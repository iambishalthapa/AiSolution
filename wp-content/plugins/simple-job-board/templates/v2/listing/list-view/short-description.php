<?php
/**
 * The template for displaying job short description in list view
 *
 * Override this template by copying it to yourtheme/simple_job_board/listing/list-view/short-description.php
 *
 * @author      PressTigers
 * @package     Simple_Job_Board
 * @subpackage  Simple_Job_Board/templates/listing/list-view
 * @version     2.0.0
 * @since       2.2.3
 * @since       2.3.0   Added "sjb_list_view_short_description_template" filter.
 * @since       2.4.0   Revised whole HTML template
 */
ob_start();

if ('logo-detail' === get_option('job_board_listing') || 'without-logo' === get_option('job_board_listing')) {
    ?>

    <!-- View more content start
    ================================= -->
    <?php
    echo get_simple_job_board_template('listing/list-view/long-description.php');
    ?>
    <!-- View more content end
    ================================= -->

    <!-- Start Job Short Description 
    ================================================== -->
    <div class="job-description-list">
        <?php echo sjb_get_the_excerpt(); ?>
    </div>
    <!-- ==================================================
    End Job Short Description  -->

    <?php
}

$html = ob_get_clean();

/**
 * Modify the Job Listing -> Short Description Template. 
 *                                       
 * @since   2.3.0
 * 
 * @param   html    $html   Short Description HTML.                   
 */
echo apply_filters('sjb_list_view_short_description_template', $html);
