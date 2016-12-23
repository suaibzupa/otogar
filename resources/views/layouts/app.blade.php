<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="_tokent" content="{{csrf_token()}}">
    <title>Otogar</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{url('/assets/fonts/font-awesome.min.css')}}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{url('/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/bootstrap-theme.min.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/nouislider.min.css')}}">

</head>
<body id="app-layout">
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" style="margin-bottom: auto" href="{{ url('/') }}">
                <i class="fa fa-car" style="font-size:40px;color:red;"></i>
                </a>
                <a class="navbar-brand" href="{{ url('/') }}">
                    Otogar
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                <li class="dropdown" style="width: 120px">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="text-align: center">
                        Kurumsal<span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu" style="border-radius: 5px;">
                        <li><a href="#" style="color:#777 !important"> Hakkımızda </a></li>
                        <li><a href="#" style="color:#777 !important"> İnsan Kaynakları </a></li>
                        <li><a href="#" style="color:#777 !important"> İletişim </a></li>
                    </ul>
                </li>
                </ul>


                <div class="col-md-6">
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" id="generalS" name="generalS" class="form-control input-lg" placeholder="Ara" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" id="ara" name="ara" type="button">
                            <a tabindex="7"  href="/advancedSearch/a"  class="btn-text" style="color: black">   <i class="fa fa-search"></i> </a>

                        </button>
                    </span>
                        </div>
                    </div>
                </div>





                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Giriş Yap</a></li>
                        <li><a href="{{ url('/register') }}">Kayıt Ol</a></li>
                        <li style="background-color:red; border-style: solid; border-radius: 20px; "><a href="{{ url('/login') }}">Ilan Ver</a></li>
                    @else


                        <li class="dropdown" style="width: 120px">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="text-align: center">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/profil') }}" style="color:#777 !important"><i class="glyphicon glyphicon-user"></i> Profil </a></li>
                                <li><a href="{{ url('/logout') }}" style="color:#777 !important"><i class="fa fa-btn fa-sign-out"></i> Çıkış Yap </a></li>
                            </ul>
                        </li>

                        @if ( 1 == Auth::user()->user_type)

                        <li><a href="{{ url('/admin') }}"  style="background-color:red; border-style: solid; border-radius: 10px; ">Ilan Ver</a></li>


                        @endif

                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

</body>
<!-- JavaScripts -->
<script type="text/javascript" src="{{url('/assets/js/jquery-2.0.min.js')}}"></script>
<script type="text/javascript" src="{{url('/assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('/assets/js/nouislider.min.js')}}"></script>
<script type="text/javascript" src="{{url('/assets/js/main.js')}}"></script>
<script type="text/javascript" src="{{url('/assets/js/filter.js')}}"></script>
<script type="text/javascript" src="{{url('/assets/js/filterAdmin.js')}}"></script>



<script type="text/javascript" > //admin add offer arkalara gore modelleri getir

    $('select[name="manufacturer1"]').on('change', function () { // this is manufacturer is changed

        var filterAdmin = new FilterAdmin();

        console.log("man1 degisti");
        var manufacturer = $(this).val();
        var requestData = {
            'manufacturer' : manufacturer
        };

        filterAdmin.sendAjaxRequest(requestData, function (returnData) {

            if (typeof returnData.models === 'undefined'
                    || typeof returnData.categories === 'undefined'
                    || typeof returnData.cities === "undefined"
                    || returnData == "") {
                $('.no-results-filter').removeClass('hidden');
            } else {
                $('.no-results-filter').addClass('hidden');
            }


            $.each(returnData, function (property, value) {
                if (property == 'models') {
                    $('select[name="model"]').html('');
                    $.each(value, function (index , data) {
                        $('select[name="model"]').append("<option value='"+data+"'>"+data+"</option>");
                    });
                }
              /*  else if (property == "categories") {
                    $('select[name="category"]').html('');
                    $('select[name="category"]').append("<option value='all'>All</option>");
                    $.each(value, function (index , data) {
                        $('select[name="category"]').append("<option value='"+data+"'>"+data+"</option>");
                    });
                } else if (property == "cities") {
                    $('select[name="city"]').html('');
                    $('select[name="city"]').append("<option value='all'>All</option>");
                    $.each(value, function (index , data) {
                        $('select[name="city"]').append("<option value='"+data+"'>"+data+"</option>");
                    });
                }*/
            });
        });
    });

/*

    $("#likes").click(function() {
        $('#counter').html(function(i, val) {
            $.ajax({
                url: '/path/to/script/',
                type: 'POST',
                data: {increment: true},
                success: function() { alert('Request has returned') }
            });
            return +val+1;
        });
    })
    */

/*
    $('#likesButton').click(function () { //general Search top box search

        var likes = $('input[name="likes"]').val();
        console.log(likes);
        var queryData = {
            "likes": likes
        } ;

        $.ajax({
            'type' : 'POST',
            'url' : '/api/likes',

            'headers': {
                'X-CSRF-TOKEN': $('meta[name="_tokent"]').attr('content')
            },
            success: function (data) {
                var parsedData = JSON.parse(data);

                $('.cars-container').html('');

                $.each(parsedData, function (property, value) {
                    $('.cars-container').append(
                            '<div class="panel panel-primary cars-panel" style="display: inline-block;">'+
                            '<div class="panel-heading">'+value.vendor+'</div>'+
                            '<div class="panel-body">'+
                            '<a href="/cars/'+value.id+'">'+
                            '<img  src="assets/uploads/'+JSON.parse(value.images)[0]+'" width="150px" height="100px" alt="Images">'+
                            '</a>'+
                            '</div>'+
                            '<div class="panel-footer">'+
                            '<span>Registration year: '+value.registration_year+'</span>'+
                            '</div>'+
                            '</div>');
                });


                console.log(parsedData);
            }
        });
    });
*/


    $('#likesButton').click(function () { //general Search top box search
        $.ajax({
            'type': 'POST',
            'url': '/api/likes/' + id,
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="_tokent"]').attr('content')
            },
            success: function (data) {
                $('#likesButton').text("Like " + data);
            }
        });
    });


/*
    $('#likesButton').click(function () {
           // log("okkkkkk");
            var request = $.ajax({
                type: 'POST',
                url:  '/api/likes'
            });
            request.done(function( msg ) {

                alert('Success');
                return;

            });
            request.fail(function(jqXHR, textStatus) {
                alert( "Request failed: " + textStatus );
            });

    });

*/

/*

    $('#search-btn').click(function () {
        var manufacturer = $('select[name="manufacturer"]').val();
        var model = $('select[name="model"]').val();
        var city = $('select[name="city"]').val();
        var category = $('select[name="category"]').val();

        var minPrice = $('#slider-snap-value-lower').text();
        var maxPrice = $('#slider-snap-value-upper').text();

        var startYear = $('#slider-year-snap-value-lower').text();
        var endYear = $('#slider-year-snap-value-upper').text();


        var queryData = {
            "manufacturer": manufacturer,
            "model": model,
            "city": city,
            "category": category,
            "priceRange": {
                "min": minPrice,
                "max": maxPrice
            },
            "yearRange": {
                "min": startYear,
                "end": endYear
            }
        };

        $.ajax({
            'type' : 'POST',
            'url' : '/api/search',
            'data' : queryData,
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function (data) {
                var parsedData = JSON.parse(data);

                $('.cars-container').html('');

                $.each(parsedData, function (property, value) {
                    $('.cars-container').append(
                            '<div class="panel panel-primary cars-panel" style="display: inline-block;">'+
                            '<div class="panel-heading">'+value.vendor+'</div>'+
                            '<div class="panel-body">'+
                            '<a href="/cars/'+value.id+'">'+
                            '<img  src="assets/uploads/'+JSON.parse(value.images)[0]+'" width="150px" height="100px" alt="Images">'+
                            '</a>'+
                            '</div>'+
                            '<div class="panel-footer">'+
                            '<span> '+value.registration_year+'</span>'+
                            '<br>'+
                            '<span> '+value.model+'</span>'+
                            '<br>'+
                            '<p  style="background-color:red" align="center"> '+value.price+'</p>'+
                            '</div>'+
                            '</div>');
                });


                console.log(parsedData);
            }
        });
    });


*/


    $('select[name="orderBy"]').on('change', function () {
        $.ajax({
            'type': 'POST',
            'url': '/api/orderBy/' + $(this).val(),
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="_tokent"]').attr('content')
            },
            success: function (data) {
                var parsedData = JSON.parse(data);

                $('.cars-container').html('');

                $.each(parsedData, function (property, value) {
                    $('.cars-container').append(
                            '<div class="panel panel-primary cars-panel" style="display: inline-block;">'+
                            '<div class="panel-heading">'+value.vendor+'</div>'+
                            '<div class="panel-body">'+
                            '<a href="/cars/'+value.id+'">'+
                            '<img  src="assets/uploads/'+JSON.parse(value.images)[0]+'" width="185px" height="100px" alt="Images">'+
                            '</a>'+
                            '</div>'+
                            '<div class="panel-footer">'+
                            '<span> '+value.registration_year+'</span>'+
                            '<br>'+
                            '<span> '+value.model+'</span>'+
                            '<br>'+
                            '<p  style="background-color:red" align="center"> '+value.price+'</p>'+
                            '</div>'+
                            '</div>');
                });


                console.log(parsedData);
            }
        });
    });






    $('#generalSearch').click(function () { //general Search top box search

        var generalS = $('input[name="generalS"]').val();
        console.log(generalS);
        var queryData = {
            "generalS": generalS
        } ;

        $.ajax({
            'type' : 'POST',
            'url' : '/api/gSearch',
            'data' : queryData,
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="_tokent"]').attr('content')
            },
            success: function (data) {
                var parsedData = JSON.parse(data);

                $('.cars-container').html('');

                $.each(parsedData, function (property, value) {
                    $('.cars-container').append(
                            '<div class="panel panel-primary cars-panel" style="display: inline-block;">'+
                            '<div class="panel-heading">'+value.vendor+'</div>'+
                            '<div class="panel-body">'+
                            '<a href="/cars/'+value.id+'">'+
                            '<img  src="assets/uploads/'+JSON.parse(value.images)[0]+'" width="185px" height="100px" alt="Images">'+
                            '</a>'+
                            '</div>'+
                            '<div class="panel-footer">'+
                            '<span>Registration year: '+value.registration_year+'</span>'+
                            '</div>'+
                            '</div>');
                });


                console.log(parsedData);
            }
        });
    });





    $('#generalS').change(function() {
        var newurl = $('#generalS').val();
        $('a').attr("href", $('a').attr("href") +"/advancedSearch/"+newurl);
    });



    $('.btnNext').click(function(){
        $('.nav-tabs > .active').next('li').find('a').trigger('click');
    });

    $('.btnPrevious').click(function(){
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    });


    $('.btn-info').on('click',function(){$('.collapse').collapse('hide');})

    //$('.list-group').on('click',function(){$('.collapse').collapse('hide');})
    $('#advancedsearchjs').click(function () {
        console.log("okkkkk");
        var manufacturer = $('select[name="manufacturer"]').val();
        var model = $('select[name="model"]').val();
        var city = $('select[name="city"]').val();
        var category = $('select[name="category"]').val();

        var minPrice = $('#slider-snap-value-lower').text();
        var maxPrice = $('#slider-snap-value-upper').text();

        var startYear = $('#slider-year-snap-value-lower').text();
        var endYear = $('#slider-year-snap-value-upper').text();


        var queryData = {
            "manufacturer": manufacturer,
            "model": model,
            "city": city,
            "category": category,
            "priceRange": {
                "min": minPrice,
                "max": maxPrice
            },
            "yearRange": {
                "min": startYear,
                "end": endYear
            }
        };

        $.ajax({
            'type' : 'POST',
            'url' : '/api/advancedsearchjs',
            'data' : queryData,
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function (data) {
                var parsedData = JSON.parse(data);

                $('.cars-container').html('');

                $.each(parsedData, function (property, value) {
                    $('.cars-container').append(
                            '<div class="panel panel-primary cars-panel" style="display: inline-block;">'+
                            '<div class="panel-heading">'+value.vendor+'</div>'+
                            '<div class="panel-body">'+
                            '<a href="/cars/'+value.id+'">'+
                            '<img  src="/assets/uploads/'+JSON.parse(value.images)[0]+'" width="185px" height="100px" alt="Images">'+
                            '</a>'+
                            '</div>'+
                            '<div class="panel-footer">'+
                            '<span> '+value.registration_year+'</span>'+
                            '<br>'+
                            '<span> '+value.model+'</span>'+
                            '<br>'+
                            '<p  style="background-color:red" align="center"> '+value.price+'</p>'+
                            '</div>'+
                            '</div>');
                });


                console.log(parsedData);
            }
        });
    });



</script>


</html>
