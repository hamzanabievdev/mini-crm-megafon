var entry_submit = document.querySelector("#entry_submit");
var login_input = document.getElementById("login");
var password_input = document.getElementById("password");

const form = document.getElementById('kt_sign_in_form');

var validator = FormValidation.formValidation(
    form,
    {
        fields: {
            'login': {
                validators: {
                    notEmpty: {
                        message: 'Введите Электронную почту или Логин'
                    }
                }
            },
             'password': {
                validators: {
                    notEmpty: {
                        message: 'Введите Пароль'
                    }
                }
            },
        },

        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: '.fv-row',
                eleInvalidClass: '',
                eleValidClass: ''
            })
        }
    }
);

password_input.addEventListener('keypress', event => {
  if (event.key === 'Enter' && password_input.value !== "" && login_input.value !== "") {
    event.preventDefault();
    // Активируем событие entry_submit
    entry_submit.click();
  }
});

entry_submit.addEventListener("click", async event => {
    entry_submit.setAttribute("data-kt-indicator", "on");

    setTimeout(function() {
        entry_submit.removeAttribute("data-kt-indicator");
        var login = document.getElementById("login").value;
        var password = document.getElementById("password").value;

        if (!login || !password) {
        Swal.fire({
            text: "Пожалуйста, заполните все поля!",
            icon: "warning",
            buttonsStyling: false,
            confirmButtonText: "Продолжить",
            customClass: { confirmButton: "btn btn-danger" }
        });
        return;
    }

    fetch('/api/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ login, password }),
        credentials: 'same-origin'
    })
    .then(function(response) {
        if (response.ok) {
            window.location.href = "/";
        } else if (response.status === 401) {
            Swal.fire({
                text: "Неверный логин или пароль!",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Продолжить",
                customClass: { confirmButton: "btn btn-danger" }
            });
        } else {
            Swal.fire({
                text: "Сервер не доступен! Пожалуйста попробуйте позже.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Продолжить",
                customClass: { confirmButton: "btn btn-danger" }
            });
        }
    })
    .catch(function(error) {
        console.error('Ошибка при логине:', error);
        Swal.fire({
            text: "Произошла ошибка! Пожалуйста попробуйте позже.",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Продолжить",
            customClass: { confirmButton: "btn btn-danger" }
        });
    });

    }, 3000);
});