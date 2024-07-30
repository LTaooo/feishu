<?php

namespace Ltaooo\FeiShu\Robot;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Ltaooo\FeiShu\Robot\Exception\RobotException;
use Ltaooo\FeiShu\Robot\Message\AbstractMessage;
use Ltaooo\FeiShu\Robot\Param\GroupRobotParam;

class GroupRobot
{
    protected GroupRobotParam $param;

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
            'json' => $this->buildMessage($message),
        ]);
        $content = $response->getBody()->getContents();
        $content = json_decode($content, true);
        if (! isset($content['code']) || $content['code'] !== 0) {
            throw new RobotException($content['msg'] ?? 'unknown error', $content['code'] ?? 500);
        }
        return $content;
    }

    protected function sign(string $secret, int $time): string
    {
        return base64_encode(hash_hmac('sha256', '', $time . PHP_EOL . $secret, true));
    }

    protected function buildMessage(AbstractMessage $message): array
    {
        $result = $message->getMessage();
        if ($this->param->getSecret()) {
            $result['timestamp'] = time();
            $result['sign'] = $this->sign($this->param->getSecret(), $result['timestamp']);
        }
        return $result;
    }
}
