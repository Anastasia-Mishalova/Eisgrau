<!DOCTYPE html>
<html lang="ru">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ asset('css/home.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/lot.css') }}">
    <title>Лот</title>
</head>

<body>
    <x-header />

    <main class="product">
        <div class="product__info">
            <div class="slider-wrapper">
                <div class="arrow arrow-left" id="arrowLeft">&#10094;</div>
                <img id="sliderImage"
                    class="product__image slider-image"src="{{ asset($photos[0]->photo_url ?? 'placeholder.jpg') }}"
                    alt="Фото лота">
                <div class="arrow arrow-right" id="arrowRight">&#10095;</div>
            </div>
            <h2 class="product__title">
                {{ $lot->title }}</h2>
            <p class="product__description">{{ $lot->descr }}</p>
            <div class="product__condition">
                <div>Состояние: <span class="product__condition-value">{{ $lot->quality_name }}</span></div>
            </div>
            <div class="product__tags">
                <div class="product__tag-item">Мечи</div>
                <div class="product__tag-item">Церемониальные предметы</div>
                <div class="product__tag-item">{{ $lot->quality_name }}</div>
            </div>
        </div>

        <div class="product-details">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @auth
                <button class="product__bid-button button" onclick="openBidModal()">Ставка</button>
            @else
                <p>Авторизуйтесь, чтобы сделать ставку.</p>
            @endauth

            <button class="product__buyout-button button">Автовыкуп</button>
            <button class="product__addfavorites-button button">Добавить в избранное</button>

            <div class="bids">
                <div class="bids__top">
                    @if ($lot->auction_end)
                        <p>
                            До конца аукциона:
                            <span id="countdown" data-end="{{ $lot->auction_end->toIso8601String() }}"></span>
                        </p>
                    @else
                        <p>Аукцион завершён</p>
                    @endif

                </div>
                <div class="bids__middle">
                    @forelse ($bids as $bid)
                        <div class="bet">
                            <div class="bet__name">
                                <img src="{{ $bid->avatar_url ? asset('storage/' . $bid->avatar_url) : asset('images/design/base-avatar.jpg') }}"
                                    alt="Аватар" class="avatar">
                                <div>{{ $bid->first_name }} {{ $bid->last_name }}</div>
                            </div>
                            <div><strong>{{ $bid->bid_amount }}$</strong></div>
                        </div>
                    @empty
                        <p>Ставок пока нет</p>
                    @endforelse
                </div>

                <div class="bids__bottom">
                    Старт с {{ $lot->starting_price }}$
                </div>
            </div>
            <div class="seller-info">
                <img src="{{ $lot->seller_avatar_url ? asset('storage/' . $lot->seller_avatar_url) : asset('images/design/base-avatar.jpg') }}"
                    alt="Аватар продавца" class="seller-avatar">

                <div class="seller-details">
                    <p class="seller-name">{{ $lot->seller_first_name }} {{ $lot->seller_last_name }}</p>
                    <p class="seller-role">Продавец</p>
                </div>
            </div>
        </div>
        </div>
    </main>
    <x-footer />

    {{-- для деланья ставки --}}
    <div id="bid-modal" class="bid-modal" style="display: none;">
        <div class="modal-overlay" onclick="closeBidModal()"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h3>Сделать ставку</h3>
                <span class="close" onclick="closeBidModal()">&times;</span>
            </div>
            <form method="POST" action="{{ route('lot.placeBid', ['id' => $lot->id]) }}">
                @csrf
                <div class="form-group">
                    <label for="bid_amount">Введите сумму ставки:</label>
                    <input type="number" name="bid_amount" id="bid_amount" min="{{ $lot->current_price + 1 }}"
                        required>
                </div>
                <button type="submit" class="button">Подтвердить ставку</button>
            </form>
        </div>
    </div>

    {{-- модальное окно для галереи чтобы просматривать фотки полноформатно --}}
    <div id="modal" class="modal-photos">
        <span id="modalClose" class="modal-close-photos">&times;</span>
        <div class="arrow arrow-left" id="modalArrowLeft">&#10094;</div>
        <img class="modal-content-photos" id="modalImage">
        <div class="arrow arrow-right" id="modalArrowRight">&#10095;</div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const countdown = document.getElementById('countdown');
            if (!countdown) return;

            const endTime = new Date(countdown.dataset.end).getTime();

            function updateTimer() {
                const now = new Date().getTime();
                const diff = endTime - now;

                if (diff <= 0) {
                    countdown.innerText = 'Аукцион завершён';
                    clearInterval(timer);
                    return;
                }

                const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((diff % (1000 * 60)) / 1000);

                let parts = [];
                if (days > 0) parts.push(`${days} д.`);
                if (hours > 0 || days > 0) parts.push(`${hours} ч.`);
                if (minutes > 0 || hours > 0 || days > 0) parts.push(`${minutes} мин.`);
                parts.push(`${seconds} сек.`);

                countdown.innerText = parts.join(' ');
            }

            updateTimer();
            const timer = setInterval(updateTimer, 1000);
        });

        // для галереи фото
        document.addEventListener('DOMContentLoaded', function() {
            const photos = @json($photos->pluck('photo_url'));
            const sliderImage = document.getElementById('sliderImage');
            const arrowLeft = document.getElementById('arrowLeft');
            const arrowRight = document.getElementById('arrowRight');
            let currentIndex = 0;

            function showSlide(index) {
                if (photos.length === 0) return
                if (index < 0) index = photos.length - 1;
                if (index >= photos.length) index = 0;

                const newSrc = photos[index];
                sliderImage.src = newSrc;
                currentIndex = index;
            }

            arrowLeft.addEventListener('click', () => {
                showSlide(currentIndex - 1);
            });

            arrowRight.addEventListener('click', () => {
                showSlide(currentIndex + 1);
            });
        });


        // модалка для галереи 
        const photos = @json($photos->pluck('photo_url'));
        let currentIndex = 0;

        const sliderImage = document.getElementById('sliderImage');
        const arrowLeft = document.getElementById('arrowLeft');
        const arrowRight = document.getElementById('arrowRight');

        const modal = document.getElementById('modal');
        const modalImage = document.getElementById('modalImage');
        const modalClose = document.getElementById('modalClose');
        const modalArrowLeft = document.getElementById('modalArrowLeft');
        const modalArrowRight = document.getElementById('modalArrowRight');

        function showSlide(index) {
            if (!photos || photos.length === 0) return;

            index = (index + photos.length) % photos.length;
            const path = photos[index];
            sliderImage.src = path;
            currentIndex = index;
        }

        function showModalSlide(index) {
            if (!photos || photos.length === 0) return;

            index = (index + photos.length) % photos.length;
            modalImage.src = photos[index];
            currentIndex = index;
        }

        arrowLeft?.addEventListener('click', () => showSlide(currentIndex - 1));
        arrowRight?.addEventListener('click', () => showSlide(currentIndex + 1));

        sliderImage?.addEventListener('click', () => {
            modal.style.display = 'block';
            showModalSlide(currentIndex);
        });

        modalArrowLeft?.addEventListener('click', () => showModalSlide(currentIndex - 1));
        modalArrowRight?.addEventListener('click', () => showModalSlide(currentIndex + 1));

        modalClose?.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        modal?.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });

        // для деланья ставок
        function openBidModal() {
            document.getElementById('bid-modal').style.display = 'flex';
        }

        function closeBidModal() {
            document.getElementById('bid-modal').style.display = 'none';
        }
    </script>

</body>

</html>
