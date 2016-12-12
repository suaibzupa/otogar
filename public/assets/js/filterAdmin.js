/**
 * Created by suaib on 25-Jul-16.
 */

var FilterAdmin = function () {

    /**
     * @param requestData
     * @param callback
     */
    this.sendAjaxRequest = function (requestData, callback) {

        $.ajax({
            'type' : 'POST',
            'url' : '/api/filterAdmin',
            'data' : {
                'filterAdmin' : requestData
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