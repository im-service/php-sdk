<?php

namespace ImService\Member;

use ImService\Bridge\AccessTokenTrait;
use ImService\Bridge\Http;

/**
 * Class MemberGroup
 * @package ImService\Member
 */
class MemberGroup
{
    use AccessTokenTrait;

    /**
     * 加入群组
     * @param string $group_name
     * @param string $account
     * @param null|string $alias
     * @param bool $forbidden_words
     * @throws \Exception
     */
    public function joinGroup($group_name, $account, $alias = null, $forbidden_words = false)
    {
        $res = Http::request('POST', $this->accessToken->getHost() . '/api/member/joinGroup')->withBody([
            'group_name' => $group_name,
            'account' => $account,
            'alias' => $alias === null ? $account : $alias,
            'forbidden_words' => false,
        ])->withAccessToken($this->accessToken)->send();
        if ($res->get('status') != 200) {
            throw new \Exception($res->get('msg'));
        }
    }
}