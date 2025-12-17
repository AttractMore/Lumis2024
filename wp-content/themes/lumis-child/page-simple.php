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
        <p><strong>Get in touch with our Lumis experts to learn more.</strong></p>
        <p class="button-container">
          <a class="primary-button wide-button" href="/contact/">Contact Lumis</a>
        </p>
        <div style="height: 4em;"></div>
      </section>
  </article>

</div><!-- #primary -->

<?php get_footer(); ?>
