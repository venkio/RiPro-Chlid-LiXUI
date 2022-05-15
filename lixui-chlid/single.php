<?php
	$sidebar = cao_sidebar();
	$column_classes = cao_column_classes( $sidebar );
	get_header();
?>
<?php /*利熙覆盖app.css代码高度导致Banner标题顶部留空*/ ;?>
<style>
.site-content, .single-post .site-content {
    padding-top: 0px;
    padding-bottom: 0px;
}
</style>
<?php /*利熙内容页Banner标题*/$site_nrybannerbt_lixui = _cao('site_nrybannerbt_lixui');
if (is_array($site_nrybannerbt_lixui)  && _cao('is_nrybannerbt_lixui') ) : ?>

<?php
    global $post;
    $bg_img = (_cao('is_single_top_bg_one','0')) ? _cao('single_top_bg_one_img') : _get_post_thumbnail_url() ;
    $seo_title = get_the_title();
?>

<div class="article-top">
  <div class="single-top">
    <section class="article-focusbox bgimg-fixed lazyloaded" data-bg="<?php echo $site_nrybannerbt_lixui['lixui_bannerbg_img']; ?>" style="background-image: url(&quot;<?php echo $site_nrybannerbt_lixui['lixui_bannerbg_img']; ?>&quot;);">
    
    <?php if ($site_nrybannerbt_lixui['lixui_bannerbgwzt_switch']): ?>
    <div class="bg">
      <div class="bg-img lazyload visible" data-bg="<?php echo $bg_img;?>"> </div>
      <img class="seo-img" src="<?php echo $bg_img;?>" title="<?php echo $seo_title; ?>" alt="<?php echo $seo_title; ?>">
    </div>
    <?php endif; ?>
    <div class="container m-auto">
      <header class="article-header">
        <h1 class="article-title"><?php the_title(); ?></h1>
        <div class="article-meta">
            <?php if ($site_nrybannerbt_lixui['lixui_bannerfl_switch']): ?>
            <span class="meta entry-category"><?php echo _get_post_category();?></span>
            <?php endif; ?>
            
            <?php if ($site_nrybannerbt_lixui['lixui_bannerrq_switch']): ?>
            <span class="meta"><time datetime="<?php echo get_the_date( 'c' );?>"><i class="mdi mdi-camera-timer"></i> <?php echo get_the_date().' '.get_the_time(); ?></time></span>
            <?php endif; ?>
            <?php if ($site_nrybannerbt_lixui['lixui_bannerll_switch']): ?>
            <span class="meta"><i class="mdi mdi-eye"></i> <?php echo _get_post_views() ?></span>
            <?php endif; ?>
            <?php if ($site_nrybannerbt_lixui['lixui_bannerpl_switch']): ?>
            <span class="meta"><!-- <i class="mdi mdi-comment-processing-outline"></i> --> <?php echo _get_post_comments(); ?></span>
            <?php endif; ?>
            <?php if ($site_nrybannerbt_lixui['lixui_bannerzz_switch']): ?>
            <span class="meta"><a class="" href="<?php echo get_author_posts_url($post->post_author); ?>"><i class="mdi mdi-account-edit"></i> <?php echo get_the_author_meta( 'nickname', $post->post_author ); ?></a></span>
            <?php endif; ?>
            <?php if ($site_nrybannerbt_lixui['lixui_bannerbd_switch']): ?>
				<span class="item"><a target="_blank" title="百度搜索：<?php echo get_the_title(); ?> - <?php bloginfo('name'); ?>" rel="external nofollow" href="https://www.baidu.com/s?wd=<?php echo get_the_title(); ?> - <?php bloginfo('name'); ?>"><i class="fa fa-paw"></i></a></span>
				<?php endif; ?>
            <span class="meta"><?php edit_post_link('[编辑]'); ?></span>
        </div>
    </header>
    </div>
  </div>
 </section>
    <?php /*Banner标题波浪*/if ($site_nrybannerbt_lixui['lixui_bannerbl_switch']): ?>
    <div class="dabolang"> 
    		<div id="dabolangl1" class="dabolangl"></div> 
    		<div id="dabolangl2" class="dabolangl"></div> 
    		<div id="dabolangl3" class="dabolangl"></div>
    </div>
<?php endif; ?>
<?php /*利熙内容页Banner标题END*/endif; ?>

<div class="container">
	<div class="breadcrumbs">
	<?php echo dimox_breadcrumbs(); ?>
	</div>
	<div class="row">
		<div class="<?php echo esc_attr( $column_classes[0] ); ?>">
			<div class="content-area">
				<main class="site-main">
					<?php while ( have_posts() ) : the_post();
						get_template_part( 'parts/template-parts/content', 'single' );
					endwhile; ?>
				</main>
			</div>
		</div>
		<?php if ( $sidebar != 'none' ) : ?>
			<div class="<?php echo esc_attr( $column_classes[1] ); ?>">
				<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php if (_cao('disable_related_posts','1') && _cao('related_posts_style','grid')=='fullgrid') {
	get_template_part( 'parts/related-posts' );
}?>

<?php get_footer(); ?>