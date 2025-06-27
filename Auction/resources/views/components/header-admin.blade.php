<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/header-admin.css') }}">
    <title>Аукцион</title>
</head>

<div class="body">
    <header class="header">
        <div class="header__menu">
            <a href="{{ Auth::guard('admin')->check() ? route('admin.home') : route('admin.login') }}"
                class="header__link-logo">
                <div class="header__logo">
                    <img class="header__logo-image" src='/images/design/logo.png' alt="Логотип">
                    <p class="header__title">Аукцион</p>
                </div>
            </a>
            <nav class="header__nav">
                @if (Auth::guard('admin')->check())
                    <a href="{{ route('admin.faq') }}" class="header__link">Вопросы и ответы</a>
                    <a href="{{ route('admin.info') }}" class="header__link">Что такое аукцион?</a>
                    <form method="POST" action="{{ route('admin.logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="header__link"
                            style="background:none; border:none; cursor:pointer; padding:0; font: inherit;">Выход</button>
                    </form>
                @else
                    <a href="{{ route('admin.login') }}" class="header__link">Вход</a>
                @endif
            </nav>
        </div>
        <div class="header__banner">
            <img class="header__banner-image" src='/images/design/banner.png' alt="Баннер">
        </div>
    </header>
    </body>
    <script src="../../js/script.js"></script>

</html>
