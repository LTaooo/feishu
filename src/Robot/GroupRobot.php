<?php

namespace Ltaooo\FeiShu\Robot;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Ltaooo\FeiShu\Robot\Exception\RobotException;
use Ltaooo\FeiShu\Robot\Message\AbstractMessage;
use Ltaooo\FeiShu\Robot\Message\GroupRobotParam;

class GroupRobot
{
    private GroupRobotParam $param;

    public function __construct(GroupRobotParam $param)
    {
        $this->param = $param;
    }

    /**
     * @throws GuzzleException
     * @throws RobotException
     */
    public function send(AbstractMessage $message): array
    {
        $client = new Client();
        $response = $client->post($this->param->getUrl(), [
            'json' => $message->getMessage(),
        ]);
        $content = $response->getBody()->getContents();
        $content = json_decode($content, true);
        if (! isset($content['code']) || $content['code'] !== 0) {
            throw new RobotException($content['msg'] ?? 'unknown error', $content['code'] ?? 500);
        }
        return $content;
    }
}
