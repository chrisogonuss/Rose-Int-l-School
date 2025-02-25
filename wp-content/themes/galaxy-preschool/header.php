<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Galaxy Preschool
 */
/**
* Hook - galaxy_preschool_action_doctype.
*
* @hooked galaxy_preschool_doctype -  10
*/
do_action( 'galaxy_preschool_action_doctype' );
?>
<head>
<?php
/**
* Hook - galaxy_preschool_action_head.
*
* @hooked galaxy_preschool_head -  10
*/
do_action( 'galaxy_preschool_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<?php

/**
* Hook - galaxy_preschool_action_before.
*
* @hooked galaxy_preschool_page_start - 10
*/
do_action( 'galaxy_preschool_action_before' );

/**
*
* @hooked galaxy_preschool_header_start - 10
*/
do_action( 'galaxy_preschool_action_before_header' );

/**
*
*@hooked galaxy_preschool_site_branding - 10
*@hooked galaxy_preschool_header_end - 15 
*/
do_action('galaxy_preschool_action_header');

/**
*
* @hooked galaxy_preschool_content_start - 10
*/
do_action( 'galaxy_preschool_action_before_content' );

/**
 * Banner start
 * 
 * @hooked galaxy_preschool_banner_header - 10
*/
do_action( 'galaxy_preschool_banner_header' );  
