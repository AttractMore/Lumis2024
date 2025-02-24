<?php
/**
 * Template part for displaying video archive content
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
  <span class="category-display"><span class="category-display-label">Topic(s): </span>

<?php
$categories = get_the_category();
$separator = " | ";
$output = "";
if (!empty($categories)) {
  foreach ($categories as $category) {
    $output .=
      '<a href="' .
      esc_url(get_category_link($category->term_id)) .
      '" title="' .
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
		<?php
  $video_url = get_field("video_link");
  $video_id_prefix = "watch?v=";
  $video_id_postfix = "&t=";

  if ($video_url): ?>
		<a href="<? echo get_permalink() ?>">
		<?php
  $video_id_with_extras = substr($video_url, stripos($video_url, $video_id_prefix) + strlen($video_id_prefix));
  $video_time_code = stripos($video_id_with_extras, $video_id_postfix);

  if ($video_time_code) {
    // if there is a time code suffix, strip it
    $video_id = substr($video_id_with_extras, 0, stripos($video_id_with_extras, $video_id_postfix));
  } else {
    $video_id = $video_id_with_extras;
  }
  ?>
    
    <?php if (has_post_thumbnail()) {
      the_post_thumbnail();
    } else {
      echo '<img src="https://img.youtube.com/vi/' . $video_id . '/maxresdefault.jpg" alt="' . get_the_title() . '" width="1280" height="720" >';
    } ?>
    </a>
    <?php endif;
  ?>
  </div><!-- .post_image -->
  <div class="post-details">
    <?php the_excerpt(); ?>
		<p>
			<a class="primary-button" href="<? echo get_permalink()?>" aria-label="<? echo get_the_title()?>">
				<span class="screen-reader-text"><? echo get_the_title()?></span>
				Watch
			</a>
		</p>
  </div><!-- .post-details -->
</div><!-- .post-container -->
<hr>