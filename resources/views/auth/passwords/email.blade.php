@extends('layouts.default')

@section('title', 'Password Reset')

@section('others_styles')

@endsection

@section('inline_styles')

@endsection

@section('content')

    <div class="lockscreen-wrapper lockscreen">
        <div class="lockscreen-logo">
            <h2>{{ __('Reset Password') }}</h2>
        </div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                @csrf

                <div class="form-group has-feedback">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>

        <div class="text-center">
            <a href="{{route('loginPage')}}">Or sign in as a different user</a>
        </div>
        <div class="lockscreen-footer text-center">
            Copyright &copy; 2014-2015 <b><a href="http://almsaeedstudio.com" class="text-black">Almsaeed Studio</a></b><br>
            All rights reserved
        </div>
    </div>

@endsection

@section('others_scripts')

@endsection

@section('footer_scripts')

@endsection