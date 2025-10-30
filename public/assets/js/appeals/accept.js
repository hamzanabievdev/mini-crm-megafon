const appealId = window.location.pathname.split('/').pop();
var accept_appeal = document.getElementById('accept_appeal');
accept_appeal.addEventListener('click', () => {
    Swal.fire({
        text: "Вы хотите принять эту жалобу?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Да, принять',
        cancelButtonText: 'Отмена',
        reverseButtons: true,
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/api/user`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
            })
            .then(res => res.json())
            .then(userData => {
                 fetch(`/api/appeal/${appealId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        status: 'В процессе',
                        operator_id: userData['id']
                    })
                })
                .then(res => res.json())
                .then(appealData => {
                    var select = document.createElement('select');
                    select.className = 'form-select w-50';
                    select.setAttribute('data-control', 'select2');
                    select.setAttribute('data-placeholder', userData['full_name']);
                    select.disabled = true;
                    accept_appeal.replaceWith(select);

                    if (window.jQuery && $(select).select2) {
                        $(select).select2();
                    }

                    var status_appeal = document.getElementById("status_appeal");
                    status_appeal.className = "text-white badge badge-warning mt-3 fw-bolder fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase";
                    status_appeal.innerText = "В процессе";
                    Swal.fire({
                        text: 'Жалоба успешно принята вами!',
                        icon: 'success',
                        confirmButtonText: 'Продолжить',
                        customClass: { confirmButton: 'btn btn-success' },
                        buttonsStyling: false
                    });
                });
            });
        }
    });
});