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
     * @param $host
     * @param $appid
     * @param $secret
     * @throws \Exception
     */
    public function __construct($host,$appid,$secret)
    {
        $this->host = $host;
        $this->appid = $appid;
        $this->secret = $secret;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    private function getToken()
    {
        /**
         * 判断缓存是否有效
         */
        if($this->cache instanceof Cache && $token = $this->cache->fetch($this->host.'/api/auth/getAccessToken')){
            return $this->token = $token;
        }
        /**
         * 请求接口
         */
        $res = Http::request('POST',$this->host.'/api/auth/getAccessToken')->withBody([
            'appid'=>$this->getAppId(),
            'secret'=>$this->getSecret()
        ])->send();
        /**
         * 判断结果
         */
        if($res->get('status')==200){
            $this->token = $res->get('token');
            if($this->cache instanceof Cache){
                $this->cache->save($this->host.'/api/auth/getAccessToken',$this->token);
            }
            return $this->token;
        }
        throw new \Exception('Api Exception:'.$res->get('msg'));
    }
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getTokenString()
    {
        $this->getToken();
        return $this->token;
    }

    public function getAppId()
    {
        return $this->appid;
    }

    public function getSecret()
    {
        return $this->secret;
    }
}