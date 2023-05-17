<?php
return [
    'news_api' => [
        'base_url' => 'https://newsapi.org/v2/',
        'api_key' => env('NEWS_API_KEY'),
    ],
    'open_weather_map' => [
        'base_url' => 'https://api.openweathermap.org/data/2.5/',
        'api_key' => env('OPEN_WEATHER_MAP_API_KEY'),
    ],
];