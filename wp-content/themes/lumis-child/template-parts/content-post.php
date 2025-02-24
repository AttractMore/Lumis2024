<?php
/**
 * Template part for displaying blog post archive content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */
?>
<div class="post-container">
	<h2 class="post-title h3">
		<a class="title" href="<? echo get_permalink()?>"><? echo get_the_title()?></a>
  </h2>
  <div class="post-meta">
    <span class="category-display"><span class="category-display-label">Topic: </span>

  <?php
  $categories = get_the_category();
  $separator = " | ";
  $output = "";
  if (!empty($categories)) {
    foreach ($categories as $category) {
      $output .=
        '<a href="' .
        esc_url(get_category_link($category->term_id)) .
        '" alt="' .
        esc_attr(sprintf(__("View all posts in %s", "textdomain"), $category->name)) .
        '">' .
        esc_html($category->name) .
        "</a>" .
        $separator;
    }
    echo trim($output, $separator);
  }
  ?>
    </span>
  </div>
	<div class="post-image">
    <a href="<?php echo get_permalink(); ?>">
    <?php if (has_post_thumbnail()) {
      the_post_thumbnail();
    } ?>
    </a>
  </div><!-- .post-image -->
  <div class="post-details">
    <?php the_excerpt(); ?>
		<p>
			<a class="primary-button" href="<? echo get_permalink()?>" aria-label="<? echo get_the_title()?>">
				<span class="screen-reader-text"><? echo get_the_title()?></span>
				Read more
			</a>
		</p>
  </div><!-- .post-details -->
</div><!-- .post-container -->
<hr>