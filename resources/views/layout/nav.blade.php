<style>
    nav {
        text-align: center;
    }
    nav > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }
</style>

<nav>
    <a href="/">Home</a>
    <a href="/welcomeUser">welcome</a>
    <a href="/auth">Авторизация</a>
    <a href="/news">News</a>
    <a href="/feedback">Feedback</a>
        @guest
                <a class="nav-link" href="{{ route('social::loginVk') }}">LoginVK</a>
                <a class="nav-link" href="{{ route('social::loginFb') }}">LoginFB</a>
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @else
            @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                <a href="/admin/news">Админка новостей</a>
                <a href="/admin/users">Админка пользователей</a>
            @endif
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
        @endguest
    <hr>
</nav>
