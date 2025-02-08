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

    <h1 class="h2 archive-title">Category - <?php single_cat_title(); ?></h1>
    <section class="category-content">
      <?php
      $args = [
        "post_type" => ["post", "videos"],
        "category_name" => get_queried_object()->slug,
      ];
      $query = new WP_Query($args);
      ?>
      <?php if ($query->have_posts()):
        echo '<div class="posts-container">';
        while ($query->have_posts()):
          $query->the_post(); ?>
          <div class="post-container">
            <h2 class="post-title h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="post-image">
            <?php the_post_thumbnail("full"); ?>
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
      else:
         ?>
        <p>No posts found in this category.</p>
      <?php
      endif; ?>
    </div><!-- .posts-container -->
    <div class="category-sidebar">
      <div class="category-sidebar-container">
        <h3>Topics:</h3>
        <?php
        $categories = get_categories([
          "orderby" => "name",
          "order" => "ASC",
        ]);
        echo "<ul class='category-list'>";
        foreach ($categories as $category) {
          $category_link = sprintf(
            '<a href="%1$s" alt="%2$s">%3$s</a>',
            esc_url(get_category_link($category->term_id)),
            esc_attr(sprintf(__("View all posts in %s", "textdomain"), $category->name)),
            esc_html($category->name)
          );
          echo "<li>" . sprintf(esc_html__("%s", "textdomain"), $category_link) . "</li> ";
        }
        ?>
        </ul>
      </div>
    </div><!-- .category-sidebar -->
  </section>
</div><!-- #primary -->

<?php get_footer(); ?>
