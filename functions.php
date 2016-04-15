<?php
include_once "config.php";
include_once "pangu.php";
Typecho_Plugin::factory('Widget_Abstract_Contents')->content = array('Pangu', 'makeArticle');
Typecho_Plugin::factory('Widget_Abstract_Contents')->excerpt = array('Pangu', 'makeArticle');

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

class Pangu {
	public static function makeArticle($content,$widget,$lastResult)
	{
		$content = empty($lastResult) ? $content : $lastResult;
		if ($widget instanceof Widget_Archive) {
      // 处理中英文之间的空格
      $content = pangu($content);
		}
		return $content;
	}
}

/**
* 浏览器及操作系统判断
*
* @param string $agent 系统数据库中访者数据
*/

/** 获取浏览器信息 */
function getBrowser($agent)
{
    if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
        $outputer = 'Internet Explorer' . ' ' . $regs[1];
    } else if (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
        $outputer = 'Mozilla FireFox' . ' ' . $regs[1];
    } else if (preg_match('/Maxthon([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $outputer = 'Maxthon' . ' ' . $regs[2];
    } else if (preg_match('/Chrome([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $outputer = 'Google Chrome' . ' ' . $regs[2];
    } else if (preg_match('/QQBrowser\/([^\s]+)/i', $agent, $regs)) {
        $regg = explode("/",$regs[1]);
        $outputer = 'QQ浏览器' . ' ' . $regg[0];
    } else if (preg_match('/UC/i', $agent)) {
        $outputer = 'UCWeb' . ' ' . '8.11112510';
    } else if (preg_match('/safari\/([^\s]+)/i', $agent, $regs)) {
        $outputer = 'Apple Safari' . ' ' . $regs[1];
    } else if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
        $outputer = 'Opera' . ' ' . $regs[1];
    } else {
        $outputer = '其它浏览器';
    }

    echo $outputer;
}

/** 获取操作系统信息 */
function getOs($agent)
{
    $os = false;

    if (preg_match('/win/i', $agent)) {
        if (preg_match('/nt 6.0/i', $agent)) {
            $os = 'Windows Vista';
        } else if (preg_match('/nt 6.1/i', $agent)) {
            $os = 'Windows 7';
        } else if (preg_match('/nt 5.1/i', $agent)) {
            $os = 'Windows XP';
        } else if (preg_match('/nt 5/i', $agent)) {
            $os = 'Windows 2000';
        } else {
            $os = 'Windows';
        }
    } else if (preg_match('/android/i', $agent)) {
        $os = 'Android';
    } else if (preg_match('/ubuntu/i', $agent)) {
        $os = 'Ubuntu';
    } else if (preg_match('/linux/i', $agent)) {
        $os = 'Linux';
    } else if (preg_match('/mac/i', $agent)) {
        $os = 'Mac OS X';
    } else if (preg_match('/unix/i', $agent)) {
        $os = 'Unix';
    } else if (preg_match('/symbian/i', $agent)) {
        $os = 'Nokia SymbianOS';
    } else {
        $os = '其它操作系统';
    }

    echo $os;
}
