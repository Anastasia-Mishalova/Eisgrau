<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">
    <title>Аукцион</title>
</head>

</body>
<x-header />
{{-- <x-categories /> --}}
<div class="body">
    <div class="categories">
        <a href="#" class="category" onclick="showFilters('weapons')">Оружие</a>
        <a href="#" class="category" onclick="showFilters('armors')">Доспехи</a>
        <a href="#" class="category" onclick="showFilters('religion')">Религия</a>
        <a href="#" class="category" onclick="showFilters('books')">Манускрипты и книги</a>
    </div>

    <div class="line"></div>
</div>

<main class="products">
    <div class="search">
        <form action="{{ route('home') }}" method="GET" class="search-container">
            <input type="text" class="search-input"name="req" placeholder="Введите текст для поиска..."
                value="{{ request('req') }}">
            <button type="submit" class="search-button">Поиск</button>
        </form>

    </div>

    <form class="filters-form" action="{{ route('home') }}" method="GET">
        <section class="filters" id="filters">
            <p class="filters__title">Фильтры</p>

            <fieldset id="weapons-filters" class="filters-group filters__hidden-group checkbox-container"
                style="display: none;">
                <legend>Типы оружия</legend>
                <label class="checkbox-container">
                    <input type="checkbox" name="weapon_types[]" value="1" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Мечи</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="weapon_types[]" value="2" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Кинжалы</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="weapon_types[]" value="3" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Топоры</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="weapon_types[]" value="4" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Луки</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="weapon_types[]" value="5" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Арбалеты</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="weapon_types[]" value="6" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Древковое</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="weapon_types[]" value="7" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Метательное</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="weapon_types[]" value="8" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Огнестрельное</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="weapon_types[]" value="9" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Осадное</p>
                </label>
            </fieldset>

            <fieldset id="armors-filters" class="filters-group filters__hidden-group checkbox-container"
                style="display: none;">
                <legend>Типы доспехов</legend>
                <label class="checkbox-container">
                    <input type="checkbox" name="armor_types[]" value="10" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Латные</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="armor_types[]" value="11" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Кольчужные</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="armor_types[]" value="12" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Кожаные</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="armor_types[]" value="13" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Тканевые</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="armor_types[]" value="14" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Зерцала</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="armor_types[]" value="15" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Бригантина</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="armor_types[]" value="16" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Шлемы</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="armor_types[]" value="17" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Шапки и платки</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="armor_types[]" value="18" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Торс</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="armor_types[]" value="19" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Руки</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="armor_types[]" value="20" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Ноги</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="armor_types[]" value="21" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Полный комплект</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="armor_types[]" value="22" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Частичный комплект</p>
                </label>
            </fieldset>

            <fieldset id="religion-filters" class="filters-group filters__hidden-group checkbox-container"
                style="display: none;">
                <legend>Типы религиозных предметов</legend>
                <label class="checkbox-container">
                    <input type="checkbox" name="religion_types[]" value="23" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Церемониальные предметы</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="religion_types[]" value="24" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Утварь</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="religion_types[]" value="25" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Одежда</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="religion_types[]" value="26" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Украшения</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="religion_types[]" value="27" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Книги и рукописи</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="religion_types[]" value="28" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Изображения и иконы</p>
                </label>
            </fieldset>

            <fieldset id="books-filters" class="filters-group filters__hidden-group checkbox-container"
                style="display: none;">
                <legend>Типы книг</legend>
                <label class="checkbox-container">
                    <input type="checkbox" name="books_types[]" value="29" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Печатные книги</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="books_types[]" value="30" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Рукописи</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="books_types[]" value="31" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Манускрипты</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="books_types[]" value="32" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Письма</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="books_types[]" value="33" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Индульценции</p>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" name="books_types[]" value="34" class="custom-checkbox">
                    <span class="checkmark"></span>
                    <p class="checkmark-text">Хартии</p>
                </label>
            </fieldset>


            <fieldset class="filters-group filters__checkbox-group checkbox-container">
                <legend>Дата завершения</legend>
                <label class="checkbox-container">
                    <input type="radio" name="auction_start_order" value="new"
                        {{ request('auction_start_order') == 'new' ? 'checked' : '' }}>
                    Новое
                </label>
                <label class="checkbox-container">
                    <input type="radio" name="auction_start_order" value="old"
                        {{ request('auction_start_order') == 'old' ? 'checked' : '' }}>
                    Старое
                </label>
            </fieldset>

            <fieldset class="filters-group filters__checkbox-group checkbox-container">
                <legend>Цена</legend>
                <label class="checkbox-container">
                    <input type="radio" name="price_order" value="asc"
                        {{ request('price_order') == 'asc' ? 'checked' : '' }}>
                    Дешевле
                </label>
                <label class="checkbox-container">
                    <input type="radio" name="price_order" value="desc"
                        {{ request('price_order') == 'desc' ? 'checked' : '' }}>
                    Дороже
                </label>
            </fieldset>

            <button type="submit" class="filters__apply-button">Применить фильтры</button>
        </section>
    </form>


    <!-- Карточки -->
    <div class="cards">

        @foreach ($lots as $lot)
            <div class="card" data-categories="{{ $lot->categories->pluck('id')->implode(',') }}"
                data-filters="{{ $lot->filters->pluck('id')->implode(',') }}"
                data-options="{{ $lot->filterOptions->pluck('id')->implode(',') }}"
                data-auction-start="{{ \Carbon\Carbon::parse($lot->auction_start)->timestamp }}">
                <a href="{{ route('lots.show', $lot->id) }}" target="_blank">
                    <div class="card__top">
                        <div class="card__image-container">
                            <img class="card__image" src="{{ asset($lot->photo_url) }}" alt="Фото лота">
                        </div>
                    </div>
                    <div class="card__bottom">
                        <h3 class="card__title" title="{{ $lot->title }}">{{ $lot->title }}</h3>
                        <p class="card__price">Цена: {{ $lot->current_price }} $</p>

                        @if ($lot->time_left->days == 0 && $lot->time_left->h > 0)
                            <p class="card__add">До конца: {{ $lot->time_left->h }} ч.</p>
                        @elseif ($lot->time_left->days == 0 && $lot->time_left->h == 0)
                            <p class="card__add">До конца: < 1 ч.</p>
                                @else
                                    <p class="card__add">До конца: {{ $lot->time_left->days }} д.
                                        {{ $lot->time_left->h }} ч. </p>
                        @endif
                    </div>
                </a>
            </div>
        @endforeach
    </div>

</main>

<x-footer />
</body>

<script src="{{ asset('js/script.js') }}"></script>
<script>
    document.querySelector('.filters__apply-button').addEventListener('click', function(e) {
        e.preventDefault();

        const selectedFilters = Array.from(document.querySelectorAll('.filters input[type="checkbox"]:checked'))
            .map(input => input.value.trim());

        console.log('Выбранные фильтры:', selectedFilters);

        const auctionStartOrder = document.querySelector('input[name="auction_start_order"]:checked')?.value ||
            null;

        const priceOrder = document.querySelector('input[name="price_order"]:checked')?.value || null;

        const cards = Array.from(document.querySelectorAll('.card'));

        let filteredCards = cards.filter(card => {
            const cardFilters = card.dataset.filters ? card.dataset.filters.split(',').map(s => s
                .trim()) : [];
            const cardOptions = card.dataset.options ? card.dataset.options.split(',').map(s => s
                .trim()) : [];

            return selectedFilters.every(filterId =>
                cardFilters.includes(filterId) || cardOptions.includes(filterId)
            );
        });

        if (auctionStartOrder) {
            filteredCards.sort((a, b) => {
                const dateA = new Date(a.dataset.auctionStart);
                const dateB = new Date(b.dataset.auctionStart);

                return auctionStartOrder === 'new' ? dateB - dateA : dateA - dateB;
            });
        }

        if (priceOrder) {
            filteredCards.sort((a, b) => {
                const priceA = parseFloat(a.querySelector('.card__price').textContent.replace(/[^\d.]/g,
                    ''));
                const priceB = parseFloat(b.querySelector('.card__price').textContent.replace(/[^\d.]/g,
                    ''));

                return priceOrder === 'asc' ? priceA - priceB : priceB - priceA;
            });
        }

        cards.forEach(card => card.style.display = 'none');

        const container = document.querySelector('.cards');
        filteredCards.forEach(card => {
            card.style.display = 'block';
            container.appendChild(card);
        });
    });
</script>



</html>
