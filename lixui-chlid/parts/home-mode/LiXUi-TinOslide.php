<?php /*三合一幻灯片模块*/
$site_shyhdpxgg_lixui = _cao('site_shyhdpxgg_lixui');
$site_shyhdp_lixui = _cao('site_shyhdp_lixui');
$site_shyhdp_left_up_lixui = _cao('site_shyhdp_left_up_lixui');
$site_shyhdp_left_lower_lixui = _cao('site_shyhdp_left_lower_lixui');
?>
<script type='text/javascript' src='/wp-content/themes/lixui-chlid/parts/home-mode/assets/LiXUi-TinOslide.js'></script>
<div class="section lixui-shy">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-9">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach ($site_shyhdp_lixui['is_shyhdp_lixui'] as $key => $item) {
                            echo '<div class="swiper-slide">';
                            echo '<a '.( $item['_blank'] ? ' target="_blank"' : '' ).' href="'.esc_url( $item['_href'] ).'">';
                            echo '<img src="'.esc_url( $item['_img'] ).'">';
                            echo '<h3><span class="label label-h3">'.$item['_Recommend'].'</span>'.$item['_title'].'</h3>';
                            echo '</a>';
                            echo '</div>';
                        } ?>
                    </div>
				    <?php if (_cao('is_shyhdpxgg_lixui')) : ?>
				    <?php if ($site_shyhdpxgg_lixui['lixui_shyhdpxggmr_switch']): ?>
					<div class="layout r_b_tip_box">
					    <a target="_blank" href="<?php echo $site_shyhdpxgg_lixui['lixui_shyhdpxgg_link']; ?>" style="opacity: 1;"><div class="r_b_tip" style="background: url(/wp-content/themes/lixui-chlid/assets/images/lixui-shyhdp-xgg.png) no-repeat -3px -155px;"></div></a>
					</div>
					<?php endif; ?>
					<?php if ($site_shyhdpxgg_lixui['lixui_shyhdpxggzd_switch']): ?>
					<div class="layout r_b_tip_box">
					    <a target="_blank" href="<?php echo $site_shyhdpxgg_lixui['lixui_shyhdpxgg_link']; ?>" style="opacity: 1;"><div class="r_b_tip" style="background: url(<?php echo $site_shyhdpxgg_lixui['lixui_shyhdpxgg_img']; ?>)"></div></a>
					</div>
					<?php endif; ?>
					<?php endif; ?>
                    <!-- 如果需要分页器 -->
                    <div class="swiper-pagination"></div>
                    <!-- 如果需要导航按钮 -->
                    <span class="swiper-button-prev"><i class="mdi mdi-chevron-left"></i></span>
                    <div class="swiper-button-next"><i class="mdi mdi-chevron-right"></i></div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="row h-images no-gutters">
                    <div class="item-tuwen col-6 col-lg-12">
                        <a href="<?php echo $title = ($site_shyhdp_left_up_lixui['_link']); ?>" target="_blank" class="h-mark">
                            <i class="thumb" style="background-image:url(<?php echo esc_url( @$site_shyhdp_left_up_lixui['dict_ui_banner_up_logo'] ); ?>);"></i>
                            <strong><?php echo $title = ($site_shyhdp_left_up_lixui['_title']); ?></strong>
                        </a>
                    </div>
                    <div class="item-tuwen col-6 col-lg-12">
                        <a href="<?php echo $title = ($site_shyhdp_left_lower_lixui['_link']); ?>" target="_blank" class="h-mark">
                            <i class="thumb" style="background-image:url(<?php echo esc_url( @$site_shyhdp_left_lower_lixui['dict_ui_banner_lower_logo'] ); ?>);"></i>
                            <strong><?php echo $title = ($site_shyhdp_left_lower_lixui['_title']); ?></strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>