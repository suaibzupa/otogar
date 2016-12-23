@extends('layouts.app')

@section('content')

    <script   type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <!-- Offer list -->
    <div class="col-md-6 col-lg-6 col-sm-6">
        <div class="col-md-6 col-lg-6 col-sm-6">
            <h3 style="margin-bottom: 15px;">İlanlarınız</h3>
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
        </div>
    </div>

    <div class="col-md-1 col-lg-1 col-sm-1">
    </div>


    <!--<ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">1</a></li>
        <li><a href="#tab2" data-toggle="tab">2</a></li>
        <li><a href="#tab3" data-toggle="tab">3</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab1">
            <a class="btn btn-primary btnNext">Next</a>
        </div>
        <div class="tab-pane" id="tab2">
            <a class="btn btn-primary btnNext">Next</a>
            <a class="btn btn-primary btnPrevious">Previous</a>
        </div>
        <div class="tab-pane" id="tab3">
            <input type="submit" id="submit" name="submit" class="btn btn-primary pull-right">
        </div>
    </div>

//-->
    <!-- Add Offer -->
    <div class="col-md-4 col-lg-4 col-sm-4">
        <ul class="nav nav-tabs" style="padding-left: 35%">
            <li class="active"><a href="#tab1" data-toggle="tab">1</a></li>
            <li><a href="#tab2" data-toggle="tab">2</a></li>
            <li><a href="#tab3" data-toggle="tab">3</a></li>
        </ul>

        <div class="form-area">
            <form role="form"   action="{{url('/admin')}}" method="POST" enctype="multipart/form-data"  >


                <h3 style="margin-bottom: 15px; text-align: center;">İlan Ver</h3>
                <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <label for="headText">Başlık</label>
                    <input  class="form-control"  name="headText" placeholder="İlan Başlığını Giriniz"  required="" >


                    <label name="description">Açıklama</label>
                    <textarea class="form-control"   name="description" placeholder="İlan Açıklamasını Giriniz"></textarea>


                    <label for="manufacturer">Marka</label>
                    <select class="form-control"  name="manufacturer1" id="manufacturer1" >
                        @foreach($manufacturers as $manufacturer)
                            <option value="{{$manufacturer['vendor']}}">{{$manufacturer['vendor']}}</option>
                        @endforeach
                    </select>



                    <label name="model">Model</label>
                    <select  class="form-control" name="model">
                        @foreach($models as $model)
                            <option value="{{$model['model']}}">{{$model['model']}}</option>
                        @endforeach
                    </select>

                    <label name="category">Kategori</label>
                    <select class="form-control" name="category">
                        @foreach($categories as $category)
                            <option value="{{$category['category']}}">{{$category['category']}}</option>
                        @endforeach
                    </select>

                    <label name="year">Yıl</label>
                    <select class="form-control"  name="year">
                        @for($i = intval(date('Y')); $i >= 1940; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>


                    <label for="traveled">Km</label>
                    <input class="form-control"  name="traveled" placeholder="KM" type="number">


                    <label for="price">Fiyat</label>
                    <input class="form-control"  name="price" placeholder="Fiyat (TL)" type="number">

                    <br>

                    <a class="btn btn-primary pull-right btnNext">Devam Et</a>
                </div>
                <div class="tab-pane" id="tab2">

                    <label name="city">Şehir</label>
                    <select class="form-control"  name="city">

                        @foreach($cities as $city)
                            <option  value="{{$city['name']}}">{{$city['name']}}</option>
                        @endforeach
                    </select>


                    <label name="yakit">Yakıt</label>
                    <select class="form-control"  name="yakit">

                        <option value="1">Dizel</option>
                        <option value="2">Benzin</option>
                        <option value="3">Hibrit</option>
                        <option value="4">Otogaz</option>

                    </select>

                    <label name="vites">Vites Tipi</label>
                    <select class="form-control"  name="vites">

                        <option value="1">Yarı Otomatik</option>
                        <option value="2">Tam Otomatik</option>
                        <option value="3">Manuel</option>
                        <option value="4">Triptonik</option>
                    </select>

                    <label name="kasa">Kasa Tipi</label>
                    <select class="form-control"  name="kasa">

                        <option value="1">Sedan</option>
                        <option value="2">Hatchback</option>
                        <option value="3">Station Wagon</option>
                        <option value="4">Coupe</option>
                        <option value="5">Liftback</option>
                        <option value="6">MPV</option>
                        <option value="7">Cabrio</option>
                        <option value="8">Pickup</option>
                        <option value="9">SUV</option>
                        <option value="10">Kamyon</option>


                    </select>


                    <label name="cekis">Çekiş</label>
                    <select class="form-control"  name="cekis">

                        <option value="1">Önden Çekiş</option>
                        <option value="2">Arkadan İtiş</option>
                        <option value="3">4 Çeker</option>

                    </select>


                    <label for="yakit_tuketim">Yakıt Tüketimi</label>
                    <input class="form-control"  name="yakit_tuketim" placeholder="lt (100 km)" type="number" step="0.1">


                    <label name="motor_hacim">Motor Hacmi</label>
                    <select class="form-control"  name="motor_hacim">

                        <option value="1">0 - 1300 cm&sup3;</option>
                        <option value="2">1301 - 1600 cm&sup3;</option>
                        <option value="3">1601 - 1800 cm&sup3;</option>
                        <option value="4">1801 - 2000 cm&sup3;</option>
                        <option value="5">2001 - 2500 cm&sup3;</option>
                        <option value="6">2501 - 3000 cm&sup3;</option>
                        <option value="7">3001 - 3500 cm&sup3;</option>
                        <option value="8">3501 - 4000 cm&sup3;</option>
                        <option value="9">4001 cm&sup3; ve üzeri</option>

                    </select>

                    <label name="motor_gucu">Motor Gücü</label>
                    <select class="form-control"  name="motor_gucu">

                        <option value="1">76 - 100 HP</option>
                        <option value="2">101 - 125 HP</option>
                        <option value="3">126 - 150 HP</option>
                        <option value="4">151 - 175 HP</option>
                        <option value="5">176 - 200 HP</option>
                        <option value="6">201 - 225 HP</option>
                        <option value="7">226 - 250 HP</option>
                        <option value="8">251 - 275 HP</option>
                        <option value="9">276 - 300 HP</option>
                        <option value="10">301 - 325 HP</option>
                        <option value="11">326 - 350 HP</option>
                        <option value="12">351 HP ve üzeri</option>

                    </select>

                    <br>

                    <a class="btn btn-primary pull-left btnPrevious">Geri Dön</a>
                    <a class="btn btn-primary pull-right btnNext">Devam Et</a>
                </div>
                <div class="tab-pane" id="tab3">

                    <label name="renk">Renk</label>
                    <select class="form-control"  name="renk">

                        <option value="1">Siyah</option>
                        <option value="2">Beyaz</option>
                        <option value="3">Gri</option>
                        <option value="4">Mavi</option>
                        <option value="5">Kırmızı</option>
                        <option value="6">Sarı</option>
                        <option value="7">Gümüş Gri</option>
                        <option value="8">Metalik Gri</option>
                        <option value="9">Turkuaz</option>
                        <option value="10">Yeşil</option>
                        <option value="11">Turuncu</option>
                        <option value="12">Altın</option>
                        <option value="13">Bej</option>
                        <option value="14">Bordo</option>
                        <option value="15">Füme</option>
                        <option value="16">Titanyum</option>
                        <option value="17">Kahverengi</option>
                        <option value="18">Lacivert</option>
                        <option value="19">Metalik Mavi</option>
                        <option value="20">Mor</option>
                        <option value="21">Pembe</option>
                        <option value="22">Şampanya</option>
                        <option value="23">Metalik Yeşil</option>

                    </select>

                    <label name="garanti">Garanti Durumu</label>
                    <select class="form-control"  name="garanti">

                        <option value="1">Var</option>
                        <option value="2">Yok</option>

                    </select>

                    <label name="takas">Takasa Uygun</label>
                    <select class="form-control"  name="takas">

                        <option value="1">Evet</option>
                        <option value="2">Hayır</option>

                    </select>

                    <label name="durum">Durumu</label>
                    <select class="form-control"  name="durum">

                        <option value="1">İkinci El</option>
                        <option value="2">Sıfır</option>
                        <option value="3">Hasarlı</option>
                        <option value="4">Hacizli</option>
                        <option value="5">Koleksiyon - Antika</option>

                    </select>

                    <label name="plaka">Plaka / Uyruk</label>
                    <select class="form-control"  name="plaka">

                        <option value="1">Türkiye (TR)</option>
                        <option value="2">Yabancı</option>
                        <option value="3">Mavi (MA)</option>

                    </select>

                    <label name="kimden">Kimden</label>
                    <select class="form-control"  name="kimden">

                        <option value="1">Sahibinden</option>
                        <option value="2">Galeriden</option>

                    </select>
                    <label for="images">Images</label>
                    <input class="form-control"  type="file" multiple name="images[]" accept="image/x-png, image/gif, image/jpeg">

                    <br>
                    {{csrf_field()}}
                    <a class="btn btn-primary pull-left btnPrevious">Geri Dön</a>
                    <input type="submit" id="submit" name="submit" class="btn btn-primary pull-right">
                </div>

            </div>

            </form>
        </div>

    </div>

@endsection

