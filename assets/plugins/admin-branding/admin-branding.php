<?php

// -----------------------------------------------------------------------------
//  LOGIN SCREEN CSS
//  Adds additional IST login screen CSS
// -----------------------------------------------------------------------------

	add_action('login_head', 'ascension_login_screen_css');
	function ascension_login_screen_css() 
	{
		echo '
		<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/assets/plugins/admin-branding/login-screen.css' . '" />';
	}
	
	add_filter('login_headerurl', 'login_screen_logo_url');
	function login_screen_logo_url($url) 
	{
		return get_bloginfo('url');
	}



// -----------------------------------------------------------------------------
//  ADMIN CSS
//  Adds additional IST admin CSS
// -----------------------------------------------------------------------------

	add_action('admin_head', 'ascension_admin_css');
	function ascension_admin_css() 
	{
		echo '
		<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/assets/plugins/admin-branding/admin.css' . '" />';
	}
	
// -----------------------------------------------------------------------------
//  Disable Useless Default Dashboard News Widgets
// -----------------------------------------------------------------------------

 
function disable_default_dashboard_widgets() {

 	//remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');

	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
 	remove_meta_box('dashboard_primary', 'dashboard', 'core');
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');
}
add_action('admin_menu', 'disable_default_dashboard_widgets');


// -----------------------------------------------------------------------------
//  Disable Sidebar Widgets Widgets
// -------------------------------------------------------------------

add_action('widgets_init', 'unregister_default_wp_widgets', 1);
	function unregister_default_wp_widgets() 
	{
		unregister_widget('WP_Widget_Pages');
		unregister_widget('WP_Widget_Calendar');
		unregister_widget('WP_Widget_Archives');
		unregister_widget('WP_Widget_Links');
		unregister_widget('WP_Widget_Meta');
		unregister_widget('WP_Widget_Search');
		unregister_widget('WP_Widget_Text');
		unregister_widget('WP_Widget_Categories');
		unregister_widget('WP_Widget_Recent_Posts');
		unregister_widget('WP_Widget_Recent_Comments');
		unregister_widget('WP_Widget_RSS');
		unregister_widget('WP_Widget_Tag_Cloud');
		unregister_widget('WP_Nav_Menu_Widget');
	}


// -----------------------------------------------------------------------------
// Hide unused admin menu items
// -----------------------------------------------------------------------------
		
	add_action('admin_menu', 'remove_unused_admin_menus');
	function remove_unused_admin_menus() 
	{
		global $menu;
		$restricted = array(__('Comments'), __('Tools')); //__('Posts')
		end($menu);
		while(prev($menu))
		{
			$value = explode(' ',$menu[key($menu)][0]);
			if(in_array($value[0] != NULL ? $value[0] : "" , $restricted))
			{
				unset($menu[key($menu)]);
			}
		}
	}

// -----------------------------------------------------------------------------
// Change Posts Label to Blog Posts
// -----------------------------------------------------------------------------
		
/*
	
	function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog Posts';
    $submenu['edit.php'][5][0] = 'Blog Posts';
    $submenu['edit.php'][10][0] = 'Add Blog Post';
    //$submenu['edit.php'][15][0] = 'Blog Categories:'; // Change name for categories
    //$submenu['edit.php'][16][0] = 'Blog Tags:'; // Change name for tags
    echo '';
}

function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'Blog Posts';
        $labels->singular_name = 'Blog Post';
        $labels->add_new = 'Add Blog Post';
        $labels->add_new_item = 'Add Blog Post';
        $labels->edit_item = 'Edit Blog Posts';
        $labels->new_item = 'Blog Post';
        $labels->view_item = 'View Blog Post';
        $labels->search_items = 'Search Blog Posts';
        $labels->not_found = 'No Blog Posts found';
        $labels->not_found_in_trash = 'No Blog Posts found in Trash';
    }
    add_action( 'init', 'change_post_object_label' );
    add_action( 'admin_menu', 'change_post_menu_label' );
*/


// -----------------------------------------------------------------------------
// Customize Right Now Section of Dashboard
// -----------------------------------------------------------------------------



add_action( 'right_now_content_table_end', 'your_right_now' );
 
function your_right_now() {
 
  // Success Center
  $num_success = wp_count_posts( 'success_center' );
  $num = number_format_i18n( $num_success->publish );
  $text = _n( 'Success Center Posts', 'Success Center Posts', intval($num_success->publish) );
  if ( current_user_can( 'edit_posts' ) ) {
    $num = "<a href='edit.php?post_type=success_center'>$num</a>";
    $text = "<a href='edit.php?post_type=success_center'>$text</a>";
  }
  echo "\n\t".'<tr class="first">';
  echo "\n\t".'<td class="first b b-success_center">' . $num . '</td>';
  echo "\n\t".'<td class="t success_center">' . $text . '</td>';
  echo "\n\t".'</tr>';
 
  
 
}

?>