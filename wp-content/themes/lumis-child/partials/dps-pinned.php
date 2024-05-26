<?php
/**
 * "Pinned" layout for Display Posts Shortcode
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
$categories = get_the_category();
$separator = ' | ';
$output = '';
?>
<div class="listing-item large pinned_blogpost">
	<div class="post_details">
		<a class="title" href="<? echo get_permalink()?>"><? echo get_the_title()?></a>
		<span class="category-display"><span class="category-display-label"></span>
			<? if ( ! empty( $categories ) ) {
				foreach( $categories as $category ) {
					$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
				}
				echo trim( $output, $separator );
			} ?>
		</span>
		<div class="post_image">
			<a class="image" href="<? echo get_permalink() ?>">
		  <? echo get_the_post_thumbnail()?></a>
		</div>
		<span class="excerpt-dash">-</span>
		<span class="excerpt">
				<? echo get_the_excerpt()?> ...
			<span class="excerpt-more">
				<p style="display: block;" class="read-more blue_button pinned_button">
					<a class="" href="<? echo get_permalink()?>" <? echo get_the_title()?>>
						<span class="screen-reader-text"><? echo get_the_title()?></span>Read More
					</a>
				</p>
			</span>
		</span>
	</div>
</div>
<style>
	.pinned_blogpost .read-more {
		display: none;
	}
</style>