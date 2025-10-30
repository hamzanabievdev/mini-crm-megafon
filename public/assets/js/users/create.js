const modalEl = document.getElementById('modal_add_user');
let modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
const create_user = document.getElementById('create_user');

create_user.addEventListener('click', async () => {
    const fields = ['full_name', 'login', 'email', 'role', 'password'];
    const values = Object.fromEntries(fields.map(id => [id, document.getElementById(id).value.trim()]));

    const isValidEmail = email => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

    const rules = [
        [!values.full_name, "Введите ФИО сотрудника!"],
        [!values.login && !values.email, "Введите хотя бы логин или эл. почту!"],
        [values.email && !isValidEmail(values.email), "Введите корректный email!"],
        [!values.role, "Выберите роль сотрудника!"],
        [!values.password, "Введите пароль!"],
    ];

    for (const [condition, message] of rules) {
        if (condition) {
            return Swal.fire({
                text: message,
                icon: "warning",
                buttonsStyling: false,
                confirmButtonText: "Понятно",
                customClass: { confirmButton: "btn btn-warning" }
            });
        }
    }

    const userObject = {
        full_name: values.full_name,
        role: values.role,
        password: values.password,
        ...(values.email && { email: values.email }),
        ...(values.login && { login: values.login })
    };

    try {
        const res = await fetch('/api/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(userObject)
        });

        const data = await res.json();

        if (!res.ok) {
            if (data.errors) {
                const allErrors = Object.values(data.errors).flat();

                const duplicateError = allErrors.find(msg =>
                    msg.toLowerCase().includes('unique')
                );

                const message = duplicateError
                    ? "Пользователь с таким логином или эл. почтой уже существует"
                    : allErrors.join('\n');

                return Swal.fire({
                    text: message,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Понятно",
                    customClass: { confirmButton: "btn btn-danger" }
                });
            }

            throw new Error(data.message || "Ошибка при создании пользователя");
        }

        const user = data.user;
        const table = $('#kt_ecommerce_products_table').DataTable();

        const row = `
            <tr>
                <td></td>
                <td class="text-start min-w-100px">${user.full_name}</td>
                <td></td>
                <td class="text-end pe-0">${user.login || '-'}</td>
                <td></td>
                <td class="text-end pe-0">${user.email || '-'}</td>
                <td></td>
                <td class="text-end">${user.role}</td>
            </tr>`;
        table.row.add($(row)).draw();

        fields.forEach(id => document.getElementById(id).value = '');
        modal.hide();

        Swal.fire({
            text: "Пользователь успешно создан!",
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "Продолжить",
            customClass: { confirmButton: "btn btn-success" }
        });

    } catch (err) {
        console.error(err);
        Swal.fire({
            text: "Произошла ошибка при создании пользователя!",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Понятно",
            customClass: { confirmButton: "btn btn-danger" }
        });
    }
});
