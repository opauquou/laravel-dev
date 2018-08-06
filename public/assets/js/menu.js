$(function () {

    $('.sidebar-menu li.nav-widgets a').on('click', function () {
        var el = $('.content-wrapper');
        $.ajax({
            type: 'get',
            url: '/widgets',
            beforeSend: function () {
                blockUI(el);
            }
        })
        .done(function (data) {
            unblockUI(el);
            el.html(data.html);
        })
        .fail(function (reuslt) {
            unblockUI(el);
        })
    });


});