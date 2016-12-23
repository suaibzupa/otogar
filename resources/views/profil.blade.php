@extends('layouts.app')

@section('content')

    <div class="container">

            <div class="col-md-3"  style="margin-top: 3%">
                
                <img src="{{"/assets/uploads/".$user_info['profil_foto']}}"class="img-thumbnail"  style="max-width: 75%; margin-left: 12.5%;" alt="">
                <h3 style="text-align: center; font-weight: 500">{{$user_info['name']}} {{$user_info['soyisim']}}</h3>

                <div class="row" id="myGroup" style="margin-left: 12.5%">
                    <ul class="nav">
                        <li class="active" style="width: 75%">
                            <a href="#">
                                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#page1" style="width: 100%"><i class="glyphicon glyphicon-th"></i> İlanlarım </button>
                            </a>
                        </li>
                        <li style="width: 75%">
                            <a href="#">
                                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#page2" style="width: 100%"><i class="glyphicon glyphicon-user"></i> Hesap Bilgilerim </button>
                            </a>
                        </li>
                        <li style="width: 75%">
                            <a href="#">
                                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#page3" style="width: 100%"><i class="glyphicon glyphicon-envelope"></i> Mesajlarım </button>
                            </a>
                        </li>
                        <li style="width: 75%">
                            <a href="#">
                                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#page4" style="width: 100%"><i class="glyphicon glyphicon-refresh"></i> Bilgilerimi Güncelle </button>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="col-md-9" class="col-md-3" style="margin-top: 4%">

                <div id="page1" class="collapse">
                    <h3 style="margin-bottom: 15px;width: 90%;text-align: center;font-size: 30px; font-weight: bold">İlanlarım</h3>
                    <br>
                <ul class="list-group">

                    @if (!empty($offers))
                        @foreach($offers as $offer)

                            <li class="list-group-item" style="height: 40px;">
                                <a class="pull-left" href="{{url('/cars/'.$offer['id'])}}">{{$offer['headText']}}</a>
                                <a href="{{url('/remove/'.$offer['id'])}}"><i class="fa fa-minus pull-right"></i></a>
                            </li>
                        @endforeach
                    @else
                        <p>Henüz bir ilanınız bulunmamaktadır.</p>
                    @endif
                </ul>
                    @if($user_info['user_type'] == 1)
                    <a href = '/admin'>

                        <div class="btn-group btn-group-lg">
                            <button type="button" class="btn btn-info active" style="text-align: center; margin-left: 160%; background-color: green"><i class="fa fa-btn fa-car"></i>  Yeni Bir İlan Ver</button>
                        </div>

                    </a>
                        @endif



                </div>
                <div id="page2" class="collapse">

                <div style="padding-left: 30%;">
                <h3 style="margin-bottom: 15px;width: 60%;text-align: center;font-size: 30px; font-weight: bold">Hesap Bilgilerim</h3>

                <ul class="list-group" style="width: 20%; float: left">

                    <li class="list-group-item" style="height: 40px;">İsim: </li>
                    <li class="list-group-item" style="height: 40px; ">Soyisim: </li>
                    <li class="list-group-item" style="height: 40px; ">Üyelik Tarihi: </li>


                </ul>

                <ul class="list-group" style="width: 40%; float: left; padding-left: 3%">

                    <li class="list-group-item" style="height: 40px;">{{$user_info['name']}}</li>
                    <li class="list-group-item" style="height: 40px;">{{$user_info['soyisim']}}</li>
                    <li class="list-group-item" style="height: 40px;">{{substr($user_info['created_at'],0,10)}}</li>

                </ul>
                <br>
                <h3 style="margin-bottom: 15px; width: 60%; text-align: center;font-size: 30px; font-weight: bold">İletişim</h3>
                <ul class="list-group" style="width: 20%; float: left">
                    <li class="list-group-item" style="height: 40px; ">Email: </li>
                    <li class="list-group-item" style="height: 40px; ">Telefon: </li>
                    <li class="list-group-item" style="height: 40px; ">İl: </li>
                    <li class="list-group-item" style="height: 40px; ">İlçe: </li>
                    <li class="list-group-item" style="height: 60px; padding-top: 15px">Adres: </li>

                </ul>

                <ul class="list-group" style="width: 40%; float: left; padding-left: 3%">
                    <li class="list-group-item" style="height: 40px;">{{$user_info['email']}}</li>
                    <li class="list-group-item" style="height: 40px;">{{$user_info['telefon']}}</li>
                    <li class="list-group-item" style="height: 40px;">{{$user_info['il']}}</li>
                    <li class="list-group-item" style="height: 40px;">{{$user_info['ilce']}}</li>
                    <li class="list-group-item" style="height: 60px;">{{$user_info['adres']}}</li>

                </ul>
                </div>
                </div>

                <div id="page3" class="collapse">


                    <div class="container">
                        <h3 style="margin-bottom: 15px;width: 90%;text-align: center;font-size: 30px; font-weight: bold">Mesaj Kutusu</h3>
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#gelen">Gelen Mesajlar</a></li>
                            <li><a data-toggle="tab" href="#gonderilen">Gönderilmiş Mesajlar</a></li>

                        </ul>

                        <div class="tab-content">
                            <div id="gelen" class="tab-pane fade in active">
                                <ul class="list-group">
                                    <input value="{{$i = 1}}" hidden>
                                    @if (!empty($gelen))
                                        @foreach($gelen as $mesaj)
                                            <li class="list-group-item" style="height:auto;">
                                                <a href="#{{$i}}" class="list-inline" data-toggle="collapse" >
                                                    <span style="display: inline-block;width: 200px;">{{$mesaj['name']}} {{$mesaj['soyisim']}}</span>{{$mesaj['baslik']}}
                                                </a>
                                                <div id="{{$i}}" class="collapse">
                                                    <br><input value="{{$i = $i + 1}}" hidden>
                                                    <span style="display: inline-block; width: 195px;"></span>{{$mesaj['icerik']}}
                                                </div>
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="list-group-item" style="height:auto;">
                                            <span style="display: inline-block; width: 100%;">Henüz bir mesajınız bulunmamaktadır.</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div id="gonderilen" class="tab-pane fade">
                                <ul class="list-group">
                                    <input value="{{$i = -1}}" hidden>
                                    @if (!empty($gonderilen))
                                        @foreach($gonderilen as $mesaj2)
                                            <li class="list-group-item" style="height:auto;">
                                                <a href="#{{$i}}" class="list-inline" data-toggle="collapse" >
                                                    <span style="display: inline-block;width: 200px;">{{$mesaj2['name']}} {{$mesaj2['soyisim']}}</span>{{$mesaj2['baslik']}}
                                                </a>
                                                <div id="{{$i}}" class="collapse">
                                                    <br><input value="{{$i = $i - 1}}" hidden>
                                                    <span style="display: inline-block; width: 195px;"></span>{{$mesaj2['icerik']}}

                                                </div>
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="list-group-item" style="height:auto;">
                                            <span style="display: inline-block; width: 100%;">Henüz bir mesajınız bulunmamaktadır.</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="page4" class="collapse">
                    <div style="padding-left: 10%;">







                        <div class="panel panel-default">
                            <div class="panel-heading" style="text-align: center;font-weight: bold;font-size: 20px;">Hesap Bilgilerim</div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/profil/update_user') }}"  enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    <div class="form-group">
                                        <label for="isim" class="col-md-4 control-label" required="">İsim</label>

                                        <div class="col-md-6">
                                            <input id="isim" type="text" class="form-control" name="isim" placeholder="{{$user_info['name']}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="soyisim" class="col-md-4 control-label">Soyisim</label>

                                        <div class="col-md-6">
                                            <input id="soyisim" type="text" class="form-control" name="soyisim" placeholder="{{$user_info['soyisim']}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-md-4 control-label">E-Mail Adresi</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" placeholder="{{$user_info['email']}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="telefon" class="col-md-4 control-label">Telefon Numarası</label>

                                        <div class="col-md-6">
                                            <input id="telefon" type="text" class="form-control" name="telefon" placeholder="{{$user_info['telefon']}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="il" class="col-md-4 control-label">İl</label>
                                        <div class="col-md-6">
                                        <select class="form-control"  name="il">
                                            @foreach($cities as $city)
                                                <option  value="{{$city['name']}}">{{$city['name']}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="ilce" class="col-md-4 control-label">İlçe</label>
                                        <div class="col-md-6">
                                            <select class="form-control"  name="ilce">
                                                @foreach($cities as $city)
                                                    <option  value="{{$city['name']}}">{{$city['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="adres" class="col-md-4 control-label">Adres</label>

                                        <div class="col-md-6">
                                            <input id="adres" type="text" class="form-control" name="adres" placeholder="{{$user_info['adres']}}">
                                        </div>
                                    </div>

                                    <!--<div class="form-group">
                                        <label for="images" class="col-md-4 control-label">Profil Fotoğrafı</label>
                                        <div class="col-md-6">-->
                                    <div class="form-group">
                                    <label for="image" class="col-md-4 control-label">Profil Fotoğrafı</label>
                                        <div class="col-md-6">
                                            <input class="form-control"  type="file" name="image" accept="image/x-png, image/gif, image/jpeg">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4" style="margin-left: 40%">

                                            <button type="submit" class="btn btn-primary" id="profil_guncelle">

                                                <i class="fa fa-btn fa-user"></i> Güncelle

                                            </button>
                                                
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>






                    </div>
                </div>

            </div>
        </div>


@endsection
