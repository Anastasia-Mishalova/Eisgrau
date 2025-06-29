<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/create-auction.css') }}">
    <title>Создание аукциона</title>
</head>

<body>
    <x-header />

    <form class="container" action="{{ route('lots.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h2>Создание аукциона</h2>
        <div class="input-group">
            <label>Загрузить фото лота (до 10 изображений):</label>
            <div class="photo-upload">
                <div class="photo-uploader">
                    <div class="card upload-card" id="lotUploadCard">
                        <span class="plus">+</span>
                        <input type="file" multiple accept="image/*" name="photos[]" id="lotFileInput"
                            style="display: none;">
                    </div>
                    <div class="photo-uploader" id="lotPreviewContainer"></div>
                </div>
            </div>
        </div>

        {{-- <div class="input-group">
            <label>Загрузить сертификат подлинности:</label>
            <div class="photo-upload">
                <div class="photo-uploader">
                    <div class="card upload-card" id="certUploadCard">
                        <span class="plus">+</span>
                        <input type="file" accept="image/*" name="certificate" id="certFileInput"
                            style="display: none;">
                    </div>
                    <div class="photo-uploader" id="certPreviewContainer"></div>
                </div>
            </div>
        </div> --}}

        <div class="input-group">
            <label for="title">Заголовок</label>
            <input type="text" name="title" id="title" required>
        </div>

        <div class="input-group">
            <label for="description">Описание</label>
            <textarea class="description" name="descr" id="descr" required></textarea>
        </div>
        <label for="condition">Степень сохранности</label>
        <div class="input-group condition-group">

            <div class="condition">
                <div class="radio-group">
                    @foreach ($qualities as $quality)
                        <label>
                            <input type="radio" name="quality_id" value="{{ $quality->id }}"
                                data-descr="{{ $quality->descr }}"
                                {{ old('quality_id') == $quality->id ? 'checked' : '' }}>
                            {{ $quality->title }}
                        </label><br>
                    @endforeach
                </div>

                <div class="info-condition">
                    <p id="condition-text">
                        @if (old('quality_id'))
                            {{ optional($qualities->firstWhere('id', old('quality_id')))->descr }}
                        @else
                            Выберите степень сохранности
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="input-group">
            <label for="starting_price">Стартовая цена ($)</label>
            <input type="number" name="starting_price" id="starting_price" class="form-control" step="10"
                min="0" value="{{ old('starting_price') }}" required>
        </div>

        <div class="input-group">
            <label for="auction_end">Дата окончания аукциона</label>
            <input type="datetime-local" name="auction_end" id="auction_end" class="form-control"
                value="{{ old('auction_end') }}" required>
        </div>

        <div class="input-group">
            <label class="checkbox-container">
                <input type="checkbox" class="custom-checkbox" id="terms">
                <span class="checkmark"></span>
                {{-- <span class="checkmark-text">Я прочел <a href="{{ route('') }}">условия</a></span> --}}
                <span class="checkmark-text">Я прочел условия</span>
            </label>
        </div>

        <button type="submit" class="create-lot" id="createLot" disabled>Создать лот</button>
    </form>

    <x-footer />
</body>
<script src="{{ asset('js/script.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const radios = document.querySelectorAll('input[name="quality_id"]');
        const descBox = document.getElementById('condition-text');

        radios.forEach(radio => {
            radio.addEventListener('change', function() {
                const description = this.dataset.descr || 'Выберите степень сохранности';
                descBox.textContent = description;
            });
        });
    });

    function setupPreview(uploadCardId, fileInputId, previewContainerId, maxCount = 10, multiple = true) {
        const uploadCard = document.getElementById(uploadCardId);
        const fileInput = document.getElementById(fileInputId);
        const previewContainer = document.getElementById(previewContainerId);

        if (!uploadCard || !fileInput || !previewContainer) return;

        uploadCard.addEventListener('click', () => fileInput.click());

        fileInput.addEventListener('change', (event) => {
            const files = Array.from(event.target.files);
            previewContainer.innerHTML = '';

            const fileCount = multiple ? Math.min(files.length, maxCount) : 1;

            for (let i = 0; i < fileCount; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const card = document.createElement('div');
                    card.className = 'card';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    card.appendChild(img);

                    const deleteButton = document.createElement('button');
                    deleteButton.textContent = '×';
                    deleteButton.className = 'delete-button';
                    deleteButton.addEventListener('click', function() {
                        card.remove();
                    });

                    card.appendChild(deleteButton);
                    previewContainer.appendChild(card);
                };

                reader.readAsDataURL(file);
            }
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        setupPreview('lotUploadCard', 'lotFileInput', 'lotPreviewContainer', 10, true);
        setupPreview('certUploadCard', 'certFileInput', 'certPreviewContainer', 1, false);
    });


    //проверка что всё заполнено, тогда кнопка становится активной 
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const submitButton = document.getElementById('createLot');
        const requiredFields = [
            document.getElementById('title'),
            document.getElementById('descr'),
            document.getElementById('starting_price'),
            document.getElementById('auction_end'),
        ];
        const qualityRadios = document.querySelectorAll('input[name="quality_id"]');
        const termsCheckbox = document.getElementById('terms');

        function isQualitySelected() {
            return Array.from(qualityRadios).some(radio => radio.checked);
        }

        function checkFormValidity() {
            let allFilled = true;
            for (const field of requiredFields) {
                if (field.value.trim() === '') {
                    allFilled = false;
                    break;
                }
            }
            const qualitySelected = isQualitySelected();
            const termsChecked = termsCheckbox.checked;

            if (allFilled && qualitySelected && termsChecked) {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }

        [requiredFields, termsCheckbox, qualityRadios].forEach(element => {
            element.addEventListener('input', checkFormValidity);
            element.addEventListener('change', checkFormValidity);
        });

        checkFormValidity();
    });
</script>

</html>
