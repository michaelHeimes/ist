<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<!--Meta Stuff-->
	   <meta charset="utf-8">
	   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	   <meta name="viewport" content="width=device-width">
	   <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/assets/images/icons/favicon.ico" />

   <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

   <!-- CSS -->
   		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/normalize.css">
   		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

   <!-- Make IE Behave -->
   		<!--[if lt IE 8]>
   			<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/ie-7.css">
   		<![endif]-->
   		<!--[if gte IE 9]>
			<style type="text/css">.gradient {filter: none;}</style>
		<![endif]-->

   <!-- FONTS -->
    	<link href='//fonts.googleapis.com/css?family=Raleway|Cabin:400,600' rel='stylesheet' type='text/css'>

		<!-- proxima nova start-->
		<script src="https://use.typekit.net/tnt1kpo.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
		<!-- proxima nova end-->

		<!--  cstraight dev proxima nova-->
		<script src="https://use.typekit.net/req3lvl.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>

   <!-- FEED STUFF -->
		<link rel="alternate" type="application/rss+xml" title="IST Feed" href="<?php bloginfo('rss2_url'); ?>" />

   <!-- Wordpress Stuff-->
	   	<?php wp_get_archives('type=monthly&format=link'); ?>
	   	<?php //comments_popup_script(); // off by default ?>
	   	<?php if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) wp_enqueue_script('comment-reply'); ?>

	   <?php wp_head(); ?>
	   <!-- IE Fix for HTML5 Tags -->
		  <!--[if lt IE 9]>
			   <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->
</head>

<body <?php body_class(); ?>>

<div class="site-container">
	<div class="wrapper">

		<div class="row header cf">
			<a class="logo" href="<?php bloginfo('siteurl'); ?>">
				<img src="<?php bloginfo('template_url'); ?>/dist/img/logos/logo-ist.svg" alt="Integrated Security Technologies Logo" width="212">
			</a>

			<div class="topnav">
				<?php wp_nav_menu( array('theme_location' => 'eyebrow-menu', 'container' => false, 'menu_id' => '') ); ?>
				<div class="searchbox">
					<?php get_search_form(); ?>
				</div>
				<?php echo do_shortcode('[ist_social]'); ?>
			</div>

			<div class="toggle-nav">
			  <span></span>
			  <span></span>
			  <span></span>
			  <span></span>
			</div>

			<div class="mainnav">
				<?php wp_nav_menu( array('theme_location' => 'primary-menu', 'container' => false, 'menu_id' => '') ); ?>
			</div>
		</div>

		<div class="mobile-nav">
			<div class="depth-1">
				<?php wp_nav_menu( array('theme_location' => 'primary-menu', 'container' => false, 'menu_id' => 'mnav_menu', 'depth' => 2) ); ?>
				<?php wp_nav_menu( array('theme_location' => 'eyebrow-menu', 'container' => false, 'menu_id' => '') ); ?>
			</div>
			<div class="depth-2">
				<ul>
					<li>
						<a href="#" class="mobile-nav-back">
							<span class="caret"></span>
							<span>Back</span>
						</a>
						<span class="child-menu-title"></span>
					</li>
				</ul>
			</div>
		</div>
