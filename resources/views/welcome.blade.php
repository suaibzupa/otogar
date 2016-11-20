@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">
        <div class="container">
            <div class="filter-area col-md-6 col-lg-6 col-sm-6 well">
                <span class="center-block text-center">Search Filter</span>   <!--Arama kismi -->

                <div class="filers-container row">
                    <div class="col-sm-2">Manufacturer</div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control" name="manufacturer" id="manufacturer">
                                <option value="all">All</option>
                                @foreach($cars as $car)
                                    <option value="{{$car['vendor']}}">{{$car['vendor']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">Model</div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control" name="model" id="model">
                                <option value="all">All</option>
                                @foreach($models as $model)
                                    <option value="{{$model['model']}}">{{$model['model']}}</option>
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
                                    <option value="{{$category['category']}}">{{$category['category']}}</option>
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
                                    <option value="{{$city['name']}}">{{$city['name']}}</option>
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
                    <span class="no-results-filter label label-warning hidden">No results for this filter</span>
                </div>
            </div>

            <!-- arama kismi -->

            <div class="col-md-6 col-lg-6 col-sm-6">

                       <img src="assets/img/cars/lamborghiniAv.jpg" alt="Lake Atitlan, Guatemala" style="width:100%" height="255">

            </div>

        </div>

        <div  class=" col-sm-9">
            <button type="button" class="btn btn-primary"  id="likes" name="likes"   style="width: 570px">Like </button>
        </div>

        <div class="container car-animated">
                <!-- #Animated car -->
        </div>
    </div>


    <div class="row">



        <div class="col-lg-2">
            <select class="form-control" name="sort">
                    <option value="all">Fiyat - Azalan</option>
                    <option value="all">Fiyat - Artan</option>
                    <option value="all">Yil</option>
            </select>

        </div>




    </div>

    <div class="row">
        <div class="panel-group cars-container">
            @foreach($carList as $car)
                <div class="panel panel-primary cars-panel" style="display: inline-block;">
                    <div class="panel-heading">{{$car['vendor']}}</div>
                    <div class="panel-body">
                        <a href="{{url('/cars/'.$car['id'])}}">
                            <img  src="{{"assets/uploads/".json_decode($car['images'])[0]}}" width="182px" height="100px" alt="Images">
                        </a>
                    </div>
                    <div class="panel-footer">
                        <p><b>{{$car['registration_year']}}</b></p>
                        <p><b>{{$car['model']}}</b></p>
                        <p style="background-color:red" align="center"><strong>{{$car['price']}} TL</strong></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
