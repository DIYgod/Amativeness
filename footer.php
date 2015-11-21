    <footer id="colophon" role="contentinfo">
        <div class="container">
            <span id=span_dt_dt></span>
            <p>托管于<a href="https://www.linode.com/" target="_blank"> Linode</a>. <a href="http://www.qiniu.com/"
                                                                                    target="_blank">七牛</a> <a href="https://www.upyun.com/"
                                                                                    target="_blank">UPYUN</a>提供文件云存储服务. <a
                    href="http://www.google.com/analytics/" target="_blank">Google Analytics </a>提供网站统计服务. <a
                    href="http://www.cloudxns.net/" target="_blank">CloudXNS </a>提供DNS解析服务.</p>

            <p>&copy; 2015 <a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>. 由 <a
                    href="http://wordpress.org" target="_blank">Wordpress</a> 强力驱动. Theme By <a
                    href="https://github.com/DIYgod/Amativeness" target="_blank">Amativeness</a>. <a
                    href="http://www.anotherhome.net/sitemap.html" target="_blank">站点地图</a>. 备案去死.</p>
            <p>Made with <i class="icon-heart-1 throb" style="color: #d43f57;"></i> by DIYgod. </p>
        </div>
    </footer>
    </div>
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
    <script src="<?php echo get_template_directory_uri(); ?>/js/parallax.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
    <?php wp_footer(); ?>
    <script>
        NProgress.set(1.0);
    </script>
</body>
</html>
