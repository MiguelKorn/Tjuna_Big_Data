<nav class="navbar navbar-inverse sidebar" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-sidebar-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="{{asset('img/logo-use-spaced.png')}}" height="80"
                                                  alt="Smiley face"></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{route('profile')}}">Profile<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
                </li>
                <li>
                    <a href="{{route('dashboard')}}">Dashboard<span style="font-size:16px;"
                                                                    class="pull-right hidden-xs showopacity glyphicon glyphicon-signal"></span></a>
                </li>
                <li>
                    <a href="{{route('teams')}}">Teams<span style="font-size:16px;"
                                                            class="pull-right hidden-xs showopacity glyphicon glyphicon-team"></span></a>
                </li>
                {{--<li>--}}
                {{--<a href="{{route('logout')}}">Log out<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-off"></span></a>--}}
                {{--</li>--}}

                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout<span
                                style="font-size:16px;"
                                class="pull-right hidden-xs showopacity glyphicon glyphicon-off"></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>