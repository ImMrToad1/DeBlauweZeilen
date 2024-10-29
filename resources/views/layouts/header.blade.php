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
            {{-- This only shows when you are not logged in (guest) --}}
                <li class="nav-item">
                    {{-- Goes to login page --}}
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    {{-- Goes to register page --}}
                    <a class="nav-link" href="{{ route('register')}}">Signup</a>
                </li>
            @endguest
            {{-- {{Auth::loginusingid(1)}} --}}
            @auth
            {{-- This only shows when you are logged in (authenticated) --}}
                <li class="nav-item dropdown">

                        <button class="nav-link dropdown-toggle" type="button"
                            data-bs-toggle="dropdown">{{ Auth::user()->name }}</button>
                        <ul class="dropdown-menu">
                            {{-- This goes to the profile page --}}
                            <li><a class="dropdown-item" href="{{ route('profile')}}">Profile</a></li>
                            {{-- Logout button --}}
                            <li><a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a></li>
                        </ul>
                </li>
            @endauth
        </ul>
    </div>
</nav>
