<footer id="colophon" role="contentinfo">
    <div class="container">
        <SPAN id=span_dt_dt></SPAN>
        <SCRIPT language=javascript>
            function show_date_time() {
                window.setTimeout("show_date_time()", 1000);
                BirthDay = new Date("2/9/2014 11:30:00");
                today = new Date();
                timeold = (today.getTime() - BirthDay.getTime());
                sectimeold = timeold / 1000
                secondsold = Math.floor(sectimeold);
                msPerDay = 24 * 60 * 60 * 1000
                e_daysold = timeold / msPerDay
                daysold = Math.floor(e_daysold);
                e_hrsold = (e_daysold - daysold) * 24;
                hrsold = Math.floor(e_hrsold);
                e_minsold = (e_hrsold - hrsold) * 60;
                minsold = Math.floor((e_hrsold - hrsold) * 60);
                seconds = Math.floor((e_minsold - minsold) * 60);
                span_dt_dt.innerHTML = "博客已萌萌哒运行" + daysold + "天" + hrsold + "小时" + minsold + "分" + seconds + "秒";
            }
            show_date_time();
        </SCRIPT>
        <p>托管于<a href="https://www.linode.com/" target="_blank"> Linode</a>. <a href="http://www.qiniu.com/"
                                                                                target="_blank">七牛</a> <a href="https://www.upyun.com/"
                                                                                target="_blank">UPYUN</a>提供文件云存储服务. <a
                href="http://www.google.com/analytics/" target="_blank">Google Analytics </a>提供网站统计服务. <a
                href="http://www.cloudxns.net/" target="_blank">CloudXNS </a>提供DNS解析服务.</p>

        <p>&copy; 2015 <a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>. 由 <a
                href="http://wordpress.org" target="_blank">Wordpress</a> 强力驱动. Theme By <a
                href="https://github.com/DIYgod/Amativeness" target="_blank">Amativeness</a>. <a
                href="http://www.anotherhome.net/sitemap.html" target="_blank">站点地图</a>. 备案去死.</p>
        <p>Made with <i class="icon-heart-1" style="color: #d43f57;"></i> by DIYgod. </p>
    </div>
</footer>
</div>
<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/particles.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/app.js"></script>
<?php wp_footer(); ?>
</body>
</html>
