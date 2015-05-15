<?php
global $pmc_data
?>

<!-- footer-->
<footer>
	<div id="footer">
		<!-- social icons in footer -->
		<div class = "footer-social">
			<?php pmc_socialLink() ?>
		</div>
		<!-- main footer part-->
		<div id="footerinside">
			<div class="footer_widget">
				<!-- footer widget 1-->
				<div class="footer_widget1">
					<?php dynamic_sidebar( 'footer1' ); ?>				
				</div>	
				<!-- footer widget 2-->
				<div class="footer_widget2">	
					<?php dynamic_sidebar( 'footer2' ); ?>
				</div>	
				<!-- footer widget 3-->
				<div class="footer_widget3 last">	
					<div class="totop"><div class="gototop"><div class="arrowgototop"></div></div></div>
				</div>
			</div>
		</div>
		<!-- footer bar at the bootom-->
		<div id="footerbwrap">
			<div id="footerb">
				<div class="lowerfooter">
				<div class="copyright">	
					<?php echo pmc_translation('copyright','&copy; 2011 All rights reserved.'); ?>
				</div>
				</div>
			</div>
		</div>

	</div>
</footer>	
<script type="text/javascript" > jQuery(document).ready(function(){jQuery("a[rel^='lightbox']").prettyPhoto({theme:'light_rounded',show_title: true, deeplinking:false,callback:function(){scroll_menu()}});  });</script>
<input type="hidden" id="root" value="<?php echo get_template_directory_uri() ?>" >
<?php wp_footer();  ?>
</body>
</html>

