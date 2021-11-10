<?php

namespace Ifresh\FakkelLaravel;

use Carbon\Carbon;

class Entry
{

    const TIMESTAMP_FORMAT = 'Y-m-d H:i:s';

    private ?string $channelId = null;

    private ?Carbon $timestamp = null;

    private ?string $message = null;

    private ?array $tags = [];

    private Configuration $configuration;

    public function __construct()
    {
        $this->configuration = new Configuration();
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }


    public function addTag($tag)
    {
        $this->tags[] = $tag;
    }


    public function setChannel($channelId)
    {
        $this->channelId = $channelId;
    }

    public function setTimestamp(Carbon $timestamp)
    {
        $this->timestamp = $timestamp;
    }

    private function getFormattedTimestamp()
    {
        if (! $this->timestamp)
        {
            return null;
        }
        return $this->timestamp->format(self::TIMESTAMP_FORMAT);
    }

    private function getMessage()
    {
        return $this->message;
    }

    public function getChannelId()
    {
        if ($this->channelId){
            return $this->channelId;
        }

        return $this->configuration->getChannelId();
    }

    public function getData()
    {
        $data = [];

        $data['channel'] = $this->getChannelId();

        if ($this->timestamp)
        {
            $data['timestamp'] = $this->getFormattedTimestamp();
        }

        if ($this->message){
            $data['message'] = $this->getMessage();
        }

        if ( ! empty($this->tags))
        {
            $data['tags'] = $this->tags;
        }

        return $data;
    }

}