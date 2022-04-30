<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use App\Models\WeatherData;
use Illuminate\Support\Carbon;

class GetWeather implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $cities;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->cities = [
            "yerevan" => [
                "lat" => 40.18,
                "lon" => 44.51
            ],
            "kapan" => [
                "lat" => 39.21,
                "lon" => 46.41
            ],
        ];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->cities as $item) {
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather?lat={$item['lat']}&lon={$item['lon']}&appid=bf65d8b174418831a16055a19f50144f");
            $data = json_decode($response);
            $timestamp = Carbon::parse($data->dt)->format('Y-m-d H:i:s');
            $date = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp);
            $date->setTimezone('Asia/Yerevan');
            $result = [
                'time' => $date,
                'name' =>  $data->name,
                'latitude' => $data->coord->lat,
                'longitude' => $data->coord->lon,
                'temp' => $data->main->temp - 273.15,
                'pressure' => $data->main->pressure,
                'humidity' => $data->main->humidity,
                'temp_min' => $data->main->temp_min - 273.15,
                'temp_max' => $data->main->temp_max - 273.15,
                'created_at' => Carbon::now()->setTimezone('Asia/Yerevan'),
                'updated_at' => Carbon::now()->setTimezone('Asia/Yerevan')
            ];
            $res = WeatherData::insert($result);
        }
    }
}
