<aside id="sidebar" class="easeChange clearfix" <?php if(is_index($this->options->siteUrl)) {_e('style="display:none;"');} ?>>
  <div class="avatar">
    <a href="<?php $this->options->siteUrl("index.php/page/1"); ?>"><img src="<?php _e(cdn("logo-min.png"));?>" alt="BangZ" width="150" height="150"></a>
  </div>
  <div class="name">
    <?php _e("BangZ 梦工厂"); ?>
  </div>
  <?php $this->widget('Widget_Metas_Category_List')->to($categorys);?>
  <div class="group-list clearfix">
    <ul class="divider">
      <li class="header-line"></li>
      <li class="header-text"><span><?php _e("分类导航");?><small><?php _e("（Category）");?></small></span></li>
    </ul>
    <div class="group-item">
      <ul>
        <?php while ($categorys->next()): ?>
        <li <?php if ($this->is('category', $categorys->slug)): ?> class="active"<?php endif;?> >
          <a class="easeChange reffect" href="<?php $categorys->permalink();?>" title="<?php $categorys->name();?>"><?php $categorys->name();?></a>
        </li>
        <?php endwhile;?>
      </ul>
    </div>
  </div>
  <?php $this->widget('Widget_Contents_Page_List')->to($pages);?>
  <div class="group-list">
    <ul class="divider">
      <li class="header-line"></li>
      <li class="header-text"><span><?php _e("常用传送门");?><small><?php _e("（Link）");?></small></span></li>
    </ul>
    <div class="group-item">
      <ul>
        <?php while ($pages->next()): ?>
        <li <?php if ($this->is('page', $pages->slug)): ?> class="active"<?php endif;?> >
          <a class="easeChange reffect" href="<?php $pages->permalink();?>" title="<?php $pages->title();?>"><?php $pages->title();?></a>
        </li>
        <?php endwhile;?>
      </ul>
    </div>
  </div>
</aside>
