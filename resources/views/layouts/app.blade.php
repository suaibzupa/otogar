<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{csrf_token()}}">
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
                <a class="navbar-brand" href="{{ url('/') }}">
                    Otogar
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>

                </ul>

                <div class="col-md-8">
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" class="form-control input-lg" placeholder="Search" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                        </div>
                    </div>
                </div>


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
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



<script type="text/javascript">
    $('#search-btn').click(function () {
        var manufacturer = $('select[name="manufacturer"]').val();
        var model = $('select[name="model"]').val();
        var city = $('select[name="city"]').val();
        var category = $('select[name="category"]').val();

        var minPrice = $('#slider-snap-value-lower').text();
        var maxPrice = $('#slider-snap-value-upper').text();

        var startYear = $('#slider-year-snap-value-lower').text();
        var endYear = $('#slider-year-snap-value-lower').text();


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

        console.log(queryData)
    });

    $('select[name="manufacturer"]').on('change', function () {
        var manufacturer = $(this).val();

        $.ajax({
            'type' : 'POST',
            'url' : '/api/pull',
            'data' : {
                'filter' : {
                    'manufacturer' : manufacturer
                }
            },
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function (data) {
                var decodedData = JSON.parse(data);
                $('select[name="model"]').html('');

                $.each(decodedData["models"], function (index, value) {
                    $('select[name="model"]').append("<option value='"+value+"'>"+value+"</option>");
                });
            }
        });
    });
</script>
</html>
