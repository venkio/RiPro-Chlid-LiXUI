<?php if (!defined('ABSPATH')) {die;} // Cannot access directly.
//添加代码插入按钮
if (_cao('is_lixui_prism_switch','true')) {
	require_once plugin_dir_path( __FILE__ ) .'/prism-front.class.php';
	add_action('admin_init', 'insert_code_button');
	function insert_code_button() {
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
			return;
		}
		add_filter( 'mce_external_plugins', 'add_highlight_button_plugin' );
		add_filter( 'mce_buttons', 'register_highlight_button' );
	}
	function register_highlight_button( $buttons ) {
		array_push( $buttons, "|", "highlight" );
		return $buttons;
	}
	function add_highlight_button_plugin() {
		$plugin_array['highlight'] = get_stylesheet_directory_uri(). '/inc/plugins/prism/admin-mycode.js';
		return $plugin_array;
	}
}

?>