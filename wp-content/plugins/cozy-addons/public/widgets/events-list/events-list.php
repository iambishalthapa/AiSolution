<?php
if ($settings['events_list']) :
    $event_slide_id = '';
    $slide_per_view = '';
    $col = '';
    $content_layout = '';

    if ($settings['events_list_display_layout'] === 'cozy-events-list-carousel') {
        $event_slide_id = 'cozyEventCarousel';
        $slide_per_view = $settings['events_carousel_post_per_view'];
        $content_layout = $settings['events_carousel_content_layout'];
    }

    if ('cozy-events-list-grid' === $settings['events_list_display_layout']) {
        $col = $settings['events_list_column'];
    }
?>
    <div id="<?php echo esc_attr($event_slide_id); ?>" data-slidePerView="<?php echo esc_attr($slide_per_view); ?>" data-carouselColumnGap="<?php echo esc_attr($settings['cozy_carousel_column_gap']) ?>" class="cozy-events-list-items <?php echo $settings['events_list_display_layout'] == 'cozy-events-list-carousel' ? 'swiper ' : '';
                                                                                                                                                                                                                                            echo " " . $settings['events_list_display_layout'] . " " . $content_layout;
                                                                                                                                                                                                                                            echo " " . $col; ?>">
        <?php
        echo $settings['events_list_display_layout'] === 'cozy-events-list-carousel' ? '<div class="swiper-wrapper">' : '';

        foreach ($settings['events_list'] as $event) :
            echo $settings['events_list_display_layout'] === 'cozy-events-list-carousel' ? '<div class="swiper-slide">' : '';
        ?>
            <div class="cozy-events-list-item">
                <?php
                if ('yes' == $event['add_image'] && 'cozy-events-list' != $settings['events_list_display_layout'] && 'cozy-events-descriptive-list' != $settings['events_list_display_layout']) {
                ?>
                    <div class="event-image">
                        <img src='<?php echo $event["events_image"]["url"] ?>'>
                    </div>
                    <div class="event-details">
                        <div class="event-title"><?php echo $event['event_title'] ?></div>
                        <div class="event-timing-venue">
                            <?php
                            if (!empty($event['event_date'])) {
                            ?>
                                <div>
                                    <?php
                                    $timestamp = strtotime($event['event_date']);
                                    echo date('j F g:i a', $timestamp);
                                    ?>
                                </div>
                            <?php } ?>
                            <div class="event-venue">
                                <?php
                                if ('yes' == $event['enable_event_venue_link']) {
                                    echo '<a href="' . esc_url($event['venue_link']['url']) . '">';
                                }
                                echo $event['event_venue'];
                                if ('yes' == $event['enable_event_venue_link']) {
                                    echo "</a>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="price">
                            <?php
                            if ('yes' != $event['sold_out_option']) {
                            ?>
                                <span>
                                    <?php
                                    switch ($event['select_currency']) {
                                        case 'cozy_addons_custom':
                                            echo esc_html($event['custom_currency']);
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
                                    }
                                    echo $event['price_amount'];
                                    ?>
                                </span>
                            <?php
                            }
                            ?>
                        </div>
                        <?php if (!empty($event['event_description'])) { ?>
                            <div class="event-description"><?php echo $event['event_description'] ?></div>
                        <?php }
                        if ('yes' == $event['enable_guest_speaker']) {
                        ?>
                            <div class="guest-details-wrapper">
                                <?php
                                foreach ($event['guest_details'] as $guest) {
                                ?>
                                    <div class="guest-detail">
                                        <div class="guest-image"><img src="<?php echo $guest["guest_image"]["url"] ?>"></div>
                                        <div class="guest-name"><?php echo $guest['guest_name'] ?></div>
                                        <div class="guest-designation"><?php echo $guest['guest_designation'] ?></div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        <?php
                        }
                        if ('yes' == $event['enable_ticket'] && 'yes' != $event['sold_out_option']) {
                        ?>
                            <a href="<?php echo esc_url($event['button_link']['url']) ?>">
                                <div class="cta-button">
                                    <?php
                                    if ('yes' == $event['enable_cta_icon']) {
                                        echo "<span class='cta-icon'>";
                                        \Elementor\Icons_Manager::render_icon($event['cta_icon'], ['aria-hidden' => 'true']);
                                        echo "</span>";
                                    }
                                    echo "<span class='cta-label'>" . $event['button_label'] . "</span>";
                                    ?>
                                </div>
                            </a>
                        <?php
                        } else {
                        ?>
                            <div class="cta-button">
                                <?php
                                echo "<span class='cta-label'>" . $event['sold_out_label'] . "</span>";
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                } elseif ('cozy-events-descriptive-list' == $settings['events_list_display_layout']) {
                    $timestamp = strtotime($event['event_date']);
                    if(!empty($event['event_date'])){
                ?>
                    <div class="date">
                        <div class="weekdays">
                            <?php 
                            echo "<div class='weekday'>" . date('D', $timestamp) . "</div>";
                            echo "<div class='day'>" . date('j', $timestamp) . "</div>"; 
                            ?>
                        </div>
                        <div class="month"><?php echo date('M', $timestamp) ?></div>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="event-image">
                        <img src='<?php echo $event["events_image"]["url"] ?>'>
                    </div>
                    <div class="event-details">
                        <div class="event-title-time">
                            <div class="event-title">
                                <?php echo $event['event_title'] ?>
                            </div>
                            <?php if(!empty($event['event_date'])){ ?>
                            <div class="event-time"><?php echo date("g:i a", $timestamp); ?></div>
                            <?php } ?>
                        </div>
                        <div class="price">
                            <?php
                            if ('yes' != $event['sold_out_option']) {
                            ?>
                                <span>
                                    <?php
                                    switch ($event['select_currency']) {
                                        case 'cozy_addons_custom':
                                            echo esc_html($event['custom_currency']);
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
                                    }
                                    echo $event['price_amount'];
                                    ?>
                                </span>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="event-venue">
                            <?php
                            if ('yes' == $event['enable_event_venue_link']) {
                                echo '<a href="' . esc_url($event['venue_link']['url']) . '">';
                            }
                            echo $event['event_venue'];
                            if ('yes' == $event['enable_event_venue_link']) {
                                echo "</a>";
                            }
                            ?>
                        </div>
                        <?php if (!empty($event['event_description'])) { ?>
                            <div class="event-description"><?php echo $event['event_description'] ?></div>
                        <?php }
                        if ('yes' == $event['enable_guest_speaker']) {
                        ?>
                            <div class="guest-details-wrapper">
                                <?php
                                foreach ($event['guest_details'] as $guest) {
                                ?>
                                    <div class="guest-detail">
                                        <div class="guest-image"><img src="<?php echo $guest["guest_image"]["url"] ?>"></div>
                                        <div class="guest-name"><?php echo $guest['guest_name'] ?></div>
                                        <div class="guest-designation"><?php echo $guest['guest_designation'] ?></div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        <?php
                        }
                        if ('yes' == $event['enable_ticket'] && 'yes' != $event['sold_out_option']) {
                        ?>
                            <a href="<?php echo esc_url($event['button_link']['url']) ?>">
                                <div class="cta-button">
                                    <?php
                                    if ('yes' == $event['enable_cta_icon']) {
                                        echo "<span class='cta-icon'>";
                                        \Elementor\Icons_Manager::render_icon($event['cta_icon'], ['aria-hidden' => 'true']);
                                        echo "</span>";
                                    }
                                    echo "<span class='cta-label'>" . $event['button_label'] . "</span>";
                                    ?>
                                </div>
                            </a>
                        <?php
                        } else {
                        ?>
                            <div class="cta-button">
                                <?php
                                echo "<span class='cta-label'>" . $event['sold_out_label'] . "</span>";
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <?php
                } else {
                    if (!empty($event['event_date'])) {
                    ?>
                        <div class="event-date">
                            <?php
                            $timestamp = strtotime($event['event_date']);
                            echo date('D, M j', $timestamp);
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="event-title"><?php echo $event['event_title'] ?></div>
                    <div class="event-venue">
                        <?php
                        $venue_link = '';
                        if ('yes' == $event['enable_event_venue_link']) {
                            $venue_link = 'href="' . esc_url($event['venue_link']['url']) . '"';
                        }
                        ?>
                        <a <?php echo $venue_link; ?>>
                            <?php
                            echo $event['event_venue'];
                            ?>
                        </a>
                    </div>
                    <?php
                    if ('yes' == $event['enable_ticket'] && 'yes' != $event['sold_out_option']) {
                    ?>
                        <a href="<?php echo esc_url($event['button_link']['url']) ?>">
                            <div class="cta-button">
                                <?php
                                if ('yes' == $event['enable_cta_icon']) {
                                    echo "<span class='cta-icon'>";
                                    \Elementor\Icons_Manager::render_icon($event['cta_icon'], ['aria-hidden' => 'true']);
                                    echo "</span>";
                                }
                                echo "<span class='cta-label'>" . $event['button_label'] . "</span>";
                                ?>
                            </div>
                        </a>
                    <?php
                    } else {
                    ?>
                        <div class="cta-button">
                            <?php
                            echo "<span class='cta-label'>" . $event['sold_out_label'] . "</span>";
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                <?php
                }
                ?>
            </div>
        <?php
            echo $settings['events_list_display_layout'] === 'cozy-events-list-carousel' ? '</div>' : ''; //swiper-slide closing div
        endforeach;
        echo $settings['events_list_display_layout'] === 'cozy-events-list-carousel' ? '</div>' : ''; //swiper-wrapper closing div
        if ($settings['show_carousel_navigation'] == 'yes' && $settings['events_list_display_layout'] === 'cozy-events-list-carousel') { ?>
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
    if ($settings['show_carousel_pagination'] == 'yes' && $settings['events_list_display_layout'] === 'cozy-events-list-carousel') {
        echo '<div class="cozy-swiper-pagination"></div>';
    }
endif;
?>