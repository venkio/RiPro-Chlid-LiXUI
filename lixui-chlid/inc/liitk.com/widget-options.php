<?php if (!defined('ABSPATH')) {die;} // Cannot access directly.
//
// 创建一个小部件
//

//文字简推小工具开始-利熙网
CSF::createWidget('lixui_widget_wzjt', array(
    'title'       => 'LIXUI-文字简推[利熙网]',
    'classname'   => 'widget-wzjt',
    'description' => 'LIXUI子主题的利熙网小工具',
    'fields'      => array(
        array(
            'id'         => 'title',
            'type'       => 'text',
            'title'      => '标题',
            'default'    => '利熙网Ripro子主题[lixui]',
        ),
        array(
            'id'         => '_zhumiaoshu',
            'type'       => 'text',
            'title'      => '主描述',
            'default'    => 'XXXXXXXXXXXX',
        ),
        array(
            'id'         => '_fumiaoshu',
            'type'       => 'text',
            'title'      => '副描述',
            'default'    => 'XXXXXXXXXXXXXXXXXXXXXXX',
        ),
        array(
            'id'         => '_lianjie',
            'type'       => 'text',
            'title'      => '链接地址',
            'default'    => 'https://www.liitk.com',
        ),
        array(
            'id'         => '_anniuicon',
            'type'       => 'icon',
            'title'      => '按钮图标',
            'default'    => 'fa fa-qq',
        ),
        array(
            'id'         => '_anniu',
            'type'       => 'text',
            'title'      => '按钮文本',
            'default'    => '点击前往',
        ),
        array(
            'id'         => '_beijing',
            'type'       => 'upload',
            'title'      => '背景图片',
            'default'    => '/wp-content/themes/lixui-chlid/assets/images/lixui-tgxgjbj.png',
        ),
    ),
));
//文字简推推广小工具函数
if (!function_exists('lixui_widget_wzjt')) {
    function lixui_widget_wzjt($args, $instance)
    {
        echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
          echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        // start
        $_zhumiaoshu    = $instance['_zhumiaoshu'];
        $_fumiaoshu     = $instance['_fumiaoshu'];
        $_lianjie       = $instance['_lianjie'];
        $_anniuicon     = $instance['_anniuicon'];
        $_anniu         = $instance['_anniu'];
        $_beijing       = $instance['_beijing'];
        echo '<section class="lixui-jiaqun">';
        echo '<div class="lixui-jiaqun-small">';
        echo '<p>'.$_zhumiaoshu.'<br> '.$_fumiaoshu.'</p>';
        echo '<a href="'.$_lianjie.'" class="btn lixui-jiaqun-btn-on" uk-toggle=""><i class="'.$_anniuicon.'"></i>'.$_anniu.'</a>';
        echo '<div class="helper-thumb"><img src="'.$_beijing.'"> </div>';
        echo '</div>';
        echo '</section>';
       
        // end
        echo $args['after_widget'];
    }
}
//文字简推推广小工具结束-利熙网