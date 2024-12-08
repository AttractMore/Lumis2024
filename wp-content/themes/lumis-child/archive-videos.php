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
      <h1 class="page-title">Lumis videos and webinars</h1>
    </header><!-- .page-header -->
    <div class="video-main-content-sidebar fullwidth">

      <div class="video-main-content" style="flex-basis: 66.66%">

        <div class="blog-content display-posts-listing videos">
          
        <?php if (have_posts()): ?>

          <?php
          /* Start the Loop */
          while (have_posts()):
            the_post();

            /*
             * Include the Post-Type-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
             */
            get_template_part("template-parts/content", get_post_type());
          endwhile;

          the_posts_navigation([
            "prev_text" => '<span class="nav-subtitle">' . esc_html__("Older videos", "lumis") . "</span>",
            "next_text" => '<span class="nav-subtitle">' . esc_html__("Newer videos", "lumis") . "</span>",
          ]);
          else:echo "<p>There are no videos to show.</p>";endif; ?>

</div><!-- .blog-content -->
</div><!-- .video-main-content -->


<div class="wp-container-4 wp-block-column taxonomy-sidebar" style="flex-basis:46%">
  <div class="wp-container-3 wp-block-group lumis_hub_sidebar has-very-light-gray-color has-text-color has-background" style="background-color:#0e576d">
    <div class="wp-block-group__inner-container">
      <h2 class="has-text-color" style="color:#ffffff">Our topics</h2>
      <?php
// $categories = get_categories([
//   "hide_empty" => false,
// ]);
// if (!empty($categories)) {
//   foreach ($categories as $category) {
//     $output =
//   }
// }
?>
      <!-- TODO: Needs fixing below! -->
      <?php echo do_shortcode('[taxonomy_terms taxonomy="category"]'); ?>
      
    </div>
  </div>
</div>

</div>
<?php astra_primary_content_bottom(); ?>

</main>

</div><!-- #primary -->


<?php get_footer(); ?>
