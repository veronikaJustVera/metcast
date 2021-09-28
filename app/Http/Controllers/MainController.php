<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Models\OpenWeatherAPI;

class MainController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Main page (chose city or zipcode)
     */
    public function index()
    {
        return view('main');
    }
    /**
     * Parse inputs
     * @priority: city, zipcode
     */
    public function parse(Request $request)
    {
        if(!empty($request['city']))
        {
            return redirect()->route("weather/{field}/{value}", ['field' => 'city', 'value' => $request['city']]);
        }
        else
        {
            if(!empty($request['zipcode']))
            {
                return redirect()->route("weather/{field}/{value}", ['field' => 'zipcode', 'value' => $request['zipcode']]);
            }
            else
            {
                return redirect()->route("weather")->with('error', 'Enter at least one parameter: City or Zipcode!');
            }
        }

    }
    /**
     * Get weather data
     * @url weather/{field}/{value}
     * @fields_available: city, zipcode
     */
    public function weather($field, $value)
    {
        $result = OpenWeatherAPI::GetWeatherData($field, $value);//echo '<pre>'; print_r($result->wind->deg);exit();
        return view('weather', ['weater_data' => $result]);
    }
}
