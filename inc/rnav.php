<?php
$currentUrl = $_SERVER['REQUEST_URI'];
$ancestors = array_reverse(get_ancestors( $post->ID, 'page', 'post_type' ) );
$parent = isset($ancestors[0]) ? $ancestors[0] : $post->ID;
?>

<div id='rnav'>
	<div id='parent'>
		<?php
			wp_list_pages( array(
				'include' => $parent
				,'title_li' => ''
			));
		?>
	</div>

	<div id='siblings'>
		<?php
		wp_list_pages( array(
			'child_of' => $parent
			,'depth' => (strpos($currentUrl, '/contract-vehicles/') !== false) ? 2 : 1
			,'title_li' => ''
		));		
		?>
	</div>

	<?php if(have_rows('o_rnav_items','option')): ?>
	<div id='rnav_extras'>
		<?php
		while(have_rows('o_rnav_items','option')){
			the_row();

			$type = get_sub_field('type');
			if($type == 'link'){
				$content = get_sub_field('text');
			}
			else {
				$img = get_sub_field('image');
				$content = "<img src='{$img}'/>";
			}

			$link_attrs = array();
			if(get_sub_field('external_link')){
				$link = get_sub_field('elink');
				$link_attrs[] = "target='_blank'";
			}
			else
				$link = get_sub_field('ilink');
			if(!empty($link)){
				$link_attrs = implode(' ',$link_attrs);
				$content = "<a href='{$link}' {$link_attrs}>{$content}</a>";
			}

			$header = get_sub_field('header_text');
			if(!empty($header))
				$content = "<div class='rnav_hdr'>{$header}</div>{$content}";

			echo "<div>{$content}</div>";
		}
		?>
	</div>
	<?php endif; ?>
</div>
