<?php
/*
Template Name: 利熙-会员介绍②
* 开通会员特权介绍
*/
?>
<?php get_header(); ?>

<?php $site_hyjs2_page_lixui = _cao('site_hyjs2_page_lixui'); ?>
    <div id="vipheader">
      <h1><?php  echo ''._cao('lixui_hyjs2tqbt_text').''; ?></h1>
      <ul id="user_private">
		<?php $site_hyjs2tq_group_page_lixui = _cao('site_hyjs2tq_group_page_lixui');
		if (!empty($site_hyjs2tq_group_page_lixui)) {
			foreach ($site_hyjs2tq_group_page_lixui as $key => $item) {
				echo '<li>'.$item['_text'].'</li>';
			} 
		}?>
      </ul>
    </div>
    <div class="container clearfix" id="vipprice">
      <?php  echo ''._cao('lixui_hyjs2hyjs_text').''; ?>
      </div>
    </div>
<style>
<?php /*隐藏页面顶部banner标题*/?>
.term-bar {
    display: none;
}
<?php /*调整原顶底填充*/?>
.site-content {
    padding-bottom: 0px;
    padding-top: 0px; 
}
<?php /*开通会员介绍排版*/?>
/*@media (max-width: 767px) {*/
/*	#user_private {*/
/*		display: none;*/
/*	}*/
/*}*/
#vipheader {
	width:100%;
	height:420px;
	position:relative;
	background:#001423;
	text-align:center
}
#vipheader:after {
	content:"";
	background:url(wp-content/themes/lixui-chlid/pages/images/svip2_banner.png) center center no-repeat;
	background-size:cover;
	position:absolute;
	left:0;
	right:0;
	top:0;
	bottom:0;
	opacity:0.12
}
#vipheader h1 {
	font-size:48px;
	color:#F0CA8E;
	padding-top:100px;
	font-weight:bold;
	position:relative;
	z-index:10
}
#vipheader img {
	position:absolute;
	bottom:-3px;
	right:10%;
	display:none
}
#vipheader img#dpbg {
	left:-10%;
	bottom:-15%;
	opacity:0.02
}
#vipheader img#znbg {
	height:280px;
	width:auto
}
#user_private {
	position:relative;
	z-index:10;
	color:#b3a795;
	margin-top:35px;
	font-size:15px
}
#user_private li {
	display:inline-block;
	margin:0px 25px;
	background:url(wp-content/themes/lixui-chlid/pages/images/svip2_ricon.svg) left center no-repeat;
	background-size:16px 16px;
	padding-left:22px
}
#vipprice {
	margin-top:-140px;
	position:relative;
	text-align:center
}
#vipprice .vipcol {
	width:285px;
	display:inline-block;
	background:#fff;
	border-radius:10px;
	box-shadow:0px 1px 5px rgba(0,0,0,0.1);
	-webkit-box-shadow:0px 1px 5px rgba(0,0,0,0.1);
	margin:0px 15px;
	padding-bottom:35px;
	transition:all ease 0.3s;
	-webkit-transition:all ease 0.3s;
	margin-bottom:35px
}
#vipprice .vipcol:hover {
	box-shadow:10px 15px 15px rgba(0,0,0,0.1);
	-webkit-box-shadow:10px 15px 15px rgba(0,0,0,0.1);
	transform:translateY(-5px);
	-webkit-transform:translateY(-5px)
}
#vipprice button {
	font-size:18px;
	background:#fff;
	border-radius:4px;
	border:1px solid #aaa;
	padding:10px 40px;
	color:#333;
	cursor:pointer;
	transition:all ease 0.3s;
	-webkit-transition:all ease 0.3s
}
#vipprice button:hover {
	background:#42B14B;
	border-color:#42B14B;
	color:#fff
}
#vipprice ul {
	text-align:left;
	margin-left:60px;
	font-size:16px;
	line-height:40px;
	color:#4A4A4A;
	margin-bottom:25px;
	list-style:none;
	padding:0
}
#vipprice li {
	background:url(wp-content/themes/lixui-chlid/pages/images/svip2_dui.svg) left center no-repeat;
	padding-left:35px;
	list-style:none
}
#vipprice li.gray {
	opacity:0.4
}
#vipprice header {
	height:200px;
	background:#CECECE url(wp-content/themes/lixui-chlid/pages/images/svip2_pricebg.png) left top no-repeat;
	background-size:cover;
	position:relative;
	border-radius:10px 10px 0px 0px;
	overflow:hidden;
	margin-bottom:30px
}
#vipprice #golden header {
	background-color:#F0CA8E
}
#vipprice #purple header {
	background:#6C62A8 url(wp-content/themes/lixui-chlid/pages/images/svip2_pttrn.png) center 80px no-repeat
}
#vipprice #lightred header {
	background-color:#85ca92
}
#vipprice header .promotion {
	display:inline-block;
	position:absolute;
	left:0;
	top:0;
	border-radius:0px 0px 15px 0px;
	height:32px;
	line-height:32px;
	font-size:16px;
	color:#fff;
	padding:0px 18px;
	background:#EA8800
}
#vipprice header .promotion.red {
	background:#E54937
}
#vipprice header h4 {
	margin-top:50px;
	font-size:20px;
	color:#4A4A4A;
	font-weight:normal
}
#vipprice header img {
	display:inline;
	margin-right:6px;
	transform:translateY(-2px);
	-webkit-transform:translateY(-2px)
}
#vipprice header h2 {
	font-size:52px;
	color:#56492c;
	margin:13px 0px
}
#vipprice header h2 small {
	font-size:0.4em
}
#vipprice #normal header h2 {
	font-size:48px;
	margin:16px 0px;
	color:#3d4348
}
#vipprice #purple header h2,#vipprice #purple header h4,#vipprice #purple header h5 {
	color:#fbb867
}
#vipprice header h5 {
	font-size:14px;
	color:#4A4A4A;
	font-weight:normal
}
#vipprice header h5 em {
	color:#f00
}
#vipprice header h5 big {
	font-size:1.5em
}
.vipFeather-box {
	padding-bottom:35px;
	width:1245px;
	margin:0 auto
}
.vipFeather-box .feathers {
	float:left;
	width:750px;
	height:460px;
	margin-bottom:35px;
	background:#fff;
	border-radius:20px;
	overflow:hidden;
	text-align:center;
	position:relative
}
.vipFeather-box .feathers img {
	position:absolute;
	z-index:1;
	top:50%;
	left:50%;
	transform:translate(-50%,-50%);
	opacity:0;
	transition:all ease 0.8s
}
.vipFeather-box .feathers img.cur {
	opacity:1
}
.vipFeather-box .feather-list {
	float:right;
	width:430px;
	height:auto
}
#vipprice .vipFeather-box .feather-list li {
	height:90px;
	background:none;
	margin:0px;
	cursor:pointer
}
#vipprice .vipFeather-box .feather-list li.cur {
	background:url(wp-content/themes/lixui-chlid/pages/images/svip2_fbg.png) right center no-repeat
}
.vipFeather-box .feather-list h4 {
	font-size:20px;
	color:#000;
	margin:0px 0px 12px 0px;
	font-weight:bold;
	padding-top:20px
}
.vipFeather-box .feather-list li.cur h4 {
	color:#42B14B
}
.vipFeather-box .feather-list .intro {
	font-size:14px;
	color:#9EA4AD;
	line-height:1em
}
.vipFeather-box .feather-list li.cur .intro {
	color:#7D828A
}
.viptitle {
	text-align:center;
	margin:50px 0px 40px 0px;
	clear:both
}
.viptitle h3 {
	font-size:32px;
	margin-bottom:18px;
	font-weight:600
}
.viptitle .intro {
	font-size:16px;
	color:#777
}
</style>
<?php get_footer(); ?>