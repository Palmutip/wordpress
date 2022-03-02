<?php
function cartable_product_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	/*=========================================
	Product Settings Section
	=========================================*/
	// Product Settings Section // 
	$wp_customize->add_section(
        'product_setting',
        array(
        	'priority'      => 128,
            'title' 		=> __('Product Section','cartable'),
		)
    );	
	
	// Setting
	$wp_customize->add_setting(
		'product_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'specia_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'product_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','cartable'),
			'section' => 'product_setting',
			'priority'  => 1
		)
	);
	
	// Hide / Show 
	$wp_customize->add_setting(
		'product_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'specia_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'product_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','cartable'),
			'section' => 'product_setting',
			'priority'  => 2
		)
	);
	
	// Head
	$wp_customize->add_setting(
		'product_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'specia_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'product_head',
		array(
			'type' => 'hidden',
			'label' => __('Header','cartable'),
			'section' => 'product_setting',
			'priority'  => 3
		)
	);
	
	// Product Title // 
	$wp_customize->add_setting(
    	'product_title',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'specia_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'product_title',
		array(
		    'label'   => __('Section Title','cartable'),
		    'section' => 'product_setting',
			'settings'   	 => 'product_title',
			'type'           => 'text',
			'priority'  => 4
		)  
	);
	
	// Product Description // 
	$wp_customize->add_setting(
    	'product_description',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'specia_sanitize_text',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'product_description',
		array(
		    'label'   => __('Section Description','cartable'),
		    'section' => 'product_setting',
			'settings'   	 => 'product_description',
			'type'           => 'textarea',
			'priority'  => 5
		)  
	);

	// Content
	$wp_customize->add_setting(
		'product_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'specia_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'product_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Contents','cartable'),
			'section' => 'product_setting',
			'priority'  => 6
		)
	);
	
	// Product Display Setting // 
	$wp_customize->add_setting(
    	'product_display_num',
    	array(
	        'default'			=> 8,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback'	=> 'specia_sanitize_integer',
		)
	);	

	$wp_customize->add_control( 
		'product_display_num',
		array(
		    'label'   		=> __('Select number of Products','cartable'),
		    'section' 		=> 'product_setting',
			'type' 			=> 'number',
		)  
	);
}

add_action( 'customize_register', 'cartable_product_setting' );

// Product section selective refresh
function cartable_home_product_section_partials( $wp_customize ){
	
	// product_title
	$wp_customize->selective_refresh->add_partial( 'product_title', array(
		'selector'            => '.product-home .section-heading',
		'settings'            => 'product_title',
		'render_callback'  => 'cartable_home_product_title_render_callback',
	
	) );
	
	// product_description
	$wp_customize->selective_refresh->add_partial( 'product_description', array(
		'selector'            => '.product-home .section-description',
		'settings'            => 'product_description',
		'render_callback'  => 'cartable_home_product_description_render_callback',
	
	) );
	}

add_action( 'customize_register', 'cartable_home_product_section_partials' );

// product_title
function cartable_home_product_title_render_callback() {
	return get_theme_mod( 'product_title' );
}
// product_description
function cartable_home_product_description_render_callback() {
	return get_theme_mod( 'product_description' );
}