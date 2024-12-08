<?php
/**
 * Template part for displaying video archive content by taxonomy
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */
?>
<div class="listing-item">
	<h2 class="post_details h4">
		<a class="title" href="<? echo get_permalink()?>"><? echo get_the_title()?></a>
  </h2>
	<div class="post_image">
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
   </div>
		<p>
			<a class="blue_button" href="<? echo get_permalink()?>" aria-label="<? echo get_the_title()?>">
				<span class="screen-reader-text"><? echo get_the_title()?></span>
				Watch
			</a>
		</p>
</div><!-- .listing-item -->
