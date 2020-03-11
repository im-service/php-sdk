<?php

namespace ImService\Member;

use ImService\Bridge\AccessTokenTrait;
use ImService\Bridge\Http;
use ImService\Bridge\Util;

/**
 * Class MemberToken
 * @package ImService\Member
 */
class MemberToken
{
    use AccessTokenTrait;

    /**
     * 获取Ws链接地址
     * @param string $token
     * @param string $uuid
     * @return string
     */
    public function getWebSocketConnectionUri(string $token, string $uuid = '')
    {
        if (strlen($uuid) <= 0) {
            $uuid = Util::getRandomString(15);
        }
        return sprintf("ws://%s/client?appid=%s&token=%s&uuid=%s", str_replace(['http://','https://'],'',$this->accessToken->getHost()), $this->accessToken->getAppId(), $token, $uuid);
    }

    /**
     * 创建用户token
     * @param string $account
     * @param string $device
     * @return mixed|null
     * @throws \Exception
     */
    public function makeToken(string $account, string $device)
    {
        $res = Http::request('POST', $this->accessToken->getHost() . '/api/member/createToken')->withBody([
            'account' => $account,
            'device' => $device
        ])->withAccessToken($this->accessToken)->send();
        if ($res->get('status') != 200) {
            throw new \Exception($res->get('msg'));
        }
        return $res->get('token');
    }
}