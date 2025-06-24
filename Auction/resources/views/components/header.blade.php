 <link rel="stylesheet" href="{{ asset('css/header.css') }}">

 <div class="body">
     <header class="header">
         <div class="header__menu">
             <a href="{{ route('home') }}" class="header__link-logo">
                 <div class="header__logo">
                     <img class="header__logo-image" src='/images/design/logo.png' alt="Логотип">
                     <p class="header__title">Аукцион</p>
                 </div>
             </a>
             
             <nav class="header__nav">
                 <a href="faq.php" class="header__link">Вопросы и ответы</a>
                 <a href="auction-info.php" class="header__link">Что такое аукцион?</a>

                 @guest
                     <a href="{{ route('login') }}" class="header__link">Вход</a>
                     <a href="{{ route('register') }}" class="header__link">Регистрация</a>
                 @else
                     <a href="{{ route('profile') }}" class="header__link">Профиль</a>
                     <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                         @csrf
                         <button type="submit" class="header__link"
                             style="background:none; border:none; cursor:pointer; padding:0; font: inherit;">Выход</button>
                     </form>
                 @endguest
             </nav>
         </div>
         <div class="header__banner">
             <img class="header__banner-image" src='/images/design/banner.png' alt="Баннер">
         </div>
     </header>
 </div>

 <script src="{{ asset('js/script.js') }}"></script>
