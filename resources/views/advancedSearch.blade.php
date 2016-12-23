@extends('layouts.app')

@section('content')

    <div class="container">


        <form>

            <div class="filter-area col-md-3 col-lg-3 col-sm-3 well">
                <span class="center-block text-center">Arama Filtreleri</span>   <!--Arama kismi -->

                <div class="form-group">
                    <label for="manufacturer">Marka</label>
                    <div class="form-group">
                        <select class="form-control" name="manufacturer" id="manufacturer">
                            <option value="all">Tümü</option>
                            @foreach($cars as $car)
                                <option value="{{$car['vendor']}}">{{$car['vendor']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label for="model">Model</label>
                    <div class="form-group">
                        <select class="form-control" name="model" id="model">
                            <option value="all">Tümü</option>
                            @foreach($models as $model)
                                <option value="{{$model['model']}}">{{$model['model']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="manufacturer">Kategori</label>
                    <div class="form-group">
                        <select class="form-control" name="category">
                            <option value="all">Tümü</option>
                            @foreach($categories as $category)
                                <option value="{{$category['category']}}">{{$category['category']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>



                <div class="form-group">
                    <label for="city">Şehir</label>
                    <div class="form-group">
                        <select class="form-control" name="city">
                            <option value="all">Tümü</option>
                            @foreach($cities as $city)
                                <option value="{{$city['name']}}">{{$city['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>




                <div>
                    <div id="price-slider" style=" margin-top: 43px; margin-bottom: 21px;  width: 180px; "></div>
                    <span>Fiyat Aralığı: </span>
                    <strong id="slider-snap-value-lower"></strong>
                    <strong>-</strong>
                    <strong id="slider-snap-value-upper"></strong>
                </div>

                <div class="year-slider-container" style="margin-top: 41px; margin-bottom: 61px; margin-left: 20px;  width: 255px; ">
                    <div id="year-slider"></div>
                    <span>Yıl Aralığı: </span>
                    <strong id="slider-year-snap-value-lower"></strong>
                    <strong>-</strong>
                    <strong id="slider-year-snap-value-upper"></strong>
                </div>



                <div class="form-group">


                    <button class="btn btn-info btn-lg"  name="ara" type="button"  class="btn btn-success"   id="advancedsearchjs"  >
                        <a tabindex="7"    class="btn-text" style="color: black">   Ara </a>
                    </button>


                </div>

            </div>



        </form>


        <div class=" col-md-9 col-lg-9 col-sm-9">
            <div class="row">
                <div class="panel-group cars-container">
                    @foreach($araba as $car)
                        <div class="panel panel-primary cars-panel" style="display: inline-block;">
                            <div class="panel-heading">{{$car['vendor']}}</div>
                            <div class="panel-body">
                                <a href="{{url('/cars/'.$car['id'])}}">

                                    <img  src="{{"/assets/uploads/".json_decode($car['images'])[0]}}" width="182px" height="100px" alt="Images">

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

    </div>




@endsection