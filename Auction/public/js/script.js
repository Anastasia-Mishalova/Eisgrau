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











  
