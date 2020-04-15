<?php
/*
Template Name: P - Interior
*/
?>
<?php get_header(); ?>


		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		<?php //Check to get the parent page to display as the section title
					$ancestors = get_post_ancestors($post);
					$ancestors = ($ancestors ? array_reverse($ancestors) : array($post->ID));
				?>

		<style>
			<?php

				$banner_bg = get_field('banner_bgimg');
				if(!empty($banner_bg)) echo "#p_banner {background-image: url({$banner_bg});";
				$banner_overlay = "color".get_field('banner_bgoverlay')."_overlay";
			?>
		</style>
		<div id='p_banner' class='color2_bg'><div id='p_banner_inner' class='<?php echo $banner_overlay; ?>'>
			<div class="row internal-header nopad">
				<h1><?php the_title(); ?></h1>
			</div>
		</div></div>

		<?php
			$bHideRNav = get_field('topts_hide_rnav');
			$body_class = $bHideRNav ? 'p_body_whole' : 'p_body left';
		?>
		<div class="row page-content cf">
			<div class="<?php echo $body_class; ?>">
				<?php the_content(); ?>
				<?php require('inc/postbody_builder.php'); ?>
			</div><!--end .post-->

			<?php if(!$bHideRNav): ?>
				<div class="p_nav right">
					<?php require_once('inc/rnav.php'); ?>
					<?php if ( get_field( 'sidebar_content' ) ) : ?>
						<div class="sidebar-wysiwyg">
							<?php the_field( 'sidebar_content' ); ?>
						</div>
					<?php endif; ?>
				</div><!--end .sidebar-->
			<?php endif; ?>

		</div><!--end .row.page-content-->

		<?php endwhile; ?>



		<?php else : ?>

		<!-- no post here -->




		<?php endif; ?>

	<?php require_once('inc/news.php'); ?>

	<?php get_footer(); ?>
