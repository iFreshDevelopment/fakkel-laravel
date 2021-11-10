<?php
if (! function_exists('fakkel')) {
    function fakkel($channelId = null)
    {
        $fakkelInstance = new Ifresh\Fakkel\Fakkel();
        if ($channelId) {
            $fakkelInstance->setChannel($channelId);
        }

        return $fakkelInstance;
    }
}