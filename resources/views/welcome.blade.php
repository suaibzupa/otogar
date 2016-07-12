@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container">
            <div class="filter-area col-md-6 col-lg-6 col-sm-6 well">
                <span class="center-block text-center">Search Filter</span>
                <div class="filers-container row">
                    <div class="col-sm-2">Manufacturer</div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control" name="manufacturer">
                                <option value="all">All</option>
                                @foreach($cars as $car)
                                    <option value="{{$car['id']}}">{{$car['vendor']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">Model</div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control" name="model">
                                <option value="all">All</option>
                                @foreach($models as $model)
                                    <option value="{{$model['id']}}">{{$model['model']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">Category</div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control" name="category">
                                <option value="all">All</option>
                                @foreach($categories as $category)
                                    <option value="{{$category['id']}}">{{$category['category']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">City</div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control" name="city">
                                <option value="all">All</option>
                                @foreach($cities as $city)
                                    <option value="{{$city['id']}}">{{$city['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <div id="price-slider"></div>
                        <span>Price Range: </span>
                        <strong id="slider-snap-value-lower"></strong>
                        <strong>-</strong>
                        <strong id="slider-snap-value-upper"></strong>
                    </div>

                    <div class="year-slider-container">
                        <div id="year-slider"></div>
                        <span>Year Range: </span>
                        <strong id="slider-year-snap-value-lower"></strong>
                        <strong>-</strong>
                        <strong id="slider-year-snap-value-upper"></strong>
                    </div>

                    <a href="javascript:void(0)" id="search-btn" class="btn btn-success">Search</a>
                </div>
            </div>
        </div>

        <div class="container car-animated">
                <!-- #Animated car -->
        </div>
    </div>


    <div class="row">
        <div class="panel-group">
            @foreach($carList as $car)
                <div class="panel panel-primary cars-panel" style="display: inline-block;">
                    <div class="panel-heading">{{$car['vendor']}}</div>
                    <div class="panel-body">
                        <a href="{{url('/cars/'.$car['id'])}}">
                            <img src="{{"assets/uploads/".json_decode($car['images'])[0]}}">
                        </a>
                    </div>
                    <div class="panel-footer">
                        <span>Registration year: {{$car['registration_year']}}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
