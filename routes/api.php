<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsApiController;
use App\Http\Controllers\OpenWeatherMapController;

Route::get('/news/{category}', [NewsApiController::class, 'getNewsByCategory']);
Route::get('/news/top-headlines/{country}', [NewsApiController::class, 'getTopHeadlines']);
Route::get('/news/everything/{noticia}', [NewsApiController::class, 'getNewsBySource']);

Route::get('/weather/{city}', [OpenWeatherMapController::class, 'getCurrentWeather']);