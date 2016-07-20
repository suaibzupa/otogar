$(document).ready(function(){
    var rangeSlider = document.getElementById('price-slider');

    noUiSlider.create(rangeSlider, {
        start: [5000, 1000000],
        connect: true,
        range: {
            'min': 5000,
            'max': 1000000
        },
        step: 5000
    });

    var snapValues = [
        document.getElementById('slider-snap-value-lower'),
        document.getElementById('slider-snap-value-upper')
    ];

    rangeSlider.noUiSlider.on('update', function( values, handle ) {
        snapValues[handle].innerHTML = parseInt(values[handle]);
    });



    var yearRangeSlider = document.getElementById('year-slider');

    noUiSlider.create(yearRangeSlider, {
        start: [1960, (new Date()).getFullYear()],
        connect: true,
        range: {
            'min': 1960,
            'max': (new Date()).getFullYear()
        },
        step: 1
    });

    var snapYearValues = [
        document.getElementById('slider-year-snap-value-lower'),
        document.getElementById('slider-year-snap-value-upper')
    ];

    yearRangeSlider.noUiSlider.on('update', function( values, handle ) {
        snapYearValues[handle].innerHTML = parseInt(values[handle]);
    });


    var filter = new Filter();



    $('#generalSearch').click(function () { //general Search top box search

        var generalS = $('input[name="generalS"]').val();


        console.log(generalS);

        var queryData = generalS;




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
                                '<span>Registration year: '+value.registration_year+'</span>'+
                            '</div>'+
                        '</div>');
                });


                console.log(parsedData);
            }
        });
    });









    $('select[name="manufacturer"]').on('change', function () { // this is manufacturer is changed

        var manufacturer = $(this).val();
        var requestData = {
            'manufacturer' : manufacturer
        };

        filter.sendAjaxRequest(requestData, function (returnData) {

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
                    $('select[name="model"]').append("<option value='all'>All</option>");
                    $.each(value, function (index , data) {
                        $('select[name="model"]').append("<option value='"+data+"'>"+data+"</option>");
                    });
                } else if (property == "categories") {
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
                }
            });
        });
    });





    $('select[name="model"]').on('change', function () {


        var model = $(this).val();



        var requestData = {
            'model' : model
        };

        filter.sendAjaxRequest(requestData, function (returnData) {

            if ( typeof returnData.categories === 'undefined'
                || typeof returnData.cities === "undefined"
                || returnData == "") {
                $('.no-results-filter').removeClass('hidden');
            } else {
                $('.no-results-filter').addClass('hidden');
            }


            $.each(returnData, function (property, value) {
                if (property == "categories") {
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
                }
            });
        });
    });



    $('select[name="category"]').on('change', function () {

        var category = $(this).val();

        var requestData = {
            'category' : category
        };

        filter.sendAjaxRequest(requestData, function (returnData) {

            if ( typeof returnData.cities === "undefined"
                || returnData == "") {
                $('.no-results-filter').removeClass('hidden');
            } else {
                $('.no-results-filter').addClass('hidden');
            }

            $.each(returnData, function (property, value) {
                if (property == "cities") {
                    $('select[name="city"]').html('');
                    $('select[name="city"]').append("<option value='all'>All</option>");
                    $.each(value, function (index , data) {
                        $('select[name="city"]').append("<option value='"+data+"'>"+data+"</option>");
                    });
                }
            });
        });
    });

    $('select[name="city"]').on('change', function () {

        var city = $(this).val();

        var requestData = {
            'city' : city
        };

        filter.sendAjaxRequest(requestData, function (returnData) {

            if (returnData == "") {
                $('.no-results-filter').removeClass('hidden');
            } else {
                $('.no-results-filter').addClass('hidden');
            }


        });
    });


});


