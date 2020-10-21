<nav class="site-navigation navbar navbar-light navbar-expand-lg px-4 mb-5">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="/">Home</span></a>
            </li>
            <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                <a class="nav-link" href="/login">Login</a>
            </li>
            <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
                <a class="nav-link" href="/register">Registration</a>
            </li>
        </ul>
    </div>
</nav>
