<?php 
/*
Template Name: Approach Page
*/
?>
<?php get_header(); ?>
<?php include('inc/ist-options.php'); ?> 
<div class="row approach-top">
	<div class="four-col">
		<img src="<?php bloginfo('template_url'); ?>/assets/images/concept-to-reality-interior.png" class="ctor"  alt="Concept to Reality" />
	</div><!--end .three-col-->
	
	<div class="eight-col last">
		<?php if ($options['approach_top'] == true){ ?>
			<p><?php echo $options['approach_top']; ?></p>
		<?php }else { ?>
		 <p>You're about to enter the core of who we are. IST's four-phased approach sets us firmly apart from other security systems integrators because it is built specifically for you. When you enlist IST as a partner, these are the steps we take to ensure that your people, property and data are not just protected – they're definitively secure.</p>
		 <?php } ?>
	</div><!--end .nine-col.last-->
</div>

<div class="row approach-bottom gradient">

	<div class="five-col">
		
			<div class="approach-spinner">
				<div class="goto-strategy goto"></div>
				<div class="goto-engineering goto"></div>
				<div class="goto-implementation goto"></div>
				<div class="goto-support goto"></div>

				<div class="slice-strategy slice"></div>
				<div class="slice-engineering slice"></div>
				<div class="slice-implementation slice"></div>
				<div class="slice-support slice"></div>												
			</div><!--end .approach-spinner-->
		
	</div><!--end .fiv-col-->
	
	<div class="seven-col last">
		<?php include('inc/approach.php'); ?>
		
	</div><!--end .seven-col.last-->

	
</div><!--end .row.approach-bottom-->
	  

<?php get_footer(); ?>