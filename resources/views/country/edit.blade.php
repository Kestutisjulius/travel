@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>country EDIT</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{route('countries_update', $country)}}" method="post" enctype="multipart/form-data">

                            <div class="form-group mb-4">
                                <label for="country_name">country name</label>
                                <input class="form-control" type="text" name="country_name" value="{{$country->name}}"/>
                                <label for="timeZone" class="form-label mt-3">time Zone of country</label>
                                <input class="form-control" type="text" id="timeZone" name="time_zone" value="{{$country->timezone}}">
                            </div>
                            @csrf
                            @method('put')
                            <button class="btn btn-outline-success ms-4" type="submit">save edited country</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

