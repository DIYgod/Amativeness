<?php
/*
Template Name: 音乐心情
*/
get_header(); ?>
<script type="text/javascript" > 
var music =''; 
var musicBox =''; 
var musicPlay=''; 
var musicNext=''; 
var musicV=''; 
var musicProcess=''; 
var musicSlide=''; 
var musicSlideLeft=0; 
var musicCtime=''; 
var musicEtime=''; 
var musicVolume=''; 
var musicVolumeSlide=''; 
var mouseX=''; 
var mouseY=''; 
var mouseDown=false; 
var bdy=''; 
var backgroundImages=new Array(); 
var backgroundNumber=1; 
var songNumver=1; 
var playList=new Array(); 
var nextSong=''; 
var songs=new Array(); 
//**************************************// 
//INIT WEB 
//*************************************// 
function init(){ 
//**************************************// 
//Musci Box 
//*************************************// 
musicBox = document.getElementById("music-box"); 
musicPlay= document.getElementById('music-play'); 
musicNext= document.getElementById('music-next'); 
musicCtime=document.getElementById('music-ctime'); 
musicEtime=document.getElementById('music-etime'); 
musicSlide=document.getElementById('music-process-slide'); 
musicProcess=document.getElementById('music-process-p'); 
musicVolume=document.getElementById('music-volume-v'); 
musicVolumeSlide=document.getElementById('music-volume-slide'); 
musicSlide.style.marginLeft="0px"; 
musicProcess.style.width="400px"; 
bdy=document.getElementsByTagName('body'); 
bdy=bdy[0]; 
var screenH = window.screen.height; 
var screenW = document.body.clientWidth; 
//Background cache // 
backgroundNumber =Math.ceil(Math.random()*5); 
backgroundImages[0] =new Image(); 
backgroundImages[1]= new Image(); 
backgroundImages[0].src= "<?php echo get_template_directory_uri(); ?>/rain/"+backgroundNumber+".jpg"; 
backgroundImages[1].src= "<?php echo get_template_directory_uri(); ?>/rain/"+(backgroundNumber >= 5 ? 1:backgroundNumber+1)+".jpg"; 
bdy.style.background="url("+backgroundImages[0].src+") top"; 
//*****************// 
music = document.getElementsByTagName('audio'); 
music = music[0]; 
music.autobuffer=true; 
setInterval(mProcess,1000); 
musicProcess.addEventListener('mousedown',mSlideProcessDown); 
musicProcess.addEventListener('mousemove',mSlideProcessMove); 
musicProcess.addEventListener('mouseup',mSlideProcessUp); 
musicVolume.addEventListener('mousedown',mSlideVolumeDown); 
musicVolume.addEventListener('mousemove',mSlideVolumeMove); 
musicVolume.addEventListener('mouseup',mSlideVolumeUp); 
//*******************Music Box end******************// 
//********************************************************// 

} 
function mProcess(){ 
if(1) 
{ 
var ctime = music.currentTime; 
var time = Math.floor(ctime/60)+":"+(Math.floor(ctime-60*Math.floor(ctime/60))<5 ? "0"+Math.floor(ctime-60*Math.floor(ctime/60)) : Math.floor(ctime-60*Math.floor(ctime/60))); 
var time2 =music.duration-music.currentTime; 
var etime=Math.floor(time2 /60)+":"+(Math.floor(time2-60*Math.floor(time2/60))<5 ? "0"+Math.floor(time2-60*Math.floor(time2/60)) : Math.floor(time2-60*Math.floor(time2/60))); 
var ra = music.currentTime/music.duration; 

var mpw=musicProcess.style.width; 
mpw = mpw.substring(0,mpw.indexOf('px')); 
musicSlide.style.marginLeft = mpw *ra+"px"; 

musicCtime.innerHTML=time; 
musicEtime.innerHTML=etime; 
if(music.ended==true) 
{ 
mRandPlay(); 
} 
} 
} 
//**************************************************************// 
//Process 
//**************************************************************// 
function mSlideProcessDown(e){ 
mouseDown=true; 
mouseX = e.pageX; 
} 
function mSlideProcessMove(e){ 
if(mouseDown==true) 
{ 
var mLeft= (e.pageX-mouseX); 
var t2 = music.currentTime+music.duration*mLeft/musicProcess.style.width.substring(0,musicProcess.style.width.indexOf('px')); 
t2=t2>0 ? t2:0; 
mLeft=musicProcess.style.width.substring(0,musicProcess.style.width.indexOf('px'))*t2/music.duration; 
musicSlide.style.marginLeft= (mLeft>0&&mLeft<300 ? mLeft:0)+"px"; 

} 
} 
function mSlideProcessUp(e){ 
if(mouseDown==true) 
{ 
mouseDown=false; 

var mLeft= (e.pageX-mouseX); 
var t2 = music.currentTime+music.duration*mLeft/musicProcess.style.width.substring(0,musicProcess.style.width.indexOf('px')); 
mLeft=musicProcess.style.width.substring(0,musicProcess.style.width.indexOf('px'))*t2/music.duration; 
t2=t2>0 ? t2:0; 
musicSlide.style.marginLeft= (mLeft>0&&mLeft<300 ? mLeft:0)+"px"; 
mouseDown=false; 
mouseX=0; 

music.currentTime=t2; 


} 
mouseDown=false; 
} 
//**********************Process end****************************************// 
//**************************************************************// 
//Volume// 
//**************************************************************// 
function mVolume(){ 
music.volume=0.5; 
musicVolumeSlide.style.marginTop = 70 *(1-music.volume)+"px"; 
} 
var vT=0; 
var aT=0; 
function mSlideVolumeDown(e){ 
mouseDown=true; 
mouseY = e.pageY; 
if(musicVolume.style.height=='') 
musicVolume.style.height="100px"; 
vT = musicVolumeSlide.style.marginTop.substring(0,musicVolumeSlide.style.marginTop.indexOf('px')); 
aT= musicVolumeSlide.style.marginTop.substring(0,musicVolumeSlide.style.marginTop.indexOf('px'))/musicVolume.style.height.substring(0,musicVolume.style.height.indexOf('px')); 

} 
function mSlideVolumeMove(e){ 
if(mouseDown==true) 
{ 
var mTop= (e.pageY-mouseY); 
//document.getElementById('show-statu').innerHTML=aT*musicVolume.style.height.substring(0,musicVolume.style.height.indexOf('px'))+mTop; 
mTop=aT*musicVolume.style.height.substring(0,musicVolume.style.height.indexOf('px'))+mTop;
musicVolumeSlide.style.marginTop= (mTop>0&&mTop<100 ? mTop:0)+"px"; 

} 
} 
function mSlideVolumeUp(e){ 
if(mouseDown==true) 
{ 
mouseDown=false; 
var mTop= (e.pageY-mouseY); 
mTop=aT*musicVolume.style.height.substring(0,musicVolume.style.height.indexOf('px'))+mTop;
musicVolumeSlide.style.marginTop= (mTop>0&&mTop<100 ? mTop:0)+"px"; 
mouseDown=false; 
mouseY=0; 
music.volume=1-mTop/100; 
} 
mouseDown=false; 
} 
//**********************Volume end****************************************// 
/* 
播放和暂停按钮 
*/ 
function mPlay(){ 
var time = Math.floor(music.duration/60)+"分"+Math.floor(music.duration-60*Math.floor(music.duration/60))+"秒"; 
switch(music.paused){ 
case true: 
{ 
music.play(); 
musicPlay.style.background="url(<?php echo get_template_directory_uri(); ?>/images/button.png) 0 -159px no-repeat"; 
break; 
}
case false: 
{ 
music.pause(); 
musicPlay.style.background="url(<?php echo get_template_directory_uri(); ?>/images/button.png) 0 -12px no-repeat"; 
break; 
} 
} 
} 
/* 
载入歌曲 
*/ 
var songNum=1; 
function loadSongs(){ 
playList={0:11, 
1:{'title':"听海",'author':'张学友','src':"http://m1.file.xiami.com/198/1198/6067/74195_39946_l.mp3"}, 
2:{'title':"爱我别走",'author':'张学友','src':"http://m1.file.xiami.com/198/1198/6067/74205_39956_l.mp3"}, 
3:{'title':"洋葱",'author':'平安','src':"http://m1.file.xiami.com/672/119672/548711/1771379694_3804438_l.mp3"}, 
4:{'title':"Call Me Maybe",'author':'Carly Rae Jepsen','src':"http://m1.file.xiami.com/547/55547/535256/1771283949_3691064_l.mp3"}, 
5:{'title':"valder fields",'author':'tamas wells','src':"http://m1.file.xiami.com/420/23420/168521/2080203_2854956_l.mp3"}, 
6:{'title':"不再联系",'author':'夏天Alex','src':"http://m1.file.xiami.com/505/86505/564874/1770944039_3212048_l.mp3"}, 
7:{'title':"What Are Words",'author':'chris medina','src':"http://m1.file.xiami.com/564/86564/428093/1770060224_2770556_l.mp3"}, 
8:{'title':"泪的告白",'author':'吉田亚纪子','src':"http://m1.file.xiami.com/860/6860/370846/1769398598_1392580_l.mp3"}, 
9:{'title':"Stay Here Forever",'author':'Jewel','src':"http://m1.file.xiami.com/738/13738/381768/1769529110_4083778_l.mp3"}, 
10:{'title':"泪满天",'author':'龙梅子','src':"http://m1.file.xiami.com/105/81105/779313782/1772187228_11078292_l.mp3"}, 
11:{'title':"我可以抱你吗",'author':'张惠妹','src':"http://m1.file.xiami.com/450/2450/13273/163414_2540952_l.mp3"}, 
}; 
//Songs cache and change// 
var listCount = playList[0]; 
var num =Math.ceil(Math.random()*10)%(listCount+1); 
songNum=num; 
if(songNum>listCount) 
songNum=1; 
num=songNum; 
songs[0]=playList[num>0? num :num+1]; 
num=((songNum+1) > listCount ? 1 : (songNum+1)); 
songs[1]=playList[num>0? num :num+1]; 
music.src=songs[0]['src']; 
nextSong = new Audio(); 
nextSong.src=songs[1]['src']; 
nextSong.load(); 
//**************************// 
document.getElementById('song-title').innerHTML=songs[0]['title']; 
document.getElementById('song-author').innerHTML=songs[0]['author']; 
setTimeout(canPlay,2000); 
setTimeout(canRand,30000); 
} 
/* 
随机播放列表的歌曲 
*/ 
function mRandPlay() 
{ 
//Backgorund cache and change// 
backgroundNumber =Math.ceil(Math.random()*10); 
bdy.style.background="url("+backgroundImages[1].src+") top"; 
backgroundImages[1].src= "./rain/"+(backgroundNumber >= 10 ? 1:backgroundNumber+1)+".jpg"; 
//***************// 
var listCount = playList[0]; 
//Songs cache and change// 
music.pause(); 
music=nextSong; 
document.getElementById('song-title').innerHTML=songs[1]['title']; 
document.getElementById('song-author').innerHTML=songs[1]['author']; 
var num =Math.ceil(Math.random()*10)%(listCount+1); 
songNum+=1; 
if(songNum>listCount) 
songNum=1; 
num=songNum; 
songs[1]=playList[num>0? num :num+1]; 
nextSong = new Audio(); 
nextSong.src=songs[1]['src']; 
nextSong.load(); 
//***************// 
//musicPlay.style.display='block'; 
musicNext.style.display='block'; 
setTimeout(canRand,30000); 
mPlay(); 
} 
function canPlay(){ 
musicPlay.setAttribute('onClick','javascript:mPlay()'); 
musicPlay.style.display='block'; 
} 
function canRand(){ 
musicNext.setAttribute('onClick','javascript:mRandPlay()'); 
musicNext.style.display='block'; 
} 
</script> 

<div class="music-main">
		
			<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" class="block post music-c">  
<div class="article-content red">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'amativeness' ) ); ?>
		</div>

		<div id='music-box'> 
<audio src="./storage/我们没有在一起.mp3" > 
您的浏览器暂不支持HTML5 请选择Google chrome或其他支持HTML5的浏览器 
</audio> 
<div id='music-process'> 
<h2 id='song-title'></h2> 
<h3 id='song-author'></h3> 

<div id='music-process-p'> 
<div id='music-ctime'>0:00</div> 
<span id='music-process-slide'> 
</span> 
<div id='music-etime'>0:00</div> 
<br class='clear' /> 
</div> 
</div> 

<div id='music-volume'> 
<div id='music-volume-v'> 
<span id='music-volume-slide'> 
</span> 
</div> 
<br class='clear' /> 
</div> 
<div id='music-play' ></div> 
<div id='music-next' ></div> 
<br class='clear' /> 
</div> 
	</article><!-- #post -->

			<?php endwhile; // end of the loop. ?>

	</div><!-- main -->	

<script type="text/javascript" > 
window.onload=init(); 
mVolume(); 
loadSongs(); 
</script> 
</div><!-- #main .wrapper -->
</div>
<?php get_footer(); ?>