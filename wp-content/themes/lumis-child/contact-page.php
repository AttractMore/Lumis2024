<?php
/**
 * Template Name: Contact Page
 *
 * This is the template that displays the main Contact page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<div id="primary" <?php astra_primary_class($classes); ?>>
  <article>
    <section class="contact full-width mid-bg mb0">
      <div class="contact-container wrap">
        <?php the_content(); ?>
      </div>
    </section>
  </article>
</div><!-- #primary -->

<?php get_footer(); ?>
