<?php
/**
 * Default theme options.
 *
 * @package Galaxy Preschool
 */

if ( ! function_exists( 'galaxy_preschool_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function galaxy_preschool_get_default_theme_options() {

	$defaults = array();

	// Top Bar
	$defaults['show_header_contact_info'] 		= false;
    $defaults['show_header_social_links'] 		= false;
    $defaults['header_social_links']			= array();

    // Front Page Content
	$defaults['enable_frontpage_content'] 		= true;

	// Slider Section	
	$defaults['enable_featured_slider_section']		    	= false;
	$defaults['featured_slider_content_type']		    	= 'featured_slider_page';
	$defaults['featured_slider_category_readmore_text']		= esc_html__('Read More','galaxy-preschool');
	$defaults['data_slick_speed']					    	= 1000;
	$defaults['data_slick_infinite']				    	= 1;
	$defaults['data_slick_dots']					    	= 1;
	$defaults['data_slick_arrows']					    	= 1;
	$defaults['data_slick_autoplay']				    	= 0;
	$defaults['data_slick_draggable']				    	= 1;
	$defaults['data_slick_fade']					    	= 1;
	$defaults['number_of_featured_slider_items']	    	= 3;

	// Services Section	
	$defaults['enable_featured_services_section']			= false;
	$defaults['number_of_featured_services_items']			= 3;
	$defaults['featured_services_column']					= 'col-3';
	$defaults['featured_services_content_type']				= 'featured_services_page';

	// Classes Section	
	$defaults['enable_featured_classes_section']			= false;
	$defaults['featured_classes_section_title']				= esc_html__( 'Classes', 'galaxy-preschool' );
	$defaults['number_of_featured_classes_items']			= 3;
	$defaults['featured_classes_column']					= 'col-3';
	$defaults['featured_classes_content_type']				= 'featured_classes_page';

	// Gallery Section	
	$defaults['enable_featured_gallery_section']		= false;
	$defaults['featured_gallery_section_title']			= esc_html__( 'Gallery', 'galaxy-preschool' );
	$defaults['number_of_featured_gallery_items']		= 6;
	$defaults['featured_gallery_column']				= 'col-3';
	$defaults['featured_gallery_content_type']			= 'featured_gallery_page';

	// Team Section	
	$defaults['enable_featured_team_section']		    = false;
	$defaults['featured_team_section_title']		    = esc_html__( 'Teachers', 'galaxy-preschool' );
	$defaults['number_of_featured_team_items']		    = 5;
	$defaults['featured_team_column']				    = '3';
	$defaults['featured_team_content_type']			    = 'featured_team_page';

	// Featured Posts Section
	$defaults['enable_featured_posts_section']			= false;
	$defaults['featured_posts_section_title']	    	= esc_html__( 'Latest Posts', 'galaxy-preschool' );
	$defaults['featured_posts_category']	   	    	= 0; 
	$defaults['featured_posts_number']					= 3;
	$defaults['featured_posts_column']					= 'col-3';

	// Theme Options
	$defaults['show_header_image']		    			= 'header-image-enable';
	$defaults['show_page_title']		    			= 'page-title-enable';
	$defaults['layout_options_blog']					= 'no-sidebar';
	$defaults['layout_options_archive']					= 'no-sidebar';
	$defaults['layout_options_page']					= 'no-sidebar';	
	$defaults['layout_options_single']					= 'right-sidebar';	
	$defaults['excerpt_length']							= 25;
	$defaults['readmore_text']							= esc_html__('Learn More','galaxy-preschool');
	$defaults['your_latest_posts_title']				= esc_html__('Blog','galaxy-preschool');
	$defaults['show_blog_posts_image']		    		= 'image-enable';
	$defaults['show_blog_posts_category']				= 'category-enable';
	$defaults['show_blog_posts_title']		    		= 'title-enable';
	$defaults['show_blog_posts_content']				= 'content-enable';
	$defaults['show_blog_posts_button']		    		= 'button-enable';

	//Footer section 		
	$defaults['copyright_text']							= esc_html__( 'Copyright &copy; All rights reserved.', 'galaxy-preschool' );

	// Pass through filter.
	$defaults = apply_filters( 'galaxy_preschool_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'galaxy_preschool_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function galaxy_preschool_get_option( $key ) {

		$default_options = galaxy_preschool_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;