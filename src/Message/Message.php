<?php

namespace ImService\Message;

use ImService\Bridge\AccessTokenTrait;
use ImService\Bridge\Http;
use ImService\Bridge\Util;

/**
 * Class Message
 * @package ImService\Message
 */
class Message
{
    use AccessTokenTrait;

    /**
     * 推送消息到用户
     * @param string $account
     * @param array $data
     * @param null $device
     * @return \Doctrine\Common\Collections\ArrayCollection|string
     * @throws \Exception
     */
    public function pushMessageToMember($account,$data,$device = null)
    {
        $res = Http::request('POST', $this->accessToken->getHost() . '/api/message/pushMessage')->withBody([
            'account' => $account,
            'device' => $device,
            'data' => $data
        ])->withAccessToken($this->accessToken)->send();
        if ($res->get('status') == 400) {
            throw new \Exception($res->get('msg'));
        }
        return $res;
    }
}