<?php
/*
Template Name: 利熙-链接导航
* 后台管理添加链接集成导航
*/
?>
<?php get_header();?>
<section class="container">
<div class="row">
    <ul class="plinks">
		<?php
		wp_list_bookmarks(array(
		    //图像描述 'show_description' => true,
		    'show_name'        => true,
		    'orderby'          => 'rating',
		    'title_before'     => '<h2><i class="fa fa-bookmark-o" aria-hidden="true"></i> ',
		    'title_after'      => '</h2>',
		    'order'            => 'DESC'
		));
		?>
	</ul>
</div>
</section>
</div>
<style>
<?php /*链接导航排版*/?>
ol,ul {
	list-style: none;
}
ul.plinks {
	position: relative;
	margin-top: 0px;
	margin-bottom: 0px;
	width: 100%;
	padding: 0;
}
ul.plinks li.linkcat {
	padding: 20px 20px;
	background-color: #eaeaea;
	border-radius: 16px;
}
.ripro-dark ul.plinks li.linkcat {
	padding: 20px 20px;
	background-color: #181616;
	border-radius: 16px;
}
ul.plinks li.linkcat h2 {
	margin: 0;
	font-weight: 700;
	font-size: 18px;
}
ul.plinks li.linkcat ul {
	overflow: hidden;
	margin: 0;
	padding: 0;
	list-style: none;
}
ul.plinks li.linkcat ul li {
	float: left;
	overflow: hidden;
	margin-top: 15px;
	width: calc(20% - 20px);
	box-shadow: 0px 2px 0px rgba(170,170,170,0.1);
	background: #fff;
	margin-bottom: 10px;
	border-radius: 5px;
	margin-left: 10px;
	margin-right: 10px;
}
ul.plinks li.linkcat ul li:hover {
	opacity: 0.6;
	-webkit-transition: all .3s ease-in-out;
	-moz-transition: all .3s ease-in-out;
	transition: all .3s ease-in-out;
}
ul.plinks li.linkcat ul li a {
	overflow: hidden;
	margin-bottom: 20px;
	display: block;
	cursor: pointer;
	padding: 20px 18px 0;
	color: #333;
}
ul.plinks li.linkcat ul li a:hover {
	color: #005fee;
}
ul.plinks li.linkcat ul li a img {
	width: 32px;
	height: 32px;
	border-radius: 32px;
	display: inline-block;
}
@media (max-width: 768px) {
	ul.plinks li.linkcat ul li {
		width: calc(50% - 20px);
	}
}
@media (max-width: 544px) {
	ul.plinks li.linkcat ul li {
		width: 95%;
	}
}
.row {
	margin-left: 0;
	margin-right: 0;
}
</style>
<?php get_footer(); ?>