@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="menu row">
            <div class="product col-sm-5">
                <a href="#"><img  class="img-responsive product col-sm-12" src="{{"/assets/uploads/".json_decode($carData['images'])[0]}}" > </a>
                <hr>
                <h2>{{$carData['vendor']}} </h2>
                <p>{{$carData['description']}}</p>
                <hr>
                <h2 class="text-right">{{$carData['price']}} TL</h2>

                <hr>
            </div>

            <div class=" col-sm-2">
            </div>

             <div class="product1 col-sm-4">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#reviews">Reviews</a></li>
                    <li><a data-toggle="tab" href="#details">Details</a></li>
                    <li><a data-toggle="tab" href="#sizing">Sizing</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="reviews">

                        <h4>Buyer Reviews</h4>
                        <ul class="list-unstyled">
                            <li class="clearfix">(Mike R.) I bought this last month before a.. <i class="fa fa-star fa-2x yellow pull-right"></i></li>
                            <li class="clearfix">(Karen) The size of this jacket was a little larger.. <i class="fa fa-star fa-2x yellow pull-right"></i></li>
                            <li class="clearfix">(CAS) I love this jacket. I purchased this as part..  <i class="fa fa-star fa-2x yellow pull-right"></i><i class="fa fa-star fa-2x yellow pull-right"></i></li>
                            <li class="clearfix">(William D.) Great value with cool style. If you want.. <i class="fa fa-star fa-2x yellow pull-right"></i></li>
                        </ul>

                    </div>
                    <div class="tab-pane" id="details"><h4>Product Information</h4></div>
                    <div class="tab-pane" id="sizing"><h4>Size Chart</h4></div>
                </div>

             </div>
        </div>
    </div>
@endsection





