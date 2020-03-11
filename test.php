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
//$member = new \ImService\Member\Member($accessToken);
//$res = $member->makeMember('aaaa','bbb','hhh',['level'=>1]);
/**
 * 创建设备
 */
//$device = new \ImService\Device\Device($accessToken);
//$res = $device->makeDevice('android','安卓设备');
/**
 * 创建用户Token
 */
//$member_token = new \ImService\Member\MemberToken($accessToken);
//$token = $member_token->makeToken('aaa','android');
/**
 * 创建群组
 */
//$group = new \ImService\Group\Group($accessToken);
//$res = $group->makeGroup('测试');
/**
 * 加入群组
 */
//$member_group = new \ImService\Member\MemberGroup($accessToken);
//$res = $member_group->joinGroup('测试','aaaa');
/**
 * 获取连接
 */
//$member_token = new \ImService\Member\MemberToken($accessToken);
//$res = $member_token->getWebSocketConnectionUri($token);
/**
 * 推送消息到账户
 */
//$message = new \ImService\Message\Message($accessToken);
//$res = $message->pushMessageToMember('aaa',['type'=>'test','a'=>1],'android');
//var_dump($res);
//var_dump($token);