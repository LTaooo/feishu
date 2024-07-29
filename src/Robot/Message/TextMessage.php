<?php

namespace Ltaooo\FeiShu\Robot\Message;

class TextMessage extends AbstractMessage
{
    private string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function getType(): RobotMessageTypeEnum
    {
        return RobotMessageTypeEnum::TEXT;
    }

    public function getContent(): string
    {
        return json_encode(['text' => $this->text]);
    }

    public function append(string $string): static
    {
        $this->text .= $string;
        return $this;
    }

    public function appendAt(string $id): static
    {
        $this->text .= '<at user_id="' . $id . '">名字</at>';
        return $this;
    }
}
