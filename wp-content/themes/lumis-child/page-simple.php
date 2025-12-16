<?php
/**
 * Template Name: Simple Page template (2025)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

get_header(); ?>

<div id="primary" <?php astra_primary_class(); ?>>
  <article>
    <header class="entry-header">
      <h1 class="entry-title simple-title"><?php the_title(); ?></h1>
    </header>
      <section class="page-introduction">
        <?php the_content(); ?>
      </section>
  </article>
  <?php add_newsletter_signup(); ?>

</div><!-- #primary -->

<?php get_footer(); ?>
