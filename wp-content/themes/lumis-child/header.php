<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>
<?php astra_head_bottom(); ?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>


<?php astra_body_top(); ?>
<?php wp_body_open(); ?>
<div 
	<?php
	echo astra_attr(
		'site',
		array(
			'id'    => 'page',
			'class' => 'hfeed site',
		)
	);
	?>
>


	<?php astra_header_before(); ?>

	<?php astra_header(); ?>
<!--	<a class="skip-main" href="#content">Skip to content</a>-->
	<?php astra_header_after(); ?>

	<?php astra_content_before(); ?>

	<div id="content" class="site-content">
		<div id="content_overlay_"></div>
		<div class="ast-container">

		<?php astra_content_top(); ?>
