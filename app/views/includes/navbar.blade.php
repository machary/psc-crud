<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{{ URL::to('admin/index') }}}" class="navbar-brand">PSC</a>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="{{{ URL::to('admin/flightplans') }}}" >Flight Plan</a>
                </li>
                <li>
                    <a href="{{{ URL::to('admin/airlines') }}}">Airlines</a>
                </li>
                <li>
                    <a href="{{{ URL::to('admin/airports') }}}">Airports</a>
                </li>
                <li>
                    <a href="{{{ URL::to('admin/users') }}}">User Login</a>
                </li>
                <li>
                    <a href="{{{ URL::to('admin/roles') }}}">Role</a>
                </li>
                <li>
                    <a href="{{{ URL::to('admin/userroles') }}}">User Role</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Session::get('message'))
                <li>
                    <a href="{{{URL::to('login') }}}">Login</a>
                </li>
                @else
                <li>
                    <a href="{{{URL::to('logout') }}}">Logout</a>
                </li>
                @endif

            </ul>
        </nav>
    </div>
</header>
