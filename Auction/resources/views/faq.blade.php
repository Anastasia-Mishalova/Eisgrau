<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вопросы и Ответы</title>
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}">
</head>

<body>
    <x-header />
    <div class="questions">
        <img class="logo mirrored-logo" src="/images/design/logo-star.png" alt="">
        <div class="question-item">
            <h2 class="question">Можно ли участвовать в торгах без регистрации?</h2>
            <p class="answer"> Нет, для участия в торгах необходимо зарегистрироваться и войти в личный кабинет</p>
        </div>
        <img class="logo normal-logo" src="/images/design/logo-star.png" alt="">
        <div class="question-item">
            <h2 class="question">Как сделать ставку на лот?</h2>
            <p class="answer">Перейди на страницу интересующего лота и нажми кнопку "Ставка". В появившемся окне укажи
                сумму, которая должна быть выше текущей цены, и подтвердите действие, нажав на кнопку Сделать ставку</p>
        </div>
        <img class="logo mirrored-logo" src="/images/design/logo-star.png" alt="">
        <div class="question-item">
            <h2 class="question">Что такое “Автовыкуп”?</h2>
            <p class="answer">Автовыкуп — это возможность приобрести лот сразу, не дожидаясь окончания аукциона. Если
                продавец указал такую опцию, рядом с лотом будет кнопка "Автовыкуп"</p>
        </div>
        <img class="logo normal-logo" src="/images/design/logo-star.png" alt="">
        <div class="question-item">
            <h2 class="question">Как узнать, выиграл ли я аукцион?</h2>
            <p class="answer">После завершения аукциона победитель получает уведомление в личном кабинете в разделе
                "Выигранные аукционы" и на электронную почту. Также статус будет отображаться на странице лота</p>
        </div>
        <img class="logo mirrored-logo" src="/images/design/logo-star.png" alt="">
        <div class="question-item">
            <h2 class="question">Могу ли я отменить свою ставку?</h2>
            <p class="answer">Нет, после подтверждения ставка считается действительной и не подлежит отмене. Будь
                внимателен перед подтверждением</p>
        </div>
        <img class="logo normal-logo" src="/images/design/logo-star.png" alt="">
        <div class="question-item">
            <h2 class="question">Как связаться с продавцом после победы в торгах?</h2>
            <p class="answer">После завершения аукциона в личном кабинете в разделе Выигранные аукционы под интересующим
                вас выигранным лотом будет электронная почта продавца для связи. Продавец, в свою очередь, так же
                получит вашу</p>
        </div>
        <img class="logo mirrored-logo" src="/images/design/logo-star.png" alt="">
        <div class="question-item">
            <h2 class="question">Могу ли я выставить свой лот на продажу?</h2>
            <p class="answer">Да, если ты зарегистрирован как продавец. Перейди в раздел "Добавить лот" в личном
                кабинете и заполни форму с описанием, фото и условиями аукциона</p>
        </div>
        <img class="logo normal-logo" src="/images/design/logo-star.png" alt="">
        <div class="question-item">
            <h2 class="question">Что происходит, если два пользователя делают одинаковую ставку?</h2>
            <p class="answer">Побеждает тот, кто первым сделал ставку. Система фиксирует точное время каждой ставки
                вплоть до миллисекунд</p>
        </div>
        <img class="logo mirrored-logo" src="/images/design/logo-star.png" alt="">
        <div class="question-item">
            <h2 class="question">Как я могу оплатить и получить лот?</h2>
            <p class="answer">По поводу оплаты и получения лота вы договариваетесь с продавцом через электронную почту
            </p>
        </div>
        <img class="logo normal-logo" src="/images/design/logo-star.png" alt="">
        <div class="question-item">
            <h2 class="question">Что будет, если я нарушу правила аукциона или кого-нибудь обману?</h2>
            <p class="answer">В случае доказанного обмана или мошенничества вы будете навсегда заблокированы, информация
                о вас будет расположена на странице Позор сайта и вы понесете серьезные репутационные потери. В
                определенных случаях возможно применение иных мер наказания по усмотрению администрации</p>
        </div>
    </div>

    <x-footer />
</body>

</html>
