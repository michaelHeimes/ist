<?php
	
	if(basename($_SERVER['REQUEST_URI']) == "widgets.php")
	{
		add_action('admin_init', 'init_widget_autocomplete');
		function init_widget_autocomplete() { 
			wp_enqueue_script('autocomplete-init'); 
			wp_enqueue_style('jquery-ui-autocomplete');
		}
	}

// -----------------------------------------------------------------------------
//  WIDGET VARIABLES
// -----------------------------------------------------------------------------
	
	$widget_vars = array(
		'class' => 'sidebar-item',
		'title_element' => 'h3',
		'inner_class' => 'callout'
	);



// -----------------------------------------------------------------------------
//  REGISTER SIDEBARS
// -----------------------------------------------------------------------------

	register_sidebar(array(
		'name' => 'General Sidebar',
		'id' => 'sidebar-general',
		'description' => 'Sidebar for the interior pages.',
		//'before_widget' => '<div id="%1$s" class="' . $widget_vars['class'] . ' %2$s">',
		//'after_widget' => '</div><!-- / .' . $widget_vars['class'] . ' -->',
		'before_title' => '<' . $widget_vars['title_element'] . '>',
		'after_title' => '</' . $widget_vars['title_element'] . '>'
	));

	
// -----------------------------------------------------------------------------
//  General WIDGET
// -----------------------------------------------------------------------------
	
	register_widget('News_Widget');
	
	class News_Widget extends WP_Widget {
		
		// Constructor
		function __construct() 
		{
			parent::WP_Widget( 'news', 'General Widget', array( 'classname' => 'news', 'description' => 'Title and Text - Used for News and Events' ) );
		}
		
		// Widget Content
		function widget($args, $instance)
		{
			global $widget_vars;
			
			$title = $instance['title'];
			$text = $instance['text'];
 
			
			?>
			
			<?php // echo $args['before_widget']; ?>
			<?php echo $args['before_title'] . $title . '' . $args['after_title']; ?>
				<div class="<?php echo $widget_vars['inner_class']; ?>">
					
					
					
					<?php echo wpautop($text); ?>
					
 
				</div><!-- / .<?php echo $widget_vars['inner_class']; ?> -->
								
			<?php// echo $args['after_widget']; ?>

			<?php
		}	
		
		// Update widget options
		function update($new_instance, $old_instance)
		{
			$instance = $old_instance;
			
			$instance['title'] = trim(strip_tags($new_instance['title']));
			$instance['text'] = trim($new_instance['text']);
/* 			$instance['text'] = trim(strip_tags($new_instance['text'])); */
			 
			
			return $instance;
		}	
		
		// Widget options form
		function form($instance)
		{
			$instance['title'] = (isset($instance['title'])) ? $instance['title'] : "";
			$instance['text'] = (isset($instance['text'])) ? $instance['text'] : "";
			 		?>
			
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
			</p>
						
			<p>
				<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text'); ?></label> <br />
				<textarea id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" rows="3" cols="" class="widefat"><?php echo $instance['text']; ?></textarea>
			</p>
			 			
			<?php 
		}		
	}





// -----------------------------------------------------------------------------
//  IMAGE WIDGET
// -----------------------------------------------------------------------------
	
	register_widget('Image_Callout_Widget');
	
	class Image_Callout_Widget extends WP_Widget {
		
		// Constructor
		function __construct() 
		{
			parent::WP_Widget( 'image-callout', 'Image Callout', array( 'classname' => 'image-callout', 'description' => 'Title, Image, and a Link' ) );
		}
		
		// Widget Content
		function widget($args, $instance)
		{
			global $widget_vars;
			
			$title = $instance['title'];
			$img_uri = $instance['img_uri'];
			$url = $instance['url'];
			$link_id = $instance['link_id'];
 			
			?>
			
			<?php// echo $args['before_widget']; ?>
			
				<div class="<?php echo $widget_vars['inner_class']; ?>">
					
					<?php echo $args['before_title'] . $title . '' . $args['after_title']; ?>
					
					
					
					<a href="<?php echo ($link_id) ? get_permalink($link_id) : $url; ?>"><img src="<?php echo ($img_uri); ?>" alt="<?php echo ($title); ?>" /></a>

				</div><!-- / .<?php echo $widget_vars['inner_class']; ?> -->
								
			<?php// echo $args['after_widget']; ?>

			<?php
		}	
		
		// Update widget options
		function update($new_instance, $old_instance)
		{
			$instance = $old_instance;
			
			$instance['title'] = trim(strip_tags($new_instance['title']));
			$instance['img_uri'] = trim(strip_tags($new_instance['img_uri']));
			$instance['url'] = $new_instance['url'];
 			$instance['link_id'] = $new_instance['link_id']; 
			
			return $instance;
		}	
		
				
		// Widget options form
		function form($instance)
		{
			$instance['title'] = (isset($instance['title'])) ? $instance['title'] : "";
			$instance['img_uri'] = (isset($instance['img_uri'])) ? $instance['img_uri'] : "";
			$instance['url'] = (isset($instance['url'])) ? $instance['url'] : "";
			if(is_int($instance['url'])) $instance['url'] = str_replace(get_bloginfo('url'), '', get_permalink($instance['url']));
 			$instance['link_id'] = (isset($instance['link_id'])) ? $instance['link_id'] : "";
		?>
			
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
			</p>
						
			<p>
				<label for="<?php echo $this->get_field_id('img_uri'); ?>"><?php _e('Image'); ?></label> <br />
				<input type="text" class="widefat img" name="<?php echo $this->get_field_name('img_uri'); ?>" id="<?php echo $this->get_field_id('img_uri'); ?>" value="<?php echo $instance['img_uri']; ?>" />
				<input type="button" class="select-img" value="Select Image" />
			</p>
			<p style="font-size:10px;"><em>Try to keep the image width below 185px. Otherwise you'll break the container.</em></p>
			
			 
			
			<p>
				<label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('URL'); ?></label> 
				<div class="autocomplete-wrap">
					<input class="widefat autocomplete" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $instance['url']; ?>" />
					<input type="hidden" name="<?php echo $this->get_field_name('link_id'); ?>" value="<?php echo $instance['link_id']; ?>" />
				</div>
			</p>
			
 
			<?php 
		}		
	}
	
	function wup_enqueue($hook)		{
		if( 'widgets.php' != $hook)
			return;

		  wp_enqueue_style('thickbox');
		  wp_enqueue_script('media-upload');
		  wp_enqueue_script('thickbox');
		  // moved the js to an external file, you may want to change the path
		  wp_enqueue_script('wup', '/wp-content/themes/ist/assets/plugins/widget-script.js', null, null, true);
		}
		add_action('admin_enqueue_scripts', 'wup_enqueue');
		

// -----------------------------------------------------------------------------
//  IMAGE WIDGET EXTENDED
// -----------------------------------------------------------------------------

	register_widget('Image_Callout_Extended_Widget');
	
	class Image_Callout_Extended_Widget extends WP_Widget {
		
		// Constructor
		function __construct() 
		{
			parent::WP_Widget( 'image-callout-extended', 'Image Callout Extended', array( 'classname' => 'image-callout-extended', 'description' => 'Title, Image, Text, and a Link' ) );
		}
		
		// Widget Content
		function widget($args, $instance)
		{
			global $widget_vars;
			
			$title = $instance['title'];
			$img_uri = $instance['img_uri'];
			$text = $instance['text'];
			$url = $instance['url'];
			$link_id = $instance['link_id'];
 			
			?>
			
			<?php// echo $args['before_widget']; ?>
			
				<div class="<?php echo $widget_vars['inner_class']; ?> extended">
					
					<?php echo $args['before_title'] . $title . '' . $args['after_title']; ?>
					
					
					<a href="<?php echo ($link_id) ? get_permalink($link_id) : $url; ?>"><img src="<?php echo ($img_uri); ?>" alt="<?php echo ($title); ?>" /> <?php echo($text)?></a>
					

				</div><!-- / .<?php echo $widget_vars['inner_class']; ?> -->
								
			<?php// echo $args['after_widget']; ?>

			<?php
		}	
		
		// Update widget options
		function update($new_instance, $old_instance)
		{
			$instance = $old_instance;
			
			$instance['title'] = trim(strip_tags($new_instance['title']));
			$instance['img_uri'] = trim(strip_tags($new_instance['img_uri']));
			$instance['text'] = trim($new_instance['text']);
			$instance['url'] = $new_instance['url'];
 			$instance['link_id'] = $new_instance['link_id']; 
			
			return $instance;
		}	
		
				
		// Widget options form
		function form($instance)
		{
			$instance['title'] = (isset($instance['title'])) ? $instance['title'] : "";
			$instance['img_uri'] = (isset($instance['img_uri'])) ? $instance['img_uri'] : "";
			$instance['text'] = (isset($instance['text'])) ? $instance['text'] : "";
			$instance['url'] = (isset($instance['url'])) ? $instance['url'] : "";
			if(is_int($instance['url'])) $instance['url'] = str_replace(get_bloginfo('url'), '', get_permalink($instance['url']));
 			$instance['link_id'] = (isset($instance['link_id'])) ? $instance['link_id'] : "";
		?>
			
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
			</p>
						
			<p>
				<label for="<?php echo $this->get_field_id('img_uri'); ?>"><?php _e('Image'); ?></label> <br />
				<input type="text" class="widefat img" name="<?php echo $this->get_field_name('img_uri'); ?>" id="<?php echo $this->get_field_id('img_uri'); ?>" value="<?php echo $instance['img_uri']; ?>" />
				<input type="button" class="select-img" value="Select Image" />
			</p>
			<p style="font-size:10px;"><em>Try to keep the image width below 185px. Otherwise you'll break the container.</em></p>
			
			<p>
				<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text'); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $instance['text']; ?>" />
			</p>
			 
			
			<p>
				<label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('URL'); ?></label> 
				<div class="autocomplete-wrap">
					<input class="widefat autocomplete" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $instance['url']; ?>" />
					<input type="hidden" name="<?php echo $this->get_field_name('link_id'); ?>" value="<?php echo $instance['link_id']; ?>" />
				</div>
			</p>
			
 
			<?php 
		}		
	}
		


// -----------------------------------------------------------------------------
//  GSA WIDGET
// -----------------------------------------------------------------------------
	
	register_widget('GSA_Callout_Widget');
	
	class GSA_Callout_Widget extends WP_Widget {
		
		// Constructor
		function __construct() 
		{
			parent::WP_Widget( 'gsa-callout', 'GSA Callout', array( 'classname' => 'gsa-callout', 'description' => 'Used for the GSA Callout' ) );
		}
		
		// Widget Content
		function widget($args, $instance)
		{
			global $widget_vars;
			
			$title = $instance['title'];
			//$img_uri = $instance['img_uri'];
			//$url = $instance['url'];
			//$link_id = $instance['link_id'];
 			
			?>
			
			<?php// echo $args['before_widget']; ?>
			
				<div class="<?php echo $widget_vars['inner_class']; ?>">
					
					<?php echo $args['before_title'] . $title . '' . $args['after_title']; ?>

						<?php if (is_page('gsa-contracts')) : ?>
							<a href="http://www.gsa.gov/portal/content/104677" target="_blank"><img src="http://www.istonline.com/wp-content/uploads/2013/05/gsa-callout.jpg" alt="<?php echo ($title); ?>" /></a>
						<?php else : ?>
							<a href="http://www.istonline.com/contract-vehicles/gsa-contracts/"><img src="http://www.istonline.com/wp-content/uploads/2013/05/gsa-callout.jpg" alt="<?php echo ($title); ?>" /></a>
						<?php endif; ?>

				</div><!-- / .<?php echo $widget_vars['inner_class']; ?> -->
								
			<?php// echo $args['after_widget']; ?>

			<?php
		}	
		
		// Update widget options
		function update($new_instance, $old_instance)
		{
			$instance = $old_instance;
			
			$instance['title'] = trim(strip_tags($new_instance['title']));
			//$instance['img_uri'] = trim(strip_tags($new_instance['img_uri']));
			//$instance['url'] = $new_instance['url'];
 			//$instance['link_id'] = $new_instance['link_id']; 
			
			return $instance;
		}	
		
				
		// Widget options form
		function form($instance)
		{
			$instance['title'] = (isset($instance['title'])) ? $instance['title'] : "";
			//$instance['img_uri'] = (isset($instance['img_uri'])) ? $instance['img_uri'] : "";
			//$instance['url'] = (isset($instance['url'])) ? $instance['url'] : "";
			//if(is_int($instance['url'])) $instance['url'] = str_replace(get_bloginfo('url'), '', get_permalink($instance['url']));
 			//$instance['link_id'] = (isset($instance['link_id'])) ? $instance['link_id'] : "";
		?>
			
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
			</p>
			
			
 
			<?php 
		}		
	}
	
	
	
/*****EOF*****/
?>