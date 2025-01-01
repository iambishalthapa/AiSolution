<div class="working-hour-content">
	<?php 
	if( !empty($settings[ 'working_hour_sub_heading' ]) ){
		echo '<'.esc_attr($settings['sub_header_tag']).' class="sub-header content-block">'.esc_html($settings[ 'working_hour_sub_heading' ]).'</'.esc_attr($settings['sub_header_tag']).'>';
	}
	if( !empty($settings[ 'working_hour_heading' ]) ){
	 	echo '<'.esc_attr($settings['header_tag']).' class="header content-block">'.esc_html($settings[ 'working_hour_heading' ]).'</'.esc_attr($settings['header_tag']).'>';
	}
	if( !empty($settings[ 'working_hour_description' ]) ){
		if($settings['desc_text_position']=='below-heading'){
			echo '<div class="description content-block">'. esc_html($settings['working_hour_description']).'</div>';
		} 
	}?>
	
		<?php if ( $settings[ 'working_days_list' ] ) : ?>
			<ul class="days-list">
				<?php foreach( $settings[ 'working_days_list' ] as $day ) :
					echo '<li class="elementor-repeater-item-' . esc_attr( $day['_id'] ) . '">';?>
						<div class="list-content-holder">
							<div class="days"><?php 
							if($day['show_icon']=='yes'){
								echo '<span class="list-icon">';
									\Elementor\Icons_Manager::render_icon( $day['list_icon'], [ 'aria-hidden' => 'true' ] ); 
								echo '</span>';
							}
							echo esc_html($day[ 'name_of_day' ]); ?></div>
							<div class="seprator-line"></div>
							<div class="opening-hour"><?php echo esc_html($day[ 'working_hours' ]); ?></div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif;
		if( !empty($settings[ 'working_hour_description' ]) ){
			if($settings['desc_text_position']=='below-lists'){
				echo '<div class="description content-block">'. esc_html($settings['working_hour_description']).'</div>';
			}
		}
		?>

	

</div>

