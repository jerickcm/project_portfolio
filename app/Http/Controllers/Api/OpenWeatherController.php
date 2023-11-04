<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Requests\OpenWeatherRequest;

class OpenWeatherController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(OpenWeatherRequest $request)
    {
        $fields_validate = $request->validated();

        $api = config('custom.open_weather_app_id');
        $city = $request->city_name;
        $country = $request->country_code;
        $api_url_segment = "https://api.openweathermap.org/data/2.5/weather";

        $client = new Client();
        $response = $client->get($api_url_segment . '?q=' . $city . ',' . $country . '&APPID=' . $api);

        /**
         * $headers = $response->getHeaders();
         * $body = $response->getBody();  
         */

        $statusCode = $response->getStatusCode();
        $data = $response->getBody()->getContents();
        $data = json_decode($data, true);

        return response()->json(
            [
                'data' => ['content' => $data],
                'status_code' => $statusCode,
                'success' => true,
                '_benchmark' => microtime(true) -  $this->time_start
            ]
        );
    }
}
