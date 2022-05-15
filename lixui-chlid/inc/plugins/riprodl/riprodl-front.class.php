<?php if (!defined('ABSPATH')) {die;} // Cannot access directly.
new RIPRODL_DownLoadFront();
//前端样式
class RIPRODL_DownLoadFront{
    public $post_id = 0;
	public function __construct(){
//		if(!is_single()) return;
			add_action( 'wp_head', array( $this, 'wp_head' ), 50 );
			add_action( 'wp_footer', array( $this, 'wp_foot' ), 60 );
	}
	public function wp_head(){
		$post_id = get_the_ID();
        if ( is_single() ) {
            echo "<link rel='stylesheet' id='aliicon'  href='https://at.alicdn.com/t/font_839916_3olat3y44d4.css' type='text/css' media='all' />";
	        echo "<link rel='stylesheet' id='wbs-style-dlipp-css'  href='".get_stylesheet_directory_uri()."/inc/plugins/riprodl/riprodl.css' type='text/css' media='all' />";
        }
    }
    public function wp_foot(){
		$post_id = get_the_ID();
        if ( is_single() ) {
			echo "<script type='text/javascript' src='".get_stylesheet_directory_uri()."/inc/plugins/riprodl/riprodl.js'></script>";
        }
    }
}

/*大前端样式二维码*/
function qrcode($url){
    return get_template_directory_uri() . '/inc/plugins/qrcode.php?data=' .$url;
}

//文章资源信息设置开始-利熙网
$prefix_post_opts = 'lixui_resource_information';
CSF::createMetabox($prefix_post_opts, array(
	'title'     => '资源版本设置',
	'post_type' => 'post',
	'data_type' => 'unserialize',
	'priority'  => 'high',
));
CSF::createSection($prefix_post_opts, array(
	'fields' => array(
		array(
			'id'         => 'cao_ver',
			'type'       => 'repeater',
			'title'      => '版本设置',
			'fields'     => array(
				array(
					'id'      => 'title',
					'type'    => 'text',
					'title'   => '版本号',
					'default' => '写上该版本的版本号',
				),
				  array(
					'id'      => 'time',
					'type'    => 'date',
					'title'   => '更新时间',
					'default' => '点击选择日期',
					'settings' => array(
					'dateFormat'      => 'dd月mm日yy年',
				)
				),
				array(
					'id'      => 'desc',
					'type'    => 'wp_editor',
					'title'   => '更新内容',
					'default' => '写更新的主要内容',
				),
			),
		),
		
	),
));
//文章资源信息设置结束-利熙网