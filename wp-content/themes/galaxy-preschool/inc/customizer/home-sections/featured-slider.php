<?php
/**
 * Slider options.
 *
 * @package Galaxy Preschool
 */

$default = galaxy_preschool_get_default_theme_options();

//  Slider Section
$wp_customize->add_section( 'section_featured_slider',
	array(
	'title'      => __( 'Slider Section', 'galaxy-preschool' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'home_page_panel',
	)
);

// Enable Section
$wp_customize->add_setting('theme_options[enable_featured_slider_section]', 
	array(
	'default' 			=> $default['enable_featured_slider_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'galaxy_preschool_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_featured_slider_section]', 
	array(		
	'label' 	=> __('Enable Section', 'galaxy-preschool'),
	'section' 	=> 'section_featured_slider',
	'settings'  => 'theme_options[enable_featured_slider_section]',
	'type' 		=> 'checkbox',	
	)
);

// Items
$wp_customize->add_setting('theme_options[number_of_featured_slider_items]', 
	array(
	'default' 			=> $default['number_of_featured_slider_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'galaxy_preschool_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_featured_slider_items]', 
	array(
	'label'       => __('Items (Max: 6)', 'galaxy-preschool'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[number_of_featured_slider_items]',		
	'type'        => 'number',
	'active_callback' => 'galaxy_preschool_featured_slider_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 6,
			'step'	=> 1,
		),
	)
);

// Content Type
$wp_customize->add_setting('theme_options[featured_slider_content_type]', 
	array(
	'default' 			=> $default['featured_slider_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'galaxy_preschool_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[featured_slider_content_type]', 
	array(
	'label'       => __('Content Type', 'galaxy-preschool'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[featured_slider_content_type]',		
	'type'        => 'select',
	'active_callback' => 'galaxy_preschool_featured_slider_active',
	'choices'	  => array(
			'featured_slider_page'	   => __('Page','galaxy-preschool'),
			'featured_slider_post'	   => __('Post','galaxy-preschool'),
		),
	)
);

$number_of_featured_slider_items = galaxy_preschool_get_option( 'number_of_featured_slider_items' );

for( $i=1; $i<=$number_of_featured_slider_items; $i++ ) {

	// Page
	$wp_customize->add_setting('theme_options[featured_slider_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'galaxy_preschool_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[featured_slider_page_'.$i.']', 
		array(
		'label'       	  => sprintf( __('Select Page #%1$s', 'galaxy-preschool'), $i),
		'section'     	  => 'section_featured_slider',   
		'settings'    	  => 'theme_options[featured_slider_page_'.$i.']',		
		'type'        	  => 'dropdown-pages',
		'active_callback' => 'galaxy_preschool_featured_slider_page',
		)
	);

	// Posts
	$wp_customize->add_setting('theme_options[featured_slider_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'galaxy_preschool_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[featured_slider_post_'.$i.']', 
		array(
		'label'       	  => sprintf( __('Select Post #%1$s', 'galaxy-preschool'), $i),
		'section'     	  => 'section_featured_slider',   
		'settings'    	  => 'theme_options[featured_slider_post_'.$i.']',		
		'type'        	  => 'select',
		'choices'	  	  => galaxy_preschool_dropdown_posts(),
		'active_callback' => 'galaxy_preschool_featured_slider_post',
		)
	);
}

// Slider Speed
$wp_customize->add_setting('theme_options[data_slick_speed]', 
	array(
	'default' 			=> $default['data_slick_speed'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'galaxy_preschool_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[data_slick_speed]', 
	array(
	'label'       		=> __('Delay Speed (Max: 5000)', 'galaxy-preschool'),
	'section'     		=> 'section_featured_slider',   
	'settings'    		=> 'theme_options[data_slick_speed]',		
	'type'        		=> 'number',
	'active_callback' 	=> 'galaxy_preschool_featured_slider_active',
	'input_attrs' => array(
			'min'	=> 0,
			'max'	=> 5000,
			'step'	=> 100,
		),
	)
);

// Slider Infinite
$wp_customize->add_setting('theme_options[data_slick_infinite]', 
	array(
	'default' 			=> $default['data_slick_infinite'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'galaxy_preschool_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[data_slick_infinite]', 
	array(		
	'label' 	        => __('Infinite', 'galaxy-preschool'),
	'section' 	        => 'section_featured_slider',
	'settings'          => 'theme_options[data_slick_infinite]',
	'type' 		        => 'checkbox',	
	'active_callback' 	=> 'galaxy_preschool_featured_slider_active',
	)
);

// Slider Dots
$wp_customize->add_setting('theme_options[data_slick_dots]', 
	array(
	'default' 			=> $default['data_slick_dots'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'galaxy_preschool_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[data_slick_dots]', 
	array(		
	'label' 	        => __('Dots', 'galaxy-preschool'),
	'section' 	        => 'section_featured_slider',
	'settings'          => 'theme_options[data_slick_dots]',
	'type' 		        => 'checkbox',	
	'active_callback' 	=> 'galaxy_preschool_featured_slider_active',
	)
);

// Slider Arrows
$wp_customize->add_setting('theme_options[data_slick_arrows]', 
	array(
	'default' 			=> $default['data_slick_arrows'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'galaxy_preschool_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[data_slick_arrows]', 
	array(		
	'label' 	        => __('Arrows', 'galaxy-preschool'),
	'section' 	        => 'section_featured_slider',
	'settings'          => 'theme_options[data_slick_arrows]',
	'type' 		        => 'checkbox',	
	'active_callback' 	=> 'galaxy_preschool_featured_slider_active',
	)
);

// Slider Autoplay
$wp_customize->add_setting('theme_options[data_slick_autoplay]', 
	array(
	'default' 			=> $default['data_slick_autoplay'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'galaxy_preschool_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[data_slick_autoplay]', 
	array(		
	'label' 	        => __('Autoplay', 'galaxy-preschool'),
	'section' 	        => 'section_featured_slider',
	'settings'          => 'theme_options[data_slick_autoplay]',
	'type' 		        => 'checkbox',	
	'active_callback' 	=> 'galaxy_preschool_featured_slider_active',
	)
);

// Slider Draggable
$wp_customize->add_setting('theme_options[data_slick_draggable]', 
	array(
	'default' 			=> $default['data_slick_draggable'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'galaxy_preschool_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[data_slick_draggable]', 
	array(		
	'label' 	        => __('Draggable', 'galaxy-preschool'),
	'section' 	        => 'section_featured_slider',
	'settings'          => 'theme_options[data_slick_draggable]',
	'type' 		        => 'checkbox',	
	'active_callback' 	=> 'galaxy_preschool_featured_slider_active',
	)
);

// Slider Fade
$wp_customize->add_setting('theme_options[data_slick_fade]', 
	array(
	'default' 			=> $default['data_slick_fade'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'galaxy_preschool_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[data_slick_fade]', 
	array(		
	'label' 	        => __('Fade', 'galaxy-preschool'),
	'section' 	        => 'section_featured_slider',
	'settings'          => 'theme_options[data_slick_fade]',
	'type' 		        => 'checkbox',	
	'active_callback' 	=> 'galaxy_preschool_featured_slider_active',
	)
);