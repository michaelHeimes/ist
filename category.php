<?php get_header(); ?>

<div id="p_banner" class="color2_bg blog-banner">
	<div id='p_banner_inner' class="color2_overlay">
		<div class="row internal-header nopad">
			<h1>Blog</h1>
		</div>
	</div>
</div>

<div class="page-content blog-archive">

	<div class="fixed-socials">
		<a href="https://www.facebook.com/istonlineofficial" class="social facebook">
			<i class="fa fa-facebook-f"></i>
		</a>
		<a href="https://twitter.com/IST_Online" class="social twitter">
			<i class="fa fa-twitter"></i>
		</a>
		<a href="" class="social google-plus">
			<i class="fa fa-google-plus"></i>
		</a>
	</div>

	<div class="row cf">
		<div class="col-sm-8">

			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php include 'content-blog-excerpt.php' ?>

				<?php endwhile; ?>

					<?php if (function_exists("ist_blog_pagination")) {
						ist_blog_pagination($blog_query->max_num_pages);
					} ?>

			<?php else : ?>
				<p>There are no posts to display</p>
			<?php endif; ?>
		</div>

		<div class="col-sm-4">
			<?php include 'inc/sidebar-blog.php'; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
