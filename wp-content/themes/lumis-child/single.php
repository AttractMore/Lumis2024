<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined("ABSPATH")) {
  exit(); // Exit if accessed directly.
}

get_header();
?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php astra_content_loop(); ?>
    
    <?php display_post_navigation("blog"); ?>

    <?php add_newsletter_signup(); ?>

		<?php
//astra_primary_content_bottom();
?>
	</div><!-- #primary -->

<?php get_footer(); ?>
