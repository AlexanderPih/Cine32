<!-- Default bootstrap navbar -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('films') ? "active" : "" }}"><a href="/films">Films</a></li>
                <li class="{{ Request::is('cinemas') ? "active" : "" }}"><a href="/cinemas">Cinemas</a></li>
                <li class="{{ Request::is('animations') ? "active" : "" }}"><a href="/animations">Animations</a></li>
                <li class="{{ Request::is('festival') ? "active" : "" }}"><a href="/festival">Festival</a></li>
                <li class="dropdown">
                    <li class="{{ Request::is('pedagogique') ? "active" : "" }}"> <!-- Todo: test if works -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pédagogique <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Ecole</a></li>
                        <li><a href="#">Collège</a></li>
                        <li><a href="#">Lycée</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Autres</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Archives</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tournage <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Présentation</a></li>
                        <li><a href="#">Tournages</a></li>
                    </ul>
                </li>
                <li class="{{ Request::is('bistrot') ? "active" : "" }}"><a href="/bistrot">Bistrot</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">A Propos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('about.association') }}">Association</a></li>
                        <li><a href="{{ route('about.history') }}">Historique</a></li>
                        <li><a href="#">Equipe</a></li>
                        <li><a href="#">Informations</a></li>
                        <li><a href="#">Adherer</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                @if(Auth::check())

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello {{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('posts.index') }}">Posts</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('categories.index') }}">Categories</a></li>
                            <li><a href="{{ route('tags.index') }}">Tags</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>

                @else

                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ url('/login') }}">Login</a>
                        </li>
                    </ul>

                @endif

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>