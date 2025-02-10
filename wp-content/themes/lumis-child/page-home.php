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
      <h1 class="white-text">Representing your medical innovation.<br>Empowering your product development.</h1>
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

  <section class="latest-posts full-width">
    <div class="latest-posts-container wrap">
      <h2 class="flash-dark-orange">The latest from Lumis Content Hub</h2>
      <?php
      $args = [
        "post_type" => ["post", "videos"],
        "post_status" => "publish",
        "posts_per_page" => 3,
      ];
      $query = new WP_Query($args);
      ?>
      <?php if ($query->have_posts()):
        echo '<div class="posts-container">';
        while ($query->have_posts()):
          $query->the_post(); ?>
          <div class="post-container">
            <h2 class="post-title h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="post-image-details">
              <div class="post-image">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail("full"); ?>
                </a>
              </div>
              <div class="post_details">
                <span class="category-display"><span class="category-display-label">Topic(s): </span>

              <?php
              $categories = get_the_category();
              $separator = " | ";
              $output = "";
              if (!empty($categories)) {
                foreach ($categories as $category) {
                  $output .=
                    '<a href="' .
                    esc_url(get_category_link($category->term_id)) .
                    '" alt="' .
                    esc_attr(sprintf(__("View all posts in %s", "textdomain"), $category->name)) .
                    '">' .
                    esc_html($category->name) .
                    "</a>" .
                    $separator;
                }
                echo trim($output, $separator);
              }
              ?>
                </span>
                <?php the_excerpt(); ?>
                <p>
                  <a class="primary-button" href="<? echo get_permalink()?>" aria-label="<? echo get_the_title()?>">
                    <span class="screen-reader-text"><? echo get_the_title()?></span>
                    Read more
                  </a>
                </p>
              </div><!-- .post-details -->
            </div>
          </div><!-- .post-container -->
          <hr>
          <?php
        endwhile;
        wp_reset_postdata();
      endif; ?>
    </div><!-- .posts-container -->

    </div>
  </section>
  <?php astra_primary_content_bottom(); ?> <!-- needed for inclusion of newletter signup block -->

</div><!-- #primary -->

<?php get_footer(); ?>
