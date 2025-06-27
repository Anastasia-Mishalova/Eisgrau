<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="{{ asset('css/admin/home-admin.css') }}">
</head>

<body>
     <x-header-admin />

    <div class="container">
        <div class="sidebar">
            <h2>Статистика сайта</h2>
            <p>Количество пользователей: 535</p>
            <p>Количество продавцов: 212</p>
            <p>Количество аукционов: 1834</p>
            <p>Количество жалоб: 124</p>
            <p>Количество банов: 78</p>

        </div>
        <div class="content">
            <div class="section">
                <div class="section__image-container">
                    <img src="../assets/images/product3.jp" alt="Баннер Продавцы">
                </div>
                <h3>Продавцы</h3>
                <p>Всего заявок <span>100</span></p>
                <p>Новых <span>2</span></p>
            </div>
            <div class="section">
                <div class="section__image-container">
                    <img src="../assets/images/product3.jp" alt="Баннер Аукционы">
                </div>
                <h3>Аукционы</h3>
                <p>Всего заявок <span>14</span></p>
                <p>Новых <span>4</span></p>
            </div>
            <div class="section">
                <div class="section__image-container">
                    <img src="../assets/images/product3.jp" alt="Баннер Жалобы">
                </div>
                <h3>Жалобы</h3>
                <p>Всего заявок <span>53</span></p>
                <p>Новых <span>15</span></p>
            </div>
            <div class="section">
                <div class="section__image-container">
                    <img src="../assets/images/product3.jp" alt="Баннер Баны">
                </div>
                <h3>Баны</h3>
                <p>Всего заявок <span>158</span></p>
                <p>Новых <span>1</span></p>
            </div>
            <div class="section">
                <div class="section__image-container">
                    <img src="../assets/images/product3.jp" alt="Баннер Настройки сайта">
                </div>
                <h3>Настройки и редактирование</h3>
            </div>
            <div class="section">
                <div class="section__image-container">
                    <img src="../assets/images/product3.jp" alt="Баннер Руководители">
                </div>
                <h3>Руководители</h3>
            </div>

        </div>
    </div>

    <x-footer-admin />
    <script src="../js/script.js"></script>
</body>

</html>