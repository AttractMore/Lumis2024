<?php
/**
 * Template Name: Home page template (2024)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

get_header(); ?>

<div id="primary" <?php astra_primary_class(); ?>>
  <div id="hero-section" class="full-width mid-bg">
    <!-- <div class="hero-section-img">
      <img src="/wp-content/uploads/2020/06/IconsLUMIS-Final-Header.svg" alt="We accelerate your clinical development" />
    </div> -->
    <div class="hero-section-text wrap">
      <h1 class="h2 white-text">Representing your medical innovation.<br>Empowering your product development.</h1>
    </div>
  </div>

  <section class="home-introduction">
    <?php the_content(); ?>
  </section>

  <section class="home-services-section full-width light-bg mb0">
    <div class="home-services-section-container wrap">
    <?php if (have_rows("services_list")): ?>
      <?php while (have_rows("services_list")):
        the_row(); ?>
      <ul>
        <li>
          <h2 class="flash-dark-orange"><?php echo get_sub_field("legal_title"); ?></h2>
          <?php
          $image = get_sub_field("legal_intro_image");
          $size = "full";
          echo '<figure class="intro-image">';
          echo wp_get_attachment_image($image, $size);
          echo "</figure>";
          ?>
          <?php echo wp_kses_post(get_sub_field("legal_intro_text")); ?>
        </li>
        <?php if (have_rows("legal_service")): ?>
          <?php while (have_rows("legal_service")):
            the_row(); ?>
            <li class="legal-service">
              <?php $icon = get_sub_field("icon"); ?>
              <aside>
                <?php if ($icon): ?>
                  <img aria-hidden="true" src="<?php echo esc_url($icon["url"]); ?>" alt="<?php echo esc_attr($icon["alt"]); ?>" />
                <?php endif; ?>
                <h3><?php echo wp_kses_post(get_sub_field("title")); ?></h3>
              </aside>
              <?php echo wp_kses_post(get_sub_field("description")); ?>
              <?php $link = get_sub_field("link"); ?>
              <?php if ($link): ?>
                <span class="service-link">
                  <a aria-label="<?php echo esc_html($link["title"]); ?>" href="<?php echo esc_url($link["url"]); ?>">
                    <?php echo esc_html($link["title"]); ?>
                    <svg aria-hidden="true"><use xlink:href="/wp-content/themes/lumis-child/svg-defs.svg#long-arrow-right"></use></svg>
                  </a>
                </span>
              <?php endif; ?>
            </li>
            <?php
          endwhile; ?>
        <?php endif; ?>
      <?php
      endwhile; ?>
    <?php endif; ?>

    <?php if (have_rows("services_list")): ?>
      <?php while (have_rows("services_list")):
        the_row(); ?>
        <li>
          <h2 class="flash-dark-orange"><?php echo get_sub_field("consulting_title"); ?></h2>
          <?php
          $image = get_sub_field("consulting_intro_image");
          $size = "full";
          echo '<figure class="intro-image">';
          echo wp_get_attachment_image($image, $size);
          echo "</figure>";
          ?>
          <?php echo wp_kses_post(get_sub_field("consulting_intro_text")); ?>
        </li>
        <?php if (have_rows("consulting_service")): ?>
        <?php while (have_rows("consulting_service")):
          the_row(); ?>
          <li class="consulting-service">
            <?php $icon = get_sub_field("icon"); ?>
            <aside>
              <?php if ($icon): ?>
                <img aria-hidden="true" src="<?php echo esc_url($icon["url"]); ?>" alt="<?php echo esc_attr($icon["alt"]); ?>" />
              <?php endif; ?>
              <h3><?php echo wp_kses_post(get_sub_field("title")); ?></h3>
            </aside>
            <?php echo wp_kses_post(get_sub_field("description")); ?>
            <?php $link = get_sub_field("link"); ?>
            <?php if ($link): ?>
              <span class="service-link">
                <a aria-label="<?php echo esc_html($link["title"]); ?>" href="<?php echo esc_url($link["url"]); ?>" target="<?php echo esc_attr($link["target"]); ?>">
                  <?php echo esc_html($link["title"]); ?>
                  <svg aria-hidden="true"><use xlink:href="/wp-content/themes/lumis-child/svg-defs.svg#long-arrow-right"></use></svg>
                </a>
              </span>
            <?php endif; ?>
            </li>
          <?php
        endwhile; ?>
        </ul>
        <?php endif; ?>
      <?php
      endwhile; ?>
    <?php endif; ?>
    </div>
  </section>

  <?php echo do_shortcode("[standard-contact-form]"); ?>

  <section>
    <h2 class="flash-dark-orange">The latest from Lumis Content Hub</h2>
    <?php echo do_shortcode(
      '[display-posts layout="default" posts_per_page="3" category_display="true" include_excerpt="true" excerpt_length="30" image_size="full" wrapper="div" wrapper_class="display-posts-listing image-left"]'
    ); ?>
  </section>
  <?php astra_primary_content_bottom(); ?> <!-- needed for inclusion of newletter signup block -->

</div><!-- #primary -->

<?php get_footer(); ?>
