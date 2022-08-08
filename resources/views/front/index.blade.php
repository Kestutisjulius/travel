@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center ">
            @include('front.box')
            <div class="col-md-10">
                <div class="card ">
                    <div class="card-header">
                        <h6>Hotels</h6>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group">
                            @forelse($hotels as $hotel)
                                <li class="list-group-item">
                                    <div class="front-bin">
                                        <div class="front-box justify-content-around">
                                            <h6>{{$hotel->name}} and price: {{$hotel->price}} </h6>

                                        </div>
                                    </div>
                                    <!-- -->
                                    <div class="card mt-1" style="max-width: 540px;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{$hotel->photo}}" class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>

                                                    <ul class="breadcrumb">
                                                    @foreach($countries as $country)
                                                        @if($country->hotel_id == $hotel->id)
                                                        <li class="breadcrumb-item">{{$country->name}}</li>
                                                            @endif
                                                        @endforeach
                                                    </ul>

                                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- -->
                                </li>
                            @empty
                                <li class="list-group-item">No hotels, no life.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

