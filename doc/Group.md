### 群组管理篇

#### 1. 创建群组

```php
/**
 * 创建群组
 * @var \ImService\AccessToken $accessToken
 */
$group = new \ImService\Group\Group($accessToken);
/**
 * 创建群组
 */
$res = $group->makeGroup('测试');
```

#### 2.  加入群组

```php
/**
 * 加入群组
 * @var \ImService\AccessToken $accessToken
 */
$member_group = new \ImService\Member\MemberGroup($accessToken);
/**
 * 加入群组
 */
$res = $member_group->joinGroup('测试','aaaa');
```







[返回文档](./README.md)