<?php

namespace Ltaooo\FeiShu\Robot\Message;

use Ltaooo\FeiShu\Robot\Enum\RobotMessageTypeEnum;

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

    public function getContent(): array
    {
        return ['text' => $this->text];
    }

    public function append(string $string): static
    {
        $this->text .= $string;
        return $this;
    }

    public function at(string $id, string $name): static
    {
        $this->text .= '<at user_id="' . $id . '">' . $name . '</at>';
        return $this;
    }

    public function atAll(string $name = '所有人'): static
    {
        $this->text .= '<at user_id="all">' . $name . '</at>';
        return $this;
    }
}
