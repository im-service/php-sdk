<?php
namespace ImService\Bridge;
use Doctrine\Common\Cache\Cache;
/**
 * Trait CacheTrait
 * @package ImService\Bridge
 */
trait CacheTrait
{
    /**
     * @var Cache
     */
    protected $cache;

    /**
     * 设置缓存驱动
     */
    public function setCache(\Doctrine\Common\Cache\Cache $cache)
    {
        $this->cache = $cache;
        return $this;
    }

    /**
     * 获取缓存驱动
     */
    public function getCache()
    {
        return $this->cache;
    }
}