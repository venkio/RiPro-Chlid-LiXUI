<?php /*新发滚动统计模块*/
$mode_census = _cao('mode_census');
$count_posts = wp_count_posts(); 
$users = $wpdb->get_var("SELECT COUNT(ID) FROM $wpdb->users"); 
ob_start(); ?>
<?php $site_xfgdwztj_lixui = _cao('site_xfgdwztj_lixui'); ?>
<div class="deanggwrap">
<div class="deangg comfff wow fadeInUp" style="background: <?php echo $site_xfgdwztj_lixui['lixui_bg_text']; ?>;">
<div class="deanggspan"><i style="margin-top: <?php echo $site_xfgdwztj_lixui['lixui_gd_text']; ?>px;" class="<?php echo $site_xfgdwztj_lixui['lixui_tb_icon']; ?>"></i><span style="color: #666;"><?php echo $site_xfgdwztj_lixui['lixui_bt_text']; ?></span></div>
<b></b>
<div class="deanggc">
<div class="announce-wrap">
<ul class="announce-list line" style="margin-top: 0px;">
<?php
	$post_num = 10; // 显示文章的数量.
	$args=array(
	'post_status' => 'publish',
	'paged' => $paged,
	'caller_get_posts' => 1,
	'posts_per_page' => $post_num
	);
	query_posts($args);
	// 主循环
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
<li><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a><span><?php echo the_time('Y-m-d')?></span></li>
<?php endwhile; else: endif; wp_reset_query();?>
</ul>
</div>
</div>
<div class="clear"></div>
</div>
<div class="deanchart">
<ul>
<div id="portal_block_396_content" class="dxb_bc">
<li class="deanchart1"><i><img src="<?php echo $site_xfgdwztj_lixui['lixui_1_img']; ?>"></i>
<div class="deanchartdiv"><span>会员总数<?php echo $sadasdasdasdas['home_title_ssssss'];?></span>
<div class="clear"></div>
<em id="num4"><?php $users = $wpdb->get_var("SELECT COUNT(ID) FROM $wpdb->users"); echo $users; ?></em></div>
<div class="clear"></div>
</li>
<li class="deanchart2"><i><img src="<?php echo $site_xfgdwztj_lixui['lixui_2_img']; ?>"></i>
<div class="deanchartdiv"><span>今日发布</span>
<div class="clear"></div>
<em id="num4"><?php echo WeeklyUpdate();?></em></div>
<div class="clear"></div>
</li>
<li class="deanchart3"><i><img src="<?php echo $site_xfgdwztj_lixui['lixui_3_img']; ?>"></i>
<div class="deanchartdiv"><span>本周发布</span>
<div class="clear"></div>
<em id="num6"><?php echo get_week_post_count(); ?></em></div>
<div class="clear"></div>
</li>
<li class="deanchart4"><i><img src="<?php echo $site_xfgdwztj_lixui['lixui_4_img']; ?>"></i>
<div class="deanchartdiv"><span>资源总数</span>
<div class="clear"></div>
<em id="num3"><?php echo $published_posts = $count_posts->publish;?></em></div>
<div class="clear"></div>
</li>
</div>
<div class="clear"></div>
</ul>
</div>
<div class="clear"></div>
</div>