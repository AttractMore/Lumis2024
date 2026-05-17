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
<article>
  <p class="pre-header">Case Study</p>
	<h2 class="post-title h3">
		<a class="title" href="<?php echo get_permalink()?>"><?php echo esc_html(get_field("heading")); ?></a>
  </h2>
  <div class="case-study-excerpt">
    <?php the_excerpt(); ?>
  </div>
  <p class="button-container">
    <a class="primary-button" href="<? echo get_permalink()?>" aria-label="<? echo get_the_title()?>">
      <span class="screen-reader-text"><? echo get_the_title()?></span>
      See more
    </a>
  </p>
</article>
