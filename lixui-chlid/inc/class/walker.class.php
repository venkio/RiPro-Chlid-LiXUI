<?php
if (!defined('ABSPATH')) {die;} // Cannot access directly.
/**
 * LiXUI_Walker_Nav_Menu Pro
 */
class LiXUI_Walker_Nav_Menu extends Walker_Nav_Menu
{

    public $tree_type = array('post_type', 'taxonomy', 'custom');
    public $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');
    protected $mega;

    public function __construct($mega = false)
    {
        $this->mega = $mega;
    }

    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    public function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes   = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $is_catmenu = get_post_meta( $item->ID, 'is_catmenu', true );
        if (!empty($is_catmenu)) {
            $classes[] = 'menu-item-mega';
        }

        if ($depth == 0 && $this->mega && ($item->object == 'category' || $item->object == 'post_tag') && ( in_array('menu-item-mega', $classes))) {
            $classes[] = 'menu-item-has-children';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $atts           = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        $menu_icon = get_post_meta( $item->ID, 'menu_icon', true );
        if( ! empty( $menu_icon ) ) {
            $item->title = '<span><i class="'. $menu_icon .'"></i> ' . $item->title .'</span>';
        }
        //导航菜单函数开始-利熙网
        $caidan_icon = get_post_meta( $item->ID, 'caidan_icon', true );//菜单图标
        $caidan_icon_color = get_post_meta( $item->ID, 'caidan_icon_color', true );//图标颜色
        $caidan_icon_css = get_post_meta( $item->ID, 'caidan_icon_css', true );//图标附加class
        if( ! empty( $caidan_icon ) ) {
            $item->title = '<span><i class="'. $caidan_icon .' '. $caidan_icon_css .'" style="color:'. $caidan_icon_color .'"></i> ' . $item->title .'</span>';
        }
        $caidan_colour = get_post_meta( $item->ID, 'caidan_colour', true );//颜色菜单
        if( ! empty( $caidan_colour ) ) {
            $item->title = '<i style="color:'. $caidan_colour .'"> ' . $item->title .'</i>';
        }
        $label_text = get_post_meta( $item->ID, 'label_text', true );//文字标签
        if( ! empty( $label_text ) ) {
            $item->title = '' . $item->title .'<span class="lixui-num">'. $label_text .'</span>';
        }
        $label_hotgif = get_post_meta( $item->ID, 'label_hotgif', true );//HOT小图标签
        if( ! empty( $label_hotgif ) ) {
            $item->title = '' . $item->title .'<i class="hot_gif"></i>';
        }
        $label_new = get_post_meta( $item->ID, 'label_new', true );//NEW图标签
        if( ! empty( $label_new ) ) {
            $item->title = '' . $item->title .'<i class="icon_new"></i>';
        }
        $label_hot = get_post_meta( $item->ID, 'label_hot', true );//HOT图标签
        if( ! empty( $label_hot ) ) {
            $item->title = '' . $item->title .'<i class="icon_hot"></i>';
        }
        $dot_lanse = get_post_meta( $item->ID, 'dot_lanse', true );//蓝色圆圈
        if( ! empty( $dot_lanse ) ) {
            $item->title = '<i class="lanse"></i>' . $item->title .'';
        }
        $dot_lv = get_post_meta( $item->ID, 'dot_lv', true );//绿色圆圈
        if( ! empty( $dot_lv ) ) {
            $item->title = '<i class="lvse"></i>' . $item->title .'';
        }
        $dot_huangse = get_post_meta( $item->ID, 'dot_huangse', true );//黄色圆圈
        if( ! empty( $dot_huangse ) ) {
            $item->title = '<i class="huangse"></i>' . $item->title .'';
        }
        $dot_hongse = get_post_meta( $item->ID, 'dot_hongse', true );//红色圆圈
        if( ! empty( $dot_hongse ) ) {
            $item->title = '<i class="hongse"></i>' . $item->title .'';
        }
        $dot_purple = get_post_meta( $item->ID, 'dot_purple', true );//紫色圆圈
        if( ! empty( $dot_purple ) ) {
            $item->title = '<i class="purple"></i>' . $item->title .'';
        }
        //导航菜单函数结束-利熙网


        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        if ($depth == 0 && $this->mega && ($item->object == 'category' || $item->object == 'post_tag') && ( in_array('menu-item-mega', $classes)) ) {
            $term_id   = $item->object_id;
            $term_args = array('posts_per_page' => 10);
            switch ($item->object) {
                case 'category':
                    $term_args['cat'] = $term_id;
                    break;
                case 'post_tag':
                    $term_args['tag_id'] = $term_id;
                    break;
            }
            
            $term_posts = new WP_Query($term_args);
            $item_output .= '<div class="mega-menu">';

            if ($term_posts->have_posts()) {
                $item_output .= '<div class="menu-posts owl">';

                while ($term_posts->have_posts()): $term_posts->the_post();
                    $item_output .= '<div class="menu-post">';
                    ob_start();
                    cao_entry_media( array( 'layout' => 'rect_300' ) );
                    cao_entry_header( array( 'container' => 'div', 'tag' => 'h5') );
                    $item_output .= ob_get_clean();
                    $item_output .= '</div>';
                endwhile;

                $item_output .= '</div>';
            }

            wp_reset_postdata();

            $item_output .= '</div>';
        }

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    public function end_el(&$output, $item, $depth = 0, $args = array())
    {
        $output .= "</li>\n";
    }

    public function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        $id_field = $this->db_fields['id'];
        if (is_object($args[0])) {
            $args[0]->has_children = !empty($children_elements[$element->$id_field]);
        }
        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

    public static function fallback($args)
    {
        extract($args);

        $fb_output = null;

        if ($container) {
            $fb_output = '<' . $container;

            if ($container_id) {
                $fb_output .= ' id="' . $container_id . '"';
            }

            if ($container_class) {
                $fb_output .= ' class="' . $container_class . '"';
            }

            $fb_output .= '>';
        }

        $fb_output .= '<ul';

        if ($menu_id) {
            $fb_output .= ' id="' . $menu_id . '"';
        }

        if ($menu_class) {
            $fb_output .= ' class="' . $menu_class . '"';
        }

        $fb_output .= '>';
        $fb_output .= '<li class="menu-item"><a href="' . esc_url(admin_url('nav-menus.php')) . '">' . esc_html__('添加菜单', 'cao') . '</a></li>';
        $fb_output .= '</ul>';

        if ($container) {
            $fb_output .= '</' . $container . '>';
        }

        echo wp_kses($fb_output, array(
            'ul'   => array('id' => array(), 'class' => array()),
            'li'   => array('class' => array()),
            'a'    => array('href' => array()),
            'span' => array(),
        ));
    }

}
