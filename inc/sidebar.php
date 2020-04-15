<h2><a href="<?php echo get_permalink( $ancestors[0] ); ?>"><?php echo get_the_title($ancestors[0]); ?></a></h2>
	 			<ul>
	 					<?php wp_list_pages(array(
									'child_of' => $ancestors[0],
									'title_li' => false,
									'depth' => 2,
									'exclude' => implode(',', get_option('exclude-from-nav'))		
							)); ?>

	 			</ul>
	 			

				<?php dynamic_sidebar( 'sidebar-general' ); ?>
				
			