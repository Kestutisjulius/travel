@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Hotel Edit</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{route('hotels_update', $hotel)}}" method="post" enctype="multipart/form-data">
                            <div class="form-group mb-4">
                                <label for="travel_time">travel time</label>
                                <input class="form-control" type="text" name="travel_time" value="{{$hotel->travelTime}}"/>
                                <label for="hotel_name">hotel name</label>
                                <input class="form-control" type="text" name="hotel_name" value="{{$hotel->name}}"/>
                                    <div class="figure-img">
                                @if($hotel->photo)
                                        <img src="{{$hotel->photo}}" alt="Photo of Hotel">
                                @endif
                                    </div>

                                <ul class="breadcrumb">

                                    @foreach($countries as $country)
                                        @if($hotel->id == $country->hotel_id)
                                    <li class="breadcrumb-item">{{$country->name}}</li>
                                        @endif
                                    @endforeach
                                </ul>
                                @if($hotel->photo)
                                <label for="formFile" class="form-label mt-3">prtrait of hotel</label>
                                <input class="form-control" type="file" id="formFile" name="hotel_photo" value="">
                                @endif
                                <label for="price">price</label>
                                <input class="form-control" type="text" name="price" value="{{$hotel->price}}"/>
                                <label>What COUNTRY ?</label>
                                <select class="form-control" name="country_id">
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}" @if($country->hotel_id == $hotel->id )selected @endif>{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @csrf
                            @method('put')
                            <button class="btn btn-outline-success ms-4" type="submit">save now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

