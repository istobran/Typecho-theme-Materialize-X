<?php
include_once "config.php";
include_once "pangu.php";
Typecho_Plugin::factory('Widget_Abstract_Contents')->content = array('iClass', 'iWork');
Typecho_Plugin::factory('Widget_Abstract_Contents')->excerpt = array('iClass', 'iWork');

function is_pjax() {
  return array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX'];
}
function is_index($siteUrl) {      //自定义的首页判断方法
  return $siteUrl == curPageURL();
}
function curPageURL()
{
    $pageURL = 'http';

    if (in_array("HTTPS", $_SERVER) && $_SERVER["HTTPS"] == "on")
    {
        $pageURL .= "s";
    }
    $pageURL .= "://";

    if ($_SERVER["SERVER_PORT"] != "80")
    {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    }
    else
    {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}
function cdn($pageURL) {
  return CDN_URL.$pageURL;
}

class iClass {
	public static function iWork($content,$widget,$lastResult)
	{
		$content = empty($lastResult) ? $content : $lastResult;
		if ($widget instanceof Widget_Archive) {
			//七牛缩略图
			$content = preg_replace('/(qiniudn\.com\/)+(.*)(.jpg|.jpeg|.png|.gif)+/i', '$1$2$3-haipz.com.picture', $content);
      // 处理中英文之间的空格
      $content = pangu($content);
		}
		return $content;
	}
}
