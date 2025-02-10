<?php
/**
 * @description Main blog page
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<div id="primary" <?php astra_primary_class(); ?>>
  <main id="main" class="site-main">

    <header class="page-header">
      <h1 class="page-title">Lumis blog posts</h1>
    </header><!-- .page-header -->

    <div class="fullwidth blog-category-content">
      <div class="blog-main-content">
        <div class="blog-content posts">
          
        <?php if (have_posts()) {
          echo '<div class="posts-container">';

          while (have_posts()) {
            the_post();
            get_template_part("template-parts/content", get_post_type());
          }

          the_posts_navigation([
            "prev_text" => '<span class="nav-subtitle">' . esc_html__("Older posts", "lumis") . "</span>",
            "next_text" => '<span class="nav-subtitle">' . esc_html__("Newer posts", "lumis") . "</span>",
          ]);
        } else {
          echo "<p>There are no posts to show.</p>";
        } ?>
          </div><!-- .posts-container -->

        </div><!-- .blog-content -->
      </div><!-- .blog-main-content -->

      <?php get_sidebar("blog"); ?>
    </div>
  </main>
</div><!-- #primary -->

<?php get_footer(); ?>
