@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="menu row">
            <div class="col-sm-6">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        @for($i = 0; $i < sizeof(json_decode($carData['images'])); $i++)

                        <li data-target="#myCarousel" data-slide-to="{$i}" class="active"></li>

                        @endfor
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">

                        @for($i = 0; $i < sizeof(json_decode($carData['images'])); $i++)
                            <div class="item {{$i == 0 ? 'active' : ''}}">  <!-- Birince index'teki slide'i aktif yapar -->
                                <a href="#"><img   src="{{"/assets/uploads/".json_decode($carData['images'])[$i]}}" > </a> <!-- Dinamik olarak index'e gore doner -->
                                <div class="carousel-caption">
                                    <h3>Chania</h3> <!-- Bunu da dinamic getir DB'den -->
                                    <p>The atmosphere in Chania has a touch of Florence and Venice.</p> <!-- Burayi dinamic getir db'den -->
                                </div>
                            </div>
                        @endfor



                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>





                <div class="row" >

                    <br>
                    <div  class=" col-sm-9">

                        <button type="button" class="btn btn-primary" value="1" id="likesButton" name="likesButton"   style="width: 570px">Like {{$carData['likesToplam']}} </button>



                        </div>

                    <br>
                    <br>


                    <div style="margin: 20px;">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Aciklama Amk


                            </div>
                            <div class="panel-body">

                                <p class="text-left">{{$carData['headText']}} </p>


                                <p class="text-left">{{$carData['description']}}</p>
                            </div>

                        </div>


                    </div>



                </div>
            </div>

            <dev class="col-sm-1">

            </dev>

            <div class=" col-sm-5">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#reviews">Araba Bilgileri</a></li>
                    <li><a data-toggle="tab" href="#details">Açıklama</a></li>
                    <li><a data-toggle="tab" href="#sizing">Ilrtişım Bılgılerı</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="reviews">


                        <ul class="list-unstyled">



                        </ul>
                        <div class="col-md-8 col-lg8 col-xs-12">
                        <div style="line-height: 24px; width: 100%; font-size: 18px">
                            <div style="float: left; width: 50%; display: block;border-bottom: 1px solid #e9e9e9">Fiyat</div>
                            <div style="float: left; width: 50%; margin: 0;font-weight: 700; border-bottom: 1px solid #e9e9e9">{{$carData['price']}} TL</div>

                            <div style="float: left; width: 50%; display: block; border-bottom: 1px solid #e9e9e9">Marka</div>
                            <div style="float: left; width: 50%; margin: 0;font-weight: 700;     border-bottom: 1px solid #e9e9e9">{{$carData['vendor']}}</div>

                            <div style="float: left; width: 50%; display: block; border-bottom: 1px solid #e9e9e9">Kategori</div>
                            <div style="float: left; width: 50%; margin: 0;font-weight: 700;     border-bottom: 1px solid #e9e9e9">{{$carData['category']}}</div>

                            <div style="float: left; width: 50%; display: block;border-bottom: 1px solid #e9e9e9">KM</div>
                            <div style="float: left; width: 50%; margin: 0;font-weight: 700; border-bottom: 1px solid #e9e9e9">{{$carData['traveled']}}</div>

                            <div style="float: left; width: 50%; display: block;border-bottom: 1px solid #e9e9e9">Yil</div>
                            <div style="float: left; width: 50%; margin: 0;font-weight: 700; border-bottom: 1px solid #e9e9e9">{{$carData['registration_year']}} </div>

                        </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="details"><h4> - {{$carData['headText']}} <br> - {{$carData['description']}}</h4></div>
                    <div class="tab-pane" id="sizing"><h4>Size Chart</h4></div>
                </div>
             </div>
        </div>
    </div>
    <script>
        var id = '{{$id}}';


    </script>
@endsection





