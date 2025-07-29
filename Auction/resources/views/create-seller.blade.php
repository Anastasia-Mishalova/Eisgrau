<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/create-seller.css') }}">
    <title>Стать продавцом</title>
</head>

<body>
    <x-header />
    <div class="container">
        <h1>Стать продавцом</h1>

        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: red;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form-container" method="POST" action="{{ route('seller.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="input-group">
                <label>Гражданство:</label>
                <input id="citizenship" type="text" name="citizenship" value="{{ old('citizenship') }}" required
                    maxlength="100">
            </div>

            <div class="input-group">
                <label>Пол:</label>
                <select name="gender" id="gender" required>
                    <option value="">Выберите пол</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Мужской</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Женский</option>
                </select>
            </div>

            <div class="input-group">
                <label>Номер паспорта:</label>
                <input id="passport_number" type="text" name="passport_number" value="{{ old('passport_number') }}"
                    required maxlength="50">
            </div>

            <div class="input-group">
                <label>Кем выдан паспорт:</label>
                <input id="passport_issued_by" type="text" name="passport_issued_by"
                    value="{{ old('passport_issued_by') }}" required maxlength="150">
            </div>


            <div class="input-group">
                <label>Фото паспорта:</label>
                <div class="photo-upload">
                    <div class="card upload-card" id="uploadCard">
                        <span class="plus">+</span>
                        <input type="file" name="passport_photo" accept="image/*" required id="passportFileInput"
                            style="display: none;">
                    </div>
                    <div id="previewContainer"></div>
                </div>
            </div>

            <button type="submit" class="create-seller" id="submitBtn">Стать продавцом</button>
        </form>
    </div>
    <x-footer />
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('passportFileInput');
        const uploadCard = document.getElementById('uploadCard');
        const previewContainer = document.getElementById('previewContainer');
        const submitBtn = document.getElementById('submitBtn');

        const fields = [
            'citizenship',
            'gender',
            'passport_number',
            'passport_issued_by',
            'passportFileInput'
        ];

        uploadCard.addEventListener('click', () => fileInput.click());

        fileInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            previewContainer.innerHTML = '';

            if (file) {
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
                        fileInput.value = '';
                        validateForm();
                    });

                    card.appendChild(deleteButton);
                    previewContainer.appendChild(card);
                };
                reader.readAsDataURL(file);
            }

            validateForm();
        });

        fields.forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.addEventListener('input', validateForm);
                el.addEventListener('change', validateForm);
            }
        });

        function validateForm() {
            const allFilled = fields.every(id => {
                const el = document.getElementById(id);
                return el && el.value.trim() !== '';
            });

            submitBtn.disabled = !allFilled;
        }

        validateForm();
    });
</script>

</html>
