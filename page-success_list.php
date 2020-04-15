<?php 
/*
Template Name: Success Center List Page
*/
?>
<?php get_header(); ?>
 
	
		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		<?php //Check to get the parent page to display as the section title
					$ancestors = get_post_ancestors($post);
					$ancestors = ($ancestors ? array_reverse($ancestors) : array($post->ID));
				?>

		<div class="row internal-header">
			<div class="four-col"></div>
			<div class="eight-col last"><h1><?php the_title(); ?></h1></div>
		</div>		
		
		<div class="row page-content">
 			<div class="three-col sidebar">
	 			<?php include('inc/sidebar.php'); ?>	 			
	 			
 			</div><!--end .sidebar--> 
 			
			<div class="one-col"></div>
			<div class="eight-col last post">
			
 				<div class="post-content">
				<?php the_content(); ?>
				</div><!--end .post-content-->
				
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
								
			</div><!--end .post-->
			
				 
		</div><!--end .row.page-content-->
		
 
		<?php endwhile; ?>
		<?php else : ?>		
		<?php endif; ?>
		
		
		
		
	
	
 


	<?php get_footer(); ?>