@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">
        <div class="container">
            <div class="filter-area col-md-6 col-lg-6 col-sm-6 well">
                <span class="center-block text-center" style="font-weight: bold; font-size: 20px;padding-bottom: 8px;">Arama Filtreleri</span>   <!--Arama kismi -->

                <div class="filers-container row">
                    <div class="col-sm-2">Marka</div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control" name="manufacturer" id="manufacturer">
                                <option value="all">Tümü</option>
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
                                <option value="all">Tümü</option>
                                @foreach($models as $model)
                                    <option value="{{$model['model']}}">{{$model['model']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">Kategori</div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control" name="category">
                                <option value="all">Tümü</option>
                                @foreach($categories as $category)
                                    <option value="{{$category['category']}}">{{$category['category']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">Şehir</div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control" name="city">
                                <option value="all">Tümü</option>
                                @foreach($cities as $city)
                                    <option value="{{$city['name']}}">{{$city['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>

                    <div>
                        <div id="price-slider"></div>
                        <span>Fiyat Aralığı: </span>
                        <strong id="slider-snap-value-lower"></strong>
                        <strong>-</strong>
                        <strong id="slider-snap-value-upper"></strong>
                    </div>

                    <div class="year-slider-container">
                        <div id="year-slider"></div>
                        <span>Yıl Aralığı: </span>
                        <strong id="slider-year-snap-value-lower"></strong>
                        <strong>-</strong>
                        <strong id="slider-year-snap-value-upper"></strong>
                    </div>

                    <a href="javascript:void(0)" id="search-btn" class="btn btn-success" style="width: 60px;">Ara</a>
                    <br><br>
                    <a href="/advancedSearch/2"  class="btn-link" style="color: black; padding-left: 35%">
                    <button class="btn btn-info btn-lg" id="detaylı_ara" name="detaylı_ara" type="button">
                        <i class="fa fa-search"></i> Detaylı Arama
                    </button>
                    </a>
                    <br><br>

                    <span class="no-results-filter label label-warning hidden" style="margin-left: 20%; margin-right: 22%">Yukarıdaki Filtrelere Uygun Kayıt Bulunamadı.</span>
                </div>
            </div>

            <!-- arama kismi -->

            <div class="col-md-6 col-lg-6 col-sm-6">

                       <img src="assets/img/cars/lamborghiniAv.jpg" alt="Lake Atitlan, Guatemala" style="width:100%" height="255">

            </div>

        </div>


        <div class="container car-animated">
                <!-- #Animated car -->
        </div>
    </div>


    <div class="row">



        <div class="col-lg-2">
            <select class="form-control" name="orderBy">
                    <option value="desc">Fiyata Göre Azalan</option>
                    <option value="asc">Fiyata Göre Artan</option>
                    <option value="yil_desc">Yila Göre Azalan</option>
                    <option value="yil_asc">Yila Göre Artan</option>
                    <option value="date_desc">Tarihe Göre En Güncel</option>

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
