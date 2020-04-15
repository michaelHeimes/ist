<?php get_header(); ?>
	<div id="container">
	
		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
			
			<div class="blogpost">

				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			
				<div class="blogentry">
					<div class="byline"><?php _e('By'); ?> <?php  the_author(); ?> on <?php the_time('F j, Y') ?> | Category: <?php the_category(', ') ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?></div>
					<?php the_excerpt(); ?>
					
					
				</div><!--.blogentry-->

			</div><!--.blogpost-->
	
		<?php endwhile; ?>
			
			<div class="navigation">
			
				<?php posts_nav_link(); ?>
			
			</div><!--.navigation-->
			
			<?php else : ?>
			
			<div class="blogpost">
			
				<h2><?php_e('Not Found'); ?></h2>
				
			</div><!--.blogpost-->
		
		
		
		<?php endif; ?>
	
	
	</div><!--#container-->
	
	<?php get_sidebar(); ?>

	<?php get_footer(); ?>