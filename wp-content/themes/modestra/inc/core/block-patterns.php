<?php

/**
 * modestra: Block Patterns
 *
 * @since modestra 1.0.0
 */

/**
 * Registers pattern categories for modestra
 *
 * @since modestra 1.0.0
 *
 * @return void
 */
function modestra_register_pattern_category()
{
	$block_pattern_categories = array(
		'modestra' => array('label' => __('Additional Sections', 'modestra')),
		'modestra-testimoials' => array('label' => __('Testimonials', 'modestra')),
		'modestra-portfolio' => array('label' => __('Gallery & Portfolios', 'modestra')),
		'modestra-hero' => array('label' => __('Hero', 'modestra')),
		'modestra-pricing' => array('label' => __('Pricing', 'modestra')),
		'modestra-team' => array('label' => __('Team', 'modestra')),
		'modestra-accordion' => array('label' => __('FAQ & Accordion', 'modestra')),
		'modestra-contacts' => array('label' => __('Contact & Newsletter Forms', 'modestra')),
		'modestra-homes' => array('label' => __('Homepage Templates', 'modestra')),
		'modestra-pages' => array('label' => __('Page Templates', 'modestra')),
	);

	$block_pattern_categories = apply_filters('modestra_block_pattern_categories', $block_pattern_categories);

	foreach ($block_pattern_categories as $name => $properties) {
		if (!WP_Block_Pattern_Categories_Registry::get_instance()->is_registered($name)) {
			register_block_pattern_category($name, $properties); // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_pattern_category
		}
	}
}
add_action('init', 'modestra_register_pattern_category', 9);
