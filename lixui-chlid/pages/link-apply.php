<?php
/*
Template Name: 利熙-链接申请
* 申请的链接需在后台审核
*/
?>
<?php get_header();?>
<?php
if( isset($_POST['blink_form']) && $_POST['blink_form'] == 'send'){
global $wpdb;

// 表单变量初始化
$link_name = isset( $_POST['blink_name'] ) ? trim(htmlspecialchars($_POST['blink_name'], ENT_QUOTES)) : '';
$link_url = isset( $_POST['blink_url'] ) ? trim(htmlspecialchars($_POST['blink_url'], ENT_QUOTES)) : '';
$link_description = isset( $_POST['blink_lianxi'] ) ? trim(htmlspecialchars($_POST['blink_lianxi'], ENT_QUOTES)) : ''; // 联系方式
$link_target = "_blank";
$link_visible = "N"; // 表示链接默认不可见

// 表单项数据验证
if ( empty($link_name) || mb_strlen($link_name) > 20 ){
wp_die('连接名称必须填写，且长度不得超过30字');
}

if ( empty($link_url) || strlen($link_url) > 60 || !preg_match("/^(https?:\/\/)?(((www\.)?[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)?\.([a-zA-Z]+))|(([0-1]?[0-9]?[0-9]|2[0-5][0-5])\.([0-1]?[0-9]?[0-9]|2[0-5][0-5])\.([0-1]?[0-9]?[0-9]|2[0-5][0-5])\.([0-1]?[0-9]?[0-9]|2[0-5][0-5]))(\:\d{0,4})?)(\/[\w- .\/?%&=]*)?$/i", $link_url)) { //验证url
wp_die('链接地址必须填写');
}

$sql_link = $wpdb->insert(
$wpdb->links,
array(
'link_name' => '【待审核】--- '.$link_name,
'link_url' => $link_url,
'link_target' => $link_target,
'link_description' => $link_description,
'link_visible' => $link_visible
)
);

$result = $wpdb->get_results($sql_link);

wp_die('亲，友情链接提交成功，【等待站长审核中】！<p><a href="/links">点此返回</a>', '提交成功');

}

?>
<div id="main">
<div class="container">
<div class="card-header bg-transparent">
<h3 class="mb-0" style="text-align: center;">自助链接申请表单</h3>
</div>
<div class="srcdict-yqlj">
<div class="col-lg-6 col-12">
<!--表单开始-->
<form method="post" class="mt20" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">

<div class="form-group">
<label for="blink_name"><font color="red">*</font> 链接名称:</label>
<input type="text" size="40" value="" class="form-control" id="blink_name" placeholder="请输入链接名称" name="blink_name" />
</div>

<div class="form-group">
<label for="blink_url"><font color="red">*</font> 链接地址:</label>
<input type="text" size="40" value="" class="form-control" id="blink_url" placeholder="请输入链接地址" name="blink_url" />
</div>

<div class="form-group">
<label for="blink_lianxi">联系方式:</label>
<input type="text" size="40" value="" class="form-control" id="blink_lianxi" placeholder="QQ或微信或邮箱" name="blink_lianxi" />
</div>

<div>
<input type="hidden" value="send" name="blink_form" />
<button type="submit" class="btn btn-primary">提交申请</button>
<button type="reset" class="btn btn-default">重填</button>
（提示：带有<font color="red">*</font>的选项表示必填）
</div>
</form>
<!--表单结束-->
</div>

<div class="col-lg-6 col-12">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article class="col-md-10 mt20 col-md-offset-2 clearfix" style="margin-top: 20px;margin-bottom: 15px;padding: 1rem 1.5rem;">
<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>

<?php $site_linkapply_group_lixui = _cao('site_linkapply_group_lixui');
if (!empty($site_linkapply_group_lixui)) {
	foreach ($site_linkapply_group_lixui as $key => $item) {
		$_style = ($item['_style']) ? ' class="mt20" style="font-weight: bolder;"' : '' ;
		echo '<p '.$_style.'>'.$item['_text'].'</p>';
	} 
}?>
<p class="mt20"><strong>【本站信息】</strong></p>
<p>名称：<?php bloginfo('name'); ?></p>
<p>网址：<?php echo site_url(); ?></p>
</div>
</article>
<?php endwhile; else: ?>
<?php endif; ?>
</div>
</div>
</div>
<style>
<?php /*隐藏页面顶部banner标题*/?>
.term-bar {
    display: none;
}
<?php /*调整原顶底填充*/?>
.site-content {
    padding-top: 30px;
    padding-bottom: 40px;
}
<?php /*申请友链排版橙*/?>
@media screen and (max-width: 1000px) {
	.container .row .card {
		width: 100%;
	}
    .srcdict-yqlj {
        display: flex;
        flex-direction: column;
    }
}
.container .row .pricing-deco .deco-layer {
	-webkit-transition: -webkit-transform 0.5s;
	transition: transform 0.5s;
}
.container .row .pricing-deco:hover .deco-layer--1 {
	-webkit-transform: translate3d(15px,0,0);
	transform: translate3d(15px,0,0);
}
.container .row .pricing-deco:hover .deco-layer--2 {
	-webkit-transform: translate3d(-15px,0,0);
	transform: translate3d(-15px,0,0);
}
.srcdict-yqlj {
	/*margin-left: -10px;*/
	/*margin-right: -10px;*/
	display: flex;
	background: #fff;
	border: 1px solid rgba(0, 0, 0, 0.05);
	border-radius: 6px;
	box-shadow: 0 4px 12px 0 rgba(52, 73, 94, 0.1);
}
.clearfix {
	color: #fff;
	background: linear-gradient(-125deg,#FF9000 0%, #FF5000 100%);/*渐变背景*/
	margin-top: 1rem;
	padding: 1rem 1.5rem;
	border: 1px solid transparent;
	border-radius: .375rem;
	max-width: 100%;
}
.mt20 {
	margin-top: 20px;
	margin-bottom: 15px;
}
.card-header {
	padding: 1.25rem 1.5rem;
	font-size: 1.0625rem;
	background-color: #fff;
}
.card-header:first-child {
	border-radius: calc(.375rem - 1px) calc(.375rem - 1px) 0 0;
}
</style>
<?php get_footer(); ?>