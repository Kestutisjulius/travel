<div class="row justify-content-center mb-0">
    <div class="col-md-10">
        <div class="card-header">sort, filter & search box</div>
        <div class="card-body">
            <form class="form-control " action="{{route('front_index')}}" method="get">
                <div class="flex-lg-row">
                    <!-- -->
                    <label for="f" class="ms-4 col-form-label-sm">price sort?</label>
                    <select class="form-select-sm" name="p_sort" id="f">
                        <option value="default" @if($sort == 'default') selected @endif>Default Sort</option>
                        <option value="price_asc" @if($sort == 'price_asc') selected @endif> Price A-Z</option>
                        <option value="price_desc" @if($sort == 'price_desc') selected @endif> Price Z-A</option>
                    </select>
                    <!-- -->
                    <label for="country_id" class="ms-4 col-form-label-sm">what country ?</label>
                    <select class="form-select-sm " name="country_id" id="country_id">
                        <option value="0" @if($filter == 0) selected @endif>no filler, please</option>
                        @foreach($countries as $country)
                            <option value="{{$country->hotel_id}}" @if($filter == $country->hotel_id) selected @endif>{{$country->name}}</option>
                        @endforeach
                    </select>
                    <!-- -->
                    <button type="submit" class="btn btn-sm btn-outline-secondary m-2 ">sort</button>
                    <a class="btn btn-sm btn-outline-success " href="{{route('front_index')}}">Clear!</a>
                </div>
            </form>
            <form class="form-control" action="{{route('front_index')}}" method="get">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Do search</span>
                                <input class="form-control " type="text" name="s" value="{{$s}}"/>
                                <button type="submit" class="btn btn-sm btn-outline-secondary">Search!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>





