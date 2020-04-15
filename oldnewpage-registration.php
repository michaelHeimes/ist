<?php
/*
Template Name: Registration Page
*/
?>

<?php get_header(); ?>


		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		<?php //Check to get the parent page to display as the section title
					$ancestors = get_post_ancestors($post);
					$ancestors = ($ancestors ? array_reverse($ancestors) : array($post->ID));
				?>

		<div class="row internal-header registration-page">
		  <div class="four-col"></div>
		  <div class="eight-col last">
		    <div style="float:left; width:33%;" class="last"><h1>JOIN US!</h1></div>
		    <div class="last" style="float:left; width:22%; background:url('../wp-content/uploads/2016/04/emerging-technologies-expo.jpg'); background-size:contain; background-position:center center; background-repeat:no-repeat;">
				</div>
		    <div style="padding:0 0 0 16px; float:left; clear:right; width:calc(45% - 16px); line-height:117px; color:white; font-weight:bold; font-size:12px;" class="last">MAY 17, 2016 • RICHMOND, VA</div>
		  </div>
		</div>

		<div class="row page-content">
 			<div class="three-col sidebar">
	 			<?php include('inc/sidebar.php'); ?>
 			</div><!--end .sidebar-->

			<div class="one-col"></div>
			<div class="eight-col last post">

				<?php the_content(); ?>

			</div><!--end .post-->


		</div><!--end .row.page-content-->

		<?php endwhile; ?>



		<?php else : ?>

		<!-- no post here -->




		<?php endif; ?>





	<?php get_footer(); ?>
