
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

function putAppeals(data) {
    var table = $('#kt_ecommerce_products_table').DataTable();
    table.clear().draw();

    data.forEach(element => {
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
    });
}

fetch('/api/appeals', {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    },
})
.then(function(response) {
    if (!response.ok) {
        console.log("Ошибка при получении данных");
    }
    return response.json();
})
.then(data => {
    console.log(data);
    putAppeals(data);
})


var search = document.getElementById("search");
search.addEventListener('input', function(event) {
    var query = event.target.value;
    fetch('/api/appeals/search', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ query: query })
    })
    .then(function(response) {
        if (!response.ok) {
            console.log("Ошибка при получении данных");
        }
        return response.json();
    })
    .then(data => {
        putAppeals(data);
    })

});