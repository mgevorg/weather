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
        GetWeather::dispatch();
        // $cities = [
        //     "yerevan" => [
        //         "lat" => 40.18,
        //         "lon" => 44.51
        //     ],
        //     "kapan" => [
        //         "lat" => 39.21,
        //         "lon" => 46.41
        //     ],
        // ];

        // foreach($cities as $item) {
        //     $response = Http::get("https://api.openweathermap.org/data/2.5/weather?lat={$item['lat']}&lon={$item['lon']}&appid=bf65d8b174418831a16055a19f50144f");
        //     $data = json_decode($response);
        //     $timestamp = Carbon::parse($data->dt)->format('Y-m-d H:i:s');
        //     $date = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp);
        //     $date->setTimezone('Asia/Yerevan');
        //     $result = [
        //         'time' => $date,
        //         'name' =>  $data->name,
        //         'latitude' => $data->coord->lat,
        //         'longitude' => $data->coord->lon,
        //         'temp' => $data->main->temp - 273.15,
        //         'pressure' => $data->main->pressure,
        //         'humidity' => $data->main->humidity,
        //         'temp_min' => $data->main->temp_min - 273.15,
        //         'temp_max' => $data->main->temp_max - 273.15,
        //         'created_at' => Carbon::now()->setTimezone('Asia/Yerevan'),
        //         'updated_at' => Carbon::now()->setTimezone('Asia/Yerevan')
        //     ];
        //     $res = WeatherData::insert($result);
        // }

        // $response = Http::get('https://api.openweathermap.org/data/2.5/weather?lat=40.18&lon=44.51&appid=bf65d8b174418831a16055a19f50144f');
        // $data = json_decode($response);
        // $timestamp = Carbon::parse($data->dt)->format('Y-m-d H:i:s');
        // $date = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp);
        // $date->setTimezone('Asia/Yerevan');
        // $result = [
        //     'time' => $date,
        //     'name' =>  $data->name,
        //     'latitude' => $data->coord->lat,
        //     'longitude' => $data->coord->lon,
        //     'temp' => $data->main->temp - 273.15,
        //     'pressure' => $data->main->pressure,
        //     'humidity' => $data->main->humidity,
        //     'temp_min' => $data->main->temp_min - 273.15,
        //     'temp_max' => $data->main->temp_max - 273.15,
        //     'created_at' => Carbon::now()->setTimezone('Asia/Yerevan'),
        //     'updated_at' => Carbon::now()->setTimezone('Asia/Yerevan')
        // ];
        // $res = WeatherData::insert($result);
        // // dd($result);

        // dump($data);
        $local = WeatherData::get();
        dump($local);
    }
}
