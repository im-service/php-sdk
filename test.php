<?php

include_once "./vendor/autoload.php";
/**
 * 缓存
 */
$cacheDriver = new \Doctrine\Common\Cache\FilesystemCache('./cacheDir');
/**
 * 实例化授权
 */
$accessToken = new \ImService\AccessToken('http://127.0.0.1:9501','ieua1o00imm5mhx','8920depfr4pzqz3');
/**
 * 设置缓存
 */
$accessToken->setCache($cacheDriver);
/**
 * 获取字符串token
 */
//$token = $accessToken->getTokenString();
/**
 * 创建用户
 */

//var_dump($token);