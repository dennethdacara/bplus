<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('adminDashboard') }}">Beauty Plus <br> Salon</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('adminDashboard') }}">HOME</a></li>
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

                <li><a href="{{ route('addHomeServiceReservation') }}">ADD HOME SERVICE RESERVATION</a></li><br>
            </ul>
        </div>
        
        <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('users.index') }}">USERS</a></li>
                <li><a href="{{ route('walk-in.create') }}">ADD WALK-IN</a></li>
                 <li><a href="{{ route('walk-in.index') }}">WALK-IN CUSTOMERS</a></li>
                <li><a href="{{ route('employees.index') }}">EMPLOYEES</a></li>
                <li><a href="{{ route('viewAllCommissions') }}">EMPLOYEE COMMISSIONS</a></li>
                <li><a href="{{ route('viewAllReservations')}}">RESERVATIONS</a></li>
                <li><a href="{{ route('adminViewBilling')}}">BILLING</a></li>
                <li><a href="{{ route('adminViewAllPayments')}}">PAYMENTS</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings<b class="caret"></b></a>
                    <ul class="dropdown-menu">

                        <li><a class="" href="{{ route('editCommissionSettings') }}">
                            <center>Commission Settings</center>
                            </a>
                        </li>
                        <li><a class="" href="{{ route('services.index') }}">
                            <center>Expertise</center>
                            </a>
                        </li>
                        <li><a class="" href="{{ route('service-type.index') }}">
                            <center>Service Type</center>
                            </a>
                        </li>
                        <li><a class="" href="{{ route('services.index') }}">
                            <center>Services</center>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </div>

    </div>
</div>