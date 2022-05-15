<?php if (!defined('ABSPATH')) {die;} // Cannot access directly.
/**
 * 利熙网子主题设置[www.liitk.com]
 * 下载使用，唯一购买地址：https://www.liitk.com/
**/

// 获取本周更新文章数量 调用方式：<?php echo get_week_post_count(); ?删除>
function get_week_post_count(){
$date_query = array(
array(
'after'=>'1 week ago'
)
);$args = array(
'post_type' => 'post',
'post_status'=>'publish',
'date_query' => $date_query,
'no_found_rows' => true,
'suppress_filters' => true,
'fields'=>'ids',
'posts_per_page'=>-1
);$query = new WP_Query( $args );return $query->post_count;
}
// 获取每日更新文章数量 调用方式：<?php echo WeeklyUpdate(); ?删除>
function WeeklyUpdate() {
$today = getdate();
$query = new WP_Query( 'year=' . $today["year"] . '&monthnum=' . $today["mon"] . '&day=' . $today["mday"]);
$postsNumber = $query->found_posts;
echo $postsNumber;
}

// 导航分类栏目统计
if (_cao('is_zcdlmtj_lixui','true')){
function wt_get_category_count($cat_ID) {
	$category = get_category($cat_ID);
	return $category->count;
}
}
if (_cao('is_zcdlmtj_lixui','true')){
function mbxzb_nav_items_num( $items,$args ) {
	if(isset($args->theme_location) && $args->theme_location == 'menu-1') {
		foreach ( $items as $key=>$item ) {
			if($item->object == 'category') {
				//$cat = get_category_by_slug($slug);
				$catID = isset($item->object_id) ? $item->object_id : false;
				if($catID && $item->post_parent!=0) {
					$a=wt_get_category_count($catID);
					$items[$key]->title.= '<span class="lixui-num">'.$a.'</span>';
				}
			}
		}
	}
	return $items;
}
add_filter( 'wp_nav_menu_objects', 'mbxzb_nav_items_num',10,2 );
}

// 底部悬浮游客登录提示
function curPageURL() 
{
    $pageURL = 'http';

    if ($_SERVER["HTTPS"] == "on") 
    {
        $pageURL .= "s";
    }
    $pageURL .= "://";

    $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    return $pageURL;
}

// 文章内容页Banner标题分类显示加链接最多显示3个
function _get_post_category($max = 1) {
    $categories = get_the_category();
    $cat = '';
    foreach ($categories as $key => $category) {
        if ($key == 3) {break;}
        $cat .= '<a' . _target_blank() . ' href="' . get_category_link($category->term_id) . '" rel="category">' . $category->name . '</a>';
    }
    return $cat;
}

$lixui_prefix = '_caozhuti_options';

$lixui_tip    = ' 利熙网子主题LiXUI基于RiPro主题由(liitk.com)二次美化开发的子主题；利熙网子主题设置前<a href="https://www.liitk.com/" target="_blank">请点击查看教程</a>。';

$lixui_top    = ' <span class="badge badge-radius badge-danger" style="background-color:#0099FF;">Top</span>';
$lixui_list   = ' <span class="badge badge-radius badge-danger" style="background-color:#0099FF;">List</span>';
$lixui_inside = ' <span class="badge badge-radius badge-danger" style="background-color:#0099FF;">Inside</span>';
$lixui_anchor = ' <span class="badge badge-radius badge-danger" style="background-color:#0099FF;">Anchor</span>';
$lixui_bottom = ' <span class="badge badge-radius badge-danger" style="background-color:#0099FF;">Bottom</span>';
$lixui_other  = ' <span class="badge badge-radius badge-danger" style="background-color:#0099FF;">Other</span>'; 

$lixui_mod    = ' <span class="badge badge-radius badge-danger" style="background-color:#FF9900;">Mod</span>';
$lixui_page   = ' <span class="badge badge-radius badge-danger" style="background-color:#FF6633;">Page</span>';
$lixui_plugin = ' <span class="badge badge-radius badge-danger" style="background-color:#27ae60;">Plugin</span>';

//
// 利熙网子主题选项设置
//
CSF::createSection($lixui_prefix, array(
    'id'    => 'lixui-chlid',
    'title' => '子主题设置',
    'icon'  => 'fa fa-cogs',
));

// 顶部设置
CSF::createSection($lixui_prefix, array(
    'parent' => 'lixui-chlid',
    'title'  => '顶部设置'.$lixui_top,
    'icon'   => 'fa fa-chevron-circle-up',
    'description' => ''.$lixui_tip,
    'fields' => array(
        //全局顶部栏设置
        array(
            'id'         => 'is_dltgljk_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '全局顶部栏设置控制',
            'label'      => '全局顶部栏目开关控制，左上侧通告和右上侧链接块，仅在电脑端显示',
            'default'    => true,
        ),
        array(
            'id'         => 'site_dltgljk_lixui',
            'type'       => 'fieldset',
            'title'      => '顶栏左侧通告设置',
            'fields'     => array(
                array(
                    'id'         => 'lixui_tgtb_icon',
                    'type'       => 'icon',
                    'title'      => '通告图标',
                    'label'      => '填写顶栏左侧通告图标',
                    'default'    => 'fa fa-volume-up',
                ),
                array(
                    'id'         => 'lixui_tgbt_text',
                    'type'       => 'text',
                    'title'      => '通告标题',
                    'label'      => '填写顶栏左侧通告标题',
                    'default'    => '最新公告',
                ),
                array(
                    'id'         => 'lixui_tgnr_text',
                    'type'       => 'code_editor',
                    'title'      => '通告内容HTML代码',
                    'subtitle'   => '自定义填写HTML代码，也可以留空则不显示',
                    'default'    => '<li>欢迎您光临利熙网，本站秉承服务宗旨 履行“站长”责任，分享只是起点 服务永无止境！<a href="/svip" target="_blank" style="font-size: 12px;color: #00CCFF">立即加入</a></li>',
                ),
            ),
            'dependency' => array('is_dltgljk_lixui', '==', 'true'),
        ),
        array(
          'id'        => 'site_dlycljk_lixui_group',
          'type'      => 'group',
          'title'     => '顶栏右侧链接块设置',
          'desc'      => '顶栏右侧链接块',
          'max'       => '6',
          'fields'    => array(
			array(
                'id'    => '_title',
                'type'  => 'text',
                'title' => '链接标题',
                'label' => '填写标题内容',
                'default' => '文字标题',
            ),
            array(
                'id'    => '_icon',
                'type'  => 'icon',
                'title' => '字体图标',
                'label' => '填写字体图标',
                'default' => 'fa fa-home',
            ),
            array(
                'id'    => '_link',
                'type'  => 'text',
                'title' => '链接地址',
                'label' => '填写标题链接',
                'default' => 'https://www.liitk.com/',
            ),
            array(
                'id'      => '_blank',
                'type'    => 'switcher',
                'title'   => '新窗口打开',
                'label'   => '是否新建标签窗口页',
                'sanitize' => true,
            ),
        ),
        'default'    => [
                ['_title' => '专题分类', '_icon' => 'fa fa-star', '_link' => '/topics', '_blank' => 'true'],
                ['_title' => '标签云集', '_icon' => 'fa fa-tags', '_link' => '/tags', '_blank' => 'true'],
                ['_title' => '文章存档', '_icon' => 'fa fa-file-text', '_link' => '/archives', '_blank' => 'true'],
                ['_title' => '链接申请', '_icon' => 'fa fa-link', '_link' => '/link-apply', '_blank' => 'true'],
                ['_title' => '联系我们', '_icon' => 'fa fa-exclamation-circle', '_link' => 'https://wpa.qq.com/msgrd?v=3&uin=1576384173', '_blank' => 'true'],
            ],
        'dependency' => array('is_dltgljk_lixui', '==', 'true'),
        ),
        //导航分类栏目统计
        array(
            'id'         => 'is_zcdlmtj_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '导航分类栏目统计',
            'label'      => '导航二级菜单的文章数量统计，自适应显示',
            'default'    => true,
        ),
        //导航风格选择
        array(
			'id'         => 'site_dhxz_lixui',
			'type'       => 'image_select',
			'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
			'title'      => '导航美化风格选择',
			'subtitle'   => '风格1：RIPRO<br>风格2：CMS',
			'inline'     => true,
			'options'    => array(
				'ripro'     => get_stylesheet_directory_uri(). '/assets/images/navbarripro.jpg',
				'lixuicms'  => get_stylesheet_directory_uri(). '/assets/images/navbarcms.jpg',
			),
			'default'    => 'ripro',
		),
        array(
            'id'         => 'is_logoslwz_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => 'LOGO右侧双栏文字',
            'label'      => 'LOGO右侧简介文字（风格2：CMS），仅在电脑端显示',
            'default'    => true,
        ),
        array(
            'id'         => 'site_logoslwz_lixui',
            'type'       => 'fieldset',
            'title'      => 'LOGO双栏内容设置',
            'fields'     => array(
                array(
                    'id'         => 'lixui_lgslwz1_text',
                    'type'       => 'text',
                    'title'      => '上方内容(建议3-4个字)',
                    'label'      => '填写上方显示内容',
                    'default'    => '利熙网',
                ),
                array(
                    'id'         => 'lixui_lgslwz2_text',
                    'type'       => 'text',
                    'title'      => '下方内容(建议6-13个字)',
                    'label'      => '填写下方显示内容',
                    'default'    => '一个专注分享优质资源的平台！',
                ),
            ),
            'dependency' => array('is_logoslwz_lixui', '==', 'true'),
        ),
        array(
            'id'         => 'is_dhdbssk_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '导航顶部搜索框',
            'label'      => '导航菜单上的全站搜索框（风格2：CMS），仅在电脑端显示',
            'default'    => true,
        ),
        array(
            'id'         => 'site_dhdbssk_lixui',
            'type'       => 'fieldset',
            'title'      => '搜索框内容设置',
            'fields'     => array(
                array(
                    'id'         => 'lixui_sskms_text',
                    'type'       => 'text',
                    'title'      => '描述内容(建议6-18个字)',
                    'label'      => '填写搜索框内的描述内容',
                    'default'    => '输入关键词，回车搜索全站资源...',
                ),
            ),
            'dependency' => array('is_dhdbssk_lixui', '==', 'true'),
        ),
        array(
            'id'         => 'is_dhdbsskycan_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '搜索框右侧按钮',
            'label'      => '开启此按钮需开启搜索框（风格2：CMS），仅在电脑端显示',
            'default'    => false,
        ),
        array(
            'id'         => 'site_dhdbsskycan_lixui',
            'type'       => 'fieldset',
            'title'      => '右侧按钮设置',
            'fields'     => array(
                array(
                    'id'      => 'lixui_ycan_icon',
                    'type'    => 'icon',
                    'title'   => '按钮图标',
                    'label'   => '填写字体图标',
                    'default' => 'fa fa-gift',
                ),
                array(
                    'id'      => 'lixui_ycan_text',
                    'type'    => 'text',
                    'title'   => '按钮信息',
                    'label'   => '填写按钮标题',
                    'default' => '文本内容',
                ),
				array(
                    'id'      => 'lixui_ycan_link',
                    'type'    => 'text',
                    'title'   => '按钮链接',
                    'label'   => '填写按钮链接',
                    'default' => 'https://www.liitk.com/',
                ),
				array(
                    'id'      => 'lixui_ycan_img',
                    'type'    => 'upload',
                    'title'   => '按钮图片',
                    'desc'    => '最佳尺寸(69x69)，不填则不显示',
                    'default' => '/wp-content/themes/lixui-chlid/assets/images/lixui-icon-server.png',
                ),
            ),
            'dependency' => array('is_dhdbsskycan_lixui', '==', 'true'),
        ),
        array(
            'id'         => 'is_dhcdxt_lixui1',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '导航菜单上线条',
            'label'      => '导航菜单的上线条（风格2：CMS），仅在电脑端显示',
            'default'    => true,
        ),
        array(
            'id'         => 'is_dhcdxt_lixui2',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '导航菜单下线条',
            'label'      => '导航菜单的下线条（风格2：CMS），仅在电脑端显示',
            'default'    => true,
        ),
        array(
            'id'         => 'is_dhcdbt_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '导航菜单标题',
            'label'      => '导航菜单首标题块（风格2：CMS），仅在电脑端显示',
            'default'    => true,
        ),
		array(
            'id'         => 'site_dhcdbt_lixui',
            'type'       => 'fieldset',
            'title'      => '导航菜单标题设置',
            'fields'     => array(
                array(
                    'id'         => 'lixui_cdtb_icon',
                    'type'       => 'icon',
                    'title'      => '按钮图标',
                    'label'      => '填写字体图标',
                    'default'    => 'fa fa-internet-explorer',
                ),
                array(
                    'id'         => 'lixui_cdbt_text',
                    'type'       => 'text',
                    'title'      => '菜单标题',
                    'label'      => '填写标题内容',
                    'default'    => '利熙资源平台',
                ),
				array(
                    'id'         => 'lixui_cdlj_link',
                    'type'       => 'text',
                    'title'      => '菜单链接',
                    'label'      => '填写标题链接',
                    'default'    => 'https://www.liitk.com/',
                ),
            ),
            'dependency' => array('is_dhcdbt_lixui', '==', 'true'),
        ),
        
    ),
));

// 列表设置
CSF::createSection($lixui_prefix, array(
    'parent' => 'lixui-chlid',
    'title'  => '列表设置'.$lixui_list,
    'icon'   => 'fa fa-list-alt',
    'description' => ''.$lixui_tip,
    'fields' => array(
        //分类列表栏波浪
        array(
            'id'         => 'is_dllblbl_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '分类列表栏波浪',
            'label'      => '分类列表栏的底部波浪设置，自适应显示',
            'default'    => true,
        ),
		//分类筛选顶部栏
        array(
            'id'         => 'is_fllbdbl_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '分类筛选顶部栏',
            'label'      => '分类列表的顶部栏设置，自适应显示',
            'default'    => true,
        ),
        array(
            'id'         => 'site_fllbdbl_lixui',
            'type'       => 'fieldset',
            'title'      => '筛选顶栏标题设置',
            'subtitle'   => '筛选顶部栏的左侧标题',
            'fields'     => array(
                array(
                    'id'         => 'lixui_dlbt1_text',
                    'type'       => 'text',
                    'title'      => '首标题',
                    'label'      => '填写标题内容',
                    'default'    => '会员专享优质资源',
                ),
                array(
                    'id'         => 'lixui_dlbt2_text',
                    'type'       => 'text',
                    'title'      => '副标题',
                    'label'      => '填写标题内容',
                    'default'    => '内容持续上新',
                ),
            ),
            'dependency' => array('is_fllbdbl_lixui', '==', 'true'),
        ),
        array(
            'id'         => 'site_fllbdbl_lixui',
            'type'       => 'fieldset',
            'title'      => '筛选顶栏按钮设置',
            'subtitle'   => '筛选顶部栏的右侧按钮',
            'fields'     => array(
                array(
                    'id'         => 'lixui_fllbdlan_switch',
                    'type'       => 'switcher',
                    'title'      => '按钮控制',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
				array(
                    'id'         => 'lixui_fldblan_icon',
                    'type'       => 'icon',
                    'title'      => '按钮图标',
                    'label'      => '填写字体图标',
                    'default'    => 'fa fa-gift',
                ),
                array(
                    'id'         => 'lixui_fldblan_text',
                    'type'       => 'text',
                    'title'      => '按钮标题',
                    'label'      => '填写标题内容',
                    'default'    => '升级会员无限免费下载',
                ),
                array(
                    'id'         => 'lixui_fldblan_link',
                    'type'       => 'text',
                    'title'      => '按钮链接',
                    'label'      => '填写标题链接',
                    'default'    => '/user?action=vip',
                ),
            ),
            'dependency' => array('is_fllbdbl_lixui', '==', 'true'),
        ),
        array(
            'id'         => 'site_fllbdbl_lixui',
            'type'       => 'fieldset',
            'title'      => '筛选顶栏搜索框设置',
            'subtitle'   => '此搜索框只搜索当前所在分类的文章',
            'fields'     => array(
                array(
                    'id'         => 'lixui_fllbdlss_switch',
                    'type'       => 'switcher',
                    'title'      => '搜索框控制',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
                array(
                    'id'         => 'lixui_flsskms_text',
                    'type'       => 'text',
                    'title'      => '描述内容(建议6-18个字)',
                    'label'      => '填写搜索框内的描述内容',
                    'default'    => '输入关键词，回车搜索当前分类...',
                ),
            ),
            'dependency' => array('is_fllbdbl_lixui', '==', 'true'),
        ),
        //资源下载类型判断角标
        array(
            'id'         => 'is_zyxzpdtb_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '资源下载类型判断角标',
            'label'      => '文章封面左上角资源的下载类型图标，自适应显示',
            'default'    => true,
        ),
        //列表布局MAC小圆点角标
        array(
            'id'         => 'is_csxydjb_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '列表布局MAC小圆点角标',
            'label'      => '列表布局模式的右上角彩色小圆点角标，自适应显示',
            'default'    => true,
        ),
        
    ),
));

// 内页设置
CSF::createSection($lixui_prefix, array(
    'parent' => 'lixui-chlid',
    'title'  => '内页设置'.$lixui_inside,
    'icon'   => 'fa fa-bookmark',
    'description' => ''.$lixui_tip,
    'fields' => array(
        //Banner标题设置
        array(
            'id'         => 'is_nrybannerbt_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => 'Banner标题',
            'label'      => '顶部Banner文章标题，自适应显示',
            'default'    => true,
        ),
        array(
            'id'         => 'site_nrybannerbt_lixui',
            'type'       => 'fieldset',
            'title'      => 'Banner标题设置',
            'fields'     => array(
                array(
                    'id'         => 'lixui_bannerbgwzt_switch',
                    'type'       => 'switcher',
                    'title'      => '背景获取为文章首图',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
                array(
                    'id'         => 'lixui_bannerbg_img',
                    'type'       => 'upload',
                    'title'      => '背景自定义设置图片',
                    'desc'       => '输入图片地址',
                    'default'    => '/wp-content/themes/lixui-chlid/assets/images/lixui-comvip-banner.png',
                ),
                array(
                    'id'         => 'lixui_bannerfl_switch',
                    'type'       => 'switcher',
                    'title'      => '所在分类',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
                array(
                    'id'         => 'lixui_bannerrq_switch',
                    'type'       => 'switcher',
                    'title'      => '发布日期',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
                array(
                    'id'         => 'lixui_bannerll_switch',
                    'type'       => 'switcher',
                    'title'      => '浏览数量',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
                array(
                    'id'         => 'lixui_bannerpl_switch',
                    'type'       => 'switcher',
                    'title'      => '评论数量',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
                array(
                    'id'         => 'lixui_bannerzz_switch',
                    'type'       => 'switcher',
                    'title'      => '作者主页',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
                array(
                    'id'         => 'lixui_bannerbd_switch',
                    'type'       => 'switcher',
                    'title'      => '帮助收录',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => false,
                ),
				array(
                    'id'         => 'lixui_bannerbl_switch',
                    'type'       => 'switcher',
                    'title'      => '底部波浪',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
            ),
            'dependency' => array('is_nrybannerbt_lixui', '==', 'true'),
        ),
        //正文顶栏
        array(
            'id'        => 'is_nryzwlzwnr_lixui',
            'type'      => 'switcher',
            'help'      => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'     => '正文顶栏',
            'label'     => '内容文本栏上正文内容标题，若开启下载美化请关闭此项，自适应显示',
            'default'   => false,
        ),
        array(
            'id'         => 'site_nryzwlzwnr_lixui',
            'type'       => 'fieldset',
            'title'      => '正文顶栏设置',
            'subtitle'   => '正文栏左上角标题',
            'fields'     => array(
                array(
                    'id'         => 'lixui_nryzwlzwnr_text',
                    'type'       => 'text',
                    'title'      => '左侧标题',
                    'default'    => '正文内容',
                ),
                array(
                    'id'         => 'lixui_nryzwlzwnr_switch',
                    'type'       => 'switcher',
                    'title'      => '右侧圆点',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
            ),
            'dependency' => array('is_nryzwlzwnr_lixui', '==', 'true'),
        ),
        //常见问题
        array(
            'id'         => 'is_nryfqa_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '常见问题',
            'label'      => '文章内容结尾常见问题FQA，自适应显示',
            'default'    => true,
        ),
        array(
          'id'        => 'site_nryfqa_lixui',
          'type'      => 'group',
          'title'     => '常见问题FQA设置',
          'max'       => '10',
          'fields'    => array(
			array(
                'id'    => '_title',
                'type'  => 'text',
                'title' => '问题',
                'label' => '填写问题内容',
                'default' => '问题标题',
            ),
            array(
                'id'    => '_text',
                'type'  => 'text',
                'title' => '回答',
                'label' => '填写回答内容',
                'default' => '回答内容',
            ),
            array(
                'id'      => '_block',
                'type'    => 'switcher',
                'title'   => '展开问题',
                'label'   => '是否展开问题',
                'default' => false,
            ),
        ),
        'default'    => [
                ['_title' => '免费下载或者专享资源能否直接商用？', '_text' => '本站所有资源版权均属于原作者所有，这里所提供资源均只能用于参考学习用，请勿直接商用（除特别注明外）。若由于商用引起版权纠纷，一切责任均由使用者承担。', '_block' => 'true'],
                ['_title' => '压缩包下载完解压出错或打开失败？', '_text' => '最常见的情况是下载不完整：可对比下载的压缩包与网盘上的容量，若小于网盘提示的容量则是这个原因。这是浏览器下载BUG，重新下载即可。若排除这种情况，可在对应资源底部留言或联络客服。', '_block' => ''],
                ['_title' => '找不到素材资源介绍文章里的示例图片？', '_text' => '部分素材的文章内用于介绍的图片通常并不包含在对应可供下载素材包内。这些相关商业的图片需另外购买，并且本站不负责（也没有办法）找到出处。', '_block' => ''],
            ],
        'dependency' => array('is_nryfqa_lixui', '==', 'true'),
        ),
        //服务介绍块
        array(
            'id'         => 'is_nryfwjsk_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '服务介绍块',
            'label'      => '底部服务介绍块，仅在电脑端显示',
            'default'    => false,
        ),
        array(
            'id'         => 'site_nryfwjsk_lixui',
            'type'       => 'fieldset',
            'title'      => '服务介绍块设置',
            'fields'     => array(
                array(
                    'id'         => 'lixui_fw_text',
                    'type'       => 'text',
                    'title'      => '服务介绍标题',
                    'label'      => '整块服务标题',
                    'default'    => '网站服务',
                ),
				array(
                    'id'         => 'lixui_fw1_switch',
                    'type'       => 'switcher',
                    'title'      => '售后服务控制',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
				array(
                    'id'         => 'lixui_fw2_switch',
                    'type'       => 'switcher',
                    'title'      => '增值服务控制',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
				array(
                    'id'         => 'lixui_fw3_switch',
                    'type'       => 'switcher',
                    'title'      => '服务时间控制',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
                array(
                    'id'         => 'lixui_fw4_switch',
                    'type'       => 'switcher',
                    'title'      => '免责声明控制',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
           ),
            'dependency' => array('is_nryfwjsk_lixui', '==', 'true'),
        ),
        array(
            'id'         => 'site_nryfwjsk_lixui',
            'type'       => 'fieldset',
            'title'      => '售后服务设置',
            'fields'     => array(
                array(
                    'id'         => 'lixui_fw1_text',
                    'type'       => 'text',
                    'title'      => '售后服务标题',
                    'label'      => '填写服务标题',
                    'default'    => '售后服务范围',
                ),
				array(
                    'id'         => 'lixui_fw11_text',
                    'type'       => 'text',
                    'title'      => '售后服务内容①',
                    'label'      => '填写服务内容',
                    'default'    => '1、商业模板使用范围内问题免费咨询',
                ),
				array(
                    'id'         => 'lixui_fw12_text',
                    'type'       => 'text',
                    'title'      => '售后服务内容②',
                    'label'      => '填写服务内容',
                    'default'    => '2、源码安装、模板安装（一般 ¥XX-XXX）服务答疑仅限SVIP用户',
                ),
				array(
                    'id'         => 'lixui_fw13_text',
                    'type'       => 'text',
                    'title'      => '售后服务内容③',
                    'label'      => '填写服务内容',
                    'default'    => '3、单价超过XXX元的模板免费一次安装，需提供服务器信息。',
                ),
           ),
            'dependency' => array('is_nryfwjsk_lixui', '==', 'true'),
        ),
        array(
            'id'         => 'site_nryfwjsk_lixui',
            'type'       => 'fieldset',
            'title'      => '增值服务设置',
            'fields'     => array(
                array(
                    'id'         => 'lixui_fw2_text',
                    'type'       => 'text',
                    'title'      => '增值服务标题',
                    'label'      => '填写服务标题',
                    'default'    => '付费增值服务',
                ),
				array(
                    'id'         => 'lixui_fw21_text',
                    'type'       => 'text',
                    'title'      => '增值服务内容①',
                    'label'      => '填写服务内容',
                    'default'    => '1、提供dedecms模板、WordPress主题、discuz模板优化等服务请详询在线客服',
                ),
				array(
                    'id'         => 'lixui_fw22_text',
                    'type'       => 'text',
                    'title'      => '增值服务内容②',
                    'label'      => '填写服务内容',
                    'default'    => '2、承接 WordPress、DedeCMS、Discuz 等系统建站、仿站、开发、定制等服务',
                ),
				array(
                    'id'         => 'lixui_fw23_text',
                    'type'       => 'text',
                    'title'      => '增值服务内容③',
                    'label'      => '填写服务内容',
                    'default'    => '3、服务器环境配置（一般 ¥XX-XXX）',
                ),
				array(
                    'id'         => 'lixui_fw24_text',
                    'type'       => 'text',
                    'title'      => '增值服务内容④',
                    'label'      => '填写服务内容',
                    'default'    => '4、网站中毒处理（需额外付费，XXX元/次/质保三个月）',
                ),
           ),
            'dependency' => array('is_nryfwjsk_lixui', '==', 'true'),
        ),
        array(
            'id'         => 'site_nryfwjsk_lixui',
            'type'       => 'fieldset',
            'title'      => '服务时间设置',
            'fields'     => array(
                array(
                    'id'         => 'lixui_fw3_text',
                    'type'       => 'text',
                    'title'      => '服务时间标题',
                    'label'      => '填写服务标题',
                    'default'    => '售后服务时间',
                ),
				array(
                    'id'         => 'lixui_fw31_text',
                    'type'       => 'text',
                    'title'      => '服务时间内容',
                    'label'      => '填写服务内容',
                    'default'    => '周一至周日（法定节假日除外）09:00-20:00',
                ),
           ),
            'dependency' => array('is_nryfwjsk_lixui', '==', 'true'),
        ),
        array(
            'id'         => 'site_nryfwjsk_lixui',
            'type'       => 'fieldset',
            'title'      => '免责声明设置',
            'fields'     => array(
                array(
                    'id'         => 'lixui_fw4_text',
                    'type'       => 'text',
                    'title'      => '免责声明标题',
                    'label'      => '填写服务标题',
                    'default'    => '附件免责声明',
                ),
				array(
                    'id'         => 'lixui_fw41_text',
                    'type'       => 'text',
                    'title'      => '免责声明内容',
                    'label'      => '填写服务内容',
                    'default'    => '本站所提供的模板（主题/插件）等资源仅供学习交流，若使用商业用途，请购买正版授权，否则产生的一切后果将由下载用户自行承担，有部分资源为网上收集或仿制而来，若模板侵犯了您的合法权益，请来信通知我们（Email: admin@liitk.com），我们会及时删除，给您带来的不便，我们深表歉意！',
                ),
           ),
            'dependency' => array('is_nryfwjsk_lixui', '==', 'true'),
        ),
        //联系客服块设置
        array(
            'id'         => 'is_nrylxkfk_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '联系客服块',
            'label'      => '底部联系客服块，仅在电脑端显示',
            'default'    => true,
        ),
        array(
            'id'         => 'site_nrylxkfk_lixui',
            'type'       => 'fieldset',
            'title'      => '联系客服块设置',
            'fields'     => array(
                array(
                    'id'         => 'lixui_1_text',
                    'type'       => 'text',
                    'title'      => '描述内容',
                    'label'      => '填写描述内容',
                    'default'    => 'Hi，如果你对这个资源有疑问，可以跟我联系哦！',
                ),
				array(
                    'id'         => 'lixui_2_text',
                    'type'       => 'text',
                    'title'      => '按钮标题',
                    'label'      => '填写标题内容',
                    'default'    => '联系客服',
                ),
				array(
                    'id'         => 'lixui_1_link',
                    'type'       => 'text',
                    'title'      => '按钮链接',
                    'label'      => '输入按钮链接',
                    'default'    => 'https://wpa.qq.com/msgrd?v=3&uin=1576384173',
                ),
           ),
            'dependency' => array('is_nrylxkfk_lixui', '==', 'true'),
        ),
        
    ),
));

// 侧边栏锚点设置
CSF::createSection($lixui_prefix, array(
    'parent' => 'lixui-chlid',
    'title'  => '侧栏锚点'.$lixui_anchor,
    'icon'   => 'fa fa-square',
    'description' => ''.$lixui_tip,
    'fields' => array(
        //侧边栏锚点菜单设置
        array(
            'id'         => 'is_cblmd_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '侧边栏锚点',
            'label'      => '全站侧边栏客服等信息，仅在电脑端显示',
            'default'    => true,
        ),
        array(
            'type'       => 'notice',
            'style'      => 'success',
            'content'    => '全站侧边栏锚点的所有按钮都可在下方独立设置显示of隐藏单个按钮，除签到按钮需在“用户中心-关闭签到功能-按钮不显示”，发布按钮则在“基本设置-关闭所有人都可投稿-按钮不显示”。',
            'dependency' => array('is_cblmd_lixui', '==', 'true'),
        ),
        array(
            'id'         => 'site_cblmd_lixui',
            'type'       => 'fieldset',
            'title'      => '侧边栏锚点菜单设置',
            'fields'     => array(
                //侧边栏锚点圆球按钮显示控制开关
                array(
                    'id'         => 'lixui_cblmd-ball-button_switch',
                    'type'       => 'switcher',
                    'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
                    'title'      => '圆球按钮控制',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
                array(
                    'id'         => 'lixui_yq_icon',
                    'type'       => 'icon',
                    'title'      => '圆球按钮图标',
                    'label'      => '填写字体图标',
                    'default'    => 'fa fa-diamond',
                ),
                array(
                    'id'         => 'lixui_yqbt_text',
                    'type'       => 'text',
                    'title'      => '圆球按钮标题',
                    'label'      => '填写标题内容',
                    'default'    => '会员',
                ),
                array(
                    'id'         => 'lixui_yq_link',
                    'type'       => 'text',
                    'title'      => '圆球按钮链接',
                    'label'      => '输入按钮链接',
                    'default'    => '/svip',
                ),
                array(
                    'id'         => 'lixui_yqtcbt_text',
                    'type'       => 'text',
                    'title'      => '圆球弹出标题',
                    'label'      => '填写标题内容',
                    'default'    => '升级尊贵会员',
                ),
                array(
                    'id'         => 'lixui_qynr1_text',
                    'type'       => 'text',
                    'title'      => '弹出显示内容①',
                    'label'      => '填写描述内容',
                    'default'    => '限时钜惠',
                ),
                array(
                    'id'         => 'lixui_qynr2_text',
                    'type'       => 'text',
                    'title'      => '弹出显示内容②',
                    'label'      => '填写描述内容',
                    'default'    => '终身尊贵仅需88元',
                ),
                array(
                    'id'         => 'lixui_tcan_text',
                    'type'       => 'text',
                    'title'      => '弹窗内容按钮',
                    'label'      => '填写按钮内容',
                    'default'    => '立即开通',
                ),
                array(
                    'id'         => 'lixui_tcan_link',
                    'type'       => 'text',
                    'title'      => '内容按钮链接',
                    'label'      => '输入按钮链接',
                    'default'    => '/user?action=vip',
                ),
                array(
                    'id'         => 'lixui_fb_text',
                    'type'       => 'text',
                    'label'      => '基本设置-关闭所有人都可投稿-按钮不显示',
                    'title'      => '发布按钮标题',
                    'default'    => '投稿',
                ),
                //侧边栏锚点客服时间显示控制开关
                array(
                    'id'         => 'lixui_cblmdkfsj_switch',
                    'type'       => 'switcher',
                    'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
                    'title'      => '客服时间按钮控制',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
                array(
                    'id'         => 'lixui_kfsjbt_text',
                    'type'       => 'text',
                    'title'      => '工作时间标题',
                    'label'      => '填写标题内容',
                    'default'    => '工作时间',
                ),
                array(
                    'id'         => 'lixui_kfsj1_text',
                    'type'       => 'text',
                    'title'      => '客服工作日时间',
                    'label'      => '填写描述内容',
                    'default'    => '工作日：09:00 - 20:00',
                ),
                array(
                    'id'         => 'lixui_kfsj2_text',
                    'type'       => 'text',
                    'title'      => '客服节假日时间',
                    'label'      => '填写描述内容',
                    'default'    => '节假日：10:00 - 17:00',
                ),
                //侧边栏锚点QQ客服按钮显示控制开关
                array(
                    'id'         => 'lixui_cblmdqqkf_switch',
                    'type'       => 'switcher',
                    'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
                    'title'      => 'QQ客服按钮控制',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
                array(
                    'id'         => 'lixui_qqkfbt_text',
                    'type'       => 'text',
                    'title'      => 'QQ客服标题',
                    'label'      => '填写标题内容',
                    'default'    => '客服',
                ),
                array(
                    'id'         => 'lixui_qqkf_link',
                    'type'       => 'text',
                    'title'      => 'QQ客服链接',
                    'label'      => '填写QQ账号',
                    'default'    => '1576384173',
                ),
                //侧边栏锚点微信客服按钮显示控制开关
                array(
                    'id'         => 'lixui_cblmdwxkf_switch',
                    'type'       => 'switcher',
                    'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
                    'title'      => '微信客服按钮控制',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
                array(
                    'id'         => 'lixui_wxkfbt_text',
                    'type'       => 'text',
                    'title'      => '微信客服标题',
                    'label'      => '填写标题内容',
                    'default'    => '客服',
                ),
                array(
                    'id'         => 'lixui_wxqr_img',
                    'type'       => 'upload',
                    'title'      => '微信图片地址',
                    'desc'       => '输入图片地址',
                    'default'    => 'https://ae01.alicdn.com/kf/U088b242717de4d7ea157923822d7fbaft.jpg',
                ),
                //侧边栏锚点自定义按钮显示控制开关
                array(
                    'id'         => 'lixui_cblmdzdy_switch',
                    'type'       => 'switcher',
                    'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
                    'title'      => '自定义按钮控制',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => false,
                ),
                array(
                    'id'         => 'lixui_zdy_icon',
                    'type'       => 'icon',
                    'title'      => '自定义图标',
                    'label'      => '填写字体图标',
                    'default'    => 'fa fa-comments',
                ),
                array(
                    'id'         => 'lixui_zdy_text',
                    'type'       => 'text',
                    'title'      => '自定义按钮',
                    'label'      => '填写标题内容',
                    'default'    => '按钮',
                ),
                array(
                    'id'         => 'lixui_zdy_link',
                    'type'       => 'text',
                    'title'      => '自定义链接',
                    'label'      => '输入按钮链接',
                    'default'    => 'https://www.liitk.com/',
                ),
            ),
            'dependency' => array('is_cblmd_lixui', '==', 'true'),
        ),
        //侧边栏锚点博客模式切换按钮显示控制开关
        array(
            'id'         => 'is_lixui_blog_mode',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '博客切换按钮控制',
            'label'      => '开启显示/关闭隐藏',
            'default'    => true,
        ),
        //侧边栏锚点日夜模式切换按钮显示控制开关
        array(
            'id'         => 'is_lixui_dark_mode',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '日夜切换按钮控制',
            'subtitle'   => '包括导航栏的日夜切换按钮',
            'label'      => '开启显示/关闭隐藏',
            'default'    => true,
        ),
        //侧边栏锚点点击全屏切换按钮显示控制开关
        array(
            'id'         => 'is_lixui_screen_mode',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '全屏切换按钮控制',
            'label'      => '开启显示/关闭隐藏',
            'default'    => true,
        ),
            
    ),
));

//底部设置
CSF::createSection($lixui_prefix, array(
    'parent' => 'lixui-chlid',
    'title'  => '底部设置'.$lixui_bottom,
    'icon'   => 'fa fa-chevron-circle-down',
    'description' => ''.$lixui_tip,
    'fields' => array(
		//底部Banner网站统计
        array(
            'id'         => 'is_dbwztj_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => 'Banner网站统计',
            'label'      => '全局底部Banner背景图块中网站统计，仅在电脑端显示',
            'default'    => true,
        ),
        array(
            'id'         => 'site_dbwztj_lixui',
            'type'       => 'fieldset',
            'title'      => 'Banner网站统计图标',
            'subtitle'   => '稳定运行(天)的开始时间在footer.php文件中搜索"2019-04-20"修改即可',
            'fields'     => array(
                array(
                    'id'         => 'lixui_hy_icon',
                    'type'       => 'icon',
                    'title'      => '会员总数',
                    'default'    => 'fa fa-users',
                ),
				array(
                    'id'         => 'lixui_zy_icon',
                    'type'       => 'icon',
                    'title'      => '资源总数',
                    'default'    => 'fa fa-diamond',
                ),
				array(
                    'id'         => 'lixui_bz_icon',
                    'type'       => 'icon',
                    'title'      => '本周发布',
                    'label'      => '填写字体图标',
                    'default'    => 'fa fa-star-o',
                ),
                array(
                    'id'         => 'lixui_jr_icon',
                    'type'       => 'icon',
                    'title'      => '今日发布',
                    'default'    => 'fa fa-pencil-square-o',
                ),
                array(
                    'id'         => 'lixui_pl_icon',
                    'type'       => 'icon',
                    'title'      => '评论总数',
                    'default'    => 'fa fa-comments-o',
                ),
                array(
                    'id'         => 'lixui_yx_icon',
                    'type'       => 'icon',
                    'title'      => '稳定运行',
                    'default'    => 'fa fa-desktop',
                ),
           ),
            'dependency' => array('is_dbwztj_lixui', '==', 'true'),
        ),
        //底部总浏览＆查询请求＆在线人数
        array(
            'id'         => 'is_dbzlllcxqqzxrs_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '总浏览量＆查询请求＆在线人数',
            'label'      => '全局底部总浏览量＆查询请求＆在线人数，自适应显示',
            'default'    => true,
        ),
        array(
            'id'         => 'site_dbzlllcxqqzxrs_lixui',
            'type'       => 'fieldset',
            'title'      => '总浏览量＆查询请求＆在线人数设置',
            'fields'     => array(
                array(
                    'id'         => 'lixui_zlll_switch',
                    'type'       => 'switcher',
                    'title'      => '总浏览量控制',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
                array(
                    'id'         => 'lixui_cxqq_switch',
                    'type'       => 'switcher',
                    'title'      => '查询请求控制',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
                array(
                    'id'         => 'lixui_zxrs_switch',
                    'type'       => 'switcher',
                    'title'      => '在线人数控制',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
           ),
            'dependency' => array('is_dbzlllcxqqzxrs_lixui', '==', 'true'),
        ),
        //底部摆设小插图设置
        array(
            'id'         => 'is_dbbsxct_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '摆设小插图',
            'label'      => '全局底部无用摆设的小插图，自适应显示',
            'default'    => true,
        ),
        array(
            'id'         => 'site_dbbsxct_lixui',
            'type'       => 'fieldset',
            'title'      => '摆设小插图设置',
            'fields'     => array(
                array(
                    'id'      => 'lixui_xct_img',
                    'type'    => 'upload',
                    'title'   => '图片地址',
                    'desc'    => '填写图片地址',
                    'default' => 'https://cdn.jsdelivr.net/gh/moezx/cdn@3.0.8/img/logo/Google.svg',
                ),
                array(
                    'id'      => 'lixui_xct_text',
                    'type'    => 'text',
                    'title'   => '图片尺寸(em)',
                    'label'   => '设置图片尺寸',
                    'default' => '1.7',
                ),
                array(
                    'id'      => 'lixui_xct_link',
                    'type'    => 'text',
                    'title'   => '点击链接',
                    'label'   => '输入点击链接',
                    'default' => 'https://www.liitk.com/',
                ),
            ),
            'dependency' => array('is_dbbsxct_lixui', '==', 'true'),
        ),
        //底部动态翻滚波浪
        array(
            'id'         => 'is_dbdtfgbl_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '动态翻滚波浪',
            'label'      => '全局底部动态翻滚波浪样式，自适应显示',
            'default'    => true,
        ),
        
    ),
));

// 其他设置
CSF::createSection($lixui_prefix, array(
    'parent' => 'lixui-chlid',
    'title'  => '其他设置'.$lixui_other,
    'icon'   => 'fa fa-exclamation-circle',
    'description' => ''.$lixui_tip,
    'fields' => array(
        //登录注册顶部动态大嘴特效
        array(
            'id'         => 'is_dtdztx_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '登录注册动态大嘴',
            'label'      => '登录注册弹出窗口页顶部动态大嘴特效，自适应显示',
            'default'    => true,
        ),
        //悬浮游客登录提示
        array(
            'id'         => 'home_lixui_youke',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '悬浮游客登录提示',
            'label'      => '未登录账号者全局页面底部悬浮跟随，自适应显示',
            'default'    => true,
        ),
        array(
            'id'         => 'lixui_youke_db',
            'type'       => 'fieldset',
            'title'      => '悬浮游客登录提示设置',
            'fields'     => array(
                array(
                    'id'         => 'lixui_youke_dm',
                    'type'       => 'code_editor',
                    'title'      => '未登录提示HTML代码',
                    'subtitle'   => '自定义填写HTML代码，也可以留空则不显示',
                    'default'    => '升级尊贵会员尊享更多特权<a href="/svip" rel="nofollow" title="SVIP">立即升级</a>',
                ),
                array(
                    'id'         => 'lixui_youke_zh',
                    'type'       => 'switcher',
                    'title'      => '账号登录',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
                array(
                    'id'         => 'lixui_youke_qq',
                    'type'       => 'switcher',
                    'title'      => '扣扣登录',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => false,
                ),
                array(
                    'id'         => 'lixui_youke_wx',
                    'type'       => 'switcher',
                    'title'      => '微信登录',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => false,
                ),
            ),
            'dependency' => array('home_lixui_youke', '==', 'true'),
        ),
        //底部手机端菜单
        array(
            'id'      => 'is_lixui_mobile_menu_block',
            'type'    => 'switcher',
            'help'    => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'   => '手机端快捷菜单',
            'label'   => '底栏悬浮，仅在手机端显示',
            'default' => true,
        ),
        //浏览器标题切换
        array(
            'id'         => 'is_llqbtzqh_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '浏览器标题切换',
            'label'      => '当浏览器切换标签窗口时标题自动变更，自适应显示',
            'default'    => false,
        ),
        array(
            'id'         => 'site_llqbtzqh_lixui',
            'type'       => 'fieldset',
            'title'      => '浏览器标题切换设置',
            'fields'     => array(
                array(
                    'id'      => 'lixui_llqbbt1_text',
                    'type'    => 'text',
                    'title'   => '离开窗口标题',
                    'default' => '(つェ⊂) I miss you',
                ),
                array(
                    'id'      => 'lixui_llqbbt2_text',
                    'type'    => 'text',
                    'title'   => '恢复窗口标题',
                    'default' => '(｡･ω･｡) Welcome back',
                ),
            ),
            'dependency' => array('is_llqbtzqh_lixui', '==', 'true'),
        ),
        array(
            'id'      => 'is_zxjybptgy_lixui',
            'type'    => 'switcher',
            'help'    => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'   => '摇摆蒲公英',
            'label'   => '飘荡摇摆蒲公英，仅在电脑端显示',
            'default' => false,
        ),
        
    ),
));

//
// 子主题模块设置
//
CSF::createSection($lixui_prefix, array(
    'id'    => 'lixui-chlid-modular',
    'title' => '子主题模块',
    'icon'  => 'fa fa-puzzle-piece',
));

// 首页模块布局设置
CSF::createSection($lixui_prefix, array(
    'parent'      => 'lixui-chlid-modular',
    'title'       => '首页模块布局设置'.$lixui_mod,
    'icon'        => 'fa fa-window-maximize',
    'description' => ''.$lixui_tip,
    'fields'      => array(
        array(
            'type'    => 'notice',
            'style'   => 'success',
            'content' => '注意：使用子主题必须在此设置首页模块布局，这里模块如果是比较旧的版本升级最新版后不现实新的模块，请重置【当前分区】重新布局拖拽一下，然后再模块参数设置具体参数即可，千万别手贱点击全部重置。',
        ),
        array(
            'id'             => 'lixui_home_mode',
            'type'           => 'sorter',
            'title'          => '',
            'enabled_title'  => '显示的模块',
            'disabled_title' => '隐藏的模块',
            'default'        => array(
                'enabled'  => array(
                    'search'  => '搜索条模块',
                    'catbox'  => '分类滑块模块-风格1',
                    'lastpost' => '最新文章模块',
                ),
                'disabled' => array(
                    'slider'  => '幻灯片模块',
                    'codecdk'  => '卡密发放模块',
                    'ulist'   => '纯标题文章模块',
                    'vip'     => '会员介绍模块',
                    'gridpost'  => '网格文章展示模块',
                    'catbox2' => '分类滑块模块-风格2',
                    'catpost' => '分类CMS文章展模块',
				//模块布局开始-利熙网
					'LiXUi-WidthRollSlide'  => '[LiXUi] 全屏动态幻灯片模块',
					'LiXUi-TinOslide'       => '[LiXUi] 三合一幻灯片模块',
					'LiXUi-NewStats'        => '[LiXUi] 新发滚动统计模块',
					'LiXUi-CmsMenu'         => '[LiXUi] CMS横格菜单模块',
					'LiXUi-VIP'             => '[LiXUi] 会员介绍美化版模块',
				//模块布局结束-利熙网
                ),
            ),
        ),

    ),
));

// 首页模块相关设置
CSF::createSection($lixui_prefix, array(
    'parent' => 'lixui-chlid-modular',
    'title'  => '首页模块相关设置'.$lixui_mod,
    'icon'   => 'fa fa-home',
    'description' => ''.$lixui_tip,
    'fields' => array(
        //最新文章模块顶部栏
        array(
            'id'         => 'is_zxwzdbl_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '最新文章顶部栏',
            'label'      => '最新文章模块顶部栏标题，仅在电脑端显示',
            'default'    => true,
        ),
        array(
            'id'         => 'site_zxwzdbl_lixui',
            'type'       => 'fieldset',
            'title'      => '顶部栏标题设置',
            'fields'     => array(
                array(
                    'id'         => 'lixui_zxbfl1_text',
                    'type'       => 'text',
                    'title'      => '首标题',
                    'label'      => '填写首标题内容',
                    'default'    => 'NEW',
                ),
                array(
                    'id'         => 'lixui_zxbfl2_text',
                    'type'       => 'text',
                    'title'      => '上标题',
                    'label'      => '填写上标题内容',
                    'default'    => '最新',
                ),
                array(
                    'id'         => 'lixui_zxbfl3_text',
                    'type'       => 'text',
                    'title'      => '下标题',
                    'label'      => '填写下标题内容',
                    'default'    => '发布',
                ),
            ),
            'dependency' => array('is_zxwzdbl_lixui', '==', 'true'),
        ),
        //分类CMS文章模块快捷菜单
        array(
            'id'         => 'is_fldlkjcd_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '分类CMS模块快捷菜单',
            'label'      => '分类CMS文章模块顶部栏菜单，自适应显示',
            'default'    => false,
        ),
        array(
          'id'        => 'site_fldlkjcd_lixui',
          'type'      => 'group',
          'title'     => '快捷菜单设置',
          'max'       => '10',
          'fields'    => array(
			array(
                'id'    => '_title',
                'type'  => 'text',
                'title' => '标题',
                'label' => '填写问题内容',
                'default' => '利熙网',
            ),
            array(
                'id'    => '_link',
                'type'  => 'text',
                'title' => '链接',
                'label' => '填写链接地址',
                'default' => 'https://www.liitk.com/',
            ),
            array(
                'id'      => '_blank',
                'type'    => 'switcher',
                'title'   => '新窗口打开',
                'label'   => '是否新建标签窗口页',
                'default' => false,
            ),
        ),
        'default'    => [
                ['_title' => '网络主页站', '_link' => 'https://me.liitk.com/', '_blank' => 'true'],
                ['_title' => '资源分享社', '_link' => 'https://www.liitk.com/', '_blank' => 'true'],
                ['_title' => '在线工具箱', '_link' => 'https://tool.liitk.com/', '_blank' => 'true'],
                ['_title' => 'API接口库', '_link' => 'https://api.liitk.com/', '_blank' => 'true'],
                ['_title' => '自助业务网', '_link' => 'https://shop.liitk.com/', '_blank' => 'true'],
            ],
        'dependency' => array('is_fldlkjcd_lixui', '==', 'true'),
        ),

    ),
));

// 三合一幻灯片模块设置
CSF::createSection($lixui_prefix, array(
    'parent' => 'lixui-chlid-modular',
    'title'  => '三合一幻灯片模块'.$lixui_mod,
    'icon'   => 'fa fa-picture-o',
    'description' => ''.$lixui_tip,
    'fields' => array(
        array(
            'id'         => 'site_shyhdp_lixui',
            'type'       => 'fieldset',
            'title'      => '幻灯片左侧轮播参数配置',
            'fields'     => array(
                array(
                    'id'         => 'is_shyhdp_lixui',
                    'type'       => 'repeater',
                    'title'      => '新建自定义幻灯片',
                    'fields'     => array(
                        array(
                            'id'      => '_Recommend',
                            'type'    => 'text',
                            'title'   => '亮点',
                            'default' => '推荐',
                        ),
                        array(
                            'id'      => '_title',
                            'type'    => 'text',
                            'title'   => '标题',
                            'default' => '利熙网子主题[LiXUi]基于RiPro二次美化的子主题',
                        ),
                        array(
                            'id'          => '_img',
                            'type'        => 'upload',
                            'title'       => '上传幻灯片',
                            'library'     => 'image',
                            'placeholder' => 'http://',
                            'default'     => get_template_directory_uri() . '/assets/images/hero/6.jpg',
                        ),
                        array(
                            'id'      => '_blank',
                            'type'    => 'switcher',
                            'title'   => '新窗口打开链接',
                            'label'   => '',
                            'default' => false,
                        ),
                        array(
                            'id'      => '_href',
                            'type'    => 'text',
                            'title'   => '链接地址',
                            'default' => 'https://www.liitk.com/',
                        ),
                    ),
                ),
            ),
        ),
        array(
            'id'         => 'is_shyhdpxgg_lixui',
            'type'       => 'switcher',
            'help'       => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'      => '三合一幻灯片小图',
            'label'      => '轮播幻灯片右下角小广告图，仅在电脑端显示',
            'default'    => true,
        ),
        array(
            'id'         => 'site_shyhdpxgg_lixui',
            'type'       => 'fieldset',
            'title'      => '三合一右下角默认图',
            'fields'     => array(
                array(
                    'id'         => 'lixui_shyhdpxggmr_switch',
                    'type'       => 'switcher',
                    'title'      => '默认控制',
                    'label'      => '开启显示/关闭隐藏(关闭可用自定图)',
                    'default'    => true,
                ),
            ),
            'dependency' => array('is_shyhdpxgg_lixui', '==', 'true'),
        ),
        array(
            'id'         => 'site_shyhdpxgg_lixui',
            'type'       => 'fieldset',
            'title'      => '默认图＆自定图链接',
            'fields'     => array(
                array(
                    'id'         => 'lixui_shyhdpxgg_link',
                    'type'       => 'text',
                    'title'      => '链接地址',
                    'label'      => '填写链接地址，默认图/自定图',
                    'default'    => 'https://www.liitk.com/',
                ),
            ),
            'dependency' => array('is_shyhdpxgg_lixui', '==', 'true'),
        ),
        array(
            'id'         => 'site_shyhdpxgg_lixui',
            'type'       => 'fieldset',
            'title'      => '三合一右下角自定图',
            'fields'     => array(
                array(
                    'id'         => 'lixui_shyhdpxggzd_switch',
                    'type'       => 'switcher',
                    'title'      => '自定控制',
                    'label'      => '开启显示/关闭隐藏(开启需关默认图)',
                    'default'    => false,
                ),
                array(
                    'id'         => 'lixui_shyhdpxgg_img',
                    'type'       => 'upload',
                    'title'      => '图片地址(185x65)',
                    'desc'       => '填写图片地址',
                    'default'    => '',
                ),
            ),
            'dependency' => array('is_shyhdpxgg_lixui', '==', 'true'),
        ),
        //幻灯片右上侧推荐图
        array(
            'id'         => 'site_shyhdp_left_up_lixui',
            'type'       => 'fieldset',
            'title'      => '幻灯片右上侧推荐',
            'fields'     => array(
                array(
                    'id'         => '_title',
                    'type'       => 'text',
                    'title'      => '右上侧标题',
                    'label'      => '填写上侧标题',
                    'default'    => '利熙网',
                ),
                array(
                    'id'         => '_link',
                    'type'       => 'text',
                    'title'      => '右上侧链接',
                    'label'      => '填写上侧链接',
                    'default'    => 'https://www.liitk.com',
                ),
                array(
                    'id'         => 'dict_ui_banner_up_logo',
                    'type'       => 'upload',
                    'title'      => '右上侧图片',
                    'desc'       => '填写图片地址',
                    'default'    => '/wp-content/themes/lixui-chlid/assets/images/business-shop.png',
                ),
            ),
        ),
        //幻灯片右下侧推荐图
        array(
            'id'         => 'site_shyhdp_left_lower_lixui',
            'type'       => 'fieldset',
            'title'      => '幻灯片右下侧推荐',
            'fields'     => array(
                array(
                    'id'         => '_title',
                    'type'       => 'text',
                    'title'      => '右下侧标题',
                    'label'      => '填写下侧标题',
                    'default'    => '利熙网',
                ),
                array(
                    'id'         => '_link',
                    'type'       => 'text',
                    'title'      => '右下侧链接',
                    'label'      => '填写下侧链接',
                    'default'    => 'https://www.liitk.com',
                ),
                array(
                    'id'         => 'dict_ui_banner_lower_logo',
                    'type'       => 'upload',
                    'title'      => '右下侧图片',
                    'desc'       => '填写图片地址',
                    'default'    => '/wp-content/themes/lixui-chlid/assets/images/film-and-television.png',
                ),
            ),
        ),
        
    ),
));

// 全屏动态幻灯片模块设置
CSF::createSection($lixui_prefix, array(
    'parent' => 'lixui-chlid-modular',
    'title'  => '全屏动态幻灯片模块'.$lixui_mod,
    'icon'   => 'fa fa-picture-o',
    'description' => ''.$lixui_tip,
    'fields' => array(
        array(
            'id'         => 'site_qpdthdp_lixui',
            'type'       => 'fieldset',
            'title'      => '全屏动态滚动幻灯片模块设置',
            'fields'     => array(
                array(
                    'id'         => 'lixui_stimg_img',
                    'type'       => 'upload',
                    'title'      => '封面图地址',
                    'default'    => '/wp-content/themes/lixui-chlid/assets/images/lixui-qklbhd0.png',
                ),
                array(
                    'id'         => 'lixui_bgimg_img',
                    'type'       => 'upload',
                    'title'      => '背景图地址',
                    'default'    => '/wp-content/themes/lixui-chlid/assets/images/lixui-qklbhd00.png',
                ),
                array(
                    'id'         => 'lixui_qpdthdp_switch',
                    'type'       => 'switcher',
                    'title'      => '小图控制',
                    'label'      => '开启显示/关闭隐藏',
                    'default'    => true,
                ),
            ),
        ),
        array(
          'id'        => 'site_shyhdp_group_lixui',
          'type'      => 'group',
          'title'     => '全屏动态滚动幻灯片模块小图',
          'max'       => '10',
          'fields'    => array(
			array(
                'id'    => '_title',
                'type'  => 'text',
                'title' => '标题',
                'default' => '利熙网',
            ),
            array(
                'id'    => '_img',
                'type'  => 'upload',
                'title' => '图片',
                'default' => '利熙网',
            ),
            array(
                'id'    => '_link',
                'type'  => 'text',
                'title' => '链接',
                'default' => 'https://www.liitk.com/',
            ),
            array(
                'id'      => '_blank',
                'type'    => 'switcher',
                'title'   => '新窗口打开',
                'label'   => '是否新建标签窗口页',
                'default' => false,
            ),
        ),
        'default'    => [
                ['_title' => '小图标题①', '_link' => 'https://me.liitk.com/', '_img' => '/wp-content/themes/lixui-chlid/assets/images/lixui-qklbhdxt1.png', '_blank' => 'true'],
                ['_title' => '小图标题②', '_link' => 'https://www.liitk.com/', '_img' => '/wp-content/themes/lixui-chlid/assets/images/lixui-qklbhdxt2.png', '_blank' => 'true'],
                ['_title' => '小图标题③', '_link' => 'https://tool.liitk.com/', '_img' => '/wp-content/themes/lixui-chlid/assets/images/lixui-qklbhdxt3.png', '_blank' => 'true'],
                ['_title' => '小图标题④', '_link' => 'https://api.liitk.com/', '_img' => '/wp-content/themes/lixui-chlid/assets/images/lixui-qklbhdxt4.png', '_blank' => 'true'],
                ['_title' => '小图标题⑤', '_link' => 'https://shop.liitk.com/', '_img' => '/wp-content/themes/lixui-chlid/assets/images/lixui-qklbhdxt5.png', '_blank' => 'true'],
            ],
        ),
        
    ),
));

// 新发滚动统计模块设置
CSF::createSection($lixui_prefix, array(
    'parent' => 'lixui-chlid-modular',
    'title'  => '新发滚动统计模块'.$lixui_mod,
    'icon'   => 'fa fa-volume-up',
    'description' => ''.$lixui_tip,
    'fields' => array(
        array(
            'id'         => 'site_xfgdwztj_lixui',
            'type'       => 'fieldset',
            'title'      => '新发滚动文字设置',
            'fields'     => array(
                array(
                    'id'         => 'lixui_tb_icon',
                    'type'       => 'icon',
                    'title'      => '标题图标',
                    'label'      => '填写字体图标',
                    'default'    => 'fa fa-newspaper-o',
                ),
                array(
                    'id'         => 'lixui_gd_text',
                    'type'       => 'text',
                    'title'      => '图标高度',
                    'label'      => '填写图标高度',
                    'default'    => '7',
                ),
                array(
                    'id'         => 'lixui_bt_text',
                    'type'       => 'text',
                    'title'      => '通知标题',
                    'label'      => '填写标题内容',
                    'default'    => '最新发布',
                ),
                array(
                    'id'         => 'lixui_bg_text',
                    'type'       => 'color',
                    'title'      => '背景颜色',
                    'default'    => '#f0f4ff',
                ),
            ),
        ),
        array(
            'id'         => 'site_xfgdwztj_lixui',
            'type'       => 'fieldset',
            'title'      => '网站统计图片设置',
            'fields'     => array(
                array(
                    'id'         => 'lixui_1_img',
                    'type'       => 'upload',
                    'title'      => '会员总数',
                    'default'    => '/wp-content/themes/lixui-chlid/assets/images/lixui-icon1.png',
                ),
                array(
                    'id'         => 'lixui_2_img',
                    'type'       => 'upload',
                    'title'      => '今日发布',
                    'default'    => '/wp-content/themes/lixui-chlid/assets/images/lixui-icon2.png',
                ),
                array(
                    'id'         => 'lixui_3_img',
                    'type'       => 'upload',
                    'title'      => '本周发布',
                    'default'    => '/wp-content/themes/lixui-chlid/assets/images/lixui-icon3.png',
                ),
                array(
                    'id'         => 'lixui_4_img',
                    'type'       => 'upload',
                    'title'      => '资源总数',
                    'default'    => '/wp-content/themes/lixui-chlid/assets/images/lixui-icon4.png',
                ),
            ),
        ),

    ),
));

// CMS横格菜单模块设置
CSF::createSection($lixui_prefix, array(
    'parent' => 'lixui-chlid-modular',
    'title'  => 'CMS横格菜单模块'.$lixui_mod,
    'icon'   => 'fa fa-th',
    'description' => ''.$lixui_tip,
    'fields' => array(
        array(
            'id'         => 'site_cmsmenumod_lixui',
            'type'       => 'fieldset',
            'title'      => 'CMS菜单模块图片标题',
            'fields'     => array(
                array(
                    'id'         => 'cms2_11_icon',
                    'type'       => 'icon',
                    'title'      => '顶栏图标',
                    'default'    => 'fa fa-coffee',
                ),
				array(
                    'id'         => 'cms2_11_text',
                    'type'       => 'text',
                    'title'      => '顶栏标题',
                    'default'    => '图片按钮',
                ),
				array(
                    'id'         => 'cms2_11_link',
                    'type'       => 'text',
                    'title'      => '顶栏链接',
                    'default'    => '#',
                ),
				array(
                    'id'         => 'cms2_111_down',
                    'type'       => 'text',
                    'title'      => '顶栏副标题',
                    'default'    => '图片按钮副标题',
                ),
           ),
        ),
        array(
          'id'        => 'site_cmsmenumods2_group_lixui',
          'type'      => 'group',
          'title'     => 'CMS菜单模块图片按钮',
          'max'       => '4',
          'fields'    => array(
			array(
                'id'    => '_title',
                'type'  => 'text',
                'title' => '标题',
                'default' => '按钮标题',
            ),
            array(
                'id'    => '_img',
                'type'  => 'upload',
                'title' => '图片',
                'default' => '按钮图片',
            ),
            array(
                'id'    => '_link',
                'type'  => 'text',
                'title' => '链接',
                'default' => '按钮链接',
            ),
            array(
                'id'      => '_blank',
                'type'    => 'switcher',
                'title'   => '新窗口打开',
                'label'   => '是否新建标签窗口页',
                'sanitize' => true,
            ),
        ),
        'default'    => [
                ['_title' => '标题文本①', '_img' => '/wp-content/themes/lixui-chlid/assets/images/lixui-icon1.png', '_link' => '#', '_blank' => 'true'],
                ['_title' => '标题文本②', '_img' => '/wp-content/themes/lixui-chlid/assets/images/lixui-icon2.png', '_link' => '#', '_blank' => 'true'],
                ['_title' => '标题文本③', '_img' => '/wp-content/themes/lixui-chlid/assets/images/lixui-icon3.png', '_link' => '#', '_blank' => 'true'],
                ['_title' => '标题文本④', '_img' => '/wp-content/themes/lixui-chlid/assets/images/lixui-icon4.png', '_link' => '#', '_blank' => 'true'],
            ],
        ),
        array(
            'id'         => 'site_cmsmenumod_lixui',
            'type'       => 'fieldset',
            'title'      => 'CMS菜单模块文字标题',
            'fields'     => array(
                array(
                    'id'         => 'cms2_21_icon',
                    'type'       => 'icon',
                    'title'      => '顶栏图标',
                    'default'    => 'fa fa-briefcase',
                ),
				array(
                    'id'         => 'cms2_21_text',
                    'type'       => 'text',
                    'title'      => '顶栏标题',
                    'default'    => '文字按钮',
                ),
				array(
                    'id'         => 'cms2_21_link',
                    'type'       => 'text',
                    'title'      => '顶栏链接',
                    'default'    => '#',
                ),
				array(
                    'id'         => 'cms2_211_down',
                    'type'       => 'text',
                    'title'      => '顶栏副标题',
                    'default'    => '文字按钮副标题',
                ),
           ),
        ),
        array(
            'id'        => 'site_cmsmenumods2_group2_lixui',
            'type'      => 'group',
            'title'     => 'CMS菜单模块文字按钮',
            'max'       => '8',
            'fields'    => array(
                array(
					'id'    => '_title',
					'type'  => 'text',
					'title' => '标题',
					'default' => '按钮标题',
				),
				array(
					'id'    => '_link',
					'type'  => 'text',
					'title' => '链接',
					'default' => '按钮链接',
				),
				array(
					'id'      => '_style',
					'type'    => 'switcher',
					'title'   => '高亮链接',
					'label'   => '是否显示高亮链接',
					'sanitize' => false,
				),
				array(
					'id'      => '_blank',
					'type'    => 'switcher',
					'title'   => '新窗口打开',
					'label'   => '是否新建标签窗口页',
					'sanitize' => true,
				),
			),
			'default'    => [
					['_title' => '标题文本', '_link' => '#', '_blank' => 'true', '_style' => 'true'],
					['_title' => '标题文本', '_link' => '#', '_blank' => 'true'],
					['_title' => '标题文本', '_link' => '#', '_blank' => 'true'],
					['_title' => '标题文本', '_link' => '#', '_blank' => 'true'],
					['_title' => '标题文本', '_link' => '#', '_blank' => 'true'],
					['_title' => '标题文本', '_link' => '#', '_blank' => 'true'],
					['_title' => '标题文本', '_link' => '#', '_blank' => 'true'],
					['_title' => '标题文本', '_link' => '#', '_blank' => 'true'],
				],
			),
        array(
            'id'         => 'site_cmsmenumod_lixui',
            'type'       => 'fieldset',
            'title'      => 'CMS菜单模块图标标题',
            'fields'     => array(
                array(
                    'id'         => 'cms2_31_icon',
                    'type'       => 'icon',
                    'title'      => '顶栏图标',
                    'default'    => 'fa fa-fire',
                ),
				array(
                    'id'         => 'cms2_31_text',
                    'type'       => 'text',
                    'title'      => '顶栏标题',
                    'default'    => '图标按钮',
                ),
				array(
                    'id'         => 'cms2_31_link',
                    'type'       => 'text',
                    'title'      => '顶栏链接',
                    'default'    => '#',
                ),
				array(
                    'id'         => 'cms2_311_down',
                    'type'       => 'text',
                    'title'      => '顶栏副标题',
                    'default'    => '图标按钮副标题',
                ),
           ),
        ),
        array(
          'id'        => 'site_cmsmenumods2_group3_lixui',
          'type'      => 'group',
          'title'     => 'CMS菜单模块图标按钮',
          'max'       => '4',
          'fields'    => array(
			array(
                'id'    => '_title',
                'type'  => 'text',
                'title' => '标题',
                'default' => '按钮标题',
            ),
            array(
                'id'      => '_icon',
                'type'    => 'icon',
                'title'   => '图标',
                'default' => '',
            ),
            array(
                'id'    => '_link',
                'type'  => 'text',
                'title' => '链接',
                'default' => '按钮链接',
            ),
            array(
                'id'      => '_blank',
                'type'    => 'switcher',
                'title'   => '新窗口打开',
                'label'   => '是否新建标签窗口页',
                'sanitize' => true,
            ),
        ),
        'default'    => [
                ['_title' => '标题文本①', '_link' => '#', '_blank' => 'true', '_icon' => 'fa fa-laptop'],
                ['_title' => '标题文本②', '_link' => '#', '_blank' => 'true', '_icon' => 'fa fa-desktop'],
                ['_title' => '标题文本③', '_link' => '#', '_blank' => 'true', '_icon' => 'fa fa-paper-plane'],
                ['_title' => '标题文本④', '_link' => '#', '_blank' => 'true', '_icon' => 'fa fa-html5'],
            ],
        ),
        array(
            'id'         => 'site_cmsmenumod_lixui',
            'type'       => 'fieldset',
            'title'      => 'CMS菜单模块信息标题',
            'fields'     => array(
                array(
                    'id'         => 'cms2_41_icon',
                    'type'       => 'icon',
                    'title'      => '顶栏图标',
                    'default'    => 'fa fa-gift',
                ),
				array(
                    'id'         => 'cms2_41_text',
                    'type'       => 'text',
                    'title'      => '顶栏标题',
                    'default'    => '最新活动',
                ),
				array(
                    'id'         => 'cms2_41_link',
                    'type'       => 'text',
                    'title'      => '顶栏链接',
                    'default'    => '#',
                ),
				array(
                    'id'         => 'cms2_411_down',
                    'type'       => 'text',
                    'title'      => '顶栏副标题',
                    'default'    => '最新活动福利播报',
                ),
           ),
        ),
        array(
          'id'        => 'site_cmsmenumods2_group4_lixui',
          'type'      => 'group',
          'title'     => 'CMS菜单模块信息按钮',
          'max'       => '2',
          'fields'    => array(
			array(
                'id'    => '_title',
                'type'  => 'text',
                'title' => '标题',
                'default' => '标题',
            ),
            array(
                'id'      => '_subtitle',
                'type'    => 'text',
                'title'   => '副标题',
                'default' => '副标题',
            ),
            array(
                'id'    => '_link',
                'type'  => 'text',
                'title' => '链接',
                'default' => '链接',
            ),
            array(
                'id'      => '_blank',
                'type'    => 'switcher',
                'title'   => '新窗口打开',
                'label'   => '是否新建标签窗口页',
                'sanitize' => true,
            ),
        ),
        'default'    => [
                ['_title' => '周年庆典，终身SVIP限时XX元', '_subtitle' => '立即参与', '_link' => '#', '_blank' => 'true'],
                ['_title' => '赞助会员，开启尊贵特权之体验', '_subtitle' => '支持本站', '_link' => '#', '_blank' => 'true'],
            ],
        ),
        
    ),
));

// 会员介绍美化版模块设置
CSF::createSection($lixui_prefix, array(
    'parent' => 'lixui-chlid-modular',
    'title'  => '会员介绍美化版模块'.$lixui_mod,
    'icon'   => 'fa fa-volume-up',
    'description' => ''.$lixui_tip,
    'fields' => array(
		array(
			'id'      => 'lixui_mrvipms_mod',
			'type'    => 'code_editor',
			'title'   => '默认注册用户描述',
			'default' => '<div class="desc">站内免费资源</div>
<div class="desc">限制每日下载次数</div>
<div class="desc"><strong style="color:red">折扣优惠</strong>：无折扣</div>
<div class="desc"><strong style="color:red">会员权限</strong>：无权限</div>',
		),
		array(
			'id'      => 'lixui_vip_mod',
			'type'    => 'fieldset',
			'help'    => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
			'title'   => '会员介绍模块-美化版',
			'subtitle'=> '首页设置-首页模块布局-[LiXUi]会员介绍模块-美化版，自适应显示',
			'fields'  => array(
				array(
					'id'     => 'lixui_vip_group',
					'type'   => 'group',
					'title'  => '添加介绍',
					'max'    => '3',
					'fields' => array(
						array(
							'id'      => '_time',
							'type'    => 'text',
							'title'   => '时长',
							'default' => '一个月',
						),
						array(
							'id'      => '_price',
							'type'    => 'text',
							'title'   => '价格',
							'default' => '10',
						),
						array(
							'id'      => '_tehui',
							'type'    => 'text',
							'title'   => '优惠信息',
							'default' => '限时优惠', 
						),               
						array(
							'id'      => '_vipms',
							'type'    => 'code_editor',
							'title'   => '描述',
							'default' => '<div class="desc">描述内容</div>
<div class="desc">描述内容</div>
<div class="desc"><strong style="color:red">折扣次数</strong>：有效期内全站随意下载</div>
<div class="desc"><strong style="color:red">会员权限</strong>：VIP只是到期时间不同</div>', 
						),
						array(
							'id'      => '_color',
							'type'    => 'color',
							'title'   => '模块自定义主颜色',
							'default' => '#ff6a6d',
						),
					),
				),
            ),
        ),

    ),
));

//
// 子主题页面设置
//
CSF::createSection($lixui_prefix, array(
    'id'    => 'lixui-chlid-page',
    'title' => '子主题页面',
    'icon'  => 'wp-menu-image dashicons-before dashicons-admin-page',
));
// 会员介绍页面设置
CSF::createSection($lixui_prefix, array(
    'parent' => 'lixui-chlid-page',
    'title'  => '会员介绍页面①'.$lixui_page,
    'icon'   => 'fa fa-diamond',
    'description' => ''.$lixui_tip,
    'fields' => array(
        array(
            'id'         => 'site_hyjs_page_lixui',
            'type'       => 'fieldset',
            'title'      => '会员介绍页面设置',
            'fields'     => array(
                array(
                    'id'         => 'lixui_hyjsbt_text',
                    'type'       => 'text',
                    'title'      => '简介标题',
                    'desc'       => '填写简介标题',
                    'default'    => '开通尊贵独享海量特权',
                ),
                array(
                    'id'         => 'lixui_hyjsjj_text',
                    'type'       => 'textarea',
                    'title'      => '简介描述',
                    'desc'       => '填写简介描述',
                    'default'    => '现在努力只为，不再仰望大神的后背！',
                ),
                array(
                    'id'         => 'lixui_hyjsan_text',
                    'type'       => 'text',
                    'title'      => '按钮标题',
                    'desc'       => '填写按钮标题',
                    'default'    => '开通会员',
                ),
                array(
                    'id'         => 'lixui_hyjsan_link',
                    'type'       => 'text',
                    'title'      => '按钮链接',
                    'desc'       => '输入按钮链接',
                    'default'    => '/user?action=vip',
                ),
            ),
        ),
        array(
            'id'         => 'lixui_hyjstqbt_text',
            'type'       => 'text',
            'title'      => '特权标题',
            'desc'       => '填写特权标题',
            'default'    => '会员尊享六大特权',
        ),
        array(
          'id'        => 'site_hyjstq_group_page_lixui',
          'type'      => 'group',
          'title'     => '特权描述',
          'max'       => '6',
          'fields'    => array(
			array(
                'id'    => '_title',
                'type'  => 'text',
                'title' => '标题',
                'default' => '滑块标题',
            ),
            array(
                'id'    => '_icon',
                'type'  => 'icon',
                'title' => '图标',
                'default' => '字体图标',
            ),
            array(
                'id'    => '_text',
                'type'  => 'text',
                'title' => '描述',
                'default' => '描述内容',
            ),
        ),
        'default'    => [
                ['_title' => '持续上新，无限量下载哦', '_icon' => 'fa fa-pie-chart', '_text' => '真海量无套路，有求必应，诚意满满！'],
                ['_title' => '资源附件，实时极速下载', '_icon' => 'fa fa-jsfiddle', '_text' => '本地无需备份，即需即下，无需等待！'],
                ['_title' => '售价资源，会员无需付费', '_icon' => 'fa fa-paypal', '_text' => '资源需要付费，尊贵特权可享零付费！'],
                ['_title' => '精品资源，尊贵专享特权', '_icon' => 'fa fa-vine', '_text' => '专属优质资源，仅限尊贵会员可下载！'],
                ['_title' => '服务支持，全天在线客服', '_icon' => 'fa fa-weixin', '_text' => '尊贵特权，极速响应，为您提供服务！'],
                ['_title' => '会员标示，彰显尊贵身份', '_icon' => 'fa fa-vimeo-square', '_text' => '点亮尊贵身份标示，散发与众不同气质！'],
            ],
        ),
        array(
            'id'         => 'lixui_hyjszfbt_text',
            'type'       => 'text',
            'title'      => '资费标题',
            'desc'       => '填写资费标题',
            'default'    => '资费介绍',
        ),
        array(
            'id'         => 'lixui_hyjszfms_text',
            'type'       => 'text',
            'title'      => '资费描述',
            'desc'       => '填写资费描述',
            'default'    => '赞助一定费用，即可成为尊贵会员，开启尊贵特权！',
        ),
        array(
          'id'        => 'site_hyjsjs_group_page_lixui',
          'type'      => 'group',
          'title'     => '会员介绍',
          'max'       => '3',
          'fields'    => array(
			array(
                'id'    => '_title',
                'type'  => 'text',
                'title' => '标题',
                'default' => '滑块标题',
            ),
            array(
                'id'    => '_img',
                'type'  => 'upload',
                'title' => '图片',
                'default' => '图片',
            ),
            array(
                'id'    => '_pay',
                'type'  => 'text',
                'title' => '价格',
                'default' => '价格',
            ),
            array(
                'id'    => '_des',
                'type'  => 'code_editor',
                'title' => '描述',
                'default' => '<p>描述内容</p>',
            ),
            array(
                'id'    => '_btn',
                'type'  => 'text',
                'title' => '按钮',
                'default' => '按钮标题',
            ),
            array(
                'id'    => '_link',
                'type'  => 'text',
                'title' => '链接',
                'default' => '#',
            ),
            array(
                'id'      => '_blank',
                'type'    => 'switcher',
                'title'   => '新窗口打开',
                'label'   => '是否新建标签窗口页',
                'sanitize' => true,
            ),
        ),
        'default'    => [
                ['_title' => '包月会员', '_img' => '/wp-content/themes/lixui-chlid/pages/images/svip.png', '_pay' => '8.88', '_des' => '<p>尊贵会员专享资源</p>
<p>每天十次资源下载</p>
<p>享受资源专属折扣</p>
<p>专享会员免费特权</p>
<p>第一时间获取优质资源</p>
<p>更多开通优惠请看会员中心</p>', '_btn' => '开通', '_link' => '/user?action=vip', '_blank' => 'true'],
                ['_title' => '年费会员', '_img' => '/wp-content/themes/lixui-chlid/pages/images/svip.png', '_pay' => '88.8', '_des' => '<p>尊贵会员专享资源</p>
<p>每天十次资源下载</p>
<p>享受资源专属折扣</p>
<p>专享会员免费特权</p>
<p>第一时间获取优质资源</p>
<p>更多开通优惠请看会员中心</p>', '_btn' => '开通', '_link' => '/user?action=vip', '_blank' => 'true'],
                ['_title' => '终身会员', '_img' => '/wp-content/themes/lixui-chlid/pages/images/svip.png', '_pay' => '<i>限时特惠：</i>88', '_des' => '<p>终身尊贵专享资源</p>
<p>永久无限下载次数</p>
<p>享受资源专属折扣</p>
<p>终身会员专享免费</p>
<p>第一时间获取优质资源</p>
<p>更多开通优惠请看会员中心</p>', '_btn' => '开通', '_link' => '/user?action=vip', '_blank' => 'true'],
            ],
        ),
        
    ),
));

// 会员介绍2独立页面设置
CSF::createSection($lixui_prefix, array(
    'parent' => 'lixui-chlid-page',
    'title'  => '会员介绍页面②'.$lixui_page,
    'icon'   => 'fa fa-diamond',
    'description' => ''.$lixui_tip,
    'fields' => array(
        array(
            'id'         => 'lixui_hyjs2tqbt_text',
            'type'       => 'text',
            'title'      => '特权标题',
            'desc'       => '填写特权标题',
            'default'    => '开通尊贵独享海量特权',
        ),
        array(
          'id'        => 'site_hyjs2tq_group_page_lixui',
          'type'      => 'group',
          'title'     => '特权描述',
          'fields'    => array(
            array(
                'id'    => '_text',
                'type'  => 'text',
                'title' => '描述',
                'default' => '描述内容',
            ),
        ),
        'default'    => [
                ['_text' => '持续上新，无限量下载哦'],
                ['_text' => '资源附件，实时极速下载'],
                ['_text' => '售价资源，会员无需付费'],
                ['_text' => '精品资源，尊贵专享特权'],
                ['_text' => '服务支持，全天在线客服'],
                ['_text' => '会员标示，彰显尊贵身份'],
            ],
        ),
        array(
            'id'         => 'lixui_hyjs2hyjs_text',
            'type'       => 'code_editor',
            'title'      => '会员介绍',
            'subtitle'   => '为了修改更便捷些，所以自定义填写HTML代码',
            'default'    => '<div class="vipcol" id="normal">
<header>
  <h4>普通会员</h4>
  <h2>免费</h2>
  <h5>享受有限下载</h5>
</header>
<ul>
  <li>免费素材下载</li>
  <li>每天3个素材下载</li>
  <li class="gray">VIP用户专享素材</li>
  <li class="gray">无限专辑创建</li>
  <li class="gray">5X8小时人工客服</li>
  <li class="gray">第一时间掌握优质素材</li>
  <li class="gray">新功能优先体验</li>
</ul>
  <a href="/user?action=vip" target="_blank"><button class="btn">立即注册</button></a>
</div>

<div class="vipcol" id="golden">
<header>
  <h4><img src="wp-content/themes/lixui-chlid/pages/images/svip2_vipbold2.svg"/>年度会员</h4>
  <h2><small>￥</small>199</h2>
  <h5>低至<em>0.2</em>元/天</h5>
  <div class="promotion">
	买1年送1年
  </di>
</header>
<ul>
  <li>免费素材下载</li>
  <li>不限量素材下载</li>
  <li>VIP用户专享素材</li>
  <li>无限专辑创建</li>
  <li>5X8小时人工客服</li>
  <li>第一时间掌握优质素材</li>
  <li class="gray">新功能优先体验</li>
</ul>
  <a href="/user?action=vip" target="_blank"><button class="btn">立即升级</button></a>
</div>

<div class="vipcol" id="purple">
<header>
  <h4><img src="wp-content/themes/lixui-chlid/pages/images/svip2_vvip2.svg"/>终身VIP</h4>
  <h2><small>￥</small>399<small><del>499</del></small></h2>
  <h5>限量<big>99</big>席直降</h5>
  <div class="promotion red">
	直降100元
  </div>
</header>
<ul>
  <li>免费素材下载</li>
  <li>不限量素材下载</li>
  <li>VIP用户专享素材</li>
  <li>无限专辑创建</li>
  <li>5X8小时人工客服</li>
  <li>第一时间掌握优质素材</li>
  <li>新功能优先体验</li>
</ul>
  <a href="/user?action=vip" target="_blank"><button class="btn">立即升级</button></a>
</div>

<div class="vipcol" id="lightred">
<header>
  <h4><img src="wp-content/themes/lixui-chlid/pages/images/svip2_svip.svg"/>终身SVIP</h4>
  <h2><small>￥</small>2??</h2>
  <h5>即将限量开放</h5>
</header>
<ul>
  <li>免费素材下载</li>
  <li>每日下载15个素材</li>
  <li>VIP用户专享素材</li>
  <li>无限专辑创建</li> 
  <li>5X8小时人工客服</li>
  <li>第一时间掌握优质素材</li>
  <li class="gray">新功能优先体验</li>
</ul>
<button disabled  class="btn" style="cursor:default;">暂未开放</button>
</div>',
        ),
        
    ),   
));

// 链接申请独立页面设置
CSF::createSection($lixui_prefix, array(
    'parent' => 'lixui-chlid-page',
    'title'  => '链接申请页面'.$lixui_page,
    'icon'   => 'fa fa-link',
    'description' => ''.$lixui_tip,
    'fields' => array(
        array(
          'id'        => 'site_linkapply_group_lixui',
          'type'      => 'group',
          'title'     => '链接申请页面设置',
          'max'       => '6',
          'fields'    => array(
            array(
                'id'    => '_text',
                'type'  => 'text',
                'title' => '描述',
                'default' => '描述内容',
            ),
            array(
                'id'      => '_style',
                'type'    => 'switcher',
                'title'   => '加粗小标题',
                'label'   => '是否加粗文字',
                'sanitize' => true,
            ),
        ),
        'default'    => [
                ['_text' => '“欢迎各位站长与本站交换链接，不要求权重排名，内容健康，内容相关更佳。”'],
                ['_text' => '【申请须知】', '_style' => 'true'],
                ['_text' => '&#x2714; 申请前请先加上本站链接；'],
                ['_text' => '&#x2714; 稳定更新，每周至少发布一篇，建站时长最少三个月以上；'],
                ['_text' => '&#x2714; 禁止一切产品营销、广告联盟类型的网站，优先通过高质量、内容相近的网站；'],
                ['_text' => '&#x2714; 网站不得有污秽不堪、违反大陆法规、宣扬暴力的、广告挂马的一律拒绝通过。'],
                ['_text' => '&#x2714; 网站内容一定要健康积极向上，反动反共的、宣扬暴力的、诈骗犯法的都不会通过申请。'],
                ['_text' => '【其他说明】', '_style' => 'true'],
                ['_text' => '&#x2714; 站长会定期访问链接，如果遇到网站长时间无法访问又未作通知、内容不符合条件等情况的话，将会撤销该链接！'],
                ['_text' => '&#x2714; 长时间未通过审核，有可能是站长太忙未看到，可以通过发送邮件“admin@liitk.com”联系告知，谢谢~'],
            ],
        ),
        
    ),
));

// WordPress下载独立页面设置
CSF::createSection($lixui_prefix, array(
    'parent' => 'lixui-chlid-page',
    'title'  => 'WordPress下载页面'.$lixui_page,
    'icon'   => 'fa fa-wordpress',
    'description' => ''.$lixui_tip,
    'fields' => array(
        array(
            'id'         => 'site_wpxz_page_lixui',
            'type'       => 'fieldset',
            'title'      => 'WordPress下载页面设置',
            'fields'     => array(
                array(
                    'id'         => 'lixui_wpxz_img1',
                    'type'       => 'upload',
                    'title'      => 'LOGO',
                    'desc'       => '输入图片地址',
                    'default'    => '/wp-content/themes/lixui-chlid/pages/images/wordpress_logo.png',
                ),
                array(
                    'id'         => 'lixui_wpxz_img2',
                    'type'       => 'upload',
                    'title'      => '背景图片',
                    'desc'       => '输入图片地址',
                    'default'    => '/wp-content/themes/lixui-chlid/pages/images/wordpress_bg.jpg',
                ),
                array(
                    'id'         => 'lixui_wpxzbt_text',
                    'type'       => 'text',
                    'title'      => '程序标题',
                    'desc'       => '填写程序标题',
                    'default'    => 'WordPress',
                ),
                array(
                    'id'         => 'lixui_wpxzjj_text',
                    'type'       => 'textarea',
                    'title'      => '程序简介',
                    'desc'       => '填写程序简介',
                    'default'    => '是一款能让您建立出色网站、博客或应用的开源软件。<br>无价而且免费，下载并使用它。',
                ),
                array(
                    'id'         => 'lixui_wpxz_text1',
                    'type'       => 'text',
                    'title'      => '下载按钮①',
                    'desc'       => '填写下载标题',
                    'default'    => '立即下载(zh-CN)',
                ),
                array(
                    'id'         => 'lixui_wpxz_text11',
                    'type'       => 'text',
                    'title'      => '版本号①',
                    'desc'       => '填写版本号，例如：V 0.0.0',
                    'default'    => '最新版',
                ),
                array(
                    'id'         => 'lixui_wpxz_link1',
                    'type'       => 'text',
                    'title'      => '下载链接①',
                    'desc'       => '输入下载链接',
                    'default'    => 'https://cn.wordpress.org/latest-zh_CN.zip',
                ),
                array(
                    'id'         => 'lixui_wpxz_text2',
                    'type'       => 'text',
                    'title'      => '下载按钮②',
                    'desc'       => '填写下载标题',
                    'default'    => '立即下载(en-US)',
                ),
                array(
                    'id'         => 'lixui_wpxz_text22',
                    'type'       => 'text',
                    'title'      => '版本号②',
                    'desc'       => '填写版本号，例如：V 0.0.0',
                    'default'    => '最新版',
                ),
                array(
                    'id'         => 'lixui_wpxz_link2',
                    'type'       => 'text',
                    'title'      => '下载链接②',
                    'desc'       => '输入下载链接',
                    'default'    => 'https://wordpress.org/latest.zip',
                ),
                array(
                    'id'         => 'lixui_jsbt_text',
                    'type'       => 'text',
                    'title'      => '介绍标题',
                    'desc'       => '填写介绍标题',
                    'default'    => '认识它',
                ),
                array(
                    'id'         => 'lixui_jsfbt_text',
                    'type'       => 'text',
                    'title'      => '介绍副标题',
                    'desc'       => '填写介绍副标题',
                    'default'    => '美观设计、强大功能与自由建立任何您所想的。',
                ),
            ),
        ),
        array(
          'id'        => 'site_wpxz_group_page_lixui',
          'type'      => 'group',
          'title'     => 'WordPress下载页面滑块',
          'fields'    => array(
			array(
                'id'    => '_title',
                'type'  => 'text',
                'title' => '标题',
                'default' => '滑块标题',
            ),
            array(
                'id'    => '_text',
                'type'  => 'text',
                'title' => '内容',
                'default' => '滑块内容',
            ),
            array(
                'id'    => '_bottom',
                'type'  => 'text',
                'title' => '底标',
                'default' => '底标内容',
            ),
        ),
        'default'    => [
                ['_title' => '名家信任', '_text' => '35%的网站都在使用WordPress，小到兴趣博客，大到新闻网站。', '_bottom' => 'By WordPress'],
                ['_title' => '强大功能', '_text' => '让您满足需求。您可以增加一个在线商店、相册、邮件列表、论坛、统计分析及其他更多。', '_bottom' => 'By WordPress'],
                ['_title' => '全球社群', '_text' => '成百上千的开发者、内容创建者和网站站长参与全球817个城市的每月小聚。', '_bottom' => 'By WordPress'],
                ['_title' => '开始使用', '_text' => '超过六千万用户选择WordPress打造他们在网络上的“家”一同加入吧。', '_bottom' => 'By WordPress'],
            ],
        ),
        
    ),
));

//
// 利熙网子主题选项设置
//
CSF::createSection($lixui_prefix, array(
    'id'    => 'lixui-plugin',
    'title' => '子主题扩展',
    'icon'  => 'fa fa-th-large',
));

// RIPRODL插件下载信息美化设置
CSF::createSection($lixui_prefix, array(
    'parent' => 'lixui-plugin',
    'title'  => '下载信息美化设置'.$lixui_plugin,
    'icon'   => 'fa fa-download',
    'description' => '<h3><i class="fa fa-heart" style="color: red;"></i> 本插件基于RiPro主题创作的功能增强型插件。插件版本：V2.0 <i class="fa fa-heart" style="color: red;"></i></h3>'.$lixui_tip,
    'fields' => array(
        array(
            'id'      => 'ridl_on',
            'type'    => 'switcher',
            'help'    => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'   => '打开下载美化',
            'label'   => '下载样式美化总开关',
            'default' => true,
        ),
            array(
                'id'         => 'ridl_style',
                'type'       => 'image_select',
                'title'      => '下载风格选择',
                'options'    => array(
                    'old'       => get_stylesheet_directory_uri(). '/inc/plugins/riprodl/images/old.jpg',
                    'dux'       => get_stylesheet_directory_uri(). '/inc/plugins/riprodl/images/dux.jpg',
                    'riplus'    => get_stylesheet_directory_uri(). '/inc/plugins/riprodl/images/riplus.jpg',
                ),
                'default'    => 'old',
                'dependency' => array('ridl_on', '==', 'true'),
            ),
        //风格美化通用设置
        array(
            'id'         => 'site_fgxzysty_lixui',
            'type'       => 'fieldset',
            'title'      => '风格美化通用设置',
            'fields'     => array(
                array(
					'id'        => 'lixui_fgxzyswx_switch',
					'type'      => 'switcher',
					'title'     => '微信客服按钮',
					'default'   => true,
					'label'     => '开启显示/关闭隐藏',
				),
				array(
					'id'        => 'lixui_fgxzyswx_icon',
					'type'      => 'icon',
					'title'     => '按钮图标',
					'default'   => 'fa fa-weixin',
					'desc'      => '微信客服按钮图标',
				),
                array(
					'id'        => 'lixui_fgxzyswx_text',
					'type'      => 'text',
					'title'     => '按钮名称',
					'default'   => 'WeChat',
					'desc'      => '微信客服按钮名称',
				),
                array(
					'id'        => 'lixui_fgxzyswx_img',
					'type'      => 'upload',
					'title'     => '按钮图片',
					'default'   => 'https://ae01.alicdn.com/kf/U088b242717de4d7ea157923822d7fbaft.jpg',
					'desc'      => '微信客服二维码',
				),
			),
		),
		//经典下载样式设置
        array(
            'id'         => 'site_oldfgxzys_lixui',
            'type'       => 'fieldset',
            'title'      => '经典下载样式设置',
            'fields'     => array(
    //             array(
				// 	'id'        => 'is_oldfgxzys_icon1',
				// 	'type'      => 'icon',
				// 	'title'     => '服务图标①',
				// 	'desc'      => '服务字体图标',
				// 	'default'   => 'dashicons dashicons-shield',
				// ),
				array(
					'id'        => 'is_oldfgxzys_text1',
					'type'      => 'text',
					'title'     => '服务标题①',
					'desc'      => '服务简介标题',
					'default'   => '免费售后咨询',
				),
				// array(
				// 	'id'        => 'is_oldfgxzys_icon2',
				// 	'type'      => 'icon',
				// 	'title'     => '服务图标②',
				// 	'desc'      => '服务字体图标',
				// 	'default'   => 'dashicons dashicons-update-alt',
				// ),
				array(
					'id'        => 'is_oldfgxzys_text2',
					'type'      => 'text',
					'title'     => '服务标题②',
					'desc'      => '服务简介标题',
					'default'   => '免费安装指导',
				),
				// array(
				// 	'id'        => 'is_oldfgxzys_icon3',
				// 	'type'      => 'icon',
				// 	'title'     => '服务图标③',
				// 	'desc'      => '服务字体图标',
				// 	'default'   => 'dashicons dashicons-plugins-checked',
				// ),
				array(
					'id'        => 'is_oldfgxzys_text3',
					'type'      => 'text',
					'title'     => '服务标题③',
					'desc'      => '服务简介标题',
					'default'   => '付费安装主题',
				),
				// array(
				// 	'id'        => 'is_oldfgxzys_icon4',
				// 	'type'      => 'icon',
				// 	'title'     => '服务图标④',
				// 	'desc'      => '服务字体图标',
				// 	'default'   => 'dashicons dashicons-cloud',
				// ),
				array(
					'id'        => 'is_oldfgxzys_text4',
					'type'      => 'text',
					'title'     => '服务标题④',
					'desc'      => '服务简介标题',
					'default'   => '付费BUG修复',
				),
				array(
					'id'        => 'is_oldfgxzys_link',
					'type'      => 'text',
					'title'     => '获得货币',
					'desc'      => '获得货币链接',
					'default'   => '/gettk',
				),
				array(
					'id'        => 'is_oldfgxzys_smicon',
					'type'      => 'icon',
					'title'     => '声明图标',
					'desc'      => '特别声明图标',
					'default'   => 'fa fa-bullhorn',
				),
				array(
					'id'        => 'is_oldfgxzys_smtext',
					'type'      => 'text',
					'title'     => '声明内容',
					'desc'      => '特别声明内容',
					'default'   => '特别声明：仅原创产品才提供以上服务，其他资源只供下载无任何售后。若资源失效，联系客服及时补发！',
				),
			),
		),

    ),
));

// 其他扩展功能设置
CSF::createSection($lixui_prefix, array(
    'parent' => 'lixui-plugin',
    'title'  => '其他扩展功能设置'.$lixui_plugin,
    'icon'   => 'fa fa-dot-circle-o',
    'description' => ''.$lixui_tip,
    'fields' => array(
        array(
            'id'      => 'is_lixui_shortcoder_switch',
            'type'    => 'switcher',
            'help'    => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'   => '简码组件',
            'label'   => '编辑器简码功能合集组件',
            'default' => true,
        ),
        array(
            'id'      => 'is_lixui_prism_switch',
            'type'    => 'switcher',
            'help'    => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'   => '代码高亮',
            'label'   => 'Prism代码高亮（请禁用相同功能插件）',
            'default' => false,
        ),
        array(
            'id'      => 'is_lixui_gutenberg_switch',
            'type'    => 'switcher',
            'help'    => '有问题访问官网 WWW.LIITK.COM 或联系 QQ1576384173',
            'title'   => '古腾堡扩展',
            'label'   => '古腾堡编辑器功能扩展模块',
            'default' => false,
        ),
        
    ),
));