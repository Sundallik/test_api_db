<?php

namespace App\Services\Api;
use GuzzleHttp\Client;

abstract class ApiService
{
    private $client;
    private $key;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('api.base_uri'),
        ]);
        $this->key = config('api.api_key');
    }

    protected function fetchData(string $endpoint, array $queryParams, string $model)
    {
        $page = 1;

        do {
            $response = $this->client->get($endpoint, [
                'query' => array_merge($queryParams, [
                    'key' => $this->key,
                    'page' => $page,
                ]),
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            $model::insert($data['data']);
            sleep(1);

            $name = class_basename($model);
            $pageCount = $data['meta']['last_page'];
            print_r("$name: page $page of $pageCount imported successfully" . PHP_EOL);

            $page++;
        } while ($data['links']['next'] !== null);
    }
}
