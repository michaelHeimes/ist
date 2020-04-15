<?php get_header();

$search_refer = $_GET['type'];

if ($search_refer == 'blog') {
	load_template(TEMPLATEPATH . '/search-blog.php');
} else {
	load_template(TEMPLATEPATH . '/search-default.php');
}

get_footer(); ?>
