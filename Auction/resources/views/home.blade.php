<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Аукцион</title>
</head>

</body>
<x-header />
<x-categories />

<main class="products">
    <div class="search">
        <form action="{{ route('home') }}" method="GET" class="search-container">
            <input type="text" class="search-input"name="req" placeholder="Введите текст для поиска..." value="{{ request('req') }}">
            <button type="submit" class="search-button">Поиск</button>
        </form>

    </div>

    <section class="filters" id="filters">
        <p class="filters__title">Фильтры</p>

        <fieldset id="weapons-filters" class="filters-group filters__hidden-group checkbox-container"
            style="display: none;">
            <legend>Типы оружия</legend>

            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Мечи</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Кинжалы</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Топоры</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Луки</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Арбалеты</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Древковое</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Метательное</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Огнестрельное</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Осадное</p>
            </label>
        </fieldset>

        <fieldset id="armors-filters" class="filters-group filters__hidden-group checkbox-container"
            style="display: none;">
            <legend>Типы доспехов</legend>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Латные</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Кольчужные</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Кожаные</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Тканевые</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Зерцала</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Бригантина</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Шлемы</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Торс</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Руки</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Ноги</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Полный комплект</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Частичный комплект</p>
            </label>
        </fieldset>

        <fieldset id="religion-filters" class="filters-group filters__hidden-group checkbox-container"
            style="display: none;">
            <legend>Типы религиозных предметов</legend>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Церемониальные предметы</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Утварь</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Одежда</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Украшения</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Книги и рукописи</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Изображения искусства</p>
            </label>
        </fieldset>

        <fieldset id="books-filters" class="filters-group filters__hidden-group checkbox-container"
            style="display: none;">
            <legend>Типы книг</legend>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Печатные книги</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Манускрипты</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Письма</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Индульценции</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Хартии</p>
            </label>
        </fieldset>



        <fieldset class="filters-group filters__checkbox-group checkbox-container">
            <legend>Дата завершения</legend>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Новое</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Старое</p>
            </label>
        </fieldset>
        <fieldset class="filters-group filters__checkbox-group checkbox-container">
            <legend>Цена</legend>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Дешевле</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Дороже</p>
            </label>
        </fieldset>
        <fieldset class="filters-group filters__checkbox-group checkbox-container">
            <legend>Состояние</legend>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Идеальное</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Отличное</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Хорошее</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Нормальное</p>
            </label>
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkmark"></span>
                <p class="checkmark-text">Плохое</p>
            </label>
        </fieldset>

        <button class="filters__apply-button">Применить фильтры</button>
    </section>

    <!-- Карточки -->
    <div class="cards">

        @foreach ($lots as $lot)
            <div class="card">
                <a href="{{ route('lots.show', $lot->id) }}" target="_blank">
                    <div class="card__top">
                        <div class="card__image-container">
                            <img class="card__image" src="{{ asset($lot->photo_url) }}" alt="Фото лота">
                        </div>
                    </div>
                    <div class="card__bottom">
                        <h3 class="card__title" title="{{ $lot->title }}">{{ $lot->title }}</h3>
                        <p class="card__price">Цена: {{ $lot->starting_price }} $</p>

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

</html>
