<?php 
/*
Template Name: Solutions Landing Page 	
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
						
					<div class="five-solutions">
						<a href="/solutions-corporate-business-security-systems/security-management-systems" class="sbox one"><span class="callout">Security<br />Management<br />Systems</span></a>
					<a href="/solutions-corporate-business-security-systems/physical-security-detection-deterrence" class="sbox two"><span class="callout">Physical Security<br />Detection &amp;<br />Deterrence</span></a>
					<a href="/solutions-corporate-business-security-systems/video-surveillance-analysis" class="sbox three"><span class="callout">Video<br />Surveillance<br />&amp; Analysis</span></a>
					<a href="/solutions-corporate-business-security-systems/network-engineering-cyber-security" class="sbox four"><span class="callout">Network<br />Engineering<br />&amp; Cyber Security</span></a>
					<a href="/solutions-corporate-business-security-systems/software-application-development" class="sbox five"><span class="callout">Software<br />Application<br />Development</span></a>
		
					</div><!--end .five-solutions-->
					<p style="float:left;">See our entire list of tech offerings <a href="http://www.istonline.com/wp-content/uploads/2014/07/IST_TechOfferings_7.28.14.pdf">here</a>.</p>				
			</div><!--end .post-->
			
				 
		</div><!--end .row.page-content-->
		
		<?php endwhile; ?>
			
			
			
		<?php else : ?>
		
		<!-- no post here -->
		 
		
		
		
		<?php endif; ?>
	
	
 


	<?php get_footer(); ?>