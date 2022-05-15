</div><!-- end sitecoent --> 
	<?php
	$mode_banner = _cao('mode_banner');
	if (is_array($mode_banner) && isset($mode_banner['bgimg']) && _cao('is_footer_banner') ) : ?>

	<div class="module parallax">
		<img class="jarallax-img lazyload" data-srcset="<?php echo $mode_banner['bgimg']; ?>" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="">
		<div class="container">
		<?php /*底部Banner网站统计开始*/
		$site_dbwztj_lixui = _cao('site_dbwztj_lixui');
		if (is_array($site_dbwztj_lixui)  && _cao('is_dbwztj_lixui') ) : ?>
		<div class="lixui">
		<ul class="data-items">
        <li><i class="<?php echo $site_dbwztj_lixui['lixui_hy_icon']; ?>"></i><strong data-count="97596" class="active"><?php $users = $wpdb->get_var("SELECT COUNT(ID) FROM $wpdb->users"); echo $users; ?></strong><span>会员总数(位)</span>
        </li>
        <li><i class="<?php echo $site_dbwztj_lixui['lixui_zy_icon']; ?>"></i><strong data-count="34774" class="active"><?php $count_posts = wp_count_posts(); echo $published_posts = $count_posts->publish;?></strong><span>资源总数(个)</span>
        </li>
        <li><i class="<?php echo $site_dbwztj_lixui['lixui_bz_icon']; ?>"></i><strong data-count="841940" class="active"><?php echo get_week_post_count(); ?></strong><span>本周发布(个)</span>
        </li>
        <li><i class="<?php echo $site_dbwztj_lixui['lixui_jr_icon']; ?>"></i><strong data-count="2377" class="active"><?php echo WeeklyUpdate();?> </strong><span>今日发布(个)</span>
        </li>
        <li><i class="<?php echo $site_dbwztj_lixui['lixui_pl_icon']; ?>"></i><strong data-count="2377" class="active"><?php $total_comments = get_comment_count(); echo $total_comments['approved'];?> </strong><span>评论总数(条)</span>
        </li>
        <li><i class="<?php echo $site_dbwztj_lixui['lixui_yx_icon']; ?>"></i><strong data-count="7082" class="active"><?php echo floor((time()-strtotime("2019-04-20"))/86400); ?></strong><span>残喘运行(天)</span>
        </li>
		</ul>
		</div>
		<?php /*底部Banner网站统计结束*/endif; ?>
			<h4 class="entry-title">
				<?php echo wp_kses( $mode_banner['text'], array(
					'br' => array(),
				) ); ?>
			</h4>
			<?php if ( $mode_banner['primary_text'] != '' ) : ?>
				<a<?php echo _target_blank(); ?> class="button" href="<?php echo esc_url( $mode_banner['primary_link'] ); ?>"><?php echo esc_html( $mode_banner['primary_text'] ); ?></a>
			<?php endif; ?>
			<?php if ( $mode_banner['secondary_text'] != '' ) : ?>
				<a<?php echo _target_blank(); ?> class="button transparent" href="<?php echo esc_url( $mode_banner['secondary_link'] ); ?>"><?php echo esc_html( $mode_banner['secondary_text'] ); ?></a>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>

	<footer class="site-footer">
		<div class="container">
			
			<?php if (_cao( 'is_diy_footer','true' ) ){
				get_template_part( 'parts/diy-footer' );
			}?>
			<?php 
			$links_type = _cao('site_footer_links_type','home');
			if ($links_type=='home' && is_home()) {
				$links_is = true;
			}elseif ($links_type=='all') {
				$links_is = true;
			}else{
				$links_is = false;
			}
			if ( _cao('is_site_footer_links') && $links_is ): ?>
			<div class="footer-links">
				<h6><?php echo esc_html__('友情链接：','cao') ;?></h6>
				<ul class="friendlinks-ul">
				<?php $resul = $wpdb->get_results("SELECT * FROM $wpdb->links where link_visible ='y' ORDER BY link_id LIMIT 0 , 40");
				foreach ($resul as $key => $item){
					echo '<li><a target="_blank" href="'.$item->link_url.'" title="'.$item->link_name.'" target="_blank">'.$item->link_name.'</a></li>';
				} ?>
				</ul>
			</div>
			<?php endif;?>
			<?php if ( _cao( 'cao_copyright_text', '' ) != '' ) : ?>
			  <div class="site-info">

			<?php /*底部总浏览＆查询请求＆在线人数开始*/
			$site_dbzlllcxqqzxrs_lixui = _cao('site_dbzlllcxqqzxrs_lixui');
			if (is_array($site_dbzlllcxqqzxrs_lixui)  && _cao('is_dbzlllcxqqzxrs_lixui') ) : ?>
			<?php
			    $counter = intval(file_get_contents("counter.dat"));  
			    $_SESSION['#'] = true;  
			    $counter++;  
			    $fp = fopen("counter.dat","w");  
			    fwrite($fp, $counter);  
			    fclose($fp); 
			?>
			    </p><?php if ($site_dbzlllcxqqzxrs_lixui['lixui_zlll_switch']): ?>总览:<?php echo $counter; ?>T
			    <?php endif; ?>
			<?php if ($site_dbzlllcxqqzxrs_lixui['lixui_zxrs_switch']): ?>
			<?php
			    //首先你要有读写文件的权限，首次访问肯不显示，正常情况刷新即可
			    $online_log = "maplers.dat"; //保存人数的文件到根目录,
			    $timeout = 30;//30秒内没动作者,认为掉线
			    $entries = file($online_log);
			    $temp = array();
			    for ($i=0;$i<count($entries);$i++){
			    $entry = explode(",",trim($entries[$i]));
			    if(($entry[0] != getenv('REMOTE_ADDR')) && ($entry[1] > time())) {
			    array_push($temp,$entry[0].",".$entry[1]."\n"); //取出其他浏览者的信息,并去掉超时者,保存进$temp
			    }}
			    array_push($temp,getenv('REMOTE_ADDR').",".(time() + ($timeout))."\n"); //更新浏览者的时间
			    $maplers = count($temp); //计算在线人数
			    $entries = implode("",$temp);
			    //写入文件
			    $fp = fopen($online_log,"w");
			    flock($fp,LOCK_EX); //flock() 不能在NFS以及其他的一些网络文件系统中正常工作
			    fputs($fp,$entries);
			    flock($fp,LOCK_UN);
			    fclose($fp);
			    echo "在线:".$maplers."P";
			?><?php endif; ?>
			<?php if ($site_dbzlllcxqqzxrs_lixui['lixui_cxqq_switch']): ?>请求:<?php echo get_num_queries();?>N 耗时:<?php echo timer_stop(0,5);?>S<?php endif; ?>
			</p>
			<?php /*底部总浏览＆查询请求＆在线人数结束*/ endif; ?>
			    <?php echo _cao( 'cao_copyright_text', '' ); ?>

			    <?php if(_cao('cao_ipc_info')) : ?>
			    <a href="https://beian.miit.gov.cn" target="_blank" class="text" rel="noreferrer nofollow"> <?php echo _cao('cao_ipc_info')?></a>
			    <?php echo _cao('cao_ipc2_info'); ?>
			    <br>
			    <?php endif; ?>
				<?php /*底部摆设小插图开始*/
			    $site_dbbsxct_lixui = _cao('site_dbbsxct_lixui');
			    if (is_array($site_dbbsxct_lixui)  && _cao('is_dbbsxct_lixui') ) : ?>
			    <center>
			    <a href="<?php echo $site_dbbsxct_lixui['lixui_xct_link']; ?>" alt="" rel="nofollow"><img src="<?php echo $site_dbbsxct_lixui['lixui_xct_img']; ?>" alt="" style="height: <?php echo $site_dbbsxct_lixui['lixui_xct_text']; ?>em; max-height: <?php echo $site_dbbsxct_lixui['lixui_xct_text']; ?>em;padding-bottom: 0px;"></a>
			    </center>
			    <?php /*底部摆设小插图结束*/endif; ?>
			  </div>
			<?php endif; ?>
		</div>
	</footer>
	
<?php /*部分功能放置-利熙网*/get_template_part( 'inc/class/part' ); ?>

<div class="dimmer"></div>

<?php if (!is_user_logged_in() && is_site_shop_open()) : ?>
    <?php get_template_part( 'parts/popup-signup' ); ?>
<?php endif; ?>

<?php get_template_part( 'parts/off-canvas' ); ?>

<?php if (_cao('is_console_footer','true')) : ?>

<?php endif; ?>

<?php if (_cao('web_js')) : ?>
<?php echo _cao('web_js');?>
<?php endif; ?>
<?php if (_cao('cao_disabled_f12')) : ?>
<script type="text/javascript">
((function() {
    var callbacks = [],
        timeLimit = 50,
        open = false;
    setInterval(loop, 1);
    return {
        addListener: function(fn) {
            callbacks.push(fn);
        },
        cancleListenr: function(fn) {
            callbacks = callbacks.filter(function(v) {
                return v !== fn;
            });
        }
    }
    function loop() {
        var startTime = new Date();
        debugger;
        if (new Date() - startTime > timeLimit) {
            if (!open) {
                callbacks.forEach(function(fn) {
                    fn.call(null);
                });
            }
            open = true;
            window.stop();
            alert('不要扒我了');
            window.location.reload();
        } else {
            open = false;
        }
    }
})()).addListener(function() {
    window.location.reload();
});
</script>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>