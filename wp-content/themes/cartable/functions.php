<?php
function cartable_css() {
    $parent_style = 'specia-parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'cartable-main', get_stylesheet_uri(), array( $parent_style ));
	
	wp_enqueue_style('cartable-default',get_stylesheet_directory_uri() .'/css/colors/default.css');
	wp_dequeue_style('specia-default');
	
	wp_enqueue_style('cartable-media-query',get_stylesheet_directory_uri() .'/css/media-query.css');
	wp_dequeue_style('specia-media-query');
	
	wp_enqueue_script('cartable-custom-js',get_stylesheet_directory_uri() .'/js/custom.js');
}
add_action( 'wp_enqueue_scripts', 'cartable_css',999);


require_once( get_stylesheet_directory() . '/inc/customize/cartable-header-section.php');
require_once( get_stylesheet_directory() . '/inc/customize/cartable-product.php');
require_once( get_stylesheet_directory() . '/inc/customize/cartable-premium.php');

/**
 * Remove Customize Panel from parent theme
 */
function cartable_remove_parent_setting( $wp_customize ) {
	$wp_customize->remove_panel('service_panel');	
}
add_action( 'customize_register', 'cartable_remove_parent_setting',99 );

/**
 * Import Options From Specia Theme
 *
 */
function cartable_parent_theme_options() {
	$specia_mods = get_option( 'theme_mods_specia' );
	if ( ! empty( $specia_mods ) ) {
		foreach ( $specia_mods as $specia_mod_k => $specia_mod_v ) {
			set_theme_mod( $specia_mod_k, $specia_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'cartable_parent_theme_options' );