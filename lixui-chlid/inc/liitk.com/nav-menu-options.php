<?php if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.

$prefix = '_linux_menu_options';
CSF::createNavMenuOptions( $prefix, array(
    'data_type' => 'unserialize'
) );
CSF::createSection( $prefix, array(
    'title'  => '利熙网高级扩展菜单',
    'fields' => array(
		array(
			'id'      => 'caidan_icon',
			'type'    => 'icon',
			'title'   => '菜单图标',
		),
		array(
			'id'      => 'caidan_icon_color',
			'type'    => 'color',
			'title'   => '图标颜色',
		),
		array(
			'id'      => 'caidan_icon_css',
			'type'    => 'text',
			'title'   => '图标附加class',
		),
		array(
			'id'      => 'caidan_colour',
			'type'    => 'color',
			'title'   => '颜色菜单',
		),
		array(
			'id'      => 'label_text',
			'type'    => 'text',
			'title'   => '文字标签',
			'desc'    => '子项目开启并填写两字效果最佳',
		),
		array(
			'id'      => 'label_hotgif',
			'type'    => 'switcher',
			'label'   => '开启显示/关闭隐藏',
			'title'   => 'HOT小标',
		),
		array(
			'id'      => 'label_new',
			'type'    => 'switcher',
			'label'   => '开启显示/关闭隐藏（标签同时只能启用一个）',
			'title'   => 'NEW标签',
			'subtitle'=> '主菜单开启效果最佳（仅在电脑端显示）',
		),
		array(
			'id'      => 'label_hot',
			'type'    => 'switcher',
			'label'   => '开启显示/关闭隐藏（标签同时只能启用一个）',
			'title'   => 'HOT标签',
			'subtitle'=> '主菜单开启效果最佳（仅在电脑端显示）',
		),
		array(
			'id'      => 'dot_lanse',
			'type'    => 'switcher',
			'label'   => '开启显示/关闭隐藏（圆圈同时只能启用一个）',
			'title'   => '蓝色圆圈',
			'subtitle'=> '子项目开启效果最佳',
		),
		array(
			'id'      => 'dot_lv',
			'type'    => 'switcher',
			'label'   => '开启显示/关闭隐藏（圆圈同时只能启用一个）',
			'title'   => '绿色圆圈',
			'subtitle'=> '子项目开启效果最佳',
		),
		array(
			'id'      => 'dot_huangse',
			'type'    => 'switcher',
			'label'   => '开启显示/关闭隐藏（圆圈同时只能启用一个）',
			'title'   => '黄色圆圈',
			'subtitle'=> '子项目开启效果最佳',
		),
		array(
			'id'      => 'dot_hongse',
			'type'    => 'switcher',
			'label'   => '开启显示/关闭隐藏（圆圈同时只能启用一个）',
			'title'   => '红色圆圈',
			'subtitle'=> '子项目开启效果最佳',
		),
		array(
			'id'      => 'dot_purple',
			'type'    => 'switcher',
			'label'   => '开启显示/关闭隐藏（圆圈同时只能启用一个）',
			'title'   => '紫色圆圈',
			'subtitle'=> '子项目开启效果最佳',
		),
    )
));