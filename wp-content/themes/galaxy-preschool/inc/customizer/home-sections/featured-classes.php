<?php
/**
 * Featured Classes options.
 *
 * @package Galaxy Preschool
 */

$default = galaxy_preschool_get_default_theme_options();

// Featured Featured Classes Section
$wp_customize->add_section( 'section_featured_classes',
	array(
	'title'      => __( 'Classes Section', 'galaxy-preschool' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'home_page_panel',
	)
);

// Enable Featured Classes Section
$wp_customize->add_setting('theme_options[enable_featured_classes_section]', 
	array(
	'default' 			=> $default['enable_featured_classes_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'galaxy_preschool_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_featured_classes_section]', 
	array(		
	'label' 	=> __('Enable Section', 'galaxy-preschool'),
	'section' 	=> 'section_featured_classes',
	'settings'  => 'theme_options[enable_featured_classes_section]',
	'type' 		=> 'checkbox',	
	)
);

// Section Title
$wp_customize->add_setting('theme_options[featured_classes_section_title]', 
	array(
	'default'           => $default['featured_classes_section_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[featured_classes_section_title]', 
	array(
	'label'       => __('Section Title', 'galaxy-preschool'),
	'section'     => 'section_featured_classes',   
	'settings'    => 'theme_options[featured_classes_section_title]',	
	'active_callback' => 'galaxy_preschool_featured_classes_active',		
	'type'        => 'text'
	)
);

// Number of items
$wp_customize->add_setting('theme_options[number_of_featured_classes_items]', 
	array(
	'default' 			=> $default['number_of_featured_classes_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'galaxy_preschool_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_featured_classes_items]', 
	array(
	'label'       => __('Items (Max: 6)', 'galaxy-preschool'),
	'section'     => 'section_featured_classes',   
	'settings'    => 'theme_options[number_of_featured_classes_items]',		
	'type'        => 'number',
	'active_callback' => 'galaxy_preschool_featured_classes_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 6,
			'step'	=> 1,
		),
	)
);

// Column
$wp_customize->add_setting('theme_options[featured_classes_column]', 
	array(
	'default' 			=> $default['featured_classes_column'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'galaxy_preschool_sanitize_select'
	)
);

$wp_customize->add_control(new galaxy_preschool_Image_Radio_Control($wp_customize, 'theme_options[featured_classes_column]', 
	array(		
	'label' 	=> __('Select Column', 'galaxy-preschool'),
	'section' 	=> 'section_featured_classes',
	'settings'  => 'theme_options[featured_classes_column]',
	'type' 		=> 'radio-image',
	'active_callback' => 'galaxy_preschool_featured_classes_active',
	'choices' 	=> array(		
		'col-1' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-1.jpg',						
		'col-2' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-2.jpg',
		'col-3' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-3.jpg',
		'col-4' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-4.jpg',
		),	
	))
);

// Content Type
$wp_customize->add_setting('theme_options[featured_classes_content_type]', 
	array(
	'default' 			=> $default['featured_classes_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'galaxy_preschool_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[featured_classes_content_type]', 
	array(
	'label'       => __('Content Type', 'galaxy-preschool'),
	'section'     => 'section_featured_classes',   
	'settings'    => 'theme_options[featured_classes_content_type]',		
	'type'        => 'select',
	'active_callback' => 'galaxy_preschool_featured_classes_active',
	'choices'	  => array(
			'featured_classes_page'	     => __('Page','galaxy-preschool'),
			'featured_classes_post'	     => __('Post','galaxy-preschool'),
		),
	)
);

$number_of_featured_classes_items = galaxy_preschool_get_option( 'number_of_featured_classes_items' );

for( $i=1; $i<=$number_of_featured_classes_items; $i++ ) {

	// Page
	$wp_customize->add_setting('theme_options[featured_classes_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'galaxy_preschool_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[featured_classes_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'galaxy-preschool'), $i),
		'section'     => 'section_featured_classes',   
		'settings'    => 'theme_options[featured_classes_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'galaxy_preschool_featured_classes_page',
		)
	);

	// Posts
	$wp_customize->add_setting('theme_options[featured_classes_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'galaxy_preschool_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[featured_classes_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'galaxy-preschool'), $i),
		'section'     => 'section_featured_classes',   
		'settings'    => 'theme_options[featured_classes_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => galaxy_preschool_dropdown_posts(),
		'active_callback' => 'galaxy_preschool_featured_classes_post',
		)
	);
}