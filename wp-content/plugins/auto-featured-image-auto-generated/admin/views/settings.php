<form method="post" action="options.php" id="atfit-settings">
    <?php 
settings_fields( 'auto-featured-image-auto-generated' );
?>
    <?php 
do_settings_sections( 'auto-featured-image-auto-generated' );
?>



    <div id="atfit">

        <div class="atfit-toolbar">
            <div class="atfit-toolbar-title">
                <?php 
echo esc_html__( 'Auto Featured Image', 'auto-featured-image-auto-generated' );
?>
                <small style="font-size: 12px;color: #999;">
                    v<?php 
echo esc_html( ATFIT_PLUGIN_VERSION );
?>
                </small>
                <div>

                    <?php 
// Only show if is PRO version and have more that 15 days of use
if ( $atfit_images_generated >= 50 ) {
    ?>
                        <div>
                            <small style="font-size: 12px;color: #999;">
                                <?php 
    echo sprintf( esc_html__( '%s images have been generated using this plugin.', 'auto-featured-image-auto-generated' ), $atfit_images_generated . " 🪄 " );
    ?>
                            </small>
                            <small class="atfit-rate" style="font-size: 12px;color: #999;">
                                <?php 
    $link = 'https://wordpress.org/support/plugin/auto-featured-image-auto-generated/reviews/?filter=5#new-post';
    echo sprintf( esc_html__( '%s', 'auto-featured-image-auto-generated' ), '❤️ <a href="' . esc_url( $link ) . '" target="_blank">
                                ' . esc_html__( 'Please rate it!', 'auto-featured-image-auto-generated' ) . '</a> 🙏 ' );
    echo esc_html__( 'It helps a lot. Thank you!', 'auto-featured-image-auto-generated' );
    ?>
                            </small>
                        </div>
                    <?php 
}
?>
                </div>
            </div>

            <div class="atfit-toolbar-actions">
                <button type="submit"><?php 
echo esc_html__( 'Save', 'auto-featured-image-auto-generated' );
?></button>
            </div>
        </div>
        <div class="atfit-columns">
            <div class="atfit-column">
                <div class="atfit-container">
                    <div id="atfit-tabs">
                        <ul title="<?php 
echo esc_html__( 'Navigate Tabs Using Left and Right Arrows', 'auto-featured-image-auto-generated' );
?>">
                            <li>
                                <a href="#text-settings" role="tab" aria-controls="text-settings"><?php 
echo esc_html__( 'Text', 'auto-featured-image-auto-generated' );
?>

                                </a>
                            </li>
                            <li>
                                <a href="#background-settings" role="tab" aria-controls="background-settings"><?php 
echo esc_html__( 'Image', 'auto-featured-image-auto-generated' );
?>

                                </a>
                            </li>
                            <li>
                                <a href="#advance" role="tab" aria-controls="advance"><?php 
echo esc_html__( 'Advance', 'auto-featured-image-auto-generated' );
?>

                                </a>
                            </li>
                            <li>
                                <a href="#system" role="tab" aria-controls="system"><?php 
echo esc_html__( 'System', 'auto-featured-image-auto-generated' );
?>

                                </a>
                            </li>
                        </ul>
                        <div id="text-settings" role="tabpanel">
                            <h2><?php 
echo esc_html__( 'Text Settings', 'auto-featured-image-auto-generated' );
?></h2>

                            <div class="atfit-input">
                                <label for="atfit_settings[print]"><?php 
echo esc_html__( 'Print', 'auto-featured-image-auto-generated' );
?></label>
                                <select name="atfit_settings[print]" id="atfit_settings[print]">
                                    <option value="title" <?php 
selected( $settings['print'], 'title' );
?>><?php 
echo esc_html__( 'Post Title', 'auto-featured-image-auto-generated' );
?></option>
                                    <?php 
?>
                                        <option value="" disabled <?php 
selected( $settings['print'], 'category' );
?>>
                                            <?php 
echo esc_html__( 'Primary Category', 'auto-featured-image-auto-generated' );
?>
                                            (<?php 
echo esc_html__( 'Only for PRO version', 'auto-featured-image-auto-generated' );
?>)
                                        </option>
                                        <option value="" disabled <?php 
selected( $settings['print'], 'excerpt' );
?>>
                                            <?php 
echo esc_html__( 'Post Excerpt', 'auto-featured-image-auto-generated' );
?>
                                            (<?php 
echo esc_html__( 'Only for PRO version', 'auto-featured-image-auto-generated' );
?>)
                                        </option>
                                        <option value="" disabled <?php 
selected( $settings['print'], 'title_and_excerpt' );
?>>
                                            <?php 
echo esc_html__( 'Post Title and Excerpt', 'auto-featured-image-auto-generated' );
?>
                                            (<?php 
echo esc_html__( 'Only for PRO version', 'auto-featured-image-auto-generated' );
?>)
                                        </option>
                                    <?php 
?>

                                    <option value="none" <?php 
selected( $settings['print'], 'none' );
?>><?php 
echo esc_html__( 'None', 'auto-featured-image-auto-generated' );
?></option>


                                </select>
                            </div>
                            <div class="atfit-input">
                                <label for="atfit_settings[font_size]"><?php 
echo esc_html__( 'Font Size', 'auto-featured-image-auto-generated' );
?></label>
                                <input type="range" name="atfit_settings[font_size]" id="atfit_settings[font_size]" min="1" max="5" step="0.1" value="<?php 
echo esc_attr( $settings['font_size'] );
?>" />
                            </div>

                            <div class="atfit-input">
                                <label for="atfit_settings[font_color]"><?php 
echo esc_html__( 'Font Color', 'auto-featured-image-auto-generated' );
?></label>
                                <input type="color" name="atfit_settings[font_color]" id="atfit_settings[font_color]" value="<?php 
echo esc_attr( $settings['font_color'] );
?>" />
                            </div>

                            <div class="atfit-input">
                                <label for="atfit_settings[font_family]"><?php 
echo esc_html__( 'Font Family', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
// Link to media library
$link = admin_url( 'upload.php' ) . "?mode=list&attachment-filter=post_mime_type%3Afont%2Fttf";
echo sprintf( esc_html__( 'Upload your fonts (.ttf) in your %s', 'auto-featured-image-auto-generated' ), '<a href="' . esc_url( $link ) . '" target="_blank">' . esc_html__( 'Media Library', 'auto-featured-image-auto-generated' ) . '</a>' );
?>
                                    </small>
                                </label>
                                <select name="atfit_settings[font_family]" id="atfit_settings[font_family]">
                                    <option value="arial" <?php 
selected( $settings['font_family'], 'arial' );
?>><?php 
echo esc_html__( 'Arial', 'auto-featured-image-auto-generated' );
?></option>
                                    <option value="arial-bold" <?php 
selected( $settings['font_family'], 'arial-bold' );
?>><?php 
echo esc_html__( 'Arial Bold', 'auto-featured-image-auto-generated' );
?></option>
                                    <option value="bangers" <?php 
selected( $settings['font_family'], 'bangers' );
?>><?php 
echo esc_html__( 'Bangers', 'auto-featured-image-auto-generated' );
?></option>
                                    <option value="fasterone" <?php 
selected( $settings['font_family'], 'fasterone' );
?>><?php 
echo esc_html__( 'Faster One', 'auto-featured-image-auto-generated' );
?></option>
                                    <option value="fugazone" <?php 
selected( $settings['font_family'], 'fugazone' );
?>><?php 
echo esc_html__( 'Fugaz One', 'auto-featured-image-auto-generated' );
?></option>
                                    <option value="monoton" <?php 
selected( $settings['font_family'], 'monoton' );
?>><?php 
echo esc_html__( 'Monoton', 'auto-featured-image-auto-generated' );
?></option>
                                    <option value="ubuntu-medium" <?php 
selected( $settings['font_family'], 'ubuntu-medium' );
?>><?php 
echo esc_html__( 'Ubuntu Medium', 'auto-featured-image-auto-generated' );
?></option>
                                    <option value="ubuntu-bold" <?php 
selected( $settings['font_family'], 'ubuntu-bold' );
?>><?php 
echo esc_html__( 'Ubuntu Bold', 'auto-featured-image-auto-generated' );
?></option>

                                    <optgroup label="<?php 
echo esc_html__( 'Custom Fonts', 'auto-featured-image-auto-generated' );
?> 
                                            <?php 
?>
                                            (<?php 
echo esc_html__( 'Unlocked in PRO version', 'auto-featured-image-auto-generated' );
?>)
                                            <?php 
?>
                                        ">
                                        <?php 
?>
                                            <?php 
foreach ( $fonts_family_availables as $font_family ) {
    ?>
                                                <option value="" disabled <?php 
    selected( $settings['font_family'], $font_family['id'] );
    ?>><?php 
    echo esc_html( $font_family['title'] );
    ?></option>
                                            <?php 
}
?>
                                        <?php 
?>
                                        <?php 
if ( count( $fonts_family_availables ) == 0 ) {
    ?>
                                            <option disabled value=""><?php 
    echo esc_html__( 'Custom fonts not available.', 'auto-featured-image-auto-generated' );
    ?></option>
                                        <?php 
}
?>
                                    </optgroup>

                                </select>
                            </div>



                            <div class="atfit-input">
                                <label for="atfit_settings[text_transform]"><?php 
echo esc_html__( 'Transform', 'auto-featured-image-auto-generated' );
?></label>
                                <select name="atfit_settings[text_transform]" id="atfit_settings[text_transform]">
                                    <option value="none" <?php 
selected( $settings['text_transform'], 'none' );
?>><?php 
echo esc_html__( 'None', 'auto-featured-image-auto-generated' );
?></option>
                                    <option value="uppercase" <?php 
selected( $settings['text_transform'], 'uppercase' );
?>><?php 
echo esc_html__( 'UPPECASE', 'auto-featured-image-auto-generated' );
?></option>
                                    <option value="lowercase" <?php 
selected( $settings['text_transform'], 'lowercase' );
?>><?php 
echo esc_html__( 'lowercase', 'auto-featured-image-auto-generated' );
?></option>
                                    <option value="capitalize" <?php 
selected( $settings['text_transform'], 'capitalize' );
?>><?php 
echo esc_html__( 'Capitalize', 'auto-featured-image-auto-generated' );
?></option>
                                </select>
                            </div>


                            <h2><?php 
echo esc_html__( 'Highlight Settings', 'auto-featured-image-auto-generated' );
?></h2>




                            <div class="atfit-input">
                                <label for="atfit_settings[highlight_color]"><?php 
echo esc_html__( 'Highlight Color', 'auto-featured-image-auto-generated' );
?></label>
                                <input type="color" name="atfit_settings[highlight_color]" id="atfit_settings[highlight_color]" value="<?php 
echo esc_attr( $settings['highlight_color'] );
?>" />
                            </div>
                            <div class="atfit-input">
                                <label for="atfit_settings[highlight_opacity]"><?php 
echo esc_html__( 'Highlight Opacity', 'auto-featured-image-auto-generated' );
?></label>
                                <input type="range" min="0" max="100" step="1" name="atfit_settings[highlight_opacity]" id="atfit_settings[highlight_opacity]" value="<?php 
echo esc_attr( $settings['highlight_opacity'] );
?>" />
                            </div>






                            <h2><?php 
echo esc_html__( 'Overlay Background Settings', 'auto-featured-image-auto-generated' );
?></h2>

                            <div class="atfit-input">
                                <label for="atfit_settings[background_color]"><?php 
echo esc_html__( 'Background Color', 'auto-featured-image-auto-generated' );
?></label>
                                <input type="color" name="atfit_settings[background_color]" id="atfit_settings[background_color]" value="<?php 
echo esc_attr( $settings['background_color'] );
?>" />
                            </div>

                            <div class="atfit-input">
                                <label for="atfit_settings[background_opacity]"><?php 
echo esc_html__( 'Background Opacity', 'auto-featured-image-auto-generated' );
?></label>
                                <input type="range" min="0" max="100" step="1" name="atfit_settings[background_opacity]" id="atfit_settings[background_opacity]" value="<?php 
echo esc_attr( $settings['background_opacity'] );
?>" />
                            </div>



                            <h2><?php 
echo esc_html__( 'Text Position Settings', 'auto-featured-image-auto-generated' );
?></h2>

                            <div class="atfit-input">
                                <label for="atfit_settings[text_position]"><?php 
echo esc_html__( 'Text Position', 'auto-featured-image-auto-generated' );
?></label>
                                <select name="atfit_settings[text_position]">
                                    <option value="top" <?php 
selected( $settings['text_position'], 'top' );
?>><?php 
echo esc_html__( 'Top', 'auto-featured-image-auto-generated' );
?></option>
                                    <option value="center" <?php 
selected( $settings['text_position'], 'center' );
?>><?php 
echo esc_html__( 'Center', 'auto-featured-image-auto-generated' );
?></option>
                                    <option value="bottom" <?php 
selected( $settings['text_position'], 'bottom' );
?>><?php 
echo esc_html__( 'Bottom', 'auto-featured-image-auto-generated' );
?></option>
                                    <option value="random" <?php 
selected( $settings['text_position'], 'random' );
?>><?php 
echo esc_html__( 'Random', 'auto-featured-image-auto-generated' );
?></option>



                                </select>
                            </div>
                            <?php 
?>

                            <!-- Top Offset -->
                            <div class="atfit-input">
                                <label for="atfit_settings[text_offset_top]"><?php 
echo esc_html__( 'Top Offset', 'auto-featured-image-auto-generated' );
?></label>
                                <input type="number" name="atfit_settings[text_offset_top]" id="atfit_settings[text_offset_top]" value="<?php 
echo esc_attr( $settings['text_offset_top'] );
?>" />
                            </div>

                            <!-- Left Offset -->
                            <div class="atfit-input">
                                <label for="atfit_settings[text_offset_left]"><?php 
echo esc_html__( 'Left Offset', 'auto-featured-image-auto-generated' );
?></label>
                                <input type="number" name="atfit_settings[text_offset_left]" id="atfit_settings[text_offset_left]" value="<?php 
echo esc_attr( $settings['text_offset_left'] );
?>" />
                            </div>



                        </div>

                        <div id="background-settings" role="tabpanel">
                            <h2><?php 
echo esc_html__( 'Background Settings', 'auto-featured-image-auto-generated' );
?></h2>
                            <div class="atfit-input">
                                <label for="atfit_settings[background_source]"><?php 
echo esc_html__( 'Image Source', 'auto-featured-image-auto-generated' );
?>
                                    <?php 
?>
                                        <small>
                                            <?php 
echo esc_html__( 'PRO Version allows you to use multiple sources.', 'auto-featured-image-auto-generated' );
?>
                                        </small>
                                    <?php 
?>
                                </label>
                                <select <?php 
?> name="atfit_settings[background_source][]">
                                    <?php 
foreach ( $background_source_availables as $key => $source ) {
    ?>
                                        <?php 
    ?>
                                            <?php 
    if ( $source['premium'] === false ) {
        ?>
                                                <option value="<?php 
        echo esc_attr( $key );
        ?>" <?php 
        selected( in_array( $key, $settings['background_source'] ) );
        ?>><?php 
        echo esc_html( $source['name'] );
        ?></option>
                                            <?php 
    } else {
        ?>
                                                <option value="" disabled><?php 
        echo esc_html( $source['name'] );
        ?> (<?php 
        echo esc_html__( 'Premium Feature', 'auto-featured-image-auto-generated' );
        ?>)</option>
                                            <?php 
    }
    ?>
                                        <?php 
    ?>
                                    <?php 
}
?>

                                </select>

                            </div>
                            <div class="atfit-input">
                                <label for="atfit_settings[background_source_query]"><?php 
echo esc_html__( 'Query', 'auto-featured-image-auto-generated' );
?></label>
                                <select name="atfit_settings[background_source_query]">
                                    <option value="title" <?php 
selected( $settings['background_source_query'], 'title' );
?>><?php 
echo esc_html__( 'Post Title', 'auto-featured-image-auto-generated' );
?></option>
                                    <option value="category" <?php 
selected( $settings['background_source_query'], 'category' );
?>><?php 
echo esc_html__( 'Primary Category', 'auto-featured-image-auto-generated' );
?></option>
                                    <option value="tag" <?php 
selected( $settings['background_source_query'], 'tag' );
?>><?php 
echo esc_html__( 'First Tag', 'auto-featured-image-auto-generated' );
?></option>
                                    <option value="custom" <?php 
selected( $settings['background_source_query'], 'custom' );
?>><?php 
echo esc_html__( 'Custom Query', 'auto-featured-image-auto-generated' );
?></option>
                                    <option value="custom-field" <?php 
selected( $settings['background_source_query'], 'custom-field' );
?>><?php 
echo esc_html__( 'Custom Field', 'auto-featured-image-auto-generated' );
?></option>
                                </select>
                            </div>
                            <div class="atfit-input">
                                <label for="atfit_settings[background_source_custom_query]"><?php 
echo esc_html__( 'Custom Query or Field', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
echo esc_html__( 'This will be used if you select "Custom Query" or "Custom Field" in the previous option.', 'auto-featured-image-auto-generated' );
?>
                                        <!-- Help link -->
                                        <?php 
$link = 'https://jodacame.dev/docs/auto-featured-image/settings-and-preview/#custom-query';
echo sprintf( esc_html__( 'See documentation %s', 'auto-featured-image-auto-generated' ), '<a href="' . esc_url( $link ) . '" target="_blank">' . esc_html__( 'here', 'auto-featured-image-auto-generated' ) . '</a>' );
?>

                                    </small>
                                </label>
                                <input type="text" name="atfit_settings[background_source_custom_query]" id="atfit_settings[background_source_custom_query]" value="<?php 
echo esc_attr( $settings['background_source_custom_query'] );
?>" placeholder="<?php 
echo esc_html__( 'Ex: Text, my_custom_field or ACF field name', 'auto-featured-image-auto-generated' );
?>" />
                            </div>

                            <div class="atfit-input">
                                <label for="atfit_settings[use_youtube_background]"><?php 
echo esc_html__( 'Use Youtube/Video as Image', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
echo esc_html__( 'If content has a Youtube video, it will be used as featured image instead of the selected source.', 'auto-featured-image-auto-generated' );
?>
                                    </small>
                                    <small>
                                        <?php 
echo esc_html__( 'Also can generate image from custom video from <video ...> tag (But requires a exec function enabled and ffmpeg installed. For youtube, it does not require this).', 'auto-featured-image-auto-generated' );
?>


                                    </small>
                                </label>
                                <input type="checkbox" name="atfit_settings[use_youtube_background]" id="atfit_settings[use_youtube_background]" value="1" <?php 
checked( $settings['use_youtube_background'], 1 );
?>>
                            </div>

                            <div class="atfit-input">
                                <label for="atfit_settings[unique_image]"><?php 
echo esc_html__( 'Unique Image', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
echo esc_html__( 'Will try to find a unique image for each post. This process can be slow.', 'auto-featured-image-auto-generated' );
?>
                                    </small>
                                </label>
                                <input type="checkbox" name="atfit_settings[unique_image]" id="atfit_settings[unique_image]" value="1" <?php 
checked( $settings['unique_image'], 1 );
?>>
                            </div>

                            <!-- flip_image -->
                            <div class="atfit-input">
                                <label for="atfit_settings[flip_image]"><?php 
echo esc_html__( 'Flip Image', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
echo esc_html__( 'Flip the image horizontally. Mirror effect.', 'auto-featured-image-auto-generated' );
?>
                                    </small>
                                </label>
                                <input type="checkbox" name="atfit_settings[flip_image]" id="atfit_settings[flip_image]" value="1" <?php 
checked( $settings['flip_image'], 1 );
?>>
                            </div>

                            <div class="atfit-input">
                                <label for="atfit_settings[slug_as_filename]"><?php 
echo esc_html__( 'Use Post Title as Filename', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
echo esc_html__( 'If enabled, the post title will be used as filename for the image. Good for SEO.', 'auto-featured-image-auto-generated' );
?>
                                    </small>
                                </label>
                                <input type="checkbox" name="atfit_settings[slug_as_filename]" id="atfit_settings[slug_as_filename]" value="1" <?php 
checked( $settings['slug_as_filename'], 1 );
?>>
                            </div>







                            <h2>
                                <?php 
echo esc_html__( 'External Services', 'auto-featured-image-auto-generated' );
?>
                            </h2>
                            <?php 
?>
                                <div class="atfit-alert atfit-alert-warning">
                                    <?php 
printf( esc_html__( 'You are using the free version of %s. Some features are disabled. %s', 'auto-featured-image-auto-generated' ), ATFIT_PLUGIN_NAME, '<a class="only-pro" href="' . ttfi_fs()->get_upgrade_url() . '">' . esc_html__( 'Upgrade to PRO', 'auto-featured-image-auto-generated' ) . '</a>' );
?>
                                </div>
                            <?php 
?>
                            <div class="atfit-input">
                                <label for="atfit_settings[happi_key]"><?php 
echo esc_html__( 'Happi.dev Key', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
printf( esc_html__( 'Get your Access Key %s', 'auto-featured-image-auto-generated' ), '<a target="_blank" href="https://dashboard.happi.dev/">here</a>' );
?>
                                    </small>
                                </label>
                                <input type="password" name="atfit_settings[happi_key]" id="atfit_settings[happi_key]" value="<?php 
echo esc_attr( $settings['happi_key'] );
?>" />
                            </div>

                            <div class="atfit-input">
                                <label for="atfit_settings[pixabay_apikey]"><?php 
echo esc_html__( 'Pixabay API Key', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
printf( esc_html__( 'Get your API Key %s', 'auto-featured-image-auto-generated' ), '<a target="_blank" href="https://pixabay.com/api/docs/">here</a>' );
?>
                                    </small>
                                </label>
                                <input <?php 
?> disabled <?php 
?> type="password" name="atfit_settings[pixabay_apikey]" id="atfit_settings[pixabay_apikey]" value="<?php 
echo esc_attr( $settings['pixabay_apikey'] );
?>" />
                            </div>
                            <div class="atfit-input">
                                <label for="atfit_settings[unsplash_apikey]"><?php 
echo esc_html__( 'Unsplash Access Key', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
printf( esc_html__( 'Get your Access Key %s', 'auto-featured-image-auto-generated' ), '<a target="_blank" href="https://unsplash.com/documentation">here</a>' );
?>
                                    </small>
                                </label>
                                <input <?php 
?> disabled <?php 
?> type="password" name="atfit_settings[unsplash_apikey]" id="atfit_settings[unsplash_apikey]" value="<?php 
echo esc_attr( $settings['unsplash_apikey'] );
?>" />
                            </div>
                            <div class="atfit-input">
                                <label for="atfit_settings[pexels_apikey]"><?php 
echo esc_html__( 'Pexels Access Key', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
printf( esc_html__( 'Get your Access Key %s', 'auto-featured-image-auto-generated' ), '<a target="_blank" href="https://www.pexels.com/api/new">here</a>' );
?>
                                    </small>
                                </label>
                                <input <?php 
?> disabled <?php 
?> type="password" name="atfit_settings[pexels_apikey]" id="atfit_settings[pexels_apikey]" value="<?php 
echo esc_attr( $settings['pexels_apikey'] );
?>" />
                            </div>
                            <div class="atfit-input">
                                <label for="atfit_settings[dalle_apikey]"><?php 
echo esc_html__( 'OpenAI Access Key', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
printf( esc_html__( 'Get your Access Key %s', 'auto-featured-image-auto-generated' ), '<a target="_blank" href="https://platform.openai.com/api-keys">here</a>' );
?>
                                    </small>
                                </label>
                                <input <?php 
?> disabled <?php 
?> type="password" name="atfit_settings[dalle_apikey]" id="atfit_settings[dalle_apikey]" value="<?php 
echo esc_attr( $settings['dalle_apikey'] );
?>" />
                            </div>
                            <div class="atfit-input">
                                <label for="atfit_settings[getimgai_apikey]"><?php 
echo esc_html__( 'GetImgAI API Key (Stable Diffusion)', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
printf( esc_html__( 'Get your Access Key %s', 'auto-featured-image-auto-generated' ), '<a target="_blank" href="https://getimg.ai/tools/api">here</a>' );
?>
                                    </small>
                                </label>
                                <input <?php 
?> disabled <?php 
?> type="password" name="atfit_settings[getimgai_apikey]" id="atfit_settings[getimgai_apikey]" value="<?php 
echo esc_attr( $settings['getimgai_apikey'] );
?>" />
                            </div>



                            <!-- Stable Diffusion: stability.ai -->
                            <div class="atfit-input">
                                <label for="atfit_settings[stabilityai_apikey]"><?php 
echo esc_html__( 'StabilityAI API Key (Stable Diffusion)', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
printf( esc_html__( 'Get your Access Key %s', 'auto-featured-image-auto-generated' ), '<a target="_blank" href="https://platform.stability.ai/account/keys">here</a>' );
?>
                                    </small>
                                </label>
                                <input <?php 
?> disabled <?php 
?> type="password" name="atfit_settings[stabilityai_apikey]" id="atfit_settings[stabilityai_apikey]" value="<?php 
echo esc_attr( $settings['stabilityai_apikey'] );
?>" />
                            </div>




                            <div class="atfit-input">
                                <label for="atfit_settings[dalle_prompt]"><?php 
echo esc_html__( 'AI Prompt', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <a href="https://kogui.app/c/jodacame.dev/auto-featured-image-auto-generated/understanding-prompts-for-ai-image-generation" target="_blank">Creating Images from Text. Max 250 characters.</a>
                                    </small>
                                    <small>
                                        <?php 
echo esc_html__( 'Use %query% variable to replace with the query.', 'auto-featured-image-auto-generated' );
?>
                                    </small>
                                </label>
                                <textarea maxlength="250" placeholder="A photo of a %query%" name="atfit_settings[dalle_prompt]" id="atfit_settings[dalle_prompt]" rows="5"><?php 
echo esc_attr( $settings['dalle_prompt'] );
?></textarea>
                            </div>


                            <div class="atfit-input">
                                <label for="atfit_settings[image_size]"><?php 
echo esc_html__( 'Image Size', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
echo esc_html__( 'Image dimensions in pixels.', 'auto-featured-image-auto-generated' );
?>
                                        <?php 
echo esc_html__( 'Make sure the image size is supported by the source.', 'auto-featured-image-auto-generated' );
?>
                                    </small>
                                </label>
                                <div class="input-group">
                                    <input type="number" required min="128" placeholder="<?php 
echo esc_html__( 'Width', 'auto-featured-image-auto-generated' );
?>" name="atfit_settings[image_size_width]" id="atfit_settings[image_size_width]" value="<?php 
echo esc_attr( $settings['image_size_width'] );
?>" />
                                    <span>x</span>
                                    <input type="number" required min="128" placeholder="<?php 
echo esc_html__( 'Height', 'auto-featured-image-auto-generated' );
?>" name="atfit_settings[image_size_height]" id="atfit_settings[image_size_height]" value="<?php 
echo esc_attr( $settings['image_size_height'] );
?>" />

                                </div>
                            </div>






                        </div>
                        <div id="advance" role="tabpanel">
                            <h2><?php 
echo esc_html__( 'Advance Settings', 'auto-featured-image-auto-generated' );
?></h2>
                            <div class="atfit-input">

                                <label for="atfit_settings[post_types]"><?php 
echo esc_html__( 'Post Types', 'auto-featured-image-auto-generated' );
?>
                                    <?php 
?>
                                        <small><?php 
echo esc_html__( 'Only available in PRO version', 'auto-featured-image-auto-generated' );
?></small>
                                    <?php 
?>
                                </label>
                                <select name="atfit_settings[post_types][]" id="atfit_settings[post_types]" multiple <?php 
?> disabled <?php 
?>>
                                    <?php 
foreach ( $post_types as $post_type ) {
    ?>
                                        <option value="<?php 
    echo esc_attr( $post_type->name );
    ?>" <?php 
    selected( in_array( $post_type->name, $settings['post_types'] ) );
    ?>><?php 
    echo esc_html( $post_type->label );
    ?></option>
                                    <?php 
}
?>
                                </select>
                            </div>


                            <div class="atfit-input">

                                <label for="atfit_settings[post_status]"><?php 
echo esc_html__( 'Post Status', 'auto-featured-image-auto-generated' );
?>
                                    <small><?php 
echo esc_html__( 'Enable for these post status', 'auto-featured-image-auto-generated' );
?></small>
                                </label>
                                <select name="atfit_settings[post_status][]" id="atfit_settings[post_status]" multiple>
                                    <?php 
foreach ( $posts_statuses as $status => $label ) {
    ?>
                                        <option value="<?php 
    echo esc_attr( $status );
    ?>" <?php 
    selected( in_array( $status, $settings['post_status'] ) );
    ?>><?php 
    echo esc_html( $label );
    ?></option>
                                    <?php 
}
?>
                                </select>
                            </div>

                            <!-- Post whit tags -->
                            <div class="atfit-input">
                                <label for="atfit_settings[post_with_tags]"><?php 
echo esc_html__( 'Post with Tags', 'auto-featured-image-auto-generated' );
?>
                                    <small><?php 
echo esc_html__( 'Enable for posts with these tags, leave empty to disable this feature', 'auto-featured-image-auto-generated' );
?></small>
                                </label>
                                <select name="atfit_settings[post_with_tags][]" id="atfit_settings[post_with_tags]" multiple>
                                    <?php 
foreach ( $tags as $tag ) {
    ?>
                                        <option value="<?php 
    echo esc_attr( $tag->term_id );
    ?>" <?php 
    selected( in_array( $tag->term_id, $settings['post_with_tags'] ) );
    ?>><?php 
    echo esc_html( $tag->name );
    ?></option>
                                    <?php 
}
?>
                                </select>
                            </div>

                            <!-- Post From Categories -->

                            <div class="atfit-input">
                                <label for="atfit_settings[post_from_categories]"><?php 
echo esc_html__( 'Post from Categories', 'auto-featured-image-auto-generated' );
?>
                                    <small><?php 
echo esc_html__( 'Enable for posts from these categories, leave empty to disable this feature', 'auto-featured-image-auto-generated' );
?></small>
                                </label>
                                <select name="atfit_settings[post_from_categories][]" id="atfit_settings[post_from_categories]" multiple>
                                    <?php 
foreach ( $categories as $category ) {
    ?>
                                        <option value="<?php 
    echo esc_attr( $category->term_id );
    ?>" <?php 
    selected( in_array( $category->term_id, $settings['post_from_categories'] ) );
    ?>><?php 
    echo esc_html( $category->name );
    ?></option>
                                    <?php 
}
?>
                                </select>
                            </div>







                            <div class="atfit-input">
                                <label for="atfit_settings[max_length]"><?php 
echo esc_html__( 'Max Length', 'auto-featured-image-auto-generated' );
?>
                                    <small><?php 
echo esc_html__( 'Max length of the text into the image.', 'auto-featured-image-auto-generated' );
?></small>
                                </label>
                                <input type="number" name="atfit_settings[max_length]" id="atfit_settings[max_length]" value="<?php 
echo esc_attr( $settings['max_length'] );
?>" />
                            </div>

                            <div class="atfit-input">
                                <label for="atfit_settings[prefix_text]"><?php 
echo esc_html__( 'Prefix Text', 'auto-featured-image-auto-generated' );
?>
                                    <?php 
?>
                                        <small><?php 
echo esc_html__( 'Only available in PRO version', 'auto-featured-image-auto-generated' );
?></small>
                                    <?php 
?>
                                </label>
                                <input type="text" name="atfit_settings[prefix_text]" id="atfit_settings[prefix_text]" <?php 
?> disabled <?php 
?> value="<?php 
echo esc_attr( $settings['prefix_text'] );
?>" />

                            </div>

                            <div class="atfit-input">
                                <label for="atfit_settings[suffix_text]"><?php 
echo esc_html__( 'Suffix Text', 'auto-featured-image-auto-generated' );
?>
                                    <?php 
?>
                                        <small><?php 
echo esc_html__( 'Only available in PRO version', 'auto-featured-image-auto-generated' );
?></small>
                                    <?php 
?>
                                </label>
                                <input type="text" name="atfit_settings[suffix_text]" id="atfit_settings[suffix_text]" <?php 
?> disabled <?php 
?> value="<?php 
echo esc_attr( $settings['suffix_text'] );
?>" />

                            </div>
                            <div class="atfit-input">
                                <label for="atfit_settings[title_connector]"><?php 
echo esc_html__( 'Title Connector', 'auto-featured-image-auto-generated' );
?>
                                    <?php 
?>
                                        <small><?php 
echo esc_html__( 'Only available in PRO version', 'auto-featured-image-auto-generated' );
?></small>
                                    <?php 
?>
                                </label>
                                <input type="text" name="atfit_settings[title_connector]" id="atfit_settings[title_connector]" <?php 
?> disabled <?php 
?> value="<?php 
echo esc_attr( $settings['title_connector'] );
?>" />

                            </div>

                            <!-- Custom Solid Color: Allow add multiples colors dinamically -->
                            <div class="atfit-input-rows">
                                <div class="rows">
                                    <label for="atfit_settings[custom_solid_color]"><?php 
echo esc_html__( 'Custom Solid Color', 'auto-featured-image-auto-generated' );
?>
                                        <small><?php 
echo esc_html__( 'Add a custom solid color, will use a random color from the list.', 'auto-featured-image-auto-generated' );
?></small>
                                        <small><?php 
echo esc_html__( 'This will be used if image source is "Custom Solid Color".', 'auto-featured-image-auto-generated' );
?></small>
                                    </label>
                                    <div class="right">
                                        <button type="button" class="button button-secondary atfit-add-custom-solid-color" onclick="atfit.addColor()"><?php 
echo esc_html__( 'Add', 'auto-featured-image-auto-generated' );
?></button>
                                    </div>

                                </div>
                                <div class="atfit-custom-solid-colors" id="atfit-custom-solid-colors">
                                    <?php 
if ( is_array( $settings['custom_solid_color'] ) ) {
    ?>
                                        <?php 
    foreach ( $settings['custom_solid_color'] as $color ) {
        ?>
                                            <div class="atfit-custom-solid-color">
                                                <input type="color" name="atfit_settings[custom_solid_color][]" value="<?php 
        echo esc_attr( $color );
        ?>" />
                                                <span class="remove dashicons dashicons-no" onclick="atfit.removeColor(this)"></span>
                                            </div>
                                        <?php 
    }
    ?>
                                    <?php 
}
?>
                                </div>

                            </div>
                            <!-- Enable Layers -->
                            <div class="atfit-input">
                                <label for="atfit_settings[enable_layers]"><?php 
echo esc_html__( 'Enable Layers', 'auto-featured-image-auto-generated' );
?>
                                    <small><?php 
echo esc_html__( 'Enable layers for the background image.', 'auto-featured-image-auto-generated' );
?></small>
                                    <small><?php 
printf( esc_html__( 'For more information %s', 'auto-featured-image-auto-generated' ), '<a href="https://kogui.app/c/jodacame.dev/auto-featured-image-auto-generated/layers" target="_blank">' . esc_html__( 'see documentation', 'auto-featured-image-auto-generated' ) . '</a>' );
?></small>
                                </label>
                                <?php 
?>
                                    <small><?php 
echo esc_html__( 'Only available in PRO version', 'auto-featured-image-auto-generated' );
?></small>
                                <?php 
?>
                            </div>


                            <!-- Enable AUTOMATIC1111 Stable Diffusion Access -->
                            <div class="atfit-input">
                                <label for="atfit_settings[enable_automatic_stable_diffusion]"><?php 
echo esc_html__( 'Enable AUTOMATIC1111 Stable Diffusion Source', 'auto-featured-image-auto-generated' );
?>
                                    <small><?php 
echo esc_html__( 'Enable AUTOMATIC1111 Stable Diffusion API Source.', 'auto-featured-image-auto-generated' );
?></small>
                                    <small><?php 
echo esc_html__( 'This is a advanced feature, required your own Stable Diffusion server.', 'auto-featured-image-auto-generated' );
?></small>
                                </label>
                                <?php 
?>
                                    <small><?php 
echo esc_html__( 'Only available in PRO version', 'auto-featured-image-auto-generated' );
?></small>
                                <?php 
?>
                            </div>

                            <!-- Enable AUTOMATIC1111 Settings if enabled -->
                            <?php 
if ( $settings['enable_automatic_stable_diffusion'] ) {
    ?>
                                <h2>
                                    <?php 
    echo esc_html__( 'AUTOMATIC1111 Stable Diffusion Server', 'auto-featured-image-auto-generated' );
    ?>
                                </h2>
                                <!-- URL -->
                                <div class="atfit-inputs">
                                    <div class="atfit-input">
                                        <label for="atfit_settings[automatic_stable_diffusion_url]"><?php 
    echo esc_html__( 'URL Server', 'auto-featured-image-auto-generated' );
    ?>
                                            <small><?php 
    echo esc_html__( 'URL to your Stable Diffusion server and save to enable more options.', 'auto-featured-image-auto-generated' );
    ?></small>
                                            <small><?php 
    echo esc_html__( 'Example: http://127.0.0.1', 'auto-featured-image-auto-generated' );
    ?></small>
                                        </label>
                                        <input type="text" name="atfit_settings[automatic_stable_diffusion_url]" id="atfit_settings[automatic_stable_diffusion_url]" value="<?php 
    echo esc_attr( $settings['automatic_stable_diffusion_url'] );
    ?>" />
                                    </div>
                                </div>

                                <!-- If URL is set, show more options -->
                                <?php 
    if ( $settings['automatic_stable_diffusion_url'] ) {
        ?>
                                    <h3>
                                        <?php 
        echo esc_html__( 'AUTOMATIC1111 Settings', 'auto-featured-image-auto-generated' );
        ?>
                                    </h3>
                                    <div class="atfit-inputs">
                                        <!-- Models from automatic_stable_diffusion_models -->
                                        <div class="atfit-input">
                                            <label for="atfit_settings[automatic_stable_diffusion_model]"><?php 
        echo esc_html__( 'Model', 'auto-featured-image-auto-generated' );
        ?>
                                                <small><?php 
        echo esc_html__( 'URL to your Stable Diffusion server and save to enable more options.', 'auto-featured-image-auto-generated' );
        ?></small>
                                            </label>
                                            <select name="atfit_settings[automatic_stable_diffusion_model]" id="atfit_settings[automatic_stable_diffusion_model]">
                                                <option value=""><?php 
        echo esc_html__( 'Select model', 'auto-featured-image-auto-generated' );
        ?></option>
                                                <?php 
        foreach ( $automatic_stable_diffusion_models as $model ) {
            ?>
                                                    <option value="<?php 
            echo esc_attr( $model['model_name'] );
            ?>" <?php 
            selected( $settings['automatic_stable_diffusion_model'], $model['model_name'] );
            ?>><?php 
            echo esc_html( $model['title'] );
            ?></option>
                                                <?php 
        }
        ?>
                                            </select>
                                        </div>
                                        <!-- Vae from automatic_stable_diffusion_vae_list -->
                                        <div class="atfit-input">
                                            <label for="atfit_settings[automatic_stable_diffusion_vae]"><?php 
        echo esc_html__( 'VAE', 'auto-featured-image-auto-generated' );
        ?>
                                                <small><?php 
        echo esc_html__( 'Preferred VAE.', 'auto-featured-image-auto-generated' );
        ?></small>
                                            </label>
                                            <select name="atfit_settings[automatic_stable_diffusion_vae]" id="atfit_settings[automatic_stable_diffusion_vae]">
                                                <option value=""><?php 
        echo esc_html__( 'None', 'auto-featured-image-auto-generated' );
        ?></option>
                                                <?php 
        foreach ( $automatic_stable_diffusion_vae_list as $model ) {
            ?>
                                                    <option value="<?php 
            echo esc_attr( $model['model_name'] );
            ?>" <?php 
            selected( $settings['automatic_stable_diffusion_vae'], $model['model_name'] );
            ?>><?php 
            echo esc_html( $model['model_name'] );
            ?></option>
                                                <?php 
        }
        ?>
                                            </select>
                                        </div>
                                        <!-- automatic_stable_diffusion_styles -->
                                        <div class="atfit-input">
                                            <label for="atfit_settings[automatic_stable_diffusion_style]"><?php 
        echo esc_html__( 'Style', 'auto-featured-image-auto-generated' );
        ?>
                                                <small><?php 
        echo esc_html__( 'Preferred Style.', 'auto-featured-image-auto-generated' );
        ?></small>
                                            </label>
                                            <select name="atfit_settings[automatic_stable_diffusion_style]" id="atfit_settings[automatic_stable_diffusion_style]">
                                                <option value=""><?php 
        echo esc_html__( 'None', 'auto-featured-image-auto-generated' );
        ?></option>
                                                <?php 
        foreach ( $automatic_stable_diffusion_styles as $model ) {
            ?>
                                                    <option value="<?php 
            echo esc_attr( $model['name'] );
            ?>" <?php 
            selected( $settings['automatic_stable_diffusion_style'], $model['name'] );
            ?>><?php 
            echo esc_html( $model['name'] );
            ?></option>
                                                <?php 
        }
        ?>
                                            </select>
                                        </div>

                                        <!-- Image Steps 5 to 100  / Slider -->
                                        <div class="atfit-input">
                                            <label for="atfit_settings[automatic_stable_diffusion_steps]"><?php 
        echo esc_html__( 'Image Steps', 'auto-featured-image-auto-generated' );
        ?>
                                                <small><?php 
        echo esc_html__( 'Number of steps to generate the image.', 'auto-featured-image-auto-generated' );
        ?></small>
                                            </label>
                                            <input type="range" name="atfit_settings[automatic_stable_diffusion_steps]" id="atfit_settings[automatic_stable_diffusion_steps]" min="5" max="100" value="<?php 
        echo esc_attr( $settings['automatic_stable_diffusion_steps'] );
        ?>" oninput="document.getElementById('atfit_settings[automatic_stable_diffusion_steps]-value').innerHTML = this.value;" />
                                            <span id="atfit_settings[automatic_stable_diffusion_steps]-value"><?php 
        echo esc_attr( $settings['automatic_stable_diffusion_steps'] );
        ?></span>
                                        </div>

                                        <!-- automatic_stable_diffusion_samplers -->
                                        <div class="atfit-input">
                                            <label for="atfit_settings[automatic_stable_diffusion_sampler]"><?php 
        echo esc_html__( 'Sampler', 'auto-featured-image-auto-generated' );
        ?>
                                                <small><?php 
        echo esc_html__( 'Preferred Sampler.', 'auto-featured-image-auto-generated' );
        ?></small>
                                            </label>
                                            <select name="atfit_settings[automatic_stable_diffusion_sampler]" id="atfit_settings[automatic_stable_diffusion_sampler]">
                                                <option value=""><?php 
        echo esc_html__( 'None', 'auto-featured-image-auto-generated' );
        ?></option>
                                                <?php 
        foreach ( $automatic_stable_diffusion_samplers as $model ) {
            ?>
                                                    <option value="<?php 
            echo esc_attr( $model['name'] );
            ?>" <?php 
            selected( $settings['automatic_stable_diffusion_sampler'], $model['name'] );
            ?>><?php 
            echo esc_html( $model['name'] );
            ?></option>
                                                <?php 
        }
        ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php 
    }
    ?>
                            <?php 
}
?>





                            <div class="atfit-input">
                                <label for="atfit_settings[reuse_local_image]"><?php 
echo esc_html__( 'Reuse Local Image', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
echo esc_html__( 'If enabled, the plugin will try to reuse local image if it exists. Only works with "Image Source: Local".', 'auto-featured-image-auto-generated' );
?>
                                    </small>
                                    <small style="color:orange">
                                        <?php 
echo esc_html__( 'Only enable this if you are using Local Image Source and you want to save disk space. Not compatible with multiple sources and other options.', 'auto-featured-image-auto-generated' );
?>
                                    </small>
                                    <small style="color:orange">
                                        <?php 
echo esc_html__( 'If this is enabled, the plugin will not try to find a new image for the post or generate a new one, will reuse the local image.', 'auto-featured-image-auto-generated' );
?>
                                    </small>
                                </label>
                                <input type="checkbox" name="atfit_settings[reuse_local_image]" id="atfit_settings[reuse_local_image]" value="1" <?php 
checked( $settings['reuse_local_image'], 1 );
?>>
                            </div>

                            <h2><?php 
echo esc_html__( 'Danger Zone', 'auto-featured-image-auto-generated' );
?></h2>
                            <div class="atfit-input">
                                <label for="atfit_settings[on_uninstall]"><?php 
echo esc_html__( 'On Uninstall', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
echo esc_html__( 'If you select "Delete All Data", all data (options and settings) will be deleted when you uninstall the plugin. Images will not be deleted.', 'auto-featured-image-auto-generated' );
?>
                                    </small>
                                </label>

                                <select name="atfit_settings[on_uninstall]" id="atfit_settings[on_uninstall]">
                                    <option value="delete" <?php 
selected( $settings['on_uninstall'], 'delete' );
?>><?php 
echo esc_html__( 'Delete All Data', 'auto-featured-image-auto-generated' );
?></option>
                                    <option value="keep" <?php 
selected( $settings['on_uninstall'], 'keep' );
?>><?php 
echo esc_html__( 'Keep All Data', 'auto-featured-image-auto-generated' );
?></option>
                                </select>

                            </div>
                        </div>

                        <div id="system" role="tabpanel">
                            <h2><?php 
echo esc_html__( 'System & Debug', 'auto-featured-image-auto-generated' );
?></h2>
                            <div class="atfit-input">
                                <strong><?php 
echo esc_html__( 'GD Library', 'auto-featured-image-auto-generated' );
?></strong>
                                <div>
                                    <?php 
if ( $system['gdlibrary'] ) {
    ?>
                                        <strong class="text-success"> <span class="dashicons dashicons-yes"></span> <?php 
    echo esc_html__( 'Enabled', 'auto-featured-image-auto-generated' );
    ?></strong>
                                    <?php 
} else {
    ?>
                                        <strong class="text-danger"> <span class="dashicons dashicons-no"></span> <?php 
    echo esc_html__( 'Disabled', 'auto-featured-image-auto-generated' );
    ?>

                                        </strong>
                                    <?php 
}
?>
                                </div>
                            </div>
                            <div class="atfit-input">
                                <strong>Function: <?php 
echo esc_html__( 'file_get_contents', 'auto-featured-image-auto-generated' );
?></strong>
                                <div>
                                    <?php 
if ( $system['file_get_contents'] ) {
    ?>
                                        <strong class="text-success"> <span class="dashicons dashicons-yes"></span> <?php 
    echo esc_html__( 'Enabled', 'auto-featured-image-auto-generated' );
    ?></strong>
                                    <?php 
} else {
    ?>
                                        <strong class="text-danger"> <span class="dashicons dashicons-no"></span> <?php 
    echo esc_html__( 'Disabled', 'auto-featured-image-auto-generated' );
    ?>

                                        </strong>
                                    <?php 
}
?>
                                </div>
                            </div>
                            <div class="atfit-input">
                                <strong>Multibyte String</strong>
                                <div>
                                    <?php 
if ( $system['multibyte_string'] ) {
    ?>
                                        <strong class="text-success"> <span class="dashicons dashicons-yes"></span> <?php 
    echo esc_html__( 'Enabled', 'auto-featured-image-auto-generated' );
    ?></strong>
                                    <?php 
} else {
    ?>
                                        <strong class="text-danger"> <span class="dashicons dashicons-no"></span> <?php 
    echo esc_html__( 'Disabled', 'auto-featured-image-auto-generated' );
    ?>

                                        </strong>
                                    <?php 
}
?>
                                </div>
                            </div>
                            <div class="atfit-input">
                                <label><?php 
echo esc_html__( 'ImageMagick Library', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
printf( esc_html__( 'For more information about ImageMagick, please visit %s', 'auto-featured-image-auto-generated' ), '<a href="https://www.php.net/manual/en/book.imagick.php" target="_blank">Book.imagick.php</a>' );
?>
                                    </small>
                                </label>
                                <div>
                                    <?php 
if ( $system['imagick'] ) {
    ?>
                                        <strong class="text-success"> <span class="dashicons dashicons-yes"></span> <?php 
    echo esc_html__( 'Enabled', 'auto-featured-image-auto-generated' );
    ?></strong>
                                    <?php 
} else {
    ?>
                                        <strong class="text-danger"> <span class="dashicons dashicons-no"></span> <?php 
    echo esc_html__( 'Disabled', 'auto-featured-image-auto-generated' );
    ?>

                                        </strong>
                                    <?php 
}
?>
                                </div>
                            </div>
                            <div class="atfit-input">
                                <label><?php 
echo esc_html__( 'Exec', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
printf( esc_html__( 'Optional. Allows the plugin to execute commands (ffmpeg) on the server. %s', 'auto-featured-image-auto-generated' ), '<a href="https://www.php.net/manual/en/function.exec.php" target="_blank">exec</a>' );
?>
                                    </small>
                                </label>
                                <div>
                                    <?php 
if ( $system['exec'] ) {
    ?>
                                        <strong class="text-success"> <span class="dashicons dashicons-yes"></span> <?php 
    echo esc_html__( 'Enabled', 'auto-featured-image-auto-generated' );
    ?></strong>
                                    <?php 
} else {
    ?>
                                        <strong class="text-danger"> <span class="dashicons dashicons-no"></span> <?php 
    echo esc_html__( 'Disabled', 'auto-featured-image-auto-generated' );
    ?>

                                        </strong>
                                    <?php 
}
?>
                                </div>
                            </div>
                            <div class="atfit-input">
                                <label><?php 
echo esc_html__( 'ffmpeg', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
printf( esc_html__( 'Optional. Allow extract frames from video. %s', 'auto-featured-image-auto-generated' ), '<a href="https://ffmpeg.org/" target="_blank">ffmpeg.org</a>' );
?>
                                    </small>
                                </label>
                                <div>
                                    <?php 
if ( $system['ffmpeg'] ) {
    ?>
                                        <strong class="text-success"> <span class="dashicons dashicons-yes"></span> <?php 
    echo esc_html__( 'Installed', 'auto-featured-image-auto-generated' );
    ?></strong>
                                    <?php 
} else {
    ?>
                                        <strong class="text-danger"> <span class="dashicons dashicons-no"></span> <?php 
    echo esc_html__( 'Not Installed', 'auto-featured-image-auto-generated' );
    ?>

                                        </strong>
                                    <?php 
}
?>
                                </div>
                            </div>
                            <div class="atfit-input">
                                <label><?php 
echo esc_html__( 'Media Library', 'auto-featured-image-auto-generated' );
?>
                                    <small><?php 
echo esc_html__( 'Number of images generated by the plugin', 'auto-featured-image-auto-generated' );
?></small>
                                </label>

                                <div>
                                    <?php 
if ( $system['media-library'] > 0 ) {
    ?>

                                        <strong class="text-success"> <span class="dashicons dashicons-yes"></span> <?php 
    echo intval( $system['media-library'] );
    ?> </strong> |
                                        <a href="<?php 
    echo esc_url( admin_url( 'upload.php?mode=list&attachment-filter=post_mime_type%3Aimage&atfit_source=all' ) );
    ?>">
                                            <?php 
    echo esc_html__( 'View All', 'auto-featured-image-auto-generated' );
    ?>
                                        </a>
                                    <?php 
} else {
    ?>
                                        <strong class="text-danger"> <span class="dashicons dashicons-no"></span> <?php 
    echo intval( $system['media-library'] );
    ?>

                                        </strong>
                                    <?php 
}
?>
                                </div>
                            </div>

                            <!-- Layers -->
                            <div class="atfit-input">
                                <label for="atfit_settings[layers]"><?php 
echo esc_html__( 'Layers', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
echo esc_html__( 'Layers available for the background image.', 'auto-featured-image-auto-generated' );
?>
                                    </small>
                                </label>
                                <div>
                                    <strong class="text-success"> <span class="dashicons dashicons-yes"></span> <?php 
echo intval( $system['layer-images'] );
?> </strong>
                                </div>
                            </div>
                            <div class="atfit-input">
                                <label><?php 
echo esc_html__( 'PRO Version', 'auto-featured-image-auto-generated' );
?>
                                    <small><?php 
echo esc_html__( 'Is PRO version active?', 'auto-featured-image-auto-generated' );
?></small>
                                </label>

                                <div>
                                    <?php 
?>
                                        <strong class="text-danger"> <span class="dashicons dashicons-no"></span> <?php 
echo esc_html__( 'No', 'auto-featured-image-auto-generated' );
?></strong> |
                                        <a href="<?php 
echo esc_url( ttfi_fs()->get_upgrade_url() );
?>">
                                            <?php 
echo esc_html__( 'Get PRO', 'auto-featured-image-auto-generated' );
?>
                                        </a>
                                    <?php 
?>
                                </div>
                            </div>


                            <h2><?php 
echo esc_html__( 'FAQ', 'auto-featured-image-auto-generated' );
?></h2>
                            <div class="atfit-input">
                                <label><?php 
echo esc_html__( 'How download pro version?', 'auto-featured-image-auto-generated' );
?>
                                    <small><?php 
echo esc_html__( 'Visit the website: https://users.freemius.com and download the plugin.', 'auto-featured-image-auto-generated' );
?></small>
                                </label>
                                <div>
                                    <a href="https://kogui.app/c/jodacame.dev/auto-featured-image-auto-generated/how-to-download-the-pro-version-of-the-plugin" target="_blank"><?php 
echo esc_html__( 'Read more', 'auto-featured-image-auto-generated' );
?></a>
                                </div>
                            </div>

                            <div class="atfit-input">
                                <label><?php 
echo esc_html__( 'How to install custom fonts?', 'auto-featured-image-auto-generated' );
?>
                                    <small><?php 
echo esc_html__( 'Only available in PRO version, upload your font in the plugin settings.', 'auto-featured-image-auto-generated' );
?></small>
                                </label>
                                <div>
                                    <a href="https://kogui.app/c/jodacame.dev/auto-featured-image-auto-generated/how-to-install-a-font-in-wordpress-with-auto-featured-image-pro" target="_blank"><?php 
echo esc_html__( 'Read more', 'auto-featured-image-auto-generated' );
?></a>
                                </div>
                            </div>

                            <!-- Layers -->
                            <div class="atfit-input">
                                <label><?php 
echo esc_html__( 'How to use layers?', 'auto-featured-image-auto-generated' );
?>
                                    <small>
                                        <?php 
echo esc_html__( 'Only available in PRO version, upload your image and set as layer.', 'auto-featured-image-auto-generated' );
?>
                                    </small>
                                </label>
                                <div>
                                    <a href="https://kogui.app/c/jodacame.dev/auto-featured-image-auto-generated/layers" target="_blank"><?php 
echo esc_html__( 'Read more', 'auto-featured-image-auto-generated' );
?></a>
                                </div>
                            </div>

                            <!-- More FAQ -->
                            <div class="atfit-input">
                                <label><?php 
echo esc_html__( 'More FAQ', 'auto-featured-image-auto-generated' );
?>
                                    <small><?php 
echo esc_html__( 'For more information, visit the plugin community.', 'auto-featured-image-auto-generated' );
?></small>
                                </label>
                                <div>
                                    <a href="https://kogui.app/c/jodacame.dev/auto-featured-image-auto-generated" target="_blank"><?php 
echo esc_html__( 'Go to Community', 'auto-featured-image-auto-generated' );
?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="atfit-column" style="max-width: 700px;">

                <div class="atfit-container ">
                    <h2>Preview</h2>
                    <div id="atfit-featured-image" class="atfit-featured-image">
                        <div class="atfit-loading" style="display: none;">
                            <div class="atfit-loading-spinner"></div>
                        </div>
                        <img src="#" alt="" style="display: none;">

                    </div>
                    <div class="atfit-input">
                        <label for="atfit-featured-image-post"><?php 
echo esc_html__( 'Posts', 'auto-featured-image-auto-generated' );
?>
                            <small>
                                <?php 
echo esc_html__( 'Last 10 post whitout featured image', 'auto-featured-image-auto-generated' );
?>
                            </small>
                        </label>
                        <select name="atfit-featured-image-post" id="atfit-featured-image-post">
                            <option value="" disabled selected><?php 
echo esc_html__( 'Select post to generate featured image', 'auto-featured-image-auto-generated' );
?></option>
                            <?php 
foreach ( $posts->posts as $post ) {
    ?>
                                <option value="<?php 
    echo esc_attr( $post->ID );
    ?>">
                                    <?php 
    echo esc_html( $post->post_type );
    ?> -
                                    <?php 
    echo esc_html( $post->post_title );
    ?>
                                </option>
                            <?php 
}
?>
                        </select>
                        <button id="atfit-featured-image-generate" type="button" class="atfit-button atfit-button-primary w-50"><?php 
echo esc_html__( 'Preview', 'auto-featured-image-auto-generated' );
?></button>
                    </div>
                    <div class="atfit-alert atfit-alert-info">
                        <?php 
echo esc_html__( 'This is a preview of the featured image generated by the plugin, it is not set as featured image.', 'auto-featured-image-auto-generated' );
?>
                    </div>

                    <div class="atfit-terminal" id="atfit-terminal" style="display: block;"></div>
                </div>

                <div class="atfit-container " style="margin-top:10px">
                    <h2><?php 
echo esc_html__( 'Bulk Generate', 'auto-featured-image-auto-generated' );
?></h2>
                    <?php 
?>
                        <div class="atfit-alert atfit-alert-warning">
                            <?php 
printf( esc_html__( 'You are using the free version of %s.  Bulk generate is available in the PRO version. %s', 'auto-featured-image-auto-generated' ), ATFIT_PLUGIN_NAME, '<a class="only-pro" href="' . ttfi_fs()->get_upgrade_url() . '">' . esc_html__( 'Upgrade to PRO', 'auto-featured-image-auto-generated' ) . '</a>' );
?>
                        </div>
                    <?php 
?>
                </div>
                <?php 
?>
                    <div class="atfit-tryit">
                        <!-- Trial Link -->

                        <?php 
printf( esc_html__( 'Unlock all features for 3 days. No credit card required. %s', 'auto-featured-image-auto-generated' ), '<a class="only-pro" href="' . ttfi_fs()->get_trial_url() . '">' . esc_html__( 'Try PRO for free', 'auto-featured-image-auto-generated' ) . '</a>' );
?>

                    </div>
                <?php 
?>
                <?php 
?>
                    <small class="atfit-discount-message">
                        <?php 
printf( esc_html__( 'Use discount code %s to get %s', 'auto-featured-image-auto-generated' ), "<a href='" . ttfi_fs()->get_upgrade_url() . "'><strong>GOPRO</strong></a>", "<strong>10% extra discount</strong>" );
?>
                    </small>
                <?php 
?>
            </div>
        </div>

    </div>
</form>