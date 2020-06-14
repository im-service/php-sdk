### 消息相关操作

```php
/**
 * 推送消息到账户
 * @var \ImService\AccessToken $accessToken
 */
$message = new \ImService\Message\Message($accessToken);
/**
 * 推送
 */
$res = $message->pushMessageToMember([
    ['account' => 'aaa', 'data' => ['type' => 'test', 'a' => 1], 'device' => 'android'],
    ['account' => 'aaa', 'data' => ['type' => 'demo', 'b' => 2], 'device' => 'android'],
    ['account' => 'aaa', 'data' => ['type' => 'demo', 'b' => 2], 'device' => 'android'],
    ['account' => 'aaa', 'data' => ['type' => 'demo', 'b' => 2], 'device' => 'android'],
    ['account' => 'aaa', 'data' => ['type' => 'demo', 'b' => 2], 'device' => 'android'],
    ['account' => 'aaa', 'data' => ['type' => 'demo', 'b' => 2], 'device' => 'android'],
    ['account' => 'aaa', 'data' => ['type' => 'demo', 'b' => 2], 'device' => 'android'],
    ['account' => 'aaa', 'data' => ['type' => 'demo', 'b' => 2], 'device' => 'android'],
    ['account' => 'aaa', 'data' => ['type' => 'demo', 'b' => 2], 'device' => 'android']
]);
```



















#####  [返回文档](./README.md)

