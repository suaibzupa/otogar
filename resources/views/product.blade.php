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
                                <a href="#"><img   src="{{"/assets/uploads/".json_decode($carData['images'])[$i]}}" style="width: 570px;height: 333px;"> </a> <!-- Dinamik olarak index'e gore doner -->
                                <div class="carousel-caption">
                                    <h3>Otogar</h3>
                                    <p>İkinci elde tek adres</p> <!-- Burayi dinamic getir db'den -->
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
                                {{$carData['headText']}}


                            </div>
                            <div class="panel-body">

                                <p class="text-left">{{$carData['description']}}</p>
                            </div>

                        </div>


                    </div>



                </div>
            </div>

            <div class="col-sm-1">

            </div>

            <div class=" col-sm-5">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#reviews">Araba Bilgileri</a></li>
                    <!--<li><a data-toggle="tab" href="#details">Açıklama</a></li>-->
                    <li><a data-toggle="tab" href="#sizing">Iletişim Bilgileri</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="reviews">
                        <div style="width: auto; height: 20px"></div>
                            <ul class="list-group list-group-flush" style="border: 100px; margin: 0; padding: 0">
                                <li class="list-group-item" id="detail_listele_left" style="background-color: lightblue">Fiyat</li>
                                <li class="list-group-item" id="detail_listele_right" style="background-color: lightblue">{{$carData['price']}} TL</li>
                                <li class="list-group-item" id="detail_listele_left" style="background-color: #d9edf7">Marka</li>
                                <li class="list-group-item" id="detail_listele_right" style="background-color: #d9edf7">{{$carData['vendor']}} </li>
                                <li class="list-group-item" id="detail_listele_left" style="background-color: lightblue">Model</li>
                                <li class="list-group-item" id="detail_listele_right" style="background-color: lightblue">{{$carData['model']}}</li>
                                <li class="list-group-item" id="detail_listele_left" style="background-color: #d9edf7">Yıl</li>
                                <li class="list-group-item" id="detail_listele_right" style="background-color: #d9edf7">{{$carData['registration_year']}}</li>
                                <li class="list-group-item" id="detail_listele_left" style="background-color: lightblue">Kategori</li>
                                <li class="list-group-item" id="detail_listele_right" style="background-color: lightblue">{{$carData['category']}}</li>
                                <li class="list-group-item" id="detail_listele_left" style="background-color: #d9edf7">KM</li>
                                <li class="list-group-item" id="detail_listele_right" style="background-color: #d9edf7">{{$carData['traveled']}}</li>
                                <li class="list-group-item" id="detail_listele_left" style="background-color: lightblue">Yakıt</li>
                                <li class="list-group-item" id="detail_listele_right" style="background-color: lightblue">{{$carData['yakit_turu']}}</li>
                                <li class="list-group-item" id="detail_listele_left" style="background-color: #d9edf7">Vites</li>
                                <li class="list-group-item" id="detail_listele_right" style="background-color: #d9edf7">{{$carData['vites_turu']}}</li>
                                <li class="list-group-item" id="detail_listele_left" style="background-color: lightblue">Kasa Tipi</li>
                                <li class="list-group-item" id="detail_listele_right" style="background-color: lightblue">{{$carData['kasa_turu']}}</li>
                                <li class="list-group-item" id="detail_listele_left" style="background-color: #d9edf7">Çekiş</li>
                                <li class="list-group-item" id="detail_listele_right" style="background-color: #d9edf7">{{$carData['cekis_turu']}}</li>
                                <li class="list-group-item" id="detail_listele_left" style="background-color: lightblue">Motor Hacmi</li>
                                <li class="list-group-item" id="detail_listele_right" style="background-color: lightblue">{{$carData['motor_hacim']}} cm&sup3;</li>
                                <li class="list-group-item" id="detail_listele_left" style="background-color: #d9edf7">Motor Gucu</li>
                                <li class="list-group-item" id="detail_listele_right" style="background-color: #d9edf7">{{$carData['motor_gucu']}} HP</li>
                                <li class="list-group-item" id="detail_listele_left" style="background-color: lightblue">Plaka/Uyruk</li>
                                <li class="list-group-item" id="detail_listele_right" style="background-color: lightblue">{{$carData['plaka']}}</li>
                                <li class="list-group-item" id="detail_listele_left" style="background-color: #d9edf7">Durumu</li>
                                <li class="list-group-item" id="detail_listele_right" style="background-color: #d9edf7">{{$carData['durum']}}</li>
                                <li class="list-group-item" id="detail_listele_left" style="background-color: lightblue">Yakıt Tüketimi</li>
                                <li class="list-group-item" id="detail_listele_right" style="background-color: lightblue">{{$carData['yakit_tuketim']}} lt</li>
                                <li class="list-group-item" id="detail_listele_left" style="background-color: #d9edf7">Garanti</li>
                                <li class="list-group-item" id="detail_listele_right" style="background-color: #d9edf7"><?php if ($carData['garanti']==1): echo 'Var'; else: echo 'Yok'; endif;?></li>
                                <li class="list-group-item" id="detail_listele_left" style="background-color: lightblue">Takas</li>
                                <li class="list-group-item" id="detail_listele_right" style="background-color: lightblue"><?php if ($carData['takas']==1): echo 'Uygun'; else: echo 'Uygun Değil'; endif;?></li>
                                <li class="list-group-item" id="detail_listele_left" style="background-color: #d9edf7">Kimden</li>
                                <li class="list-group-item" id="detail_listele_right" style="background-color: #d9edf7"><?php if ($carData['kimden']==1): echo 'Sahibinden'; else: echo 'Galeriden'; endif;?></li>

                            </ul>
                        </div>

                    <!--<div class="tab-pane" id="details"><h4> - {{$carData['headText']}} <br> - {{$carData['description']}}</h4></div>-->
                    <div class="tab-pane" id="sizing">
                        <div id="profile_picture">
                            <img src="{{"/assets/uploads/".$userData['profil_foto']}}" class="img-thumbnail">
                        </div>
                        <div style="padding-top: 20px;"></div>
                    <div class="fa-border" id="profile_descriptor">
                        <div id="profile_description">
                            {{$userData['name']}} {{$userData['soyisim']}}
                        </div>
                        <div id="profile_description">
                            {{$userData['email']}}
                        </div>
                        <div id="profile_description">
                            {{$userData['telefon']}}
                        </div>
                        <div id="profile_description">
                            Signed up at {{substr($userData['created_at'],0,10)}}
                        </div>
                    </div>

                    </div>

<!--
                    <div class="col-md-4 col-md-offset-4">

                        <div class="row">
                            <ul class="nav">
                                <li class="active">
                                    <a href="#">
                                        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#mesaj_gonder"><i class="glyphicon glyphicon-pencil"></i> Mesaj Gönder </button>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div> -->

                    <div class="col-md-10 col-md-offset-1" style="margin-top: 4%">


                        <form role="form"   action="{{url('/profil')}}" method="POST">
                            {{csrf_field()}}
                        <div id="mesaj_gonder" class="collapse">

                            <input name="kime" value="{{$userData['id']}}" hidden>
                            <input name="kimden" value="<?php if(!Auth::guest()) echo Auth::user()->id;else echo -1;?>" hidden>
                            <label for="mesaj_baslik">Başlık</label>
                            <input  class="form-control"  name="mesaj_baslik" placeholder="Mesaj Başlığını Giriniz"  required="" >

                            <label name="mesaj_aciklama">Açıklama</label>
                            <textarea class="form-control"   name="mesaj_aciklama" placeholder="Mesajınızı Giriniz" style="height: 150px" required=""></textarea>

                        </div>
                            <br>
                            @if(Auth::guest() or ($userData['id'] == Auth::user()->id))
                                <div class="col-md-offset-4"></div>
                            @else
                            <div class="col-md-offset-4" ><input type="submit" id="submit" name="submit" value="Mesaj Gönder" class="btn btn-primary" data-toggle="collapse" data-target="#mesaj_gonder"></div>
                            @endif
                        </form>
                        </div>

                    </div>

             </div>
        </div>
    </div>
    <script>
        var id = '{{$id}}';


    </script>
@endsection





