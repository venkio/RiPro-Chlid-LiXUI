<?php
	$sidebar = cao_sidebar();
	$column_classes = cao_column_classes( $sidebar );
	get_header();
?>
<?php /*覆盖app.css代码高度导致Banner标题顶部留空修复-利熙网*/ ;?>
<style>
.site-content, .single-post .site-content {
    padding-top: 0px;
    padding-bottom: 0px;
}
</style>
<?php /*内页Banner标题开始-利熙网*/$site_nrybannerbt_lixui = _cao('site_nrybannerbt_lixui');
if (is_array($site_nrybannerbt_lixui)  && _cao('is_nrybannerbt_lixui') ) : ?>
<div class="article-top">
  <div class="single-top">
    <section class="article-focusbox bgimg-fixed lazyloaded" data-bg="<?php echo $site_nrybannerbt_lixui['lixui_bannerbg_img']; ?>" style="background-image: url(&quot;<?php echo $site_nrybannerbt_lixui['lixui_bannerbg_img']; ?>&quot;);">
    <?php if ($site_nrybannerbt_lixui['lixui_bannerbgwzt_switch']): ?>
    <?php endif; ?>
    <div class="container m-auto">
      <header class="article-header">
        <h1 class="article-title"><?php the_title(); ?></h1>
        <div class="article-meta">
            <?php if ($site_nrybannerbt_lixui['lixui_bannerzz_switch']): ?>
            <span class="meta"><a class="" href="<?php echo get_author_posts_url($post->post_author); ?>"><i class="mdi mdi-account-edit"></i> <?php echo get_the_author_meta( 'nickname', $post->post_author ); ?></a></span>
            <?php endif; ?>
            <span class="meta"><?php edit_post_link('[编辑]'); ?></span>
        </div>
    </header>
    </div>
  </div>
 </section>
    <?php /*内页Banner标题波浪*/if ($site_nrybannerbt_lixui['lixui_bannerbl_switch']): ?>
    <div class="dabolang mobile-hide"> 
    		<div id="dabolangl1" class="dabolangl"></div> 
    		<div id="dabolangl2" class="dabolangl"></div> 
    		<div id="dabolangl3" class="dabolangl"></div>
    </div>
<?php endif; ?>
<?php /*内页Banner标题结束-利熙网*/endif; ?>
<div class="container">
	<div class="row">
		<div class="article-content <?php echo esc_attr( $column_classes[0] ); ?>">
			<div class="content-area">
				<main class="site-main">
<?php /*默认页面标题-利熙网*/ ?>
<style>.tabtst,.lixui-title-bar{display: none;}.row, .navbar .menu-item-mega>.sub-menu {margin-top: 15px;}.cao_entry_header {margin-top: 10px;}@media (max-width: 768px){.article-top {margin-bottom: 20px;}}
@media (max-width: 575px){
.container {
    max-width: 380px;
}}
</style>
<?php /*默认页面标题结束*/ ?>
					<?php while ( have_posts() ) : the_post();
						get_template_part( 'parts/template-parts/content', 'page' );
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

<?php get_footer(); ?>