<?php

namespace ImService\Callback;

use ImService\Bridge\AccessTokenTrait;
use ImService\Bridge\Http;

/**
 * Class Seting
 * @package ImService\Callback
 */
class Seting
{
    use AccessTokenTrait;

    /**
     * 设置回调
     * @param string $key
     * @param string $value
     * @throws \Exception
     */
    public function setCallback(string $key,string $value='')
    {
        $res = Http::request('POST', $this->accessToken->getHost() . '/api/callback/setCallback')->withBody([
            'key' => $key,
            'value' => $value
        ])->withAccessToken($this->accessToken)->send();
        if ($res->get('status') != 200) {
            throw new \Exception($res->get('msg'));
        }
    }

    /**
     * @param $key
     * @return mixed|null
     * @throws \Exception
     */
    public function getCallback($key)
    {
        $res = Http::request('POST', $this->accessToken->getHost() . '/api/callback/getCallback')->withBody([
            'key' => $key
        ])->withAccessToken($this->accessToken)->send();
        if ($res->get('status') != 200) {
            throw new \Exception($res->get('msg'));
        }
        return $res->get('uri');
    }
}