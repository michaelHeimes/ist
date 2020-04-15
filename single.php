<?php get_header(); ?>

	<div id="p_banner" class="color2_bg blog-banner">
		<div id='p_banner_inner' class="color2_overlay">
			<div class="row internal-header nopad">
				<h1>Blog</h1>
			</div>
		</div>
	</div>


	<div class="page-content single-blog cf">

<?php $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
<div class="fixed-socials">
	<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" class="social facebook" target="_blank">
		<i class="fa fa-facebook-f"></i>
	</a>
	<a target="_blank" href="https://twitter.com/home?status=<?php echo urlencode($url); ?>" class="social twitter">
		<i class="fa fa-twitter"></i>
	</a>
	<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($url); ?>&title=IST%20Online&summary=&source=" class="social linkedin">
		<i class="fa fa-linkedin"></i>
	</a>
</div>



		<div class="row cf">
			<div class="col-sm-8 single-blog-content">
				<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
					<span class="date"><?php the_time('M j, Y') ?></span>
					<h2><?php the_title(); ?></h2>

					<?php if ( has_post_thumbnail() ) : ?>
						<div class="featured-image">
							<?php the_post_thumbnail(); ?>
						</div>
					<?php endif; ?>

					<?php the_content(); ?>

					<?php endwhile; ?>
				<?php endif; ?>
			</div>

			<div class="col-sm-4">
				<?php include 'inc/sidebar-blog.php'; ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
