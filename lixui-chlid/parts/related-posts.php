<?php
$type = 'tag';
$terms = get_the_tags();
if (!$terms) {
  $terms = get_the_category();
  $type = 'category';
}
if ( $terms && _cao( 'disable_related_posts') == 1 ) : 
  $args = array(
    'orderby' => 'rand',
    'post__not_in' => array( get_the_ID() ),
    'posts_per_page' => _cao('related_posts_num','4'),
  );
  $term_ids = array();
  foreach ( $terms as $term ) {
    $term_ids[] = $term->term_id;
  }
  switch ( $type ) {
    case 'tag' :
      $args['tag__in'] = $term_ids;
      break;
    case 'category' :
      $args['category__in'] = $term_ids;
      break;
  }
  ///////////S CACHE ////////////////
  if (CaoCache::is()) {
      $_the_cache_key = 'ripro_related_posts_'.get_the_ID();
      $_the_cache_data = CaoCache::get($_the_cache_key);
      if(false === $_the_cache_data ){
          $_the_cache_data = new WP_Query( $args ); //缓存数据
          CaoCache::set($_the_cache_key,$_the_cache_data);
      }
      $related_posts = $_the_cache_data;
  }else{
      $related_posts = new WP_Query( $args ); //缓存数据
  }
  ///////////S CACHE ////////////////
  
  if ( $related_posts->have_posts() ) :
    $rs = _cao('related_posts_style','grid');
    // 判断风格
    if ($rs=='grid') { ?>
      <!-- # 标准网格模式... -->
      <div class="related-posts-grid">
        <h4 class="u-border-title">相关推荐</h4>
        <div class="row">
         <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
            <div class="col-6 col-sm-3 col-md-3 mt-10 mb-10">
              <article class="post">
                <?php cao_entry_media( array( 'layout' => 'rect_300' ) ); ?>
                <div class="entry-wrapper">
                  <?php cao_entry_header( array( 'tag' => 'h4') ); ?>
                </div>
              </article>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    <?php }elseif ($rs=='list') { ?>
      <!-- # 纯标题列表模式... -->
    <?php }elseif ($rs=='fullgrid') { ?>
      <!-- # 全宽底部网格模式... -->
      <div class="bottom-area bgcolor-fff">
        <div class="container">
          <div class="related-posts">
            <h3 class="u-border-title">相关推荐</h3>
            <div class="row">
              <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                <div class="col-lg-6">
                  <article class="post">
                    <?php cao_entry_media( array( 'layout' => 'rect_300' ) ); ?>
                    <div class="entry-wrapper">
                      <?php cao_entry_header( array( 'tag' => 'h4' ,'author'=>true) ); ?>
                      <div class="entry-excerpt u-text-format">
                        <?php echo _get_excerpt($limit = 55, $after = '...'); ?>
                      </div>
                      <?php get_template_part( 'parts/entry-footer' ); ?>
                    </div>
                  </article>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    
  <?php
  endif;
  wp_reset_postdata();
endif;

?>
<?php /*内页服务介绍块＆联系客服块开始-利熙网*/
$site_nryfwjsk_lixui = _cao('site_nryfwjsk_lixui');
if (is_array($site_nryfwjsk_lixui)  && _cao('is_nryfwjsk_lixui') ) : ?>
<div style="width: 100%;margin-top: 30px;" class="lixui-fuwu">
<div class="soft_t">
    <h3><?php echo $site_nryfwjsk_lixui['lixui_fw_text']; ?></h3>
</div>
<ul class="helpUl">
    <li>
        <table>
            <tbody>
            <?php if ($site_nryfwjsk_lixui['lixui_fw1_switch']): ?>
            <tr>
                <td class="td" rowspan="4" width="150"><strong><?php echo $site_nryfwjsk_lixui['lixui_fw1_text']; ?></strong></td>
                <td> <?php echo $site_nryfwjsk_lixui['lixui_fw11_text']; ?></td>
            </tr>
            <tr>
                <td> <?php echo $site_nryfwjsk_lixui['lixui_fw12_text']; ?></td>
            </tr>
            <tr>
                <td> <?php echo $site_nryfwjsk_lixui['lixui_fw13_text']; ?></td>
            </tr>
            <tr>
            </tr>
            <?php endif; ?>
            <?php if ($site_nryfwjsk_lixui['lixui_fw2_switch']): ?>
            <tr>
                <td class="td" rowspan="5" width="150"><strong><?php echo $site_nryfwjsk_lixui['lixui_fw2_text']; ?></strong></td>
                <td> <?php echo $site_nryfwjsk_lixui['lixui_fw21_text']; ?></td>
            </tr>
            <tr>
                <td> <?php echo $site_nryfwjsk_lixui['lixui_fw22_text']; ?></td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td> <?php echo $site_nryfwjsk_lixui['lixui_fw23_text']; ?></td>
            </tr>
            <tr>
                <td> <?php echo $site_nryfwjsk_lixui['lixui_fw24_text']; ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($site_nryfwjsk_lixui['lixui_fw3_switch']): ?>
            <tr>
                <td class="td"><strong><?php echo $site_nryfwjsk_lixui['lixui_fw3_text']; ?></strong></td>
                <td><strong><?php echo $site_nryfwjsk_lixui['lixui_fw31_text']; ?></strong></td>
            </tr>
            <?php endif; ?>
            <?php if ($site_nryfwjsk_lixui['lixui_fw4_switch']): ?>
            <tr>
                <td class="td"><strong><?php echo $site_nryfwjsk_lixui['lixui_fw4_text']; ?></strong></td>
                <td><strong><?php echo $site_nryfwjsk_lixui['lixui_fw41_text']; ?></strong></td>
            </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </li>
</ul>
</div>
<?php endif; ?>
<?php /*内页联系客服块*/
$site_nrylxkfk_lixui = _cao('site_nrylxkfk_lixui');
if (is_array($site_nrylxkfk_lixui)  && _cao('is_nrylxkfk_lixui') ) : ?>
<div style="width: 100%;margin-top: 30px;" class="lixui-fuwu content">
    <h3 style="text-align: center;border-left: 0px none;font-size: 23px;padding-left: 100px;"><?php echo $site_nrylxkfk_lixui['lixui_1_text']; ?></h3>
    <a target="_blank" href="<?php echo $site_nrylxkfk_lixui['lixui_1_link']; ?>" class="lixui-model-btn"><?php echo $site_nrylxkfk_lixui['lixui_2_text']; ?></a>
</div>
<?php /*内页服务介绍块＆联系客服块结束-利熙网*/endif; ?>