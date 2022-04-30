<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\WeatherData;
use App\Jobs\GetWeather;
use Illuminate\Support\Carbon;

class TestController extends Controller
{
    public function index()
    {
    }
}
