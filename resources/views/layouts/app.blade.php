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
                <a class="navbar-brand" href="{{ url('/') }}">
                    Otogar
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>

                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/aboutus') }}">Hakkimizda</a></li>

                </ul>


                <div class="col-md-6">
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" id="generalS" name="generalS" class="form-control input-lg" placeholder="Search" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" id="generalSearch" name="generalSearch" type="button">
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
                        <li style="background-color:red; border-style: solid; border-radius: 20px; "><a href="{{ url('/login') }}">Ilan Ver</a></li>
                    @else


                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout </a></li>
                            </ul>
                        </li>

                        @if ( 1 == Auth::user()->user_type)

                        <li><a href="{{ url('/admin') }}"  style="background-color:red; border-style: solid; border-radius: 10px; ">Offers Add</a></li>

                        }
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


/*
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

</script>


</html>
