<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('website-index') }}">Beauty Plus <br> Salon</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('website-index') }}">HOME</a></li>
                <li><a href="{{ route('website-about') }}">ABOUT</a></li>
                @guest
                <li><a href="{{ route('register') }}">REGISTER</a></li>
                <li><a href="{{ route('login') }}">LOGIN</a></li>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->firstname }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
          
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">SERVICES LIST <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ route('websiteFootSpaTreatments') }}">FOOT SPA TREATMENTS </a></li>
                    <li><a href="{{ route('websiteHairFashionTreatments') }}">HAIR FASHION & TREATMENTS</a></li>
                    </ul>
                </li>
            </ul>
            
        </div>
    </div>
</div>