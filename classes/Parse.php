<?php
/**
 * Class ParseWeather
 * Парсинг погоды с url = http://www.gismeteo.ua/city/daily/5093/
 * Использована библиотека PHP Simple HTML DOM Parser
 */
class Parse{

    /**
     * главные узлы для анализа
     * @var
     */
    protected $_nodes;

    /**
     * погода сейчас
     */
    const TAG_WEATHER_NOW='div[class=section higher]';
    /**
     * место нахождения
     */
    const TAG_LOCATION='div[class=scity]';
    /**
     * температура
     */
    const TAG_TEMPERATURE='div[class=temp]';
    /**
     * ветер
     */
    const TAG_WIND='div[class=wicon wind]';
    /**
     *давление
     */
    const TAG_PRESSURE='div[class=wicon barp]';
    /**
     *влажность
     */
    const TAG_HUMIDITY='div[class=wicon hum]';
    /**
     *температура воды
     */
    const TAG_WATER_TEMPERATURE='div[class=wicon water]';
    /**
     * дата
     */
    const TAG_DATE='div[class=wrap f_link]';

    public $city;
    public $region;
    public $country;

    public $temp;
    public $unit_temp;

    public $wind_direction;
    public $wind_power;
    public $unit_wind;

    public $press;

    public $humidity;
    public $unit_humidity;

    public $wather_temp;
    public $unit_wather_temp;

    public $day;
    public $month;
    public $year;

    public function __construct($url,$tag){
        $html=new simple_html_dom($url);
        $this->_nodes=$html->find($tag,0);
        $this->init_location();
        $this->init_temperature();$this->init_wind();
        $this->init_pressure();
        $this->init_hum();
        $this->init_water_temperature();
        $this->init_date_time();
    }
    public function __destructor(){
        $this->_html->clear();
        unset($this->_html);
    }

    /**
     * анализируемый блок кода
     * @param $tag
     * номер вложенного узла
     * @param $nod
     * определяет возврат
     * @param bool $flag
     *строка или объек
     * @return mixed
     */
    protected function _contents($tag,$nod, $flag=true){
        if($flag){
            return $this->_nodes->find($tag,0)->children($nod)->plaintext;
        }else{
            return $this->_nodes->find($tag,0)->children($nod);
        }
    }
    public function init_location(){
        $this->city =$this->_contents(self::TAG_LOCATION,0);
        $this->region=$this->_contents(self::TAG_LOCATION,1);
        $this->country=$this->_contents(self::TAG_LOCATION,2);
    }

    /**
     * @param string $unit
     *  value с|f
     */
    public function init_temperature($unit='c'){
        switch($unit){
            case 'c':
                $this->temp=$this->_contents(self::TAG_TEMPERATURE,0);
                break;
            case 'f':
                $this->temp=$this->_contents(self::TAG_TEMPERATURE,1);
                break;
        }
    }
    /**
     * @param string $unit
     * value torr|hpa|inch
     */
    public function init_pressure($unit='torr'){
        switch($unit){
            case 'torr':
                $this->press=$this->_contents(self::TAG_PRESSURE,0);
                break;
            case 'hpa':
                $this->press=$this->_contents(self::TAG_PRESSURE,1);
                break;
            case 'inch':
                $this->press=$this->_contents(self::TAG_PRESSURE,2);
                break;
        }
    }
    /**
     * @param string $unit
     * value с|f
     */
    public function init_water_temperature($unit='c'){
        switch($unit){
            case 'c':
                $this->_contents(self::TAG_WATER_TEMPERATURE,0,false)->children(1)->outertext='';
                $nod=$this->_nodes->find(self::TAG_WATER_TEMPERATURE,0,false)->children(0);
                $this->wather_temp=strip_tags($nod);
                break;
            case 'f':
                $this->_contents(self::TAG_WATER_TEMPERATURE,1,false)->children(1)->outertext='';
                $nod=$this->_nodes->find(self::TAG_WATER_TEMPERATURE,0,false)->children(0);
                $this->wather_temp=strip_tags($nod);
                break;
        }
    }
    public function init_date_time(){
        $str=trim($this->_contents(self::TAG_DATE,0));
        list($this->day,$this->month,$this->year)=explode(' ',$str);
    }
    public function init_hum(){
        $this->_contents(self::TAG_HUMIDITY,0,false)->children(0)->outertext='';
        $nod=$this->_nodes->find(self::TAG_HUMIDITY,0,false);
        $this->humidity=strip_tags($nod);
    }
    /**
     * @param string $unit
     * value ms|mih|khm
     */
    public function init_wind($unit='ms'){
        $nod=$this->_contents(self::TAG_WIND,0,false);
        $this->wind_direction=$nod->title;
        switch($unit){
            case 'ms':
                $this->wind_power=$nod->children(0)->plaintext;
                break;
            case 'mih':
                $this->wind_power=$nod->children(1)->plaintext;
                break;
            case 'kmh':
                $this->wind_power=$nod->children(2)->plaintext;
                break;
        }
    }
}










