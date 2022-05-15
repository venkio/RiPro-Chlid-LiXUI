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
<?php /*关闭顶部栏后导致二开导航下面的高度偏低修复*/?>
<style>
.header-gap {
    height: 135px;
}
@media(max-width:767px) {
	.header-gap {
	    height: 71px;
	}
}
</style>
<style>
.navbar .logo{margin-right:12px;max-width:147px;height:auto}
.deansubnavsins{display:block;width:168px;height:38px;font-size:14px;line-height:38px;text-align:center;color:#fff;border-radius:4px 4px 0 0;background:linear-gradient(-180deg,#0066FF 0,#33CCCC 98%)}
.deansubnavsins a{color:#fff}
@media (max-width:768px){.deansubnavsins{display:none}
}
.site-header{position:relative}
.site-header{box-shadow:0 0 30px rgba(0,0,0,0)}
.navFix{margin-top:0!important;box-shadow:rgba(51,51,51,.2) 0 2px 3px;position:fixed!important}
.wdsq{width:128px;height:38px;line-height:36px;margin-left:10px;display:block;float:left;border-radius:50px;cursor:pointer;text-align:center;color:#fff;background:linear-gradient(125deg,#0066FF 0%,#33CCCC 100%)}
.navbar{align-items:center;display:flex;height:38px;position:relative}
.topnav{padding:28px}
.header__style_user .header__dropdown{left:inherit;right:-130px;border-radius:8px;width:400px;top:33px;box-shadow:0 2px 8px rgba(0,0,0,.2);z-index:999999}
.navbar .menu-item>a{font-weight:400}
@media(max-width:767px){.topnav{padding:15px!important}
}
@media screen and (min-width:931px){span.navtenyear{font-size:14px;padding:1px 5px;background-color:#0066FF;border-radius:5px;color:#fff}
.ripro-dark span.navtenyear{background-color:#9900CC}
span.navtenyearcon{font-size:12px}
}
@media screen and (max-width:971px){.navbar2{height:0px}
.logotext10{display:none}
}
@media (max-width:767px){.text-center{padding-top:0px;padding-bottom:13px;background-color:#fff}
}
@media (max-width:767px){.static .flex{padding:0;display:flex;margin-top:66px}
}
</style>
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
    height: 170px;
}
@media(max-width:767px) {
	.site-header {
		margin-top: -35px!important
	}
	.header-gap {
	    height: 71px;
	}
	.header-banner2 {
	    display: none;
	}
}
</style>
<?php /*全局顶部栏＆通告＆链接块结束*/endif; ?>

<header class="site-header">
  <?php if ( $container == false ) : ?>
    <div class="container topnav">
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
        <?php /*LOGO右侧双栏文字开始*/
        $site_logoslwz_lixui = _cao('site_logoslwz_lixui');
        if (is_array($site_logoslwz_lixui)  && _cao('is_logoslwz_lixui') ) : ?>
            <div class="logotext10">
                <span class="navtenyear"><?php echo $site_logoslwz_lixui['lixui_lgslwz1_text']; ?></span><br>
                <span class="navtenyearcon"><?php echo $site_logoslwz_lixui['lixui_lgslwz2_text']; ?></span>
            </div>
            <?php else : ?>
        <div class="sep"></div>
        <?php /*LOGO右侧双栏文字结束*/endif; ?>
            <div class="header_search">
        <?php /*导航顶部搜索框开始*/
        $site_dhdbssk_lixui = _cao('site_dhdbssk_lixui');
        if (is_array($site_dhdbssk_lixui)  && _cao('is_dhdbssk_lixui') ) : ?>
                <div class="search_form">
                    <div class="search_input" data-search="top-banner">
                        <div class="search_filter" id="header_filter">
                        </div>
                        <input class="search-input" id="search-keywords" placeholder="<?php echo $site_dhdbssk_lixui['lixui_sskms_text']; ?>" type="text" name="s" autocomplete="off" onkeydown="tab1()">
                        <input type="hidden" name="search" class="btn_search" data-search-btn="search-btn">
                    </div>
                    <div class="search_btn" id="search-btn"><i class="icon_search"></i></div>
                </div>
        <script>
        jQuery("#search-btn").on("click",function () {
            location.href='<?php echo esc_url( home_url( '/' ) ); ?>?s='+jQuery("#search-keywords").val();
        })
            function tab1() {
            	if (event.keyCode == 13) {
            		document.getElementById("search-btn").click();
            	}
            }
        </script>
        <?php /*导航顶部搜索框结束*/endif; ?>
        <?php /*导航顶部搜索框右侧按钮开始*/
        $site_dhdbsskycan_lixui = _cao('site_dhdbsskycan_lixui');
        if (is_array($site_dhdbsskycan_lixui)  && _cao('is_dhdbsskycan_lixui') ) : ?>
				<div class="wendashequ">
					<a target="_blank" href="<?php echo $site_dhdbsskycan_lixui['lixui_ycan_link']; ?>" class="wdsq"><i class="fa <?php echo $site_dhdbsskycan_lixui['lixui_ycan_icon']; ?>"></i>  <?php echo $site_dhdbsskycan_lixui['lixui_ycan_text']; ?></a>
					<img src="<?php echo $site_dhdbsskycan_lixui['lixui_ycan_img']; ?>" alt="" style="max-width: none;position: absolute;right: 96px;margin: 0px 10px 4px 0px;bottom: 0;width: 56px;">
				</div>
        <?php /*导航顶部搜索框右侧按钮结束*/endif; ?>
            </div>

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

                    <?php else: ?>
                        <div class="login-btn navbar-button"><i class="mdi mdi-account"></i>登录 / 注册</div>
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
  <?php endif; ?>

  <?php if ( $container == false ) : ?>
    </div>
    <?php /*导航菜单线条上开始*/ if (_cao('is_dhcdxt_lixui1')) : ?>
    <div style="border-bottom: 0.5px solid #E9E9E9;"></div>
	<?php /*导航菜单线条结束*/endif; ?>
    <div class="container">
        <div class="navbar navbar2">
        	<?php /*导航菜单标题开始*/
        	$site_dhcdbt_lixui = _cao('site_dhcdbt_lixui'); 
        	if (is_array($site_dhcdbt_lixui)  && _cao('is_dhcdbt_lixui') ) : ?>
        	<div class="deansubnavsins"><i class="fa <?php echo $site_dhcdbt_lixui['lixui_cdtb_icon']; ?>"></i>  <a href="<?php echo $site_dhcdbt_lixui['lixui_cdlj_link']; ?>"><?php echo $site_dhcdbt_lixui['lixui_cdbt_text']; ?></a></div>
        	<?php /*导航菜单标题结束*/endif; ?>
            <nav class="<?php echo esc_attr( $menu_class ); ?>">
                <?php wp_nav_menu( array(
                    'container' => false,
                    'fallback_cb' => 'LiXUI_Walker_Nav_Menu::fallback',//利熙网子主题导航菜单
                    'menu_class' => 'nav-list u-plain-list',
                    'theme_location' => 'menu-1',
                    'walker' => new LiXUI_Walker_Nav_Menu( true ),//利熙网子主题导航菜单
                ) ); ?>
            </nav>
        </div>
    </div>
    <?php /*导航菜单线条下开始*/ if (_cao('is_dhcdxt_lixui2')) : ?>
    <div style="border-bottom: 0.5px solid #E9E9E9;border-top: 0.5px solid #E9E9E9;"></div>
    <?php /*导航菜单线条结束*/endif; ?>
  <?php endif; ?>