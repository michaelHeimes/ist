<?php get_header(); ?>


<div id="p_banner" class="color2_bg blog-banner">
	<div id='p_banner_inner' class="color2_overlay">
		<div class="row internal-header nopad">
			<h1>Error 404</h1>
		</div>
	</div>
</div>

<div class="row page-content">
	<div class="three-col sidebar">
		<?php dynamic_sidebar( 'sidebar-general' ); ?>
	</div>

	<div class="one-col"></div>
	<div class="eight-col last post">

		<h2>Page Not Found</h2>
		<p>Looks like you've stumbled across a broken or incorrect link. Check the url in your address bar to make sure there isn't an obvious misspelling or typo, or use the search bar in the top right to search for what you're looking for.<br /><br /><a href="<?php bloginfo('url'); ?> ">Click here</a> to go to the home page to start over again, or use the list below to find what you were looking for.</p>
			<ul><?php wp_list_pages(array(
				'title_li' => false,
				'exclude' => implode(',', get_option('exclude-from-nav'))
			)); ?>
			</ul>
	</div>
</div>





<?php get_footer(); ?>
