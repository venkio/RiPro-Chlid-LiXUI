<?php
  global $current_user;
  $container = _cao( 'navbar_full', false );
  $menu_class = 'main-menu hidden-xs hidden-sm hidden-md';
  if ( cao_compare_options( _cao( 'navbar_hidden', false ), rwmb_meta( 'navbar_hidden' ) ) == true ) {
    $menu_class .= ' hidden-lg hidden-xl';
  }
  $logo_regular = _cao( 'site_logo');
  $logo_regular_dark = _cao( 'site_dark_logo');
?>

<?php /*全局顶部栏＆通告＆链接块开始*/
$site_dltgljk_lixui = _cao('site_dltgljk_lixui');
if (is_array($site_dltgljk_lixui)  && _cao('is_dltgljk_lixui') ) : ?>
	<div class="header-banner2" style="position: fixed !important;">
	<div class="container2">
    <div class="header-banner-content wrapper">
    <div class="deangg1 comfff wow fadeInUp">
          <div class="deanggspan"><i class="fa <?php echo $site_dltgljk_lixui['lixui_tgtb_icon']; ?>"></i><span><?php echo $site_dltgljk_lixui['lixui_tgbt_text']; ?></span></div>
          <b></b>
          <div class="deanggc"><?php echo $site_dltgljk_lixui['lixui_tgnr_text']; ?></div>
          <div class="clear"></div>
    </div>
    <div class="clear"></div>
     <div class="header-banner-left">
      <div id="ym-menu" class="ym-menu">
       <ul id="menu-header-top" class="menu81">
        <?php $site_dlycljk_lixui_group = _cao('site_dlycljk_lixui_group');
        if (!empty($site_dlycljk_lixui_group)) {
            foreach ($site_dlycljk_lixui_group as $key => $link) {
                $_blank = ($link['_blank']) ? ' target="_blank"' : '' ;
                echo '<li><a'.$_blank.' href="'.$link['_link'].'"><i class="fa '.$link['_icon'].'"></i> '.$link['_title'].'</a></li>';
            }
        }
        ?>
       </ul>
      </div>
     </div>
    </div>
   </div>
</div>
<style><?php /*全局顶部栏手机端不显示*/ ?>
.navbar-sticky:not(.ads-before-header) .site-header, .navbar-sticky_transparent:not(.ads-before-header) .site-header, .stick-now .site-header {
    top: 35px;
}
.header-gap {
    height: 100px;
}
@media(max-width:767px) {
	.site-header {
		margin-top: -35px!important
	}
	.header-gap {
	    height: 65px;
	}
	.header-banner2 {
	    display: none;
	}
}
</style>
<?php /*全局顶部栏＆通告＆链接块结束*/endif; ?>

<header class="site-header">
  <?php if ( $container == false ) : ?>
    <div class="container">
  <?php endif; ?>
    <div class="navbar">
      <div class="logo-wrapper">
      <?php if ( ! empty( $logo_regular ) ) : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <img class="logo regular tap-logo" src="<?php echo esc_url( $logo_regular ); ?>" data-dark="<?php echo esc_url(_cao( 'site_dark_logo')); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
        </a>
      <?php else : ?>
        <a class="logo text" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
      <?php endif; ?>
      </div>
        <?php /*利熙LOGO右侧双栏文字开始*/
        $site_logoslwz_lixui = _cao('site_logoslwz_lixui');
        if (is_array($site_logoslwz_lixui)  && _cao('is_logoslwz_lixui') ) : ?>
            <div class="navtlogotext">
                <span class="logotext"><?php echo $site_logoslwz_lixui['lixui_lgslwz1_text']; ?></span><br>
            </div>
        <?php /*LOGO右侧双栏文字结束*/endif; ?>
      <div class="sep"></div>
      
      <nav class="<?php echo esc_attr( $menu_class ); ?>">
        
        <?php 
        ///////////S CACHE ////////////////
      if (CaoCache::is()) {
          $_the_cache_key = 'ripro_all_navbar_menu';
          $_the_cache_data = CaoCache::get($_the_cache_key);
          if(false === $_the_cache_data ){
              $_the_cache_data = wp_nav_menu( array(
              'container' => false,
              'fallback_cb' => 'LiXUI_Walker_Nav_Menu::fallback',//利熙网子主题导航菜单
              'menu_class' => 'nav-list u-plain-list',
              'theme_location' => 'menu-1',
              'echo' => false,
              'walker' => new LiXUI_Walker_Nav_Menu( true ),//利熙网子主题导航菜单
            ) );  //缓存数据
              CaoCache::set($_the_cache_key,$_the_cache_data);
          }
          $ripro_nav = $_the_cache_data;
      }else{
          $ripro_nav =  wp_nav_menu( array(
              'container' => false,
              'fallback_cb' => 'LiXUI_Walker_Nav_Menu::fallback',//利熙网子主题导航菜单
              'menu_class' => 'nav-list u-plain-list',
              'theme_location' => 'menu-1',
              'echo' => false,
              'walker' => new LiXUI_Walker_Nav_Menu( true ),//利熙网子主题导航菜单
         ) ); //原始输出
      }
      ///////////S CACHE ////////////////
        echo $ripro_nav;
        ?>
      </nav>
      
      <div class="main-search">
        <?php get_search_form(); ?>
        <div class="search-close navbar-button"><i class="mdi mdi-close"></i></div>
      </div>

      <div class="actions">
        <?php if (is_site_shop_open()) : ?>
          <!-- user -->
          <?php if (is_user_logged_in()) : ?>
            <?php if (_cao('is_navbar_newhover','1')) { 
              get_template_part( 'parts/navbar-hover' );
            }else{ ?>
              <a class="user-pbtn" href="<?php echo esc_url(home_url('/user')) ?>"><?php echo get_avatar($current_user->user_email); ?>
              <?php if(!_cao('is_navbar_ava_name','0')){
                echo '<span>'.$current_user->display_name.'</span>';
              }?>
              </a>
            <?php } ?>
            
          <?php else: /*导航右上角按钮开始*/?>
              <div class="login-btn navbar-button"><i class="mdi mdi-account"></i> 登录 / 注册</div>
          <?php endif; ?>
        <?php endif; ?>
        <!-- user end -->
        <div class="search-open navbar-button"><i class="fa fa-search"></i></div>
        <?php if (_cao('is_lixui_dark_mode')) : ?>
        <div class="tap-dark navbar-button-dark"><i class="mdi mdi-brightness-4"></i></div>
        <?php endif; ?>
        <div class="burger" style="display:block"><i class="fa fa-bars"></i></div>
      </div>
    </div>
  <?php if ( $container == false ) : /*导航右上角按钮结束*/?>
    </div>  
  <?php endif; ?>