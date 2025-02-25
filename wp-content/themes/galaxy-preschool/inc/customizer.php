<?php
/**
 * Galaxy Preschool Theme Customizer
 *
 * @package Galaxy Preschool
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function galaxy_preschool_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Register custom section types.
	$wp_customize->register_section_type( 'galaxy_preschool_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new galaxy_preschool_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Galaxy Preschool', 'galaxy-preschool' ),
				'pro_text' => esc_html__( 'Buy Pro', 'galaxy-preschool' ),
				'pro_url'  => 'http://www.creativthemes.com/downloads/galaxy-preschool-pro/',
				'priority'  => 10,
			)
		)
	);

	// Load customize sanitize.
	include get_template_directory() . '/inc/customizer/sanitize.php';

	// Load customize sanitize.
	include get_template_directory() . '/inc/customizer/active-callback.php';

	// Load topbar sections option.
	include get_template_directory() . '/inc/customizer/topbar.php';

	// Load header sections option.
	include get_template_directory() . '/inc/customizer/theme-section.php';

	// Load home page sections option.
	include get_template_directory() . '/inc/customizer/home-section.php';
	
}
add_action( 'customize_register', 'galaxy_preschool_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function galaxy_preschool_customize_preview_js() {
	wp_enqueue_script( 'galaxy_preschool_customizer', get_template_directory_uri() . '/inc/customizer/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'galaxy_preschool_customize_preview_js' );
/**
 *
 */
function galaxy_preschool_customize_backend_scripts() {

	wp_enqueue_style( 'galaxy-preschool-fontawesome-all', get_template_directory_uri() . '/assets/css/all.css' );

	wp_enqueue_style( 'galaxy-preschool-admin-customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer-style.css' );

	wp_enqueue_script( 'galaxy-preschool-admin-customizer', get_template_directory_uri() . '/inc/customizer/js/customizer-script.js', array( 'jquery', 'customize-controls' ), '20151215', true );
}
add_action( 'customize_controls_enqueue_scripts', 'galaxy_preschool_customize_backend_scripts', 10 );