<?php
/*
 * Template Name: P - Homepage
 */
?>
<?php get_header(); ?>

<?php $slides = get_field('hp_slide'); ?>
<div class="home-slider">
	<?php foreach ($slides as $slide) : ?>
		<div class="slide">
			<div class="slide-inner">
				<img src="<?php echo $slide['slide_icon']; ?>" alt="" class="slide-image">
				<div class="slide-content">
					<h4><?php echo $slide['slide_title']; ?></h4>
						<?php echo $slide['slide_content']; ?>
					<a href="<?php echo $slide['slide_link']; ?>" class="btn btn-orange">Learn More &nbsp;&gt;</a>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<div>
	<div class='p_row p_row_postbanner'>
		<div class='pb_b_row va_mid'>
			<div class='pb_b_50'><img src="<?php bloginfo('template_url'); ?>/assets/images/concept-blue.svg" alt="Concept to Reality" width="300"/></div>
			<div class='pb_b_50 ta_left'><?php the_field('hp_subbanner_text'); ?></div>
		</div>
	</div>
</div>

<?php require_once('inc/news.php'); ?>

<div class='color6_bg'>
	<div class='p_row'>
		<div class='pb_b_row home-approach'>
			<div class='pb_b_50 ta_left'><?php the_field('hp_diff_left'); ?></div>
			<div class='pb_b_50'><?php the_field('hp_diff_right'); ?></div>
		</div>
	</div>
</div>

<div class="p_row fw">
	<div>
		<h2>Integrated Security Solutions</h2>
		<?php echo ist_solutions_markup(); ?>
	</div>
</div>

<?php get_footer(); ?>
