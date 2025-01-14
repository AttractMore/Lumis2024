<?php
/**
 * Template for Primary Header
 *
 * The header layout 2 for Astra Theme. ( No of sections - 1 [ Section 1 limit - 3 )
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       Astra 1.0.0
 */
?>

<div class="main-header-bar-wrap">
	<div <?php echo astra_attr("main-header-bar"); ?>>

		<?php astra_main_header_bar_top(); ?>
		<div class="ast-container">

			<div class="menu_desktop sticky_desktop_header">
				<a class="skip_lnk" href="#content">Skip to main content</a>
				<style>
					.skip_lnk {
						position: absolute;
						padding: .5rem 1rem;
						color: #000000!important;
						font-family: "Prompt Light",sans-serif!important;
						background: #ffaa3d;
						text-decoration: none;
						font-weight: bold;
						font-size: 20px!important;
						z-index: 10;
						transform: translate3d(.125rem, -5rem, 0);
						transition: transform .3s ease-out;
						top: -50%;
						line-height: 2;
					}
					.skip_lnk:focus {
						transform: translate3d(.125rem, .125rem, 0);
						outline: #fff solid .125rem;
						top: 0;
					}
					@media print {
						.skip_lnk {
							display: none;
						}
					}
				</style>
				<div class="ast-flex main-header-container">
					<?php astra_masthead_content(); ?>
				</div><!-- Main Header Container -->
			</div>
      <?php if (is_front_page()): ?>
      <div id="hero-section" class="inverted_colors_section">
        <div class="hero-section-img">
          <img src="/wp-content/uploads/2020/06/IconsLUMIS-Final-Header.svg" alt="We accelerate your clinical development" />
        </div>
        <div class="hero-section-text">
          <h1>Representing your medical innovation.<br>Empowering your product development.</h1>
        </div>
      </div>
      <?php endif; ?>		
    </div><!-- ast-container -->
		<?php astra_main_header_bar_bottom(); ?>
	</div> <!-- Main Header Bar -->
</div> <!-- Main Header Bar Wrap -->
