
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">FELS Test System</a>
        </div>
        <!-- Navbar Right -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
               <!-- <li class="active"><a href="/">Home</a></li> -->
                <li><a href="/">Home</a></li>
                <li><a href="/suggest">Contribute questions</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Member
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            @if (Route::has('login'))
                            <div class="top-right links">
                                @if (Route::has('login'))
                                    <div class="top-right links">
                                    @auth
                                         <a href="{{ url('/home') }}">Home</a>
                                @else
                                    <a href="{{ route('login') }}">Login</a>
                                    @if (Route::has('register'))
                                         <a href="{{ route('register') }}">Register</a>
                                @endif
                                    @endauth
                                </div>
                                @endif
                            </div>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>