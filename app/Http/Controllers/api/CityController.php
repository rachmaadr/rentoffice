<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::withCount(['officeSpaces'])->get();
        //collection: menampilkan seluruh data city
        return CityResource::collection($cities); 
    }
    public function show(City $city)
    {
        $city->load(['officeSpaces.city', 'officeSpaces.photos']);
        $city->loadCount(['officeSpaces']);
        //new : hanya menampilkan satu data city
        return new CityResource($city); 
    }
}
