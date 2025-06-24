<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Вход</title>
</head>

<body>
    <x-header />

    <div class="login-container">
        <form class="login-form" method="POST" action="{{ url('/login') }}">
            @csrf
            <h2>Вход</h2>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" required>
                @error('email')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <div class="password-wrapper">
                    <input type="password" id="password" type="password" name="password" required>
                    <button type="button" class="toggle-password" onclick="togglePassword()">👁</button>
                    @error('password')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <label class="checkbox-container">
                <input class="custom-checkbox" type="checkbox" id="remember-me" name="remember">
                <span class="checkmark"></span>
                <p class="checkmark-text form-options">Запомнить меня</p>
            </label>

            <button id="loginButton" type="submit" class="login-button" disabled>Войти</button>
            <a href="#" class="forgot-password">Забыли пароль?</a>
            <p class="register-link"> Нет аккаунта? <a href="{{ route('register') }}">Зарегистрируйтесь!</a></p>
        </form>
    </div>

    <x-footer />
</body>
<script src="../js/script.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.login-form');
        const emailInput = form.querySelector('input[name="email"]');
        const passwordInput = form.querySelector('input[name="password"]');
        const loginButton = document.getElementById('loginButton');

        function validateLoginForm() {
            const emailFilled = emailInput.value.trim() !== '';
            const passwordFilled = passwordInput.value.trim() !== '';
            loginButton.disabled = !(emailFilled && passwordFilled);
        }

        emailInput.addEventListener('input', validateLoginForm);
        passwordInput.addEventListener('input', validateLoginForm);

        // таймаут на случай автозаполнения
        setTimeout(validateLoginForm, 100);
    });
</script>

</html>
