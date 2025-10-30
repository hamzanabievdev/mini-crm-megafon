$(document).ready(function() {
    const operatorSelect = $('#operator_select');
    const appealId = window.location.pathname.split('/').pop();

    if (operatorSelect.data('select2')) {
        operatorSelect.select2();
    } else {
        operatorSelect.select2();
    }

    operatorSelect.on('change', function() {
        const newOperatorId = $(this).val();
        const newOperatorName = $(this).find('option:selected').text();
        const currentOperatorId = $(this).data('current');

        if (!newOperatorId || newOperatorId == currentOperatorId) return;

        Swal.fire({
            text: `Вы уверены, что хотите поменять ответственного на ${newOperatorName}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Да, изменить',
            cancelButtonText: 'Отмена',
            reverseButtons: true,
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/api/appeal/${appealId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ operator_id: newOperatorId })
                })
                .then(res => res.json())
                .then(data => {
                    Swal.fire({
                        text: `Ответственный успешно изменен на ${newOperatorName}!`,
                        icon: 'success',
                        confirmButtonText: 'Продолжить',
                        customClass: { confirmButton: 'btn btn-success' },
                        buttonsStyling: false
                    });
                    operatorSelect.data('current', newOperatorId);
                });
            } else {
                $(this).val(currentOperatorId).trigger('change.select2');
            }
        });
    });
});
