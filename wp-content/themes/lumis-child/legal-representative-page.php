<?php
/**
 * Template NAme: Legal Representation Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */



get_header(); ?>

<div id="primary" <?php astra_primary_class(); ?>>

	<?php astra_primary_content_top(); ?>
	<!-- Outsourcing top Section -->
	<section id="outsourcing_clinical_trials_why_lumis_section" class="">
		<div class="row">
			<div class="ast-col-md-12"><h1><? the_title()?></h1></div>
			<div class="ast-col-md-4 trials_img_col">
				<img src="<?=get_stylesheet_directory_uri() ?>/dist/img/content/services/legal_representative/legal_representative.svg"
				     alt="" />
			</div>
			<div class="ast-col-md-8">
				<ul>
					<li>For clinical trials in the EU and Switzerland</li>
					<li>Obtain SME status at the EMA</li>
				</ul>
			</div>
		</div>
		<div class="row">

			<div class="ast-col-md-4">
				<h2>Why Lumis?</h2>

			</div>
			<div class="ast-col-md-8">
				<p>
					Every sponsor conducting a clinical trial in the European Union without a registered office within the territory of the European Economic Area (EEA) is required to work with a legal representative located in one of the EEA countries, according to the EU Clinical trial directive.  This requirement applies to all clinical trials conducted to evaluate medicinal and/or pharmaceutical products as well as medical devices.
				</p>
			</div>
		</div>
		<div class="row">

			<div class="ast-col-md-11">
				<h2>Your legal representative for clinical trials</h2>
			</div>
		</div>
	</section>
	<!-- Trials best fit Section -->
	<section id="outsourcing_clinical_trials_best_fit_section" class="inverted_colors_section">
		<div class="row">
			<div class="ast-col-md-4 trials_img_col">
				<h3>Legal representation in EU</h3>
			</div>
			<div class="ast-col-md-8">
				<p>
					A legal representative acts as the agent of a sponsor in the event that legal proceedings are initiated and instituted within the EU/EEA. Every clinical trial requires a legal representative.
				</p>
			</div>
		</div>
		<div class="row">
			<div class="ast-col-md-4 trials_img_col">
				<h3>Legal representation in Switzerland</h3>
			</div>
			<div class="ast-col-md-8">
				<p>
					For clinical trials conducted in Switzerland, according to Article 2 (c) of the “Ordinance on clinical trials with therapeutic products” a sponsor not established in Switzerland has to assign a representative based in Switzerland.
				</p>
			</div>
		</div>
		<div class="row">
			<div class="ast-col-md-4 trials_img_col">
				<h3>Legal representation to obtain SME Status</h3>
			</div>
			<div class="ast-col-md-8">
				<p>
					We act as your legal representative to obtain the official recognition as a small and mid-sized Enterprise (SME) at the European Medicines Agency (EMA). Lumis has been granted the SME status by the EMA.
				</p>
			</div>
		</div>
		<div class="row">
			<div class="ast-col-md-4">
				<a href="#" class="orange_button">Get in Touch</a>
			</div>
		</div>
	</section>
	<!-- What we can do for you section -->
	<section id="outsourcing_clinical_what_we_cand_do_section" class="">
		<div class="row">
			<div class="ast-col-md-4">
				<h2>Your clinical gateway to Europe</h2>
			</div>
			<div class="ast-col-md-8">
				<p>
					Lumis International represents your interests in Europe and Switzerland. We act as your legal representative in the event that legal proceedings are initiated and instituted within the EU/EEA and ensure that you comply with the EU Clinical Trial Directive (2001/20/EC) and the Suisse Ordinance. Non-European companies need a legal representative  when applying for the SME status at the European Medicines Agency EMA.
				</p>
			</div>
		</div>
		<div class="row">
			<div class="ast-col-md-4 trials_img_col">
				<img src="<?=get_stylesheet_directory_uri()?>/dist/img/content/services/what_we_can_do.svg" alt="">
				<h4>Individually customized outsourcing strategy</h4>
				<ul>
					<li>Defining the priorities, resources and budget</li>
					<li>Evaluating your roles and expectations</li>
					<li>Generating a fully integrated budget plan</li>
				</ul>
			</div>
			<div class="ast-col-md-4">
				<img src="<?=get_stylesheet_directory_uri()?>/dist/img/content/services/what_we_can_do.svg" alt="">
				<h4>CRO and vendor selection including</h4>
				<ul>
					<li>Full-service proposal management</li>
					<li>Evaluation of cost drivers</li>
					<li>Assessment of the best cultural fit</li>
					<li>Creation of  a partnership with your CRO/vendor</li>
				</ul>
			</div>
			<div class="ast-col-md-4">
				<img src="<?=get_stylesheet_directory_uri()?>/dist/img/content/services/what_we_can_do.svg" alt="">
				<h4>Contract management</h4>
				<ul>
					<li>Development of Master service agreement and contract negotiation</li>
					<li>Legal support and legal advice</li>
				</ul>
			</div>
		</div>
	</section>
	<section id="call_to_action_section" class="inverted_colors_section">
		<div class="row">
			<div class="ast-col-md-1">
				<img src="<?=get_stylesheet_directory_uri()?>/dist/img/content/question_.svg" alt="">
			</div>
			<div class="ast-col-md-8">
				<p>Not sure what a specific regulation says or want to know more about the meaning behind a certain term?
					Visit our <a href="#">glossary</a>. </p>
			</div>
		</div>
	</section>
	<!-- Our support section -->
	<section id="outsourcing_clinical_trials_our_support_section" class="">
		<div class="row">
			<div class="ast-col-md-4 trials_img_col">
				<h2>Our expertise, your benefits </h2>
				<p>Your experts at <a href="#">Lumis Life Science Consulting</a> are specialised in outsourcing and vendor management within
					life sciences and have been building successful working relationships between sponsors and CROs/vendors for
					<strong> more than 20 years.</strong> </p>
			</div>
			<div class="ast-col-md-8">
				<img src="<?=get_stylesheet_directory_uri()?>/dist/img/content/services/our_support.jpg" alt="">
			</div>
		</div>
	</section>
	<!-- Contact Section -->
	<section id="contact_section" class="inverted_colors_section">
		<div class="row">
			<div class="ast-col-md-9"><h2>Contact our experts to find out more!</h2></div>
			<div class="ast-col-md-8 contact_form_wrap">
				<? echo do_shortcode('[contact-form-7 id="69" title="Lumis home page form"]')?>
			</div>
			<div class="ast-col-md-4">
				<div class="contact_credits_wrap">
					<img width="100%" src="/wp-content/uploads/2020/07/contact_christiane.jpg" alt="" />
					<p>
						<span><strong>Dr. Christiane Juhls</strong></span>
						<span style="margin-bottom: 10px;">Project Director</span>
						<span style="margin-bottom: 10px;">Lumis Life Science Consulting GmbH</span>
						<span style="margin-bottom: 10px;">Phone: <a href="tel:+49 30 235911-599">+49 30 235911-599</a></span>
						<span><a href="mailto:info@lumisinternational.com">info@lumisconsult.com</a></span>
					</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog Section -->
	<section id="blog_section">
		<div class="row">
			<div class="ast-col-md-12">
				<h2>More about outsourcing clinical trials in Lumis’ Content Hub: </h2>
				<? echo do_shortcode( '[display-posts id="139" category_display="true" include_excerpt="true" excerpt_length="55" image_size="full" wrapper="div" wrapper_class="display-posts-listing image-left"]')?>

				<?
		/**
		 * Get related posts of post
		 * @since 1.0.0
		 */
		function codeless_get_related_posts( $post_id, $related_count, $args = array() ) {
			$terms = get_the_terms( $post_id, 'category' );

			if ( empty( $terms ) ) $terms = array();

			$term_list = wp_list_pluck( $terms, 'slug' );

			$related_args = array(
				'post_type' => 'post',
				'posts_per_page' => $related_count,
				'post_status' => 'publish',
				'post__not_in' => array( $post_id ),
				'orderby' => 'rand',
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field' => 'slug',
						'terms' => $term_list
					)
				)
			);
			return new WP_Query( $related_args );
		}

		?>


			</div>
		</div>
	</section>
<!--	--><?php //astra_content_page_loop(); ?>

	<?php astra_primary_content_bottom(); ?>

</div><!-- #primary -->


<?php get_footer(); ?>







<style>
	.roww {
		width: 100vw;
		position: relative;
		margin-left: calc(-50vw + 50% - 8px);
	}
	.column {
		/*float: left;*/
		/*width: 50%;*/
		/*padding: 67px 121px;*/
		/*height: 300px; !* Should be removed. Only for demonstration *!*/
		/*margin-left: 15px;*/
		/*margin-right: 15px;*/
		min-height: 610px;
		padding: 60px 60px 30px 60px
	}
	#bordered_bottom {
		position: relative;
		/*border: solid 4px #0080a1;*/
		/* background: #3beadc; */
		border-bottom: unset;
		border-top-right-radius: 16px;
		border-left: unset;
		/*padding: 67px 30px 110px 298px!important;*/
	}

	.border_bottom {
		/* border-bottom-left-radius: 25px; */
		/* top: 50%; */

		/*border-bottom: solid 4px #0080a1;*/
		/*position: absolute;*/
		/*bottom: 0;*/
		/*right: 0;*/
		/*z-index: 100;*/
		/*width: 75%;*/

		border: solid 4px #0080a1;
		/* border-bottom-left-radius: 25px; */
		position: absolute;
		top: 0;
		bottom: 0;
		right: 0;
		z-index: -1;
		width: 100vw;
		border-bottom: unset;
		border-top-right-radius: 16px;
	}

	.border_bottom_test {
		border: solid 2px #0080A0;
		border-bottom-left-radius: 25px;
		position: absolute;
		bottom: 0;
		right: 0;
		/*z-index: 100;*/
		width: 100%;
	}

	#bordered_top {
		/* background: #3beadc; */
		position: relative;
		/*border: solid 4px #e54d1d;*/
		border-top: unset;
		border-bottom-left-radius: 16px;
		border-right: unset;
		padding-right: 20px;
	}

	.border_top {

		/* top: 50%; */
		/*border-bottom: solid 4px #e54d1d;*/
		/*position: absolute;*/
		/*top: 0;*/
		/*left: 0;*/
		/*z-index: 100;*/
		/*width: 50%;*/
		border-bottom-left-radius: 25px;
		border: solid 4px #e54d1d;
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		z-index: -1;
		width: 100vw;
		border-top: unset;
		/*border-top-right-radius: 16px;*/
	}
	.border_top_test {
		border: solid 2px #e54d1d;
		border-bottom-left-radius: 25px;
		position: absolute;
		top: 0;
		left: 0;
		/*z-index: 100;*/
		width: 100%;
	}

	/* Clear floats after the columns */
	.row:after {
		content: "";
		display: table;
		clear: both;
	}

	/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
	@media screen and (max-width: 600px) {
		.column {
			width: 100%;
		}
	}
</style>
