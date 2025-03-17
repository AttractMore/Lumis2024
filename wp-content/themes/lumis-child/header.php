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
} ?><!DOCTYPE html>
<!-- <?php astra_html_before(); ?> -->
<html <?php language_attributes(); ?>>
<head>
<!-- <?php astra_head_top(); ?> -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://analytics.ahrefs.com/analytics.js" data-key="ZMA5oMmI7X84fhAkg9S83Q" async></script>

<?php wp_head(); ?>
<?php // astra_head_bottom(); ?>
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
