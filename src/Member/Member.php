<?php

namespace ImService\Member;

use ImService\Bridge\AccessTokenTrait;
use ImService\Bridge\Http;
use ImService\Bridge\Serializer;

/**
 * Class Member
 * @package ImService\Member
 */
class Member
{
    use AccessTokenTrait;

    /**
     * 创建用户
     * @param string $account
     * @param string $nickname
     * @param string $portrait
     * @param array $extras
     * @throws \Exception
     */
    public function makeMember(string $account, string $nickname, string $portrait, array $extras = [])
    {
        $res = Http::request('POST', $this->accessToken->getHost() . '/api/member/createMember')->withBody([
            'account' => $account,
            'nickname' => $nickname,
            'portrait' => $portrait,
            'extras' => Serializer::jsonEncode($extras)
        ])->withAccessToken($this->accessToken)->send();
        if ($res->get('status') != 200) {
            throw new \Exception($res->get('msg'));
        }
    }

    /**
     *
     */
    public function getInfo()
    {

    }
}