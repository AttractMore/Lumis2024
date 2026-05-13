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
  <article class="case-study">
    <?php 
    if (get_field("subhead")) {
      echo '<p class="subhead">' . get_field("subhead") . '</p>';
    }
    ?>
    <header class="entry-header">
      <h1 class="entry-title" itemprop="headline"><?php echo esc_html(get_field("heading")); ?></h1>
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
      <h2>Context</h2>
      <?php
      $context = get_field("context");
      if ($context) {
        echo wp_kses_post($context);
      }
      ?>
    </section>
    <section class="case-study-solution">
      <h2>Lumis' solution</h2>
      <?php
      if (get_field("solution")) {
        echo wp_kses_post(get_field("solution"));
      }
      ?>
    </section>
    <section class="case-study-results">
      <h2>Result</h2>
      <?php
      $results = get_field("result");
      if ($results["result_1"]["content"]) {
        echo '<ul class="result-items">';
        echo '<li><svg aria-hidden="true"><use xlink:href="/wp-content/themes/lumis-child/svg-defs.svg#green-tick-circle"></use></svg>';
        echo '<aside><strong>' . esc_html($results["result_1"]["lead_in"]) . '</strong>' . esc_html($results["result_1"]["content"]) . '</aside></li>';
        if ($results["result_2"]["content"]) {
          echo '<li><svg aria-hidden="true"><use xlink:href="/wp-content/themes/lumis-child/svg-defs.svg#green-tick-circle"></use></svg><strong>' . esc_html($results["result_2"]["lead_in"]) . '</strong>' . esc_html($results["result_2"]["content"]) . '</li>';
        }
        if ($results["result_3"]["content"]) {
          echo '<li><svg aria-hidden="true"><use xlink:href="/wp-content/themes/lumis-child/svg-defs.svg#green-tick-circle"></use></svg><strong>' . esc_html($results["result_3"]["lead_in"]) . '</strong>' . esc_html($results["result_3"]["content"]) . '</li>';
        }
        if ($results["result_4"]["content"]) {
          echo '<li><svg aria-hidden="true"><use xlink:href="/wp-content/themes/lumis-child/svg-defs.svg#green-tick-circle"></use></svg><strong>' . esc_html($results["result_4"]["lead_in"]) . '</strong>' . esc_html($results["result_4"]["content"]) . '</li>';
        }
        if ($results["result_5"]["content"]) {
          echo '<li><svg aria-hidden="true"><use xlink:href="/wp-content/themes/lumis-child/svg-defs.svg#green-tick-circle"></use></svg><strong>' . esc_html($results["result_5"]["lead_in"]) . '</strong>' . esc_html($results["result_5"]["content"]) . '</li>';
        }
        if ($results["result_6"]["content"]) {
          echo '<li><svg aria-hidden="true"><use xlink:href="/wp-content/themes/lumis-child/svg-defs.svg#green-tick-circle"></use></svg><strong>' . esc_html($results["result_6"]["lead_in"]) . '</strong>' . esc_html($results["result_6"]["content"]) . '</li>';
        }
        echo '</ul>';
      }
      ?>
    </section>
    <section class="case-study-why-it-matters">
      <h2>Why this matters to sponsors</h2>
      <?php
      if (get_field("why_this_matters")) {
        echo wp_kses_post(get_field("why_this_matters"));
      }
      ?>
    </section>

    <section id="home-contact-section" class="home-contact-form full-width mid-bg">
    <div class="home-contact-form-container wrap">

      <h2 class="white-text">
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


  </article>
</div>
<?php get_footer(); ?>
