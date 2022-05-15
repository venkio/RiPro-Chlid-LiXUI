<?php if (!defined('ABSPATH')) {die;} // Cannot access directly.
/**
 * 利熙网子主题设置[www.liitk.com]
 * 下载使用，唯一购买地址：https://www.liitk.com/
 */

// 加载利熙网子主题style.css样式
function lixui_chlid_style() {
    if (!is_admin()) {
    	//挂在父主题优先最前
        wp_register_style('lixui_style', get_stylesheet_directory_uri() . '/assets/css/lixui-main.css',  array('app'), '', 'all');
        wp_enqueue_style('lixui_style'); //利熙网子主题CSS样式
        wp_register_style('lixui-dark' , get_stylesheet_directory_uri() .'/assets/css/lixui-dark.css');
        wp_enqueue_style('lixui-dark'); //利熙网子主题黑夜CSS样式
        wp_enqueue_script( 'lixui-script', get_stylesheet_directory_uri() . '/assets/js/lixui.js', array( 'jquery' ), '', true );//利熙网子主题JS样式
    }
}
add_action('init', 'lixui_chlid_style');

// 加载RiPro高级功能
require_once get_template_directory() . '/inc/codestar-framework/codestar-framework.php'; //Caozhuti Custom function for get an option
// 加载LiXUI高级功能
require_once get_stylesheet_directory() . '/inc/codestar-framework.php';

/**  加载利熙网子主题LiXUi-RiPro函数开始  **/
// 创建页面
$init_pages = array(
    'pages/svip.php'         => array('会员介绍', 'svip'),
    'pages/link-apply.php'   => array('链接申请', 'link-apply'),
    'pages/link-navig.php'   => array('站点导航', 'link-navig'),
    'pages/wordpress.php'    => array('WordPress下载', 'wordpress-download'),
);
// 自定义functions在下方添加

