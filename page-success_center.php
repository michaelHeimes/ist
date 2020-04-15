<?php 
/*
Template Name: Success Center Landing Page 	
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
			
				 
 				<?php the_content(); ?>
				
				<a href="/success-center/federal-government" class="success-center-links government"></a>
				<a href="/success-center/education" class="success-center-links education"></a>
				<a href="/success-center/healthcare" class="success-center-links healthcare"></a>
				<!-- <a href="/success-center/utility" class="success-center-links utility"></a> -->												
			</div><!--end .post-->
			
				 
		</div><!--end .row.page-content-->
		
		<?php endwhile; ?>
			
			
			
		<?php else : ?>
		
		<!-- no post here -->
		 
		
		
		
		<?php endif; ?>
	
	
 


	<?php get_footer(); ?>