<?php if (!defined('ABSPATH')) {die;} // Cannot access directly.

if (_cao('is_lixui_shortcoder_switch','true')){//简码开关开始

require_once plugin_dir_path( __FILE__ ) .'/shortcoder-options.php';//利熙网子主题简码设置

// WordPress利熙网简码函数
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

//custom shortcoder css
function wp_add_styles() {
  wp_register_style('wp_stylesheet',get_stylesheet_directory_uri().'/inc/plugins/shortcoder/shortcoder.css');
  wp_enqueue_style('wp_stylesheet');
}
add_action( 'wp_enqueue_scripts', 'wp_add_styles' );

//custom shortcoder js
function wp_add_scripts() {
  wp_register_script('wp_script', get_stylesheet_directory_uri().'/inc/plugins/shortcoder/shortcoder.js', array('jquery'),'2.0', true);
  wp_enqueue_script('wp_script');
}
add_action( 'wp_enqueue_scripts', 'wp_add_scripts' );

// 文本彩框
////////////////////////////////////////////////////////////
function lxtextcolorbox( $atts, $content = null ) {
    extract(
        shortcode_atts(
            array(
                'choice' => '',
            ),
            $atts
        )
    );
    $out = '<div id="'.$choice.'">'.do_shortcode($content).'</div>';
    return $out;
}
add_shortcode('lixui_textcolorbox', 'lxtextcolorbox');
//简码：[lixui_textcolorbox choice="颜色"]这里输入内容[/lixui_textcolorbox]

// 跳转按钮
////////////////////////////////////////////////////////////
function lxbutton( $atts, $content = null ) {
    extract(
        shortcode_atts(
            array(
                'link'      => '',
                'target'    => '',
                'diycolor'  => '',
                'variation' => '',
                'size'      => '',
                'align'     => '',
            ),
            $atts
        )
    );
    $style = ($variation) ? ' '.$variation : '';
    $diycolor = ($diycolor) ? ' '.$diycolor : '';
    $align = ($align) ? ' align'.$align : '';
    $size = ($size == 'large') ? ' large_button' : '';
    $target = ($target == 'blank') ? '' : 'target="_blank"';
    $out = '<a '.$target.' class="wpbutton '.$style.$size.$align.'" style="background-color:'.$diycolor.'" href="'.$link.'">'.do_shortcode($content).'</a>';
    return $out;
}
add_shortcode('lixui_button', 'lxbutton');
//简码：[wm_wpbutton link="链接地址" variation="颜色" size="large" align="right"]这里输入内容[/wm_wpbutton]

// 展开内容
////////////////////////////////////////////////////////////
function collapseunfold( $atts, $content = null ) {
    extract(
        shortcode_atts(
            array(
                'title' => '',
            ),
            $atts
        )
    );
    return '<div style="margin: 0.5em 0;">
			    <div class="xControl">
		            <a href="javascript:void(0)" class="collapseButton xButton"> <i class="fa fa-toggle-on" aria-hidden="true">&nbsp;</i><span class="xTitle">'.$title.'</span></a>
                    <div style="clear: both;"></div>
                </div>
            <div class="xContent" style="display: none;box-shadow: 0 0 20px #d0d0d0;background-color: #DCDCDC;border-radius: 4px;">'.$content.'</div>
	</div>';
}
add_shortcode('lixui_collapseunfold', 'collapseunfold');
//简码：[lixui_collapseunfold title="点击展开 查看更多"]这里输入内容[/lixui_collapseunfold]

// 阅读全文
////////////////////////////////////////////////////////////
function read_the_whole_passage($atts, $content = null){
	extract(shortcode_atts(array(""),$atts));
	return '<div style="position:relative">
			    <div class="hidecontent" style="display:none">'.$content.'</div>
		            <a class="hidetitle">
                    <button class="lxydqw_collapseButton">阅读全文</button>
                </a>
	</div>';
}
add_shortcode('lixui_fulltext', 'read_the_whole_passage');
//简码：[wm_collapse title="阅读全文"]这里输入内容[/wm_collapse]

// 卡片内链
////////////////////////////////////////////////////////////
function cardinnerchain( $atts, $content = null ){
extract( shortcode_atts( array(
'ids' => ''
),
$atts ) );
global $post;
$content = '';
$postids = explode(',', $ids);
$inset_posts = get_posts(array('post__in'=>$postids));
$category = get_the_category( $ids );
foreach ($inset_posts as $key => $post) {
setup_postdata( $post );
$content .= '<span class="wp-embed-card">
<a target="_blank" href="'.get_category_link($category[0]->term_id ).'"><span class="wp-embed-card-category">'. $category[0]->cat_name .'</span></a>
<span class="wp-embed-card-img">
<a target="_blank" href="' . get_permalink() . '"><img alt="'. get_the_title() . '" src="'._get_post_thumbnail_url().'"></a>
</span>
<span class="wp-embed-card-info">
<a target="_blank" href="' . get_permalink() . '">
<span class="wp-card-name">'. get_the_title() . '</span>
</a>
<span class="wp-card-abstract">'.wp_trim_words( get_the_excerpt(), 100, '...' ).'</span>
<span class="wp-card-controls">
<span class="wp-group-data"> <i>时间:</i>'. get_the_time('Y/n/j') .'</span>
<span class="wp-group-data"> <i>阅读:</i>'._get_post_views().'</span>
<a target="_blank" href="' . get_permalink() . '"><span class="wp-card-btn-deep">阅读全文</span></a>
</span>
</span>
</span>';
}
wp_reset_postdata();
return $content;
}
add_shortcode('lixui_cardinnerchain', 'cardinnerchain');

// 经典编辑器文本添加彩色文本框快捷标签按钮
function bolo_after_wp_tiny_mce($mce_settings) {
?>
<script type="text/javascript">
 QTags.addButton( 'l_notice', '绿色安全框(经典)', '<div id="lx_notice">', "</div>\n" );/* 绿色提示框 */
 QTags.addButton( 'l_error', '红色错误框(经典)', '<div id="lx_error">', "</div>\n" );/* 红色提示框 */
 QTags.addButton( 'l_warn', '黄色警告框(经典)', '<div id="lx_warn">', "</div>\n" );/* 黄色提示框 */
 QTags.addButton( 'l_tips', '灰色提示框(经典)', '<div id="lx_tips">', "</div>\n" );/* 灰色提示框 */
 QTags.addButton( 'l_blue', '蓝色通知框(经典)', '<div id="lx_blue">', "</div>\n" );/* 蓝色提示框 */
 QTags.addButton( 'l_black', '黑底文本框(经典)', '<div id="lx_black">', "</div>\n" );/* 黑色提示框 */
 QTags.addButton( 'l_xuk', '蓝色虚线框(经典)', '<div id="lx_xuk">', "</div>\n" );/* 虚线提示框 */
 QTags.addButton( 'l_lvb', '绿边文本框(经典)', '<div id="lx_lvb">', "</div>\n" );/* 绿边提示框 */
 QTags.addButton( 'l_redb', '红边文本框(经典)', '<div id="lx_redb">', "</div>\n" );/* 红边提示框 */
 QTags.addButton( 'l_mhz', '迷幻紫(渐变)', '<div id="lx_mhz">', "</div>\n" );/* 迷幻紫 */
 QTags.addButton( 'l_xgh', '西瓜红(渐变)', '<div id="lx_xgh">', "</div>\n" );/* 西瓜红 */
 QTags.addButton( 'l_tkj', '天空境(渐变)', '<div id="lx_tkj">', "</div>\n" );/* 天空境 */
 QTags.addButton( 'l_xyz', '小宇宙(渐变)', '<div id="lx_xyz">', "</div>\n" );/* 小宇宙 */
 QTags.addButton( 'l_gll', '橄榄绿(渐变)', '<div id="lx_gll">', "</div>\n" );/* 橄榄绿 */
 QTags.addButton( 'l_xty', '小太阳(渐变)', '<div id="lx_xty">', "</div>\n" );/* 小太阳 */
 QTags.addButton( 'l_yyz', '优雅紫(渐变)', '<div id="lx_yyz">', "</div>\n" );/* 优雅紫 */
 QTags.addButton( 'l_szh', '深邃黑(渐变)', '<div id="lx_szh">', "</div>\n" );/* 深邃黑 */
 QTags.addButton( 'l_kbk', '空白框(无色)', '<div id="lx_kbk">', "</div>\n" );/* 无边框 */
 function bolo_QTnextpage_arg1() {
 }
</script>
<?php
}
add_action('after_wp_tiny_mce', 'bolo_after_wp_tiny_mce');

// 文章内容登录可见
function login_to_read($atts, $content = null) {
	extract(shortcode_atts(array("notices" =>'
	<div class="hide_visible">抱歉提示：此处内容需要 <a class="login-btn navbar-button" href="#login" etap="login_btn" title="登录">登录账号</a> 后才能查看！</div>'), $atts));
	if (is_user_logged_in()) {
// 		return do_shortcode( $content );
		return '<div style="border:1px dashed #fc3c2d;padding:8px;color:#fc3c2d;width:100%;border-radius:4px;">'.$content.'</div>';
	} else {
		return $notices;
	}
}
add_shortcode('lixui_login', 'login_to_read');
// 添加登录可见快捷标签按钮
function appthemes_add_login() {
?>
    <script type="text/javascript">
        if ( typeof QTags != 'undefined' ) {
            QTags.addButton( 'lixui_login', '登录可见', '[lixui_login]','[/lixui_login]' );
        } 
    </script>
<?php 
}
add_action('admin_print_footer_scripts', 'appthemes_add_login' );

// 文章内容评论可见
function reply_to_read($atts, $content=null) {   
    extract(
        shortcode_atts(
            array(
                "notice" => '<div class="hide_visible">抱歉提示：此处内容需要 <a href="' . get_permalink() . '#comments" title="评论本文">评论本文</a> 后 <a href="javascript:window.location.reload();" target="_self">刷新本页</a> 才能查看！</div>'
            ),
            $atts
        )
    );
	$email = null;   
	$user_ID = (int) wp_get_current_user()->ID;   
	if ($user_ID > 0) {   
		$email = get_userdata($user_ID)->user_email;   
		//对博主直接显示内容   
		$admin_email = get_bloginfo ( 'admin_email' ); //博主Email
		if ($email == $admin_email) {   
            return '<div style="border:1px dashed #fc3c2d;padding:8px;color:#fc3c2d;width:100%;border-radius:4px;">'.$content.'</div>';
		}   
	} else if (isset($_COOKIE['comment_author_email_' . COOKIEHASH])) {   
		$email = str_replace('%40', '@', $_COOKIE['comment_author_email_' . COOKIEHASH]);   
	} else {   
		return $notice;   
	}   
	if (empty($email)) {   
		return $notice;   
	}   
	global $wpdb;   
	$post_id = get_the_ID();   
	$query = "SELECT `comment_ID` FROM {$wpdb->comments} WHERE `comment_post_ID`={$post_id} and `comment_approved`='1' and `comment_author_email`='{$email}' LIMIT 1";   
	if ($wpdb->get_results($query)) {   
// 		return do_shortcode($content);
		return '<div style="border:1px dashed #fc3c2d;padding:8px;color:#fc3c2d;width:100%;border-radius:4px;">'.$content.'</div>';
	} else {   
		return $notice;   
	}   
}
add_shortcode('lixui_reply', 'reply_to_read');
// 添加评论可见快捷标签按钮
function appthemes_add_reply() {
?>
    <script type="text/javascript">
        if ( typeof QTags != 'undefined' ) {
            QTags.addButton( 'lixui_reply', '评论可见', '[lixui_reply]','[/lixui_reply]' );
        } 
    </script>
<?php 
}
add_action('admin_print_footer_scripts', 'appthemes_add_reply' );

// 密码可见公众号获取
function secret_content($atts, $content=null) {
	extract(shortcode_atts(array('gzhqr'=>null,'key'=>null,'keyword'=>null), $atts));
	if(isset($_POST['secret_key']) && $_POST['secret_key']==$key) {
		return '<div class="secret-password">'.$content.'</div>';
	} else {
		return
		'<div class="gzhhide">
<div ><img class="gzhcode" align="right" src="'.$gzhqr.'" width="130" height="130"></div>
<div class="gzhtitle">抱歉！这是隐藏内容，请输入密码后查看！<i class="fa fa-lock"></i><span></span></div>
<div class="gzh-content">请打开微信，扫描右边的二维码并发送关键字“<span><b>'.$keyword.'</b></span>”获取密码，将密码输入下方提取即可查看。</div>
<div class="gzhbox"><form action="'.get_permalink().'" method="post">
<input id="pwbox" type="password" size="20" name="secret_key">
<button type="submit">立即提取</button></form></div></div>';
	}
}
add_shortcode('lixui_passgzh', 'secret_content');
// 添加密码可见公众号获取快捷标签按钮
function lxtx_wpsites_add_gzh_quicktags() {
    if (wp_script_is('quicktags')){
?>
    <script type="text/javascript">
    QTags.addButton( 'lixui_passgzh', ' 密码可见(公众号)', '[lixui_passgzh gzhqr="二维码" keyword="关键字" key="验证码"]','[/lixui_passgzh]' );
    </script>
<?php
    }
}
add_action( 'admin_print_footer_scripts', 'lxtx_wpsites_add_gzh_quicktags' );

}//简码开关结束
