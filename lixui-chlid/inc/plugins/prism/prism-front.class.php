<?php if (!defined('ABSPATH')) {die;} // Cannot access directly.
new lixui_prism();
//前端样式
class lixui_prism{
    public $post_id = 0;
	public function __construct(){
//		if(!is_single()) return;
			add_action( 'wp_head', array( $this, 'wp_head' ), 50 );
			add_action( 'wp_footer', array( $this, 'wp_foot' ), 60 );
	}
	public function wp_head(){
		$post_id = get_the_ID();
        if ( is_single() ) {
	        echo "<link rel='stylesheet' id='wbs-style-dlipp-css'  href='".get_stylesheet_directory_uri()."/inc/plugins/prism/prism.css' type='text/css' media='all' />";
        }
    }
    public function wp_foot(){
		$post_id = get_the_ID();
        if ( is_single() ) {
			echo "<script type='text/javascript' src='".get_stylesheet_directory_uri()."/inc/plugins/prism/prism.js'></script>";
        }
    }
}
?>