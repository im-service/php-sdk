<?php

namespace ImService;

use Doctrine\Common\Cache\Cache;
use ImService\Bridge\CacheTrait;
use ImService\Bridge\Http;

/**
 * Class AccessToken
 * @package ImService
 */
class AccessToken
{
    use CacheTrait;
    /**
     * 应用id
     * @var string
     */
    protected $appid = '';
    /**
     * 服务地址
     * @var string
     */
    protected $host = '';
    /**
     * 应用秘钥
     * @var string
     */
    protected $secret = '';
    /**
     * 授权
     * @var string
     */
    protected $token = '';

    /**
     * AccessToken constructor.
     * AccessToken constructor.
     * @param string $host
     * @param string $appid
     * @param string $secret
     * @throws \Exception
     */
    public function __construct($host, $appid, $secret)
    {
        $this->host = $host;
        $this->appid = $appid;
        $this->secret = $secret;
    }

    /**
     * @return mixed|string|null
     * @throws \Exception
     */
    private function getToken()
    {
        /**
         * 判断缓存是否有效
         */
        if ($this->cache instanceof Cache && $token = $this->cache->fetch($this->host . '/api/auth/getAccessToken')) {
            return $this->token = $token;
        }
        /**
         * 请求接口
         */
        $res = Http::request('POST', $this->host . '/api/auth/getAccessToken')->withBody([
            'appid' => $this->getAppId(),
            'secret' => $this->getSecret()
        ])->send();
        /**
         * 判断结果
         */
        if ($res->get('status') == 200) {
            $this->token = $res->get('token');
            if ($this->cache instanceof Cache) {
                $expire = strtotime($res->get('expire')) - time();
                $this->cache->save($this->host . '/api/auth/getAccessToken', $this->token, $expire <= 0 ? 0 : $expire);
            }
            return $this->token;
        }
        throw new \Exception('Api Exception:' . $res->get('msg'));
    }

    /**
     * 获取服务主机
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * 获取token
     * @return string
     * @throws \Exception
     */
    public function getTokenString()
    {
        $this->getToken();
        return $this->token;
    }

    /**
     * 获取应用id
     * @return string
     */
    public function getAppId()
    {
        return $this->appid;
    }

    /**
     * 获取应用秘钥
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }
}