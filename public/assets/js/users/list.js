document.addEventListener('DOMContentLoaded', () => {
    const tableBody = document.querySelector('#kt_ecommerce_products_table tbody');

    function loadUsers() {
        fetch('/api/users', {
            method: 'GET',
            headers: { 'Accept': 'application/json' }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Ошибка ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (!Array.isArray(data)) {
                throw new Error('Некорректный формат данных от сервера');
            }

            tableBody.innerHTML = '';

            data.forEach(user => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td></td>
                    <td class="text-start min-w-100px">${user.full_name || '-'}</td>
                    <td></td>
                    <td class="text-end pe-0">${user.login || '-'}</td>
                    <td></td>
                    <td class="text-end pe-0">${user.email || '-'}</td>
                    <td></td>
                    <td class="text-end">${user.role || '-'}</td>
                `;
                tableBody.appendChild(tr);
            });
        })
        .catch(error => {
            console.error('Ошибка загрузки пользователей:', error);
            Swal.fire({
                text: "Не удалось загрузить список пользователей!",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Понятно",
                customClass: { confirmButton: "btn btn-danger" }
            });
        });
    }

    loadUsers();
});
