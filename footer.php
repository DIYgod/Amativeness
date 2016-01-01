    <footer id="colophon" role="contentinfo">
        <div class="container">
            <span id=span_dt_dt></span>
            <p>
                托管于<a href="http://www.aliyun.com/" target="_blank"> 阿里云</a>.
                <a href="http://www.qiniu.com/" target="_blank">七牛</a> 提供文件云存储服务.
                <a href="http://www.google.com/analytics/" target="_blank">Google Analytics </a>提供网站统计服务.
                <a href="http://www.cloudxns.net/" target="_blank">CloudXNS </a>提供 DNS 解析服务.
            </p>
            <p>&copy; 2016 <a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>.
                由 <a href="http://wordpress.org" target="_blank">Wordpress</a> 强力驱动.
                Theme By <a href="https://github.com/DIYgod/Amativeness" target="_blank">Amativeness</a>.
                <a href="http://www.anotherhome.net/sitemap.html" target="_blank">站点地图</a>.
            </p>
            <p>Made with <i class="icon-heart-1 throb" style="color: #d43f57;"></i> by DIYgod. </p>
        </div>
    </footer>
    </div>
    <?php wp_footer(); ?>
    <script src="<?php echo get_template_directory_uri(); ?>/lib/headroom.js/dist/headroom.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/lib/notie/browser/notie.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/lib/aspace/ASpace.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/main.js"></script>
    <script>
        NProgress.set(1.0);
    </script>
</body>
</html>
