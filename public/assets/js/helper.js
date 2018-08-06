/* Simulate Ajax call on Panel with reload effect */
$(function () {

    var btnLang = $('a.lang');

    btnLang.on('click', function(event){

        event.preventDefault();
        var lang = btnLang.data('lang');

        $.ajax({
            type: 'get',
            url: '/switchLang',
            data: {locale:lang},
            success: function(response){
                console.log(response.msg);
                window.location = response.msg;
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            }
        });

    });

    function blockUI(item) {
        $(item).block({
            message: '<svg class="circular"><circle class="path" cx="40" cy="40" r="10" fill="none" stroke-width="2" stroke-miterlimit="10"/></svg>',
            css: {
                border: 'none',
                width: '14px',
                backgroundColor: 'none',
                fill: '',
            },
            overlayCSS: {
                backgroundColor: '#510045',
                opacity: 0.6,
                cursor: 'wait'
            }
        });
    }

    function unblockUI(item) {
        $(item).unblock();
    }

});
