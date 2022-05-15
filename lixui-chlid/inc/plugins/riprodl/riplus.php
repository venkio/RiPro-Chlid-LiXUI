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
        $post_other_info = get_post_meta($post->ID, '_riplus_other_info', true); //其他信息
        $is_post_favtext = (is_get_post_fav(get_the_ID())) ? ' 已收藏' : ' 收藏'; 
        $cao_qqhao  = get_post_meta($post_id, 'ac_qqhao', true);
        $cao_close_novip_pay  = get_post_meta($post_id, 'cao_close_novip_pay', true);
        $site_vip_name=_cao('site_vip_name');
        $site_money_ua=_cao('site_money_ua');
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
<section class="article-box">
  <div class="content-box">
    <hgroup class="article-info">
      <div class="thumb">
        <div
          class="iop lazyloaded"
          data-bg="<?php echo esc_url(_get_post_timthumb_src()); ?>"
          alt="<?php echo get_the_title(); ?>"
          style='background-image: url("<?php echo esc_url(_get_post_timthumb_src()); ?>");'
        ></div>
  
      </div>
      <div class="meta single-top-pay">
        <div class="zy works-top">
          <h2><?php echo get_the_title(); ?></h2>
         <!--<div class="right">
				<div class="hot">
					<i class="wp wp-huo"></i>
					<span class="num"><?php echo _get_post_views() ;?><strong>。</strong></span>
				</div>
           </div> -->
        </div>
        <div class="des">
       <span class="buy">
            <?php if (is_site_shop_open()) : ?>
   <?php	if ($cao_price==0) {
            $cao_price_str = '<font '.$pric_style.'><i class="' . _cao('site_money_icon') . '"></i>免费</font>' ;
        }else{
            $cao_price_str = '<font '.$pric_style.'><i class="' . _cao('site_money_icon') . '"></i>' . $cao_price . '</font><c>'. $site_money_ua . '</c>' ;
        }; ?>
        <?php echo $cao_price_str; ?>
    <?php endif; ?>
            <?php if ($cao_vip_rate != 1) {	
            
            if ($cao_price * $cao_vip_rate==0) {
                $vip_price_rate_str='<span class="price">免费</span>';
            }else{
                $vip_price_rate_str='<span class="price">' . ($cao_price * $cao_vip_rate) . '</span><span class="ua">' . $site_money_ua . '</span>';
            }
              if (!is_user_logged_in()) {
                     echo '<a class="login-btn type_icont_2"><i class="fa fa-diamond"></i>' . $site_vip_name . '特权</a><b>' . $vip_price_rate_str . '</b>';
                }elseif ($CaoUser->vip_status()){
                        $cao_this_am   = ($cao_price * $cao_vip_rate) . $site_money_ua;
                $pric_style = 'style="text-decoration: line-through;"';
                echo '<b><span class="type_icont_2"><i class="fa fa-diamond"></i> ' . $rate_text . '</span>' . $vip_price_rate_str . '</b>';
                } else {
                    echo '<a href="'.esc_url(home_url('/user?action=vip')).'" class="type_icont_2"><i class="fa fa-diamond"></i>' .$site_vip_name . '特权</a><b>' . $vip_price_rate_str . '</b>';
                }
            
           
            if ($cao_is_boosvip) {
                if (is_boosvip_status($user_id)) {
                    echo '<span class="boosvip-abs"><i class="fa fa-check-circle"></i> 已获得'.$site_vip_name.'免费下载特权</a></span>';
                }else{
                    echo '<span class="boosvip-abs"><i class="fa fa-info-circle"></i> 永久'.$site_vip_name.'免费 <a href="'.esc_url(home_url('/user?action=vip')).'" ><i class="fa fa-hand-o-right"></i> 去升级</a></span>';
                }
            }
                ;?>
                <?php }else{ ;?>
                <u>优惠信息:</u><span><span class="Tips" id="momk">一口价</span></span>
                <?php } ;?>
               </span>
        </div>
          <div class="other-info">
  <ul>

  <? if ($cao_info) {
                foreach ($cao_info as $key => $value) {
                    echo '<li><span>' . $value['title'] . '</span><b>' . $value['desc'] . '</b></li>';
                }
            } 
             echo '<li><span>最近更新</span><b>' . get_the_modified_time('Y年m月d日') . '</b></li>';
            
            ?>
  </ul>
</div>
        <?php   $create_nonce = wp_create_nonce('caopay-' . $post_id);
        echo '<div class="downinfo pay-box">';
        $RiProPayAuth = new RiProPayAuth($user_id,$post_id);
         $cao_pwd_html = (empty($cao_pwd)) ? '' : '<span class="pwd"><span title="点击一键复制：访问密码" id="refurl" class="copypaw copypaw btn btn-demo" data-clipboard-text="'.$cao_pwd.'">'.$cao_pwd.'</span></span>' ;
        switch ($RiProPayAuth->ThePayAuthStatus()) {
          case 11: //免登陆  已经购买过 输出OK
            echo cao_get_post_downBtn($post_id); // 输出下载按钮
          echo $cao_pwd_html;
            break;
          case 12: //免登陆  登录后查看
              if (!_cao('is_ripro_free_no_login')) {
                echo '<a class="login-btn btn btn-buy down"><i class="fa fa-user"></i> 登录后下载</a>';
            }else{
                echo cao_get_post_downBtn($post_id); // 输出下载按钮
                echo $cao_pwd_html;
            }
            break;
          case 13: //免登陆 输出购买按钮信息
            if ($cao_close_novip_pay && !$CaoUser->vip_status()) {
                echo '<button type="button" class="btn btn-demo btn--block disabled" >暂无购买权限</button>';
            }else{
                echo '<button type="button" class="btn btn-buy down click-pay down" data-postid="' . $post_id . '" data-nonce="' . $create_nonce . '" data-price="' . $cao_this_am . '">支付下载</button>';
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
                echo '<button type="button" class="btn btn-demo btn--block disabled" >暂无购买权限</button>';
            }else{
                echo '<button type="button" class="click-pay login-btn btn btn-buy down" data-postid="' . $post_id . '" data-nonce="' . $create_nonce . '" data-price="' . $cao_this_am . '">立即购买</button>';
            }
            break;
          case 31: //没有开启免登录 没有登录 输出登录后进行操作
            echo '<a class="login-btn btn btn-buy down"><i class="fa fa-user"></i> 登录后购买</a>';
            break;
        }
 ; ?>
         <?php if ($cao_demourl) { ?>
   <a target="_blank" class="btn btn-demo" href="<?php echo $cao_demourl; ?>"><i class="fa fa-television"></i> 查看演示</a>
            <?php }else{ ?>
            <a href="#" class="btn btn-demo1"><i class="fa fa-television"></i> 暂无演示</a>  
            <?php }; ?>
         
       
          <a class="btn btn-demo1" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo _cao('site_kefu_qq') ;?>&site=qq&menu=yes"><i class="fa fa-qq"></i> QQ咨询</a>
        <?php /*下载风格美化通用设置*/$site_fgxzysty_lixui = _cao('site_fgxzysty_lixui'); ?>
        <?php /*微信客服按钮*/if ($site_fgxzysty_lixui['lixui_fgxzyswx_switch']): ?>
        <li class="btn btn-demo1">
			<a data-v="" href="javascript:(0)" title="扫一扫加我微信" class="wechat">
			<div data-v="" class="qrCode">
			<img data-v="" src="<?php echo $site_fgxzysty_lixui['lixui_fgxzyswx_img']; ?>" width="110" onclick="window.open(&quot;<?php echo $site_fgxzysty_lixui['lixui_fgxzyswx_img']; ?>&quot;)">
			<div data-v="" class="triangle-down"></div>
			</div>
			<i class="<?php echo $site_fgxzysty_lixui['lixui_fgxzyswx_icon']; ?>"></i> <?php echo $site_fgxzysty_lixui['lixui_fgxzyswx_text']; ?></a>
		</li>
		<?php endif; ?>
</div>
      </div>
    </hgroup>
  </div>
</section>
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

<?php get_footer(); ?>