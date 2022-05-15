<?php

$mode_catpost = _cao('mode_catpost');



foreach ($mode_catpost['catcms'] as $key => $cms) { 

	$args = array(
	    'cat'            => $cms['category'],
	    'ignore_sticky_posts' => true,
	    'post_status'         => 'publish',
	    'posts_per_page'      => $cms['count'],
	    'orderby'      => $cms['orderby'],
	);

	///////////S CACHE ////////////////
	if (CaoCache::is()) {
	    $_the_cache_key = 'ripro_home_catpost_posts_'.$args['cat'];
	    $_the_cache_data = CaoCache::get($_the_cache_key);
	    if(false === $_the_cache_data ){
	        $_the_cache_data = new WP_Query($args); //缓存数据
	        CaoCache::set($_the_cache_key,$_the_cache_data);
	    }
	    $data = $_the_cache_data;
	}else{
	    $data = new WP_Query($args); //原始输出
	}
	///////////S CACHE ////////////////
	$category = get_category( $cms['category'] ); ?>
	<div class="section pb-0"><?php /*利熙网分类CMS模块标题开始*/?>
	  <div class="container products-category">
	  	<h3 class="section-title">
	  		<span><a href="<?php echo esc_url( get_category_link( $category->cat_ID ) ); ?>"><?php echo $category->cat_name; ?></a></span>
			<i class="category-num"><?php echo $category->count;?></i>
	  	</h3>
		<?php /*利熙分类CMS模块快捷菜单*/
		$site_fldlkjcd_lixui = _cao('site_fldlkjcd_lixui');
		if (is_array($site_fldlkjcd_lixui)  && _cao('is_fldlkjcd_lixui') ) : ?>
		<div class="choosetype lixui-sycms">
			<?php $site_fldlkjcd_lixui = _cao('site_fldlkjcd_lixui');
			if (!empty($site_fldlkjcd_lixui)) { foreach ($site_fldlkjcd_lixui as $key => $cmskjcd)
			{
				$_blank = ($cmskjcd['_blank']) ? 'target="_blank"' : '' ;
				echo '<a href="'.$cmskjcd['_link'].'" '.$_blank.'>'.$cmskjcd['_title'].'</a>';
				}
			}
			?>
		</div>
		<?php /*利熙分类CMS模块快捷菜单END*/endif; ?>
		<div style="padding-top: 18px;">
			<span></span>
		</div>
		<?php /*利熙网分类CMS模块标题结束*/?>	
	  	<?php _the_cao_ads('ad_list_header', 'list-header');?>
		<div class="row cat-posts-wrapper">
		    <?php while ( $data->have_posts() ) : $data->the_post();
		      get_template_part( 'parts/template-parts/content',$cms['latest_layout'] );
		    endwhile; ?>
		</div>
		<?php _the_cao_ads('ad_list_footer', 'list-footer');?>
	  </div>
	</div>

	<?php 
	wp_reset_postdata();
}
?>