document.addEventListener('DOMContentLoaded', () => {
    const addCommentBtn = document.getElementById('addCommentBtn');
    const newCommentMessage = document.getElementById('newCommentMessage');
    const commentsList = document.getElementById('commentsList');
    const commentsCount = document.querySelector('.card-header .text-muted');

    const appealId = window.location.pathname.split('/').pop();

    addCommentBtn.addEventListener('click', async () => {
        const message = newCommentMessage.value.trim();
        if (!message) return;

        addCommentBtn.disabled = true;
        addCommentBtn.innerHTML = 'Отправка...';

        const response = await fetch('/api/comment', {
            method: 'POST',
            headers: { 
                'Content-Type': 'application/json',
                'Accept': 'application/json'
             },
            body: JSON.stringify({
                appeal_id: appealId,
                message: message
            })
        });

        const data = await response.json();

        newCommentMessage.value = '';
        addCommentBtn.disabled = false;
        addCommentBtn.innerHTML = 'Отправить';

        const commentHTML = `
            <div class="d-flex mb-5 fade-in">
                <div class="symbol symbol-40px me-4">
                    <img src="/assets/media/avatars/blank.png" alt="avatar" class="rounded-circle" />
                </div>
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start mb-1">
                        <div>
                            <div class="fw-bold text-gray-800">${data.user.full_name}</div>
                        </div>
                        <div class="text-muted fs-8">${new Date().toLocaleString('ru-RU')}</div>
                    </div>
                    <div class="text-gray-700 fs-7">${data.comment.message}</div>
                </div>
            </div>
        `;
        commentsList.insertAdjacentHTML('beforeend', commentHTML);

        const currentCount = parseInt(commentsCount.textContent) || 0;
        commentsCount.textContent = `${currentCount + 1} комментариев`;
    });
});