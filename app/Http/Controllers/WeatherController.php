<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeatherData;

class WeatherController extends Controller
{
    public function get($input)
    {
        $data = WeatherData::where('name', $input)->get();
        return response()->json($data);
    }

    public function getAll()
    {
        $data = WeatherData::get();
        return response()->json($data);
    }
}
