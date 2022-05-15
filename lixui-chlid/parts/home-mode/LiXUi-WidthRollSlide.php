<?php /*全屏动态幻灯片模块*/$site_qpdthdp_lixui = _cao('site_qpdthdp_lixui'); ?>
<div class="toptu">
  <div class="item scroll">
    <img class="scroll-image lazyloaded" src="<?php echo $site_qpdthdp_lixui['lixui_bgimg_img']; ?>" data-lazy-src="<?php echo $site_qpdthdp_lixui['lixui_bgimg_img']; ?>" data-was-processed="true">
    <noscript>
      <img class="scroll-image" src="<?php echo $site_qpdthdp_lixui['lixui_bgimg_img']; ?>"></noscript>
    <img class="scroll-image lazyloaded" src="<?php echo $site_qpdthdp_lixui['lixui_bgimg_img']; ?>" data-lazy-src="<?php echo $site_qpdthdp_lixui['lixui_bgimg_img']; ?>" data-was-processed="true">
    <noscript>
      <img class="scroll-image" src="<?php echo $site_qpdthdp_lixui['lixui_bgimg_img']; ?>"></noscript>
    <div class="sc-1wssj0-17 hVBrzU">
      <img src="<?php echo $site_qpdthdp_lixui['lixui_stimg_img']; ?>" data-lazy-src="<?php echo $site_qpdthdp_lixui['lixui_stimg_img']; ?>" class="lazyloaded" data-was-processed="true">
      <noscript>
        <img src="<?php echo $site_qpdthdp_lixui['lixui_stimg_img']; ?>"></noscript>
    </div>
  </div>
  <?php if ($site_qpdthdp_lixui['lixui_qpdthdp_switch']): ?>
  <div class="cl static htkYRs">
    <ul class="flex">
        <?php $site_shyhdp_group_lixui = _cao('site_shyhdp_group_lixui');
        if (!empty($site_shyhdp_group_lixui)) {
            foreach ($site_shyhdp_group_lixui as $key => $item) {
            $_blank = ($item['_blank']) ? ' target="_blank"' : '' ;
            echo '<li class="st_one">';
            echo '<a href="'.$item['_link'].'" '.$_blank.'>';
            echo '<img class="lazy card-main lazyloaded" alt="'.$item['_title'].'" src="'.$item['_img'].'"  data-lazy-src="'.$item['_img'].'" data-was-processed="true">';
            echo '<noscript><img class="lazy card-main" alt="'.$item['_title'].'" src="'.$item['_img'].'" ></noscript>';
            echo '<h5 class="active-card-title">'.$item['_title'].'</h5></a>';
            echo '</li>';
            } 
        }?>
    </ul>
  </div>
  <?php endif; ?>
</div>