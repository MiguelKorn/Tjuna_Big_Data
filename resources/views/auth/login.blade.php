@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-container">
            <img id="li" class="profile-img-card" src="{{asset('img/witlogo.png')}}" height=""/>
            <p id="profile-name" class="profile-name-card"></p>

            <form class="form-signin" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <span id="reauth-email" class="reauth-email"></span>
                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}"
                       placeholder="Gebruikersnaam" required autofocus>
                <input id="password" type="password" class="form-control" name="password" placeholder="Wachtwoord"
                       required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"
                               value="remember" {{ old('remember') ? 'checked' : '' }}>
                        Remember Me
                    </label>
                </div>
                <button type="submit" class="btn btn-lg btn-primary btn-block btn-signin">
                    Login
                </button>
            </form><!-- /form -->

            <a class="forgot-password" href="{{route('password.request')}}">
                Wachtwoord vergeten?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
@endsection