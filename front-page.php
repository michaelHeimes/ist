<?php get_header();
while ( have_posts() ) : the_post(); ?>

<?php $slides = get_field('hp_slide'); ?>
<div class="home-slider">
	<div class="slide" style="background-image:url('<?php bloginfo('template_url'); ?>/dist/img/hero/slide-1.jpg')">
		<div class="slide-inner">
			<div class="slide-pre-title">Our Promise</div>
			<h4 class="slide-title">Proven Security</h4>
			<p>With over 20 years of experience, IST is one of the largest independent security integrators in the Washington, D.C. metropolitan area.</p>
			<div class="slide-callout">
				<a href="/markets" class="btn btn-orange">Learn More</a>
			</div>
		</div>
	</div>
	<div class="slide" style="background-image:url('<?php bloginfo('template_url'); ?>/dist/img/hero/slide-2.jpg')">>
		<div class="slide-inner">
			<div class="slide-pre-title">Government Security</div>
			<h4 class="slide-title">Keeping the Government Secure</h4>
			<p>Security professionals at the highest levels of government put their trust in IST.</p>
			<div class="slide-callout">
				<a href="/markets/government/" class="btn btn-orange">Learn More</a>
			</div>
		</div>
	</div>
	<div class="slide" style="background-image:url('<?php bloginfo('template_url'); ?>/dist/img/hero/slide-3.jpg')">>
		<div class="slide-inner">
			<div class="slide-pre-title">Education Security</div>
			<h4 class="slide-title">Keeping our Schools safe</h4>
			<p>IST’s strategic security solutions keep students, staff and faculty safe at K-12 school systems and higher education institutions throughout the region.</p>
			<div class="slide-callout">
				<a href="/markets/education/" class="btn btn-orange">Learn More</a>
			</div>
		</div>
	</div>
	<div class="slide" style="background-image:url('<?php bloginfo('template_url'); ?>/dist/img/hero/slide-4.jpg')">>
		<div class="slide-inner">
			<div class="slide-pre-title">Healthcare Security</div>
			<h4 class="slide-title">Keeping your records protected</h4>
			<p>Healthcare organizations looking to watch over their patients, property and data trust IST to secure their infrastructure and operations.</p>
			<div class="slide-callout">
				<a href="/markets/healthcare/" class="btn btn-orange">Learn More</a>
			</div>
		</div>
	</div>
	<div class="slide" style="background-image:url('<?php bloginfo('template_url'); ?>/dist/img/hero/slide-5.jpg')">>
		<div class="slide-inner">
			<div class="slide-pre-title">Property Management Security</div>
			<h4 class="slide-title">Keeping your properties secure</h4>
			<p>IST specializes in meeting the unique security needs of commercial and multi-unit properties.</p>
			<div class="slide-callout">
				<a href="/markets/property-management-security/" class="btn btn-orange">Learn More</a>
			</div>
		</div>
	</div>
</div>


<section class="wysiwyg">
	<div class="contain narrow">
		<?php the_content(); ?>
	</div>
</section>

<section class="features">
	<div class="contain">
		<h1>IST Leads the Way</h1>
		<div class="feature-box-wrap">
			<div class="feature-box text">
				<div class="fb-title"><?php the_field( 'fb_1_title' ); ?></div>
				<div class="fb-body">
					<?php the_field( 'fb_1_body' ); ?>
					<div>
						<a href="<?php the_field( 'fb_1_link' ); ?>">Read More ></a>
					</div>
				</div>
			</div>
			<div class="feature-box image">
				<a class="fb-image" href="<?php the_field( 'fb_2_link' ); ?>" style="background-image:url(<?php the_field( 'fb_2_photo' ); ?>)"></a>
				<div class="fb-title"><?php the_field( 'fb_2_title' ); ?></div>
				<div class="fb-body"><?php the_field( 'fb_2_body' ); ?></div>
			</div>
			<div class="feature-box text">
				<div class="fb-title"><?php the_field( 'fb_3_title' ); ?></div>
				<div class="fb-body">
					<?php the_field( 'fb_3_body' ); ?>
					<div>
						<a href="<?php the_field( 'fb_3_link' ); ?>">Read More ></a>
					</div>
				</div>
			</div>
			<div class="feature-box image">
				<a class="fb-image" href="<?php the_field( 'fb_4_link' ); ?>" style="background-image:url(<?php the_field( 'fb_4_photo' ); ?>)"></a>
				<div class="fb-title"><?php the_field( 'fb_4_title' ); ?></div>
				<div class="fb-body"><?php the_field( 'fb_4_body' ); ?></div>
			</div>
		</div>
	</div>
</section>


<div style="background:#0d1e30;">
	<div class='p_row'>
		<div class='pb_b_row home-approach'>
			<div class='pb_b_50 ta_left'><?php the_field('hp_diff_left'); ?></div>
			<div class='pb_b_50'><?php the_field('hp_diff_right'); ?></div>
		</div>
	</div>
</div>

<section class="home-solutions">
	<div class="contain text-center">
		<h1>Integrated Security Solutions</h1>
		<?php echo ist_solutions_markup(); ?>
	</div>
</section>

<?php endwhile;
get_footer(); ?>
