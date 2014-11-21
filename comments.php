<?php

if ( post_password_required() )
	return;
?>
	<?php if ( have_comments() ) : ?>
<div id="comments" class="block comment-block">
	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<p class="ui red ribbon label comments">
		<?php comments_popup_link('还不快抢沙发', '只有地板了', '%人抢在你前面了', '只有地板了', '评论已关闭'); ?>
		</p>

		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'amativeness_comment', 'style' => 'ol' ) ); ?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'amativeness' ); ?></p>
		<?php endif; ?>
<ol class="page-navigator"><div id="comments-nav">
 
<?php paginate_comments_links('next_text=上一页 >>&prev_text=<< 下一页');?>

</div></ol> 
	<?php endif; // have_comments() ?>


</div><!-- #comments .comments-area -->	<?php endif; // have_comments() ?>
<?php
	$args = array(
		'fields' => apply_filters('comment_form_default_fields', array(
		'author' => '<div class="two fields"><div class="field"><input id="author" name="author" type="text" value="" size="30"' . $aria_req . ' placeholder="称呼 (必填)" /></div>',
		'email'  => '<div class="field"><input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' placeholder="电子邮箱 (必填)" /></div></div>',
		'url'    => '<div class="field"><input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="个人主页" /></div>',
		)),
		'label_submit' => '提交评论 (Ctrl + Enter)',
		'comment_notes_after' => '',
		'comment_field' => '<div class="field"> <textarea id="comment-content" name="comment" cols="45" rows="8" aria-required="true" placeholder="回复内容 (必填)"></textarea></div>',
		);
	comment_form( $args ); 
	wp_smilies();
?>