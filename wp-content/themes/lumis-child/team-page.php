<?php
/**
 * Template Name: Team Page
 *
 * This is the template that displays the Team page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<div id="primary" <?php astra_primary_class($classes); ?>>
  <article>
    <section class="about full-width">
      <div class="about-container wrap">
        <header class="entry-header">
          <h1 class="entry-title" itemprop="headline"><?php echo the_title(); ?></h1>
        </header>

        <?php the_content(); ?>
        <section class="management-team">
        <h2 class="flash-dark-orange">Management Board</h2>
        <?php
        // $company = get_post_field("post_name", get_post());
        // if ($company) {

        $args = [
          // "numberposts" => -1,
          "posts_per_page" => 100,
          "post_status" => "publish",
          "post_type" => "team_member",
        ];
        $team_members = new WP_Query($args);
        echo "<div class='team-members'>";
        if ($team_members->have_posts()) {
          while ($team_members->have_posts()) {
            $team_members->the_post();
            // $allocated_company = get_field("allocated_company");
            $linkedin_url = get_field("linkedin_url");
            $email_address = get_field("email");

            if (get_field("management_team") === "yes") {
              echo "<div class='team-member'>";
              display_team_member_details($linkedin_url, $email_address);
              echo "</div>";
            }
          }
          echo "</section>";
        }
        echo '<section class="wider-team">';
        echo '<h2 class="flash-dark-orange">Team</h2>';
        if ($team_members->have_posts()) {
          echo "<div class='team-members'>";
          while ($team_members->have_posts()) {
            $team_members->the_post();
            $allocated_company = get_field("allocated_company");
            $linkedin_url = get_field("linkedin_url");
            $email_address = get_field("email");

            if (get_field("management_team") === "no") {
              echo "<div class='team-member'>";
              display_team_member_details($linkedin_url, $email_address);
              echo "</div>";
            }
          }
          echo "</div>";
        }
        echo "</section>";
        // }
        wp_reset_postdata();
        ?>
      </div>
    </section>
    <?php echo do_shortcode("[standard-contact-form]"); ?>
  </article>
</div><!-- #primary -->

<?php get_footer(); ?>
