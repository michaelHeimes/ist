<?php 
/*
Template Name: Affiliations Page
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
						query_posts(array('post_type'=>'affiliate', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => '60') );
								if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						 
						
							
							<div class="affiliate">
								<div class="affiliate-image"><?php if (has_post_thumbnail()) : the_post_thumbnail('affiliate-thumb'); endif; ?></div><!--end .team-image-->
								<div class="affiliate-bio">
									<a href="<?php $affiliate_link = get_post_meta($post->ID, 'affiliate_link', true); echo $affiliate_link; ?>" target="_blank"><h4><?php the_title(); ?></h4></a>
									<?php the_content(); ?>
								</div><!--end .affiliate-bio-->
							</div><!--end .affiliate-member-->
						
						<?php endwhile; ?>	
						<?php endif; wp_reset_query(); //Resets the query to get back to our original loop
						?>					
								
			</div><!--end .post-->
			
				 
		</div><!--end .row.page-content-->
		
 
		<?php endwhile; ?>
		<?php else : ?>		
		<?php endif; ?>
		
		
		
		
	
	
 


	<?php get_footer(); ?>