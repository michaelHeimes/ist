<?php
/*
 *
 * Require the framework class before doing anything else, so we can use the defined urls and dirs
 * Also if running on windows you may have url problems, which can be fixed by defining the framework url first
 *
 */
//define('NHP_OPTIONS_URL', site_url('path the options folder'));
if(!class_exists('NHP_Options')){
	require_once( dirname( __FILE__ ) . '/options/options.php' );
}

/*
 *
 * Custom function for filtering the sections array given by theme, good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 *
 * NOTE: the defined constansts for urls, and dir will NOT be available at this point in a child theme, so you must use
 * get_template_directory_uri() if you want to use any of the built in icons
 *
 */
function add_another_section($sections){

	//$sections = array();
	$sections[] = array(
				'title' => __('A Section added by hook', 'nhp-opts'),
				'desc' => __('<p class="description">This is a section created by adding a filter to the sections array, great to allow child themes, to add/remove sections from the options.</p>', 'nhp-opts'),
				//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
				//You dont have to though, leave it blank for default.
				'icon' => trailingslashit(get_template_directory_uri()).'options/img/glyphicons/glyphicons_062_attach.png',
				//Lets leave this as a blank section, no options just some intro text set above.
				'fields' => array()
				);

	return $sections;

}//function
//add_filter('nhp-opts-sections-twenty_eleven', 'add_another_section');


/*
 *
 * Custom function for filtering the args array given by theme, good for child themes to override or add to the args array.
 *
 */
function change_framework_args($args){

	//$args['dev_mode'] = false;

	return $args;

}//function
//add_filter('nhp-opts-args-twenty_eleven', 'change_framework_args');


/*
 * This is the meat of creating the optons page
 *
 * Override some of the default values, uncomment the args and change the values
 * - no $args are required, but there there to be over ridden if needed.
 *
 *
 */

function setup_framework_options(){
$args = array();

//Set it to dev mode to view the class settings/info in the form - default is false
$args['dev_mode'] = false;

//google api key MUST BE DEFINED IF YOU WANT TO USE GOOGLE WEBFONTS
//$args['google_api_key'] = '***';

//Remove the default stylesheet? make sure you enqueue another one all the page will look whack!
//$args['stylesheet_override'] = true;

//Add HTML before the form
$args['intro_text'] = __('<p>Use this section to control the Homepage and the Our Approach pages</p>', 'nhp-opts');

//Setup custom links in the footer for share icons
/*
$args['share_icons']['twitter'] = array(
										'link' => 'http://twitter.com/lee__mason',
										'title' => 'Folow me on Twitter',
										'img' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_322_twitter.png'
										);
$args['share_icons']['linked_in'] = array(
										'link' => 'http://uk.linkedin.com/pub/lee-mason/38/618/bab',
										'title' => 'Find me on LinkedIn',
										'img' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_337_linked_in.png'
										);
*/

//Choose to disable the import/export feature
$args['show_import_export'] = false;

//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
$args['opt_name'] = 'ist';

//Custom menu icon
//$args['menu_icon'] = '';

//Custom menu title for options page - default is "Options"
$args['menu_title'] = __('Customize', 'nhp-opts');

//Custom Page Title for options page - default is "Options"
$args['page_title'] = __('IST Customization Options', 'nhp-opts');

//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "nhp_theme_options"
$args['page_slug'] = 'customization_options';

//Custom page capability - default is set to "manage_options"
//$args['page_cap'] = 'manage_options';

//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
//$args['page_type'] = 'submenu';

//parent menu - default is set to "themes.php" (Appearance)
//the list of available parent menus is available here: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//$args['page_parent'] = 'themes.php';

//custom page location - default 100 - must be unique or will override other items
$args['page_position'] = 27;

//Custom page icon class (used to override the page icon next to heading)
//$args['page_icon'] = 'icon-themes';

//Want to disable the sections showing as a submenu in the admin? uncomment this line
//$args['allow_sub_menu'] = false;

//Disable Theme info tab
$args['show_theme_info'] = false;

//Set ANY custom page help tabs - displayed using the new help tab API, show in order of definition
/*
$args['help_tabs'][] = array(
							'id' => 'nhp-opts-1',
							'title' => __('Homepage', 'nhp-opts'),
							'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'nhp-opts')
							);
$args['help_tabs'][] = array(
							'id' => 'nhp-opts-2',
							'title' => __('Our Approach', 'nhp-opts'),
							'content' => __('<p>This is the tab contens, HTML is allowed.</p>', 'nhp-opts')
							);

*/
//Set the Help Sidebar for the options page - no sidebar by default
//$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'nhp-opts');


/*
$sections[] = array(
				'title' => __('Getting Started', 'nhp-opts'),
				'desc' => __('<p class="description">This is the description field for the Section. HTML is allowed</p>', 'nhp-opts'),
				//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
				//You dont have to though, leave it blank for default.
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_062_attach.png'
				//Lets leave this as a blank section, no options just some intro text set above.
				//'fields' => array()
				);
*/


$sections = array();




$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_023_cogwheels.png',
				'title' => __('Our Approach', 'nhp-opts'),
				'desc' => __('<p class="description">Use this page to control the various aspects of the "Our Approach" Page</p>', 'nhp-opts'),
				'fields' => array(
					array(
						'id' => 'approach-top-section',
						'type' => 'info',
						'desc' => __('<h3>Introduction</h3>', 'nhp-opts')
						),
 					array(
						'id' => 'approach_top',
						'type' => 'textarea',
						'title' => __('Top Text', 'nhp-opts'),
						'sub_desc' => __('This is the Top Intro Text. Keep it short - maybe 3-4 sentences', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'approach-strategy-section',
						'type' => 'info',
						'desc' => __('<h3>Strategy</h3>', 'nhp-opts')
						),
					array(
						'id' => 'approach-strategy-sub',
						'type' => 'text',
						'title' => __('Strategy Subtitle', 'nhp-opts'),
						'sub_desc' => __('This is the orange text underneath the section title', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'std' => 'We listen. We do our homework. We think from the end.'
						),
					array(
						'id' => 'approach-strategy-editor',
						'type' => 'editor',
						'title' => __('Strategy Text', 'nhp-opts'),
						'sub_desc' => __('Main text area for the Strategy section', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						'std' => ''
						),
					array(
						'id' => 'approach-engineering-section',
						'type' => 'info',
						'desc' => __('<h3>Engineering &amp; Design</h3>', 'nhp-opts')
						),
					array(
						'id' => 'approach-engineering-sub',
						'type' => 'text',
						'title' => __('Engineering &amp Design Subtitle', 'nhp-opts'),
						'sub_desc' => __('This is the orange text underneath the section title', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'std' => 'Solutions that are created to live well within the environments they are intended to secure.'
						),
					array(
						'id' => 'approach-engineering-editor',
						'type' => 'editor',
						'title' => __('Engineering &amp; Design Text', 'nhp-opts'),
						'sub_desc' => __('Main text area for the Engineering &amp; Design section', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						'std' => ''
						),
					array(
						'id' => 'approach-implementation-section',
						'type' => 'info',
						'desc' => __('<h3>Implementation</h3>', 'nhp-opts')
						),
					array(
						'id' => 'approach-implementation-sub',
						'type' => 'text',
						'title' => __('Implementation Subtitle', 'nhp-opts'),
						'sub_desc' => __('This is the orange text underneath the section title', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'std' => 'Our disciplined approach ensures the quality of your investment'
						),
					array(
						'id' => 'approach-implementation-editor',
						'type' => 'editor',
						'title' => __('Implementation Text', 'nhp-opts'),
						'sub_desc' => __('Main text area for the Implementation section', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						'std' => ''
						),
					array(
						'id' => 'approach-support-section',
						'type' => 'info',
						'desc' => __('<h3>Lifecycle Support</h3>', 'nhp-opts')
						),
					array(
						'id' => 'approach-support-sub',
						'type' => 'text',
						'title' => __('Lifecycle Support Subtitle', 'nhp-opts'),
						'sub_desc' => __('This is the orange text underneath the section title', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'std' => 'Securing your investment well into the future'
						),
					array(
						'id' => 'approach-support-editor',
						'type' => 'editor',
						'title' => __('Lifecycle Support Text', 'nhp-opts'),
						'sub_desc' => __('Main text area for the Lifecycle Support section', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						'std' => ''
						)
					)
				);

$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_020_home.png',
				'title' => __('Homepage', 'nhp-opts'),
				'desc' => __('<p class="description">Use this page to control the various aspects of the Homepage</p>', 'nhp-opts'),
				'fields' => array(
					array(
						'id' => 'home-top-section',
						'type' => 'info',
						'desc' => __('<h3>Boilerplate Section</h3>', 'nhp-opts')
						),
					array(
						'id' => 'home-top-title',
						'type' => 'text',
						'title' => __('Boilerplate Title', 'nhp-opts'),
						'sub_desc' => __('This is the Boilerplate Title', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'home-top-subtitle',
						'type' => 'text',
						'title' => __('Boilerplate Subtitle', 'nhp-opts'),
						'sub_desc' => __('This is the Boilerplate Subtitle', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
 					array(
						'id' => 'home-top-text',
						'type' => 'textarea',
						'title' => __('Boilerplate Text', 'nhp-opts'),
						'sub_desc' => __('This is the Boilerplate Text.', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'home-callout-section',
						'type' => 'info',
						'desc' => __('<h3>Callouts Section</h3>', 'nhp-opts')
						),
					array(
						'id' => 'home-callout-title-1',
						'type' => 'text',
						'title' => __('Callout Title One', 'nhp-opts'),
						'sub_desc' => __('Title for the first callout (orange text in the box).', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'home-callout-subtitle-1',
						'type' => 'text',
						'title' => __('Callout Subtitle One', 'nhp-opts'),
						'sub_desc' => __('Blue text in the box', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
 					array(
						'id' => 'home-callout-text-1',
						'type' => 'text',
						'title' => __('Callout Smaller Text One', 'nhp-opts'),
						'sub_desc' => __('Small black text in the box.', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'home-callout-link-1',
						'type' => 'text',
						'title' => __('Callout Link One', 'nhp-opts'),
						'sub_desc' => __('URL for the first callout.', 'nhp-opts'),
						'desc' => __('Optional - if no value here it will not link.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'home-callout-icon-1',
						'type' => 'editor',
						'title' => __('Callout Icon One', 'nhp-opts'),
						'sub_desc' => __('Image for the first callout.', 'nhp-opts'),
						'desc' => __('Image should not exceed 50px wide.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'home-callout-title-2',
						'type' => 'text',
						'title' => __('Callout Title Two', 'nhp-opts'),
						'sub_desc' => __('Title for the first callout (orange text in the box).', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'home-callout-subtitle-2',
						'type' => 'text',
						'title' => __('Callout Subtitle Two', 'nhp-opts'),
						'sub_desc' => __('Blue text in the box', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
 					array(
						'id' => 'home-callout-text-2',
						'type' => 'text',
						'title' => __('Callout Smaller Text Two', 'nhp-opts'),
						'sub_desc' => __('Small black text in the box.', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'home-callout-link-2',
						'type' => 'text',
						'title' => __('Callout Link Two', 'nhp-opts'),
						'sub_desc' => __('URL for the second callout.', 'nhp-opts'),
						'desc' => __('Optional - if no value here it will not link.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'home-callout-icon-2',
						'type' => 'editor',
						'title' => __('Callout Icon Two', 'nhp-opts'),
						'sub_desc' => __('Image for the second callout.', 'nhp-opts'),
						'desc' => __('Image should not exceed 50px wide.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'home-callout-title-3',
						'type' => 'text',
						'title' => __('Callout Title Three', 'nhp-opts'),
						'sub_desc' => __('Title for the first callout (orange text in the box).', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'home-callout-subtitle-3',
						'type' => 'text',
						'title' => __('Callout Subtitle Three', 'nhp-opts'),
						'sub_desc' => __('Blue text in the box', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
 					array(
						'id' => 'home-callout-text-3',
						'type' => 'text',
						'title' => __('Callout Smaller Text Three', 'nhp-opts'),
						'sub_desc' => __('Small black text in the box.', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'home-callout-link-3',
						'type' => 'text',
						'title' => __('Callout Link Three', 'nhp-opts'),
						'sub_desc' => __('URL for the third callout.', 'nhp-opts'),
						'desc' => __('Optional - if no value here it will not link.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'home-callout-icon-3',
						'type' => 'editor',
						'title' => __('Callout Icon Three', 'nhp-opts'),
						'sub_desc' => __('Image for the third callout.', 'nhp-opts'),
						'desc' => __('Image should not exceed 50px wide.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'home-fl-section',
						'type' => 'info',
						'desc' => __('<h3>Full Lifecycle Section</h3>', 'nhp-opts')
						),
					array(
						'id' => 'home-fl-title',
						'type' => 'text',
						'title' => __('Full Lifecycle Subtitle', 'nhp-opts'),
						'sub_desc' => __('Orange text in the box', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
 					array(
						'id' => 'home-fl-text',
						'type' => 'text',
						'title' => __('Full Lifecycle Section Text', 'nhp-opts'),
						'sub_desc' => __('This is the Full Lifecycle Text. Try to keep it to one sentence', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'home-fl-link',
						'type' => 'text',
						'title' => __('Full Lifecycle Link', 'nhp-opts'),
						'sub_desc' => __('URL for the Full Lifecycle Section.', 'nhp-opts'),
						'desc' => __('Optional - if no value here it will not link.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'home-certs-section',
						'type' => 'info',
						'desc' => __('<h3>Certifications</h3>', 'nhp-opts')
						),
					array(
						'id' => 'home-certs-title',
						'type' => 'text',
						'title' => __('Certifications Subtitle', 'nhp-opts'),
						'sub_desc' => __('Orange text in the box', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
 					array(
						'id' => 'home-certs-text',
						'type' => 'text',
						'title' => __('Certifications Section Text', 'nhp-opts'),
						'sub_desc' => __('This is the Certifications Text. Try to keep it to one sentence', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'home-certs-link',
						'type' => 'text',
						'title' => __('Certifications Link', 'nhp-opts'),
						'sub_desc' => __('URL for the Certifications Section.', 'nhp-opts'),
						'desc' => __('Optional - if no value here it will not link.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					/*array(
						'id' => 'home-news-section',
						'type' => 'info',
						'desc' => __('<h3>News Section</h3>', 'nhp-opts')
						),
					array(
						'id' => 'home-news-one-title',
						'type' => 'text',
						'title' => __('News Title One', 'nhp-opts'),
						'sub_desc' => __('Title for the first news item', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'home-news-one-link',
						'type' => 'text',
						'title' => __('News Link One', 'nhp-opts'),
						'sub_desc' => __('URL for the first news item', 'nhp-opts'),
						'desc' => __('Optional - if no value here it will not link.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
 					array(
						'id' => 'home-news-one-text',
						'type' => 'textarea',
						'title' => __('News Text One', 'nhp-opts'),
						'sub_desc' => __('Text for the first news item', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'home-news-two-title',
						'type' => 'text',
						'title' => __('News Title Two', 'nhp-opts'),
						'sub_desc' => __('Title for the second news item', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'home-news-two-link',
						'type' => 'text',
						'title' => __('News Link Two', 'nhp-opts'),
						'sub_desc' => __('URL for the second news item', 'nhp-opts'),
						'desc' => __('Optional - if no value here it will not link.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
 					array(
						'id' => 'home-news-two-text',
						'type' => 'textarea',
						'title' => __('News Text Two', 'nhp-opts'),
						'sub_desc' => __('Text for the second news item', 'nhp-opts'),
						//'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						//'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						)	*/
					)
				);



	$tabs = array();

	global $NHP_Options;
	$NHP_Options = new NHP_Options($sections, $args, $tabs);

}//function
add_action('init', 'setup_framework_options', 0);

/*
 *
 * Custom function for the callback referenced above
 *
 */
function my_custom_field($field, $value){
	print_r($field);
	print_r($value);

}//function

/*
 *
 * Custom function for the callback validation referenced above
 *
 */
function validate_callback_function($field, $value, $existing_value){

	$error = false;
	$value =  'just testing';
	/*
	do your validation

	if(something){
		$value = $value;
	}elseif(somthing else){
		$error = true;
		$value = $existing_value;
		$field['msg'] = 'your custom error message';
	}
	*/

	$return['value'] = $value;
	if($error == true){
		$return['error'] = $field;
	}
	return $return;

}//function
?>
