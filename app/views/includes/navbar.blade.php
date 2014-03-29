<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="../" class="navbar-brand">PSC</a>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li class="dropdown active">
                    <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop2" href="#" >CRUD<b class="caret"></b></a>
                    <ul aria-labelledby="drop2" role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="airlines" tabindex="-1" role="menuitem">Airlines</a></li>
                        <li class="divider" role="presentation"></li>
                        <li role="presentation"><a href="airports" tabindex="0" role="menuitem">Airports</a></li>
                        <li class="divider" role="presentation"></li>
                        <li role="presentation"><a href="flightplans" tabindex="1" role="menuitem">Flight Plan</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../components">Menu Three</a>
                </li>
                <li>
                    <a href="../javascript">Menu Four</a>
                </li>
                <li>
                    <a href="../customize">Menu Five</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{URL::to('logout') }}">Logout</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
