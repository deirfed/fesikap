const zoomableImages = document.querySelectorAll('.zoomable-img');
const zoomImage = document.getElementById('zoomImage');

zoomableImages.forEach(img => {
    img.addEventListener('click', () => {
        const src = img.getAttribute('data-img');
        zoomImage.setAttribute('src', src);
    });
});