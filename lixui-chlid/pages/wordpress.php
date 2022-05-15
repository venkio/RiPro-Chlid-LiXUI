<?php
/*
Template Name: 利熙-WordPress下载
* WordPress下载介绍页
*/
?>
<?php get_header(); ?>
<?php $site_wpxz_page_lixui = _cao('site_wpxz_page_lixui'); ?>
<link href="/wp-content/themes/lixui-chlid/pages/assets/wordpress.css" rel="stylesheet">
<header class="header text-white h-fullscreen" style="background-image: url(<?php echo $site_wpxz_page_lixui['lixui_wpxz_img2']; ?>)">
<div class="overlay opacity-90" style="background-color: #000"></div>
<div class="container text-center">
<div class="row h-100">
<div class="col-lg-8 mx-auto align-self-center">
<p><img src="<?php echo $site_wpxz_page_lixui['lixui_wpxz_img1']; ?>" alt="logo"></p>
<h1 class="display-4 my-6"><strong><?php echo $site_wpxz_page_lixui['lixui_wpxzbt_text']; ?></strong></h1>
<p class="lead-3"> <b><?php echo $site_wpxz_page_lixui['lixui_wpxzbt_text']; ?></b> <?php echo $site_wpxz_page_lixui['lixui_wpxzjj_text']; ?></p>
<p>
<a class="btn btn-xl btn-round btn-outline-light w-250" href="<?php echo $site_wpxz_page_lixui['lixui_wpxz_link1']; ?>"><?php echo $site_wpxz_page_lixui['lixui_wpxz_text1']; ?></a>
<br>
<span class="opacity-60 small-3"><?php echo $site_wpxz_page_lixui['lixui_wpxz_text11']; ?></span>
</p>
<p>
<a class="btn btn-xl btn-round btn-outline-light w-250" href="<?php echo $site_wpxz_page_lixui['lixui_wpxz_link2']; ?>"><?php echo $site_wpxz_page_lixui['lixui_wpxz_text2']; ?></a>
<br>
<span class="opacity-60 small-3"><?php echo $site_wpxz_page_lixui['lixui_wpxz_text22']; ?></span>
</p>

</div>
</div>
</div>
</header>
<section class="section bg-gray">
<div class="container">
<header class="section-header">
<small></small>
<h2><?php echo $site_wpxz_page_lixui['lixui_jsbt_text']; ?></h2>
<hr>
<p class="lead"><?php echo $site_wpxz_page_lixui['lixui_jsfbt_text']; ?></p>
</header>
<div data-provide="slider" data-dots="true" data-autoplay="false" data-slides-to-show="2">

<?php $site_wpxz_group_page_lixui = _cao('site_wpxz_group_page_lixui');
if (!empty($site_wpxz_group_page_lixui)) {
    foreach ($site_wpxz_group_page_lixui as $key => $item) {
        echo '<div class="p-5"><div class="card border hover-shadow-6"><div class="card-body px-5"><div class="row">';
        echo '<div class="col-auto mr-auto"><h6><strong>'.$item['_title'].'</strong></h6></div>';
        echo '<div class="col-auto"><div class="rating mb-3"><label class="fa fa-star active"></label>';
        echo '<label class="fa fa-star active"></label><label class="fa fa-star active"></label>';
        echo '<label class="fa fa-star active"></label><label class="fa fa-star active"></label>';
        echo '</div></div></div>';
        echo '<p>'.$item['_text'].'</p><p class="small-2 text-lighter mb-0"><em>'.$item['_bottom'].'</em></p>';
        echo '</div></div></div>';
    } 
}?>

</div>
</div>
</section>
</main>
<script src="/wp-content/themes/lixui-chlid/pages/assets/wordpress.js"></script>
<script>
'use strict';$(function(){page.config({googleApiKey:'AIzaSyDRBLFOTTh2NFM93HpUA4ZrA99yKnCAsto',googleAnalyticsId:'',reCaptchaSiteKey:'6Ldaf0MUAAAAAHdsMv_7dND7BSTvdrE6VcQKpM-n',reCaptchaLanguage:'',disableAOSonMobile:true,smoothScroll:true,});});
</script>
<?php get_footer(); ?>