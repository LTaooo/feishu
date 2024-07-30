<?php

namespace Ltaooo\FeiShu\Robot\Message;

use Ltaooo\FeiShu\Robot\Enum\RobotMessageTypeEnum;

abstract class AbstractMessage
{
    abstract public function getType(): RobotMessageTypeEnum;

    abstract public function getContent(): array;

    public function getMessage(): array
    {
        return [
            'msg_type' => $this->getType()->value,
            'content' => $this->getContent(),
        ];
    }
}
