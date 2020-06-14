### 设备操作篇

```php
/**
 * 创建设备操作实例
 * @var \ImService\AccessToken $accessToken
 */
$device = new \ImService\Device\Device($accessToken);
/**
 * 创建设备
 */
$res = $device->makeDevice('android','安卓设备');
```















[返回文档](./README.md)