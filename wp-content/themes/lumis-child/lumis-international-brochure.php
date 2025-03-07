<?php
/**
 * Template Name: Lumis International Brochure page 2025
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

get_header(); ?>

<div id="primary" <?php astra_primary_class(); ?>>

  <div id="hero-section" class="brochure-hero-section">
    <img class="brochure-hero-section-graphic" 
    srcset="/wp-content/themes/lumis-child/dist/img/corporate-brochure-main-bg-400.png 400w,
    /wp-content/themes/lumis-child/dist/img/corporate-brochure-main-bg-600.png 600w,
    /wp-content/themes/lumis-child/dist/img/corporate-brochure-main-bg-800.png 800w,
    /wp-content/themes/lumis-child/dist/img/corporate-brochure-main-bg.png 1120w"
    src="/wp-content/themes/lumis-child/dist/img/corporate-brochure-main-bg.png" width="1120" height="480" alt="" decoding="async" loading="eager">
    <div class="brochure-hero-section-text">
      <h1 class="white-text"><?php echo get_field("main_header"); ?></h1>
      <p>
        <a class="primary-button button-no-border" target="_blank" href="/wp-content/uploads/2025/03/lumis-international-brochure.pdf">Download Brochure</a>
      </p>
    </div>
  </div>
  <section class="boxes-1-2">
    <div class="box-1">
      <h2 class="h3"><?php echo get_field("box_1_title"); ?></h2>
      <?php echo wp_kses_post(get_field("box_1_content")); ?>
    </div><!-- .box-1 -->
    <div class="box-2">
      <h2 class="h3"><?php echo get_field("box_2_title"); ?></h2>
      <?php if (have_rows("box_2_content")): ?>
        <ul>
        <?php while (have_rows("box_2_content")):
          the_row(); ?>
          <li>
            <?php $icon = get_sub_field("icon"); ?>
            <?php if ($icon): ?>
              <figure>
                <img aria-hidden="true" src="<?php echo esc_url($icon["url"]); ?>" alt="" >
              </figure>
            <?php endif; ?>
            <aside>
              <p class="lead-text"><?php echo get_sub_field("lead_text"); ?></p>
              <p><?php echo get_sub_field("content"); ?></p>
            </aside>
          </li>
        <?php
        endwhile; ?>
        </ul>
      <?php endif; ?>
    </div> <!-- .box-2-->
  </section><!-- .boxes-1-2 -->

  <section class="boxes-3-4">
    <div class="box-3">
      <aside class="intro-image-text">
        <?php
        $image = get_field("box_3_intro_image");
        $size = "full";
        echo '<figure class="intro-image">';
        echo wp_get_attachment_image($image, $size);
        echo "</figure>";
        ?>
        <h2 class="h3"><?php echo get_field("box_3_title"); ?></h2>
      </aside>
      <?php if (have_rows("box_3_content")): ?>
        <ul>
        <?php while (have_rows("box_3_content")):
          the_row(); ?>
          <li>
            <?php $icon = get_sub_field("icon"); ?>
            <?php if ($icon): ?>
              <figure>
                <img aria-hidden="true" src="<?php echo esc_url($icon["url"]); ?>" alt="" >
              </figure>
            <?php endif; ?>
            <aside>
              <p class="lead-text"><?php echo get_sub_field("lead_text"); ?></p>
              <p><?php echo get_sub_field("content"); ?></p>
            </aside>
          </li>
        <?php
        endwhile; ?>
        </ul>
      <?php endif; ?>
    </div><!-- .box-3 -->

    <div class="box-4">
    <aside class="intro-image-text">
      <?php
      $image = get_field("box_4_intro_image");
      $size = "full";
      echo '<figure class="intro-image">';
      echo wp_get_attachment_image($image, $size);
      echo "</figure>";
      ?>
      <h2 class="h3"><?php echo get_field("box_4_title"); ?></h2>
    </aside>
      <?php if (have_rows("box_4_content")): ?>
        <ul>
        <?php while (have_rows("box_4_content")):
          the_row(); ?>
          <li>
            <?php $icon = get_sub_field("icon"); ?>
            <?php if ($icon): ?>
              <figure>
                <img aria-hidden="true" src="<?php echo esc_url($icon["url"]); ?>" alt="" >
              </figure>
            <?php endif; ?>
            <aside>
              <p class="lead-text"><?php echo get_sub_field("lead_text"); ?></p>
              <p><?php echo get_sub_field("content"); ?></p>
            </aside>
          </li>
        <?php
        endwhile; ?>
        </ul>
      <?php endif; ?>

    </div><!-- .box-4-->

  </section><!-- .boxes-3-4 -->

  <?php echo do_shortcode("[standard-contact-form]"); ?>

</div><!-- #primary -->

<?php get_footer(); ?>
