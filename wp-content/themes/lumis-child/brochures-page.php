<?php
/**
 * Template Name: Brochures Page
 *
 * This is the template that displays the brochures
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */


get_header(); ?>
<?php
	$classes = "brochure";
	if ( is_page('lumis-international-brochure') ) {
		$classes =  "brochure lumis-international";
	}
	if ( is_page('lumis-life-sciences-brochure') ) {
		$classes =  "brochure lumis-life-sciences";
	}

?>
<div id="primary" <?php astra_primary_class($classes) ?>>

	<?php astra_primary_content_top(); ?>
	<?php if ( have_rows( 'hero') ) : ?>
	<section id="hero">
	<?php while( have_rows( 'hero') ) : the_row(); ?>
		<?php
		$hero_image = get_sub_field( 'hero_image' );
		$hero_text  = get_sub_field( 'hero_text' );
		$hero_logo  = get_sub_field( 'hero_logo' );
		?>
		<div class="hero-inner">
			<img src="<?php echo $hero_image; ?>" alt="">
			<p class="hero-text"><?php the_sub_field( 'hero_text' ); ?></p>
		</div>
		<!-- <img src="<?php echo $hero_logo; ?>" alt="Lumis logo"> -->
	<?php endwhile; ?>
	</section>
<?php endif; ?>

	<section id="brochure-content">
		<?php the_content(); ?>
		<?php if (strpos($classes, 'lumis-life-sciences') !== false): ?>
		<p style="text-align: center; color: #0e576d; margin-bottom:0.5em;"><strong>Work with us to achieve:</strong></p>
		<?php endif; ?>
	</section>

	<section id="first_icon_block_section">
		<?php if ( have_rows('blue_band_1') ) : ?>
    <?php while( have_rows('blue_band_1') ) : the_row(); ?>
		<?php if ( have_rows( 'advantages' )) : ?>
			<?php if (strpos($classes, 'lumis-international') !== false): ?>
			<p style="text-align: center; color: #fff;"><strong>Work with us to achieve:</strong></p>
			<?php endif; ?>
			<ul id="first_icon_block">
			<?php while ( have_rows( 'advantages' )) : the_row();

        // Get sub field values.
        $image = get_sub_field('icon');
        $title = get_sub_field('title');
        ?>
					<li>
						<aside>
            	<img src="<?php echo $image; ?>" alt="" >
						</aside>
						<p><?php echo $title; ?></p>
					</li>
    <?php endwhile; ?>
		</ul>
	<?php endif; ?>
	<?php endwhile; ?>
	<?php endif; ?>
	</section>

		<?php if ( have_rows('blue_band_2') ) : ?>
		<section id="second_icon_block_section">
		<?php while( have_rows('blue_band_2') ) : the_row(); ?>
			<p><strong><?php the_sub_field('intro_text'); ?></strong></p>
		<?php if ( have_rows( 'how_we_help' )) : ?> <!-- lumis International -->
			<ul id="second_icon_block">
			<?php while ( have_rows( 'how_we_help' )) : the_row();

				// Get sub field values.
				$image = get_sub_field('icon');
				$title = get_sub_field('title');
				?>
					<li>
						<img src="<?php echo $image; ?>" alt="" >
						<p><?php echo $title; ?></p>
					</li>
		<?php endwhile; ?>
		</ul>
		<?php else : ?>
		<img src="<?php the_sub_field('single_icon'); ?>" alt="">

		<?php endif; ?>

		<?php endwhile; ?>
		</section>
		<?php endif; ?>

	<?php if (strpos($classes, "lumis-life-sciences") !== false) : ?>
		<?php if ( have_rows('icon_block') ) : ?>
		<?php while( have_rows( 'icon_block') ) : the_row(); ?>
		<section id="skills_block">
			<?php if ( have_rows('skills') ) : ?>
			<ul id="skills">
			<?php while( have_rows( 'skills') ) : the_row(); ?>
					<li>
						<img src="<?php the_sub_field('icon'); ?>" alt="">
						<?php the_sub_field('title'); ?>
					</li>
			<?php endwhile; ?>
		</ul>
	<?php endif; ?>
		</section>
	<?php endwhile; ?>
	<?php endif; ?>
	<?php endif; ?>

	<section id="first_content_block">
		<?php if ( have_rows('info_block_1')) : ?>
			<?php while( have_rows('info_block_1')) : the_row(); ?>
			<p class="heading"><strong><?php the_sub_field('heading'); ?></strong></p>
			<div>
				<?php the_sub_field('content'); ?>
			</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</section>

		<?php if ( have_rows('info_block_2')) : ?>
			<?php while( have_rows('info_block_2')) : the_row(); ?>
				<?php if (get_sub_field('heading')) : ?>
				<section id="second_content_block">
				<p class="heading"><strong><?php the_sub_field('heading'); ?></strong></p>
				<div>
					<?php the_sub_field('content'); ?>
				</div>
			</section>
		<?php endif; ?>
		<?php endwhile; ?>
		<?php endif; ?>

	<section id="brochure_footer_block">
		<?php if ( have_rows('footer')) : ?>
			<?php while( have_rows('footer')) : the_row(); ?>
			<div class="footer-text">
			<?php the_sub_field('footer_text'); ?>
			<img src="<?php the_sub_field('footer_logo'); ?>" alt="Lumis logo">
				<aside>
					<?php the_sub_field('footer_address'); ?>
				</aside>
			</div>
		<?php endwhile; ?>
		<?php endif; ?>

		<aside class="button-block">
			<?php
				$brochure_pdf = get_field('brochure_pdf');
				if ($brochure_pdf) : ?>
				<p>
					<a class="orange_button" href=<?php echo $brochure_pdf; ?>>Download brochure PDF</a>
				</p>
			<?php endif; ?>
		</aside>
	</section>

	<!-- ACF END -->

	<?php // astra_content_page_loop(); ?>

	<?php astra_primary_content_bottom(); ?>

</div><!-- #primary -->

<?php get_footer(); ?>
