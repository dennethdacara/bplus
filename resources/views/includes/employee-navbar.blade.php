<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('customerDashboard') }}">Beauty Plus <br> Salon</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('customerDashboard') }}">HOME</a></li>
                <li><a href="{{ route('customerAddOnSpaReservation') }}">ON SPA RESERVATION</a></li>
                <li><a href="{{ route('customerAddHomeServiceReservation') }}">HOME SERVICE RESERVATION</a></li>
                <li><a href="{{ route('customerViewAllReservations') }}">MY RESERVATIONS</a></li>
                <li><a href="{{ route('customerViewAllPayments') }}">MY PAYMENTS</a></li>

                @guest
                <li><a href="{{ route('register') }}">REGISTER</a></li>
                <li><a href="{{ route('login') }}">LOGIN</a></li>
                @else

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->firstname }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a class="" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <center>Logout</center>
                        </a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>

                @endguest
                
            </ul>
        </div>
    

    </div>
</div>