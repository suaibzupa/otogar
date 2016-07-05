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
                            <select name="manufacturer">
                                @foreach($cars as $car)
                                    <option value="{{$car['manufacturer']}}">{{$car['manufacturer']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">Model</div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select name="manufacturer">
                                @foreach($cars as $car)
                                    <option value="{{$car['model']}}">{{$car['model']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">Category</div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select name="manufacturer">
                                @foreach($cars as $car)
                                    <option value="{{$car['category']}}">{{$car['category']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">City</div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select name="manufacturer">
                                <option value="istanbul">Istanbul</option>
                                <option value="izmir">Izmir</option>
                                <option value="bursa">Bursa</option>
                            </select>
                        </div>
                    </div>

                    <div id="price-slider"></div>
                    <span>Price Range: </span>
                    <strong id="slider-snap-value-lower"></strong>
                    <strong>-</strong>
                    <strong id="slider-snap-value-upper"></strong>
                </div>
            </div>

            <div class="container car-animated">
                <!-- #Animated car -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel-group">
            @foreach($cars as $car)
                <div class="panel panel-primary cars-panel" style="display: inline-block;">
                    <div class="panel-heading">{{$car['manufacturer']}}</div>
                    <div class="panel-body">
                        <a href="{{url('/cars/'.$car['id'])}}">
                            <img src="{{json_decode($car['images'])[0]}}">
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
