@extends('layouts.app')

@section('content')

    <script   type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <!-- Offer list -->
    <div class="col-md-6 col-lg-6 col-sm-6">
        <div class="col-md-6 col-lg-6 col-sm-6">
            <h3 style="margin-bottom: 15px;">Your Offers</h3>
            <ul class="list-group">

                @if (!empty($offers))
                    @foreach($offers as $offer)

                        <li class="list-group-item" style="height: 40px;">
                            <a class="pull-left" href="{{url('/cars/'.$offer['id'])}}">{{$offer['headText']}}</a>
                            <a href="{{url('/remove/'.$offer['id'])}}"><i class="fa fa-minus pull-right"></i></a>
                        </li>
                    @endforeach
                @else
                    <p>You don't have any offers yet.</p>
                @endif
            </ul>
        </div>
    </div>

    <div class="col-md-1 col-lg-1 col-sm-1">
    </div>



    <!-- Add Offer -->
    <div class="col-md-4 col-lg-4 col-sm-4">

        <div class="form-area">
            <form role="form"   action="{{url('/admin')}}" method="POST" enctype="multipart/form-data"  >


                <h3 style="margin-bottom: 15px; text-align: center;">Add Offer</h3>


                <label for="headText"  >Header</label>
                <input  class="form-control"  name="headText" placeholder="Header of your offer"  required="" >


                <label name="description">Description</label>
                <textarea class="form-control"   name="description" placeholder="Description of your offer"></textarea>


                <label for="manufacturer">Manufacturer</label>
                <select class="form-control"  name="manufacturer1" id="manufacturer1" >
                    @foreach($manufacturers as $manufacturer)
                        <option value="{{$manufacturer['vendor']}}">{{$manufacturer['vendor']}}</option>
                    @endforeach
                </select>



                <label name="model">Models</label>
                <select  class="form-control" name="model">
                    @foreach($models as $model)
                        <option value="{{$model['model']}}">{{$model['model']}}</option>
                    @endforeach
                </select>


                <label name="category">Category</label>
                <select class="form-control" name="category">
                    @foreach($categories as $category)
                        <option value="{{$category['category']}}">{{$category['category']}}</option>
                    @endforeach
                </select>


                <label name="year">Year</label>
                <select class="form-control"  name="year">
                    @for($i = intval(date('Y')); $i >= 1940; $i--)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>


                <label for="traveled">Traveled</label>
                <input class="form-control"  name="traveled" placeholder="KM traveled" type="number">


                <label name="city">City</label>
                <select class="form-control"  name="city">

                    @foreach($cities as $city)
                        <option  value="{{$city['name']}}">{{$city['name']}}</option>
                    @endforeach
                </select>

                <label for="price">Price</label>
                <input class="form-control"  name="price" placeholder="Price in TL" type="number">

                <label for="images">Images</label>
                <input class="form-control"  type="file" multiple name="images[]" accept="image/x-png, image/gif, image/jpeg">

                <br>
                {{csrf_field()}}
                <input type="submit" id="submit" name="submit" class="btn btn-primary pull-right">

            </form>
        </div>

    </div>
@endsection

