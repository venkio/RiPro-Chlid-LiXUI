<?php if (!defined('ABSPATH')) {die;} // Cannot access directly.
//
// 创建一个元素
//

//文章资源标签开始-利熙网
$prefix_post_opts = 'lixui_resource_tag';
CSF::createMetabox($prefix_post_opts, array(
    'title'     => '<span class="badge badge-radius badge-primary"><i class="fa fa-eercast"></i> LIXUI</span> 文章资源标签设置',
    'post_type' => 'post',
    'data_type' => 'unserialize',
    'priority'  => 'high',
    'context'   => 'side',//默认侧边
));
CSF::createSection($prefix_post_opts, array(
    'fields' => array(
        array(
            'id'      => 'post_style_art',
            'type'    => 'radio',
            'title'   => '资源标签',
            'desc'    => '选择资源类型标签',
            'inline'  => true,
            'options' => array(
                'dujia'     => '独家',
                'tuijian'   => '推荐',
				'jingpin'   => '精品',
				'zuixin'    => '最新',
				'yiceshi'   => '已测试',
				''          => '关',
            ),
        ),

    ),
));

//文章资源标签结束-利熙网