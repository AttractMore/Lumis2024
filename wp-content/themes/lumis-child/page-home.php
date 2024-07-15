<?php
/**
 * Template NAme: Home page template (2024)
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

get_header(); ?>

<div id="primary" <?php astra_primary_class(); ?>>

	<?php
//astra_primary_content_top();
?>
<!-- <div class="services-header">
  <?php
//$services_title = get_field("our_services_section");
?>
  <?php
//if ($services_title):
?>
    <h2><?php
//echo $services_title["title"];
?></h2>
  <?php
// endif;
?>
</div> -->

<article class="services-sections">
	<section id="our_services_section" class="blue-section">
    <?php if (have_rows("services_list")): ?>
			<?php while (have_rows("services_list")):
     the_row(); ?>
    <h2><?php echo get_sub_field("legal_title"); ?></h2>
				<?php if (have_rows("service_name_blue")): ?>
          <ul>
					<?php while (have_rows("service_name_blue")):
       the_row(); ?>
						<li>
							<?php $icon = get_sub_field("icon"); ?>
							<?php if ($icon): ?>
								<img aria-hidden="true" src="<?php echo esc_url($icon["url"]); ?>" alt="<?php echo esc_attr($icon["alt"]); ?>" />
							<?php endif; ?>
              <h3><?php echo wp_kses_post(get_sub_field("title")); ?></h3>
              <p><?php echo wp_kses_post(get_sub_field("description")); ?></p>
							<?php $link = get_sub_field("link"); ?>
							<?php if ($link): ?>
								<a class="blue_button" aria-label="<?php echo esc_html($link["title"]); ?>" href="<?php echo esc_url(
  $link["url"]
); ?>"   target="<?php echo esc_attr($link["target"]); ?>"><?php echo esc_html($link["title"]); ?></a>
							<?php endif; ?>
            </li>
					<?php
     endwhile; ?>
     </ul>
				<?php endif; ?>
			<?php
   endwhile; ?>
		<?php endif; ?>

	</section>
	<!-- Orange Section -->
	<section id="our_services_add_section" class="orange-section ">
    <?php if (have_rows("services_list")): ?>
			<?php while (have_rows("services_list")):
     the_row(); ?>
      <h2><?php echo get_sub_field("consulting_title"); ?></h2>
				<?php if (have_rows("service_orange")): ?>
          <ul>
					<?php while (have_rows("service_orange")):
       the_row(); ?>
						<li>
              <?php $icon = get_sub_field("icon"); ?>
              <?php if ($icon): ?>
								<img aria-hidden="true" src="<?php echo esc_url($icon["url"]); ?>" alt="<?php echo esc_attr($icon["alt"]); ?>" />
              <?php endif; ?>
              <h3><?php echo wp_kses_post(get_sub_field("title")); ?></h3>
              <p><?php echo wp_kses_post(get_sub_field("description")); ?></p>
              <?php $link = get_sub_field("link"); ?>
              <?php if ($link): ?>
								<a class="blue_button" aria-label="<?php echo esc_html($link["title"]); ?>" href="<?php echo esc_url(
  $link["url"]
); ?>" target="<?php echo esc_attr($link["target"]); ?>"><?php echo esc_html($link["title"]); ?></a>
              <?php endif; ?>
            </li>
					<?php
     endwhile; ?>
     </ul>
				<?php endif; ?>
			<?php
   endwhile; ?>
		<?php endif; ?>
	</section>
</article>

	<?php
//astra_content_page_loop();
?>
  <section>
    <h2>The latest from Lumis Content Hub</h2>
    <?php echo do_shortcode(
      '[display-posts layout="default" posts_per_page="3" category_display="true" include_excerpt="true" excerpt_length="30" image_size="full" wrapper="div" wrapper_class="display-posts-listing image-left"]'
    ); ?>
  </section>
	<?php astra_primary_content_bottom(); ?>

</div><!-- #primary -->

<?php get_footer(); ?>
