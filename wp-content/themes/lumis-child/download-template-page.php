<?php
/**
 * Template Name: Download template Page
 *
 * This is the template that displays the Download items pages e.g. CE Scorecard
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

get_header(); ?>

<div id="primary" <?php astra_primary_class($classes); ?>>
  <article class="downloads">
    <section class="downloads-introduction full-width mid-bg mb0">
      <div class="downloads-introduction-container wrap">
        <header class="entry-header">
          <h1 class="entry-title h2 white-text flash-mid-grey" itemprop="headline"><?php echo esc_html(get_field("page_heading")); ?></h1>
        </header>
        <div class="downloads-introduction-content">
          <div class="downloads-introduction-text">
            <?php echo wp_kses_post(get_field("intro_text")); ?>
          </div>
          <?php $intro_image = get_field("intro_image");
            if ($intro_image) {
              echo wp_get_attachment_image($intro_image, "full");
            }
          ?>
          <?php $button_details = get_field("download_button"); ?>
          <aside class="button-related-content">
            <p class="button-container">
              <a class="primary-button wide-button" 
                  target="_blank" 
                  <?php 
                    // $li_campaign_tracker = "window.lintrk('track', { conversion_id: 25550905 });";
                    // if (str_contains($button_details['link_url'], "ce-marking")) {
                    //   echo 'onclick="' . $li_campaign_tracker . '"';
                    // }
                  ?>
                  href="<?php echo esc_url($button_details['link_url']); ?>"
              >
              <?php echo $button_details['link_text']; ?>
              </a>
            </p>
          </aside>
          <p class="disclaimer"><?php echo esc_html(get_field("disclaimer")); ?></p>
      </div>
    </section><!-- .downloads-introduction -->

    <section class="downloads-features full-width light-bg">
      <div class="downloads-features-container wrap">
        <?php
        // Check rows exists.
        if ( have_rows('features') ): ?>
          <ul role="list">
          <?php // Loop through rows.
          while( have_rows('features') ) : the_row() ?>
            <li class="feature-block">
              <aside class="feature-icon-block" aria-hidden="true">
                <img src="<?php echo esc_url(get_sub_field('icon')); ?>" alt="" loading="lazy">
              </aside>

              <div class="feature-text-block">
                <p class="feature-title"><strong><?php echo esc_html(get_sub_field('title_text')); ?></strong></p>
                <?php echo wp_kses_post(get_sub_field('text_content')); ?>
              </div>
            </li>
          <?php endwhile; ?>

        <?php endif; ?>
          </ul>
          <?php $button_details = get_field("download_button"); ?>
          <p class="button-container">
            <a class="primary-button wide-button" 
                target="_blank" 
                href="<?php echo esc_url($button_details['link_url']); ?>"
            >
            <?php echo $button_details['link_text']; ?>
            </a>
          </p>
          <p class="disclaimer"><?php echo esc_html(get_field("disclaimer")); ?></p>

      </div>
    </section><!-- .downloads-features -->
    
  </article>
</div><!-- #primary -->

<?php get_footer(); ?>
