<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <title>Регистрация</title>
</head>

<body>
    <x-header />

    <div class="register-container">
        <form class="register-form" method="POST" action="{{ url('/register') }}">
            @csrf
            <h2>Регистрация</h2>
            <div class="form-group">
                <label for="firstname">Имя</label>
                <input type="text" name="firstname" required>
                @error('firstname') <div>{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="lastname">Фамилия</label>
                <input type="text" name="lastname" required>
                @error('lastname') <div>{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" required>
                @error('email') <div>{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <div class="password-wrapper">
                    <input type="password" id="password" type="password" name="password" required>
                    <button type="button" class="toggle-password" onclick="togglePassword()">👁</button>
                    @error('password') <div>{{ $message }}</div> @enderror
                </div>
            </div>


            <!-- From Uiverse.io by DaniloMGutavo -->
            <label class="checkbox-container">
                <input class="custom-checkbox" type="checkbox" id="terms" onchange="checkFormRegister()">
                <span class="checkmark"></span>
                <p class="checkmark-text form-options">Я соглашаюсь с условиями <a href="user-agreement.php"
                        target="_blank">Пользовательского соглашения</a> и <a href="privacy-policy.php"
                        target="_blank">Политики конфиденциальности</a></p>
            </label>
            <!--  -->

            <button id="registerButton" type="submit" class="register-button" disabled>Регистрация</button>
            <p class="register-link"> Есть аккаунт? <a href="{{ route('login') }}">Войдите!</a></p>

        </form>
    </div>
    <x-footer />
</body>

<script src="../js/script.js"></script>

</html>
