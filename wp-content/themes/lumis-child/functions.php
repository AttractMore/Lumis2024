<?php

function lumis_child_enqueue_styles()
{
  wp_enqueue_style("lumis-child-style", get_stylesheet_uri(), [], "1.0.0", "screen, print");
}
add_action("wp_enqueue_scripts", "lumis_child_enqueue_styles");

/**
 * Insert custom styles and scripts
 */
function theme_enqueues_styles_scripts()
{
  // Default theme stylesheet
  wp_enqueue_style("app-css", get_stylesheet_directory_uri() . "/dist/css/app.css");
  // wp_enqueue_style("fa-css", get_stylesheet_directory_uri() . "/dist/css/all.css");
  /*wp_enqueue_style('bootstrap-css');
   wp_enqueue_style('event-css');*/
  //	wp_deregister_script('jquery');
  wp_enqueue_script("app-js", get_stylesheet_directory_uri() . "/dist/js/app.js", ["jquery"], null, true);
}
add_action("wp_enqueue_scripts", "theme_enqueues_styles_scripts", 1001);

// remove version from head
remove_action("wp_head", "wp_generator");

// remove version from rss
add_filter("the_generator", "__return_empty_string");
// remove version from scripts and styles
function remove_version_scripts_styles($src)
{
  if (strpos($src, "ver=")) {
    $src = remove_query_arg("ver", $src);
  }
  return $src;
}
add_filter("style_loader_src", "remove_version_scripts_styles", 9999);
add_filter("script_loader_src", "remove_version_scripts_styles", 9999);
/******************/

/* Remove all thumbnails */
function true_remove_default_image_sizes($sizes)
{
  $sizes = [];

  return $sizes;
}
add_filter("intermediate_image_sizes_advanced", "true_remove_default_image_sizes");
/******/

// register a mobile menu
function wdm_register_mobile_menu()
{
  add_theme_support("nav-menus");
  register_nav_menus(["mobile-menu" => __("Mobile Menu", "wdm")]);
}
add_action("init", "wdm_register_mobile_menu");

// load the JS file
//function wdm_mm_toggle_scripts() {
//	wp_enqueue_script( 'wdm-mm-toggle', get_stylesheet_directory_uri() . '/js/mobile-menu-toggle.js', array('jquery') );
//}
//add_action( 'wp_enqueue_scripts', 'wdm_mm_toggle_scripts' );

/* Use JQuery $ */
wp_enqueue_script("jquery");

/* Add current active class to mobile menu */
add_filter("nav_menu_css_class", "special_nav_class", 10, 2);

function special_nav_class($classes, $item)
{
  if (in_array("current_page_item", $classes)) {
    $classes[] = "active ";
  }
  return $classes;
}

/* ACF Options Pages */
// if (function_exists("acf_add_options_page")) {
//   acf_add_options_page([
//     "page_title" => "Theme General Settings",
//     "menu_title" => "Theme Settings",
//     "menu_slug" => "theme-general-settings",
//     "capability" => "edit_posts",
//     "redirect" => false,
//   ]);

//   acf_add_options_sub_page([
//     "page_title" => "Theme Header Settings",
//     "menu_title" => "Header",
//     "parent_slug" => "theme-general-settings",
//   ]);

//   acf_add_options_sub_page([
//     "page_title" => "Theme Content Settings",
//     "menu_title" => "Content",
//     "parent_slug" => "theme-general-settings",
//   ]);

//   acf_add_options_sub_page([
//     "page_title" => "Theme Footer Settings",
//     "menu_title" => "Footer",
//     "parent_slug" => "theme-general-settings",
//   ]);
// }

if (function_exists("add_theme_support")) {
  add_theme_support("post-thumbnails");
  add_image_size("post-thumbnails-home-page", 730, 354, true); //just my specified size for the default page
}

/* Include header */
include_once "inc/extras.php";
/* Include blog config */
include_once "inc/blog/blog-config.php";
include_once "inc/blog/blog.php";
/* Disable themes features */
//include_once 'inc/core/view-general.php';
//include_once 'inc/core/class-astra-admin-settings.php';
/* Archive settings */
include_once "inc/core/common-functions.php";
include_once "inc/shortcodes.php";

/* SVG Support */
function add_file_types_to_uploads($file_types)
{
  $new_filetypes = [];
  $new_filetypes["svg"] = "image/svg+xml";
  $file_types = array_merge($file_types, $new_filetypes);
  return $file_types;
}
add_filter("upload_mimes", "add_file_types_to_uploads");

/* Blog list Section */
include "template-parts/blog/posts-shortcode.php";

/* Register Top Nav Menu */
function wpb_lumis_custom_menu()
{
  register_nav_menus([
    "lumis-top-menu" => __("Lumis Top Menu"),
    "extra-menu" => __("Extra Menu"),
  ]);
}
add_action("init", "wpb_lumis_custom_menu");

add_action("admin_enqueue_scripts", "ds_admin_theme_style");
add_action("login_enqueue_scripts", "ds_admin_theme_style");
function ds_admin_theme_style()
{
  if (!current_user_can("manage_options")) {
    echo "<style>.update-nag, .updated, .error, .is-dismissible { display: none; }</style>";
  }
}

/* Including Custom Fields */

// Define path and URL to the ACF plugin.
// define("MY_ACF_PATH", get_stylesheet_directory() . "/inc/plugins/acf/");
// define("MY_ACF_URL", get_stylesheet_directory_uri() . "/inc/plugins/acf/");

// Include the ACF plugin.
// include_once MY_ACF_PATH . "acf.php";
// include_once MY_ACF_PATH . "pro/acf-pro.php";

// Customize the url setting to fix incorrect asset URLs.
// add_filter("acf/settings/url", "my_acf_settings_url");
// function my_acf_settings_url($url)
// {
//   return MY_ACF_URL;
// }

// (Optional) Hide the ACF admin menu item.
//add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
//function my_acf_settings_show_admin( $show_admin ) {
//	return true;
//}

/**
 * Template Parts with Display Posts Shortcode
 * @author Bill Erickson
 * @see https://www.billerickson.net/template-parts-with-display-posts-shortcode
 *
 * @param string $output, current output of post
 * @param array $original_atts, original attributes passed to shortcode
 * @return string $output
 */
function be_dps_template_part($output, $original_atts)
{
  // Return early if our "layout" attribute is not specified
  if (empty($original_atts["layout"])) {
    return $output;
  }
  ob_start();
  get_template_part("partials/dps", $original_atts["layout"]);
  $new_output = ob_get_clean();
  if (!empty($new_output)) {
    $output = $new_output;
  }
  return $output;
}
add_action("display_posts_shortcode_output", "be_dps_template_part", 10, 2);

/**
 * WCAG 2.0 Attributes for Dropdown Menus
 *
 * Adjustments to menu attributes tot support WCAG 2.0 recommendations
 * for flyout and dropdown menus.
 *
 * @ref https://www.w3.org/WAI/tutorials/menus/flyout/
 */
function wcag_nav_menu_link_attributes($atts, $item, $args, $depth)
{
  // Add [aria-haspopup] and [aria-expanded] to menu items that have children
  $item_has_children = in_array("menu-item-has-children", $item->classes);
  if ($item_has_children) {
    $atts["aria-haspopup"] = "true";
    $atts["aria-expanded"] = "false";
  }

  return $atts;
}
add_filter("nav_menu_link_attributes", "wcag_nav_menu_link_attributes", 10, 4);

//require_once "../../themes/lumis-child/";

add_filter("body_class", "am_body_classes");
function am_body_classes($classes)
{
  if (is_page("careers")) {
    $classes[] = "careers";
  }
  return $classes;
}

/**
 *
 * Get all terms in taxomony and display as a list
 *
 */
function am_taxonomy_terms_callback($atts)
{
  $a = shortcode_atts(
    [
      "taxonomy" => "",
    ],
    $atts,
    "taxonomy_terms"
  );
  $output = "";

  $terms = get_terms([
    "taxonomy" => $a["taxonomy"],
    "hide_empty" => true,
  ]);

  if (!empty($terms)) {
    $output = '<ul class="taxonomy-terms">';
    foreach ($terms as $term) {
      $output .= '<li><a href="' . esc_url(get_term_link($term)) . '" title="' . esc_attr(sprintf(__("View all posts filed under %s"), $term->name)) . '">' . $term->name . "</a></li>";
    }
    $output .= "</ul>";
  }
  return $output;
}

add_shortcode("taxonomy_terms", "am_taxonomy_terms_callback");

function posts_navigation_callback()
{
  $nav = get_the_posts_navigation([
    "prev_text" => '<span class="nav-subtitle">' . esc_html__("Older videos", "lumis") . "</span>",
    "next_text" => '<span class="nav-subtitle">' . esc_html__("Newer videos", "lumis") . "</span>",
  ]);
  return $nav;
}
add_shortcode("posts_navigation", "posts_navigation_callback");

// add_action('astra_footer_content_top', 'am_footer_newsletter');

// function am_footer_newsletter() {
// 	echo('<div class="ast-container"><p style="color:#fff;">Newsletter</p></div>');
// }

add_action("astra_primary_content_bottom", "add_newsletter_signup");

function add_newsletter_signup()
{
  $body_classes = get_body_class();

  if (in_array("single-post", $body_classes) || in_array("single-videos", $body_classes) || is_page(["events", "blog"]) || is_post_type_archive("videos") || is_front_page()) {
    echo "<aside class='newsletter-signup'><h3>Sign up to our Newsletter!</h3><p class='before-form'>We want to keep you updated on our latest blog posts, upcoming webinars, conferences, relevant industry news and much more…</p>";
    echo do_shortcode("[cleverreach_signup]");
    echo "</aside>";
  }
}

function display_team_member_details($linkedin_url, $email_address)
{
  the_post_thumbnail("full");
  echo "<dialog class='wrap mid-bg'><button autofocus>&#x2716</button>";
  the_post_thumbnail("full");
  echo "<h3 class='white-text'>" . get_the_title() . "</h3>";
  echo "<p class='role white-text'>" . get_field("role") . "</p>";
  the_content();
  echo "</dialog>";
  echo "<h3>" . get_the_title() . "</h3>";
  echo "<p class='role'>" . get_field("role") . "</p>";
  if (!empty($linkedin_url) || !empty($email_address)) {
    echo "<ul class='contact-group'>";
    if ($linkedin_url) {
      echo "<li><a href='" . $linkedin_url . "'><svg class='linkedin'><use xlink:href='/wp-content/themes/lumis-child/svg-defs.svg#linkedin'></use></svg></a></li>";
    }
    if ($email_address) {
      echo "<li><a href='mailto:" . $email_address . "'><svg class='envelope'><use xlink:href='/wp-content/themes/lumis-child/svg-defs.svg#envelope'></use></svg></a></li>";
    }
    echo "</ul>";
  }
}
