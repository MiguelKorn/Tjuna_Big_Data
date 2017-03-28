@extends('layouts.app')

@section('content')
    <div id="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Forgot Password?</h2>
                            <p>You can reset your password here.</p>
                            @if (session('status'))
                            <div class="alert alert-success">
                            {{ session('status') }}
                            </div>
                            @endif
                            <div class="panel-body">
                                <form id="register-form" class="form" role="form" method="POST"
                                      action="{{ route('password.email') }}" autocomplete="off">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input id="email" type="email" class="form-control" name="email"
                                                   value="{{ old('email') }}" placeholder="email" required>
                                        </div>
                                    </div>
                                    {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                    <div class="form-group">
                                        {{--<button type="submit" class="btn btn-primary">--}}
                                            {{--Send Password Reset Link--}}
                                        {{--</button>--}}
                                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
