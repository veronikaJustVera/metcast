<?php

namespace App\Models;

class OpenWeatherAPI
{
    public static function GetWeatherData($field, $value)
    {
        $api_key = config('constants')['openweathermap_api_key'];
        $api_url = config('constants')['openweathermap_url'];
        $field_for_url = self::getparam($field);
        $path = $api_url . '?'. $field_for_url .'='. $value .'&appid=' . $api_key;
        $result = json_decode(file_get_contents($path, false));
        return $result ? self::setWeatherDataFields($result) : redirect()->route("weather")->with('error', 'Error! Please, try again');
    }
    /**
     * Set manual fields to weather information
     */
    public static function setWeatherDataFields($weater_data)
    {
        // Kelvin -> Celsius temperature
        $weater_data->main->temp_celsius = round($weater_data->main->temp - 273.15);
        // wind direction (letters)
        $wind_deg = $weater_data->wind->deg;
        switch ($wind_deg) {
            case ($wind_deg < 22 && $wind_deg >= 0) || ($wind_deg > 337 && $wind_deg <= 360):
                $weater_data->wind_deg = 'n';
                break;
            case $wind_deg > 175 && $wind_deg <= 220:
                $weater_data->wind_deg = 's';
                break;
            case $wind_deg > 247 && $wind_deg <= 292:
                $weater_data->wind_deg = 'w';
                break;
            case $wind_deg > 67 && $wind_deg <= 112:
                $weater_data->wind_deg = 'e';
                break;
            case $wind_deg >= 22 && $wind_deg <= 67:
                $weater_data->wind_deg = 'ne';
                break;
            case $wind_deg > 112 && $wind_deg <= 157:
                $weater_data->wind_deg = 'se';
                break;
            case $wind_deg > 202 && $wind_deg <= 247:
                $weater_data->wind_deg = 'sw';
                break;
            case $wind_deg > 292 && $wind_deg <= 337:
                $weater_data->wind_deg = 'nw';
                break;
        }
        return $weater_data;
    }
    /**
     * Convert field to param for API request
     */
    public static function getparam($field)
    {
        switch ($field) {
            case 'city':
                return 'q';
            case 'zipcode':
                return 'zip';
        }
        return redirect()->route("weather")->with('error', 'Incorrect value!');
    }
}
