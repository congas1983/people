<?php

namespace App\Services;
use App\Models\Geolocation\City;
use Cache;

class CityService
{

    /**
     * @return [type]
     */
    public static function list(){

        $cities= Cache::remember('cities',18000, function () {
            return City::select('id','name','state_id')->get();
        });   
        return $cities;
    }

}
