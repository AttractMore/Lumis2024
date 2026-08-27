<?php
/**
 * Template Name: Gated Content template Page
 *
 * This is the template that displays the Gated content e.g Advice on Advice
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

get_header(); ?>

<div id="primary" <?php astra_primary_class($classes); ?>>
  <article class="gated-downloads">
    <section class="gated-downloads-introduction full-width mid-bg mb0">
      <div class="gated-downloads-introduction-container wrap">
        <header class="entry-header">
          <h1 class="entry-title h2 white-text flash-mid-grey" itemprop="headline"><?php echo get_field("page_heading"); ?></h1>
        </header>
        <div class="gated-downloads-introduction-content">
          <div class="gated-downloads-introduction-text">
            <?php echo wp_kses_post(get_field("intro_text")); ?>
            <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 3 ) ); ?>
          </div>
          <?php $intro_image = get_field("intro_image");
            if ($intro_image) {
              echo wp_get_attachment_image($intro_image, "full");
            }
          ?>
      </div>
    </section><!-- .gated-downloads-introduction -->
  </article>
</div><!-- #primary -->

<?php get_footer(); ?>
