<?php
	$bOpenRow = false;
	while(have_rows('pbb_items')){
		the_row();
		$bNewRow = get_sub_field('bNewRow');
		$width = "pb_b_".get_sub_field('width');
		$content = do_shortcode(get_sub_field('content'));
		
		if($bNewRow){
			if($bOpenRow) echo "</div>";
			echo "<div class='pb_b_row'>";
			$bOpenRow = true;
		}
		
		echo "<div class='{$width}'>{$content}</div>";
	}
	//one last check to close
	if($bOpenRow) echo "</div>";
?>