<?php if (!$this->is('index')): ?>
  <?php $this->need("header.php"); ?>
<?php endif;?>
<?php if (!is_pjax()) { ?>
<section class="postlist easeChange" <?php if(is_index($this->options->siteUrl)) {_e('style="display:none;"');} ?>>
  <nav id="navbar" class="clearfix">
    <div class="toolbar">
      <a id="menu" href="javascript:void(0);" title="菜单（Menu）"><i class="fa fa-bars"></i></a>
      <a id="comments" href="javascript:void(0);" title="留言板（Comments）"><i class="fa fa-comment"></i></a>
      <a id="search" href="javascript:void(0);" title="搜索（Search）"><i class="fa fa-search"></i></a>
    </div>
  </nav>
  <div class="posts-v2">
    <div id="pjax-container" class="container">
      <article class="post-body">
        <section class="post-text">
          <div class="post-title-v2 clearfix">
            <h1><a href="<?php $this->permalink()?>"><?php $this->title()?></a><div class="title-border"></div></h1>
            <h3 class="post-meta">
              <span><?php _e('作者：');?><a href="<?php $this->author->permalink();?>"><?php $this->author();?></a> | </span>
              <span><?php _e('时间：');?><?php $this->date('F j, Y');?> | </span>
              <span><?php _e('分类：');?><?php $this->category(',');?> | </span>
              <span><a href="<?php $this->permalink()?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论');?></a></span>
            </h3>
          </div>
          <div class="post-content-v2">
            <?php $this->content();?>
          </div>
        </section>
      </article>
      <div class="post-footer-tags">
        <span>标签：</span>
        <?php $this->tags(' ', true, '');?>
      </div>
      <div class="post-footer-spliter">
        <div class="post-btn-group">
          <span class="btn-left"><a href="javascript:void(0);">打赏</a></span>
          <span class="btn-middle">
            <a href="javascript:void(0);" title="点赞">
              <ul>
                <li><i class="fa fa-heart"></i></li>
                <li>123</li>
              </ul>
            </a>
          </span>
          <span class="btn-right"><a href="javascript:void(0);">收藏</a></span>
        </div>
      </div>
      <?php $this->need('comments.php');?>
    </div>
  </div>
  <?php $this->need("sidebar.php"); ?>
</section>
<?php } ?>
<?php if (!$this->is('index')): ?>
  <?php $this->need("footer.php"); ?>
<?php endif;?>
