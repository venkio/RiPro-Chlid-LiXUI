<?php /*CMS菜单模块*/$site_cmsmenumod_lixui = _cao('site_cmsmenumod_lixui'); ?>
<div class="section lixui-bj">
	<div class="home-first">
		<div class="container hide_sm">
			<div class="col-1-4">
				<div class="hf-widget hf-widget-1 hf-widget-software">
					<h3 class="hf-widget-title">
						<i class="fa <?php echo $site_cmsmenumod_lixui['cms2_11_icon']; ?>"></i>
						<a href="<?php echo $site_cmsmenumod_lixui['cms2_11_link']; ?>" target="_blank"><?php echo $site_cmsmenumod_lixui['cms2_11_text']; ?></a>
						<span><?php echo $site_cmsmenumod_lixui['cms2_111_down']; ?></span>
						<div class="pages">
							<i class="next">
								<a href="<?php echo $site_cmsmenumod_lixui['cms2_11_link']; ?>" target="_blank"><i class="fa fa-angle-right"></i></a>
							</i>
						</div>
					</h3>
					<div class="hf-widget-content">
						<div class="scroll-h">
							<ul>
								<?php $site_cmsmenumods2_group_lixui = _cao('site_cmsmenumods2_group_lixui');
								if (!empty($site_cmsmenumods2_group_lixui)) {
									foreach ($site_cmsmenumods2_group_lixui as $key => $link) {
										$_blank = ($link['_blank']) ? ' target="_blank"' : '' ;
										echo '<li><a href="'.$link['_link'].'" rel="external nofollow" '.$_blank.'><i class="thumb " style="background-image:url('.$link['_img'].')"></i><span>'.$link['_title'].'</span></a></li>';
									}
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-1-4 sxweb">
				<div class="hf-widget hf-widget-2">
					<h3 class="hf-widget-title">
						<i class="fa <?php echo $site_cmsmenumod_lixui['cms2_21_icon']; ?>"></i>
						<a href="<?php echo $site_cmsmenumod_lixui['cms2_21_link']; ?>" target="_blank"><?php echo $site_cmsmenumod_lixui['cms2_21_text']; ?></a>
						<span><?php echo $site_cmsmenumod_lixui['cms2_211_down']; ?></span></h3>
					<div class="hf-widget-content">
						<div class="no-scroll hf-tags"><center>
							<?php $site_cmsmenumods2_group2_lixui = _cao('site_cmsmenumods2_group2_lixui');
							if (!empty($site_cmsmenumods2_group2_lixui)) {
								foreach ($site_cmsmenumods2_group2_lixui as $key => $link) {
									$_blank = ($link['_blank']) ? ' target="_blank"' : '' ;
									$_style = ($link['_style']) ? ' class="style_orange"' : '' ;
									echo '<a '.$_style.' href="'.$link['_link'].'" '.$_blank.'><span>'.$link['_title'].'</span></a>';
								}
							}
							?>
						</div></center>
					</div>
				</div>
			</div>
			<div class="col-1-4 sxweb">
				<div class="hf-widget hf-widget-1 hf-widget-hot-cats">
					<h3 class="hf-widget-title">
						<i class="fa <?php echo $site_cmsmenumod_lixui['cms2_31_icon']; ?>"></i>
						<a href="<?php echo $site_cmsmenumod_lixui['cms2_31_link']; ?>" target="_blank"><?php echo $site_cmsmenumod_lixui['cms2_31_text']; ?></a>
						<span><?php echo $site_cmsmenumod_lixui['cms2_311_down']; ?></span></h3>
					<div class="hf-widget-content">
						<div class="scroll-h">
							<ul>
							    <?php $site_cmsmenumods2_group3_lixui = _cao('site_cmsmenumods2_group3_lixui');
								if (!empty($site_cmsmenumods2_group3_lixui)) {
									foreach ($site_cmsmenumods2_group3_lixui as $key => $link) {
										$_blank = ($link['_blank']) ? ' target="_blank"' : '' ;
										echo '<li><a href="'.$link['_link'].'" '.$_blank.'><i class="hhicon '.$link['_icon'].'"></i><span>'.$link['_title'].'</span></a></li>';
									}
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-1-4 sxweb">
				<div class="hf-widget hf-widget-4">
					<h3 class="hf-widget-title">
						<i class="fa <?php echo $site_cmsmenumod_lixui['cms2_41_icon']; ?>"></i>
						<a href="<?php echo $site_cmsmenumod_lixui['cms2_41_link']; ?>" target="_blank"><?php echo $site_cmsmenumod_lixui['cms2_41_text']; ?></a>
						<span><?php echo $site_cmsmenumod_lixui['cms2_411_down']; ?></span>
						<div class="pages">
							<i class="next">
								<a href="<?php echo $site_cmsmenumod_lixui['cms2_41_link']; ?>" target="_blank"><i class="fa fa-angle-right"></i></a>
							</i>
						</div>
					</h3>
					<div class="hf-widget-content">
						<div class="scroll-h">
							<ul>
							    <?php $site_cmsmenumods2_group4_lixui = _cao('site_cmsmenumods2_group4_lixui');
								if (!empty($site_cmsmenumods2_group4_lixui)) {
									foreach ($site_cmsmenumods2_group4_lixui as $key => $link) {
										$_blank = ($link['_blank']) ? ' target="_blank"' : '' ;
										echo '<li><h3><a href="'.$link['_link'].'" '.$_blank.'><i class="icon-time"></i><span>'.$link['_title'].'</span><em>'.$link['_subtitle'].'</em></a></h3></li>';
									}
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>