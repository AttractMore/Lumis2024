<?php
/**
 * "Default" layout for Display Posts Shortcode
 *
 * @package      StudyFinds2018
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

//echo '<article class="post-summary large">';
//echo '<a class="entry-image-link" href="' . get_permalink() . '">' . get_the_post_thumbnail() . '</a>';
//echo '<h2 class="entry-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
//echo '<a class="lumis_button" href="' . get_permalink() . '">' . get_the_title() . '</a>';
//echo '<a class="lumis_button">' .get_the_category_list() . '</a>';
//
//echo '</article>';
// $categories = wp_get_post_terms($post->ID, 'video_categories');;
// $separator = ' | ';
$output = '';
?>


<div class="listing-item large">
	<div class="post_details">
		<a class="title" href="<? echo get_permalink()?>"><? echo get_the_title()?></a>
		
		<div class="post_image">
			<?php 
			$video_url = get_field('video_link');
			$video_id_prefix = "watch?v="; 
			if ($video_url) : ?>
				<a href="<? echo get_permalink() ?>">
					<?php $video_id = substr($video_url, stripos($video_url, $video_id_prefix) + strlen($video_id_prefix)); ?>
					<img src="https://img.youtube.com/vi/<?php echo $video_id; ?>/maxresdefault.jpg" alt="<?php echo get_the_title(); ?>" width="1280" height="720" >
				</a>
			<?php endif; ?>
		</div>

		<p>
			<a class="read-more blue_button" href="<? echo get_permalink()?>" aria-label="<? echo get_the_title()?>">
				<span class="screen-reader-text"><? echo get_the_title()?>
				</span>Watch</a>
		</p>

	</div>
</div>