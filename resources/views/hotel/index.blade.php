@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>HERE hotels</h1>
                        <div>
                            <a href="{{route('hotels_index', ['sort' => 'asc'])}}">A to Z</a>
                            <a href="{{route('hotels_index', ['sort' => 'desc'])}}">Z to A</a>
                            <a href="{{route('hotels_index')}}">Reset</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($hotels as $hotel)
                                <li class="list-group-item">
                                    <div class="hotel-box">
                                        <h2>{{$hotel->name}}</h2>
                                    </div>
                                    <div class="hotel-bin ">
                                        <div class="lr">
                                            <div class="figure-img">
                                                <img src="{{$hotel->photo ?? ' '}}" alt="here photo">
                                            </div>
                                        </div>
                                        <div class="form-control-sm trijule-h ">
                                            <a class="btn btn-outline-success m-2 i-btn" href="{{route('hotels_edit', $hotel)}}">Edit</a>
                                            <form class="delete" action="{{route('hotels_destroy', $hotel)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger m-2 i-btn">Kill</button>
                                            </form>
                                        </div>



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

