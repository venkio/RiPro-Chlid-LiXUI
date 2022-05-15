<?php /*利熙内容页正文顶栏*/$site_nryzwlzwnr_lixui = _cao('site_nryzwlzwnr_lixui');
if (is_array($site_nryzwlzwnr_lixui)  && _cao('is_nryzwlzwnr_lixui') ) : ?>

<div class="cao_entry_header">
    <div class="title-tgroup">
        <span style="float: right; margin-right: 55px;"><?php edit_post_link('[编辑]'); ?></span>
        <?php if ($site_nryzwlzwnr_lixui['lixui_nryzwlzwnr_switch']): ?>
        <div class="lixui-title-bar"><i class="lixui-title-iconse lixui-float-rightse"></i></div>
        <?php endif; ?>
        <div class="lixui-post-top">
            <a class="current"><?php echo $site_nryzwlzwnr_lixui['lixui_nryzwlzwnr_text']; ?></a>
        </div>
    </div>
</div>
<?php /*利熙内容页正文顶栏END*/endif; ?>

<?php /*开启下载美化功能覆盖普通文章内容评论标签-利熙网*/if (_cao('ridl_on')) : ?>
<div class="title-tgroup" style="padding-bottom: 0px;border-bottom: 0px !important;">
    <?php /*内页正文栏仿MAC风彩色圆点角标开始-利熙网*/ if (_cao('is_nryzwlcsyd_lixui')) : ?>
    <div class="lixui-title-bar" style="margin-top: -10px;"><i class="lixui-title-iconse lixui-float-rightse"></i></div>
    <?php /*内页正文栏仿MAC风彩色圆点角标结束-利熙网*/ endif; ?>
    <div class="tabtst" style="margin-bottom: 20px;">
        <li>正文内容</li>
        <li>评论建议</li>
    </div>
</div>
<?php endif; ?>