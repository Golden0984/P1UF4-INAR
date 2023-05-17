<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class NewsApiController extends Controller
{
    private $client;
    private $baseUrl;
    private $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUrl = config('services.news_api.base_url');
        $this->apiKey = config('services.news_api.api_key');
    }

    public function getUsers()
    {
        $response = $this->client->get($this->baseUrl . 'users', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
            ],
        ]);

        return $response->getBody()->getContents();
    }

    public function createUser(Request $request)
    {
        $response = $this->client->post($this->baseUrl . 'users', [
            'json' => $request->all(),
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
            ],
        ]);

        return $response->getBody()->getContents();
    }

    public function getNewsByCategory($category)
    {
        $response = $this->client->get($this->baseUrl . 'top-headlines', [
            'query' => [
                'category' => $category,
                'apiKey' => $this->apiKey,
            ],
        ]);

        return $response->getBody()->getContents();
    }

    public function getTopHeadlines($country)
    {
        $response = $this->client->get($this->baseUrl . 'top-headlines', [
            'query' => [
                'country' => $country,
                'apiKey' => $this->apiKey,
            ],
        ]);

        return $response->getBody()->getContents();
    }
    public function getNewsBySource($noticia)
    {
        $response = $this->client->get($this->baseUrl . 'everything', [
            'query' => [
                'q' => $noticia,
                'apiKey' => $this->apiKey,
            ],
        ]);

        return $response->getBody()->getContents();
    }

    
}