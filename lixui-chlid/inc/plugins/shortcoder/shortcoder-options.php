<?php if (!defined('ABSPATH')) {die;} // Cannot access directly.
// WordPress利熙网简码设置
//
// Set a unique slug-like ID
//
$prefix = '_lixui_shortcodes';
//
// Create a shortcoder
//
CSF::createShortcoder($prefix, array(
    'button_title'   => '添加利熙网简码',
    'select_title'   => '选择一个简码组件',
    'insert_title'   => '插入到文章',
    'show_in_editor' => true,
    'gutenberg'      => array(
        'title'       => '利熙网简码',
        'description' => '利熙网简码组件',
        'icon'        => 'admin-settings',
        'category'    => 'widgets',
        'keywords'    => array('shortcode', 'csf', 'insert'),
        'placeholder' => '在此处编写利熙网简码...',
    ),
));

//
//  文本彩框
//
CSF::createSection($prefix, array(
    'title'     => '文本彩框',
    'view'      => 'normal',
    'shortcode' => 'lixui_textcolorbox',
    'fields'    => array(
        array(
            'id'      => 'choice',
            'type'    => 'select',
            'title'   => '提示框样式',
            'desc'    => '[纯]：颜色框，[标]：图标框，括号：分类别',
            'options' => array(
                'lx_mhz'    => '[纯]迷幻紫(渐变)',
                'lx_xgh'    => '[纯]西瓜红(渐变)',
                'lx_tkj'    => '[纯]天空境(渐变)',
                'lx_xyz'    => '[纯]小宇宙(渐变)',
                'lx_gll'    => '[纯]橄榄绿(渐变)',
                'lx_xty'    => '[纯]小太阳(渐变)',
                'lx_yyz'    => '[纯]优雅紫(渐变)',
                'lx_szh'    => '[纯]深邃黑(渐变)',
                'lx_kbk'    => '[纯]空白框(无色)',
                'lx_error'      => '[标]红色错误框(经典)',
                'lx_blue'       => '[标]蓝色通知框(经典)',
                'lx_warn'       => '[标]黄色警告框(经典)',
                'lx_notice'     => '[标]绿色安全框(经典)',
                'lx_tips'       => '[标]灰色提示框(经典)',
                'lx_redb'       => '[纯]红边文本框(经典)',
                'lx_xuk'        => '[纯]蓝色虚线框(经典)',
                'lx_lvb'        => '[纯]绿边文本框(经典)',
                'lx_black'      => '[纯]黑底文本框(经典)',
                'lx_werror'         => '[标]红色错误框(唯美)',
                'lx_wtips'          => '[标]蓝色提示框(唯美)',
                'lx_wwarn'          => '[标]黄色警告框(唯美)',
                'lx_wnotice'        => '[标]绿色安全框(唯美)',
                'lx_wxuk'           => '[纯]红色虚线框(唯美)',
                'lx_wred'           => '[纯]红边文本框(唯美)',
                'lx_wblue'          => '[纯]蓝边文本框(唯美)',
                'lx_wyellow'        => '[纯]黄边文本框(唯美)',
                'lx_wgreen'         => '[纯]绿边文本框(唯美)',
            ),
        ),
        array(
            'id'    => 'content',
            'type'  => 'wp_editor',
            'title' => '',
            'desc'  => '[lixui_textcolorbox]',
        ),
    ),
));

//
//  按钮
//
CSF::createSection($prefix, array(
    'title'     => '跳转按钮',
    'view'      => 'normal',
    'shortcode' => 'lixui_button',
    'fields'    => array(
        array(
            'id'         => 'link',
            'type'       => 'text',
            'title'      => '按钮-链接',
            'default'    => '#',
        ),
        array(
            'id'      => 'target',
            'type'    => 'switcher',
            'title'   => '新窗口打开',
            'label'   => '是否新建标签窗口页',
            'default' => true,
        ),
        array(
            'id'      => 'variation',
            'type'    => 'select',
            'title'   => '按钮颜色',
            'options' => array(
                'red'       => '红色',
                'yellow'    => '黄色',
                'blue'      => '蓝色',
                'green'     => '绿色',
            ),
        ),
        array(
            'id'        => 'diycolor',
            'type'      => 'color',
            'title'     => '自定义颜色',
        ),
        array(
            'id'        => 'content',
            'type'      => 'text',
            'title'     => '标题',
            'default'   => '按钮',
            'desc'      => '[lixui_button]',
        ),
        
    ),
));

//
//  卡片内链
//
CSF::createSection($prefix, array(
    'title'     => '卡片内链',
    'view'      => 'normal',
    'shortcode' => 'lixui_cardinnerchain',
    'fields'    => array(
        array(
            'id'        => 'ids',
            'type'      => 'text',
            'title'     => '文章',
            'default'   => '输入文章ID',
            'desc'  => '[lixui_cardinnerchain]',
        ),
        array(
            'id'    => 'content',
            'type'  => 'wp_editor',
            'title' => '',
            'desc'  => '不显示编辑器中的内容',
        ),
    ),
));

//
//  展开内容
//
CSF::createSection($prefix, array(
    'title'     => '展开内容',
    'view'      => 'normal',
    'shortcode' => 'lixui_collapseunfold',
    'fields'    => array(
        array(
            'id'        => 'title',
            'type'      => 'text',
            'title'     => '标题',
            'default'   => '点击展开 查看更多',
        ),
        array(
            'id'    => 'content',
            'type'  => 'wp_editor',
            'title' => '',
            'desc'  => '[lixui_collapseunfold]',
        ),

    ),
));

//
//  阅读全文
//
CSF::createSection($prefix, array(
    'title'     => '阅读全文',
    'view'      => 'normal',
    'shortcode' => 'lixui_fulltext',
    'fields'    => array(
        array(
            'id'    => 'content',
            'type'  => 'wp_editor',
            'title' => '',
            'desc'  => '[lixui_fulltext]',
        ),

    ),
));

//
//  登录可见
//
CSF::createSection($prefix, array(
    'title'     => '登录可见',
    'view'      => 'normal',
    'shortcode' => 'lixui_login',
    'fields'    => array(
        array(
            'id'    => 'content',
            'type'  => 'wp_editor',
            'title' => '',
            'desc'  => '[lixui_login]',
        ),

    ),
));

//
//  评论可见
//
CSF::createSection($prefix, array(
    'title'     => '评论可见',
    'view'      => 'normal',
    'shortcode' => 'lixui_reply',
    'fields'    => array(
        array(
            'id'    => 'content',
            'type'  => 'wp_editor',
            'title' => '',
            'desc'  => '[lixui_reply]',
        ),

    ),
));

//
//  密码可见公众号获取
//
CSF::createSection($prefix, array(
    'title'     => '密码可见[微信公众号]',
    'view'      => 'normal',
    'shortcode' => 'lixui_passgzh',
    'fields'    => array(
        array(
            'id'        => 'gzhqr',
            'type'      => 'text',
            'title'     => '二维码',
            'default'   => 'https://ae01.alicdn.com/kf/U088b242717de4d7ea157923822d7fbaft.jpg',
        ),
        array(
            'id'        => 'keyword',
            'type'      => 'text',
            'title'     => '关键字',
            'default'   => '密码',
        ),
        array(
            'id'        => 'key',
            'type'      => 'text',
            'title'     => '验证码',
            'default'   => '',
        ),
        array(
            'id'    => 'content',
            'type'  => 'wp_editor',
            'title' => '',
            'desc'  => '[lixui_passgzh]',
        ),
    ),
));