<?php
/**
 * Template NAme: Lumis Page Template
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

if (!defined("ABSPATH")) {
  exit(); // Exit if accessed directly.
}

get_header();
?>

<?php if (astra_page_layout() == "left-sidebar"): ?>

	<?php get_sidebar(); ?>

<?php endif; ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>











	  <?php if (have_rows("content_builder")): ?>
		  <?php while (have_rows("content_builder")):
      the_row(); ?>
			  <?php if (get_row_layout() == "full-width_box_with_button_13_-_23_columns"): ?>
					  <h4 style="text-align: center;">Full-width box with button, 1/3 - 2/3 columns:</h4>
					<section id="outsourcing_clinical_trials_best_fit_section" class="inverted_colors_section">

				  <?php if (have_rows("content")): ?>

					  <?php while (have_rows("content")):
         the_row(); ?>
						  <div class="row">
						  <div class="ast-col-md-4 trials_img_col">
                <h3><?php echo wp_kses_post(get_sub_field("title")); ?></h3>
						  </div>
						  <div class="ast-col-md-8">
                <p><?php echo wp_kses_post(get_sub_field("description")); ?></p>
						  </div>
						  </div>
					  <?php
       endwhile; ?>
				  <?php // no rows found
        // no rows found
        ?>else: ?>
					  <?php
        // no rows found
        ?>

				  <?php endif; ?>
						<div class="row">
							<div class="ast-col-md-4">
								<a href="#" class="orange_button"><?php the_sub_field("button"); ?></a>
							</div>
						</div>
					</section>
		    <?php // no rows found
       // no rows found
       ?>elseif (get_row_layout() == "full-width_box_with_headline_button_and_4__text_paragraphs:"): ?>
					<section id="outsourcing_clinical_trials_best_fit_section" class="inverted_colors_section">
						<div class="row">
							<div class="ast-col-md-4">
								<h2><?php the_sub_field("headline"); ?></h2>
							</div>
			    <?php if (have_rows("content")): ?>
				    <?php while (have_rows("content")):
          the_row(); ?>
					    <div class="ast-col-md-4">
              <h3><?php echo wp_kses_post(get_sub_field("title")); ?></h3>
              <p><?php echo wp_kses_post(get_sub_field("description")); ?></p>
					    </div>
						</div>
				    <?php
        endwhile; ?>
			    <?php else: ?>
				    <?php
         // no rows found
         ?>
			    <?php endif; ?>
							<div class="row">
							<div class="ast-col-md-4">
								<a href="#" class="orange_button"><?php the_sub_field("button"); ?></a>
							</div>
							</div>
					</section>
		    <?php elseif (get_row_layout() == "call-to-action_glossary"): ?>
				  <h4 style="text-align: center;">Call-To-Action Glossary:</h4>
					<section style="margin-top: unset" id="call_to_action_section" class="inverted_colors_section">
			    <?php if (have_rows("glossary_content")): ?>
						<div class="row">
				    <?php while (have_rows("glossary_content")):
          the_row(); ?>
					    <div class="ast-col-md-1">
						    <img src="<?= get_stylesheet_directory_uri() ?>/dist/img/content/question_.svg" alt="">
					    </div>
					    <div class="ast-col-md-8">

						    <p><?php the_sub_field("description"); ?>
								    <? if (get_sub_field( 'link' )): ?>
				            <?php $link = get_sub_field("link"); ?>
							    <a href="<?php echo esc_url($link["url"]); ?>" target="<?php echo esc_attr(
  $link["target"]
); ?>"><?php echo esc_html($link["title"]); ?></a>.
								    <? endif;?>
						    </p>
					    </div>

				    <?php
        endwhile; ?>
						</div>
			    <?php endif; ?>
					</section>
			  <?php endif; ?>

		  <?php
    endwhile; ?>
	  <?php // no layouts found
     // no layouts found
     ?>else: ?>
		  <?php
     // no layouts found
     ?>
	  <?php endif; ?>





		<?php astra_content_page_loop(); ?>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if (astra_page_layout() == "right-sidebar"): ?>

	<?php get_sidebar(); ?>

<?php endif; ?>

<?php get_footer(); ?>
