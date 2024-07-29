<?php


use Ltaooo\FeiShu\Robot\GroupRobot;
use Ltaooo\FeiShu\Robot\Message\GroupRobotParam;
use Ltaooo\FeiShu\Robot\Message\TextMessage;

test('test send text message', function () {
    $param = new GroupRobotParam(
        'https://open.feishu.cn/open-apis/bot/v2/hook/abc'
    );
    $message = new TextMessage('hello label');
    $robot = new GroupRobot($param);
    $result = $robot->send($message);
    expect($result)->toBeArray()->toHaveKey('code')->and($result['code'])->toBe(0);
});