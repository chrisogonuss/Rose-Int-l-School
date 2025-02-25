<?php
/**
 * Featured Posts Options.
 *
 * @package Galaxy Preschool
 */

$default = galaxy_preschool_get_default_theme_options();

// Featured Posts Section
$wp_customize->add_section( 'section_featured_posts',
	array(
		'title'      => __( 'Latest Posts Section', 'galaxy-preschool' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
	)
);

// Enable Section
$wp_customize->add_setting('theme_options[enable_featured_posts_section]', 
	array(
	'default' 			=> $default['enable_featured_posts_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'galaxy_preschool_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_featured_posts_section]', 
	array(		
	'label' 	=> __('Enable Section', 'galaxy-preschool'),
	'section' 	=> 'section_featured_posts',
	'settings'  => 'theme_options[enable_featured_posts_section]',
	'type' 		=> 'checkbox',	
	)
);

// Section Title
$wp_customize->add_setting('theme_options[featured_posts_section_title]', 
	array(
	'default'           => $default['featured_posts_section_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[featured_posts_section_title]', 
	array(
	'label'       => __('Section Title', 'galaxy-preschool'),
	'section'     => 'section_featured_posts',   
	'settings'    => 'theme_options[featured_posts_section_title]',	
	'active_callback' => 'galaxy_preschool_featured_posts_active',		
	'type'        => 'text'
	)
);

// Featured Posts Number.
$wp_customize->add_setting( 'theme_options[featured_posts_number]',
	array(
		'default'           => $default['featured_posts_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'galaxy_preschool_sanitize_number_range',
		)
);
$wp_customize->add_control( 'theme_options[featured_posts_number]',
	array(
		'label'       		=> __('Items (Max: 6)', 'galaxy-preschool'),
		'section'     		=> 'section_featured_posts',
		'active_callback' 	=> 'galaxy_preschool_featured_posts_active',		
		'type'        		=> 'number',
		'input_attrs' 		=> array( 
			'min' => 1, 
			'max' => 6, 
			'step' => 1, 
			'style' => 'width: 115px;' 
		),
	)
);

// Column
$wp_customize->add_setting('theme_options[featured_posts_column]', 
	array(
	'default' 			=> $default['featured_posts_column'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'galaxy_preschool_sanitize_select'
	)
);

$wp_customize->add_control(new galaxy_preschool_Image_Radio_Control($wp_customize, 'theme_options[featured_posts_column]', 
	array(		
	'label' 	=> __('Select Column', 'galaxy-preschool'),
	'section' 	=> 'section_featured_posts',
	'settings'  => 'theme_options[featured_posts_column]',
	'type' 		=> 'radio-image',
	'active_callback' => 'galaxy_preschool_featured_posts_active',
	'choices' 	=> array(		
		'col-1' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-1.jpg',						
		'col-2' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-2.jpg',
		'col-3' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-3.jpg',
		'col-4' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-4.jpg',
		),	
	))
);

$featured_posts_number = galaxy_preschool_get_option( 'featured_posts_number' );

// Setting Category.
$wp_customize->add_setting( 'theme_options[featured_posts_category]',
	array(
	'default'           => $default['featured_posts_category'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new galaxy_preschool_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[featured_posts_category]',
		array(
		'label'    => __( 'Select Category', 'galaxy-preschool' ),
		'section'  => 'section_featured_posts',
		'settings' => 'theme_options[featured_posts_category]',	
		'active_callback' => 'galaxy_preschool_featured_posts_active',		
		)
	)
);