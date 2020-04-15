<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>
    <?php die('You can not access this page directly!'); ?>
<?php endif; ?>
 
<?php if(!empty($post->post_password)) : ?>
    <?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
        <p>This post is password protected. Enter the password to view comments.</p>
    <?php endif; ?>
<?php endif; ?>
 
<?php if($comments) : ?>
<h3 class="commenth3"><?php comments_number('No comments yet...','One Comment','% Comments');?></h3>
<ol class="commentlist">
<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
</ol>

<?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) : ?>
		<!-- if comments are open, but there are no comments -->
		<h3 class="commenth3">No comments yet...</h3>
	<?php else : // comments are closed ?>
		<!-- if comments are closed -->
		<h3 class="commenth3">Comments are closed.</h3>
	<?php endif; ?>
<?php endif; ?>
 
<?php if(comments_open()) : ?>
    <?php if(get_option('comment_registration') && !$user_ID) : ?>
        <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p><?php else : ?>
        <div><?php cancel_comment_reply_link(); ?></div>
        <div id="respond"><form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
            <?php if($user_ID) : ?>
                <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>
            <?php else : ?>
                <p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
                <label for="author"><small>Name <?php if($req) echo "(required)"; ?></small></label></p>
                <p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
                <label for="email"><small>Mail (will not be published) <?php if($req) echo "(required)"; ?></small></label></p>
                <p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
                <label for="url"><small>Website</small></label></p>
            <?php endif; ?>
            <p><textarea name="comment" id="comment" cols="60%" rows="10" tabindex="4"></textarea></p>
            <p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
            <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
            <?php do_action('comment_form', $post->ID); ?>
            <?php comment_id_fields(); ?>
        </form></div><!--#respond-->
    <?php endif; ?>
<?php else : ?>
    
<?php endif; ?>