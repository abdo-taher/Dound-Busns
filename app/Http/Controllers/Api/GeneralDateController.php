<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\City;
use App\Models\Currency;
use Illuminate\Http\Request;

class GeneralDateController extends Controller
{
    // Get all countries
    public function getCountries()
    {
        $countries = Country::all();
        return response()->json([
            'status' => 200,
            'data' => $countries
        ]);
    }


    public function phoneCode($countryId)
    {
        $country = Country::find($countryId);
        return response()->json([
            'status' => 200,
            'data' => $country->phone_code
        ]);
    }


    // Get cities by country ID
    public function getCitiesByCountryId($countryId)
    {
        $cities = City::where('country_id', $countryId)->get();

        if ($cities->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'No cities found for this country ID'
            ]);
        }

        return response()->json([
            'status' => 200,
            'data' => $cities
        ]);
    }

    // Get currencies by country ID
    public function getCurrenciesByCountryId($countryId)
    {
        // Assuming you have a relation or method to get currencies by country
        $currencies = Currency::where('country_id', $countryId)->get();

        if ($currencies->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'No currencies found for this country ID'
            ]);
        }

        return response()->json([
            'status' => 200,
            'data' => $currencies
        ]);
    }
}
