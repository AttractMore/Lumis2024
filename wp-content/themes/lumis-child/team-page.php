<?php
/**
 * Template Name: Team Page
 *
 * This is the template that displays the Team page
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

        <section class="management-team">
          <h2 class="flash-dark-orange">Management Board</h2>
          <?php echo do_shortcode("[display_team_members ismanagement='yes']"); ?>
        </section>

        <section class="wider-team">
          <h2 class="flash-dark-orange">Team</h2>
          <?php echo do_shortcode("[display_team_members ismanagement='no']"); ?>
        </section>
        
      </div>
    </section>
    <?php echo do_shortcode("[standard-contact-form]"); ?>
  </article>
</div><!-- #primary -->

<?php get_footer(); ?>
