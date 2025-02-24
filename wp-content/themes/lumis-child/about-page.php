<?php
/**
 * Template Name: About Page
 *
 * This is the template that displays the 2 About pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<div id="primary" <?php astra_primary_class($classes); ?>>
  <article>
    <section class="about full-width">
      <div class="about-container wrap">
        <header class="entry-header">
          <h1 class="entry-title" itemprop="headline"><?php echo the_title(); ?></h1>
        </header>

        <?php the_content(); ?>
      </div>
    </section>
    <?php echo do_shortcode("[standard-contact-form]"); ?>
  </article>
</div><!-- #primary -->

<?php get_footer(); ?>
