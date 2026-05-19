<?php
/**
 * Template Name: Case Study
 *
 * This is the template that displays the Case Study  pages set up in 2026
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

get_header(); ?>

<div id="primary" <?php astra_primary_class($classes); ?>>
  <div class="article-form-sidebar">
    <article class="case-study">
      <p class="return">
        <a href="/case-studies/">
          <svg aria-hidden="true"><use xlink:href="/wp-content/themes/lumis-child/svg-defs.svg#long-arrow-left"></use></svg>
          Back to Case Studies
        </a>
      </p>
      <?php 
      if (get_field("subhead")) {
        echo '<p class="subhead">' . get_field("subhead") . '</p>';
      }
      ?>
      <header class="entry-header">
        <h1 class="entry-title h2" itemprop="headline"><?php echo esc_html(get_field("heading")); ?></h1>
      </header>
      <section class="case-study-image">
        <?php 
        if (get_field("primary_image")) {
          echo '<figure>';
          echo wp_get_attachment_image(get_field("primary_image"), "full");
          echo '</figure>';
        }
        ?>
      </section>
      <section class="case-study-context">
        <h2 class="h3">Context</h2>
        <?php
        $context = get_field("context");
        if ($context) {
          echo wp_kses_post($context);
        }
        ?>
      </section>
      <section class="case-study-solution">
        <h2 class="h3">Lumis' solution</h2>
        <?php
        if (get_field("solution")) {
          echo wp_kses_post(get_field("solution"));
        }
        ?>
      </section>
      <section class="case-study-results">
        <h2 class="h3">Result</h2>
        <?php
        $results = get_field("result");
        if ($results["result_1"]["content"]) {
          echo '<ul class="result-items">';
          echo '<li><svg aria-hidden="true"><use xlink:href="/wp-content/themes/lumis-child/svg-defs.svg#green-tick-circle"></use></svg>';
          echo '<aside><strong>' . esc_html($results["result_1"]["lead_in"]) . '</strong>' . esc_html($results["result_1"]["content"]) . '</aside></li>';
          if ($results["result_2"]["content"]) {
            echo '<li><svg aria-hidden="true"><use xlink:href="/wp-content/themes/lumis-child/svg-defs.svg#green-tick-circle"></use></svg>';
            echo '<aside><strong>' . esc_html($results["result_2"]["lead_in"]) . '</strong>' . esc_html($results["result_2"]["content"]) . '</aside></li>';
          }
          if ($results["result_3"]["content"]) {
            echo '<li><svg aria-hidden="true"><use xlink:href="/wp-content/themes/lumis-child/svg-defs.svg#green-tick-circle"></use></svg>';
            echo '<aside><strong>' . esc_html($results["result_3"]["lead_in"]) . '</strong>' . esc_html($results["result_3"]["content"]) . '</aside></li>';
          }
          if ($results["result_4"]["content"]) {
            echo '<li><svg aria-hidden="true"><use xlink:href="/wp-content/themes/lumis-child/svg-defs.svg#green-tick-circle"></use></svg>';
            echo '<aside><strong>' . esc_html($results["result_4"]["lead_in"]) . '</strong>' . esc_html($results["result_4"]["content"]) . '</aside></li>';
          }
          if ($results["result_5"]["content"]) {
            echo '<li><svg aria-hidden="true"><use xlink:href="/wp-content/themes/lumis-child/svg-defs.svg#green-tick-circle"></use></svg>';
            echo '<aside><strong>' . esc_html($results["result_5"]["lead_in"]) . '</strong>' . esc_html($results["result_5"]["content"]) . '</aside></li>';
          }
          if ($results["result_6"]["content"]) {
            echo '<li><svg aria-hidden="true"><use xlink:href="/wp-content/themes/lumis-child/svg-defs.svg#green-tick-circle"></use></svg>';
            echo '<aside><strong>' . esc_html($results["result_6"]["lead_in"]) . '</strong>' . esc_html($results["result_6"]["content"]) . '</aside></li>';
          }
          echo '</ul>';
        }
        ?>
      </section>
      <section class="case-study-why-it-matters">
        <h2 class="h3">Why this matters to sponsors</h2>
        <?php
        if (get_field("why_this_matters")) {
          echo wp_kses_post(get_field("why_this_matters"));
        }
        ?>
      </section>
    </article>

    <section id="home-contact-section" class="home-contact-form mid-bg">
      <div class="home-contact-form-container">

        <h2 class="h3 white-text">
          <?php
          $contact = get_field("contact");
          if ($contact["contact_heading"]) {
            echo esc_html($contact["contact_heading"]);
          } else {
            echo "Contact us to find out more!";
          }
          ?>
        </h2>
        <h3 class="white-text">
          <?php
          if ($contact["contact_subheading"]) {
            echo esc_html($contact["contact_subheading"]);
          }
          ?>
        </h3>
        <?php $form_shortcode = '[formidable id="1"]'; ?>
        <article class="form-plus-contact">
          <div class="contact-details">
            <?php
            $size = "full";
            $photo = $contact["person"]["photo"];
            echo wp_get_attachment_image($photo, $size, false, ["loading" => "lazy"]);
            ?>
            <aside>
              <?php $phone = esc_html($contact["person"]["phone"]); ?>
              <?php $email = esc_html($contact["person"]["email"]); ?>
              <p><strong><?php echo esc_html($contact["person"]["name"]); ?></strong></p>
              <p><?php echo esc_html($contact["_person"]["role"]); ?></p>
              <p>Phone:&nbsp;<a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></p>
              <p><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
            </aside>
          </div>
          <div class="contact-form">
            <?php echo do_shortcode($form_shortcode); ?>
          </div>
        </article>
      </div>
    </section>

    <div class="sidebar">
      <h3 class="h4">Other Case Studies</h3>
      <?php 
      $current = get_the_ID();
      $args = [
        'post_type' => ["case-study"],
        "nopaging" => true,
        "posts_per_page" => "100",
        "orderby" => "date",
        "order" => "ASC",
        ];
      $case_studies = new WP_Query($args);
      if ($case_studies->have_posts()): ?>
      <ul class="case-study-list">
      <?php while ($case_studies->have_posts()):
        $case_studies->the_post(); ?>
        <?php if (get_the_id() != $current) {
          echo '<li>';
          echo '<a class="title" href="' . get_the_permalink() . '">' . esc_html(get_field("heading")) . '</a>';
          echo '<span class="link-to-full-case-study"><a href="' . get_the_permalink() . '">See more</a></span>';
          echo '</li>';
        }
        ?>
      <?php endwhile; ?>
      </ul>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
