<div id="p_banner" class="color2_bg search-banner">
	<div id='p_banner_inner' class="color2_overlay">
		<div class="row internal-header nopad">
			<h1>Search</h1>
		</div>
	</div>
</div>

<div class="row page-content cf">

	<div class="three-col sidebar">
		<?php dynamic_sidebar( 'sidebar-general' ); ?>
	</div>

	<div class="one-col"></div>
	<div class="eight-col last post">
		<h2>Search Results for
			<?php
			$allsearch = new WP_Query("s=$s&showposts=-1");
			$key = wp_specialchars($s, 1);
			$count = $allsearch->post_count; _e('');
			_e('<span style="font-style:italic;">');
			echo $key;
			_e('</span>'); _e(' - ');
			echo $count . ' ';
			_e('results');
			wp_reset_query(); ?>
		</h2>
		<ol class="searchresults">
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
				<li>
					<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
					<a class="permalink" href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a>
					<?php the_excerpt(); ?>
				</li>
			<?php endwhile; ?>
		</ol>
		<div class="navigation">
			<?php if (function_exists("pagination")) {
				pagination($additional_loop->max_num_pages);
			} ?>
		</div>
	</div>
</div>

<?php else : ?>
	<li>
		<h4>No Results Found</h4>
		<p>Try modifying your search terms for different results</p>
	</li>
<?php endif; ?>
