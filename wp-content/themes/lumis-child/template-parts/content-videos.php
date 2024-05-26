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
	<div class="post_details">
		<a class="title" href="<? echo get_permalink()?>"><? echo get_the_title()?></a>

		<div class="post_image">
			<?php 
			$video_url = get_field('video_link');
			$video_id_prefix = "watch?v=";
			$video_id_postfix = "&t=";
			
			if ($video_url) : ?>
				<a href="<? echo get_permalink() ?>">
					<?php 
					$video_id_with_extras = substr($video_url, stripos($video_url, $video_id_prefix) + strlen($video_id_prefix)); 
					$video_time_code = stripos($video_id_with_extras, $video_id_postfix);

					if ($video_time_code) { // if there is a time code suffix, strip it
					$video_id = substr($video_id_with_extras, 0, stripos($video_id_with_extras, $video_id_postfix));
					}
					else {
						$video_id = $video_id_with_extras;
					}
					?>
					<img src="https://img.youtube.com/vi/<?php echo $video_id; ?>/maxresdefault.jpg" alt="<?php echo get_the_title(); ?>" width="1280" height="720" >
					<!-- TODO add fallback -->

				</a>
			<?php endif; ?>
		</div>

		<p>
			<a class="blue_button" href="<? echo get_permalink()?>" aria-label="<? echo get_the_title()?>">
				<span class="screen-reader-text"><? echo get_the_title()?></span>
				Watch
			</a>
		</p>
	</div><!-- .post-details -->
</div><!-- .listing-item -->
