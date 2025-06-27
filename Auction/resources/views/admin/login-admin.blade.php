<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/login-admin.css') }}">
    <title>Вход в Админ-панель</title>
</head>

<body>
    <?php include './components/header/header.php'; ?>

    <div class="login-container">
        <form class="login-form">
            <h2>Вход</h2>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" required onchange="checkFormLogin()">
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <div class="password-wrapper">
                    <input type="password" id="password" required onchange="checkFormLogin()">
                    <button type="button" class="toggle-password" onclick="togglePassword()">👁</button>
                </div>
            </div>
            <label class="checkbox-container">
                <input class="custom-checkbox" type="checkbox" id="remember-me" onchange="">
                <span class="checkmark"></span>
                <p class="checkmark-text form-options">Запомнить меня</p>
            </label>

            <button id="loginButton" type="submit" class="login-button" disabled>Войти</button>
            <a href="#" class="forgot-password">Забыли пароль?</a>
        </form>
    </div>

    <?php include './components/footer/footer.php'; ?>

</body>
<script src="../js/script.js"></script>

</html>
