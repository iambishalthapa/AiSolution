<?php
if (class_exists('WooCommerce')) :
    if (is_null(WC()->cart)) {
        wc_load_cart();
    }
    $cart_count = WC()->cart->cart_contents_count ?? 99;

?>

    <a <?php echo $cartUrl ?> class="cozy-minicart-icon">
        <?php
        if ('yes' == $settings['enable_cart_text'] && 'before-icon' == $settings['text_placement']) {
            echo "<span class='cozy-cart-text-before'>" . $settings['cart_text'] . "</span>";
        }
        if ('yes' == $settings['enable_cart_amount']) {
            echo "<span class='cozy-cart-subtotal'>" . wc_price(WC()->cart->get_subtotal()) . "</span>";
        }
        echo "<div class='cozy-cart-icon'>";
        echo '<span class="icon">';
        if ($settings['cart_icon_type'] === 'cart-type-image') {
            $normal_icon_filter_hover_class = '';
            if ($settings['minicart_icon_invert_hover'] === 'yes') {
                $normal_icon_filter_hover_class = 'icon-hover-filter-enabled';
            }
        ?>
            <img class="<?php echo esc_attr($normal_icon_filter_hover_class) ?>" src="<?php echo esc_url($settings['icon_image']['url']) ?>">
        <?php } else {
            \Elementor\Icons_Manager::render_icon($settings['cart_icon'], ['aria-hidden' => 'true']);
        }
        echo '</span>';

        if ('yes' == $settings['enable_cart_count']) {
            echo "<span class='cozy-cart-count'><span class='cozy-cart-items-count'>" . $cart_count . "</span></span>";
        }
        echo "</div>";
        if ('yes' == $settings['enable_cart_text'] && 'after-icon' == $settings['text_placement']) {
            echo "<span class='cozy-cart-text-after'>" . $settings['cart_text'] . "</span>";
        }
        ?>
    </a>
    <?php
    if ('yes' == $settings['cart_open_sidebar_panel']) :
    ?>
        <div class="cozy-sidebar-panel-wrapper">
            <div class="cozy-menu-sidebar-panel" data-empty_cart_text="<?php echo $settings['sidebar_empty_cart_text'] ?>">
                <div class='sidebar-panel-header'>
                    <div class='item-count'>
                        <?php
                        $itemsText = sprintf(
                            _n(
                                'item',
                                'items',
                                $cart_count,
                                'text-domain'
                            ),
                            $cart_count
                        );

                        echo sprintf(
                            __('You have <span class="cozy-cart-items-count">%s</span> %s in your cart', 'cozy-addons'),
                            $cart_count,
                            $itemsText
                        );
                        ?>
                    </div>
                    <div class="cozy-close-icon-wrapper">
                        <?php
                        \Elementor\Icons_Manager::render_icon($settings['sidebar_panel_close_icon'], ['aria-hidden' => 'true']);
                        ?>
                    </div>
                </div>
                <?php
                if ($cart_count == 0) {
                    $shop_page_url = get_permalink(wc_get_page_id('shop'));
                ?>
                    <div class="empty-cart show-empty-cart">
                        <?php
                        echo $settings['sidebar_empty_cart_text'];
                        ?>
                        <div class="cta-links">
                            <a href="<?php echo $shop_page_url ?>">
                                <div class="shop-cta">
                                    <?php echo __('Shop Now', 'cozy-addons') ?>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php
                }

                global $woocommerce;
                $items = WC()->cart->get_cart();
                ?>
                <div class='cozy-minicart-wrapper'>

                    <?php
                    foreach ($items as $item => $values) :
                    ?>
                        <div class='cozy-minicart-item'>
                            <?php
                            $getProductDetail = wc_get_product($values['product_id']);
                            ?>
                            <div class='item-image'>
                                <?php echo $getProductDetail->get_image(); // accepts 2 arguments ( size, attr ) 
                                ?>
                            </div>
                            <div class="item-details">
                                <p class="product-title"><?php echo $getProductDetail->get_title(); ?></p>
                                <?php
                                $price = get_post_meta($values['product_id'], '_price', true);
                                $regular_price = get_post_meta($values['product_id'], '_regular_price', true);
                                $sale_price = get_post_meta($values['product_id'], '_sale_price', true);
                                if ($sale_price) {
                                ?>
                                    <div class="pricing">
                                        <span class="strikethrough"><?php echo wc_price($regular_price); ?></span>
                                        <span><?php echo wc_price($sale_price); ?></span>
                                    </div>
                                    <span class="save-amount"><?php echo __('SAVE', 'cozy-addons') . ' ' . wc_price($regular_price - $sale_price); ?></span>

                                <?php
                                } else {
                                    echo "<span>" . wc_price($price) . "</span>";
                                }
                                ?>
                                <div class="product-description">
                                    <?php
                                    $product_content = $getProductDetail->get_description();
                                    $total_words = preg_split("/[\n\r\t ]+/", $product_content, 50, PREG_SPLIT_NO_EMPTY);
                                    $final_content = implode(' ', array_slice($total_words, 0, 15));
                                    echo wp_kses_post($final_content);
                                    ?>
                                </div>
                                <div class='item-quantity'>
                                    <span data-cart_item_key="<?php echo $item ?>" class="minus">&minus;</span>
                                    <?php echo '<span class="quantity">' . $values['quantity'] . '</span>'; ?>
                                    <span data-cart_item_key="<?php echo $item ?>" class="plus">&plus;</span>
                                </div>
                                <a class="cozy-cart-remove-product" data-product_id="<?php echo $values['product_id'] ?>" data-cart_item_key="<?php echo $item; ?>"><u>Remove Item</u></a>
                            </div>
                            <div class='total-price'>
                                <?php echo wc_price($price * $values['quantity']); ?>
                            </div>

                        </div>

                    <?php
                    endforeach;
                    ?>
                </div>
                <div class="sidebar-panel-footer">
                    <div class="subtotal">
                        <div class="subtotal-label"><?php echo __('Subtotal', 'cozy-addons') ?></div>
                        <div>
                            <?php
                            echo "<span class='cozy-cart-subtotal'>" . wc_price(WC()->cart->get_subtotal()) . "</span>";
                            ?>
                        </div>
                    </div>
                    <span>
                        <?php echo __('Shipping, taxes, and discounts are calculated at checkout.', 'cozy-addons') ?></span>
                    <div class="cta-links">
                        <?php $cart_url = wc_get_cart_url(); ?>
                        <a href=" <?php echo esc_url($cart_url); ?> ">
                            <div class="cart-cta">
                                <?php echo __('View Cart', 'cozy-addons') ?>
                            </div>
                        </a>
                        <?php $checkout_url = wc_get_checkout_url(); ?>
                        <a href="<?php echo esc_url($checkout_url); ?>">
                            <div class="checkout-cta">
                                <?php echo __('Proceed to Checkout', 'cozy-addons') ?>

                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
<?php
    endif;
endif;
?>