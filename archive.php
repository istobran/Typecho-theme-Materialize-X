<?php
  /*
    * 调用了浏览量统计插件
    * <?php $this->viewsNum(); ?>
    * 插件源地址：http://lixianhua.com/typecho_viewsnum_plugin.html
  */
?>
<?php if (!$this->is('index')): ?>
  <?php $this->need("header.php"); ?>
<?php endif;?>
<section class="postlist easeChange" <?php if(is_index($this->options->siteUrl)) {_e('style="display:none;"');} ?>>
  <nav id="navbar" class="clearfix">
    <div class="toolbar">
      <a id="menu" href="javascript:void(0);" title="菜单（Menu）"><i class="fa fa-bars"></i></a>
      <a id="comments" href="javascript:void(0);" title="留言板（Comments）"><i class="fa fa-comment"></i></a>
      <a id="search" href="javascript:void(0);" title="搜索（Search）"><i class="fa fa-search"></i></a>
    </div>
  </nav>
  <header id="latest-header">
    <div class="container">
      <h3><?php _e("最近的文章");?><small><?php _e("Latest articles");?></small></h3>
    </div>
  </header>
  <div class="posts">
    <div id="pjax-container" class="container">
      <?php while ($this->next()): ?>
      <article class="post-body">
        <div class="post-date">
          <span class="weekday"><?php _e(strtoupper(substr(date('l', $this->created), 0, 3))); ?></span>
          <span class="day"><?php $this->date('d'); ?></span>
        </div>
        <section class="post-text">
          <div class="post-title clearfix">
            <h1><a href="<?php $this->permalink()?>"><?php $this->title()?></a><div class="title-border"></div></h1>
            <div class="author-info">
              <div class="author-avatar">
                <?php $this->author->gravatar(); ?>
              </div>
              <strong class="author-name"><a href="<?php $this->author->permalink();?>"><?php $this->author();?></a></strong>
            </div>
          </div>
          <div class="post-content">
            <?php $this->content('<button class="post-more"><i class="fa fa-hand-o-right"></i> READ MORE</button>');?>
          </div>
          <div class="post-info">
            <span class="category"><i class="fa fa-bookmark"></i> <?php $this->category(', '); ?></span>
            <span class="visits"><i class="fa fa-eye"></i> <?php $this->viewsNum(); ?></span>
            <span class="tags"><i class="fa fa-tags"></i> <?php $this->tags(', ', true, ''); ?></span>
            <span class="comments"><i class="fa fa-comments"></i> <a href="<?php $this->permalink()?>#comment"><?php $this->commentsNum('No Comment', '1 Comment', '%d Comments');?></a></span>
          </div>
        </section>
      </article>
      <?php endwhile;?>
      <?php $this->pageNav('&laquo; ', '&raquo;', 3, '...', array('wrapClass' => 'pagination', 'currentClass' => 'current'));?>
    </div>
  </div>
  <?php $this->need("sidebar.php"); ?>
</section>
<?php if (!$this->is('index')): ?>
  <?php $this->need("footer.php"); ?>
<?php endif;?>
