	<!-- Latest jQuery from Google CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Latest Bootstrap from Max CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- Respond.js for IE6-8 HTML5 Support-->
    <script src="<?php bloginfo('template_directory'); ?>/js/respond.js"></script>
    <!-- CSS User Agent for CSS Debugging -->
    <script src="<?php bloginfo('template_directory'); ?>/js/cssua.min.js"></script>
    <!-- Custom Theme Scripts -->
	<script src="<?php bloginfo('template_directory'); ?>/js/custom.js"></script>
    <script type="text/javascript">//
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-']);
		_gaq.push(['_setAllowLinker',true],['_gat._anonymizeIp'],['_setDomainName','none'],['_trackPageview']);
        (function () {
        	var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
        //
    </script>
	<?php wp_footer(); ?>
	</body>
</html>