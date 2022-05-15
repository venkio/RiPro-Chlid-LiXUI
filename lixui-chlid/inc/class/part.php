<?php /*全站浏览器标题自切换开始*/
$site_llqbtzqh_lixui = _cao('site_llqbtzqh_lixui');
if (is_array($site_llqbtzqh_lixui)  && _cao('is_llqbtzqh_lixui') ) : ?>
<script>
var OriginTitile = document.title;//保存之前页面标题  
var titleTime;  
document.addEventListener('visibilitychange', function(){  
    if (document.hidden){  
        document.title = '<?php echo $site_llqbtzqh_lixui['lixui_llqbbt1_text']; ?> ' + OriginTitile;
        clearTimeout(titleTime);  
    }else{  
        document.title = '<?php echo $site_llqbtzqh_lixui['lixui_llqbbt2_text']; ?> ' + OriginTitile;  
        titleTime = setTimeout(function() {  
            document.title = OriginTitile;  
        }, 1000); //1秒后恢复原标题 (つェ⊂) I miss you (｡･ω･｡) Welcome back
    }  
});  
</script>
<?php /*全站浏览器标题自切换结束*/endif; ?>

<?php /*左下角摇摆蒲公英开始*/ if (_cao('is_zxjybptgy_lixui')) : ?>
<div class="dandelion">  
    <span class="smalldan"></span>  
    <span class="bigdan"></span>  
</div>  
<?php /*左下角摇摆蒲公英结束*/endif; ?>

<?php /*底部悬浮游客登录提示开始*/if ( !is_user_logged_in()) :?>
<?php
$lixui_youke_db = _cao('lixui_youke_db');
if (is_array($lixui_youke_db)  && _cao('home_lixui_youke') ) : ?>
<div class="lixui_slogin cl" style="bottom: 0px; opacity: 1;">
<div class="wp">
    	<div class="lixui_slogin_info"><?php echo $lixui_youke_db['lixui_youke_dm']; ?></div>
    	<?php if($lixui_youke_db['lixui_youke_zh']) : ?>
        <div class="lixui_slogin_btn"> 
            <a rel="nofollow" href="javascript:;" class="login-btn" title="普通登录"><i class="fa fa-user"></i> 账号登录</a>
        </div>
        <?php endif; ?>
        <?php if($lixui_youke_db['lixui_youke_qq']) : ?>
        <span class="lixui_slogin_line"></span>
        <div class="lixui_slogin_qq"><a target="_blank" href="<?php echo esc_url(home_url('/oauth/qq?rurl=')).curPageURL();?>" class="qqbutton" rel="nofollow"><i class="fa fa-qq"></i> QQ登录</a></div>
        <?php endif; ?>
        <?php if($lixui_youke_db['lixui_youke_wx']) : ?>
        <span class="lixui_slogin_line"></span>
        <div class="lixui_slogin_wechat"><a target="_blank" href="<?php echo esc_url(home_url('/oauth/mpweixin'));?>" class="wechatbutton" rel="nofollow"><i class="fa fa-wechat"></i> 微信登录</a></div>
        <?php endif; ?>
    	</div>
</div>
<?php endif; ?>
<?php /*底部悬浮游客登录提示结束*/endif; ?>

<?php /*全站侧边栏锚点美化设置开始*/
$site_cblmd_lixui = _cao('site_cblmd_lixui');
if (is_array($site_cblmd_lixui)  && _cao('is_cblmd_lixui') ) : ?>
<link rel="stylesheet" href="//at.alicdn.com/t/font_1444248_u240hsu9sns.css">
<div class="float-box">
    <?php if ($site_cblmd_lixui['lixui_cblmd-ball-button_switch']): ?>
  	<ul class="float-ul float-radius float-text dbsvip" style="box-shadow: 0px 0px 8px 8px rgba(255, 12, 0, 0.42);">
		<li>
			<a class="qq float-border float-text dbsvipa" href="<?php echo $site_cblmd_lixui['lixui_yq_link']; ?>" target="_Blank" >
				<i class="<?php echo $site_cblmd_lixui['lixui_yq_icon']; ?>" style="font-size: 18px;"></i><br><?php echo $site_cblmd_lixui['lixui_yqbt_text']; ?>				
				<div class="float-alert-box float-radius float-qq-box" style="display:none;">
					<h6 style="color: #ff402f;"><?php echo $site_cblmd_lixui['lixui_yqtcbt_text']; ?></h6>
					<p><?php echo $site_cblmd_lixui['lixui_qynr1_text']; ?><br><?php echo $site_cblmd_lixui['lixui_qynr2_text']; ?></p>
					<div class="float-qq-btn float-radius dbsvipd" onclick="window.open('<?php echo $site_cblmd_lixui['lixui_tcan_link']; ?>','_blank')"><?php echo $site_cblmd_lixui['lixui_tcan_text']; ?></div>
				</div>
			</a>
		</li>
	</ul>
	<?php endif; ?>
  	<ul class="float-ul float-radius float-text">
      <li>
      <?php if (_cao('is_qiandao','1')) : ?>
            <a class="click-qiandao zzhuti_qd_1" href="javascript:void(0);" etap="to_top" title="打卡签到">
                <?php if (_cao_user_is_qiandao()) {
                    echo '<i class="iconfont icon-Sign"></i><br>已签';
                }else{
                    echo '<i class="iconfont icon-Sign"></i><br>签到 ';
                }
                ?>
            </a>
            <?php endif; ?>
		</li>
	</ul>

	<ul class="float-ul float-radius float-text">
	<?php if (_cao('is_all_publish_posts','1')) : ?>
		<?php if ((current_user_can('contributor') || current_user_can( 'publish_posts' )) && _cao('is_wp_admin_write','1')) : ?>
		<li>
			<a class="float-text rollbar-item tap-pencil" href="<?php echo esc_url(home_url('/wp-admin/post-new.php'));?>" target="_Blank" title="登录账号/发布资源/投稿赚钱">
				<i class="fa fa-pencil-square-o"></i><br>发布
			</a>
		</li>
		<?php else : ?>
		<li>
			<a class="float-text rollbar-item tap-pencil" href="<?php echo esc_url(home_url('/user?action=write'));?>" target="_Blank" title="登录账号/发布资源/投稿赚钱">
				<i class="fa fa-pencil-square-o"></i><br><?php echo $site_cblmd_lixui['lixui_fb_text']; ?>
			</a>
		</li>
		<?php endif; ?><?php endif; ?>
	</ul>
	
	<ul class="float-ul float-radius float-text">
	    <?php if ($site_cblmd_lixui['lixui_cblmdqqkf_switch']): ?>
		<li>
			<a class="qq float-border float-text" href="https://wpa.qq.com/msgrd?v=3&uin=<?php echo $site_cblmd_lixui['lixui_qqkf_link']; ?>" target="_Blank">
				<i class="fa fa-qq"></i><br><?php echo $site_cblmd_lixui['lixui_qqkfbt_text']; ?>				
				<div class="float-alert-box float-radius float-qq-box" style="display:none;">
				    <?php if ($site_cblmd_lixui['lixui_cblmdkfsj_switch']): ?>
					<h6><?php echo $site_cblmd_lixui['lixui_kfsjbt_text']; ?></h6>
					<p><?php echo $site_cblmd_lixui['lixui_kfsj1_text']; ?><br><?php echo $site_cblmd_lixui['lixui_kfsj2_text']; ?></p>
					<?php endif; ?>
					<div class="float-qq-btn float-radius" href="https://wpa.qq.com/msgrd?v=3&uin=<?php echo $site_cblmd_lixui['lixui_qqkf_link']; ?>" target="_Blank">点击咨询客服</div>
				</div>
			</a>
		</li>
		<?php endif; ?>
		<?php if ($site_cblmd_lixui['lixui_cblmdwxkf_switch']): ?>
		<li>
			<a class="weixin float-border float-text" href="javascript:(0)">
				<i class="fa fa-weixin"></i><br/><?php echo $site_cblmd_lixui['lixui_wxkfbt_text']; ?>
				<div class="float-weixin-alert-box float-weixin-box" style="display:none;">
				    <h6><?php echo $site_cblmd_lixui['lixui_kfsjbt_text']; ?></h6>
					<p><?php echo $site_cblmd_lixui['lixui_kfsj1_text']; ?><br><?php echo $site_cblmd_lixui['lixui_kfsj2_text']; ?></p>
				    <img src="<?php echo $site_cblmd_lixui['lixui_wxqr_img']; ?>" width="200">微信扫码添加</div>
			</a>
		</li>
		<?php endif; ?>
		<?php if ($site_cblmd_lixui['lixui_cblmdzdy_switch']): ?>
		<li>
			<a class="fankui float-border float-text" href="<?php echo $site_cblmd_lixui['lixui_zdy_link']; ?>" target="_Blank">
				<i class="<?php echo $site_cblmd_lixui['lixui_zdy_icon']; ?>"></i><br><?php echo $site_cblmd_lixui['lixui_zdy_text']; ?>
			</a>
		</li>
		<?php endif; ?>
		<li>
	</ul>
	
	<ul class="float-ul float-radius float-text">
	    <?php if (_cao('is_lixui_blog_mode','1')) : $_bid = (is_cao_site_list_blog()) ? 1 : 0 ; ?>
		<li>
			<a class="float-border float-text tap-blog-style" href="javascript:void(0);" etap="tap-blog-style" data-id="<?php echo $_bid; ?>" title="网格/列表[模式切换]">
				<i class="fa fa-list-alt"></i><br>模式
			</a>
		</li>
		<?php endif; ?>
		<?php if (_cao('is_lixui_dark_mode')) : ?>
		<li>
			<a class="float-border float-text tap-dark " href="javascript:void(0);" etap="tap-dark" title="白天/黑夜[模式切换]">
				<i class="mdi mdi-brightness-4"></i><br>日夜
			</a>
		</li>
		<?php endif; ?>
		<?php if (_cao('is_lixui_screen_mode')) : ?>
		<li>
			<a class="float-border float-text" href="javascript:void(0);" etap="to_full" title="全屏/窗口[模式切换]">
				<i class="iconfont icon-quanping"></i><br>全屏
			</a>
		</li>
		<?php endif; ?>
	</ul>
  	<ul class="float-ul float-radius float-text">
		<li>
			<a class="float-border float-text" href="javascript:void(0);" etap="to_top" title="返回顶部">
				<i class="iconfont icon-top1"></i><br>
			</a>
		</li>
	</ul>
</div>
<?php /*全站侧边栏锚点美化设置结束*/ endif; ?>

<?php /*手机端快捷菜单开始*/ if (_cao('is_lixui_mobile_menu_block')) : ?>
<div id="foot-memu" class="aini_foot_nav">
  <ul>
    <xi> <a href="/" class="foothover"> <i class="nohover fa fa-home"></i>
      <p>首页</p>
      </a> </xi>
    <xi> <a class="click-qiandao" href="javascript:void(0);" etap="to_top" title="打卡签到"> <i class="nohover fa fa-calendar-check-o"></i>
      <p>签到</p>
      </a> </xi>
    <xi class="aini_zjbtn"> <a href="/svip" rel="nofollow" data-block="666" data-position="8" target="_blank"> <em class="bg_f b_ok"></em> <span class="bg_f"> <i class="foot_btn f_f iconjiahao fa fa-diamond"></i> </span> </a> </xi>
    <xi> <a href="javascript:void(0);" etap="to_top" title="返回顶部"> <i class="nohover fa fa-arrow-circle-up"></i>
      <p>顶部</p>
      </a> </xi>
    <xi> <a target="_blank" title="QQ咨询" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo _cao('site_kefu_qq');?>&site=qq&menu=yes"> <i class="nohover fa fa-comments-o"></i>
      <p>客服</p>
      </a> </xi>
  </ul>
</div>
<?php /*手机端快捷菜单结束*/endif; ?>

<?php /*底部动态翻滚波浪开始*/ if (_cao('is_dbdtfgbl_lixui')) : ?>
<div class="waveHorizontals mobile-hide">
  <div id="waveHorizontal1" class="waveHorizontal"></div>
  <div id="waveHorizontal2" class="waveHorizontal"></div>
  <div id="waveHorizontal3" class="waveHorizontal"></div>
</div>
<?php /*底部动态翻滚波浪结束*/endif; ?>