function getRoleUser(role) {
    if(role === "admin") {
        return "Администратор";
    } else if(role === "operator") {
        return "Оператор";
    } else if(role === "backoffice") {
        return "Бэк-оффис";
    }
}

function putUsers(data) {
    var table = $('#kt_ecommerce_products_table').DataTable();
    table.clear().draw();

    data.forEach(element => {
        let tableTr = `
            <tr>
                <td></td>
                <td class="text-start min-w-100px">
                    ${element.full_name}
                </td>
                <td></td>
                <td class="text-end pe-0">
                    ${element.login ? element.login: '-'}
                </td>
                <td></td>
                <td class="text-end pe-0">
                    ${element.email ? element.email: '-'}
                </td>
                <td></td>
                <td class="text-end">
                    ${getRoleUser(element.role)}
                </td>
            </tr>`;

        table.row.add($(tableTr)).draw();
    });
}

fetch('/api/users', {
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
    putUsers(data);
})


var search = document.getElementById("search");
search.addEventListener('input', function(event) {
    var query = event.target.value;
    fetch('/api/users/search', {
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
        putUsers(data);
    })

});