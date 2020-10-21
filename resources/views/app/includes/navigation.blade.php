<nav class="navbar navbar-light navbar-expand-lg px-4 mb-5">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @if(Request::is('profile/' . Auth::id()))
                <li class="nav-item active">
                    <a class="nav-link" href="/dashboard">My profile</span></a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">My profile</span></a>
                </li>
            @endif
            <li class="nav-item">
                <a href="{{ route('logout') }}"
                    class="nav-link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Log out
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</nav>
