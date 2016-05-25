	<div id="footer">					
		<?php $footer_text = of_get_option('ttrust_footer_text'); ?>			
		<div class="inside"><p><?php if($footer_text){echo($footer_text);} else{ ?>powered by <a href="http://www.kmd.keio.ac.jp/" title="KEIO MEDIA DESIGN"><strong>Keio Media Design</strong></a><?php }; ?></p></div>
	</div><!-- end footer -->
</div><!-- end main -->
</div><!-- end container -->
<?php wp_footer(); ?>
</body>
</html>