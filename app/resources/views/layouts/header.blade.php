<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Форма для отправки сообщения</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">

@role('root')
    <nav class="py-1 bg-body-tertiary border-bottom border-dark">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item"><a class="nav-link link-body-emphasis px-2 active" aria-current="page"><ya-tr-span data-index="13-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Home" data-translation="Главная" data-ch="0" data-type="trSpan">Админ панель -></ya-tr-span></a></li>
            </ul>
            <ul class="nav">
                <li class="nav-item"><a href="{{ route('form_admin_email') }}" class="nav-link link-body-emphasis px-2"><ya-tr-span data-index="18-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Login" data-translation="Вход" data-ch="0" data-type="trSpan">Изменить почту</ya-tr-span></a></li>
                <li class="nav-item"><a href="{{ route('list_messages') }}" class="nav-link link-body-emphasis px-2"><ya-tr-span data-index="19-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Sign up" data-translation="Регистрация" data-ch="0" data-type="trSpan" data-selected="false">Список сообщений</ya-tr-span></a></li>
            </ul>
        </div>
    </nav>
@endrole

    <header class="py-3 mb-4 border-bottom border-dark">
        <div class="container d-flex flex-wrap justify-content-center">
            <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-4"><ya-tr-span data-index="20-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Double header" data-translation="Двойной заголовок" data-ch="0" data-type="trSpan"><span class="text-dark">MessageTo</span><span class="text-warning">TheAdmin</span></ya-tr-span></span>
            </a>
            @guest
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="btn btn-outline-dark me-2"><ya-tr-span data-index="24-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Login" data-translation="Вход" data-ch="1" data-type="trSpan">Вход</ya-tr-span></a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-warning"><ya-tr-span data-index="24-1" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Sign-up" data-translation="Регистрация" data-ch="1" data-type="trSpan" data-selected="false">Регистрация</ya-tr-span></a>
                @endif
            @else
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-warning">Выход</button>
                </form>
            @endguest
        </div>
    </header>



