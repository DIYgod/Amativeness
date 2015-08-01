<?php
/*
Template Name: 读者墙
*/
get_header(); ?>
	<div class="main">
		
			<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" class="block post">  
<?php

$query = "SELECT COUNT(comment_ID) AS cnt, comment_author, comment_author_url, comment_author_email FROM (SELECT * FROM {$wpdb->comments} LEFT OUTER JOIN {$wpdb->posts} ON ({$wpdb->posts}.ID={$wpdb->comments}.comment_post_ID) WHERE comment_date > date_sub( NOW(), INTERVAL 24 MONTH ) AND user_id='0' AND comment_author_email != '570047973@qq.com' AND post_password='' AND comment_approved='1' AND comment_type='') AS tempcmt GROUP BY comment_author_email ORDER BY cnt DESC LIMIT 1000";
//大家把管理员的邮箱改成你的,最后的这个数字是选取多少个头像，大家可以按照自己的主题进行修改,来适合主题宽度
$wall = $wpdb->get_results($query);
$maxNum = $wall[0]->cnt;
foreach ($wall as $comment) {
    $width = round(20/ ($maxNum / $comment->cnt), 2);
    //此处是对应的血条的宽度
    if ($comment->comment_author_url) {
        $url = $comment->comment_author_url;
    } else {
        $url = '#';
    }
    $avatar = get_avatar($comment->comment_author_email, ($size = '36'), ($default = get_bloginfo('template_directory') . '/images/ali6.jpg'));
    $tmp = ((((((((('<li><a target="_blank" href="' . $comment->comment_author_url) . '">') . $avatar) . '<em>') . $comment->comment_author) . '</em> <strong>+') . $comment->cnt) . '</strong></br>') . $comment->comment_author_url) . '</a></li>';
    $output .= $tmp;
}
$output = ('<ul class="readers-list">' . $output) . '</ul>';
echo $output;
?>
	</article><!-- #post -->

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

	</div><!-- main -->

<?php get_sidebar(); ?>
</div><!-- #main .wrapper -->
</div>
<?php get_footer(); ?>