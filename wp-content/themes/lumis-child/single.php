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

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php astra_content_loop(); ?>

		<?php astra_primary_content_bottom(); ?>
	  <?php
	  $prev_post = get_previous_post();
	  $prev_id = $prev_post->ID;
	  $prev_permalink = get_permalink($prev_id);
	  $next_post = get_next_post();
	  $next_id = $next_post->ID;
	  $next_permalink = get_permalink($next_id);
	  ?>
		<nav class="navigation post-navigation custom_posts_nav" role="navigation" aria-label="Posts">
			<div class="nav-links">
				<div class="nav-previous"><a href="<? echo $prev_permalink ?>" rel="prev">
						<span class="ast-left-arrow"></span> Previous Post</a>
				</div>
				<div style="text-align: center;" class="nav-previou"><a href="<? echo get_page_link(293)?>">Back to articles
					</a></div><div
								class="nav-next"><a href="<? echo
							$next_permalink ?>" rel="next">Next Post <span class="ast-right-arrow"></span></a>
				</div>
			</div>
		</nav>
	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
