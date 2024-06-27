<?php
/**
 * Template NAme: Startseite Page
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

	<?php astra_primary_content_top(); ?>
	<!-- ACF START -->
	<!-- Blue Our Services Section -->
	<section id="our_services_section" class="blue_section">
		<div class="row">
		<?php if (have_rows("our_services_section")): ?>
			<?php while (have_rows("our_services_section")):
     the_row(); ?>
				<div class="ast-col-md-12"><h2><?php the_sub_field("title"); ?></h2></div>
			<?php
   endwhile; ?>
		<?php endif; ?>
		<?php if (have_rows("services_list")): ?>
			<?php while (have_rows("services_list")):
     the_row(); ?>
				<?php if (have_rows("service_name_blue")): ?>
					<?php while (have_rows("service_name_blue")):
       the_row(); ?>
						<div class="ast-col-md-6">
							<?php $icon = get_sub_field("icon"); ?>
							<?php if ($icon): ?>
												<img src="<?php echo esc_url($icon["url"]); ?>" alt="<?php echo esc_attr($icon["alt"]); ?>" />
							<?php endif; ?>
										<h3><?php echo wp_kses_post(get_sub_field("title")); ?></h3>
										<p><?php echo wp_kses_post(get_sub_field("description")); ?></p>
							<?php $link = get_sub_field("link"); ?>
							<?php if ($link): ?>
												<a class="blue_button" aria-label="<?php echo esc_html($link["title"]); ?>" href="<?php echo esc_url($link["url"]); ?>"
												   target="<?php echo esc_attr($link["target"]); ?>"><?php echo esc_html($link["title"]); ?></a>
							<?php endif; ?>
						</div>
					<?php
     endwhile; ?>
				<?php
      // no rows found
      // no rows found
      ?>else: ?>
					<?php
      // no rows found
      ?>
				<?php endif; ?>
			<?php
   endwhile; ?>
		<?php endif; ?>

		</div>
	</section>
	<!-- Orange Section -->
	<section id="our_services_add_section" class="orange_section ">
		<div class="row">
		<?php if (have_rows("services_list")): ?>
			<?php while (have_rows("services_list")):
     the_row(); ?>
				<?php if (have_rows("service_orange")): ?>
					<?php while (have_rows("service_orange")):
       the_row(); ?>
								<div class="ast-col-md-4">
					<?php $icon = get_sub_field("icon"); ?>
					<?php if ($icon): ?>
											<img src="<?php echo esc_url($icon["url"]); ?>" alt="<?php echo esc_attr($icon["alt"]); ?>" />
					<?php endif; ?>
          <h3><?php echo wp_kses_post(get_sub_field("title")); ?></h3>
					<p><?php echo wp_kses_post(get_sub_field("description")); ?></p>
					<?php $link = get_sub_field("link"); ?>
					<?php if ($link): ?>
											<a class="blue_button" aria-label="<?php echo esc_html($link["title"]); ?>" href="<?php echo esc_url(
  $link["url"]
); ?>" target="<?php echo esc_attr($link["target"]); ?>"><?php echo esc_html($link["title"]); ?></a>
					<?php endif; ?>
								</div>
					<?php
     endwhile; ?>
				<?php
      // no rows found
      // no rows found
      ?>else: ?>
					<?php
      // no rows found
      ?>
				<?php endif; ?>
			<?php
   endwhile; ?>
		<?php endif; ?>
		</div>
	</section>

	<!-- Top full width description section -->
	<section id="description_section">
		<div class="row">
			<?php if (have_rows("lumis_big_blocks")): ?>
				<?php while (have_rows("lumis_big_blocks")):
      the_row(); ?>
					<?php if (have_rows("blue_block")): ?>
						<?php while (have_rows("blue_block")):
        the_row(); ?>
							<div id="bordered_bottom" class="column ast-col-lg-6">
							  <?php $image = get_sub_field("image"); ?>
							  <?php if ($image): ?>
									<img style="max-width: 258px" src="<?php echo esc_url($image["url"]); ?>" alt="<?php echo esc_attr(
  $image["alt"]
); ?>" />
							  <?php endif; ?>
                <h3><?php echo wp_kses_post(get_sub_field("title")); ?></h3>
								<p><?php echo wp_kses_post(get_sub_field("description")); ?></p>
								<div class="border_bottom"></div>
								<div class="border_bottom_test"></div>
							</div>
						<?php
      endwhile; ?>
					<?php endif; ?>
					<?php if (have_rows("orange_block")): ?>
						<?php while (have_rows("orange_block")):
        the_row(); ?>
							<div id="bordered_top" class="column ast-col-lg-6">
							  <?php $image = get_sub_field("image"); ?>
							  <?php if ($image): ?>
													<img style="max-width: 258px" src="<?php echo esc_url($image["url"]); ?>" alt="<?php echo esc_attr(
  $image["alt"]
); ?>" />
							  <?php endif; ?>
                <h3><?php echo wp_kses_post(get_sub_field("title")); ?></h3>
								<p><?php echo wp_kses_post(get_sub_field("description")); ?></p>
								<div class="border_top"></div>
								<div class="border_top_test"></div>
							</div>
						<?php
      endwhile; ?>
					<?php endif; ?>
				<?php
    endwhile; ?>
			<?php endif; ?>
		</div>
	</section>
	<!-- ACF END -->

	<?php astra_content_page_loop(); ?>

	<?php astra_primary_content_bottom(); ?>

</div><!-- #primary -->

<?php get_footer(); ?>
