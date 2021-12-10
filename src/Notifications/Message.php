<?php

namespace Ifresh\FakkelLaravel\Notifications;

class Message
{
    private string $message = '';

    private array $tags = [];

    private array $payload = [];

    public function setMessage($message): self
    {
        $this->message = $message;

        return $this;
    }

    public function setTags(array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    public function setPayload($payload): self
    {
        $this->payload = $payload;

        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function getPayload(): array
    {
        return $this->payload;
    }
}
