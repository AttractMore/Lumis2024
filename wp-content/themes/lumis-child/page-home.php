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

  <div id="hero-section" class="hero-section full-width">
    <div class="hero-section-overlay"></div>
    <img class="hero-section-graphic" src="/wp-content/themes/lumis-child/dist/img/home-page-graphic-with-gradient-1.jpg" alt="" decoding="async">
    <div class="hero-section-text wrap">
      <!-- <h1 class="white-text">Representing your medical innovation.<br>Empowering your product development.</h1> -->
      <!-- <h1 class="white-text">Legal Representation & Regulatory Strategy for Clinical and Commercial Success</h1> -->
      <h1 class="white-text">Empowering Biopharma & MedTech Companies to Enter and Navigate EU, UK and Swiss Markets</h1>
      <p class="button-container mb0">
        <a class="primary-button" href="#home-services">Explore our services</a>
      </p>
    </div>
  </div>

  <section class="home-introduction">
    <?php the_content(); ?>
  </section>

  <section id="home-services" class="home-services-section full-width light-bg mb0">
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
              <?php $link = get_sub_field("link"); ?>
                <?php if ($icon): ?>
                  <figure>
                    <a aria-label="<?php echo esc_html($link["title"]); ?>" href="<?php echo esc_url($link["url"]); ?>">
                      <img aria-hidden="true" src="<?php echo esc_url($icon["url"]); ?>" alt="<?php echo esc_attr($icon["alt"]); ?>" />
                    </a>
                  </figure>
                <?php endif; ?>
                <aside>
                  <p class="lead-text">
                    <a aria-label="<?php echo esc_html($link["title"]); ?>" href="<?php echo esc_url($link["url"]); ?>">
                      <?php echo wp_kses_post(get_sub_field("title")); ?>
                    </a>
                  </p>
                  <?php echo wp_kses_post(get_sub_field("description")); ?>
                  <?php if ($link): ?>
                    <span class="service-link">
                      <a aria-label="<?php echo esc_html($link["title"]); ?>" href="<?php echo esc_url($link["url"]); ?>">
                        <?php echo esc_html($link["title"]); ?>
                        <svg aria-hidden="true"><use xlink:href="/wp-content/themes/lumis-child/svg-defs.svg#long-arrow-right"></use></svg>
                      </a>
                    </span>
                    <?php endif; ?>
                </aside>
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
            <?php $link = get_sub_field("link"); ?>
            <?php if ($icon): ?>
              <figure>
                <a aria-label="<?php echo esc_html($link["title"]); ?>" href="<?php echo esc_url($link["url"]); ?>">
                  <img aria-hidden="true" src="<?php echo esc_url($icon["url"]); ?>" alt="<?php echo esc_attr($icon["alt"]); ?>" />
                </a>
              </figure>
              <?php endif; ?>
              <aside>
                <p class="lead-text">
                  <a aria-label="<?php echo esc_html($link["title"]); ?>" href="<?php echo esc_url($link["url"]); ?>">
                    <?php echo wp_kses_post(get_sub_field("title")); ?>
                  </a>
                </p>
                <?php echo wp_kses_post(get_sub_field("description")); ?>
                <?php if ($link): ?>
                  <span class="service-link">
                    <a aria-label="<?php echo esc_html($link["title"]); ?>" href="<?php echo esc_url($link["url"]); ?>" target="<?php echo esc_attr($link["target"]); ?>">
                      <?php echo esc_html($link["title"]); ?>
                      <svg aria-hidden="true"><use xlink:href="/wp-content/themes/lumis-child/svg-defs.svg#long-arrow-right"></use></svg>
                    </a>
                  </span>
                  <?php endif; ?>
              </aside>
            </li>
          <?php
        endwhile; ?>
        <?php endif; ?>
      </ul>
      <?php
      endwhile; ?>
    <?php endif; ?>
    </div>
    <!-- <p class="button-container">
      <a class="primary-button" href="/wp-content/uploads/2025/06/lumis-corporate-presentation.pdf" target="_blank">Download Corporate Brochure</a>
    </p> -->

  </section>

  <?php echo do_shortcode("[standard-contact-form]"); ?>

  <section class="latest-posts full-width">
    <div class="latest-posts-container wrap">
      <h2 class="flash-dark-orange">The latest from Lumis Content Hub</h2>
      <?php
      $args = [
        "post_type" => ["post", "videos"],
        "post_status" => "publish",
        "posts_per_page" => 2,
      ];
      $query = new WP_Query($args);
      ?>
      <?php if ($query->have_posts()): ?>
        <div class="posts-container multiple-posts">
        <?php while ($query->have_posts()):
          $query->the_post(); ?>
          <div class="post-container">
            <?php display_post_summary(); ?>
          </div><!-- .post-container -->
          <hr>
          <?php
        endwhile; ?>
        </div><!-- .posts-container -->
        <div class="posts-grid-container multiple-posts">
        <?php
        while ($query->have_posts()):
          $query->the_post(); ?>
            <?php display_post_summary(); ?>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
        </div><!-- .posts-grid-container -->
      <?php endif; ?>

    </div>
  </section>
  <?php add_newsletter_signup(); ?>

</div><!-- #primary -->

<?php get_footer(); ?>
