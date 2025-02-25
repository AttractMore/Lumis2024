<?php
/**
 * The template for displaying category pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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

    <header class="page-header">
      <h1 class="archive-title">Category - <?php single_cat_title(); ?></h1>
    </header>
    <section class="blog-category-content <?php echo get_queried_object()->slug; ?>">
      <?php
      $args = [
        "post_type" => ["post", "videos"],
        "category_name" => get_queried_object()->slug,
        "post_status" => "publish",
        "paged" => get_query_var("paged", 1),
      ];
      $query = new WP_Query($args);
      ?>
      <?php if ($query->have_posts()):
        echo '<div class="posts-container">';
        while ($query->have_posts()):
          $query->the_post(); ?>
          <div class="post-container">
            <h2 class="post-title h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="post-image mb1">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail("full"); ?>
            </a>
            </div>
            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div>
            <p class="post-link">
              <a class="primary-button" href="<?php the_permalink(); ?>">Read more</a>
            </p>
          </div>
      <?php
        endwhile;
        $big = 999999999;
        echo paginate_links([
          "total" => $query->max_num_pages,
          "current" => max(1, get_query_var("paged")),
          "type" => "list",
          "base" => str_replace($big, "%#%", get_pagenum_link($big)),
        ]);
        wp_reset_postdata();
      endif; ?>
    </div><!-- .posts-container -->
    <?php get_sidebar("blog"); ?>
  </section>
</div><!-- #primary -->

<?php get_footer(); ?>
