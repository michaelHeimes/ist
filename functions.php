<?php

//Code goes below this line - SOF

// -----------------------------------------------------------------------------
//! Set the Stage
// -----------------------------------------------------------------------------

add_theme_support( 'post-thumbnails' );

// Load styles
function ist_load_styles() {
	wp_register_style( 'ist_styles', get_template_directory_uri() . '/dist/css/theme.min.css' );
	wp_enqueue_style( 'ist_styles' );
}
add_action( 'wp_enqueue_scripts', 'ist_load_styles' );


// Load scripts
function ist_load_scripts() {
	wp_deregister_script('jquery');
    wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', false, null );
	wp_register_script( 'fancybox', get_template_directory_uri() . '/dist/js/vendor/jquery.fancybox.pack.js', array('jquery'), '1.0', true );
	wp_register_script( 'bg_pos', get_template_directory_uri() . '/dist/js/vendor/jquery.backgroundpos.js', array('jquery'), '1.0', true );
	wp_register_script( 'modernizr', get_template_directory_uri() . '/dist/js/vendor/modernizr-2.6.1.min.js', array(), '1.0', true );
	wp_register_script( 'ist_scripts', get_template_directory_uri() . '/dist/js/theme.min.js', array('jquery'), '2.0', true );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'fancybox' );
	wp_enqueue_script( 'bg_pos' );
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'ist_scripts' );

	wp_localize_script('ist_scripts', 'myVars', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ));

	if ( is_page( 'contact-us' ) || is_page( 'contact-us' ) ) {
		wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAXoB90VPKBlUE9LQwwn-yL7CjbShLpRaM&callback=initMap', [ 'ist_scripts' ], null, true );
	}
}

if( !is_admin() ) {
	add_action( 'wp_enqueue_scripts', 'ist_load_scripts' );
}


// Menus
add_action( 'init', 'register_my_menu' );
function register_my_menu() {
	register_nav_menus(
	array(
			'primary-menu' => __( 'Primary Menu' )
			,'eyebrow-menu' => __( 'Eyebrow Menu' )
		)
	);
}


// -----------------------------------------------------------------------------
//! Login logo
// -----------------------------------------------------------------------------

function eh_login_logo() { ?>
    <style type="text/css">
		body.login #login {
		    padding-top: 80px;
		}
		body.login h1 a {
		    width: 330px;
		    height: 100px;
		    padding-bottom:0;
			background: transparent url(<?php echo get_template_directory_uri(); ?>/dist/img/logos/logo-ist.svg) center top no-repeat;
		}
    </style>
<?php }
add_action( 'login_head', 'eh_login_logo' );


// -----------------------------------------------------------------------------
//! Plugins
// -----------------------------------------------------------------------------

  	include "assets/plugins/widgets.php";
  	include "assets/plugins/affiliates-meta.php";

	//Theme Options Include
	get_template_part('nhp','options');


// -----------------------------------------------------------------------------
//! Basic Functionality Stuff
// -----------------------------------------------------------------------------

	// Comments Stuff Below

	function mytheme_comment($comment, $args, $depth) {
	   $GLOBALS['comment'] = $comment; ?>
	   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	     <div id="comment-<?php comment_ID(); ?>">
	      <div class="comment-author vcard">
	      <?php echo get_avatar($comment, '32'); ?>
	         <?php printf(__('<cite class="fn">%s</cite> <span class="says">wrote on</span>'), get_comment_author_link()) ?> <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?>
	      </div><!--end .comment-author vcard-->
	      <?php if ($comment->comment_approved == '0') : ?>
	         <em><?php _e('Your comment is awaiting moderation.') ?></em>
	         <br />
	      <?php endif; ?>

	      <?php comment_text() ?>

	      <div class="reply">
	         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	      </div><!--end .reply-->
	     </div><!--end #comment-ID-->
	<?php
	        }


	 // Death to Spambots

	 function security_remove_emails($content) {
		    $pattern = '/([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4})/i';
		    $fix = preg_replace_callback($pattern,"security_remove_emails_logic", $content);

		    return $fix;
		}
		function security_remove_emails_logic($result) {
		    return antispambot($result[1]);
		}
		add_filter( 'the_content', 'security_remove_emails', 20 );




	//Pagination
	function pagination($pages = '', $range = 4)
	{
	     $showitems = ($range * 2)+1;

	     global $paged;
	     if(empty($paged)) $paged = 1;

	     if($pages == '')
	     {
	         global $wp_query;
	         $pages = $wp_query->max_num_pages;
	         if(!$pages)
	         {
	             $pages = 1;
	         }
	     }

	     if(1 != $pages)
	     {
	         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
	         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
	         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

	         for ($i=1; $i <= $pages; $i++)
	         {
	             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
	             {
	                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
	             }
	         }

	         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
	         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
	         echo "</div>\n";
	     }
	}


function ist_blog_pagination($total = '', $range = 4) {
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($total == '') {
         global $wp_query;
         $total = $wp_query->max_num_pages;
         if(!$total) {
             $total = 1;
         }
     }

	if( $total == 1 ) { return; }
	echo '<div class="pagination">';
	echo '<span class="pagination-key">View More:</span>';

	 // First page
	 if( $paged >= 4 ) {
		 echo '<a href="' . get_pagenum_link(1) . '" class="pagination-word">« First</a>';
	 }

	 // Prev page
	 if( $paged > 1 ) {
		echo '<a href="' . get_pagenum_link( $paged - 1 ) . '" class="pagination-word">‹ Previous</a>';
	 }

	 // Page numbers
	 $i = $paged  - 2;
	 $end = $paged + 3;
	 for ( $i; $i < $end; $i++ ) {
		 if( $i == $paged ) {
			echo '<span class="current">' . $i . '</span>';
		 } else if ( $i > 0 && $i <= $total ) {
			echo '<a href="' . get_pagenum_link($i) . '">' . $i . '</a>';
		 }
	 }

	 // Next page
	 if( $paged != $total ) {
		echo '<a href="' . get_pagenum_link( $paged + 1 ) . '" class="pagination-word">Next ›</a>';
	 }

	 // Last page
	 if( $paged < $total - 1 ) {
		 echo '<a href="' . get_pagenum_link( $total ) . '" class="pagination-word">Last »</a>';
	 }

	 echo '</div>';
}


	// adds Read More to excerprt
	   function new_excerpt_more($more) {
		   global $post;
		  	 return '… <a href="'. get_permalink($post->ID) . '">' . 'Read More &raquo;' . '</a>';
		  	 }
		 add_filter('excerpt_more', 'new_excerpt_more');


// -----------------------------------------------------------------------------
//! ADD BODY CLASS
// -----------------------------------------------------------------------------

	add_filter('body_class', 'add_section_to_body_class');

	function add_section_to_body_class($classes)
	{
		global $post;

		if($post->post_type == "page" && $post->post_parent)
		{
			$ancestors = array_reverse(get_post_ancestors($post));

			if($ancestors) $classes[] = 'section-' . $ancestors[0];
		}
		elseif($post->post_type == "page" && $post->post_parent == 0)
		{
			$classes[] = 'section-' . $post->ID;
		}

		return $classes;
	}




// -----------------------------------------------------------------------------
//	Gravity Forms Placeholder
// -----------------------------------------------------------------------------


	/* Add a custom field to the field editor (See editor screenshot) */
	add_action("gform_field_standard_settings", "my_standard_settings", 10, 2);

	function my_standard_settings($position, $form_id){

	// Create settings on position 25 (right after Field Label)

	if($position == 25){
	?>

	<li class="admin_label_setting field_setting" style="display: list-item; ">
	<label for="field_placeholder">Placeholder Text

	<!-- Tooltip to help users understand what this field does -->
	<a href="javascript:void(0);" class="tooltip tooltip_form_field_placeholder" tooltip="&lt;h6&gt;Placeholder&lt;/h6&gt;Enter the placeholder/default text for this field.">(?)</a>

	</label>

	<input type="text" id="field_placeholder" class="fieldwidth-3" size="35" onkeyup="SetFieldProperty('placeholder', this.value);">

	</li>
	<?php
	}
	}

	/* Now we execute some javascript technicalitites for the field to load correctly */

	add_action("gform_editor_js", "my_gform_editor_js");

	function my_gform_editor_js(){
	?>
	<script>
	//binding to the load field settings event to initialize the checkbox
	jQuery(document).bind("gform_load_field_settings", function(event, field, form){
	jQuery("#field_placeholder").val(field["placeholder"]);
	});
	</script>

	<?php
	}

	/* We use jQuery to read the placeholder value and inject it to its field */

	add_action('gform_enqueue_scripts',"my_gform_enqueue_scripts", 10, 2);

	function my_gform_enqueue_scripts($form, $is_ajax=false){
	?>
	<script>

	jQuery(function(){
	<?php

	/* Go through each one of the form fields */

	foreach($form['fields'] as $i=>$field){

	/* Check if the field has an assigned placeholder */

	if(isset($field['placeholder']) && !empty($field['placeholder'])){

	/* If a placeholder text exists, inject it as a new property to the field using jQuery */

	?>

	jQuery('#input_<?php echo $form['id']?>_<?php echo $field['id']?>').attr('placeholder','<?php echo $field['placeholder']?>');

	<?php
	}
	}
	?>
	});
	</script>
	<?php
	}




// -----------------------------------------------------------------------------
//  Custom Post Types
// -----------------------------------------------------------------------------

add_action( 'init', 'create_my_post_types' );

	function create_my_post_types() {

		register_post_type( 'success_center',
			array(
				'labels' => array(
					'name' => __( 'Success Center' ),
					'singular_name' => __( 'Success Center Item' ),
					'new_item' => __( 'Success Center Item' ),
					'edit_item' => __( 'Success Center Item' ),
					'edit' => __( 'Edit' ),
					'new_item' => __( 'New Success Center Item' ),
					'view_item' => __( 'View Success Center Item' ),
					'add_new_item' => __( 'Add Success Center Item' )
				),
				'public' => true,
				/* 'rewrite' => array( 'slug' => 'success-center', 'with_front' => false ), */
				'hierarchical' => true,
				'menu_position' => 21,
				'menu_icon' => 'dashicons-chart-line',
				'supports' => array( 'title', 'thumbnail', 'editor', 'page-attributes' )
	        )

		);

		register_post_type( 'team_member',
			array(
				'labels' => array(
					'name' => __( 'Team Members' ),
					'singular_name' => __( 'Team Member' ),
					'new_item' => __( 'Team Member' ),
					'edit_item' => __( 'Team Member' ),
					'edit' => __( 'Edit' ),
					'new_item' => __( 'New Team Member' ),
					'view_item' => __( 'View Team Member' ),
					'add_new_item' => __( 'Add Team Member' )
				),
				'public' => true,
				'rewrite' => array( 'slug' => 'team-member', 'with_front' => false ),
				'hierarchical' => true,
				'menu_position' => 22,
				'menu_icon' => 'dashicons-groups',
				'supports' => array( 'title', 'thumbnail', 'editor', 'page-attributes' )
	        )

		);

		register_post_type( 'affiliate',
			array(
				'labels' => array(
					'name' => __( 'Affiliations' ),
					'singular_name' => __( 'Affiliate' ),
					'new_item' => __( 'Affiliate' ),
					'edit_item' => __( 'Affiliate' ),
					'edit' => __( 'Edit' ),
					'new_item' => __( 'New Affiliate' ),
					'view_item' => __( 'View Affiliate' ),
					'add_new_item' => __( 'Add Affiliate' )
				),
				'public' => true,
				'rewrite' => array( 'slug' => 'affiliate', 'with_front' => false ),
				'hierarchical' => true,
				'menu_position' => 23,
				'menu_icon' => 'dashicons-id',
				'supports' => array( 'title', 'thumbnail', 'editor', 'page-attributes' )
	        )

		);


}


// -----------------------------------------------------------------------------
//! Custom Post Customization
// -----------------------------------------------------------------------------

	//Change title in editor
	function change_default_title( $title ){
	     $screen = get_current_screen();

	     if  ( 'success_center' == $screen->post_type ) {
	          $title = 'Enter Client Name Here';
	     }

	     if  ( 'team_member' == $screen->post_type ) {
	          $title = 'Enter Team Member Name &amp; Position Here';
	     }

	     if  ( 'affiliate' == $screen->post_type ) {
	          $title = 'Enter Affiliate Name Here';
	     }


	     return $title;
	}

	add_filter( 'enter_title_here', 'change_default_title' );

	// Admin Custom Post Page Specific CSS
	function posttype_admin_css() {
	    global $post_type;
	    if($post_type == 'success_center' || $post_type == 'team_member' || $post_type == 'affiliate' ) {
	    echo '<style type="text/css">#view-post-btn,#post-preview,#edit-slug-box{display: none;}</style>';
	    }
	}
	add_action('admin_head', 'posttype_admin_css');



// -----------------------------------------------------------------------------
//! Custom Taxonomies
// -----------------------------------------------------------------------------

	add_action( 'init', 'create_success_category' );
		function create_success_category() {
		 $labels = array(
		    'name' => _x( 'Success Center Categories', 'taxonomy general name' ),
		    'singular_name' => _x( 'Success Center Category', 'taxonomy singular name' ),
		    'search_items' =>  __( 'Search Success Center Categories' ),
		    'all_items' => __( 'All Success Center Categories' ),
		    'parent_item' => __( 'Parent Success Center Category' ),
		    'parent_item_colon' => __( 'Parent Success Center Category:' ),
		    'edit_item' => __( 'Edit Success Center Category' ),
		    'update_item' => __( 'Update Success Center Category' ),
		    'add_new_item' => __( 'Add New Success Center Category' ),
		    'new_item_name' => __( 'New Success Center Category' ),
		  );

		  register_taxonomy('successcat','success_center',array(
		    'hierarchical' => true,
		    'labels' => $labels,
		    "public" => "true"
		  ));

		}


// -----------------------------------------------------------------------------
//! Thumbnail Setup
// -----------------------------------------------------------------------------

	// Add Post-Thumbnail Support
	add_theme_support('post-thumbnails', array('success_center', 'team_member', 'affiliate') );


	add_image_size( 'success-center-thumb', 107, 56, true); // cropped
	add_image_size( 'team-member-thumb', 138, 168, true); // cropped
	add_image_size( 'affiliate-thumb', 138, 62, true); // cropped

// -----------------------------------------------------------------------------
//! Metaboxes
// -----------------------------------------------------------------------------


/*
ACF options page
*/
if( function_exists('acf_add_options_page') ) {
 	// add parent
	$parent = acf_add_options_page(array(
		'page_title' 	=> 'IST Theme Settings'
	));

	// add sub page
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Prefooter'
		,'parent_slug' 	=> $parent['menu_slug'],
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Right Nav Extras'
		,'parent_slug' 	=> $parent['menu_slug'],
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Social'
		,'parent_slug' 	=> $parent['menu_slug'],
	));
}

/* shortcode for widgets */
//[foobar]
function my_sidebar_shortcode( $atts ){
	$a = shortcode_atts( array(
        'name' => 'solution_boxes'
    ), $atts );

	ob_start();
	dynamic_sidebar($a['name']);
	$sidebar = ob_get_contents();
	ob_end_clean();

	return $sidebar;
}
add_shortcode( 'my_sidebar', 'my_sidebar_shortcode' );

/* shortcode for social icons */
function ist_social_shortcode( $atts ){
	$height = get_field('opt_social_i_height','option');
	if(!empty($height)) $height = "height={$height}";
	$html = "<span class='social_icon_wrapper'>";
	while(have_rows('opt_social','option')){
		the_row();
		$icon = get_sub_field('icon');
		$url = get_sub_field('link');
        $alt = 'Social icon';

        if ( strpos( $url, 'twitter' ) ) {
            $alt = 'Twitter';
        } else if ( strpos( $url, 'instagram' ) ) {
            $alt = 'Instagram';
        } else if ( strpos( $url, 'facebook' ) ) {
            $alt = 'Facebook';
        } else if ( strpos( $url, 'linkedin' ) ) {
            $alt = 'LinkedIn';
        }

        $html .= '<a class="social_icon" href="' . $url . '"><img ' . $height . ' src="' . $icon . '" alt="' . $alt . '"/></a>';
	}
	$html .= "</span>";
	return $html;
}
add_shortcode( 'ist_social', 'ist_social_shortcode' );

/* shortcode for team members */
function our_team_shortcode( ){
	$html = "
	<style>
		.team_i {margin-top: 30px;}
	</style>
	";

	query_posts(array('post_type'=>'team_member', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => '60') );
	if ( have_posts() ){
		while ( have_posts() ){
			the_post();
			$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail(null,'team-member-thumb') : '';
			$html .= "<div class='team_i valign_top'>";
			$html .= "<div class='w700_25p'>{$thumbnail}</div>";
			$html .= "<div class='w700_75p'><h4>".get_the_title()."</h4>".get_the_content()."</div>";
			$html .= "</div>";
		}
	}

	wp_reset_query(); //Resets the query to get back to our original loop
	return $html;
}
add_shortcode( 'our_team', 'our_team_shortcode' );

/* shortcode for success center posts */
function success_center_shortcode( $atts ){
	$a = shortcode_atts( array(
        'slug' => 'federal'
    ), $atts );

	$html = '';
	$slug = $a['slug'];
	query_posts(array('post_type'=>'success_center', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => '60', 'successcat' => $slug ) );
		if ( have_posts() ){
			while ( have_posts() ){
				the_post();
				$thumb = has_post_thumbnail() ? get_the_post_thumbnail(null,'success-center-thumb') : '';
				$title = get_the_title();
				$content = get_the_content();

				$html .= "<div class='valign_top' style='margin-top:30px;'>";
					$html .= "<div class='w700_25p'>{$thumb}</div>";
					$html .= "<div class='w700_75p'><h4>{$title}</h4>{$content}</div>";
				$html .= "</div>";
			}
		}

	wp_reset_query(); //Resets the query to get back to our original loop
	return $html;
}
add_shortcode( 'success_center', 'success_center_shortcode' );

/* shortcode for affiliations */
function our_affiliations_shortcode( ){
	$html = "
	<style>
	.affiliate_i {margin-top: 20px;}
	@media (min-width: 700px) {
		.affiliate_i > div {display:inline-block; vertical-align:top;}
		.affiliate_img {width: 25%;}
		.affiliate_body {width: 75%;}
	}
	</style>
	";

	query_posts(array('post_type'=>'affiliate', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => '60') );
	if ( have_posts() ){
		while ( have_posts() ){
			the_post();
			$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail(null,'affiliate-thumb') : '';
			$affiliate_link = get_post_meta(get_the_ID(), 'affiliate_link', true);
			$html .= "<div class='affiliate_i'>";
			$html .= "<div class='affiliate_img'>{$thumbnail}</div>";
			$html .= "<div class='affiliate_body'><a href='{$affiliate_link}'><h4>".get_the_title()."</h4></a>".get_the_content()."</div>";
			$html .= "</div>";
		}
	}

	wp_reset_query(); //Resets the query to get back to our original loop
	return $html;
}
add_shortcode( 'our_affiliations', 'our_affiliations_shortcode' );

/* solutions boxes widget */
function ist_widgets_init() {
	register_sidebar( array(
		'name'          => 'Success Center Categories'
		,'id'            => 'success_center_categories'
		,'before_widget' => '<div>'
		,'after_widget'  => '</div>'
		,'before_title' => ''
		,'after_title' => ''
	) );
	register_sidebar( array(
		'name'          => 'Responsive Wheel'
		,'id'            => 'ist_wheel'
		,'before_widget' => '<div>'
		,'after_widget'  => '</div>'
		,'before_title' => ''
		,'after_title' => ''
	) );
}
add_action( 'widgets_init', 'ist_widgets_init' );

function approach_wheel_sc(){
	//somewhere the js needs to be loaded and fired?!

	return file_get_contents($dir.'/inc/approach.php');
}
add_shortcode( 'approach_wheel', 'approach_wheel_sc' );

 //Code goes above this line - EOF


function ist_solutions_markup() {
	$page = get_page_by_path( 'solutions-corporate-business-security-systems' );
	$id = $page->ID;
	if ( have_rows( 'solution', $id ) ) :
		$out = '<div class="solution-boxes">';
		$count = 1;
		while ( have_rows( 'solution', $id ) ) : the_row();
			$out .= '<a href="' . get_sub_field( 'url' ) . '" class="sbox sbox-' . $count . '"><span class="callout">' . get_sub_field( 'name' ) . '</span></a>';
			$count++;
		endwhile;
		$out .= '</div>';
	endif;

	return $out;
}

add_shortcode( 'ist_solutions', 'ist_solutions_markup' );



/*
 * Handle Email Subscription Form
 */
function ist_email_subscribe() {
	$email = filter_var( $_REQUEST['email'], FILTER_SANITIZE_EMAIL);
	$to = 'leslie@pomagency.com';
	$subject = '(IST) New Email Subscriber';
	$message = 'Email: ' . $email;

	wp_mail( $to, $subject, $message );
}
add_action( 'wp_ajax_ist_subscribe_form_submit', 'ist_email_subscribe' );
add_action( 'wp_ajax_nopriv_ist_subscribe_form_submit', 'ist_email_subscribe' );
