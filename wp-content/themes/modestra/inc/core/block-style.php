<?php

/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package modestra
 * @since 1.0.0
 */

if (function_exists('register_block_style')) {
    /**
     * Register block styles.
     *
     * @since 0.1
     *
     * @return void
     */
    function modestra_register_block_styles()
    {
        register_block_style(
            'core/columns',
            array(
                'name'  => 'modestra-boxshadow',
                'label' => __('Box Shadow', 'modestra')
            )
        );

        register_block_style(
            'core/column',
            array(
                'name'  => 'modestra-boxshadow',
                'label' => __('Box Shadow', 'modestra')
            )
        );
        register_block_style(
            'core/column',
            array(
                'name'  => 'modestra-boxshadow-medium',
                'label' => __('Box Shadow Medium', 'modestra')
            )
        );
        register_block_style(
            'core/column',
            array(
                'name'  => 'modestra-boxshadow-large',
                'label' => __('Box Shadow Large', 'modestra')
            )
        );

        register_block_style(
            'core/group',
            array(
                'name'  => 'modestra-boxshadow',
                'label' => __('Box Shadow', 'modestra')
            )
        );
        register_block_style(
            'core/group',
            array(
                'name'  => 'modestra-boxshadow-medium',
                'label' => __('Box Shadow Medium', 'modestra')
            )
        );
        register_block_style(
            'core/group',
            array(
                'name'  => 'modestra-boxshadow-large',
                'label' => __('Box Shadow Larger', 'modestra')
            )
        );
        register_block_style(
            'core/group',
            array(
                'name'  => 'modestra-group-content-vertical-center',
                'label' => __('Content: Vertcal Center ', 'modestra')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'modestra-boxshadow',
                'label' => __('Box Shadow', 'modestra')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'modestra-boxshadow-medium',
                'label' => __('Box Shadow Medium', 'modestra')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'modestra-boxshadow-larger',
                'label' => __('Box Shadow Large', 'modestra')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'modestra-image-pulse',
                'label' => __('Iamge Pulse Effect', 'modestra')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'modestra-boxshadow-hover',
                'label' => __('Box Shadow on Hover', 'modestra')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'modestra-image-hover-pulse',
                'label' => __('Hover Pulse Effect', 'modestra')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'modestra-image-hover-rotate',
                'label' => __('Hover Rotate Effect', 'modestra')
            )
        );
        register_block_style(
            'core/columns',
            array(
                'name'  => 'modestra-boxshadow-hover',
                'label' => __('Box Shadow on Hover', 'modestra')
            )
        );

        register_block_style(
            'core/column',
            array(
                'name'  => 'modestra-boxshadow-hover',
                'label' => __('Box Shadow on Hover', 'modestra')
            )
        );

        register_block_style(
            'core/group',
            array(
                'name'  => 'modestra-boxshadow-hover',
                'label' => __('Box Shadow on Hover', 'modestra')
            )
        );
        register_block_style(
            'core/group',
            array(
                'name'  => 'modestra-group-gradient-border',
                'label' => __('Gradient Border', 'modestra')
            )
        );

        register_block_style(
            'core/post-terms',
            array(
                'name'  => 'categories-background-with-round',
                'label' => __('Primary Background Style', 'modestra')
            )
        );
        register_block_style(
            'core/post-terms',
            array(
                'name'  => 'categories-background-faded-round',
                'label' => __('Faded Background Style', 'modestra')
            )
        );
        register_block_style(
            'core/post-title',
            array(
                'name'  => 'title-hover-primary-color',
                'label' => __('Hover: Primary color', 'modestra')
            )
        );
        register_block_style(
            'core/post-title',
            array(
                'name'  => 'title-hover-secondary-color',
                'label' => __('Hover: Secondary color', 'modestra')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-primary-bgcolor',
                'label' => __('Primary Hover', 'modestra')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-secondary-bgcolor',
                'label' => __('Secondary Hover', 'modestra')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-primary-arrow-style',
                'label' => __('Primary Arrow Style', 'modestra')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-dark-arrow-style',
                'label' => __('Dark Arrow Style', 'modestra')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-white-arrow-style',
                'label' => __('White Arrow Style', 'modestra')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-simple-arrow',
                'label' => __('Simple Arrow', 'modestra')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-gradient-border-style',
                'label' => __('Gradient Border Style', 'modestra')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-gradient-background-style',
                'label' => __('Hover for Primary Gradient', 'modestra')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-gradient-background-style-secondary',
                'label' => __('Hover for Secodnary Gradient', 'modestra')
            )
        );
        register_block_style(
            'core/buttons',
            array(
                'name'  => 'buttons-hover-translate-effect',
                'label' => __('Translate on Hover', 'modestra')
            )
        );
        register_block_style(
            'core/buttons',
            array(
                'name'  => 'buttons-hover-zoom-effect',
                'label' => __('Zoom on Hover', 'modestra')
            )
        );
        register_block_style(
            'core/read-more',
            array(
                'name'  => 'readmore-hover-primary-color',
                'label' => __('Hover: Primary Color', 'modestra')
            )
        );
        register_block_style(
            'core/read-more',
            array(
                'name'  => 'readmore-hover-secondary-color',
                'label' => __('Hover: Secondary Color', 'modestra')
            )
        );
        register_block_style(
            'core/read-more',
            array(
                'name'  => 'readmore-hover-primary-fill',
                'label' => __('Hover: Primary Fill', 'modestra')
            )
        );
        register_block_style(
            'core/read-more',
            array(
                'name'  => 'readmore-hover-secondary-fill',
                'label' => __('Hover: secondary Fill', 'modestra')
            )
        );

        register_block_style(
            'core/list',
            array(
                'name'  => 'list-style-no-bullet',
                'label' => __('List Style: Hide bullet', 'modestra')
            )
        );
        register_block_style(
            'core/list',
            array(
                'name'  => 'hide-bullet-list-style-primary-check',
                'label' => __('Circle Check Primary', 'modestra')
            )
        );
        register_block_style(
            'core/list',
            array(
                'name'  => 'hide-bullet-list-style-primary-shade-check',
                'label' => __('Circle Check Primary Shade', 'modestra')
            )
        );
        register_block_style(
            'core/list',
            array(
                'name'  => 'hide-bullet-list-style-white-check',
                'label' => __('Circle Check White', 'modestra')
            )
        );
        register_block_style(
            'core/gallery',
            array(
                'name'  => 'enable-grayscale-mode-on-image',
                'label' => __('Enable Grayscale Mode on Image', 'modestra')
            )
        );
        register_block_style(
            'core/social-links',
            array(
                'name'  => 'social-icon-border',
                'label' => __('Border Style', 'modestra')
            )
        );
        register_block_style(
            'core/page-list',
            array(
                'name'  => 'modestra-page-list-bullet-hide-style',
                'label' => __('Hide Bullet Style', 'modestra')
            )
        );
        register_block_style(
            'core/categories',
            array(
                'name'  => 'modestra-categories-bullet-hide-style',
                'label' => __('Hide Bullet Style', 'modestra')
            )
        );
        register_block_style(
            'core/details',
            array(
                'name'  => 'modestra-details-with-plus-icon',
                'label' => __('Plus Icon', 'modestra')
            )
        );
        register_block_style(
            'core/cover',
            array(
                'name'  => 'modestra-cover-modestra-overlay-content',
                'label' => __('Content Overlay', 'modestra')
            )
        );
        register_block_style(
            'core/cover',
            array(
                'name'  => 'modestra-cover-modestra-zoom-effect',
                'label' => __('Zoom Effect', 'modestra')
            )
        );
        register_block_style(
            'core/cover',
            array(
                'name'  => 'modestra-cover-modestra-translate-effect',
                'label' => __('Translate Effect', 'modestra')
            )
        );
        register_block_style(
            'core/cover',
            array(
                'name'  => 'modestra-cover-modestra-parallax-effect',
                'label' => __('Parallax Background', 'modestra')
            )
        );
        register_block_style(
            'core/heading',
            array(
                'name'  => 'modestra-heading-gradient-effect',
                'label' => __('Gradient Effect', 'modestra')
            )
        );
        register_block_style(
            'core/quote',
            array(
                'name'  => 'modestra-quote-primary-border',
                'label' => __('Primary Border', 'modestra')
            )
        );
        register_block_style(
            'core/quote',
            array(
                'name'  => 'modestra-quote-primary-style',
                'label' => __('Primary Style', 'modestra')
            )
        );
        register_block_style(
            'core/quote',
            array(
                'name'  => 'modestra-quote-secondary-border',
                'label' => __('Secondary Border', 'modestra')
            )
        );
        register_block_style(
            'core/quote',
            array(
                'name'  => 'modestra-quote-secondary-style',
                'label' => __('Secondary Style', 'modestra')
            )
        );
    }
    add_action('init', 'modestra_register_block_styles');
}
