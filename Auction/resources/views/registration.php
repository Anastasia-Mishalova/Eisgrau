<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/registration.css') }}">
    <title>Регистрация</title>
</head>

<body>
    <?php include('./components/header/header.php'); ?>

    <div class="login-container">
        <form class="login-form">
            <h2>Регистрация</h2>
            <div class="form-group">
                <label for="firstname">Имя</label>
                <input type="text" id="firstname" required oninput="checkForm()">
            </div>

            <div class="form-group">
                <label for="lastname">Фамилия</label>
                <input type="text" id="lastname" required oninput="checkForm()">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" required oninput="checkForm()">
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <div class="password-wrapper">
                    <input type="password" id="password" required oninput="checkForm()">
                    <button type="button" class="toggle-password" onclick="togglePassword()">👁</button>
                </div>
            </div>


            <!-- From Uiverse.io by DaniloMGutavo -->
            <label class="checkbox-container">
                <input class="custom-checkbox" type="checkbox" id="terms" onchange="checkFormRegister()">
                <span class="checkmark"></span>
                <p class="checkmark-text form-options">Я соглашаюсь с условиями <a href="user-agreement.php" target="_blank">Пользовательского соглашения</a> и <a href="privacy-policy.php" target="_blank">Политики конфиденциальности</a></p>
            </label>
            <!--  -->

            <button id="registerButton" type="submit" class="register-button" disabled>Регистрация</button>
            <p class="login-link"> Есть аккаунт? <a href="login.php">Войдите!</a></p>

        </form>
    </div>

    <?php include('./components/footer/footer.php'); ?>

</body>
<script src="../js/script.js"></script>

</html>