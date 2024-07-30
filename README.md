### Quick Start
```php
    // 发送文本消息
    $param = new GroupRobotParam("https://open.feishu.cn/open-apis/bot/v2/hook/xxxx");
    $param->setSecret('sGV5kv5aZUTXmG3H00mGBf');
    $message = new TextMessage('hello sign label');
    $robot = new GroupRobot($param);
    $result = $robot->send($message);
    
    // 更多示例参考tests

```