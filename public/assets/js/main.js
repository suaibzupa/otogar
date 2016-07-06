$(document).ready(function(){
    var rangeSlider = document.getElementById('price-slider');

    noUiSlider.create(rangeSlider, {
        start: [1000, 200000],
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
        start: [1990, 2005],
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
    
});


