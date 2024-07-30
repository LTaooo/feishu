<?php

use Ltaooo\FeiShu\Robot\GroupRobot;
use Ltaooo\FeiShu\Robot\Message\TextMessage;
use Ltaooo\FeiShu\Robot\Param\GroupRobotParam;

$url = 'https://open.feishu.cn/open-apis/bot/v2/hook/abc';

test('test send text message', function () use ($url) {
    $param = new GroupRobotParam($url);
    $message = new TextMessage('hello label');
    $robot = new GroupRobot($param);
    $result = $robot->send($message);
    expect($result)->toBeArray()->toHaveKey('code')->and($result['code'])->toBe(0);
});

test('test send text message with sign', function () use ($url) {
    $param = new GroupRobotParam($url);
    $param->setSecret('sGV5kv5aZUTXmG3H00mGBf');
    $message = new TextMessage('hello sign label');
    $robot = new GroupRobot($param);
    $result = $robot->send($message);
    expect($result)->toBeArray()->toHaveKey('code')->and($result['code'])->toBe(0);
});
