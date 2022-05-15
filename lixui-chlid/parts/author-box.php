<?php
  $email = get_the_author_meta( 'user_email' );
  $author_id = get_the_author_meta( 'ID' );
  $is_post_favcss = (is_get_post_fav(get_the_ID())) ? ' ok' : '';
?>
<?php /*利熙常见问题*/
$site_nryfqa_lixui = _cao('site_nryfqa_lixui');
if (is_array($site_nryfqa_lixui)  && _cao('is_nryfqa_lixui') ) : ?>
<div id="help" class="m main">
  <h2 class="mt mt20">常见问题FAQ</h2>
  <div class="mb">
    <?php $site_nryfqa_lixui = _cao('site_nryfqa_lixui');
    if (!empty($site_nryfqa_lixui)) { foreach ($site_nryfqa_lixui as $key => $faq)
    {
        $_block = ($faq['_block']) ? 'display: block;' : '' ;
        echo '<dl><dt><i></i>'.$faq['_title'].'</dt><dd style="display: none;'.$_block.'"><i></i>'.$faq['_text'].'</dd></dl>';
        }
    }
    ?>
  </div>
</div>
<?php /*利熙常见问题END*/endif; ?>

<div class="article-footer">
  <?php if( _cao('single_disable_author_box') ) : ?>
  <div class="author-box">
    <div class="author-image">
      <?php echo get_avatar($author_id); ?>
    </div>
    <div class="author-info">
      <h4 class="author-name">
        <a<?php echo _target_blank(); ?> href="javascript:;"><?php the_author(); ?></a>
        <?php $CaoUser = new CaoUser($author_id);
        if ($CaoUser->vip_status()) {
          echo '<span class="label label-warning"><i class="fa fa-diamond"></i> '.$CaoUser->vip_name().'</span>';
        }else{
          echo '<span class="label label-default"><i class="fa fa-diamond"></i> '.$CaoUser->vip_name().'</span>';
        }
        ?>
      </h4>
    </div>
  </div>
  <?php endif;?>
  <?php if (!_cao('post_share_mod','0')): ?>
  <div class="xshare">
      <span class="xshare-title">分享到：</span>
      <?php if (_cao('is_nav_myfav') && is_site_shop_open()): ?>
           <a href="javascript:;" title="收藏文章" etap="star" data-postid="<?php the_ID(); ?>" class="ripro-star<?php echo $is_post_favcss;?>"><i class="fa fa-star-o"></i></a>
      <?php endif; ?>
      <a href="" etap="share" data-share="qq" class="share-qq"><i class="fa fa-qq"></i></a>
      <a href="" etap="share" data-share="weibo" class="share-weibo"><i class="fa fa-weibo"></i></a>
      <?php if( _cao('poster_share_open') ){ ?>
        <a href="javascript:;" class="btn-bigger-cover share-weixin" data-nonce="<?php echo wp_create_nonce('mi-create-bigger-image-'.$post->ID );?>" data-id="<?php echo $post->ID; ?>" data-action="create-bigger-image" title="海报分享" id="bigger-cover"><i class="fa fa-paper-plane"></i></a>
      <?php } ?>
  </div>
  <?php endif; ?>
 
</div>