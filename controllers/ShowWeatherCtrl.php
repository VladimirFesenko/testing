<?php
class ShowWeatherCtrl
    extends AController{
    protected $view='weather';
    function __construct($config=[
                                    'autoescape'=>false,
                                    'cache'=>'cache'
                                ]){
        parent::__construct($config);
    }
    public function get_body()
    {
        $meteo = new Parse(URL, Parse::TAG_WEATHER_NOW);

        $this->display([
            'city' => $meteo->city,
            'region' => $meteo->region,
            'country' => $meteo->country,

            'temp' => $meteo->temp,

            'wind_direction' => $meteo->wind_direction,
            'wind_power' => $meteo->wind_power,

            'press' => $meteo->press,

            'humidity' => $meteo->humidity,

            'water_temp' => $meteo->wather_temp,

            'day' => $meteo->day,
            'month' => $meteo->month,
            'year' => $meteo->year
        ]);
    }
}