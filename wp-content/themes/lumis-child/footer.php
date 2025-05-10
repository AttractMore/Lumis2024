<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined("ABSPATH")) {
  exit(); // Exit if accessed directly.
} ?>
			<?php
// astra_content_bottom();
?>
			</div> <!-- ast-container -->

		</div><!-- #content -->

		<?php
//astra_content_after();
?>

		<?php
//astra_footer_before();
?>

		<?php astra_footer(); ?>

		<?php
// astra_footer_after();
?>
<footer class="site-footer" id="colophon" itemtype="https://schema.org/WPFooter" itemscope="itemscope" itemid="#colophon">
  <div class="logo-social-media wrap">
    <figure>
      <a href="/">
        <img width="425" height="97" src="/wp-content/uploads/2020/06/Lumis_Consulting_WHITE.svg" class="footer-lumis-logo" alt="Lumis logo" decoding="async" loading="lazy">
      </a>
    </figure>
    <ul class="social-icons">
      <li>
        <a class="social-icon" href="https://www.linkedin.com/company/lumis-international-gmbh/" rel="noopener noreferrer" aria-label="LinkedIn">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
            <path fill="#1c4153" d="M6 6h2.767v1.418h0.040c0.385-0.691 1.327-1.418 2.732-1.418 2.921 0 3.461 1.818 3.461 4.183v4.817h-2.885v-4.27c0-1.018-0.021-2.329-1.5-2.329-1.502 0-1.732 1.109-1.732 2.255v4.344h-2.883v-9z"></path>
            <path fill="#1c4153" d="M1 6h3v9h-3v-9z"></path>
            <path fill="#1c4153" d="M4 3.5c0 0.828-0.672 1.5-1.5 1.5s-1.5-0.672-1.5-1.5c0-0.828 0.672-1.5 1.5-1.5s1.5 0.672 1.5 1.5z"></path>
          </svg>
        </a>
      </li>
      <li>
        <a class="social-icon" href="https://www.youtube.com/@thelumisgroup" rel="noopener noreferrer" aria-label="Youtube">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
            <path fill="#1c4153" d="M15.841 4.8c0 0-0.156-1.103-0.637-1.587-0.609-0.637-1.291-0.641-1.603-0.678-2.237-0.163-5.597-0.163-5.597-0.163h-0.006c0 0-3.359 0-5.597 0.163-0.313 0.038-0.994 0.041-1.603 0.678-0.481 0.484-0.634 1.587-0.634 1.587s-0.159 1.294-0.159 2.591v1.213c0 1.294 0.159 2.591 0.159 2.591s0.156 1.103 0.634 1.588c0.609 0.637 1.409 0.616 1.766 0.684 1.281 0.122 5.441 0.159 5.441 0.159s3.363-0.006 5.6-0.166c0.313-0.037 0.994-0.041 1.603-0.678 0.481-0.484 0.637-1.588 0.637-1.588s0.159-1.294 0.159-2.591v-1.213c-0.003-1.294-0.162-2.591-0.162-2.591zM6.347 10.075v-4.497l4.322 2.256-4.322 2.241z"></path>
          </svg>
        </a>
      </li>
    </ul>
  </div><!-- .logo-social-media -->

  <div class="footer-contact wrap">
    <ul>
      <li>Phone: <a href="tel:+49 30 235911-599">+49 30 235911-599</a></li>
      <li>Email: <a href="mailto:info@lumisinternational.com">info@lumisinternational.com</a></li>
      <li class="careers"><a href="/careers/">Careers</a></li>
    </ul>
  </div><!-- .footer-contact -->

  <div class="final-footer wrap">
    <div class="legal-copyright">
      <ul class="legal">
        <li><a href="/legal-notice/">Legal Notice</a></li>
        <li><a href="/privacy-policy/">Privacy Policy</a></li>
      </ul>
      <p>Copyright &copy; <?php echo date("Y"); ?> Lumis International</p>
    </div>
    <div id="wcb" class="carbonbadge"></div>
    <script src="https://unpkg.com/website-carbon-badges@1.1.3/b.min.js" defer></script>
  </div><!-- .final-footer -->
							
					</div> <!-- .ast-row.ast-flex -->
			</div><!-- .ast-small-footer-wrap -->
		</div><!-- .ast-container -->
	</div><!-- .ast-footer-overlay -->
</div><!-- .ast-small-footer-->

</footer>

	</div><!-- #page -->

	<?php
//astra_body_bottom();
?>

	<?php wp_footer(); ?>
	</body>
</html>
