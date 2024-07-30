<?php

namespace Ltaooo\FeiShu\Robot\Param;

class GroupRobotParam
{
    private string $url;

    private string $secret = '';

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getSecret(): string
    {
        return $this->secret;
    }

    public function setSecret(string $secret): void
    {
        $this->secret = $secret;
    }
}
