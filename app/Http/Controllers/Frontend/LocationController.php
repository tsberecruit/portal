<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LocationController extends Controller
{
    /** Get all the states of a country by id
    * @param $countryId
    */
    function getStates(string $countryId) : Response {
        $states = State::select(['id', 'name', 'country_id'])->where('country_id', $countryId)->get();
        return response($states);
    }


    /** Get all the cities of a state by id
    * @param $stateId
    */
    function getCities(string $stateId) : Response {
        $cities = City::select(['id', 'name', 'country_id'])->where('state_id', $stateId)->get();
        return response($cities);
    }
}
