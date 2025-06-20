<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Galaxy Preschool
 */

/**
 *
 * @hooked galaxy_preschool_footer_start
 */
do_action( 'galaxy_preschool_action_before_footer' );

/**
 * Hooked - galaxy_preschool_footer_top_section -10
 * Hooked - galaxy_preschool_footer_section -20
 */
do_action( 'galaxy_preschool_action_footer' );

/**
 * Hooked - galaxy_preschool_footer_end. 
 */
do_action( 'galaxy_preschool_action_after_footer' );

wp_footer(); ?>

</body>  
</html>