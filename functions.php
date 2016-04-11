<?php
include_once "config.php";

function is_pjax() {
  return array_key_exists('HTTP_X_PJAX', $_SERVER) && _SERVER['HTTP_X_PJAX'];
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
