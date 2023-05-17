<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OpenWeatherMapController extends Controller
{
    private $client;
    private $baseUrl;
    private $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUrl = config('services.open_weather_map.base_url');
        $this->apiKey = config('services.open_weather_map.api_key');
    }

    public function getCurrentWeather($city)
    {
        $response = $this->client->get($this->baseUrl . 'weather', [
            'query' => [
                'q' => $city,
                'appid' => $this->apiKey,
            ],
        ]);

        return $response->getBody()->getContents();
    }

}