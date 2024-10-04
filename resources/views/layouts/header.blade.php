<nav class="navbar navbar-expand bg-body-tertiary text-white" data-bs-theme="dark">
    <div class="container">
        <a href="/" class="nav-brand nav-link ">
            {{ config('app.name') }}
        </a>
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/" aria-current="page">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cursusen.index') }}">Cursussen</a>
            </li>
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Signup</a>
                </li>
            @endguest
            {{-- {{Auth::loginusingid(1)}} --}}
            @auth
                <li class="nav-item dropdown">

                    <button class="nav-link dropdown-toggle" type="button"
                        data-bs-toggle="dropdown">{{ Auth::user()->name }}</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a></li>
                    </ul>

                </li>
            @endauth
        </ul>
    </div>
</nav>
