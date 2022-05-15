<?php if (!defined('ABSPATH')) {die;} // Cannot access directly.
// 古腾堡编辑器扩展
if (_cao('is_lixui_gutenberg_switch','true')) {
	require_once plugin_dir_path( __FILE__ ) .'/gutenberg-front.class.php';
	function zibll_block() {
		wp_register_script(
		        'zibll_block',
		        get_stylesheet_directory_uri(). '/inc/plugins/gutenberg/admin-gutenberg-extend.js',
		        array('wp-blocks', 'wp-element', 'wp-rich-text')
		    );
		wp_register_style(
		        'zibll_block',
		       get_stylesheet_directory_uri(). '/inc/plugins/gutenberg/admin-editor-style.css',
		        array('wp-edit-blocks')
		    );
		wp_register_style(
		        'font_awesome',
		        'https://lib.baomitu.com/font-awesome/4.7.0/css/font-awesome.min.css',
		        array('wp-edit-blocks')
		    );
		register_block_type('zibll/block', array(
		        'editor_script' => 'zibll_block',
		        'editor_style'  => ['zibll_block', 'font_awesome'],
		    ));
	}
	if (function_exists('register_block_type')) {
		add_action('init', 'zibll_block');
		add_filter('block_categories', function ($categories, $post) {
			return array_merge(
			            $categories,
			            array(
			                array(
			                    'slug' => 'zibll_block_cat',
			                    'title' => __('利熙网扩展模块', 'zibll-blocks'),
			                ),
			            )
			        );
		}
		, 10, 2);
	}
}
?>