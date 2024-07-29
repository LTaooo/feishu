<?php

namespace Ltaooo\FeiShu\Robot\Message;

abstract class AbstractMessage
{
    abstract public function getType(): RobotMessageTypeEnum;

    abstract public function getContent(): string;

    public function getMessage(): array
    {
        return [
            'msg_type' => $this->getType(),
            'content' => $this->getContent(),
        ];
    }
}
