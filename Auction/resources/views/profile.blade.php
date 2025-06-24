<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль пользователя</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>

<body>
    <x-header />

    <div class="container">
        <nav class="sidebar">
            <h2>Навигация</h2>
            <ul>
                <li><a href="#general-info">Общая информация</a></li>
                <li><a href="#won-auctions">Выигранные аукционы</a></li>
                <li><a href="#bids">Сделанные ставки</a></li>
                <li><a href="#complaints">Жалобы</a></li>
                <li><a href="#change-password">Смена пароля</a></li>
            </ul>
        </nav>

        <main class="content">
            <section id="general-info" class="section">
                <h2>Общая информация</h2>
                <div class="user-info">
                    <img src="../assets/images/product2.jpg" alt="Аватар" class="avatar">
                    <div class="info">
                        <h3>Имя Фамилия</h3>
                        <p>Рейтинг: 4.5</p>
                        <p>О себе: Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate animi tempora commodi rerum quas. Itaque reprehenderit debitis veritatis iste quod maxime minima non! Laborum ex, sapiente quisquam, placeat repellat earum ducimus est minus ea dolorem, dolore id commodi. Maiores sint in illo. Sint ex praesentium, doloribus ipsa odit alias veritatis.</p>
                        <p>Город: Москва</p>
                        <p>Страна: Россия</p>
                        <p>Дата рождения: 01.01.1990</p>
                        <p>Созданные аукционы: 10</p>
                        <p>Выигранные аукционы: 5</p>
                        <p>Дата регистрации: 01.01.2020</p>
                    </div>
                </div>
            </section>

            <div class="two-columns">
                <section id="won-auctions" class="section">
                    <h2>Выигранные аукционы</h2>
                    <ul class="list">
                        <li onclick="openAuctionPage('product.php')" class="li">Аукцион 1 <span class="price">1000 ₽</span>
                            <p class="seller-email">Почта для связи с продавцом: Test@gmail.com</p>
                        </li>
                        <li onclick="openAuctionPage('product.php')" class="li">Аукцион 2 <span class="price">1500 ₽</span>
                            <p class="seller-email">Почта для связи с продавцом: Test@gmail.com</p>
                        </li>
                    </ul>
                </section>

                <section id="bids" class="section">
                    <h2>Сделанные ставки</h2>
                    <ul class="list">
                        <li onclick="openAuctionPage('product.php')" class="li">Аукцион 1 <span class="price">900 ₽</span></li>
                        <li onclick="openAuctionPage('product.php')" class="li">Аукцион 2 <span class="price">1300 ₽</span></li>
                    </ul>
                </section>
            </div>

            <section id="complaints" class="section">
                <h2>Жалобы</h2>
                <ul class="list">
                    <li onclick="openComplaintPopup('Продавец не отправил лот', 'Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 ', 'status')" class="li">Продавец не отправил лот <span class="status">Одобрено</span></li>
                    <li onclick="openComplaintPopup('Угрозы от пользователя', 'Описание жалобы 2', 'status')" class="li">Угрозы от пользователя <span class="status">В процессе</span></li>
                    <li onclick="openComplaintPopup('Продавец отправил лот не надлежащего качества', 'Описание жалобы 3', 'status')" class="li">Продавец отправил лот не надлежащего качества <span class="status">Отклонено</span></li>
                    <li onclick="openComplaintPopup('Поддельный сертификат подлинности', 'Описание жалобы 4', 'status')" class="li">Поддельный сертификат подлинности <span class="status">Отклонено</span></li>
                    <li onclick="openComplaintPopup('Поддельный сертификат подлинности', 'Описание жалобы 5', 'status')" class="li">Поддельный сертификат подлинности <span class="status">Отклонено</span></li>
                </ul>
            </section>

            <div id="change-password" class="section">
                <h2>Смена пароля</h2>
                <form id="changePasswordForm">
                    <div class="form-group">
                        <label for="currentPassword">Текущий пароль:</label>
                        <input type="password" id="currentPassword" name="currentPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">Новый пароль:</label>
                        <input type="password" id="newPassword" name="newPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Подтверждение нового пароля:</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" required>
                    </div>
                    <button type="submit">Сменить пароль</button>
                </form>
            </div>
        </main>
    </div>

    <div id="complaint-popup" class="popup">
        <div class="popup-content">
            <div class="popup-header">
                <h3 id="popup-title"></h3>
                <div class="close" onclick="closePopup()">&times;</div>
            </div>
            <p id="popup-description"></p>
            <div id="popup-images"></div>
            <textarea class="admin-сomment" placeholder="Комментарий администратора" readonly></textarea>
        </div>
    </div>

    <x-footer />
    <script src="../js/script.js"></script>
    <script>
        
    </script>
</body>

</html>