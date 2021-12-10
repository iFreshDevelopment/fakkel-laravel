<?php

if (! function_exists('fakkel')) {
    function fakkel($channelId = null)
    {
        $fakkelInstance = new Ifresh\FakkelLaravel\Fakkel();
        if ($channelId) {
            $fakkelInstance->setChannel($channelId);
        }

        return $fakkelInstance;
    }
}
