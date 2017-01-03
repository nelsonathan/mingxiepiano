<!DOCTYPE HTML>
<!--[if IEMobile 7 ]>
	<html id="IE7" class="no-js iem7" lang=<?php bloginfo( 'language' ); ?>" manifest="default.appcache?v=1" itemscope itemtype="http://schema.org/WebPage" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if lt IE 6 ]>
	<html id="IE6" class="no-js ie6" lang="<?php bloginfo( 'language' ); ?>" itemscope itemtype="http://schema.org/WebPage" prefix="og: http://ogp.me/ns#">
	<p class=chromeframe>Your browser is outdated <a href="http://browsehappy.com/">Please upgrade to a different browser</a> 
    or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to make the most of this site.</p>
<![endif]--> 
<!--[if IE 7 ]>
	<html  id="IE7" class="no-js ie7" lang="<?php bloginfo( 'language' ); ?>" itemscope itemtype="http://schema.org/WebPage" prefix="og: http://ogp.me/ns#">
<![endif]--> 
<!--[if IE 8 ]>
	<html  id="IE8" class="no-js ie8" lang="<?php bloginfo( 'language' ); ?>" itemscope itemtype="http://schema.org/WebPage" prefix="og: http://ogp.me/ns#">
<![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]>
	<!-->
    <html id="webpage" class="no-js" lang="<?php bloginfo( 'language' ); ?>" itemscope itemtype="http://schema.org/WebPage" prefix="og: http://ogp.me/ns#">
<!--<![endif]-->
	<head>
		<title><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="HandheldFriendly" content="True">
  		<meta name="MobileOptimized" content="320">
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        <!-- 
        Uses blog description for Home Page description. 
        Uses excerpt for Single Post description.
        Uses first 155 characters of content for Page description.
        -->
		<?php
        if (is_home() || is_front_page() ) : $descrip = get_bloginfo('description');
		elseif (is_single()) : $descrip = the_excerpt();
		else : 
		$post = $wp_query->post;
		$descrip = strip_tags($post->post_content);
		$descrip_more = '';
		if (strlen($descrip) > 155) {
			$descrip = substr($descrip,0,155);
			$descrip_more = ' ...';
		}
		$descrip = str_replace('"', '', $descrip);
		$descrip = str_replace("'", '', $descrip);
		$descripwords = preg_split('/[\n\r\t ]+/', $descrip, -1, PREG_SPLIT_NO_EMPTY);
		array_pop($descripwords);
		$descrip = implode(' ', $descripwords) . $descrip_more;
		endif;
		echo '<meta name="description" content="'.$descrip.'" />';
		?>
        <!-- Include stylesheets for Bootstrap 3.3.6 and Font Awesome 4.5.0 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <!-- Pull Favicon and Mobile Icon from /favicons/ folder in theme -->
		<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_directory'); ?>/favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_directory'); ?>/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory'); ?>/favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/favicons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/favicons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/favicons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/favicons/android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/favicons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="<?php bloginfo('template_directory'); ?>/favicons/manifest.json">
		<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicons/favicon.ico">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="msapplication-TileImage" content="<?php bloginfo('template_directory'); ?>/favicons/mstile-144x144.png">
		<meta name="msapplication-config" content="<?php bloginfo('template_directory'); ?>/favicons/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">
        <?php if (has_post_thumbnail( $post->ID ) ) { ?>
         	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
            <meta name="thumbnail" content="<?php echo $image[0]; ?>" itemprop="primaryImageOfPage" />
		<?php } else { ?>
            <?php $image = ""; ?>
        <?php } ?>
        <!-- Insert Google Profile Info -->
        <link rel="author" href="">
    	<link rel="publisher" href="">
        <!-- Insert Facebook OpenGraph Info -->
        <meta property="og:locale" content="<?php bloginfo( 'language' ); ?>"/>
    	<meta property="og:type" content="article"/>
    	<meta property="og:title" content="<?php wp_title( '|' ); ?>"/>
    	<meta property="og:url" content="<?php bloginfo( 'url' ); ?>"/>
    	<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>"/>
        <?php if (has_post_thumbnail( $post->ID ) ) { ?>
         	<?php $ogimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'social-facebook' ); ?>
            <meta property="og:image" content="<?php echo $ogimage[0]; ?>"/>
		<?php } else { ?>
            <?php $ogimage = ""; ?>
        <?php } ?>
        <meta property="article:publisher" content=""/>
        <!-- Insert Twitter Card Info -->
        <meta name="twitter:card" content="summary"/>
    	<meta name="twitter:site" content="<?php bloginfo( 'name' ); ?>"/>
    	<meta name="twitter:domain" content="<?php bloginfo( 'url' ); ?>"/>
    	<meta name="twitter:creator" content="@"/>
        <!-- Support HTML5 in IE6-8 -->
 		<!--[if lt IE 9]>
     		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
 		<![endif]-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>