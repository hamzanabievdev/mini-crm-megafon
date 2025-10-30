
var modalEl = document.getElementById('kt_modal_stacked_1');
var modal = bootstrap.Modal.getInstance(modalEl);
if (!modal) {
    modal = new bootstrap.Modal(modalEl);
}

function formatDateAndTime(date, returnType) {
    const dateObj = new Date(date);
    var date = dateObj.toLocaleDateString('ru-RU');
    var time = dateObj.toLocaleTimeString('ru-RU', { hour: '2-digit', minute: '2-digit' });
    if(returnType === "date") {
        return date;
    } else if(returnType === "time") {
        return time;
    } else if(returnType === "dateAndTime") {
        return date+' '+time;
    }
}

function getStatusAppeal(status) {
    switch (status) {
        case 'Новая': return 'badge-primary';
        case 'В процессе': return 'badge-warning';
        case 'Решено': return 'badge-success';
        case 'Отклонено': return 'badge-danger';
        default: return '';
    }
}

function putNewAppeal(element) {
    var table = $('#kt_ecommerce_products_table').DataTable();

    let tableTr = `
            <tr>
                <td></td>
                <td class="text-start min-w-100px">
                        <a href="appeals/${element.id}" 
                            class="text-gray-800 text-hover-success fs-5 fw-bold" 
                            data-kt-ecommerce-product-filter="product_name">
                            ${element.full_name}
                        </a>
                </td>
                <td class="text-end pe-0">
                <a href="appeals/${element.id}" 
                    class="text-gray-800 text-hover-success fs-5 fw-bold" 
                    data-kt-ecommerce-product-filter="product_name">
                    ${element.personal_account}
                </a>
                </td>
                <td class="text-end pe-0">
                <a href="appeals/${element.id}" 
                    class="text-gray-800 text-hover-success fs-5 fw-bold" 
                    data-kt-ecommerce-product-filter="product_name">
                ${element.phone}
                </a>
                </td>
                <td></td>
                <td class="text-end pe-0">
                <a href="appeals/${element.id}" 
                    class="badge ${getStatusAppeal(element.status)} fs-7" 
                    data-kt-ecommerce-product-filter="product_name">
                    ${element.status}
                </a>
                </td>
                <td class="text-end pe-0">
                 <a href="appeals/${element.id}" 
                    class="text-gray-800 text-hover-success fs-5 fw-bold" 
                    data-kt-ecommerce-product-filter="product_name">
                    ${formatDateAndTime(element.created_at, "date")}
                </a>
                </td>
                <td class="text-end">
                <a href="appeals/${element.id}" 
                    class="text-gray-800 text-hover-success fs-5 fw-bold" 
                    data-kt-ecommerce-product-filter="product_name">
                    ${formatDateAndTime(element.created_at, "time")}
                </a>
                </td>
            </tr>`;

    table.row.add($(tableTr)).draw();
}

var create_appeal = document.getElementById("create_appeal");
create_appeal.addEventListener("click", () => {
    var full_name = document.getElementById("full_name").value;
    var personal_account = document.getElementById("personal_account").value;
    var phone = document.getElementById("phone").value;
    var subject = document.getElementById("subject").value;
    var message = document.getElementById("message").value;

    if(full_name === '') {
         Swal.fire({
            text: "Введите ФИО клиента!",
            icon: "warning",
            buttonsStyling: false,
            confirmButtonText: "Понятно",
            customClass: { confirmButton: "btn btn-warning" }
        });
    } else if(personal_account === '') {
        Swal.fire({
            text: "Введите лиц. счет!",
            icon: "warning",
            buttonsStyling: false,
            confirmButtonText: "Понятно",
            customClass: { confirmButton: "btn btn-warning" }
        });
    } else if(phone === '') {
         Swal.fire({
            text: "Введите номер телефона!",
            icon: "warning",
            buttonsStyling: false,
            confirmButtonText: "Понятно",
            customClass: { confirmButton: "btn btn-warning" }
        });
    } else {
        var appealObject = {
            full_name: full_name,
            personal_account: personal_account,
            phone: phone,
            subject: subject,
            message: message,
            status: "Новая"
        };

        fetch('/api/appeal', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json; charset=utf-8',
                'Accept': 'application/json'
            },
            body: JSON.stringify(appealObject)
            })
            .then(response => {
                if (!response.ok) {
                    console.log("Ошибка при получении данных");
                }
                modal.hide();
                putNewAppeal(appealObject);
            })
        }

});