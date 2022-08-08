<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Hotel;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function index(Request $request)
    {
        $countries = match ($request->sort)
        {
            'asc'=> Country::orderBy('name', 'asc')->get(),
            'desc'=> Country::orderBy('name', 'desc')->get(),
            default => Country::orderBy('id', 'desc')->get()
        };

        return view('country.index', ['countries'=>$countries]);
    }

    public function create()
    {
        return view('country.create');
    }


    public function store(Request $request)
    {
        $country = new Country;
        $country->name = $request->country_name;
        $country->timezone = $request->time_zone;
        $country->save();

        return redirect()->route('countries_index');
    }

    public function edit(Country $country)
    {
        return view('country.edit', ['country'=>$country]);
    }


    public function update(Request $request, Country $country)
    {
        $country->name = $request->country_name;
        $country->timezone = $request->time_zone;
        $country->save();
        return redirect()->route('countries_index');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('countries_index');
    }
}
