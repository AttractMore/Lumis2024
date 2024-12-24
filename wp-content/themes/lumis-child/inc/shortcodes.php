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

  $standard_contact_form .= '<section id="services-contact-section" class="services-contact-form reversed-colours-section">';
  $standard_contact_form .= "<h2>Contact our experts to find out more!</h2>";
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
  $standard_contact_form .= "</section>";

  return $standard_contact_form;
}
add_shortcode("standard-contact-form", "standard_contact_form_callback");
