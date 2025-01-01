<?php
if ($settings['travel_destination_list']) :
    $travel_slide_id = '';
    $slide_per_view = '';
    if ($settings['travel_destination_list_display_layout'] === 'cozy-travel-destination-list-carousel') {
        $travel_slide_id = 'cozyTravelCarousel';
        $slide_per_view = $settings['cozy_carousel_post_per_view'];
    }
?>
    <div id="<?php echo esc_attr($travel_slide_id) . '"' . ' ' . 'data-slidePerView="' . esc_attr($slide_per_view) . '" ' . 'data-carouselColumnGap="' . esc_attr($settings['cozy_carousel_column_gap']); ?>" class="cozy-addons travel-destination-list-items <?php echo $settings['travel_destination_list_display_layout'] === 'cozy-travel-destination-list-carousel' ? 'swiper ' . $settings['travel_destination_list_display_layout'] . "-" . $settings['travel_destination_list_column'] : $settings['travel_destination_list_display_layout'] . " " . $settings['travel_destination_list_column']; ?>">
        <?php
        echo $settings['travel_destination_list_display_layout'] === 'cozy-travel-destination-list-carousel' ? '<div class="swiper-wrapper">' : '';

        foreach ($settings['travel_destination_list'] as $travel) :
            echo $settings['travel_destination_list_display_layout'] === 'cozy-travel-destination-list-carousel' ? '<div class="swiper-slide">' : '';
        ?>

            <div class="cozy-addons travel-destination-list-item">
                <img class="travel-destination-image" src="<?php echo $travel['travel_destination_image']['url'] ?>">
                <div class="travel-destination-content">
                    <div class="heading">
                        <div class="destination">
                            <?php echo $travel['travel_destination'] ?>
                        </div>

                    </div>
                    <div class="location-section">
                        <?php if ($travel['destination_location']) { ?>
                            <div class="destination-location">
                                <?php
                                echo '<span class="icon">';
                                \Elementor\Icons_Manager::render_icon($travel["select_location_icon"]);
                                echo '</span>';
                                echo esc_html($travel['destination_location']) ?>
                            </div>
                        <?php } ?>
                        <div class="package-price">
                            <?php
                            if ($travel['enable_price_prefix'] == 'yes') {
                                echo '<span class="price-prefix">' . esc_html($travel['price_prefix']);
                            }
                            ?>
                            <span class="price-curreny">
                                <?php
                                switch ($travel['select_currency']) {
                                    case 'cozy_addons_custom':
                                        echo esc_html($travel['custom_currency']);
                                        break;
                                    case 'dollar':
                                        echo esc_html('$');
                                        break;
                                    case 'euro':
                                        echo esc_html('€');
                                        break;
                                    case 'baht':
                                        echo esc_html('฿');
                                        break;
                                    case 'franc':
                                        echo esc_html('₣');
                                        break;
                                    case 'guilder':
                                        echo esc_html('ƒ');
                                        break;
                                    case 'pound':
                                        echo esc_html('£');
                                        break;
                                    case 'real':
                                        echo esc_html('R$');
                                        break;
                                    case 'rupee':
                                        echo esc_html('₨');
                                        break;
                                    case 'indian_rupee':
                                        echo esc_html('₹');
                                        break;

                                    case 'yen':
                                        echo esc_html('¥');
                                        break;
                                    default:
                                        # default execution...
                                        break;
                                } ?>
                            </span>
                            <?php echo '<span class="amount">' . esc_html($travel['price_amount']); ?>
                        </div>
                    </div>
                    <div class="spotlight"><?php echo $travel['travel_spotlight'] ?></div>
                    <div class="package-footer">
                        <span class="travel-duration">
                            <?php if ($travel["select_icon"]) { ?>
                                <span class="duration-icon">
                                    <?php \Elementor\Icons_Manager::render_icon($travel["select_icon"]);
                                    ?>
                                </span>
                            <?php } ?>
                            <span class="duration"><?php echo $travel['travel_duration'] ?></span>
                        </span>
                        <a class="destination-more" href='<?php echo $travel["url_link"]["url"] ?>'><?php echo $travel['url_label'] ?>
                            <span class="icon">
                                <?php
                                \Elementor\Icons_Manager::render_icon($travel["url_icon"]);
                                ?>
                            </span>
                        </a>
                    </div>

                </div>
            </div>
        <?php
            echo $settings['travel_destination_list_display_layout'] === 'cozy-travel-destination-list-carousel' ? '</div>' : ''; //swiper-slide closing div
        endforeach;
        echo $settings['travel_destination_list_display_layout'] === 'cozy-travel-destination-list-carousel' ? '</div>' : ''; //swiper-wrapper closing div

        if ($settings['show_carousel_navigation'] == 'yes' && $settings['travel_destination_list_display_layout'] === 'cozy-travel-destination-list-carousel') { ?>
            <div class="cozy-swiper-navigation">
                <div class="cozy-slide-prev cozy-slide-nav">
                    <?php \Elementor\Icons_Manager::render_icon($settings['slide_navigation_left_icon'], ['aria-hidden' => 'true']); ?>
                </div>
                <div class="cozy-slide-next cozy-slide-nav">
                    <?php \Elementor\Icons_Manager::render_icon($settings['slide_navigation_right_icon'], ['aria-hidden' => 'true']); ?>
                </div>
            </div>
        <?php
        }

        ?>
    </div>
<?php
    if ($settings['show_carousel_pagination'] == 'yes' && $settings['travel_destination_list_display_layout'] === 'cozy-travel-destination-list-carousel') {
        echo '<div class="cozy-swiper-pagination"></div>';
    }
endif;


?>