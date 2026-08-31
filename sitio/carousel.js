
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.carousel').forEach(initCarousel);
});

function initCarousel(root) {
    const slides = root.querySelectorAll('.carousel-slide');
    if (!slides.length) return;

    let current = 0;
    let timer = null;

    // Genera los puntos de navegación automáticamente según el número de fotos
    let dotsWrap = root.querySelector('.carousel-dots');
    if (!dotsWrap) {
        dotsWrap = document.createElement('div');
        dotsWrap.className = 'carousel-dots';
        root.appendChild(dotsWrap);
    } else {
        dotsWrap.innerHTML = '';
    }

    const dots = [];
    slides.forEach((_, i) => {
        const dot = document.createElement('button');
        dot.type = 'button';
        dot.className = 'carousel-dot' + (i === 0 ? ' active' : '');
        dot.setAttribute('aria-label', `Foto ${i + 1}`);
        dot.addEventListener('click', () => {
            showSlide(i);
            resetTimer();
        });
        dotsWrap.appendChild(dot);
        dots.push(dot);
    });

    function showSlide(index) {
        slides[current].classList.remove('active');
        dots[current].classList.remove('active');
        current = (index + slides.length) % slides.length;
        slides[current].classList.add('active');
        dots[current].classList.add('active');
    }

    const prevBtn = root.querySelector('[data-carousel-prev]');
    const nextBtn = root.querySelector('[data-carousel-next]');
    if (prevBtn) prevBtn.addEventListener('click', () => { showSlide(current - 1); resetTimer(); });
    if (nextBtn) nextBtn.addEventListener('click', () => { showSlide(current + 1); resetTimer(); });

    function resetTimer() {
        clearInterval(timer);
        timer = setInterval(() => showSlide(current + 1), 5000);
    }

    resetTimer();
}
