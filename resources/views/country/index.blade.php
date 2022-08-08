@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h1>My countries</h1>
                        <div>
                            <a href="{{route('countries_index', ['sort' => 'asc'])}}">A to Z</a>
                            <a href="{{route('countries_index', ['sort' => 'desc'])}}">Z to A</a>
                            <a href="{{route('countries_index')}}">Reset</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($countries as $country)
                                <li class="list-group-item">
                                    <div class="form-control-sm trijule ">
                                    <div class="country-box">
                                        <h2>{{$country->name}}</h2>
                                        <h5> : Time Zone - {{$country->timezone}}</h5>
                                    </div>
                                        <a class="btn btn-outline-success m-2 i-btn" href="{{route('countries_edit', $country)}}">Edit</a>
                                        <form class="delete" action="{{route('countries_destroy', $country)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger m-2 i-btn">Kill</button>
                                        </form>


                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">No colors, no life.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

