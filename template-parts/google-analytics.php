<?php
/**
 * Template part for adding Google Analytics Script
 * Used in header.php
 *
 * @package Symmetri
 */

 if ( ! empty ( get_option( 'symmetri-gaid' ) ) ) : ?>
	 <script>
		 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		 })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		 ga('create', '<?php echo get_option('symmetri-gaid', true); ?>', 'auto');
		 ga('send', 'pageview');
	 </script>
 <?php endif; ?>
