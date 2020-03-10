<?php

namespace ImService\Bridge;
/**
 * Class Util
 * @package ImService\Bridge
 */
class Util
{
    /**
     * 获取当前时间缀
     */
    public static function getTimestamp()
    {
        return (string)time();
    }

    /**
     * 获取随机字符
     */
    public static function getRandomString($length = 10)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, ceil($length / strlen($pool)))), 0, $length);
    }

    /**
     * 过滤微信昵称中的表情（不过滤 HTML 符号）
     */
    public static function filterNickname($nickname)
    {
        $pattern = array(
            '/\xEE[\x80-\xBF][\x80-\xBF]/',
            '/\xEF[\x81-\x83][\x80-\xBF]/',
            '/[\x{1F600}-\x{1F64F}]/u',
            '/[\x{1F300}-\x{1F5FF}]/u',
            '/[\x{1F680}-\x{1F6FF}]/u',
            '/[\x{2600}-\x{26FF}]/u',
            '/[\x{2700}-\x{27BF}]/u',
            '/[\x{20E3}]/u'
        );

        $nickname = preg_replace($pattern, '', $nickname);

        return trim($nickname);
    }
}