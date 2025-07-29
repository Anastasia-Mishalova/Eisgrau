<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="{{ asset('css/admin/home-admin.css') }}">
</head>

<div id="modal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" id="modalClose">&times;</span>
        <div id="modalBody">
        </div>
    </div>
</div>

<body>
    <x-header-admin />

    <div class="container">
        <div class="sidebar">
            <h2>Статистика сайта</h2>
            <p>Количество пользователей: {{ $usersCount }}</p>
            <p>Количество продавцов: {{ $sellersCount }}</p>
            <p>Количество аукционов: {{ $lotsCount }}</p>
            <p>Количество жалоб: {{$complaintsCount}}</p>
            <p>Количество банов: {{ $bansCount }}</p>
        </div>

        <div class="content">
            {{-- Продавцы --}}
            <div class="section" onclick="openPopup('sellersPopup')">
                <div class="section__image-container">
                    <img src="/images/design/sellers.png" alt="Баннер Продавцы">
                </div>
                <h3>Продавцы</h3>
                <p>Всего продавцов: <span>{{ $sellersCount }}</span></p>
            </div>
            <div id="sellersPopup" class="popup-overlay" style="display: none;">
                <div class="popup">
                    <button class="close-btn" onclick="closePopup('sellersPopup')">&times;</button>
                    <h2>Список продавцов</h2>

                    <input type="text" id="search-input-sellers" class="search-input"
                        placeholder="Поиск продавцов...">


                    <table>
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Имя</th>
                                <th>Фамилия</th>
                                <th>Email</th>
                                <th>Гражданство</th>
                                <th>Пол</th>
                                <th>Паспорт</th>
                                <th>Кем выдан</th>
                                <th>Фото паспорта</th>
                            </tr>
                        </thead>
                        <tbody id="sellers-table-body">
                            @foreach ($sellers as $index => $seller)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $seller->user->first_name }}</td>
                                    <td>{{ $seller->user->last_name }}</td>
                                    <td>{{ $seller->user->email }}</td>
                                    <td>{{ $seller->citizenship }}</td>
                                    <td>{{ $seller->gender === 'male' ? 'Муж.' : 'Жен.' }}</td>
                                    <td>{{ $seller->passport_number }}</td>
                                    <td>{{ $seller->passport_issued_by }}</td>
                                    <td>
                                        <a href="{{ asset('storage/' . $seller->passport_photo_url) }}"
                                            target="_blank">
                                            Открыть фото
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Пользователи --}}
            <div class="section" onclick="openPopup('usersPopup')">
                <div class="section__image-container">
                    <img src="/images/design/users.png" alt="Баннер Пользователи">
                </div>
                <h3>Пользователи</h3>
                <p>Всего пользователей: <span>{{ $usersCount }}</span></p>
            </div>
            <div id="usersPopup" class="popup-overlay" style="display: none;">
                <div class="popup">
                    <button class="close-btn" onclick="closePopup('usersPopup')">&times;</button>
                    <h2>Список пользователей</h2>

                    <input type="text" id="search-input-users" class="search-input"
                        placeholder="Поиск пользователей...">

                    <table>
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Имя</th>
                                <th>Фамилия</th>
                                <th>Email</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody id="users-table-body">
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->is_baned)
                                            <form method="POST" action="{{ route('admin.users.unban', $user->id) }}"
                                                class="form-ban">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="button form-input"
                                                    onclick="return confirm('Разбанить пользователя?')">
                                                    Разбанить
                                                </button>
                                            </form>
                                        @else
                                            <form method="POST" action="{{ route('admin.users.ban', $user->id) }}"
                                                class="form-ban">
                                                @csrf
                                                <label class="form-input">Причина:</label>
                                                <input type="text" name="ban_reason" class="input form-input"
                                                    required>
                                                <button type="submit" class="button form-input"
                                                    onclick="return confirm('Забанить пользователя?')">
                                                    Забанить
                                                </button>
                                            </form>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Аукционы --}}
            <div class="section" onclick="openPopup('auctionsPopup')">
                <div class="section__image-container">
                    <img src="/images/design/auctions.png" alt="Баннер Аукционы">
                </div>
                <h3>Аукционы</h3>
                <p>Всего аукционов: <span>{{ $lotsCount }}</span></p>
            </div>
            <div id="auctionsPopup" class="popup-overlay" style="display: none;">
                <div class="popup">
                    <button class="close-btn" onclick="closePopup('auctionsPopup')">&times;</button>
                    <h2>Список аукционов</h2>

                    <input type="text" class="search-input" id="search-input-lots" placeholder="Поиск лотов...">

                    <table>
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Название</th>
                                <th>Продавец</th>
                                <th>Дата окончания</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody id="lots-table-body">
                            @foreach ($lots as $index => $lot)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $lot->title }}</td>
                                    <td> {{ $lot->seller->user->first_name }} {{ $lot->seller->user->last_name }}</td>
                                    <td>{{ $lot->auction_end }}</td>
                                    <td>
                                        <a href="{{ route('lots.show', $lot->id) }}" target="_blank">Просмотр</a>
                                        <form method="POST" action="{{ route('admin.lots.destroy', $lot->id) }}"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="button  form-input"
                                                onclick="return confirm('Удалить аукцион?')">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Жалобы --}}
            <div class="section" onclick="openPopup('complaintsPopup')">
                <div class="section__image-container">
                    <img src="/images/design/reports.png" alt="Баннер Жалобы">
                </div>
                <h3>Жалобы</h3>
                <p>Всего заявок: <span>{{ $complaintsCount }}</span></p>
            </div>

            <div id="complaintsPopup" class="popup-overlay" style="display: none;">
                <div class="popup" style="max-width: 1000px;">
                    <button class="close-btn" onclick="closePopup('complaintsPopup')">&times;</button>
                    <h2>Список жалоб</h2>

                    <table>
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>От кого</th>
                                <th>На кого</th>
                                <th>Причина</th>
                                <th>Фото</th>
                                <th>Статус</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($complaints as $index => $complaint)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $complaint->reporter->name ?? 'Jane Doe' }}</td>
                                    <td>{{ $complaint->reportedUser->name ?? 'John Doe' }}</td>
                                    <td>{{ Str::limit($complaint->complaint_descr, 50) }}</td>
                                    <td>
                                        @if ($complaint->evidence_photo_url)
                                            <a href="{{ asset($complaint->evidence_photo_url) }}"
                                                target="_blank">Фото</a>
                                        @else
                                            –
                                        @endif
                                    </td>
                                    <td>{{ ucfirst($complaint->status) }}</td>
                                    <td style="white-space: nowrap;">
                                        @if ($complaint->status !== 'confirmed')
                                            <form method="POST"
                                                action="{{ route('admin.complaints.updateStatus', $complaint->id) }}"
                                                style="display:inline;">
                                                @csrf
                                                <input type="hidden" name="status" value="approved">
                                                <button type="submit" onclick="return confirm('Подтвердить жалобу?')"
                                                    class="button">Одобрено</button>
                                            </form>
                                        @endif

                                        @if ($complaint->status !== 'rejected')
                                            <form method="POST"
                                                action="{{ route('admin.complaints.updateStatus', $complaint->id) }}"
                                                style="display:inline; margin-left:5px;">
                                                @csrf
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit" onclick="return confirm('Отклонить жалобу?')"
                                                    class="button button--danger">Отклонено</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">Жалоб нет</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>



            {{-- Редактирование баннера --}}
            {{-- <div class="section">
                <div class="section__image-container">
                    <img src="../assets/images/product3.jp" alt="Баннер Настройки сайта">
                </div>
                <h3>Настройки и редактирование</h3>
            </div> --}}

            {{-- Администраторы --}}
            <div class="section" onclick="openPopup('adminsPopup')">
                <div class="section__image-container">
                    <img src="/images/design/admins.png" alt="Баннер Администраторы">
                </div>
                <h3>Администраторы</h3>
                <p>Всего администраторов: <span>{{ $admins->count() }}</span></p>
            </div>

            <div id="adminsPopup" class="popup-overlay" style="display: none;">
                <div class="popup">
                    <button class="close-btn" onclick="closePopup('adminsPopup')">&times;</button>
                    <h2>Список администраторов</h2>

                    <table>
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Имя</th>
                                <th>Фамилия</th>
                                <th>Email</th>
                                <th>Роль</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $index => $admin)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $admin->first_name }}</td>
                                    <td>{{ $admin->last_name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->role ?? '—' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-footer-admin />

    <script>
        function openPopup(id) {
            document.getElementById(id).style.display = 'flex';
        }

        function closePopup(id) {
            document.getElementById(id).style.display = 'none';
        }

        document.addEventListener('DOMContentLoaded', function() {
            function search(query, type) {
                fetch(`/admin/search?query=${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(data => {
                        if (type === 'users') {
                            const tbody = document.getElementById('users-table-body');
                            tbody.innerHTML = '';

                            data.users.forEach((user, index) => {
                                tbody.innerHTML += `
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${user.first_name}</td>
                                    <td>${user.last_name}</td>
                                    <td>${user.email}</td>
                                    <td>
                                        ${user.is_baned ? `
                                                                        <form method="POST" action="/admin/users/${user.id}/unban">
                                                                            <input type="hidden" name="_token" value="${data.csrf}">
                                                                            <input type="hidden" name="_method" value="PATCH">
                                                                            <button type="submit" onclick="return confirm('Разбанить пользователя?')">Разбанить</button>
                                                                        </form>` : `
                                                                        <form method="POST" action="/admin/users/${user.id}/ban">
                                                                            <input type="hidden" name="_token" value="${data.csrf}">
                                                                            <label>Причина:</label>
                                                                            <input type="text" name="ban_reason" required>
                                                                            <button type="submit" onclick="return confirm('Забанить пользователя?')">Забанить</button>
                                                                        </form>`}
                                    </td>
                                </tr>`;
                            });

                            if (data.users.length === 0) {
                                tbody.innerHTML = '<tr><td colspan="5">Ничего не найдено</td></tr>';
                            }
                        }

                        if (type === 'sellers') {
                            const tbody = document.getElementById('sellers-table-body');
                            tbody.innerHTML = '';

                            data.sellers.forEach((seller, index) => {
                                tbody.innerHTML += `
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${seller.user.first_name}</td>
                                    <td>${seller.user.last_name}</td>
                                    <td>${seller.user.email}</td>
                                    <td>${seller.citizenship}</td>
                                    <td>${seller.gender === 'male' ? 'Муж.' : 'Жен.'}</td>
                                    <td>${seller.passport_number}</td>
                                    <td>${seller.passport_issued_by}</td>
                                    <td><a href="/storage/${seller.passport_photo_url}" target="_blank">Открыть фото</a></td>
                                </tr>`;
                            });

                            if (data.sellers.length === 0) {
                                tbody.innerHTML = '<tr><td colspan="9">Ничего не найдено</td></tr>';
                            }
                        }

                        if (type === 'lots') {
                            const tbody = document.getElementById('lots-table-body');
                            tbody.innerHTML = '';

                            data.lots.forEach((lot, index) => {
                                const seller = lot.seller?.user;
                                tbody.innerHTML += `
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${lot.title}</td>
                                    <td>${seller ? seller.first_name + ' ' + seller.last_name : '---'}</td>
                                    <td>${lot.auction_end}</td>
                                    <td>
                                        <a href="/lots/${lot.id}" target="_blank">Просмотр</a> |
                                        <form method="POST" action="/admin/lots/${lot.id}" style="display:inline;">
                                            <input type="hidden" name="_token" value="${data.csrf}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" onclick="return confirm('Удалить аукцион?')">Удалить</button>
                                        </form>
                                    </td>
                                </tr>`;
                            });

                            if (data.lots.length === 0) {
                                tbody.innerHTML = '<tr><td colspan="5">Ничего не найдено</td></tr>';
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Ошибка поиска:', error);
                    });
            }

            document.getElementById('search-input-users')?.addEventListener('input', function() {
                search(this.value, 'users');
            });

            document.getElementById('search-input-sellers')?.addEventListener('input', function() {
                search(this.value, 'sellers');
            });

            document.getElementById('search-input-lots')?.addEventListener('input', function() {
                search(this.value, 'lots');
            });
        });














        function openPopup(id) {
            document.getElementById(id).style.display = 'flex';
        }

        function closePopup(id) {
            document.getElementById(id).style.display = 'none';
        }
    </script>
</body>

</html>
