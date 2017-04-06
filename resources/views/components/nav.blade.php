<nav class="navbar sidebar" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-sidebar-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <span><img src="{{asset('img/user.png')}}"/></span>
                <p>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{route('dashboard')}}">Dashboard<span style="font-size:16px;"
                                                                    class="pull-right hidden-xs showopacity ">
                            <i class="fa fa-signal" aria-hidden="true"></i>
                        </span></a>
                </li>
                <li>
                    <a href="{{route('team')}}">Team<span style="font-size:16px;"
                                                           class="pull-right hidden-xs showopacity ">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </span></a>
                </li>

                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout<span
                                style="font-size:16px;"
                                class="pull-right hidden-xs showopacity">
                            <i class="fa fa-power-off" aria-hidden="true"></i>
                        </span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>