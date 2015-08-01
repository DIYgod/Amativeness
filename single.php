<?php get_header(); ?>
<div class="main" id="thumbs">
    <?php while (have_posts()) : the_post(); ?>
    <div class="mbx-dh">
        <i class="icon-emo-grin"></i>汉赛尔的面包屑：<a
            href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> &raquo;
        <?php
        if (is_single()) {
            $categorys = get_the_category();
            $category = $categorys[0];
            echo(get_category_parents($category->term_id, true, ' &raquo; '));
            the_title();
        } elseif (is_page()) {
            the_title();
        } elseif (is_category()) {
            single_cat_title();
        } elseif (is_tag()) {
            single_tag_title();
        } elseif (is_day()) {
            the_time('Y年Fj日');
        } elseif (is_month()) {
            the_time('Y年F');
        } elseif (is_year()) {
            the_time('Y年');
        } elseif (is_search()) {
            echo $s . ' 的搜索结果';
        }
        ?>
    </div>
    <br>
    <br>
<?php get_template_part('content', get_post_format()); ?>
    <br>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- 自适应_评论上 -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-5433699470727157"
         data-ad-slot="7172070224"
         data-ad-format="auto"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <?php comments_template('', true); ?>
<?php endwhile; // end of the loop. ?>
</div><!-- main -->
<?php get_sidebar(); ?>
</div><!-- #main .wrapper -->
</div>
<?php get_footer(); ?>