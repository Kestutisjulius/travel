@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center ">
            @forelse($orders as $order)
                <div class="col-md-8 mb-4">
                    <div class="card ">
                        <div class="card-header">
                            <h6>{{$order->user->name}} [Order time]: {{$order->time}}</h6>
                        </div>

                        <div class="card-body p-0">
                            <ul class="list-group">
                                @foreach($order->animals as $animal)
                                    <li class="list-group-item">
                                        <div class="front-bin">
                                            <div class="front-box justify-content-between" style="background: {{$animal->ecolor->color}};">
                                                <h6>{{$animal->ecolor->title}}</h6>
                                                <h6><strong>[ {{$animal->count}} ]</strong> units</h6>

                                                <h2>{{$animal->name}}</h2>

                                            </div>
                                        </div>
                                        <!-- -->
                                        <div class="card mt-1" style="max-width: 540px;">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <img src="{{$animal->photo}}" class="img-fluid rounded-start" alt="animal PHOTO">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title">CARD title</h5>
                                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- -->
                                    </li>
                                @endforeach
                            </ul>

                            <div class="card-body row-cols-1">
                                <form action="{{route('status_update', $order)}}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="form-group">
                                        <label>status?</label>
                                        <select class="form-control" name="status">
                                            @foreach($status as $key => $value)
                                                <option value="{{$value}}" @if($order->status == $value) selected @endif>{{$key}}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                    <button class="btn btn-outline-success mt-4" type="submit">confirm</button>
                                </form>
                                <a href="{{route('pdf', $order)}}" class="btn btn-outline-primary mt-4 ">create PDF</a>
                            </div>
                        </div>
                    </div>

                </div>
            @empty
                <li class="list-group-item">No Order! Why?</li>
            @endforelse
        </div>
    </div>

@endsection

