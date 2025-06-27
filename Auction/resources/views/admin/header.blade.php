<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/header.css') }}">
    <title>Аукцион</title>
</head>

<body>
    <header class="header">
        <div class="header__menu">
            <a href="index.php" class="header__link-logo">
                <div class="header__logo">
                    <img class="header__logo-image" src="../assets/images/logo.png" alt="Логотип">
                    <p class="header__title">Аукцион</p>
                </div>
            </a>
            <nav class="header__nav">

                <a href="faq-admin.php" class="header__link">Вопросы и ответы</a>
                <a href="auction-info-admin.php" class="header__link">Что такое аукцион?</a>
                <a href="login-admin.php" class="header__link">Вход</a>
            </nav>
        </div>
        <div class="header__banner">
            <img class="header__banner-image" src="../assets/images/banner.png" alt="Баннер">
        </div>
    </header>
</body>
<script src="../../js/script.js"></script>

</html>