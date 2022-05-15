<?php
/*
Template Name: 利熙-会员介绍①
* 开通会员特权介绍
*/
?>
<?php get_header(); ?>

<?php $site_hyjs_page_lixui = _cao('site_hyjs_page_lixui'); ?>

<div class="vip-banner">
  <div class="vipbj">
    <h2><?php echo $site_hyjs_page_lixui['lixui_hyjsbt_text']; ?></h2>
    <p><?php echo $site_hyjs_page_lixui['lixui_hyjsjj_text']; ?></p>
    <a href="<?php echo $site_hyjs_page_lixui['lixui_hyjsan_link']; ?>" title="<?php echo $site_hyjs_page_lixui['lixui_hyjsan_text']; ?>" target="_blank"><?php echo $site_hyjs_page_lixui['lixui_hyjsan_text']; ?></a> </div>
</div>


<div class="module-line"> <span class="arrow left-arrow"></span> <span class="text"><?php  echo ''._cao('lixui_hyjstqbt_text').''; ?></span> <span class="arrow right-arrow"></span> </div>
<ul class="vip-slogan">
	<?php $site_hyjstq_group_page_lixui = _cao('site_hyjstq_group_page_lixui');
	if (!empty($site_hyjstq_group_page_lixui)) {
		foreach ($site_hyjstq_group_page_lixui as $key => $item) {
			echo '<li class="vip-slogan-box"><i class="'.$item['_icon'].'"></i>';
			echo '<div class="vip-slogan-text">';
			echo '<p>'.$item['_title'].'</p><p>'.$item['_text'].'</p>';
			echo '</div></li>';
		} 
	}?>
</ul>
<div class="container">
  <article class="single-content">
    <div class="module-line"> <span class="arrow left-arrow"></span> <span class="text"><?php  echo ''._cao('lixui_hyjszfbt_text').''; ?></span> <span class="arrow right-arrow"></span>
      <div class="vip-desc"><?php  echo ''._cao('lixui_hyjszfms_text').''; ?></div>
    </div>
    <div class="container">
      <div class="vip-row vip-block-wrapper" style="padding-bottom: 0; padding-top: 30px; margin-bottom: 0; "> 
		<?php $site_hyjsjs_group_page_lixui = _cao('site_hyjsjs_group_page_lixui');
		if (!empty($site_hyjsjs_group_page_lixui)) {
			foreach ($site_hyjsjs_group_page_lixui as $key => $item) {
				$_blank = ($item['_blank']) ? ' target="_blank"' : '' ;
				echo '<div class="vip-block-item"><div class="home-vipbox"><div class="icon">';
				echo '<img src="'.$item['_img'].'"> </div>';
				echo '<h3 class="content0-title">'.$item['_title'].'</h3>';
				echo '<p class="vip-home-price">'.$item['_pay'].'';
				echo '<i>'._cao('site_money_ua').'</i></p>';
				echo ''.$item['_des'].'';
				echo '<a href="'.$item['_link'].'" '.$_blank.'>';
				echo '<p class="vip-bt">'.$item['_btn'].'</p>';
				echo '</a></div></div>';
			} 
		}?>
      </div>
    </div>
  </article>
</div>
<div style="clear:both"></div>
<style>
<?php /*隐藏页面顶部banner标题*/?>
.term-bar {
    display: none;
}
<?php /*调整原顶底填充*/?>
.site-content {
    padding-bottom: 30px;
    padding-top: 0px; 
}
<?php /*开通会员介绍排版*/?>
.vip-banner .vipbj h2 {
	text-align: center;
	font-size: 40px;
	color: #fff;
}
.vip-banner .vipbj p {
	text-align: center;
	font-size: 18px;
	color: #fff;
}
.vip-banner {
	background: url(https://ae01.alicdn.com/kf/Hcc81845f721043bd9a56dea72d07c5719.jpg) no-repeat center;
	position: relative;
	width: 100%;
	height: 246px;
	position: relative;
}
.vip-banner-bg {
	background-position: center;
	background-size: cover;
	height: 100%;
}
.vip-banner .vipbj {
	position: absolute;
	width: 100%;
	top: 20%;
}
.vip-slogan {
	box-shadow: 0 2px 10px rgba(0,0,0,.02);
	border-radius: 5px;
	height: 280px;
	width: 1200px;
	background: #fff;
	box-sizing: border-box;
	font-size: 0;
	margin: 40px auto auto auto;
	padding-left: 0px;
}
.vip-slogan-box:nth-of-type(-n+3) {
	border-bottom: 0;
}
.vip-slogan-box {
	padding-top: 20px;
	display: inline-block;
	border: 1px solid #f4f4f4;
	height: 50%;
	width: 400px;
	box-sizing: border-box;
	vertical-align: middle;
}
.vip-slogan-box i {
	width: 100px;
	line-height: 100px;
	display: inline-block;
	background-image: linear-gradient(90deg, #ed1c24 0, #fb8f02 100%);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	font-size: 45px;
	text-align: center;
	vertical-align: middle;
}
.vip-slogan-text {
	font-size: 14px;
	display: inline-block;
	vertical-align: middle;
	color: #898989;
}
.vip-slogan-text p:first-child {
	font-size: 18px;
	color: #575959;
}
.container-vip {
	width: 1250px;
}
.vip-content {
	text-align: center;
	margin-bottom: 50px;
}
.module-line {
	width: 100%;
	text-align: center;
	margin-top: 40px;
}
.module-line .left-arrow {
	background: url(https://ae01.alicdn.com/kf/Hcf360fd39bfc4167a643db4fccd57bfa5.jpg);
}
.module-line .right-arrow {
	background: url(https://ae01.alicdn.com/kf/H7321b46668cc49d29021bc7c99e632a83.jpg);
}
.module-line .arrow {
	width: 84px;
	height: 16px;
}
.module-line .text {
	font-size: 26px;
	color: #4c4c4c;
	margin: 0 10px;
}
.module-line span {
	display: inline-block;
	*display: inline;
	*zoom: 1;
}
.vip-banner .vipbj>a {
	width: 170px;
	height: 40px;
	font-size: 16px;
	line-height: 40px;
	text-align: center;
	border-radius: 25px;
	background-image: linear-gradient(90deg, #ed1c24 0, #fb8f02 100%);
	color: #fff;
	margin: 0 auto;
	margin-top: 0;
	display: block;
	margin-top: 20px;
}
.vip-row {
	position: relative;
	display: block;
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
	margin-right: 0;
	margin-left: 0;
	width: 100%;
	height: auto;
	zoom: 1;
}
.vip-row:after,.vip-row:before {
	display: table;
	content: '';
}
.vip-block-wrapper {
	position: relative;
	display: flex;
	padding: 20px 0;
	height: 100%;
	justify-content: center;
}
.vip-block-wrapper .vip-block-item {
	display: block;
	box-sizing: border-box;
	padding: 20px 40px;
	width: 33.333%;
	text-align: center;
}
.home-vipbox {
	padding: 1px 0px 38px 0px;
	border-radius: 8px;
	background: #fff;
	-webkit-transition: all .3s ease-in-out;
	-moz-transition: all .3s ease-in-out;
	-ms-transition: all .3s ease-in-out;
	transition: all .3s ease-in-out;
}
.home-vipbox:hover {
	-webkit-transform: translateY(-3px);
	-moz-transform: translateY(-3px);
	-ms-transform: translateY(-3px);
	transform: translateY(-3px);
	box-shadow: 0 10px 20px rgba(213,213,213,0.4);
}
p.vip-bt {
	color: #fff;
	margin: 0 auto;
	width: 100px;
	padding: 8px 0;
	border-radius: 26px;
}
.vip-block-item a p {
	-webkit-transition: all .3s ease-in-out;
	-moz-transition: all .3s ease-in-out;
	-ms-transition: all .3s ease-in-out;
	transition: all .3s ease-in-out;
}
.vip-block-item:nth-child(n) a:hover p {
	box-shadow: 0 10px 20px rgba(245,47,62,.4);
	-webkit-transform: translateY(-3px);
	-moz-transform: translateY(-3px);
	-ms-transform: translateY(-3px);
	transform: translateY(-3px);
	background-color: #f52f3e;
	background-repeat: repeat-y;
	background-image: -moz-linear-gradient(left,#f52f3e,#ff4c22);
	background-image: -webkit-linear-gradient(left,#f52f3e,#ff4c22);
	background-image: -o-linear-gradient(left,#f52f3e,#ff4c22);
	background-image: linear-gradient(left,#f52f3e,#ff4c22);
}
.vip-block-item:nth-child(1) >.home-vipbox {
    /* outline:1px solid rgba(245,210,47,0.24); */
    /* outline-offset:-8px; */;
}
.vip-block-item:nth-child(1) h3 {
	color: #f5a02f;
	text-shadow: 0 5px 6px #ffe1b9;
}
.vip-block-item:nth-child(1) .vip-bt {
	background-image: -webkit-linear-gradient(left,#021b31,#001529);
}
.vip-block-item:nth-child(2) >.home-vipbox {
    /* outline:1px solid rgba(47,146,245,0.15); */
    /* outline-offset:-8px; */;
}
.vip-block-item:nth-child(2) h3 {
	color: #1890ff;
	text-shadow: 0 5px 6px rgba(24,144,255,0.40);
}
.vip-block-item:nth-child(2) .vip-bt {
	background-image: -webkit-linear-gradient(left,#1390de,#2f9af5);
}
.vip-block-item:nth-child(3) >.home-vipbox {
    /* outline:1px solid rgba(245,47,47,0.2); */
    /* outline-offset:-8px; */;
}
.vip-block-item:nth-child(3) h3 {
	color: #fd3d00;
	text-shadow: 0 5px 6px #ffb9b9;
}
.vip-block-item:nth-child(3) .vip-bt {
	background-image: -webkit-linear-gradient(left,#f1bc37,#fadb37);
}
p.vip-home-price {
	position: relative;
	font-size: 1.875rem;
	font-weight: bold;
	width: 200px;
	margin: 15px auto;
}
p.vip-home-price i {
	font-size: 16px;
}
@media (max-width: 768px) {
	.vip-block-wrapper {
		display: block;
	}
	.vip-block-wrapper .vip-block-item {
		float: left;
		width: 100%;
		padding: 10px 0;
	}
}
.vip-block-wrapper .vip-block-item .icon {
	width: 25%;
	height: 20%;
	padding-top: 20px;
	margin: 0 auto;
}
.vip-block-wrapper .vip-block-item img {
	width: 100%;
    /*height: 60px;*/;
}
.vip-block-wrapper .vip-block-item .content0-title {
	padding: 0;
	font-size: 1.875rem;
}
@media (max-width: 767px) {
	.module-line,.vip-slogan {
		display: none;
	}
}
</style>
<?php get_footer(); ?>