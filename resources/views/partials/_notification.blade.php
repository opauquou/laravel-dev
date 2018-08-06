<script>

    $(document).ready(function()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': "Bearer "+$('meta[name="api-token"]').attr('content')
            }
        });
    });

    @if(Session::has('success'))
        $.notify({
            message: "{{ Session::get('success') }}"
        },{
            type: 'success',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert"><span data-notify="message">{2}</span></div>',

        });
        @php
            Session::forget('success');
        @endphp
    @endif


    @if(Session::has('info'))
        $.notify({
            message: "{{ Session::get('info') }}"
        },{
            type: 'info',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert"><span data-notify="message">{2}</span></div>',

        });
        @php
            Session::forget('info');
        @endphp
    @endif


    @if(Session::has('warning'))
        $.notify({
            message: "{{ Session::get('warning') }}"
        },{
            type: 'warning',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert"><span data-notify="message">{2}</span></div>',

        });
        @php
            Session::forget('warning');
        @endphp
    @endif


    @if(Session::has('error'))
        $.notify({
            message: "{{ Session::get('error') }}"
        },{
            type: 'danger',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert"><span data-notify="message">{2}</span></div>',

        });
        @php
            Session::forget('error');
        @endphp
    @endif


</script>