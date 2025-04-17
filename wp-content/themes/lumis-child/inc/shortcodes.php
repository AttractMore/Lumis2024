<?php
/**************************************************
 * Shortcode to generate standard contact form
 **************************************************/
function standard_contact_form_callback()
{
  $standard_contact_form = "";
  $contact = get_field("contact");
  $size = "full";
  $photo = $contact["contact_person"]["photo"];
  $phone = esc_html($contact["contact_person"]["phone"]);
  $email = esc_html($contact["contact_person"]["email"]);

  $standard_contact_form .= '<section id="services-contact-section" class="services-contact-form full-width mid-bg"><div class="wrap">';
  $standard_contact_form .= "<h2 class='white-text flash-mid-grey'>Contact us to find out more!</h2>";
  $standard_contact_form .= '<article class="form-plus-contact">';
  $standard_contact_form .= '<div class="contact-form">';
  $standard_contact_form .= do_shortcode("[formidable id=1]");
  $standard_contact_form .= "</div>";
  $standard_contact_form .= '<div class="contact-details">';
  $standard_contact_form .= wp_get_attachment_image($photo, "full");
  $standard_contact_form .= "<aside>";
  $standard_contact_form .= "<p><strong>" . esc_html($contact["contact_person"]["name"]) . "</strong></p>";
  $standard_contact_form .= "<p>" . esc_html($contact["contact_person"]["title"]) . "</p>";
  $standard_contact_form .= '<p>Phone:&nbsp;<a href="tel:' . $phone . '">' . $phone . "</a></p>";
  $standard_contact_form .= '<p><a href="mailto:' . $email . '">' . $email . "</a></p>";
  $standard_contact_form .= "</aside>";
  $standard_contact_form .= "</div>";
  $standard_contact_form .= "</article>";
  $standard_contact_form .= "</div></section>";

  return $standard_contact_form;
}
add_shortcode("standard-contact-form", "standard_contact_form_callback");

/**************************************************
 * Shortcode to generate set of team mambers
 **************************************************/
function display_team_members_callback($atts)
{
  $atts = shortcode_atts(
    [
      "ismanagement" => "no",
    ],
    $atts
  );
  $output = "";
  $args = [
    "posts_per_page" => 100,
    "post_status" => "publish",
    "post_type" => "team_member",
  ];
  $team_members = new WP_Query($args);
  if ($team_members->have_posts()) {
    $output .= "<div class='team-members'>";
    while ($team_members->have_posts()) {
      $team_members->the_post();
      $linkedin_url = get_field("linkedin_url");
      $email_address = get_field("email");

      if (get_field("management_team") === $atts["ismanagement"]) {
        $output .= "<div class='team-member'>";
        $output .= display_team_member_details($linkedin_url, $email_address, $team_members->ID);
        $output .= "</div>";
      }
    }
    $output .= "</div>";
  }
  wp_reset_postdata();
  return $output;
}
add_shortcode("display_team_members", "display_team_members_callback");
