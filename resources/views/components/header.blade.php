<header class="p-3 text-bg-dark">

    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <h1 class="pe-3">VideoHost</h1>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            @auth
                <li><a href="{{route('profile')}}" class="nav-link px-2 text-white">Мои видеоролики</a></li>
            @endauth
        </ul>

        <div class="text-end">
            @guest
                <a href="{{ route('signin') }}" class="btn btn-outline-light me-2">Вход</a>
                <a href="{{ route('signup') }}" class="btn btn-success">Регистрация</a>
            @endguest
            @auth
                <a href="{{ Route('exit') }}" class="btn btn-danger">Выход</a>
            @endauth
        </div>
    </div>

</header>
