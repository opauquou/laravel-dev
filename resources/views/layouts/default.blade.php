<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | @yield('title', '')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/font-awesome/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('assets/plugins/ionicons/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/css/AdminLTE.min.css')}}">

    @yield('others_styles')

    @yield('inline_style')

</head>
<body class="hold-transition register-page">

    @yield('content')

<!-- jQuery 2.1.4 -->
<script src="{{asset('assets/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>

@yield('others_scripts')

@yield('footer_scripts')

</body>
</html>
