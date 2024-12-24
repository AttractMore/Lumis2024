<?php
/**
 * Template Name: Services 2024 Page
 *
 * This is the template that displays the Services pages set up in 2024
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

get_header(); ?>

<div id="primary" <?php astra_primary_class($classes); ?>>
  <article class="service">
    <header class="entry-header">
      <h1 class="entry-title" itemprop="headline"><?php echo esc_html(get_field("service_title")); ?></h1>
    </header>
    <?php astra_primary_content_top(); ?>
    <?php
    $service_introduction = get_field("service_introduction");
    if ($service_introduction): ?>
      <section class="service-introduction">
        <?php
        $icon = $service_introduction["service_icon"];
        $size = "full"; // (thumbnail, medium, large, full or custom size)
        if ($icon) {
          echo "<aside>";
          echo wp_get_attachment_image($icon, $size);
          echo "</aside>";
        }
        ?>
        <div class="service-introduction-content">
          <p class="service-summary">
            <svg aria-hidden='true'>
              <use xlink:href='/wp-content/themes/lumis-child/svg-defs.svg#tick'></use>
            </svg>
          <?php echo esc_html($service_introduction["service_summary"]); ?></p>
          <?php echo wp_kses_post($service_introduction["service_introduction_block"]); ?>
        </div>
      </section>
    <?php endif;
    ?>
    <?php
    $advantages = get_field("advantages");
    if ($advantages): ?>
      <section class="service-advantages reversed-colours-section">
        <div>
          <h2>Our 3E Advantage: Expert. Efficient. Expedited.</h2>
        </div>
        <ul>
          <li>
            <h3><?php echo esc_html($advantages["advantage_1_group"]["advantage_1_heading"]); ?></h3>
            <p><?php echo esc_html($advantages["advantage_1_group"]["advantage_1_text"]); ?></p>
          </li>
          <li>
            <h3><?php echo esc_html($advantages["advantage_2_group"]["advantage_2_heading"]); ?></h3>
            <p><?php echo esc_html($advantages["advantage_2_group"]["advantage_2_text"]); ?></p>
          </li>
          <li>
            <h3><?php echo esc_html($advantages["advantage_3_group"]["advantage_3_heading"]); ?></h3>
            <p><?php echo esc_html($advantages["advantage_3_group"]["advantage_3_text"]); ?></p>
          </li>
        </ul>
      </section>
    <?php endif;
    ?>

    <?php
    $our_services = get_field("our_services");
    if ($our_services): ?>
    <section class="our-services">
      <article>
        <div>
          <h2><?php echo esc_html($our_services["services_title"]); ?></h2>
        </div>
        <div>
          <?php echo wp_kses_post($our_services["services_description"], false, true, true); ?>
        </div>
      </article>
    <?php endif;
    $rows = get_field("accordion");
    if ($rows) {
      echo '<div class="services-accordion">';
      foreach ($rows as $row) {
        $blockid = strtolower(str_replace(" ", "-", esc_html($row["accordion_block_title"])));
        echo "<details><summary><h3 role='button term' aria-details='";
        echo $blockid;
        echo "'><span><svg aria-hidden='true'><use xlink:href='/wp-content/themes/lumis-child/svg-defs.svg#icon-arrow-down'></use></svg></span>";
        echo esc_html($row["accordion_block_title"]);
        echo "</h3></summary></details>";
        echo "<div class='services-accordion-content' role='definition' id='";
        echo $blockid;
        echo "'>";
        echo wp_kses_post($row["accordion_block"]);
        echo "</div>";
      }
      echo "</div>";
    }
    ?>
    </section>

    <section class="services-contact-reference reversed-colours-section">
      <p>
        <a href="#services-contact-section">Contact us</a>
      </p>
    </section>

    <?php
    $rows = get_field("testimonials");
    if ($rows) {
      echo '<section class="testimonials grey-background-section"><h2>Testimonials</h2><ul class="testimonial-set" id="testimonial-set">';

      foreach ($rows as $row) {
        echo "<li class='testimonial'><blockquote>";
        echo wp_kses_post($row["testimonial"]);
        echo "</blockquote><cite>-&nbsp;";
        echo esc_html($row["attribution"]);
        echo "</cite></li>";
      }
      echo "</ul><nav><button class='slide-arrow' id='slide-arrow-prev'><svg aria-hidden='true'><use xlink:href='/wp-content/themes/lumis-child/svg-defs.svg#icon-arrow-down'></use></svg></button><button class='slide-arrow' id='slide-arrow-next'><svg aria-hidden='true'><use xlink:href='/wp-content/themes/lumis-child/svg-defs.svg#icon-arrow-down'></use></svg></button></nav></section>";
    }
    ?>
    
    <?php
    $associated_category = get_field("associated_category_slug");
    $args = [
      "post_type" => ["post", "videos"],
      "perm" => "readable",
      "category_name" => $associated_category,
      "posts_per_page" => "3",
    ];
    $matching_posts = new WP_Query($args);
    if ($matching_posts->have_posts()) {
      echo "<section class='services-resources'><h2>Additional resources for " . esc_html(get_field("service_title")) . "</h2><ul class='matching-posts'>";

      while ($matching_posts->have_posts()) {
        $matching_posts->the_post();
        echo "<li class='matching-post'><h3 class='post-title'><a class='title' href='" . get_the_permalink() . "'>" . get_the_title() . "</a></h3>";
        if (has_post_thumbnail()) {
          echo "<div class='post-content'><div class='post-image'><a class='image' href='" . get_permalink() . "'>" . get_the_post_thumbnail() . "</a></div>";
        }
        echo "<div class='excerpt-button'><p class='post-excerpt'>" . get_the_excerpt() . "</p>";
        echo "<p class='read-more-button-container'><a class='blue_button read-more' href='" . get_the_permalink() . "'>Read more</a></p></div></div></li><hr>";
      }
      wp_reset_postdata();
      echo "</ul></section>";
    }
    ?>

  <section id="home-contact-section" class="home-contact-form reversed-colours-section">
    <h2>Contact our experts to find out more!</h2>
    <?php
    $contact = get_field("contact");
    $form_shortcode = '[formidable id="1"]';
    ?>
    <article class="form-plus-contact">
      <div class="contact-form">
        <?php echo do_shortcode($form_shortcode); ?>
      </div>
      <div class="contact-details">
        <?php
        $size = "full";
        $photo = $contact["contact_person"]["photo"];
        echo wp_get_attachment_image($photo, $size);
        ?>
        <aside>
          <?php $phone = esc_html($contact["contact_person"]["phone"]); ?>
          <?php $email = esc_html($contact["contact_person"]["email"]); ?>
          <p><strong><?php echo esc_html($contact["contact_person"]["name"]); ?></strong></p>
          <p><?php echo esc_html($contact["contact_person"]["title"]); ?></p>
          <p>Phone:&nbsp;<a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></p>
          <p><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
        </aside>
      </div>
    </article>
  </section>

    <?php astra_primary_content_bottom(); ?>
  </article>
</div><!-- #primary -->

<?php get_footer(); ?>
