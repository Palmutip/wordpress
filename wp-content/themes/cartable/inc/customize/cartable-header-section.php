<?php
function cartable_header_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
	/*=========================================
	Header Navigation
	=========================================*/
	$wp_customize->add_section(
        'header_navigation',
        array(
        	'priority'      => 2,
            'title' 		=> __('Header Navigation','cartable'),
			'panel'  		=> 'header_section',
		)
    );
	
	// All Categories Head
	$wp_customize->add_setting(
		'nav_all_cat_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'specia_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'nav_all_cat_head',
		array(
			'type' => 'hidden',
			'label' => __('All Categories','cartable'),
			'section' => 'header_navigation',
			'priority'  => 1
		)
	);
	
	//  Hide/Show  // 
	$wp_customize->add_setting( 
		'hs_nav_all_cat' , 
			array(
			'default' => '1',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'specia_sanitize_select',
			'priority'      => 12,
		) 
	);
	
	$wp_customize->add_control(
	'hs_nav_all_cat', 
		array(
			'label'	      => esc_html__( 'Hide / Show Categories', 'cartable' ),
			'section'     => 'header_navigation',
			'type'        => 'radio',
			'choices'        => 
			array(
				'1' => 'Show',
				'0'  => 'Hide'
			) 
		) 
	);		
}

add_action( 'customize_register', 'cartable_header_setting' );
