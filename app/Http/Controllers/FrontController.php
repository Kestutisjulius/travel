<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Hotel;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //filter country, arrange price, find hotel
    //chose hotel.

    public function index(Request $request)
    {


        if ($request->s) {
            $word = $request->s;
            $hotels = ['hotels' => Hotel::where('name', 'like', '%' . $word . '%')->get(), 'sort' => 'price_asc', 'filter' => 0];

        } else {
            $hotels = ['hotels' => Hotel::orderBy('id', 'desc')->get(), 'sort' => 'price_asc', 'filter' => 0];

            if ($request->country_id == 0) {
                $hotels = match ($request->p_sort) {
                    'price_asc' => ['hotels' => Hotel::orderBy('price', 'asc')->get(), 'sort' => 'price_asc', 'filter' => 0],
                    'price_desc' => ['hotels' => Hotel::orderBy('price', 'desc')->get(), 'sort' => 'price_desc', 'filter' => 0],
                    default => ['hotels' => Hotel::orderBy('id', 'desc')->get(), 'sort' => 'default', 'filter' => 0]
                };
            } else {
                $filter = $request->country_id;
                $hotels = match ($request->p_sort) {
                    'price_asc' => ['hotels' => Hotel::orderBy('price', 'asc')->get(), 'sort' => 'price_asc', 'filter' => $filter],
                    'price_desc' => ['hotels' => Hotel::orderBy('price', 'desc')->get(), 'sort' => 'price_desc', 'filter' => $filter],
                    default => ['hotels' => Hotel::orderBy('id', 'desc')->get(), 'sort' => 'default', 'filter' => $filter]
                };
                if ($hotels['filter'] != 0) {
                    $selectedCountry_hotelId = Country::where('hotel_id', $hotels['filter'])->get();

                    $hotels = ['hotels' => Hotel::where('id', $selectedCountry_hotelId->first()->hotel_id)->get(), 'sort' => 'default', 'filter' => $filter];
                }
            }
        }







        return view('front.index', [
            'hotels' => $hotels['hotels'],
            's' => $request->s ?? '',
            'sort' => $hotels['sort'],
            'filter' => $hotels['filter']?? ['name'=> 'no hotels in country'],
            'countries' => Country::all()

        ]);
    }
}
