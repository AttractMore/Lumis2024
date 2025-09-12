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
  wp_enqueue_style("app-css", get_stylesheet_directory_uri() . "/dist/css/app.css", [], filemtime( get_stylesheet_directory() . '/style.css' ));
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
// add_filter("style_loader_src", "remove_version_scripts_styles", 9999);
add_filter("script_loader_src", "remove_version_scripts_styles", 9999);
/******************/

/* Remove all thumbnails */
function true_remove_default_image_sizes($sizes)
{
  $sizes = [];

  return $sizes;
}
//add_filter("intermediate_image_sizes_advanced", "true_remove_default_image_sizes");
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

// add_filter("body_class", "am_body_classes");
// function am_body_classes($classes)
// {
//   if (is_page("careers")) {
//     $classes[] = "careers";
//   }
//   return $classes;
// }
add_filter("body_class", "am_body_classes");
function am_body_classes($classes)
{
  global $post;
  if (in_array("page", $classes, true)) {
    $page_slug = $post->post_name;
    $classes[] = $page_slug;
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

// add_shortcode("taxonomy_terms", "am_taxonomy_terms_callback");

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
  // $body_classes = get_body_class();

  // if (in_array("single-post", $body_classes) || in_array("single-videos", $body_classes) || is_page(["events", "blog"]) || is_post_type_archive("videos") || is_front_page()) {
  echo "<aside class='newsletter-signup'><h3>Sign up to our Newsletter!</h3><p class='before-form'>We want to keep you updated on our latest blog posts, upcoming webinars, conferences, relevant industry news and much more…</p>";
  echo do_shortcode("[cleverreach_signup]");
  echo "</aside>";
  // }
}
function display_post_navigation($type)
{
  $prev_post = get_previous_post();
  if ($prev_post) {
    $prev_id = $prev_post->ID;
    $prev_permalink = get_permalink($prev_id);
    $prev_post_exists = true;
  } else {
    $prev_post_exists = false;
    $prev_permalink = "#";
  }
  $next_post = get_next_post();
  if ($next_post) {
    $next_id = $next_post->ID;
    $next_permalink = get_permalink($next_id);
    $next_post_exists = true;
  } else {
    $next_post_exists = false;
    $next_permalink = "#";
  }
  echo '<nav class="navigation post-navigation custom-nav" role="navigation" aria-label="Posts">';
  echo '<div class="nav-links">';
  echo '<div class="nav-previous ';
  if (!$prev_post_exists) {
    echo "link-disabled";
  }
  echo '">';
  echo '<a href="';
  echo $prev_permalink;
  echo '" rel="prev"> Previous Post</a>';
  echo "</div>";
  if ($type === "videos") {
    echo '<div><a href="/videos/">Back to videos</a></div>';
  } elseif ($type === "blog") {
    echo '<div><a href="/blog/">Back to articles</a></div>';
  }
  echo '<div class="nav-next ';
  if (!$next_post_exists) {
    echo "link-disabled";
  }
  echo '">';
  echo '<a href="';
  echo $next_permalink;
  echo '" rel="next">Next Post </a>';
  echo "</div>";
  echo "</div>";
  echo "</nav>";
}

function display_team_member_details($linkedin_url, $email_address, $post_id)
{
  $output = "";
  $output = get_the_post_thumbnail($post_id, "full");
  $output .=
    "<dialog aria-labelled-by='team-member-name' aria-described-by='team-member-bio' class='wrap mid-bg'><div class='dialog-content'><button autofocus>&times;</button><div class='team-member-content'>";
  $output .= "<figure>";
  $output .= get_the_post_thumbnail($post_id, "full");
  $output .= "</figure>";
  $output .= "<div class='team-member-data'><h3 id='team-member-name' class='white-text'>" . get_the_title() . "</h3>";
  $output .= "<p class='role white-text'>" . get_field("role") . "</p>";
  if (!empty($linkedin_url) || !empty($email_address)) {
    $output .= "<ul class='contact-group'>";
    if ($linkedin_url) {
      $output .= "<li><a href='" . $linkedin_url . "'><svg class='linkedin'><use xlink:href='/wp-content/themes/lumis-child/svg-defs.svg#linkedin'></use></svg></a></li>";
    }
    if ($email_address) {
      $output .= "<li><a href='mailto:" . $email_address . "'><svg class='envelope'><use xlink:href='/wp-content/themes/lumis-child/svg-defs.svg#envelope'></use></svg></a></li>";
    }
    $output .= "</ul>";
  }
  $output .= "<div id='team-member-bio'>";
  $content = apply_filters("the_content", get_the_content());
  $output .= $content;
  $output .= "</div></div>";
  $output .= "</div></div></dialog>";
  $output .= "<h3>" . get_the_title() . "</h3>";
  $output .= "<p class='role'>" . get_field("role") . "</p>";
  if (!empty($linkedin_url) || !empty($email_address)) {
    $output .= "<ul class='contact-group'>";
    if ($linkedin_url) {
      $output .= "<li><a href='" . $linkedin_url . "'><svg class='linkedin'><use xlink:href='/wp-content/themes/lumis-child/svg-defs.svg#linkedin'></use></svg></a></li>";
    }
    if ($email_address) {
      $output .= "<li><a href='mailto:" . $email_address . "'><svg class='envelope'><use xlink:href='/wp-content/themes/lumis-child/svg-defs.svg#envelope'></use></svg></a></li>";
    }
    $output .= "</ul>";
  }
  return $output;
}

function set_number_of_posts($query)
{
  if (!is_admin() && $query->is_main_query() && is_category()) {
    // Display 5 posts on category pages
    $query->set("posts_per_page", 5);
    return;
  }
}
add_action("pre_get_posts", "set_number_of_posts", 1);

function display_post_summary()
{
  echo '<h2 class="post-title h3"><a href="';
  the_permalink();
  echo '">';
  the_title();
  echo "</a></h2>";
  echo '<div class="post-image-details">';
  echo '<div class="post-image">';
  echo '<a href="';
  the_permalink();
  echo '">';
  the_post_thumbnail("full");
  echo "</a></div>";
  echo '<div class="post_details">';
  echo '<span class="category-display"><span class="category-display-label">Topic: </span>';

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
  echo "</span>";
  the_excerpt();
  echo '<p><a class="primary-button" href="' . get_the_permalink() . '" aria-label="' . get_the_title() . '">';
  echo '<span class="screen-reader-text">' . get_the_title() . "</span>Read more</a></p></div><!-- .post-details --></div>";
}

/**
 * Blog author bios
 */
function author_bio()
{
  $author = get_the_author_meta("display_name");
  $args = [
    "post_type" => "author-bio",
    "post_status" => "published",
    "posts_per_page" => -1,
  ];
  $author_bio = new WP_Query($args);
  if ($author_bio->have_posts()) {
    while ($author_bio->have_posts()) {
      $author_bio->the_post();
      $author_name = get_the_title();
      if ($author === $author_name) {
        echo '<section class="author-bio"><div class="author-bio-container">';
        echo "<figure class='author-bio-photo'>";
        the_post_thumbnail("medium");
        echo "</figure>";
        echo '<div class="author-bio-text">' . get_the_content() . "</div></div></section>";
      }
    }
  }
  wp_reset_postdata();
}
