<?php

namespace Ifresh\FakkelLaravel\Channels;

use Illuminate\Notifications\Notification;

class Fakkel
{
    public function send($notifiable, Notification $notification)
    {
        $fakkelNotification = $notification->toFakkel();

        fakkel(config('fakkel.channel'))
            ->withPayload($fakkelNotification->getPayload())
            ->withTags($fakkelNotification->getTags())
            ->send($fakkelNotification->getMessage());
    }
}
