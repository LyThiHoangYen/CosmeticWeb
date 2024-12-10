let lastScrollTop = 0;

window.addEventListener('scroll', () => {
    const animatedElement = document.querySelector('.animate-on-scroll');
    const animatedElement_1 = document.querySelector('.animate-on-scroll-milk');
    const st = window.pageYOffset || document.documentElement.scrollTop;

    if (st > lastScrollTop) {
        // Cuộn xuống
        animatedElement.style.transform = 'translateY(50px)';
        animatedElement_1.style.transform = 'translateY(0)';
    } else {
        // Cuộn lên
        animatedElement.style.transform = 'translateY(0)';
        animatedElement_1.style.transform = 'translateY(50px)';

    }

    lastScrollTop = st <= 0 ? 0 : st; // Đảm bảo giá trị không âm
});

let slideachieve = 0;

function showSlideachive(index) {
    const slides = document.querySelectorAll('.ACHIVE');

    if (index >= slides.length) {
        slideachieve = 0;
    } else if (index < 0) {
        slideIndex = slides.length - 1;
    } else {
        slideachieve = index;
    }

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }

    slides[slideachieve].style.display = 'flex';
}

function nextSlideachive() {
    showSlideachive(slideachieve + 1);
}

function prevSlideachive() {
    showSlideachive(slideachieve + 1);
}

// Auto slide change every 3 seconds
setInterval(nextSlideachive, 3000);

// Show the first slide initially
showSlide(slideachieve);

let slideIndex = 0;

function showSlide(index) {
    const slides = document.querySelectorAll('.slider-item');

    if (index >= slides.length) {
        slideIndex = 0;
    } else if (index < 0) {
        slideIndex = slides.length - 1;
    } else {
        slideIndex = index;
    }

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }

    slides[slideIndex].style.display = 'flex';
}

function nextSlide() {
    showSlide(slideIndex + 1);
}

function prevSlide() {
    showSlide(slideIndex - 1);
}

// Auto slide change every 3 seconds
setInterval(nextSlide, 3000);

// Show the first slide initially
showSlide(slideIndex);

