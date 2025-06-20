// попап для ставки
// СДЕЛАТЬ

/* добавление доп фильтров в боковое меню */
function showFilters(category) {
    const filterGroups = document.querySelectorAll('.filters__hidden-group');
    filterGroups.forEach(group => {
        group.style.display = 'none';
        group.classList.remove('filters__checkbox-group');
    });

    const selectedFilterGroup = document.getElementById(category + '-filters');
    if (selectedFilterGroup) {
        selectedFilterGroup.style.display = 'flex';
        selectedFilterGroup.classList.add('filters__checkbox-group');
    }
}

/* выделение категории бордером по клику */
document.querySelectorAll('.category').forEach(a => {
    a.addEventListener('click', function () {
        document.querySelectorAll('.category').forEach(a => {
            a.classList.remove('selected-categories');
        });

        this.classList.add('selected-categories');
    });
});

/* профиль пользователя ПОПАП жалобы*/
function openAuctionPage(url) {
    window.open(url, '_blank');
}

function openComplaintPopup(title, description) {
    document.getElementById('popup-title').innerText = title;
    document.getElementById('popup-description').innerText = description;
    document.getElementById('complaint-popup').style.display = "block";
}

function closePopup() {
    document.getElementById('complaint-popup').style.display = "none";
}

/* условный глазик чтобы не забыть добавить svg на пост-рендере */
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const passwordButton = document.querySelector('.toggle-password');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordButton.innerHTML = '◡'; // Иконка скрыть
    } else if (passwordInput.type === 'text') {
        passwordInput.type = 'password';
        passwordButton.innerHTML = '👁'; // Иконка показать
    }
}

/* проверка в регистрации всех полей и чекбокса, тогда кнопка становится активной */
function checkFormRegister() {
    const firstname = document.getElementById('firstname').value;
    const lastname = document.getElementById('lastname').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const terms = document.getElementById('terms').checked;
    const registerButton = document.getElementById('registerButton');


    if (firstname && lastname && email && password && terms) {
        registerButton.disabled = false;
    } else {
        registerButton.disabled = true;
    }
}

/* проверка во входе всех полей и чекбокса, тогда кнопка становится активной */
function checkFormLogin() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const loginButton = document.getElementById('loginButton');


    if (email && password) {
        loginButton.disabled = false;
    } else {
        loginButton.disabled = true;
    }
}

/* шайтан-приблуда для предпросмотра картинок при загрузке фото в аук*/
document.getElementById('uploadCard').addEventListener('click', function () {
    document.getElementById('fileInput').click();
});

document.getElementById('fileInput').addEventListener('change', function (event) {
    const files = event.target.files;
    const previewContainer = document.getElementById('previewContainer');

    previewContainer.innerHTML = '';

    const fileCount = Math.min(files.length, 10);

    for (let i = 0; i < fileCount; i++) {
        const file = files[i];
        const reader = new FileReader();

        reader.onload = function (e) {
            const card = document.createElement('div');
            card.className = 'card';
            const img = document.createElement('img');
            img.src = e.target.result;
            card.appendChild(img);
            previewContainer.appendChild(card);
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'x';
            deleteButton.className = 'delete-button';
            deleteButton.addEventListener('click', function () {
                card.remove();
            });
            card.appendChild(deleteButton);
        };
        reader.readAsDataURL(file);
    }
});

/* Отображает свой текст для каждого уровня качества, пояснение для пользователей */
function updateConditionText() {
    const selected = document.querySelector('input[name="condition"]:checked');
    const conditionText = document.getElementById('condition-text');

    if (selected) {
        if (selected.value === "Идеальное") {
            conditionText.textContent = "Нет видимых следов износа или манипуляций или они минимальны. Могут присутствовать следы, возникшие на заготовке при изготовлении или чеканке. Отсутствуют следы износа и любые механические повреждения, минимальное влияние времени. Самая наивысшая степень сохранности";
        }
        else if (selected.value === "Отличное") {
            conditionText.textContent = "95% оригинальных деталей не имеют дефектов. Возможны заметные небольшие царапины, и небольшое влияние времени";
        }
        else if (selected.value === "Хорошее") {
            conditionText.textContent = "80-90% оригинальных деталей не имеют дефектов. Возможны заметные царапины и небольшие повреждения, вмятины, слабые следы ударов, мытья, чистки, изменение в окраске, влияние времени заметно, но не мешает использованию. Могут остуствовать небольшие фрагменты и быть заметны следы разложения или ржавчины";
        }
        else if (selected.value === "Нормальное") {
            conditionText.textContent = "50-80% оригинальных деталей не имеют дефектов. Возможны царапины и повреждения, влияние времени заметно, но предмет не рассыпается и не разламывается в руках, не отваливаются куски. Некоторые фрагменты могут отсутствовать, могут присутствовать крупные следы разложения и ржавчины. Допустим раскол на две, три или четыре крупных части";
        }
        else if (selected.value === "Плохое") {
            conditionText.textContent = "Уровень сохранности изделия от 50% и ниже. Отсутствуют крупные фрагменты, заметно сильное влияние времени, масштабные следы разложения и ржавчины, на изделии невозможно различить детали или узоры";
        }
        else {
            conditionText.textContent = "Вы выбрали: Неизвестное состояние";
        }
    } else {
        conditionText.textContent = "Выберите степень сохранности";
    }
}

document.querySelectorAll('input').forEach(input => {
    input.addEventListener('input', toggleCreateButton);
});

function toggleCreateButton() {
    const title = document.getElementById('title').value;
    const description = document.getElementById('description').value;
    const termsChecked = document.getElementById('terms').checked;
    const createButton = document.getElementById('createLot');
    createButton.disabled = !(title && description && termsChecked);
}

