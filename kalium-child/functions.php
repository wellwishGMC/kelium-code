<?php
/**
 * Kalium WordPress Theme
 *
 * @author Laborator
 * @link   https://kaliumtheme.com
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

/**
 * After theme setup hooks.
 */
function kalium_child_after_setup_theme() {

	// Load translations for child theme
	load_child_theme_textdomain( 'kalium-child', get_stylesheet_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'kalium_child_after_setup_theme' );

/**
 * This will enqueue style.css of child theme.
 */
function kalium_child_wp_enqueue_scripts() {

	// Remove if you are not going to use style.css
	wp_enqueue_style( 'kalium-child', get_stylesheet_directory_uri() . '/style.css' );

	wp_enqueue_style('kalium-main-css', get_stylesheet_directory_uri() . '/assets/css/custom.css');

	wp_enqueue_style('kalium-main-css-1', get_stylesheet_directory_uri() . '/assets/css/custom-1.css');

	wp_enqueue_style('kalium-swiper-css', get_stylesheet_directory_uri() . '/assets/css/swiper.css');

	// Enqueue the main theme script with dependencies.
	wp_enqueue_script('kalium-swiper-js', get_stylesheet_directory_uri() . '/assets/js/swiper.js', array( 'jquery' ));

	wp_enqueue_script('custom-main-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array( 'jquery' ));

}

add_action( 'wp_enqueue_scripts', 'kalium_child_wp_enqueue_scripts', 110 );
