<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#595C5E">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes"">
    <title><?php wp_title('-', true, 'right'); ?></title>
    <link rel="canonical" href="https://www.anotherhome.net/">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <link rel="apple-touch-icon" href="https://diygod.b0.upaiyun.com/head4.jpg">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <link rel="search" type="application/opensearchdescription+xml" href="<?php bloginfo('template_url'); ?>/search.xml" title="Anotherhome">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lib/nprogress/nprogress.min.css">
    <link rel="stylesheet" href="https://staticfile.qnssl.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src='https://diygod.b0.upaiyun.com/jquery.min.js'></script>
    <script src="<?php echo get_template_directory_uri(); ?>/lib/nprogress/nprogress.min.js"></script>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-48084758-1', 'auto');
        ga('send', 'pageview');
    </script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <script>
        NProgress.configure({
            showSpinner: false,
            easing: 'ease-out',
            speed: 1000
        });
        NProgress.set(0.7);
    </script>
    <canvas id="evanyou"></canvas>
    <div id="back-to-top" class="red" data-scroll="body">
    </div>
    <div class="xm">
        <img src="https://diygod.b0.upaiyun.com/xm.png">
    </div>
    <div class="navbar">
        <?php if (is_user_logged_in()) : ?>
            <a href="<?php bloginfo('url'); ?>/wp-admin/" title="博客后台" class="houtai fa fa-user">后台</a>
        <?php endif; ?>
        <div class="container">
            <nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
                <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'nav-menu')); ?>
            </nav>
            <?php if (is_single()) : ?>
                <div class="edit-wz">
                    <?php edit_post_link("编辑文章"); ?>
                </div>
            <?php endif; ?>
            <?php if (is_page()) : ?>
                <div class="edit-wz">
                    <?php edit_post_link("<p class='fa fa-pencil'>编辑文章</p>"); ?>
                </div>
            <?php endif; ?>
            <div class="nav-right">
                <form class="search-form" method="post" action="<?php bloginfo('url'); ?>">
                    <input type="text" name="s" class="search-input" placeholder="站内搜索">
                    <button type="submit" class="search-submit sousuo">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <header class="header-description">
        <div id="site-header">
            <h1><a href="<?php echo esc_url(home_url('/')); ?>"
                   title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
                   rel="home"><?php bloginfo('name'); ?></a></h1>
            <p class="typed"><a href="https://www.anotherhome.net/" title="Anotherhome" rel="home"></a></p>
        </div>
    </header>
    <div id="information" class="info block">
        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php header_image(); ?>" class="avatar"
                                                             data-pinit="registered"
                                                             width="<?php echo get_custom_header()->width; ?>"
                                                             height="<?php echo get_custom_header()->height; ?>"
                                                             alt=""/></a>

        <h2 class="description"><a href="<?php echo esc_url(home_url('/')); ?>"
                                   title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><span
                    style="color: #3369e8;">Write</span> <span style="color: #d50f25;">the</span> <span
                    style="color: #eeb211;">Code.</span> <span style="color: #3369e8;">Change</span> <span
                    style="color: #009925;">the</span> <span style="color: #d50f25;">World.</span></a></h2>
    </div>
    <div class="container" id="content">
        <div class="article-list">
