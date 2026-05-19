<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<div id="primary" <?php astra_primary_class(); ?>>
  <main id="main" class="site-main">

    <header class="page-header">
      <figure>
        <figcaption>
          <h1 class="h2 page-title white-text">Case Studies</h1>
          <p class="white-text">Explore our case studies to discover how Lumis International navigates complex global regulatory landscapes, mitigates development risks, and optimizes strategic pathways to accelerate cutting-edge biopharma innovations to market.</p>
        </figcaption>
        <img src="/wp-content/uploads/2026/05/operating-theatre.jpg" alt="Medical examination room with a range of modern equipment surrounding an empty examination table" width="1120" height="467" decoding="async" loading="eager">
      </figure>
    </header>

    <div class="all-case-studies">
      <?php if (have_posts()) {

        while (have_posts()) {
          the_post();
          get_template_part("template-parts/content", get_post_type());
        }
        } else {
          echo "<p>There are no case studies to show.</p>";
        } ?>

        <?php the_posts_navigation([
          "prev_text" => '<span class="nav-subtitle">' . esc_html__("Older Case studies", "lumis") . "</span>",
          "next_text" => '<span class="nav-subtitle">' . esc_html__("Newer Case studies", "lumis") . "</span>",
        ]); ?>

    </div>
  </main>
</div><!-- #primary -->

<?php get_footer(); ?>
