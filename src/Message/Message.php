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
     * @param $lists
     * @return \Doctrine\Common\Collections\ArrayCollection|string
     * @throws \Exception
     */
    public function pushMessageToMember($lists)
    {
        $res = Http::request('POST', $this->accessToken->getHost() . '/api/message/pushMessage')->withBody($lists)->withAccessToken($this->accessToken)->send();
        if ($res->get('status') == 400) {
            throw new \Exception($res->get('msg'));
        }
    }
}