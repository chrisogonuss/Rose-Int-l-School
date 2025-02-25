<?php
/**
 * Featured Gallery options.
 *
 * @package Galaxy Preschool
 */

$default = galaxy_preschool_get_default_theme_options();

// Featured Gallery Section
$wp_customize->add_section( 'section_featured_gallery',
	array(
	'title'      => __( 'Gallery Section', 'galaxy-preschool' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'home_page_panel',
	)
);

// Enable Featured Gallery Section
$wp_customize->add_setting('theme_options[enable_featured_gallery_section]', 
	array(
	'default' 			=> $default['enable_featured_gallery_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'galaxy_preschool_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_featured_gallery_section]', 
	array(		
	'label' 	=> __('Enable Section', 'galaxy-preschool'),
	'section' 	=> 'section_featured_gallery',
	'settings'  => 'theme_options[enable_featured_gallery_section]',
	'type' 		=> 'checkbox',	
	)
);

// Section Title
$wp_customize->add_setting('theme_options[featured_gallery_section_title]', 
	array(
	'default'           => $default['featured_gallery_section_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[featured_gallery_section_title]', 
	array(
	'label'       => __('Section Title', 'galaxy-preschool'),
	'section'     => 'section_featured_gallery',   
	'settings'    => 'theme_options[featured_gallery_section_title]',	
	'active_callback' => 'galaxy_preschool_featured_gallery_active',		
	'type'        => 'text'
	)
);

// Number of items
$wp_customize->add_setting('theme_options[number_of_featured_gallery_items]', 
	array(
	'default' 			=> $default['number_of_featured_gallery_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'galaxy_preschool_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_featured_gallery_items]', 
	array(
	'label'       => __('Items (Max: 6)', 'galaxy-preschool'),
	'section'     => 'section_featured_gallery',   
	'settings'    => 'theme_options[number_of_featured_gallery_items]',		
	'type'        => 'number',
	'active_callback' => 'galaxy_preschool_featured_gallery_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 6,
			'step'	=> 1,
		),
	)
);

// Column
$wp_customize->add_setting('theme_options[featured_gallery_column]', 
	array(
	'default' 			=> $default['featured_gallery_column'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'galaxy_preschool_sanitize_select'
	)
);

$wp_customize->add_control(new galaxy_preschool_Image_Radio_Control($wp_customize, 'theme_options[featured_gallery_column]', 
	array(		
	'label' 	=> __('Select Column', 'galaxy-preschool'),
	'section' 	=> 'section_featured_gallery',
	'settings'  => 'theme_options[featured_gallery_column]',
	'type' 		=> 'radio-image',
	'active_callback' => 'galaxy_preschool_featured_gallery_active',
	'choices' 	=> array(		
		'col-1' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-1.jpg',						
		'col-2' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-2.jpg',
		'col-3' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-3.jpg',
		'col-4' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-4.jpg',
		'col-5' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-5.jpg',
		'col-6' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-6.jpg',
		),	
	))
);

// Content Type
$wp_customize->add_setting('theme_options[featured_gallery_content_type]', 
	array(
	'default' 			=> $default['featured_gallery_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'galaxy_preschool_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[featured_gallery_content_type]', 
	array(
	'label'       => __('Content Type', 'galaxy-preschool'),
	'section'     => 'section_featured_gallery',   
	'settings'    => 'theme_options[featured_gallery_content_type]',		
	'type'        => 'select',
	'active_callback' => 'galaxy_preschool_featured_gallery_active',
	'choices'	  => array(
			'featured_gallery_page'	     => __('Page','galaxy-preschool'),
			'featured_gallery_post'	     => __('Post','galaxy-preschool'),
		),
	)
);

$number_of_featured_gallery_items = galaxy_preschool_get_option( 'number_of_featured_gallery_items' );

for( $i=1; $i<=$number_of_featured_gallery_items; $i++ ) {

	// Page
	$wp_customize->add_setting('theme_options[featured_gallery_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'galaxy_preschool_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[featured_gallery_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'galaxy-preschool'), $i),
		'section'     => 'section_featured_gallery',   
		'settings'    => 'theme_options[featured_gallery_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'galaxy_preschool_featured_gallery_page',
		)
	);

	// Posts
	$wp_customize->add_setting('theme_options[featured_gallery_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'galaxy_preschool_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[featured_gallery_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'galaxy-preschool'), $i),
		'section'     => 'section_featured_gallery',   
		'settings'    => 'theme_options[featured_gallery_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => galaxy_preschool_dropdown_posts(),
		'active_callback' => 'galaxy_preschool_featured_gallery_post',
		)
	);
}