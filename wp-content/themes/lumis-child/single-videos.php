<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$categories = wp_get_post_terms($post->ID, 'video_categories');;
$separator = ' | ';
$output = '';
?>

	<div id="primary" <?php astra_primary_class(); ?>>
		<h1><?php the_title(); ?></h1>

		<?php astra_primary_content_top(); ?>

		<?php //astra_content_loop(); ?>

		<?php 
		$video_link = get_field('video_link');
		if ($video_link) : ?>
			<?php 
				$video_url = get_field('video_link');
				$video_id_prefix = "watch?v="; 
				$video_id = substr($video_url, stripos($video_url, $video_id_prefix) + strlen($video_id_prefix));
			?>
			<div class="video-container" style="position:relative; height: 0; padding-bottom: 56.25%;">
				<iframe style="position: absolute; width: 100%; height: 100%;" src="https://www.youtube.com/embed/<?php echo $video_id; ?>?rel=0&amp;modestbranding=1" title="<?php echo get_the_title(); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		<?php endif; ?>
		
		<div class="single-video-text-container">

			<?php the_content(); ?>

			<?php 
			$speakers = get_field('speakers');
			if ($speakers) : ?>
				<p><strong>Speaker(s): </strong><?php echo $speakers; ?></p>
			<?php endif; ?>

			<?php $video_date = get_field('date'); 
			if ($video_date) : ?>
				<p><strong>Date: </strong><?php echo $video_date; ?></p>
			<?php endif; ?>		

			<p class="category-display">
				<span class="category-display-label"><strong>Category: </strong></span>
				<?php if ( ! empty( $categories ) ) {
					foreach( $categories as $category ) {
						$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
					}
					echo trim( $output, $separator );
				} ?>
			</p>
		</div>

		<?php astra_primary_content_bottom(); ?>
	  <?php
	  $prev_post = get_previous_post();
		if ($prev_post) {
		  $prev_id = $prev_post->ID;
		  $prev_permalink = get_permalink($prev_id);
			$prev_post_exists = true;
		}
		else {
			$prev_post_exists = false;
			$prev_permalink = "#";
		}
	  $next_post = get_next_post();
		if ($next_post) {
		  $next_id = $next_post->ID;
		  $next_permalink = get_permalink($next_id);
			$next_post_exists = true;
		}
		else {
			$next_post_exists = false;
			$next_permalink = "#";
		}
	  ?>
		<nav class="navigation post-navigation custom_posts_nav" role="navigation" aria-label="Posts">
			<div class="nav-links">
				<div class="nav-previous <?php if (! $prev_post_exists) echo "link-disabled"; ?>">
					<a href="<? echo $prev_permalink ?>" rel="prev"> Previous Post</a>
				</div>
				<div style="text-align: center;">
					<a href="/videos/">Back to videos
					</a>
				</div>
				<div class="nav-next <?php if (! $next_post_exists) echo "link-disabled"; ?>">
					<a href="<? echo $next_permalink ?>" rel="next">Next Post </a>
				</div>
			</div>
		</nav>
	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php //get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
