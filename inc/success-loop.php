<?php	
	$slug = $post->post_name;	
	
	query_posts(array('post_type'=>'success_center', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => '60', 'successcat' => $slug ) );
			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	 
	
		
		<div class="individual-success">
			<div class="client-logo"><?php if (has_post_thumbnail()) : the_post_thumbnail('success-center-thumb'); endif; ?></div><!--end .client-logo-->
			<div class="client-blurb">
				<h4><?php the_title(); ?></h4>
				<?php the_content(); ?>
			</div><!--end .client-blurb-->
		</div><!--end .individual-success-->
	
	<?php endwhile; ?>	
	<?php endif; wp_reset_query(); //Resets the query to get back to our original loop
	?>					