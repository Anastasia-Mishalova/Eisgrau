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
                {{-- <li><a href="#complaints">Жалобы</a></li> --}}
                <li><a href="#change-password">Смена пароля</a></li>
            </ul>
        </nav>

        <main class="content">
            <section id="general-info" class="section">
                <h2>Общая информация</h2>
                <div class="user-info">
                    <div class="user-summary">
                        @php
                            use Illuminate\Support\Facades\Storage;
                            $avatarExists = $user->avatar_url && Storage::disk('public')->exists($user->avatar_url);
                        @endphp

                        @if ($avatarExists)
                            <img class="avatar" src="{{ asset('storage/' . $user->avatar_url) }}"
                                alt="Аватар пользователя" />
                        @else
                            <img class="avatar" src="{{ asset('images/design/base-avatar.jpg') }}"
                                alt="Аватар по умолчанию" />
                        @endif

                        <div class="user-summary-text">
                            <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
                        </div>
                    </div>

                    <div class="user-details">

                        <p>О себе: {{ $user->bio ?? '—' }} </p>
                        <p>Город: {{ $user->city ?? '—' }}</p>
                        <p>Дата рождения: {{ $user->birth_date ?? '—' }}</p>
                        <p>Дата регистрации: {{ $user->created_at->format('d.m.Y') }}</p>
                    </div>
                </div>

                <button class="edit-profile-btn" onclick="openEditPopup()">Редактировать профиль</button>
            </section>

            <div class="two-columns">
                <section id="won-auctions" class="section">
                    <h2>Выигранные аукционы</h2>
                    <ul class="list">
                        <p>Вы пока не выиграли ни один аукцион.</p>
                        {{-- <li onclick="openAuctionPage('product.php')" class="li">Шлем офицера РИ 15 век <span class="price">25000
                               $</span>
                            <p class="seller-email">Почта для связи с продавцом: Leon@gmail.com</p>
                        </li> --}}
                    </ul>
                </section>

                <section id="bids" class="section">
                    <h2>Сделанные ставки</h2>

                    @if ($bids->isEmpty())
                        <p>Вы пока не делали ставок.</p>
                    @else
                        <ul class="list">
                            @foreach ($bids as $bid)
                                <li class="li" style="cursor:pointer;">
                                    <a href="{{ route('lot.show', $bid->lot->id) }}" target="_blank"
                                        style="text-decoration: none; color: inherit;">
                                        {{ $bid->lot->title }}
                                        <span class="price">{{ number_format($bid->bid_amount, 0, '', ' ') }} $</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </section>
            </div>

            {{-- <section id="complaints" class="section">
                <h2>Жалобы</h2>
                <ul class="list">
                    <li onclick="openComplaintPopup('Продавец не отправил лот', 'Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 Описание жалобы 1 ', 'status')"
                        class="li">Продавец не отправил лот <span class="status">Одобрено</span></li>
                    <li onclick="openComplaintPopup('Угрозы от пользователя', 'Описание жалобы 2', 'status')"
                        class="li">Угрозы от пользователя <span class="status">В процессе</span></li>
                    <li onclick="openComplaintPopup('Продавец отправил лот не надлежащего качества', 'Описание жалобы 3', 'status')"
                        class="li">Продавец отправил лот не надлежащего качества <span
                            class="status">Отклонено</span></li>
                    <li onclick="openComplaintPopup('Поддельный сертификат подлинности', 'Описание жалобы 4', 'status')"
                        class="li">Поддельный сертификат подлинности <span class="status">Отклонено</span></li>
                    <li onclick="openComplaintPopup('Поддельный сертификат подлинности', 'Описание жалобы 5', 'status')"
                        class="li">Поддельный сертификат подлинности <span class="status">Отклонено</span></li>
                </ul>
            </section> --}}

            @if ($user->seller)
                <section id="seller-auctions" class="section">
                    <a href="{{ route('lots.create') }}" class="btn btn-primary">
                        <button>Создать лот</button>
                    </a>

                    <h2>Ваши аукционы</h2>
                    @if ($userLots->isEmpty())
                        <p>У тебя пока нет лотов</p>
                    @else
                        <ul class="list">
                            @foreach ($userLots as $lot)
                                <li class="li" style="cursor:pointer;">
                                    <a href="{{ route('lot.show', $lot->id) }}" target="_blank"
                                        style="text-decoration: none; color: inherit;">
                                        {{ $lot->title }}
                                        <span class="price">{{ number_format($lot->current_price, 0, '', ' ') }}
                                            $</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </section>
            @else
                <section id="become-seller" class="section">
                    <h2>Стать продавцом</h2>
                    <a href="{{ route('seller.create') }}" class="btn btn-primary">
                        <button class="button"> Стать продавцом</button>
                       </a>
                </section>
            @endif


            <div id="change-password" class="section">
                @if (session('success'))
                    <p style="color: green;">{{ session('success') }}</p>
                @endif

                <h2>Смена пароля</h2>
                <form id="changePasswordForm" method="POST" action="{{ route('profile.password.update') }}">
                    @csrf
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
                        <input type="password" id="confirmPassword" name="newPassword_confirmation" required>
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

    {{-- поп-ап для редактирования профиля --}}
    <div id="edit-profile-popup" class="popup" style="display: none;">
        <div class="popup-content">
            <div class="popup-header">
                <h3>Редактировать профиль</h3>
                <div class="close" onclick="closeEditPopup()">&times;</div>
            </div>

            <form method="POST" action="{{ route('profile-update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Имя</label>
                    <input type="text" name="first_name" value="{{ $user->first_name }}" required>
                </div>

                <div class="form-group">
                    <label>Фамилия</label>
                    <input type="text" name="last_name" value="{{ $user->last_name }}" required>
                </div>

                <div class="form-group">
                    <label>О себе</label>
                    <textarea name="bio">{{ $user->bio }}</textarea>
                </div>

                <div class="form-group">
                    <label>Город</label>
                    <input type="text" name="city" value="{{ $user->city }}">
                </div>

                <div class="form-group">
                    <label>Дата рождения</label>
                    <input type="date" name="birth_date" value="{{ $user->birth_date }}">
                </div>

                <div class="form-group">
                    <label>Аватар</label>
                    <input type="file" name="avatar">
                </div>

                <button type="submit">Сохранить</button>
            </form>
        </div>
    </div>


    <script src="../js/script.js"></script>
    <script>
        function openEditPopup() {
            document.getElementById('edit-profile-popup').style.display = 'block';
        }

        function closeEditPopup() {
            document.getElementById('edit-profile-popup').style.display = 'none';
        }
    </script>

</body>

</html>
