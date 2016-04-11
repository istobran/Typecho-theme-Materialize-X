<?php
/**
 * 基于 Typecho 1.0 的 Bootstrap 模板
 * @package BangZ Typecho theme X
 * @author BangZ
 * @version 1.0
 * @link http://bangz.me/
 */
$this->need("header.php");
?>

<?php if (is_index($this->options->siteUrl)): ?>
  <section class="billboard">
    <div class="billboard-background">
      <div class="circleContainer">
        <div class="circle1">
        </div>
        <div class="circle2">
        </div>
        <P class="circleFont"><?php _e("loading"); ?></P>
      </div>
    </div>
    <div class="billboard-background-mask"></div>
    <div class="billboard-container">
      <div class="logo-container">
        <img src="<?php _e(CDN_URL."logo-min.png");?>" alt="BangZ Logo" width="200" height="200" />
      </div>
      <div class="billboard-text">
        <div class="billboard-text-border-top"></div>
        <h1 class="blog-title"><?php $this->options->title()?></h1>
        <h3 class="blog-description"><?php $this->options->description()?></h3>
        <div class="billboard-text-border-bottom"></div>
        <div id="link-article" class="blog-entrance">
          <!-- <h3 class="blog-entrance-text">&lt; Start ! &gt;</h3> -->
          <i class="fa fa-chevron-down"></i><br>
          <i class="fa fa-chevron-down"></i><br>
          <i class="fa fa-chevron-down"></i>
        </div>
      </div>
    </div>
    <div class="billboard-footer">
      <?php _e("Powered by ");?><a href="http://bangz.me" target="_blank"><?php _e("BangZ");?></a>
    </div>
  </section>
<?php endif;?>
<?php $this->need("archive.php"); ?>
<?php
$this->need("footer.php");
?>
