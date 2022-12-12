<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <!-- Authentication Links -->
                @guest
                <li class="active">
                    <a href="#"><i class="menu-icon fa fa-laptop"></i>TABLEAU DE BORDS </a>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Gestion</a>
                    <ul class="sub-menu children dropdown-menu">
                        @if (Route::has('tasksPage'))
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('tasksPage') }}">Taches</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="{{ route('userAdmin') }}">Administrateurs</a></li>
                    @endif

                    </ul>
                </li>

                
                    @if (Route::has('login'))
                        <li >
                            <a href="{{ route('login') }}"><i class="menu-icon fa fa-laptop"></i>{{ __('Login') }} </a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li >
                            <a href="{{ route('register') }}"><i class="menu-icon fa fa-laptop"></i>{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-user-circle-o"></i>{{ Auth::user()->name }}</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-sign-out"></i><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
        <div class="top-left">
            <div class="navbar-header">
                <a class="navbar-brand" href="./">
                    <h3>Assistancia</h3>
                </a>


            </div>
        </div>

    </header>
    <!-- /#header -->
