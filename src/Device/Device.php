<?php

namespace ImService\Device;

use ImService\Bridge\AccessTokenTrait;
use ImService\Bridge\Http;

/**
 * Class Device
 * @package ImService\Device
 */
class Device
{
    use AccessTokenTrait;

    /**
     * 创建设备
     * @param string $name
     * @param string $desc
     * @throws \Exception
     */
    public function makeDevice(string $name, string $desc = '')
    {
        $res = Http::request('POST', $this->accessToken->getHost() . '/api/device/createDevice')->withBody([
            'name' => $name,
            'desc' => $desc
        ])->withAccessToken($this->accessToken)->send();
        if ($res->get('status') != 200) {
            throw new \Exception($res->get('msg'));
        }
    }
}