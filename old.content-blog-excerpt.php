<div class="blog-excerpt">
	<div class="blog-exerpt-image">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
	</div>
	<div class="blog-excerpt-content">
		<h2>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>
		<span class="date"><?php the_time('F j, Y') ?></span>
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>" class="btn btn-orange">Read More &nbsp;></a>
	</div>
</div>
