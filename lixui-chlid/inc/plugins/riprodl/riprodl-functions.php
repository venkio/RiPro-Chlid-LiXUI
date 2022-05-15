<?php if (!defined('ABSPATH')) {die;} // Cannot access directly.
// 下载美化风格选择
if (_cao('ridl_on','true')){
    require_once plugin_dir_path( __FILE__ ) .'/riprodl-front.class.php';//利熙网子主题下载信息美化设置
	add_filter('single_template', 'my_custom_template');
	function my_custom_template($single) {
		global $post;
		/* Checks for single template by post type */
		if (_get_post_shop_status() || !_get_post_shop_hide()) { 
		
			if (_cao('ridl_style') === 'old' ) { 
				return plugin_dir_path( __FILE__ ) .'/old.php';
			}else if (_cao('ridl_style') === 'dux' ){
					  return plugin_dir_path( __FILE__ ) .'/dux.php';
			}else if (_cao('ridl_style') === 'riplus' ){
					  return plugin_dir_path( __FILE__ ) .'/riplus.php';
			  };
		}else{
			return plugin_dir_path( __FILE__ ) .'/single.php';	
		}		
		return $single;
	}
}