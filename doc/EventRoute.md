### 事件路由篇

#### 1. 设置同步路由

```php
/**
 * 获取设置实例
 * @var \ImService\AccessToken $accessToken
 */
$seting = new \ImService\Callback\Seting($accessToken);
/**
 * 设置消息同步路由
 */
$seting->setCallback('message_sync','https://domain.example.com/callback/message');
/**
 * 获取当前配置
 */
$res = $seting->getCallback('message_sync');
```

