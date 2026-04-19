<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined("ABSPATH")) {
  exit(); // Exit if accessed directly.
} 

session_start();

// Get URL of current page.
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
  $page_url = "https";}
else {
  $page_url = "http";
}
// Here append the common URL characters.
$page_url .= "://";
    
// Append the host(domain name, ip) to the URL.
$page_url .= $_SERVER['HTTP_HOST'];
    
// Append the requested resource location to the URL
$page_url .= $_SERVER['REQUEST_URI'];
// Get URL components
$page_url_components = parse_url($page_url);
// Place query params into $params
if (isset($page_url_components['query'])) {
  parse_str($page_url_components['query'], $params);
  if (isset($params) && !empty($params)) {
    $_SESSION["utm_source"] = $params["utm_source"];
    $_SESSION["utm_medium"] = $params["utm_medium"];
    $_SESSION["utm_campaign"] = $params["utm_campaign"];
    $_SESSION["utm_content"] = $params["utm_content"];
    $_SESSION["utm_term"] = $params["utm_term"];
    $utm_source = $_SESSION["utm_source"];
    
  }
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://analytics.ahrefs.com/analytics.js" data-key="ZMA5oMmI7X84fhAkg9S83Q" async></script>

<?php wp_head(); ?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>

<?php // astra_body_top(); ?>
<?php wp_body_open(); ?>
<div 
	<?php echo astra_attr("site", ["id" => "page", "class" => "hfeed site"]); ?>
>
<!-- <header class="main-page-header">
  <div class="header-container wrap">
    <div class="header-horizontal-menu">
      <nav class="primary" role="navigation" aria-label="Main Navigation">
        <?php //wp_nav_menu([
        //  "theme_location" => "lumis-top-menu",
        //  "container_class" => "lumis-top-menu",
        //  "depth" => 2,
        //]); ?>
			</nav>
      <div class="header-logo">
        <a href="/" rel="home">
          <img src="/wp-content/uploads/2020/06/Lumis_Consulting_WHITE.svg" width="425" height="97" decoding="async">
        </a>
      </div>
    </div>

    <div class="header-vertical-menu">
      <div class="header-logo">
        <a href="/" rel="home">
          <img src="/wp-content/uploads/2020/06/Lumis_Consulting_WHITE.svg" width="425" height="97" decoding="async">
        </a>
      </div>
      <aside class="nav-button">
        <button class="nav-burger" type="button" aria-expanded="false" aria-label="Menu" aria-controls="menu">
          <i></i>
          <span class="visually-hidden">menu</span>
        </button>
      </aside>
      <nav class="primary" role="navigation" aria-label="Main Navigation">
        <?php wp_nav_menu([
          "theme_location" => "lumis-top-menu",
          "container_class" => "lumis-top-menu",
          "depth" => 2,
        ]); ?>
			</nav>

    </div>
  </div>
</header> -->
	<?php // astra_header_before(); ?>

	<?php astra_header(); ?>
<!--	<a class="skip-main" href="#content">Skip to content</a>-->
	<?php // astra_header_after(); ?>

	<?php // astra_content_before(); ?>

	<div id="content" class="site-content">
		<div id="content_overlay_"></div>
		<div class="ast-container">

		<?php // astra_content_top(); ?>
