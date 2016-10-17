<?php
if (post_password_required())
    return;
?>
<div class="block comment-block">
    <?php
    $args = array(
        'fields' => apply_filters('comment_form_default_fields', array(
            'author' => '<div class="comment-info"><input class="text-block" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' placeholder="昵称 *" />',
            'email' => '<input class="text-block" id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' placeholder="邮箱 *" />',
            'url' => '<input class="text-block" id="url" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" placeholder="网址" /></div>',
        )),
        'label_submit' => '咻～',
        'comment_notes_after' => '',
        'comment_field' => '<div class="content-field"> <textarea class="text-block" id="comment-content" name="comment" cols="45" rows="8" aria-required="true" placeholder="|´・ω・)ノ还不快点说点什么呀poi~"></textarea><div class="OwO"></div></div>',
    );
    comment_form($args);
    ?>

    <?php if (have_comments()) : ?>
        <div id="comments">
            <?php // You can start editing here -- including this comment! ?>
            <?php if (have_comments()) : ?>
                <?php comments_popup_link('难道你就没觉得这里这么空看起来很不顺眼吗！', '活捉 % 条', '活捉 % 条', '活捉 % 条', '评论已关闭'); ?>
                <div class="commentshow">
                    <ol class="commentlist">
                        <?php wp_list_comments(array('callback' => 'amativeness_comment', 'style' => 'ol')); ?>
                    </ol><!-- .commentlist -->
                    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
                    <?php endif; // check for comment navigation ?>
                    <?php
                    /* If there are no comments and comments are closed, let's leave a note.
                     * But we only want the note on posts and pages that had comments in the first place.
                     */
                    if (!comments_open() && get_comments_number()) : ?>
                        <p class="nocomments"><?php _e('Comments are closed.', 'amativeness'); ?></p>
                    <?php endif; ?>
                    <ol class="page-navigator">
                        <div id="comments-nav" data-fuck="<?php echo $post->ID?>">
                            <?php paginate_comments_links('next_text=下一页&prev_text=上一页'); ?>
                        </div>
                    </ol>
                </div>
            <?php endif; // have_comments() ?>
        </div><!-- #comments .comments-area -->
    <?php endif; // have_comments() ?>
</div>