<?php

namespace Ifresh\FakkelLaravel;

use InvalidArgumentException;

class Configuration
{
    public const API_ENDPOINT = 'https://fakkel.io';

    public const STORE_URI = '/api/entry/store';

    public const DEFAULT_TIMEOUT = 2;

    public function getEndpoint(): string
    {
        if (config('fakkel.endpoint')) {
            return config('fakkel.endpoint');
        }

        return self::API_ENDPOINT;
    }

    public function getToken(): string
    {
        $token = config('fakkel.token');
        if (! $token) {
            throw new InvalidArgumentException('No Fakkel token provided');
        }

        return $token;
    }

    public function getStoreUrl(): string
    {
        return $this->getEndpoint().self::STORE_URI;
    }


    public function getTimeout(): int
    {
        return self::DEFAULT_TIMEOUT;
    }
}
