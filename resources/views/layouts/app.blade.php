<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | @yield('title', '')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/font-awesome/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('assets/plugins/ionicons/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('assets/css/skins/_all-skins.min.css')}}">
    <!-- Animate -->
    <link rel="stylesheet" href="{{asset('assets/plugins/animate/animate.min.css')}}">
    <!-- Bootstrap Notify -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-notify/bootstrap-notify.css')}}">
    <!-- Custom -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

    @yield('others_styles')

    @yield('inline_styles')

</head>
<body @if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'invoice')onload="window.print();" @endif class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('partials._appHeader')

    @include('partials._appLeftSidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper ">

        @yield('content')

    </div><!-- /.content-wrapper -->

    @include('partials._appFooter')

    @include('partials._appRightSidebar')

</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="{{asset('assets/plugins/jQuery/jquery-3.3.1.min.js')}}"></script>
<!-- jQueryUI -->
<script src="{{asset('assets/plugins/jQueryUI/jquery-ui.min.js')}}"></script>
<!-- jQuery blockUI -->
<script src="{{asset('assets/plugins/jQuery-blockUI/jquery.blockUI.min.js')}}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('assets/plugins/fastclick/fastclick.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/js/demo.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/js/menu.js')}}"></script>
<!-- Helper Functions -->
<script src="{{asset('assets/js/helper.js')}}"></script>
<!-- Bootstrap Notify -->
<script src="{{asset('assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>

@yield('others_scripts')

@yield('footer_scripts')
@include('partials._notification')
</body>
</html>