<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( cozy_addons_premium_access() ) {
	if ( ! class_exists( 'CT_Custom_Fonts_Menu' ) ) :
		class CT_Custom_Fonts_Menu {

			public function __construct() {
				add_action( 'admin_menu', array( $this, 'register_ct_custom_fonts_menus' ), 11 );
			}

			public function register_ct_custom_fonts_menus() {
				add_submenu_page(
					'_cozy_companions',
					'CT Custom Fonts',
					'CT Custom Fonts',
					'manage_options',
					'_ct_custom_fonts',
					'ct_custom_options_dashboard_page'
				);

				// Register and sanitize the plugin settings
				function ct_custom_options_init() {
					register_setting(
						'custom_options_settings_group', // Option group
						'custom_options_settings', // Option name
						'custom_options_sanitize' // Sanitization callback
					);
				}
				add_action( 'admin_init', 'ct_custom_options_init' );

				// Sanitization callback function
				function custom_options_sanitize( $input ) {
					return $input;
				}

				// Callback function to render the custom options dashboard page
				function ct_custom_options_dashboard_page() {

					include_once 'ct-google-fonts.php';
					$ct_fonts        = ct_google_fonts();
					$ct_fonts_weight = array(
						'100' => 'Thin',
						'200' => 'Extra Light',
						'300' => 'Light',
						'400' => 'Regular',
						'500' => 'Medium',
						'600' => 'Semi Bold',
						'700' => 'Bold',
						'800' => 'Extra Bold',
						'900' => 'Black',
					);
					?>
					<div class="wrap">
						<h1><?php echo __( 'Custom Options Dashboard', 'cozy-addons' ); ?></h1>
						<?php if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == 'true' ) { ?>
							<div class="notice notice-success is-dismissible">
								<p>
								<?php
								_e( 'Saved successfully.', 'cozy-addons' );

								?>
									</p>
							</div>
							<?php
						}
						?>

						<form method="post" action="options.php">
							<?php settings_fields( 'custom_options_settings_group' ); ?>
							<?php $options = get_option( 'custom_options_settings' ); ?>

							<h2><?php echo __( 'Choose Fonts Family:', 'cozy-addons' ); ?></h2>
							<table class="form-table">
								<tr>
									<th scope="row"><label for="font_family"><?php echo __( 'Headings', 'cozy-adddons' ); ?></label></th>
									<td width="50">
										<select name="custom_options_settings[ct_heading_fonts]" id="ct_heading_fonts">
											<option><?php echo __( 'Select Font', 'cozy-addons' ); ?></option>
											<?php foreach ( $ct_fonts as $headeing_font_value => $heading_font_label ) { ?>
												<option value="<?php echo esc_attr( $headeing_font_value ); ?>" <?php selected( isset( $options['ct_heading_fonts'] ) && $options['ct_heading_fonts'] === $headeing_font_value ); ?>><?php echo esc_html( $heading_font_label ); ?></option>
											<?php } ?>
										</select>
									</td>
									<td>
										<select name="custom_options_settings[ct_heading_font_weight]" id="ct_heading_font_weight">
											<option><?php echo __( 'Select Font Weight', 'cozy-addons' ); ?></option>
											<?php foreach ( $ct_fonts_weight as $heading_fontweight_value => $heading_fontweight_label ) { ?>
												<option value="<?php echo esc_attr( $heading_fontweight_value ); ?>" <?php selected( isset( $options['ct_heading_font_weight'] ) && $options['ct_heading_font_weight'] == $heading_fontweight_value ); ?>><?php echo esc_html( $heading_fontweight_label ); ?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<th scope="row"><label for="font_family"><?php echo __( 'Body', 'cozy-addons' ); ?></label></th>
									<td width="50">
										<select name="custom_options_settings[ct_body_fonts]" id="ct_body_fonts">
											<option><?php echo __( 'Select Font', 'cozy-addons' ); ?></option>
											<?php foreach ( $ct_fonts as $body_font_value => $body_font_label ) { ?>
												<option value="<?php echo esc_attr( $body_font_value ); ?>" <?php selected( isset( $options['ct_body_fonts'] ) && $options['ct_body_fonts'] === $body_font_value ); ?>><?php echo esc_html( $body_font_label ); ?></option>
											<?php } ?>
										</select>
									</td>
									<td>
										<select name="custom_options_settings[ct_body_font_weight]" id="ct_body_font_weight">
											<option><?php echo __( 'Select Font Weight', 'cozy-addons' ); ?></option>
											<?php foreach ( $ct_fonts_weight as $body_fontweight_value => $body_fontweight_label ) { ?>
												<option value="<?php echo esc_attr( $body_fontweight_value ); ?>" <?php selected( isset( $options['ct_body_font_weight'] ) && $options['ct_body_font_weight'] == $body_fontweight_value ); ?>><?php echo esc_html( $body_fontweight_label ); ?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
							</table>

							<?php submit_button(); ?>
						</form>

					</div>
					<?php
				}
			}
		}
		$CT_Custom_fontsMenu = new CT_Custom_Fonts_Menu();
	endif;

	// Retrieve the custom options settings

	// Enqueue the selected font family from Google Fonts and add CSS styles for headings
	function cozy_addons_enqueue_custom_google_font() {
		$theme                  = wp_get_theme();
		$main_stylesheet_id     = $theme->get_stylesheet() . '-style';
		$options                = get_option( 'custom_options_settings' );
		$ct_heading_font_family = isset( $options['ct_heading_fonts'] ) ? $options['ct_heading_fonts'] : '';
		$ct_heading_font_weight = isset( $options['ct_heading_font_weight'] ) ? $options['ct_heading_font_weight'] : '';
		$ct_body_font_family    = isset( $options['ct_body_fonts'] ) ? $options['ct_body_fonts'] : '';
		$ct_body_font_weight    = isset( $options['ct_body_font_weight'] ) ? $options['ct_body_font_weight'] : '';
		if ( ! empty( $ct_heading_font_family ) ) {
			wp_enqueue_style( 'ct-custom-googlefonts', 'https://fonts.googleapis.com/css?family=' . esc_attr( $ct_heading_font_family ) . ':100,200,300,400,500,600,700,800,900' );
			$ct_jcustom_heading_css = "
            h1, h2, h3, h4, h5, h6 {
                font-family: '{$ct_heading_font_family}', sans-serif;
                font-weight: {$ct_heading_font_weight};
            }
            body {
                font-family: '{$ct_body_font_family}', sans-serif;
                font-weight: {$ct_body_font_weight};
            }
        ";
			if ( wp_style_is( $main_stylesheet_id, 'enqueued' ) ) {
				wp_add_inline_style( $main_stylesheet_id, $ct_jcustom_heading_css );
			}
		}
	}
	add_action( 'wp_enqueue_scripts', 'cozy_addons_enqueue_custom_google_font', 99 );
}
