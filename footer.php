<footer id="colophon" role="contentinfo">
	<div class="container">
		<SPAN id=span_dt_dt></SPAN>
		<SCRIPT language=javascript>
			function show_date_time(){
			window.setTimeout("show_date_time()", 1000);
			BirthDay=new Date("2/9/2014 11:30:00");//这个日期是可以修改的
			today=new Date();
			timeold=(today.getTime()-BirthDay.getTime());
			sectimeold=timeold/1000
			secondsold=Math.floor(sectimeold);
			msPerDay=24*60*60*1000
			e_daysold=timeold/msPerDay
			daysold=Math.floor(e_daysold);
			e_hrsold=(e_daysold-daysold)*24;
			hrsold=Math.floor(e_hrsold);
			e_minsold=(e_hrsold-hrsold)*60;
			minsold=Math.floor((e_hrsold-hrsold)*60);
			seconds=Math.floor((e_minsold-minsold)*60);
			span_dt_dt.innerHTML="博客已运行"+daysold+"天"+hrsold+"小时"+minsold+"分"+seconds+"秒";
			}
			show_date_time();
		</SCRIPT>
		<p>托管于<a href="https://www.linode.com/" target="_blank">Linode</a>. <a href="http://www.qiniu.com/" target="_blank">七牛 </a>提供文件云存储服务. <a href="http://www.google.com/analytics/" target="_blank">Google Analytics </a>提供网站统计服务. </p><a href="https://www.linode.com/" target="_blank">CloudXNS</a>提供DNS解析服务.
		<p>&copy; 2015 <a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>. 由 <a href="http://wordpress.org" target="_blank">Wordpress</a> 强力驱动. Theme By <a href="https://github.com/DIYgod/Amativeness" target="_blank">Amativeness</a>. <a href="http://www.anotherhome.net/sitemap.html" target="_blank">站点地图</a>. 去你妈的备案</p>
    	</div>
</footer><!-- #colophon -->
</div><!-- #page -->
<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
<?php wp_footer(); ?>

	<!--.积分特效-->
	<script>
	var weather=Array();
	weather.state=false;
	$(document).ready(function(){
	    $.ajax({
		dataType:"jsonp",
		success:function(data){
		    if(data.success!=1){return;}
		    weather.state=true;
		    weather.c=Array();
		    weather.c[0]=data.result[0].citynm+"今天气温:"+data.result[0].temp_low+"-"+data.result[0].temp_high+"°C";
		    weather.c[1]=data.result[0].citynm+"今天天气:"+data.result[0].weather;
		    weather.c[2]=data.result[1].citynm+"明天气温:"+data.result[1].temp_low+"-"+data.result[1].temp_high+"°C";
		    weather.c[3]=data.result[1].citynm+"明天天气:"+data.result[1].weather;
		},
		type:"GET",
		url:"http://fuckingweather.sinaapp.com/?callback=?"
	    });
	});
	</script>
	<script>
	jQuery(document).ready(function($) {
	$("html,body").click(function(e){
		if(weather.state) var n=weather.c[Math.round(Math.random()*3)];//随机数
		var $i=$("<b/>").text("+"+n);//添加到页面的元素
		var x=e.pageX,y=e.pageY;//鼠标点击的位置
		$i.css({
			"z-index":99999,
			"top":y-20,
			"left":x,
			"position":"absolute",
			"color":"#E94F06"
		});
		$("body").append($i);
		$i.animate(
			{"top":y-180,"opacity":0},
			2000,
			function(){$i.remove();}
		);
		e.stopPropagation();
	});
	});
	</script>
	<!--.end积分特效-->

	<!--.加载状态-->
	<script type="text/javascript">
		$(window).load(function() {
		$("#circle").fadeOut(500);
		$("#circle1").fadeOut(700);
		});
	</script>
	<!--.end加载状态-->

</body>
</html>
