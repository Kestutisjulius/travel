<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{

    public function index(Request $request)
    {
        $hotels = match ($request->sort)
        {
            'asc'=> Hotel::orderBy('name', 'asc')->get(),
            'desc'=> Hotel::orderBy('name', 'desc')->get(),
            default => Hotel::orderBy('id', 'desc')->get()
        };

        return view('hotel.index', ['hotels'=>$hotels]);
    }


    public function create()
    {
        return view('hotel.create');
    }


    public function store(Request $request)
    {

        $hotel = new Hotel;
        if ($request->file('hotel_photo'))
        {
            $photo = $request->file('hotel_photo');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);

            $file = $name.'-'.rand(33, 66).'.'.$ext;
        }
        $photo->move(public_path().'/images', $file);
        $hotel->photo = asset('/images'.'/'.$file);
        $hotel->name = $request->hotel_name;
        $hotel->travelTime = $request->travel_time;
        $hotel->price = $request->price;

        $hotel->save();

        return redirect()->route('hotels_index');
    }

    public function edit(Hotel $hotel)
    {
        $countries = Country::all();
        return view('hotel.edit', ['hotel'=>$hotel, 'countries'=> $countries]);
    }


    public function update(Request $request, Hotel $hotel)
    {

        if ($request->country_id)
        {
        $country = Country::where('id', $request->country_id)->first();
        $country->hotel_id = $hotel->id;

        }

            if ($request->file('hotel_photo') && $hotel->photo)
            {

                $name = pathinfo($hotel->photo, PATHINFO_FILENAME);
                $extension = pathinfo($hotel->photo, PATHINFO_EXTENSION);
                $file = public_path().'/images'.'/'.$name.'.'.$extension;

                if (file_exists($file))
                {
                    unlink($file);
                }
                //------------------------------

                $photo = $request->file('hotel_photo');
                $ext = $photo->getClientOriginalExtension();
                $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
                $file = $name.'-'.time().'.'.$ext;

        $photo->move(public_path().'/images', $file); //path TO directory
        $hotel->photo = asset('/images'.'/'.$file); //url ON DB
            }



        $hotel->name = $request->hotel_name;
        $hotel->travelTime = $request->travel_time;
        $hotel->price = $request->price;
        $country->save();
        $hotel->save();
        return redirect()->route('hotels_index');
    }


    public function destroy(Hotel $hotel)
    {


        if ($hotel->photo) {
            $name = pathinfo($hotel->photo, PATHINFO_FILENAME);
            $extension = pathinfo($hotel->photo, PATHINFO_EXTENSION);
            $file = public_path().'/images'.'/'.$name.'.'.$extension;

            if (file_exists($file)) {
                unlink($file);
            }
            //------------------------------
        }

        if ( $country = Country::where('id', $hotel->id))
        {
            foreach ($country as $hotelCountry)
            {
                $hotelCountry->hotel_id = null;
                $hotelCountry->save();
            }
        }
        $hotel->delete();

        return redirect()->route('hotels_index');
    }
}
