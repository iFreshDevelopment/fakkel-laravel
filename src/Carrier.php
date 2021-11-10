<?php

namespace Ifresh\FakkelLaravel;

use Illuminate\Support\Facades\Http;
use Exception;

class Carrier
{

    protected $response;
    protected $configuration;

    public function __construct(Entry $entry, int $timeout = null)
    {
        $this->timeout = $timeout;
        $this->entry = $entry;
        $this->configuration = new Configuration();
    }

    public function send()
    {
        try {
            $this->makeRequestToEndpoint();
        } catch (Exception $e) {
            error_log('Fakkel error: ' . $e->getMessage());
        }
    }

    protected function isRequestRequestSuccessful()
    {
        return $this->response->status() === ResponseCode::SUCCESS;
    }

    public function getData()
    {
        return $this->entry->getData();
    }

    public function getTimeout()
    {
        return $this->timeout ?? $this->configuration->getTimeout();
    }

    protected function makeRequestToEndpoint(){
        $this->response = Http::timeout($this->getTimeout())
            ->withToken($this->configuration->getToken())
            ->acceptJson()
            ->post(
                $this->configuration->getStoreUrl(),
                $this->getData()
            );

        if (! $this->isRequestRequestSuccessful()) {
            throw new \Exception('Request failed with status '.$this->response->status());
        }

    }

}