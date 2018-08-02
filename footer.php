	<div class="outer-footer">
		<footer>

			<div class="more-info"><?php echo get_field('address_title','option'); ?></div>

			<div class="footer-left"><?php echo get_field('address','option'); ?>
				<div class="copyright"><?php echo date('Y'); ?> &copy; Harworth Group. All rights reserved</div>
			</div>
			<div class="footer-right">
				<a href="<?php echo get_field('harworth_logo_url','option'); ?>" target=\"_blank\">
					<div class="footer-logo-box">
						<img class="footer-logo" src="<?php echo get_field('footer_logo','option')['url']; ?>">
					</div>
				</a>
			</div> 
			<div class="clear"></div>
		</footer>
	</div>
	

	<?php wp_footer(); ?>

 



</body>
</html>