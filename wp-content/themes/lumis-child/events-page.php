<?php
/**
 * Template Name: Events Page
 *
 * This is the template that displays the Events page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<div id="primary" <?php astra_primary_class($classes); ?>>
  <article>
    <section class="events full-width">
      <div class="events-container wrap">
        <header class="entry-header">
          <h1 class="entry-title" itemprop="headline"><?php echo the_title(); ?></h1>
        </header>
        <?php
        $args = [
          "post_type" => ["lumis-events"],
          "nopaging" => true,
          "posts_per_page" => "100",
          "meta_key" => "end_date",
          "orderby" => "meta_value",
          "order" => "ASC",
        ];
        $events = new WP_Query($args);
        if ($events->have_posts()): ?>
          <section class="events-grid">
            <h2 class="flash-dark-orange">Upcoming events</h2>
            <?php while ($events->have_posts()):
              $events->the_post(); ?>
            <?php
            // Only show events that are current in first section
            $today = new DateTime();
            $today_unix = strtotime(date_format($today, "Y/m/d"));
            $end_date_unix = strtotime(get_field("end_date"));
            if ($end_date_unix >= $today_unix): ?>
              <?php create_event_article(); ?>
            <?php endif;
            ?>
   					<?php
            endwhile; ?>
          </section><!-- .events-grid -->
        <?php endif;
        ?>
        <?php wp_reset_postdata(); ?>
        <?php
        $args = [
          "post_type" => ["lumis-events"],
          "nopaging" => true,
          "posts_per_page" => "100",
          "meta_key" => "end_date",
          "orderby" => "meta_value",
          "order" => "DESC",
        ];
        $events = new WP_Query($args);
        if ($events->have_posts()): ?>
          <section class="events-grid">
            <h2 class="flash-dark-orange">Past events</h2>
            <?php while ($events->have_posts()):
              $events->the_post(); ?>
            <?php // Only show events that are past in second section


            $end_date_unix = strtotime(get_field("end_date"));
            if ($end_date_unix < $today_unix): ?>
              <?php create_event_article(); ?>
            <?php endif;
            ?>
   					<?php
            endwhile; ?>
            </section><!-- .events-grid -->
 						<?php endif;
        ?>
 						<?php wp_reset_postdata(); ?>
      </div>
    </section>
  </article>
</div><!-- #primary -->

<?php get_footer(); ?>
<?php function create_event_article()
{
  echo "<article><p class='screen-date'>";
  echo get_field("screen_date");
  echo "</p>";
  echo "<h3>";
  echo get_the_title();
  echo ", ";
  echo get_field("event_location");
  echo "</h3>";
  if (get_field("registration_url")) {
    echo '<p>Join us at the event <a href="';
    echo get_field("registration_url");
    echo '">Details and registration</a></p>';
  }
  if (get_field("event_notes")) {
    echo "<p>";
    echo get_field("event_notes");
    echo "</p>";
  }
  echo "<hr></article>";
} ?>
