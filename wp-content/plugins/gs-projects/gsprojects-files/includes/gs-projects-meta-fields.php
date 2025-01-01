<?php 
/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
if ( ! function_exists('add_gs_projects_metaboxes') ) {
	
	function add_gs_projects_metaboxes(){
		add_meta_box('gsProjectsSection', 'Project\'s Additioinal Info' ,'gs_projects_cmb_cb', 'gs_projects', 'normal', 'high');
	}
	add_action('add_meta_boxes', 'add_gs_projects_metaboxes');
}

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
if ( ! function_exists('gs_projects_cmb_cb') ) {
	function gs_projects_cmb_cb($post){

		// Add a nonce field so we can check for it later.
		wp_nonce_field( 'gs_projects_nonce_name', 'gs_projects_cmb_token' );

		/*
		 * Use get_post_meta() to retrieve an existing value
		 * from the database and use the value for the form.
		 */
		$gs_skil = get_post_meta( $post->ID, '_gs_skil', true );
		$gs_url = get_post_meta( $post->ID, '_gs_url', true );
		$gs_crev = get_post_meta( $post->ID, '_gs_crev', true );
		$gs_crat = get_post_meta( $post->ID, '_gs_crat', true );

		?>
		<div class="gs_projects-metafields">
			<div style="height: 20px;"></div>
            <div class="form-group">
				<label for="gsSkil">Skills</label>
				<input type="text" id="gsSkil" class="form-control" name="gs_skil" value="<?php echo isset($gs_skil) ? esc_attr($gs_skil) : ''; ?>">
			</div>
			<div class="form-group">
				<label for="gsUrl">Project URL</label>
				<input type="text" id="gsUrl" class="form-control" name="gs_url" value="<?php echo isset($gs_url) ? esc_attr($gs_url) : ''; ?>">
			</div>
			<div class="form-group">
				<label for="gsCrev">Client Review</label>
				<input type="text" id="gsCrev" class="form-control" name="gs_crev" value="<?php echo isset($gs_crev) ? esc_attr($gs_crev) : ''; ?>">
			</div>
			<div class="form-group">
				<label for="gsCrat">Client Rating</label>
				<input type="text" id="gsCrat" class="form-control" name="gs_crat" value="<?php echo isset($gs_crat) ? esc_attr($gs_crat) : ''; ?>">
			</div>
		</div>

		<?php
	}
}


/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */

if ( ! function_exists('save_gs_projects_metadata') ) {

	function save_gs_projects_metadata($post_id) {

		/*
		 * We need to verify this came from our screen and with proper authorization,
		 * because the save_post action can be triggered at other times.
		 */

		// Check if our nonce is set.
		if ( ! isset( $_POST['gs_projects_cmb_token'] ) ) {
			return;
		}

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $_POST['gs_projects_cmb_token'], 'gs_projects_nonce_name' ) ) {
			return;
		}

		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// Check the user's permissions.
		if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return;
			}

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return;
			}
		}

		/* OK, it's safe for us to save the data now. */
		
		// Make sure that it is set.
		if ( ! isset( $_POST['gs_skil'] ) ) {
			return;
		}	
		// Make sure that it is set.
		if ( ! isset( $_POST['gs_url'] ) ) {
			return;
		}	
		// Make sure that it is set.
		if ( ! isset( $_POST['gs_crev'] ) ) {
			return;
		}	
		// Make sure that it is set.
		if ( ! isset( $_POST['gs_crat'] ) ) {
			return;
		}	

		// Sanitize user input.
		$gs_skil_data = sanitize_text_field( $_POST['gs_skil'] );
		$gs_url_data = sanitize_text_field( $_POST['gs_url'] );
		$gs_crev_data = sanitize_text_field( $_POST['gs_crev'] );
		$gs_crat_data = sanitize_text_field( $_POST['gs_crat'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, '_gs_skil', $gs_skil_data );
		update_post_meta( $post_id, '_gs_url', $gs_url_data );
		update_post_meta( $post_id, '_gs_crev', $gs_crev_data );
		update_post_meta( $post_id, '_gs_crat', $gs_crat_data );
	}
	add_action( 'save_post', 'save_gs_projects_metadata');
}