<div class="entry-footer">
  <ul class="post-meta-box">

    <?php if (_cao('grid_is_time',true)) : ?>
    <li class="meta-date">
      <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo '<i class="fa fa-clock-o"></i> '._get_post_time();?></time>
    </li>
    <?php endif; ?>
    <?php if (_cao('grid_is_views',true)) : ?>
    <li class="meta-views"><span><?php echo '<i class="fa fa-eye"></i> '._get_post_views();?></span></li>
    <?php endif; ?>
    <?php if (_cao('grid_is_coments',false)) : ?>
    <li class="meta-comment"><span><?php echo _get_post_comments();?></span></li>
    <?php endif; ?>
    <?php if (is_site_shop_open()) : ?>
      <?php if ((_get_post_shop_status() || _get_post_shop_hide() || _get_post_video_status()) && _cao('grid_is_price',true)) : 
        $post_price = _get_post_price();
        $post_price =($post_price) ? $post_price : 'FREE' ;
      ?>
        <li class="meta-price"><span><?php echo '<i class="'._cao('site_money_icon').'"></i> '.$post_price;?></span></li>
      <?php endif; ?>
    <?php endif; ?>
    
    <?php /*文章资源标签开始-利熙网*/
    $ymetaValue = get_post_meta(get_the_ID(), "post_style_art", true);
    if (($ymetaValue == "dujia")) {
        echo '<div class="lixui-tab-dj">独家</div>';
    } elseif (($ymetaValue == "tuijian")) {
        echo '<div class="lixui-tab-tj">推荐</div>';
    } elseif (($ymetaValue == "jingpin")) {
        echo '<div class="lixui-tab-jp">精品</div>';
    } elseif (($ymetaValue == "zuixin")) {
        echo '<div class="lixui-tab-zx">最新</div>';
    } elseif (($ymetaValue == "yiceshi")) {
        echo '<div class="lixui-tab-ycs">已测试</div>';
    }
    /*文章资源标签结束-利熙网*/?>
    
  </ul>
</div>