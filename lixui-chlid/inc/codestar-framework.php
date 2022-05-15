<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

/**
 * Caozhuti Custom function for get an option
 */
if (!function_exists('_cao')) {
    function _cao($option = '', $default = null)
    {
        $options = get_option('_caozhuti_options'); // Attention: Set your unique id of the framework
        return (isset($options[$option])) ? $options[$option] : $default;
    }
}

require_once plugin_dir_path( __FILE__ ) .'/liitk.com/theme-options.php';//利熙网子主题设置
require_once plugin_dir_path( __FILE__ ) .'/liitk.com/widget-options.php';//利熙网子主题小工具
require_once plugin_dir_path( __FILE__ ) .'/liitk.com/metabox-options.php';//利熙网子主题界面元素
require_once plugin_dir_path( __FILE__ ) .'/liitk.com/nav-menu-options.php';//利熙网子主题导航菜单
require_once plugin_dir_path( __FILE__ ) .'/class/walker.class.php';//利熙网子主题导航菜单

require_once plugin_dir_path( __FILE__ ) .'/plugins/shortcoder/shortcoder-functions.php';//利熙网子主题简码函数
require_once plugin_dir_path( __FILE__ ) .'/plugins/riprodl/riprodl-functions.php';//利熙网子主题下载信息美化设置
require_once plugin_dir_path( __FILE__ ) .'/plugins/prism/prism-functions.php';//利熙网子主题代码高亮函数
require_once plugin_dir_path( __FILE__ ) .'/plugins/gutenberg/gutenberg-functions.php';//利熙网子主题古腾堡扩展函数