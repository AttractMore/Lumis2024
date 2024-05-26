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
	<div <?php echo astra_attr( 'main-header-bar' ); ?>>

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
<!--				<script>-->
<!--					(_ => {-->
<!--						const skip_lnk = document.querySelector('.skip_lnk');-->
<!--						if (!skip_lnk) return false;-->
<!--						skip_lnk.addEventListener('click', e => {-->
<!--							e.preventDefault();-->
<!--							const to_obj = document.getElementById(skip_lnk.href.split('#')[1]);-->
<!--							if (to_obj) {-->
<!--								to_obj.setAttribute('tabindex', '-1');-->
<!--								to_obj.addEventListener('blur', e => {-->
<!--									to_obj.removeAttribute('tabindex');-->
<!--								}, {once: true});-->
<!--								to_obj.focus();-->
<!--							}-->
<!--						});-->
<!--					})();-->
<!--				</script>-->
				<div class="ast-flex main-header-container">
					<?php astra_masthead_content(); ?>
				</div><!-- Main Header Container -->
			</div>
			<div id="hero_section">
				<div class="ast-row">
				<div class="hero_section_img ast-col-md-3 ast-col-sm-4 ast-col-xs-5">
<!--					<img src="--><?//=get_stylesheet_directory_uri()?><!--/dist/img/header/Lumis_header.svg" alt="">-->


			<?php $image = get_field( 'image', 'option' ); ?>
			<?php if ( $image ) : ?>
							<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
			<?php endif; ?>
				</div>
				<div class="hero_section_text ast-col-md-9 ast-col-sm-8 ast-col-xs-7">
<!--					<h1>We accelerate your clinical development</h1>-->
					<h1><?php the_field( 'top_text' ); ?></h1>
				</div>
					<div class="ast-col-xs-2">
			  <?
//				  echo '<h3 id="menu-toggle"></h3>';



				  /* The below code checks if a mobile-menu is set from the backend in the menu settings. If a menu has been set it will be displayed in the header. Or else, a menu has not been set then display a message.*/

				  /*wp_nav_menu( array(
           'depth' => 6,
           'sort_column' => 'menu_order',
           'container' => 'ul',
           'menu_id' => 'mobile_menu',
           'menu_class' => '',
           'theme_location' => 'mobile-menu'
         ) );*/
			  ?>
					</div>
			</div>
			</div>
		</div><!-- ast-row -->
		<?php astra_main_header_bar_bottom(); ?>
	</div> <!-- Main Header Bar -->
</div> <!-- Main Header Bar Wrap -->
