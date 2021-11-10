<?php

namespace Ifresh\FakkelLaravel;

use Carbon\Carbon;

class Fakkel {

    protected ?string $channelId = null;

    protected ?int $timeout = null;

    public Entry $entry;
    
    public function __construct()
    {
        $this->entry = new Entry();
    }

    public function withTag(string $tag)
    {
        $this->entry->addTag($tag);
        
        return $this;
    }
    
    public function withTags(array $tags)
    {
        foreach($tags as $tag)
        {
            $this->entry->addTag($tag);
        }

        return $this;
    }
    
    public function withTimestamp(Carbon $timestamp)
    {
        $this->entry->setTimestamp($timestamp);
        
        return $this;
    }
    

    public function send($message)
    {
        $this->entry->setMessage($message);

        $carrier = new Carrier($this->entry, $this->timeout);

        return $carrier->send();

    }
    
    public function timeout(int $seconds)
    {
        $this->timeout = $seconds;
        
        return $this;
    }
    

    public function setChannel($channelId)
    {
        $this->entry->setChannel($channelId);

        return $this;
    }
    
    public function withPayload($payload)
    {
        $this->entry->setPayload($payload);
        
        return $this;
    }
    
    
}