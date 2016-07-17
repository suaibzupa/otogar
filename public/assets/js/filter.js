var Filter = function () {

    /**
     * @param requestData
     * @param callback
     */
    this.sendAjaxRequest = function (requestData, callback) {
        
        $.ajax({
            'type' : 'POST',
            'url' : '/api/filter',
            'data' : {
                'filter' : requestData
            },
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function (data) {
                var decodedData = JSON.parse(data);
                callback(decodedData);
            }
        });
    };

    //Constructor
    return (function () {
        console.info('Filter JS initialized');
    })(this);
};