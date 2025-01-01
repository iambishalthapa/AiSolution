<?php

if ( !function_exists( 'ttfi_fs' ) ) {
    // Create a helper function for easy SDK access.
    function ttfi_fs() {
        global $ttfi_fs;
        if ( !isset( $ttfi_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $ttfi_fs = fs_dynamic_init( array(
                'id'             => '11835',
                'slug'           => 'auto-featured-image-auto-generated',
                'premium_slug'   => 'auto-featured-image-auto-generated-premium',
                'type'           => 'plugin',
                'public_key'     => 'pk_dd9875f9e02637856b24c480fccf7',
                'is_premium'     => false,
                'premium_suffix' => 'Pro',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'trial'          => array(
                    'days'               => 3,
                    'is_require_payment' => false,
                ),
                'menu'           => array(
                    'support'    => false,
                    'account'    => true,
                    'navigation' => 'tabs',
                    'slug'       => 'auto-featured-image-auto-generated',
                ),
                'is_live'        => true,
            ) );
        }
        return $ttfi_fs;
    }

    // Init Freemius.
    ttfi_fs();
    // Signal that SDK was initiated.
    do_action( 'ttfi_fs_loaded' );
}