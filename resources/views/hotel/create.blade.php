@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Hotel create</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{route('hotels_store')}}" method="post" enctype="multipart/form-data">
                            <div class="form-group mb-4">
                                <label for="travel_time">travel time</label>
                                <input class="form-control" type="text" name="travel_time" />
                                <label for="hotel_name">hotel name</label>
                                <input class="form-control" type="text" name="hotel_name" />
                                <label for="formFile" class="form-label mt-3">prtrait of hotel</label>
                                <input class="form-control" type="file" id="formFile" name="hotel_photo">
                                <label for="price">price</label>
                                <input class="form-control" type="text" name="price" />
                            </div>
                            @csrf
                            @method('post')
                            <button class="btn btn-outline-success ms-4" type="submit">save this hotel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

