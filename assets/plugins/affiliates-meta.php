<?php

/* ============================================== */
/* Meta Box for Affiliations Linking */
/* ============================================== */

function add_affiliate_link()
{
	add_meta_box("affiliate_link", "Link to Affiliate Website", "make_affiliate_link", "affiliate", "normal", "high");
}

function make_affiliate_link($post)  { 
	
	global $post;
	$affiliate_link = get_post_meta($post->ID, 'affiliate_link', true);
	wp_nonce_field( 'the_affiliate_link', 'meta_affiliate_link' );
	
?>
	<input type="text" class="widefat" name="affiliate_link" id="affiliate_link-field" value="<?php echo $affiliate_link; ?>" autocomplete="off" maxlength="185" />

<?php }

function save_affiliate_link_meta($post_id) {

	// Abort if doing an autosave
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_affiliate_link'] ) || !wp_verify_nonce( $_POST['meta_affiliate_link'], 'the_affiliate_link' ) ) return;

	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_pages' ) ) return;

	if( isset( $_POST['affiliate_link'] ))
	update_post_meta( $post_id, 'affiliate_link', $_POST['affiliate_link']);
	
}

add_action('save_post','save_affiliate_link_meta');
add_action('add_meta_boxes','add_affiliate_link');

?>