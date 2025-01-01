<?php
/*
 * GS Projects - Theme One (1)
 * Description :
 *      Short Des.          =   Square Image. Text content on Hover.
 *      Post Column         =   1 Column per post. (square image content, Hover, display info content.)
 *      Post Row            =   1 row
 *      Image Size          =   Standard full size.
 *      Image Hover         =   Yes
 *      Hover Effect        =   Background black shadow and info text
 *      Read More action    =   Single Project Template
 * @author GS Plugins <hello@gsplugins.com>
 *
 */

$output .= '<div class="container">';
$output .= '<div class="row clearfix gs_projects" id="gs_projects'.get_the_id().'">';

    if ( $GLOBALS['gs_projects_loop']->have_posts() ) {
        while ( $GLOBALS['gs_projects_loop']->have_posts() ) {
            $GLOBALS['gs_projects_loop']->the_post();
            $gs_projects_id = get_post_thumbnail_id();
            $gs_projects_url = wp_get_attachment_image_src($gs_projects_id, 'full', true);
            $projects_thumb = $gs_projects_url[0];
            $gs_projects_alt = get_post_meta($gs_projects_id,'_wp_attachment_image_alt',true);
            $gs_project_title = get_the_title();
            $gs_project_desc = strip_tags( get_the_content() );
            $gs_project_desc_link = get_the_permalink();
            $gs_project_desc = (strlen($gs_project_desc) > 50) ? substr($gs_project_desc,0, $desc_limit ).'...<a href="'.$gs_project_desc_link.'">more</a>' : $gs_project_desc;
            $gs_project_meta = get_post_meta( get_the_id() );

            $skill = !empty($gs_project_meta['_gs_skil'][0]) ? $gs_project_meta['_gs_skil'][0] : '';
            $proj_url = !empty($gs_project_meta['_gs_url'][0]) ? $gs_project_meta['_gs_url'][0] : '';
            $crev = !empty($gs_project_meta['_gs_crev'][0]) ? $gs_project_meta['_gs_crev'][0] : '';
            $crat = !empty($gs_project_meta['_gs_crat'][0]) ? $gs_project_meta['_gs_crat'][0] : '';

            $output .= '<div class="col-md-'.$cols.' col-sm-6 col-xs-6">';
                $output .= '<div class="single-project">'; // start single project
                    if ( has_post_thumbnail() )
                        $output .= '<img src="'. $projects_thumb .'" alt="'. $gs_projects_alt .'" />';
                    else {
                        $output .= '<img src="' . GSPROJECTS_FILES_URI . '/assets/img/no_img.png" class=""/>';
                    }

                    $output .= '<div class="single-project-desc-info">'; // start desc & info text
                        if ( !empty( $gs_project_desc ) && 'on' ==  $gs_project_details ) :
                            $output.= '<div class="gs-project-desc">'. $gs_project_desc .'</div>';
                        endif;

                        $output .= '<div class="gs-projects-info">';
                            if ( !empty( $skill ) && 'on' ==  $gs_project_skill ) :
                                $output.= '<div class="gs-project-skill"><span class="project-skill-label">Skills : </span><span>'. $skill .'</span></div>';
                            endif; 
                        $output .= '</div>';
                        
                    $output .= '</div>'; // end desc & info text
                $output .= '</div>'; // end single project
                    if ( !empty( $gs_project_title ) && 'on' ==  $gs_project_name ) :
                        $output.= '<div class="center project-name"><span class="gs-project-name">'. $gs_project_title .'</span></div>';
                    endif;
            $output .= '</div>'; // end col

        } // end while loop
        
    } // if loop end
    else { $output .= "No Projects Added!";  }

    wp_reset_postdata();

$output .= '</div>'; // end row
$output .= '</div>'; // end container
return $output;