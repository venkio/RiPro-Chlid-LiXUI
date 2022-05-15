<?php if (!_get_post_shop_status() || _get_post_shop_hide()) { ?>
           <?php
	$sidebar = cao_sidebar();
	$column_classes = cao_column_classes( $sidebar );
		get_header();
?>
      <?php } else { ?>

<?php
	$sidebar = cao_sidebar();
	$column_classes = cao_column_classes( $sidebar );
        global $post;
        $post_id = $post->ID;
        $user_id = is_user_logged_in() ? wp_get_current_user()->ID : 0;
        // 判断是否资源文章 cao_status
        if (!_get_post_shop_status() || _get_post_shop_hide()) {
            return false;
        }
        // if (!$instance['is_absrate']) {
        //   echo '<div class="rateinfo-abs"></div>';
        // }
        // 内容区域
        $cao_price       = get_post_meta($post_id, 'cao_price', true);
        $cao_vip_rate    = get_post_meta($post_id, 'cao_vip_rate', true);
        $cao_downurl     = get_post_meta($post_id, 'cao_downurl', true);
        $cao_pwd         = get_post_meta($post_id, 'cao_pwd', true);
        $cao_demourl     = get_post_meta($post_id, 'cao_demourl', true);
        $cao_paynum      = get_post_meta($post_id, 'cao_paynum', true);
        $cao_info        = get_post_meta($post_id, 'cao_info', true);
        $cao_ver         = get_post_meta($post_id, 'cao_ver', true);
        $cao_is_boosvip  = get_post_meta($post_id, 'cao_is_boosvip', true);
        $cao_qqhao  = get_post_meta($post_id, 'ac_qqhao', true);
        
        $cao_close_novip_pay  = get_post_meta($post_id, 'cao_close_novip_pay', true);
       
        $site_vip_name=_cao('site_vip_name');
        $site_money_ua=_cao('site_money_ua');
          $site_no_vip_name=_cao('site_no_vip_name');
        // 优惠信息
        
        switch ($cao_vip_rate) {
            case 1:
                $rate_text = '暂无优惠';
                break;
            case 0:
                $rate_text = $site_vip_name . '免费';
                break;
            default:
                $rate_text = $site_vip_name . ' ' . ($cao_vip_rate * 10) . ' 折';
        }
        
        
        //VIP优惠腰椎间盘突出 如果有优惠显示折扣信息 style=" text-decoration: line-through; "
        $CaoUser = new CaoUser($user_id);
        $PostPay = new PostPay($user_id, $post_id);
        $cao_this_am   = $cao_price . $site_money_ua;
        $pric_style = '';
         $min_price = ($cao_price * $cao_vip_rate==0 || $cao_is_boosvip) ? 0 : $cao_price * $cao_vip_rate ;
	get_header();
?>
<?php } ?>

<?php /*覆盖app.css代码高度导致Banner标题顶部留空修复-利熙网*/ ;?>
<style>
.site-content, .single-post .site-content {
    padding-top: 0px;
    padding-bottom: 0px;
}
</style>
<?php /*内页Banner标题开始-利熙网*/$site_nrybannerbt_lixui = _cao('site_nrybannerbt_lixui');
if (is_array($site_nrybannerbt_lixui)  && _cao('is_nrybannerbt_lixui') ) : ?>

<?php
    global $post;
    $bg_img = (_cao('is_single_top_bg_one','0')) ? _cao('single_top_bg_one_img') : _get_post_thumbnail_url() ;
    $seo_title = get_the_title();
?>

<div class="article-top">
  <div class="single-top">
    <section class="article-focusbox bgimg-fixed lazyloaded" data-bg="<?php echo $site_nrybannerbt_lixui['lixui_bannerbg_img']; ?>" style="background-image: url(&quot;<?php echo $site_nrybannerbt_lixui['lixui_bannerbg_img']; ?>&quot;);">
    
    <?php if ($site_nrybannerbt_lixui['lixui_bannerbgwzt_switch']): ?>
    <div class="bg">
      <div class="bg-img lazyload visible" data-bg="<?php echo $bg_img;?>"> </div>
      <img class="seo-img" src="<?php echo $bg_img;?>" title="<?php echo $seo_title; ?>" alt="<?php echo $seo_title; ?>">
    </div>
    <?php endif; ?>
    <div class="container m-auto">
      <header class="article-header">
        <h1 class="article-title"><?php the_title(); ?></h1>
        <div class="article-meta">
            <?php if ($site_nrybannerbt_lixui['lixui_bannerfl_switch']): ?>
            <span class="meta entry-category"><?php echo _get_post_category();?></span>
            <?php endif; ?>
            
            <?php if ($site_nrybannerbt_lixui['lixui_bannerrq_switch']): ?>
            <span class="meta"><time datetime="<?php echo get_the_date( 'c' );?>"><i class="mdi mdi-camera-timer"></i> <?php echo get_the_date().' '.get_the_time(); ?></time></span>
            <?php endif; ?>
            <?php if ($site_nrybannerbt_lixui['lixui_bannerll_switch']): ?>
            <span class="meta"><i class="mdi mdi-eye"></i> <?php echo _get_post_views() ?></span>
            <?php endif; ?>
            <?php if ($site_nrybannerbt_lixui['lixui_bannerpl_switch']): ?>
            <span class="meta"><!-- <i class="mdi mdi-comment-processing-outline"></i> --> <?php echo _get_post_comments(); ?></span>
            <?php endif; ?>
            <?php if ($site_nrybannerbt_lixui['lixui_bannerzz_switch']): ?>
            <span class="meta"><a class="" href="<?php echo get_author_posts_url($post->post_author); ?>"><i class="mdi mdi-account-edit"></i> <?php echo get_the_author_meta( 'nickname', $post->post_author ); ?></a></span>
            <?php endif; ?>
            <?php if ($site_nrybannerbt_lixui['lixui_bannerbd_switch']): ?>
				<span class="item"><a target="_blank" title="百度搜索：<?php echo get_the_title(); ?> - <?php bloginfo('name'); ?>" rel="external nofollow" href="https://www.baidu.com/s?wd=<?php echo get_the_title(); ?> - <?php bloginfo('name'); ?>"><i class="fa fa-paw"></i></a></span>
				<?php endif; ?>
            <span class="meta"><?php edit_post_link('[编辑]'); ?></span>
        </div>
    </header>
    </div>
  </div>
 </section>
    <?php /*内页Banner标题波浪*/if ($site_nrybannerbt_lixui['lixui_bannerbl_switch']): ?>
    <div class="dabolang mobile-hide"> 
    		<div id="dabolangl1" class="dabolangl"></div> 
    		<div id="dabolangl2" class="dabolangl"></div> 
    		<div id="dabolangl3" class="dabolangl"></div>
    </div>
<?php endif; ?>
<?php /*内页Banner标题结束-利熙网*/endif; ?>
    
<div class="container">
	<div class="breadcrumbs">
	<?php echo dimox_breadcrumbs(); ?>
	</div>
		<?php if (!_get_post_shop_status() || _get_post_shop_hide()) { ?>
    
      <?php } else { ?>
      
   <link rel='stylesheet' id='dashicons-css'  href='<?php bloginfo('url'); ?>/wp-includes/css/dashicons.min.css?ver=5.1.1' type='text/css' media='all' />   

   <div class="theme-item-focus" id="info">


<div class="container">

        <div class="theme-item-sidebar">
            <div class="theme-item-image" >
                <span>
                    <img alt="<?php echo get_the_title(); ?>" class="themeimg" src="<?php echo esc_url(_get_post_timthumb_src()); ?>">
                         <?php if ($cao_demourl) { ?>

     <a class="btn btn-primary-outline theme-item-preview" target="_blank" href="<?php echo $cao_demourl; ?>"><i class="iconfont"></i> 查看演示</a>
            <?php }else{ ?>
          <span class="btn btn-primary-outline theme-item-preview" target="_blank" href="#"><i class="iconfont">&#xe608;</i> 暂无演示</span>
            <?php }; ?>
        
                   
                </span>
            </div>

            <span class="theme-demo-qrcode"><img src="<?php echo qrcode($url) ?><?php the_permalink(); ?>" alt="<?php the_title(); ?>"/><small>手机扫码浏览</small>
            </span>
            
        </div>

        <div class="theme-item-fcontent">

            
            <h1><?php echo get_the_title(); ?></h1>
        <?php if ($cao_price * $cao_vip_rate==0) {
                $vip_price_rate_str='免费'; 
                $vipicon='fa-circle-o';
            }else{
                $vip_price_rate_str='<dfn>¥</dfn> ' . ($cao_price * $cao_vip_rate) . ' <dfn>' . $site_money_ua . '</dfn>';
                $vipicon='fa-times-circle-o';
            } ; ?>

            <div class="theme-item-price">
            	<div class="yuan_price">
            			<?php if ($CaoUser->vip_status()) { ?>
                                	<h5><?php echo $site_vip_name; ?> :</h5>    
            			<?php } else { ?>
            				<h5>售价：</h5> 
            			<?php }; ?>   
                                    <?php if (is_site_shop_open()) : ?>
                                    
                         		
     <?php if ($CaoUser->vip_status()) {
                $cao_this_am   = ($cao_price * $cao_vip_rate) . $site_money_ua;
                $pric_style = 'style="text-decoration: line-through;"';
               
                echo '<b><strong>' . $vip_price_rate_str . '</strong></b>';
            	
            }else if ($cao_close_novip_pay && !$CaoUser->vip_status()){
  
          echo '<span class="boosvip-abs"><i class="fa fa-info-circle"></i> 暂无购买权限';
            }else{
               	if ($cao_price==0) {
   
            $cao_price_str = '<strong><font '.$pric_style.'><dfn>¥</dfn> 免费</font></strong>' ;
              echo $cao_price_str; 
            
                }else{
        
            $cao_price_str = ' <strong><font '.$pric_style.'><dfn>¥</dfn>' . $cao_price . '</font> <dfn>'. $site_money_ua . '</dfn></strong>' ;
              echo $cao_price_str; 
                 }
   
            }; ?>                 
                                    
    <?php endif; ?>
 
            	</div>
                                   
       <ul class="pricing-options">
       	 
       	  <?php if ($cao_close_novip_pay) { 
                echo '<li><i class="fa fa-times-circle-o"></i> 普通用户暂无购买权限  <a class="label label-warning pricing__opt" href="/user?action=vip" class="pay-vip">升级'.$site_vip_name.'</a></li>';
            }else{
                echo '<li><i class="fa fa-circle-o"></i> '.$site_no_vip_name.'用户购买价格 : <span class="pricing__opt">' . $cao_price .''. $site_money_ua. '</span></li>';
            } ?>
    
       <?php if ($min_price < $cao_price || $cao_close_novip_pay) {
                if ($CaoUser->vip_status()) {
                    echo '<li style="color: #21b3fc;"><i class="fa fa-check-circle"></i> '.$site_vip_name.'会员购买价格 : <span class="type_icont_2"><i class="fa fa-diamond"></i>' . ($cao_price * $cao_vip_rate) . $site_money_ua. '</span></li>';
                }else{
                    echo '<li><i class="fa fa-circle-o"></i> '.$site_vip_name.'会员购买价格 :<span class="pricing__opt type_icont_2"><i class="fa fa-diamond"></i>' . ($cao_price * $cao_vip_rate) . $site_money_ua. '</span></li>';
                }
            } ?>
    
    <?php if ($cao_is_boosvip) {
                if (is_boosvip_status($user_id)) {
                    echo '<li style="color: #FF9800;" ><i class="fa fa-check-circle"></i> 终身'.$site_vip_name.'购买价格 : <span class="pricing__opt type_icont_2">免费</span></li>';
                }else{
                    echo '<li ><i class="fa fa-circle-o"></i> 终身'.$site_vip_name.'购买价格 : <span class="pricing__opt type_icont_2 ">免费</span></li>';
                }
            } ?>
    
       	
       	</ul>
                    
                            </div>
            
            <div class="theme-item-orderarea">
  
      <?php   $create_nonce = wp_create_nonce('caopay-' . $post_id);
    
        
        $RiProPayAuth = new RiProPayAuth($user_id,$post_id);
         $cao_pwd_html = (empty($cao_pwd)) ? '' : '<span class="pwd"><span title="点击一键复制：访问密码" id="refurl" class="copypaw copypaw btn btn-demo" data-clipboard-text="'.$cao_pwd.'">'.$cao_pwd.'</span></span>' ;
        switch ($RiProPayAuth->ThePayAuthStatus()) {
          case 11: //免登陆  已经购买过 输出OK
            echo cao_get_post_downBtn($post_id); // 输出下载按钮
          echo $cao_pwd_html;
            break;
          case 12: //免登陆  登录后查看
           
              if (!_cao('is_ripro_free_no_login')) {
                echo '<a class="login-btn btn btn-primary"><i class="fa fa-user"></i> 登录后下载</a>';
            }else{
                echo cao_get_post_downBtn($post_id); // 输出下载按钮
                echo $cao_pwd_html;
            }
            break;
          case 13: //免登陆 输出购买按钮信息
            if ($cao_close_novip_pay && !$CaoUser->vip_status()) {
                echo '<button type="button" class="btn btn--primary disabled" >暂无购买权限</button>';
                echo '<a target="_blank" href="'.esc_url(home_url('/user?action=vip')).'" class="login-btn btn btn--danger btn--block mt-10">购买授权</a>';
            }else{
                echo '<button type="button" class="btn btn-primary down click-pay" data-postid="' . $post_id . '" data-nonce="' . $create_nonce . '" data-price="' . $cao_this_am . '">支付下载</button>';
            }
            break;
          case 21: //登陆后  已经购买过 输出OK
            echo cao_get_post_downBtn($post_id); // 输出下载按钮
            if ($cao_pwd) {
                echo '<span class="pwd"><span title="点击一键复制：访问密码" id="refurl" class="copypaw copypaw btn btn-demo" data-clipboard-text="'.$cao_pwd.'">'.$cao_pwd.'</span></span>';
            }
            break;
          case 22: //登陆后  输出购买按钮信息
            if ($cao_close_novip_pay && !$CaoUser->vip_status()) {
                echo '<button type="button" class="btn btn--primary disabled" >暂无购买权限</button>';
                  echo '<a target="_blank" href="'.esc_url(home_url('/user?action=vip')).'" class="btn btn--danger btn--block mt-10">购买授权</a>';
            }else{
                echo '<button type="button" class="click-pay login-btn btn btn-primary" data-postid="' . $post_id . '" data-nonce="' . $create_nonce . '" data-price="' . $cao_this_am . '">立即购买</button>';
            }
            break;
          case 31: //没有开启免登录 没有登录 输出登录后进行操作
            echo '<a class="login-btn btn btn-primary"><i class="fa fa-user"></i> 登录后购买</a>';
            break;
        }
 ; ?>
                
                <a onclick="_hmt.push(['_trackEvent', 'qq', 'click', 'qq'])" class="btn btn-default" target="_blank" title="QQ <?php echo _cao('site_kefu_qq') ;?>" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo _cao('site_kefu_qq') ;?>&site=qq&menu=yes"><i class="iconfont"></i> QQ咨询</a>
        <?php /*下载风格美化通用设置*/$site_fgxzysty_lixui = _cao('site_fgxzysty_lixui'); ?>
        <?php /*微信客服按钮*/if ($site_fgxzysty_lixui['lixui_fgxzyswx_switch']): ?>
        <li class="btn btn-default">
			<a data-v="" href="javascript:(0)" title="扫一扫加我微信" class="wechat" style="color: #666;">
			<div data-v="" class="qrCode">
			<img data-v="" src="<?php echo $site_fgxzysty_lixui['lixui_fgxzyswx_img']; ?>" width="110" onclick="window.open(&quot;<?php echo $site_fgxzysty_lixui['lixui_fgxzyswx_img']; ?>&quot;)">
			<div data-v="" class="triangle-down"></div>
			</div>
			<i class="<?php echo $site_fgxzysty_lixui['lixui_fgxzyswx_icon']; ?>" style="color: #666;"></i> <?php echo $site_fgxzysty_lixui['lixui_fgxzyswx_text']; ?></a>
		</li>
		<?php endif; ?>
            </div>
             
      <div class="theme-item-sv">
               
                <ul>
                    <li><i class="iconfont"></i><span>免费售前咨询</span></li>
                    <li><i class="iconfont"></i><span>免费安装指导</span></li>
                    <li><i class="iconfont"></i><span>付费安装资源</span></li>
                    <li><i class="iconfont"></i><span>付费赞助终身升级</span></li>
                    <li><i class="iconfont"></i><span>客服保障售后服务</span></li>
                    <li><i class="iconfont"></i><span>网站应急咨询顾问</span></li>
                </ul>
            </div>

        </div>

        <div class="theme-item-brand">
            <div class="theme-item-brand1"><a href="/user?action=vip">
                <i class="iconfont" aria-hidden="true"></i></a>
                <p>升级尊贵会员<br>享受全站VIP待遇</p>
                <?php $users = $wpdb->get_var("SELECT COUNT(ID) FROM $wpdb->users"); echo $users; ?>+ 
                <br>
                会员已经加入
            </div>
            <div class="theme-item-brand2">
                <a href="#">
                <img class="avatar" src="/logo.png<?php echo $site_oldfgxzys_lixui['is_duxfgxzys_img'];?>">
                <h4>暂无广告</h4>
                <p>暂无内容</p>
                </a>
            </div>
        </div>

    </div>
         

</div>


	<?php } ?>
	<div class="row">
		<div class="<?php echo esc_attr( $column_classes[0] ); ?>">
			<div class="content-area">
		
			
					<main class="site-main">
					<?php while ( have_posts() ) : the_post(); ?>
					<!--content-single内容-->
					
					<div id="post-<?php the_ID(); ?>" class="article-content">
	

  <?php get_template_part( 'parts/video-box' );?>
  <?php if (!_get_post_shop_status() || _get_post_shop_hide()) { ?>
    <?php get_template_part( 'parts/single-top' ); ?>
    <?php }else{ ?>
    
    <?php /*内页正文栏仿MAC风彩色圆点角标开始-利熙网*/ if (_cao('is_nryzwlcsyd_lixui')) : ?>
        <div class="lixui-title-bar">
            <i class="lixui-title-iconse lixui-float-rightse"></i>
        </div>
    <?php /*内页正文栏仿MAC风彩色圆点角标结束-利熙网*/ endif; ?>
    
    <div class="tabtst">
				<li>正文内容</li>
				<?php if ($cao_ver) { ;?>
				<li>更新记录</li>
				<?php } ;?>
				<li>评论建议</li>
			</div>
      <?php }  ?>
   
    	
  <div class="container">
    <div class="entry-wrapper">
    	
   
    	
      <?php  _the_cao_ads('ad_post_header', 'single-header'); ?>
      <article class="entry-content u-text-format u-clearfix">
        <?php the_content(); ?>
      </article>
      <div id="pay-single-box"></div>
      <?php
          wp_link_pages(array('before' => '<div class="fenye">分页阅读：', 'after' => '', 'next_or_number' => 'next', 'previouspagelink' => '上一页', 'nextpagelink' => "")); ?> <?php wp_link_pages(array('before' => '', 'after' => '', 'next_or_number' => 'number', 'link_before' =>'<span>', 'link_after'=>'</span>')); ?> <?php wp_link_pages(array('before' => '', 'after' => '</div>', 'next_or_number' => 'next', 'previouspagelink' => '', 'nextpagelink' => "下一页"));
        get_template_part( 'parts/entry-tags' );
        if( _cao('post_copyright_s') ){
          get_template_part( 'parts/entry-cop' );
        }
        do_action('ripro_echo_ads', 'ad_single_2'); 
        get_template_part( 'parts/author-box' );
      ?>
    </div>
    	<?php if ($cao_ver) { ;?>
    <div class="update">
    	<div class="list-news my-n2" id="news_daily_news-2_collapse">
    	<?php $i = 0; if ($cao_ver) { foreach ($cao_ver as $key => $value) {?>
    <div class="list-news-item active">
        <div class="list-news-dot"></div>
        <div class="list-news-body">
            <div class="list-news-content mt-2 pb-1">


                <div class="text-sm"><a href="#ver<?php echo $i; ?>" data-toggle="collapse" aria-expanded="false"
                        class="collapsed" aria-controls="news_link_308"><?php echo $value['title']; ?></a></div>
                <div class="text-xs text-muted my-1"><?php echo $value['time']; ?></div>
                <div class="list-news-desc text-xs text-secondary collapse" id="ver<?php echo $i; ?>"
                    data-parent="#news_daily_news-2_collapse"><?php echo $value['desc']; ?>
                 </div>

            </div>
        </div>
    </div>
 <?php $i++;} } ?>
</div>


    	
    	
    </div>
     <?php }  ?>
    <div class="coments"><?php 
if ( comments_open() || get_comments_number() ) :
  comments_template();
endif;
?></div>
  </div>
</div>

<?php get_template_part( 'parts/entry-navigation' );?>

<?php if (_cao('disable_related_posts','1') && _cao('related_posts_style','grid')!='fullgrid') {
  get_template_part( 'parts/related-posts' );
}?>	
					
					<!--content-single内容-->
				<?php endwhile; ?>
				</main>
			
			</div>
		</div>
		<?php if ( $sidebar != 'none' ) : ?>
			<div class="<?php echo esc_attr( $column_classes[1] ); ?>">
				<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php if (_cao('disable_related_posts','1') && _cao('related_posts_style','grid')=='fullgrid') {
	get_template_part( 'parts/related-posts' );
}?>
<?php if (!_get_post_shop_status() || _get_post_shop_hide()) { ?>
<?php 
if ( comments_open() || get_comments_number() ) :
  comments_template();
endif;
?>						
<?php } ?>	
<?php get_footer(); ?>