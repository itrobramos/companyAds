<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use PHPUnit\Framework\Constraint\Count;

class LocationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function getStatesByCountry($id){

        $states = State::where('countryId', $id)->get();
        $states = $states->sortBy('name');

        $response = collect([
            "statusCode" => 0,
            "statusMessage" => "OK",
            "resultset" => ""
        ]);


        if($states->Count() == 0){
            $response['statusCode'] = 1;
        }
   
        $response['resultset'] = $states;

        return response()->json($response, 200);

    }

    public function getCitiesByState($id){

        $cities = City::where('stateId', $id)->get();
        $cities = $cities->sortBy('name');

        $response = collect([
            "statusCode" => 0,
            "statusMessage" => "OK",
            "resultset" => ""
        ]);


        if($cities->Count() == 0){
            $response['statusCode'] = 1;
        }
   
        $response['resultset'] = $cities;

        return response()->json($response, 200);

    }
}
