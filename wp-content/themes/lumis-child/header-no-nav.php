<?php
/**
 * The header for Astra Theme but with no navigation.
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
} ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://analytics.ahrefs.com/analytics.js" data-key="ZMA5oMmI7X84fhAkg9S83Q" async></script>

<?php wp_head(); ?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>

  <?php wp_body_open(); ?>
  <div <?php echo astra_attr("site", ["id" => "page", "class" => "hfeed site"]); ?>>
    <header class="main-page-header" id="masthead">
      <section class="main-page-header-container ast-container">
        <div class="ast-site-identity" itemtype="https://schema.org/Organization" itemscope="itemscope">
          <span class="site-logo-img">
            <a href="/" class="custom-logo-link" rel="home">
              <img width="425" height="97" src="/wp-content/uploads/2020/06/Lumis_Consulting_WHITE.svg" class="custom-logo astra-logo-svg" alt="Lumis logo" decoding="async">
            </a>
          </span>
        </div>
      </section>
    </header>
	<div id="content" class="site-content">
		<!-- <div id="content_overlay_"></div>
		<div class="ast-container"> -->

