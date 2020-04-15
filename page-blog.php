<?php get_header(); ?>
<?php
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 10,
		'orderby' => 'date',
		'order' => 'DESC',
		'paged' => $paged
	);
	$blog_query = new WP_Query($args);
?>

<div id='p_banner' class='color2_bg blog-banner'>
	<div id='p_banner_inner' class="color2_overlay">
		<div class="row internal-header nopad">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
</div>


<div class="page-content blog-archive">

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
		<div class="col-sm-8">
			<?php if ( $blog_query->have_posts() ) : ?>
				<?php while($blog_query->have_posts()) : $blog_query->the_post(); ?>

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
