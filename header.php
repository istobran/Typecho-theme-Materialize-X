<?php if (!is_pjax()) { ?>
<!DOCTYPE html>
<html lang="zh-cn" class="han-la">
  <head>
    <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="<?php $this->options->charset();?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php $this->header();?>

  <title><?php $this->archiveTitle(array(
  'category' => _t('分类 %s 下的文章'),
  'search' => _t('包含关键字 %s 的文章'),
  'tag' => _t('标签 %s 下的文章'),
  'author' => _t('%s 发布的文章'),
), '', ' - ');?><?php $this->options->title();?>
  </title>
  <link href="<?php $this->options->themeUrl('css/loading-effect.css');?>" rel="stylesheet">
  <link href="<?php $this->options->themeUrl('css/themeX.css');?>" rel="stylesheet">
  <link href="//cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<?php } ?>
