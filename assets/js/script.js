document.addEventListener('DOMContentLoaded', () => {
    const popup = document.getElementById('showcase');
    const iframe = document.getElementById('demoIframe');
    const closePopup = document.getElementById('closePopup');
    const frameOptions = document.querySelectorAll('.frame-option');
    const iframeContainer = document.querySelector('.iframe-container');
    const openPopupButton = document.getElementById('openPopup');

    if (openPopupButton) {
        openPopupButton.addEventListener('click', () => {
            popup.style.display = 'flex'; // Show pop-up
            setActiveView('desktop'); // Set desktop view as default
        });
    }

    if (closePopup) {
        closePopup.addEventListener('click', () => {
            popup.style.display = 'none';
            iframe.src = ''; // Clear iframe source
        });
    }

    frameOptions.forEach(option => {
        option.addEventListener('click', () => {
            const view = option.dataset.view;
            setActiveView(view);
        });
    });

    function setActiveView(view) {
        frameOptions.forEach(option => option.classList.remove('active'));
        document.querySelector(`.frame-option[data-view="${view}"]`).classList.add('active');
        iframeContainer.className = `iframe-container ${view}`;
        iframe.style.width = view === 'desktop' ? '100%' : view === 'tablet' ? '768px' : '375px';
        iframe.style.height = `calc(100vh - 50px)`;
    }
});
