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