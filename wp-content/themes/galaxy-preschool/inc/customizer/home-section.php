<?php
/**
 * Home Page Options.
 *
 * @package Galaxy Preschool
 */

$default = galaxy_preschool_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'home_page_panel',
	array(
	'title'      => __( 'Home Page Sections', 'galaxy-preschool' ),
	'priority'   => 130,
	'capability' => 'edit_theme_options',
	)
);

/**
* Section Customizer Options.
*/
require get_template_directory() . '/inc/customizer/home-sections/featured-slider.php';
require get_template_directory() . '/inc/customizer/home-sections/featured-services.php';
require get_template_directory() . '/inc/customizer/home-sections/featured-classes.php';
require get_template_directory() . '/inc/customizer/home-sections/featured-gallery.php';
require get_template_directory() . '/inc/customizer/home-sections/featured-team.php';
require get_template_directory() . '/inc/customizer/home-sections/featured-posts.php';

