<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/login-admin.css') }}">
    <title>Вход в Админ-панель</title>
</head>

<body>
    <x-header-admin />

    <div class="login-container">
        <form class="login-form" method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <h2>Вход</h2>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Пароль</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" required>
                    <button type="button" class="toggle-password">👁</button>
                </div>
            </div>

            <button id="loginButton" type="submit" class="login-button" disabled>Войти</button>
            <a href="#" class="forgot-password">Забыли пароль?</a>
        </form>
    </div>

    <x-footer-admin />
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const loginButton = document.getElementById('loginButton');
        const toggleButton = document.querySelector('.toggle-password');

        // Кнопка активна только при заполнении полей
        function checkFormLogin() {
            const email = emailInput.value.trim();
            const password = passwordInput.value.trim();
            loginButton.disabled = email === '' || password === '';
        }

        // Метод для глазика
        function togglePassword() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleButton.textContent = '👁';
            }
        }
        
        emailInput.addEventListener('input', checkFormLogin);
        passwordInput.addEventListener('input', checkFormLogin);
        toggleButton.addEventListener('click', togglePassword);

        checkFormLogin();
    });
</script>

</html>
