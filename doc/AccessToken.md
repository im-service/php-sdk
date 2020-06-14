### 公共授权篇

```php
/**
 * 网关
 */
$gateway = 'http://127.0.0.1:9501';
/**
 * 应用id
 */
$appid = 'ieua1o00imm5mhx';
/**
 * 秘钥
 */
$secret = '8920depfr4pzqz3';
/**
 * 实例化授权
 */
$accessToken = new \ImService\AccessToken($gateway, $appid, $secret);
/**
 * 设置授权缓存(可选)
 */
$accessToken->setCache($cacheDriver);
/**
 * 获取字符串token(可选)
 */
$token = $accessToken->getTokenString();
```

















#####  [返回文档](./README.md)