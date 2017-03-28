<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package silva
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		
		<div class="footer-sections-wrapper">
			<div class="footer-sections">
				<div class="copyright">
					<div class="footer-logo"></div>
					<div class="copyright-text">Blank &#169; <?php echo date("Y") ?> <br>All rights reserved. </div>
				</div><!-- .copyright -->
				<div class="footer-nav">
					<?php 
					
					wp_nav_menu( array( 'theme_location' => 'primary', 'menu' => 'footer') ); ?>
				</div>	
				<div class="address"><h4>headquarters</h4>
				<p>111 Barclay Street
				Vancouver, British Columbia
				Canada V1V 1V1</p>
				</div> <!-- .address -->
				<div class="contact-info">
					<span>Office / </span>604 123 4567<br>
					<span>Fax / </span>604 123 4567
					<span><i class="fa fa-linkedin"></i></span>
				</div><!-- .contact-info -->
			</div><!-- .footer-sections -->
		</div><!-- .footer-sections-wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
