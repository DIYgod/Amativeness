<?php get_header(); ?>
<section id="primary" class="site-content">
    <div class="main">
        <?php if (have_posts()) : ?>
    <header class="page-header block">
        <p class="ui ribbon label red"><?php printf(__('包含关键字 %s 的文章', 'amativeness'), '<span>' . get_search_query() . '</span>'); ?></p>
    </header>
    <?php /* Start the Loop */ ?>
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" class="block post" itemscope="" itemtype="http://schema.org/Article">
	<span class="round-date red">
				<span class="month"><?php the_time(n月) ?></span>
				<span class="day"><?php the_time(d) ?></span>
	</span>
            <?php if (is_sticky() && is_home() && !is_paged()) : ?>
                <div class="featured-post">
                    <?php _e('Featured post', 'amativeness'); ?>
                </div>
            <?php endif; ?>
            <header class="entry-header">
                <?php if (is_single()) : ?>
                    <p class="title" itemprop="name headline"><?php the_title(); ?></p>
                <?php else : ?>
                    <p class="title" itemprop="name headline">
                        <a href="<?php the_permalink(); ?>" rel="bookmark" itemprop="url"><?php the_title(); ?></a>
                    </p>
                    <p class="article-meta"><i class="fa fa-heart-o"></i>发表于 <time itemprop="datePublished" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php the_time('Y年n月j日') ?></time> • <i class="fa fa-eye"></i><?php if (function_exists('the_views')) { the_views(); } ?> • <i class="fa fa-comment-o"></i><?php comments_number('没有评论,快来呀!', '活捉 1 条', '活捉 % 条'); ?>
                    </p>
                <?php endif; // is_single() ?>
                <?php if (comments_open()) : ?>
                <?php endif; // comments_open() ?>
            </header>
            <!-- .entry-header -->
            <?php if (is_search()) : // Only display Excerpts for Search ?>
                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                </div><!-- .entry-summary -->
            <?php else : ?>
                <div class="article-content red" itemprop="articleBody">
                    <?php the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'amativeness')); ?>
                    <?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'amativeness'), 'after' => '</div>')); ?>
                </div><!-- .article-content -->
            <?php endif; ?>
        </article><!-- #post -->
    <?php endwhile; ?>
    <?php amativeness_content_nav('nav-above'); ?>
<?php else : ?>
    <article id="post-0" class="post block no-results not-found">
        <header class="entry-header">
            <p class="ui ribbon label red"><?php _e('没有发现诶', 'amativeness'); ?></p>
        </header>
        <div class="entry-content">
            <p><?php _e('抱歉，没有符合您搜索条件的结果。请换其它关键词再试。', 'amativeness'); ?></p>
            <?php get_search_form(); ?>
        </div>
        <!-- .entry-content -->
    </article><!-- #post-0 -->
<?php endif; ?>
    </div>
</section><!-- #primary -->
<?php get_sidebar(); ?>
</div><!-- #main .wrapper -->
</div>
<?php get_footer(); ?>