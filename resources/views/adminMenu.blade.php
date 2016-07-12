@extends('layouts.app')

@section('content')
    <!-- Offer list -->
    <div class="col-md-6 col-lg-6 col-sm-6">
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


    <!-- Add Offer -->
    <div class="col-md-6 col-lg-6 col-sm-6">
        <form action="{{url('/admin')}}" method="POST" enctype="multipart/form-data">
            <label for="headText">Header</label>
            <input name="headText" placeholder="Header of your offer">

            <br>

            <label name="description">Description</label>
            <textarea name="description" placeholder="Description of your offer"></textarea>

            <br>

            <label for="manufacturer">Manufacturer</label>
            <select name="manufacturer">
                <option value="select">Select</option>
                @foreach($manufacturers as $manufacturer)
                    <option value="{{$manufacturer['vendor']}}">{{$manufacturer['vendor']}}</option>
                @endforeach
            </select>

            <br>

            <label name="model">Models</label>
            <select name="model">
                <option value="select">Select</option>
                @foreach($models as $model)
                    <option value="{{$model['model']}}">{{$model['model']}}</option>
                @endforeach
            </select>

            <br>

            <label name="category">Category</label>
            <select name="category">
                <option value="select">Select</option>
                @foreach($categories as $category)
                    <option value="{{$category['category']}}">{{$category['category']}}</option>
                @endforeach
            </select>

            <br>

            <label name="year">Year</label>
            <select name="year">
                @for($i = intval(date('Y')); $i >= 1940; $i--)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>

            <br>

            <label for="traveled">Traveled</label>
            <input name="traveled" placeholder="KM traveled" type="number">

            <br>

            <label name="city">City</label>
            <select name="city">
                <option value="select">Select</option>
                @foreach($cities as $city)
                    <option value="{{$city['name']}}">{{$city['name']}}</option>
                @endforeach
            </select>

            <br>

            <label for="images">Images</label>
            <input type="file" multiple name="images[]" accept="image/x-png, image/gif, image/jpeg">

            <br>

            {{csrf_field()}}
            <input type="submit" class="btn-lg btn-success">
        </form>
    </div>
@endsection